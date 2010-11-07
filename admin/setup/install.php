<?php

require_once __DIR__.'/../../include/global.php';

Security::protect();

function install () {

	$adminDir = TSEP_ROOT_DIR.'/static/sql';
	
	$tablePrefix = db::$prefix;
	
    SetupInstaller::SplitSQL("$adminDir/delete.sql", array("tablePrefix" => $tablePrefix));
    SetupInstaller::SplitSQL("$adminDir/create.sql", array("tablePrefix" => $tablePrefix));
    SetupInstaller::SplitSQL("$adminDir/insert.sql", array("tablePrefix" => $tablePrefix));

}

?>

<div id="is">
    <h2>TSEP Installed Successfully.</h2>
    <p>
    TSEP has been installed successfully on <?php echo TSEP_CLIENT_ROOT; ?>.
    <br />
    Below is the Output from the installer: 
    <br />
    <textarea rows="10" cols="80" readonly="readonly" wrap="off">
        <?php   install(db::$prefix); ?>
    </textarea>
    <p>Click next to continue the setup</p>
    
    <a href="javascript:void(0)" class="cssbutton" onClick="loadStep('next');">Next</a> 
    <form>
			<input type="hidden" id="stepNumber" value="4" />
	</form>
</div>
<!--[if IE]>
	<script type="text/javascript" src="<?php echo TSEP_CLIENT_ROOT?>/static/js/jquery.js"></script>
       <script type="text/javascript"> 
        	$("a").each(function() {
        		if (this.href == "javascript:void(0)")
        			this.href = "index.php?Step=next";
        	
        	});
        </script>
<![endif]-->