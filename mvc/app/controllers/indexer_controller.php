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
		
		function start($id = null) {

			if ($id = null) $this->redirect(array('controller'=>'Indexer', 'action' => 'index'), null, true);
			
			$profile = $this->Profile->findById('profilename');
			
			if(empty($profile)) $this->redirect(array('controller'=>'Indexer', 'action' =>'index'), null, true);
			
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
			
			$resume = false;
			
			//NEVER TRUST ANYTHING FROM THE USER!!!
			if (ctype_alnum($this->params['continue']))
				if (file_exists(TMP.$this->params['continue']))
					if (($contents = file_get_contents(TMP.$this->params['continue']))!= '')
						$resume = true;
						
			if ($resume) {
				
			}
			else {
			
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
					$this->_shutdown($crawler);
					
			}
			
			function _shutdown ($crawler) {
			
				
				$randstr = random_string(10);
								
				file_put_contents(TMP.$randstr, $crawler->save());
				
				//start_script($html->url(array('controller'=>'indexer', 'action'=>'index', true), true));
				
				die();
			}
		}
	}