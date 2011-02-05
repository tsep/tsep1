<?php
/**
* List the directories in a given directory
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

/**
 * Get all directories in the specified directory
 * @param string $dirPath The directory to search in
 */
function list_dirs($dirPath) {
	
	$dirs = array();

	// open the specified directory and check if it's opened successfully 
	if ($handle = opendir($dirPath)) {
	
	   // keep reading the directory entries 'til the end 
	   while (false !== ($file = readdir($handle))) {
	
	      // just skip the reference to current and parent directory 
	      if ($file != "." && $file != "..") {
	         if (is_dir("$dirPath/$file")) {
	            // found a directory, do something with it? 
							array_push($dirs, "$dirPath/$file");
	         }
	      }
	   }
	
	   // ALWAYS remember to close what you opened 
	   closedir($handle);
	}
	
	return $dirs;
}