<?php
/**
 * TeamFixture
 *
 */
class TeamFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'TeamID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'TeamTypeID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'TeamName' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'CoachID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'TeamID', 'unique' => 1),
			'FK1_TEAMS' => array('column' => 'CoachID', 'unique' => 0),
			'FK2_TEAMS' => array('column' => 'TeamTypeID', 'unique' => 0)
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
			'TeamID' => 1,
			'TeamTypeID' => 1,
			'TeamName' => 'Lorem ipsum dolor sit amet',
			'CoachID' => 1
		),
	);

}
