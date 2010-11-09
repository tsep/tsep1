<?php
/**
* search part of TSEP - this file is called when for giving the searchform and afterwared for the searchresults
*
* @param string $user_e
* @param string $e
* @param string $s
* @tables tsep_search
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/




require_once( __DIR__."/include/global.php" );

if($_SERVER['SCRIPT_NAME'] == "search.php"){
    header("Location:".TSEP_CLIENT_ROOT."tsepsearch.php"); //Redirect to tsepsearch.php, as this not a template
    die();
}

require_once( TSEP_ROOT_DIR."/suggest.js.php" );
require_once( TSEP_INCLUDE_DIR."/log.class.php" );
require_once( TSEP_INCLUDE_DIR."/contentimages.class.php" );

$db_tablename=db::$prefix."internal";
$query_howmanyresultsperpage = "SELECT * FROM $db_tablename WHERE description='possible_results' ORDER BY numericvalue ASC";
$howmanyresultsperpage = mysql_query($query_howmanyresultsperpage);
$row_howmanyresultsperpage = mysql_fetch_assoc($howmanyresultsperpage);
$totalRows_howmanyresultsperpage = mysql_num_rows($howmanyresultsperpage);

?>
<div class="tsepProject">
  <?php

        error_reporting (2039);

        require( TSEP_INCLUDE_DIR."/microtime.php" );              // for calculation of page rendering and DB queries
        require( TSEP_INCLUDE_DIR."/dereslash.php" );                      // to add or remove slashes: contains: "deslash" and "reslash"
        require( TSEP_INCLUDE_DIR."/convert_htmlent.php" );        //code to html any special characters, contains convert_to_htmlent and convert_from_htmlent

        require_once( TSEP_INCLUDE_DIR."/resultsperpage.php" );     // what is the number of results the user has selected? with this function we keep the number between pages

        // === START ===== prepare LOGGING ==================
        $log_search_term = $_SERVER["PHP_SELF"];        // set default
        $log_url = "";                  // set default
        if ($tsep_config["Logging"]=="true")
        {
                if ($tsep_config["Logging_search_term"] =="true")
                {
                        $log_search_term = "/".TSEP_CLIENT_ROOT."/log.php";
                }
                if ($tsep_config["Logging_result_links"] == "true")
                {
                        $log_url = "/".TSEP_CLIENT_ROOT."/log.php?url=";
                }
        }
        // === END ===== prepare LOGGING ==================
        $q = $_REQUEST["q"];           // grab the search string the user entered
        $q = preg_replace("/ +/", ' ', $q);
        $q = str_replace(array("\\",";"), "", $q);  // remove ALL backslashes & remove ALL ";" -> for sql security: no (simple) injection of commands
        $q = trim($q);
        $search_words = explode(" ", $q);

        $s = $_REQUEST["s"];    //record which is to be shown first on this result page
        if (!isset($s)) // only first run
        {
                $s=0;
        }


        // ===== START ====== user defineable result length====================
        // switching leaves user on same start record, but extends / shrinks the number of results shown at once
        if (isset($_REQUEST["user_e"])) // we show the user the change-result-number box
        {
                $user_e=$_REQUEST["user_e"];
                $tsep_config["How_Many_Results"]=$user_e;
                $e= $s+$user_e;
        }
        else            // first run!
        {
                $e = $_REQUEST["e"];    //record to which results will be shown
                $user_e=$tsep_config["How_Many_Results"];
        }
        // ===== END ====== user defineable result length====================

        $start_time = getmicrotime();

        //since we always want to see a SEARCH field we WILL display it always! (lines below!)
        $searchTemplate = "/".TSEP_CLIENT_ROOT."/tsepsearch.php";
		/**
		 * Create the searchform. If search suggest is active the Js code
		 * for the functionality is created on the fly
		 **/
        echo SearchSuggest::SearchForm( $log_search_term, $searchTemplate, $q, $howmanyresultsperpage, $s, $e, $user_e, TRUE );

        if ($q != "")
        {
        	search_get($q);
        }
        else
        {
            $page_count ="";
        }
        $stop_time = getmicrotime();
        $time_taken= $stop_time - $start_time;
        $time_taken = round($time_taken, 3);
        //==========================Display Result START ==========================
        if ($page_count != "")
        {
			// Log the number of returned pages
			$logger = new tsepLogger();
			$logger->writeReturnedPages( $q, $page_count );
			
                require( TSEP_INCLUDE_DIR."/pagenavigation.php" ); //ON: Use code-recycling!				
                //====START ===== Check for used STOPWORDS + notify user about them ======================
                require( TSEP_INCLUDE_DIR."/notifyofstopwords.php" );
                //====END ===== Check for used STOPWORDS + notify user about them ======================
                //====START ===== Check for old mysql version + notify user about them ======================
                require( TSEP_INCLUDE_DIR."/oldmysqltell.php" );
                //====END ===== Check for old mysql version + notify user about them ======================

                ?>
                <div class="SearchResultAllPagesBlock">
                <?php
                        //========================== Display looped search output START ==========================

					   	$myContentImgs = new ContentImages();

                        if ($e<=$s) //prevent bugs
                        {
                                $e=$s;
                        }
                        for ($i = $s; $i < $e; $i++)

                        {
                                if ($all_search_results ["page_url"][$i] != "")
                                {
                                ?>
                                        <div class="SearchResultOnePageBlock">
									        <?php
											if ( $myContentImgs->useContentImages() == true ) {
												$myContentImgs->setPageURL($all_search_results ["page_url"][$i]);
												echo "<div class='contentimg_showsearch' style='width:" . $myContentImgs->getContentImageMaxX() . "px; height:" . $myContentImgs->getContentImageMaxY() . "px;'>\n";
												echo "<a href='" . $log_url.$all_search_results ["page_url"][$i] . "'>";
												echo "<img class='contentimg_showsearch_img' src='" . $myContentImgs->getContentImageURL() . "' " . $myContentImgs->getContentImageGeometry() . " >\n";
												echo "</a>\n";
												echo "</div>\n";
											}
											?>
                                                <div class="SearchResultPageTitle">
                                                <?php require( TSEP_INCLUDE_DIR."/resultnumber.php" ); ?>
                                                <a href="<?php print $log_url.$all_search_results ["page_url"][$i]; ?>" title="<?php echo $tsep_lng["click_here_to_open"];?>"><?php print $all_search_results ["page_title"][$i]; ?></a>
                                                        <div class="SearchResultPageRank" title="<?php echo $tsep_lng["page_rank_help"];?>">
                                                                <?php           // ================= show page ranking START =================
                                                                if (isset($tsep_config["Pagerank_Number"]) && ($tsep_config["Pagerank_Number"]=="true"))
                                                                {
                                                                        echo "(".$all_search_results ["page_result_rank"][$i].$tsep_lng["page_rank"].")";
                                                                }

                                                                if (isset($tsep_config["Pagerank"]) && ($tsep_config["Pagerank"]<>""))  //only of user has setup something for the page rank
                                                                {
                                                                        for ($page_ranking = 0; $page_ranking < $all_search_results ["page_result_rank"][$i]; $page_ranking++)
                                                                        {
                                                                                echo $tsep_config["Pagerank"]; //output whatever the admin defines to show for page ranks
                                                                        }
                                                                }                       // ================= show page ranking END ===========
                                                                ?>
                                                        </div>
                                                </div>
                                                <div class="SearchResultOutput"><?php echo printHighlightedSentences($all_search_results["output"][$i]); ?></div>
                                                <div class="SearchResultURL"><a href="<?php print $log_url.$all_search_results ["page_url"][$i]; ?>" title="<?php echo $tsep_lng["click_here_to_open"];?>&nbsp;&quot;<?php print $all_search_results ["page_title"][$i]; ?>&quot;"><?php print $all_search_results ["page_url"][$i]; ?></a> - <?php print $all_search_results ["page_file_size"][$i]; ?>k </div>
<div class='clearboth'>&nbsp;</div>
                                        </div>

                                        <?php
                                }
                        }
                        //========================== Display looped search output END ==========================
                        $myContentImgs = NULL;
                        require( TSEP_INCLUDE_DIR."/recordsplit.php" );  // only to make this code easier to read
                        // next /div closeses div SearchResultAllPagesBlock
                        ?>
                </div>
                <?php
                require( TSEP_INCLUDE_DIR."/pagenavigation.php" ); //ON: Use code-recycling!
        }
        else
        {  ?>
                <div class="SearchBlock">
                <?php
                        if ($q == "")   //nothing was entered in the search formm so no results
                        { ?>
                                <div class="SearchForWhatNothing">
                                        <?php echo $tsep_lng["searched_site_for"];?>&nbsp;<?php echo $tsep_lng["nothing"];?>.
                                </div>
                                <?php
                        }
                        else                    //for some reason no results
                        {
                                require( TSEP_INCLUDE_DIR."/searchterm.php" ); //show what the user has searched for
								//display notice on too short words in search term								
								array_map("filter_searchterms", $search_words);
								?>
                                <div class="SearchForWhatNoResults">    <?php //show the use that there were no results with his search term?>
<?php echo $tsep_lng["found_no_pages"];?>
                                </div>
                        <?php
                        }       ?>
<?php require( TSEP_INCLUDE_DIR."/timeneeded.php"); //how long did it take to build the page
                // next div closes SearchBlock
                ?>
                </div>

                <?php
        }

        //====START ===== Check for used STOPWORDS + notify user about them ======================
        require( TSEP_INCLUDE_DIR."/notifyofstopwords.php" );
        //====END ===== Check for used STOPWORDS + notify user about them ======================

        //====START ===== Check for old mysql version + notify user about them ======================
        require( TSEP_INCLUDE_DIR."/oldmysqltell.php" );
        //====END ===== Check for old mysql version + notify user about them ======================

        _TsepTrace( "_TsepTrace_Closeup_" );



//========================== Display Result END ==========================


/**
* This is the part where the searching in the database is done: Look for explode search string, check if stopword, look for search string in database, mark search string for output
*
* Highlighting of the results (via $gSearchForRegEx) is done at "show-time" (see above)
*
* @tables tsep_search, tsep_stopwords
* @author Olaf Noehring
* @lastedited Manfred Jedlicka
* @param string $q
*/
//------------------------------------------------------------------------------
function search_get($q)
//------------------------------------------------------------------------------
{
        global $tsep_config;
        
        require_once( TSEP_INCLUDE_DIR."/cleanstring.php" );   // to remove anything crap from string
        require_once( TSEP_INCLUDE_DIR."/stringfunctions.php" );   // to get left-, mid-, right- and sub- strings
        require( TSEP_INCLUDE_DIR."/oldmysqlcheck.php" );

        global  $all_search_results,
                $page_count,
                $forbidden_stopwords,
                $mysqlversion_is_ok,
                $gSearchForRegEx,
                $tsep_config;


        // split words<->forbidden_stopwords

        $searchFor = trim($q);
        _TsepTrace("searchFor-IN: $searchFor");
        $searchFor = str_replace("'", "\\'", $searchFor);  //protect single-quotes
        $searchFor = preg_replace("/\s+/", " ", $searchFor);  //just ONE blank

        $lReplBlank = mkReplPattern($searchFor);
        $searchFor = protectQuoted($searchFor, $lReplBlank); // replace blanks within doublequoted string by a replacement-string
        if ( !strstr($searchFor, $lReplBlank) )
           $lReplBlank = "";
        $lSrchInList = $searchFor;
        $regex = array("[", "-", "+", "(", ")", "<", ">", "\"" ,"]");
        $lSrchInList = str_replace($regex, "", $lSrchInList);
        $lSrchInList = "'" . preg_replace("/ +/", "','", $lSrchInList) . "'";

        $sql = "SELECT * FROM ".db::$prefix."stopwords WHERE stopword IN ($lSrchInList) ORDER BY stopword";
        _TsepTrace("check-stopwords: $sql");
        $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
        while ($row = mysql_fetch_assoc($result)) {
           $forbidden_stopwords[] = $row["stopword"];
           $searchFor = str_replace($row["stopword"], " ", $searchFor);
        }
        mysql_free_result($result);

        $searchFor = preg_replace("/^ *(.+) *$/", "$1", trim($searchFor)); // trim, if a stopword was at beginning or end of string
        $searchFor = preg_replace("/ +/", " ", $searchFor);

        $gSearchForRegEx = $searchFor;

        $lReplSingleQuote = mkReplPattern($gSearchForRegEx);
        $gSearchForRegEx = str_replace("\\'", $lReplSingleQuote, $gSearchForRegEx);
        if ( !strstr($gSearchForRegEx, $lReplSingleQuote) )
           $lReplSingleQuote = "";

        // needed for $lUTF8Workaround only:

           $lReplPlus = mkReplPattern($gSearchForRegEx);
           $gSearchForRegEx = preg_replace("/\+/", $lReplPlus, $gSearchForRegEx);
           if ( !strstr($gSearchForRegEx, $lReplPlus) )
              $lReplPlus = "";
           $lReplMinus = mkReplPattern($gSearchForRegEx);
           $gSearchForRegEx = str_replace("-", $lReplMinus, $gSearchForRegEx);
           if ( !strstr($gSearchForRegEx, $lReplMinus) )
              $lReplMinus = "";

        $gSearchForRegEx = cleanString($gSearchForRegEx);
        if ( $lReplSingleQuote != "" )
           $gSearchForRegEx = preg_replace("/".$lReplSingleQuote."/", "'", $gSearchForRegEx);
        if ( $lReplPlus != "" )
           $gSearchForRegEx = preg_replace("/".$lReplPlus."/",  "+", $gSearchForRegEx);
        if ( $lReplMinus != "" )
           $gSearchForRegEx = preg_replace("/".$lReplMinus."/", "-", $gSearchForRegEx);

        $lSearchForRegExMust = "";
        if ( $lReplPlus != "" ) {
           $tmp = $gSearchForRegEx;
           while ( preg_match("/ \+([^ ]+?) /u", " $tmp ", $lMatches ) ) {
              $lSearchForRegExMust .= " " . $lMatches[1];
              $tmp = preg_replace("/\+" . $lMatches[1] . "/u", "", $tmp);
           }
           $lSearchForRegExMust = "(" . preg_replace("/ +/", "|", trim($lSearchForRegExMust) ) . ")";
        }

        $lSearchForRegExMustNot = "";
        if ( $lReplMinus != "" ) {
           $tmp = $gSearchForRegEx;
           while ( preg_match("/ -([^ ]+?) /u", " $tmp ", $lMatches ) ) {
              $lSearchForRegExMustNot .= " " . $lMatches[1];
              $tmp = preg_replace("/-" . $lMatches[1] . "/u", "", $tmp);
           }
           $lSearchForRegExMustNot = "(" . preg_replace("/ +/", "|", trim($lSearchForRegExMustNot) ) . ")";
        }

        
        $lReplAsterisk = mkReplPattern($gSearchForRegEx);
        $gSearchForRegEx = preg_replace("/\*/", $lReplAsterisk, $gSearchForRegEx);
     // $gSearchForRegEx = preg_quote($gSearchForRegEx);
//        if ( $mysql_boolean != "" ) {
           // *            means - complete word
           // +,-,(,),<,>  are removed from string
           $gSearchForRegEx = preg_replace('/[-+\(\)<>]/', "", $gSearchForRegEx);
           $gSearchForRegEx = preg_replace("/".$lReplAsterisk."/", "[-_a-zA-Z0-9]*", $gSearchForRegEx);
//        }
        $gSearchForRegEx = "(" . preg_replace("/ +/", "|", $gSearchForRegEx) . ")";

        if ( $lReplBlank != "" ) {
           $gSearchForRegEx        = preg_replace("/".$lReplBlank."/", " ", $gSearchForRegEx);         // replace blank-placeholder within quoted strings
           $searchFor              = preg_replace("/".$lReplBlank."/", " ", $searchFor);               // replace blank-placeholder within quoted strings
           $lSearchForRegExMust    = preg_replace("/".$lReplBlank."/", " ", $lSearchForRegExMust);     // replace blank-placeholder within quoted strings
           $lSearchForRegExMustNot = preg_replace("/".$lReplBlank."/", " ", $lSearchForRegExMustNot);  // replace blank-placeholder within quoted strings
        }
        _TsepTrace( "searchFor-USED: $searchFor" );

        //==========================DB operations START ==========================

        //====== START ===== make sure boolean search is only run when it is mysql >4.0.1
        require( TSEP_INCLUDE_DIR."/oldmysqlcheck.php" );  //checks is mysql 4 and sets boolean option
        //====== END ===== make sure boolean search is only run when it is mysql >4.0.1
        //run SQL

        preg_match("/^([0-9]+)\.([0-9]+)/", mysql_get_server_info($tsepdbconnection), $lMatches);
        $lMatches[2] = ( intval($lMatches[2]) < 10 ? $lMatches[2] * 10 : $lMatches[2] );
        $lMysqlVersion = intval(sprintf("%02d%02d", $lMatches[1], $lMatches[2]));

        if ( $searchFor == utf8_decode($searchFor) or ( $lMysqlVersion >= 410 ) ) {
           $sql  = "SELECT page_title, page_url, page_file_size, indexed_words, indexed_metawords";
           $sql .= "  FROM ".db::$prefix."search";
           $sql .= " WHERE MATCH (indexed_words) AGAINST ('$searchFor' $mysql_boolean)";
           $sql .= "    OR MATCH (indexed_metawords) AGAINST ('$searchFor' $mysql_boolean)";
           $lUTF8Workaround = 0;
        } else {
           $sql  = "SELECT page_title, page_url, page_file_size, indexed_words, indexed_metawords";
           $sql .= "  FROM ".db::$prefix."search";
           $lUTF8Workaround = 1;
           _TsepTrace("M Y S Q L _ S E R V E R _ V E R S I O N $lMysqlVersion AND utf8-chars in searchstring - reading complete ".db::$prefix."search-table ");
        }

        _TsepTrace("searchFor-SQL: $sql");

        $list_data = mysql_query($sql);

        if ( !$list_data ) {
           _TsepTrace("searchFor-NODATA");
           errorHandler::throwError(mysql_error(), errorHandler::FATAL);;
        }

        //==========================DB operations END =========================
        //========================== Search db START ==========================

        $mysql_row_counter = 0;   // not really needed but was useful for quick debugging ... reset value, needed for sorting (how many hits in one document)

        while ($row = mysql_fetch_array($list_data))
        {
                _TsepTrace("pageURL ".$row["page_url"]);
                $lFoundCt = 0;
                $config_check_file_exists_OK = 1; // assume, file exists
                if ( $tsep_config["check_file_exists"] == "true" ) { //check if the file still exists, only then check the contents of the database
                        $arrTmp = parse_url($row["page_url"]);
                        if($arrTmp["port"] == NULL)  //should fix non standard HTTP server port, from Michael Casta�eda
                        {
                            $tmpHost = $arrTmp["scheme"] . "://" . $arrTmp["host"];
                        }
                             else
                        {
                              $tmpHost = $arrTmp["scheme"] . "://" . $arrTmp["host"] . ":" . $arrTmp["port"];
                        }
                        $tmpHost = preg_replace("/\//","\/",$tmpHost);
                        $lFileName = preg_replace("/^$tmpHost/", $_SERVER["DOCUMENT_ROOT"], $row["page_url"]);
                        if ( !file_exists($lFileName) ) {      //check if the file still exists, only then check the contents of the database
                                _TsepTrace("... does not exist ($lFileName)");
                                $lhFile = @fopen($row["page_url"], "r");
                                if ( !$lhFile ) {
                                   $config_check_file_exists_OK = 0;              //file does not really exist (file_exists()) or
                                   _TsepTrace("... does not exist trying to open via URL (" . $row["page_url"] . ")"); //  could not be opened (in case of url)
                                } else {
                                   fclose($lhFile);
                                   _TsepTrace("... DOES exist trying to open via URL (" . $row["page_url"] . ")");
                                }
                        }
                }

                if ( $config_check_file_exists_OK==1 )
                {
//                      $indexed_words = $row["indexed_words"] ;
// MJ: "indexed_words + METAWORDS" ist NUR TEMPORAER:
                        $indexed_words = $row["indexed_metawords"] . " " . $row["indexed_words"];
                        $explode_doc = explode(". ", $indexed_words);      //       bug SF: 1065203 searching for strings with "." doesnt work! -> followed the idea

                        unset($lArrOutput); // array holding the first $lCtMaxAppend sentences, containing a searched string
                                            // each sentence-array-entry consists of an array, where 1st item is sentence-number and
                                            // and 2nd item is the sentence itself
                                            // the last record does not hold a textblock, it only holds the highest SentenceNo
                        $lCtMaxAppend = $tsep_config["How_Many_Sentences"];
                        _TsepTrace("Indexed-words-len ".strlen($indexed_words)." - MaxSentences $lCtMaxAppend");
                        $lSentenceCt = 0;
                        $lFirstSentence = "";
                        foreach($explode_doc as $key3 => $val3)
                        {
                                if ( $lSearchForRegExMust    != "" && !preg_match("/$lSearchForRegExMust/iu",    $val3) )
                                   continue;
                                if ( $lSearchForRegExMustNot != "" &&  preg_match("/$lSearchForRegExMustNot/iu", $val3) )
                                   continue;
                                $lSentenceCt++;
                                if ( $lSentenceCt == 1 )
                                   $lFirstSentence = $val3 . ". ";
                                _TsepTrace("Sentence $lSentenceCt: searching for '$gSearchForRegEx' in '".Lconvert_to_htmlent("$val3")."'");
                                preg_match_all("/$gSearchForRegEx/iu", $val3, $matches, PREG_PATTERN_ORDER);  // !!! modifier 'u' needed for utf8
                                $lCt = count($matches[0]);
                                _TsepTrace("Sentence $lSentenceCt: Findcount $lCt");
                                $lFoundCt += $lCt;
                                if ( $lCt > 0 and $lCtMaxAppend > 0 ) {
                                   _TsepTrace("...Sentence2Output: ".Lconvert_to_htmlent("$val3"));
                                   $lCtMaxAppend--;
                                   $lArrOutput[] = array("SentenceNo" => $lSentenceCt, "TextBlock" => $val3.". ");
                                }
                        }

                        _TsepTrace("FountCt $lFoundCt");
                        if ( $lFoundCt > 0 ) {
                           $lArrOutput[] = array("SentenceNo" => $lSentenceCt, "TextBlock" => "");
                           // build big array
                           $all_search_results [page_result_rank][] = $lFoundCt;   //should be clear what this arrays contents is
                           $all_search_results [output][] = $lArrOutput;
                           $all_search_results [page_number][] = $row["page_number"]; // $page_number;                      //
                           $all_search_results [page_title][] = $row["page_title"];// $page_title ;                        //
                           $all_search_results [page_url][] = $row["page_url"] ;//$page_url ;                              //
                           $all_search_results [page_file_size][] = $row["page_file_size"] ;//$page_file_size;             //
                        }
                        //END === build array with the hits (which will be sorted once we have gone through all pages)
                }
                $mysql_row_counter++;   // add one before moving to the next page

        }
        mysql_free_result($list_data);
        //========================== Search db END ==========================


        //===========START =============== sort the results with order of hits ==================ON==
        /* debug only!
        echo count ($all_search_results [page_number])."<br>";
        echo count ($all_search_results [page_result_rank])."<br>";
        echo count ($all_search_results [output])."<br>";
        */
        if ($all_search_results [page_result_rank][0] != "")    // only if there were any results!
        {
                array_multisort(
                        $all_search_results ["page_result_rank"], SORT_NUMERIC, SORT_DESC,
                        $all_search_results ["page_title"], SORT_ASC,
                        $all_search_results ["page_url"], SORT_ASC,
                        $all_search_results ["output"], SORT_ASC,
                        $all_search_results ["page_file_size"], SORT_ASC,
                        $all_search_results ["page_number"], SORT_NUMERIC, SORT_ASC
                );
        }
        $page_count = count ($all_search_results [page_result_rank]); // now here because other value in beginning of WHILE was wrong
        //===========END =============== sort the results with order of hits ======================ON===

}



/**
* returns a string, surly not contained in $pStr
*
* @author Manfred Jedlicka
* @lastedited Manfred Jedlicka
* @param string $pStr
*/
//------------------------------------------------------------------------------
function mkReplPattern($pStr)
//------------------------------------------------------------------------------
{
   $lRepl = "";

   for ($i = ord("X"); $i >= ord("A"); $i--) {
      if ( !strstr($pStr, chr($i) . chr($i) . chr($i) . chr($i)) ) {
         $lRepl = chr($i) . chr($i) . chr($i) . chr($i);
         $i = 0;
      }
   }
   
   return($lRepl);
} // mkReplPattern()



/**
* replaces all blanks withing double-quoted strings by $pRepl
*
* in addition, a blank is inserted before "+" signs outside double-quoted strings,
*                                                   which are not preceeded by a blank
*
#* e.g. ( with $pRepl = "#" )
*    a b c "d e f" g h i
* -> a b c "d#e#f" g h i
*
* @author Manfred Jedlicka
* @lastedited Manfred Jedlicka
* @param string $pStr
*/
//------------------------------------------------------------------------------
function protectQuoted($pStr, $pRepl)
//------------------------------------------------------------------------------
{
   $inQuoted = 0;
   for ($i = 0; $i <= strlen($pStr); $i++) {
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
   return( trim($lOut) );
} // protectQuoted()



/**
* This is the part where the searching in the database is done: Look for explode search string, check if stopword, look for search string in database, mark search string for output
*
* Highlighting of the results (via $gSearchForRegEx) is done at "show-time" (see above)
*
* @tables tsep_search, tsep_stopwords
* @author Olaf Noehring
* @lastedited Manfred Jedlicka
* @param string $pArrTextBlocks
*/
//------------------------------------------------------------------------------
function printHighlightedSentences($pArrTextBlocks)
//------------------------------------------------------------------------------
{
        global $gSearchForRegEx, $tsep_config, $search_regex;

        $lCharsBeforeHit = $tsep_config["How_Many_CharsBefore_Hit"];
        $lCharsAfterHit  = $tsep_config["How_Many_CharsAfter_Hit"];

        $lMoreSentences = "<div class=\"SearchResultOutputMore\">...</div>";
		
        $lArrMax = count($pArrTextBlocks) - 1;       	
		
		// parse all sentences
        for ( $i = 0; $i < $lArrMax; $i++ ) { // do not do the last element - it just holds $lSentenceNoMax
           // assign sentence no. $i
		   $lTextBlock = $pArrTextBlocks[$i]["TextBlock"];
		   
		   // divide sentence into words
		   $TextBlockArr = explode(" ", $lTextBlock);
		   
		   // reset arrays		   		   
		   $temp_keys = array();
		   $keys = array();
		   $obsolete_keys = array();
		   
		   $max_hints = $tsep_config["max_hints"];
		   $word_offset = $tsep_config["word_offset"];		   
		   $max_length = $tsep_config["max_length"];		   		   		   
		   
		   // get number of words that match the search term(s)		   
		   foreach ($TextBlockArr as $key => $value) {
		   	   preg_match_all('/'.$gSearchForRegEx.'/iu', $value, $matches);
		   	   if (sizeof($matches[0]) > 0) {
		   	   	$temp_keys[] = $key;
		   	   }		   			   		
		   }
		   
		   $temp_keys_size = sizeof($temp_keys);
		   // distinguish between word needed or not; obsolete with only one word found
		   if ($temp_keys_size != 1) {
		   	
			   // discard words > $max_hints
			   if ($temp_keys_size > $max_hints) {
			   		for ($m=$max_hints+1; $m<$temp_keys_size; $m++) {
			   			unset($temp_keys[$m]);
			   		}
			   }
			   
			   // discard words that overlay with the next match
			   $temp_keys_size = sizeof($temp_keys);
			   if ($temp_keys_size > 1) {
				   for ($num=0; $num<$temp_keys_size-1; $num++) {
					   	if (($temp_keys[$num] + $word_offset) >= $temp_keys[$num+1]) {
					   		$obsolete_keys[] = $num+1;
					   	}
				   }
			   }
			   
			   // create correct numbered array with neccessary words
			   if (isset($obsolete_keys)) {
			   	  foreach ($temp_keys as $key => $value) {
					   if (in_array($key, $obsolete_keys)) {
					   	$keys[] = $value;
					   }
			   	  }
			   }
			   
		   } else {
		   		// only one word has been found
		   		$keys = $temp_keys;
		   }
		   
		   $nlTextBlock = "";
		   // figure out where word in the sentence is
		   // and define the detail of the sentence to display
		   if ($keys[0] <= $word_offset) {
		   		// word is at the beginning (0 <= WORD <= $word_offset words)
		   		$start = 0;
		   		$end = $keys[sizeof($keys)-1] + $word_offset;		   		
		   } else if (($keys[sizeof($keys)-1] + $word_offset) > sizeof($TextBlockArr)) {
		   		// word is at the end (maximum of $word_offset words of end away)
		   		$start = $keys[0] - $word_offset;
		   		$end = sizeof($TextBlockArr);
		   } else {
		   		// word is in the middle (nothing special)
		   		$start = $keys[0] - $word_offset;
		   		$end = $keys[sizeof($keys)-1] + $word_offset;
		   }
		   
		   // build sentence
		   for ($o=$start; $o<=$end; $o++) {
			    $nlTextBlock .= str_replace(array("<", ">"), array("&lt;", "&gt;"), $TextBlockArr[$o]);
			    $nlTextBlock .= " ";
		   }
		   
		   //build replace
		   for ($c=1; $c<=9; $c++) {
		   	$css_highlight_classes[] = sprintf('"\\2"=="\\1" ? "\\1" : "<span class=\"tsephl%s\">\\1</span>"', $c);
		   }
		   
		   // highlight 10th search term and following with tsephl0 class
		   if (sizeof($search_regex) > 9) {
		   	for ($cc=10; $cc<=sizeof($search_regex); $cc++) {
		   		$css_highlight_classes[] = '"\\2"=="\\1" ? "\\1" : "<span class=\"tsephl0\">\\1</span>"';
		   	}
		   }		   
		   
		   // mark search terms
		   $nlTextBlock = preg_replace($search_regex, $css_highlight_classes, $nlTextBlock);
		   
		   // Add $lMoreSentences if it isn't the last sentence
		   if (strlen($nlTextBlock) <= $max_length) {
			   if ($i+1 != $lArrMax or $lArrMax == 1) {
			   	$nlTextBlock .= " ".$lMoreSentences." ";
			   }
			   
			   $lOut .= $nlTextBlock;
		   }
        }
        return($lOut);
} // printHighlightedSentences()

require( TSEP_INCLUDE_DIR."/copyright.php" ); // Use code-recyling whereever possible

?>
</div>
<?php
mysql_free_result($howmanyresultsperpage);

function Lconvert_to_htmlent($text)
{
/*
//========================== encode special characters START ==========================
//now lets make the index words useable for (hopefully) any language (on earth):
//encoded any "special" chars into html enities, for details look on
// http://www.phpbuilder.com/manual/function.get-html-translation-table.php
*/

$trans = get_html_translation_table(HTML_ENTITIES);

$text = strtr($text, $trans);

$text = str_replace("\\", "", $text); // remove "\" //this is the new line A..... this is testing!!
//debug only:
//echo "---to: ".$text."---";


return ($text);
}

/**
 * Callback function to filter searchterms
 * Prints error if word has less than four chars
 *
 * @param string array element
 * @return boolean
 */
function filter_searchterms($var) {
	global $tsep_lng;
	
	if (strlen($var) < 4) {
		echo  '<div class="SearchForWhatMoreThanFour">';
        echo $tsep_lng["more_than_four"] ." ($var)";
        echo '</div>';
		return true;
	} else {
		return false;
	}
}

?>
