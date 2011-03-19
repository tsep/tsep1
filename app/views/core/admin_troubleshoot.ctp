<h2>Troubleshoot your installation</h2>
<p>The Error Log can be used to diagnose problems. Below is the output of the error log. You should not allow this log to be publicly disclosed. It may contain sensitive information. Please do not submit the log if you are not having trouble with your installation. This is only for support.</p>
<textarea rows="10" cols="75" readonly="readonly" wrap="off">
<?php echo $log?>
</textarea>

<?php 
	echo $form->create('SubmitLogForm', array('url' => '/admin/core/troubleshoot'));
	echo $form->hidden('SubmitLog');
	echo $form->end('Submit Error Log');
 
	echo $form->create('ClearLogForm', array('url' => '/admin/core/troubleshoot'));
	echo $form->hidden('ClearLog');
	echo $form->end('Clear Error Log');
?>

<h2>Get Support</h2>

<ul>
	<li>
		<?php echo $html->link(__('Visit the Help forum', true), 'http://www.tsep.info/p/ask', array('target' => '_blank'))?> <br />
	</li>
	<li>
		<?php echo $html->link(__('Submit a new Ticket', true), 'http://www.tsep.info/p/newticket', array('target' => '_blank'))?> <br />
	</li>
</ul>
