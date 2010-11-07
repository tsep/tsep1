<?php
/**
* User defined stopwords are added, updated and deleted with this file. Stopwords will not be searched for and not be marked in the results
*
* @tables tsep_stopwords
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-09-05 21:11:35 +0200 (Mo, 05 Sep 2005) $
*  @lastedited $LastChangedBy: michael $
*  $LastChangedRevision: 318 $
*
*/
require_once( __DIR__."/../include/global.php" );

db::connect();

$currentPage_stopwords = $_SERVER["PHP_SELF"];
require_once( TSEP_INCLUDE_DIR."/mmexfunctions.php" ); // mm functions which were placed in every file
require_once( TSEP_INCLUDE_DIR."/configfunctions.php" );
require_once( TSEP_INCLUDE_DIR."/rststatistics.php" ); // show statistics
require_once( TSEP_INCLUDE_DIR."/rstnavigation.php" ); // show statistics
require_once( TSEP_INCLUDE_DIR."/putsortpicture.php" );
/*
***************
*** Generate Hash Table "Counter" containing all indexed words and occurences
***************
*/
$sql  = "SELECT indexed_words, indexed_metawords";
$sql .= "  FROM ".db::$prefix."search";
$list_data = mysql_query($sql);
if ( !$list_data ) {
	_TsepTrace("searchFor-NODATA");
	errorHandler::throwError(mysql_error(), errorHandler::FATAL);;
}
$counter = array();
while ($row = mysql_fetch_array($list_data)) {
	$tok = explode(' ',$row["indexed_words"]);
	foreach($tok as $word) {
		if (!array_key_exists($word,$counter))
			$counter[$word] = 0;
		$counter[$word]++;
	}
}
mysql_free_result($list_data);
//Checks if a value is entered into Get Stopwords text box.
//If a value is entered that same number of stopwords is retrieved
//The stopwords retreived are displayed and automatically input into the stopwords database
//These stopwords include words that occured the most in the website
if ((isset($_POST["MM_get"])) && ($_POST["MM_get"] == "getStopwords"))
{
	if(isset($_POST['newstopwords']))
		$maxwords = extractnewmax($counter,$_POST['gstopword']);
	else
		$maxwords = extractmax($counter,$_POST['gstopword']);
	foreach ($maxwords as $maxword)
	{
		StopwordsInsert($maxword);
		$insertGoTo = "stopwords.php";
  		if (isset($_SERVER['QUERY_STRING'])) {
    		$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    		$insertGoTo .= $_SERVER['QUERY_STRING'];
  		}
 	}
}
//Update button no longer used
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "frmStopwords"))
{
  $db_tablename = db::$prefix."stopwords";
  $updateSQL = sprintf("UPDATE $db_tablename SET stopword=%s WHERE idstopwords=%s",
                       GetSQLValueString($_POST['stopword'], "text"),
                       GetSQLValueString($_POST['idstopwords'], "int"));
  mysql_select_db($database_tsepdbconnection);
  $Result1 = mysql_query($updateSQL) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
  $updateGoTo = "stopwords.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
//Delete Button
if ((isset($_POST['idstopwords'])) && ($_POST['idstopwords'] != "") && (isset($_POST['delete'])))
{
  $db_tablename = db::$prefix."stopwords";
  $deleteSQL = sprintf("DELETE FROM $db_tablename WHERE idstopwords=%s",
                       GetSQLValueString($_POST['idstopwords'], "int"));
  mysql_select_db($database_tsepdbconnection);
  $Result1 = mysql_query($deleteSQL) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
  $deleteGoTo = "stopwords.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}
//Add button
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frmStopwordsNew")) {
  StopwordsInsert($_POST['stopword']);
  $insertGoTo = "stopwords.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
/* where does this code comes from ? - is double !
$pageNum_stopwords = 0;
if (isset($_GET['pageNum_stopwords'])) {
  $pageNum_stopwords = $_GET['pageNum_stopwords'];
}
$startRow_stopwords = $pageNum_stopwords * $tsep_config['maxRows_Stopwords'];
*/
//$tsep_config['maxRows_Stopwords'] = 10;
$pageNum_stopwords = 0;
if (isset($_GET['pageNum_stopwords'])) {
  $pageNum_stopwords = $_GET['pageNum_stopwords'];
}
$startRow_stopwords = $pageNum_stopwords * $tsep_config['maxRows_Stopwords'];
$sortorder = "stopword"; //set default
$flag = -1; //set default
$flag2 = 0; //set default
$dbdirection = "ASC"; //set default
if (isset($_GET['order']))	// for userdefined search order, otherwise sort by time of entry, newest first
{

	$sortorder = $_GET['order'];
	if ($sortorder == "occurrence")
		$flag2 = 1;
}
if (isset($_GET['dir']))	// for userdefined search order, otherwise sort by time of entry, newest first
{
	$dbdirection = $_GET['dir'];
	if ($flag2 == 1 && $dbdirection == "ASC2")
		$flag = 0;
	else if ($flag2 == 1 && $dbdirection == "DESC2")
		$flag = 1;
}
mysql_select_db($database_tsepdbconnection);
$db_tablename = db::$prefix."stopwords";

$query_stopwords = "SELECT * FROM $db_tablename";
if ($flag2 != 1) { $query_stopwords = $query_stopwords . " ORDER BY ".$sortorder." ".$dbdirection; }
$query_limit_stopwords = sprintf("%s LIMIT %d, %d", $query_stopwords, $startRow_stopwords, $tsep_config['maxRows_Stopwords']);
$stopwords = mysql_query($query_limit_stopwords) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
$row_stopwords = mysql_fetch_assoc($stopwords);
if (isset($_GET['totalRows_stopwords'])) {
  $totalRows_stopwords = $_GET['totalRows_stopwords'];
} else {
  $all_stopwords = mysql_query($query_stopwords);
  $totalRows_stopwords = mysql_num_rows($all_stopwords);
}
$totalPages_stopwords = ceil($totalRows_stopwords/$tsep_config['maxRows_Stopwords'])-1;
$queryString_stopwords = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_stopwords") == false &&
        stristr($param, "totalRows_stopwords") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_stopwords = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_stopwords = sprintf("&totalRows_stopwords=%d%s", $totalRows_stopwords, $queryString_stopwords);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>
            <?php echo $tsep_lng['stopwords_title']; ?>
            -
            <?php echo $tsep_lng['tsep'];?>
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="<?php echo TSEP_CLIENT_ROOT?>/static/css/tsep.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/JavaScript">
<!--
function GP_popupConfirmMsg(msg) { //v1.0
document.MM_returnValue = confirm(msg);
}
//-->
</script>
    </head>
    <body>
        <div class="tsepProject">
<?php
            require( TSEP_INCLUDE_DIR."/indexer_search_table.php" ); //use code-recycling ?>
            <!-- Add Stopwords button. For manually entering stopwords !-->
            <div class="stopwordsHeadline">
                <?php echo $tsep_lng['your_stopwords_head'] ?>
            </div>
            <div class="stopwordsNewBlock">
                <form name="frmStopwordsNew" id="frmStopwordsNew" method="post" action="<?php echo $_SERVER["../../../TSEP%20PROJECT/admin/PHP_SELF"]; ?>">
                    <input name="stopword" type="text" class="stopwordsFieldWord" id="stopword" />
                    &nbsp
                    <input name="add" type="submit" id="add" value="<?php echo $tsep_lng['add']; ?>" />
                    <input type="hidden" name="MM_insert" value="frmStopwordsNew" />
                    <?php echo $tsep_lng['separate_values_by_comma'] ?>
                </form>
            </div>
            <!-- Get Stopwords button takes a numeric value and searches for that number of stopwords !-->
            <div class="stopwordsNewBlock">
                <form name="getStopwords" id="getStopwords" method="post" action="<?php echo $_SERVER["../../../TSEP%20PROJECT/admin/PHP_SELF"]; ?>">
                    <input name="gstopword" type="text" class="stopwordsFieldNum" id="gstopword" />
                    <input name="gostopword" type="submit" id="gostopword" value="<?php echo $tsep_lng['stopwords_GetStop'] ?>" />
                    <input type="hidden" name="MM_get" value="getStopwords" />
                    <?php echo $tsep_lng['stopwords_GetStop_Info'] ?>
                </form>
                    <form name="getNewStopwords" id="getNewStopwords" method="post" action="<?php echo $_SERVER["../../../TSEP%20PROJECT/admin/PHP_SELF"]; ?>">
                        <input name="newstopwords" type="checkbox" id="newstopwords"/>
                        <?php echo $tsep_lng['stopwords_RetreiveNew'] ?>
                    </form>
            </div>
<?php
//Displays stopwords that were found by Get Stopwords
if ($maxwords > 0)
{
            ?>
            <div class="stopwordsOldBlock"<?php require( TSEP_INCLUDE_DIR."/colorswitch.php" );?>>
<?php echo $tsep_lng['stopwords_NewStopwords'];
	foreach ($maxwords as $maxword)
	{
   		echo "\"$maxword\"    ";
    }
                ?>
            </div>
<?php
}
            ?>
            <div class="RSTNavigation">
<?php
//statistics start
RSTStatistics ($startRow_stopwords, $tsep_config['maxRows_Stopwords'], $totalRows_stopwords );
//statistics end
//navigation start
list (
        $queryString_stopwords,
        $currentPage_stopwords,
        $totalPages_stopwords,
        $pageNum_stopwords)
        =
        RSTNavigation ("stopwords",
                $queryString_stopwords,
                $currentPage_stopwords,
                $totalPages_stopwords,
                $pageNum_stopwords);
//navigation end
                ?>
                </div>
                <div class="stopwordsOldBlock">
<div class="stopwordsFieldWord">
	<?php
		echo $tsep_lng['logview_Stopwords'];
		$sortorderField = "stopword";
		putSortPicture("$sortorderField","ASC", $sortorder, $dbdirection, "stopwords.php", $filterString="");
		putSortPicture("$sortorderField","DESC", $sortorder, $dbdirection, "stopwords.php", $filterString="");
	?>
</div>
<div class="stopwordsOccurence">
<?php
	echo $tsep_lng['stopwords_Occurrences'];
	$sortorderField = "occurrence";
	putSortPicture("$sortorderField","ASC2", $sortorder, $dbdirection, "stopwords.php", $filterString="");
	putSortPicture("$sortorderField","DESC2", $sortorder, $dbdirection, "stopwords.php", $filterString="");
?>
</div>
<?php
$stopwordList = createArray($counter);
if ($flag == 1)
	$stopwordList = BubbleSort($stopwordList, true);
else if($flag == 0)
	$stopwordList = BubbleSort($stopwordList, false);
$z=0;
	do { ?>
	<div class="stopwordsBlock"<?php require(TSEP_INCLUDE_DIR."/colorswitch.php"); ?>>
	<div class="stopwordsFieldWord"><?php echo $z+1; ?>.&nbsp <?php
	if ($flag == -1)
		echo $row_stopwords['stopword'];
	else
		echo $stopwordList[$z][0];
	?></div>
	<div class="stopwordsOccurence"><?php
	if ($flag == -1)
	{
		$occurences = extractoccur($counter, $row_stopwords['stopword']);
		echo $occurences;
	}
	else
		echo $stopwordList[$z][1];

	$z++;
	?></div>
    <div class="stopwordsBlockForm">
    <form name="frmStopwords"  id="frmStopwords" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<!-- Update button not really necessary. "Commented Out"
<input name="update" type="submit" id="update" value="<?php echo $tsep_lng['update']; ?>" />
!-->
    <input name="delete" type="submit" id="delete" onclick="GP_popupConfirmMsg('<?php echo $tsep_lng['help_del_stopword']; ?>');return document.MM_returnValue" value="<?php echo $tsep_lng['delete']; ?>" />
	<input name="idstopwords" type="hidden" id="idstopwords" value="<?php echo $row_stopwords['idstopwords']; ?>" />
	<input type="hidden" name="MM_update" value="frmStopwords">
	</form>	</div>
</div>
<?php } while ($row_stopwords = mysql_fetch_assoc($stopwords));
 ?>
</div>

<div class="RSTNavigation">
<?php
//statistics start
RSTStatistics ($startRow_stopwords,     $tsep_config['maxRows_Stopwords'],       $totalRows_stopwords);
//statistics end
//navigation start
list (
        $queryString_stopwords,
        $currentPage_stopwords,
        $totalPages_stopwords,
        $pageNum_stopwords)
        =
        RSTNavigation ("stopwords",
                $queryString_stopwords,
                $currentPage_stopwords,
                $totalPages_stopwords,
                $pageNum_stopwords);
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
mysql_free_result($stopwords);

function StopwordsInsert($pStopwords)
{
   
   $arrInsert = preg_split("/ *, */", $pStopwords, -1, PREG_SPLIT_NO_EMPTY);
   while ( list($key,$data) = each($arrInsert) ) {
      $sql = "SELECT count(*) as ct FROM ".db::$prefix."stopwords WHERE stopword=" . GetSQLValueStringEx($data, "text");
      $result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
      $row = mysql_fetch_assoc($result);
      if ( $row["ct"] != 0 )
         continue;
      $sql = sprintf("INSERT INTO ".db::$prefix."stopwords (stopword)" .
                     " VALUES (%s)",
                     GetSQLValueStringEx($data, "text"));
      $Result1 = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
   }
} // StopwordsInsert()

function extractmax($counter, $len)
{
	for($x=0; $x<$len; $x++)
	{
		$max=0;
		$maxword="";
		foreach($counter as $key=>$value)
		{
			if($value > $max && $key != NULL)
			{
				$max = $value;
				$maxword = $key;
				$maxwords[$x]= $key;
			}
		}
		$counter[$maxword]=0;
	}
	return $maxwords;
}
function extractnewmax($counter, $len)
{
	
	for($x=0; $x<$len; $x++)
	{
		$max=0;
		$maxword="";
		foreach($counter as $key=>$value)
		{

			if($value > $max)
			{
				$sql = "SELECT count(*) as ct FROM ".db::$prefix."stopwords WHERE stopword=" . GetSQLValueStringEx($key, "text");

				$result = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
				$row = mysql_fetch_assoc($result);
			    if ( $row["ct"] == 0 && $key != NULL)
				{
				$max = $value;
				$maxword = $key;
				$maxwords[$x]= $key;
				}
			}
		}
		$counter[$maxword]=0;
	}
	return $maxwords;
}

function createArray($counter)
{
	

    $x=0;
	$sql = "SELECT * FROM ".db::$prefix."stopwords ";
	$all_stopwords = mysql_query($sql) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
	while ($row = mysql_fetch_array($all_stopwords)) {
	    $key = $row["stopword"];
		$stopwordlist[$x][0] = $key;
		$stopwordlist[$x][1] = extractoccur($counter, $key);
		$x++;
	}
    mysql_free_result($all_stopwords);

	return $stopwordlist;
}

function BubbleSort($sort_array,$direction)
{
  $len=count($sort_array);
  for ($i = 0; $i < $len ; $i++){
    for ($j = $i + 1; $j < $len ; $j++){
      if($direction){ //Descending
        if ($sort_array[$i][1] < $sort_array[$j][1]){
          $tmp = $sort_array[$i][1];
          $sort_array[$i][1] = $sort_array[$j][1];
          $sort_array[$j][1] = $tmp;

          $tmp = $sort_array[$i][0];
		  $sort_array[$i][0] = $sort_array[$j][0];
          $sort_array[$j][0] = $tmp;
        }
      }else{  //Ascending
        if ($sort_array[$i][1] > $sort_array[$j][1]){
          $tmp = $sort_array[$i][1];
          $sort_array[$i][1] = $sort_array[$j][1];
          $sort_array[$j][1] = $tmp;

          $tmp = $sort_array[$i][0];
		  $sort_array[$i][0] = $sort_array[$j][0];
          $sort_array[$j][0] = $tmp;
        }
      }
    }
  }
  return $sort_array;
}

function extractoccur($counter, $stopword)
{
	$numoccur = 0;
	foreach($counter as $key=>$value)
	{
		if($key == $stopword)
		{
			$numoccur = $value;
			return $numoccur;
		}
	}
	return $numoccur;
}
?>
