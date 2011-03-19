<?php

/**
 * Submits the logs
 */
function log_submit ($controller) {
	
	App::import('Vendor','do_post_request');
	App::import('Vendor', 'current_page_url');
	App::import('Vendor', 'get_log_contents');
		
	$data = http_build_query(array(
	
		"Log" => get_log_contents(),
		"URL" => current_page_url()
	
	));
	
	$ticket_id = do_post_request("http://tsep.sourceforge.net/logs/postLog.php", $data);
	
	$controller->Session->setFlash('Log submitted; ticket ID:'. $ticket_id, 'flash_success');
	
	return true;
}