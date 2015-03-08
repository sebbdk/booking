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
	    'created_day' => 'DAY(created)'
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed
}
