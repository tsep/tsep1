<?php
/**
* This is the status of the search results.
*
* Shows:
*  searchterm
*  page x of X
*  search took ... seconds
*
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-06-11 18:55:44 +0200 (Sa, 11 Jun 2005) $
*  @lastedited $LastChangedBy: toon $
*  $LastChangedRevision: 134 $
*
*/

?>
<div class="SearchBlock">
	<?php require( TSEP_INCLUDE_DIR."/searchterm.php"); //use code-recycling whereever possible !?>
	<div class="SearchResultPaging">
	    <?php
		if (((floor($page_count/$tsep_config['How_Many_Results'])+1)*$tsep_config['How_Many_Results']) == $e)
		{
			$page_count_max=$page_count;
		}
		else
		{
			$page_count_max=$e;
		}
		
		// take the real minimum value ! this is a work-around for a bug in the calculation which I have not found yet
		$page_count_max= min ($page_count,$page_count_max);

		?>
<?php echo $tsep_lng['results']; ?> <div class="SearchPage"><?php print ($s+1) ?> - <?php print $page_count_max ?></div> <?php echo $tsep_lng['of']; ?> <div class="SearchPage"><?php print $page_count ?></div> <?php echo $tsep_lng['matches']; ?>
<?php require(TSEP_INCLUDE_DIR."/timeneeded.php"); //how long did it take to build the page?>
  </div>
</div>
