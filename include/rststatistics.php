<?php
/**
* to use this recordset statistics wherever we need them
*
* @param string $startRow
* @param string $maxRows
* @param string $totalRows
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/


/**
* to use this recordset statistics wherever we need them
*
* @param string $startRow
* @param string $maxRows
* @param string $totalRows
* @author Olaf Noehring
* @lastedited Olaf Noehring
*/
function RSTStatistics (&$startRow,&$maxRows,&$totalRows)
{
    global $tsep_lng;
    
	?>
	<div class="Statistics">
		<?php echo $tsep_lng['records']; ?>&nbsp;<?php echo ($startRow + 1) ?>&nbsp;<?php echo $tsep_lng['to']; ?>&nbsp;<?php echo min($startRow + $maxRows, $totalRows) ?>&nbsp;<?php echo $tsep_lng['of']; ?>&nbsp;<?php echo $totalRows ?>
	</div>
	<?php
}
?>
