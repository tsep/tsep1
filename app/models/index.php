<?php
/**
* Index Model
* 
* @author Xaav
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  $LastChangedBy$
*  $LastChangedRevision$
*
*/
class Index extends AppModel {

    var $name = 'Index';
    
    var $belongsTo = 'Profile';
    
    /**
     * @var Profile
     */
    var $Profile;
}