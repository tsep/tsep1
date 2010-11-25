<?php 

	require_once __DIR__.'/../../include/global.php';
	Security::protect();


	?>
	<h2>Indexer</h2>
	
	<p>Fill out the form below to start a new index</p>
	
	<div id="mf" class="form">
	<form action="?page=indexer" method="post">
	
	<fieldset>
		<dl>
			<dt><label for="mode">Select Indexing Mode:</label></dt>
			<dd>
				<select id="mode" size="1" name="mode">
					<option  value="">Select One</option>
					<option  value="web">Index through HTTP</option>
					<option  value="dir">Index through DirectoryScan</option>		
				</select> 
				<img alt="Loading" src="<?php echo TSEP_CLIENT_ROOT?>/static/img/ajax-loader.gif" id="loader" style="display:none" />
		</dl>
		<dl>
			<dt><label for="saveindex">Save index?</label></dt>
			<dd>
				<input id="saveindex" type="checkbox" name="saveindex" value="yes" />
				<img alt="Loading" src="<?php echo TSEP_CLIENT_ROOT?>/static/img/ajax-loader.gif" id="iloader" style="display:none;" />
			</dd>
		</dl>
		<div id="iprofile">
				
		</div>
		<div id="data">
					
		</div>
	</fieldset>
	</form>
	
	</div>
	<?php //NOTE: Always put scripts after the HTML ?>
	<script type="text/javascript" >
	$("#mode").change(function() {
		$("#loader").css("display","inline");

		var path;
		var value = $(this).val();
		
		if(value == "")
			path = "";
		else if (value == "web")
			path = "indexerhttp";
		else if (value == "dir")
			path = "indexerdir";
		else 
			path = "";

		if (path == ""){

			$("#data").html("");
			$("#loader").css("display","none");
			change();
			return;
		}

		$.get("ajax-interface.php?page=" + path, function(data){

			$("#data").html(data);
			$("#loader").css("display","none");
			change();
		});
	});

	$("#saveindex").change(function() {
		$("#iloader").css("display","inline");

		if ($(this).is(":checked"))
			path = "saveindex";
		else
			path = "";
		
		if (path == ""){

			$("#iprofile").html("");
			$("#iloader").css("display","none");
			change();
			return;
		}

		$.get("ajax-interface.php?page=" + path, function(data){

			$("#iprofile").html(data);
			$("#iloader").css("display","none");

			$("#ipselect").change(function () {

				$("#savedprofile").css("display","none");
				$("#newprofile").css("display","none");

				if ($(this).val() == "saved")
					$("#savedprofile").css("display","inline");
				if ($(this).val() == "new")
					$("#newprofile").css("display","inline");
				change();
			});
		});
	});
	</script>