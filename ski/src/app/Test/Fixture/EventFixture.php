<?php
/**
 * EventFixture
 *
 */
class EventFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'EventID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'SeasonID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'EventName' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'DateBegin' => array('type' => 'date', 'null' => false, 'default' => null),
		'DateEnd' => array('type' => 'date', 'null' => false, 'default' => null),
		'AddressID' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 15, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'EventID', 'unique' => 1),
			'FK1_EVENTS' => array('column' => 'SeasonID', 'unique' => 0),
			'FK2_EVENTS' => array('column' => 'AddressID', 'unique' => 0)
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
			'EventID' => 1,
			'SeasonID' => 1,
			'EventName' => 'Lorem ipsum dolor sit amet',
			'DateBegin' => '2013-12-28',
			'DateEnd' => '2013-12-28',
			'AddressID' => 1
		),
	);

}
