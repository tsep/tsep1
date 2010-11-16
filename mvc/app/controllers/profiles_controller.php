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
	
	function admin_index () {
	
		$this->set('profiles', $this->Profile->find("all"));
	
	}
	
	function admin_create () {
	
	
	}
	
	function search ($query = null, $page = null) {
		
		
	
	}
	function index () {
		$this->redirect(array('controller'=>'profiles', 'action'=>'search'), null, true);
	}

}