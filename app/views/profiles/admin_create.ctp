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
			<?php echo $form->input('regex',array('label'=>false,'disabled' => 'disabled',))?>
			<em>This field is currently automatically generated.</em>
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
	$("#ProfileUrl").change(function () {
		var value = $(this).val();

		var a = document.createElement('a');

		a.href = value;

		$("#ProfileRegex").val(a.hostname);
	});

	$("#ProfileAdminCreateForm").submit(function () {
		$("#ProfileUrl").change();
		$("#ProfileRegex").attr("disabled","");
	});


</script>