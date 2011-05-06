<?php if(!isset($done)): ?>
	<?php echo $html->script('batch-framework'); ?>

	<h2><?php __('Please Wait'); ?></h2>

	<i id="information_bar"><?php __('The selected operations are being performed.'); ?></i>

	<div id="progress_bar">
		<?php echo $html->image('iprogress.gif'); ?>
	</div>
<?php else: ?>
		<?php echo json_encode($done); ?>
<?php endif; ?>
