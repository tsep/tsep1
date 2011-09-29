<?php
/**
* Searches and Creates indexing profiles
*
* @author Xaavfishing
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  $LastChangedBy$
*  $LastChangedRevision$
*
*/
class ProfilesController extends AppController {

    var $name = 'Profiles';
    var $uses = array('Profile');

    function beforeFilter() {
        parent::beforeFilter();

        $this->Security->requireAuth();
    }

    /**
     * admin_index
     * The Home Admin Page
     */
    function admin_index () {

        $this->set('profiles', $this->Profile->find('all'));
        $this->set('title','ACP Home');

    }

    /**
     * admin_edit
     * Edit an Indexing Profile's properties
     * @param mixed $id
     */
    function admin_edit($id = null){

                if (!empty($this->data)) {
                    if($this->Profile->save($this->data)) {
                        $this->Session->setFlash('Modifications to the Indexing Profile were saved', 'flash_success');
                        $this->redirect(array('controller'=>'profiles', 'action' =>'index','admin' =>true), null, true);
                    }
                    else {
                        $this->log('Failure to save indexing profile: $this->Profile->save()');

                        $this->Session->setFlash('Failed to save indexing profile', 'flash_fail');
                        $this->redirect(array('controller'=>'profiles', 'action' =>'index','admin' =>true), null, true);
                    }
                }
        else {

            if(empty($id)) {
                $this->Session->setFlash('No Profile Specified', 'flash_fail');
                $this->redirect(array('controller' => 'profiles', 'action' => 'index'), null, true);
            }

            $profile = $this->Profile->findById($id);

            if(empty($profile)) {
                $this->Session->setFlash('Invalid Profile Specified', 'flash_fail');
                $this->redirect(array('controller' => 'profiles', 'action' => 'index'), null, true);
            }

            $this->set('profile',$profile);

        }
    }

    /**
     * admin_delete
     * Deletes an indexing profile AND all associated data
     * @param unknown_type $id
     */
    function admin_delete ($id = null) {

        if(!$id) {
            $this->Session->setFlash(__('Profile was not deleted because a valid id was not supplied.', true), 'flash_fail');
            $this->redirect(array('controller'=>'profiles', 'action' =>'index', 'admin' =>true), null, true);
        }

        if(!$this->Profile->delete($id)) {

            $this->log('Failed to remove profile. This is a fatal error.');
            Debugger::log($id);

            $this->Session->setFlash(__('Failed to delete profile', true), 'flash_fail');
            $this->redirect(array('controller' => 'profiles', 'action' => 'index'), null, true);
        }


        $this->Session->setFlash(__('The selected profile has been deleted', true), 'flash_success');
        $this->redirect(array('controller'=>'profiles', 'action' =>'index', 'admin' =>true), null, true);

    }

    function admin_view($id = null)
    {
        if ($id == null)
        {
            $this->Session->setFlash('Their was no profile specified to view', 'flash_fail');
            $this->redirect(array('controller'=>'profiles', 'action' =>'index'),null, true);
        }

        $profile = $this->Profile->findById($id);

        if($profile)
        {
            $this->set('profile', $profile);
        }
        else
        {
            $this->log('Empty profile supplied while trying to view the profile');

            $this->Session->setFlash(__('The profile that you selected to view does not exist', true), 'flash_fail');
            $this->redirect(array('controller'=>'profiles', 'action' =>'index'),null, true);
        }
    }

    /**
     * Creates a new Indexing Profile (DOES NOT START INDEXER)
     */
    function admin_create () {

            if ($this->data) {
                $this->Profile->save($this->data);
                $this->Session->setFlash(__('Indexing Profile Created', true), 'flash_success');
                $this->redirect(array('controller'=>'profiles', 'action' =>'index','admin' =>true), null, true);
            }
    }

    /**
     * Javascript Regular expression generator
     */
    function admin_regex() {

        $this->layout = 'ajax';
    }

}