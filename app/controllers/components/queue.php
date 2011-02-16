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
	
	var $jobPath;
	
	function initialize(&$controller, $settings=array()) {
		
		$this->jobPath = TMP.'queue_jobs';
		
	}
	
	private function _getJobFile () {
		
		$cont = file_get_contents($this->jobPath);
		
		if(empty($cont)) {
			
			return array();
			
		}
		else {
			
			$jobs = @unserialize($cont);
			
			if (empty($jobs) || !is_array($jobs)) {
				
				return array();
			}
			else {
				
				return $jobs;
			}			
		}
		
	}
	
	private function _saveJobFile ($jobs) {
		
		$cont = serialize($jobs);
		
		if(@file_put_contents($this->jobPath, $cont)) {
		
			return true;
		}
		else {
			
			return false;
		}
	}
	
	function addJob($function_name, array $params) {
		
		$job = compact('function_name', 'params');
				
		$jobs = $this->_getJobFile();
		
		array_push($jobs, $job);
		
		if($this->_saveJobFile($jobs)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function isJob () {
		
		
	}
	
	function getJob () {
	
		
	}
}