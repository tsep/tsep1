<?php 

	class InstallController extends InstallAppController {
		
		var $name = 'Install';
		
		var $components = null;
		
		var $uses = null;
		
		function beforeFilter () {
			parent::beforeFilter();
			
			App::import('Component', 'RequestHandler');
			$this->RequestHandler = new RequestHandlerComponent;
			
			App::import('Component', 'Session');
			$this->Session = new SessionComponent;
			
			$this->layout = 'install';
		}
		
		
		function run () {
			//Nothing here
		}
		
		function start () {
			$this->_install();
			die();
		}
		
		
		function index () {
			
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
				
				if (@mysql_pconnect($server, $login, $password)) {
					if(@mysql_select_db($database)) {
						
						if(!empty($user) && !empty($pass)) {
							
							$this->Session->write('server', $server);
							$this->Session->write('login', $login);
							$this->Session->write('password', $password);
							$this->Session->write('database' ,$database);
							$this->Session->write('prefix', $prefix);
							$this->Session->write('user', $user);
							$this->Session->write('pass', $pass);
							
							$this->render('run');
						}
						else {
							$this->set('three', 'Login details are invalid');
						}
					}
					else {
						$this->set('two', 'Could not select the database');
					}
				}
				else {
					$this->set('one', 'Could not connect to MySQL');
				}
			}
			else {
				$this->Session->destroy();
			}
				
		}
		
		function addUser () {
			
			$user = $this->Session->read('user');
			$pass = $this->Session->read('pass');
			
			if (empty($user)) die();
			
			App::import('Component', 'Auth');
			$this->Auth = new AuthComponent;
			
			$this->loadModel('User');
			
			$user = $this->User->create(array(
				'User' => array(
					'username' => $user,
					'password' => $this->Auth->password($pass)
				)
			));
			
			$this->User->save($user);
			
			die();
		}
		
		function _install () {
			
			$server = $this->Session->read('server');
			$login = $this->Session->read('login');
			$password = $this->Session->read('password');
			$database = $this->Session->read('database');
			$prefix = $this->Session->read('prefix');
			$user = $this->Session->read('user');
			$pass = $this->Session->read('pass');		
			
			
			$ini = ';<?php die()?>';
			
			$options = array(
				'database' => array(
					'host' => $server,
					'login' => $login,
					'password' => $password,
					'database' => $database,
					'prefix' => $prefix
				)
			);
			
			$ini .= $this->_write_ini_file($options);
			
			file_put_contents(CONFIGS.'db.ini.php', $ini);
			
			unset($ini);
			unset($options);
			
			App::import('Vendor', 'random_string');
			
			$ini = ';<?php die()?>';
						
			$options = array(
				'security' => array(
					'salt' => random_string(20),
					'cipherSeed' => mt_rand().mt_rand().mt_rand()
				)
			);
			
			$ini .= $this->_write_ini_file($options);
			
			file_put_contents(CONFIGS.'security.ini.php', $ini);
			
			unset($ini);
			unset($options);
			
			mysql_pconnect($server, $login, $password);
			mysql_select_db($database);
			
			$this->_SplitSQL(dirname(__FILE__).DS.'install.sql', array('prefix' => $prefix));

			$this->redirect(array('action' => 'addUser'), null, true);
		}
		
		function  _write_ini_file(array $options){
		    $tmp = '';
		    foreach($options as $section => $values){
		        $tmp .= "[$section]\n";
		        foreach($values as $key => $val){
		            if(is_array($val)){
		                foreach($val as $k =>$v){
		                    $tmp .= "{$key}[$k] = \"$v\"\n";
		                }
		            }
		            else
		                $tmp .= "$key = \"$val\"\n";
		        }
		        $tmp .= "\n";
		    }
		    return $tmp;
		}

		/**
		 * 
		 * A function to execute an SQL file with parameters
		 * @param string $file
		 * @param array $params
		 * @param string $delimiter
		 * 
		 * @link http://stackoverflow.com/questions/1883079/
		 */
		
		function _SplitSQL($file, $params = array(), $delimiter = ';')
		{
		    set_time_limit(0);
		    
		    if (is_file($file) === true)
		    {
		        $file = fopen($file, 'r');
		
		        if (is_resource($file) === true)
		        {
		            $query = array();
		
		            while (feof($file) === false)
		            {
		                $query[] = fgets($file);
		                
			            	foreach ($params as $param => $value) 
		                		$query = preg_replace( "/%$param%/", $value , $query);
		                
		
		                if (preg_match('~' . preg_quote($delimiter, '~') . '\s*$~iS', end($query)) === 1)
		                {
		                    $query = trim(implode('', $query));
		
		                    if (mysql_query($query) === false)
		                    {
		                        echo '<h3>ERROR: ' . $query . '</h3>' . "\n";
		                        echo '<h3>ERROR: ' . mysql_error() . '</h3>' . "\n";
		                    }
		
		                    else
		                    {
		                        echo '<h3>SUCCESS: ' . $query . '</h3>' . "\n";
		                    }
		
		                    //while (ob_get_level() > 0)
		                    //{
		                    //    ob_end_flush();
		                    //}
		
		                    //flush();
		                }
		
		                if (is_string($query) === true)
		                {
		                    $query = array();
		                }
		            }
		
		            return fclose($file);
		        }
		    }
		
		    return true;
		}
	}