<?php
App::uses('AppModel', 'Model');
/**
 * Ref Model
 *
*/
class Ref extends AppModel {

  public $name = 'Ref';
  public $useTable = 'ref';
  public $primaryKey = 'Code';
  public $displayField = 'Desc';

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'Code' => array(
          'Invalid reference code' => array(
              'rule' => array('numeric')
          ),
          'Missing reference code' => array(
              'rule' => array('notEmpty')
          ),
      ),
  );
}
