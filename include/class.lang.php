<?php
  
require_once __DIR__.'/global.php';

/**
  @package The Search Engine Project 
 * @version 1.0
 * @copyright (C) 2005 by TSEP Development Team
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @since TSEP 0942
 * @author Toon Goedhart
 *
 * following will be filled automatically by SubVersion!
 * Do not change by hand!
 *  $LastChangedDate: 2005-06-11 18:55:44 +0200 (Sa, 11 Jun 2005) $
 *  @lastedited $LastChangedBy: toon $
 *  $LastChangedRevision: 134 $
 *
*/



/** 
 * Manages the Language Framework
 **/
class lang {
	
	private static $lng;
	
	/**
	 * 
	 * Initializes the Language Framework
	 * @access public
	 * 
	 */
	static function load () {
		
		self::loadLanguage();
		self::cleanLanguageStrings();
	}
	
	/**
	 * 
	 * Gets a language string
	 * @param string $string
	 */
	static function get($string) {
		
		global $tsep_lng;
		return $tsep_lng[$string];
	}
	
	private static  function loadLanguage () {
		
		global $tsep_lng, $tsep_config;
		/* read language strings */
	    /* include for security - if admin enters something that does not exist */
	    /* always read english language as some (new) strings might not have been translated */
	    include( TSEP_ROOT_DIR."/language/en_US/language.php" );
	    /* code recycle: get language strings from fitting language.php */
	    include( TSEP_ROOT_DIR."/language/".$tsep_config['Language']."/language.php" );
		
	}
	
	/**
	 * Deletes CR/LF characters from all language strings
	 * to avoid conflicts with JavaScript code.
	 * 
	 * @access public
	 * @return void 
	 **/
	private static  function cleanLanguageStrings() {
		global $tsep_lng;
		
		while ( list( $key, $val ) = each( $tsep_lng ) ) {
			$val = str_replace( "\r\n", "", $val );
			$val = str_replace( "\n\r", "", $val );
			$val = str_replace( "\r", "", $val );
			$val = str_replace( "\n", "", $val );
			$tsep_lng[$key] = $val;
		} // while		
	}
}



?>
