<?php 
/**
* Searches Controller - Handles Search Suggestions
* 
* @author Geoffrey
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: $
*  $LastChangedBy:  $
*  $LastChangedRevision: $
*
*/

class SearchesController extends AppController {
	
	var $name = 'Searches';
	var $uses = array('Search');
	
	function get($phrase) {
		
		$this->set('results', $this->Search->get($phrase));
	}
	
	function add($phrase) {
	
	}
}