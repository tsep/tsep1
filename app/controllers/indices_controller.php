<?php
	/**
	* The heart of TSEP: manages indexes, stopwords, ect.
	* 
	* @author Geoffrey
	*
	* The following will be filled automatically by SubVersion!
	* Do not change by hand!
	*  $LastChangedDate$
	*  $LastChangedBy$
	*  $LastChangedRevision$
	*
	*/

	//TODO:Centralize all queue functions into one function
	class IndicesController extends AppController {
	
		var $name = 'Indices';
		var $uses = array(
			'Index', 
			'Stopword', 
			'Profile',
			'Search'
		);

				
		
		
		function search ($profile = null, $page = null) {
			
			$this->set('title_for_layout', 'Search Results');
			
			//Don't care if the query is empty
			$query = @$this->params['url']['q'];
			
			
			
			if(!empty($query)) {
				
				$this->Profile->Search->add($query);
				
				$this->paginate = array(
					'conditions' => array(
						'MATCH(Index.text) AGAINST(? IN BOOLEAN MODE)' => array($query)
					),
					'limit' => 10,
				);
				
				$matches = $this->paginate('Index');
				
				unset($this->params['url']['url']);
				
				//Truncate the results
				
				foreach ($matches as $key => $match) {
				
					$matches[$key]['Index']['text'] = substr($match['Index']['text'], 0, 255);
				}
				
				$this->set('matches', $matches);
			}
			else {
				$this->set('matches', array());
			}
		}
		
		/**
		 * Processes the indexing queue 
		 */
		function run () {
			
			$this->log('Begin Run');
			
			ob_start();

			App::import('Component', 'Indexer');
			
			$this->Indexer = new IndexerComponent();
			
			$this->Indexer->initialize($this);
			
			$auth = $this->Indexer->processRequest($this->params['url']['auth']);
			
			if($auth) { 
			
				start_script(
						Router::url(
							array(
								'controller' => 'indices',
								'action' => 'run',
								'admin' => false, 
								'?' => array(
									'auth' => $auth
								)
							),
							true
						)
				);
			}
						
			die();
		}
			
		function admin_start ($id = null) {
					
			if (!empty($id)){
				
				$queue = $this->getQueue();

				$queue->addJob($id);
				
				App::import('Vendor', 'start_script');
				
				file_put_contents(TMP.'auth.tmp', '');
				
				start_script(Router::url(array('controller' => 'indices', 'action' => 'run', 'admin' => false)));
			} 
			
			$this->redirect(array('controller'=>'profiles', 'action' => 'index'), null, true);
			
		}
		
		/**
		 * List all of the indices
		 */
		function admin_index() {
		
		}
		
		/**
		 * View an index
		 */
		function admin_view () {
		
		}
	}