<html>
	<head>
		<title><?php echo $title_for_layout; ?></title>
		<?php echo $scripts_for_layout; ?>
		<script type="text/javascript">
		  window.base = <?php echo json_encode($html->url('/'))?>;
		</script>
		<?php 
			echo $html->css('default');
			echo $html->script('jquery');
		?>
	</head>
	<body>
		<div>
			<?php echo $this->element('search_menu'); ?>
		</div>
		<?php echo $content_for_layout; ?>
		<div>
			<?php echo $this->element('search_footer'); ?>
		</div>
	</body>
</html>