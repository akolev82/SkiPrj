<?php
App::uses('League', 'Model');

/**
 * League Test Case
 *
 */
class LeagueTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.league'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->League = ClassRegistry::init('League');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->League);

		parent::tearDown();
	}

}
