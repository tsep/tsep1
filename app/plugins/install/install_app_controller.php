<?php 
	class InstallAppController extends AppController {
		
		function beforeFilter() {
			parent::beforeFilter();
			
			if(file_exists(CONFIGS.'settings.ini.php')) {
				$this->cakeError('error403');
			}
		}		
	}