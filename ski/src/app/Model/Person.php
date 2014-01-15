<?php
App::uses('AppModel', 'Model');
/**
 * Person Model
 *
 * @property Users $Users
*/
class Person extends AppModel {

  public $name = 'Person';
  public $useTable = 'persons';
  public $primaryKey = 'PersonID';
  public $displayField = 'PersonID';

  public $validate = array(
      'PersonID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              'required' => false,
              //'last' => false, // Stop validation after this rule
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'UserID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              'required' => false,
              //'last' => false, // Stop validation after this rule
              'on' => 'create', // Limit validation to 'create' or 'update' operations
          )
      ),
      'FirstName' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty')
          ),
      ),
      'LastName' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty')
          ),
      ),
      /*'Gender' => array(
       'inList' => array(
           'rule' => array('inList')
       ),
      ),*/
      'BirthDate' => array(
          'Invalid date format' => array(
              'rule' => array('datetime'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'BirthPlace' => array(
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
  
  public $hasManyAndBelongsTo = array(
    'Student' => array(
        'className' => 'Student',
        'joinTable' => 'students',
        'foreignKey' => 'PersonID',
        'associationForeignKey' => 'PersonID',
        'unique' => true
    ),
    'Staff' => array(
        'className' => 'Staff',
        'joinTable' => 'staffs',
        'foreignKey' => 'PersonID',
        'associationForeignKey' => 'PersonID',
        'unique' => true
    )
  );

  //The Associations below have been created with all possible keys, those that are not needed can be removed
  public $belongsTo = array(
      'City' => array(
          'className' => 'City',
          'foreignKey' => 'BirthPlace',
          'conditions' => '',
          'fields' => 'CityID',
          'order' => ''
      )
  );
}
