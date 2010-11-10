<?php
/**
 * @abstract TSEP administrators main menu
 * @package The Search Engine Project
 * @copyright (C) 2005 by TSEP Development Team
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @since TSEP 0942
 * @tables none
 * @author Manfred Jedlicka
 *
 * following will be filled automatically by SubVersion!
 * Do not change by hand!
 *  $LastChangedDate$
 *  @lastedited $LastChangedBy$
 *  $LastChangedRevision$
 **/

require_once __DIR__.'/../include/global.php';

header("Location:admin_new/");
die();

db::connect();

//require_once( "../include/tseptrace.php" );



/**
 * writeScreenBegin()
 * 
 * Builds the HTML code for the header of a page
 * 
 * @param integer $processStep The step the user is in
 * @return string HTML code
 **/
function writeScreenBegin( $processStep, $resetGlobalError=TRUE ) {
    global $processSteps, $tsep_lng;
    
    if ( $resetGlobalError ) {
        $_SESSION["globalErrorCode"] = 0;
        $_SESSION["globalErrorMessage"] = "";
    }
    
    $classActiveCell = "class=\"ActiveCell\"";
    $classActiveText = "class=\"ActiveText\"";
    
    $classInactiveCell = "class=\"InactiveCell\"";
    $classInactiveText = "class=\"InactiveText\"";

    /* Force the browser into UTF-8 display mode */
    $headers  = "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    
    header($headers);
    
    $srv = preg_replace("/\/.+$/", "://" . $_SERVER['HTTP_HOST'], $_SERVER["SERVER_PROTOCOL"]);
    $srv = strtolower($srv);
    
    $html = "";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
      <html>
    
     <head>
       <title>TSEP <?php echo(isset($_SESSION["tsepVersion"])?$_SESSION["tsepVersion"]:"")." - ".$tsep_lng['adminmainmenu_AdminMainMenu']?></title>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
       <meta http-equiv="expires" content="0" />
      <link href="<?php echo TSEP_CLIENT_ROOT?>/static/css/tsep_setup.css" rel="stylesheet" type="text/css" />
       <script type="text/javascript" src="<?php echo TSEP_CLIENT_ROOT?>/static/js/overlib.js">    <!-- overLIB (c) Erik Bosrup -->  </script>
       <script type="text/javascript" src="<?php echo TSEP_CLIENT_ROOT?>/static/js/jquery.js"></script>
       
       <script type="text/javascript">       
       $.get("updater.php", function(data){
    		   if (data == "yes") {
                   $("#runUpdatePanel").show("slow");
               } else {
                    $("#updatePanel").html("No update avaliable");
                }         
       });

       function runUpdate() {

    	    $("#runUpdatePanel").hide("fast");
    	    $("#updatePanel").html("Updating, please wait...");
    	    $("#updatePanel").show("slow", function () {

    	        $.get("updater.php?Update=yes", function (data) {
    	            if (data == "done") {

    	            	$("body").html("<center style='margin-top:40%;'>Please Wait, Completing Update (Reloading Page)</center>");
                        $("head").html("<title>Reloading Page...</title>");
    	                location.reload();
    	                
        	        }
    	            else {
    	                $("#updatePanel").html("Update Failed");
        	        }
        	   });
   	    	 
        	 });
       }

       </script>
       
       
       <style>
       h1 { color: limegreen; font-size: x-large; }
       h2 { color: limegreen; font-size: medium; margin-left:1ex;}
       h3 { color: limegreen; font-size: small;  margin-left:2ex;}
       a.asilver,a.asilver:hover,a.asilver:link,a.asilver:visited { color:silver; border:1px white none; }
       a.lgreen, a.lgreen:hover, a.lgreen:link, a.lgreen:visited  { color:limegreen; font-size:x-small; border:1px white none; }
       </style>
     </head>
    
     <body>
       <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
    
       <div class="tsepSetup">
         <div style="padding: 4px;">

           <table border="0" cellpadding="0" cellspacing="0">
             <tr>
               <td><img style="width: 310px; height: 61px;" alt="{$tsep_lng['tsep']}" src="../graphics/tsep.gif"></td>
               <td class="setupHeader"><?php echo $tsep_lng['adminmainmenu_AdminMainMenu']?></td>
             </tr>
             <tr><td colspan='2' style='text-align:right;'><a class='lgreen' href='<?php echo $srv?>'><?php echo $srv?></a></td></tr>
           </table>

         </div>

         <table class="mainContentTable" cellpadding="0" cellspacing="0">
           <tr>
             <td class="contentCell">
    <?php
    if ( isset( $_GET["errorMsg"] ) ) {
    	
    	?>
                <table style="border: 0px none; width: 100%;" cellpadding="4" cellspacing="0">
                  <tr>
                    <td class="errorMessage">".addslashes( $_GET["errorMsg"] )."</td>
                  </tr>
                  <tr>
                    <td><br /></td>
                  </tr>
                </table>
        <?php 
        
        unset( $_GET["errorMsg"] );
    }
        
    return $html;
} // writeScreenBegin



/**
 * writeIntroText()
 * 
 * Builds the HTML code for the intro page.
 * 
 * @return string HTML code for the page
 **/
function writeIntroText() {
		global $tsep_lng, $tsep_language;
		
    $html  = writeScreenBegin( "intro" );
    
    /*
    // show list of languages for selection
    $html .= "<form name='frmLanguage' id='frmLanguage' method='post' action='" . $_SERVER["PHP_SELF"] . "'>\n";
    $html .= "<div style='margin:1ex 0ex 1ex 0ex;'>" . $tsep_lng['select_language'] . ":";
    $html .= " <select name='lang' size='1' class='formfieldvalue_combo' onChange=\"document.frmLanguage.submit()\">\n";
	$d = opendir("../language");
	while (($lclLang = readdir($d)) != false) {
		if ( $lclLang != "." && $lclLang != ".." && ( strlen($lclLang) == 2 || strlen($lclLang) == 5 ) ) {
			$lclLangDesc = ( ( isset($tsep_language[$lclLang]) and !empty($tsep_language[$lclLang]) ) ?  $tsep_language[$lclLang] : $lclLang );
		    $html .= "  <option value='$lclLang'" . (($_SESSION['lang'] == $lclLang) ? " selected='selected'>" : ">");
		    $html .= "$lclLangDesc</option>\n";
		}
	}
	closedir($d);
    $html .=  " </select>\n";
    $html .=  " </form>\n";*/
    ?>
    </div>
    
    <div id="updatePanel">Checking for Updates...</div>
    
    <div id="runUpdatePanel" style="display:none">
    <form action="index.php">
        Update Avaliable. <input value="Update Now" type="button" onclick="runUpdate();" />    
    </form> 
    </div>
    
    <a href="admin_new">Visit the new admin panel(beta)</a>
    
    <?php echo writeLinks(); ?>
    
                </td>
            </tr>
        </table>
    </div>
    
    </body>
    </html>
<?php 
    return $html;
} // writeIntroText

/***  END: Process step: Introduction  **************************************************/
/***  BEGIN: Process step: Database setup  **********************************************/

/**
 * writeLinks()
 * 
 * writes Links and texts onto page
 * 
 * @return string HTML code to the form
 **/
function writeLinks() {

    global $tsep_lng;

	/**
	 * array => key
	 *				any within array unique key
	 *			data
	 *				array =>	"type" - possible values: "h1", "h2", "h3", "link"
	 *							"capt" - $tsep_lng-key to be used as caption for this topic
	 *										(for all "type"s)
	 *							"desc" - $tsep_lng-key to be used as description for this topic
	 *										(for "type"="link" only)
	 *							"url"  - url to be used as link
	 *										(for "type"="link" only)
	 *
	 **/

	$larrLinks = array(	"tsep_at_yours"			=> array(	"type"	=> "h1",
															"capt"	=> "adminmainmenu_groupcapt_tsep_at_yours",
														),
						"tsephelp"				=> array(	"type"	=> "h2",
															"capt"	=> "help",
														),
						"localhelp"				=> array(	"type"	=> "link",
															"url"	=> "../docs/index.htm",
															"capt"	=> "help",
															"desc"	=> "adminmainmenu_linkdesc_localhelp",
														),
						"tsepinfophp"			=> array(	"type"	=> "link",
															"url"	=> "./tsepinfo.php",
															"capt"	=> "adminmainmenu_linkcapt_tsepinfophp",
															"desc"	=> "adminmainmenu_linkdesc_tsepinfophp",
														),
						/*"tsep_at_yours_init"	=> array(	"type"	=> "h2",
															"capt"	=> "adminmainmenu_groupcapt_tsep_at_yours_init",
														),
						"setup"					=> array(	"type"	=> "link",
															"url"	=> "./setup.php",
															"capt"	=> "setup_Setup",
															"desc"	=> "adminmainmenu_linkdesc_setup",
														),*/
						"tsep_at_yours_atwork"	=> array(	"type"	=> "h2",
															"capt"	=> "adminmainmenu_groupcapt_tsep_at_yours_atwork",
														),
						"tsep_at_yours_atwork1"	=> array(	"type"	=> "h3",
															"capt"	=> "adminmainmenu_groupcapt_tsep_at_yours_atwork1",
														),
						"configuration"			=> array(	"type"	=> "link",
															"url"	=> "./configuration.php",
															"capt"	=> "configuration",
															"desc"	=> "adminmainmenu_linkdesc_configuration",
														),
						"stopwords"				=> array(	"type"	=> "link",
															"url"	=> "./stopwords.php",
															"capt"	=> "stopwords",
															"desc"	=> "adminmainmenu_linkdesc_stopwords",
														),
						"configcontentimgs"		=> array(	"type"	=> "link",
															"url"	=> "./configcontentimages.php",
															"capt"	=> "configure/manage contentimgs",
															"desc"	=> "adminmainmenu_linkdesc_configcontentimgs",
														),
						"tsep_at_yours_atwork2"	=> array(	"type"	=> "h3",
															"capt"	=> "adminmainmenu_groupcapt_tsep_at_yours_atwork2",
														),
						"indexer"				=> array(	"type"	=> "link",
															"url"	=> "./indexer.php",
															"capt"	=> "create_new_index",
															"desc"	=> "adminmainmenu_linkdesc_indexer",
														),
						"indexoverview"			=> array(	"type"	=> "link",
															"url"	=> "./indexoverview.php",
															"capt"	=> "index_overview_title",
															"desc"	=> "adminmainmenu_linkdesc_indexoverview",
														),
						"showcompleteindex"		=> array(	"type"	=> "link",
															"url"	=> "./indexer.php?showcompleteindex",
															"capt"	=> "indexed_words",
															"desc"	=> "adminmainmenu_linkdesc_showcompleteindex",
														),
						"tsep_at_yours_atwork3"	=> array(	"type"	=> "h3",
															"capt"	=> "adminmainmenu_groupcapt_tsep_at_yours_atwork3",
														),
						"logviewstats"			=> array(	"type"	=> "link",
															"url"	=> "./logviewstats.php",
															"capt"	=> "logviewstats_title",
															"desc"	=> "adminmainmenu_linkdesc_logviewstats",
														),
						"logview"				=> array(	"type"	=> "link",
															"url"	=> "./logview.php",
															"capt"	=> "logview_title",
															"desc"	=> "adminmainmenu_linkdesc_logview",
														),
						"bgindexinglog"			=> array(	"type"	=> "link",
															"url"	=> "../bgindexing.log",
															"capt"	=> "adminmainmenu_linkcapt_bgindexinglog",
															"desc"	=> "adminmainmenu_linkdesc_bgindexinglog",
														),
						"tsep_at_yours_extras"	=> array(	"type"	=> "h2",
															"capt"	=> "adminmainmenu_groupcapt_tsep_at_yours_extras",
														),
						"extras_examples"		=> array(	"type"	=> "link",
															"url"	=> "./examples",
															"capt"	=> "adminmainmenu_linkcapt_examples",
															"desc"	=> "adminmainmenu_linkdesc_examples",
														),
						"extras_exampletemplates"=> array(	"type"	=> "link",
															"url"	=> "../contentimages/filelists/transformation_templates",
															"capt"	=> "adminmainmenu_linkcapt_exampletemplates",
															"desc"	=> "adminmainmenu_linkdesc_exampletemplates",
														),
						"tsep_in_the_www"		=> array(	"type"	=> "h1",
															"capt"	=> "adminmainmenu_groupcapt_tsep_in_the_www",
														),
						"tsepinfo"				=> array(	"type"	=> "link",
															"url"	=> "http://www.tsep.info",
															"capt"	=> "adminmainmenu_linkcapt_tsepinfo",
															"desc"	=> "adminmainmenu_linkdesc_tsepinfo",
														),
						"sfdotnet"				=> array(	"type"	=> "link",
															"url"	=> "http://www.sourceforge.net/projects/tsep",
															"capt"	=> "adminmainmenu_linkcapt_sfdotnet",
															"desc"	=> "adminmainmenu_linkdesc_sfdotnet",
														),
					);

	$html = "";
	foreach ( $larrLinks as $lkey => $larrData ) {
		$llngCapt = $larrData["capt"];
		$llngCapt = preg_replace("/([^a-zA-Z0-9_]+)/", ".'$1'.", $llngCapt);
		$llngCapt = preg_replace("/([a-zA-Z0-9_]+)/", "\$tsep_lng['$1']", $llngCapt) . ";";
		eval("\$llngCapt = $llngCapt;");
		switch ( $larrData["type"] ) {
			case "h1":
			case "h2":
			case "h3":
				$html .= "<" . $larrData["type"] . ">" . $llngCapt . "</" . $larrData["type"] . ">\n";
				break;
			case "link":
				$llngDesc = $tsep_lng[$larrData["desc"]];
				$html .= "<div style='margin:1.5ex 0ex 1ex 3ex;'>\n";
				$html .= "<div style='margin-bottom:0.5ex;'>\n";
				$html .= "<a href='" . $larrData['url'] . "'>$llngCapt</a>\n";
				$html .= "<span style='margin-left:2ex;font-size:small;color:silver;'>(<a class='asilver' href='" . $larrData['url'] . "'>" . $larrData['url'] . "</a>)</span>";
				$html .= "</div>";
				$html .= "<div style='margin-left:3ex; font-size:small;'>$llngDesc</div>\n";
				$html .= "</div>\n";
				break;
		}
	} 
    
    $html .= "</body>\n";
    $html .= "</html>\n";
    return $html;
} // writeLinks()



/* All config variables are stored in the session var */
session_start();

/* The dbSetupForm is POSTed because the */
/* password is passed in clear text.     */
/* To keep in line with the rest of the  */
/* code, $_POST is copied to $_GET.      */
if ( isset( $_POST ) and count( $_POST ) > 0 ) {
    $_GET = $_POST;
}

if ( !isset($_GET["lang"]) )
	if ( !isset($_SESSION["lang"]) )
		$_GET["lang"] = "en_US";
	else
		$_GET["lang"] = $_SESSION["lang"];
$_SESSION["lang"] = $_GET["lang"];

if ( $_GET["lang"] != "en_US" )
	require_once( "../language/" . $_GET["lang"] . "/language.php" );

echo writeIntroText();

?>
