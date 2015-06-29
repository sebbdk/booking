<?php
/**
 * @Author: sebb
 * @Date:   2015-06-22 17:10:56
 * @Last Modified by:   sebb
 * @Last Modified time: 2015-06-29 16:32:44
 */
App::uses('AppController', 'Controller');

class BookingsController extends AppController {
	
	public $paginate = [
		'order' => 'date_time asc',
		'limit' => 1000,
		'maxLimit' => 1000
	];

	public function beforeFilter() {
		parent::beforeFilter();

		$this->Crud->on('afterSave', function(CakeEvent $event) {
		    if ($event->subject->created && $event->subject->controller->request->prefix != "admin") {
		    	$event->subject->controller->redirect(['action' => 'thanks']);
		    }
		});
	}

	public function index($type) {
		$this->set("bookingType", $type);
		$this->Crud->execute("index");
	}

	public function add($date, $type) {
		$this->set("date", $date);
		$this->set("bookingType", $type);
		$this->Crud->execute("add");
	}

	public function admin_edit($id) {

		$booking = $this->Booking->read(null, $id);

		$date = strtotime($booking["Booking"]["date_time"]);
		$this->set("date", $date);
		
		$this->Crud->execute("edit");
	}

	public function admin_add($date, $type) {
		$this->add($date, $type);
	}

	public function thanks() {}

}