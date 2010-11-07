<?php
/**
* Split the search in userdefined (!) records. Splits a large amount of search results into different pages
*
* @author Sebastian P�lsterl
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-06-09 22:00:51 +0200 (Do, 09 Jun 2005) $
*  @lastedited $LastChangedBy: sebastian $
*  $LastChangedRevision: 120 $
*
*/

class recordsplit {
	
	var $offset = 5;
	var $results_count;
	var $results_per_page;
	var $start;
	
	/**
	 * Assign values at init
	 * 
	 * @param $results_count integer
	 * @param $results_per_page integer
	 * @param $start integer
	 */
	function recordsplit($results_count, $results_per_page, $start) {
		$this->results_count = $results_count;
		$this->results_per_page = $results_per_page;
		$this->start = $start;
				
		return;
	}
	
	/**
	 * Returns the number of first results on previous page
	 * 
	 * @return false if current page is 1 or the starting result of previous page
	 */
	function getPreviousPageStart() {
		$diff = $this->start - $this->results_per_page;
		return ($diff < 0) ? false : $diff;
	}
	
	/**
	 * Returns the number of the first result on the next page
	 * 
	 * @return false if current page is the last one or the starting result of next page 
	 */
	function getNextPageStart() {
		$sum = $this->start + $this->results_per_page;
		return ($sum > $this->results_count) ? false : $sum;
	}
	
	/**
	 * Returns the number of the first entry on the last page
	 * 
	 * @return integer
	 */
	function getLastPageStart() {
		return $this->results_per_page * $this->getLastPageNumber() - $this->results_per_page;
	}
	
	/**
	 * Returns the number of the last page
	 * 
	 * @return double
	 */
	function getLastPageNumber() {
		return ceil($this->results_count / $this->results_per_page);
	}
	
	/**
	 * Returns the number of the current page
	 * 
	 * @return integer
	 */
	function getCurrentPageNumber() {
		return $this->start / $this->results_per_page + 1;
	}
	
	/**
	 * Returns an array containing the page navigation
	 * 
	 * @return array
	 */
	function getNavigation() {
		global $tsep_lng;
		
		$currentPage = $this->getCurrentPageNumber();
		$lastPage = $this->getLastPageNumber();
		
		// Don't display navigation with only one site
		if ($lastPage == 1) {
			return NULL;
		}
		
		// Don't show link to first page if current page is first page
		if ($currentPage != 1) {
			$start = 0;		
			$pages['first'] = array('title' => $tsep_lng['help_first_page'] ." - ". $tsep_lng['results']." ".($start+1)." ".$tsep_lng['to'] ." ".($start + $this->results_per_page),
									'value' => '&#124;&lt;',
									'start' => $start);
		}
		// show link to previous page only if current page != 1
		if ($this->getPreviousPageStart() !== false) {
			$start = $this->getPreviousPageStart();
			$pages['previous'] = array('title' => $tsep_lng['help_previous_page'] ." - ". $tsep_lng['results']." ".($start+1)." ".$tsep_lng['to'] ." ".($start + $this->results_per_page),
									   'value' => '&lt;&lt;',
									   'start' => $start);		
		}
		
		if ($this->results_count <= 11 * $this->results_per_page) {
			// navigation for 11 or less pages total
			for ($i=1; $i<=$this->getLastPageNumber(); $i++) {
				if ($i == $currentPage) {					
					$pages["$i"] = array('value' => "$i", 'start' => NULL);
				} else {
					$start = $i * $this->results_per_page - $this->results_per_page;
					$pages["$i"] = array('title' => $tsep_lng['results']." ".($start+1)." ".$tsep_lng['to'] ." ".($start + $this->results_per_page),
										 'value' => "$i",
										 'start' => $start);
				}
			}				
		} else {
			// navigation for more than 11 pages of results		
			
			$page_start = $currentPage - $this->offset;
			$page_end = $currentPage + $this->offset;
			
			// first and last page if current page == 1
			if ($page_start < 1) {
				$page_start = 1;
				$page_end = 10;
			}			
			
			// first and last page if current page == last page
			if ($page_end > $lastPage) {
				$page_start = $lastPage - 10;
				$page_end = $lastPage;
			}
			
			// build navigation
			for ($i=$page_start; $i<=$page_end; $i++) {
				if ($i == $currentPage) {
					$pages["$i"] = array('value' => "$i", 'start' => NULL);
				} else {
					$start = $i * $this->results_per_page - $this->results_per_page;
					$pages["$i"] = array('title' => $tsep_lng['results']." ".($start+1)." ".$tsep_lng['to'] ." ".($start + $this->results_per_page),
										 'value' => "$i",
										 'start' => $start);
				}
			}
		}
		
		// show link to next page only if current page != last page
		if ($this->getNextPageStart() !== false) {
			$start = $this->getNextPageStart();
			$pages['next'] = array('title' => $tsep_lng['help_next_page'] ." - ". $tsep_lng['results']." ".($start+1)." ".$tsep_lng['to'] ." ".($start + $this->results_per_page),
								   'value' => '&gt;&gt;',
								   'start' => $start);
		}
		
		// Don't show link to last page if current page is last page
		if ($currentPage != $lastPage) {
			$start = (int) $this->getLastPageStart();
			$pages['last'] = array('title' => $tsep_lng['help_last_page'] ." - ". $tsep_lng['results']." ".($start+1)." ".$tsep_lng['to'] ." ".($start + $this->results_per_page),
								   'value' => '&gt;&#124;',
								   'start' => $start);
		}
		
		return $pages;
	}
	
} // end class
	
	// create object
	$r = new recordsplit($page_count, $tsep_config['How_Many_Results'], $s);
	$pages = $r->getNavigation();
	if(!is_null($pages)) {
		print "<div class=\"DivManyPages\">"; //open div "DivManyPages"
		
		// print navigation
		foreach ($pages as $page) {
			if (!is_null($page['start'])) {
				print "<a href=\"". $script ."?q=". rawurlencode($q) ."&amp;s=". $page['start'] ."&amp;user_e=". $user_e ."\" title=\"". $page['title'] ."\"><span class=\"PageNavigation\">". $page['value'] ."</span></a>\n";
			} else {
				print "<span class=\"PageNavigation\">[". $page['value'] ."]</span>\n";
			}
		}
		
		print "</div>"; //close div "DivManyPages"
	}
	
?>
