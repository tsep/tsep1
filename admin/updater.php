<?php

require_once __DIR__.'/../include/global.php';

include TSEP_INCLUDE_DIR.'/class.updater.php';
error_reporting(0);

$updater = new Updater();

if ($updater->updateAvaliable)
{
	if ($_GET["Update"]=="yes"){

	    if ($updater->update())

	    echo "done";
	    else 
	       echo "Failed";

	}
	else {
		
		echo "yes";
	}
}
else {
    echo "no";
}
?>
