<?php
	require_once __DIR__.'/../../include/global.php';
	Security::protect();
	
	function do_post_request($url, $data, $optional_headers = null)
	{
	  $params = array('http' => array(
	              'method' => 'POST',
	              'content' => $data
	            ));
	  if ($optional_headers !== null) {
	    $params['http']['header'] = $optional_headers;
	  }
	  $ctx = stream_context_create($params);
	  $fp = @fopen($url, 'rb', false, $ctx);
	  if (!$fp) {
	    throw new Exception("Problem with $url, $php_errormsg");
	  }
	  $response = @stream_get_contents($fp);
	  if ($response === false) {
	    throw new Exception("Problem reading data from $url, $php_errormsg");
	  }
	  return $response;
	}

?>

<h2>Contact The Search Engine Project</h2>
<h2>Error Log</h2>
<p>The Error Log can be used  to diagnose problems. Below is the output of the error log. You should not allow this log to be publicly disclosed. It may contain sensitive information. Please do not submit the log if you are not having trouble with your installation. This is only for support.</p>
<textarea rows="10" cols="75" readonly="readonly" wrap="off">
<?php echo errorHandler::getLog();?>
</textarea>
<form action="?page=contact" method="post">
<dl class="submit">
	<input class="button" type="submit" name="submitlog" value="Submit Log for Debugging" />
</dl>
</form>
<h2>Submit a ticket</h2>
<p>To submit a new ticket, <a href="http://p.sf.net/tseproject/newticket">click here</a></p>

