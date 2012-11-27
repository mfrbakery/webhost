<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController{
	
	public $uses = array('Feeds.Aggregator');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'register', 'index','contact','us');
	}
	
	public function index(){
		$this->Aggregator->Behaviors->attach('Containable');
		$elements = $this->Aggregator->find('all', array(
		
			
		
			'conditions' => array(
				'Tech Crunch' => 'http://feeds.feedburner.com/TechCrunch/',
	
			
			),
			
		));
		
			
		
	
		foreach($elements as $element){
			//debug($element);
		}
		$this->loadModel('About');
		$this->About->recursive = 0;
		$this->set('groupid', $this->Auth->user('group_id'));
		$this->set('abouts', $this->paginate('About'));
		//debug($this->paginate('About'));
	}
}