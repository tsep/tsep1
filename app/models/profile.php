<?php
class Profile extends AppModel {
	
	var $name = 'Profile';
	var $hasMany = 'Index';
	var $validate = array(
		'name' => 'alphaNumeric',
		'url' => 'url'
	);
}