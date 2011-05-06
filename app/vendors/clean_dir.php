<?php
    function clean_dir($path,$recursive=true,$delDirs=false,$delRoot=null)
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
           $result&=clean_dir($full,$recursive,$delDirs,$delDirs);
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