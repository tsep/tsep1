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
	
	var $uses = array();
	
	/**
	 * Configuration Options
	 */
	function admin_settings () {
	
	}
	
	/**
	 * Process all jobs in the Queue
	 */
	function admin_batch() {
		
		//TODO: Cleanup
		
		if($this->RequestHandler->isAjax()) {
			
			$this->set('processing', true);
			
			//Process the jobs

			/*
			$job = array(
				'function_name',
				'params'			
			);
			*/
			
			$this->layout = 'ajax';
			
			$queue = $this->getQueue();
			
			if($queue->isJob()) {
			
				$job = $queue->getJob();
				
				App::import('Vendor', $job['function_name']);
				
				$return_jobs = call_user_func_array($job['function_name'], $job['params']);
				
				if(is_array($return_jobs)) {
					foreach ($return_jobs as $return_job) {
						$queue->addJob($return_job['function_name'], $return_job['params']);
					}
				}
				elseif (!$return_jobs) {
					
					//Re-queue the job
					$queue->addJob($job['function_name'], $job['params']);
				}
			}
			
			$this->set('done', !$queue->isJob());
		}
	}
	
	/**
	 * Submit log, get help, etc
	 */
	function admin_troubleshoot () {
	
	}
	
}