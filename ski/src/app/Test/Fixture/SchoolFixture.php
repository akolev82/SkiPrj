<?php
/**
 * SchoolFixture
 *
 */
class SchoolFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'SchoolID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'SchoolName' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'PrimaryAddressID' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 15, 'key' => 'index'),
		'Active' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1),
		'SchoolLogo' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'PrincipalID' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 15, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'SchoolID', 'unique' => 1),
			'FK1_SCHOOLS' => array('column' => 'PrimaryAddressID', 'unique' => 0),
			'FK2_SCHOOLS' => array('column' => 'PrincipalID', 'unique' => 0)
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
			'SchoolID' => 1,
			'SchoolName' => 'Lorem ipsum dolor sit amet',
			'PrimaryAddressID' => 1,
			'Active' => 1,
			'SchoolLogo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'PrincipalID' => 1
		),
	);

}
