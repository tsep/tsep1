<?php

require_once __DIR__.'/../../include/global.php';

Security::protect();

?>

<div id="is">
	
	<h2>Checking the Environment</h2>
	
	<?php
	
	function checkEnvironment () {
		
		
			$return = array();
			
			$return[0] = array();
			if (is_writable(TSEP_INCLUDE_DIR.'/conf.db.ini.php')) {
		   	
			   $return[0]['status'] = true;
		   	   $return[0]['message'] = "Database Configuration Settings are Writable";
			}
			else {
				$return[0]['status'] =false;
		   		$return[0]['message'] = "Database configuration settings are not Writable";
		   	}
		   	$return[1] = array();
		   	if (version_compare(PHP_VERSION, '5.3.3','>=')) {
		   	   
		   		$return[1]['status'] = true;
		   	   	$return[1]['message'] = "Php version is Supported";
		   	
		   	}
		   	else {
		   		$return[1]['status'] = false;
		   	   	$return[1]['message'] = "Php version is not supported";
		   	
		   	}
		   
		   	return $return;

	}
	
	?>
	
	
	<table>
		<?php foreach (checkEnvironment() as $envCheck) { ?>
			<tr>
			    <?php if ($envCheck['status'] == true){ ?>
			     <td class="checkMark"> <?php echo $envCheck['message']; ?></td>
			    <?php } else {?>
			     <td class="xMark"><?php echo $envCheck['message']; ?></td>
			    <?php }?>
		    </tr>
		<?php } ?>
	</table>
	<p></p>
	     <a href="javascript:void(0)" class="cssbutton" onClick="loadStep('next');">Next</a> 
	    
	<form>
		<input type="hidden" id="stepNumber" value="2" />
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