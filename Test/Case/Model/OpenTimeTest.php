<?php
App::uses('OpenTime', 'Model');

/**
 * OpenTime Test Case
 *
 */
class OpenTimeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.open_time',
		'app.booking_type',
		'app.booking'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OpenTime = ClassRegistry::init('OpenTime');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OpenTime);

		parent::tearDown();
	}

}
