<?php
  $html->script('/install/js/install', array('inline' => false))
?>
    <fieldset id="pt1" <?php echo (empty($one) ? '':'class="error"')?>>
        <legend><span>Step </span>1. <span>: Mysql Host and Port</span></legend>
        <h3>Mysql Host and Port</h3>
        <div class="help">Enter the settings needed to connect to the mysql server</div>
        <?php if (!empty($one)) {?><strong class="error"><?php echo $one?></strong><?php }?>
        <label for="server">Server/Port</label>
        <?php echo $form->input('Install.server', array('id' => false, 'label' => false, 'tabindex' => '1'))?>
        <label for="login">Username</label>
        <?php echo $form->input('Install.login', array('id' => false,'label' => false, 'tabindex' => '2'))?>
        <label for="password">Password</label>
        <?php echo $form->input('Install.password', array('id' => false,'type' => 'password','label' => false, 'tabindex' => '3'))?>
    </fieldset>
    <fieldset id="pt2" <?php echo (empty($two) ? '':'class="error"')?>>
        <legend><span>Step </span>2. <span>: Database and Prefix</span></legend>
        <h3>Database and Prefix</h3>
        <div class="help">Enter the Mysql Database name and Table Prefix below</div>
        <?php if (!empty($two)) {?><strong class="error"><?php echo $two?></strong><?php }?>
        <label for="database">Database</label>
        <?php echo $form->input('Install.database', array('id' => false,'label' => false, 'tabindex' => '4'))?>
        <label for="prefix">Prefix</label>
        <?php echo $form->input('Install.prefix', array('id' => false,'label' => false, 'tabindex' => '5'))?>
    </fieldset>
    <fieldset id="pt3" <?php echo (empty($three) ? '':'class="error"')?>>
        <legend><span>Step </span>3. <span>: Username and Password</span></legend>
        <h3>Username and Password</h3>
        <div class="help">Enter the Initial Login details below.</div>
        <?php if (!empty($three)) {?><strong class="error"><?php echo $three?></strong><?php }?>
        <label for="username">Username</label>
        <?php echo $form->input('Install.user', array('id' => false,'label' => false, 'tabindex' => '6'))?>
        <label for="password">Password</label>
        <?php echo $form->input('Install.pass', array('id' => false,'label' => false, 'tabindex' => '7', 'type' => 'password'))?>
    </fieldset>
    <fieldset id="pt4" >
        <legend>Step 4  : Submit form</legend>
        <h3>Terms of Service</h3>
        <div id="disclaimer">Note: due to <a href="http://bugs.php.net/bug.php?id=50953">this</a> bug, it is recommended that you enter
         '127.0.0.1' into the MySQL server field instead of 'localhost'. If you have a problem during installation, open a ticket
          <a href="http://tsep.info/p/newticket">here</a>. We thank you for installing The Search Engine Project, and hope that 
          you have a good experience with this application.</div>
        <input type="submit" id="submitform" tabindex="8" value="Complete Installation &raquo;" />
    </fieldset>
    <div id="copyright">Powered by <a href="http://tsep.sf.net/">The Search Engine Project</a></div>
	<div class="loader" style="display:none;">
  		<?php echo $html->image('ajax-loader.gif')?>
	</div>