<?php 

	class InstallController extends InstallAppController {
		
		var $name = 'Install';
		
		
		function index () {
			$this->redirect(array('action' => 'install'));
		}
		
		function run () {}
		
		
		function install () {
			
			if ($this->RequestHandler->isAjax())
				$this->layout = 'ajax';
			
			if (!empty($this->data)) {
				
				$server = $this->data['Install']['server'];
				$login = $this->data['Install']['login'];
				$password = $this->data['Install']['password'];
				
				$database = $this->data['Install']['database'];
				$prefix = $this->data['Install']['prefix'];
				
				//This is the admin user, not the mysql user
				$user = $this->data['Install']['user'];
				$pass = $this->data['Install']['pass'];
				
				if (@mysql_connect($server, $login, $password)) {
					if(@mysql_select_db($database)) {
						$this->render('run');
					}
					else {
						$this->set('two', 'Could not select the database');
					}
				}
				else {
					$this->set('one', 'Could not connect to MySQL');
				}
			}
				
		}
		function _install () {
			
		}
	}