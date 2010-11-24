<?php
/**
* Starts the Indexer, displays indexing form, ect.
* 
* @author geoffreyfishing
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: $
*  $LastChangedBy:  $
*  $LastChangedRevision: $
*
*/
	class IndexerController extends AppController {
		
		var $name = 'Indexer';
		var $uses = array(
			'Index', 
			'Stopword', 
			'Element', 
			'Profile'
		);
		
		function admin_index ($id = null) {
		
			if($id != null)	$profile = $this->Profile->findById($id);
			
			if (!empty($profile)){
				$this->_start($id);
				$this->Session->setFlash('Indexing has been queued, but may take a while to appear depending on the site being crawled', 'flash_warn');
				$this->redirect(array('controller' => 'profiles', 'action' => 'index', 'admin' => true), null, true);
			} else {
				
				$this->Session->setFlash('No valid indexing profile specified. Indexer was not started', 'flash_fail');
				$this->redirect(array('controller'=>'profiles', 'action' => 'index'), null, true);
			}
		}
		
		function admin_cleanup () {
			
			$profiles = $this->Profile->find('all');
			
			$ids = array();
			
			foreach ($profiles as $profile)	array_push($ids, $profile['Profile']['id']);
			
			
				
			$this->Index->deleteAll(array(
				'NOT' => array(
					'Index.profile_id' => $ids
				)
			));
			
			die();
		}
		
		function _start($id) {
		
			App::import('Vendor', 'start_script');
			App::import('Vendor', 'random_string');
			
			$randstr = random_string(10);

			$store = array('id' => $id);
			
			$data = serialize($store);
			
			file_put_contents(TMP.'indexer'.DS.$randstr, $data);
			

			$url = Router::url(
						array(
							'controller' => 'indexer',
							'action' => 'start',
							'admin' => true, 
							'?' => array(
								'continue' => $randstr
							)
						),
						true
					);
			
			$status = start_script($url);
			
			if (!$status) $this->log('Failed to make async request to '. $url);
		}
		
		function admin_start() {
			
			$valid = false;
			
			if ((ctype_alnum(@$this->params['url']['continue'])) && 
				(file_exists(TMP.'indexer'.DS.$this->params['url']['continue'])))
						$valid = true;
			
			if (!$valid)
			{
				//The user shouldn't be here, kill the script.
				$this->log('Attempted security breach from '. $this->RequestHandler->getClientIP(). ' at URL:'. $this->params['url']['url']);
				$this->cakeError('error500');
			}
			
						
			$this->_index();
		}
		
		
		function _import()  {
			
			App::import('Vendor','get_time_left');
			App::import('Vendor', 'resolve_url');
			App::import('Vendor', 'tsep_crawler');
			App::import('Vendor', 'tsep_indexer');
			App::import('Vendor', 'start_script');
			App::import('Vendor', 'random_string');
			
		}
		function _index() {
			
			$this->log('Importing Modules for index.');
			
			$this->_import();
						
			$this->log('Initializing');
			
			$contents = file_get_contents(TMP.'indexer'.DS.$this->params['url']['continue']);
			
			$store = @unserialize($contents);
			
			unlink(TMP.'indexer'.DS.$this->params['url']['continue']);
			
			if (!$store) {
					$this->log('Error occurred while unserializing stored crawler, Contents:'.$contents);
					$this->cakeError('error500');
			}

			$this->log('Loading framework');
			
			if (!isset($store['id'])) {
				
				//We are resuming 
				$this->log('And we are back where we left off');
				
				$indexer = $store['indexer'];
				$crawler = $store['crawler'];
			}
			else {
				
				//We are initializing
				$this->log('Loading dependancies');
				
				$profile = $this->Profile->findById($store['id']);
				
				if(empty($profile)) {
					$this->log('Invalid Profile Request. The TMP directory may be corrupt.');
					$this->cakeError('error500');
				}
			
				$stopwords = $this->Stopword->find('all');
				$elements = $this->Element->find('all');
				
				$crawler = new TSEPCrawler($profile['Profile']['url'], $profile['Profile']['regex'], $elements);
				$indexer = new TSEPIndexer($stopwords);
				
				$this->log('Deleting indexes');
				
				$this->Index->deleteAll(array('Index.profile_id' => $profile['Profile']['id']), false);
			}
			
			$this->log('Beginning crawl');
			
			while ($page = $crawler->crawl()) {
								
				$indexer->parse($page);
								
				$save = $this->Index->create(array(
					'Index' => array(
						'profile_id' => $profile['Profile']['id'],
						'url' => $page->url,
						'text' => $page->content
					)
				));
								
				$this->Index->save($save);

				if (get_time_left() <= 10)
					$this->_shutdown($crawler, $indexer);
					
			}
			
			$this->log('Indexing Complete');
			die();
		}
		function _shutdown ($crawler, $indexer) {
			
				$this->log('Preparing to Restart');
				
				$randstr = random_string(10);

				$save = serialize(array(
					'crawler' => $crawler,
					'indexer' => $indexer
				));
				
				$this->log('Saving state');
				
				file_put_contents(TMP.'indexer'.DS.$randstr, $save);
				
				$this->log('Restarting');

								
				start_script(
					Router::url(
						array(
							'controller' => 'indexer',
							'action' => 'start',
							'admin' => true, 
							'?' => array(
								'continue' => $randstr
							)
						),
						true
					)
				);
				
				die();
			}
		
	}