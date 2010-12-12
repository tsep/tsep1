<h2>Edit Indexing Profile</h2>
<?php 
	echo $form->create('Profile');
?>
<fieldset>
	<dl>
		<dt>Profile Name</dt>
		<dd><?php echo $form->input('name',array('value' => $profile['Profile']['name'], 'label'=> false))?></dd>
	</dl>
	<dl>
		<dt>Start URL</dt>
		<dd><?php echo $form->input('url',array('value' => $profile['Profile']['url'], 'label'=> false))?></dd>
	</dl>
	<dl>
		<dt>Regular Expression</dt>
		<dd><?php echo $form->input('regex',array('value' => $profile['Profile']['regex'],'disabled' => 'disabled', 'label'=>false))?></dd>
	</dl>
	<?php echo $form->input('id', array('value' => $profile['Profile']['id'], 'type' => 'hidden', 'label' => false))?>
	
</fieldset>
<?php 
	echo $form->end(array(
		'div'=> array(
			'class' => 'button'
		),
		'label' => 'Submit changes'
	));
?>

<script type="text/javascript">
	$("#ProfileUrl").change(function () {
		var value = $(this).val();

		var a = document.createElement('a');

		a.href = value;

		$("#ProfileRegex").val(a.hostname);
	});

	$(".button").find("input").click(function () {
		$("#ProfileUrl").change();
		$("#ProfileRegex").attr("disabled","");
	});

</script>
