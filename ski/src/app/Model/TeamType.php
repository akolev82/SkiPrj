<?php
App::uses('AppModel', 'Model');
/**
 * TeamType Model
 *
*/
class TeamType extends AppModel {

  public $name = 'TeamType';
  public $useTable='team_types';
  public $primaryKey = 'TeamTypeID';
  public $displayField = 'TeamTypeName';

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'TeamTypeID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              'required' => true,
              //'last' => false, // Stop validation after this rule
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'TeamTypeName' => array(
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
