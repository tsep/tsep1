<?php
/**
* This file makes to things: manipulate indexingprofiles, create a new index
*
* @param URL ?startindexing             - starts creating a new index for the current indexingprofile
* @param URL ?startindexing&profile=xxx - starts creating a new index for indexingprofile named xxx
* @param URL ?showcompleteindex         - show complete index currently stored
* @param URL                            - shows the maintain-screen
*
* @tables tsep_search, tsep_config
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-09-05 17:22:30 +0200 (Mo, 05 Sep 2005) $
*  @lastedited $LastChangedBy: manfred $
*  $LastChangedRevision: 315 $
*
*/
require_once( __DIR__."/../include/global.php" );
require_once( TSEP_INCLUDE_DIR."/utf8.php" );
require_once( TSEP_INCLUDE_DIR."/mmexfunctions.php" );                            // mm functions which were placed in every file
require_once( TSEP_INCLUDE_DIR."/datefunctions.php" );                            // to read and write las index edit date
require_once( TSEP_INCLUDE_DIR."/configfunctions.php" );
require_once( TSEP_INCLUDE_DIR."/cleanstring.php" );
require( TSEP_INCLUDE_DIR."/printpagedetails.php" );
require_once( TSEP_INCLUDE_DIR."/indexer.class.php" );
require_once( TSEP_INCLUDE_DIR."/contentimages.class.php" );

db::connect();
        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title><?php echo $tsep_lng['indexer_title']; ?> - <?php echo $tsep_lng['tsep'];?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="expires" content="0" />
        <meta name="author" content="the TSEP Team - https://sourceforge.net/projects/tsep/" />
        <link href="<?php echo TSEP_CLIENT_ROOT?>/static/css/tsep.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/overlib.js"></script>
<script type="text/JavaScript">
<!--
function cnt(id,txt) {
   id = "ResultsHeadline" + id + "FileCount";
   document.getElementById(id).replaceChild(document.createTextNode(txt), document.getElementById(id).firstChild);
}
function checkDeleteProfile($pProfilename) {
   if (confirm("<?php echo $tsep_lng['really_delete']; ?> <?php echo $tsep_lng['indexingprofile']; ?>: '"+$pProfilename+"'\n<?php echo $tsep_lng['delete_indexingprofiles_info']; ?>"))
      return true;
   return false;
}
function checkNewProfileName(pActionName,pNewName) {
   var lProfileNameList = ",<?php echo GetProfileNameList(); ?>,";

   if ( pNewName == "" ) {
      alert("<?php echo $tsep_lng['name_is_empty']; ?>");
      return false;
   }
   if ( lProfileNameList.indexOf(","+pNewName+",") > -1 ) {
      alert(pActionName+" <?php echo $tsep_lng['impossible_already_exists']; ?>: '"+pNewName+"'");
      return false;
   }
   return true;
}
<?php JS_ShowHide(); ?>
//-->
</script>
</head>
<body>
<div class="tsepProject">

<?php
        require( TSEP_INCLUDE_DIR."/indexer_search_table.php" ); //use code-recycling

        $currentIProfile = GetCurrentIProfile();

        if ( isset($_POST["btn_selectprofile"]) )
        {
           $currentIProfile = GetidIProfileViaName($_POST["cb_selectprofile"]);
           $currentIProfile = SetCurrentIProfile($currentIProfile);
        }
        if ( isset($_POST["btn_indexingprofilesave"]) )
        {
           SaveValues2Internal("stringtag='indexer' AND numtag=$currentIProfile");
        }
        if ( isset($_POST["btn_indexingprofilerename"]) )
        {
           RenameIProfile($currentIProfile, $_POST["indexingprofile_newname"]);
        }
        if ( isset($_POST["btn_indexingprofiledelete"]) )
        {
           DeleteIProfile($currentIProfile);
           $currentIProfile = GetCurrentIProfile();
        }
        if ( isset($_POST["btn_indexingprofilesaveas"]) )
        {
           $currentIProfile = NewIProfile($_POST["indexingprofile_newname"]);
           if ( $currentIProfile != -1 )
           {
              SaveValues2Internal("stringtag='indexer' AND numtag=$currentIProfile");
           }
        }

        if ( isset($_POST["startindexing"]) )
           $_SERVER["QUERY_STRING"] = $_POST["startindexing"] . ( !empty($_POST["profile"]) ? "&profile=" . $_POST["profile"] : "" );

        $runmode = "";
        if ( isset($_POST["btn_startindexing"] ) )
        {
           SaveValues2Internal("stringtag='indexer' AND numtag=$currentIProfile");
           $runmode = "startindexing";
        }
        if ( isset($_SERVER["QUERY_STRING"]) && substr($_SERVER["QUERY_STRING"], 0, strlen("startindexing")) == "startindexing" )
        {
           $runmode = "startindexing";
           if ( preg_match("/^startindexing&profile=([^&]+)/", $_SERVER["QUERY_STRING"], $matches) )
           {
              $matches[1] = trim(rawurldecode($matches[1]));
              $currentIProfile = GetidIProfileViaName($matches[1]);
              if ( $currentIProfile == -1 )
              {
                 echo "<div class='userError'>" . $tsep_lng['indexingprofile_unknown'] . " = " . $matches[1];
                 exit;
              }
           }
        }
        if ( $runmode == "startindexing" )
        {
           $gArrIndexingParms = ReadValuesFromInternal("stringtag='indexer' AND numtag=$currentIProfile");
           if ( $gArrIndexingParms["Xwebdir"] == "" or $gArrIndexingParms["Xwebdir"] == "http://" )
           {
              $runmode = "";
              $currentIProfile = GetCurrentIProfile();
           }
        }

        if ( isset($_SERVER["QUERY_STRING"]) && substr($_SERVER["QUERY_STRING"], 0, strlen("showcompleteindex")) == "showcompleteindex" )
        {
           $runmode = "showcompleteindex";
        }

        error_reporting (2039);

        //========================== getmicrotime function START ==========================
        require( TSEP_INCLUDE_DIR."/microtime.php" );   // Olaf Noehring: Use code recycling whereever possible
        //========================== getmicrotime function END ==========================
        $start_time = getmicrotime();

        /**
         * 2005-05-16/TG
         * set_time_limit() code moved to indexer.class.php
         **/
        
        if ( $runmode == "startindexing" )
        {
            $myIndexer = new activeIndexer();
            $lMsg = $myIndexer->indexerMayStart();
            if ( $lMsg == "" ) {
                
                $myIndexer->resetIndexerRunning();
                $myIndexer->setIndexerRunningInfo($tsep_lng['indexer_started_indexer'] . " (" . $tsep_lng['indexingprofile'] . ": &quot;" . GetProfilename($currentIProfile) . "&quot;)", True);
                        
                _TsepTrace("before AdjustValues4Indexing()");
                AdjustValues4Indexing($gArrIndexingParms);

                _TsepTrace("before show ConfigStatusBlock");
                echo "<div class='ConfigStatusBlock'>\n";
                foreach ($gArrIndexingParms as $key1 => $data1) {
                   if ( strpos($key1, 'group_') === 0)
                      continue;
                   echo $tsep_lng['value_for'].": ";
                   echo "<span class='ConfigStatusFieldName'>" . $tsep_lng["config_$key1"] . "</span>";
                   echo " " . $tsep_lng['is'];
                   echo " &quot;<span class='ConfigStatusFieldValue'>$data1</span>&quot;<br />";
                }
                echo "</div>\n";

                if ( ini_get( 'safe_mode' ) ) {
                    echo "<br />\n<div class='ConfigStatusBlock'>\n";
                    echo sprintf( $tsep_lng['warning_php_safe_mode_on'], (ini_get( 'max_execution_time' ) / 60) )."\n";
                    echo "</div>\n";
                }

                $lclTxtSearch = $tsep_lng['indexingprofile'] . ": &quot;" . GetProfilename($currentIProfile) . "&quot;<br />" . ( $gArrIndexingParms["listFilenamesOnly"] != "true" ? $tsep_lng['new_index_head_searching'] : $tsep_lng['sim_index_head_searching'] );
                $lclTxtResult = $tsep_lng['indexingprofile'] . ": &quot;" . GetProfilename($currentIProfile) . "&quot;<br />" . ( $gArrIndexingParms["listFilenamesOnly"] != "true" ? $tsep_lng['new_index_head']           : $tsep_lng['sim_index_head']           );
                ?>
                <div class="ResultsHeadline" id="ResultsHeadlineSearching" style="display:block;">
                        <?php echo $lclTxtSearch;?>
                        <span class="ResultsHeadlineFileCount">
                         (<span id="ResultsHeadlineSearchingFileCount">&nbsp;</span> <?php echo $tsep_lng['pages_found']; ?>)
                        </span>
                </div>
                <div class="ResultsHeadline" id="ResultsHeadlineBuilding" style="display:none;">
                        <?php echo $lclTxtSearch;?>
                        <span class="ResultsHeadlineFileCount">
                         (<span id="ResultsHeadlineBuildingFileCount">&nbsp;</span> <?php echo $tsep_lng['pages_indexed']; ?>)
                        </span>
                </div>
                <div class="ResultsHeadline" id="ResultsHeadlineResult" style="display:none;">
                        <?php echo $lclTxtResult;?>
                </div>
                <?php
                flush();

                _TsepTrace("before search_get()");
                $myIndexer->setIndexerRunningInfo($tsep_lng['indexer_started_searching'], True);
                if ( search_get($gArrIndexingParms) == true ) {
                   _TsepTrace("after search_get() - ended with true");
                   _TsepTrace("before build_results()");
	                $myIndexer->setIndexerRunningInfo(sprintf($tsep_lng['indexer_started_building'], count($arr_searchfilenames)), True);
                   build_results($gArrIndexingParms,$currentIProfile);
                   _TsepTrace("after build_results()");
                } else {
                   _TsepTrace("after search_get() - ended with false");
                }

                $myIndexer->setIndexerRunningInfo($tsep_lng['indexer_started_indexer'] . " (" . $tsep_lng['indexingprofile'] . ": &quot;" . GetProfilename($currentIProfile) . "&quot;)", True);

                $stop_time = getmicrotime();
                $time_taken= $stop_time - $start_time;
                $time_taken = round($time_taken, 3);
                
                echo "<div class=\"breakerBoth\"><div class='PageBuildingFinished'>\n";
                echo $tsep_lng['indexing_in'] . "&nbsp;";
                require( TSEP_INCLUDE_DIR."/indexingtimetaken.php" ); // how long did it take
                echo "</div></div>\n";

                //========================== For printing the indexed words END ==========================
                                
                $myIndexer->resetIndexerRunning();
                
            } else {
                echo "<div class='indexingErrorTitle'>".sprintf( $tsep_lng["error_indexer_is_running"], $lMsg)."</div>\n";
            }
        }

        if ( $runmode == "showcompleteindex" )
        {
                echo "<div class='ResultsHeadline'>" . $tsep_lng['old_index_head'] . "</div>\n";

                $select_query = mysql_query ("SELECT * FROM ".db::$prefix."search ORDER BY id ASC");
                $db_item_num = mysql_num_rows($select_query);

                //========================== Printing START ==========================
                require( TSEP_INCLUDE_DIR."/indexstatus.php" );  // output indexing status

                flush();
                while ($row = mysql_fetch_array($select_query))
                {
                        $lProtected = $row["protect_indexentry"];
                        $lPageTitle = $row["page_title"];
                        $lPageUrl = $row["page_url"];
                        $lFileSize = $row["page_file_size"];
                        $lIndexedWords = $row["indexed_words"];
                        $lIndexedMetaWords = $row["indexed_metawords"];
                        $lAssignedIProfiles = GetAssignedIProfiles($row['id']);

                                                showCompletePageDetails( 
                                                        $lPageTitle, 
                                                        $lPageUrl, 
                                                        $lFileSize, 
                                                        $lAssignedIProfiles, 
                                                        $lIndexedMetaWords, 
                                                        $lIndexedWords, 
                                                        $lProtected );

                        flush();
                        sleep(0.001);
                }
                $stop_time = getmicrotime();
                //========================== Printing END ==========================
                $time_taken= $stop_time - $start_time;
                $time_taken = round($time_taken, 3);

                echo "<div class='PageBuildingFinished'>" . $tsep_lng['data_retrieved'] . "&nbsp;";
                require( TSEP_INCLUDE_DIR."/indexingtimetaken.php" ); // how long did it take
                echo "</div>\n";
                //========================== Database operations END ==========================

                //========================== For printing the indexed words from DB END ==========================
        }


        if ( $runmode == "" )
        {               //========================== Print input boxes for data colletion for indexing START ==========================
                ?>
                <div id="DivFormIndexData">
                        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" name="form1" id="form1">
                                <?php
                                buildProfileHeader($currentIProfile);
                                if ( buildInputFields("stringtag='indexer' AND numtag=$currentIProfile") == 1 )
                                   $disableButton = "disabled=\"disabled\" style=\"border:outset 1px black\"";
                                else
                                   $disableButton = "";
                                ?>
                                <p>
                                        <input class="ButtonStartIndexing" type="submit" name="btn_startindexing" value="<?php echo $tsep_lng['start_indexing'];?>" <?php echo $disableButton; ?> />
                                </p>
                                <div class="explainations">
                                        <p><?php echo $tsep_lng['mandatory'];?></p>
                                        <p><?php echo $tsep_lng['warning'];?></p>
                                </div>
                        </form>
                </div> <?php // closes "DivFormIndexData"?>
        <?php
                //========================== Print input boxes for data colletion for indexing END ==========================
        }
        _TsepTrace("_TsepTrace_Closeup_");

        ?>


        <?php require( TSEP_INCLUDE_DIR."/copyright.php" ); ?>
</div>
</body>
</html>
<?php





/**
* buildProfileHeader() - print profile-handling-line
*/
//------------------------------------------------------------------------------
function buildProfileHeader($pcurrentIProfile)
//------------------------------------------------------------------------------
{
   global$tsep_lng;

   $sql = "SELECT * FROM ".db::$prefix."iprofile ORDER BY profilename ASC";
   $profiles = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

   echo "<div class='indexingProfile'>\n";

   echo $tsep_lng["indexingprofile"] . ":\n";
   echo "<span class='selectprofile'>";
   echo "<select name='cb_selectprofile' class='selectprofile_combo' size='1' onChange='document.form1.btn_selectprofile.click()'>\n";
   $lProfilename = "";
   while ($row = mysql_fetch_assoc($profiles)) {
      echo "  <option" . (($row["idiprofile"] == $pcurrentIProfile) ? " selected='selected'>" : ">");
      if ($row["idiprofile"] == $pcurrentIProfile)
         $lProfilename = $row["profilename"];
      echo $row["profilename"] . "</option>\n";
   }
   echo "</select>\n";
   mysql_free_result($profiles);
   echo "<input name='btn_selectprofile'          type='submit' value='" . $tsep_lng['show_it'] ."' />\n";
   echo "</span>\n";


   echo "<nobr>";
   echo "<input name='btn_indexingprofilesave'    type='submit' value='" . $tsep_lng['save'] ."' />\n";
   echo "<input name='btn_indexingprofiledelete'  type='submit' value='" . $tsep_lng['delete'] ."' onClick='return checkDeleteProfile(\"$lProfilename\");'";
   if ( CountIndexingprofiles() < 2 )
      echo " disabled='disabled'";
   echo " />\n";
   echo "<span style='font-weight:bold; padding:0ex 1ex 0ex 1ex; text-align:center;'>|</span>\n";
   echo "<input name='btn_indexingprofilesaveas'  type='submit' value='" . $tsep_lng['saveas'] ."' onClick='return checkNewProfileName(\"".$tsep_lng['saveas']."\",document.form1.indexingprofile_newname.value);' />\n";
   echo "<input name='btn_indexingprofilerename'  type='submit' value='" . $tsep_lng['rename'] ."' onClick='return checkNewProfileName(\"".$tsep_lng['rename']."\",document.form1.indexingprofile_newname.value);' />\n";
   echo "<input name='indexingprofile_newname' class='newprofile_textbox' type='text'   value='' />\n";
   echo "<input name='currentIProfile' type='hidden' value='$pcurrentIProfile' />\n";
   echo "</nobr>\n";

   echo "</div>\n";
} // buildProfileHeader()




/**
* GetCurrentIProfile() - return current indexingprofileid
*
* read tsep_internal/iprofile/current_indexingprofile
* if this id does not exist in tsep_iprofile/idiprofile, the first available id out of tsep_iprofile is taken
*/
//------------------------------------------------------------------------------
function GetCurrentIProfile()
//------------------------------------------------------------------------------
{
   

   // get current iprofileid
   $sql = "SELECT * FROM ".db::$prefix."internal WHERE stringtag='iprofile' AND description='current_iprofile'";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   $row = mysql_fetch_assoc($result);
   $lCurrentIProfile = $row["numericvalue"];
   mysql_free_result($result);

   // check, if according tsep_iprofile-record exists...
   $sql = "SELECT * FROM ".db::$prefix."iprofile WHERE idiprofile=$lCurrentIProfile";
   $result = mysql_query($sql);
   $ct = mysql_num_rows($result);
   if ($result!= false)
    mysql_free_result($result);
   if ( $ct != 0 )
      return($lCurrentIProfile);

   // ...does not - get first tsep_iprofile-rec-id
   $sql = "SELECT * FROM ".db::$prefix."iprofile";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   $row = mysql_fetch_assoc($result);
   $lCurrentIProfile = $row["idiprofile"];
   mysql_free_result($result);

   // update tsep_internal/iprofile/current_iprofile record
   $sql = "UPDATE ".db::$prefix."internal SET numericvalue=$lCurrentIProfile WHERE stringtag='iprofile' AND description='current_iprofile'";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

   return($lCurrentIProfile);
} // GetCurrentIProfile()




/**
* SetCurrentIProfile() - sets current indexingprofileid
*
* updates tsep_internal/indexingprofile/current_indexingprofile
* if this id does not exist in tsep_indexingprofile/idiprofile, the first available id out of tsep_indexingprofile is taken
*
* returns the idiprofile
*
* @param $pcurrentIProfile
*/
//------------------------------------------------------------------------------
function SetCurrentIProfile($pcurrentIProfile)
//------------------------------------------------------------------------------
{
   

   // check, if according tsep_indexingprofile-record exists...
   $sql = "SELECT * FROM ".db::$prefix."iprofile WHERE idiprofile=$pcurrentIProfile";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   $ct = mysql_num_rows($result);
   mysql_free_result($result);

   if ( $ct == 0 )
   {
      // ...does not - get first tsep_indexingprofile-rec-id
      $sql = "SELECT * FROM ".db::$prefix."iprofile";
      $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
      $row = mysql_fetch_assoc($result);
      $pcurrentIProfile = $row["idiprofile"];
      mysql_free_result($result);
   }

   // update tsep_internal/indexingprofile/current_indexingprofile record
   $sql = "UPDATE ".db::$prefix."internal SET numericvalue=$pcurrentIProfile WHERE stringtag='iprofile' AND description='current_iprofile'";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

   return($pcurrentIProfile);
} // SetCurrentIProfile()



/**
* GetProfilename() - return indexingprofilename
*
* @param $pidiprofile
*/
//------------------------------------------------------------------------------
function GetProfilename($pidiprofile)
//------------------------------------------------------------------------------
{
   

   $sql = "SELECT * FROM ".db::$prefix."iprofile WHERE idiprofile=$pidiprofile";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   $row = mysql_fetch_assoc($result);
   $lclCurrentProfilename = $row["profilename"];
   mysql_free_result($result);

   return($lclCurrentProfilename);
} // GetProfilename()



/**
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



/**
* GetProfileNameList() - build list of all iprofilenames stored
*
* returns a comma-separated list (used by javascript checkNewProfileName())
*/
//------------------------------------------------------------------------------
function GetProfileNameList()
//------------------------------------------------------------------------------
{
   global$tsep_lng;

   $lRet = "";
   $sql = "SELECT * FROM ".db::$prefix."iprofile";
   $result = mysql_query($sql);
   while ( $row = mysql_fetch_assoc($result) )
      $lRet .= ( $lRet != "" ? "," : "" ) . trim($row["profilename"]);
   mysql_free_result($result);

   return($lRet);
} // GetProfileNameList()



/**
* GetProfileIdList() - build list of all iprofile-Ids stored
*
* returns a comma-separated list (used by function removeOldIndexEntries())
*/
//------------------------------------------------------------------------------
function GetProfileIdList()
//------------------------------------------------------------------------------
{
   global$tsep_lng;

   $lRet = "";
   $sql = "SELECT * FROM ".db::$prefix."iprofile";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   while ( $row = mysql_fetch_assoc($result) )
      $lRet .= ( $lRet != "" ? "," : "" ) . trim($row["idiprofile"]);
   mysql_free_result($result);

   return($lRet);
} // GetProfileIdList()



/**
* NewIProfile() - creates an indexingprofile and all according tsep_internal-records
*
* returns the new idiprofile or -1 on error
*
* the tsep_internal-records are copied (without values) from the first 'indexer'-records-set
*
* @param $pIndexingprofileNewname - new name
*/
//------------------------------------------------------------------------------
function NewIProfile($pIndexingprofileNewname)
//------------------------------------------------------------------------------
{
   global$tsep_lng;

   // check duplicate name
   $pIndexingprofileNewname = trim($pIndexingprofileNewname);
   $sql = "SELECT * FROM ".db::$prefix."iprofile WHERE profilename='$pIndexingprofileNewname'";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   $ct = mysql_num_rows($result);
   mysql_free_result($result);
   if ( $ct > 0 ) {
      echo "<div class='userError'>" . $tsep_lng['name_already_exists'] . ": $pIndexingprofileNewname</div>\n";
      return(-1);
   }

   // get first id (for copying tsep_internal-records later)
   $sql = "SELECT * FROM ".db::$prefix."iprofile";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   $row = mysql_fetch_assoc($result);
   $lFirstidiprofile = $row["idiprofile"];
   mysql_free_result($result);

   // insert tsep_indexingprofile
   $sql = "INSERT INTO ".db::$prefix."iprofile (profilename) VALUES ('$pIndexingprofileNewname')";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

   // get id from tsep_indexingprofile
   $sql = "SELECT * FROM ".db::$prefix."iprofile WHERE profilename='$pIndexingprofileNewname'";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   $ct = mysql_num_rows($result);
   if ( $ct == 0 )
      return(-1);
   $row = mysql_fetch_assoc($result);
   $lidiprofile = $row["idiprofile"];
   mysql_free_result($result);

   //copy tsep_internal-records
   $sql = "SELECT * FROM ".db::$prefix."internal WHERE stringtag='indexer' AND numtag=$lFirstidiprofile";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   while ( $row = mysql_fetch_assoc($result) ) {
      $sql  = "INSERT INTO ".db::$prefix."internal";
      $sql .= " (description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag)";
      $sql .= " VALUES ('".$row["description"]."',NULL,NULL,".$row["sortordervalue"].",'".$row["valuetype"]."','".$row["fieldtype"]."','indexer',$lidiprofile)";
      $insres = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   }
   mysql_free_result($result);

   // set new id to current
   $sql = "UPDATE ".db::$prefix."internal SET numericvalue=$lidiprofile WHERE stringtag='iprofile' AND description='current_iprofile'";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

   return($lidiprofile);

} // NewIProfile()



/**
* RenameIProfile() - renames the indexingprofile
*
* @param $pcurrentIProfile - indexingprofileID
* @param $pIndexingprofileNewname - new name
*/
//------------------------------------------------------------------------------
function RenameIProfile($pcurrentIProfile, $pIndexingprofileNewname)
//------------------------------------------------------------------------------
{
   global$tsep_lng;

   $pIndexingprofileNewname = trim($pIndexingprofileNewname);
   $sql = "SELECT * FROM ".db::$prefix."iprofile WHERE profilename='$pIndexingprofileNewname'";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   $ct = mysql_num_rows($result);
   if ( $ct > 0 ) {
      $row = mysql_fetch_assoc($result);
      mysql_free_result($result);
      if ( $row["idiprofile"] == $pcurrentIProfile )
         return;
      echo "<div class='userError'>" . $tsep_lng['rename'] . " " . $tsep_lng['impossible_already_exists'] . ": $pIndexingprofileNewname</div>\n";
      return;
   }
   mysql_free_result($result);
   $sql = "UPDATE ".db::$prefix."iprofile SET profilename='$pIndexingprofileNewname' WHERE idiprofile=$pcurrentIProfile";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
} // RenameIProfile()



/**
* DeleteIProfile() - deletes the indexingprofile
*
* @param $pcurrentIProfile - indexingprofileID
*/
//------------------------------------------------------------------------------
function DeleteIProfile($pcurrentIProfile)
//------------------------------------------------------------------------------
{
   global$tsep_lng;

   $sql = "DELETE FROM ".db::$prefix."iprofile WHERE idiprofile=$pcurrentIProfile";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   $sql = "DELETE FROM ".db::$prefix."internal WHERE stringtag='indexer' AND numtag=$pcurrentIProfile";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   removeOldIndexEntries($pcurrentIProfile);
} // DeleteIProfile()



/**
* CountIndexingprofiles() - return count of tsep_indexingprofile records
*/
//------------------------------------------------------------------------------
function CountIndexingprofiles()
//------------------------------------------------------------------------------
{
   

   $sql = "SELECT count(*) as ct FROM ".db::$prefix."iprofile";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   $row = mysql_fetch_assoc($result);
   mysql_free_result($result);
   return($row["ct"]);
} // CountIndexingprofiles()



/**
* PrepareIndexingParms() - adjusts $gArrIndexingParms to be used by Indexer
*
* directly modifies values within array given via param
*
* @param $pArr - $gArrIndexingParms-array
*/
//------------------------------------------------------------------------------
function AdjustValues4Indexing(&$pArrIndexingParms)
//------------------------------------------------------------------------------
{
        global $print_list_of_files, $tsep_lng;
        
        if ( !isset($pArrIndexingParms["XdirName"]) )
           $pArrIndexingParms["XdirName"] = "";
        if ( empty($pArrIndexingParms["XdirName"]) ) {     // 'compute' XdirName, if XdirName-definition in db is empty
           $lArrTmp = pathinfo($_SERVER["PHP_SELF"]);
           $lDirName = $lArrTmp['dirname'];                        // absolute path of php-script
           $lArrTmp = parse_url($pArrIndexingParms["Xwebdir"]);
           $lTmpPathUrl = $lArrTmp['path'];           
           $regex = array("/[^\/]+/", "/^\//");
           $replace = array("..", "");
           $lDirName = preg_replace($regex, $replace, $lDirName); // replace each dirname by ".."; remove leading slash
           $lDirName .= $lTmpPathUrl . "/";                         // append path, if (any)
           $lDirName  = preg_replace("/\/+$/", "/", $lDirName);    // replace (possibly) multiple trailing slashes by one slash

           $pArrIndexingParms["XdirName"]["name"]  = "XdirName";
           $pArrIndexingParms["XdirName"] = $lDirName;
        }
        $a = realpath($pArrIndexingParms["XdirName"]);
        if ( realpath($pArrIndexingParms["XdirName"]) == False ) {
        	$pArrIndexingParms["XdirName"] = preg_replace("/\\\\/","/",$pArrIndexingParms["XdirName"]);
        	echo "<div class='indexingErrorTitle'>" . sprintf($tsep_lng['XdirName_wrongpath'], $pArrIndexingParms["XdirName"]) . "</div>";
        	//die();
        }
        $pArrIndexingParms["XdirName"] = realpath($pArrIndexingParms["XdirName"]);
        $pArrIndexingParms["XdirName"] = preg_replace('/\\\/','/', $pArrIndexingParms["XdirName"]);

        if ( isset($pArrIndexingParms["dir_exclude"]) ) {
           $regex = array("/[\r\n]/", "/ *,+ */", "/\.\*/", "/\.\+/", "/\?/", "/\*/", "/\+/");
           $replace = array("", "|", "*", "+", ".", ".*", ".*");
           $pArrIndexingParms["dir_exclude"] = preg_replace($regex, $replace, trim($pArrIndexingParms["dir_exclude"]));
        }

        if ( isset($pArrIndexingParms["file_exclude"]) ) {
           $regex = array("/[\r\n]/", "/ *,+ */");
           $replace = array("", "|");
           $pArrIndexingParms["file_exclude"] = preg_replace($regex, $replace, trim($pArrIndexingParms["file_exclude"]));
        }

        if ( isset($pArrIndexingParms["ext_include"]) ) {
           $regex = array("/[\r\n]/", "/ *,+ */", "/\./");
           $replace = array("", "|", "");
           $pArrIndexingParms["ext_include"] = preg_replace($regex, $replace, trim($pArrIndexingParms["ext_include"]));
        }
                
        if ( isset($pArrIndexingParms["subdirs2index"]) ) {
        	if ( ! empty($pArrIndexingParms["subdirs2index"]) ) {
		       $regex = array("/ *[\r\n,]+ */");
		       $replace = array(",");
		       $pArrIndexingParms["subdirs2index"] = preg_replace($regex, $replace, trim($pArrIndexingParms["subdirs2index"]));
        	} else
        	   $pArrIndexingParms["subdirs2index"] = ""; // empty by intention! why? see search_get()
        }

        $print_list_of_files = ( $pArrIndexingParms["print_list_of_files"] == 'true' ) ? true : false;
} // AdjustValues4Indexing()



/**
* search_get() - main search routine
*
* 1. launches get_external_filelist() (storing filenames into array $arr_searchfilenames)
* 2. launches read_directory() (storing filenames into array $arr_searchfilenames)
* 3. runs file_parser() to parse files
*
* The key used to store filenames into array $arr_searchfilenames is the filename itself; this is also done
* to avoid duplicate indexing of files found by get_external_filelist() AND read_directory()
*
* returns false on error, else true
*
* @param $pArrIndexingParms
*/
//------------------------------------------------------------------------------
function search_get($pArrIndexingParms)
//------------------------------------------------------------------------------
{
        global $arr_searchfilenames,$arr_searchskipped,$arr_ExternalErr,$arr_ExternalInf,$tsep_lng;
		global $myIndexer;
		
        _TsepTrace("before buildProtectedIndexEntriesList()");
		$myIndexer->touchIndexerRunning();
        buildProtectedIndexEntriesList();

        $bOk = ( ( $pArrIndexingParms["searchViaExt"] == "true" And !file_exists($pArrIndexingParms["fnExternalPhp"]) ) ? 0 : 1 );

        if ( $bOk == 1 )
        {
           if ( $pArrIndexingParms["searchViaExt"] == "true" ) {
              _TsepTrace("before get_external_filelist()");
              $myIndexer->touchIndexerRunning();
              get_external_filelist($pArrIndexingParms);
              _TsepTrace("after get_external_filelist()");
           }
           if ( $pArrIndexingParms["searchViaRead"] == "true" ) {
		        foreach ( split(",", $pArrIndexingParms["subdirs2index"]) as $key1 => $data1 ) {
		        	// if no subdir has been defined, $pArrIndexingParms["subdirs2index"] is empty (NOT undefined!), which forces
		        	// this foreach-loop to return an "empty record", which leads to ONE read_dirtree()-call, directly using XdirName/Xwebdir
		        	$data1 = ( !empty($data1) ? "/$data1" : "" );
		        	$lXdirName = $pArrIndexingParms["XdirName"] . $data1;
		        	$lXwebdir = $pArrIndexingParms["Xwebdir"] . $data1;
		              _TsepTrace("before read_dirtree(:$lXdirName:$lXwebdir:)");
		              $myIndexer->touchIndexerRunning();
		              read_dirtree($lXdirName,
		                           $lXwebdir,
		                           $pArrIndexingParms["dir_exclude"],
		                           $pArrIndexingParms["file_exclude"],
		                           $pArrIndexingParms["ext_include"]);
		              _TsepTrace("after read_dirtree(:$lXdirName:$lXwebdir:)");
		        } // foreach
           }
        }

        ?>
        <script>
        <!--
           document.getElementById("ResultsHeadlineSearching").style.display='none';
           document.getElementById("ResultsHeadlineBuilding").style.display='none';
           document.getElementById("ResultsHeadlineResult").style.display='block';
        //-->
        </script>
        <?php


        if ( $pArrIndexingParms["searchViaExt"] == "true" ) {
           if ( $arr_ExternalErr ) {
              $myIndexer->touchIndexerRunning();
              echo "<div class='indexingErrorTitle'>" . $tsep_lng['error_from_extscript'] . ":</div>\n";
              while ( list($key,$data) = each($arr_ExternalErr) )
                 echo "<div class='indexingError'>$data</div>\n";
           }

           if ( $arr_ExternalInf ) {
              $myIndexer->touchIndexerRunning();
              echo "<div class='indexingInfoTitle'>" . $tsep_lng['info_from_extscript'] . ":</div>\n";
              while ( list($key,$data) = each($arr_ExternalInf) )
                 echo "<div class='indexingInfo'>$data</div>\n";
           }
        }

        if ( $bOk == 0 )
        {
           echo "<div class='indexingError'>external .php-scriptfile not found: " . $pArrIndexingParms["fnExternalPhp"] . "</div>";
           return(false);
        }
        if (!$arr_searchfilenames)
        {
           echo "<div class='indexingErrorTitle'>" . $tsep_lng['found_no_pages'] . "</div>";
           if ( $pArrIndexingParms["searchViaRead"] == "true" )
              echo "<div class='indexingError'>(" . $tsep_lng["config_searchViaRead"] . ": '" . $pArrIndexingParms["XdirName"] . "*')</div>";
           if ( $pArrIndexingParms["searchViaExt"] == "true" )
              echo "<div class='indexingError'>(" . $tsep_lng["config_searchViaExt"] . ": '" . $pArrIndexingParms["Xwebdir"] . "', '" . $pArrIndexingParms["parmsExternalPhp"] . "')</div>";
           _TsepTrace("$arr_searchfilenames empty - listSkippedFilenames() and return with false");
           $myIndexer->touchIndexerRunning();
           listSkippedFilenames();
           return(false);
        }

        ksort($arr_searchfilenames);

        return(true);
} // search_get()



/**
* build_results() - build results (either filelist or build index)
*
* @param $pArrIndexingParms
* @param $currentIProfile
*/
//------------------------------------------------------------------------------
function build_results($pArrIndexingParms,$currentIProfile)
//------------------------------------------------------------------------------
{
        global $tsep_config;
        
        global $arr_searchfilenames;
        global$tsep_lng;
        
        global $myIndexer;

        if ( $pArrIndexingParms["listFilenamesOnly"] == "true" )
        {
           $myIndexer->touchIndexerRunning();
           listFilenames();
           $myIndexer->touchIndexerRunning();
           listSkippedFilenames();
           return;
        }

        //************
        // build index
        //************

        ?>
        <script>
        <!--
           document.getElementById("ResultsHeadlineSearching").style.display='none';
           document.getElementById("ResultsHeadlineBuilding").style.display='block';
           document.getElementById("ResultsHeadlineResult").style.display='none';
        //-->
        </script>
        <?php

        flush();

        // update 'last-indexed'-timestamp
        require( TSEP_INCLUDE_DIR."/stampittimestamp.php" );
        $updateSQL = "UPDATE ".db::$prefix."internal SET stringvalue='$tsepindexeditdate' WHERE description='tsepindexeditdate' AND stringtag='internal'";
        $Result = mysql_query($updateSQL) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

        $myIndexer->touchIndexerRunning();
        listSkippedProtected();

        $myIndexer->touchIndexerRunning();
        $larrRemovedSearchRecURLs = removeOldIndexEntries($currentIProfile);

        $amt = count($arr_searchfilenames);

        $db_item_num = $amt;
        require( TSEP_INCLUDE_DIR."/indexstatus.php" );

        $myIndexer->touchIndexerRunning();
        $larrNewSearchRecURLs = buildIndex();

//		remove ContentImages, without corresponding
	   	$myContentImgs = new ContentImages();
		if ( $myContentImgs->useContentImages() == true ) {
	        foreach ($larrRemovedSearchRecURLs as $key1 => $data1) {
	        	if ( array_key_exists($key1, $larrNewSearchRecURLs) == false ) {
				   	$myContentImgs->setPageURL($key1);
	        		$myContentImgs->deleteContentImage();
	        	}
	        }
		}
	   	$myContentImgs = NULL;
	   	
        ?>
        <script>
        <!--
           document.getElementById("ResultsHeadlineSearching").style.display='none';
           document.getElementById("ResultsHeadlineBuilding").style.display='none';
           document.getElementById("ResultsHeadlineResult").style.display='block';
        //-->
        </script>
        <?php
} // build_results()



/**
* buildIndex() - parses files and creates _search-records
*
* RETURNS an array holding the URLs (as keys) from the newly inserted records 
*/
//------------------------------------------------------------------------------
function buildIndex()
//------------------------------------------------------------------------------
{
   global$arr_searchfilenamesLocal;
   global $arr_searchfilenames, $currentIProfile, $tsep_lng, $print_list_of_files;
   global $myIndexer;

   $amt = count($arr_searchfilenames);
   $ct = 0;
   $ErrCt = 0;
   $EmptyCt = 0;
   showResultsHeadlineFileCount($ct,$amt);
   showAbbreviatedDetailsHeader();
	$larrConfigContentPi = ReadValuesFromInternal("stringtag='configcontentimg'");
	$lCreateContentImgFilelist = ( $larrConfigContentPi['configcontentimg_create_flists'] == 'true' ? true : false );
	if ( $lCreateContentImgFilelist ) {
	   	$myContentImgs = new ContentImages();
	   	$myContentImgs->setIndexerFilelistFile(GetProfilename($currentIProfile));
	   	$myContentImgs->initIndexerFilelistFile();
		$lContentPiHavingNoContentPi = ( isset($larrConfigContentPi['configcontentimg_having_no_contentimg']) ? ( $larrConfigContentPi['configcontentimg_having_no_contentimg'] == "true" )  : false);
	   	$lMsg = ( $lContentPiHavingNoContentPi == true ) ? " (for " . $tsep_lng['pages_having_no_contentimg'] . ")" : "";
		$myContentImgs->writetoIndexerFilelistFile("# TSEP " . $tsep_lng['contentimg_filelist'] . "\n# " . $tsep_lng['contentimg_filelist_autobuild'] . "$lMsg\n");
	}
	$larrNewSearchRecURLs = array();
	foreach($arr_searchfilenames as $key => $data)
	{
      $myIndexer->touchIndexerRunning();
      $ct = $ct + 1;
      showResultsHeadlineFileCount($ct,$amt);
      $lFnLocal = ( isset($arr_searchfilenamesLocal[$key]) ? $arr_searchfilenamesLocal[$key] : "" );
      $lFnLocal = ( preg_match("/^https?:\\/\\//i", $lFnLocal ) ? '' : $lFnLocal ); // "http://"- and "https://"-files are not local -> ""
      _TsepTrace("buildIndex() calling file_parser for $key,$lFnLocal,$data (Count $ct/$amt)");
      list($lPageTitle,
           $lPageUrl,
           $lFileSize,
           $lIndexedWords,
           $lIndexedMetaWords) = file_parser($key,$lFnLocal,$data);
      if ( $lPageTitle == "<error>" ) {
                _TsepTrace("buildIndex() file_parser returned with error");
                showError( $key );
                $ErrCt++;
         continue;
      }
      if ( $lPageTitle == "<empty>" ) {
                _TsepTrace("buildIndex() file_parser returned with empty");
                showError( $tsep_lng['error_index_nothing']. $key );
                $EmptyCt++;
         continue;
      }

      _TsepTrace("buildIndex() doing for $lPageUrl (Count $ct/$amt)");

      $lProtected = '0';

      //$current_date = addslashes($current_date);

      $myIndexer->touchIndexerRunning();
      $lIdSearch = -1;
      $sql = "SELECT * FROM ".db::$prefix."search WHERE page_url='$lPageUrl'";
      $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
      if ( mysql_num_rows($result) > 0 ) {
         $row = mysql_fetch_assoc($result);
         mysql_free_result($result);
         $lIdSearch = $row['id'];
         $timestamp = activeIndexer::getTimeStamp();
         $sql  = "UPDATE ".db::$prefix."search SET protect_indexentry='$lProtected', page_title='$lPageTitle', page_url='$lPageUrl', page_file_size='$lFileSize', indexed_words='$lIndexedWords', indexed_metawords='$lIndexedMetaWords', last_indexed='$timestamp' WHERE page_url='$lPageUrl'";
         mysql_query($sql) or die("Couldn't update ".db::$prefix."search (page_url=$lPageUrl) ".mysql_error());
      } else {
         mysql_free_result($result);
      }

      $myIndexer->touchIndexerRunning();
      if ( $lIdSearch == -1 ) {
         $timestamp = activeIndexer::getTimeStamp();
         $sql = "INSERT INTO ".db::$prefix."search (protect_indexentry, page_title, page_url, page_file_size, indexed_words, indexed_metawords, last_indexed) values('$lProtected', '$lPageTitle', '$lPageUrl', '$lFileSize', '$lIndexedWords', '$lIndexedMetaWords', '$timestamp')";
         mysql_query($sql) or die("Couldn't insert into ".db::$prefix."search (page_url=$lPageUrl) ".mysql_error());         
         $lIdSearch = mysql_insert_id();
      }
      $sql = "INSERT INTO ".db::$prefix."iprofile_search (idiprofile, idsearch) values($currentIProfile, $lIdSearch)";
      mysql_query($sql) or die("Couldn't insert into ".db::$prefix."iprofile_search (page_url=$lPageUrl) ".mysql_error());

	if ( $lCreateContentImgFilelist ) {
		if ( $myContentImgs->useContentImages() == true ) {
			if ( $lContentPiHavingNoContentPi == true ) {
			   	$myContentImgs->setPageURL($lPageUrl);
				if ( $myContentImgs->getContentImageType() == $myContentImgs->CONTENTPI_TYPE_DEFAULT )
					$myContentImgs->addIndexerFilelistFileEntry($lPageUrl);
			} else
		   		$myContentImgs->addIndexerFilelistFileEntry($lPageUrl);
		}
	}
	
		$lAssignedIProfiles = GetAssignedIProfiles($lIdSearch);
		
		$larrNewSearchRecURLs[$lPageUrl] = 1;
		
		if ($print_list_of_files)
			showAbbreviatedPageDetails( 
			        $lIdSearch,
			        $lPageTitle, 
			        $lPageUrl, 
			        $lIndexedMetaWords, 
			        $lIndexedWords, 
			        $lProtected );                        

		flush();
		sleep(0.001);
	} //for
	if ( $lCreateContentImgFilelist ) {
		if ( $myContentImgs->useContentImages() == true )
		   	echo "<div>" . sprintf($tsep_lng['stat_indexer_wrote_contentimg'], $myContentImgs->getIndexerFilelistFileCt(), $myContentImgs->getIndexerFilelistFile() ) . "</div>";
		else
		   	echo "<div>" . sprintf($tsep_lng['stat_indexer_nowrite_contentimg'], $tsep_lng['contentimgs_not_used'] ) . "</div>";
		$lTransformContentImgFilelist = ( $larrConfigContentPi['configcontentimg_autorun_flisttrans'] == 'true' ? true : false );
		if ( $lTransformContentImgFilelist == true )
			$myContentImgs->doTransform();

		$myContentImgs = NULL;
	}

   $myIndexer->touchIndexerRunning();
        showAbbreviatedDetailsFooter();

   if ( $ErrCt > 0 )
      echo "<div class='internalError'>$ErrCt " . $tsep_lng['error_while_parsing'] . "</div>\n";
   if ( $EmptyCt > 0 )
      echo "<div class='internalError'>$EmptyCt " . $tsep_lng['error_empty_files'] . "</div>\n";

	return ( $larrNewSearchRecURLs );
} // buildIndex()



/**
* read_dirtree() - find files via directory-read
*
* recursivly reads directories (starting at $XdirName) and
* calls add_filename()
*
* @param $XdirName
* @param $Xwebdir
* @param $dir_exclude (passed to sub-function only)
* @param $file_exclude (passed to sub-function only)
* @param $ext_include
*/
//------------------------------------------------------------------------------
function read_dirtree($XdirName,$Xwebdir,$dir_exclude,$file_exclude,$ext_include)
//------------------------------------------------------------------------------
{
	global $arr_searchskipped,$gArrIndexingParms;
	global $myIndexer;
	static $larrINode = array();

	$Xwebdir = preg_replace("/\/+$/", "", $Xwebdir); //remove trailing slashes
// if some problems occcur between windows and linux we can try to use this
// from http://de2.php.net/manual/de/class.dir.php
//added @ for testing if we subpress the error when trying to access forbidden paths

	if ( is_link($XdirName) )
		if ( $gArrIndexingParms['skip_symblinks'] == 'false' )
			_TsepTrace("read_dirtree: directory IS_LINK: $XdirName - NOT skipped");
		else {
			$arr_searchskipped['DirIsSymbolicLink'][$XdirName] = $XdirName;
			_TsepTrace("read_dirtree: directory IS_LINK: $XdirName - SKIPPED");
			return;
		}


	if ( ( $lINode = @fileinode($XdirName) ) ) {	// not available under WIN echo "IN=$lInode<br>";
		if ( array_key_exists($lINode, $larrINode) ) {
			$arr_searchskipped['DirDuplicateINode'][$XdirName] = $XdirName;
			_TsepTrace("read_dirtree: skipping cause duplicate directory-INode $lINode: $XdirName");
			return;
		}
		$larrINode[$lINode] = $lINode;
	}

	$d = @dir(appendslash($XdirName));
	_TsepTrace("read_dirtree dir: &lt;" . appendslash($XdirName) . "&gt; inode=" . @fileinode($XdirName) );
	if (!$d)  // needed if we can not access the directory for any reason to resume where we left of
	{
		_TsepTrace("read_dirtree UNABLE to open $XdirName to read (may be just empty)");
		return;
	}
//added @ for testing if we subpress the error when trying to access forbidden paths
        while ((@$entry = $d->read()) != "")    //new as on http://de2.php.net/manual/de/class.dir.php
        {
                if ($entry != "." && $entry != "..")
                {
//added @ before "is_dir" for testing if we subpress the error when trying to access forbidden paths
                        $XdirName = preg_replace("/\/+$/", "", $XdirName); //remove trailing slashes
					    $myIndexer->touchIndexerRunning();
                        if ( is_dir($XdirName."/".$entry) )     // &&    (!$fp = @fopen($XdirName."/".$entry,"r"))))
                        {
                                $lDir2Test = str_replace('\\', "/", realpath("$XdirName/$entry"));
                                $lDir2Test = substr($lDir2Test, strlen($gArrIndexingParms["XdirName"]))."/";
                                $lShowDirNotTested = $gArrIndexingParms["XdirName"];
                                $lShowDirTested    = $lDir2Test;
                                if (empty($dir_exclude) or !@preg_match("#$dir_exclude#",$lDir2Test)) // directory exclusion condition (NEEDED here too (for external Datasupply))
                                {
                                       $temp_var = $Xwebdir;
                                       $temp_var = $temp_var."/".$entry;
                                       read_dirtree($XdirName."/".$entry,$temp_var,$dir_exclude,$file_exclude,$ext_include);
                                } else {
//                                     $arr_searchskipped['DirExclude'][$XdirName."/".$entry] = $dir_exclude;
                                       $arr_searchskipped['DirExclude']["<s>$lShowDirNotTested</s>" . preg_replace("#($dir_exclude)#","<b>$1</b>",$lShowDirTested) .""] = $dir_exclude;
                                }
                        }
                        else
                        {
                                add_filename($XdirName,$Xwebdir,$dir_exclude,$file_exclude,$ext_include,$entry);
                        }
                }
        }
        $d->close();
} // read_dirtree()




/**
* TSEP_ExternalCallBack()
*
* - captures the output of the external Function (one call for one URL)
* - parses the output
*
* the output has to have the following format (starting a col1):
*
*    URL>FilenamesUrl
*    ERR>ErrorMessage
*    INF>InfoMessage
*    ???auch vorsehen???: IGN>type<ENTRY>entry<REASON>reason
*    ALL>FilenamesUrl<TSEPCONTENT>ContentOfTheFile
*
* URL: the FilenamesUrl is stored into the global array $arr_searchfilenames
* ERR: the ErrorMessage is echoed to the browser
* INF: the InfoMessage is echoed to the browser
* ALL: the FilenamesUrl is stored into the global array $arr_searchfilenames and
*      the ContentOfTheFile is stored in addition into the global array $arr_searchfilenames
*      giving the ability to avoid reading the file a second time
*
* @param $entry
*/
//------------------------------------------------------------------------------
function TSEP_ExternalCallBack($entry)
//------------------------------------------------------------------------------
{
        global $arr_searchfilenames,$arr_ExternalErr,$arr_ExternalInf,$tsep_lng,$gArrIndexingParms;
		global $myIndexer;
		
		$myIndexer->touchIndexerRunning();
        $entry = eregi_replace("(\n)", "", $entry);
        preg_match("/^(....)(.+)$/i", $entry, $matches );
        $cmd   = $matches[1];
        $entry = $matches[2];
        switch ($cmd)
        {
                case "INF>":
                        $arr_ExternalInf[] = $entry;
                        break;
                case "ERR>":
                        $arr_ExternalErr[] = $entry;
                        break;
                case "URL>":
                        $entry = @eregi_replace("^$Xwebdir(.+)$", "\\1",$entry);
                        preg_match("/^(.*)\/(.+)$/", $entry, $matches);
                        $XdirName  = $matches[1] . "/";
                        $XwebdirP = $gArrIndexingParms["Xwebdir"] . $matches[1];
                        $entry    = $matches[2];
                        add_filename($XdirName,
                                     $XwebdirP,
                                     $gArrIndexingParms["dir_exclude"],
                                     $gArrIndexingParms["file_exclude"],
                                     $gArrIndexingParms["ext_include"],
                                     $entry);
                        break;
                case "ALL>":
                        if (!@preg_match("/^(.+)<tsepcontent>(.*)$/i", $entry, $matches ))
                        {
                                $entry = substr($entry,0,128) . "...";
                                $entry = @str_replace("<", "&lt;",$entry);
                                $entry = @str_replace(">", "&gt;",$entry);
                                echo "<div class='indexingError'>invalid 'ALL>'-resultline: $entry</div>";
                                continue;
                        }
                        $entry   = $matches[1];
                        $content = $matches[2];
                        if ( @ereg("^\s*$",$content) ) {
                                echo "<div class='indexingError'>empty file ignored: $entry</div>";
                                continue;
                        }
                        $entry = @eregi_replace("^$Xwebdir(.+)$", "\\1",$entry);
                        preg_match("/^(.*)\/(.+)$/", $entry, $matches);
                        $XdirName  = $matches[1] . "/";
                        $XwebdirP = $gArrIndexingParms["Xwebdir"] . $matches[1];
                        $entry    = $matches[2];
                        $url = add_filename($XdirName,
                                            $XwebdirP,
                                            $gArrIndexingParms["dir_exclude"],
                                            $gArrIndexingParms["file_exclude"],
                                            $gArrIndexingParms["ext_include"],
                                            $entry);
                        if ( $url != "" )
                                $arr_searchfilenames[$url] = $content;
                        break;
                default:
                        echo "<div class='indexingError'>invalid external resultline: $entry</div>";
                        break;
        }
} // TSEP_ExternalCallBack()




/**
* get_external_filelist() - executes require_once($fnExternalPhp)
*
* the CallbackFunction TSEP_ExternalCallBack() has to be called by $fnExternalPhp to "deliver" the results
*
* The following internal TSEP-variables are copied into global's and can be used from within the called script:
*       $TSEPparmsexternalphp  ( = parmsExternalPhp )
*       $TSEPlistFilenamesOnly ( = listFilenamesOnly )
*       $TSEPdirname           ( = XdirName )
*       $TSEPwebdir            ( = Xwebdir )
*       $TSEPdirexclude        ( = dir_exclude )
*       $TSEPfileexclude       ( = file_exclude )
*       $TSEPextinclude        ( = ext_include )
*
* @param $pArrIndexingParms
*/
//------------------------------------------------------------------------------
function get_external_filelist($pArrIndexingParms)
//------------------------------------------------------------------------------
{
        global $TSEPparmsexternalphp, $TSEPlistFilenamesOnly, $TSEPdirname, $TSEPwebdir, $TSEPdirexclude, $TSEPfileexclude, $TSEPextinclude;

        $TSEPparmsexternalphp  = $pArrIndexingParms["parmsExternalPhp"];
        $TSEPlistFilenamesOnly = $pArrIndexingParms["listFilenamesOnly"];
        $TSEPdirname           = $pArrIndexingParms["XdirName"];
        $TSEPwebdir            = $pArrIndexingParms["Xwebdir"];
        $TSEPdirexclude        = $pArrIndexingParms["dir_exclude"];
        $TSEPfileexclude       = $pArrIndexingParms["file_exclude"];
        $TSEPextinclude        = $pArrIndexingParms["ext_include"];

        require_once($pArrIndexingParms["fnExternalPhp"]);

} // get_external_filelist()



/**
* add_filename() - add a filename to the global array $arr_searchfilenames
*
* the filename is not added, if $dir_exclude or $file_exclude blocks it
* or it's an unwanted filetype
*
* @param $XdirName
* @param $Xwebdir
* @param $dir_exclude
* @param $file_exclude
* @param $ext_include
* @param $entry (file's name and ext)
*
* @returns $fullpath (index of the global $arr_searchfilenames, where the filename is stored)
*/
//------------------------------------------------------------------------------
function add_filename($XdirName,$Xwebdir,$dir_exclude,$file_exclude,$ext_include,$entry)
//------------------------------------------------------------------------------
{ // returns arrayindex (fullpath-name) or ""
        global $arr_searchfilenames,$arr_searchfilenamesLocal,$arr_searchskipped,$gProtectedIndexEntriesList;
        global $gArrIndexingParms;

        $indexer_filename = "indexer.php";      // will be excluded from indexing
        $search_filename = "search.php";        // will be excluded from indexing

        $ExtAllowed = "/\.(" . $ext_include . ")$/"; // MJ - repalces "(.)+\\.html$|htm$|php3$|php$|)";

        if ( preg_match("/^(http:\/\/[^\/]+)/i", $XdirName, $lMatches)) {
           $lDir2Test = preg_replace("/^http:\/\/[^\/]+/i", "", $XdirName);
           $lShowDirNotTested = $lMatches[1];
           $lShowDirTested    = $lDir2Test;
        } else {
           $lDir2Test = str_replace('\\', "/", realpath("$XdirName"));
           $lDir2Test = substr($lDir2Test, strlen($gArrIndexingParms["XdirName"]))."/";
           $lShowDirNotTested = $gArrIndexingParms["XdirName"];
           $lShowDirTested    = $lDir2Test;
        }

        if (empty($dir_exclude) or !@preg_match("#$dir_exclude#",$lDir2Test)) // directory exclusion condition (NEEDED here too (for external Datasupply))
        {
                if (empty($file_exclude) or !preg_match ("/" . $file_exclude . "/", $XdirName."/".$entry)) // file exclusion condition
                {
                        if (preg_match ($ExtAllowed,$entry)) // for parsing only htm, html, php, php3 files
                        {
                                if($entry != $indexer_filename && $entry != $search_filename) // for exclusion of indexer.php3 and search.php3 file
                                {
                                        $fullpath = $Xwebdir ."/".$entry ;
                                        if ( strpos($gProtectedIndexEntriesList, ",".$fullpath.",") === false )
                                        {
                                                $arr_searchfilenames[$fullpath] = "1";
                                                $arr_searchfilenamesLocal[$fullpath] = $XdirName."/".$entry;
                                                $ct = count($arr_searchfilenames);
                                                showResultsHeadlineFileCount($ct,-1);
                                                return($fullpath);
                                        } else {
                                                $arr_searchskipped['ExistingIndexEntryIsProtected'][$XdirName."/".$entry] = "-";
                                        }
                                }
                        } else {
                                $arr_searchskipped['ExtDisAllowed'][$XdirName."/".$entry] = $ExtAllowed;
                        }
                } else {
                        $arr_searchskipped['FileExclude'][$XdirName."/".$entry] = $file_exclude;
                }
        } else {
//                $arr_searchskipped['DirExclude'][$XdirName] = $dir_exclude;
                  $arr_searchskipped['DirExclude']["<s>$lShowDirNotTested</s>" . preg_replace("#($dir_exclude)#","<b>$1</b>",$lShowDirTested) .""] = $dir_exclude;
        }
        return("");
} // add_filename()



/**
* buildProtectedEntriesArray() - builds a string, holding urls of protected tsep_search-records
*
* creates GLOBAL string $gProtectedIndexEntriesList
* This list intentionally contains ALL indexentries regardless of the indexingprofile.
*/
//------------------------------------------------------------------------------
function buildProtectedIndexEntriesList()
//------------------------------------------------------------------------------
{
   global $gProtectedIndexEntriesList;
   global$tsep_lng;

   $gProtectedIndexEntriesList = ",";
   $sql = "SELECT * FROM ".db::$prefix."search WHERE protect_indexentry='1'";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   while ( $row = mysql_fetch_assoc($result) )
      $gProtectedIndexEntriesList .= trim($row["page_url"]) . ",";
   mysql_free_result($result);
} // buildProtectedIndexEntriesList()




/**
* showResultsHeadlineFileCount() - refresh "progress-indicator"-text
*
* @param $ct  - current count
* @param $amt - amount or -1
*/
//------------------------------------------------------------------------------
function showResultsHeadlineFileCount($ct,$amt)
//------------------------------------------------------------------------------
{
   global $tsep_lng;
   static $oldPerc = 0;

   if ( $amt == -1 ) {
      if (!( ($ct % 5) == 0 ))
         return;
      $lclTxt = "$ct";
      $lclId  = "Searching";
   } else {
      if ( $amt == 0 ) // avoid divByZero
         $amt = $ct;
      $Perc = round(($ct/$amt)*100);
      if ( $Perc == $oldPerc )
         return;
      if ( !($Perc == 1 or $Perc == 3 or ( $Perc % 5 ) == 0) )
         return;
      $oldPerc = $Perc;
      $lclTxt = $Perc . "% / $amt ";
      $lclId  = "Building";
   }
?><script>
<!--
cnt('<?php echo $lclId; ?>','<?php echo $lclTxt; ?>');
//-->
</script><?php

   flush();
} // showResultsHeadlineFileCount()




/**
* listFilenames() - show list of found filesnames
*/
//------------------------------------------------------------------------------
function listFilenames()
//------------------------------------------------------------------------------
{
   global $arr_searchfilenames,$tsep_lng;

   echo "<div class='ListOfToBeIndexedFiles'>";
   echo "<div class='ListOfToBeIndexedFilesCount'>" . count($arr_searchfilenames) . " " . $tsep_lng['pages_to_be_indexed'] . "</div>";
   echo "<table>\n";
   echo "<tr><th>" . $tsep_lng['directory'] . "</th><th>" . $tsep_lng['filename'] . "</th></tr>\n";
   while ( list($key,$data) = each($arr_searchfilenames) )
   {
           preg_match("/^(.+)\/([^\/]+)$/", $key, $matches); //split at last slash
           echo "<tr><td>$matches[1]</td><td><a href='$key'>$matches[2]</a></td></tr>\n";
   }
   echo "</table>\n";
   echo "</div>\n";
} // listFilenames()





/**
* listSkippedFilenames() - show list of skipped filesnames
*/
//------------------------------------------------------------------------------
function listSkippedFilenames()
//------------------------------------------------------------------------------
{
   global $arr_searchskipped,$tsep_lng;

   if ( $arr_searchskipped )
   {
      while ( list($key1,$data1) = each($arr_searchskipped) )
      {
         echo "<div class='ListOfToBeIndexedFiles'>";
         echo "<div class='ListOfToBeIndexedFilesCount'>" . count($data1) . " " . $tsep_lng['pages_not_to_be_indexed'] . " (" . $tsep_lng['type'] . ": $key1)</div>";
         echo "<table>\n";
         echo "<tr><th>" . $tsep_lng['type'] . "</th><th>" . $tsep_lng['directory'] . "/" . $tsep_lng['filename'] . "</th><th>" . $tsep_lng['filter'] . "</th></tr>\n";
         ksort($data1);
         while ( list($key2,$data2) = each($data1) )
            echo "<tr><td>$key1</td><td>$key2</td><td>$data2</td></tr>\n";
         echo "</table>\n";
         echo "</div>\n";
      }
   }
} // listSkippedFilenames()



/**
* listSkippedProtected() - show a list of all files, which will not be indexed, because of an existing protected indexentry
*/
//------------------------------------------------------------------------------
function listSkippedProtected()
//------------------------------------------------------------------------------
{
   global $arr_searchskipped,$tsep_lng;

   if ( $arr_searchskipped['ExistingIndexEntryIsProtected'] )
   {
      echo "<div class='ListOfToBeIndexedFiles'>";
      echo "<div class='ListOfToBeIndexedFilesCount'>" . count($arr_searchskipped['ExistingIndexEntryIsProtected']) . " " . $tsep_lng['skip_cause_protected_indexentry'] . "</div>";
      echo "<table>\n";
      echo "<tr><th>" . $tsep_lng['directory'] . "/" . $tsep_lng['filename'] . "</th></tr>\n";
      ksort($arr_searchskipped['ExistingIndexEntryIsProtected']);
      while ( list($key1,$data1) = each($arr_searchskipped['ExistingIndexEntryIsProtected']) )
         echo "<tr><td>$key1</td></tr>\n";
      echo "</table>\n";
      echo "</div>\n";
   }
} // listSkippedProtected()




/**
* removeOldIndexEntries()
*
* 1. remove all records from tsep_iprofile_search,
*    having currentIProfile and according tsep_search-record is not protected
* 2. remove all tsep_search-records which are not referenced in tsep_iprofile_search in any way
*    (in this case, the iprofile_id is intentionally not used)
* 
* RETURNS an array holding a list of URLs (as keys), which _search-entries has been removed
*/
//------------------------------------------------------------------------------
function removeOldIndexEntries($currentIProfile)
//------------------------------------------------------------------------------
{
   
   global $myIndexer;

// 1. clean-up, if profile has been deleted

   $myIndexer->touchIndexerRunning();
   $lKeepIdiProfiles = GetProfileIdList();
   $sql  = "DELETE FROM ".db::$prefix."iprofile_search";
   $sql .= " WHERE idiprofile NOT IN ($lKeepIdiProfiles)";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

// 2. remove all records from tsep_iprofile_search,
//    having currentIProfile and according tsep_search-record is not protected

   $myIndexer->touchIndexerRunning();
   $sql  = "SELECT ips.idiprofilesearch";
   $sql .= " FROM ".db::$prefix."iprofile_search ips, ".db::$prefix."search s";
   $sql .= " WHERE ips.idiprofile = $currentIProfile";
   $sql .= "   AND ips.idsearch = s.id";
   $sql .= "   AND s.protect_indexentry <> '1'";
   $sql .= " ORDER BY ips.idiprofilesearch";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

   $lDeleteIProfileRecIds = "";
   while ( $row = mysql_fetch_assoc($result) )
      $lDeleteIProfileRecIds .= ( $lDeleteIProfileRecIds != "" ? "," : "" ) . trim($row["idiprofilesearch"]);
   mysql_free_result($result);

   if ( $lDeleteIProfileRecIds != "" ) {
      $myIndexer->touchIndexerRunning();
      $sql  = "DELETE FROM ".db::$prefix."iprofile_search";
      $sql .= " WHERE idiprofilesearch IN ($lDeleteIProfileRecIds)";
      $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   }


// 3. remove all tsep_search-records which are not referenced in tsep_iprofile_search in any way

//    3.a. collect all ids from _iprofile_search
   $myIndexer->touchIndexerRunning();
   $sql  = "SELECT DISTINCT idsearch";
   $sql .= " FROM ".db::$prefix."iprofile_search";
   $sql .= " ORDER BY idsearch";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

   $lKeepTsepSearchRecIds = "";
   while ( $row = mysql_fetch_assoc($result) )
      $lKeepTsepSearchRecIds .= ( $lKeepTsepSearchRecIds != "" ? "," : "" ) . trim($row["idsearch"]);
   mysql_free_result($result);

//    3.b. collect all URLs, NOT collected in 3.a. (i.e. all URLs, which will be removed)
//         (needed for ContentImages)
   $myIndexer->touchIndexerRunning();
   $sql  = "SELECT DISTINCT page_url";
   $sql .= " FROM ".db::$prefix."search";
   if ( $lKeepTsepSearchRecIds != "" )
      $sql .= " WHERE id NOT IN ($lKeepTsepSearchRecIds)";
   $sql .= " ORDER BY page_url";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

   $larrRemovedSearchRecURLs = array();
   while ( $row = mysql_fetch_assoc($result) )
      $larrRemovedSearchRecURLs[$row["page_url"]] = 1;
   mysql_free_result($result);
   
//    3.c. remove all ids from _search, NOT collected in 3.a.

   $myIndexer->touchIndexerRunning();
   $sql  = "DELETE FROM ".db::$prefix."search";
   if ( $lKeepTsepSearchRecIds != "" )
      $sql .= " WHERE id NOT IN ($lKeepTsepSearchRecIds)";
   $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

	return($larrRemovedSearchRecURLs);
} // removeOldIndexEntries()



/**
* buildIndex()
*
* read search-record
* if found
*    save-id
*    update search-record
* else
*    insert search-record
*    read search-record (via page_url)
*    save-id
* insert indexingprofile_search-record using save-id
*/



/**
* file_parser() - parses a file and stores the results into global arrays
*
* param $pFnLocal
* - local filename or empty
* - if empty, the local filename is retrieved from $fullpath
*
* param $full_doc
* - hardcoded is set to 1 in function add_filename()
* - but if an external reader, called in function get_external_filelist(), delivers the files
*   contents (via 'ALL>'-mode), $full_doc holds this contents and the file must not be read again
*
* @param $fullpath
* @param $pFnLocal
* @param $full_doc
*/
//------------------------------------------------------------------------------
function file_parser($fullpath,$pFnLocal,$full_doc)
//------------------------------------------------------------------------------
{
        global $tsep_config;
        
        require_once( TSEP_INCLUDE_DIR."/cleanstring.php" );   // to remove anything crap from string

        global $gArrIndexingParms, $arr_searchskipped;

        _TsepTrace("begin file_parser($fullpath,$pFnLocal,...)");
        if ( $full_doc == "1" ) {
           if ( $gArrIndexingParms["force_http_fileparse"] == "false" ) {
              $lFileName = $pFnLocal;
              if ( $lFileName == "" ) {
                 $arrTmp = parse_url($gArrIndexingParms["Xwebdir"]);
                 $tmpHost = $arrTmp['scheme'] . "://" . $arrTmp['host'];                 
                 $lFileName = preg_replace("/^$tmpHost/",$_SERVER["DOCUMENT_ROOT"],$fullpath);
                 $lFileName = rawurldecode($lFileName);
              }
           } else {
              $lFileName = rawurldecode($fullpath);
           }
           _TsepTrace("reading $lFileName");
           $arrData = file($lFileName); // @file() intentionally replaced by file() to (may be) get informed about an error
           if ( !$arrData ) {
              _TsepTrace("return from file_parser() with error (could not read file)");
              return(array("<error>","","","","",""));
           }
           $full_doc = implode ('', $arrData);           
        } else {
           $lFileName = $fullpath;
        }
        $lFileSize = round(( strlen($full_doc)/1024 ),2);

        //========================== Get meta tag keywords START ==========================
        $meta_text =  str_replace(array("\r","\n","\t","&nbsp;"), '', $full_doc);
        $meta_text = preg_replace("/ *<br *\/*> */i", " ", $meta_text);
        $text = strip_tags ($full_doc);                                 //remove all tags
        //unset($full_doc);

        if ( preg_match("/< *meta +name *= *[\"\']keywords[\"\'] +content *= *[\"\'](.+?)[\"\'] *\/? *>/i", $meta_text, $lMatches) )
           $metatags = $lMatches[1];
        else
           if ( preg_match("/< *meta +content *= *[\"\'](.+?)[\"\'] +name *= *[\"\']keywords[\"\'] *\/? *>/i", $meta_text, $lMatches) )
              $metatags = $lMatches[1];
           else
              $metatags = "";
      //========================== Get meta tag keywords END ==========================

        //========================== Get title tag START ==========================
        if (preg_match("/< *title *> *(.*) *< *\/title *>/i", $meta_text, $lMatches)) {
           $title = strip_tags($lMatches[1]);
        }
        unset($lMatches);

        //========================== Prepare search words for database START ==========================
        // Olaf Noehring
        //========================== replace unwanted characters START ==========================

        // cut out tsep:cmd:start, tsep:cmd:end, tsep:cmd:noindex
        $text = preg_replace("/^.*<!-- *tsep:cmd:start *\/ *-->/i", "", $text);
        $text = preg_replace("/<!-- *tsep:cmd:end *\/ *-->.*$/i", "", $text);
        $lNoindex = "/<!-- *tsep:cmd:noindex *-->.+?<!-- *\/ *tsep:cmd:noindex *-->/i";
        while ( preg_match($lNoindex, $text) )
           $text = preg_replace($lNoindex, "", $text);

        // strip tags        
        $text =  str_replace(array("\r","\n","\t","&nbsp;"), ' ', $text);
        //========================== strip tags END ==========================


        //========================== encode special characters START ==========================
        require_once( TSEP_INCLUDE_DIR."/convert_htmlent.php" ); //make special character to entitie ( to &auml;) and backwards, contains:  convert_to_htmlent and convert_from_htmlent
        require_once( TSEP_INCLUDE_DIR."/replaceamp.php" );      // change &amp; to &
                //nifty code start        
        convert_to_htmlent($text);                                              //make special character to entitie (  to &auml;        )
        replaceamp($text);                                                              // change &amp; to &
        convert_from_htmlent($text);                                    //make entity to special character (&aum; to )
                //nifty code end
        $text = preg_replace("/ {2,}/", " ", trim($text));          // replace double spaces by single space        
        $text = ( is_utf8($text) ) ? $text : utf8_encode($text); 
                convert_from_htmlent($metatags); 
                $metatags = preg_replace("/ {2,}/", " ", trim($metatags)); 
                $metatags=utf8_encode($metatags);
        //========================== encode special characters END ==========================

        //========================== Prepare search words for database END = Olaf Noehring ============


        //========================== Assign variables for the page elements START ==========================

        $lPageTitle        = addslashes( ($title != "" ) ? $title : $fullpath );
        $lPageUrl          = addslashes($fullpath);
        $lIndexedWords     = addslashes(stripslashes($text));
        $lIndexedMetaWords = addslashes(stripslashes($metatags));
        unset($title);
        unset($fullpath);
        unset($text);
        unset($metatags);

        _TsepTrace("return from file_parser()");
        $nrWords = str_word_count( $lIndexedMetaWords ) + str_word_count( $lIndexedWords );
        if ( $nrWords == 0 )
           return(array("<empty>","","","","",""));
        return( array($lPageTitle, $lPageUrl, $lFileSize, $lIndexedWords, $lIndexedMetaWords) );

        //========================== Assign variables for the page elements END ==========================
} // file_parser()
?>
