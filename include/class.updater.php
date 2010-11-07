<?php

require_once __DIR__.'/global.php';


/** Update TSEP
 * @access public
 * @return Updater
 * 
 * */
class Updater {
	public $oldVersion;
	public $updateAvaliable = false;
	
	private $fileUrl;	
	private $dbData;
	
		
	/** Delete all files in directory
* @param $path directory to clean
* @param $recursive delete files in subdirs
* @param $delDirs delete subdirs
* @param $delRoot delete root directory
* @access public
* @return success
*/
    private function cleanDir($path,$recursive=true,$delDirs=false,$delRoot=null)
	{
	    $result=true;
	    if($delRoot===null) 
	       $delRoot=$delDirs;
	    if(!$dir=@dir($path))
	        return false;
	    while($file=$dir->read())
	    {
	    if($file==='.' || $file==='..') 
	       continue;
	    
	    $full=$dir->path.DIRECTORY_SEPARATOR.$file;
	    
	    if(is_dir($full) && $recursive)
	    {
	       $result&=cleanDir($full,$recursive,$delDirs,$delDirs);
	    }else if(is_file($full))
	    {
	       $result&=unlink($full);
	    }
	    }
	    
	    $dir->close();
	    
	    if($delRoot)
	    {
	       $result&=rmdir($dir->path);
	    }
	    return $result;
	}

	private function downloadFile ($url, $path) {

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
		

	
	function __construct() {
		
		$TSEPversion = file_get_contents(TSEP_INCLUDE_DIR.'/tsepversion.txt');
		$this->oldVersion = $TSEPversion;
		
		error_reporting(0);
	   try {
			 
			$params = array(
			
				"version" => $this->oldVersion
			
			);
			
			$qstr = http_build_query($params);
			
			$str = file_get_contents(TSEP_UPDATE_URL.$qstr);
			
			if($str == "no")
				return;
			
			$this->fileUrl = $str;
			$this->updateAvaliable = true;
			
	   }
	   catch (Exception $ex) {
	
	
        }
        error_reporting(E_ALL);
    }
    
    
    /** Update The Web App 
     * @throws Exception 
     * @return true true on success, false on failure
     * */
    function update() {
    	
    	$this->dbData = file_get_contents(TSEP_INCLUDE_DIR.'/conf.db.ini.php');
    	
    	if (!$this->updateAvaliable){
    		errorHandler::throwError("Call to method update when no update is avaliable", errorHandler::WARN);
    		return false;   		
    	}
    	
    	error_reporting(0);
    	try {
    		$this->cleanDir(TSEP_ROOT_DIR);
    		$this->downloadFile($this->fileUrl, TSEP_ROOT_DIR.'/Update.zip');
    	} catch (Exception $e) {
    		errorHandler::throwError("Error occurred while downloading file", errorHandler::WARN);
    		return false;
    	}
    	try {
                		
    		$zip = new ZipArchive();
    		$zip->open(TSEP_ROOT_DIR.'/Update.zip');
    		$zip->extractTo(TSEP_ROOT_DIR.'/');
    		$zip->close();
    		unlink(TSEP_ROOT_DIR.'/Update.zip');
    		
    		file_put_contents(TSEP_INCLUDE_DIR.'/conf.db.ini.php', $this->dbData);
            $this->upgrade();
    		
    	} catch (Exception $e) {
    		return false;
    	}
    	error_reporting(E_ALL);
    	
    	
    	return true;
    }
    private function upgrade () {
    	
    	include TSEP_INCLUDE_DIR.'/upgrade.php';
        unlink(TSEP_INCLUDE_DIR.'/upgrade.php');
    }
}


?>