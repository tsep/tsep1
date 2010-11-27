

<?php 

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
	
