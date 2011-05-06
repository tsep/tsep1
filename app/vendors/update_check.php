<?php

function update_check() {
    
    $check_for_updates = !Cache::read('CheckForUpdates', 'long');
    
    if($check_for_updates) {
    
        $update = Configure::read('UpdateURL');
        
        $version = file_get_contents(CONFIGS.'version.txt');
        
        $query = http_build_query(array(
            'version' => $version
        ));
        
        $result = file_get_contents($update.$query);
        
        if (trim($result == 'no')) {
            
            Cache::write('CheckForUpdates', true, 'long');
            
            return false;
        }
        else {
            
            Cache:write('CheckForUpdates', false);
            
            return $result;
        }
    
    }
    else {
        return false;
    }
    
}