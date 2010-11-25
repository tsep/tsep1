<?php
/**
* Configuration of TSEP. Since 0.913 stored in database. This file is used to update the values in the database.
*
* @tables tsep_internal
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/
require_once( "../include/global.php" );

db::connect();

require_once( TSEP_INCLUDE_DIR."/mmexfunctions.php" ); // mm functions which were placed in every file
require_once( TSEP_INCLUDE_DIR."/configfunctions.php" );

// === START === update all config values (except max results per page) ==========
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "tsepconfig"))
{
        SaveValues2Internal("stringtag='config'");
        require( TSEP_INCLUDE_DIR."/config.php" );
        include( TSEP_ROOT_DIR."/language/en_US/language.php" );
        include( TSEP_ROOT_DIR."/language/".$tsep_config['Language']."/language.php" );
}

/* No longer needed with new setup (2005-06-11/TG) */
//TsepAutoConfigure();

// === START === read first row of max-results- and config-records ====
$db_tablename = db::$prefix."internal";
mysql_select_db($database_tsepdbconnection);
$query_howmanyresultsperpage = "SELECT * FROM $db_tablename WHERE stringtag='possible_results' ORDER BY numericvalue ASC";
$howmanyresultsperpage = mysql_query($query_howmanyresultsperpage) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
$row_howmanyresultsperpage = mysql_fetch_assoc($howmanyresultsperpage);
$totalRows_howmanyresultsperpage = mysql_num_rows($howmanyresultsperpage);

$currentPage = $_SERVER["PHP_SELF"];

// START === UPDATE old value
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "frmMaxResult"))
{
  $db_tablename = db::$prefix."internal";
  $updateSQL = sprintf("UPDATE $db_tablename SET numericvalue=%s WHERE idinternal=%s",
                       GetSQLValueString($_POST['maxresult'], "int"),
                       GetSQLValueString($_POST['idinternal'], "int"));
  mysql_select_db($database_tsepdbconnection);
  $Result1 = mysql_query($updateSQL) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
  $updateGoTo = "configuration.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
// END === UPDATE old value

// === START === DELETE old value ====
if ((isset($_POST['idinternal'])) && ($_POST['idinternal'] != "") && (isset($_POST['delete'])))
{
  $db_tablename = db::$prefix."internal";
  $deleteSQL = sprintf("DELETE FROM $db_tablename WHERE idinternal=%s",
                       GetSQLValueString($_POST['idinternal'], "int"));
  mysql_select_db($database_tsepdbconnection);
  $Result1 = mysql_query($deleteSQL) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
  $deleteGoTo = "configuration.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}
// === END === DELETE old value ====

// === START === INSERT new value ====
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frmMaxResultNew"))
{
   MaxResultsInsert($_POST['maxresult']);

  $insertGoTo = "configuration.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
// === END === INSERT new value ====

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $tsep_lng['configuration']; ?> - <?php echo $tsep_lng['tsep'];?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="expires" content="0" />
<link href="<?php echo TSEP_CLIENT_ROOT?>/static/css/tsep.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/overlib.js"></script>
<script type="text/JavaScript">
<!--
function GP_popupConfirmMsg(msg) { //v1.0
  document.MM_returnValue = confirm(msg);
}
function CheckModifyResultValue(modifyIdNo) {
   modifyId = "maxresult_" + modifyIdNo;
   newvalue = document.getElementById(modifyId).value;
   newvalueId = "maxresult_" + newvalue;
   if ( document.getElementById(newvalueId) ) {
      alert("<?php echo $tsep_lng['value_already_exists']; ?>: "+newvalue);
      document.getElementById(modifyId).value = modifyIdNo;
      document.getElementById(modifyId).focus();
      return false;
   }
   return true;
}
function help(id) {     
        win_width = 400;
        win_height = 300;
        win_x = screen.availWidth / 2 - (win_width / 2);
        win_y = screen.availHeight / 2 - (win_height / 2);
        help_window = window.open("help.php?id="+id, "Help", "width="+win_width+",height="+win_height+",left="+win_x+",top="+win_y);
        help_window.focus();
}
<?php JS_ShowHide(); ?>
//-->
</script>
</head>
<body>
<div class="tsepProject">

        <?php
        require( TSEP_INCLUDE_DIR."/indexer_search_table.php" ); /*use code-recycling*/ ?>

  <div class="configurationHeadline"><?php echo $tsep_lng['configuration']; ?></div>
  <div class="configurationTSEPBlock">

    <form name="tsepconfig" id="tsepconfig" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<?php
                if ( buildInputFields("stringtag='config'") == 1 )
                   $disableButton = "disabled=\"disabled\" style=\"border:outset 1px black\"";
                else
                   $disableButton = "";
?>
        <div style="clear:both; padding-top:1ex;">
         <input name="update" type="submit" id="update" value="<?php echo $tsep_lng['update']; ?>&nbsp;<?php echo $tsep_lng['above_values']; ?>" <?php echo $disableButton; ?> />
        </div>
        <input type="hidden" name="MM_update" value="tsepconfig" />
    </form>
  </div>
  <div class="maxResultsBlock">
          <h4><?php echo $tsep_lng['results_to_show_user'];?></h4>

          <div class="configurationNewBlock">
                        <form name="frmMaxResultNew" id="frmMaxResultNew" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <input name="maxresult" type="text" class="configurationFieldWord" id="maxresult" />
                        <input name="add" type="submit" id="add" value="<?php echo $tsep_lng['add']; ?>" />
                          <input type="hidden" name="MM_insert" value="frmMaxResultNew" />
                          <?php echo $tsep_lng['separate_values_by_comma'] ?>
                        </form>
          </div>
          <div class="configurationOldBlock">
        <?php do { ?>
                <div class="configurationBlock"<?php require( TSEP_INCLUDE_DIR."/colorswitch.php" );?>>
                  <form name="frmMaxResult" class="configurationBlockForm" id="frmMaxResult" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <input name="maxresult" type="text" class="configurationFieldWord" id="maxresult_<?php echo $row_howmanyresultsperpage['numericvalue']; ?>" value="<?php echo $row_howmanyresultsperpage['numericvalue']; ?>" />
                        <input name="update" type="submit" id="update" onclick="return CheckModifyResultValue(<?php echo $row_howmanyresultsperpage['numericvalue']; ?>);" value="<?php echo $tsep_lng['update']; ?>" />
                        <input name="delete" type="submit" id="delete" onclick="GP_popupConfirmMsg('<?php echo $tsep_lng['help_del_maxresult']; ?>');return document.MM_returnValue" value="<?php echo $tsep_lng['delete']; ?>" />
                        <input name="idinternal" type="hidden" id="idinternal" value="<?php echo $row_howmanyresultsperpage['idinternal']; ?>" />
                        <input type="hidden" name="MM_update" value="frmMaxResult"/>
                  </form>
                </div>
                <?php } while ($row_howmanyresultsperpage = mysql_fetch_assoc($howmanyresultsperpage)); ?>
          </div>
  </div>


<?php
require( TSEP_INCLUDE_DIR."/copyright.php" ); // Olaf Noehring: Use code-recyling whereever possible
?>

</div>
</body>
</html>
<?php
mysql_free_result($howmanyresultsperpage);



function MaxResultsInsert($maxresults)
{

   $arrInsert = preg_split("/ *, */", $maxresults, -1, PREG_SPLIT_NO_EMPTY);
   while ( list($key,$data) = each($arrInsert) ) {
      $sql = "SELECT count(*) as ct FROM ".db::$prefix."internal WHERE stringtag='possible_results' AND numericvalue=" . GetSQLValueStringEx($data, "long");
      $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
      $row = mysql_fetch_assoc($result);
      if ( $row["ct"] != 0 )
         continue;

      $sql = sprintf("INSERT INTO ".db::$prefix."internal (description, numericvalue, valuetype, fieldtype, stringtag)" .
                     " VALUES ('possible_results', %s, 'n', 'long', 'possible_results')",
                     GetSQLValueStringEx($data, "long"));
      $Result1 = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   }
} // MaxResultsInsert()

?>
