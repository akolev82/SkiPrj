<?php
/**
 * LeagueFixture
 *
 */
class LeagueFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'LeagueID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'LeagueName' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'PersonContactID' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 15, 'key' => 'index'),
		'ThemeID' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 15, 'key' => 'index'),
		'subdomain' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'LeagueID', 'unique' => 1),
			'FK1_LEAGUES' => array('column' => 'PersonContactID', 'unique' => 0),
			'FK2_LEAGUES' => array('column' => 'ThemeID', 'unique' => 0)
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
			'LeagueName' => 'Lorem ipsum dolor sit amet',
			'PersonContactID' => 1,
			'ThemeID' => 1,
			'subdomain' => 'Lorem ipsum dolor sit amet'
		),
	);

}
