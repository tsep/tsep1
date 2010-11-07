<?php

/**
 * 
 * This class patches security holes on TSEP.
 * @author Geoffrey
 *
 */

class Security {
	
	/**
	 * protect
	 * protects a file from direct access
	 */
	static function protect () {
		
		$bt = debug_backtrace();
		$end = $bt[0];
		
		$file = $end['file'];
		
		$file = str_replace("\\", "/", $file);
		$path = str_replace("\\", "/", $_SERVER['SCRIPT_FILENAME']);
		if ($path == $file)		
			errorHandler::throwError("This page cannot be directly requested.", errorHandler::FATAL);
	}

}
