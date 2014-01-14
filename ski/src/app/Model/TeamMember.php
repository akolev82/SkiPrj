<?php
App::uses('AppModel', 'Model');
/**
 * TeamMember Model
 *
*/
class TeamMember extends AppModel {

  public $name = 'TeamMember';
  public $useTable='team_members';
  public $primaryKey = 'TeamMemberID';
  public $displayField = '';

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'TeamMemberID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              'required' => true,
              //'last' => false, // Stop validation after this rule
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'TeamID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'StudentID' => array(
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
      'Team' => array(
          'className' => 'Team',
          'foreignKey' => 'TeamID',
          'conditions' => '',
          'fields' => 'TeamID',
          'order' => ''
      ),
      'Student' => array(
          'className' => 'Student',
          'foreignKey' => 'StudentID',
          'conditions' => '',
          'fields' => 'StudentID',
          'order' => ''
      )
  );
}
