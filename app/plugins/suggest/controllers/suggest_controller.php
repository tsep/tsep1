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
	
	function beforeFilter() {
		parent::beforeFilter();
		
		$this->layout = 'ajax';
	}
	
	function get() {
		
		$phrase = $this->params['url']['term'];
		
		$this->set('results', $this->Search->get($phrase));
	}
	
	function add() {
		
		$phrase = $this->params['url']['term'];
				
		$this->set('added', $this->Search->add($phrase));
	}
}