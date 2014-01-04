<?php
App::uses('UserPermission', 'Model');

/**
 * UserPermission Test Case
 *
 */
class UserPermissionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_permission'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserPermission = ClassRegistry::init('UserPermission');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserPermission);

		parent::tearDown();
	}

}
