<?php
/**
* Makes the dropdown field where the user can select how many results to show on one page show the value the user has selected before
*
* @param string $user_e
* @param string $resultsPerPage
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-05-17 17:18:57 +0200 (Di, 17 Mai 2005) $
*  @lastedited $LastChangedBy: olaf $
*  $LastChangedRevision: 41 $
*
*/


/**
* Makes the dropdown field where the user can select how many results to show on one page show the value the user has selected before
*
* @param string $user_e
* @param string $resultsPerPage
* @author Olaf Noehring
* @lastedited Olaf Noehring
*/
function show_results_per_page_test($user_e, $resultsPerPage)
{
	if ($resultsPerPage==$user_e)
	{
		echo "selected";
	}	

}
?>
