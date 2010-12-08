<?php
class UpdateAppController extends AppController {
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny('*');
	}
}