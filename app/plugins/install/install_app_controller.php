<?php 
	class InstallAppController extends AppController {
		
		var $uses = array();
		
		function beforeFilter () {
			$this->layout = 'install';		
			$this->Auth->allow('*');
		}
	}