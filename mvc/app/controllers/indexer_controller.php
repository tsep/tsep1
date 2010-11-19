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
		var $uses = array('Index');
		
		function index() {
			
		}
		
		
		function _getImptText($text) {
		
			return $text;
		}
		
		function _index($profile) {
			
			//Remove all indexes of that profile
			$this->Index->deleteAll(array('Index.profile_id' => $profile['Profile']['id']), false);
			
			
			//Import PHPCrawler
			App::import('Vendor', 'PHPCrawler', array('file'=>'phpcrawler'.DS.'phpcrawler.class.php'));
			
			//Import HTMLtoTEXT
			App::import('Vendor', 'htmltotext');
			
			class MyCrawler extends PHPCrawler 
			{
			  function handlePageData($page_data) 
			  {
			  	//Grab the content of the body
			  	$page_data['source'] = preg_replace("/.*<body[^>]*>|<\/body>.*/si", "", $page_data['source']);
			  	
			  	$htt = new htmltotext($page_data['source']);
			  	
			  	//Grab the text of the body
			  	$page_data['source'] = $htt->get_text();
			  	
			  	//Get out the important stuff
			  	$page_data['source'] = $this->_getImptText($page_data['source']);
			  }
			}
			
			$crawler = new MyCrawler();
			
			$crawler->setURL($profile['Profile']['url']);
			
			$crawler->addReceiveContentType("/text\/html/");
			$crawler->addFollowMatch($profile['Profile']['regex']);
			
			$crawler->setTmpFile(TMP.DS.'phpcrawl');
			
			$crawler->go();
		}
	}