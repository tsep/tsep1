<?php

function theme_delete ($name, $controller) {
	
	App::import('Vendor', 'delete_dir');
		
	delete_dir(VIEWS.'themed'.DS.$name);
		
	$controller->Session->setFlash('Theme Deleted', 'flash_success');
	
	return true;			
}		