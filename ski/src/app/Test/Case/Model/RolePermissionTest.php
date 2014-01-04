<?php
App::uses('RolePermission', 'Model');

/**
 * RolePermission Test Case
 *
 */
class RolePermissionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.role_permission'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RolePermission = ClassRegistry::init('RolePermission');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RolePermission);

		parent::tearDown();
	}

}
