<?php
App::uses('LeagueMember', 'Model');

/**
 * LeagueMember Test Case
 *
 */
class LeagueMemberTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.league_member'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LeagueMember = ClassRegistry::init('LeagueMember');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LeagueMember);

		parent::tearDown();
	}

}
