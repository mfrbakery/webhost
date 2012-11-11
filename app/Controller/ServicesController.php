<?php
App::uses('AppController', 'Controller');

class ServicesController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'register', 'index','us');
	}
	
	public function index(){
		$this->Service->recursive = 0;

		$this->set('services', $this->paginate());
	}
	
}