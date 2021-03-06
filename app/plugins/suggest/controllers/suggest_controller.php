<?php 
/**
* Searches Controller - Handles Search Suggestions
* 
* @author Xaav
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: $
*  $LastChangedBy:  $
*  $LastChangedRevision: $
*
*/

class SuggestController extends AppController {
    
    var $name = 'Suggest';
    var $uses = array('Search');
    
    function beforeFilter() {
        parent::beforeFilter();
        
        $this->layout = 'ajax';
    }
    
    function get() {
        
        $phrase = $this->params['url']['term'];
        
        $this->set('results', $this->Search->get($phrase));
    }
    
    function register() {
        
        $phrase = $this->params['url']['term'];
                
        $this->set('added', $this->Search->add($phrase));
    }
}