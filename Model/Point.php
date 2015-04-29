<?php
App::uses('AppModel', 'Model');
/**
 * Point Model
 *
 * @property Property $Property
 * @property Session $Session
 */
class Point extends AppModel {

	public $belongsTo = [
		'Property' => [
			'foreignKey' => 'slug'
		]
	];

	public $virtualFields = array(
		'count' => 'count(*)',
		'unique_count' => 'count(Distinct Point.client_identifier)',
		'created_day' => 'DATE(created)'
	);


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'property_slug' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		),
		'session_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		),
		'slug' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		),
		'value' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		)
	);

	public function beforeSave($options = []) {
		$this->data[$this->alias]['ip'] = $this->get_client_ip();
	}

	private function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed
}
