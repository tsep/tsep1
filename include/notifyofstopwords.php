<?php
/**
* notify the user if his search term contained stopwords and show him which
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

if (isset($forbidden_stopwords))
{ ?>
	<div class="SearchBlock">
		<div class="SearchForForbiddenStopwordsBlock">
			<?php echo $tsep_lng['forbidden_stopword']; ?>
			
			<?php
			foreach($forbidden_stopwords as $forbidden_stopword)  //list all stopwords the user has searched for
			{ ?>
			&quot;<span class="SearchForForbiddenStopword"><?php echo $forbidden_stopword; ?></span>&quot;
			<?php
			}
			?>					
			
		</div>
	</div>
<?php
}
	
?>
