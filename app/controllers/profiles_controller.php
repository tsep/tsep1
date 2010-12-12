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
		
		$this->set('profiles', $this->Profile->find('all'));
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
		
		$this->loadModel('Index');
				
		if(!$this->Index->deleteAll(array('Index.profile_id' => $id))) {
			
			$this->log('Failed to remove indices. This is a fatal error.');
			Debugger::log($id);
			
			$this->Session->setFlash('Failed to delete indices of profile. See error log for details', 'flash_fail');
			$this->redirect(array('controller' => 'profiles', 'action' => 'index'), null, true);
		}
		
		if(!$this->Profile->delete($id)) {
			
			$this->log('Failed to remove profile. This is a fatal error.');
			Debugger::log($id);
			
			$this->Session->setFlash('Failed to delete profile', 'flash_fail');
			$this->redirect(array('controller' => 'profiles', 'action' => 'index'), null, true);
		}
				
		
		$this->Session->setFlash('The selected profile has been deleted', 'flash_success');
		$this->redirect(array('controller'=>'profiles', 'action' =>'index', 'admin' =>true), null, true);
		
	}
	
	function admin_view($id = null) {
		
		if ($id == null) {
			$this->Session->setFlash('Their was no profile specified to view', 'flash_fail');
			$this->redirect(array('controller'=>'profiles', 'action' =>'index'),null, true);
		} 
		
		$profile = $this->Profile->findById($id);
		
		if(empty($profile)) {
			$this->Session->setFlash('The profile that you selected to view does not exist', 'flash_fail');
			$this->redirect(array('controller'=>'profiles', 'action' =>'index'),null, true);
		}
		
		$this->set('profile', $profile);
	}
	
	/**
	 * admin_create
	 * Creates a new Indexing Profile (DOES NOT START INDEXER)
	 */
	function admin_create () {
				
		if ($this->RequestHandler->isPost()) {
			
			if (!empty($this->data)) {
				if($this->Profile->save($this->data)) {
					$this->Session->setFlash('Indexing Profile Created', 'flash_success');
					$this->redirect(array('controller'=>'profiles', 'action' =>'index','admin' =>true), null, true);
				}
				else {
					$this->Session->setFlash('Failed to save indexing profile', 'flash_fail');
					$this->redirect(array('controller'=>'profiles', 'action' =>'index','admin' =>true), null, true);
				}			
			}
			else {
				$this->Session->setFlash('No Data to save.', 'flash_fail');
			}
		}
	}
	

}