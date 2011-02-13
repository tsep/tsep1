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
			
		}
		
		/**
		 * Enter the initial settings 
		 */
		function settings () {
			
		}
		
		/**
		 * Perform the installation
		 */
		function install () {
		
		}
		
		/**
		 * Thank the user for installing
		 */
		function finish () {
		
		}
	}