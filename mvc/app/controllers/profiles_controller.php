<?php
/**
* The Default Page for administration (displays indexing profiles)
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

}