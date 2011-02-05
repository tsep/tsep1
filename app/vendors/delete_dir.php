<?php
/**
* Delete a directory.
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
 * PERMENANTLY delete a directory
 * @param string $dir The directory to delete
 * @copyright Copyright 2011 Helio Networks
 * @link http://www.heliohost.org/home/
 */
function delete_dir($dir) {
   // open the directory
   $dhandle = opendir($dir);
   if ($dhandle) {
      // loop through it
      while (false !== ($fname = readdir($dhandle))) {
         // if the element is a directory, and 
         // does not start with a '.' or '..'
         // we call delete_dir function recursively 
         // passing this element as a parameter
         if (is_dir( "{$dir}/{$fname}" )) {
            if (($fname != '.') && ($fname != '..')) {
               //echo "<u>Deleting Files in the Directory</u>: {$dir}/{$fname} <br />";
               delete_dir("$dir/$fname");

            }
         // chmod all directories and files correctly
         // the element is a file, so we delete it
         } else {
            chmod("$dir", intval(0755, 8));
            chmod("{$dir}/{$fname}", intval(0644, 8));
            unlink("{$dir}/{$fname}");
            //echo "Deleting File: {$dir}/{$fname} <br />";
         }
      }
      closedir($dhandle);
    }
   // now directory is empty, so we can use
   // the rmdir() function to delete it
   //echo "<u>Deleting Directory</u>: {$dir} <br />";
   rmdir($dir);
}