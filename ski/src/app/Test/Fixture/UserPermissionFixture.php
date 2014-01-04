<?php
/**
 * UserPermissionFixture
 *
 */
class UserPermissionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'UserPermissionID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'PermissionID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'Action' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'enabled' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1),
		'indexes' => array(
			'PRIMARY' => array('column' => 'UserPermissionID', 'unique' => 1),
			'UQ1_USER_PERMISSIONS' => array('column' => array('PermissionID', 'Action'), 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'UserPermissionID' => 1,
			'PermissionID' => 1,
			'Action' => 'Lorem ipsum dolor sit amet',
			'enabled' => 1
		),
	);

}
