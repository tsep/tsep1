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