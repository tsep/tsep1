<?php
/**
* This is a collection of funtions to work with the last indexing date.
*
* Here we write to or read from the database the last date the indexing took place or something was changed in the index. (indexedit...)
* @tables tsep_internal
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-06-11 18:55:44 +0200 (Sa, 11 Jun 2005) $
*  @lastedited $LastChangedBy: toon $
*  $LastChangedRevision: 134 $
*
*/



/**
* read the timestamp from the database
*
* @tables tsep_internal
* @author Olaf Noehring
* @lastedited Olaf Noehring
*/
function read_indexedit_date($database_tsepdbconnection)
{
    global $tsep_config, $database_tsepdbconnection;
    
    // === START === to get the date from the database===============================
    //call:
    //      read_indexedit_date($database_tsepdbconnection);
    
    mysql_select_db($database_tsepdbconnection);
    $db_tablename = db::$prefix."internal";
    $query_lastindexedit = "SELECT * FROM $db_tablename WHERE description = 'tsepindexeditdate'";
    $lastindexedit = mysql_query($query_lastindexedit) or errorHandler::throwError(mysql_error(), errorHandler::FATAL);
    $row_lastindexedit = mysql_fetch_assoc($lastindexedit);
    $totalRows_lastindexedit = mysql_num_rows($lastindexedit);
    
    $tsepindexeditlast = $row_lastindexedit['stringvalue'];
    mysql_free_result($lastindexedit);

    // make timestamp look local    

    if (!isset($tsep_config['Date_Style']))  
    {
            $tsep_config['Date_Style'] = "l, F d Y h:i a";
    }
    echo datum($tsep_config['Date_Style'],$tsepindexeditlast); // Change to how you wish the stamp to display.

    return;
    // === END === to get the date from the database===============================
}



/**
* translate the timestamp !
*
* as seen on http://de.php.net/manual/de/function.date.php
*
* Here is an localised version of date() method.
* What it does is:
* it takes all the usual attributes for the date() method, and returns it in any modified language.
* In my example it is in Bosnian language, so just to clarify,
* days in array start from Sunday -> Saturday, and months from 0, Jan -> Dec.
*
* You can of course change this to your language.
* This is most useful when your specific language is not supported by setlocale() method.
*
* You are free to modify it further... for my project I only needed these outputs, but you can add support for attributes like: S, A, a, etc...
* Use it in good health...
*
*   Localised date() method.
*   Translates attributes D, l, M & F
*
* @tables tsep_internal
* @author unknown, http://de.php.net/manual/de/function.date.php
* @lastedited Olaf Noehring
*/
function datum( $format, $time=false )
{
    global $tsep_lng;

    if (!$time) $time = time();
    $output = "";
    
    # Sun -> Sat
    $day_Short = array(
                                    $tsep_lng['day_sunday_short'],
                                    $tsep_lng['day_monday_short'],
                                    $tsep_lng['day_tuesday_short'],
                                    $tsep_lng['day_wednesday_short'],
                                    $tsep_lng['day_thursday_short'],
                                    $tsep_lng['day_friday_short'],
                                    $tsep_lng['day_saturday_short']                                 
                                    );
    # Sunday -> Saturday
    $day_Long = array(
                                    $tsep_lng['day_sunday'],
                                    $tsep_lng['day_monday'],
                                    $tsep_lng['day_tuesday'],
                                    $tsep_lng['day_wednesday'],
                                    $tsep_lng['day_thursday'],
                                    $tsep_lng['day_friday'],
                                    $tsep_lng['day_saturday']               
                                    );
    
    # 0, Jan -> Dec (leave the 0 alone!)
    $month_Short = array(0,
                                    $tsep_lng['month_january_short'],       
                                    $tsep_lng['month_february_short'],      
                                    $tsep_lng['month_march_short'],         
                                    $tsep_lng['month_april_short'],         
                                    $tsep_lng['month_may_short'],           
                                    $tsep_lng['month_june_short'],          
                                    $tsep_lng['month_july_short'],          
                                    $tsep_lng['month_august_short'],                
                                    $tsep_lng['month_september_short'],     
                                    $tsep_lng['month_october_short'],       
                                    $tsep_lng['month_november_short'],      
                                    $tsep_lng['month_december_short']                       
                                    );
    # 0, January -> Decemeber (leave the 0 alone!)
    $month_Long = array(0,
                                    $tsep_lng['month_january'],
                                    $tsep_lng['month_february'],    
                                    $tsep_lng['month_march'],
                                    $tsep_lng['month_april'],       
                                    $tsep_lng['month_may'],         
                                    $tsep_lng['month_june'],                
                                    $tsep_lng['month_july'],                
                                    $tsep_lng['month_august'],      
                                    $tsep_lng['month_september'],   
                                    $tsep_lng['month_october'],     
                                    $tsep_lng['month_november'],    
                                    $tsep_lng['month_december']     
                                    );
    
    
    for ($i=0; $i<strlen($format); $i++)
    {
        $chr = substr($format, $i, 1);
        if ( $chr === "D" )
        {
                $output .= $day_Short[date("w",$time)];
        }
        else if ( $chr === "l" )
        {
                $output .= $day_Long[date("w",$time)];
        }
        else if ( $chr === "M" )
        {
                $output .= $month_Short[date("n",$time)];
        }
        else if ( $chr === "F" )
        {
                $output .= $month_Long[date("n",$time)];
        }
        else
        {
                $output .= date("$chr",$time);
        }
    }
    return $output;
}


?>
