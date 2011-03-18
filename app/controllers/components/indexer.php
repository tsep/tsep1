<?php

class IndexerComponent extends Object {

	/**
	 * @var AppController
	 */
	var $controller;
	
	/**
	 * @var QueueComponent
	 */
	var $Queue;
	
	/**
	 * @var Profile
	 */
	var $Profile;

	
	var $components = array('Queue');
	
	function initialize (&$controller, $settings = array()) {
		
		$this->controller =& $controller;
		
		$this->Profile = ClassRegistry::init('Profile');
	}
	
	private function _import()  {
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
	private function _begin() {
		
		register_shutdown_function(array($this, 'end'));
		
		$fp = @fopen(TMP.'indexer_running.tmp', 'w');
		@fclose($fp);
	}
	/**
	 * _end
	 * removes the indexer_running.tmp file
	 */
	private function _end () {
		@unlink(TMP.'indexer_running.tmp');
	}
	
	
	/**
	 * Helper function on PHP shutdown
	 */
	function end () {
		$this->_end();
	}
	
	
	private function _singular () {
		if(!file_exists(TMP.'indexer_running.tmp')) {
			return true;
		}
		else {
			return false;
		}
	}

	private function _generateAuth () {
		
		App::import('Vendor', 'random_string');
		
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

	
	private function _run () {
		
		if(!$this->_singular()) {
			$this->log('Singular; Indexing aborted');
			
			return false;
		}
		else {
			
			//Register the indexer is running
			$this->_begin();
			
			$this->log('Checking for jobs');
			
			if($this->Queue->isJob('indexer')) {
				
				$job = $this->Queue->getJob('indexer');
				
				$this->log('Job found; Processing Job');
				
				$new_job = $this->_index($job);
				
				if($new_job) {
					
					$this->Queue->addJob($new_job['function_name'], $new_job['params'], 'indexer');
				}
				
				$this->_end();
				
				return $this->_generateAuth();
											
			}
			else {
				
				$this->log('No jobs found; aborting');
				
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
	private function _index($job) {
											
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
			
			$profile = $this->Profile->findById($id);				
			
			if(empty($profile)) {
				
				$this->log('#0001 Invalid Profile Request. Indexing Failed.');
				
				return false;
			}
		
			$stopwords = $this->Profile->Stopword->find('all');
			
			//TODO: Specify a different user agent for ea. indexing profile
			
			$crawler = new TSEPCrawler($profile['Profile']['url'], $profile['Profile']['regex'], Configure::read('UserAgent'));
			$indexer = new TSEPIndexer($stopwords);
						
			$this->log('Deleting indexes');
			
			$this->Profile->Index->deleteAll(array('Index.profile_id' => $id), false);
		}
		
		$this->log('Beginning crawl');
		
		while ($page = $crawler->crawl()) {
			
			if($indexer->parse($page)) {
							
				$save = $this->Profile->Index->create(array(
					'Index' => array(
						'profile_id' => $id,
						'url' => $page->url,
						'text' => $page->content
					)
				));
								
				$this->log('Saving Page');
				$this->Profile->Index->save($save);
			
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
	
	/**
	 * Processes the Indexing Queue
	 * @param string $auth_key The authorization key provided
	 * @return mixed string on incompletion, false on completion
	 */
	function processRequest ($auth_key) {
		
		$this->log('Processing Request');
				
		if (!$this->_verifyAuth($auth_key)) {
			
			$this->log('Authentication Failed');
			
			return false;
		}
		else {
			$this->log('Authentication Success');
			
			$this->_import();
						
			return $this->_run();
		}		
	}
	
	/**
	 * Submit an indexing request
	 * @param string $id The profile to index
	 * @return string the auth key
	 */
	function submitRequest ($id) {
		
		$this->log('#0002 Request submitted');
		
		$this->Queue->addJob($id, array(), 'indexer');
		
		return $this->_generateAuth();
	}

}
