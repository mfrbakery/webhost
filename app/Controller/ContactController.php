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
		
		// The column in the DB needs to be 'name' for this to work
		$this->set(compact('subjects'));
		
		if($this->request->is('post')){
			$this->Contact->create();
			if($this->Contact->save($this->request->data)){
				$to = $this->request->data['Contact']['email'];
				$subjectid = $this->request->data['Contact']['subject_id'];
			
				$parms = array(
						'fields' => array('id','name', 'email_body'),
						'conditions' => array('Subject.id' => $subjectid),
						'contains' => array(
								
								'Subject' => array('id','email_body'),
								'Contact' => array('email')
								
								)
						
						);
				
				$this->Contact->Subject->Behaviors->attach('Containable');
				$found = $this->Contact->Subject->find('first', $parms);
				$subjectname = $found['Subject']['name'];
				$replyemail = $found['Subject']['email_body'];
				//debug($found);
				$this->emailsender($to, $subjectname, $replyemail);
				$this->Session->setFlash('Thank you for contacting us.  Your input is greatly appreciated!','success');
			} else {
				$this->Session->setFlash('Unable to send message, please try again later.');
			}
		}
	}
	
	public function emailsender($to, $emailsub, $emailbody){
		$email = new CakeEmail('gmail');
		$email->from(array('Adam@techbaseit.com' => 'Adam Rodriguez'))
		->to($to)
		->subject($emailsub)
		->send($emailbody);
	}
	
}