<h2>Add a New Stopword</h2>
<?php 
	echo $form->create();
?>
<fieldset>
	<dl>
		<dt>URL to theme: </dt>
		<dd><?php echo $form->input('Theme.url',array(
			'label'=> false,
			'type' => 'text'
		))?></dd>
	</dl>
</fieldset>
<?php 
	echo $form->end(array(
		'div'=> array(
			'class' => 'button'
		),
		'label' => 'Add Theme'
	));
?>
<br />
<b>You will have to enable the theme after you install it for it to become active.</b>