<h2>Add a New Stopword</h2>
<?php 
	echo $form->create('Theme', array('enctype', 'multipart/form-data'));
?>
<fieldset>
	<dl>
		<dt>Stopword name:</dt>
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