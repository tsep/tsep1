<?php
class UpdateController extends UpdateAppController {
	
	var $uses = array();
	
	function beforeFilter () {
		parent::beforeFilter();
		
		$this->layout = 'ajax';
		
		if (!$this->RequestHandler->isAjax()) $this->cakeError('error404');
	}
	
	function check () {
		
		$this->set('status', $this->_check());
	}
	
	function run () {
		
		if(@$this->params['url']['do'] == 'yes') $this->_run();
	}
	
	function _run () {
		
		$url = $this->_check();
		
		if (!$url) die();
		
		@set_time_limit(0); //TODO: Fix this not to use set_time_limit()
		
		$root = APP.'..'.DS;
		
		$settings = file_get_contents(CONFIGS.'settings.ini.php');
		
		$this->_clean($root);
		
		$this->_download($url, $root.'Update.zip');
		
		$zip = new ZipArchive();
		
		$zip->open($root.'Update.zip');
		$zip->extractTo($root);
		$zip->close();
		
		unlink($root.'Update.zip');
		
		App::import('Vendor', 'upgrade');

		upgrade($settings);
	}
	
	function _check () {
		
		$update = Configure::read('Configuration.Update');
		
		$version = file_get_contents(CONFIGS.'version.txt');
		
		$query = http_build_query(array(
			'version' => $version
		));
		
		$result = file_get_contents($update.$query);
		
		if (trim($result == 'no')) {
			return false;
		}
		else {
			return $result;
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
	       $result&=$this->_clean($full,$recursive,$delDirs,$delDirs);
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

	function _download($url, $path) {

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
	
}