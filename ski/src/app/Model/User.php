<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

  public $name = 'User';
  public $useTable='users';
  public $primaryKey = 'UserID';
  public $displayField = 'name';
  
  public $_schema = array(
      'UserID' => array(
          'type' => 'int',
          'length' => 15
      ),
      'name' => array(
          'type' => 'string',
          'length' => 50
      ),
      'desc' => array(
          'type' => 'string',
          'length' => 256
      ),
      'super' => array(
          'type' => 'int',
          'length' => 1
      )
  );

  public $validate = array(
      'UserID' => array(
          'numeric' => array(
              'rule' => array('naturalNumber'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'name' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'pass' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'super' => array(
          'numeric' => array(
              'rule' => array('naturalNumber'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
  );
  
  public function beforeSave($options = array()) {
    if (!$this->UserID) {
      $passwordHasher = new SimplePasswordHasher();
      $this->data['User']['pass'] = $passwordHasher->hash(
          $this->data['User']['pass']
      );
    }
    return true;
  }
  
}
