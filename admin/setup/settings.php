<?php

	require_once __DIR__.'/../../include/global.php';
	Security::protect();
	
?>
<div id="is">
	<h2>Please Enter the Initial Settings Below</h2>
	<p>	Please Enter the settings below to complete installation.</p>
	
	<form id="mf" action="index.php?Step=next">
	<table>
	<tr><td style="text-align:right;">Admin Username</td><td><input type="text" name="usrname" /></td></tr>
	<tr><td style="text-align:rigth;">Admin Password</td><td><input type="password"	name="passwd" /></td></tr>
	<?php // TODO:ADD OPTION TO INSERT FIRST INDEXING PROFILE ?>
	</table>
	<!--[if IE]>
			<input type="submit" />
	<![endif]-->
	</form>
	<p>Click next to continue.</p>
	
	<a href="javascript:void(0)" class="cssbutton" onClick="loadStep('next');">Next</a> 
	<form>
			<input type="hidden" id="stepNumber" value="5" />
		</form>
</div>
<!--[if IE]>
	<script type="text/javascript" src="<?php echo TSEP_CLIENT_ROOT?>/static/js/jquery.js"></script>
       <script type="text/javascript"> 
        	$("a").each(function() {
        		if (this.href == "javascript:void(0)")
					$(this).remove();        	
        	});
        </script>
<![endif]-->