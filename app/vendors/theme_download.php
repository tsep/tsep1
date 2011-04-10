<?php

function theme_download ($theme_url) {
	
	if(file_exists(TMP.'theme.zip')) unlink(TMP.'theme.zip');
	
	App::import('Vendor', 'download_file');
				
	download_file($theme_url, TMP.'theme.zip');
	
	return true;
}