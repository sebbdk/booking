<?php
App::uses('AppModel', 'Model');
/**
 * OpenTime Model
 *
 * @property BookingType $BookingType
 */
class OpenTime extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'start';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'booking_type_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'start' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'end' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
}
