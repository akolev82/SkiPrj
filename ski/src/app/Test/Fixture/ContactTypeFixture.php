<?php
/**
 * ContactTypeFixture
 *
 */
class ContactTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ContactTypeID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'caption' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ContactTypeID', 'unique' => 1),
			'UQ1_CONTACT_TYPES' => array('column' => 'caption', 'unique' => 1)
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
			'ContactTypeID' => 1,
			'caption' => 'Lorem ipsum dolor sit amet'
		),
	);

}
