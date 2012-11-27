<?php
App::uses('Postcode', 'Model');

/**
 * Postcode Test Case
 *
 */
class PostcodeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.postcode'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Postcode = ClassRegistry::init('Postcode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Postcode);

		parent::tearDown();
	}

}
