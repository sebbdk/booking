<?php
App::uses('AppController', 'Controller');
/**
 * Properties Controller
 *
 * @property Property $Property
 * @property PaginatorComponent $Paginator
 */
class PropertiesController extends AppController {


	public function view($id) {
		$slugs = $this->Property->Point->find('all', [
			'group' => 'Point.slug',
			'conditions' => [
				'property_slug' => $id
			]
 		]);

 		$this->set('slugs', $slugs);
		$this->Crud->execute('view');
	}

}
