<?php
App::uses('BookingType', 'Model');

/**
 * BookingType Test Case
 *
 */
class BookingTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.booking_type',
		'app.booking',
		'app.open_time'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BookingType = ClassRegistry::init('BookingType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BookingType);

		parent::tearDown();
	}

}
