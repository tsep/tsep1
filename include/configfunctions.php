<?php
/**
 * following will be filled automatically by SubVersion!
 * Do not change by hand!
 *  $LastChangedDate$
 *  @lastedited $LastChangedBy$
 *  $LastChangedRevision$
 **/
require_once( TSEP_INCLUDE_DIR."/mmexfunctions.php" );
require_once( TSEP_INCLUDE_DIR."/imagetools.class.php" );
require_once( TSEP_ROOT_DIR."/language/languages.php" );

/**
* GetSQLValueStringEx() - extends function GetSQLValueString() for TSEP
*
* @author Manfred Jedlicka
*
*/

//------------------------------------------------------------------------------
function GetSQLValueStringEx($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
//------------------------------------------------------------------------------
{
        if ( preg_match("/^ *(boolean|color|group|text) *$/i", $theType) or
             preg_match("/^ *(group) +level +([0-9]+)$/i",     $theType) or
             preg_match("/^ *(text|textarea) *(.*)$/i",        $theType) or
             preg_match("/^ *(special) +(abspath|filename +.+|language|path)$/i",   $theType) )
           $theType = "text";
        elseif ( preg_match("/^ *(long) *$/i", $theType ) )
           $theType = "long";
        elseif ( preg_match("/^ *(float) *$/i", $theType ) )
           $theType = "double";
        else
           $theType = "text";

  return GetSQLValueString($theValue, $theType);
} // GetSQLValueStringEx()



/**
* JS_ShowHide() - simply prints JavaScript-code for opening and closing div-blocks
*/
//------------------------------------------------------------------------------
function JS_ShowHide()
//------------------------------------------------------------------------------
{
	global $tsep_config;
	
?>
function showhide(showit,showid,valueid) {
   if ( showit == 0 ) {
      document.getElementById(valueid).value        = "none";
      document.getElementById(showid).style.display = "none";
      document.getElementById("Plus"+showid).style.display  = "inline";
      document.getElementById("Minus"+showid).style.display = "none";
   } else {
      document.getElementById(valueid).value        = "block";
      document.getElementById(showid).style.display = "block";
      document.getElementById("Plus"+showid).style.display  = "none";
      document.getElementById("Minus"+showid).style.display = "inline";
   }
}
<?php
} // JS_ShowHide()



/**
* JS_Upload()
*/
//------------------------------------------------------------------------------
function JS_Upload()
//------------------------------------------------------------------------------
{
	global $tsep_config;
	
?>
function open_upload_window(pType, pTofile) {
	// pType may be: "image contentimg", no others yet
	
	win_width = 550;
	win_height = 300;
	win_x = screen.availWidth / 2 - (win_width / 2);
	win_y = screen.availHeight / 2 - (win_height / 2);

	if ( pTofile == "") {
		alert("Destination-Filename is empty.");
		return;
	}

	wcmd = "../include/uploadfile.php?type=" + pType + "&tofile=" + pTofile;
	wtitle = "upload";
	wparm = "width="+win_width+",height="+win_height+",left="+win_x+",top="+win_y+",dependent=yes,location=no,menubar=no,status=no,toolbar=no";

	upload_window = window.open(wcmd, wtitle, wparm);
	upload_window.focus();
}
<?php
} // JS_Upload()



/**
* JS_DeleteFile()
*/
//------------------------------------------------------------------------------
function JS_DeleteFile()
//------------------------------------------------------------------------------
{
	global $tsep_config, $tsep_lng;
	
?>
function open_deletefile_window(pType, pFileName) {
	// pType may be: "image contentimg", no others yet
	
	win_width = 550;
	win_height = 300;
	win_x = screen.availWidth / 2 - (win_width / 2);
	win_y = screen.availHeight / 2 - (win_height / 2);

	if ( pFileName == "") {
		alert("Filename is empty.");
		return;
	}

	wcmd = "../include/deletefile.php?type=" + pType + "&filename=" + pFileName;
	wtitle = "deletefile";
	wparm = "width="+win_width+",height="+win_height+",left="+win_x+",top="+win_y+",dependent=yes,location=no,menubar=no,status=no,toolbar=no";

	deletefile_window = window.open(wcmd, wtitle, wparm);
	deletefile_window.focus();
}
<?php
} // JS_DeleteFile()



/**
* buildInputFields() - reads tsep_internal and calls buildInputField() for each row
*
* @param $pWhereClause (where for sql-select)
*/
//------------------------------------------------------------------------------
function buildInputFields($pWhereClause)
//------------------------------------------------------------------------------
{
   

   unset($lArr);

   $sql = "SELECT * FROM ".db::$prefix."internal WHERE $pWhereClause ORDER BY sortordervalue ASC";
   $tsepinternal = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

   while ($row = mysql_fetch_assoc($tsepinternal))        
      buildInputField($row);
   mysql_free_result($tsepinternal);

   return( buildInputField(0) );
}



/**
* buildInputField() - print inputfield-html-code according to the fieldtype
*
* this function is called by buildInputFields()
*
* input-fields built are named (x = autonumber starting at 1)
*           config_fieldvalue_x - the new/updated value
*    hidden config_fieldname_x  - description of tsep_internal
*    hidden config_fieldtype_x  - fieldtype of tsep_internal
*    hidden configValuesCounter - built once at last call
*
* After all fields has built, call buildInputFields(0) one more time!
*    This last call
*    - closes all open groups
*    - builds the configValuesCounter-field
*    - possibly shows errors, detected by previous buildInputFields-Calls
*      and returns 1, if there where errors before and 0 if not
*
* If fieldtype-definition contains 'r/o', it's shown, but 'disabled'.
*
* fieldtypes supported
* --------------------
* boolean
* color
* float
* long
* text ...
* textarea ...
* group level x
* special abspath  (special handling for abspath)
* special filename (special handling for filenames, where an upload-button is added
*                                                   additional parm HAS TO BE given (that the called function 'knows', what path should be taken)
*                                                   currently possible:
*                                                   - "special filename image contentimg"" - for content-proxy-images
*                  )
* special language (special handling: language-selection is a selectionlist of all language/subdirnames)
* special path     (special handling: path is built within this script [not GUI])
* 
* If fieldtype matches regex "^special .+ (image .+) *$", a "view image"-button is added.
*    the complete filename is built according to the same rules like "special filename"s additional parm
*
* ! ! ! tsep_lng ! ! !
*    language-dependend strings are read via key "config_<description>"
*    e.g.: for tsep_internal record (description=) "Path" => $tsep_lng["config_Path"] is used
*
* @param $row_tsepconfig (row of sql-select)
*/
//------------------------------------------------------------------------------
function buildInputField($row_tsepconfig)
//------------------------------------------------------------------------------
{
        global $tsep_lng, $tsep_language, $tsep_config; // tsep_config needed by include/colorswitch.php

        static $currGroupLevel = 0;
        static $ConfigFieldCount = 0;
        static $arrErrBuildInputFields;

        $out = "";

        if ( $row_tsepconfig == 0 ) {
           $newGroupLevel = 1;
           if ( $newGroupLevel <= $currGroupLevel ) {
              $i = $currGroupLevel - $newGroupLevel + 1;
              $out .= "\n<!-- retire group level by $i -->\n";
              while ( $i-- > 0 )
                 $out .= " </div>\n";
              echo $out;
           }

           echo "<input type='hidden' name='configValuesCounter' value='$ConfigFieldCount' />\n";

           if ( $arrErrBuildInputFields ) {
              while ( list($key,$data) = each($arrErrBuildInputFields) )
                 echo "<div class='internalError'>$data</div>\n";
              return(1);
           }
           return(0);
        }

        $ConfigFieldCount++;

        $lclFormfieldname      = $row_tsepconfig["description"];
        $lclFormfielddescr     = $tsep_lng["config_$lclFormfieldname"];
        $lclFormfieldhelp      = ( isset($tsep_lng["config_${lclFormfieldname}_help"]) ? $tsep_lng["config_${lclFormfieldname}_help"] : "" );
        $lclFormfieldvaluetype = $row_tsepconfig["valuetype"];
        $lclFormfieldvalue     = ( $row_tsepconfig["valuetype"] == "s" ? $row_tsepconfig["stringvalue"] : $row_tsepconfig["numericvalue"] );
        $lclFormfieldtype      = $row_tsepconfig["fieldtype"];
        

                /**
                 * 2005-05-05/TG
                 * If empty fill the field value with a guess to what 
                 * the admin might want to do.
                 **/
                if ( $lclFormfieldvalue == "" ) {
                        switch ( $lclFormfieldname ) {
                                case "Xwebdir":
                                    $lclFormfieldvalue = $_SERVER['HTTP_HOST'];
                                        if ( !eregi( "^https?://", $lclFormfieldvalue ) ) {
                                            $lclFormfieldvalue = "http://$lclFormfieldvalue";
                                        }
                                        break;
        
                                case "XdirName":
                                        //$lclFormfieldvalue = $_SERVER['DOCUMENT_ROOT'];
                                        break;
                        } // switch
                } // if
                
        $lclReadOnly = "";
        $lclFieldName = "config_fieldvalue_$ConfigFieldCount";
        if ( preg_match("/r\/o/", $lclFormfieldtype ) ) {
           $lclFormfieldtype = trim(preg_replace("/r\/o/", "", $lclFormfieldtype));
           $lclReadOnly = "disabled='disabled'";                       // because disabled-fields are not sent (form-submit)
           $lclFieldName = "config_fieldvalue_${ConfigFieldCount}_RO"; // they are sent via hidden field
        }


        if     (preg_match("/^ *(boolean|color|float|group|long|text) *$/i", $lclFormfieldtype, $matches))
        {
           $lclType         = strtolower($matches[1]);
        }
        elseif (preg_match("/^ *(group) +level +([0-9]+)$/i", $lclFormfieldtype, $matches))
        {
           $lclType         = strtolower($matches[1]);
           $lclParms        =            $matches[2];
        }
        elseif (preg_match("/^ *(textarea|text) *(.*)$/i", $lclFormfieldtype, $matches))
        {
           $lclType         = strtolower($matches[1]);
           $lclParms        =            $matches[2];           
        }
        elseif (preg_match("/^ *(special) +(filename) +(.+) *$/i", $lclFormfieldtype, $matches))
        {
           $lclType         = strtolower($matches[1] . "_" . $matches[2]);
           $lclType2		= $matches[3];
        }
        elseif (preg_match("/^ *(special) +(abspath|language|path)$/i", $lclFormfieldtype, $matches))
        {
           $lclType         = strtolower($matches[1] . "_" . $matches[2]);
        }
        else {
           $arrErrBuildInputFields[] = $tsep_lng['intErr'] . " - " . $tsep_lng['intErr_wrongfieldtype'] . ": &quot;" . $row_tsepconfig['fieldtype'] . "&quot;<br>"
                                     . "&nbsp;&nbsp; (" . db::$prefix . "internal/description: &quot;$lclFormfieldname&quot;)<br>"
                                     . "&nbsp;&nbsp; " . $tsep_lng['docorrectit'];
           return;
        }
        $lclViewImage = "";
        if (preg_match("/^special .+ (image .+) *$/", $lclFormfieldtype, $matches)) {
        	$lclImageType = $matches[1]; 
        	switch ( $lclImageType ) {
        		case "image contentimg":
					$larrImagesWebPath = ReadValuesFromInternal("stringtag='configcontentimg'");
					$lImagesWebPath = ( isset($larrImagesWebPath['configcontentimg_webpath']) ? $larrImagesWebPath['configcontentimg_webpath'] : "");
					$lImagesFileExt = ( isset($larrImagesWebPath['configcontentimg_imageext']) ? $larrImagesWebPath['configcontentimg_imageext'] : "");
					break; 
        	} //switch

			if ( !empty( $lclFormfieldvalue ) ) {
				$lclFn = "$lclFormfieldvalue$lImagesFileExt";
				$lclImageWebFile = "$lImagesWebPath/$lclFn";
				$wMax = 64;
				$hMax = 48;
				$myImage = new imageTools($lclImageWebFile);
				if ( $myImage->imageExists() )
					$lclGeometry = $myImage->getShrinkedImageSizeHTML($wMax,$hMax);
				else
					$lclGeometry = "width=$wMax height=$hMax";
				$myImage = NULL;
	        	$lclViewImage .= "<span style='margin-left:3ex;'>";
	            $lclViewImage .= " <img style='border:solid grey 1px;' src='$lclImageWebFile' $lclGeometry alt='$lclFn'/>\n";
	        	$lclViewImage .= "</span>\n";
			}
        }

        if (!isset($lclParms))
           $lclParms = "";

        if ( $lclType != "group" ) {
        	
        	?>
           <div class="oneConfigItem"<?php require( TSEP_INCLUDE_DIR."/colorswitch.php" );?>>
           <?php
           echo "<label for='config_fieldvalue_$ConfigFieldCount'>\n";
           echo " <div class='oneConfigDescription'>\n";
           echo    $lclFormfielddescr;
           echo $lclViewImage;
           echo " \n</div>\n";                      
           echo "</label>\n";
               // Display Help icon           
           if ( $lclFormfieldhelp != "" ) {
                   echo "<div class='ConfigFieldsHelp'>\n";
                   echo ' <img src="images/con_info.png" onmouseover="return overlib(\''.str_replace(array("'", '"'), array("\\'", ''), strip_tags($lclFormfieldhelp)) .'\', CAPTION, \''.  $tsep_lng['help'] .'\', WIDTH, 200, LEFT, ABOVE)"' .
                                ' onmouseout="return nd()" />';
                   echo "\n</div>\n";              
           }
           echo "<div class='oneConfigValue'>\n";
        }

        switch ($lclType) {

           case "special_language":
              $out .= " <select name='$lclFieldName' size='1' $lclReadOnly class='formfieldvalue_combo' onChange=\"document.tsepconfig.submit()\">\n";
              $d = opendir("../language");
              while (($lclLang = readdir($d)) != false) {
                 if ( $lclLang != "." && $lclLang != ".." && ( strlen($lclLang) == 2 || strlen($lclLang) == 5 ) ) {
					$lclLangDesc = ( ( isset($tsep_language[$lclLang]) and !empty($tsep_language[$lclLang]) ) ?  $tsep_language[$lclLang] : $lclLang );
                    $out .= "  <option value='$lclLang'" . (($lclFormfieldvalue == $lclLang) ? " selected='selected'>" : ">");
                    $out .= "$lclLangDesc</option>\n";
                 }
              }
              closedir($d);
              $out .=  " </select>\n";
              break;

           case "special_path":
              $tmpPathparts = pathinfo($_SERVER['PHP_SELF']);
              $lclFormfieldvalue = $tmpPathparts['dirname'];
              $lclFormfieldvalue = preg_replace("/\\\/","/", $lclFormfieldvalue);      // replace \ by /
              $lclFormfieldvalue = preg_replace("/\/[^\/]+$/","", $lclFormfieldvalue); // remove trailing '/admin'-directory
              $lclFormfieldvalue = preg_replace("/^\//","", $lclFormfieldvalue);       // remove leading /
              $out .= "<input type='text' $lclParms $lclReadOnly ";
              $out .= " name='$lclFieldName'";
              $out .= " class='formfieldvalue'";
              $out .= " value=\"" . $lclFormfieldvalue . "\" />\n";
              break;

           case "special_filename":
              $out .= "<input type='text' style='width:81%;' $lclReadOnly ";
              $out .= " name='$lclFieldName' id='$lclFieldName'";
              $out .= " class='formfieldvalue' style='display:inline;float:left;'";
              $out .= " value=\"" . $lclFormfieldvalue . "\" />\n";
              $out .= "<input type='button' size=\"4\" $lclReadOnly";
              $out .= " name='upload_$lclFieldName'";
              $out .= " onClick='open_upload_window(\"$lclType2\", document.getElementById(\"$lclFieldName\").value);'";
              $out .= " value=\"...\" title=\"" . $tsep_lng['upload'] . "\" alt=\"" . $tsep_lng['upload'] . "\"/>\n";
			  $out .= "<input type='hidden' name='MAX_FILE_SIZE' value='200000'>\n";
              break;

           case "special_abspath":
              $out .= "<input type='text' $lclParms $lclReadOnly ";
              $out .= " name='$lclFieldName'";
              $out .= " class='formfieldvalue'";
              $out .= " value=\"" . $lclFormfieldvalue . "\" />\n";
              break;
                
           case "group":
              $newGroupLevel = $lclParms;
              if ( $newGroupLevel <= $currGroupLevel ) {
                 $i = $currGroupLevel - $newGroupLevel + 1;
                 $out .= "\n<!-- retire group level by $i -->\n";
                 while ( $i-- > 0 )
                    $out .= " </div>\n";
              } else {
                 if ( $newGroupLevel > ($currGroupLevel + 1) ) {
                    $arrErrBuildInputFields[] = $tsep_lng['intErr'] . " - " . $tsep_lng['group_level_gap'] . ": &quot;" . $row_tsepconfig['fieldtype'] . "&quot;<br>"
                                              . "&nbsp;&nbsp; (" . db::$prefix . "internal/description: &quot;$lclFormfieldname&quot;)<br>"
                                              . "&nbsp;&nbsp; " . $tsep_lng['docorrectit'];
                    return;
                 }
              }
              $out .= "\n<!-- start group level $newGroupLevel -->\n";
              $currGroupLevel = $newGroupLevel;
              $out .= " <div class='spacer'>&nbsp;</div>\n";
              $out .= " <div class='ConfigGroupHeaderWrapper'>\n";
              if ( $lclFormfieldvalue == "block" ) {
                 $lclPlus = "none";
                 $lclMinus = "inline";
              } else {
                 $lclPlus = "inline";
                 $lclMinus = "none";
              }

              $out .= "  <span class='ConfigGroupHeader' id='Minus$lclFormfieldname' style='display:$lclMinus;' onclick='showhide(0,\"$lclFormfieldname\",\"$lclFieldName\")'>\n";              
              $out .= "   <span class='ConfigGroupHeaderOpen'>&nbsp;&minus;&nbsp;</span>\n";
              $out .= "   $lclFormfielddescr\n";
              $out .= "  </span>\n";

              $out .= "  <span class='ConfigGroupHeader' id='Plus$lclFormfieldname'  style='display:$lclPlus;'  onclick='showhide(1,\"$lclFormfieldname\",\"$lclFieldName\")'>\n";
              $out .= "   <span class='ConfigGroupHeaderOpen'>&nbsp;+&nbsp;</span>\n";
              $out .= "   $lclFormfielddescr\n";
              $out .= "  </span>\n";

              if ( $lclFormfieldhelp !== "" ) {
                 $out .= "<div class='ConfigFieldsHelp'>\n";
                 $out .= " <a href='#'>\n";// title='$lclFormfieldhelp'>\n"; // for stupid IE only, CSS corrected (cheated) now, but I will leave the title in place anyways-Olaf Noehring
                 $out .=    $tsep_lng['help'] . "\n";
                 $out .= "  <span class='hiddenHelp'>\n";
                 $out .= "   $lclFormfieldhelp";
                 $out .= "  </span>\n";
                 $out .= " </a>\n";
                 $out .= "</div>\n";
              }
              $out .= " </div>\n";
              $out .= " <input type='hidden' id='$lclFieldName' name='$lclFieldName' value='$lclFormfieldvalue' />\n";
              $out .= " <div class='ConfigGroup' id='" . $lclFormfieldname . "' style='display:" . $lclFormfieldvalue . ";'>\n";
              break;

           case "textarea":
              $out .= "<textarea $lclParms $lclReadOnly ";
              $out .= " name='$lclFieldName'";
              $out .= " class='formfieldvalue'>";
              $out .=   $lclFormfieldvalue;
              $out .= "</textarea>\n";
              break;
           case "color":
           case "long":
           case "text":           
              $out .= "<input type='text' $lclParms $lclReadOnly ";
              $out .= " name='$lclFieldName' id='$lclFormfieldname'";
              $out .= " class='formfieldvalue'";
              $out .= " value=\"" . $lclFormfieldvalue . "\" />\n";
              break;
           case "boolean":
              $out .= "<input type='checkbox' $lclParms $lclReadOnly ";
              $out .= " name='$lclFieldName'";
              $out .= " class='formfieldvalue_checkbox'";
              if ( $lclFormfieldvalue == "true" )
                 $out .= " checked=\"checked\"";
              $out .= " value=\"true\" />\n";
              break;
           default:
                      echo "!!!!!!!!!!!!!!!!!! $lclType<br>";
              break;
        } // switch
        
        if ( $lclReadOnly !== "" )
           $out .= " <input type='hidden' name='config_fieldvalue_$ConfigFieldCount' value='$lclFormfieldvalue' />\n";
        $out .= " <input type='hidden' name='config_fieldname_$ConfigFieldCount' value='$lclFormfieldname' />\n";
        $out .= " <input type='hidden' name='config_fieldtype_$ConfigFieldCount' value='$lclFormfieldtype' />\n";
        $out .= " <input type='hidden' name='config_fieldvaluetype_$ConfigFieldCount' value='$lclFormfieldvaluetype' />\n";
                
        if ( $lclType !== "group" )
           $out .= "</div>\n</div>\n<div class='spacer'>&nbsp;</div>\n";

        echo $out;
} // buildInputField()



/**
* SaveValues2Internal() - update DB using values, entered via GUI (previously built page using buildInputFields())
*
* @param $additionalWhereClause
*/
//------------------------------------------------------------------------------
function SaveValues2Internal($pAdditionalWhereClause)
//------------------------------------------------------------------------------
{
   

   //debugprint ("counter: ". $_POST["configValuesCounter"]);
   for ($i = 1; $i <= $_POST["configValuesCounter"]; $i++)
   {
      $lclFormfieldname  = $_POST["config_fieldname_$i"];
      $lclFormfieldtype  = $_POST["config_fieldtype_$i"];
      if ( preg_match("/^ *boolean *$/i", $lclFormfieldtype ) And !isset($_POST["config_fieldvalue_$i"]) )
         $lclFormfieldvalue = "false"; // 'switched-off'-checkbox does not submit the field
      else
         $lclFormfieldvalue = $_POST["config_fieldvalue_$i"];
      $lclFormfieldvaluetype = $_POST["config_fieldvaluetype_$i"];

      $sql = sprintf("UPDATE ".db::$prefix."internal SET %s=%s WHERE description=%s%s",
                     ( $lclFormfieldvaluetype == "s" ? "stringvalue" : "numericvalue" ),
                       GetSQLValueStringEx($lclFormfieldvalue, $lclFormfieldtype),
                       GetSQLValueStringEx($lclFormfieldname,  "text"),
                     ( $pAdditionalWhereClause !== "" ? " AND $pAdditionalWhereClause" : "" )
                    );
      // debugprint ("sql: $updateSQL", 4);
      $Result1 = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   }
} // SaveValues2Internal()



/**
* ReadValuesFromInternal - returns an array, holding data read from tsep_internal table
*
* returns an array - key=fieldname value=fieldvalue
*
* @param $pWhereClause (filter for reading tsep_internal)
*/
//------------------------------------------------------------------------------
function ReadValuesFromInternal($pWhereClause)
//------------------------------------------------------------------------------
{
   

   unset($lArr);

   $sql = "SELECT * FROM ".db::$prefix."internal WHERE $pWhereClause ORDER BY sortordervalue ASC";
   $tsepinternal = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

   while ($row = mysql_fetch_assoc($tsepinternal)) {
      $lFieldname  = $row["description"];
      $lFieldvalue = ( $row["valuetype"] == "s" ? trim($row["stringvalue"]) : $row["numericvalue"] );

      $lArr[$lFieldname] = (is_null($lFieldvalue) ? "" : $lFieldvalue);
   }
   mysql_free_result($tsepinternal);

   return($lArr);
} // SaveValues2Internal()



/**
* TsepAutoConfigure - writes configuration-data into tsep_internal, which can be determined automatically
*
* Values are updated only - if the record can not be found - nothing is done
*/
//------------------------------------------------------------------------------
function TsepAutoConfigure()
//------------------------------------------------------------------------------
{
   

   // build tsep_internal/Path

   $lPathparts = pathinfo($_SERVER['PHP_SELF']);
   $lRelTsepPath = $lPathparts['dirname'];
   $lRelTsepPath = preg_replace("/\\\/","/", $lRelTsepPath);      // replace \ by /
   $lRelTsepPath = preg_replace("/\/[^\/]+$/","", $lRelTsepPath); // remove trailing '/admin'-directory
   $lRelTsepPath = preg_replace("/^\//","", $lRelTsepPath);       // remove leading /

   $sql = "SELECT * FROM ".db::$prefix."internal WHERE description='Path' AND stringtag='config'";
   $tsepinternal = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

   if ($row = mysql_fetch_assoc($tsepinternal)) {
      mysql_free_result($tsepinternal);
      $lclFieldvalue    = ( $row["valuetype"] == "s" ? trim($row["stringvalue"]) : $row["numericvalue"] );
      if ( $lclFieldvalue != $lRelTsepPath ) {
         $sql = sprintf("UPDATE ".db::$prefix."internal SET %s=%s WHERE description='Path' AND stringtag='config'",
                        ( $row["valuetype"] == "s" ? "stringvalue" : "numericvalue" ),
                          GetSQLValueStringEx($lRelTsepPath, "text")
                       );
         mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
      }
   }

}



/**
* GetAssignedIProfiles - returns a comma-separated list of all names of indexingprofiles,
*                        to which the search-record with the $pid is assigned to
*
* returns a string
*
* @param $pid (tsep_search/id)
*/
//------------------------------------------------------------------------------
function GetAssignedIProfiles($pid)
//------------------------------------------------------------------------------
{
   global $tsep_lng;

   $sql  = "SELECT * FROM ".db::$prefix."iprofile_search ips, ".db::$prefix."iprofile ip";
   $sql .= " WHERE ips.idsearch=$pid AND ips.idiprofile = ip.idiprofile";
   $profiles = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

   $lProfilenames = "";
   while ($row = mysql_fetch_assoc($profiles)) {
      $lProfilenames .= ( !empty($lProfilenames) ? ", " : "" );
      $lProfilenames .= $row["profilename"];
   }
   mysql_free_result($profiles);
   if ( empty($lProfilenames) )
      $lProfilenames = "&lt;" . $tsep_lng['none'] . "&gt;";
   return($lProfilenames);
} // GetAssignedIProfiles()
