<p><?php __('Welcome to The Search Engine Project. Select your language to begin.'); ?></p>

<ul>
	<?php foreach ($languages as $code => $language): ?>
		<li><?php echo $html->link($language, array('plugin' => 'install', 'controller' => 'install', 'action' => 'index', '?' => array('language' => $code))); ?></li>
	<?php endforeach; ?>
</ul>