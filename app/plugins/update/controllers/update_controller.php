<?php
class UpdateController extends UpdateAppController {
	
	var $uses = array();
	
	function beforeFilter () {
		parent::beforeFilter();
		
		$this->layout = 'update';
		
		if ($this->RequestHandler->isAjax()) $this->layout = 'ajax';
		
	}
	
	function check () {
		
		$url = $this->_check();
		
		if($url) {
		
			$this->set('status', $url);
			
			$this->Session->write('Update.url', $url);
		}
		else {
			
			$this->Session->write('Update.url', false);
			
			$this->set('status', false);
			
		}
	}
	
	function run () {
		
		if($this->RequestHandler->isAjax()) {

			$this->layout = 'ajax';
			
			switch (@$this->params['url']['do']) {

				case 'download':
			 		$this->_download();
			 		break;
				case 'extract' :
			 		$this->_extract();
			 		break;
				case 'upgrade' :
			 		$this->_upgrade();
			 		break;
				default:
					break;
			}
		}
	}
	
	function _upgrade () {
		
		App::import('Vendor', 'upgrade');
		upgrade();	
	}
	
	function _extract () {
		
		$root = APP.'..'.DS;
		
		
		if(file_exists($root.'Update.zip')) {
		
			$zip = new ZipArchive();
			
			$zip->open($root.'Update.zip');
			$zip->extractTo($root);
			$zip->close();
			
			unlink($root.'Update.zip'); 
			
			return true;
		
		}
		else {
		
			$this->log('Attempt to extract archive failed.');
			
			return false;
		}
		
	}
	
	function _download () {
				
		$url = @$this->Session->read('Update.url');
		
		$root = APP.'..'.DS;
		
		if ($url) {
			
			App::import('Vendor', 'download_file');
									
			download_file($url, $root.'Update.zip');
			
			return true;
		
		}
		else {
		
			$this->log('Attempt to download update failed (ISSUE #3)');
			
			return false;
		}
		
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
	
}