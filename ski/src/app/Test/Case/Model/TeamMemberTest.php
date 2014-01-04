<?php
App::uses('TeamMember', 'Model');

/**
 * TeamMember Test Case
 *
 */
class TeamMemberTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.team_member'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TeamMember = ClassRegistry::init('TeamMember');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TeamMember);

		parent::tearDown();
	}

}
