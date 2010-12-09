

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
<br />
<br />
  <?php echo $paginator->prev('Previous', array('url' => array('?' => $this->params['url']))); ?>
&nbsp;&nbsp;&nbsp;
<?php echo $paginator->next('Next', array('url' => array('?' => $this->params['url']))); ?> 
<?php 
		} 
	}
	else {
		?>
		<div class="empty">No Results</div>
		<?php 
	}
?>
	
