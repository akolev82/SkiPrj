<?php
/**
 * CityFixture
 *
 */
class CityFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'CityID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'CountryID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'StateID' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 15, 'key' => 'index'),
		'CityName' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'CityID', 'unique' => 1),
			'UQ1_CITIES' => array('column' => array('CountryID', 'StateID', 'CityName'), 'unique' => 1),
			'FK2_CITIES' => array('column' => 'StateID', 'unique' => 0)
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
			'CityID' => 1,
			'CountryID' => 1,
			'StateID' => 1,
			'CityName' => 'Lorem ipsum dolor sit amet'
		),
	);

}
