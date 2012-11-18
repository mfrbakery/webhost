<?php
App::import('component', 'CakeSession');
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 * @property Note $Note
 */
class User extends AppModel {
	/**
	 * (non-PHPdoc)
	 * @see Model::beforeSave()
	 */
	public function beforeSave($options = array()) {
			if (isset($this->data[$this->alias]['password'])) {
				$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password'], 'sha512', true);
			}
			
			return true;
	}
	
	public $name = 'User';
	
	/**
	 * 
	 * @param unknown_type $user
	 */
	public function bindNode($user) {
		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}
	
	public $actsAs = array('Acl' => array('type' => 'requester'));
	
	/**
	 * 
	 */
	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['User']['group_id'])) {
			$groupId = $this->data['User']['group_id'];
		} else {
			$groupId = $this->field('group_id');
		}
		if (!$groupId) {
			return null;
		} else {
			return array('Group' => array('id' => $groupId));
		}
	}

/**
 * Validation rules
 *
 * @var array
 */
	
	
	
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A username is required.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
						'rule' => array('isUnique'),
						'message' => 'An account with this username already exists.'
			),
			'alphaNumeric' => array(
					'rule' => array('alphaNumeric'),
					'message' => 'Username can only contain letters and numbers.'
			)
		),
		'useremail' => array(
					
					'useremailRule-2' => array(
							'rule' => array('email'),
							'message' => 'The email address must be valid.'
							),
					
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('validatePassword'),
				'message' => 'Password is required.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'passwordRule-2' => array(
					'rule' => array('validatePassword'),
					'message' => 'Passwords do not match.'
			
			)
			
		),
		'confirmpassword' => array(
			
				'rule' => array('validatePassword'),
				'message' => 'Passwords do not match.',
				'on' => 'create',
					
			
		
		),
		
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'group_id-Rule2' => array(
				'rule' => array('validateGroupEdit'),
				'message' => 'You are not authorized to save this user to the selected group.'
			)
		),
	);
	
	
	
	function validateGroupEdit($data) {
		
		$thisgroupID = CakeSession::read('Auth.User.group_id');
		
		
		
		$result = false;
		if (isset($this->data['User']['group_id'])) {
			$groupid = $this->data['User']['group_id'];
		} else {
			$groupid = $this->field('group_id');
		}
		

		
		if($groupid < $thisgroupID){
			return false;
		} else {
			return true;
		}
		

	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Note' => array(
			'className' => 'Note',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'RequestRecord' => array(
			'className' => 'RequestRecord',
			'foreignKey' => 'user_id'
		)
	);
	
	public function validatePassword($data){
		if($this->data['User']['password'] !== $this->data['User']['confirmpassword']){
			return false;
		}
		else{
			return true;
		}
	}

}
