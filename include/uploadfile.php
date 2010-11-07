<?php
/**
* This file is used to handle uploading a file
* 
* ! ! ! due to security reasons, only type and tofile(name-part only) are passed to the script.
*       the type-parameter defines, which path has to be used/read from database, which mimetype and max-file-size has to be used
* Adding a new type: simply add a specific block between "-ADDTYPE-start-" and "-ADDTYPE-end-" below - nothing more to do here.
*
* @param type=          defines type which may be uploaded
* @param tofile=        hostfile (resultfile - filename without path!!! - path is retrieved via type=-info)
*
* @author Manfred Jedlicka
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-07-09 17:39:35 +0200 (Sat, 09 Jul 2005) $
*  @lastedited $LastChangedBy: manfred $
*  $LastChangedRevision: 233 $
*
*/
require_once( "../include/global.php" );
require_once( TSEP_INCLUDE_DIR."/configfunctions.php" );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title><?php echo $tsep_lng['upload']; ?> - <?php echo $tsep_lng['tsep'];?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="expires" content="0" />
        <meta name="author" content="the TSEP Team - https://sourceforge.net/projects/tsep/" />
        <link href="<?php echo TSEP_CLIENT_ROOT?>/static/css/tsep.css" rel="stylesheet" type="text/css" />
</head>
<script>
<!--
function chkFile() {
	if ( document.getElementById("userfile").value == "" ) {
		alert('Uploadfile empty');
		return false;
	}
	return true;
}
-->
</script>
<body>
<div class="tsepProject">
<?php

$pType = "";
$pFileName = "";
$lMaxfilesize = 10;
$lMimeType = "";

$lMode = "post";
if ( isset($_SERVER["QUERY_STRING"]) && $_SERVER["QUERY_STRING"] != "" )
	$lMode = "init";

if ( $lMode == "init") {
	$qs = "&" . urldecode($_SERVER["QUERY_STRING"]);
	if ( preg_match("/&type=([^&]+)/", $qs, $matches) )
		$pType = trim($matches[1]);
	if ( preg_match("/&tofile=([^&]+)/", $qs, $matches) )
		$pFileName = trim($matches[1]);
} else {
	$pType = $_POST['uploadtype'];
	$pFileName = $_POST['tofile'];
}

$pFileName = ( empty($pFileName) ? "*" : $pFileName );

$pFileNameName = $pFileName;
$pFileNameExt = "";
if (preg_match("/^(.+)(\.[^\.]+)$/", $pFileName, $lMatches)) {
	$pFileNameName = $lMatches[1];
	$pFileNameExt = $lMatches[2];
}


//-ADDTYPE-start------------------------

switch ($pType) {
	case "image contentimg":
		$larrDirDest = ReadValuesFromInternal("stringtag='configcontentimg'");
		$DirDest = ( isset($larrDirDest['configcontentimg_abspath']) ? $larrDirDest['configcontentimg_abspath'] : "");
		$lFileExt = ( isset($larrDirDest['configcontentimg_imageext']) ? $larrDirDest['configcontentimg_imageext'] : "");
		if ( empty($lFileExt) ) {
			echo "<div class='userError'>". sprintf($tsep_lng['not_defined_in_databse'], "configcontentimg_imageext") . "</div>\n";
			exit;
		}
		$lFnDest = $DirDest . "/" . $pFileNameName . $lFileExt;
		$lTypeDesc = $tsep_lng['contentimg']; 
		$lMimeType = "image/*";
		$lMimeTypeRegEx = "^image\/.+";
		$lMaxfilesize = 200000;
		break;
	default:
		echo "erroneous type: '$pType'";
		exit;
}

//-ADDTYPE-end--------------------------


if ( !empty($pFileNameExt) and $pFileNameExt != $lFileExt ) {
	$lMsg = sprintf($tsep_lng['wrong_fileext'], $pFileNameExt);
	echo "<div class='userError'>$lMsg</div>\n";
	echo "<center><a href='Javascript:window.close();'>" . $tsep_lng['close'] . "</a></center>";
	exit;
}
if ( empty($pFileNameExt) )
	$pFileName = $pFileNameName . $lFileExt;

?>	
  <div class="indexerSearchTableLeft">
        <a href="http://tsep.sourceforge.net/" target="_blank" title="<?php echo $tsep_lng['help_copyright']?>"><img src="../graphics/tsep.gif" alt="<?php echo $tsep_lng['tsep'];?>" width="310" height="61" border="0" /></a>
  </div>
  <div class="breakerBoth">&nbsp;</div>

  <div class="configurationHeadline">
  	<?php echo $tsep_lng['upload']; ?> <small> <?php echo $lTypeDesc; ?><br /><br />
  	<?php echo $tsep_lng['destinationfile'] . ": " . $pFileName;?></small>
  </div>
  <br />
<?php

if (!@is_dir($DirDest)) {
	$lMsg = $tsep_lng['destdirectory_does_not_exist'];
	echo "<div class='userError'>$lMsg</div>\n";
	echo "<center><a href='Javascript:window.close();'>" . $tsep_lng['close'] . "</a></center>";
	exit;
}

if ( $lMode == "init" ) { ?>
  <div class="configurationTSEPBlock">
	<form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" onSubmit='return chkFile();'>
	 <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $lMaxfilesize;?>">
	 <input type="hidden" name="uploadtype" value="<?php echo $pType;?>">
	 <input type="hidden" name="tofile" value="<?php echo $pFileName;?>">
	 <?php echo $tsep_lng['send_this_file']; ?>: <input name="userfile" id="userfile" size="50" type="file" accept="<?php echo $lMimeType;?>"><br/>
	 <center><br /><input type="submit" value="<?php echo $tsep_lng['upload'];?>"></center>
	</form>
  </div>
<?php }

if ( $lMode == "post" ) {
	$lMsg = "";
	$lUploadFileExt = "";
	if (preg_match("/\\/[^\\/]+(\..+)$/", "/".$_FILES['userfile']['name'], $lMatches))
		$lUploadFileExt = $lMatches[1];

	if ( $_FILES['userfile']['error'] != 0 ) {
		$lIniSize = ini_get('upload_max_filesize');
		switch ($_FILES['userfile']['error']) {
			case 1: $lMsg = sprintf($tsep_lng['err_upload_err_ini_size'], $lIniSize); break;
			case 2: $lMsg = sprintf($tsep_lng['err_upload_err_form_size'], $lMaxfilesize); break;
			case 3: $lMsg = $tsep_lng['err_upload_err_partial']; break;
			case 4: $lMsg = $tsep_lng['err_upload_err_no_file']; break;
			default: $lMsg = sprintf($tsep_lng['err_upload_err_undefined'], $_FILES['userfile']['error']); break;
		}
	}
	elseif ( $_FILES['userfile']['size'] == 0 )
		$lMsg = $tsep_lng['err_upload_zerosize'];
	elseif ( !preg_match("/$lMimeTypeRegEx/", $_FILES['userfile']['type']) )
		$lMsg = sprintf($tsep_lng['err_upload_mimetype'], $_FILES['userfile']['type']);
	elseif ( $lUploadFileExt != $lFileExt )
		$lMsg = sprintf($tsep_lng['fileext_mismatch'], $lUploadFileExt, $lFileExt);
		
	if ( !empty($lMsg) ) {
		echo "<div class='userError'>$lMsg</div>\n";
		echo "<center><a href='Javascript:history.back();'>" . $tsep_lng['back'] . "</a>";
		exit;
	}

	// append extension from upload-sourcefile, if given Destination-file does not have an extension
	if (preg_match("/\\/[^\\/\.]+$/", "/".$lFnDest))
		if (preg_match("/\\/[^\\/]+(\..+)$/", "/".$_FILES['userfile']['name'], $lMatches))
			$lFnDest .= $lMatches[1];
	// use filename-name of uploaded file, if $lFnDest contains an "*"
	if ( preg_match("/\\*/", $lFnDest))
		if (preg_match("/\\/([^\\/]+)\..+$/", "/".$_FILES['userfile']['name'], $lMatches))
			$lFnDest = preg_replace("/\\*/", $lMatches[1], $lFnDest);

	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $lFnDest))
		$lMsg = '<div class="configurationHeadline">' . $tsep_lng['upload_complete'] . '</div>';
	else
		$lMsg = "<div class='userError'>" . $tsep_lng['err_upload_moving_tmpfile'] . "</div>";
	echo "$lMsg\n";
	echo "<center><a href='Javascript:window.close();'>" . $tsep_lng['close'] . "</a>";
}

?>
</div>
</body>
</html>
