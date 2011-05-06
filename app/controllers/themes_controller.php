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
                
                $this->Queue->addJob('theme_install');
                $this->Queue->addJob('theme_download', array($this->data['Theme']['url']));
                
                $this->processQueue();
            }
            else {
                $this->Session->setFlash('Invalid URL.', 'flash_fail');
                $this->redirect(array('controller' => 'Themes', 'action' => 'add'), null, true);
            }
        }
    }
    
    function admin_delete ($name) {
        
        //TODO:Add security
        
        $this->Queue->addJob('theme_delete', array($name));
        
        $this->processQueue('admin/themes');
    }
    
    function admin_activate($name) {

        //TODO: Sanitize $name
        
        if(file_exists(VIEWS.'themed'.DS.$name.DS.'theme.ini')) {
            Configure::write('ThemeName', $name);
            $this->saveConfiguration();
        }
    }
}