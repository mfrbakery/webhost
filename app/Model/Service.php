<?php
App::uses('AppModel', 'Model');

class Service extends AppModel {
	
	public $name = 'Service';
	
	public $validate = array(
			
			
				'servicename' => array(
						'servicenameRule-1' => array(
									'rule' => 'alphaNumeric',
									'message' => 'A service name is required'
						),
						
						'servicenameRule-2' => array(
								'rule' => 'required',
								'message' => 'A service name is required.'								
						),
						
				),
				
				'description' => array(
						
						
						'descriptionRule-2' => array(
								'rule' => 'alphaNumeric',
								'message' => 'A description is required.'
						
						),
						'descriptionRule-1' => array(
								'rule' => 'required',
								'message' => 'A description is required'
						
						),
						
				),
						
			
			
			);
	
}