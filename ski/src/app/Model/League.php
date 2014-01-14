<?php
App::uses('AppModel', 'Model');
/**
 * League Model
 *
*/
class League extends AppModel {
  
  public $name = 'League';
  public $useTable='leagues';
  public $primaryKey = 'LeagueID';
  public $displayField = 'LeagueName';

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'LeagueID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              'required' => true,
              //'last' => false, // Stop validation after this rule
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'LeagueName' => array(
          'Required league name' => array(
              'rule' => array('notEmpty')
          ),
      ),
  );
}
