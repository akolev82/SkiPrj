<?php
/**
 * UserRoleFixture
 *
 */
class UserRoleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'UserID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'RoleID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('UserID', 'RoleID'), 'unique' => 1),
			'FK2_USER_ROLES' => array('column' => 'RoleID', 'unique' => 0)
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
			'UserID' => 1,
			'RoleID' => 1
		),
	);

}
