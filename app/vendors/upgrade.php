<?php
/**
* Performs necesary upgrades after updating
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

/**
 * Upgrades the database after an update
 */
function upgrade () {

		//Put any upgrade code here
		
		mysql_query('

CREATE TABLE IF NOT EXISTS `tsep_searches` (
  `phrase` tinytext NOT NULL,
  `count` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
		');
	
}