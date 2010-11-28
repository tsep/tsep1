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
	 * elements
	 * Link elements
	 * @var array
	 */
	private $elements = array();
	/**
	 * url
	 * The current URL
	 * @var string
	 */
	private $url = '';

	/**
	 * Contructor
	 * Initializes the class
	 * @param string $start The start url
	 * @param string $regex The Regular Expression that URLs must match to be crawled
	 * @param string $elements The elements and their properties that contain the links
	 */
	function __construct($start, $regex, $elements) {
		
		//Queue the start url to be crawled
		if ($start != null)
			array_push($this->urls, $start);
					
		//Set the RegEx
		$this->regex = $regex;
		
		//Set the elements
		$this->elements = $elements;
			
		$this->cleanURLs();
		
	}
	
	/**
	 * crawl
	 * Advances the crawler to the next URL and returns the page contents
	 * @return Page
	 */
	function crawl() {
		
		
		//We will return false if there is nothing left to crawl
		if (empty($this->urls))
			return false;
		
		$this->url = array_pop($this->urls);
		
		// Create the stream context
		$context = stream_context_create(array(
		    'http' => array(
		        'timeout' => 5      // Timeout in seconds
		    )
		));
		
		// Fetch the URL's contents
		$contents = @file_get_contents($this->url, 0, $context);
		
		// Check for empties
		if (!empty($contents))	$this->parse($contents);
			
			
		/*
		 * If retreiving the contents failed, we don't need to do anything
		 * because the URL will simply be removed from the list. However,
		 * we need to add the URL to $this->done whatever the case is 
		 * because we don't want to call the same page twice (or more)
		 */
			
		array_push($this->done, $this->url);
		
		//Now remove duplacate URLs, URLs that don't match the RegEx, and already crawled URLs
		$this->cleanUrls();
		
		//And that is pretty much it
		return new Page($contents, $this->url);
	}
	
	/**
	 * parse
	 * Parses an html page and adds all the URLs it can find to $this->urls
	 * @param string $contents The contents to parse
	 */
	private function parse($contents) {
		
		CakeLog::write('error','Begin Parsing Contents');
		
		$dom = new DOMDocument();
		@$dom->loadHTML($contents);
		
		$simple = simplexml_import_dom($dom);
		
		foreach ($this->elements as $element){
			
			$results = $simple->xpath('//'.$element['Element']['tag']);
			
			foreach ($results as $result)
				array_push($this->urls, url_to_absolute($this->url, $result[$element['Element']['property']]));
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
		foreach ($this->urls as $key => $value) 	
			if(in_array($value, $this->done))
				unset($this->urls[$key]);
		//TODO:Design a user friendly system of creating a regex
		//Check the RegEx
		//foreach ($this->urls as $key => $value) 	
		//	if(!preg_match($this->regex, $value))
		//		unset($this->urls[$key]);;
		
		//Reindex the arrays
		$this->done = array_values($this->done);
		$this->urls = array_values($this->urls);
	}
	
	function __sleep() {
		
		$this->cleanURLs();

		return array('regex', 'urls', 'done', 'elements');
	}
	
	function __wakeup() {
		
		
	}
	
}

/**
 * TSEPCrawlerPage
 * A page crawled by TSEPCrawler
 * @author Geoffrey
 *
 */
class Page {
	public $content;
	public $url;
	
	function __construct($content, $url) {
		$this->content = $content;
		$this->url = $url;	
	}
}