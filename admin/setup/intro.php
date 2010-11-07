<?php 
	require_once __DIR__.'/../../include/global.php'; 
	Security::protect();	
?>
<div id="is">
	<h2>Welcome to TSEP.</h2>
	<p>
	Thank you for considering to use TSEP.<br /><br />
    You are installing TSEP. This installer will take you through the process of setting up or upgrading <span class="tsep">TSEP</span>. On the left side of the screen you see the steps to take before the installation is complete. You will be able to track the progress of the installation by checking those steps.<br /><br />
    We have taken great care to select the default options for you. If this is your first install we suggest you accept the default values and tweak them as you learn how to use <span class="tsep">TSEP</span>. If you're upgrading from an older version of <span class="tsep">TSEP</span> the installer determines your old settings. You'll be able to copy them to the new setup or accept the default values.<br /><br />
    We hope TSEP proves to be a valuable tool for your website.<br />
    If you have any questions or comments please contact us through our forum at our <a href="http://sourceforge.net/projects/tsep/" target="blank">SourceForge site</a>.<br /><br />
    The TSEP Team<br />
    
    Selected Language: <?php echo SetupInstaller::$language;?>
    </p>
    
    <a href="javascript:void(0)" class="cssbutton" onClick="loadStep('next');">Next</a>
    
    <form>
			<input type="hidden" id="stepNumber" value="1" />
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