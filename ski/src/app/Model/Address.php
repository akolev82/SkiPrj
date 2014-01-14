<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
*/
class Address extends AppModel {
  
  public $name = 'Address';
  public $useTable='addresses';
  public $primaryKey = 'AddressID';
  public $displayField = 'AddressName';

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'AddressID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              'required' => true,
              //'last' => false, // Stop validation after this rule
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'AddressName' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'CountryID' => array(
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
  
  /**
   * belongsTo associations
   *
   * @var array
   */
  public $belongsTo = array(
      'Country' => array(
          'className' => 'Country',
          'foreignKey' => 'CountryID',
          'conditions' => '',
          'fields' => 'CountryID',
          'order' => ''
      ),
      'State' => array(
          'className' => 'State',
          'foreignKey' => 'StateID',
          'conditions' => '',
          'fields' => 'StateID',
          'order' => ''
      ),
      'City' => array(
          'className' => 'City',
          'foreignKey' => 'CityID',
          'conditions' => '',
          'fields' => 'CityID',
          'order' => ''
      ),
      'Zip' => array(
          'className' => 'Zip',
          'foreignKey' => 'ZipID',
          'conditions' => '',
          'fields' => 'ZipID',
          'order' => ''
      )
  );
}
