<?php

function get_log_contents () {
    
    $log = '';
    
    if ($handle = opendir(LOGS)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                $log .= file_get_contents(LOGS.$file);
            }
        }
        closedir($handle);
    }
    
    return $log;
}