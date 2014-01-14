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

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'TeamID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              'required' => true,
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'TeamTypeID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
          ),
      ),
      'TeamName' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty')
          ),
      ),
      'CoachID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              'required' => true,
              'on' => 'create', // Limit validation to 'create' or 'update' operations
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
      'Coach' => array(
          'className' => 'Person',
          'foreignKey' => 'CoachID',
          'conditions' => '',
          'fields' => 'PersonID',
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
