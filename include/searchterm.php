<?php
/**
* Show what was searched for. Code recycling
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

// Building array of search term and regex for printHighlightedSentences()
	if (strpos($gSearchForRegEx,'|')) {
		// Put more than one search term into an array
		$regex = str_replace(array('(', ')'), '', $gSearchForRegEx);								
		foreach ($search_words as $value) {
			$search_regex[] = "/((<[^>]*)|$value)/ie";
		}
	} else {			
		// Put only one search term into an array		
		#$search_words = array(str_replace(array('(',')'), '', $gSearchForRegEx));
		$search_regex = array("/((<[^>]*)|$gSearchForRegEx)/ie");
	}
	
	// Build highlighted search terms
	$search_term = "";
	foreach ($search_words as $key => $value) {
		$search_term .= sprintf('<span class="tsephl%s">%s</span> ', $key+1, $value);
		if ($key == 9) {
			break;
		}
	}
	?>
	<div class="SearchForWhatSearchTerm">
	<?php echo $tsep_lng['searched_site_for']; ?> <div class="SearchWord"><?php 
        #convert_to_htmlent($search_term);                 // make search string as it was
        print $search_term;                                                // show search string
        #convert_from_htmlent($search_term);               // make search string as it was            
    ?></div>
	</div>
	<?
?>