<?php
  $html->script('/install/js/install', array('inline' => false))
?>
    <fieldset id="pt1">
        <legend><span>Step </span>1. <span>: Mysql Host and Port</span></legend>
        <h3>Mysql Host and Port</h3>
        <div class="help">Enter the settings needed to connect to the mysql server</div>
        <label for="server">Server/Port</label>
        <?php echo $form->input('Install.server', array('id' => false, 'label' => false, 'tabindex' => '1'))?>
        <label for="login">Username</label>
        <?php echo $form->input('Install.login', array('id' => false,'label' => false, 'tabindex' => '2'))?>
        <label for="password">Password</label>
        <?php echo $form->input('Install.password', array('id' => false,'type' => 'password','label' => false, 'tabindex' => '1'))?>
    </fieldset>
    <fieldset id="pt2" >
        <legend><span>Step </span>2. <span>: Database and Prefix</span></legend>
        <h3>Database and Prefix</h3>
        <div class="help">Enter the Mysql Database name and Table Prefix below</div>
        <label for="database">Database</label>
        <?php echo $form->input('Install.database', array('id' => false,'label' => false, 'tabindex' => '1'))?>
        <label for="prefix">Prefix</label>
        <?php echo $form->input('Install.prefix', array('id' => false,'label' => false, 'tabindex' => '1'))?>
    </fieldset>
    <fieldset id="pt3" <?php //class="error"?> >
        <legend><span>Step </span>3. <span>: Username and Password</span></legend>
        <h3>Username and Password</h3>
        <div class="help">Enter the Initial Login details below.</div>
        <?php //<strong class="error">An email address is required!</strong>?>
        <label for="username">Username</label>
        <?php echo $form->input('Install.user', array('id' => false,'label' => false, 'tabindex' => '1'))?>
        <label for="password">Password</label>
        <?php echo $form->input('Install.pass', array('id' => false,'label' => false, 'tabindex' => '1'))?>
    </fieldset>
    <fieldset id="pt4" >
        <legend>Step 4  : Submit form</legend>
        <h3>Terms of Service</h3>
        <div id="disclaimer"></div>
        <input type="submit" id="submitform" tabindex="6" value="Complete Installation &raquo;" />
    </fieldset>
    <div id="copyright">Powered by <a href="http://tsep.sf.net/">The Search Engine Project</a></div>
