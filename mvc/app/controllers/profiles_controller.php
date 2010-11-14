<?php
class ProfilesController extends AppController {

	var $name = "Profiles";
	
	function index () {
	
		$this->set('profiles', $this->Profile->find("all"));
	
	}

}