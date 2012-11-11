<?php
App::uses('AppController', 'Controller');

class SubjectsController extends AppController{
	
	
	public function index(){
		$this->Subject->recursive = 0;
		$this->set('subjects', $this->paginate());
	}
	
	public function add(){
		
		if($this->request->is('post')){
			$this->Subject->create();
			if($this->Subject->save($this->request->data)){
				$this->Session->setFlash('Subject has been saved!', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Subject could not be saved');
			}
		}
		
	}
	
	
}