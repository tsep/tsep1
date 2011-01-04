<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title_for_layout?></title>
<script type="text/javascript">
  window.base = <?php echo json_encode($html->url('/'))?>;
</script>
<?php
  echo $html->css('/install/css/install');
  echo $html->script('jquery');
  
  echo $scripts_for_layout;
?>

<!--[if IE]>
<style type="text/css">
#theform #pt4 {
    padding: 2em 1em 1em 1em;
    }
</style>
<![endif]-->

</head>

<body>
<h1>Installation</h1>
 
<h2>Complete the following form to complete installation.</h2>

<form id="theform" action="action.php" enctype="multipart/form-data" method="post">
<div class="loader">
  		<?php echo $html->image('ajax-loader.gif')?>
</div>
<?php echo $content_for_layout?>
</form>

</body>
</html>