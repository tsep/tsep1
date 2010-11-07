<?php
/**
* View the logged data
*
* @tables tsep_log
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-06-27 08:17:38 +0200 (Mo, 27 Jun 2005) $
*  @lastedited $LastChangedBy: olaf $
*  $LastChangedRevision: 201 $
*
*/
require_once( __DIR__."/../include/global.php" );	

db::connect();

require_once( TSEP_INCLUDE_DIR."/mmexfunctions.php" ); // mm functions which were placed in every file
require_once( TSEP_INCLUDE_DIR."/datefunctions.php" ); // to read and write last index edit date
require_once( TSEP_INCLUDE_DIR."/rststatistics.php" ); // show statistics
require_once( TSEP_INCLUDE_DIR."/rstnavigation.php" ); // show statistics
require_once( TSEP_INCLUDE_DIR."/putsortpicture.php" ); // show sortorder pictures
require_once( TSEP_INCLUDE_DIR."/cleanstring.php" ); // clean crap from searchstring
/**
 * buildSQLQuerySuffix()
 * 
 * @param $queryString The filter SQL that is to be added to the default SQL query
 * @param $queryAddition The condition that is to be added to $queryString
 * @return string Updated $queryString
 **/
function buildSQLQuerySuffix( $queryString, $queryAddition ) {
	if ($queryString == "") {
	    $queryString = "WHERE ".$queryAddition;
	} else {
		$queryString .= " AND ".$queryAddition;
	}
	
	return $queryString;
} // buildSQLQuerySuffix
/**
 * parseDate()
 * 
 * This routine accepts three formats:
 *  YYYY-[M]M-[D]D
 *  YYYY/[M]M/[D]D
 *  YYYYMMDD
 * 
 * @param string $theDate String containing the date to be checked
 * @return boolean FALSE if date is not valid. Array with year, month and day ([0]=year, [1]=month, [2]=day) if it is.
 **/
function parseDate( $theDate ) {
	$y = -1;
	$m = -1;
	$d = -1;
	
	if ( ereg( "([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $theDate, $regs ) ) {
		$y = $regs[1];
		$m = $regs[2];
		$d = $regs[3];
	} elseif ( ereg( "([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})", $theDate, $regs ) ) {
		$y = $regs[1];
		$m = $regs[2];
		$d = $regs[3];
	} elseif ( ereg( "([0-9]{4})([0-9]{2})([0-9]{2})", $theDate, $regs ) ) {
		$y = $regs[1];
		$m = $regs[2];
		$d = $regs[3];
	}
	
	if ( checkdate( $m, $d, $y ) ) {
		return array( 0 => $y, 1 => $m, 2 => $d );
	} else {
		return FALSE;
	}
} // parseDate
/**
 * parseTime()
 * 
 * This routine accepts three formats:
 *  [H]H:[M]M:[S]S
 *  [H]H.[M]M.[S]S
 *  HHMMSS
 * 
 * @param string $theTime String containing the time to be checked
 * @return boolean FALSE if time isn't valid. Array with hour, minute and second ([0]=hour, [1]=minute, [2]=second) if it is.
 **/
function parseTime( $theTime ) {
	$h = -1;
	$m = -1;
	$s = -1;
	if ( ereg( "([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $theTime, $regs ) ) {
		$h = $regs[1];
		$m = $regs[2];
		$s = $regs[3];
	} elseif ( ereg( "([0-9]{1,2})\.([0-9]{1,2})\.([0-9]{1,2})", $theTime, $regs ) ) {
		$h = $regs[1];
		$m = $regs[2];
		$s = $regs[3];
	} elseif ( ereg( "([0-9]{2})([0-9]{2})([0-9]{2})", $theTime, $regs ) ) {
		$h = $regs[1];
		$m = $regs[2];
		$s = $regs[3];
	}
	
	if ( ($h >= 0) AND ($h <= 23) AND ($m >= 0) AND ($m <= 59) AND ($s >= 0) AND ($s <= 59) ) {
		return array( 0 => $h, 1 => $m, 2 => $s );
	} else {
		return FALSE;
	}
} // parseTime
/**
 * parseIP()
 * 
 * Acceptable format: [99]9.[99]9.[99]9.[99]9
 * 
 * @param string $theIP The IP address that is to be validated
 * @return FALSE if invalid. Array [0-3] with IP address.
 **/
function parseIP( $theIP ) {
	$ip = "";
	
	if ( ereg( "([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})", $theIP, $regs ) ) {
	
		if ( ($regs[1] >= 0 AND $regs[1] <= 255) AND ($regs[2] >= 0 AND $regs[2] <= 255) AND 
			 ($regs[3] >= 0 AND $regs[3] <= 255) AND ($regs[4] >= 0 AND $regs[4] <= 255) ) {
			 
		    return array( 0 => $regs[1], 1 => $regs[2], 2 => $regs[3], 3 => $regs[4] );
			
		} else {
			return FALSE;
			
		}
	}
} // parseIP
_TsepTrace( "<b>Values submitted via GET method:</b>" );
reset( $_GET );
while ( list ($key, $val) = each( $_GET ) ) {
    _TsepTrace("$key => $val");
}
//read pagenumber or calculate page number and totalpages
$pageNum_completeindex = 0;
if (isset($_GET['pageNum_completeindex'])) {
  $pageNum_completeindex = $_GET['pageNum_completeindex'];
}
$startRow_completeindex = $pageNum_completeindex * $tsep_config['maxRows_logview'];
mysql_select_db($database_tsepdbconnection);
// === START ==== write / get search order and field from database ============================
	if (isset($_GET['order']))	// for userdefined search order, otherwise sort by time of entry, newest first
	{	// write new values
		$db_tablename = db::$prefix."internal";	
		 $query = "UPDATE $db_tablename SET stringvalue='".$_GET['order']."' WHERE description='tseplogorder'";
		 $result = mysql_query($query) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
		 $query = "UPDATE $db_tablename SET stringvalue='".$_GET['dir']."' WHERE description='tseplogdirection'";
		 $result = mysql_query($query) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
	}
	// read database values
	mysql_select_db($database_tsepdbconnection);
	$db_tablename = db::$prefix."internal";
	$query_Recordset1 = "SELECT stringvalue FROM $db_tablename WHERE description = 'tseplogdirection'";
	$Recordset1 = mysql_query($query_Recordset1) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	$dir=$row_Recordset1['stringvalue'];
	
	$query_Recordset1 = "SELECT stringvalue FROM $db_tablename WHERE description = 'tseplogorder'";
	$Recordset1 = mysql_query($query_Recordset1) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	$order=$row_Recordset1['stringvalue'];
	
	$sortorder = $order." ".$dir;
// === END==== write / get search order and field from database ============================
/**
 * The filterString contains the filter definition 
 * the admin wants applied to the data.
 **/
$filterString = "";
/**
 * Get the logview options for filtering
 **/
$db_tablename = db::$prefix."log";
$f_logviewtype_qry = "SELECT DISTINCT typeoflog FROM $db_tablename ORDER BY typeoflog";
$f_logviewtype = mysql_query( $f_logviewtype_qry ) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
while (list( $lvt ) = mysql_fetch_row( $f_logviewtype )) {
	$row_f_logviewtype[] = $lvt;
} // while
/**
 * Get the date/time of the earliest record in the _log table.
 * This will be input as a default value for the FROM date/time filter.
 * The END date/time will be TODAY.
 **/
$db_tablename = db::$prefix."log";
$f_logviewtimeofentry_qry = "SELECT timeofentry FROM $db_tablename ORDER BY timeofentry LIMIT 1";
$f_logviewtimeofentry = mysql_query( $f_logviewtimeofentry_qry ) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
if (mysql_num_rows($f_logviewtimeofentry) > 0) {
	list($f_earliest_toe) = mysql_fetch_row( $f_logviewtimeofentry );
	$f_earliest_date = date( "Y-m-d", $f_earliest_toe );
	$f_earliest_time = date( "H:i:s", $f_earliest_toe );
} else {
	$f_earliest_date = date( "Y-m-d" );
	$f_earliest_time = date( "H:i:s" );
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>
      <?php echo $tsep_lng['logview_title']; ?>
      -
      <?php echo $tsep_lng['tsep'];?>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="expires" content="0" />
    <link href="<?php echo TSEP_CLIENT_ROOT?>/static/css/tsep.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN JSCalendar - WAY cool script from http://www.dynarch.com/ -->
    <?php $jscalendar_path = "../js/jscalendar/"; ?>
    <style type="text/css">@import url(<?php echo $jscalendar_path; ?>calendar-win2k-cold-1.css);</style>
<script type="text/javascript" src="<?php echo $jscalendar_path; ?>calendar.js"></script>
<script type="text/javascript" src="<?php echo $jscalendar_path; ?>lang/en_US/calendar.js"></script>
<script type="text/javascript" src="<?php echo $jscalendar_path; ?>lang/<?php echo $tsep_config['Language']; ?>/calendar.js"></script>
<script type="text/javascript" src="<?php echo $jscalendar_path; ?>calendar-setup.js"></script>
    <!-- END JSCalendar - WAY cool script from http://www.dynarch.com/ -->
    
  </head>
  <body>
    <div class="tsepProject">
<?php		
      require( TSEP_INCLUDE_DIR."/indexer_search_table.php" ); //use code-recycling ?>
      <div class="logviewHeadline">
        <?php echo $tsep_lng['logview_head']; ?>
        <br />
        <?php echo $tsep_lng['logview_help'];?>
      </div>
      <div class="filter_Form">
<?php
		/**
		 * Check for all $_GET variables if values are acceptable.
		 * If they are, build $filterString for sorting and
		 * $querySuffix for the SQL query.
		 **/
		$querySuffix = "";
		$fromDateTimeInt = 0;
		$toDateTimeInt = 0;
		$fromIP = "";
		$fromIPNumber = 0;
		$toIP = "";
		$toIPNumber = 0;
		reset( $_GET );
		while ( list( $key, $val ) = each( $_GET ) ) {
		    //echo "$key => $val<br />\n";
			
			switch ($key) {
				case "filterlogviewtype":
				    /**
				     * logViewType can be "" (= ALL) or in the array $row_f_logviewtype.
					 * The ALL option doesn't have to be remembered because it defaults to it.
				     **/
					if ( array_search( $val, $row_f_logviewtype ) !== FALSE ) {
					    $filterString .= "&filterlogviewtype=$val";
						$querySuffix = buildSQLQuerySuffix( $querySuffix, "typeoflog=$val");
					}
					break;
					
				case "filterlogviewcontents":
				    /**
				     * How to check for valid values?
					 * - no HTML
					 * - no javascript
					 * - ...
				     **/
                    if ( $val <>"" ) {
      				    $filterString .= "&filterlogviewcontents=$val";
  	    				$querySuffix = buildSQLQuerySuffix( $querySuffix, "logstring LIKE '%$val%'");
                    }					
					break;
					
				case "filterlogviewfromdate":
				    /**
				     * Only format accepted are variations on: YYYY-MM-DD
				     **/
                    if ( $val <>"" ) {
    					$dateArray = parseDate( $val );
    					if (!$dateArray) {
    						$dateStringFrom = $f_earliest_date;
    					} else {
    						$dateStringFrom = $dateArray[0]."-".$dateArray[1]."-".$dateArray[2];
    					}
    				    $filterString .= "&filterlogviewfromdate=$dateStringFrom";
                    }
					break;
					
				case "filterlogviewfromtime":
				    /**
				     * Only format accepted are variations on: HH:MM:SS
				     **/
                    if ( $val <>"" ) {
    					$timeArray = parseTime( $val );
    					if (!$timeArray) {
    						$timeStringFrom = $f_earliest_time;
    					} else {
    						$timeStringFrom = $timeArray[0].":".$timeArray[1].":".$timeArray[2];
    					}
    				    $filterString .= "&filterlogviewfromtime=$timeStringFrom";
					}
                    break;
					
				case "filterlogviewtodate":
				    /**
				     * Only format accepted are variations on: YYYY-MM-DD
				     **/
                    if ( $val <>"" ) {
    					$dateArray = parseDate( $val );
    					if (!$dateArray) {
    						$dateStringTo = date( "Y-m-d" );
    						$dateArray = array( 0 => date( "Y" ), 1 => date( "m" ), 2 => date( "d" ) );
    					} else {
    						$dateStringTo = $dateArray[0]."-".$dateArray[1]."-".$dateArray[2];
    					}
    				    $filterString .= "&filterlogviewtodate=$dateStringTo";
					}
                    break;
					
				case "filterlogviewtotime":
				    /**
				     * Only format accepted are variations on: HH:MM:SS
				     **/
                    if ( $val <>"" ) {
    					$timeArray = parseTime( $val );
    					if (!$timeArray) {
    						$timeStringTo = date( "H:i:s" );
    						$timeArray = array( 0 => date( "H" ), 1 => date( "i" ), 2 => date( "s" ) );
    					} else {
    						$timeStringTo = $timeArray[0].":".$timeArray[1].":".$timeArray[2];
    					}
    				    $filterString .= "&filterlogviewtotime=$timeStringTo";
					}
                    break;
					
				case "filterlogviewfromip":
				    /**
				     * Only format accepted are variations on: 999.999.999.999
					 * Limits: 000.000.000.000 through 255.255.255.255
				     **/
                    if ( $val <>"" ) {
    					$IPArray = parseIP( $val );
    					if (!$IPArray) {
    					    $fromIP = "0.0.0.0";
    					} else {
    						$fromIP = intval( $IPArray[0] ).".".intval( $IPArray[1] ).".".intval( $IPArray[2] ).".".intval( $IPArray[3] );
    						$fromIPNumber =	intval( $IPArray[0] ) * 16777216 + // 256^3
    										intval( $IPArray[1] ) * 65536 +    // 256^2
    										intval( $IPArray[2] ) * 256 +
    										intval( $IPArray[3] );
    					}
    				    $filterString .= "&filterlogviewfromip=$fromIP";
					}
                    break;
					
				case "filterlogviewtoip":
				    /**
				     * Only format accepted are variations on: 999.999.999.999
					 * Limits: 000.000.000.000 through 255.255.255.255
				     **/
                    if ( $val <>"" ) {
    					$IPArray = parseIP( $val );
    					if (!$IPArray) {
    					    $toIP = "255.255.255.255";
    					} else {
    						$toIP = intval( $IPArray[0] ).".".intval( $IPArray[1] ).".".intval( $IPArray[2] ).".".intval( $IPArray[3] );
    						$toIPNumber =	intval( $IPArray[0] ) * 16777216 + // 256^3
    										intval( $IPArray[1] ) * 65536 +    // 256^2
    										intval( $IPArray[2] ) * 256 +
    										intval( $IPArray[3] );
    					}
    				    $filterString .= "&filterlogviewtoip=$toIP";
					}
                    break;
        //new by Olaf: ipresolve filter
				case "filterlogviewIPresolved":
                    if ( $val <>"" ) {
      				    $filterString .= "&filterlogviewIPresolved=$val";
      					$querySuffix = buildSQLQuerySuffix( $querySuffix, "ipresolved LIKE '%$val%'");
					}
                    break;
					
        //new by Olaf: stopwords filter
				case "filterlogviewStopwords":
                    if ( $val <>"" ) {
      					$val = cleanString( $val );
      				    $filterString .= "&filterlogviewStopwords=$val";
      					$querySuffix = buildSQLQuerySuffix( $querySuffix, "stopwords LIKE '%$val%'");
					}
                    break;
					
			} // switch
		}
		

		if ( $dateStringFrom > 0 or $timeStringFrom > 0 ) {
			$fromDateTimeInt = strtotime( $dateStringFrom." ".$timeStringFrom );
		    $querySuffix = buildSQLQuerySuffix( $querySuffix, "timeofentry>=$fromDateTimeInt" );
		}
		if ( $dateStringTo > 0 or $timeStringTo > 0 ) {
			$toDateTimeInt = strtotime( $dateStringTo." ".$timeStringTo );
		    $querySuffix = buildSQLQuerySuffix( $querySuffix, "timeofentry<=$toDateTimeInt" );
		}
		
		if ($fromIPNumber > 0) {
		    $querySuffix = buildSQLQuerySuffix( $querySuffix, "INET_ATON(ip)>=$fromIPNumber" );
		}
		if ($toIPNumber > 0) {
		    $querySuffix = buildSQLQuerySuffix( $querySuffix, "INET_ATON(ip)<=$toIPNumber" );
		}
		
		/**
		 * Build the SQL query string as specified by the user and execute.
		 **/
		$db_tablename = db::$prefix."log";
		
		$query_completeindex = "SELECT * FROM $db_tablename $querySuffix ORDER BY $sortorder";
		$query_limit_completeindex = sprintf("%s LIMIT %d, %d", $query_completeindex, $startRow_completeindex, $tsep_config['maxRows_logview']);
		
		_TsepTrace( "SQL: ".$query_limit_completeindex );
		
		$completeindex = mysql_query($query_limit_completeindex) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
		$row_completeindex = mysql_fetch_assoc($completeindex);
		if (isset($_GET['totalRows_completeindex'])) {
		  $totalRows_completeindex = $_GET['totalRows_completeindex'];
		} else {
		  $all_completeindex = mysql_query($query_completeindex);
		  $totalRows_completeindex = mysql_num_rows($all_completeindex);
		}
		$totalPages_completeindex = ceil($totalRows_completeindex/$tsep_config['maxRows_logview'])-1;
        ?>
        <form action="<?php $PHP_SELF; ?>" method="get" name="tsep_filterForm" id="tsep_filterForm">
          <div class="filter_logview_BLOCK">
            <div class="filter_textHead">
              <label for="filterlogviewtype">
                <?php echo $tsep_lng['logview_type']; ?>
              </label>
            </div>
            
            <div class="filter_textContent">
              
              <div class="filter_logviewType">
                <select name="filterlogviewtype" class="shortentry" id="filterlogviewtype">
                  <option value="">
                  <?php echo $tsep_lng['filter_logviewtype_all']; ?>
                  </option>
<?php
              		  	foreach ($row_f_logviewtype as $lvt) {
              				if (( isset( $_GET['filterlogviewtype'] )) and ( $_GET['filterlogviewtype'] == $lvt )) {
              				    $selected = " selected";
              				} else {
              					$selected = "";
              				}
              				$str = 'logview_type_$lvt';
              				eval( "\$str = \"$str\";" );
              				$lvtText = $tsep_lng["$str"]. " (".$lvt.")";;
              				echo "          <option value=\"$lvt\"$selected>$lvtText</option>\n";
              			}
                  ?>
                </select>
              </div>
            </div>
          </div>
          
          
          <div class="filter_logview_BLOCK">
            <div class="filter_textHead">
              <label for="filterlogviewcontents">
                <?php echo $tsep_lng['logview_contents']; ?>
              </label>
            </div>
            <div class="filter_textContent">
              <div class="filter_logviewContents" title="<?php echo $tsep_lng['logview_contents']; ?>">
                <input type="text" name="filterlogviewcontents" class="longentry" id="filterlogviewcontents" value="<?php echo isset( $_GET['filterlogviewcontents'] ) ? $_GET['filterlogviewcontents'] : ""; ?>" />
              </div>
            </div>
          </div>
          
          <div class="filter_logview_BLOCK">
            <div class="filter_textHead">
              <?php echo $tsep_lng['logview_time_of_entry']; ?>
            </div>
            <div class="filter_textContent">
              <div class="filter_logviewTime">
                <label for="filterlogviewfromdate">
                  <?php echo $tsep_lng['filter_from']; ?>
                  <input type="text" name="filterlogviewfromdate" class="shortentry" id="filterlogviewfromdate" value="<?php echo isset( $_GET['filterlogviewfromdate'] ) ? $_GET['filterlogviewfromdate'] : ""; ?>"  title ="<?php echo $tsep_lng['filter_date_format']; ?>" />
                </label>
                <input type="text" name="filterlogviewfromtime" id="filterlogviewfromtime" class="shortentry" value="<?php echo isset( $_GET['filterlogviewfromtime'] ) ? $_GET['filterlogviewfromtime'] : ""; ?>"  title ="<?php echo $tsep_lng['filter_time_format']; ?>" />
              </div>
            </div>
          </div>
          <div class="filter_logview_BLOCK">
            
            <div class="filter_textContent">
              <div class="filter_logviewTime">
                <label for="filterlogviewtodate">
                  <?php echo $tsep_lng['filter_to']; ?>
                  <input type="text" name="filterlogviewtodate" class="shortentry" id="filterlogviewtodate" value="<?php echo isset( $_GET['filterlogviewtodate'] ) ? $_GET['filterlogviewtodate'] : ""; ?>"  title ="<?php echo $tsep_lng['filter_date_format']; ?>" />
                </label>
                <input type="text" name="filterlogviewtotime" id="filterlogviewtotime" class="shortentry" value="<?php echo isset( $_GET['filterlogviewtotime'] ) ? $_GET['filterlogviewtotime'] : ""; ?>"  title ="<?php echo $tsep_lng['filter_time_format']; ?>" />
              </div>
            </div>
          </div>
          
          <div class="filter_logview_BLOCK">
            <div class="filter_textHead">
              <?php echo $tsep_lng['logview_ip']; ?>
            </div>
            <div class="filter_textContent">
              <div class="filter_logviewIP">
                <label for="filterlogviewfromip">
                  <?php echo $tsep_lng['filter_from']; ?>
                  <input type="text" name="filterlogviewfromip" id="filterlogviewfromip" class="shortentry" value="<?php echo isset( $_GET['filterlogviewfromip'] ) ? $_GET['filterlogviewfromip'] : ""; ?>"  title ="000.000.000.000" />
                </label>
                
                <label for="filterlogviewtoip">
                  <?php echo $tsep_lng['filter_to']; ?>
                  <input type="text" name="filterlogviewtoip" id="filterlogviewtoip" class="shortentry" value="<?php echo isset( $_GET['filterlogviewtoip'] ) ? $_GET['filterlogviewtoip'] : ""; ?>" title ="255.255.255.255" />
                </label>
              </div>
            </div>
          </div>
          
          
          <div class="filter_logview_BLOCK">
            <div class="filter_textHead">
              <label for="filterlogviewIPresolved">
                <?php echo $tsep_lng['logview_IPresolved']; ?>
              </label>
            </div>
            <div class="filter_textContent">
              <div class="filter_logviewIPresolved" title="<?php echo $tsep_lng['logview_IPresolved']; ?>">
                <input type="text" class="longentry" name="filterlogviewIPresolved" id="filterlogviewIPresolved" value="<?php echo isset( $_GET['filterlogviewIPresolved'] ) ? $_GET['filterlogviewIPresolved'] : ""; ?>"  />
              </div>
            </div>
          </div>
          
          <div class="filter_logview_BLOCK">
            <div class="filter_textHead">
              <label for="filterlogviewStopwords">
                <?php echo $tsep_lng['logview_Stopwords']; ?>
              </label>
            </div>
            <div class="filter_textContent">
              <div class="filter_logviewStopwords" title="<?php echo $tsep_lng['logview_Stopwords']; ?>">
                <input type="text" class="longentry" name="filterlogviewStopwords" id="filterlogviewStopwords" value="<?php echo isset( $_GET['filterlogviewStopwords'] ) ? $_GET['filterlogviewStopwords'] : ""; ?>"  />
              </div>
            </div>
          </div>
          
          <div class="filter_Buttons">
            <div class="filter_submitButton">
              <input type="submit" name="filtersubmitbutton" id="filtersubmitbutton"  value="<?php echo $tsep_lng['filter_filterbutton']; ?>" />
            </div>
            
            <div class="filter_removeButton">
              <a href="logview.php"><?php echo $tsep_lng['filter_filterbutton_Remove_Filter']; ?></a>
            </div>
          </div>
          
          <!-- BEGIN JSCalendar - WAY cool script from http://www.dynarch.com/ -->
<script type="text/javascript" src="<?php echo $jscalendar_path; ?>tsep-jscalendar.js" ></script>
          <!-- END JSCalendar - WAY cool script from http://www.dynarch.com/ -->
        </form>
      </div>
      <div class="breakerBoth">
        &nbsp;
      </div>
      <?php // end of div class filter_form ?>
      <div class="logviewOldBlock">
<?php
	//statistics start
	RSTStatistics ( $startRow_completeindex, $tsep_config['maxRows_logview'], $totalRows_completeindex );
	//statistics end
	//navigation start	
	$queryString_completeindex = $filterString; // carry filter params through the navigation
	list (
		$queryString_completeindex,
		$currentPage_completeindex,
		$totalPages_completeindex,
		$pageNum_completeindex)
		=
		RSTNavigation ("completeindex",
			$queryString_completeindex,
			$currentPage_completeindex,
			$totalPages_completeindex,
			$pageNum_completeindex);
	//navigation end
        ?>
        <div class="logviewBlockHeader">
          <div class="logviewType">
<?php echo $tsep_lng['logview_type'];
				$sortorderField = "typeoflog";
				putSortPicture("$sortorderField","ASC", $order, $dir, "logview.php", $filterString);				
				putSortPicture("$sortorderField","DESC", $order, $dir, "logview.php", $filterString);		
            ?>
          </div>
          <div class="logviewContents">
<?php echo $tsep_lng['logview_contents'];
				$sortorderField = "logstring";
				putSortPicture("$sortorderField","ASC", $order, $dir, "logview.php", $filterString);			
				putSortPicture("$sortorderField","DESC", $order, $dir, "logview.php", $filterString);			
            ?>
          </div>
          <div class="logviewTime">
<?php echo $tsep_lng['logview_time_of_entry'];
				$sortorderField = "timeofentry";
				putSortPicture("$sortorderField","ASC", $order, $dir, "logview.php", $filterString);				
				putSortPicture("$sortorderField","DESC", $order, $dir, "logview.php", $filterString);			
            ?>
          </div>
          <div class="logviewIP">
<?php echo $tsep_lng['logview_ip'];
				$sortorderField = "INET_ATON(ip)";	// needs mysql >3.23. should be changed in future to match ansi SQL.. see http://dev.mysql.com/doc/mysql/en/Miscellaneous_functions.html
				putSortPicture("$sortorderField","ASC", $order, $dir, "logview.php", $filterString);				
				putSortPicture("$sortorderField","DESC", $order, $dir, "logview.php", $filterString);			
            ?>
          </div>
          
          <div class="logviewIPresolved">          
<?php echo $tsep_lng['logview_IPresolved'];
				$sortorderField = "ipresolved";	
				putSortPicture("$sortorderField","ASC", $order, $dir, "logview.php", $filterString);				
				putSortPicture("$sortorderField","DESC", $order, $dir, "logview.php", $filterString);			
            ?>
          </div>
          <div class="logviewStopwords">
<?php echo $tsep_lng['logview_Stopwords'];
				$sortorderField = "stopwords";	
				putSortPicture("$sortorderField","ASC", $order, $dir, "logview.php", $filterString);				
				putSortPicture("$sortorderField","DESC", $order, $dir, "logview.php", $filterString);			
            ?>
          </div>
          
        </div>
<?php
	do
	{
	$whichType = $row_completeindex['typeoflog'];	// do this first
?><div class="logviewBlock"<?php require( TSEP_INCLUDE_DIR."/colorswitch.php" );?>>
          
            <div class="logviewType" title="<?php
				//localize $row_completeindex['typeoflog'];
				$str = 'logview_type_$whichType';
				eval ("\$str = \"$str\";");
				echo $tsep_lng["$str"]. " (".$row_completeindex['typeoflog'].")";		
              // this is the title tag ?>"><?php echo $tsep_lng["$str"]. " (".$row_completeindex['typeoflog'].")";		?>
            </div>
          
            <div class="logviewContents" title="<?php echo $row_completeindex['logstring']; ?>"><?php
            
		if ($whichType == 2) // 2 is link		// make whole line a link (clickable) when it is a link
        { ?>
        <a href="<?php echo $row_completeindex['logstring']; ?>" target="_blank" title="<?php echo $tsep_lng['new_window'];?>
          "><?php
		}
          ?><?php echo $row_completeindex['logstring']; ?><?php
		if ($whichType ==2) // 2 is link
          {?> </a><?php } ?>
          
            </div>
          
            <div class="logviewTime" title ="<?php
				/**
				 * If we're debugging I want to see the seconds
				 **/
				if ( $tsep_config['Use_Debug_Print'] == "true" ) {
					$tsep_config['Date_Style'] = "l, F d Y H:i:s";
				}
				if (!isset($tsep_config['Date_Style']))	// if nothing is set we set this as default
				{
					$tsep_config['Date_Style'] = "l, F d Y h:i a";
				}
				echo datum($tsep_config['Date_Style'],$row_completeindex['timeofentry']);
             //this is the title tag! ?>"><?php echo datum($tsep_config['Date_Style'],$row_completeindex['timeofentry']); ?>
            </div>
            
            <div class="logviewIP" title="<?php
				if ($row_completeindex['ip']=="000.000.000.000")	// we write 0.0.0.0 to the database when we do not log the ip address
				{
					$ip = $tsep_lng['logview_no_IP'];
				}
				else
				{
					$ip= $row_completeindex['ip'];
				}
				echo $ip;  //this is the title tag! ?>"><?php echo $ip;?>
            </div>
            
            <div class="logviewIPresolved" title="<?php
				if ($row_completeindex['ip']=="000.000.000.000")	// we write 0.0.0.0 to the database when we do not log the ip address
				{
					$ipresolved = $tsep_lng['logview_no_IP'];
				}
				else
				{
					$ipresolved= $row_completeindex['ipresolved'];
				}
				echo $ipresolved; //this is the title tag!  
        ?>">
            <?php echo $ipresolved; ?>
            </div>
            
            <div class="logviewStopwords" title="<?php echo $row_completeindex['stopwords']; ?>">
              <?php echo $row_completeindex['stopwords']; ?>
            </div>
       
            
            
            
          </div>
          

<?php
		
	} while ($row_completeindex = mysql_fetch_assoc($completeindex));
?>
<div class="breakerBoth">
        &nbsp;
      </div>
<?php	
	//statistics start
	RSTStatistics ($startRow_completeindex,	$tsep_config['maxRows_logview'],	$totalRows_completeindex );
	//statistics end
	//navigation start	
	list (
		$queryString_completeindex,
		$currentPage_completeindex,
		$totalPages_completeindex,
		$pageNum_completeindex)
		=
		RSTNavigation ("completeindex",
			$queryString_completeindex,
			$currentPage_completeindex,
			$totalPages_completeindex,
			$pageNum_completeindex);
	//navigation end
        ?>
      </div>
<?php
require( TSEP_INCLUDE_DIR."/copyright.php" ); // Olaf Noehring: Use code-recyling whereever possible			
      ?>
    </div>
  </body>
</html>
<?php
mysql_free_result($completeindex);
?>
