<?php
App::uses('ContactType', 'Model');

/**
 * ContactType Test Case
 *
 */
class ContactTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contact_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContactType = ClassRegistry::init('ContactType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContactType);

		parent::tearDown();
	}

}
