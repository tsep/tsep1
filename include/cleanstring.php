<?php
/**
* remove certain characters from a string
*
* @param string &$wild
* @return string $wild
* @author unknown, http://de2.php.net/manual/de/function.eregi-replace.php
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-05-17 17:18:57 +0200 (Di, 17 Mai 2005) $
*  @lastedited $LastChangedBy: olaf $
*  $LastChangedRevision: 41 $
*
*/


/**
* remove certain characters from a string
*
*
* from: http://de2.php.net/manual/de/function.eregi-replace.php
* we use it here to clean the search string the user entered to mark the matching words in our hits
* To simply convert wild input into a sensable sting, say for a filename I use:
*
* function cleanString($wild) {
*    return ereg_replace("[^[:alnum:]+]","",$wild);
* }
* echo cleanString("@#$&*$@#H~e'{}l{}l<o\{}"); // outputs: Hello
*
* @param string &$wild
* @return string $wild
* @author unknown, http://de2.php.net/manual/de/function.eregi-replace.php
* @lastedited Olaf Noehring
*/
function cleanString(&$wild) {

//debug only
// echo "<h1>1 wild in: "."$wild"."</h1>";              

//now remove any MySQL BOOLEAN operators
$wild = str_replace("+", "", $wild); // remove "+"
$wild = str_replace("-", "", $wild); // remove "-"

$wild = str_replace("(", "", $wild); // remove "("
$wild = str_replace(")", "", $wild); // remove ")"

$wild = str_replace("<", "", $wild); // remove "<"
$wild = str_replace(">", "", $wild); // remove ">"

$wild = str_replace("\"", "", $wild); // remove """
$wild = str_replace("\'", "", $wild); // remove "'"     //new
$wild = str_replace("\´", "", $wild); // remove "´"     //new

$wild = str_replace("~", "", $wild); // remove "~"

$wild = str_replace("\\", "", $wild); // remove "\"     //new, for removing the \  wgen the user searches for "hello you" -> \"Hello you\"


//debug only
//   echo "<h1>2 wild in: "."$wild"."</h1>";            
   return($wild);
}

function appendslash($str) {
   return( $str . (substr($str,-1,1) == "/" ? "" : "/") );
} // appendslash()

?>
