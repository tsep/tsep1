<?php

/**
* a form to add, change the values in the database for the ranking
* 
*
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-07-14 21:30:37 +0200 (Do, 14 Jul 2005) $
*  @lastedited $LastChangedBy: oliver $
*  $LastChangedRevision: 265 $
* 
*/
require_once ("../include/global.php");
require_once ("../include/dereslash.php");


$db_tablename   = db::$prefix."ranksymbols";
$modify_percent = "";

// Delete the contents
if ((isset ($_POST["delete"])) && (isset ($_POST["deleteRank"]))) {
	$percent = $_POST['deleteRank'];
	$sql_del = "DELETE FROM $db_tablename WHERE valuepercent='$percent'";
	mysql_query($sql_del);
}

// Modify the contents
if ((isset ($_POST["modify"])) && (isset ($_POST["modifyRank"]))) {
	$percent      = $_POST['modifyRank']; // this is the percent value hidden
	$display      = reslash($_POST['display']);
	$comment      = $_POST['comment'];
	$alt          = $_POST['alt'];
	$percent_form = $_POST['percent'];   // this is the modify value of percent, this value mustn't change in the db!!'
	
	if ($percent_form != $percent) {
		$modify_percent = $tsep_lng['alert_mod_ranking'];
	}
	else {
		$sql_mod = "UPDATE $db_tablename SET display='$display', comment='$comment', alt_tag='$alt' WHERE valuepercent='$percent'";
		mysql_query($sql_mod);
	}
}


// insert a new value
if ((isset ($_POST["insert"])) && (isset ($_POST["insertNewRank"]))) {
	$alt           = $_POST['alt'];
	$image_show    = $_POST['image_show'];
	$comment       = $_POST['comment'];
	$percent       = $_POST['percent'];
	$display       = reslash($_POST['display']);

	if (($percent > "0") && ($percent <= "100")) {		
		$sql_ins = "INSERT INTO $db_tablename (alt_tag,display,valuepercent,image_show,comment) VALUES ('$alt','$display','$percent','$image_show','$comment')";
		mysql_query($sql_ins);
	}
	$sql_upd = "UPDATE $db_tablename SET image_show='$image_show'";
	mysql_query($sql_upd);
	
} // end if $_POST


$sql_dis    = "SELECT display, alt_tag, image_show, comment, valuepercent FROM $db_tablename ORDER BY valuepercent ASC";
$result_dis = mysql_query($sql_dis) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);

$data       = "";
$sql_sel    = "SELECT * FROM $db_tablename";
$pointer    = mysql_query($sql_sel);
$data       = @MYSQL_RESULT($pointer, 0, 0);
$image_show = @MYSQL_RESULT($pointer, 0, "image_show"); // enable/disable this feature

?>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="<?php echo TSEP_CLIENT_ROOT?>/static/css/tsep.css" rel="stylesheet" type="text/css" />

		<script language="JavaScript" type="text/JavaScript">
		<!--
		function DEL_popupConfirmMsg(msg) { //v1.0
		document.DEL_returnValue = confirm(msg);
		}
		function MOD_popupConfirmMsg(msg) {
		document.MOD_returnValue = confirm(msg);
		}
		// if you will trying to change the percent in the db
		var mod = "<?php echo $modify_percent; ?>";
		if (mod != "")
		   alert(mod);
		//-->
		</script>

</head>
<body>
<div class="tsepProject">

<div class="rankBlock">
	<form name="frmRankImagesNew" id="frmRankImagesNew" action ="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<div class="rank_DisplayRanking_Head"><label for="ranking_image"><?php echo $tsep_lng['display_ranking']; ?></label></div>
		<div class="rank_DisplayRanking_Content"><input type="checkbox" id="ranking_image" name="image_show" value="true" <?php 
				if ($image_show == 'true') { 
				?>checked="checked"<?php
				}
			?> /></div>		
		<div class="rank_Comment_Head"><label for="ranking_comment"><?php echo $tsep_lng['ranking_comments']; ?></label></div>
		<div class="rank_Comment_Content"><input type="text" id="ranking_comment" name="comment" value="" /></div>
		<div class="rank_ALTattib_Head"><label for="ranking_alt"><?php echo $tsep_lng['ranking_alt']; ?></label></div>
		<div class="rank_ALTattib_Content"><input type="text" id="ranking_alt" name="alt" value="" /></div>		
		<div class="rank_Range_Head"><label for="ranking_range"><?php echo $tsep_lng['ranking_range']; ?></label></div>
		<div class="rank_Range_Content"><input type="text" id="ranking_range" name="percent" value="" /></div>	
		<div class="rank_Image_Head"><label for="ranking_image_text"><?php echo $tsep_lng['ranking_image_text']; ?></label></div>
		<div class="rank_Image_Content"><input type="text" id="ranking_image_text" name="display" value="" /></div>		
		<div class="rank_Btn_Submit">
			<input type="submit" name="insert" value="<?php echo $tsep_lng['ranking_submit']; ?>" />
			<input type="hidden" name="insertNewRank" value="insertNewRank" />
		</div>		
	</form>
</div>
<?php 
if ($data != "") {
?>
	<div class="rankBlockOld">		
		<div class="rank_List_Head">
			<div class="rank_Single_Entry_Block">							
				<div class="rank_Image_List"><?php echo $tsep_lng['ranking_image']; ?></div>			
				<div class="rank_URL_List"><?php echo $tsep_lng['ranking_url']; ?></div>		
				<div class="rank_Comment_List"><?php echo $tsep_lng['ranking_com']; ?></div>				
				<div class="rank_ALTattrib_List"><?php echo $tsep_lng['ranking_alt_attrib']; ?></div>		
				<div class="rank_Percent_List"><?php echo $tsep_lng['ranking_percent']; ?></div>			
			</div>
		</div>		
		<?php
		while ($line = (mysql_fetch_row($result_dis))) {
			$display       = deslash($line[0]); // this is the url of the image
			$alt           = $line[1]; // text for the alt-tag
			$comment       = $line[3]; // percent to start the display
			$percent       = $line[4]; // value percent
			
			// the rankform.php stands under admin, the search.php under root of tsep
			// if an relative image given, display the image relative to the root of tsep
			$screen_show = $display;
			// search the src=" negation with http and replace with src="../
			if (!preg_match("/http:/",$display)) {
				$screen_show = preg_replace("/(src=\")/", '\1' . "../", $display);
			}
			?>		
			<div class="rank_Single_Entry_Block" <?php require(TSEP_INCLUDE_DIR."/colorswitch.php"); ?>>		
			    <form name="frmRankImagesList" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">			    
					<div class="rank_Image_List"><?php echo $screen_show; ?></div>					
					<div class="rank_URL_List"><input type="text" name="display" value='<?php echo $display; ?>' /></div>				
					<div class="rank_Comment_List"><input type="text" name="comment" value="<?php echo $comment; ?>" /></div>						
					<div class="rank_ALTattrib_List"><input type="text" name="alt" value="<?php echo $alt; ?>" /></div>				
					<div class="rank_Percent_List"><input type="text" name="percent" value="<?php echo $percent; ?>" /></div>				    			    
					<div class="rank_Btn_Delete">
						<input type="submit" name="delete" onclick="DEL_popupConfirmMsg('<?php echo $tsep_lng['help_del_ranking']; ?>');return document.DEL_returnValue" value="<?php echo $tsep_lng['ranking_delete']; ?>" />
						<input type="hidden" name="deleteRank" value="<?php echo $percent; ?>" />
					</div>
					<div class="rank_Btn_Modify">
						<input type="submit" name="modify" onclick="MOD_popupConfirmMsg('<?php echo $tsep_lng['help_mod_ranking']; ?>');return document.MOD_returnValue" value="<?php echo $tsep_lng['ranking_modify']; ?>" />
						<input type="hidden" name="modifyRank" value="<?php echo $percent; ?>" />
					</div>							
			    </form>
		    </div>
	<?php 	    
   }
   ?>
   </div>
<?php   
}
?>
</div>
</body>
</html>