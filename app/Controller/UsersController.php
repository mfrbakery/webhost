<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'register', 'about','contact', '*');
		$this->Auth->allow('initDB'); // We can remove this line after we're finished
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
		$groupid = $this->Auth->user('group_id');
		$this->set('groupid', $groupid);
		
	}
	
	/**
	 * Custom function to allow or
	 * Deny access to actions. Comment
	 * Out when finished.
	 */
	public function initDB() {
		$group = $this->User->Group;
		//Allow developers to everything
		$group->id = 1;
		$this->Acl->allow($group, 'controllers');
	
		//allow administrators to Notes and Users
		$group->id = 2;
		$this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'controllers/Notes');
		$this->Acl->allow($group, 'controllers/Users');
	
		//allow superusers add functionality only
		$group->id = 3;
		$this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'controllers/Notes/add');
		$this->Acl->allow($group, 'controllers/Users/add');
		$this->Acl->allow($group, 'controllers/Users/view');
		$this->Acl->allow($group, 'controllers/Users/edit');
		$this->Acl->allow($group, 'controllers/Users/logout');
		
		//allow users to interact with own profile only
		$group->id = 4;
		$this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'controllers/Notes/add');
		$this->Acl->allow($group, 'controllers/Notes/edit');
		$this->Acl->allow($group, 'controllers/Users/view');
		$this->Acl->allow($group, 'controllers/Users/logout');

		//we add an exit to avoid an ugly "missing views" error message
		echo "all done";
		exit;
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 * back-end adding of users
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
		debug($groups);
	}
	
	/**
	 * front-end registering of users
	 */
	//@todo redo this
	public function register() {
		
		
		
	 	
	 	$this->loadModel('RequestRecord');
	
		if ($this->request->is('post')) {
			// Get the user id
			
			// Get the serviceid
			//debug($this->request->data);
			$this->User->create();
			
			if ($this->User->save($this->request->data) ) {
					$this->User->saveField('group_id', 4);
				$this->Session->setFlash('The user has been saved', 'success');
				//$this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} 

		
	}
	
	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		$groupid = $this->Auth->user('group_id');
		
		
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
	
		if ($this->request->is('post') || $this->request->is('put')) {
			
			
			if ($this->User->save($this->request->data)) {
				
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$this->set('groupid', $groupid);
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * 
	 */
	public function login() {
		
		if ($this->Auth->loggedIn()) {
			$id = $this->Auth->user('id');
			$this->Session->setFlash('You are logged in!', 'success');
			$groupid = $this->Auth->user('group_id');
			
			if($groupid == 1 or $groupid == 2){
				//$this->redirect(array('action' => 'index'));
			} else {
				//$this->redirect(array('action' => 'view', $id));
			}
			
		} else {
	
			if ($this->request->is('post')) {
					
				
				if ($this->Auth->login()) {
					$id = $this->Auth->user('id');
					$username = $this->Auth->user('name');
					
					$this->Session->setFlash('Welcome '.$username , 'success');
					$this->redirect(array('action' => 'view', $id));
					
					//debug($this->User->exists());
					
				} else {
					$this->Session->setFlash(__('Invalid username or password, try again'));
				}
			}
		}
	}
	
	//public function home(){
		
	//}
	
	//public function contact(){
		
	//}
	
	
	/**
	 * 
	 */
	public function logout() {
		//Leave empty for now.
		$this->Session->setFlash('You have successfully signed out!', 'success');
		$this->redirect($this->Auth->logout());
	}
	
	private function GetServices() {
		// Load the Service model	
		$this->loadModel('Service');
		
		
		$services = $this->Service->find('all');
		$myServicesArr = array();
		
		foreach($services as $service) {
			$myServicesArr[$service['Service']['id']] = $service['Service']['servicename'];
		}
		
		
		return $myServicesArr;
	}
	
}
