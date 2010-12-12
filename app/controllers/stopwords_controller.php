<?php

	class StopwordsController extends AppController {
	
		var $name = 'Stopwords';
		
		function admin_add () {
			
			if(!empty($this->data)) {
				
				if($this->Stopword->save($this->data)) {
					$this->Session->setFlash('The Stopword has been added', 'flash_success');
					$this->redirect(array('controller' => 'stopwords', 'action' => 'index'), null, true);
				}
				else {
					$this->Session->setFlash('Failed to save the Stopword. Details may be found in the error log', 'flash_fail');
					$this->redirect(array('controller' => 'stopwords', 'action' => 'index'));
				}
			}
		}
		
		function admin_delete ($id = null) {
			
			if($this->Stopword->delete($id, false)) {
				
				$this->Session->setFlash('The Stopword was deleted', 'flash_success');
				$this->redirect(array('controller' => 'stopwords', 'action' => 'index'), null, true);	
			}
			else {
				
				$this->Session->setFlash('An error occured while deleting the stopword. Details may be found in the error log', 'flash_fail');
				$this->redirect(array('controller' => 'stopwords', 'action' => 'index'), null, true);
			}
		}
		
		function admin_index () {
			
			$this->paginate = array(
				'limit' => 10
			);
			
			$this->set('stopwords', $this->paginate('Stopword'));
		}
	}