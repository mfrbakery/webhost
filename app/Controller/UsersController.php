<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	
	public $view   = 'Theme';
	
	public $theme = 'Default';
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'register', 'about','contact');
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
	}
	
	/**
	 * front-end registering of users
	 */
	public function register() {
		
		
		
	 	$allservices = $this->GetServices();
	 	$this->loadModel('RequestRecord');
	
		if ($this->request->is('post') && !empty($this->request->data['RequestRecord']['service_id'])) {
			// Get the user id
			
			// Get the serviceid
			
			$this->User->create();
			
			if ($this->User->save($this->request->data) ) {

				$this->Session->setFlash('The user has been saved', 'success');
				$this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->Session->setFlash('All fields are required', 'information');
		}

		$userid = $this->User->id;
		$username = null;
		
		if(!empty($this->data['User']['username'])){
			$username = $this->data['User']['username'];
		}
		//debug($username);
		$serviceselection = '';
		
		if(!empty($this->request->data['RequestRecord']['service_id'])){
			$serviceid = $this->request->data['RequestRecord']['service_id'];
			$serviceselection = implode(', ', $serviceid);
		}
		
		$this->RequestRecord->set(array('user_id' => $userid, 'service_id' => $serviceselection, 'user_username' => $username));
		$this->RequestRecord->save();
		
		
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
		$this->set('allservices', $allservices);
	}
	
	public function about(){
		
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
		if ($this->Session->read('Auth.User')) {
			$this->Session->setFlash('You are logged in!', 'success');
			$this->redirect(array('action' => 'view'));
		} else {
	
			if ($this->request->is('post')) {
					
				
				if ($this->Auth->login()) {
					$id = $this->Auth->user('id');
					$username = $this->Auth->user('username');
					
					$this->Session->setFlash('Welcome '.$username , 'success');
					$this->redirect(array('action' => 'view', $id));
					
					//debug($this->User->exists());
					
				} else {
					$this->Session->setFlash(__('Invalid username or password, try again'));
				}
			}
		}
	}
	
	public function home(){
		
	}
	
	public function contact(){
		
	}
	
	
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
