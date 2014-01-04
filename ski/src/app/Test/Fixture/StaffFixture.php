<?php
/**
 * StaffFixture
 *
 */
class StaffFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'StaffID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'SchoolID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'PersonID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'role' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'StaffID', 'unique' => 1),
			'UQ1_STAFFS' => array('column' => array('SchoolID', 'PersonID'), 'unique' => 1),
			'FK2_STAFFS' => array('column' => 'PersonID', 'unique' => 0)
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
			'StaffID' => 1,
			'SchoolID' => 1,
			'PersonID' => 1,
			'role' => 'Lorem ipsum dolor sit amet'
		),
	);

}
