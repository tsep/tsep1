<?php

require_once __DIR__.'/../../include/global.php';

Security::protect();

$contents = file_get_contents(TSEP_ROOT_DIR.'/tsepverify.txt');

if ($_POST['verify']!=$contents)
	SetupInstaller::$step--;
	
SetupInstaller::$error = "Incorrect Verification Code";