<?php
/**
* Show a short overview of all the indexed files / all the index. Links to the files details are given to the user
*
* @tables tsep_search
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-07-21 12:20:39 +0200 (Do, 21 Jul 2005) $
*  @lastedited $LastChangedBy: sebastian $
*  $LastChangedRevision: 267 $
*
*/
require_once( "../include/global.php" );
require_once( TSEP_INCLUDE_DIR."/mmexfunctions.php" ); // mm functions which were placed in every file
require_once( TSEP_INCLUDE_DIR."/datefunctions.php" ); // to read and write las index edit date
require_once( TSEP_INCLUDE_DIR."/rststatistics.php" ); // show statistics
require_once( TSEP_INCLUDE_DIR."/rstnavigation.php" ); // show statistics
require_once( TSEP_INCLUDE_DIR."/putsortpicture.php" ); // show sortorder pictures

$pageNum_completeindex = 0;
if (isset($_GET['pageNum_completeindex'])) {
  $pageNum_completeindex = $_GET['pageNum_completeindex'];
}
$startRow_completeindex = $pageNum_completeindex * $tsep_config['maxRows_indexoverview'];

// === START ==== write / get search order and field from database ============================
	if (isset($_GET['order']))	// for userdefined search order, otherwise sort by time of entry: Title ASC
	{	// write new values
		$db_tablename = db::$prefix."internal";	
		 $query = "UPDATE $db_tablename SET stringvalue='".$_GET['order']."' WHERE description='tsepindexovervieworder'";
		 $result = mysql_query($query) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
		 $query = "UPDATE $db_tablename SET stringvalue='".$_GET['dir']."' WHERE description='tsepindexoverviewdirection'";
		 $result = mysql_query($query) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
	}
	// read database values
	mysql_select_db($database_tsepdbconnection);
	$db_tablename = db::$prefix."internal";
	$query_Recordset1 = "SELECT stringvalue FROM $db_tablename WHERE description = 'tsepindexoverviewdirection'";
	$Recordset1 = mysql_query($query_Recordset1) or (errorHandler::throwError(mysql_error(), errorHandler::FATAL));
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	$dir=$row_Recordset1['stringvalue'];
	
	$query_Recordset1 = "SELECT stringvalue FROM $db_tablename WHERE description = 'tsepindexovervieworder'";
	$Recordset1 = mysql_query($query_Recordset1) or (errorHandler::throwError(mysql_error(), errorHandler::FATAL));
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	$order=$row_Recordset1['stringvalue'];
	
	$sortorder = $order." ".$dir;
// === END==== write / get search order and field from database ============================


mysql_select_db($database_tsepdbconnection);
$db_tablename = db::$prefix."search";
$query_completeindex = "SELECT * FROM $db_tablename ORDER BY $sortorder";
$query_limit_completeindex = sprintf("%s LIMIT %d, %d", $query_completeindex, $startRow_completeindex, $tsep_config['maxRows_indexoverview']);
$completeindex = mysql_query($query_limit_completeindex) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
$row_completeindex = mysql_fetch_assoc($completeindex);

if (isset($_GET['totalRows_completeindex'])) {
  $totalRows_completeindex = $_GET['totalRows_completeindex'];
} else {
  $all_completeindex = mysql_query($query_completeindex);
  $totalRows_completeindex = mysql_num_rows($all_completeindex);
}
$totalPages_completeindex = ceil($totalRows_completeindex/$tsep_config['maxRows_indexoverview'])-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $tsep_lng['index_overview_title']; ?>-<?php echo $tsep_lng['tsep'];?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="expires" content="0" />
<link href="<?php echo TSEP_CLIENT_ROOT?>/static/css/tsep.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="tsepProject">
  <?php
        require( TSEP_INCLUDE_DIR."/indexer_search_table.php" ); //use code-recycling ?>
  <div class="indexeditHeadline"> <?php echo $tsep_lng['index_overview_head']; ?> <br />
    <?php echo $tsep_lng['index_overview_help'];?> </div>
  <?php require( TSEP_INCLUDE_DIR."/indexstatus.php" );  // output indexing status ?>
  <div class="indexeditOldBlock">
    <?php
        //statistics start
        RSTStatistics ($startRow_completeindex, $tsep_config['maxRows_indexoverview'],   $totalRows_completeindex );
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
    <div class="indexoverviewBlockHead">
		<div class="indexOverviewTitle">
			<?php
				echo $tsep_lng['page_title'];
				$sortorderField = "page_title";
				putSortPicture("$sortorderField","ASC", $order, $dir, "indexoverview.php");		
				putSortPicture("$sortorderField","DESC", $order, $dir, "indexoverview.php");		
			?>
		</div>
		<div class="indexOverviewURL">
			<?php
				echo $tsep_lng['page_url'];
				$sortorderField = "page_url";
				putSortPicture("$sortorderField","ASC", $order, $dir, "indexoverview.php");						
				putSortPicture("$sortorderField","DESC", $order, $dir, "indexoverview.php");		
			?>
		</div>
		<div class="indexOverviewProtected">
			<?php
				echo $tsep_lng['protected_indexentry'];
				$sortorderField = "protect_indexentry";
				putSortPicture("$sortorderField","ASC", $order, $dir, "indexoverview.php");					
				putSortPicture("$sortorderField","DESC", $order, $dir, "indexoverview.php");			
			?>
		</div>
      <div class="spacer">&nbsp;</div>
    </div>
    <?php do { ?>
    <div class="indexoverviewBlock"<?php require( TSEP_INCLUDE_DIR."/colorswitch.php" );?>>
		<a class="indexOverviewTitle" href="indexedit.php?detail=<?php echo $row_completeindex['id']; ?>" title="<?php echo $row_completeindex['page_title']; ?> <?php echo $tsep_lng['page_file_size'] ?> <?php echo $row_completeindex['page_file_size']; ?> <?php echo $tsep_lng['index_overview_click_title'];?>">
			<?php echo $row_completeindex['page_title']; ?>
		</a>
	
      <div class="indexOverviewURL">
		<a href="<?php echo $row_completeindex['page_url']; ?>" title="<?php echo $row_completeindex['page_url']; ?> <?php echo $tsep_lng['page_file_size'] ?> <?php echo $row_completeindex['page_file_size']; ?> <?php echo $tsep_lng['index_overview_click_url'];?>">
			<?php echo $row_completeindex['page_url']; ?>
		</a>
		</div>

      <div class="indexOverviewProtected">
        <input type="checkbox" class="indexoverviewProtect_Indexentry" disabled="disabled" readonly="readonly" <?php echo ( $row_completeindex['protect_indexentry'] == '1' ? " checked='checked'" : "" ); ?> />
      </div>
	
      <div class="spacer">&nbsp;</div>

	  </div>
    <?php } while ($row_completeindex = mysql_fetch_assoc($completeindex)); ?>
    <?php
        //statistics start
        RSTStatistics ($startRow_completeindex, $tsep_config['maxRows_indexoverview'],   $totalRows_completeindex );
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
