<?php

class TSEPIndexer {

	private $stopwords;
	private $crawler;
	
	
	private function cleanText($text) {
		
			//Clean out all the HTML
			$text = strip_tags($text);
			
			//Clean out all the stopwords
			foreach ($this->stopwords as $stopword)
				$text = str_replace($stopword['Stopword']['stopword'], ' ', $text);

			//Clean out all the spaces
			$text = preg_replace('!\s+!', ' ', $text);
			
			return $text;
	}
	
	/**
	 * Constructor
	 * Initialize the indexer
	 * @param array $stopwords
	 * @param TSEPCrawler $crawler The TSEPCrawler to use
	 */
	function __construct($stopwords, $crawler) {
	
		if (!is_array($stopwords))
			throw new Exception('Stopwords is not an array');
		if (get_class($crawler)!= 'TSEPCrawler')
			throw new Exception('The passed crawler is corrupt');
		
		$this->stopwords = $stopwords;
		$this->crawler = $crawler;
	
	} 
	
	/**
	 * index
	 * Advances the indexer to the next page and returns the content
	 * @return TSEPIndex
	 */
	function index () {
	
		$crawl = $this->crawler->crawl();
		
		//Return if $crawl is false
		if(!$crawl)	return $crawl;
		
		
		//Only keep the body
		$crawl->content = preg_replace("/.*<body[^>]*>|<\/body>.*/si", "", $crawl->content);
		
		//Get the Important text
		$crawl->content = $this->cleanText($crawl->content);
		
		
		return $crawl;
	}

}
