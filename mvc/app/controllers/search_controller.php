<?php

class SearchController extends AppController {
	var $name = 'Search';
	var $uses = array('Index');
	
	function index ($profile = null, $page = null) {
	
		$query = $this->params['url']['q'];
		
		$params= array('conditions' => array(
			'MATCH(Index.text) AGAINST(? IN BOOLEAN MODE)' => array($query)
		));
		
		$matches = $this->Index->find('all', $params);
		
		$this->set('matches', $matches);
	}
}