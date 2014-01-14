<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
*/
class Event extends AppModel {

  public $name = 'Event';
  public $useTable='events';
  public $primaryKey = 'EventID';
  public $displayField = 'EventName';

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'EventID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              'required' => true,
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'SeasonID' => array(
          'numeric' => array(
              'rule' => array('numeric')
          ),
      ),
      'DateBegin' => array(
          'date' => array(
              'rule' => array('date')
          ),
      ),
      'DateEnd' => array(
          'date' => array(
              'rule' => array('date')
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
      'Address' => array(
          'className' => 'Address',
          'foreignKey' => 'AddressID',
          'conditions' => '',
          'fields' => 'AddressID',
          'order' => ''
      ),
      'Season' => array(
          'className' => 'Season',
          'foreignKey' => 'SeasonID',
          'conditions' => '',
          'fields' => 'SeasonID',
          'order' => ''
      )
  );
}
