<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title_for_layout?></title>
<script type="text/javascript">
  window.base = <?php echo json_encode($html->url('/'))?>;
</script>
<?php 
  
  echo $html->css('admin-panel');
  echo $html->css('niceforms-default');
  
  echo $html->script('jquery');
  echo $html->script('jquery-clock');
  echo $html->script('jquery-confirmation');
  echo $html->script('accordion');
  echo $html->script('niceforms');
  echo $html->script('admin');

  echo $scripts_for_layout 
  
?>
</head>
<body>
<div id="main_container">

  <div class="header_login">
    <div class="logo"><a href="#"><?php echo $html->image('logo.gif')?></a></div>
    
    </div>
    <div class="login_form">
         <?php echo $content_for_layout?>
    </div>
    <div class="footer_login">
    
      <div class="left_footer_login">IN ADMIN PANEL | Powered by <a href="http://indeziner.com">INDEZINER</a></div>
      <div class="right_footer_login"><a href="http://indeziner.com"><?php echo $html->image('indeziner_logo.gif')?></a></div>
    
    </div>

</div>    
</body>
</html>