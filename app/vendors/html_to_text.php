<?php 
/**
 * Remove HTML tags, including invisible text such as style and
 * script code, and embedded objects.  Add line breaks around
 * block-level tags to prevent word joining after tag removal.
 */

//TODO:Fix this to work on invalid HTML

/*
 * This function is suppossed to remove all HTML from a string
 * but is not quite working yet due to sites having invalid 
 * HTML. should be working soon.
 */

function html_to_text( $str ){

	$str = preg_replace('/<!--((.|\s)*?)-->(.|\s)*/',"$1",$str);
	
    $len = strlen($str);
    $start = 0;
    $stat = 0;
    
    $ret = '';

    for( $i = 0 ; $i < $len ; $i++ ){

        switch( $stat ){

            // <
            case 1:
                if( $str[$i] == '>' ){
                    $stat = 0;
                    $start = $i + 1;
                }
                else if( $str[$i] == '\'' )
                    $stat = 2;
                else if( $str[$i] == '"' )
                    $stat = 3;
                break;

            // <blahblah '
            case 2:
                if( $str[$i] == '\'' )
                    $stat = 1;
                break;

            // <blahblah "
            case 3:
                if( $str[$i] == '"' )
                    $stat = 1;
                break;

            // normal stat
            default:
                if( $str[$i] == '<' ){
                    $stat = 1;
                    $ret .= substr($str, $start, $i-$start);
                }
                
        }
        
    }
    if( $stat == 0 )
        $ret .= substr($str, $start, $i-$start);
    
    return $ret;

}
