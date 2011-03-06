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
			
			$this->set('processing', true);
			
			//Process the jobs

			/*
			$job = array(
				'function_name',
				'params'			
			);
			*/
			
			App::import('Component', 'Queue');
			$queue = new QueueComponent();
			
			$queue->initialize($this);
			
			$job = $queue->getJob();
			
			App::import('Vendor', $job['function_name']);
			
			$return_job = call_user_func_array($job['function_name'], $job['params']);
			
			if($return_job) {
				$queue->addJob($return_job['function_name'], $return_job['params']);
			}
			
			$this->set('done', $queue->isJob());
		}
	}
	
	/**
	 * Submit log, get help, etc
	 */
	function admin_troubleshoot () {
	
	}
	
}