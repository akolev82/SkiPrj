<?php
App::uses('AppModel', 'Model');
/**
 * RolePermission Model
 *
 */
class RolePermission extends AppModel {

  public $name = 'RolePermission';
  public $useTable='role_permissions';
  public $primaryKey = 'RolePermissionID';
  public $displayField = 'RolePermissionID';

	public $validate = array(
		'RolePermissionID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			),
		),
		'PermissionID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	    'RoleID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	    'Action' => array(
	        'notEmpty' => array(
	            'rule' => array('notEmpty'),
	            //'message' => 'Your custom message here',
	            //'allowEmpty' => false,
	            //'required' => false,
	            //'last' => false, // Stop validation after this rule
	            //'on' => 'create', // Limit validation to 'create' or 'update' operations
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
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $belongsTo = array(
	    'Permission' => array(
	        'className' => 'Permission',
	        'foreignKey' => 'PermissionID',
	        'conditions' => '',
	        'fields' => 'PermissionID',
	        'order' => ''
	    ),
	    'Role' => array(
	        'className' => 'Role',
	        'foreignKey' => 'RoleID',
	        'conditions' => '',
	        'fields' => 'RoleID',
	        'order' => ''
	    )
	);
}
