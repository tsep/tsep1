<?php
/**
* Config ContentImages of TSEP.
*
* @tables tsep_internal
* @author Manfred Jedlicka
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-07-09 16:22:21 +0200 (Sat, 09 Jul 2005) $
*  @lastedited $LastChangedBy: manfred $
*  $LastChangedRevision: 232 $
*
*/

require_once( "../include/global.php" );

db::connect();

require_once( TSEP_INCLUDE_DIR."/mmexfunctions.php" ); // mm functions which were placed in every file
require_once( TSEP_INCLUDE_DIR."/configfunctions.php" );
require_once( TSEP_INCLUDE_DIR."/contentimages.class.php" );

// === START === update all config values (except max results per page) ==========
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "tsepconfigcontentimg"))
{
        SaveValues2Internal("stringtag='configcontentimg'");
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "rebuildcontentimgfilelist"))
{
        RebuildContentPIFilelist($_POST["cb_selectprofile"], $_POST["rebuild_mode"]);
}

if (isset($_POST["MM_transform"]))
	RunTransform($_POST["MM_transform"]);


$currentPage = $_SERVER["PHP_SELF"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $tsep_lng['configure'] . "/" . $tsep_lng['manage'] . " " . $tsep_lng['contentimgs']; ?> - <?php echo $tsep_lng['tsep'];?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="expires" content="0" />
<link href="<?php echo TSEP_CLIENT_ROOT?>/static/css/tsep.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/overlib.js"></script>
<script type="text/JavaScript">
<!--

function help(id) {     
        win_width = 300;
        win_height = 400;
        win_x = screen.availWidth / 2 - (win_width / 2);
        win_y = screen.availHeight / 2 - (win_height / 2);
        help_window = window.open("help.php?id="+id, "Help", "width="+win_width+",height="+win_height+",left="+win_x+",top="+win_y);
        help_window.focus();
}
<?php JS_ShowHide(); ?>
<?php JS_Upload(); ?>
<?php JS_DeleteFile(); ?>
//-->
</script>
</head>
<body>
<div class="tsepProject">

        <?php
        require( TSEP_INCLUDE_DIR."/indexer_search_table.php" ); /*use code-recycling*/ ?>
  <div class="configurationHeadline"><?php echo $tsep_lng['configure'] . " " . $tsep_lng['contentimgs']; ?></div>
<center><big><?php echo $tsep_lng['currently_experimental']; ?></big></center>
  <div class="configurationTSEPBlock">

    <form name="tsepconfig" id="tsepconfig" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<?php
                if ( buildInputFields("stringtag='configcontentimg'") == 1 )
                   $disableButton = "disabled=\"disabled\" style=\"border:outset 1px black\"";
                else
                   $disableButton = "";
?>
        <div style="clear:both; padding-top:1ex;">
         <input name="update" type="submit" id="update" value="<?php echo $tsep_lng['update']; ?>&nbsp;<?php echo $tsep_lng['above_values']; ?>" <?php echo $disableButton; ?> />
        </div>
        <input type="hidden" name="MM_update" value="tsepconfigcontentimg" />
    </form>
  </div>

  <hr width="200">
  
  <div class="configurationHeadline"><?php echo $tsep_lng['manage'] . " " . $tsep_lng['contentimgs']; ?></div>
  <div class="configurationTSEPBlock">

  <div class="configurationHeadline" style='text-align:left;font-size:medium;'><?php echo $tsep_lng['contentimg_filelists']; ?>:</div>
	<?php maintainContentImageFileLists(); ?>

  <br />
  <div class="configurationHeadline" style='text-align:left;font-size:medium;'><?php echo $tsep_lng['contentimg_filelist_rebuild']; ?>:</div>
	<?php manuallyCreateContentImageLists(); ?>

<?php
require( TSEP_INCLUDE_DIR."/copyright.php" ); // Olaf Noehring: Use code-recyling whereever possible
?>

</div>
</body>
</html>



<?php
//------------------------------------------------------------------------------
function maintainContentImageFileLists()
//------------------------------------------------------------------------------
{

	$ct = 0;
	?>
	<style>
	table { border: solid 1px lightgray; font-size:small; margin-top: 1ex;}
	th { background-color: silver; border: outset 1px gray; font-size: small;}
	td { padding: 0.3ex; }
	</style>
	<?php
	$arrOut = array();
	$arrOut[] = "<table border='1' cellspacing='0'>\n";
	$arrOut[] = "<tr><th>" . $tsep_lng['name'] . "</th><th>" . $tsep_lng['modified_created'] . "</th><th>" . $tsep_lng['comment'] . "</th><th>&nbsp;</th></tr>\n";
	$larrConfig = ReadValuesFromInternal("stringtag='config'");

	$larrContentPi = ReadValuesFromInternal("stringtag='configcontentimg'");
	$lContentPiAbsPath = ( isset($larrContentPi['configcontentimg_abspath']) ? $larrContentPi['configcontentimg_abspath'] : ""); 
	$lContentPiWebPath = ( isset($larrContentPi['configcontentimg_webpath']) ? $larrContentPi['configcontentimg_webpath'] : ""); 
	$lContentImgTransform1 = ( isset($larrContentPi['configcontentimg_flisttrans1_active']) ? ( $larrContentPi['configcontentimg_flisttrans1_active'] == "true" ) : false); 
	$lContentImgTransform2 = ( isset($larrContentPi['configcontentimg_flisttrans2_active']) ? ( $larrContentPi['configcontentimg_flisttrans2_active'] == "true" ) : false);
	$lContentImgTransform = ( $lContentImgTransform1 or $lContentImgTransform2 );
	$lContentImgTFFileext1 = ( isset($larrContentPi['configcontentimg_flisttrans1_fileext']) ? $larrContentPi['configcontentimg_flisttrans1_fileext'] : "" ); 
	$lContentImgTFFileext2 = ( isset($larrContentPi['configcontentimg_flisttrans2_fileext']) ? $larrContentPi['configcontentimg_flisttrans2_fileext'] : "" );
	$lContentImgFileext = ".txt|$lContentImgTFFileext1|$lContentImgTFFileext2";
	$lContentImgFileext = preg_replace("/\\|\\|/", "|", $lContentImgFileext);
	$lContentImgFileext = preg_replace("/\\|$/", "", $lContentImgFileext);
	$lContentImgFileext = preg_replace("/\\\/", "", $lContentImgFileext);
	$lContentImgFileext = preg_replace("/\\./", "\\.", $lContentImgFileext);

   	$myContentImgs = new ContentImages();
   	$larrFnList = $myContentImgs->getContentImageFilelistDirFilelist();
   	$myContentImgs = NULL;
   	
   	if ( $larrFnList ) {
		foreach ( $larrFnList as $k => $larrFn) {

			$lFnType = $larrFn[0];		
			$lFnAbs = $larrFn[1];
			$lFnWeb = $larrFn[2];
			$lFName = $larrFn[3];
			$lComment = $larrFn[4];
			$lDtModified = date ($tsep_config['Date_Style'], filemtime($lFnAbs));
			$lFnTypeDesc = ( $lFnType == 0 ? $tsep_lng['contentimg_filelist'] : sprintf($tsep_lng['contentimg_filelistTF'], $lFnType) );

			$larrInfo = array();
			foreach ( file($lFnAbs) as $key1 => $data1) {
				if ( !preg_match("/^$lComment +(.+) *$/", $data1, $lMatches) )
					break; // only show comments before first non-comment-line
				$larrInfo[] = $lMatches[1];
			}
			$lInfo = join("<br>", $larrInfo);
			$lInfo = ( empty($lInfo) ? "&nbsp;" : $lInfo);
			$arrOut[] = "<tr>\n";
			$arrOut[] = "<td>";
			if ( $lFnType == 0 )
				$arrOut[] = " <img src='images/ContentImageFileList.jpg' width='16' height='16' alt='$lFnTypeDesc' title='$lFnTypeDesc' />\n";
			else
				$arrOut[] = " <img src='images/ContentImageFileListTF${lFnType}.jpg' width='16' height='16'  alt='$lFnTypeDesc' title='$lFnTypeDesc' />\n";
			$arrOut[] = " <a href='$lFnWeb' target='_blank' alt='$lFnTypeDesc' title='$lFnTypeDesc'>$lFName</a>\n";
			$arrOut[] = "</td>\n";
			$arrOut[] = "<td>$lDtModified</td>\n";
			$arrOut[] = "<td>$lInfo</td>\n";
			$arrOut[] = "<td>";
			if ( $lFnType == 0 ) {
				$arrOut[] = "<form name='transform$ct' id='transform$ct' method='post' action='" . $_SERVER["PHP_SELF"] . "'>\n";
				$arrOut[] = " <input type='button' size='4' value='" . $tsep_lng['delete'] . "' Onclick='open_deletefile_window(\"contentimg filelistfile\",\"" . $lFName . "\");'>\n";
				$arrOut[] = " <input type='submit' size='4' value='" . $tsep_lng['transform'] . "'" . ( $lContentImgTransform == false ? " disabled='disabled'" : "" ) . ">\n";
				$arrOut[] = " <input type='hidden' name='MM_transform' value='$lFName' />\n";
				$arrOut[] = "</form>\n";
			} else {
				$arrOut[] = "<input type='button' size='4' value='" . $tsep_lng['delete'] . "' Onclick='open_deletefile_window(\"contentimg filelistTF${lFnType}\",\"" . $lFName . "\");'>\n";
			}
			$arrOut[] = "</td>\n";
			$arrOut[] = "<tr>\n";
			$ct++;
		}
	}
	$arrOut[] = "</table>\n";
	if ( $ct == 0 )
		echo $tsep_lng['none'];
	else
		echo "<div style='font-size:x-small;'" . $tsep_lng['contentimg_filelists_descr'] . "</div>" . join("", $arrOut);
} // maintainContentImageFileLists()



//------------------------------------------------------------------------------
function manuallyCreateContentImageLists()
//------------------------------------------------------------------------------
{

?>
	<div class='indexingProfile'>
    <form name="tsepconfig" id="tsepconfig" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<?php
   echo "<label for='cb_selectprofile'>" . $tsep_lng['for_iprofile'] . ":</label>\n";
   echo "<span class='selectprofile'>";
   echo "<select name='cb_selectprofile' id='cb_selectprofile' class='selectprofile_combo' size='1' onChange='document.form1.btn_selectprofile.click()'>\n";
   $lProfilename = "";
   $sql = "SELECT * FROM ".db::$prefix."iprofile ORDER BY profilename ASC";
   $profiles = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   while ($row = mysql_fetch_assoc($profiles)) {
      echo "  <option>" . $row["profilename"] . "</option>\n";
   }
   echo "   <option>[all]</option>\n";
   mysql_free_result($profiles);
   echo "</select>\n";
   echo "<br /><input name='rebuild_mode' id='rebuild_mode1' type='radio' value='" . $tsep_lng['all_pages'] . "' checked='checked'><label for='rebuild_mode1'>" . $tsep_lng['all_pages'] . "</label>\n";
   echo "<br /><input name='rebuild_mode' id='rebuild_mode2' type='radio' value='" . $tsep_lng['pages_having_no_contentimg'] . "'><label for='rebuild_mode2'>" . $tsep_lng['pages_having_no_contentimg'] . "</label>\n";
//   echo "<br /><input name='rebuild_mode' id='rebuild_mode3' type='radio' value='outdated contentimg'><label for='rebuild_mode3'>pages which are newer than it's ContentImage</label>\n";
   echo "<br /><br /><input name='btn_selectprofile' type='submit' value='" . $tsep_lng['run'] ."' />\n";
   echo "</span>\n";
   echo "<input type='hidden' name='MM_update' value='rebuildcontentimgfilelist' />\n";
?>
	</form>
	</div>
<?php
} // manuallyCreateContentImageLists()



//------------------------------------------------------------------------------
function RebuildContentPIFilelist($pProfilename, $pMode)
//------------------------------------------------------------------------------
{

	if ( $pProfilename != "[all]" ) {
	   	$currentIProfile = GetidIProfileViaName($pProfilename);
		$sql  = "SELECT s.id, s.page_url, s.last_indexed";
		$sql .= " FROM ".db::$prefix."iprofile_search ips, ".db::$prefix."search s";
		$sql .= " WHERE ips.idiprofile = $currentIProfile";
		$sql .= "   AND ips.idsearch = s.id";
		$sql .= "   AND s.protect_indexentry <> '1'";
		$sql .= " ORDER BY s.page_url";
	} else {
		$sql  = "SELECT s.id, s.page_url, s.last_indexed";
		$sql .= " FROM ".db::$prefix."search s";
		$sql .= " ORDER BY s.page_url";
	}
	$result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

   	$myContentImgs = new ContentImages();
   	$myContentImgs->setIndexerFilelistFile("${pProfilename}_[manually]");
   	$myContentImgs->initIndexerFilelistFile();
	$myContentImgs->writetoIndexerFilelistFile("# TSEP " . $tsep_lng['contentimg_filelist'] . "\n# " . sprintf($tsep_lng['contentimg_filelist_manuallybuilt'],$pProfilename,$pMode) . "\n");   	

	$myContentImgsCheck = new ContentImages();
	while ( $row = mysql_fetch_assoc($result) ) {
		$lPageUrl = trim($row["page_url"]);
		switch ( $pMode ) {
			case $tsep_lng['all_pages']:
				$myContentImgs->addIndexerFilelistFileEntry($lPageUrl);
				break;
			case $tsep_lng['pages_having_no_contentimg']:
				$myContentImgsCheck->setPageURL($lPageUrl);
				if ( $myContentImgsCheck->getContentImageType() == $myContentImgsCheck->CONTENTPI_TYPE_DEFAULT )
					$myContentImgs->addIndexerFilelistFileEntry($lPageUrl);
				break;
		} //switch
	} // while

	mysql_free_result($result);
	$myContentImgsCheck = NULL;

	$larrContentPi = ReadValuesFromInternal("stringtag='configcontentimg'");
	$lTransformContentImgFilelist = ( $larrContentPi['configcontentimg_autorun_flisttrans'] == 'true' ? true : false );
	if ( $lTransformContentImgFilelist == true )
		$myContentImgs->doTransform();
		
	$myContentImgs = NULL;
} // RebuildContentPIFilelist()




//------------------------------------------------------------------------------
function RunTransform($pContentImgFileListFileName)
//------------------------------------------------------------------------------
{
   	$myContentImgs = new ContentImages();
   	$myContentImgs->setIndexerFilelistFile("$pContentImgFileListFileName");
   	$myContentImgs->doTransform();
	$myContentImgs = NULL;
} // RunTransform()




/**
 * THIS FUNCTION IS A 1:1-COPY GOT FROM INDEXER.PHP!
 * 
* GetidIProfileViaName() - return current indexingprofileid
*
* read tsep_indexingprofile via profilename
*
* @param $pProfilename
*/
//------------------------------------------------------------------------------
function GetidIProfileViaName($pProfilename)
//------------------------------------------------------------------------------
{

   $sql = "SELECT * FROM ".db::$prefix."iprofile WHERE profilename='$pProfilename'";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   $ct = mysql_num_rows($result);
   if ( $ct == 0 ) {
      mysql_free_result($result);
      return(-1);
   }
   $row = mysql_fetch_assoc($result);
   $lclidiprofile = $row["idiprofile"];
   mysql_free_result($result);
   return($lclidiprofile);
} // GetidIProfileViaName()
?>
