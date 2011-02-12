<?php
/**
* Queue Component
* 
* @author Geoffrey
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: $
*  $LastChangedBy:  $
*  $LastChangedRevision: $
*
*/


class QueueComponent extends Object {
	
	/**
	 * The path to the jobs file
	 * @var string
	 */
	var $jobPath = '';
	
	function initialize(&$controller, $settings=array()) {
		
		$this->jobPath = TMP.'queue_jobs';
		
	}
	
	private function _checkFile () {
		
		if(!file_exists($this->jobPath)) {
			
			$schema = array(
				
			);
		}
	}
	
	
	/**
	 * Execute the next job in the queue
	 */
	function executeJob ($job_id = null) {
		
		
		
		return $job_id;
	}
	
	/**
	 * Add a job to the queue
	 * @param string $job_name The name of the function to execute
	 * @param string $job_options The parameters to be passed to the job
	 */
	function addJob($job_name, array $job_options) {
		
		
		
		
		return $job_id;
	}
	
	
	/**
	 * Removes the job with the given id
	 * @param string $job_id The job to remove
	 */
	function removeJob ($job_id) {
		
		return $job_id;
	}
	
	/**
	 * Clear all jobs
	 */
	function clearAllJobs() {
		
		return true;	
	}
	
	/**
	 * Get the ID of the next job in the queue
	 */
	function nextJob() {
		
		return $job_id;
	}
}