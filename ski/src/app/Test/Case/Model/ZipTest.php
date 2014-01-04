<?php
App::uses('Zip', 'Model');

/**
 * Zip Test Case
 *
 */
class ZipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.zip'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Zip = ClassRegistry::init('Zip');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Zip);

		parent::tearDown();
	}

}
