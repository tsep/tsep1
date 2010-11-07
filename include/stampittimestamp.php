<?php
/**
* get the timestamp and correct it to the local time
*
* @author DeadlySin3, http://www.phpfreaks.com.
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-05-17 17:18:57 +0200 (Di, 17 Mai 2005) $
*  @lastedited $LastChangedBy: olaf $
*  $LastChangedRevision: 41 $
*
*/



 /*
Please visit our site for quick code snipplets, tutorials and much more!
This file may require modification to work properly.
*/

// Title: StampIt! Timestamp
// Author: DeadlySin3 , changed for tsep by Olaf Noehring
// Date: August 9th, 2003
// Code Snipplet:
// Defining a timestamp
//for tsep defined in config.php!
//$hourdiff = "-0"; // hours difference between server time and local time. Adjust accordingly.

$timeadjust = ($hourdiff * 60 * 60);

// we use the user language so we need a special function
//$tsepindexeditdate = date($tsep_config['Date_Style'],time() + $timeadjust); // Change to how you wish the stamp to display.

//use timestamp only!
//$tsepindexeditdate = datum($tsep_config['Date_Style'],time() + $timeadjust); // Change to how you wish the stamp to display.
$tsepindexeditdate = time() + $timeadjust;

//$logindate = date("d.m.Y",time() + $timeadjust); // Change to how you wish the stamp to display.
//$logintime = date("H:i:s",time() + $timeadjust); // Change to how you wish the stamp to display.
// End timestamp

/* Description:
You could add this to any page and display a time stamp anywhere quite easily by just printing $todaysdate.
ex. <?php echo "$todaysdate";?>
*/

?>
