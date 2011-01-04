<?php

class TSEPIndexer {

	private $stopwords;
	
	private function _cleanText($text) {
		
			//Clean out all the HTML
			$text = html_to_text($text);
					
			//Clean out all the stopwords
			foreach ($this->stopwords as $stopword)
				$text = str_replace(' '.$stopword['Stopword']['stopword'].' ', ' ', $text);

			//Clean out the escape characters
			$text = preg_replace('/(&)((?:[a-z][a-z]+))(;)/is', ' ', $text);
			$text = preg_replace('/(&)(#)(\\d+)(;)/is', ' ', $text);
				
			//Clean out all the spaces
			$text = preg_replace('!\s+!', ' ', $text);
			
			$text = trim($text);
			
			return $text;
	}
	
	/**
	 * Constructor
	 * Initialize the indexer
	 * @param array $stopwords
	 * @param TSEPCrawler $crawler The TSEPCrawler to use
	 */
	function __construct($stopwords) {
	
		if (!is_array($stopwords)) {
		
			trigger_error('List of stopwords passed to indexer not valid', E_USER_WARNING);
		}
		else {
		
			$this->stopwords = $stopwords;
		}
		
	} 
	
	/**
	 * parse
	 * Parses a Page and returns the parsed page
	 * @var Page $page The page to parse
	 */
	function parse (&$page) {

		$page = $this->_parse($page);
		
		return $page;
		
	}
	
	/**
	 * _parse
	 * Private function that parses the page and returns
	 * @param Page $page
	 */
	private function _parse($page) {
	
		//If the page is not html
		if($page->type != 'text/html') return false;
		
		//Only keep the body
		$page->content = preg_replace("/.*<body[^>]*>|<\/body>.*/si", "", $page->content);
		
		//Get the Important text
		$page->content = $this->_cleanText($page->content);
		
		return $page;
	
	}

}
