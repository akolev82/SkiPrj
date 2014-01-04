<?php
/**
 * PersonAddressFixture
 *
 */
class PersonAddressFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'PersonAddressID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'PersonID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'AddressID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'PersonAddressID', 'unique' => 1),
			'FK1_PERSON_ADDRESSES' => array('column' => 'PersonID', 'unique' => 0),
			'FK2_PERSON_ADDRESSES' => array('column' => 'AddressID', 'unique' => 0)
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
			'PersonAddressID' => 1,
			'PersonID' => 1,
			'AddressID' => 1
		),
	);

}
