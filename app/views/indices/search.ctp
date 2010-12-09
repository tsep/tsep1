

<?php 

$this->Paginator->options(array(
    'update' => '#update',
    'evalScripts' => true
));

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
<?php echo $paginator->prev('&laquo;Previous', array('url' => array('?' => $this->params['url']))); ?>
&nbsp;&nbsp;&nbsp;
<?php echo $paginator->next('Next&raquo;', array('url' => array('?' => $this->params['url']))); ?> 

<?php 
		} 
	}
	else {
		?>
		<div class="empty">No Results</div>
		<?php 
	}
	
	echo $js->writeBuffer();
?>
	
