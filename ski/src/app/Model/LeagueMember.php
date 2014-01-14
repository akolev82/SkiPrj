<?php
App::uses('AppModel', 'Model');
/**
 * LeagueMember Model
 *
*/
class LeagueMember extends AppModel {

  public $name = 'Event';
  public $useTable='league_members';
  public $primaryKey = 'LeagueMemberID';
  public $displayField = '';

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'LeagueID' => array(
          'Invalid league ID' => array(
              'rule' => array('numeric')
          ),
          'Missing league' => array(
              'rule' => array('notEmpty')
          ),
      ),
      'TeamID' => array(
          'Invalid team ID' => array(
              'rule' => array('numeric')
          ),
          'Missing team' => array(
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
      'League' => array(
          'className' => 'League',
          'foreignKey' => 'LeagueID',
          'conditions' => '',
          'fields' => 'LeagueID',
          'order' => ''
      ),
      'Team' => array(
          'className' => 'Team',
          'foreignKey' => 'TeamID',
          'conditions' => '',
          'fields' => 'TeamID',
          'order' => ''
      )
  );
}
