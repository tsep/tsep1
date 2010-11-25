<?php
	require_once __DIR__.'/../../include/global.php';
	Security::protect();
	
	?>
	<h2>Configuration</h2>
	<p>Please wait; you are being redirected.<img alt="Loading" src="<?php echo TSEP_CLIENT_ROOT?>/static/img/ajax-loader.gif" /></p>
	
	
	<script type="text/javascript">
	$(window).load(function () {
		window.location = "../configuration.php";
	});
	</script>