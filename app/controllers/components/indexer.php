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
	

	
	function _run () {
		
		if(!$this->_singular()) return false;
		
		$this->_begin();
		
		if($this->queue->isJob('indexer')) {
			
			$job = $this->queue->getJob('indexer');
			
			$this->_index($job);
										
			return true;			
		}
		else {
			
			$this->_end();
			
			return false;
		}
								
	}
	
	/**
	 * _start
	 * Starts the queue processor
	 */
	function _start() {
		
		if(!$this->_singular()) {
			$this->log('Attempted to start indexer failed (ISSUE #2)');
			return true;
		}
					
		$randstr = random_string(10);
		
		file_put_contents(TMP.'auth.tmp', $randstr);
		
		start_script(
				Router::url(
					array(
						'controller' => 'indices',
						'action' => 'run',
						'admin' => false, 
						'?' => array(
							'auth' => $randstr
						)
					),
					true
				)
			);
			
			$time = 0;
			
			while($this->_singular()) {
			
				$time++;
				
				if($time > 5) return false;
				
				sleep(1);
			}
			
			return true;
	}

	/**
	 * _check
	 * Checks to see if the async request is valid
	 */
	function _check () {
		
		$auth = @file_get_contents(TMP.'auth.tmp');
					
		if(@$this->params['url']['auth'] != $auth) return false;			
		
		@unlink(TMP.'auth.tmp');
		
		return true;
	}
	
	/**
	 * _index
	 * Indexes the job given
	 * @param array $job The Job to index
	 */
	function _index($job) {
											
		$this->log('Initializing');
		
		if (empty($job)) {
			
			$this->log('Invalid Job given to indexer');
			return false;
		}

		$this->log('Loading framework');
		
		if (isset($job['crawler']) && isset($job['indexer'])) {
			
			//We are resuming 
			$this->log('Resuming from previous state');
			
			$indexer = $job['indexer'];
			$crawler = $job['crawler'];
			
			$id = $job['id'];
		}
		else {
			
			//We are initializing
			$this->log('Loading dependancies');
			
			$profile = $this->Profile->findById($job['id']);				
			
			if(empty($profile)) {
				$this->log('Invalid Profile Request. Indexing Failed.');
				$this->cakeError('error500');
			}
		
			$stopwords = $this->Stopword->find('all');
			
			//TODO: Specify a different user agent for ea. indexing profile
			
			$crawler = new TSEPCrawler($profile['Profile']['url'], $profile['Profile']['regex'], Configure::read('UserAgent'));
			$indexer = new TSEPIndexer($stopwords);
			
			$id = $job['id'];
			
			$this->log('Deleting indexes');
			
			$this->Index->deleteAll(array('Index.profile_id' => $profile['Profile']['id']), false);
		}
		
		$this->log('Beginning crawl');
		
		while ($page = $crawler->crawl()) {
			
			if($indexer->parse($page)) {
							
				$save = $this->Index->create(array(
					'Index' => array(
						'profile_id' => $id,
						'url' => $page->url,
						'text' => $page->content
					)
				));
								
				$this->log('Saving Page');
				$this->Index->save($save);
			
			}

			if (get_time_left() <= 10) {
				
				$this->_shutdown($crawler, $indexer, $id);
				
				return true;
			}
				
		}
		
		$this->log('Indexing Complete');
		
		//Check if there is another job to process
		
		$this->log('Checking for new jobs');
		
		$next = $this->_get();
		
		if(!empty($next)) {
			
			$this->log('New Job detected');
				
			$this->_add($next);
			$this->end();
			$this->_start();
				
		}
		
		return true;
	}
	function _shutdown ($crawler, $indexer, $id) {
		
		$this->log('Preparing to Restart');
							
		$this->queue->addJob($id, array('indexer' => $indexer, 'crawler' => $crawler), 'indexer');
		
		$this->log('Restarting');
		
		$this->_end();
		
		$this->_start();
		
		return true;
	}
	
	function processRequest () {
		
		$this->log('Begin Run');
		
		ob_start();
		
		if (!$this->_check()) {
			$this->log('Access Violation');
			$this->cakeError('error403');
			
			return false;
		}
		else {
			$this->_import();
			$this->_run();
			
			return true;
		}		
	}

}
?>
	
}