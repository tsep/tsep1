<?php
/**
* This file is used to handle deletion a file
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
        <title><?php echo $tsep_lng['delete_file']; ?> - <?php echo $tsep_lng['tsep'];?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="expires" content="0" />
        <meta name="author" content="the TSEP Team - https://sourceforge.net/projects/tsep/" />
        <link href="<?php echo TSEP_CLIENT_ROOT?>/static/css/tsep.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="tsepProject">

<?php
$pType = "";
$pFileName = "";

$lMode = "post";
if ( isset($_SERVER["QUERY_STRING"]) && $_SERVER["QUERY_STRING"] != "" )
	$lMode = "init";

if ( $lMode == "init") {
	$qs = "&" . urldecode($_SERVER["QUERY_STRING"]);
	if ( preg_match("/&type=([^&]+)/", $qs, $matches) )
		$pType = trim($matches[1]);
	if ( preg_match("/&filename=([^&]+)/", $qs, $matches) )
		$pFileName = trim($matches[1]);
} else {
	$pType = $_POST['deletetype'];
	$pFileName = $_POST['filename'];
}

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
		$lFnDest = $DirDest . "/" . $pFileNameName . $lFileExt;
		$lTypeDesc = $tsep_lng['contentimg']; 
		break;
	case "contentimg filelistfile":
		$larrDirDest = ReadValuesFromInternal("stringtag='configcontentimg' AND description='configcontentimg_abspath_flists'");
		$DirDest = ( isset($larrDirDest['configcontentimg_abspath_flists']) ? $larrDirDest['configcontentimg_abspath_flists'] : "");
		$lFileExt = ".txt";
		$lFnDest = $DirDest . "/" . $pFileNameName . $lFileExt;
		$lTypeDesc = $tsep_lng['contentimg_filelist']; 
		break;
	case "contentimg filelistTF1" or "contentimg filelistTF2":
		preg_match("/[12]$/", $pType, $lMatches);
		$lFnTFType = $lMatches[0]; 
		$larrDirDest = ReadValuesFromInternal("stringtag='configcontentimg'");
		$DirDest = ( isset($larrDirDest['configcontentimg_abspath_flists']) ? $larrDirDest['configcontentimg_abspath_flists'] : "");
		$lFileExt = $pFileNameExt;
		$lFnDest = $DirDest . "/" . $pFileNameName . $lFileExt;
		$lTypeDesc = sprintf($tsep_lng['contentimg_filelistTF'], $lFnTFType); 
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
  	<?php echo $tsep_lng['delete']; ?> <small> <?php echo $lTypeDesc; ?><br /><br />
  	<?php echo $pFileName;?></small>
  </div>
  <br />
<?php

if (!@is_dir($DirDest)) {
	$lMsg = $tsep_lng['directory_does_not_exist'];
	echo "<div class='userError'>$lMsg</div>\n";
	echo "<center><a href='Javascript:window.close();'>" . $tsep_lng['close'] . "</a>";
	exit;
}
	
if (!@is_file($lFnDest)) {
	$lMsg = $tsep_lng['file_does_not_exist'];
	echo "<div class='userError'>$lMsg</div>\n";
	echo "<center><a href='Javascript:window.close();'>" . $tsep_lng['close'] . "</a>";
	exit;
}
	
if ( $lMode == "init" ) { ?>
  <div class="configurationTSEPBlock">
	<form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
	 <input type="hidden" name="deletetype" value="<?php echo $pType;?>">
	 <input type="hidden" name="filename" value="<?php echo $pFileName;?>">
	 <center><br /><input type="submit" value="<?php echo $tsep_lng['delete_this_file']; ?>"></center>
	</form>
  </div>
<?php }

if ( $lMode == "post" ) {
	if (@unlink($lFnDest))
		$lMsg = '<div class="configurationHeadline">' . $tsep_lng['delete_complete'] . '</div>';
	else
		$lMsg = "<div class='userError'>" . $tsep_lng['err_deleting_file'] . "</div>";
	echo "$lMsg\n";
	echo "<center><a href='Javascript:window.close();'>" . $tsep_lng['close'] . "</a>";
}

?>
</div>
</body>
</html>
