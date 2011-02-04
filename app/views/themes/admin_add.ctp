<h2>Add a New Stopword</h2>
<?php 
	echo $form->create();
?>
<fieldset>
	<dl>
		<dt>URL to theme: </dt>
		<dd><?php echo $form->file('Theme.file',array('label'=> false))?></dd>
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
<br />
<b>Note that the stopword will not take effect until the next indexer run.</b>