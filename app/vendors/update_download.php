<?php
/**
 * Downloads the update
 */
function update_download() {
    
    App::import('Vendor', 'update_check');
    App::import('Vendor', 'download_file');
    
    $url = update_check();
    
    download_file($url, ROOT.DS.'update.zip');
        
    return true;
}