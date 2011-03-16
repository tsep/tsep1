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
	function admin_setting () {
		
		if(!empty($this->data)) {
			
			Configure::write($this->data['Setting']['key'], $this->data['Setting']['value']);
			
			$this->saveConfiguration();
			
			$this->Session->setFlash(__('Configuration Updated', true), 'flash_success');
			
			$this->redirect(array('controller' => 'core', 'action' => 'setting', 'admin' => true), null, true);
		}
		else {
			
			$config = (array)Configure::getInstance();
						
			$this->set(compact('config'));
		}
		
	}
	
	
	/**
	 * Process all jobs in the Queue
	 */
	function admin_batch() {
		
		//TODO: Cleanup
		
		if($this->RequestHandler->isAjax()) {
						
			//Process the jobs
			
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
					$this->Session->setFlash(__('The selected operation failed', true), 'flash_fail');
					
					$this->log('Batch operation failed. See debug log for details');
					Debugger::log($job);
					
					$this->set('done', true);
					
					return;
				}
			}
			
			$this->set('done', !$queue->isJob());
		}
	}
	
	/**
	 * Submit log, get help, etc
	 */
	function admin_troubleshoot () {
		
		$log = '';
		
		if ($handle = opendir(LOGS)) {
		    while (false !== ($file = readdir($handle))) {
		        if ($file != "." && $file != "..") {
		            $log .= file_get_contents(LOGS.$file);
		        }
		    }
		    closedir($handle);
		}
		
		$this->set(compact('log'));
	}
	
}