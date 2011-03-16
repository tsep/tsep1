<h2><?php __('TSEP Configuration'); ?></h2>
<b><?php __('Warning: for advanced users only! Entering incorrect values may corrupt your installation.'); ?></b>
<?php echo $form->create('Setting', array('url' => '/admin/core/setting')); ?>

<?php echo $form->input('key'); ?>

<?php echo $form->input('value'); ?>

<?php echo $form->end('Update Configuration'); ?>

<pre>
	<?php print_r($config) ?>
</pre>
