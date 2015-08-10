<?php
/* 
* @Author: sebb
* @Date:   2014-11-17 17:40:45
* @Last Modified by:   sebb
* @Last Modified time: 2014-12-18 14:48:57
*/
App::uses('Model', 'AppModel');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('CakeEmail', 'Network/Email');

class User extends AppModel {

/**
 * The validation rules...
 * @var array
 */
	public $validate = array(
		'ssn' => [
			'un' => [
				'rule' => ['cisUnique'],
				'message' => 'not unique',
				'on'	  => 'create'
			]
		],
		'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'required' => true,
				'message' => 'A password is required',
				'on'	  => 'create'
			)
		)
	);

/**
 * unique validation rule, CakePHP's inbuild one fails because "OR" is not implemented in MongoDB
 * @param  $check
 * @return boolean
 */
	public function cisUnique($check, $limit) {
		$exists = $this->find('count', [
		    'conditions' => [
		    	'ssn' => $this->data[$this->alias]['ssn']
		    ]
		]);
		return $exists == 0;
	}

	public function sendPasswordReset($id) {
		$this->clear();
		$user = $this->read(null, $id);
		unset($user['User']['password']);
		$token = String::uuid();
		$this->saveField('password_reset_token', $token);
		return $this->emailResetToken($user['User']['email'], $token);
	}

	public function emailResetToken($email, $resetCode) {
		$host = isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"]:"";
		$url = Router::url("/users/password_reset/$resetCode", true);

		$Email = new CakeEmail();
		$Email->from(["no-reply@$host" => $host]);
		$Email->to($email);
		$Email->sender("no-reply@$host", $host);
		$Email->subject("$host password reset.");

		return $Email->send("Hello, 

Please use the link below to reset your password for $host

$url

With regards, 
$host");
	}

	public function beforeSave($options = []) {
		if (!empty($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
	}

}
