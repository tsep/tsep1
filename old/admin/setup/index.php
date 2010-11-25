<?php
/**
* Setup Installer for The Search Engine Project
* 
* @author geoffreyfishing
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  $LastChangedBy$
*  $LastChangedRevision$
*
*/



error_reporting(E_ALL);



//Don't connect to the db, we don't have the settings yet
require_once  __DIR__.'/../../include/global.php';

include_once TSEP_INCLUDE_DIR.'/class.setup.php';

session_start();

//Don't we all wish that Internet Explorer did not exist?
function ae_detect_ie()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && 
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        return true;
    else
        return false;
}


SetupInstaller::init();

//Begin parsing the POST data	
	switch (SetupInstaller::$step) {
		
		default:
			break;
					
		case 0:
			break;
		case 1:
			break;
		case 2:
			break;
		case 3:
			break;
		case 4:
			break;
		case 5:
			break;
		case 6:
			SetupInstaller::dispStep("verify");
			break;
		case 7:
			break;		
		case 8:
			SetupInstaller::dispStep("connect");
			break;
		case 9:
			break;
		case 10:
			SetupInstaller::dispStep("init");
			break;
	}
//End parsing the POST data
	
switch (SetupInstaller::$step) {
	
	default:
		break;
	
	case 0:
		SetupInstaller::dispStep("start");
		break;
	case 1:
		SetupInstaller::dispStep("js");
		break;
	case 2:
		SetupInstaller::dispStep("check");
		break;
	case 45:
		SetupInstaller::dispStep("update");
		break;
	case 3:
		SetupInstaller::dispStep("lang");
		break;
	case 4:
		SetupInstaller::dispStep("outline");
		break;	
	case 5:
		SetupInstaller::dispStep("intro");
		break;
	case 6:
		SetupInstaller::dispStep("environment");
		break;
	case 7:
		SetupInstaller::dispStep("db");
		break;
	case 8;
		SetupInstaller::dispStep("install");
		break;
	case 9:
		SetupInstaller::dispStep("settings");
		break;
	case 10:
		SetupInstaller::dispStep("complete");
		break;
	
}

SetupInstaller::end();

?>