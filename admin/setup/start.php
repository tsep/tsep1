<?php require_once __DIR__.'/../../include/global.php'; ?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Welcome to TSEP</title>
        <script type="text/javascript">
        window.onload = function () {
        	xmlhttp = new XMLHttpRequest();
           
            xmlhttp.open("GET", "index.php?Step=next",true);
             xmlhttp.onreadystatechange=function() {
              if (xmlhttp.readyState==4) {
                   eval(xmlhttp.responseText);
              }
             };
             xmlhttp.send(null);
        };
        </script>
    </head>
    <body>
    <!--[if IE]>
       <script type="text/javascript"> 
        alert("Your Browser seems to not be compatible with the new setup.\n" + 
            "It is recommeded that you upgrade to a newer browser, like\n" +
            "Chrome 6, Safari 5, FireFox 3.6, or Opera 10.50. You will now be \n" +
            "Redirected to our older setup, which supports older browsers.");
         window.location = "index.php?Step=next";
        </script>
    <![endif]-->
        <center style="margin-top:30%;">
            <h4>Loading, Please Wait...</h4>
        </center>
    </body>

</html>