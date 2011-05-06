<?php

/**
 * Installs the update
 */
function update_install() {
    
    $zip = new ZipArchive();
    
    $zip->open(ROOT.DS.'update.zip');
    $zip->extractTo(ROOT);
    $zip->close();
    
    unlink(ROOT.DS.'update.zip');
}