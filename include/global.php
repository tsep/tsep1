<?php
/**
* This sets the correct headers that we need. For example UTF-8 encoding of the pages
* it also reads general data that is needed in many places of TSEP
* 
* @author Sebastian P�erl
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/

/*
 * Developer version only
 * Do NOT uncomment this in the production version
 */
sleep(2);

/* The Following value is very important It controls the TSEP Update Url
 * Which is an XML File containing the Information needed to receive updates
 * (obviously) Please leave this alone, Unless you want to break the updates
 * for some odd reason.
 * */
$tsepUpdateUrl = "http://tsep.sourceforge.net/updater/getUpdate.php?"; //<-- Don't forget the "?" at the end!

if (!version_compare(PHP_VERSION, '5.3.3','>='))
    die('PHP version not supported');
   
if ((php_sapi_name() == 'cli' && empty($_SERVER['REMOTE_ADDR'])))
	die('This script cannot be run from the command line');
	
error_reporting(E_ALL ^ (E_NOTICE));

//Functions to set constant values.

// let's make sure the $_SERVER['DOCUMENT_ROOT'] variable is set
if(!isset($_SERVER['DOCUMENT_ROOT'])){ if(isset($_SERVER['SCRIPT_FILENAME'])){
$_SERVER['DOCUMENT_ROOT'] = str_replace( '\\', '/', substr($_SERVER['SCRIPT_FILENAME'], 0, 0-strlen($_SERVER['PHP_SELF'])));
}; };
if(!isset($_SERVER['DOCUMENT_ROOT'])){ if(isset($_SERVER['PATH_TRANSLATED'])){
$_SERVER['DOCUMENT_ROOT'] = str_replace( '\\', '/', substr(str_replace('\\\\', '\\', $_SERVER['PATH_TRANSLATED']), 0, 0-strlen($_SERVER['PHP_SELF'])));
}; };
// $_SERVER['DOCUMENT_ROOT'] is now set - you can use it as usual...


function getClientRoot () {
	
	//Get the Server Root Dir
	$serverRoot = str_replace('\\', '/', TSEP_INCLUDE_DIR);
	//Get the Document Root
	$docRoot = str_replace('\\', '/',$_SERVER['DOCUMENT_ROOT']);
	//Chop off the include dir
	$serverRoot = str_replace('/'.basename($serverRoot), '', $serverRoot);
	
	$clientRoot = str_replace($docRoot, '', $serverRoot);
	
	$proto = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
	
	$clientRoot = $proto.'://'.$_SERVER['HTTP_HOST'].$clientRoot;
	
	return $clientRoot;
}
function genRandomString() {
	$length = 10;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	$string;    
	
	for ($p = 0; $p < $length; $p++) {
	    $string .= $characters[mt_rand(0, strlen($characters))];
	}
	
	return $string;
}

//Define the constants

define('TSEP_ROOT_DIR',__DIR__.'/..');
define('TSEP_INCLUDE_DIR', __DIR__);
define('TSEP_UPDATE_URL', $tsepUpdateUrl);
define('TSEP_CLIENT_ROOT', getClientRoot());
define('TSEP_CACHE_DIR', TSEP_ROOT_DIR.'/cache/'); //<-- Special Note: The cache class wants a '/' at the end of the path!!!

/* Force the browser to use UTF-8 enconding */
header("Content-type: text/html; charset=utf-8");
header("Content-Transfer-Encoding: 8bit");
  
//stop caching dynamic pages
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

//Handle all errors
require_once  TSEP_INCLUDE_DIR.'/class.errorhandler.php';

//Include the DB framework
include_once TSEP_INCLUDE_DIR.'/class.db.php';

$infotxt = file_get_contents(TSEP_INCLUDE_DIR."/conf.db.ini.php"); 
    
if (($infotxt == null)&&($_SERVER['PHP_SELF']!=TSEP_CLIENT_ROOT."/admin/index.php")) {
        
    header("Location:".TSEP_CLIENT_ROOT."/admin/setup/index.php");
    die();
}


//Set the db data
db::loadDBfile($infotxt);

//Include the caching framework
include_once TSEP_INCLUDE_DIR.'/class.cache.php';

//Include the security framework (This is NOT the authentication framework)
require_once TSEP_INCLUDE_DIR.'/class.security.php';

Security::protect();
?>