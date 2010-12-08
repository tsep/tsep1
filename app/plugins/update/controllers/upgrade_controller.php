<?php 
/**
 * Not to be confused with the Update controller,
 * this file performs upgrades after the update
 * is downloaded, kind of like an 'installer'
 * for the update.
 */
//TODO: Merge this into the update controller

class UpgradeController extends UpdateAppController {
	
	var $uses = array();
	
	function index () {
		$this->_upgrade();
	}
	
	/**
	 * _upgrade
	 * Upgrades the database
	 */
	function _upgrade() {
		
	}
}