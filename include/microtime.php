<?php
/**
* returns the unixtime - this is for calculating the time we need to create a page / do a search / database query...
*
* @return getmicrotime
* @author Girish R
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-05-17 17:18:57 +0200 (Di, 17 Mai 2005) $
*  @lastedited $LastChangedBy: olaf $
*  $LastChangedRevision: 41 $
*
*/


/**
* returns the unixtime - this is for calculating the time we need to create a page / do a search / database query...
*
* @return getmicrotime
* @author Girish R
* @lastedited Olaf Noehring
*/
function getmicrotime()
{
	list($usec, $sec) = explode(" ",microtime());
	return ($usec + $sec);
}

?>
