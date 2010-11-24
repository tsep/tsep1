<?php 
	echo $form->create(null, array(
		'url' => array(
			'controller'=>'search', 
			'action'=>'index'
		),
		'type' => 'get'
	));
	echo $form->input('q');
	echo $form->end('Search');

	foreach ($matches as $match) {
	echo $match['Index']['text'];
	echo '<br />';
	echo $match['Index']['url'];
	
}?>
	