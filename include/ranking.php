<?php

/**
* this part of tsep shows the ranking of the search as percent or graphical
*
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/
require_once ("./include/dereslash.php");

// 100 percent, the first hit is the highest
$hundred_percent = $all_search_results["page_result_rank"][0];

// direct display in the search.php in percent
$result_in_percent[$i] = ($all_search_results["page_result_rank"][$i] / $hundred_percent) * 100;
// ***************** example *************
printf(" %.2f%%", $result_in_percent[$i]);

	// shows what the admin set in the column display of _ranksymbols

  $db_tablename=db::$prefix."ranksymbols";
	$sql_dis = "SELECT display, alt_tag, image_show, valuepercent" .
			" FROM $db_tablename WHERE valuepercent >= $result_in_percent[$i] LIMIT 1";
	$result_dis  = mysql_query($sql_dis) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
	while ($line = (mysql_fetch_array($result_dis))) {
		$display[$i] 	   = deslash($line[0]);       // this is the url of the image
		$alt[$i]     	   = $line[1];  			  // text for the alt-tag
		$valuepercent[$i]  = $line[3];  			  // the step of percent for the image
	}

// Proof if data in the db
$data          = "";
$sql_sel       = "SELECT display,image_show FROM $db_tablename WHERE valuepercent >= $valuepercent[$i] LIMIT 1";
$pointer       = mysql_query($sql_sel);
$data          = @MYSQL_RESULT($pointer,0,"display");
$image_show    = @MYSQL_RESULT($pointer,0,"image_show");  // enable/disable display of image

		// proof if $display an image-path and set if available the alt-attribute
		$display_show[$i] = $display[$i];
		// search the > in the img-path with no exist alt and replace with the alt-attribute
		if ((preg_match("/<img src/",$display[$i])) && (!preg_match("/alt/",$display[$i]))) {
			$display_show[$i] = preg_replace("/(\/? ?>)/", " alt=\"$alt[$i]\" " . '\1', $display[$i]);
		}

// set the image-file
if ($data != "" && $image_show == "true" && $result_in_percent[$i] >= 1) {
		echo " $display_show[$i]";
	}

?>
