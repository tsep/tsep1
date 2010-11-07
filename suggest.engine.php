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
 *  $LastChangedDate: 2005-06-27 08:17:38 +0200 (Mo, 27 Jun 2005) $
 *  @lastedited $LastChangedBy: olaf $
 *  $LastChangedRevision: 201 $
 **/

require_once( "./include/global.php" );
  
/*************************************************************************************************
 * Global structure of the complete suggest engine:
 * 
 * +-------------+     +------------------+     +-------------------+     +----------------------+
 * | Search box  |     | JavaScript:      |     | PHP:              |     | JavaScript:          |
 * |             |     | processSearchKey |     | suggest.engine    |     | displayResults       |
 * |-------------| --> |------------------| --> |-------------------+ --> +----------------------+
 * | On key down |     | Assembles the    |     | Searches the DB   |     | Displays the results |
 * | the JS code |     | URL and calls    |     | DB for matches.   |     | returned by the PHP  |
 * | is called   |     | the PHP script   |     | Returns results   |     | script. Adds colors  |
 * +-------------+     +------------------+     | in the hidden     |     | for alternating      |
 *                                              | iframe and calls  |     | rows.                |
 *                                              | JS.displayResults |     +----------------------+
 *                                              +-------------------+
 * 
 * ***********************************************************************************************
 * 
 * This script looks for logstrings in the _log table
 * that are similar to what the user is
 * typing in the search box on the search page.
 * 
 * It's output gets sent to an iframe defined
 * on the searchpage. The output is in fact 
 * HTML with JavaScript code that calls a 
 * routine in the suggest.js script. This 
 * routine formats the output and displays it.
 * 
 * The output of this script looks something like below.
 * 
 * <html>
 *   <head>
 *     <script>
 *       g_rr = new Array (
 *           new Array( 'ga snel weg', '2', '2' ),
 *           new Array( 'raadsel', '2', '0' ),
 *           new Array( 'vibo', '4', '30' ),
 *           new Array( 'esther', '7', '30' ),
 *           new Array( 'vloek en een zucht', '1', '0' ),
 *           new Array( 'intercedent', '1', '0' ),
 *           new Array( 'allemaal', '1', '0' ),
 *           new Array( 'eberhart', '3', '0' ),
 *           new Array( 'evenaren', '3', '0' )
 *         );
 * 
 *       function on_load() {
 *         parent.tsep_displayResults( g_rr, 1 );
 *       }
 *       </script>
 *   </head>
 * 
 *   <body onload="on_load()">
 *     <!-- Search term: "" -->
 *   </body>
 * </html>
 **/
    
    if ( empty( $nrresults ) ) {
        $nrresults = $tsep_config["how_many_hints"];
    }
    
    if ( empty( $seq ) ) {
        $seq = 0;
    }
    
    $db_log_tablename = db::$prefix."log";
    $db_loghits_tablename = db::$prefix."loghits";

    if ( !empty( $term ) ) {
    	/**
    	 * If the var $term is set then make the query look for
    	 * all entries that include $term anywhere in the logstring
    	 **/
        $term = addslashes( $term );
    	$query = "SELECT HIGH_PRIORITY logstring, nr_hits, returned_pages FROM $db_log_tablename, $db_loghits_tablename WHERE typeoflog=1 AND $db_log_tablename.idlog=$db_loghits_tablename.idlog AND $db_log_tablename.logstring LIKE '%$term%' ORDER BY $db_loghits_tablename.nr_hits DESC, $db_log_tablename.logstring ASC LIMIT $nrresults";
        $result = mysql_query( $query ) or die( mysql_error() );
        
        $terms = array();
        $i = 0;
        while ( list( $logString, $nrHits, $returnedPages ) = mysql_fetch_row( $result ) ) {
            $terms[$i]["logString"] = addslashes( $logString );
            $terms[$i]["nrHits"] = $nrHits;
            $terms[$i]["returnedPages"] = $returnedPages;
            $i++;
        }
        
    } else {
    	/**
    	 * If $term isn't set display the latest search queries
         * Select all entries in the _log table and sort them timeofentry.
		 * Then select corresponding records in _loghits to show the
		 * number of times the term was used and the number of
		 * returned pages.
    	 **/
        $term = "% no term set %";
    	$query = "SELECT HIGH_PRIORITY idlog, logstring FROM $db_log_tablename WHERE typeoflog=1 ORDER BY timeofentry DESC";
        $result = mysql_query( $query ) or die( mysql_error() );
        
        // Temp array to link logstrings to nrhits and ret_pages
		$terms = array();
        $i = 0;
        while ( list( $idlog, $logString ) = mysql_fetch_row( $result ) ) {
        	/**
        	 * Check if the term already exists
        	 **/
            $found = FALSE;
            for ( $a=0; $a<count( $terms ); $a++ ) {
                if ( $terms[$a]["logString"] == addslashes( $logString )) {
                    $found = TRUE;
                    break;
                }
            }
            
            /**
             * If the term wasn't found, add it to the array
             **/
            if ( !$found ) {
                $terms[$i]["logString"] = addslashes( $logString );
                $a = $i;
                $i++;
            }
            
            /**
             * If we haven't recorded the number of hits yet,
             * try and find them
             **/
            if ( $terms[$a]["nrHits"] == "" ) {
                /**
                 * Look for a corresponding record in the _loghits table
                 **/
                $query = "SELECT HIGH_PRIORITY nr_hits, returned_pages FROM $db_loghits_tablename WHERE idlog=$idlog";
                $lh_result = mysql_query( $query ) or die( mysql_error() );
                
                if ( mysql_num_rows( $lh_result ) > 0 ) {
                    list( $nrHits, $returnedPages ) = mysql_fetch_row( $lh_result );
                    
                    $terms[$a]["nrHits"] = $nrHits;
                    $terms[$a]["returnedPages"] = $returnedPages;
                }
            }
        } // while
        
        /**
         * Reduce the array to the disired number of results
         **/
        $terms = array_slice( $terms, 0, $nrresults );
    }
    
    /**
     * build the string to output
     **/
    $html  = "<html>\n";
    $html .= "  <head>\n";
    $html .= "  <meta http-equiv=\"expires\" content=\"0\" />\n";
    $html .= "    <script>\n";
    $html .= "      resultArray = new Array (\n";
    
    $first = TRUE;
    for ( $i=0; $i<count( $terms ); $i++ ) {
    	if ( !$first ) {
    	    $html .= ",\n";
    	}
    	/**
    	 * Build the JavaScript array with the count and string
    	 **/
    	$html .= "          new Array( '".$terms[$i]["logString"];
        /**
         * Include number of returned pages
         **/
        $html .= "', '".number_format( $terms[$i]["nrHits"], 0, ",", "." );
        /**
         * Include number of times the term is used
         **/
        $html .= "', '".number_format( $terms[$i]["returnedPages"], 0, ",", "." );
    	$html .= "' )";
        $first = FALSE;
    } // while
    
    $html .= "\n        );\n\n";
    $html .= "      function on_load() {\n";
    /**
     * tsep_displayResults() is the JavaScript routine that displays the results
     **/
    $html .= "        parent.tsep_displayResults( resultArray, $seq );\n";
    $html .= "      }\n";
    $html .= "      </script>\n";
    $html .= "  </head>\n\n";
    $html .= "  <body onload=\"on_load()\">\n";
    $html .= "    <!-- Search term: \"$term\" -->\n";
    $html .= "  </body>\n";
    $html .= "</html>\n";
    
    echo $html;
?>