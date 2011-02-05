<?php 

//TODO: Clean this up! This code is absoulutely outrageous.

	class InstallController extends InstallAppController {
		
		var $name = 'Install';
		
		var $components = null;
		
		var $uses = null;
		
		function beforeFilter () {
			parent::beforeFilter();
			
			if(file_exists(CONFIGS.'settings.php') && !file_exists(TMP.'install.tmp')){
				$this->cakeError('error403');
			}
			
			App::import('Component', 'RequestHandler');
			$this->RequestHandler = new RequestHandlerComponent();
			
			App::import('Component', 'Session');
			$this->Session = new SessionComponent();
			
			$this->layout = 'install';
		}

		
		function _create_tables() {
			
			App::import('Vendor', 'split_sql');
			
			$file = dirname(__FILE__).DS.'..'.DS.'models'.DS.'install.sql';
			$params = array('prefix' => $prefix);
			
			split_sql($file, $params);			
			
		}
		
		function _add_user() {
			
			$data = unserialize(file_get_contents(TMP.'install.tmp'));
			
			$user = $data['user'];
			$pass = $data['pass'];
						
			App::import('Component', 'Auth');
			$this->Auth = new AuthComponent();
			
			$this->loadModel('User');
			
			$user = $this->User->create(array(
				'User' => array(
					'username' => $user,
					'password' => $this->Auth->password($pass)
				)
			));
			
			$this->User->save($user);
			
			unlink(TMP.'install.tmp');
		}
		
		function run () {
			
			if (!$this->RequestHandler->isAjax()) $this->redirect(array('action' =>'index'), null, true);
			
			if (@$this->params['url']['action'] == 'create_tables') {
				$this->_create_tables();
				die();
			}
			if (@$this->params['url']['action'] == 'add_user'){ 
				$this->_add_user();
				die();
			}
		}
		
		
		function index () {
			
			
			if(!file_exists(TMP.'install.tmp')) {
				
				//Start-up stuff
			
				file_put_contents(TMP.'install.tmp', '');
				
				$dirs = array(
				
					TMP,
					TMP.'cache',
					TMP.'logs',
					TMP.'sessions',
					TMP.'tests',
					TMP.'cache'.DS.'models',
					TMP.'cache'.DS.'persistent',
					TMP.'cache'.DS.'views'
				
				);
				
				foreach ($dirs as $dir){
					if(!is_dir($dir)) {
						mkdir($dir);
					}
				}
				
				
			
			}
						
			if ($this->RequestHandler->isAjax())
				$this->layout = 'ajax';
			
			if (!empty($this->data)) {
				
				$server = @$this->data['Install']['server'];
				$login = @$this->data['Install']['login'];
				$password = @$this->data['Install']['password'];
				
				$database = @$this->data['Install']['database'];
				$prefix = @$this->data['Install']['prefix'];
				
				//This is the admin user, not the mysql user
				$user = @$this->data['Install']['user'];
				$pass = @$this->data['Install']['pass'];
				
				if (@mysql_pconnect($server, $login, $password)) {
					
					@mysql_query('CREATE DATABASE IF NOT EXISTS '.mysql_escape_string($database));
					
					if(@mysql_select_db($database)) {
												
						if(!empty($user) && !empty($pass)) {
							
							
							Configure::write('Database.driver', 'mysql');
							Configure::write('Database.persistent', false);
							Configure::write('Database.host', $server);
							Configure::write('Database.login', $login);
							Configure::write('Database.password', $password);
							Configure::write('Database.database', $database);
							Configure::write('Database.prefix', $prefix);
							
							App::import('Vendor', 'random_string');
							
							Configure::write('Security.salt', random_string(20));
							Configure::write('Security.cipherSeed', mt_rand());
							
							$this->_saveConfig();
							
							$data = serialize(array('user' => $user, 'pass' => $pass));
							
							file_put_contents(TMP.'install.tmp', $data);
																					
							$this->redirect(array('plugin' => 'install', 'controller' => 'install', 'action' => 'run'), null, true);
						}
						else {
							$this->set('three', 'Login details are invalid');
							$this->Session->destroy();							
						}
					}
					else {
												
						
						$this->set('two', 'Could not select or create the database');
						$this->Session->destroy();
					}
				}
				else {
					$this->set('one', 'Could not connect to MySQL');
					$this->Session->destroy();
				}
			}
			else {
				$this->Session->destroy();
			}
				
		}
	}