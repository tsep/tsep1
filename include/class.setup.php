<?php 
require_once __DIR__.'/global.php';

define("SETUP_INCLUDE_DIR", TSEP_ROOT_DIR.'/admin/setup');

class SetupInstaller {
	
	public static $language;
	public static $step;
	public static $error;

	static function init () {
		
		if (($_GET['Step'] == NULL)||($_GET['Step']!="next")){
		    $_SESSION = array();  
		    self::$step = 0;
		}  
		else {
			self::$step = $_SESSION['Step'];
			if ($_GET['Step']=="next")
			    self::$step++;  
		}
		
		if ($_SESSION['Language']!= null) 			
			self::$language = $_SESSION['Language'];
		if ($_GET['Language']!= NULL)
			self::$language = $_GET['Language'];
		if (self::$language == null)
			self::$language = "en";
		
	}
	
	static function end () {
		
		$_SESSION['Language'] 	= self::$language;
		$_SESSION['Step']		= self::$step;
	}
	
	static function dispStep ($stepFile) {
		
		include SETUP_INCLUDE_DIR."/$stepFile.php";
		
	}
		
	/**
	 * 
	 * A function to execute an SQL file with parameters
	 * @param string $file
	 * @param array $params
	 * @param string $delimiter
	 * 
	 * @link http://stackoverflow.com/questions/1883079/
	 */
	
	public static function SplitSQL($file, $params = array(), $delimiter = ';')
	{
	    set_time_limit(0);
	    
	    if (is_file($file) === true)
	    {
	        $file = fopen($file, 'r');
	
	        if (is_resource($file) === true)
	        {
	            $query = array();
	
	            while (feof($file) === false)
	            {
	                $query[] = fgets($file);
	                
		            foreach ($params as $param => $value) {
	            
	                    $query = preg_replace( "/%$param%/", $value , $query);
	                }
	
	                if (preg_match('~' . preg_quote($delimiter, '~') . '\s*$~iS', end($query)) === 1)
	                {
	                    $query = trim(implode('', $query));
	
	                    if (mysql_query($query) === false)
	                    {
	                        echo '<h3>ERROR: ' . $query . '</h3>' . "\n";
	                        echo '<h3>ERROR: ' . mysql_error() . '</h3>' . "\n";
	                    }
	
	                    else
	                    {
	                        echo '<h3>SUCCESS: ' . $query . '</h3>' . "\n";
	                    }
	
	                    while (ob_get_level() > 0)
	                    {
	                        ob_end_flush();
	                    }
	
	                    flush();
	                }
	
	                if (is_string($query) === true)
	                {
	                    $query = array();
	                }
	            }
	
	            return fclose($file);
	        }
	    }
	
	    return true;
	}
	
}





?>