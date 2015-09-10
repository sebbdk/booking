<?php
/**
 * @Author: sebb
 * @Date:   2015-07-01 18:40:11
 * @Last Modified by:   sebb
 * @Last Modified time: 2015-09-10 13:41:49
 */

class OpenTimesController extends AppController {
	
	public $paginate = [
		'order' => 'start desc',
		'limit' => 1000,
		'maxLimit' => 1000
	];

}