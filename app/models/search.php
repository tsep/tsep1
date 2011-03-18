<?php 
/**
* Search Model
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

class Search extends AppModel {
	
	var $name = 'Search';
	
	var $belongsTo = 'Profile';
	
	/**
	 * @var Profile
	 */
	var $Profile;
	
	/**
	 * Get all the searches that match $phrase
	 * @param string $phrase The phrase to look for
	 */
	function get($phrase) {
		
		$results =  
		
		$this->find('list', array(
			'conditions' => array(
					'Search.phrase LIKE' => '%'.$phrase.'%',
			),
			'fields' => array('Search.id', 'Search.phrase'),
			'limit' => Configure::read('LimitSuggestions'),
			'order' => array('Search.count')
		));
		
		$return = array();
		
		foreach ($results as $key => $result) {
			
			array_push($return, array(
				'id' => $key,
				'label' => $result,
				'value' => $result
			));
			
		}
		
		return $return;
	}
	
	/**
	 * Adds a search $phrase to the log
	 * @param string $phrase The phrase to add
	 */
	function add($phrase) {
		
		$result = $this->findByPhrase($phrase);
										
		if(empty($result['Search']['id'])) {

			$this->create();
			
			if($this->save(array(
				'Search' => array(
					'phrase' => $phrase,
					'count' => 1
				)
			))) {
				return true;
			}
			
		}
		else {
						
			$this->id = $result['Search']['id'];
			
			if($this->saveField('Search.count', $result['Search']['count']++)) {
				return true;
				
			}
			
		}
		
		return false;
	}
}