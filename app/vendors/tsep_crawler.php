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

//TODO: Change this to a component

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
	 * url
	 * The current URL
	 * @var string
	 */
	private $url = '';
	
	/**
	 * agent
	 * The user agent to act as
	 * @var string
	 */
	private $agent = '';
	
	/**
	 * Contructor
	 * Initializes the class
	 * @param string $start The start url
	 * @param string $regex The Regular Expression that URLs must match to be crawled
	 * @param string $elements The elements and their properties that contain the links
	 */
	function __construct($start, $regex, $agent) {
		
		//Queue the start url to be crawled
		if ($start != null)
			array_push($this->urls, $start);
					
		//Set the RegEx
		$this->regex = $regex;
		
		//Set the User Agent
		$this->agent = $agent;
					
		$this->cleanURLs();
		
		//Grab the robots.txt file
		$this->parseRobots($start);
		
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

		$url = $this->url;
		
		$this->url = '';
		
		$type = $this->getType($contents);
		
		//And that is pretty much it
		return new Page($contents, $url, $type);
	}
	
	private function parseRobots ($url) {
		# parse url to retrieve host and path
	    $parsed = parse_url($url);
	    
	    $useragent = $this->agent;
	
	    $agents = array(preg_quote('*'));
	    if($useragent) $agents[] = preg_quote($useragent);
	    $agents = implode('|', $agents);
	
	    # location of robots.txt file
	    $robotstxt = @file("http://{$parsed['host']}/robots.txt");
	    if(!$robotstxt) return true;
	
	    $rules = array();
	    $ruleapplies = false;
	    foreach($robotstxt as $line) {
	      # skip blank lines
	      if(!$line = trim($line)) continue;
	
	      # following rules only apply if User-agent matches $useragent or '*'
	      if(preg_match('/User-agent: (.*)/i', $line, $match)) {
	        $ruleapplies = preg_match("/($agents)/i", $match[1]);
	      }
	      if($ruleapplies && preg_match('/Disallow:(.*)/i', $line, $regs)) {
	        # an empty rule implies full access - no further tests required
	        if(!$regs[1]) return true;
	        # add rules that apply to array for testing
	        $rules[] = preg_quote(trim($regs[1]), '/');
	      }
	    }
	
	    foreach($rules as $rule) {
	      # Push the URL into the 'done' array
				array_push($this->done, url_to_absolute("http://{$parsed['host']}/robots.txt", $rule));
	    }

	}
	
	private function getType($contents) {
		
		if(preg_match('/<[^<>]+>/', $contents)) {
			return 'text/html';
		}
		else {
			return 'text/javascript';
		}
	}
	
	/**
	 * parse
	 * Parses an page and adds all the URLs it can find to $this->urls
	 * @param string $contents The contents to parse
	 */
	private function parse($contents) {
				
		try {
			$type = $this->getType($contents);
			
			switch ($type) {
				case 'text/html':
					$this->parseHTML($contents);
					break;
				case 'text/javascript':
					$this->parseJS($contents);
					break;
				case 'text/css':
					$this->parseCSS($contents);
					break;
				default: //Attempt to parse all three
					$this->parseHTML($contents);
					$this->parseCSS($contents);
					$this->parseJS($contents);
					break;
			}
			
			return true; 
		}
		catch (Exception $ex) {
			
			return false;
		}
	}

	private function parseHTML($contents) {
		
		$dom = new DOMDocument();
		
		@$dom->recover = true;
		@$dom->loadHTML($contents);
		
		$simple = simplexml_import_dom($dom);
		
		unset($dom); //DomDocument is heavy and bloated
		
			
		$links = $simple->xpath('/html/body//a');
		
		foreach ($links as $link){

			array_push($this->urls, url_to_absolute($this->url, $link['href']));
				
		}
		
	}
	
	
	//TODO: Implement Javascript parsing
	/**
	 * parseJS
	 * Parses links from JavaScript
	 * @param string $contents The JavaScript to parse
	 */
	private function parseJS ($contents) {
	
		return true;
	}
	
	//TODO: Implement CSS parsing
	/**
	 * parseCSS
	 * Parses links from CSS
	 * @param string $contents The CSS to parse
	 */
	private function  parseCSS ($contents) {
		return true;
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
		//		unset($this->urls[$key]);
		
		foreach ($this->urls as $key => $value) {
			//Check that the URL is on the same domain
			$parsed = parse_url($value);
			if ($this->regex != @$parsed['host']) 
				unset($this->urls[$key]);

			//Check that the URL is not mailto
			if(preg_match('/mailto\:([^">]+)/', $value))
				unset($this->urls[$key]);
		}
		
		//Reindex the arrays
		$this->done = array_values($this->done);
		$this->urls = array_values($this->urls);
	}
	
}

/**
 * Page
 * A page crawled by TSEPCrawler
 * @author Geoffrey
 *
 */
class Page {
	public $content;
	public $url;
	public $type;
	
	function __construct($content, $url, $type = 'text/html') {
		$this->content = $content;
		$this->url = $url;	
		$this->type = $type;
	}
}