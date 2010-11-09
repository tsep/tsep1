<?php
/**
* just to use code recycling: This function puts a picture with the sort option and column on the html page
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

/**
* just to use code recycling: This function puts a picture with the sort option and column on the html page
*
* @param string $sortorder: database field
* @param string $sortorderDirection: ASC / DESC
* @param string $dbOrder
* @param string $dbDirection
* @param string $gotoURL: Go there after sorting (calling page usually)
* @author Olaf Noehring
* @lastedited Olaf Noehring
*/
function putSortPicture($sortorder,$sortorderDirection,$dbOrder,$dbDirection, $gotoURL, $filterString ="")
{
    global $tsep_lng;

	if ($sortorderDirection=="ASC")
	{
		$sortorderDirection="ASC";
		$sortorderText="sort_asc";
		$sortorderALT="a-z";
		$sortorderIMG="../graphics/down.png";
	}

	if ($sortorderDirection=="DESC")
	{
		$sortorderDirection="DESC";
		$sortorderText="sort_desc";
		$sortorderALT="z-a";
		$sortorderIMG="../graphics/up.png";

	}

	if ($sortorderDirection=="ASC2")
	{
		$sortorderDirection="ASC2";
		$sortorderText="sort_asc2";
		$sortorderALT="0-9";
		$sortorderIMG="../graphics/down.png";
	}

	if ($sortorderDirection=="DESC2")
	{
		$sortorderDirection="DESC2";
		$sortorderText="sort_desc2";
		$sortorderALT="9-0";
		$sortorderIMG="../graphics/up.png";
	}

	if (($dbOrder==$sortorder) && ($dbDirection==$sortorderDirection))
	{
		$class="logviewActiveSort";
	}
	else
	{
		$class="logviewPossibleSort";
	}
	?>
	<a href="<?php echo $gotoURL ?>?order=<?php echo $sortorder."&amp;dir=".$sortorderDirection.$filterString;?>" title="<?php echo $tsep_lng["$sortorderText"];?>"><img src="<?php echo $sortorderIMG;?>" alt="<?php echo $sortorderALT;?>" class="<?php echo $class;?>" width="10" height="12"></a>

	<?php
}  // function putSortPicture END
?>
