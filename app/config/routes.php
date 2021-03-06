<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
if (file_exists(CONFIGS.'settings.php') && !file_exists(TMP.'install.tmp')){
    Router::connect('/', array('controller' => 'indices', 'action' => 'search'));
    /**
 * ...and connect the rest of 'Pages' controller's urls.
 */
    Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
    
/**
 * The Default 'admin' page
 */
    Router::connect('/admin', array('controller' => 'profiles', 'action' =>'index', 'admin' => true));
}
else{  
    //Not installed yet
    
    Router::connect('/install', array('action' => 'index', 'plugin' => 'install'));
    Router::connect('/install/:controller', array('action' => 'index', 'plugin' => 'install'));
    Router::connect('/install/:controller/:action/*', array('plugin' => 'install'));
    
    Router::connect('/*', array('plugin' => 'install', 'controller' => 'install'));
    
}
    