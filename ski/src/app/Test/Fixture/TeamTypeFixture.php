<?php
/**
 * TeamTypeFixture
 *
 */
class TeamTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'TeamTypeID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'TeamTypeName' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'TeamTypeID', 'unique' => 1),
			'UQ1_TEAM_TYPES' => array('column' => 'TeamTypeName', 'unique' => 1)
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
			'TeamTypeID' => 1,
			'TeamTypeName' => 'Lorem ipsum dolor sit amet'
		),
	);

}
