<h2>Troubleshoot your installation</h2>
<p>The Error Log can be used to diagnose problems. Below is the output of the error log. You should not allow this log to be publicly disclosed. It may contain sensitive information. Please do not submit the log if you are not having trouble with your installation. This is only for support.</p>
<textarea rows="10" cols="75" readonly="readonly" wrap="off">
<?php echo $log?>
</textarea>
<h2>Get Support</h2>
<ul>
	<li>
		<?php echo $html->link('Submit the Error Log', array('controller'=>'help', 'action'=>'submit'))?> <br />
	</li>
	<li>
		<?php echo $html->link('Clear the Error Log', array('controller'=>'help', 'action' => 'clean'))?> <br />
	</li>
	<li>
		<?php echo $html->link('Visit the Help forum', 'http://tsep.info/p/help', array('target' => '_blank'))?> <br />
	</li>
	<li>
		<?php echo $html->link('Submit a new Ticket', 'http://tsep.info/p/newticket', array('target' => '_blank'))?> <br />
	</li>
</ul>
