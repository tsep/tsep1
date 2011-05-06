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

    class IndicesController extends AppController {

        var $name = 'Indices';

        var $uses = array('Index');

        var $components = array('Indexer');


        /**
         * @var IndexerComponent
         */
        var $Indexer;

        /**
         * @var Index
         */
        var $Index;

        function _start($auth_key) {

            App::import('Vendor', 'start_script');

            start_script(
                Router::url(
                    array(
                        'controller' => 'indices',
                        'action' => 'run',
                        'admin' => false,
                        '?' => array(
                            'auth' => $auth_key
                        )
                    ),
                    true
                )
            );
        }

        function search ($profile = null, $page = null) {

            $this->set('title_for_layout', 'Search Results');

            //Don't care if the query is empty
            $query = @$this->params['url']['q'];

            if(!empty($query)) {

                $this->Index->Profile->Search->add($query);

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

            $this->log('Run action called.');

            ob_start();


            $auth = $this->Indexer->processRequest($this->params['url']['auth']);

            if($auth) {

                $this->_start($auth);
            }

            die();
        }

        function admin_start ($id = null) {

            if (!empty($id)){

                $auth = $this->Indexer->submitRequest($id);

                $this->_start($auth);
            }

            $this->redirect(array('controller'=>'profiles', 'action' => 'index'), null, true);

        }

        /**
         * List all of the indices
         */
        function admin_index() {

            $this->paginate = array(
                'limit' => 10
            );

            $this->set('indices', $this->paginate('Index'));

        }

        /**
         * View an index
         */
        function admin_view ($id) {

            $index = $this->Index->findById($id);

            $this->set(compact('index'));
        }
    }