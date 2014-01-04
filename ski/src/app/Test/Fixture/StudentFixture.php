<?php
/**
 * StudentFixture
 *
 */
class StudentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'StudentID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'SchoolID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'PersonID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'unique'),
		'Grade' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1),
		'indexes' => array(
			'PRIMARY' => array('column' => 'StudentID', 'unique' => 1),
			'UQ1_STUDENTS' => array('column' => 'PersonID', 'unique' => 1),
			'FK1_STUDENTS' => array('column' => 'SchoolID', 'unique' => 0)
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
			'StudentID' => 1,
			'SchoolID' => 1,
			'PersonID' => 1,
			'Grade' => 1
		),
	);

}
