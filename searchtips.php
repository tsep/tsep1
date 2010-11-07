<?php
/**
* Give some help in the user language of how to use TSEP and give example search terms
*
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-07-21 12:26:29 +0200 (Do, 21 Jul 2005) $
*  @lastedited $LastChangedBy: sebastian $
*  $LastChangedRevision: 268 $
*
*/

require_once( "./include/global.php" );

mysql_select_db($database_tsepdbconnection);
$db_tablename = db::$prefix."stopwords";
$query_stopwords = "SELECT * FROM $db_tablename ORDER BY stopword ASC";
$stopwords = mysql_query($query_stopwords) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
$row_stopwords = mysql_fetch_assoc($stopwords);
$totalRows_stopwords = mysql_num_rows($stopwords);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $tsep_lng['search_tips_title'];?> -
<?php echo $tsep_lng['tsep'];?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="expires" content="0" />
<link href="css/tsep.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="tsepProject">
  <h3><?php echo $tsep_lng['search_tips_head']; ?></h3>
  <div class="tsepDescription"><?php echo $tsep_lng['search_tips_desc']; ?></div>
  <div class="tsepSearchWord"><?php echo htmlentities($tsep_lng['search_tips_se1']); ?></div>
  <div class="tsepSearchWordExplanation"><?php echo $tsep_lng['search_tips_ex1']; ?></div>
    <div class="tsepSearchWord"><?php echo htmlentities($tsep_lng['search_tips_se2']); ?></div>
  <div class="tsepSearchWordExplanation"><?php echo $tsep_lng['search_tips_ex2']; ?></div>
    <div class="tsepSearchWord"><?php echo htmlentities($tsep_lng['search_tips_se3']); ?></div>
  <div class="tsepSearchWordExplanation"><?php echo $tsep_lng['search_tips_ex3']; ?></div>
    <div class="tsepSearchWord"><?php echo htmlentities($tsep_lng['search_tips_se4']); ?></div>
  <div class="tsepSearchWordExplanation"><?php echo $tsep_lng['search_tips_ex4']; ?></div>
    <div class="tsepSearchWord"><?php echo htmlentities($tsep_lng['search_tips_se5']); ?></div>
  <div class="tsepSearchWordExplanation"><?php echo $tsep_lng['search_tips_ex5']; ?></div>
    <div class="tsepSearchWord"><?php echo htmlentities($tsep_lng['search_tips_se6']); ?></div>
  <div class="tsepSearchWordExplanation"><?php echo $tsep_lng['search_tips_ex6']; ?></div>
      <div class="tsepSearchWord"><?php echo htmlentities($tsep_lng['search_tips_se7']); ?></div>
  <div class="tsepSearchWordExplanation"><?php echo $tsep_lng['search_tips_ex7']; ?></div>
  <div class="tsepStopWordsBlock">
    <div class="tsepStopWordsExplanation"><?php echo $tsep_lng['search_what_are_stopwords']; ?></div>
    <div class="tsepStopWords">
      <?php do { ?>
&quot;<?php echo $row_stopwords['stopword']; ?>&quot;
      <?php } while ($row_stopwords = mysql_fetch_assoc($stopwords)); ?>
    </div>
  </div>
  <div class="tsepContact"><?php echo $tsep_lng['if_problems_contact'];?></div>
  <div class="CloseWindow"><a href="javascript:void(0)" title="<?php echo $tsep_lng['close_this_window'];?>" onclick="self.close();return false"><?php echo $tsep_lng['close_this_window'];?></a></div>
  <?php
require( TSEP_INCLUDE_DIR."/copyright.php" ); // Use code-recyling whereever possible			
?>
</div>
</body>
</html>
<?php
mysql_free_result($stopwords);
?>
