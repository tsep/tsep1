<?php 
	echo $form->create(null, array(
		'url' => array(
			'controller'=>'indices', 
			'action'=>'search'
		),
		'type' => 'get'
	));
?>
<input type="text" name="q" />

<?php 
	echo $form->end('Search');

	if (!empty($matches)) {
		foreach ($matches as $match) {
?>
<div class="result">
	<div class="url">
	<?php echo $html->link($match['Index']['url'], $match['Index']['url'])?>
	</div>
	<div class="text">
	<?php echo $match['Index']['text']?>	
	</div>
</div>
<?php 
		} 
	}
	else {
		?>
		<div class="empty">No Results</div>
		<?php 
	}
?>
	
