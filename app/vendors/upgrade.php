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
		

	//TODO: Upgrade INI file
	
	$appController = new AppController();
	
	$ini = parse_ini_file(CONFIGS.'settings.ini.php', true);
	
	Configure::write('Database.driver', 'mysql');
	Configure::write('Database.persistent', false);
	Configure::write('Database.host', $ini['database']['host']);
	Configure::write('Database.login', $ini['datbase']['login']);
	Configure::write('Database.password', $ini['database']['password']);
	Configure::write('Database.database', $ini['database']['gfishing_tests']);
	Configure::write('Database.prefix', $ini['database']['prefix']);
	
	Configure::write('Security.salt', $ini['security']['salt']);
	Configure::write('Security.cipherSeed', $ini['security']['chipherSeed']);
	
	$appController->_saveConfig();
	
}