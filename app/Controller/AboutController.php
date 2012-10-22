<?php
App::uses('AppController', 'Controller');


class AboutController extends AppController{
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'register', 'index','contact');
	}
	
	/**
	 * Show the dynamic content created
	 */
	public function index(){
		//$this->About->id = $id;
		$this->About->recursive = 0;
		//debug($this->About->id);
		/*if (!$this->About->exists()) {
			throw new NotFoundException(__('Invalid about content'));
		}*/
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
	
	/**
	 * Dynamically edit the content
	 * Of the about page
	 * @param unknown_type $id
	 */
	public function edit($id = null){
		
	}
	
	public function view($id = null){
		
	}
	
}