<?php 
	class InstallAppController extends AppController {
		
		function beforeFilter() {
			
			if(file_exists(CONFIGS.'settings.ini.php')) {
				$this->cakeError('error403');
			}
			else {
				parent::beforeFilter(); //Calling this by default will cause errors
			}
		}		
	}