<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">

			<head profile="http://www.w3.org/2005/10/profile">

              <title>Regular Expression Generator</title>
			  <link rel="stylesheet" type="text/css" href="../css/regex.css" />
			  </head>

<body id="toolPage">

<?php

//TODO: Clean-up page.

    echo $html->script('jquery');
    echo $html->script('regex');
    echo $html->script('regexpage');
?>

    <div id="content" class="content">

      <h2>JavaScript Regex Generator <span style="font-weight: normal; color: #d54822;">(beta)</span></h2>

      <noscript>

        <div class="note">

          JavaScript is not enabled. The regex generator is written completely

          for client side execution so you need to turn on JavaScript to use it.

        </div>

      </noscript>

		Please create the regular expression for the URL to match to and then press submit.

    </div>

  </body>

</html>