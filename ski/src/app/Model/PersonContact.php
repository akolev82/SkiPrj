<?php
App::uses('AppModel', 'Model');
/**
 * PersonContact Model
 *
*/
class PersonContact extends AppModel {

  public $name = 'PersonContact';
  public $useTable='person_contacts';
  public $primaryKey = 'PersonContactID';
  public $displayField = 'Value';

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'PersonContactID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              'required' => true,
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'PersonID' => array(
          'Invalid person value' => array(
              'rule' => array('numeric'),
              'required' => true
          ),
          'Required person' => array(
              'rule' => array('notEmpty')
          ),
      ),
      'ContactTypeID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              'required' => true
          ),
          'Required contact type' => array(
              'rule' => array('notEmpty')
          ),
      ),
      'Value' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty')
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
      'Person' => array(
          'className' => 'Person',
          'foreignKey' => 'PersonID',
          'conditions' => '',
          'fields' => 'PersonID',
          'order' => ''
      ),
      'ContactType' => array(
          'className' => 'ContactType',
          'foreignKey' => 'ContactTypeID',
          'conditions' => '',
          'fields' => 'ContactTypeID',
          'order' => ''
      )
  );
}
