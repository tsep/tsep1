<?php
/**
* This is for editing (add, update, delete) everything from single words of an index to complete index entries (whole pages).
*
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
require_once( __DIR__."../include/global.php" );
include_once TSEP_INCLUDE_DIR.'/class.db.php';
require_once( TSEP_INCLUDE_DIR."/mmexfunctions.php" ); // mm functions which were placed in every file
require_once( TSEP_INCLUDE_DIR."/configfunctions.php" );
require_once( TSEP_INCLUDE_DIR."/datefunctions.php" ); // to read and write las index edit date
require_once( TSEP_INCLUDE_DIR."/rststatistics.php" ); // show statistics
require_once( TSEP_INCLUDE_DIR."/rstnavigation.php" ); // show statistics
require_once( TSEP_INCLUDE_DIR."/indexer.class.php" ); // for timestamp
require_once( TSEP_INCLUDE_DIR."/contentimages.class.php" );

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frmIndexEditNew"))
{
  $timestamp = activeIndexer::getTimeStamp();
  $lProtect_Indexentry = ( isset($_POST['protect_indexentry']) ? $_POST['protect_indexentry'] : "0" );
  $db_tablename = db::$prefix."search";
  $insertSQL = sprintf("INSERT INTO $db_tablename (page_number, protect_indexentry, page_title, page_url, page_file_size, indexed_words, indexed_metawords, last_edited, additional_info) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['page_number'], "int"),
                       GetSQLValueString($lProtect_Indexentry, "text"),
                       GetSQLValueString($_POST['page_title'], "text"),
                       GetSQLValueString($_POST['page_url'], "text"),
                       GetSQLValueString($_POST['page_file_size'], "text"),
                       GetSQLValueString($_POST['indexed_words'], "text"),
                       GetSQLValueString($_POST['indexed_metawords'], "text"),
                       $timestamp,
                       GetSQLValueString($_POST['additional_info'], "text"));

  mysql_select_db($database_tsepdbconnection);
  $Result1 = mysql_query($insertSQL) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "frmIndexEdit"))
{
  $timestamp = activeIndexer::getTimeStamp();
  $lProtect_Indexentry = ( isset($_POST['protect_indexentry']) ? $_POST['protect_indexentry'] : "0" );
  $db_tablename = db::$prefix."search";
  $updateSQL = sprintf("UPDATE $db_tablename SET page_number=%s, protect_indexentry=%s, page_title=%s, page_url=%s, page_file_size=%s, indexed_words=%s, indexed_metawords=%s, last_edited=%s, additional_info=%s WHERE id=%s",
                       GetSQLValueString($_POST['page_number'], "int"),
                       GetSQLValueString($lProtect_Indexentry, "text"),
                       GetSQLValueString($_POST['page_title'], "text"),
                       GetSQLValueString($_POST['page_url'], "text"),
                       GetSQLValueString($_POST['page_file_size'], "text"),
                       GetSQLValueString($_POST['indexed_words'], "text"),
                       GetSQLValueString($_POST['indexed_metawords'], "text"),
                       $timestamp,
                       GetSQLValueString($_POST['additional_info'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_tsepdbconnection);
  $Result1 = mysql_query($updateSQL) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
}

if ((isset($_POST['id'])) && ($_POST['id'] != "") && (isset($_POST['delete'])))
{

  $db_tablename = db::$prefix."search";
  $deleteSQL = sprintf("DELETE FROM $db_tablename WHERE id=%s",
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_tsepdbconnection);
  $Result1 = mysql_query($deleteSQL) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

// remove page-associated ContentImage (if any)
	$myContentImgs = new ContentImages();
	$myContentImgs->setPageURL($_POST['page_url']);
	if ( $myContentImgs->useContentImages() == true )
		if ( $myContentImgs->getContentImageType() != "default")
			if (!@unlink($myContentImgs->getContentImageFile()))
				echo "<div class='userError'>" . $tsep_lng['err_deleting_file'] . $myContentImgs->getContentImageFile() . "</div>";
	$myContentImgs = NULL;
}


$pageNum_completeindex = 0;
if (isset($_GET['pageNum_completeindex'])) {
  $pageNum_completeindex = $_GET['pageNum_completeindex'];
}
else
{
  $pageNum_completeindex = $_REQUEST["pageNum_completeindex"];          // get value from delete / add or update form buttons
}

$startRow_completeindex = $pageNum_completeindex * $tsep_config['maxRows_completeindex'];

mysql_select_db($database_tsepdbconnection);

// set the SQL WHERE condition to show either all or only the detail record
$cond="";
if (isset($_GET['detail']))
{
        $id=$_GET['detail'];
        $cond="WHERE id=$id";
}
elseif (isset($_REQUEST['detail']))     //if the user opens this page from the indexoverview we show only the record he whishes
{
        $id=$_REQUEST['detail'];
        $cond="WHERE id=$id";
}
$condition=$cond;

  $db_tablename = db::$prefix."search";
$query_completeindex = "SELECT * FROM $db_tablename $condition ORDER BY id ASC";
$query_limit_completeindex = sprintf("%s LIMIT %d, %d", $query_completeindex, $startRow_completeindex, $tsep_config['maxRows_completeindex']);
$completeindex = mysql_query($query_limit_completeindex) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
$row_completeindex = mysql_fetch_assoc($completeindex);

if (isset($_GET['totalRows_completeindex']))
{
        $totalRows_completeindex = $_GET['totalRows_completeindex'];
}
else
{
        $all_completeindex = mysql_query($query_completeindex);
        $totalRows_completeindex = mysql_num_rows($all_completeindex);
}
$totalPages_completeindex = ceil($totalRows_completeindex/$tsep_config['maxRows_completeindex'])-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $tsep_lng['index_edit_title']; ?> - <?php echo $tsep_lng['tsep'];?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="expires" content="0" />
<link href="<?php echo TSEP_CLIENT_ROOT?>/static/css/tsep.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/JavaScript">
<!--
function GP_popupConfirmMsg(msg) { //v1.0
  document.MM_returnValue = confirm(msg);
}
<?php JS_Upload(); ?>
<?php JS_DeleteFile(); ?>
//-->
</script>
</head>
<body>
<div class="tsepProject">
        <?php
        require( TSEP_INCLUDE_DIR."/indexer_search_table.php" ); //use code-recycling ?>
  <div class="indexeditHeadline"><?php echo $tsep_lng['index_edit_head']; ?></div>
  <?php require( TSEP_INCLUDE_DIR."/indexstatus.php" );  // output indexing status ?>
        <?php
        if ($cond=="")  //show the block for a new entry only if we see all records (not filtered)
        { ?>
                <div class="indexeditNewBlock">
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" name="frmIndexEditNew" id="frmIndexEditNew" method="post">
                                  <input name="page_number" type="hidden" class="formfieldvalueSmall" id="page_number" />
                                  <div class="indexeditEntryLine">
                                        <label for="page_title"><?php echo $tsep_lng['page_title'];?></label>
                                        <input name="page_title" type="text" class="formfieldvalueSmall" id="page_title" />
                                  </div>
                                  <div class="indexeditEntryLine">
                                        <label for="page_url"><?php echo $tsep_lng['page_url']; ?></label>
                                        <input name="page_url" type="text" class="formfieldvalueSmall" id="page_url" />
                                  </div>
                                  <div class="indexeditEntryLine">
                                        <label for="page_file_size"><?php echo $tsep_lng['page_file_size'] ?></label>
                                        <input name="page_file_size" type="text" class="formfieldvalueSmall" id="page_file_size" />
                                  </div>
                                  <div class="indexeditEntryLine">
                                        <label for="protect_indexentry" style="display:inline;"><?php echo $tsep_lng['protect_indexentry']; ?></label>
                                        <input name="protect_indexentry" type="checkbox" class="formfieldvalue_checkbox" id="protect_indexentry" value="1" />
                                  </div>
                                  <div class="indexeditEntryLine">
                                        <label for="indexed_words"><?php echo $tsep_lng['page_indexed_words']; ?></label>
                                        <textarea name="indexed_words" class="formfieldvalue" id="indexed_words"></textarea>
                                  </div>
                                  <div class="indexeditEntryLine">
                                        <label for="indexed_metawords"><?php echo $tsep_lng['page_indexed_metawords']; ?></label>
                                        <textarea name="indexed_metawords" class="formfieldvalue" id="indexed_metawords"></textarea>
                                  </div>                                  
                                  <div class="indexeditEntryLine">
                                        <label for="additional_info"><?php echo $tsep_lng['page_additional_info']; ?></label>
                                        <textarea name="additional_info" class="formfieldvalue" id="additional_info"></textarea>
                                  </div>                                  
                                  <div class="indexeditEntryLine">
                                        <?php echo $tsep_lng['indexer_last_indexed']." ".$tsep_lng['editindex_not_indexed']; ?><br />
                                        <?php echo $tsep_lng['editindex_last_edited']." ".$tsep_lng['editindex_not_edited']; ?>
                                  </div>                                  

                                  <input name="add" type="submit" id="add" value="<?php echo $tsep_lng['add']; ?>">
                                <input type="hidden" name="MM_insert" value="frmIndexEditNew">
                                <input type="hidden" name="pageNum_completeindex" value="<?php echo $pageNum_completeindex; ?>">
                        </form>
                </div>
                <?php
        } ?>
  <div class="indexeditOldBlock">

        <?php
        $showBackLink=false; // by default no back link to the indexoverview page
        if ($totalRows_completeindex>0)
        {
                if ($cond=="")  //show the block for a new entry only if we see all records (not filtered)
                {
                        //statistics start
                        RSTStatistics ($startRow_completeindex, $tsep_config['maxRows_completeindex'],   $totalRows_completeindex );
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
                }
                do
                {
                        $protect_indexentry_selected = ($row_completeindex['protect_indexentry'] == "1" ? " checked='checked'" : "");
                        $assignedIProfiles = GetAssignedIProfiles($row_completeindex['id']);
                  ?>
                        <div class="indexeditBlock"<?php require( TSEP_INCLUDE_DIR."/colorswitch.php" );?>>
                          <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" name="frmIndexEdit" id="frmIndexEdit" method="post">
                                  <input name="page_number" type="hidden" class="formfieldvalueSmall" id="page_number" value="<?php echo $row_completeindex['page_number']; ?>" />
                                  <div class="indexeditEntryLine">
                                   <label for="page_contentimg">
									<?php 
									$myContentImgs = new ContentImages();
									$myContentImgs->setPageURL($row_completeindex['page_url']);
									if ( $myContentImgs->useContentImages() == false ) {
										echo $tsep_lng['contentimgs_not_used'];
	                                   	?>
										</label>
										<?php 
                					} else {
										if ( $myContentImgs->getContentImageType() == "default")
											$lContentPITitle = $tsep_lng['contentimg_defaultimage']; 
										else
											$lContentPITitle = $tsep_lng['contentimg_url_assoc_image'];
										echo $lContentPITitle . ":"; 
										?>
	                                   	</label>
										<div class='formfieldvalueSmall'>
										<img src='<?php echo $myContentImgs->getContentImageURL(); ?>' <?php echo $myContentImgs->getContentImageGeometry();?> alt='<?php echo $lContentPITitle;?>' title='<?php echo $lContentPITitle;?>'/>
										<?php 
										if ( $myContentImgs->getContentImageType() == "default") {
											echo "<input type='button' size='4' value='Upload new' Onclick='open_upload_window(\"image contentimg\",\"" . $myContentImgs->buildMD5FileName() . "\");'>\n";
										} else {
											echo "<input type='button' size='4' value='Replace' Onclick='open_upload_window(\"image contentimg\",\"" . $myContentImgs->buildMD5FileName() . "\");'>\n";
											echo "<input type='button' size='4' value='Delete' Onclick='open_deletefile_window(\"image contentimg\",\"" . $myContentImgs->buildMD5FileName() . "\",\"" . $tsep_lng['contentimg'] . "\");'>\n";
										}
										echo "</div>\n";
                					}
                					$myContentImgs = NULL;  
									?>
                                  </div>
                                  <div class="indexeditEntryLine">
                                   <label for="page_title"><?php echo $tsep_lng['page_title'];?></label>
                                   <input name="page_title" type="text" class="formfieldvalueSmall" id="page_title" value="<?php echo $row_completeindex['page_title']; ?>" />
                                  </div>
                                  <div class="indexeditEntryLine">
                                   <label for="page_url"><?php echo $tsep_lng['page_url']; ?></label>
                                   <span class="formfieldvalueSmall"><?php echo $row_completeindex['page_url']; ?></span>
                                   <input name="page_url" type="hidden" class="formfieldvalueSmall" id="page_url" value="<?php echo $row_completeindex['page_url']; ?>" />
                                  </div>
                                  <div class="indexeditEntryLine">
                                   <label for="page_url"><?php echo $tsep_lng['assigned_indexingprofiles']; ?>:</label>
                                   <span class="formfieldvalueSmall"><?php echo $assignedIProfiles; ?></span>
                                  </div>
                                  <div class="indexeditEntryLine">
                                   <label for="page_file_size"><?php echo $tsep_lng['page_file_size'] ?></label>
                                   <input name="page_file_size" type="text" class="formfieldvalueSmall" id="page_file_size" value="<?php echo $row_completeindex['page_file_size']; ?>" />
                                  </div>
                                  <div class="indexeditEntryLine">
                                   <label for="protect_indexentry" style="display:inline;"><?php echo $tsep_lng['protect_indexentry']; ?></label>
                                   <input name="protect_indexentry" type="checkbox" class="formfieldvalue_checkbox" id="protect_indexentry" value="1" <?php echo $protect_indexentry_selected; ?> />
                                  </div>
                                  <div class="indexeditEntryLine">
                                   <label for="indexed_words"><?php echo $tsep_lng['page_indexed_words']; ?></label>
                                   <textarea name="indexed_words" class="formfieldvalue" id="indexed_words"><?php echo $row_completeindex['indexed_words']; ?></textarea>
                                  </div>
                                  <div class="indexeditEntryLine">
                                   <label for="indexed_metawords"><?php echo $tsep_lng['page_indexed_metawords']; ?></label>
                                   <textarea name="indexed_metawords" class="formfieldvalue" id="indexed_metawords"><?php echo $row_completeindex['indexed_metawords']; ?></textarea>
                                  </div>
                                  <div class="indexeditEntryLine">
                                   <label for="additional_info"><?php echo $tsep_lng['page_additional_info']; ?></label>
                                   <textarea name="additional_info" class="formfieldvalue" id="additional_info"><?php echo $row_completeindex['additional_info']; ?></textarea>
                                  </div>
                                  <div class="indexeditEntryLine">
                                        <?php echo $tsep_lng['indexer_last_indexed']." ".( $row_completeindex['last_indexed'] > 0 ? date( $tsep_config['Date_Style'], $row_completeindex['last_indexed'] ) : $tsep_lng['indexer_not_indexed'] ); ?><br />
                                        <?php echo $tsep_lng['editindex_last_edited']." ".( $row_completeindex['last_edited'] > 0 ? date( $tsep_config['Date_Style'], $row_completeindex['last_edited'] ) : $tsep_lng['editindex_not_edited'] ); ?>
                                  </div>                                  


                                  <input name="update" type="submit" id="update" value="<?php echo $tsep_lng['update']; ?>"/>
                                  <input name="delete" type="submit" id="delete" onclick="GP_popupConfirmMsg('<?php echo $tsep_lng['help_del_indexedpage']; ?>');return document.MM_returnValue;" value="<?php echo $tsep_lng['delete']; ?>"/>
                                  <input name="id" type="hidden" id="id" value="<?php echo $row_completeindex['id']; ?>"/>
                                        <input type="hidden" name="pageNum_completeindex" value="<?php echo $pageNum_completeindex; ?>">
                                  <input type="hidden" name="MM_update" value="frmIndexEdit">

                                  <?php
//
                                  if ($cond<>"")        // if the value is a detail (from the overview) if the user deletes / updates this we want to return to the page without showing the new and all the other values
                                  { ?>
                                        <input type="hidden" name="detail" value="<?php echo $id;?>">
                                        <?php
                                  } ?>
                          </form>
                        </div>
                        <?php
                } while ($row_completeindex = mysql_fetch_assoc($completeindex));
                if ($cond=="")  //show the block for a new entry only if we see all records (not filtered)
                {
                        //statistics start
                        RSTStatistics ($startRow_completeindex, $tsep_config['maxRows_completeindex'],   $totalRows_completeindex );
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
                }
                else
                {
                        $showBackLink=true;
                }
        }
        else
        {
                $showBackLink=true;
                echo $tsep_lng['no_records']."<br />";
        }

        if ($showBackLink==true)
        {
                ?>
                <a href="indexoverview.php"><?php echo $tsep_lng['index_overview_title']; ?></a>
                <?php
        }
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
