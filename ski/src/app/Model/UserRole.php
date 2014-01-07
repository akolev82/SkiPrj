<?php
App::uses('AppModel', 'Model');
/**
 * UserRole Model
 *
*/
class UserRole extends AppModel {

  public $name = 'UserRole';
  public $useTable='user_roles';
  public $primaryKey = 'id';
  public $displayField = 'UserID;RoleID';

  public $validate = array(
      'UserID' => array(
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
  );
  
  //The Associations below have been created with all possible keys, those that are not needed can be removed
  public $belongsTo = array(
      'User' => array(
          'className' => 'User',
          'foreignKey' => 'UserID',
          'conditions' => '',
          'fields' => 'UserID',
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
