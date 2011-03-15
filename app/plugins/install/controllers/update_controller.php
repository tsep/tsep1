<?php
class UpdateController extends InstallAppController {
	
	var $uses = array();
	
	function beforeFilter () {
		parent::beforeFilter();
		
		$this->Auth->deny('*');
				
		if ($this->RequestHandler->isAjax()) 
			$this->layout = 'ajax';
		
	}
	
	/**
	 * Executes the update
	 */
	function execute() {
		
		$queue = $this->getQueue();
		
		/* Push the items in BACKWARDS */
		
		$queue->addJob('update_database');
		$queue->addJob('update_install');
		$queue->addJob('update_download');
		
		$this->processQueue();
		
	}	
		
}