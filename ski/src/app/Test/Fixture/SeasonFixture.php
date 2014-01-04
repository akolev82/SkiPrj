<?php
/**
 * SeasonFixture
 *
 */
class SeasonFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'SeasonID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'SeasonName' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'DateBegin' => array('type' => 'date', 'null' => false, 'default' => null),
		'DateEnd' => array('type' => 'date', 'null' => false, 'default' => null),
		'NumberOfRuns' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 15),
		'SeedOrderClass' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'SeasonID', 'unique' => 1)
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
			'SeasonID' => 1,
			'SeasonName' => 'Lorem ipsum dolor sit amet',
			'DateBegin' => '2013-12-28',
			'DateEnd' => '2013-12-28',
			'NumberOfRuns' => 1,
			'SeedOrderClass' => 'Lorem ipsum dolor sit amet'
		),
	);

}
