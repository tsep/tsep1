<?php 

//TODO: Clean this up! This code is absoulutely outrageous.

	class InstallController extends InstallAppController {
		
		var $name = 'Install';
		
		var $components = null;
		
		var $uses = null;
		
		function _check () {
			
			if(file_exists(CONFIGS.'settings.php') && !file_exists(TMP.'install.tmp')){
				$this->cakeError('error403');
			}
		}
		
		function _init () {
			
			App::import('Component', 'RequestHandler');
			$this->RequestHandler = new RequestHandlerComponent();
			
			App::import('Component', 'Session');
			$this->Session = new SessionComponent();
			
			App::import('Component', 'Security');
			$this->Security = new SecurityComponent();
		}
		
		function beforeFilter () {
			parent::beforeFilter();
					
			$this->_check();
			$this->_init();
			
			$this->layout = 'install';
		}

		/**
		 * Welcome the user
		 */
		function index () {
			
			$handle = fopen(TMP.'install.tmp', 'w');
			fclose($handle);
			
			$this->set('title_for_layout', __('Welcome', true));
			
			$languages = array(
				'fre' => 'Francias',
				'eng' => 'English'
			);
			
			$this->set('languages', $languages);
			
			if(!empty($this->params['url']['language'])) {
			
				if(array_key_exists($this->params['url']['language'], $languages)) {
				
					Configure::write('Config.language', $this->params['url']['language']);
					
					$this->_saveConfig();
					
					$this->redirect(array('controller' => 'install', 'plugin' => 'install', 'action' => 'database'), null, true);
				}
			}
			
		}
		
		/**
		 * Connect to the database
		 */
		function database () {
			
			$this->set('title_for_layout', __('Database Configuration', true));
			
			if(!empty($this->data)) {

				Configure::write('Database', $this->data['Database']);
				
				App::import('Model', 'ConnectionManager');
						        
		        ConnectionManager::create('install', Configure::read('Database'));
		        $db = ConnectionManager::getDataSource('install');
		        		        
		        if ($db->isConnected()) {
							        	
		        	$this->_saveConfig();
		        			        	
		        	$this->Session->setFlash(__('Connection to the database established.', true), 'flash_success');
		        			        	
					$this->redirect(array('controller' => 'install', 'plugin' => 'install', 'action' => 'settings'), null, true);
		        }
		        else {
		        	$this->Session->setFlash(__('Could not connect to database.', true), 'flash_fail');
		        }
		        
			}
		}
		
		/**
		 * Enter the initial settings 
		 */
		function settings () {
			
			if(!empty($this->data)) {
				
				Configure::write('Install', $this->data['Install']);
				
				$this->redirect(array('controller' => 'install', 'plugin' => 'install', 'action' => 'install'), null, true);
			}
		}
		
		/**
		 * Perform the installation
		 */
		function install () {
			
			$this->set('title_for_layout', __('Performing the Installation', true));
			
			if($this->RequestHandler->isAjax()) {
				
				App::import('Model', 'CakeSchema', false);
        App::import('Model', 'ConnectionManager');
				
				/**
         * @var DboSource
         */
	      $db = ConnectionManager::getDataSource('default');
			
				$schema =& new CakeSchema(array('name'=>'app'));
			                
				$schema = $schema->load();

				$drop   = $db->dropSchema($schema);
				$create = $db->createSchema($schema);
							
				$db->execute($drop);
				$db->execute($create);
							
			}
			
		}
		
		/**
		 * Thank the user for installing
		 */
		function finish () {
			
			$this->set('title_for_layout', __('Thanks for installing', true));
			
			unlink(TMP.'install.tmp');
		}
	}