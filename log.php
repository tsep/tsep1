<?php
/**
* Log what the user searched for (searchterms) and on what resultlinks he has clicked
*
* @tables tsep_log
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/

require_once( "./include/global.php");
/* to add or remove slashes: contains: "deslash" and "reslash" */
require( TSEP_INCLUDE_DIR."/dereslash.php");
/* Used for IP address formatting and validation */
require_once( TSEP_INCLUDE_DIR."/ipfunctions.php" );
/* Used for logging */
require_once( TSEP_INCLUDE_DIR."/log.class.php" );
    

if ($tsep_config['Logging'] == "true")  // not needed
{               
        $logger = new tsepLogger();
        
        // preparation of always used data
        $ip = formatIP("000.000.000.000");              //default to log
        $typeoflog="error";             //if we are here this should be 1 or 2 later!           
        $timeofentry = time();  // time is always to be set             
        
        if ($tsep_config['Logging_IP'] == "true")
        {
                $hostName = resolveIP( $_SERVER['REMOTE_ADDR'] );
                $ip = formatIP( $_SERVER['REMOTE_ADDR'] );
        }

        if (isset($_GET['url'])) // it has been clicked on a link!
        {
                if ($tsep_config['Logging_result_links'] == "true")
                {                       
                        $typeoflog = 2;   // give as function argument  //1= search term  2=click on link in results
                        $logstring = addslashes($_GET['url']);  //URL used again later (for header information)
                        $_stopWords = "";
                        $logger->writeSearchLog( $typeoflog, $logstring, $timeofentry, $ip, $hostName, $_stopWords );
                }
                //go to the page
                $html_Header ="Location: " . $_GET['url'];              
        }       
        
        
        if (isset($_GET['q']))  // something has been searched
        {       
                if ($tsep_config['Logging_search_term']=="true")
                {
                        $typeoflog = 1;   // give as function argument  //1= search term  2=click on link in results
                        $logstring =  htmlspecialchars(reslash($_REQUEST["q"]));    //this fixes the wrong slash when searching for O'NEIL
            
                        if ($_GET['q']!="")
                        {
                                $_stopWords = getStopwords( $_GET['q'] );
                                $logger->writeSearchLog( $typeoflog, $logstring, $timeofentry, $ip, $hostName, $_stopWords );
                        }
                }
                
                //add all querystrings which have been to this page
                // not using referrer because it might be disabled on users browser

                if (isset($_REQUEST["user_e"]))
                {
                        $user_e=$_REQUEST["user_e"];            
                }
                else
                {
                        $user_e=10;
                        
                }
                if (isset($_REQUEST["e"]))
                {
                $e=$_REQUEST["e"];
                }
                else
                {
                        $e=10;
                }
                if (isset($_REQUEST["s"]))
                {
                        $s=$_REQUEST["s"];      
                }
                else
                {
                        $s=0;
                }
                
                $q = urlencode($_REQUEST["q"]);                         
                $querystring_old = "q=$q&s=$s&e=$e&user_e=$user_e";

        //go back to the search page and continue
        //to prevent error when searchin on domain B from domain A (idea by Manfred Jedlicka)
        if ( substr($_REQUEST["searchpagelocation"],0,7) == "http://" ) {
           $html_Header ="Location: ". $_REQUEST["searchpagelocation"]."?$querystring_old";
        } else {
           $html_Header ="Location: http://".$_SERVER['HTTP_HOST'] . $_REQUEST["searchpagelocation"]."?$querystring_old";
        }
                
        }
        Header($html_Header);
}

// end of php code here

//############## only function below ####################
/**
 * COPIED FROM SEARCH.PHP
 * DON'T KNOW HOW TO USE CODE RECYCLING ON THIS ONE
 * 2005-04-26:TG
 * 
 * Gets the stopwords from the search query string
 * 
 * @tables tsep_stopwords
 * @author Toon Goedhart
 * @lastedited Toon Goedhart
 * @param string $searchQuery
 * @return string Stopwords seperated by pipe symbols
 **/
function getStopwords( $searchQuery ) {
        
        
        $searchFor = trim( str_replace( ";", "", $searchQuery )); // remove ";" -> for sql security: no (simple) injection of commands
        reslash($searchFor);   // add slashes only if needed
        $searchFor = protectQuoted($searchFor, chr(2)); // replace blanks within quoted string by chr(2)
        $lSrchInList = $searchFor;
        $lSrchInList = preg_replace("/[+\(\)<>\"\\\\]/", "", $lSrchInList);
        $lSrchInList = preg_replace("/ +-/", " ", $lSrchInList);
        $lSrchInList = addslashes($lSrchInList);
        $lSrchInList = "'" . preg_replace("/ +/", "','", $lSrchInList) . "'";
        
        $sql = "SELECT * FROM ".db::$prefix."stopwords WHERE stopword IN ($lSrchInList) ORDER BY stopword";
        $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

        $_stopwords = array();
        while ($row = mysql_fetch_assoc($result)) {
                $_stopwords[] = $row["stopword"];
        }
        mysql_free_result($result);
        
        if ( count( $_stopwords ) > 0 ) {
                return implode( " ", $_stopwords ); //was ( "|",$_stopwords)
        } else {
            return "";
        }
}

/**
* COPIED FROM SEARCH.PHP
* DON'T KNOW HOW TO USE CODE RECYCLING ON THIS ONE
* 2005-04-26:TG
* 
* replaces all blanks withing double-quoted strings by $pRepl
*
* in addition, a blank is inserted before "+" signs outside double-quoted strings,
*                                                   which are not preceeded by a blank
*
* e.g. ( with $pRepl = "#" )
*    a b c "d e f" g h i
* -> a b c "d#e#f" g h i
*
* @author Manfred Jedlicka
* @lastedited Manfred Jedlicka
* @param string $pStr
* @param string $pRepl
*/
//------------------------------------------------------------------------------
function protectQuoted($pStr, $pRepl)
//------------------------------------------------------------------------------
{
   $inQuoted = 0;
   $lOut = "";
   for ($i = 0; $i < strlen($pStr); $i++) {
      $lChar = substr($pStr,$i,1);
      $lAppend = false;
      if ( $lChar == "\"" )
         $inQuoted = ( $inQuoted == 0 ? 1 : 0 );

      if ( $inQuoted == 1 )
         $lOut .= ( $lChar == " " ? $pRepl : $lChar );
      
      if ( $inQuoted == 0 ) {
         if     ( strstr("+-<>(", $lChar) and substr($pStr,($i-1),1) != " " )
            $lOut .= " $lChar";
         elseif ( strstr(")",     $lChar) and substr($pStr,($i+1),1) != " " )
            $lOut .= "$lChar ";
         else
            $lAppend = true;
         while ( $lChar == "(" and substr($pStr,($i+1),1) == " " and $i < strlen($pStr) ) {
            $i++;
            $lChar = substr($pStr,$i,1);
         }
         while ( $lChar == " " and substr($pStr,($i+1),1) == " " and $i < strlen($pStr) ) {
            $i++;
            $lChar = substr($pStr,$i,1);
         }
         if    ( $lChar == " " and substr($pStr,($i+1),1) == ")" and $i < strlen($pStr) ) {
            $i++;
            $lChar = substr($pStr,$i,1);
         }
         if ( $lAppend == true )
            $lOut .= $lChar;
      }
   }
   return($lOut);
} // protectQuoted()

?>


