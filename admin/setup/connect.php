<?php

	require_once __DIR__.'/../../include/global.php';
	
	Security::protect();
	
	$server = $_POST['server'];
    $port = $_POST['port'];
    $prefix = $_POST['prefix'];
    $password = $_POST['passwd'];
    $usernm = $_POST['uname'];
    $db = $_POST['dbname'];
        
        
    if (db::test($server, $usernm, $password, $db, $prefix)){
		file_put_contents(TSEP_INCLUDE_DIR.'/conf.db.ini.php', db::saveDBfile());

    }
    else {
        SetupInstaller::$error = "Could not connect to the MySql Server";            
        SetupInstaller::$step --;
    }