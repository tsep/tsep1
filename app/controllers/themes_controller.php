<?php
/**
* Themes Controller
* 
* @author Geoffrey
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  $LastChangedBy$
*  $LastChangedRevision$
*
*/

class ThemesController extends AppController {
	
	var $name = 'Themes';
	var $uses = array();
	
	function admin_index () {
		
		App::import('Vendor', 'list_dirs');
		
		$dirs = list_dirs(VIEWS.'themed');
		
		$themes = array();
		
		foreach ($dirs as $dir) {
			
			if(!file_exists($dir.DS.'theme.ini')) continue;
			
			$theme = array('Theme' => array('name' => basename($dir)));
			array_push($themes, $theme);
		}
		
		$this->set('themes', $themes);
	
	}
	
	function admin_add() {
		
		//TODO:Add a theme
		
		if(!empty($this->data)) {
			
			//TODO: Add validation
			
			$this->log($this->data['Theme']['url']);
			
			if (!empty($this->data['Theme']['url'])) {
				
				//TODO: fix to not use set_time_limit
				
				set_time_limit(0);
				
				if(file_exists(TMP.'theme.zip')) unlink(TMP.'theme.zip');
				
				$file_url = $this->data['Theme']['url'];
				
				App::import('Vendor', 'download_file');
				
				download_file($file_url, TMP.'theme.zip');
				
				App::import('Vendor', 'delete_dir');
				
				if(is_dir(TMP.'theme')) delete_dir(TMP.'theme');
								
				$zip = new ZipArchive();
								
				$zip->open(TMP.'theme.zip');
				$zip->extractTo(TMP.'theme'.DS);
				$zip->close();
				
				unlink(TMP.'theme.zip');
				
				if(!file_exists(TMP.'theme'.DS.'theme.ini')) {
					
					//NOT a valid theme! Abort.
					die();
				}
				
				$themeConfig = parse_ini_file(TMP.'theme'.DS.'theme.ini');
				
				//TODO: Sanitize theme name
				
				App::import('Vendor', 'smart_copy');
				
				smart_copy(TMP.'theme'.DS, VIEWS.'themed'.DS.$themeConfig['themeName'].DS);
				
				delete_dir(TMP.'theme');
				
				//Success!
				
				$this->Session->setFlash('Theme Installed', 'flash_success');
				$this->redirect(array('controller' => 'themes', 'action' => 'index', 'admin' => true), null, true);
			}
			else {
				$this->Session->setFlash('Invalid URL.', 'flash_fail');
				$this->redirect(array('controller' => 'Themes', 'action' => 'add'), null, true);
			}
		}
	}
	
	function admin_delete ($name) {
		
		//TODO:Add security
		
		App::import('Vendor', 'delete_dir');
		
		delete_dir(VIEWS.'themed'.DS.$name);
		
		$this->Session->setFlash('Theme Deleted', 'flash_success');
		
		$this->redirect(array('controller' => 'themes', 'action' => 'index', 'admin' => true));
		
	}
	
	function admin_activate($name) {

		//TODO: Sanitize $name
		
		if(file_exists(VIEWS.'themed'.DS.$name.DS.'theme.ini')) {
			Configure::write('ThemeName', $name);
			$this->saveConfiguration();
		}
	}
}