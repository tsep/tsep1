<?php
/**
* outputs the number (real rank) of this result if this is enabled as well as leading and following characters
*
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/

if  ($tsep_config['Numbers_Put']=="true")	// output the number of this result
{
	?>
	<div class="resultnumber" title="<?php echo $tsep_lng['page_rank_real'];?>">
		<?php echo $tsep_config['Numbers_Put_Before'].($i+1).$tsep_config['Numbers_Put_After']; ?>
	</div>
	<?php
}
?>
