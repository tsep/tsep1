<?php

class IndexerComponent extends Object {

	/**
	 * @var AppController
	 */
	var $controller;
	
	/**
	 * @var QueueComponent
	 */
	var $queue;
	
	//called before Controller::beforeFilter()
	function initialize(&$controller, $settings = array()) {
		// saving the controller reference for later use
		$this->controller =& $controller;
		
		$this->queue = $this->controller->getQueue();
	}
	
	
	function _import()  {
		App::import('Vendor', 'html_to_text');		
		App::import('Vendor','get_time_left');
		App::import('Vendor', 'resolve_url');
		App::import('Vendor', 'tsep_crawler');
		App::import('Vendor', 'tsep_indexer');
		App::import('Vendor', 'start_script');
		App::import('Vendor', 'random_string');
	}
	
	/**
	 * _begin
	 * Creates the indexer_running.tmp file
	 */
	function _begin() {
		
		register_shutdown_function(array($this, '_end'));
		
		$fp = @fopen(TMP.'indexer_running.tmp', 'w');
		@fclose($fp);
	}
	/**
	 * _end
	 * removes the indexer_running.tmp file
	 */
	function _end () {
		@unlink(TMP.'indexer_running.tmp');
	}
	
	function _singular () {
		if(!file_exists(TMP.'indexer_running.tmp')) {
			return true;
		}
		else {
			return false;
		}
	}

	private function _generateAuth () {
		
		$randstr = random_string(10);
		
		file_put_contents(TMP.'auth.tmp', $randstr);
		
		return $randstr;	
		
	}
	
	private function _verifyAuth ($auth_key) {
		
		$auth = @file_get_contents(TMP.'auth.tmp');
			
		if($auth_key != $auth) {
			
			return false;			
		}
		else{
		
			@unlink(TMP.'auth.tmp');
			
			return true;
		}
	}

	
	function _run () {
		
		if(!$this->_singular()) {
			return false;
		}
		else {
			
			//Register the indexer is running
			$this->_begin();
			
			if($this->queue->isJob('indexer')) {
				
				$job = $this->queue->getJob('indexer');
				
				$new_job = $this->_index($job);
				
				if($new_job) {
					
					$this->queue->addJob($new_job['function_name'], $new_job['params']);
				}
				
				$this->_end();
				
				return $this->_generateAuth();
											
			}
			else {
				
				$this->_end();
				
				return false;
			}
		}
								
	}
	
	

	
	/**
	 * _index
	 * Indexes the job given
	 * @param array $job The Job to index
	 * @return mixed false on completion, array job to be requeued on incompletion
	 */
	function _index($job) {
											
		$this->log('Initializing');
		
		if (empty($job)) {
			
			$this->log('Invalid Job given to indexer');
			return false;
		}

		$this->log('Loading framework');
		
		$id = $job['function_name'];
		
		
		if (!empty($job['params'])) {
			
			//We are resuming 
			$this->log('Resuming from previous state');
			
			$indexer = $job['params']['indexer'];
			$crawler = $job['params']['crawler'];
			
		}
		else {
			
			//We are initializing
			$this->log('Loading dependancies');
			
			$profile = $this->controller->Profile->findById($id);				
			
			if(empty($profile)) {
				
				$this->log('#0001 Invalid Profile Request. Indexing Failed.');
				
				return false;
			}
		
			$stopwords = $this->controller->Stopword->find('all');
			
			//TODO: Specify a different user agent for ea. indexing profile
			
			$crawler = new TSEPCrawler($profile['Profile']['url'], $profile['Profile']['regex'], Configure::read('UserAgent'));
			$indexer = new TSEPIndexer($stopwords);
						
			$this->log('Deleting indexes');
			
			$this->controller->Index->deleteAll(array('Index.profile_id' => $id), false);
		}
		
		$this->log('Beginning crawl');
		
		while ($page = $crawler->crawl()) {
			
			if($indexer->parse($page)) {
							
				$save = $this->controller->Index->create(array(
					'Index' => array(
						'profile_id' => $id,
						'url' => $page->url,
						'text' => $page->content
					)
				));
								
				$this->log('Saving Page');
				$this->controller->Index->save($save);
			
			}

			if (get_time_left() <= 10) {
				
				//Return job to be requeued
				return array(
					'function_name' => $id,
					'params' => array(
						'crawler' => $crawler,
						'indexer' => $indexer
					)
				);
			}
				
		}
		
		$this->log('Indexing Complete');
		
		return false;
	}
	
	function processRequest ($auth_key) {
		
		$this->log('Begin Run');
				
		if (!$this->_verifyAuth($auth_key)) {
			$this->log('Access Violation');
			$this->controller->cakeError('error403');
			
			return false;
		}
		else {
			$this->_import();
						
			return $this->_run();
		}		
	}

}
?>
	
}