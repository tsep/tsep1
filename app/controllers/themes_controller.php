<?php
/**
* Themes Controller
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

class ThemesController extends AppController {
	
	var $name = 'Themes';
	var $uses = array();
	
	function admin_index () {
		
		//TODO:List the themes installed
	}
	
	function admin_add() {
		
		//TODO:Add a theme
		
		if(!empty($this->data)) {
			
			//TODO: Add validation
			
			$this->log($this->data['Theme']['url']);
			
			if (!empty($this->data['Theme']['url'])) {
				
				//TODO: fix to not use set_time_limit
				
				set_time_limit(0);
				
				$file_url = $this->data['Theme']['url'];
				
				App::import('Vendor', 'download_file');
				
				download_file($file_url, TMP.'theme.zip');
								
				$zip = new ZipArchive();
				
				//TODO: Fix secuirty hole
				
				$zip->open(TMP.'theme.zip');
				$zip->extractTo(APP.'views'.DS.'themed'.DS);
				$zip->close();
				
				unlink(TMP.'theme.zip');
				
				
				
			}
			else {
				$this->Session->setFlash('Invalid URL.', 'flash_fail');
				$this->redirect(array('controller' => 'Themes', 'action' => 'add'), null, true);
			}
		}
	}
	
	function admin_delete ($name) {
		//TODO:Delete a theme
	}
	
	function admin_activate($name) {

		//TODO: Sanitize $name
		
		if(is_dir(VIEWS.'themed'.DS.$name)) {
			Configure::write('ThemeName', $name);
			$this->_saveConfig();
		}
	}
}