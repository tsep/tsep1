<?php
/**
* If MySQL Version <4 (boolean search will not work) and TSEP shall notify the user and there are some search results we do so.
*
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-05-17 17:18:57 +0200 (Di, 17 Mai 2005) $
*  @lastedited $LastChangedBy: olaf $
*  $LastChangedRevision: 41 $
*
*/

if ($page_count != "") // needed so that we can show the mysql warning down here again
{
	if (($mysqlversion_is_ok==false) && ($tsep_config['Display_Boolean_Search']=="true")) // this means it is an old (<4) mysql version with no boolean search
	{ ?>
		<div class="SearchBlock">
			<div class="oldMySQLVersion">
				<?php echo $tsep_lng['mysql_boolean_warning']; ?>			
			</div>
		</div>
	<?php
	}
}	
?>
