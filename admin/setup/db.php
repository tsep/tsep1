<?php
	require_once __DIR__.'/../../include/global.php';
	
	Security::protect();
	
	$_POST['port'] = (!empty($_POST['port'])) ? $_POST['port'] : "3306";
	$_POST['prefix'] = (!empty($_POST['prefix'])) ? $_POST['prefix'] : "tsep_";
?>
<div id="is">
	<h2>Connect to the Database</h2>
	
		<?php if((SetupInstaller::$error!= NULL)){ ?>
		<form>
			<span style="color:FF6633;"><?php echo SetupInstaller::$error;?></span> <a href="javascript:void()" onclick="viewError();">View Details</a>
			<input type="hidden" id="ErrorDetails" value="<?php echo mysql_error();?>"/>
		</form>
	<?php }
	      SetupInstaller::$error = NULL;
	?>
	
	<form id="mf" action="index.php?Step=next" method="post">
		<table>
		<tr><td style="text-align:right;">Mysql Server Address:  </td><td><input value="<?php echo $_POST['server']; ?>" type="text"     name="server" />     </td></tr>
		<tr><td style="text-align:right;">Mysql Port:            </td><td><input value="<?php echo $_POST['port'];   ?>" type="text"     name="port" />       </td></tr>
		<tr><td style="text-align:right;">Mysql Table Prefix:    </td><td><input value="<?php echo $_POST['prefix']; ?>" type="text"     name="prefix" />      </td></tr>
		<tr><td style="text-align:right;">Mysql Username:        </td><td><input value="<?php echo $_POST['uname'];  ?>" type="text"     name="uname" />       </td></tr>
		<tr><td style="text-align:right;">Mysql Password:        </td><td><input value="<?php echo $_POST['passwd']; ?>" type="password" name="passwd" />  </td></tr>
		<tr><td style="text-align:right;">Mysql Database Name:   </td><td><input value="<?php echo $_POST['dbname']; ?>" type="text"     name="dbname" />      </td></tr>
		</table>
		
		<!--[if IE]>
			<input type="submit" />
		<![endif]-->
	</form>
		
	
	 <a href="javascript:void(0)" class="cssbutton" onClick="loadStep('next');">Next</a> 
	 
	<form>
		<input type="hidden" id="stepNumber" value="3" />
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