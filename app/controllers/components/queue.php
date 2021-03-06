<?php
/**
* Queue Component
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


class QueueComponent extends Object {
    
    private function _getJobFile () {
        
        $cont = @file_get_contents(Configure::read('JobPath'));
        
        if(empty($cont)) {
            
            return array();
            
        }
        else {
            
            $jobs = @unserialize($cont);
            
            if (empty($jobs) || !is_array($jobs)) {
                
                return array();
            }
            else {
                
                return $jobs;
            }            
        }
        
    }
    
    private function _saveJobFile ($jobs) {
        
        $cont = serialize($jobs);
        
        if(@file_put_contents(Configure::read('JobPath'), $cont)) {
        
            return true;
        }
        else {
            
            return false;
        }
    }
    
    function addJob($function_name, array $params = array(), $group = 'default') {
        
        $job = compact('function_name', 'params');
                
        $jobs = $this->_getJobFile();
        
        if(!isset($jobs[$group])){
            $jobs[$group] = array();
        }
        
        array_push($jobs[$group], $job);
        
        if($this->_saveJobFile($jobs)) {
            return true;
        }
        else {
            return false;
        }
    }
    
    function isJob ($group = 'default') {
        
        $jobs = $this->_getJobFile();
        
        if(empty($jobs[$group])) {
            return false;
        }
        else {
            return true;
        }
    }
    
    function getJob ($group = 'default') {
    
        $jobs = $this->_getJobFile();
        
        if(!empty($jobs[$group])) {
        
            $job = array_pop($jobs[$group]);
            
            $this->_saveJobFile($jobs);
            
            return $job;
        }
        else {
            return false;
        }
    }
}