<?php
/**
 * @Author: sebb
 * @Date:   2015-09-04 16:37:10
 * @Last Modified by:   sebb
 * @Last Modified time: 2015-09-04 16:58:02
 */
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');

class Booking extends AppModel {

	public $displayField = 'name';

	public $validate = array(
		'booking_type_id' => array(
			'uuid' => array(
				'rule' => array('uuid')
			),
		),
		'date' => array(
			'datetime' => array(
				'rule' => array('datetime')
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email')
			),
		),
		'phone' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'has_payed' => array(
			'numeric' => array(
				'rule' => array('numeric')
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'BookingType' => array(
			'className' => 'BookingType',
			'foreignKey' => 'booking_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $sendConfirmationEmail = false;

	public function beforeSave($options = []) {
		if(isset($this->data[$this->alias]['id'])) {
			$current = $this->find('first', [ 'conditions' => ['Booking.id' => $this->data[$this->alias]['id']] ]);

			if($current && $current[$this->alias]['confirmed'] == 0 && $this->data[$this->alias]['confirmed'] == 1) {
				$this->sendConfirmationEmail = true;
			}
		}
	}

	public function afterSave($created, $options = []) {
		if($this->sendConfirmationEmail) {
			$current = $this->find('first', [ 'conditions' => ['Booking.id' => $this->data[$this->alias]['id']] ]);

			$Email = new CakeEmail();
			$Email->from(array('no-reply@fitnessconsulting.dk' => 'fitnessconsulting.dk'));
			$Email->to( $this->data[$this->alias]['email'] );
			$Email->subject('fitnessconsulting.dk booking bekræftelse');
			$Email->send('Hej '. $this->data[$this->alias]['name'] .'

Din booking er nu bekræftet.
Hvis du vil ændre din tid eller andet kan du ringe til '.$current['BookingType']['mobile_pay_number'].'.

Mvh,
fitnessconsulting.dk
');
		}
	}
}
