<?php if(!isset($done)): ?>
	<?php echo $html->script('batch-framework'); ?>
	
	<h2>Please Wait</h2>
	
	<i>The selected operations are being performed.</i>
	
	<div>
		<?php echo $html->image('ajax-loader.gif'); ?>
	</div>
<?php else: ?>
		<?php echo json_encode($done); ?>
<?php endif; ?>
