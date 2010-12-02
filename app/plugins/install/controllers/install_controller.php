<?php 

	class InstallController extends InstallAppController {
		
		var $name = 'Install';
		
		var $components = null;
		
		var $uses = null;
		
		function beforeFilter () {
			parent::beforeFilter();
			
			App::import('Component', 'RequestHandler');
			$this->RequestHandler = new RequestHandlerComponent();
			
			App::import('Component', 'Session');
			$this->Session = new SessionComponent();
			
			$this->layout = 'install';
		}
		
		function _submit () {
			
			$url = 'http://www.tsep.info/?';
			
			$data = http_build_query(array(
				'installOK' => 'yes',
				'ver' => file_get_contents(CONFIGS.'version.txt'),
				'comment' => Router::url('/')
			));
			
			//@file_get_contents($url.$data);
			
			//$this->log('Got URL:'.$url.$data);
		}
		
		function run () {
			
			if (!$this->RequestHandler->isAjax()) $this->redirect(array('action' =>'index'), null, true);
			
			if (@$this->params['url']['action'] == 'install') {
				$this->_install();
				$this->_submit();
				die();
			}
			if (@$this->params['url']['action'] == 'add'){ 
				$this->_add();
				die();
			}
		}
		
		
		function index () {
			
			file_put_contents(TMP.'install.tmp', '');
						
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
					if(@mysql_select_db($database)) {
						
						if(!empty($user) && !empty($pass)) {
							
							
							$data = array(
								'server' => $server,
								'login' => $login,
								'password' => $password,
								'database' => $database,
								'prefix' => $prefix,
								'user' => $user,
								'pass' => $pass
							);
							
							file_put_contents(TMP.'install.tmp', serialize($data));
							
							$this->render('run');
						}
						else {
							$this->set('three', 'Login details are invalid');
							$this->Session->destroy();							
						}
					}
					else {
						$this->set('two', 'Could not select the database');
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
		
		function _add () {
			
			$data = unserialize(file_get_contents(TMP.'install.tmp'));
			
			$user = $data['user'];
			$pass = $data['pass'];
			
			if (empty($user)) die('User empty');
			
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
		
		
		function _install () {
			
			$data = unserialize(file_get_contents(TMP.'install.tmp'));
						
			$server = $data['server'];
			$login = $data['login'];
			$password = $data['password'];
			$database = $data['database'];
			$prefix = $data['prefix'];			
			

			App::import('Vendor', 'random_string');
			
			
			mysql_pconnect($server, $login, $password);
			mysql_select_db($database);
			
			$this->_SplitSQL(dirname(__FILE__).DS.'..'.DS.'models'.DS.'install.sql', array('prefix' => $prefix));

			$options = array(
				'database' => array(
					'host' => $server,
					'login' => $login,
					'password' => $password,
					'database' => $database,
					'prefix' => $prefix
				),
				'security' => array(
					'salt' => random_string(20),
					'cipherSeed' => mt_rand().mt_rand().mt_rand()
				)
			);
			
			$this->_write_ini_file(CONFIGS.'settings.ini.php', $options);
			
			unset($options);
			
		}
		
		/**
		 * A function to write values to ini file
		 * 
		 * @param string $file
		 * @param array $options
		 * 
		 * @link http://stackoverflow.com/questions/4082626/
		 */
		function _write_ini_file($file, array $options){
		    $tmp = ";<?php die()?>\n";
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
		    file_put_contents($file, $tmp);
		    unset($tmp);
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