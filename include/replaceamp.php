<?php
/**
* replace &amp in the given $text with the & character
*
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/

/**
* replace &amp in the given $text with the & character
*
* now replace the &amp; by the correct character & again and with that the correct encoding - this should work most of the time
* as seen in
* http://groups.google.de/groups?hl=de&lr=&ie=UTF-8&threadm=3C20D360.401529C0%40gmx.de&rnum=2&prev=/groups%3Fq%3Dhtmlentities%2Bgroup:de.comp.lang.php.*%26hl%3Dde%26lr%3D%26ie%3DUTF-8%26group%3Dde.comp.lang.php.*%26selm%3D3C20D360.401529C0%2540gmx.de%26rnum%3D2
* @param string &$text
* @return string $text
* @author unknwon, http://groups.google.de/groups?hl=de&lr=&ie=UTF-8&threadm=3C20D360.401529C0%40gmx.de&rnum=2&prev=/groups%3Fq%3Dhtmlentities%2Bgroup:de.comp.lang.php.*%26hl%3Dde%26lr%3D%26ie%3DUTF-8%26group%3Dde.comp.lang.php.*%26selm%3D3C20D360.401529C0%2540gmx.de%26rnum%3D2
* @lastedited Olaf Noehring
*/
function replaceamp(&$text){
//replace &amp; ith &

	// now replace the &amp; by the correct character & again and with that the correct encoding - this should work most of the time
	// as seen in
	//	http://groups.google.de/groups?hl=de&lr=&ie=UTF-8&threadm=3C20D360.401529C0%40gmx.de&rnum=2&prev=/groups%3Fq%3Dhtmlentities%2Bgroup:de.comp.lang.php.*%26hl%3Dde%26lr%3D%26ie%3DUTF-8%26group%3Dde.comp.lang.php.*%26selm%3D3C20D360.401529C0%2540gmx.de%26rnum%3D2
	$text = eregi_replace("&amp;", "&", $text); 	

	return;
}

?>
