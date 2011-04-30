<h2><?php __('View Index'); ?></h2>

<fieldset>
	<dl>
		<dt><?php __('Name:'); ?></dt>
		<dd><span><?php echo $index['Profile']['name']?></span></dd>
	</dl>
	<dl>
		<dt><?php __('URL:'); ?></dt>
		<dd><span><?php echo $profile['Profile']['url']?></span></dd>
	</dl>
	<dl>
		<dt><?php __('Regular Expression'); ?></dt>
		<dd><span><?php echo $profile['Profile']['regex']?></span></dd>
	</dl>
</fieldset>