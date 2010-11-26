<?php 
	class UsersController extends AppController {
	
		function beforeFilter () {
			parent::beforeFilter();
			$this->layout = 'login';
		}
		
		function admin_login () {
		
		}
		function admin_logout () {
			if($this->Auth->user())
				$this->Auth->logout();
			else 
				$this->redirect(array('controller' => 'users', 'action' => 'login'), null, true);
		}
	}