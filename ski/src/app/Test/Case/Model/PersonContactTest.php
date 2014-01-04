<?php
App::uses('PersonContact', 'Model');

/**
 * PersonContact Test Case
 *
 */
class PersonContactTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.person_contact'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PersonContact = ClassRegistry::init('PersonContact');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PersonContact);

		parent::tearDown();
	}

}
