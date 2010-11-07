<?php

	require_once __DIR__.'/../../include/global.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TSEP ACP | Powered by INDEZINER</title>
<link rel="stylesheet" type="text/css" href="<?php echo TSEP_CLIENT_ROOT?>/static/css/admin-panel.css" />
<script type="text/javascript" src="<?php echo TSEP_CLIENT_ROOT?>/static/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo TSEP_CLIENT_ROOT?>/static/js/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
    headerclass: "submenuheader", //Shared CSS class name of headers group
    contentclass: "submenu", //Shared CSS class name of contents group
    revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
    mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
    collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
    defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
    onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
    animatedefault: false, //Should contents open by default be animated into view?
    persiststate: true, //persist state of opened contents within browser session?
    toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
    togglehtml: ["suffix", "<img src='<?php echo TSEP_CLIENT_ROOT?>/static/img/plus.gif' class='statusicon' />", "<img src='<?php echo TSEP_CLIENT_ROOT?>/static/img/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
    animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
    oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
        //do nothing
    },
    onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
        //do nothing
    }
});
</script>
<script src="<?php echo TSEP_CLIENT_ROOT?>/static/js/jquery.jclock-1.2.0.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo TSEP_CLIENT_ROOT?>/static/js/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
        $('.ask').jConfirmAction();
    });
    
</script>
<script type="text/javascript">
$(function($) {
    $('.jclock').jclock();
});
</script>
<script type="text/javascript">

function gup( name, url )
{
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( url );
  if( results == null )
    return "";
  else
    return results[1];
}


</script>
<script type="text/javascript">
$(document).ready(function (){

	var queryString = gup("page",window.location.search);
	
	$(".menu ul li a").each(function () {

		if (gup("page",this.search) == queryString)
			$(this).addClass("current");
		if ((queryString == "")&&(gup("page", this.search) == "main"))
			$(this).addClass("current");;
			
	});
});

</script>
<script type="text/javascript">

	$(document).ready(function () {

		$.get("../updater.php", function(data){
 		   if (data == "yes") {
                $("#updatePanel").html("<a href=\"#\" onClick=\"runUpdate();\">Click to Update</a>");
            } else {
                 $("#updatePanel").html("Up to date");
             }         
    	});
	});

	function runUpdate () {

		$("#updatePanel").html("Updating...");
		$.get("../updater.php?Update=yes", function(data){
			if (data == "done") {
				window.reload();
			} else {
				$("#updatePanel").html("Update Failed");
			}  
		});


	}

</script>

<script language="javascript" type="text/javascript" src="<?php echo TSEP_CLIENT_ROOT?>/static/js/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo TSEP_CLIENT_ROOT?>/static/css/niceforms-default.css" />

</head>
<body>
<div id="main_container">

    <div class="header">
    <div class="logo"><a href="#"><img src="<?php echo TSEP_CLIENT_ROOT?>/static/img/logo.gif" alt="" title="" border="0" /></a></div>
    
    <div class="right_header">Welcome Admin, <a href="<?php echo TSEP_CLIENT_ROOT;?>">Visit site</a> | <?php //<a href="#" class="messages">(3) Messages</a>?><span id="updatePanel">Updating...</span> | <a href="#" class="logout">Logout</a></div>
    <div class="jclock"></div>
    </div>
    
    <div class="main_content">
    
                    <div class="menu">
                    <ul>
                    <li><a href="?page=main">ACP Home</a></li>
                    <li><a href="?page=sites">Manage Sites<!--[if IE 7]><!--></a><!--<![endif]-->
                    <?php 
                    /*
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    */
                    ?>
                    </li>
                    <li><a href="?page=indexer">Create a New Index<!--[if IE 7]><!--></a><!--<![endif]-->
                    <?php 
                    /*
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a class="sub1" href="" title="">sublevel2<!--[if IE 7]><!--></a><!--<![endif]-->
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <ul>
                                <li><a href="" title="">sublevel link</a></li>
                                <li><a href="" title="">sulevel link</a></li>
                                <li><a class="sub2" href="#nogo">sublevel3<!--[if IE 7]><!--></a><!--<![endif]-->
                        
                                <!--[if lte IE 6]><table><tr><td><![endif]-->
                                    <ul>
                                        <li><a href="#nogo">Third level-1</a></li>
                                        <li><a href="#nogo">Third level-2</a></li>
                                        <li><a href="#nogo">Third level-3</a></li>
                                        <li><a href="#nogo">Third level-4</a></li>
                                    </ul>
                        
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                                </li>
                                <li><a href="" title="">sulevel link</a></li>
                            </ul>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                        </li>
                    
                         <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    */
                    ?>
                    </li>
                    <li><a href="?page=users">Manage Users<!--[if IE 7]><!--></a><!--<![endif]-->
                    <?php 
                    /*
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a class="sub1" href="" title="">sublevel2<!--[if IE 7]><!--></a><!--<![endif]-->
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <ul>
                                <li><a href="" title="">sublevel link</a></li>
                                <li><a href="" title="">sulevel link</a></li>
                                <li><a class="sub2" href="#nogo">sublevel3<!--[if IE 7]><!--></a><!--<![endif]-->
                        
                                <!--[if lte IE 6]><table><tr><td><![endif]-->
                                    <ul>
                                        <li><a href="#nogo">Third level-1</a></li>
                                        <li><a href="#nogo">Third level-2</a></li>
                                        <li><a href="#nogo">Third level-3</a></li>
                                        <li><a href="#nogo">Third level-4</a></li>
                                    </ul>
                        
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                                </li>
                                <li><a href="" title="">sulevel link</a></li>
                            </ul>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                        </li>
                    
                         <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    */
                    ?>
                    </li>
                    <li><a href="?page=settings">Settings<!--[if IE 7]><!--></a><!--<![endif]-->
                    <?php 
                    /*
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a class="sub1" href="" title="">sublevel2<!--[if IE 7]><!--></a><!--<![endif]-->
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <ul>
                                <li><a href="" title="">sublevel link</a></li>
                                <li><a href="" title="">sulevel link</a></li>
                                <li><a class="sub2" href="#nogo">sublevel3<!--[if IE 7]><!--></a><!--<![endif]-->
                        
                                <!--[if lte IE 6]><table><tr><td><![endif]-->
                                    <ul>
                                        <li><a href="#nogo">Third level-1</a></li>
                                        <li><a href="#nogo">Third level-2</a></li>
                                        <li><a href="#nogo">Third level-3</a></li>
                                        <li><a href="#nogo">Third level-4</a></li>
                                    </ul>
                        
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                                </li>
                                <li><a href="" title="">sulevel link</a></li>
                            </ul>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                        </li>
                    
                         <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    */
                    ?>
                    </li>
                    <li><a href="?page=layout">Search Page Layout</a></li>
                    <li><a href="?page=contact">Contact TSEP</a></li>
                    </ul>
                    </div> 
                    
                    
                    
                    
    <div class="center_content">  
    
    
    
    <div class="left_content">
    
    		<div class="sidebar_search">
            <form>
            <input type="text" name="" class="search_input" value="search keyword" onclick="this.value=''" />
            <input type="image" class="search_submit" src="<?php echo TSEP_CLIENT_ROOT?>/static/img/search.png" />
            </form>            
            </div>
    
            <div class="sidebarmenu">
            
                <a class="menuitem <?php //submenuheader?>" href="?page=main">ACP Home</a>
                <?php /*
                <div class="submenu">
                    <ul>
                    <li><a href="">Sidebar submenu</a></li>
                    <li><a href="">Sidebar submenu</a></li>
                    <li><a href="">Sidebar submenu</a></li>
                    <li><a href="">Sidebar submenu</a></li>
                    <li><a href="">Sidebar submenu</a></li>
                    </ul>
                </div>
                */?>
                <a class="menuitem" href="?page=sites" >Manage Sites</a>
                <?php /*
                <div class="submenu">
                    <ul>
                    <li><a href="">Sidebar submenu</a></li>
                    <li><a href="">Sidebar submenu</a></li>
                    <li><a href="">Sidebar submenu</a></li>
                    <li><a href="">Sidebar submenu</a></li>
                    <li><a href="">Sidebar submenu</a></li>
                    </ul>
                </div>*/?>
                <a class="menuitem" href="?page=indexer">Create a new Index</a>
                <?php /*
                <div class="submenu">
                    <ul>
                    <li><a href="">Sidebar submenu</a></li>
                    <li><a href="">Sidebar submenu</a></li>
                    <li><a href="">Sidebar submenu</a></li>
                    <li><a href="">Sidebar submenu</a></li>
                    <li><a href="">Sidebar submenu</a></li>
                    </ul>
                </div> */?>
                <a class="menuitem" href="?page=users">Manage Users</a>
                <a class="menuitem" href="?page=settings">Settings</a>
                <a class="menuitem" href="?page=layout">Search Page Layout</a>
                <a class="menuitem" href="?page=contact">Contact TSEP</a>
                <?php /*
                <a class="menuitem" href="">Blue button</a>
                
                <a class="menuitem_green" href="">Green button</a>
                
                <a class="menuitem_red" href="">Red button</a>
                    */?>
            </div>
            
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h3>User help desk</h3>
                <img src="<?php echo TSEP_CLIENT_ROOT?>/static/img/info.png" alt="" title="" class="sidebar_icon_right" />
                <p>
                Have a problem with TSEP? Just click on the contact tab,
                inside your admin panel, to submit a new ticket to support.
                After that, we should be in touch with you shortly.
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h4>Important notice</h4>
                <img src="<?php echo TSEP_CLIENT_ROOT?>/static/img/notice.png" alt="" title="" class="sidebar_icon_right" />
                <p>
                Please be sure and Update TSEP regularly. These updates fix
                crucial security holes and bugs, and we would not want you
                to remain them. We cannot assist anyone with an older version
                of TSEP, as we may have already fixed the problem they are 
                having trouble with in the new version.
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
            <?php /*
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h5>Download photos</h5>
                <img src="<?php echo TSEP_CLIENT_ROOT?>/static/img/photo.png" alt="" title="" class="sidebar_icon_right" />
                <p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>  
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h3>To do List</h3>
                <img src="<?php echo TSEP_CLIENT_ROOT?>/static/img/info.png" alt="" title="" class="sidebar_icon_right" />
                <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                 <li>Lorem ipsum dolor sit ametconsectetur <strong>adipisicing</strong> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                  <li>Lorem ipsum dolor sit amet, consectetur <a href="#">adipisicing</a> elit.</li>
                   <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                     <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                </ul>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
              
    		*/?>
    </div>  
    
    <div class="right_content">            
        
    <?php
	
    $path = $_GET['page'];
    
    $path = preg_replace("/[^a-zA-Z0-9\s]/","", $path);
    
    $path = TSEP_ROOT_DIR."/admin/pages/${path}.php";
    
    if (!file_exists($path))
    	$path = TSEP_ROOT_DIR."/admin/pages/main.php";
    	
    include $path;
    
    ?>
    
    </div>
    <!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
    <div class="footer">
    
    	<div class="left_footer">TSEP ACP | Powered by <a href="http://indeziner.com">INDEZINER</a></div>
    	<div class="right_footer"><a href="http://indeziner.com"><img src="<?php echo TSEP_CLIENT_ROOT?>/static/img/indeziner_logo.gif" alt="" title="" border="0" /></a></div>
    
    </div>

</div>		
</body>
</html>