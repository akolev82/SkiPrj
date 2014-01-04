<?php
App::uses('Ref', 'Model');

/**
 * Ref Test Case
 *
 */
class RefTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ref'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ref = ClassRegistry::init('Ref');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ref);

		parent::tearDown();
	}

}
