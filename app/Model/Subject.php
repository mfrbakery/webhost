<?php
App::uses('AppModel', 'Model');
class Subject extends AppModel{
	
	public function parentNode() {
		return null;
	}
	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
			'Contact' => array(
					'className' => 'Contact',
					'foreignKey' => 'subject_id',
					'dependent' => false,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'exclusive' => '',
					'finderQuery' => '',
					'counterQuery' => ''
			)
	);
	
}