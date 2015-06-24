<?php
/**
 * @Author: sebb
 * @Date:   2015-06-22 17:10:56
 * @Last Modified by:   sebb
 * @Last Modified time: 2015-06-24 16:14:12
 */
App::uses('AppController', 'Controller');

class BookingsController extends AppController {
	
	public $paginate = [
		'order' => 'date_time asc'
	];

	public function beforeFilter() {
		parent::beforeFilter();

		$this->Crud->on('afterSave', function(CakeEvent $event) {
		    if ($event->subject->created && $event->subject->controller->request->prefix != "admin") {
		    	$event->subject->controller->redirect(['action' => 'thanks']);
		    }
		});
	}

	public function add($date) {
		$this->set("date", $date);
		$this->Crud->execute("add");
	}

	public function admin_add($date) {
		$this->add($date);
	}

	public function thanks() {}

}