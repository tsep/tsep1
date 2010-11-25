<?php 
	require_once __DIR__.'/../../include/global.php'; 
	Security::protect();
	
	if(ae_detect_ie())
		header("Location:index.php?Step=next");
?>
<div id="sidebar">
	  <table>
	       <tr><td class="sidebarTD" id="step_1">Introduction</td></tr>
	       <tr><td class="sidebarTD" id="step_2">Check Environment</td></tr>
	       <tr><td class="sidebarTD" id="step_3">Connect to Database</td></tr>
	       <tr><td class="sidebarTD" id="step_4">Setup Database</td></tr>
	       <tr><td class="sidebarTD" id="step_5">Enter Settings</td></tr>
	       <tr><td class="sidebarTD" id="step_6">Complete Setup</td></tr>
	  </table> 
	</div>
	<div id="placeholder"><br /></div>
	<div id="step">
	  <center><div style="margin-top:40%;">Loading...</div></center>
	</div>
