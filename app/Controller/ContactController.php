<?php
App::uses('AppController', 'Controller');

class ContactController extends AppController{
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'register', 'index','contact','us');
	}
	
	
	public function index(){
		$subjects = $this->Contact->Subject->find('list');
		$this->set(compact('subjects'));
		
		if($this->request->is('post')){
			$this->Contact->create();
			if($this->Contact->save($this->request->data)){
				$this->Session->setFlash('Thank you for contacting us.  Your input is greatly appreciated!','success');
			} else {
				$this->Session->setFlash('Unable to send message, please try again later.');
			}
		}
	}
	
}