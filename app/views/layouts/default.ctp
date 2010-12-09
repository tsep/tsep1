<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $title_for_layout?></title>
<script type="text/javascript">
  window.base = <?php echo json_encode($html->url('/'))?>;
</script>
<?php 
  echo $html->css('style'); 
?>
</head>
<body>
	<div id="logo">
		<h1><a href="#">search our site</a></h1>
		<p><em>Powered by <a href="http://tsep.sf.net"/>The Search Engine Project</a></em></p>
	</div>
	<hr />
	<!-- end #logo -->
	<div id="header">
		<div id="menu">
			<?php echo $this->element('search_menu')?>
		</div>
		<!-- end #menu -->
		<div id="search">
		  <?php echo $this->element('search_form')?>
		</div>
		<!-- end #search -->
	</div>
	<!-- end #header -->
	<!-- end #header-wrapper -->
	<div id="page">
		<div id="content">
		  <div class="post">
				<h2 class="title"><a href="#"><?php echo $title_for_layout?></a></h2>
          <div class="entry">
	          <div id="update">
	          	            <?php echo $content_for_layout?>
	          </div>
          </div>
		  </div>
		</div><!-- end #content -->
		<div id="sidebar">
			<ul>
				<li>
					<h2>Search tips</h2>
					<ul>
					 <li>
					   By default, TSEP searches for all the given words and displays the page which has the all given search words. 
					 </li>
					 <li>
					 The minimum number of characters for a word to perform a search is 4.
					 </li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
	<div id="footer">
		<p>Powered by <a href="http://tsep.sf.net/">The Search Engine Project</a>. Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
	  <p><?php echo $html->link('Administration Control Panel', array('controller' => 'profiles', 'admin' => true))?></p>
	</div>
	<!-- end #footer -->
</body>
</html>
