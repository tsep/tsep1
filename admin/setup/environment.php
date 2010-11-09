<?php

require_once __DIR__.'/../../include/global.php';

Security::protect();

include_once TSEP_INCLUDE_DIR.'/class.modulecheck.php';

global $check;

$check = true;
?>

<div id="is">
	
	<h2>Checking the Environment</h2>
	
	<?php
	
	function checkEnvironment () {
		
			global $check;
		
			$modules = new moduleCheck();
			$return = array();
			
			$return[0] = array();
			if (is_writable(TSEP_INCLUDE_DIR.'/conf.db.ini.php')) {
		   	
			   $return[0]['status'] = true;
		   	   $return[0]['message'] = "Database Configuration Settings are Writable";
			}
			else {
				$return[0]['status'] =false;
		   		$return[0]['message'] = "Database configuration settings are not Writable";
		   		$check = false;
			}
		   	$return[1] = array();
		   	if (version_compare(PHP_VERSION, '5.3.3','>=')) {
		   	   
		   		$return[1]['status'] = true;
		   	   	$return[1]['message'] = "PHP version is supported";
		   	
		   	}
		   	else {
		   		$return[1]['status'] = false;
		   	   	$return[1]['message'] = "PHP version is not supported";
		   		$check = false;
		   	}
		   	
		   	$return[2] = array();
		   	if ($modules->isLoaded('PDO')) {
		   		
		   		$return[2]['status'] = true;
		   		$return[2]['message']= "PHP Data Objects is installed";
		   	}
		   	else {
		   		
		   		$return[2]['status'] = false;
		   		$return[2]['message']= "PHP Data Objects is not installed";
		   		$check = false;
		   	}
			if ($modules->isLoaded('pdo_mysql')) {
		   		
		   		$return[3]['status'] = true;
		   		$return[3]['message']= "PDO Driver for MySQL is installed";
		   	}
		   	else {
		   		
		   		$return[3]['status'] = false;
		   		$return[3]['message']= "PDO Driver for MySQL is not installed";
		   		$check = false;
		   	}
		   	if ($modules->isLoaded('dom')) {
		   		
		   		$return[4]['status'] = true;
		   		$return[4]['message']= "DOM Indexing is enabled";
		   	}
		   	else {
		   		
		   		$return[4]['status'] = false;
		   		$return[4]['message']= "DOM Indexing is not enabled";
		   		$check = false;
		   	}
			if ($modules->isLoaded('session')) {
		   		
		   		$return[5]['status'] = true;
		   		$return[5]['message']= "Session Support  is enabled";
		   	}
		   	else {
		   		
		   		$return[5]['status'] = false;
		   		$return[5]['message']= "Session Support not enabled";
		   		$check = false;
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
			    <?php 
			    	break;
			    }?>
		    </tr>
		<?php } ?>
	</table>
	<p></p>
	<?php if($check) {?>
	     <a href="javascript:void(0)" class="cssbutton" onClick="loadStep('next');">Next</a> 
	 <?php } else {
	  	$_SESSION = array();
	  ?>	
	  	<span style="color:FF6633;">Your PHP confiugration is not supported. The installer cannot continue</span>
	  <?php 	
	  }?>  
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