<?php
/**
 * PersonFixture
 *
 */
class PersonFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'persons';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'PersonID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'UserID' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 15, 'key' => 'unique'),
		'FirstName' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'LastName' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'MiddleName' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'BirthDate' => array('type' => 'date', 'null' => true, 'default' => null),
		'BirthPlace' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 15, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'PersonID', 'unique' => 1),
			'UQ1_PERSONS' => array('column' => 'UserID', 'unique' => 1),
			'FK2_PERSONS' => array('column' => 'BirthPlace', 'unique' => 0)
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
			'PersonID' => 1,
			'UserID' => 1,
			'FirstName' => 'Lorem ipsum dolor sit amet',
			'LastName' => 'Lorem ipsum dolor sit amet',
			'MiddleName' => 'Lorem ipsum dolor sit amet',
			'BirthDate' => '2013-12-29',
			'BirthPlace' => 1
		),
	);

}
