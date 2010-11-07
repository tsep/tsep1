<?php 

	require_once __DIR__.'/../../include/global.php'; 
	Security::protect(); 
	
	if(ae_detect_ie())
	header("Location:index.php?Step=next");

?>

//for Backward Comaptibility only (shame to all browsers that need this):
	document.head = document.head || document.getElementsByTagName('head')[0];
	
	window.clientRoot = "<?php echo TSEP_CLIENT_ROOT?>";
	
	xmlhttp = new XMLHttpRequest();
           
            xmlhttp.open("GET", "<?php echo TSEP_CLIENT_ROOT?>/static/js/setup.js",true);
             xmlhttp.onreadystatechange=function() {
              if (xmlhttp.readyState==4) {
                   var scriptElement = document.createElement("script");
                   
                   scriptElement.type = "text/javascript";
                   scriptElement.text = xmlhttp.responseText;
                   
                   document.head.appendChild(scriptElement);
              }
             };
    xmlhttp.send(null);
    