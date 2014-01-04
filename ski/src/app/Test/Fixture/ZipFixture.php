<?php
/**
 * ZipFixture
 *
 */
class ZipFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ZipID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'CountryID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'CityID' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 15, 'key' => 'index'),
		'StateID' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 15, 'key' => 'index'),
		'ZipCode' => array('type' => 'string', 'null' => false, 'length' => 5, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'latitude' => array('type' => 'string', 'null' => false, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'longitude' => array('type' => 'string', 'null' => false, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ZipID', 'unique' => 1),
			'UQ1_ZIPS' => array('column' => array('CountryID', 'StateID', 'CityID', 'ZipCode'), 'unique' => 1),
			'FK2_ZIPS' => array('column' => 'StateID', 'unique' => 0),
			'FK3_ZIPS' => array('column' => 'CityID', 'unique' => 0)
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
			'ZipID' => 1,
			'CountryID' => 1,
			'CityID' => 1,
			'StateID' => 1,
			'ZipCode' => 'Lor',
			'latitude' => 'Lorem ip',
			'longitude' => 'Lorem ip'
		),
	);

}
