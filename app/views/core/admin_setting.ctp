<h2><?php __('TSEP Configuration'); ?></h2>
<b><?php __('Warning: for advanced users only! Entering incorrect values may corrupt your installation.'); ?></b>
<?php echo $form->create('Setting', array('url' => '/admin/core/setting')); ?>

<fieldset>
	<dl>
		<dt><?php __('Key:'); ?></dt>
		<dd><?php echo $form->input('key', array('label' => false)); ?></dd>
	</dl>
	<dl>
		<dt><?php __('Value:'); ?></dt>
		<dd><?php echo $form->input('value', array('label' => false)); ?></dd>
	</dl>
</fieldset>
<?php 
	echo $form->end(array(
		'div' => array(
			'class' => 'button'
		),
		'label' => 'Save Setting'
	)); 
?>

<pre>
	<?php print_r($config) ?>
</pre>
