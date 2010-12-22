<?php
/**
* Performs necesary upgrades after updating
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

function upgrade ($settings) {

		file_put_contents(CONFIGS.'settings.ini.php', $settings);
	
		echo Router::url(array('controller' => 'profiles', 'action' => 'index', 'admin' => true));
		
		die();
}