<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $name = 'User';
	
	public function beforeSave($options = array()){
		if(isset($this->data[$this->alias]['password'])){
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
					$this->data[$this->alias]['password']
		);
	}
	return true;
}
	
	public $validate = array(
			'first_name' => array(
					'alphaNumeric' => array(
							'required' => true,
							'rule' => 'alphaNumeric',
							'message' => 'A username is required'
					),
					'notEmpty' => array(
									'rule' => 'notEmpty',
									'message' => 'A username is required'
							)
				),
			'last_name' => array(
					'alphaNumeric' => array(
							'required' => true,
							'rule' => 'alphaNumeric',
							'message' => 'A username is required'
					),
					'notEmpty' => array(
							'rule' => 'notEmpty',
							'message' => 'A username is required'
					)
			),
			'email' => array(
					'email' => array(
							'required' => true,
							'rule' => 'email',
							'message' => 'A username is required'
					),
					'notEmpty' => array(
							'rule' => 'notEmpty',
							'message' => 'A username is required'
					)
			),
			'password' => array(
					'notEmpty' => array(
							'rule' => 'notEmpty',
							'message' => 'A username is required'
					)
			),
			'confirm_password' => array(
					'notEmpty' => array(
							'rule' => 'notEmpty',
							'message' => 'A username is required'
			),
			'matchPassword' => array(
					'rule' => array('identicalFieldValues', 'password'),
					'message' => 'Your passwords do not match'
					)
			)
	);
	
	function identicalFieldValues($field=array(), $compare_field=null){
		foreach ($field as $key => $value){
			$v1 = $value;
			$v2 = $this->data[$this->name][$compare_field];
			if($v1 !== $v2){
				return FALSE; 
			} else{
				continue;
			}
		}
		return TRUE;
	}
}
?>