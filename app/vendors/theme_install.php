<?php

function theme_install() {
	
	App::import('Vendor', 'delete_dir');
				
	if(is_dir(TMP.'theme')) {
		
		delete_dir(TMP.'theme');	
	
	}
					
	$zip = new ZipArchive();
					
	$zip->open(TMP.'theme.zip');
	$zip->extractTo(TMP.'theme'.DS);
	$zip->close();
	
	unlink(TMP.'theme.zip');
	
	if(!file_exists(TMP.'theme'.DS.'theme.ini')) {
		
		return false;
	}
	else {
		$theme_config = parse_ini_file(TMP.'theme'.DS.'theme.ini');
		
		//TODO: Sanitize theme name
		
		App::import('Vendor', 'smart_copy');
		
		smart_copy(TMP.'theme'.DS, VIEWS.'themed'.DS.$theme_config['name'].DS);
		
		delete_dir(TMP.'theme');
		
		return true;
	}
}