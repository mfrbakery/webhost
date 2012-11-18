<?php
App::uses('AppController', 'Controller');

class ServicesController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'register', 'index','us', 'add');
	}
	
	public function index(){
		$this->Service->recursive = 0;

		$this->set('services', $this->paginate());
	}
	
	public function add(){
		
		if($this->request->is('post')){
			$this->Service->create('Service');
			
			if($this->Service->save($this->request->data)){
				$this->Session->setFlash('Service has been saved', 'success');
				
			} else {
				$this->Session->setFlash('Service could not be saved.');
			}
			
		}
		
	}
	
}