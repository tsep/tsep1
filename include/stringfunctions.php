<?php
/**
* different functions to isolate parts of a string
*
* @param string $username
* @param string $password
* @author unknown, from http://php3.de/manual/de/ref.strings.php
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/


/**
* get the left X characters of a string
*
* @param string $str
* @param string $howManyCharsFromLeft
* @author unknown, from http://php3.de/manual/de/ref.strings.php
* @lastedited not edited
*/
function left (&$str, $howManyCharsFromLeft)
{
  return substr ($str, 0, $howManyCharsFromLeft);
}

/**
* get the right X characters of a string
*
* @param string $str
* @param string $howManyCharsFromRight
* @author unknown, from http://php3.de/manual/de/ref.strings.php
* @lastedited not edited
*/
function right (&$str, $howManyCharsFromRight)
{
  $strLen = strlen ($str);
  return substr ($str, $strLen - $howManyCharsFromRight, $strLen);
}

/**
* get the X characters of the middle of a string
*
* @param string $str
* @param string $start
* @param string $howManyCharsToRetrieve
* @author unknown, from http://php3.de/manual/de/ref.strings.php
* @lastedited not edited
*/
function mid (&$str, $start, $howManyCharsToRetrieve = 0)
{
  $start--;
  if ($howManyCharsToRetrieve === 0)
   $howManyCharsToRetrieve = strlen ($str) - $start;

  return substr ($str, $start, $howManyCharsToRetrieve);  //ON changed due to sf msg_id=2870246
}
?>
