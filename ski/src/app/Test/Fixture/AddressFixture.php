<?php
/**
 * AddressFixture
 *
 */
class AddressFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'AddressID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'AddressName' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'StreetAddress' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ZipID' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 15, 'key' => 'index'),
		'CityID' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 15, 'key' => 'index'),
		'StateID' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 15, 'key' => 'index'),
		'CountryID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'AddressID', 'unique' => 1),
			'FK1_ADRESSES' => array('column' => 'CountryID', 'unique' => 0),
			'FK2_ADRESSES' => array('column' => 'StateID', 'unique' => 0),
			'FK3_ADRESSES' => array('column' => 'CityID', 'unique' => 0),
			'FK4_ADRESSES' => array('column' => 'ZipID', 'unique' => 0)
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
			'AddressID' => 1,
			'AddressName' => 'Lorem ipsum dolor sit amet',
			'StreetAddress' => 'Lorem ipsum dolor sit amet',
			'ZipID' => 1,
			'CityID' => 1,
			'StateID' => 1,
			'CountryID' => 1
		),
	);

}
