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
		
		$this->Session->setFlash('Welcome to the Administration Control Panel!','flash_success');
		
	}
	
	/**
	 * admin_edit
	 * Edit an Indexing Profile's properties
	 * @param mixed $id
	 */
	function admin_edit($id = null){
	
	}
	
	/**
	 * admin_delete
	 * Deletes an indexing profile AND all associated data
	 * @param unknown_type $id
	 */
	function admin_delete ($id = null) {
	
	}
	
	/**
	 * admin_create
	 * Creates a new index (STARTS crawler)
	 */
	function admin_create () {
	
		$this->Session->setFlash('Indexing has been queued, index may take a moment to appear depending on the size of the site.', 'flash_warn');
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