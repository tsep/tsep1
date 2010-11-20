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
		var $uses = array('Index', 'Stopword');
		
		function index() {
			
		}
		
		
		function _cleanText($text, $stopwords) {
		
			//Clean out all the HTML
			$text = strip_tags($text);
			
			//Clean out all the stopwords
			foreach ($stopwords as $stopword)
				$text = str_replace($stopword['Stopword']['stopword'], ' ', $text);

			//Clean out all the spaces
			$text = preg_replace('!\s+!', ' ', $text);
			
			return $text;
		}
		
		function _index($profile) {
			
			//Remove all indexes of that profile
			$this->Index->deleteAll(array('Index.profile_id' => $profile['Profile']['id']), false);
			
			
			//Import PHPCrawler
			App::import('Vendor', 'PHPCrawler', array('file'=>'phpcrawler'.DS.'phpcrawler.class.php'));
			
			
			//Load the stopwords
			$stopwords = $this->Stopword->find('all');
			
			
			class MyCrawler extends PHPCrawler 
			{
			  function handlePageData($page_data) 
			  {
			  	//Grab the content of the body
			  	$page_data['source'] = preg_replace("/.*<body[^>]*>|<\/body>.*/si", "", $page_data['source']);
			  				  	
			  	//Get out the important stuff
			  	$page_data['source'] = $this->_cleanText($page_data['source'], $stopwords);
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