<?php
/**
* Writes a Config file
* 
* @author Geoffrey
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: $
*  $LastChangedBy:  $
*  $LastChangedRevision: $
*
*/

/**
 * Write a config file that can be loaded using Configure::load()
 * @param string $file The file to write
 * @param array $options The Configuration
 */
function write_config_file ($file, array $options) {
	$code = "<?php \n ";
	$code .= '$config = '.var_export($options, true).';';
	file_put_contents($file, $code);
}