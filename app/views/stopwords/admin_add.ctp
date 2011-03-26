<h2><?php __('Add a New Stopword'); ?></h2>
<?php 
	echo $form->create('Stopword');
?>
<fieldset>
	<dl>
		<dt><?php __('Stopword name:'); ?></dt>
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
<br />
<b><?php __('Note that the stopword will not take effect until the next indexer run.'); ?></b>