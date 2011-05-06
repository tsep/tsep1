<?php 
/**
 * Remove HTML tags, including invisible text such as style and
 * script code, and embedded objects.  Add line breaks around
 * block-level tags to prevent word joining after tag removal.
 */

//TODO:Fix this to work on invalid HTML


function html_to_text( $html ){

    $text = strip_tags($html);
    
    return $text;

}
