<?php
/**
* HTTP Crawler for The Search Engine Project
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

/**
 * TSEPCrawler
 * Example usage:
 * $crawler = new TSEPCrawler('starturl', 'some_regx');
 * while ($result = $crawler->crawl())
 * {
 *  $content_of_page = $result->content;
 *  $url_of_page = $result->url;
 * }
 * 
 * @author Geoffrey
 *
 */
class TSEPCrawler {
	
	/**
	 * regex
	 * The regular expression that urls must match to be crawled
	 * @var string
	 */
	private $regex = '';
	
	/**
	 * urls
	 * URLS that are queued to be crawled
	 * @var array
	 */
	private $urls = array();
	
	/**
	 * done
	 * URLs that have already been crawled
	 * @var array
	 */
	private $done = array();

	/**
	 * Contructor
	 * Initializes the class
	 * @param string $start The start url
	 */
	function __construct($start, $regex) {
		
		//Queue the start url to be crawled
		array_push($this->urls, $start);
		//Set the RegEx
		$this->regex = $regex;
	}
	
	/**
	 * crawl
	 * Advances the crawler to the next URL and returns the page contents
	 * @return TSEPCrawlerPage
	 */
	function crawl() {
		
		//We will return false if there is nothing left to crawl
		if (($this->start == '')&&($this->urls == array()))
			return false;
		
		$url = array_pop($this->urls);
		
		// Create the stream context
		$context = stream_context_create(array(
		    'http' => array(
		        'timeout' => 5      // Timeout in seconds
		    )
		));
		
		// Fetch the URL's contents
		$contents = @file_get_contents($url, 0, $context);
		
		// Check for empties
		if (!empty($contents))
			$this->parse($contents);
			
		/*
		 * If retreiving the contents failed, we don't need to do anything
		 * because the URL will simply be removed from the list. However,
		 * we need to add the URL to $this->done whatever the case is 
		 * because we don't want to call the same page twice (or more)
		 */
			
		array_push($this->done, $url);
		
		//Now remove duplacate URLs, URLs that don't match the RegEx, and already crawled URLs
		cleanUrls();
		
		//And that is pretty much it
		return new TSEPCrawlerPage($content, $url);
	}
	
	/**
	 * parse
	 * Parses an html page and adds all the URLs it can find to $this->urls
	 * @param string $contents The contents to parse
	 */
	private function parse($contents) {
		
	/*
	 * Original PHP code by Chirp Internet: www.chirp.com.au
	 * Please acknowledge use of this code by including this header.
	 */ 
		
	  $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
	  if(preg_match_all("/$regexp/siU", $contents, $matches, PREG_SET_ORDER)) {
	    foreach($matches as $match) {
	    	array_push($this->urls, $math[2]);
	    }
	  }
	
	} 
	
	/**
	 * cleanURLs
	 * Removes all URLs that are duplicates, have already been crawled, or do not match the RegEx
	 */
	private function cleanURLs () {
	
		//Remove duplcates
		$this->urls = array_unique($this->urls);
		$this->done = array_unique($this->done);
		
		//Remove done urls
		array_filter($this->urls, array($this, 'removeDoneURLs'));
		
		//Check the RegEx
		array_filter($this->urls, array($this, 'removeRegEx'));
		
		//Reindex the arrays
		$this->done = array_values($this->done);
		$this->urls = array_values($this->urls);
	}
	
	/**
	 * removeDoneURLs
	 * callback for array_filter to remove urls that are  already done
	 * @param string $var The URL to check
	 */
	private function removeDoneURLs ($var) {
	
		if(in_array($var, $this->done))
			return false;
			
		return true;
	}
	/**
	 * removeRegEx
	 * callback for array_filter to remove urls that do not match the RegEx
	 * @param string $var
	 */
	private function removeRegEx ($var) {
	
		if(preg_match($this->regex, $var))
			return true;
		return false;
	}
}

class TSEPCrawlerPage {
	public $content;
	public $url;
	
	function __construct($content, $url) {
		$this->content = $content;
		$this->url = $url;	
	}
}