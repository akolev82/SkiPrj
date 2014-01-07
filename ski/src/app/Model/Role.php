<?php
App::uses('AppModel', 'Model');
/**
 * RolePermission Model
 *
*/
class Role extends AppModel {
  public $name = 'Role';
  public $useTable='roles';
  public $primaryKey = 'RoleID';
  public $displayField = 'RoleName';

  public $validate = array(
      'RoleName' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty')
          ),
          'Roles already exists' => array(
              'rule' => array('isUnique')
          )
      )
  );
} ?>