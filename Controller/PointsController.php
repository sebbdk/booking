<?php
App::uses('AppController', 'Controller');
/**
 * Points Controller
 *
 * @property Point $Point
 * @property PaginatorComponent $Paginator
 */
class PointsController extends AppController {

	public $paginate = [
		'limit' => 500,
		'order' => 'created desc',
		'group' => 'Point.slug',
		'fields' => [
			'Point.slug',
			'Point.count'
		]
	];


	public function get_range($property_slug = null, $slug = null) {
		//$conditions = ['MONTH(created) = MONTH(NOW())'];
		$conditions = ['created >= DATE_SUB(NOW(), INTERVAL 1 MONTH)'];

		if($property_slug != null) {
			$conditions['property_slug'] = $property_slug;
		}

		if($slug != null) {
			$conditions['slug'] = $slug;
		}
 
		$data = $this->Point->find('all', [
			'recursive' => -1,
			'fields' => ['created', 'created_day', 'count', 'unique_count'],
			'group' => ['created_day'],
			'conditions' => $conditions
		]);

		$success = !empty($data);

		/*$data = $this->Point->find('all', [
			'recursive' => -1,
			'fields' => ['id', 'DAY(created)', 'MONTH(created)', 'count(*)', 'MONTH(NOW())'],
			'group' => ['DAY(created)'],
			'conditions' => [
				"created >= DATE_FORMAT(NOW(),'%Y-%m-01') - INTERVAL 1 MONTH",
				"created < DATE_FORMAT(NOW(),'%Y-%m-01')"
			]
		]);*/

		$this->set(compact('success', 'data'));
		$this->set('_serialize', ['success', 'data']);
	}

	public function update_properties() {
		$points = $this->Point->find('all', [
			'group' => 'property_slug',
			'conditions' => [

			]
		]);

		foreach($points as $point) {
			$prop = $this->Point->Property->read(null, $point['Point']['slug']);
			if(empty($prop)) {
				$suc = $this->Point->Property->save([
					'id' => $point['Point']['property_slug'],
					'slug' => $point['Point']['property_slug']
				]);
			}
			
		}
		die();
	}

}