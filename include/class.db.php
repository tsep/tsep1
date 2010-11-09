<?php
/** class.db.php
 *  
 *  Initializes all functions associated with the Database
 * 
 * */

require_once __DIR__.'/global.php';   

class db {
	
	public static $isConnected = FALSE;
	public static $server = null;
	public static $username = null;
	public static $password = null;
	public static $name = null;
	public static $prefix = null;
	
	private static $dbConnection;
	
	private static function setValues ($server, $usrname, $pwd, $name, $prefix) {
		
		if (!empty($server))
			self::$server = $server;
		if (!empty($usrname))
			self::$username = $usrname;
		if (!empty($pwd))
			self::$password = $pwd;
		if (!empty($name))
			self::$name = $name;
		if (!empty($prefix))
			self::$prefix = $prefix;
	}
	
	private static function write_ini_file(array $options){
	    $tmp = '';
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
	    return $tmp;
	}
	
	/**
	 * 
	 * Returns a string representation of the current db settings
	 */
	static function saveDBfile () {
		
		$info = array();
		/* URL to your database server */
		    $info['db_server'] = self::$server;
		/* Your database login name */
		    $info['db_usrname'] = self::$username;
		/* Your database password */
		    $info['db_pwd'] = self::$password;
		/* TSEP database name */
		    $info['db_name'] = self::$name;
		/* TSEP table prefix */
		    $info['db_table_prefix'] = self::$prefix;
		    		    
		    $tmp = ";<?php die()?>\n";
		    $tmp .= self::write_ini_file(array("db" => $info));
		    
		    return $tmp;
	}
	/**
	 * 
	 * Loads a string representation of the db settings generated by saveDBfile()
	 * @param string $contents The string generated by saveDBfile()
	 */
	static function loadDBfile ($contents) {
		
		try {   
		    $info = parse_ini_string($contents); 
		}
		catch (Exception $e) {
			errorHandler::throwError("Database data is corrupt:".$e->getMessage(), errorHandler::FATAL);	
		}
				
		     
		/* URL to your database server */
		    $server = $info['db_server'];
		/* Your database login name */
		    $usrname = $info['db_usrname'];
		/* Your database password */
		    $pwd = $info['db_pwd'];
		/* TSEP database name */
		    $name = $info['db_name'];
		/* TSEP table prefix */
		    $prefix = $info['db_table_prefix'];
		    
		   self::setValues($server, $usrname, $pwd, $name, $prefix);

		   define('UNIQUE_PREFIX', $info['fileprefix']);
		   
		   
	}
	
	/**
	 * 
	 * Attempts to connect to the Database and returns false on failure
	 * @param string $server The Database server
	 * @param string $usrname The Database username
	 * @param string $pwd The Database password
	 * @param string $name The Database name
	 * @param string $prefix The table prefix
	 */
	
	static function test ($server ,$usrname, $pwd, $name, $prefix) {
		

			    if ( !@mysql_pconnect( $server, $usrname, $pwd ) ) {
			
				    	errorHandler::throwError(mysql_error(), errorHandler::INFO);
			    		return false;
			    }
			    if ( !@mysql_select_db( $name ) ) {
			        
			    	errorHandler::throwError(mysql_error(), errorHandler::INFO);
			    	return false;
			    }


			self::setValues($server, $usrname, $pwd, $name, $prefix);		    
		    self::$isConnected = true;
		    
		        
		return true;
	}
	
	/**
	 * 
	 * Attempts to connect to the Database and throws a fatal exception on failure
	 * @param string $server The Database server
	 * @param string $usrname The Database username
	 * @param string $pwd The Database password
	 * @param string $name The Database name
	 * @param string $prefix The table prefix
	 */
	static function connect($server = NULL, $usrname = NULL, $pwd = NULL, $name = NULL, $prefix = NULL) {
			
					
		    self::setValues($server, $usrname, $pwd, $name, $prefix);
		  
		    /* Get the TSEP root folder */ 
		    try {
			    if ( !@mysql_pconnect( self::$server, self::$username, self::$password ) ) {
			
				    	errorHandler::throwError(mysql_error(), errorHandler::FATAL);
			    	
			    }
			    if ( !@mysql_select_db( self::$name ) ) {
			        
			    	errorHandler::throwError(mysql_error(), errorHandler::FATAL);
			    	
			    }
		    }
		    catch (Exception $e) {
		    	
		    	errorHandler::throwError($e->getMessage(), errorHandler::FATAL);
		    }
		    
		    self::$isConnected = true;
		    
		    /* general config data */
		    require_once TSEP_INCLUDE_DIR.'/class.configuration.php';
		
		    //Load the Language Framework
		    require_once( TSEP_INCLUDE_DIR."/class.lang.php" );
		    //Initialize the Language Framework
		    lang::load();
		    

	} 
}
	?>