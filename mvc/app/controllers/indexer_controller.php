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
			'Profile', 
			'IndexRequest'
		);
		
		function admin_index ($id = null) {
		
			if ($id != null){
				$this->_start($id);
				$this->Session->setFlash('Indexing has been queued, but index may take a while to appear depending on the site being crawled', 'flash_warn');
				$this->redirect(array('controller' => 'profiles', 'action' => 'index', 'admin' => true), null, true);
			}
			
			if($this->RequestHandler->isPost()) {
				$this->_start($this->data['IndexRequest']['profile']);
				$this->Session->setFlash('Indexing has been queued, but index may take a while to appear depending on the site being crawled', 'flash_warn');
				$this->redirect(array('controller' => 'profiles', 'action' => 'index', 'admin' => true), null, true);
			}
		}
		
		function _start($id) {
		
			App::import('Vendor', 'start_script');
			App::import('Vendor', 'random_string');
			
			$randstr = random_string(10);

			$store = array('id' => $id);
			
			$data = serialize($store);
			
			file_put_contents(TMP.'indexer'.DS.$randstr, $data);
			
			//TODO: This is bad practice, find another method
			App::import('Helper', 'Html');
			$html = new HtmlHelper();

			$url = $html->url(
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
			
			if ((!$valid))
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
			$this->log(Debugger::exportVar($contents));
			
			$store = @unserialize($contents);
			
			unlink(TMP.'indexer'.DS.$this->params['url']['continue']);
			
			if (!$store) {
					$this->log('Error occurred while unserializing stored crawler, Contents:'.$contents);
					$this->cakeError('error500');
			}

			$this->log('Loading framework');
			$this->log(Debugger::exportVar($store));
			
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
				
				$save = array(
					'Index' => array(
						'profile_id' => $profile['Profile']['id'],
						'url' => $index->url,
						'text' => $index->content
					)
				);
				
				$this->Index->save($save);
								
				if (get_time_left() <= 10)
					$this->_shutdown($crawler, $indexer);
					
			}
			
			$this->log('Indexing Complete');
			die();
		}
		function _shutdown ($crawler, $indexer, $id) {
			
				$this->log('Preparing to Restart');
				
				$randstr = random_string(10);

				$save = serialize(array(
					'crawler' => $crawler,
					'indexer' => $indexer
				));
				
				$this->log('Saving state');
				
				file_put_contents(TMP.'indexer'.DS.$randstr, $save);
				
				$this->log('Restarting');
				
				//TODO: This is bad practice, find another method
				App::import('Helper', 'Html');
				$html = new HtmlHelper();
								
				start_script(
					$html->url(
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