<h2>Create a New Indexing Profile</h2>
<?php 
	echo $form->create('Profile');
?>
<fieldset>
	<dl>
		<dt>Profile Name</dt>
		<dd><?php echo $form->input('name',array('label'=> false))?></dd>
	</dl>
	<dl>
		<dt>Start URL</dt>
		<dd>
			<?php echo $form->input('url',array('label'=> false))?>
			<em>The URL to the document root of your website.</em>
		</dd>
	</dl>
	<dl>
		<dt>Regular Expression</dt>
		<dd>
			<?php echo $form->input('regex',array('label'=>false, 'id' => 'regex'))?> 	
			<a href="javascript:void(0)" id="regexLink">Generate Regex</a>
			<em>The regular expression that URLs must match.</em>
		</dd>
	</dl>
</fieldset>
<?php 
	echo $form->end(array(
		'div'=> array(
			'class' => 'button'
		),
		'label' => 'Create Profile'
	));
?>
<br />
<b>You must index the new Profile before it will appear in the search results.</b>

<script type="text/javascript">

	$('#regexLink').click(function (){

		window.open( window.base + 'files/regexgen.html' );
		
	});

</script>