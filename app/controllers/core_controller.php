<?php
/**
 * Core Controller - Misc functions essetial to the operation of the application
 */

/**
 * Core Controller - Misc.
 * @author Xaav
 *
 */
class CoreController extends AppController {

    var $uses = array();

    /**
     * Configuration Options
     */
    function admin_setting () {

        if(@$this->data)
        {
            Configure::write($this->data['Setting']['key'], $this->data['Setting']['value']);

            $this->saveConfiguration();

            $this->Session->setFlash(__('Configuration Updated', true), 'flash_success');

            $this->redirect(array('controller' => 'core', 'action' => 'setting', 'admin' => true), null, true);
        }
        else
        {
            $config = (array)Configure::getInstance();

            $this->set(array(
            	'config' => $config,
            ));
        }

    }


    /**
     * Process all jobs in the Queue
     */
    function admin_batch() {

        //TODO: Cleanup

        if($this->RequestHandler->isAjax()) {

            //Process the jobs

            $this->layout = 'ajax';

            if($this->Queue->isJob()) {

                $job = $this->Queue->getJob();

                App::import('Vendor', $job['function_name']);

                array_push($job['params'], $this);

                $return = call_user_func_array($job['function_name'], $job['params']);

                if (!$return) {

                    $this->Session->setFlash(__('The selected operation failed', true), 'flash_fail');

                    $this->log('Batch operation failed. See debug log for details');
                    Debugger::log($job);

                    $this->set('done', true);

                    return;
                }
            }

            $this->set('done', !$this->Queue->isJob());
        }
    }

    /**
     * Submit log, get help, etc
     */
    function admin_troubleshoot () {

        App::import('Vendor', 'get_log_contents');

        $log = get_log_contents();

        $this->set(compact('log'));

        if (!empty($this->data)) {

            if(!empty($this->data['ClearLogForm'])) {

                if ($handle = opendir(LOGS)) {
                    while (false !== ($file = readdir($handle))) {
                        if ($file != "." && $file != "..") {
                            file_put_contents(LOGS.$file, '');
                        }
                    }
                    closedir($handle);
                }

                $this->redirect('/admin/core/troubleshoot', null, true);
            }

            if(!empty($this->data['SubmitLogForm'])) {

                $this->Queue->addJob('log_submit');

                $this->processQueue('admin/core/troubleshoot');
            }

        }
    }

    // Displays status of installation
    function admin_index () {

        $statuses = array();

        $statuses[] = array(
            'message' => 'PHP Version',
            'result'  => PHP_VERSION
        );

        $statuses[] = array(
            'message' => 'TSEP Version',
            'result' => file_get_contents(CONFIGS.'version.txt')
        );

        $statuses[] = array(
            'message' => 'Loaded Apache Modules',
            'result' => '<ul><li>'.implode('</li><li>', apache_get_modules()).'</li></ul>'
        );

        $this->set(array(
            'statuses' => $statuses,
        ));
    }

}