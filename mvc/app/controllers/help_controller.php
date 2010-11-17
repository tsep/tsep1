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
		
			$this->set('log', file_get_contents(LOGS.'error.log'));
		
		}
		
		/**
		 * admin_submit
		 * submit log to The Search Engine Project
		 */
		function admin_submit () {
		
		
		}
		
		/**
		 * index
		 * The function where users get help
		 */
		function index () {
		
			
		
		} 
	}