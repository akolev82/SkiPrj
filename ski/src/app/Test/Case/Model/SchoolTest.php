<?php
App::uses('School', 'Model');

/**
 * School Test Case
 *
 */
class SchoolTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.school'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->School = ClassRegistry::init('School');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->School);

		parent::tearDown();
	}

}
