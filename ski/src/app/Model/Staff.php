<?php
App::uses('AppModel', 'Model');
/**
 * Staff Model
 *
*/
class Staff extends AppModel {
  
  public $name = 'Staff';
  public $useTable = 'staffs';
  public $primaryKey = 'StaffID';
  public $displayField = '';

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'StaffID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              'required' => true,
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'SchoolID' => array(
          'Invalid school' => array(
              'rule' => array('numeric')
          ),
          'Missing school' => array(
              'rule' => array('notEmpty')
          ),
      ),
      'PersonID' => array(
          'Invalid person ID' => array(
              'rule' => array('numeric'),
          ),
          'Missing person' => array(
              'rule' => array('notEmpty')
          ),
      ),
  );

  /**
   * belongsTo associations
   *
   * @var array
  */
  public $belongsTo = array(
      'School' => array(
          'className' => 'School',
          'foreignKey' => 'SchoolID',
          'conditions' => '',
          'fields' => 'SchoolID',
          'order' => ''
      ),
      'Person' => array(
          'className' => 'Person',
          'foreignKey' => 'PersonID',
          'conditions' => '',
          'fields' => 'PersonID',
          'order' => ''
      )
  );
}
