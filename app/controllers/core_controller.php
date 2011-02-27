<?php
/**
 * Core Controller - Misc functions essetial to the operation of the application
 */

/**
 * Core Controller - Misc.
 * @author Geoffrey
 *
 */
class CoreController extends AppController {
	
	/**
	 * Configuration Options
	 */
	function admin_settings () {
	
	}
	
	/**
	 * Process all jobs in the Queue
	 */
	function admin_batch() {
		
		
		if($this->RequestHandler->isAjax()) {
			//Process the jobs
		}
		else {
			//Display the page
		}
	}
	
	/**
	 * Submit log, get help, etc
	 */
	function admin_troubleshoot () {
	
	}
	
}