<?php
/**
* Get the time left before the script terminates
* 
* @author Author Name
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: $
*  $LastChangedBy:  $
*  $LastChangedRevision: $
*
*/

/**
 * get_time_limit
 * Gets the amount of time left before the script terminates
 */
function get_time_left () {

	$start = $_SERVER['REQUEST_TIME'];
	
	$max = ini_get('max_execution_time');
	
	$now = microtime(true);
	
	$spent = ($now - $start);

	$left = $max - $spent;
	
	@set_time_limit($left);
	
	return $left;
}