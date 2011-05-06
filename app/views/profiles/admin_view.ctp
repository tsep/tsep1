<h2><?php __('View Indexing Profile'); ?></h2>

<fieldset>
	<dl>
		<dt><?php __('Id:'); ?></dt>
		<dd><span><?php echo $profile['Profile']['id']; ?></span></dd>
	</dl>
	<dl>
		<dt><?php __('URL:'); ?></dt>
		<dd><span><?php echo $profile['Profile']['url']; ?></span></dd>
	</dl>
	<dl>
		<dt><?php __('Regular Expression:'); ?></dt>
		<dd><span><?php echo $profile['Profile']['regex']; ?></span></dd>
	</dl>

	<?php echo $html->link(__('Index this profile', true), array(
	    'admin' => true,
	    'controller' => 'indices',
	    'action' => 'start',
	    $profile['Profile']['id'],
	)); ?>

</fieldset>
