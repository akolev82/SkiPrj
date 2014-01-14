<?php
App::uses('AppModel', 'Model');
/**
 * School Model
 *
*/
class School extends AppModel {
  
  public $name = 'School';
  public $useTable='schools';
  public $primaryKey = 'SchoolID';
  public $displayField = 'SchoolName';
  

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'SchoolID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              'required' => true,
              //'last' => false, // Stop validation after this rule
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'SchoolName' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'Active' => array(
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
  
  /**
   * belongsTo associations
   *
   * @var array
   */
  public $belongsTo = array(
      'Address' => array(
          'className' => 'Address',
          'foreignKey' => 'PrimaryAddressID',
          'conditions' => '',
          'fields' => 'AddressID',
          'order' => ''
      ),
      'Person' => array(
          'className' => 'Person',
          'foreignKey' => 'PrincipalID',
          'conditions' => '',
          'fields' => 'PersonID',
          'order' => ''
      )
  );
}
