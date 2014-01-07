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
      'name' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty')
          ),
          'User already exists' => array(
              'rule' => array('isUnique')
          )
      ),
      'pass' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty')
          ),
      )
  );
  
  public function beforeValidate($options = array()) {
    if (!$this->exists()) {
      if (empty($this->data['User']['pass'])) {
        $this->data['User']['pass'] = '123';
      }
    }
    return true;
  }
  
  public function beforeSave($options = array()) {
    if (!$this->UserID) {
      $passwordHasher = new SimplePasswordHasher();
      $this->data['User']['pass'] = $passwordHasher->hash(
         $this->data['User']['pass']
      );
    }
    return true;
  }
  
  public function beforeDelete($cascade = true) {
    if ($this->id == 0 || $this->id == 1) {
      return false;
    }
    return true;
  }
  
}
