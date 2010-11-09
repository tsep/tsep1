<?php
/**
* There are functions from Dreamweaver to prepare SQL strings ..
*
* @param string $username
* @param string $password
* @tables users, permissions
* @author Dreamweaver
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/



/**
* make correct entries for the SQL string before running a query
*
* @param string $theValue
* @param string $theType
* @param string $theDefinedValue
* @param string $theNotDefinedValue
* @author Dreamweaver
* @lastedited not edited
*/
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

/**
* this seems not to be needed anymore!
*
* @author Dreamweaver
* @lastedited not edited
*/
function addQueryString($editFormAction)
{
//	$editFormAction = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])) {
	  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	  return $editFormAction;
	}
	
}

?>
