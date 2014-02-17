<?php
App::uses('AppModel', 'Model');

class TeamMember extends AppModel {

  public $name = 'TeamMember';
  public $useTable='team_members';
  public $primaryKey = 'TeamMemberID';
  public $displayField = '';
  
  public $virtualFields = array(
  		'StudentFullName' => 'TRIM(SQUEEZE(CONCAT(Student.FirstName, " ", Student.MiddleName, " ", Student.LastName)))',
  		'TeamName' => 'Team.TeamName'
  );

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
              'message' => 'Required team.',
          		'required' => true
          ),
      ),
      'StudentID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              'message' => 'Required student',
          		'required' => true
          )
      ),
  );
  
  //The Associations below have been created with all possible keys, those that are not needed can be removed
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
