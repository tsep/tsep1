<?php 
/**
* Main Error Handler and Logger
* 
* @author geoffreyfishing
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  $LastChangedBy$
*  $LastChangedRevision$
*
*/

require_once __DIR__.'/global.php';

//Note: This file CANNOT be protected by class Security (it has not yet been defined)

class errorHandler {
	
	const FATAL = 0;
	const WARN  = 1;
	const INFO  = 2;
	
	public static function getLog () {
		
		return file_get_contents(TSEP_ROOT_DIR."/cache/".UNIQUE_PREFIX."tsep.log");
	}
    
	private static function log ($msg) {
		
		file_put_contents(TSEP_ROOT_DIR."/cache/".UNIQUE_PREFIX."tsep.log",$msg."\n" ,FILE_APPEND);
		
        self::cleanLog();

	}
	
	private static function cleanLog () {
		
		$lines = file(TSEP_ROOT_DIR.'/cache/'.UNIQUE_PREFIX.'tsep.log'); // reads the file into an array by line
		
		if (count($lines)<=1500)
		  return;
		
		$keep = array_slice($lines,-500, 500); // keep the last 500 elements of the array
		$out = implode("\n", $keep); //Convert the array into a string
		
		file_put_contents(TSEP_ROOT_DIR."/cache/".UNIQUE_PREFIX."tsep.log", $out);
	}
	
    private static function handleInfoError ($error) {
    	//Just Log the Info
    	self::log("INFO:".$error);
    }
    private static function handleWarnError ($error) {
    	
    	//Log and display something to the admin
    	self::log("WARNING:".$error);
    	echo "An Error seems to have occurred. Please check your log file.<br />\n";
    }    
    
    private static function handleFatalError ($error) {
    	self::log($error);
    	ob_end_clean();
    	?>
    	
    	<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
           <html>
            <head>
            <title>TSEP Fatal Error</title>
            <style type="text/css" >
            pre{
            	width:800px;
            	 white-space: pre-wrap;       /* css-3 */
            	 background-color:#CCCCCC;
            	}
            </style>
            </head>
            <body>
                <p><b>A Fatal Error has Occurred</b><br />
                The following error occured:<br />
                <pre><?php echo $error; ?></pre>
                If this is a misconfiguration with the database,
                you might want to 
                <a href="<?php echo TSEP_CLIENT_ROOT; ?>/admin/setup/index.php">run the setup</a> again.
                </p>
                <p><i>Powered By: <a href="http://tsep.sf.net/">The Search Engine Project</a></i></p>
            </body>
        </html>
    	
    	<?php
    	die();
    }
    
    public static function throwError($event, $type) {

    	$bt = debug_backtrace();
    	unset($bt[0]['args']);
    	$event .= "\n".print_r($bt,true);
    	
    	if ($type == self::INFO)
    		self::handleInfoError($event);
    	if ($type == self::WARN)
    		self::handleWarnError($event);
    	if ($type == self::FATAL)
    		self::handleFatalError($event);    	
    }    
}


function error_handler ($errLevel, $errMsg, $errFile, $errLine, $errCtx) {
	
	$error = "Message".$errMsg."\nFile:".$errFile."\nLine:".$errLine."\nContext:".$errCtx;
	
	if ($errLevel== E_ERROR)
		errorHandler::throwError($error, errorHandler::FATAL);
	if ($errLevel== E_WARNING)
		errorHandler::throwError($error, errorHandler::INFO); //We might not want the user to know an error occurred
	if ($errLevel== E_NOTICE)
		errorHandler::throwError($error, errorHandler::INFO);
	
}

set_error_handler('error_handler');

/**
 * 
 * For backwardcompatibility on the old TSEPtrace framework. (Replaced with the new OOP framework)
 * @param string $str
 */
function _TsepTrace ($str) {
	
	errorHandler::throwError($str, errorHandler::INFO);
	
}

?>