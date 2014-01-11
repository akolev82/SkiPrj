<?php
App::uses('AppModel', 'Model');
/**
 * Zip Model
 *
 */
class Zip extends AppModel {
  
  public $name = 'Zip';
  public $useTable='zips';
  public $primaryKey = 'ZipID';
  public $displayField = 'ZipCode';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ZipID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountryID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ZipCode' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'latitude' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'longitude' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public $belongsTo = array(
	    'State' => array(
	        'className' => 'State',
	        'foreignKey' => 'StateID',
	        'conditions' => '',
	        'fields' => 'StateID',
	        'order' => ''
	    ),
	    'Country' => array(
	        'className' => 'Country',
	        'foreignKey' => 'CountryID',
	        'conditions' => '',
	        'fields' => 'CountryID',
	        'order' => ''
	    ),
	    'City' => array(
	        'className' => 'City',
	        'foreignKey' => 'CityID',
	        'conditions' => '',
	        'fields' => 'CityID',
	        'order' => ''
	    )
	);
}
