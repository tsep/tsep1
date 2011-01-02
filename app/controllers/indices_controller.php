<?php
	/**
	* The heart of TSEP: manages indexes, stopwords, ect.
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

	//TODO:Centralize all queue functions into one function
	class IndicesController extends AppController {
	
		var $name = 'Indices';
		var $uses = array(
			'Index', 
			'Stopword', 
			'Profile'
		);
		
		function beforeFilter () {
			parent::beforeFilter();
			$this->Auth->allow('admin_run');
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
		/**
		 * _singular
		 * checks if another indexer is running
		 */
		function _singular () {
			if(!file_exists(TMP.'indexer_running.tmp')) {
				return true;
			}
			else {
				return false;
			}
		}		
		
		/**
		 * Adds a job to the indexing queue
		 * 
		 */
		function _add ($job) {
			
			if (empty($job)) return false;

			App::import('Vendor', 'random_string');
			
			$contents = @file_get_contents(TMP.'jobs.tmp');
			
			if (empty($contents)) {

					$data = array();					
			}
			else {
					$data = unserialize($contents);
			}
			
			array_push($data, $job);
			
			file_put_contents(TMP.'jobs.tmp', serialize($data));
		}
		
		/**
		 * _get
		 * Gets the next job in the indexing queue
		 */
		function _get() {
			
			$contents = @file_get_contents(TMP.'jobs.tmp');
			
			if(empty($contents)) return false;
			
			$jobs = unserialize($contents);
			
			if(empty($jobs)) return false;
						
			$job = array_pop($jobs);
			
			file_put_contents(TMP.'jobs.tmp', serialize($jobs));
			
			return $job;
		}
		
		
		function _run () {
			
			if(!$this->_singular()) return false;
			
			$this->_begin();
			
			$job = $this->_get();
			
			if(empty($job)) {
				
				$this->_end();
				
				return false;
			
			}
			else {
				
				@$this->_index($job);
				
				return true;
			
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

				
				$status = $indexer->parse($page);
				
				
				if($status) {
								
					$save = $this->Index->create(array(
						'Index' => array(
							'profile_id' => $id,
							'url' => $page->url,
							'text' => $page->content
						)
					));
									
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
								
			$job = array(
				'crawler' => $crawler,
				'indexer' => $indexer,
				'id' => $id
			);
			
			$this->log('Saving state');
			
			$this->_add($job);
			
			$this->log('Restarting');
			
			$this->_end();
			
			$this->_start();
			
			return true;
		}
		
		
		function search ($profile = null, $page = null) {
			
			$this->set('title_for_layout', 'Search Results');
			
			//Don't care if the query is empty
			$query = @$this->params['url']['q'];
			
			if(!empty($query)) {
				
				$this->paginate = array(
					'conditions' => array(
						'MATCH(Index.text) AGAINST(? IN BOOLEAN MODE)' => array($query)
					),
					'limit' => 10,
				);
				
				$data = $this->paginate('Index');
				
				unset($this->params['url']['url']);
				
				$this->set(array('matches' => $data));
			}
			else {
				$this->set('matches', array());
			}
		}
		
		/**
		 * Processes the indexing queue 
		 */
		function run () {
			
			$this->log('Begin Run');
			
			if (!$this->_check()) {
				$this->log('Access Violation');
				$this->cakeError('error403');
			}
			else {
				$this->_import();
				$this->_run();
			}
			
			die();
		}
			
		function admin_index ($id = null) {
					
			if (!empty($id)){
				
				$this->_import();
				
				$job = array('id' => $id);
				
				$this->_add($job);
				
				if($this->_start()) {		
					$this->Session->setFlash('Indexing Queued', 'flash_success');
				}
				else {
					$this->Session->setFlash('Failed to start indexer. More information may be avaiable in the error log.', 'flash_fail');
				}
			
			} 
			
			$this->redirect(array('controller'=>'profiles', 'action' => 'index'), null, true);
			
			
			
		}
		
		
	}