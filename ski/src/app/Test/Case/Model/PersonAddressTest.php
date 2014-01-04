<?php
App::uses('PersonAddress', 'Model');

/**
 * PersonAddress Test Case
 *
 */
class PersonAddressTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.person_address'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PersonAddress = ClassRegistry::init('PersonAddress');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PersonAddress);

		parent::tearDown();
	}

}
