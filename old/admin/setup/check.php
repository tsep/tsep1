<?php require_once __DIR__.'/../../include/global.php'; 

Security::protect(); 

if(ae_detect_ie())
	header("Location:index.php?Step=next");

include_once TSEP_INCLUDE_DIR.'/class.updater.php';

$updater = new Updater();

if ($updater->newVersion != null){
	echo "yes";
	SetupInstaller::$step = 44;	
}
else 
	echo "no";