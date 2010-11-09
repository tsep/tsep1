<?php

/**
 * @package The Search Engine Project
 * @version 1.0
 * @copyright (C) 2005 by TSEP Development Team
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @since TSEP 0943
 * @tables tsep_log, tsep_loghits
 * @author Toon Goedhart
 *
 * following will be filled automatically by SubVersion!
 * Do not change by hand!
 *  $LastChangedDate$
 *  @lastedited $LastChangedBy$
 *  $LastChangedRevision$
 **/

require_once( TSEP_INCLUDE_DIR."/tseptrace.php" );

/** 
 * 
 *
 **/
class tsepLogger {
	
	var $_tableLog = null;
	var $_tableLogHits = null;
	var $_retpagesCalcMethod = null;
	
	/**
     * Constructor
     * 
     * Setup the instance for use
     * 
     * @access protected
     */
	function tsepLogger() {
		global $tsep_config;
		
		$this->_tableLog = db::$prefix."log";
		$this->_tableLogHits = db::$prefix."loghits";
		$this->_retpagesCalcMethod = $tsep_config["calc_hits_method"];
	}
	
	/**
	 * tsepLogger::writeSearchLog()
     * 
     * Writes a logentry to the _log and _loghits tables
	 * 
	 * @access public
	 * @param integer $typeoflog Type of log entrie
	 * @param string $logstring The string the user searched for or the URL that was clicked
	 * @param integer $timeofentry UNIX timestamp, time of search
	 * @param string $ip IP address of the user
	 * @param string $hostName Resolved IP address
	 * @param string $stopWords Stopwords in the search string
	 * @return void
	 **/
	function writeSearchLog( &$typeoflog, &$logstring, &$timeofentry, &$ip, &$hostName, &$stopWords ) {
		global $database_tsepdbconnection;
		
		mysql_select_db( $database_tsepdbconnection);

        /**
         * Check if the logstring already exists in the _log table.
         * If it does: increment nr_hits counter in _loghits,
         * if not: insert new record in _loghits
         * Always insert a new record in _log
         **/
        $sql = "SELECT idlog FROM ".$this->_tableLog." WHERE logstring='$logstring' ORDER BY timeofentry ASC";
		$result = mysql_query( $sql);
        $nr_rows = mysql_num_rows( $result );
        
        if ( $nr_rows > 0 ) {
            /**
             * Record exists: inc counter
             **/
            list( $idlog ) = mysql_fetch_row( $result );
            $sql = "SELECT nr_hits FROM ".$this->_tableLogHits." WHERE idlog=$idlog";
    		$result = mysql_query( $sql);
            list( $nr_hits ) = mysql_fetch_row( $result );

            $nr_hits++;
            $sql = "UPDATE ".$this->_tableLogHits." SET nr_hits=$nr_hits WHERE idlog=$idlog";
    		$result = mysql_query( $sql);
            
        } 

		/**
		 * Insert the record in the _log table
		 **/
        $sql = "INSERT INTO ".$this->_tableLog." SET typeoflog=$typeoflog, logstring='$logstring', timeofentry='$timeofentry', ip='$ip', ipresolved='$hostName', stopwords='$stopWords'";
		mysql_query($sql);
        
        if ( $nr_rows == 0 ) {
            /**
             * Record doesn't exit: create one
             **/
	        $new_idlog = mysql_insert_id();
            $sql = "INSERT INTO ".$this->_tableLogHits." SET idlog=$new_idlog, nr_hits=1, returned_pages=0";
    		$result = mysql_query( $sql);
        }
	} // writeSearchLog
	
	/**
	 * tsepLogger::writeReturnedPages()
     * 
     * Writes the number of pages returned by a query to the _loghits table
	 * 
	 * @access public
	 * @param string $logString The string the user searched for
	 * @param integer $nrPages The number of pages returned
	 * @return void
	 **/
	function writeReturnedPages( &$logString, &$nrPages ) {
		
		
		/**
		 * Find the ID of the record with the search term
		 **/
		$sql  = "SELECT ".$this->_tableLog.".idlog, ".$this->_tableLogHits.".returned_pages, ".$this->_tableLogHits.".nr_hits ";
		$sql .= "FROM ".$this->_tableLog.", ".$this->_tableLogHits." ";
		$sql .= "WHERE ".$this->_tableLog.".logstring='$logString' AND ".$this->_tableLog.".idlog=".$this->_tableLogHits.".idlog";

		$result = mysql_query( $sql ) or die( "write returned_results [1]: ".mysql_error() );
		
		if ( mysql_num_rows( $result ) > 0 ) {
		    list( $idlog, $ret_pages, $nr_hits ) = mysql_fetch_row( $result );
			
			switch ( $this->_retpagesCalcMethod ) {
				case '1':
					/* Use the result of the last query */
					$retPages = $nrPages;
					break;
					
				case '2':
					/* Calculate the avg of all search queries */
					if ( $nr_hits > 1 ) {
						$retPages = round( ( ( $ret_pages * ($nr_hits-1) ) + $nrPages) / $nr_hits );
					} else {
						$retPages = $ret_pages;
					}
					break;
                    
                case '3':
                    /* Calculate minimum of all results */
                    if ( $nr_hits > 1 ) {
                        $retPages = min( $ret_pages, $nrPages );
                    } else {
                        $retPages = $ret_pages;
                    }
                    break;
					
                case '4':
                    /* Calculate maximum of all results */
                    $retPages = max( $ret_pages, $nrPages );
                    break;
					
				default:
					$retPages = $nrPages;
			} // switch
			
			$sql = "UPDATE ".$this->_tableLogHits." SET returned_pages=$retPages WHERE idlog=$idlog";
			mysql_query( $sql ) or die( "write returned_results [2]: ".mysql_error() );
		}
	} // writeReturnedPages
	
}

?>