<?php
/**
* This is a ready-to-run example-script, which "delivers" filenames AND content to tsep.sf.net (to be indexed by TSEP)
*
* The script is intended to give an idea, how content can be delivered to the TSEP-indexer.
* It's an equivalent to the urllist.php example script, but here, the file-content is provided directly from within this script.
*
* example 1 - uses text hardcoded written into this script as content for "test.txt"
* example 2 - reads a file,  removes < and > and uses this as content for "ItsMe.txt"
* example 3 - runs an EXTERNAL program and uses the output as content for "DirList.txt"
*
* note: this script is NOT intended to run standalone.
*       It's intended to be launched from within TSEP-Indexer (see TSEP-docu for more information)(same way to launch as phpcrawl4tsep.php)
*
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/


// example 1 - uses text hardcoded written into this script as content for "test.txt"

call_user_func("TSEP_ExternalCallBack", "ALL>http://www.mydomain.com/test.txt<TSEPCONTENT>any content for testing purposes");


// example 2 - reads a file,  removes < and > and uses this as content for "ItsMe.txt"

$str = join("", file("examples/fillwithcontent.php") );
$str = preg_replace("/[<>]/","", $str);
call_user_func("TSEP_ExternalCallBack", "ALL>http://www.mydomain.com/ItsMe.txt<TSEPCONTENT>Its me: " . $str);


// example 3 - runs an EXTERNAL program and uses the output as content for "DirList.txt"

if ( preg_match("/^windows/i", $_SERVER["OS"]) == true ) {
   $list = exec("dir"); // windows
} else {
   $list = exec("ls");  // assume unix
}
call_user_func("TSEP_ExternalCallBack", "ALL>http://www.mydomain.com/DirList.txt<TSEPCONTENT>DirList: " . $list);

?>
