<?php
App::uses('AppModel', 'Model');

class Contact extends AppModel {

	public $name = 'Contact';
	var $useTable = 'contacts';
	
	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	
	/**
	 *
	 */
	/*
	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['Contact']['subject_id'])) {
			$subjectId = $this->data['Contact']['subject_id'];
		} else {
			$subjectId = $this->field('subject_id');
		}
		if (!$subjectId) {
			return null;
		} else {
			return array('Subject' => array('id' => $subjectId));
		}
	}*/
	
	/**
	 *
	 * @param unknown_type $user
	 */
	public $validate = array(
			
			'email' => array(
						
					'rule' => 'email',
					'message' => 'Email address is invalid.',
					
						
			
			),
			
			);
	
	
	public $belongsTo = array(
			'Subject' => array(
					'className' => 'Subject',
					'foreignKey' => 'subject_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);

}