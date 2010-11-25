<?php

/**
 * @package The Search Engine Project
 * @copyright (C) 2005 by TSEP Development Team
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @since TSEP 0941
 * @author Toon Goedhart
 *
 * following will be filled automatically by SubVersion!
 * Do not change by hand!
 *  $LastChangedDate$
 *  @lastedited $LastChangedBy$
 *  $LastChangedRevision$
 *
*/

require_once( "../include/global.php" );
require_once( TSEP_INCLUDE_DIR."/logviewstats.class.php" );


/**
 * Echo the page header
 * 
 * @return void
 **/
function showHeader() {
	global $tsep_lng, $tsep_config;
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>
      <?php echo $tsep_lng['logviewstats_title']; ?>
      -
      <?php echo $tsep_lng['tsep'];?>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="expires" content="0" />
    <link href="<?php echo TSEP_CLIENT_ROOT?>/static/css/tsep.css" rel="stylesheet" type="text/css" />
  </head>
  <body>

    <div class="tsepProject">
<?php require( TSEP_INCLUDE_DIR."/indexer_search_table.php" ); ?>
      <div class="logviewstatsHeadline"><?php echo $tsep_lng['logviewstats_head']; ?></div>

<?php
}


/**
 * Echo the page footer
 * 
 * @return void
 **/
function showFooter() {
	global $tsep_lng, $tsep_config;

	require( TSEP_INCLUDE_DIR."/copyright.php" );
	echo "</div>\n\n";
	echo "</body>\n";
	echo "</html>\n";
}


/**
 * Shows all stats passed in $stats and $topLists
 * 
 * @param array $stats Statistics in numbers
 * @param array $topLists Statistics in lists
 * @return void
 **/
function showStats( &$stats, &$topLists ) {
	global $tsep_lng, $tsep_config;
	
	showHeader();
	
	/**
	 * Print the global statistics
	 **/
	while ( list( $key, $val ) = each( $stats ) ) {
	?><div class="logviewstats_Block" ><?php
		if ( $val == "group" ) {
		    echo "<div class=\"logviewstats_group\">".$tsep_lng[$key]."</div>\n";
		} else {
			echo "<div class=\"logviewstats_head\">".$tsep_lng[$key]."</div>\n";
			echo "<div class=\"logviewstats_content\">".$val."</div>\n";
		}
		?></div><?php 
	} // while
	

	/**
	 * Print the top lists
	 **/
	while ( list( $key, $topItem ) = each( $topLists ) ) {
	?><div class="logviewstats_Block"><?php
		if ( $topItem == "group" ) {
			echo "<div class=\"logviewstats_group\" >".$tsep_lng[$key]."</div>\n";
		} else {			
			if ( $topItem["link"] <> "" ) {
			    $linkOpen = "<a href=\"".$topItem["link"]."\" title=\"".$tsep_lng['logviewstats_DrillDown']."\" >";
				$linkClose = "</a>";
			} else {
			    $linkOpen = "";
				$linkClose = "";
			}
			echo "<div class=\"logviewstats_head\">$linkOpen".$tsep_lng[$key]."$linkClose</div>\n";
			
			while ( list( $itemKey, $itemVal ) = each( $topItem["list"] ) ) {
				if ( $itemKey > 0 ) {
					echo "<div class=\"logviewstats_head\">&nbsp;</div>\n";
				}
				
				if ( isURL( $itemVal["string"] ) ) {
				    $linkOpen = "<a href=\"".$itemVal["string"]."\">";
					$linkClose = "</a>";
				} else {
				    $linkOpen = "";
					$linkClose = "";
				}
				echo "<div class=\"logviewstats_content\"";	
                require( TSEP_INCLUDE_DIR."/colorswitch.php" );
                echo ">$linkOpen".$itemVal["string"]."$linkClose (".$itemVal["count"].")</div>\n";
			} // while
		}
		?></div><?php 
	} // while
	showFooter();
}


/**
 * Tests if a string is a URL.
 * Copied from http://www.truerwords.net/articles/ut/urlactivation.html
 * 
 * @param string $URL The string that is to be tested
 * @return boolean TRUE if the string is a URL
 **/
function isURL( $URL ) {
	return eregi( "(^|[ \t\r\n])((ftp|http|https|gopher|mailto|news|nntp|telnet|wais|file|prospero|aim|webcal):(([A-Za-z0-9$_.+!*(),;/?:@&~=-])|%[A-Fa-f0-9]{2})+(#([a-zA-Z0-9][a-zA-Z0-9$_.+!*(),;/?:@&~=%-]*))?)" , $URL );
}


/**
 * Gathers all statistical information from the _log table
 * 
 * @return void
 **/
function showCompleteStats() {
	global $PHP_SELF, $tsep_config;
	
	$nl_info = localeconv();
	$stats = array();
	$topLists = array();
	
	$logStats = new logviewStats();
	
	$stats["logviewstats_groupTotals"] = "group";
		$stats["logviewstats_nrRecords"] = number_format( $logStats->getNrRecords(), 0, $nl_info["decimal_point"], $nl_info["thousands_sep"] );
		$stats["logviewstats_nrSetupEntries"] = number_format( $logStats->getNrSetupEntries(), 0, $nl_info["decimal_point"], $nl_info["thousands_sep"] );
		$stats["logviewstats_nrSearchQueries"] = number_format( $logStats->getNrSearchQueries(), 0, $nl_info["decimal_point"], $nl_info["thousands_sep"] );
		$stats["logviewstats_nrClicks"] = number_format( $logStats->getNrClicks(), 0, $nl_info["decimal_point"], $nl_info["thousands_sep"] );
	
	
	$stats["logviewstats_groupDetails"] = "group";
		$stats["logviewstats_nrSearchwords"] = number_format( $logStats->getNrSearchwords(), 0, $nl_info["decimal_point"], $nl_info["thousands_sep"] );
		$stats["logviewstats_nrStopwords"] = number_format( $logStats->getNrStopwords(), 0, $nl_info["decimal_point"], $nl_info["thousands_sep"] );
		$stats["logviewstats_nrIPs"] = number_format( $logStats->getNrIPs(), 0, $nl_info["decimal_point"], $nl_info["thousands_sep"] );
		$stats["logviewstats_nrDomains"] = number_format( $logStats->getNrDomains(), 0, $nl_info["decimal_point"], $nl_info["thousands_sep"] );
	
	
	$topLists["logviewstats_groupTopX"] = "group";
		$topLists["logviewstats_topSearchqueries"]["link"] = $PHP_SELF."?op=topSearchQueriesAll";
		$topLists["logviewstats_topSearchqueries"]["list"] = $logStats->getTopSearchqueries( 10 );

		$topLists["logviewstats_topClicks"]["link"] = $PHP_SELF."?op=topClicksAll";
		$topLists["logviewstats_topClicks"]["list"] = $logStats->getTopClicks( 10 );

		$topLists["logviewstats_topSearchwords"]["link"] = $PHP_SELF."?op=topSearchwordsAll";
		$topLists["logviewstats_topSearchwords"]["list"] = $logStats->getTopSearchwords( 10 );

		$topLists["logviewstats_topStopwords"]["link"] = $PHP_SELF."?op=topStopwordsAll";
		$topLists["logviewstats_topStopwords"]["list"] = $logStats->getTopStopwords( 10 );

		$topLists["logviewstats_topIPs"]["link"] = $PHP_SELF."?op=topIPsAll";
		$topLists["logviewstats_topIPs"]["list"] = $logStats->getTopIPs( 10 );

		$topLists["logviewstats_topDomains"]["link"] = $PHP_SELF."?op=topDomainsAll";
		$topLists["logviewstats_topDomains"]["list"] = $logStats->getTopDomains( 10 );
	
	showStats( $stats, $topLists );
}


/******************************************************************************************
 * MAIN CODE
 ******************************************************************************************/
if ( isset( $op ) ) {
    
	switch ( $op ) {
		case "topSearchQueriesAll":
			$stats = array();
			$topLists = array();
			
			$logStats = new logviewStats();
			$topLists["logviewstats_groupTopAll"] = "group";
			$topLists["logviewstats_topSearchqueries"]["list"] = $logStats->getTopSearchqueries( 0 );
			showStats( $stats, $topLists );
			break;

		case "topClicksAll":
			$stats = array();
			$topLists = array();
			
			$logStats = new logviewStats();
			$topLists["logviewstats_groupTopAll"] = "group";
			$topLists["logviewstats_topClicks"]["list"] = $logStats->getTopClicks( 0 );
			showStats( $stats, $topLists );
			break;

		case "topSearchwordsAll":
			$stats = array();
			$topLists = array();
			
			$logStats = new logviewStats();
			$topLists["logviewstats_groupTopAll"] = "group";
			$topLists["logviewstats_topSearchwords"]["list"] = $logStats->getTopSearchwords( 0 );
			showStats( $stats, $topLists );
			break;

		case "topStopwordsAll":
			$stats = array();
			$topLists = array();
			
			$logStats = new logviewStats();
			$topLists["logviewstats_groupTopAll"] = "group";
			$topLists["logviewstats_topStopwords"]["list"] = $logStats->getTopStopwords( 0 );
			showStats( $stats, $topLists );
			break;

		case "topIPsAll":
			$stats = array();
			$topLists = array();
			
			$logStats = new logviewStats();
			$topLists["logviewstats_groupTopAll"] = "group";
			$topLists["logviewstats_topIPs"]["list"] = $logStats->getTopIPs( 0 );
			showStats( $stats, $topLists );
			break;

		case "topDomainsAll":
			$stats = array();
			$topLists = array();
			
			$logStats = new logviewStats();
			$topLists["logviewstats_groupTopAll"] = "group";
			$topLists["logviewstats_topDomains"]["list"] = $logStats->getTopDomains( 0 );
			showStats( $stats, $topLists );
			break;

		default:
			showCompleteStats();
	} // switch
	
} else {
	showCompleteStats();
}

?>
