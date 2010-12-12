<h2>Add a New Stopword</h2>
<?php 
	echo $form->create('Stopword');
?>
<fieldset>
	<dl>
		<dt>Stopword name:</dt>
		<dd><?php echo $form->input('stopword',array('label'=> false))?></dd>
	</dl>
</fieldset>
<?php 
	echo $form->end(array(
		'div'=> array(
			'class' => 'button'
		),
		'label' => 'Add Stopword'
	));
?>