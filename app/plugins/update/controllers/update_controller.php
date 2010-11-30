<?php
class UpdateController extends UpdateAppController {
	
	function check () {
				
		$this->set('status', $this->_check());
	}
	
	function run () {
		
		$url = $this->_check();
		
		if(!$url) die();
		
		set_time_limit(0);
		
		$settings = file_get_contents(CONFIGS.'settings.ini.php');
		
		$this->_clean(APP);
		
		$this->_download($url, APP.'Update.zip');
		
		$zip = new ZipArchive();
		
		$zip->open(APP.'Update.zip');
		$zip->extractTo(APP);
		$zip->close();
		
		unlink(APP.'Update.zip');
		
		file_put_contents(CONFIGS.'settings.ini.php', $settings);
		
		die();
	}
	
	function _download ($url, $path) {

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
	
	function _clean($path,$recursive=true,$delDirs=false,$delRoot=null)
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
	
	
	function _check() {
		
		$version = file_get_contents(CONFIGS.'version.txt');
		
		$query = http_build_query(array(
			'version' => $version
		));
		
		$status = file_get_contents(Configure::read('Configuration.Update').$query);
		
		$status = trim($status);
		
		if ($status == 'no') {
			return false;
		}
		else {
			return $status;
		}
	}
}