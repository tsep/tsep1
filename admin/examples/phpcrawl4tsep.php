<?php
/**
* This is a ready-to-run example-script, which uses phpcrawl.sf.net to find pages to be indexed by tsep.sf.net
*
* note: this script is not intended to run standalone.
*       It's intended to be launched from within TSEP-Indexer (see TSEP-docu for more information)
*
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-05-17 17:18:57 +0200 (Di, 17 Mai 2005) $
*  @lastedited $LastChangedBy: olaf $
*  $LastChangedRevision: 41 $
*
*/

// It may take a whils to crawl a site ...
if( ini_get('safe_mode') ){                     //as in http://de.php.net/features.safe-mode
           // Do it the safe mode way
        }else{
           // Do it the regular way
           $time_limit_var = 10000;
           set_time_limit($time_limit_var);  //prefixed with @ because otherwise it shows an error when php safe mode is on
        }


// inculde class-files
include("classes/phpcrawler.class.php");
include("classes/phpcrawlerutils.class.php");


// Extend the class and override handlePageData()-method
class myCrawler extends phpcrawler {

  function handlePageData($page_data) {

    if ( $page_data[http_status_code] == 200 ) {
     //$str = "URL>" . $page_data[url];
     $str = "ALL>" . $page_data[url] . "<tsepcontent>" . $page_data[source];
    }
    else {
       if (!empty($page_data[header])) {
          $str  = "ERR>" . strtok($page_data[header],"\n") . ": " . $page_data[url] . "<br>";
          $str .= "(referer: <a href='" . $page_data[referer_url] . "' target='_blank'>" . $page_data[referer_url] . "</a>";
       } else {
          $str  = "ERR>" . $page_data[error_string] . " (err-code " . $page_data[error_code] . "): " . $page_data[url] . "<br>";
          $str .= "(referer: <a href='" . $page_data[referer_url] . "' target='_blank'>" . $page_data[referer_url] . "</a>)";
       }
    }

    call_user_func("TSEP_ExternalCallBack", $str); // send result to TSEP

  }

}


// Now, create an instance of the class, set the behaviour
// of the crawler (see class-reference for more methods)
// and start the crawling-process.

$crawler = &new MyCrawler();


define("CONST_TrafficLimitMB", 5);
define("CONST_PageLimitCt", 0); // 0=no limit

global $TSEPdirname, $TSEPwebdir, $TSEPdirexclude, $TSEPfileexclude, $TSEPextinclude;


// Replace / by \/ - because $TSEPdirexclude is used by eregi within TSEP
//                   (eregi does not use the start-/end-delimiter '/' for '/' is not protected by '\' within TSEP)
$TSEPdirexclude = str_replace("\\/","/",$TSEPdirexclude);
$TSEPdirexclude = str_replace("/","\\/",$TSEPdirexclude);


// URL to crawl
$crawler->setURL("$TSEPwebdir/$TSEPparmsexternalphp");

$crawler->setFollowMode(3);     //to follow to external URLs set to (CAREFULL WITH THIS!!!):    $crawler->setFollowMode(0);

// Only receive content of files with content-type "text/html"
// (regular expression, preg)
$crawler->addReceiveContentType("/text\/html/");

$crawler->addFollowMatch("/\.($TSEPextinclude)$/ i");

if ( trim($TSEPdirexclude) != "" )
   $crawler->addNonFollowMatch("/($TSEPdirexclude)/ i");

// Store and send cookie-data like a browser does
$crawler->setCookieHandling(true);

// Set the traffic-limit to 1 MB (in bytes,
// for testing we dont want to "suck" the whole site)
$crawler->setTrafficLimit(CONST_TrafficLimitMB * 1024 * 1024);

$crawler->setPageLimit(CONST_PageLimitCt);

// Thats enough, now here we go
$crawler->go();


// report traffic-/file-limit-errors to TSEP

$report = $crawler->getReport();

if ($report[traffic_limit_reached] == true)
   call_user_func("TSEP_ExternalCallBack", "INF>Traffic-limit of " . CONST_TrafficLimitMB . "mb reached");
if ($report[file_limit_reached] == true)
   call_user_func("TSEP_ExternalCallBack", "INF>File-limit of " . CONST_PageLimitCt . " files reached");

?>
