<?php
/**
* Controls help requests and related issues
* 
* @author geoffreyfishing
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: $
*  $LastChangedBy:  $
*  $LastChangedRevision: $
*
*/
	class HelpController extends AppController {
		
		
		/**
		 * 
		 * This controller does not use any models
		 * @var array
		 */
		var $uses = array();
	
		/**
		 * admin_index
		 * The function where the admin gets help
		 */
		function admin_index () {
		
			$this->set('log', file_get_contents(LOGS.'error.log')."\n".file_get_contents(LOGS.'debug.log'));
		
		}
		
		/**
		 * admin_submit
		 * submit log to The Search Engine Project
		 */
		function admin_submit () {
			
			App::import('Vendor','post_to_url');
			App::import('Vendor', 'current_url');
			
			$contents = file_get_contents(LOGS.'error.log');
			
			$data = http_build_query(array(
			
				"Log" => $contents,
				"URL" => current_page_url()
			
			));
			
			try {
				$return = do_post_request("http://tsep.sourceforge.net/postLog.php", $data);
				$this->Session->setFlash('The Log has been submitted. You may find the support ticket'. $this->Html->link('here', $return), 'flash_success');
			}
			catch (Exception $e) {
				$this->log('Problem occurred while submitting the error log.');
				$this->log($e->getMessage());
				$this->log($e->getTraceAsString());
				$this->Session->setFlash('An error occurred while submitting the log. For details, check the error log.', 'flash_fail');
			}
			$this->redirect(array('controller'=>'help', 'action'=>'index'), null, true);
		
		}
		
		/**
		 * admin_clean
		 * Cleans the error Log
		 */
		function admin_clean () {
			
			file_put_contents(LOGS.'error.log', '');
			file_put_contents(LOGS.'debug.log', '');
			
			$this->Session->setFlash('The error log has been cleaned.', 'flash_success');
			
			$this->redirect(array('controller'=>'help', 'action'=>'index'), null, true);
		} 
		
		/**
		 * index
		 * The function where users get help
		 */
		function index () {
		
			
		
		} 
	}