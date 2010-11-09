<?php
/**
* This file just puts two similar functions together
*
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/



/**
* This function is a generic data processing function. It adds slashes if the magic quotes is off.
*
* from :  http://de.php.net/addslashes
* @author unknown, http://de.php.net/addslashes
* @lastedited Olaf Noehring
*/
function reslash(&$string)
{
   if (!get_magic_quotes_gpc()){
   	
   	//debug only:
       //echo "<h2>Reslash before: ".$string."</h2>";
   	
       $string = addslashes($string);

   	//debug only:
       //echo "<h2>Reslash after: ".$string."</h2>";

	}
   return $string;
}

/**
* This function takes out slashes if if the magic quotes are on.
*
* from :  http://de.php.net/addslashes
* @author unknown, http://de.php.net/addslashes
* @lastedited Olaf Noehring
*/
function deslash(&$string)
{
   if (get_magic_quotes_gpc()){
   	
   	//debug only:
       //echo "<h2>deslash before: ".$string."</h2>";
   	
       $string = stripslashes($string);

       //debug only:
       //echo "<h2>deslash after: ".$string."</h2>";

	}
   return $string;
}

?>
