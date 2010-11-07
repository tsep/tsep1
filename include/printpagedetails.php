<?php
/**
* print the details of each entry in the tsep_search in the indexer in a block of it's own
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

        require_once( TSEP_INCLUDE_DIR."/convert_htmlent.php" ); //make special character to entitie ( to &auml;) and backwards, contains:  convert_to_htmlent and convert_from_htmlent
        require_once ( TSEP_INCLUDE_DIR."/cleanstring.php" );   // to remove anything crap from string


function showCompletePageDetails( &$lPageTitle, &$lPageUrl, &$lFileSize, &$lAssignedIProfiles, &$lIndexedMetaWords, &$lIndexedWords, &$lProtected ) {
        global $tsep_lng;
        
        echo "\n<div class='PageDetails'>\n";
        
        echo "<div class='PageDetailsHead'>".$tsep_lng['page_title'] ."</div>".
             " <div class='PageDetailsTitle'>" . stripslashes($lPageTitle) . "</div>\n";
echo "<div class='PageDetailsHead'>".$tsep_lng['page_url'] ."</div>".
        
             " <a href=\"".stripslashes ($lPageUrl)."\" target=\"_blank\" title=\"".$tsep_lng['click_here_to_open']." ".$tsep_lng['new_window']."\" ><div class='PageDetailsURL'>".stripslashes($lPageUrl)."</div></a>\n";
        
  echo "<div class='PageDetailsHead'>".$tsep_lng['page_file_size'] ."</div>".
  
             " <div class='PageDetailsDiv'>".stripslashes ($lFileSize)." (k)</div>\n";

        echo "<div class='PageDetailsHead'>".$tsep_lng['assigned_indexingprofiles'] 
.":</div>".    "<div class='PageDetailsDiv'>$lAssignedIProfiles</div>\n";
            
echo "<div class='PageDetailsHead'>".$tsep_lng['protect_indexentry'] ."</div>". 
             "<div class='PageDetailsProtected'><input type='checkbox' class='indexoverviewProtect_Indexentry' disabled='disabled' readonly='readonly' " . ( $lProtected == "1" ? "checked='checked'" : "" ) . "  /></div>\n";
              
        echo "<div class='PageDetailsHead'>".$tsep_lng['page_indexed_metawords'] ."</div>".          
             "\n  <div class='PageDetailsWords'>".convert_to_htmlent(cleanstring ($lIndexedMetaWords))."</div>\n";
        
echo "<div class='PageDetailsHead'>".$tsep_lng['page_indexed_words'] ."</div>".         
             "\n  <div class='PageDetailsWords'>".convert_to_htmlent(cleanstring ($lIndexedWords))."</div>\n";
        
        echo "</div>\n";
}


function showAbbreviatedPageDetails( &$lPageID, &$lPageTitle, &$lPageUrl, &$lIndexedMetaWords, &$lIndexedWords, &$lProtected ) {
        global $tsep_lng, $tsep_config;
        
        $nrWords = str_word_count( $lIndexedMetaWords ) + str_word_count( $lIndexedWords );

    echo "\n<div class=\"indexoverviewBlock\"";
        require( TSEP_INCLUDE_DIR."/colorswitch.php" );
        echo ">\n";

        echo "  <div class='AbbrPageDetailsBlock'>\n";
        echo "    <div class='AbbrPageDetailsTitle'><a href=\"indexedit.php?detail=$lPageID\" title=\"".$tsep_lng['index_overview_click_title']."\">".stripslashes($lPageTitle)."</a></div>\n";
        echo "    <div class='AbbrPageDetailsURL'><a href=\"".stripslashes ($lPageUrl)."\" target=\"_blank\" title=\"".$tsep_lng['click_here_to_open']." ".$tsep_lng['new_window']."\" >".stripslashes($lPageUrl)."</a></div>\n";
        echo "    <div class='AbbrPageDetailsWords'>$nrWords</div>\n";
        echo "    <div class='AbbrPageDetailsProtected'><input type='checkbox' disabled='disabled' readonly='readonly' " . ( $lProtected == "1" ? "checked='checked'" : "" ) . " /></div>\n";
        echo "  </div>\n";
        
        echo "</div>\n";
}


function showAbbreviatedDetailsHeader() {
        global $tsep_lng;
        
    echo "\n\n<div class=\"AbbrPageDetailsBlockHead\">\n";
        echo "  <div class=\"AbbrPageDetailsTitle\">".$tsep_lng['page_title']."</div>\n";
        echo "  <div class=\"AbbrPageDetailsURL\">".$tsep_lng['page_url']."</div>\n";
        echo "  <div class=\"AbbrPageDetailsWords\">".$tsep_lng['page_nr_indexed_words']."</div>\n";
        echo "  <div class=\"AbbrPageDetailsProtected\">".$tsep_lng['protected_indexentry']."</div>\n";
    echo "</div>\n\n";
}


function showAbbreviatedDetailsFooter() {
        global $tsep_lng;
        
        //echo "</div>\n";
}


function showError( $key ) {
        global $tsep_lng;
        
        echo "<div class='PageDetails'><div class='internalError'>" . $tsep_lng['error_while_parsing'] . ":</div>\n";
        echo "&nbsp;<a href=\"".stripslashes($key)."\" target=\"_blank\" title=\"".$tsep_lng['click_here_to_open']." ".$tsep_lng['new_window']."\" ><div class='PageDetailsURL'>".stripslashes($key)."</div></a>\n";
        echo "</div>";
}

?>
