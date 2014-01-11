<?php
App::uses('AppModel', 'Model');

class State extends AppModel {

  public $useTable='states';
  public $primaryKey = 'StateID';
  public $displayField = 'StateName';

  public $validate = array(
      'StateID' => array(
          'numeric' => array(
              'rule' => array('naturalNumber'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              'required' => true,
              //'last' => false, // Stop validation after this rule
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'CountryID' => array(
          'numeric' => array(
              'rule' => array('naturalNumber'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'StateCode' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      )
  );
  
  public $belongsTo = array(
      'Country' => array(
          'className' => 'Country',
          'foreignKey' => 'CountryID',
          'conditions' => '',
          'fields' => 'CountryID',
          'order' => ''
      )
  );
}
