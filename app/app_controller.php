<?php
/**
* The main App Controller
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
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller {

	var $helpers = array('Html', 'Session', 'Js', 'Form', 'Paginator');
	
	var $components = array('RequestHandler', 'Session', 'Auth', 'Security');
	
	var $view = 'Theme';
	
	var $theme = 'default';
			
    function beforeFilter() {
    	
    	if(isset($this->Auth)) {
    		
	        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
	        	$this->layout = 'admin';
	        
	        }
	       	else {
	       		$this->Auth->allow('*');	       		
	       	}        	
	    
	    	$this->Auth->loginAction = array('controller'=>'users', 'action' => 'login', 'admin' => 'true');
	    	$this->Auth->logoutRedirect = array('controller'=>'users', 'action' => 'logout', 'admin' => 'true');
	    	$this->Auth->loginRedirect = array('controller' => 'users', 'action' =>'login', 'admin' => 'true');
    		
    	}
    	
    	if(isset($this->RequestHandler)) {
    			            		
    		if ($this->RequestHandler->isAjax())
    			$this->layout = 'ajax';
    			
    		elseif(($this->params['url']['url'] != 'admin')
    			&& (isset($this->params['prefix']) 
    			&& ($this->params['prefix'] == 'admin'))
    			&& ($this->params['url']['url'] != 'admin/users/login')
    			&& ($this->params['url']['url'] != 'admin/users/logout'))
	        	$this->redirect('/admin', null, true);
    	}
    	
    	if(!isset($this->Security)) {
    		App::import('Component', 'Security');
    		$this->Security = new SecurityComponent();
    	}
    	
    	$this->theme = Configure::read('ThemeName');
    }
    
    function beforeRender() {
    	parent::beforeRender();
    	
    	$this->set('version', file_get_contents(CONFIGS.'version.txt'));
    
    }
    
    
    /**
     * Save the configuration to disk
     */
    function _saveConfig () {
    	    	
    	$configs = (array)Configure::getInstance();
   	
   		App::import('Vendor', 'write_config_file');
   		   		
  		write_config_file(CONFIGS.'settings.php', $configs);
    
    }
    
	/**
	 * This function calls a specific hook out of any plugin's hooks.php that matches $pluginFilter
	 * The list of hooks.php files get's cached for a certain time depending on the value of DEBUG.
	 * The 3rd argument &$caller has to be a reference to the caller/variable that get's affected by
	 * the Hook.
	 *
	 * @param string $hook
	 * @param string $pluginFilter
	 * @param mixed $caller
	 */
	function callHooks($hook, $pluginFilter = '.+')
	{
	    // pluginHooks contains an array of plugins that provide a hook File
	    static $hookPlugins = array();
	    
	    if (empty($pluginFilter))
	        $pluginFilter = '.+';
	        
	    $params = func_get_args();
	    
	    // Get rid of $hook, $pluginFilter and &$caller in our $params array
	    array_shift($params);
	    array_shift($params);
	    array_shift($params);
	        
	
	    if (empty($hookPlugins))
	    {
	        $cachePath = 'hook_files';
	            
	        $hookFiles = Cache::read($cachePath);
	        
	        if (empty($hookFiles))
	        {
	            App::import('Core', 'Folder');        
	            $Folder =& new Folder(APP.'plugins');
	            $hookFiles = $Folder->findRecursive('hooks.php');
	            
	            Cache::write($cachePath, $hookFiles);
	        }
	                    
	        
	        foreach ($hookFiles as $hookFile)
	        {
	            list($plugin) = explode(DS, substr($hookFile, strlen(APP.'plugins'.DS)));                
	            require($hookFile);
	            
	            $hookPlugins[] = $plugin;
	            
	            if (preg_match('/'.$pluginFilter.'/iUs', $plugin))
	            {
	                $hookFunction = $plugin.$hook.'Hook';
	                if (function_exists($hookFunction))
	                {
	                    call_user_func_array($hookFunction, array_merge(array(&$caller), $params));
	                }
	            }
	        }        
	    }
	    else 
	    {
	        foreach ($hookPlugins as $plugin)
	        {
	            if (preg_match('/'.$pluginFilter.'/iUs', $plugin))
	            {
	                $hookFunction = $plugin.$hook.'Hook';                    
	                if (function_exists($hookFunction))
	                {
	                    call_user_func_array($hookFunction, array_merge(array(&$caller), $params));
	                }
	            }                   
	        }
	    }
	}
    

}
