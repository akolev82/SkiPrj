<?php
App::uses('AppModel', 'Model');
/**
 * Country Model
 *
 */
class Country extends AppModel {

  public $useTable='countries';
  public $primaryKey = 'CountryID';
  public $displayField = 'CountryName';

	public $validate = array(
		'CountryID' => array(
			'numeric' => array(
				'rule' => array('naturalNumber'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
			    'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountryName' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
