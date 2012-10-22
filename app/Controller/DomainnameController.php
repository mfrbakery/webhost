<?php
App::uses('AppController', 'Controller');
/**
 * 
 * @author linux-mint
 *
 */

class DomainnameController extends AppController {
	
	var $components = array('Whois');
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'register', 'about','contact','index');
		$this->Auth->allow('initDB'); // We can remove this line after we're finished
	}
	
	public function index(){
		$this->Whois->initialize();
		
		if($this->request->is('post')){
			$domain = $this->request->data['DomainName']['domain'];
			
			$dot = strpos($domain, '.');
			$sld = substr($domain, 0, $dot);
			$tld = substr($domain, $dot+1);
			
			$data = $this->Whois->getwhoisdetails ($sld, $tld);
			
			$available = $this->Whois->isdomainavailable($sld, $tld);
			
			//debug($available);
			//debug($data);
			if($data==false){
				$this->Session->setFlash('That domain is available!', 'success');
			} else {
				$this->Session->setFlash('Sorry! That domain name is already taken.');
			}
			
			//debug($data);
		}
		
	}
	
}