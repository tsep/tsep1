<?php
/**
* check if an old (<version 4) MySQL is used (for boolean search)
*
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-05-17 17:18:57 +0200 (Di, 17 Mai 2005) $
*  @lastedited $LastChangedBy: olaf $
*  $LastChangedRevision: 41 $
*
*/

require_once __DIR__.'/global.php';


	$get_mysql_version = mysql_query ("select version() as mysqlversion"); // get mysql version
	if (!$get_mysql_version)
	{
		die (mysql_error());
	}
	while ($row = mysql_fetch_array($get_mysql_version))
	{
		$mysqlversion = $row["mysqlversion"] ;
	}
	//debug only
	//echo "<h1>$mysqlversion</h1>";
	
	// we just ASSUME (!) that anything which has a number >3 in the first place is ok (mysql version 10 will hopefully need a while to get to the public ;-) )
	if (left ($mysqlversion,1)>3) //test if version is >3 so that we can use boolean
	{
		$mysqlversion_is_ok=true; // we will use boolean search,we will use this variable later to notify user if not boolean search is possible
		$mysql_boolean="IN BOOLEAN MODE";	//will do the trick ;-)
	}
	else
	{
		$mysqlversion_is_ok=false; 	// we will NOT be able to use boolean search,we will use this variable later to notify user if not boolean search is possible
		$mysql_boolean= "";
	}
		
	//debug only
	//echo "<h1>$mysqlversion_is_ok</h1>";		

?>
