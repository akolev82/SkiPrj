<?php
App::uses('AppModel', 'Model');
/**
 * Domain Model
 *
 */
class Domain extends AppModel {
  
  public $name = 'Domain';
  public $useTable='domains';
  public $primaryKey = 'DomainID';
  public $displayField = 'DomainName';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'DomainID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'DomainName' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		    'This domain entity already exists' => array(
		        'rule' => array('isUnique')
		    ),
		),
		'enabled' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
