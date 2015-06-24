<?php
/* 
* @Author: sebb
* @Date:   2014-11-17 17:39:59
* @Last Modified by:   sebb
* @Last Modified time: 2014-12-18 02:46:36
*/
App::uses('Controller', 'AppController');

class UsersController extends AppController {

	public function admin_login() {
		$this->layout = "admin_login";

		if($this->Auth->login()) {
			$success = true;
			$this->redirect($this->Auth->redirect());
		} else {
			$data = ['message' => 'could not log user in using given credentials.'];
			$success = false;
		}
	}

	public function admin_logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function password_reset($token) {
		$this->layout = "admin_login";

		if($this->request->is(['post', 'put']) && $this->data['User']['new_password']) {
			$success = $this->User->save([
				'id' => $this->data['User']['id'],
				'password' => $this->data['User']['new_password'],
				'password_reset_token' => String::uuid()
			], array('validate' => false));

			$this->Session->setFlash('You can now log in using your new password.', 'flash');
			$this->redirect(['action' => 'login']);
		} else {
			$user = $this->User->find('first', [
				'conditions' => [
					'password_reset_token' => $token
				]
			]);

			if(!$user) {
				$this->Session->setFlash('This reset link has expired, please request a new password reset.', 'flash');
				$this->redirect(['action' => 'password_recover']);
				return;
			}

			$this->data = [
				'User' => [
					'id' => $user['User']['id']
				]
			];

			$this->set(compact('user', 'token'));
		}
	}

	public function password_recover() {
		$this->layout = "admin_login";

		if($this->request->is(['post', 'put'])) {
			$user = $this->User->find('first', [
				'conditions' => [
					'email' => $this->data["User"]["email"]
				]
			]);

			if($user) {
				$this->User->sendPasswordReset($user["User"]["id"]);
				$this->Session->setFlash('A password reset email has been sent', 'flash');
				$this->data = [];
			} else {
				$this->Session->setFlash('No account found on that e-mail', 'flash');
			}
		}
	}
}
