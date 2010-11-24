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

	var $name = 'Profiles';
	
	/**
	 * admin_index
	 * The Home Admin Page
	 */
	function admin_index () {
		
		$this->set('profiles', $this->Profile->find("all"));
		$this->set('title','ACP Home');
				
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

		if($id == null) {
			$this->Session->setFlash('Profile was not deleted because a valid id was not supplied.', 'flash_fail');
			$this->redirect(array('controller'=>'profiles', 'action' =>'index', 'admin' =>true), null, true);
		}
		
		$this->Profile->delete($id);
		
		App::import('Vendor', 'start_script');
		
		start_script(
			Router::url(array(
				'controller' => 'indexer',
				'action' => 'cleanup',
				'admin' => true
			),true)
		);
		
		$this->Session->setFlash('The selected profile has been deleted', 'flash_success');
		$this->redirect(array('controller'=>'profiles', 'action' =>'index', 'admin' =>true), null, true);
		
	}
	
	/**
	 * admin_create
	 * Creates a new Indexing Profile (DOES NOT START INDEXER)
	 */
	function admin_create () {
		
		if ($this->RequestHandler->isPost()) {
			
			if($this->Profile->save($this->data)) {
				$this->Session->setFlash('Indexing Profile Created', 'flash_success');
				$this->redirect(array('controller'=>'profiles', 'action' =>'index','admin' =>true), null, true);
			}			
		}
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