<?php
/**
 * LeagueMemberFixture
 *
 */
class LeagueMemberFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'LeagueID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'TeamID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'LeagueID', 'unique' => 1),
			'FK2_LEAGUE_MEMBERS' => array('column' => 'TeamID', 'unique' => 0)
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
			'LeagueID' => 1,
			'TeamID' => 1
		),
	);

}
