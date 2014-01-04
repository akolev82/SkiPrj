<?php
App::uses('AppModel', 'Model');
/**
 * Ref Model
 *
 */
class Ref extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'ref';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'Code';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'Code';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'Code' => array(
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
