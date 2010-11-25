<?php
/**
* This is a ready-to-run example-script, which "delivers" filenames to tsep.sf.net (to be indexed by TSEP)
*
* The script simply sends filenames (hardcoded implemented here).
*
* See it as "return a manually maintained filelist to tsep".
*
* note: this script is not intended to run standalone.
*       It's intended to be launched from within TSEP-Indexer (see TSEP-docu for more information)
*
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/


call_user_func("TSEP_ExternalCallBack", "URL>http://www.mydomain.com/pages/detailpage1.html");
call_user_func("TSEP_ExternalCallBack", "URL>http://www.mydomain.com/pages/detailpage2.html");
call_user_func("TSEP_ExternalCallBack", "URL>http://www.mydomain.com/pages/detailpage3.html");
call_user_func("TSEP_ExternalCallBack", "URL>http://www.mydomain.com/pages/detailpage4.html");
call_user_func("TSEP_ExternalCallBack", "URL>http://www.mydomain.com/pages/detailpage5.html");

?>
