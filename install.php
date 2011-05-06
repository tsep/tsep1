<?php
/**
* OneClick Installation for The Search Engine Project
*
* @author Geoffrey
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: $
*  $LastChangedBy:  $
*  $LastChangedRevision: $
*
*/
/*
 * ONECLICK INSTALLATION FOR THE SEARCH ENGINE PROJECT
 *
 * INSTRUCTIONS:
 * 1.UPLOAD THIS FILE TO THE DIRECTORY THAT YOU WANT TSEP INSTALLED IN
 * 2.TYPE THE URL TO THAT DIRECTORY IN YOUR BROWSER AND PRESS GO
 *
 * YOU WILL BE GUIDED THROUGH THE REST OF THE SETUP. DO NOT CLOSE YOUR
 * BROWSER DURING THIS PROCESS. DOING SO MAY CAUSE SECURITY ISSUES
 * WITH YOUR SITE DUE TO INCOMPLETE INSTALLTION
 *
 * -----------------------
 * DO NOT RENAME THIS FILE
 * -----------------------
 *
 */

/*
 * EDIT BELOW THIS LINE AT YOUR OWN RISK
 */

  session_start();
    if(empty($_GET['install'])) {
        $_SESSION = array();
?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
    <style type="text/css">
        #main, #error {
          text-align:center;
          margin-top:30%;
        }
        #error {
            display:none;
        }
    </style>
    </head>
    <body>
    <div id="main">
        <p><b>[OneClick Installer]</b> Installing The Search Engine Project...</p>
        <img alt="Processing" src="http://www.tsep.info/home/sites/default/files/u/1/iprogress.gif" />
    </div>
    <div id="error">
        <p><b>[OneClick Installer]</b><span style="color:red;">An unexpected error occurred!</span></p>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
  <script type="text/javascript">
   $(window).load(function () {setTimeout(
    function install () {
      $.get(location.href, {install : 'go'}, function (data){
        if(data != 'done')
          install();
        else
          window.location.reload();
      });
    }
   ,10)
    $('body').ajaxError(function () {
        $("#main").hide();
        $("#error").show();
    });
   });
  </script>
    </body>
</html>
<?php
    die();     //So we don't have to wrap the install code in an if block
    }

    //<functions>

    function downloadFile ($url, $path) {
                 $newfname = $path;
                 $file = fopen ($url, "rb");
                 if ($file) {
                   $newf = fopen ($newfname, "wb");

                   if ($newf)
                   while(!feof($file)) {
                     fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
                   }
                 }

                 if ($file) {
                   fclose($file);
                 }

                if ($newf) {
                  fclose($newf);
                }
    }

    //</functions>

    //<variables>

    $url = 'http://www.tsep.info/php/update/get.php?version=latest';

    //<variables>

    if(empty($_SESSION['step']))
        $_SESSION['step'] = 0;

    $_SESSION['step']++;

    switch ($_SESSION['step']) {

        case 1:
            $abspath = file_get_contents($url);
            $_SESSION['path'] = $abspath;
            break;
        case 2:
            $path = dirname(__FILE__).DIRECTORY_SEPARATOR.'application.update.zip';
            downloadFile($_SESSION['path'], $path);
            break;
        case 3:
            $zip = new ZipArchive;
            if ($zip->open(dirname(__FILE__).DIRECTORY_SEPARATOR.'application.update.zip') === TRUE) {
                $zip->extractTo(dirname(__FILE__));
                $zip->close();
                unlink(dirname(__FILE__).DIRECTORY_SEPARATOR.'application.update.zip');
            }
            echo 'done';
            break;

    }
