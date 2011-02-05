<?php
/**
* Downloads a file from a remote server to the specified path
* 
* @author Geoffrey
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  $LastChangedBy$
*  $LastChangedRevision$
*
*/
function download_file ($url, $path) {
		
	$newfname = $path;
	$file = fopen ($url, "rb");
	if ($file) {
	  $newf = fopen ($newfname, "wb");
	
	  if ($newf)
	  while(!feof($file)) {
	    fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
	  }
	}
	
	if ($file) {
	  fclose($file);
	}
	
	if ($newf) {
	  fclose($newf);
	}
}