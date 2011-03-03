<?php
class UpdateController extends UpdateAppController {
	
	var $uses = array();
	
	function beforeFilter () {
		parent::beforeFilter();
		
		$this->Auth->deny('*');
				
		if ($this->RequestHandler->isAjax()) 
			$this->layout = 'ajax';
		
	}
	
	function download() {
		
		
	}	
		
}