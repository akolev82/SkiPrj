<?php
App::uses('AppModel', 'Model');

class City extends AppModel {

  public $useTable='cities';
  public $primaryKey = 'CityID';
  public $displayField = 'CityName';

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'CityID' => array(
          'RuleCity1' => array(
              'rule' => array('naturalNumber'),
              'message' => 'Enter your city number',
              'allowEmpty' => false,
              'required' => true,
              //'last' => false, // Stop validation after this rule
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          )
      ),
      'CountryID' => array(
          'RuleCity2' => array(
              'rule' => array('naturalNumber'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
          )
      ),
      'StateID' => array(
          'RuleCity3' => array(
              'rule' => array('naturalNumber'),
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
      'State' => array(
          'className' => 'State',
          'foreignKey' => 'StateID',
          'conditions' => '',
          'fields' => 'StateID',
          'order' => ''
      ),
      'Country' => array(
          'className' => 'Country',
          'foreignKey' => 'CountryID',
          'conditions' => '',
          'fields' => 'CountryID',
          'order' => ''
      )
  );
}
