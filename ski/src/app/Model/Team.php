<?php
App::uses('AppModel', 'Model');
/**
 * Team Model
 *
*/
class Team extends AppModel {

  public $name = 'Team';
  public $useTable='teams';
  public $primaryKey = 'TeamID';
  public $displayField = 'TeamName';
  
  public $virtualFields = array(
  		'CoachFullName' => 'TRIM(SQUEEZE(CONCAT(Coach.FirstName, " ", Coach.MiddleName, " ", Coach.LastName)))',
  		'TeamTypeName' => 'TeamType.TeamTypeName'
  );

  public $validate = array(
      'TeamID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              'required' => true,
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          )
      ),
      'TeamTypeID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
          )
      ),
      'TeamName' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty')
          )
      ),
      'CoachID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              'required' => true,
              'on' => 'create', // Limit validation to 'create' or 'update' operations
          )
      )
  );

  //The Associations below have been created with all possible keys, those that are not needed can be removed
  public $belongsTo = array(
      'Coach' => array(
          'className' => 'Coach',
          'foreignKey' => 'CoachID',
          'conditions' => '',
          'fields' => 'CoachID',
          'order' => ''
      ),
      'TeamType' => array(
          'className' => 'TeamType',
          'foreignKey' => 'TeamTypeID',
          'conditions' => '',
          'fields' => 'TeamTypeID',
          'order' => ''
      )
  );
}
