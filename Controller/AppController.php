<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');
App::uses('CrudControllerTrait', 'Crud.Lib');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	use CrudControllerTrait;

	public $uses = [
		'User'
	];

	public $components = [
		'RequestHandler',
		'Crud.Crud' => [
			'actions' => [
				'index' =>['validateId' => false],
				'view' =>['validateId' => false],
				'add' =>['validateId' => false],
				'edit' =>['validateId' => false],
				'delete' =>['validateId' => false],

				'admin_index' =>['validateId' => false],
				'admin_view' =>['validateId' => false],
				'admin_add' =>['validateId' => false],
				'admin_edit' =>['validateId' => false],
				'admin_delete' =>['validateId' => false]
			],
			//,
			'listeners' => ['Api'],
			'validateId' => false
		],
		'Cookie',
		'Session',
		'Auth' => [
			'authenticate' => [
                'Authenticate.Cookie' => [
                    'fields' => [
                        'username' => 'login',
                        'password' => 'password'
                    ],
                    'columns' => ['email', 'username'],
                    'userModel' => 'User'
                ],
                'Authenticate.MultiColumn' => [
                    'fields' => [
                        'username' => 'login',
                        'password' => 'password'
                    ],
                    'columns' => ['email', 'username'],
                    'userModel' => 'User'
                ],
                'Authenticate.Token' => [
                    'parameter' => '_token',
                    'header' => 'X-MyApiTokenHeader',
                    'userModel' => 'User',
                    'fields' => [
                        'username' => 'login',
                        'password' => 'password',
                        'token' => 'public_key',
                    ],
                    'columns' => ['email', 'ssn'],
                    'continue' => true
                ]
			],
			'sessionKey' => false,
			'loginRedirect' => [
				'controller' => 'bookings', 
				'action' => 'index',
				'admin' => true
			],
			'loginAction' => [
				'controller' => 'bookings',
				'action' => 'index',
				'admin' => true
			],
			'logoutRedirect' => [
				'controller' => 'users',
				'action' => 'login',
				'admin' => true
			],
			'unauthorizedRedirect' => [
				'controller' => 'users',
				'action' => 'login',
				'admin' => true
			]
		]
	];

	public function beforeFilter() {
		if(isset($this->request->data['_json'])) {
			$this->request->data = json_decode($this->request->data['_json'], true);
		}

		$this->header('Access-Control-Allow-Origin: *');
		$this->Cookie->type('rijndael');

		$isAdminRequest = isset($this->request->params['prefix']) && $this->request->params['prefix'] === 'admin';
		if($this->Auth->loggedIn() && $isAdminRequest) {
			$this->layout = "admin_default";
		} else {
			$this->Auth->allow();
		}

		parent::beforeFilter();
	}

}
