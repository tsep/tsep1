<?php

require_once __DIR__.'/../../include/global.php';

$path = $_GET['page'];
    
$path = preg_replace("/[^a-zA-Z0-9\s]/","", $path);
    
$path = TSEP_ROOT_DIR."/admin/ajax-pages/${path}.php";
    
if (!file_exists($path)){
  	header("HTTP/1.0 404 Not Found");
  	errorHandler::throwError("Page does not exist", errorHandler::FATAL); 	
}
else    	
	include $path;