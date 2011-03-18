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
	
	var $components = array('RequestHandler', 'Session', 'Auth', 'Queue');
	
	var $view = 'Theme';
	
	var $theme = 'default';
	
	/**
	 * @var RequestHandlerComponent
	 */
	var $RequestHandler;
	
	/**
	 * @var SessionComponent
	 */
	var $Session; 
	
	/**
	 * @var AuthComponent
	 */
	var $Auth;
			
	/**
	 * @var QueueComponent
	 */
	var $Queue;
	
    function beforeFilter() {
    	parent::beforeFilter();
    	
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
    	
    	if(isset($this->Auth)) {
    		$this->set('user', $this->Auth->user());
    	}
    	else {
    		$this->set('user', false);
    	}
    
    }
       

    /**
     * Save the current configuration
     */
    function saveConfiguration () {
    	
    	$config = (array)Configure::getInstance();
    	
    	$code = "<?php \n ";
			$code .= '$config = '.var_export($config, true).';';
		
			file_put_contents(CONFIGS.'settings.php', $code);
    }
    
    /**
     * Gets the Queue object
     * @deprecated Use $this->Queue instead
     */
    function getQueue () {
    	
    	App::import('Component', 'Queue');
    	
    	return new QueueComponent();
    }
    
    /**
     * Process all objects in the Queue
     */
    function processQueue () {
    
    	$this->redirect(array('controller' => 'core', 'admin' => true, 'action' => 'batch'), null, true);
    }

}
