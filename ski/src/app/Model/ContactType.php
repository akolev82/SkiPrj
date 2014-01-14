<?php
App::uses('AppModel', 'Model');
/**
 * ContactType Model
 *
*/
class ContactType extends AppModel {
  
  public $name = 'ContactType';
  public $useTable='contact_types';
  public $primaryKey = 'ContactTypeID';
  public $displayField = 'caption';

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'ContactTypeID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              'required' => true,
              //'last' => false, // Stop validation after this rule
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'caption' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
  );
}
