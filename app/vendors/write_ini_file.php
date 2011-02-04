<?php
/**
* INI File writer
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
 * Write an array to an INI file
 * 
 * @param string $file The file to write to
 * @param array $options The data to write
 */
 function write_ini_file($file, array $options){
		    $tmp = ";<?php die()?>\n";
		    foreach($options as $section => $values){
		        $tmp .= "[$section]\n";
		        foreach($values as $key => $val){
		            if(is_array($val)){
		                foreach($val as $k =>$v){
		                    $tmp .= "{$key}[$k] = \"$v\"\n";
		                }
		            }
		            else
		                $tmp .= "$key = \"$val\"\n";
		        }
		        $tmp .= "\n";
		    }
		    file_put_contents($file, $tmp);
		    unset($tmp);
	}