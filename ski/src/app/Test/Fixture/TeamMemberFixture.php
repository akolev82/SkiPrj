<?php
/**
 * TeamMemberFixture
 *
 */
class TeamMemberFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'TeamMemberID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'TeamID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'StudentID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'TeamMemberID', 'unique' => 1),
			'UQ1_TEAM_MEMBERS' => array('column' => array('TeamID', 'StudentID'), 'unique' => 1),
			'FK2_TEAM_MEMBERS' => array('column' => 'StudentID', 'unique' => 0)
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
			'TeamMemberID' => 1,
			'TeamID' => 1,
			'StudentID' => 1
		),
	);

}
