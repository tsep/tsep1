<?php 
/**
* Give information about TSEP (version), MySQL (version) and show PHPINFO()
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
require_once __DIR__.'/../include/global.php';
?><html>
<head>
<title>TSEP information file</title>
<meta http-equiv="expires" content="0" />
</head>
<body>
<h1>This is a TSEP information file</h1>
<p>This file will hopefully help if there are any problems.</p>
<p>You have installed on this server:</p>
<p>* TSEP version <strong><?php include( "../include/tsepversion.txt" );?></strong></p>
<p>* MySQL version <strong><?php 
    include( "../include/stringfunctions.php" );
    include( "../include/oldmysqlcheck.php" );
    echo $mysqlversion;
?></strong></p>
<p>It follows the output of the phpinfo command</p>
<?php
echo phpinfo();
?>
</body>
</html>
