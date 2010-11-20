<?php
class MaxTime {

	private static $startTime;
	private static $maxTime;
	private static $errMargin;
	
	/**
	 * start
	 * Start the timer
	 * @param int $time The number of seconds to allow for error
	 */
	static function start($time) {
		
		self::$maxTime = ini_get('max_execution_time'); 
		self::$errMargin = $time;
		
		$mtime = microtime(); 
   		$mtime = explode(" ",$mtime); 
   		$mtime = $mtime[1] + $mtime[0]; 
   		self::$startTime = $mtime;	 
	}
	
	/**
	 * get
	 * Get the approx time left before the script is killed
	 */
	static function get () {
			$mtime = microtime(); 
			$mtime = explode(" ",$mtime); 
			$mtime = $mtime[1] + $mtime[0]; 
			$endtime = $mtime; 
			$totaltime = ($endtime - $starttime); 
			
			$timeleft = ($totaltime + self::$errMargin);
		
			return $timeleft;
	}

}