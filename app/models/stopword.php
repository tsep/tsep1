<?php
/**
* Stopword Model
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
class Stopword extends AppModel {
    
    var $name = 'Stopword';
    
    var $belongsTo = 'Profile';
    
    /**
     * @var Profile
     */
    var $Profile;
}