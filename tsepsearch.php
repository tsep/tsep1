<?php
/**
* Pre-made search page for a quick start of the user. Simply uses search.php
*
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-06-27 08:17:38 +0200 (Mo, 27 Jun 2005) $
*  @lastedited $LastChangedBy: olaf $
*  $LastChangedRevision: 201 $
*
*/
/*
This is released under the terms of the GPL !
Last modified by Olaf Noehring, http://www.team-noehring.de
*/        

require_once __DIR__.'/include/global.php'; //Always include this!!!

db::connect(); //Connect to the DB or die


if (!isset($q))
   $q="";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo $tsep_lng['tsep'];?> - <?php print $q; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="expires" content="0" />
<link href="<?php echo TSEP_CLIENT_ROOT;?>/css/tsep.css" rel="stylesheet" type="text/css" />

</head>
<body>

<?php require( TSEP_ROOT_DIR."/search.php" ); ?>

<div class="tsepProject">

<div class="poweredby">
    <a href="http://tsep.sourceforge.net/" title="<?php echo $tsep_lng['help_copyright']; ?>" target="_blank"><img src="<?php echo TSEP_CLIENT_ROOT; ?>/graphics/poweredbytsep.gif" alt="<?php echo $tsep_lng['powered_by'];?> <?php echo $tsep_lng['tsep'];?>"></a>
</div>

</div>
</body>
</html>
