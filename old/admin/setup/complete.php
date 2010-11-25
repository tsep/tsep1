<?php

	require_once __DIR__.'/../../include/global.php';
	Security::protect();
	
?>
<div id="is">
	<h2>Setup Complete</h2>
	
	<p>TSEP has been successfully installed on <?php echo TSEP_CLIENT_ROOT;?></p>
	<p>Thank you for installing TSEP on your site.</p>
	<p><a href="<?php echo TSEP_CLIENT_ROOT; ?>/admin/index.php">Click Here to visit the admin area</a></p>
	<p><a href="<?php echo TSEP_CLIENT_ROOT;?>/search.php">Click Here to visit your search page</a></p> 
		
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