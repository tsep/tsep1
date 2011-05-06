<?php

    class InstallController extends InstallAppController {

        var $name = 'Install';

        var $components = null;

        var $uses = null;

        function _check () {

            if(file_exists(CONFIGS.'settings.php') && !file_exists(TMP.'install.tmp')){
                $this->cakeError('error403');
            }
        }

        function _init () {

            App::import('Component', 'RequestHandler');
            $this->RequestHandler = new RequestHandlerComponent();

            App::import('Component', 'Session');
            $this->Session = new SessionComponent();

            App::import('Component', 'Security');
            $this->Security = new SecurityComponent();
        }

        function beforeFilter () {
            parent::beforeFilter();

            $this->_check();
            $this->_init();

            //$this->layout = 'install';
        }

        function _getLanguages() {

            $languages = array();

            if (!class_exists('I18n')) {
                App::import('Core', 'l10n');
            }

            $l10n = new L10n();

            $catalog = $l10n->__l10nCatalog;

            if ($handle = opendir(APP.'locale')) {
                while (false !== ($file = readdir($handle))) {
                    if ($file != "." && $file != ".." && $file != "default.pot") {
                        $language = $catalog[substr($file, 0, -3)];

                        $languages[$language['locale']] = $language['language'];
                    }
                }
                closedir($handle);
            }

            return $languages;
        }

        function _resetApplication () {

            Cache::clear();
            clearCache();

            @unlink(CONFIGS.'settings.php');

            fclose(fopen(TMP.'install.tmp', 'w'));

            Configure::write('Config.language', 'eng');
        }

        /**
         * Welcome the user
         */
        function index () {

            if(@$this->params['url']['language']) {

                    Configure::write('Config.language', $this->params['url']['language']);

                    $this->saveConfiguration();

                    $this->redirect(array('controller' => 'install', 'plugin' => 'install', 'action' => 'database'), null, true);

            }
            else
            {
                $this->_resetApplication();

                $this->set('title_for_layout', __('Welcome', true));

                $languages = $this->_getLanguages();

                $this->set('languages', $languages);
            }

        }

        /**
         * Connect to the database
         */
        function database () {

            $this->set('title_for_layout', __('Database Configuration', true));

            if(!empty($this->data)) {

                Configure::write('Database', $this->data['Database']);

                App::import('Model', 'ConnectionManager');

                ConnectionManager::create('install', Configure::read('Database'));
                $db = ConnectionManager::getDataSource('install');

                if ($db->isConnected()) {

                    $this->saveConfiguration();

                    $this->Session->setFlash(__('Connection to the database established.', true), 'flash_success');

                    $this->redirect(array('controller' => 'install', 'plugin' => 'install', 'action' => 'settings'), null, true);
                }
                else {
                    $this->Session->setFlash(__('Could not connect to database.', true), 'flash_fail');
                }

            }
        }

        /**
         * Enter the initial settings
         */
        function settings () {

            if(!empty($this->data)) {

                Configure::write('Install', $this->data['Install']);

                $this->saveConfiguration();

                $this->redirect(array('controller' => 'install', 'plugin' => 'install', 'action' => 'install'), null, true);
            }
        }

        /**
         * Perform the installation
         */
        function install () {

            $this->set('title_for_layout', __('Performing the Installation', true));

            if($this->RequestHandler->isAjax()) {

                    $this->layout = 'ajax';

                    App::import('Vendor', 'random_string');

                    Configure::write('Security.salt', random_string(20));
                    Configure::write('Security.cipherSeed', mt_rand());

                    App::import('Model', 'CakeSchema', false);
                    App::import('Model', 'ConnectionManager');


                    /**
                     * @var DboSource
                     */
                    $db = ConnectionManager::getDataSource('default');

                    $schema =& new CakeSchema(array('name'=>'app'));

                    $schema = $schema->load();

                    $drop   = $db->dropSchema($schema);
                    $create = $db->createSchema($schema);



                    $db->execute($drop);
                    $db->execute($create);



                    App::import('Component', 'Auth');
                    $this->Auth = new AuthComponent();


                    $this->loadModel('User');


                    $this->User->create();

                    $this->User->save(array(
                        'username' => Configure::read('Install.username'),
                        'password' => $this->Auth->password(Configure::read('Install.password'))

                    ));


                    Configure::delete('Install');

                    $this->saveConfiguration();


            }

        }

        /**
         * Thank the user for installing
         */
        function finish () {

            $this->set('title_for_layout', __('Thanks for installing', true));

            unlink(TMP.'install.tmp');
        }
    }