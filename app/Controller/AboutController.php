<?php
App::uses('AppController', 'Controller');

$usid = null;
class AboutController extends AppController{
	
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'register', 'index','contact','us');
	}
	
	/**
	 * Show the dynamic content created
	 */
	public function index(){
		//$id = $this->us($id);
		
		$params = array(
			'fields' => array('id'),
			'contains' => array(
					'About' => array(
							'fields' => array('id', 'title', 'body')
							)
					)
				
		);
		$this->About->Behaviors->attach('Containable');
		$data = $this->About->find('first', $params);
		$id = $data['About']['id'];

		$this->redirect(array('action' => 'us', $id));
		//$this->About->recursive = 0;
		//$this->set('groupid', $this->Auth->user('group_id'));
		$this->set('abouts', $this->paginate());
	}
	/**
	 * Dynamically create the content
	 * Of the about page
	 */
	public function add(){
		if($this->request->is('post')){
			$this->About->create();
			
			if($this->About->save($this->request->data)){
				$this->Session->setFlash('About page content has been added','success');
			} else {
				$this->Session->setFlash(_('About content could not be saved'));
			}
		}
		
		
	}
	
	public function backend(){
		$this->About->recursive = 0;
		$this->set('groupid', $this->Auth->user('group_id'));
		$this->set('abouts', $this->paginate());
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
		$this->About->id = $id;
		if (!$this->About->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->About->delete()) {
			$this->Session->setFlash('About content deleted', 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('About content was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * Dynamically edit the content
	 * Of the about page
	 * @param unknown_type $id
	 */
	public function edit($id = null){
		
	}
	
	public function us($id = null){
		
		$this->About->recursive = 0;
		$this->set('groupid', $this->Auth->user('group_id'));
		$this->set('abouts', $this->paginate());
		$this->About->id = $id;
	
		if (!$this->About->exists()) {
			throw new NotFoundException(__('Invalid note'));
		}
		//else{
		//	$this->redirect(array('action' => 'view', $id));
		//}
		
		$this->set('about', $this->About->read(null, $id));
	
	}
	
	private function getUsId(){
		
	}
	
}