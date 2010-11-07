<?php
/**
* the function prints the contens of a variable between <hN> ... </hN> tags
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


/**
* the function prints the contens of a variable between <hN> ... </hN> tags
*
*  by Olaf Noehring, 2004, http://www.team-noehring.de
*
*  for programmes only:
*  the function prints the contens of a variable between <hN> ... </hN> tags
*  call :
*  [] .. argument is optional!
*  	debugprint ($yourVarableName,[HTMLheadlinenummer]);
*  example:
* your code
* 	$money="15 euros";
* 	debugprint ("show me the $money",2);
*  add this html code in browser:
* 	<h2>show me the 15 euros</h2>
*
*  without the optional second parameter:
* 	debugprint ("show me the $money");
*  add this html code in browser:
* 	<h1>show me the 15 euros</h1>
*  can be true or false
*
* @author Olaf Noehring
* @lastedited Olaf Noehring
*/
function debugprint($myvar="debugprint",$htmlheadnumber=1)	// for simple debugging of variables at runtime
{
	echo "<h$htmlheadnumber>$myvar</h$htmlheadnumber>";
}

?>
