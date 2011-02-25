<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />
	<?php echo $html->css('default'); ?>
	<title><?php echo $title_for_layout; ?></title>
</head>

<body>
   <div id="container">
   
        

        <div id="header"><h1><?php echo $title_for_layout; ?></h1></div>

      <div id="wrapper">

        <div id="navigation">
           <?php echo $this->element('search_menu'); ?>
        </div>
        

      
        <div id="content-wrapper">
            <div id="content">
                <?php echo $content_for_layout; ?>
                <?php echo $this->element('sql_dump'); ?>
            </div> 
        </div>
        
        <div id="footer">
					<?php echo $this->element('search_footer'); ?>
				</div>        
      </div> 
      
   </div>
</body>

</html>

