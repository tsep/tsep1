<?php
/**
* The main App Controller
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

	var $helpers = array('Html', 'Session', 'Javascript', 'Form');
	
	var $components = array('RequestHandler', 'Session', 'Auth');
	
	
    function beforeFilter() {
    	
    	
        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
        	$this->layout = 'admin';
        }
       	else {
       		$this->Auth->allow('*');
       	}        	
    
    	$this->Auth->loginAction = array('controller'=>'users', 'action' => 'login', 'admin' => 'true');
    	$this->Auth->logoutRedirect = array('controller'=>'users', 'action' => 'logout', 'admin' => 'true');
    	$this->Auth->loginRedirect = array('controller' => 'profiles', 'action' =>'index', 'admin' => 'true');
    
    }
    

}
