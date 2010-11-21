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
		
		function index($continue = null) {
						
			$profile = $this->Profile->findByName('profilename');
			$this->_index($profile);
		}
		
		
		function _index($profile) {
			
			$this->log('Importing Modules for index.');
			
			App::import('Vendor','get_time_left');
			App::import('Vendor', 'resolve_url');
			App::import('Vendor', 'tsep_crawler');
			App::import('Vendor', 'tsep_indexer');
			
			$this->log('Deleting previous indexes');
						
			//Remove all indexes of that profile
			$this->Index->deleteAll(array('Index.profile_id' => $profile['Profile']['id']), false);

			$this->log('Loading Stopwords');
			//Load the stopwords
			$stopwords = $this->Stopword->find('all');
			
			$this->log('Loading Elements');
			//Load the elements (array to find links)
			$elements = $this->Element->find('all');
			
			$this->log('Profile Object:'.print_r($profile,true));
			
			$this->log('Loading Crawler');
			//Load the crawler
			$crawler = new TSEPCrawler($profile['Profile']['url'], $profile['Profile']['regex'], $elements);
			
			$this->log('Loading Indexer');
			//Load the indexer
			$indexer = new TSEPIndexer($stopwords, $crawler);
			
			$this->log('Loading complete');
			$this->log('Begining crawl');
			
			while ($index = $indexer->index()) {

				$this->log('Indexed file:'.$index->url);
				$this->log('Saving index');
				$save = array(
					'Index' => array(
						'profile_id' => $profile['Profile']['id'],
						'url' => $index->url,
						'text' => $index->content
					)
				);
				
				$this->Index->save($save);
				
				$this->log('Save complete');
				
				if (get_time_left() <= 5)
					$this->_shutdown($crawler);
					
			}
			
			function _shutdown ($crawler) {
			
				App::import('Vendor', 'start_script');
				App::import('Vendor', 'random_string');
				
				$randstr = random_string(10);
								
				file_put_contents(TMP.$randstr, $crawler->save());
				
				//start_script($html->url(array('controller'=>'indexer', 'action'=>'index', true), true));
				
				die();
			}
		}
	}