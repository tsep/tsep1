<?php
/**
* do some conversion: remove not html chartacters or put them back in
*
* We need the two functions to store in the database what the user really sees in his browser. This is important for non standard characters (Ascii >127) because the user will enter what ever characters he has on his keyboard and not any html entities!
*
* @author unknwon, http://www.phpbuilder.com/manual/function.get-html-translation-table.php
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-06-11 18:55:44 +0200 (Sa, 11 Jun 2005) $
*  @lastedited $LastChangedBy: toon $
*  $LastChangedRevision: 134 $
*
*/


/**
* This function is not needed anymore since version 0.941 (UTF-8 Format handled correctly)! The information is left here for documentation purpose only!
*
* This is old (since 0.941 out-dated) information:
* remove any non html characters and make entities out of them
*
* now lets make the index words useable for (hopefully) any language (on earth):
* encoded any "special" chars into html enities, for details look on
*
* @param string &$text
* @return string $text
* @author unknwon, http://www.phpbuilder.com/manual/function.get-html-translation-table.php
* @lastedited Olaf Noehring
*/
function convert_to_htmlent($text)
{
    return($text);
    /*
    //========================== encode special characters START ==========================
    //now lets make the index words useable for (hopefully) any language (on earth):
    //encoded any "special" chars into html enities, for details look on
    // http://www.phpbuilder.com/manual/function.get-html-translation-table.php
    */
    
    $trans = get_html_translation_table(HTML_ENTITIES);
    
    $text = strtr($text, $trans);
    
    $text = str_replace("\\", "", $text); // remove "\" //this is the new line A..... this is testing!!
    //debug only:
    //echo "---to: ".$text."---";
    
    return ($text);
}

/**
* make the HTML entities to real characters as the user whishes to see them in his browser
*
* we need this because people might do good html design and already use the entities ....
* in the database we want the things the USER inputs into the search field.
* now put is back like the user sees it in the browser
*
* @param string &$text
* @return string $text
* @author unknwon, http://www.phpbuilder.com/manual/function.get-html-translation-table.php
* @lastedited Olaf Noehring
*/
function convert_from_htmlent(&$text)
{
    //we need this because people might do good html design and already use the entities ....
    // in the database we want the things the USER inputs into the search field.
    //now put is back like the user sees it in the browser:
    
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans); // change array
    
    $text = strtr($text, $trans); //this should make any encoded characters into "real" characters like the browser displays them
    // NOW we can encode them. If we do not do this first step any encoding the web programer has done
    // was for nothing
    $trans = array_flip($trans); // change array (again)
    // now everything should be just fine - means: as the user will input it into the search field.
    
    
    $text = str_replace("'", "\'", $text); // add "\'" //this is the new line B ..... this is testing!!
    //debug only:
    //echo "---from: ".$text."---";
    
    return ($text);
//========================== encode special characters END ==========================
}
?>
