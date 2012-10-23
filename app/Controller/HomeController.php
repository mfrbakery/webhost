<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController{
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'register', 'index','contact','us');
	}
	
	public function index(){
		$this->loadModel('About');
		$this->About->recursive = 0;
		$this->set('groupid', $this->Auth->user('group_id'));
		$this->set('abouts', $this->paginate());
	}
}