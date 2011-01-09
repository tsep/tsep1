<?php
/**
* Profile Model
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
class Profile extends AppModel {
	
	var $name = 'Profile';
	var $hasMany = 'Index';
	var $validate = array(
		'name' => 'alphaNumeric',
		'url' => 'url'
	);
}