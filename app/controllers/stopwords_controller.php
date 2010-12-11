<?php

	class StopwordsController extends AppController {
	
		var $name = 'Stopwords';
		
		function add () {
			
			if(!empty($this->data)) {
				
				if($this->Stopword->save($this->data)) {
					$this->Session->setFlash('The Stopword has been added', 'flash_success');
					$this->redirect(array('controller' => 'indices', 'action' => 'index'), null, true);
				}
				else {
					$this->Session->setFlash('Failed to save the Stopword. Details may be found in the error log', 'flash_fail');
					$this->redirect(array('controller' => 'indices', 'action' => 'index'));
				}
			}
		}
		
		function delete () {
			
		}
		
		function index () {
		
		}
	}