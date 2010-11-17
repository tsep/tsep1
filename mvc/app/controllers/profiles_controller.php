<?php
/**
* Searches and Creates indexing profiles
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
class ProfilesController extends AppController {

	var $name = "Profiles";
	
	/**
	 * admin_index
	 * The Home Admin Page
	 */
	function admin_index () {
		
		$this->set('profiles', $this->Profile->find("all"));
		$this->set('title','ACP Home');
	
	}
	
	/**
	 * admin_create
	 * Creates a new index (STARTS crawler)
	 */
	function admin_create () {
	
	
	}
	
	/**
	 * search
	 * searches index for search terms
	 * @param string $query
	 * @param string $page
	 * @param string $profile
	 */
	function search ($profile = null, $query = null, $page = null) {
		
		
	
	}
	/**
	 * index
	 * Redirects to search page
	 */
	function index () {
		$this->redirect(array('controller'=>'profiles', 'action'=>'search'), null, true);
	}

}