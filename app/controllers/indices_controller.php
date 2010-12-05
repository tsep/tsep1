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
		 * Processes the indexing queue 
		 */
		function admin_run () {
			
			$this->log('Begin Run');
			
			if (!$this->_check()) $this->cakeError('error403');
						
			$this->_import();
			
			$jobs = unserialize(file_get_contents(TMP.'jobs.tmp'));
			
			$job = array_pop($jobs);
			
			file_put_contents(TMP.'jobs.tmp', serialize($jobs));
			
			$this->_index($job);
		}
		
		/**
		 * _start
		 * Starts the queue processor
		 */
		function _start() {
			
			$this->_import();
			
			$randstr = random_string(10);
			
			file_put_contents(TMP.'auth.tmp', $randstr);
			
			start_script(
					Router::url(
						array(
							'controller' => 'indices',
							'action' => 'run',
							'admin' => true, 
							'?' => array(
								'auth' => $randstr
							)
						),
						true
					)
				);
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
		
	function _index($job) {
			
			$this->log('Importing Modules for index.');
			
			$this->_import();
						
			$this->log('Initializing');
			
			if (!$job) {
					$this->log('Error occurred while unserializing stored crawler, Contents:'.$contents);
					$this->cakeError('error500');
			}

			$this->log('Loading framework');
			
			if (isset($job['crawler']) && isset($job['indexer'])) {
				
				//We are resuming 
				$this->log('And we are back where we left off');
				
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
				
				$crawler = new TSEPCrawler($profile['Profile']['url'], $profile['Profile']['regex'], Configure::read('UserAgent'));
				$indexer = new TSEPIndexer($stopwords);
				
				$id = $job['id'];
				
				$this->log('Deleting indexes');
				
				$this->Index->deleteAll(array('Index.profile_id' => $profile['Profile']['id']), false);
			}
			
			$this->log('Beginning crawl');
			
			while ($page = $crawler->crawl()) {

				
				$indexer->parse($page);
				
								
				$save = $this->Index->create(array(
					'Index' => array(
						'profile_id' => $id,
						'url' => $page->url,
						'text' => $page->content
					)
				));
								
				$this->Index->save($save);

				if (get_time_left() <= 10)
					$this->_shutdown($crawler, $indexer, $id);
					
			}
			
			$this->log('Indexing Complete');
			die();
		}
		function _shutdown ($crawler, $indexer, $id) {
			
				$this->log('Preparing to Restart');
				
				$save = array(
					'crawler' => $crawler,
					'indexer' => $indexer,
					'id' => $id
				);
				
				$this->log('Saving state');
				
				$this->_add($save);
				
				$this->log('Restarting');
				
				$this->_start();
				
				die();
			}
		
		
		function search ($profile = null, $page = null) {
			
			
			//Don't care if the query is empty
			$query = @$this->params['url']['q'];
			
			if(!empty($query)) {
				$params= array('conditions' => array(
					'MATCH(Index.text) AGAINST(? IN BOOLEAN MODE)' => array($query)
				));
				
				$matches = $this->Index->find('all', $params);
				
				$this->set('matches', $matches);
			}
			else {
				$this->set('matches', array());
			}
		}
			
		function admin_index ($id = null) {
					
			if (!empty($id)){
				
				$this->_import();
				
				$job = array('id' => $id);
				
				$this->_add($job);
				$this->_start();
				
				$this->Session->setFlash('Indexing has been queued, but may take a while to appear depending on the site being crawled', 'flash_warn');
				$this->redirect(array('controller' => 'profiles', 'action' => 'index', 'admin' => true), null, true);
			} else {
				
				$this->Session->setFlash('No valid indexing profile specified. Indexer was not started', 'flash_fail');
				$this->redirect(array('controller'=>'profiles', 'action' => 'index'), null, true);
			}
		}
		
		
	}