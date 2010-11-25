<h2>Create a New Indexing Profile</h2>
<?php 
	echo $form->create('Profile');
?>
<fieldset>
	<dl>
		<dt>Profile Name</dt>
		<dd><?php echo $form->input('name',array('label'=>''))?></dd>
	</dl>
	<dl>
		<dt>Start URL</dt>
		<dd><?php echo $form->input('url',array('label'=>''))?></dd>
	</dl>
	<dl>
		<dt>Regular Expression</dt>
		<dd><?php echo $form->input('regex',array('label'=>''))?></dd>
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
