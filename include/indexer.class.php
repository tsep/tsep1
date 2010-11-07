<?php

/**
 * @package The Search Engine Project
 * @version 2.0
 * @copyright (C) 2005 by TSEP Development Team
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @since TSEP 0942
 * @tables tsep_internal
 * @author Toon Goedhart
 *
 * following will be filled automatically by SubVersion!
 * Do not change by hand!
 *  $LastChangedDate: 2005-08-15 17:13:45 +0200 (Mo, 15 Aug 2005) $
 *  @lastedited $LastChangedBy: manfred $
 *  $LastChangedRevision: 286 $
 *
*/


/** 
 * Provides a framework around the functionality to prevent 
 * running multiple instances of the indexer.
 **/
class activeIndexer {
	
	var $FnIndexerIsRunning;
	
	/**
     * Constructor
     * @access protected
     */
	function activeIndexer() {
        global $tsep_config;
        
		require_once( TSEP_INCLUDE_DIR."/configfunctions.php" );
		$this->FnIndexerIsRunning = $tsep_config["tmpPath"] . "/IndexerIsRunning.tmp";
	}
	
	/**
	 * Appends an info to the indexer-lock-file
	 * 
	 * @access public
	 * @return void 
	 **/
	function setIndexerRunningInfo($pInfo, $pDoTime = False) {

		if ( $pDoTime = True ) {
			$pInfo = "<small>[" . date("D Y.m.d H:i:s T") . "]</small> $pInfo\n";
		} else {
			$pInfo = "$pInfo\n";
		}
        $pInfo = ( is_utf8($pInfo) ) ? $pInfo : utf8_encode($pInfo);
        $pInfo = "&nbsp;&nbsp; $pInfo"; 

		if ( !($hFn = fopen($this->FnIndexerIsRunning, "a")))
			return "error creating/opening file: " . $this->FnIndexerIsRunning;
		fwrite($hFn, "$pInfo");
		fclose($hFn);
		
	}
	
	/**
	 * Touches the indexer-lock-file
	 * 
	 * @access public
	 * @return void 
	 **/
	function touchIndexerRunning() {
		touch($this->FnIndexerIsRunning);
	}
	
	/**
	 * Deletes the indexer-lock-file
	 * This means the indexer is inactive.
	 * 
	 * @access public
	 * @return void 
	 **/
	function resetIndexerRunning() {
		@unlink($this->FnIndexerIsRunning);
	}
	
	/**
	 * Checks if the indexer is allowed to start by:
	 *  If the indexer-lock-file does not exist -> OK to start
	 *  If the indexer-lock-file does exist and timeToNextRun() returns "" -> OK to start
	 *  otherwise, the content of the indexer-lock-file is returned 
	 * 
	 * @access public
	 * @return "" if OK to start, else the content of indexer-lock-file is returned 
	 **/
	function indexerMayStart() {
		
		if ( !@file_exists($this->FnIndexerIsRunning))
			return "";
		$lInfo = $this->timeToNextRun();
		if ( $lInfo == "" )
		    return "";

		$lTxt = "unknown status";
		if ( file_exists($this->FnIndexerIsRunning) )
		   $lTxt = join("<br>", file($this->FnIndexerIsRunning));
		return ( $lInfo . $lTxt );
	}
	
	/**
	 * Calculates the time in seconds to the next possible indexer run
	 * If the indexer-lock-file is elder than 15 seconds (from now) -> OK
	 * 
	 * @access public
	 * @return "" if OK - else an Infomsg
	 **/
	function timeToNextRun() {
		global $tsep_lng;
		
		$tm_file = fileatime($this->FnIndexerIsRunning);
		$tm_curr = time();

		$diff = 15 - ( $tm_curr - $tm_file );
		if ( $diff < 0 ) // last touch() is elder than 15 secs? - OK
			return ( "" );
		$lInfo  = "<br><i>" . date("D Y.m.d H:i:s T",$tm_curr) . " &nbsp; = &nbsp; " . $tsep_lng['logview_time_of_entry'] . "<br>";
		$lInfo .= date("D Y.m.d H:i:s T",$tm_file) . " &nbsp; = &nbsp; " . $tsep_lng['logview_time_of_entry'] . " of messagefile:" . "</i><br>";
        $lInfo = ( is_utf8($lInfo) ) ? $lInfo : utf8_encode($lInfo);
		return ( $lInfo );
	}
	
	/**
	 * Returns a timestamp corrected for the difference in time between the server and local time
	 * 
	 * @access public
	 * @return integer Timestamp
	 **/
	function getTimeStamp() {
		global $tsep_config;
		
		$timeStamp = time() + ($tsep_config["Hour_Difference"] * 60 * 60);
		return $timeStamp;
	}

}
?>
