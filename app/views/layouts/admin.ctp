<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title_for_layout?></title>
<script type="text/javascript">
  window.base = <?php echo json_encode($html->url('/'))?>;
  window.translations.noUpdateAvaliable = <?php echo json_encode(__('No update avaliable', true)); ?>
</script>
<?php

	echo $html->css('admin-panel');
	echo $html->css('niceforms-default');

	echo $html->script('jquery');
	echo $html->script('jquery-ui');
	echo $html->script('jquery-clock');
	echo $html->script('jquery-confirmation');
	echo $html->script('accordion');
	//echo $html->script('niceforms');
	echo $html->script('admin');

	echo $scripts_for_layout

?>
</head>
<body>
<div id="main_container">

    <div class="header">
    <div class="logo"><?php echo $html->link(
  $html->image("logo.gif",
    array('border' => '0')
  ),
  '/',
  array('escape' => false))?></div>

    <div class="right_header">
    	<?php if($user): ?>
    		<?php echo $html->link(__('Visit Site', true), array('controller'=>'indices', 'action'=>'search', 'admin'=>false))?>
    		 |
    		<?php if($update_needed): ?>
				<span id="updatePanel"><?php __('Loading...'); ?></span>
			<?php else: ?>
				<?php __('No update avaliable'); ?>
			<?php endif; ?>
			 |
			<?php
			    if($indexer_running):
			        echo 'Indexing in progress';
			    else:
			        echo 'Indexer ready';
			    endif;
			?>
			 |
			<?php echo $html->link(__('Logout', true), array('controller' => 'users' , 'action' => 'logout'), array('class' => 'logout')) ?>
   		<?php endif; ?>
   	</div>
    <div class="jclock"></div>
    </div>

    <div class="main_content">

                    <div class="menu">
                    <ul>
                    <?php if($user): ?>
	                    <?php //<li><?php echo $html->link('Index Site', array('controller'=>'indexer', 'action'=>'index'))?>
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
	                    <?php //</li>?>
	                    <li><?php echo $html->link(__('Profiles', true), array('controller' => 'profiles', 'action' => 'index'))?>
	                    	<ul>
	                    		<li><?php echo $html->link(__('New IProfile', true), array('controller'=>'profiles', 'action'=>'create'))?></li>
	                    		<li><?php echo $html->link(__('View all', true), array('controller'=>'profiles', 'action'=>'index'))?></li>
	                    	</ul>
	                    </li>
	                    <?php //<li><?php echo $html->link('Create a New IProfile', array('controller'=>'profiles', 'action'=>'create'))?>
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
	                    <li>
	                    	<?php echo $html->link(__('Stopwords', true), array('controller' => 'stopwords', 'action' => 'index'))?>
	                    	<ul>
	                    		<li><?php echo $html->link(__('View all', true), array('controller' => 'stopwords', 'action' => 'index'))?></li>
	                    		<li><?php echo $html->link(__('Add new', true), array('controller' => 'stopwords', 'action' => 'add'))?></li>
	                    	</ul>
	                    </li>
	                    <li>
	                    	<?php echo $html->link(__('Themes', true), array('controller' => 'themes', 'action' => 'index'))?>
	                    	<ul>
	                    		<li><?php echo $html->link(__('View all', true), array('controller' => 'themes', 'action' => 'index'))?></li>
	                    		<li><?php echo $html->link(__('Add new', true), array('controller' => 'themes', 'action' => 'add'))?></li>
	                    	</ul>
	                    </li>
	                    <?php //<li><a href="?page=users">Manage Users<!--[if IE 7]><!--></a><!--<![endif]-->?>
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
	                    <?php //</li>?>
	                    <?php //<li><a href="?page=settings">Settings<!--[if IE 7]><!--></a><!--<![endif]-->?>
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
	                    <?php //</li>?>
	                    <?php //<li><a href="?page=layout">Search Page Layout</a>?>
	                    <li>
	                    	<?php echo $html->link('Core', array( 'controller'=>'core', 'action'=>'index', 'admin' => true))?>
	                    	<ul>
	                    		<li><?php echo $html->link('Settings', array('controller' => 'core', 'action' => 'setting', 'admin' => true)); ?></li>
	                    		<li><?php echo $html->link('Troubleshoot', array('controller' => 'core', 'action' => 'troubleshoot','admin' => true)); ?></li>
	                    	</ul>
	                    </li>
                    <?php endif; ?>
                    </ul>
                    </div>




    <div class="center_content">



    <div class="left_content">
           	<?php if($user): ?>

    		<div class="sidebar_search">
              <?php
                echo $form->create(null, array(
                  'url' => array(
                    'controller'=>'indices',
                    'action'=>'search',
                    'admin' => false
                  ),
                  'type' => 'get'
                ));
                echo $form->input('q', array(
                  'label' => false,
                  'class' => 'search_input'
                ));
                echo $form->submit('search.png', array('class'=>'search_submit'));
                echo $form->end()
             ?>
       </div>

            <div class="sidebarmenu">
	                <?php //<a class="menuitem //submenuheader" href="?page=main">ACP Home</a>?>
	                <?php //echo $html->link('ACP Home', array('controller'=>'profiles', 'action'=>'index'), array('class' => 'menuitem'))?>
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
	                <?php /*
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
	                </div>
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
	                </div>
	                <a class="menuitem" href="?page=users">Manage Users</a>
	                <a class="menuitem" href="?page=settings">Settings</a>
	                <a class="menuitem" href="?page=layout">Search Page Layout</a>
	                <a class="menuitem" href="?page=contact">Contact TSEP</a>
	                */?>
	                <?php /*
	                <a class="menuitem" href="">Blue button</a>

	                <a class="menuitem_green" href="">Green button</a>

	                <a class="menuitem_red" href="">Red button</a>
	                    */?>
            </div>

            <?php /*
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h3>User help desk</h3>
                <?php echo $html->image('info.png', array('class'=>'sidebar_icon_right'))?>
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
                <?php echo $html->image('notice.png', array('class'=>'sidebar_icon_right'))?>
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
			*/ ?>
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
    	<?php endif; ?>
    </div>

    <div class="right_content">

	    <div id="content">
		    <?php
		    	echo $session->flash();
				echo $content_for_layout;
			?>
		</div>
		<div id="loader">
			<?php echo $html->image('ajax-loader-large.gif')?>
		</div>
    </div>
    <!-- end of right content-->


  </div>   <!--end of center content -->




    <div class="clear"></div>
    </div> <!--end of main content-->


    <div class="footer">

    	<div class="left_footer">TSEP ACP | Powered by <a href="http://indeziner.com">INDEZINER</a></div>
    	<div class="right_footer"><a href="http://indeziner.com"><?php echo $html->image('indeziner_logo.gif')?></a></div>

    </div>

</div>
</body>
</html>