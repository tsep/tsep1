<?php
/**
* Simple configuration. Once this contained all config, since 0.913 the config is stored in the database. Now we read the configuration from the DBConnectionData.php and the database
*
* @tables tsep_internal
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/


require_once __DIR__.'/global.php';

global $tsep_config;

if (!$tsep_config = DataCache::Get('config', 'configValues')) {

		
		
		// ==== START === assign configuration values from database ===============
		
		
		$query_tsepconfiguration = "SELECT * FROM ".db::$prefix."settings WHERE group = 0";
		$tsepconfiguration = mysql_query($query_tsepconfiguration); 
		$row_tsepconfiguration = mysql_fetch_assoc($tsepconfiguration);
		$totalRows_tsepconfiguration = mysql_num_rows($tsepconfiguration);
		        do
		        {
		                $tsep_config[$row_tsepconfiguration['Property']] = (is_numeric($row_tsepconfiguration['Value'])?(int)$row_tsepconfiguration:$row_tsepconfiguration);
		        } while ($row_tsepconfiguration = mysql_fetch_assoc($tsepconfiguration));
		// ==== END === assign configuration values from database ===============
		mysql_free_result($tsepconfiguration);
		
		// set first alternating color
		$tsep_config['Color'] = $tsep_config['Color_1'];
		$tsep_config['Color']        = $tsep_config['Color_1'];
		
		// read the debug function if user whishes
		if ($tsep_config['Use_Debug_Print']=="true")
		{
		        include_once( TSEP_INCLUDE_DIR."/debugprint.php");
		}
		
   DataCache::Put('config', 'configValues', 10, $tsep_config);
 }
?>
