<?php 
	class UsersController extends AppController {
	
		function beforeFilter () {
			parent::beforeFilter();
			
			$this->Security->requireAuth();
		}
		
		function admin_login () {
			if ($this->Auth->user()) {
						    	
				$this->redirect(array('controller' => 'profiles', 'admin' => true), null, true);
			}
		}
		function admin_logout () {
			if($this->Auth->user()){
				$this->Session->setFlash('You have been logged out', 'default', array(), 'auth');
				$this->Auth->logout();
			}
				$this->redirect(array('controller' => 'users', 'action' => 'login'), null, true);
		}
	}