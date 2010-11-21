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
		var $uses = array('Index', 'Stopword', 'Element', 'Profile');
		
		function admin_index ($id = null) {
		
		
		}
		
		function admin_start($id = null) {
			
			$resume = false;
			if (ctype_alnum($this->data['continue']))
				if (file_exists(TMP.$this->data['continue']))
					if (file_get_contents(TMP.$this->data['continue'])!= '')
						$resume = true;
			if (!$resume) {
				if ($_SERVER['REMOTE_ADDR']!= $_SERVER['SERVER_ADDR']) $this->redirect(array('controller'=>'Indexer', 'action' => 'index', 'admin' => true), null, true);
	
				if ($id == null) $this->redirect(array('controller'=>'Indexer', 'action' => 'index','admin' => true), null, true);
				
				$profile = $this->Profile->findById($id);
				
				if(empty($profile)) $this->redirect(array('controller'=>'Indexer', 'action' =>'index', 'admin' => true), null, true);
			}
			else $profile = true;
			
			$this->_index($profile);
		}
		
		
		function _import()  {
			
			App::import('Vendor','get_time_left');
			App::import('Vendor', 'resolve_url');
			App::import('Vendor', 'tsep_crawler');
			App::import('Vendor', 'tsep_indexer');
			App::import('Vendor', 'start_script');
			App::import('Vendor', 'random_string');
			
		}
		function _index($profile) {
			
			$this->log('Importing Modules for index.');
			
			$this->_import();
						
			$this->log('Loading framework');
									
			if ($profile == true) {
				
				$this->log('And we are back where we left off');
				
				$contents = file_get_contents(TMP.$this->data['continue']);
				$store = @unserialize($contents);
				
				if (!$store) {
					$this->log('Error occurred while unserializing stored crawler, Contents:'.$contents);
					$this->cakeError('error500');
				}
				
				$indexer = $store['indexer'];
				$crawler = $store['crawler'];
			}
			else {
				
				$this->log('Loading dependancies');
			
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
								
				if (get_time_left() <= 5)
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
				
				file_put_contents(TMP.$randstr, $save);
				
				$this->log('Restarting');
				
				start_script(
					$html->url(
						array(
							'controller' => 'indexer',
							'action' => 'start',
							'admin' => true, 
							'?' => array(
								'data[continue]' => $randstr
							)
						),
						true
					)
				);
				
				die();
			}
		
	}