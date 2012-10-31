<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

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
				$to = $this->request->data['Contact']['email'];
				$subjectid = $this->request->data['Contact']['subject_id'];
				debug($subjectid);
				$parms = array(
						'fields' => array('id','name'),
						'conditions' => array('Subject.id' => $subjectid)
						
						);
				$found = $this->Contact->Subject->find('all', $parms);
				debug($found);
				$this->emailsender($to);
				$this->Session->setFlash('Thank you for contacting us.  Your input is greatly appreciated!','success');
			} else {
				$this->Session->setFlash('Unable to send message, please try again later.');
			}
		}
	}
	
	public function emailsender($to){
		$email = new CakeEmail('gmail');
		$email->from(array('Adam@techbaseit.com' => 'Adam Rodriguez'))
		->to($to)
		->subject('About')
		->send('My message');
	}
	
}