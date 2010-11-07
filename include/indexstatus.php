<?php
/**
* Show the status of the indexing: How many pages are in the index, when was the last indexing date
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

?>
<div class="indexingStatus">
	<?php
	if (isset($db_item_num) && ($db_item_num>0))
	{ ?>
	<div class="ListOfIndexedFiles">
		<div class="ListOfIndexedFilesCount"><?php echo $db_item_num;?></div>&nbsp;<?php echo $tsep_lng['pages_found'];?>
	</div>		
	<?php
	}
	?>
	
	<div class="IndexEditDate">
		<?php echo $tsep_lng['index_edit_date'] ;?>&nbsp;
		<div class="IndexEditDateValue"><?php
				read_indexedit_date($database_tsepdbconnection);
			?>
		</div>
	</div>
</div>
