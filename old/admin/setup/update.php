<?php

require_once __DIR__.'/../../include/global.php';

Security::protect();

include_once TSEP_INCLUDE_DIR.'/class.updater.php';

$updater = new Updater();

if ($updater->newVersion != null) {
	$updater->update();
	echo "done";
}