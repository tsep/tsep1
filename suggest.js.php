<?php
/**
 * @package The Search Engine Project
 * @version 1.0
 * @copyright (C) 2005 by TSEP Development Team
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @since TSEP 0943
 * @tables none
 * @author Toon Goedhart
 *
 * following will be filled automatically by SubVersion!
 * Do not change by hand!
 *  $LastChangedDate: 2005-07-08 21:57:08 +0200 (Fr, 08 Jul 2005) $
 *  @lastedited $LastChangedBy: toon $
 *  $LastChangedRevision: 229 $
 **/

require_once( "./include/global.php" ); //general config data

/*************************************************************************************************
 * Global structure of the complete suggest engine:
 * 
 * +-------------+     +------------------+     +-------------------+     +----------------------+
 * | Search box  |     | JavaScript:      |     | PHP:              |     | JavaScript:          |
 * |             |     | processSearchKey |     | suggest.engine    |     | displayResults       |
 * |-------------| --> |------------------| --> |-------------------+ --> +----------------------+
 * | On key down |     | Assembles the    |     | Searches the DB   |     | Displays the results |
 * | the JS code |     | URL and calls    |     | DB for matches.   |     | returned by the PHP  |
 * | is called   |     | the PHP script   |     | Returns results   |     | script. Adds colors  |
 * +-------------+     +------------------+     | in the hidden     |     | for alternating      |
 *                                              | iframe and calls  |     | rows.                |
 *                                              | JS.displayResults |     +----------------------+
 *                                              +-------------------+
 * 
 *************************************************************************************************/


/** 
 * This class builds the JavaScript code that can be
 * included in the search page. All options can be
 * set by the admin in the configuration screen.
 * 
 * This class is not designe to be derived. Call the
 * methods like this: SearchSuggest::echoSearchForm();
 **/
class SearchSuggest {
    
    /**
     * SearchSuggest::SearchForm()
	 * 
	 * Creates the search form and if active the JS code to the search suggest functionality.
	 * If search suggest is active and $includeSuggestTable is TRUE than the HTML code to
	 * display the suggestions is created on the fly. If $includeSuggestTable is FALSE
	 * the method echoSearchTable() must be called from the template in the location where
	 * the suggestions are to be displayed.
     * 
	 * @access public
     * @param string $searchScript The script that performs the actual search
     * @param string $searchTemplate The template that wraps the search form
     * @param string $searchString The string that the user searched on previously
     * @param MySQL result $howmanyresultsperpage MySQL result with the options to "how many results per page should we display"
     * @param integer $s Start record to "how many results"
     * @param integer $e End record to "how many results"
     * @param integer $user_e User setting to "how many results"
     * @param boolean $includeSuggestTable If TRUE the HTML code to display the suggestions in is created onn the fly
     * @return string The string with XHTML code to show the search box, etc.
     **/
    function SearchForm( $searchScript, $searchTemplate, $searchString, $howmanyresultsperpage, $s, $e, $user_e, $includeSuggestTable=FALSE ) {
        $outputString = "";
        
        if ( SearchSuggest::SuggestActive() ) {
            // Create the Js code
			$outputString .= SearchSuggest::echoSearchSuggest( $searchScript, $searchTemplate, $s, $e, $user_e );
        }
        
		// Create the search form
        $outputString .= SearchSuggest::echoSearchForm( $searchScript, $searchTemplate, $searchString, $howmanyresultsperpage, $user_e );
        
        if ( $includeSuggestTable ) {
        	// Create the HTML code to display the suggestions
		    $outputString .= SearchSuggest::echoSearchTable();
        }
        
        return $outputString;
    } // SearchForm
    
    /**
     * SearchSuggest::SuggestActive()
	 * 
	 * Checks if search suggest is activated by the admin.
	 * 
     * @access public
     * @return boolean TRUE is search suggest is active 
     **/
    function SuggestActive() {
        global $tsep_config;
        
/********************************************************************************
 * 2005-07-08/TG
 * 
 * Removed for the 0.942 release.
 * This functionality isn't stable yet.
 * the code will be activated in 0.943
 * 
 * 
    	if ( $tsep_config["how_many_hints"] > 0 ) {
    	    return TRUE;
    	} else {
            return FALSE;
        }
 ********************************************************************************/
        return FALSE;
    } // SuggestActive
    
    
    /**
     * SearchSuggest::lConvert2HTMLent()
	 * 
	 * Translates special characters to HTML entities.
	 * 
     * @access public
	 * @param string $text Original text
     * @return string The translated text 
     **/
    function lConvert2HTMLent( $text ) {
        /*
        //========================== encode special characters START ==========================
        // now lets make the index words useable for (hopefully) any language (on earth):
        // encoded any "special" chars into html enities, for details look on
        // http://www.phpbuilder.com/manual/function.get-html-translation-table.php
        */
        
        $trans = get_html_translation_table( HTML_ENTITIES );
        $text = strtr( $text, $trans );
        $text = str_replace( "\\", "", $text ); // remove "\" //this is the new line A..... this is testing!!
        
        return $text;
    }

    /**
     * SearchSuggest::echoSearchForm()
	 * 
	 * Creates the HTML code to the bare bones search form.
	 * 
     * @access public
     * @param string $searchScript The script that performs the actual search
     * @param string $searchTemplate The template that wraps the search form
     * @param string $searchString The string that the user searched on previously
     * @param MySQL result $howmanyresultsperpage MySQL result with the options to "how many results per page should we display"
     * @param integer $user_e End record to "how many results"
     * @return string The HTML code to the search form 
     **/
    function echoSearchForm( $searchScript, $searchTemplate, $searchString, $howmanyresultsperpage, $user_e ) {
        global $tsep_config, $tsep_lng;
        
        $outputString = "";
        
        $outputString .= "\n<div class=\"SearchBlock\">\n";
        $outputString .= "    <form action=\"$searchScript\" method=\"get\" name=\"tsepsearchform\" id=\"tsepsearchform\">\n";
        $outputString .= "        <input name=\"q\" type=\"text\" class=\"SearchField\" value=\"".SearchSuggest::lConvert2HTMLent( utf8_decode( $searchString ))."\" onKeyUp=\"tsep_processSearchKey( this.value )\" autocomplete=\"off\" />\n";

        if ( $tsep_config['Show_Record_Change'] == "true" ) {
            // the values in the combo boxes could be drawn from a database
            $outputString .= "        <select name=\"user_e\" title=\"".$tsep_lng['show_results_per_page']."\" onChange=\"document.tsepsearchform.submit()\">\n";
            do {
                if ( $row_howmanyresultsperpage['numericvalue'] > 0 ) {
                    $outputString .= "            <option value=\"".$row_howmanyresultsperpage['numericvalue']."\"".( $user_e == $row_howmanyresultsperpage['numericvalue'] ? " selected" : "" ).">".$row_howmanyresultsperpage['numericvalue'].$tsep_lng['show_x_results_per_page']."</option>\n";
                }
            } while ( $row_howmanyresultsperpage = mysql_fetch_assoc( $howmanyresultsperpage ));

            $rows = mysql_num_rows($howmanyresultsperpage);
            if ( $rows > 0 ) {
                mysql_data_seek( $howmanyresultsperpage, 0 );
                $row_howmanyresultsperpage = mysql_fetch_assoc( $howmanyresultsperpage );
            }

            $outputString .= "        </select>\n";
            
        } else {
            $outputString .= "        <input type=\"hidden\" name=\"user_e\" value=\"".$tsep_config['How_Many_Results']."\" />\n";
        }
        
        $outputString .= "\n";
        $outputString .= "        <input type=\"hidden\" name=\"e\" value=\"".$tsep_config['How_Many_Results']."\" />\n";
        $outputString .= "        <input type=\"hidden\" name=\"s\" value=\"0\" />\n";
        $outputString .= "        <input type=\"hidden\" name=\"searchpagelocation\" value=\"$searchTemplate\" />\n";
        $outputString .= "        <input type=\"hidden\" name=\"redirect_url\" value=\"$searchScript\" />\n";
        $outputString .= "        <input type=\"submit\" name=\"subButton\" value=\"".$tsep_lng['button_search']."\" />\n";
        $outputString .= "        <div class=\"SearchHintsHelp\"><a href=\"/".$tsep_config['Path']."/searchtips.php\" target=\"_blank\" title=\"".$tsep_lng['search_tips_help']."\" class=\"SearchHintsHelp\">".$tsep_lng['search_tips']."</a></div>\n";
        $outputString .= "    </form>\n";
        $outputString .= "    <script>document.tsepsearchform.q.focus();</script>\n";
        $outputString .= "</div>\n\n";
        
        return $outputString;
    } // echoSearchForm
    
    /**
     * SearchSuggest::echoSearchTable()
	 * 
	 * Builds the HTML code to the block that will contain the search suggestions.
	 * 
     * @access public
     * @return string HTML code 
     **/
    function echoSearchTable() {
        global $tsep_config, $tsep_lng;
        
        $outputString = "";
        
        if ( SearchSuggest::SuggestActive() ) {

            $outputString .= "\n<div class=\"suggestBlock\">\n";
            $outputString .= "    <div id=\"suggestHeader\" class=\"suggestHeader\">\n";
			$outputString .= "        <span id=\"termHeader\" class=\"suggestHeaderTerm\" title=\"".$tsep_lng["ss_search_term_hover"]."\">".$tsep_lng["ss_search_term"]."</span>\n";
            if ( $tsep_config["show_popular"] == "true" ) {
                $outputString .= "        <span id=\"popularHeader\" class=\"suggestHeaderPopular\" title=\"".$tsep_lng["ss_popular_hover"]."\">".$tsep_lng["ss_popular"]."</span>\n";
            }
            
            if ( $tsep_config["show_nr_hits"] == "true" ) {
                $outputString .= "        <span id=\"retpagesHeader\" class=\"suggestHeaderRetPages\" title=\"".$tsep_lng["ss_returned_pages_hover"]."\">".$tsep_lng["ss_returned_pages"]."</span>\n";
            }
            $outputString .= "    </div>\n\n";
            
            for ( $i=0; $i<$tsep_config["how_many_hints"]; $i++ ) {
            
                $outputString .= "    <div id=\"r".$i."_row\">\n";
                $outputString .= "        <span id=\"r".$i."_term\" class=\"suggestTerm\"> </span>\n";
                
                if ( $tsep_config["show_popular"] == "true" ) {
                    $outputString .= "        <span id=\"r".$i."_popular\" class=\"suggestPopular\"> </span>\n";
                }
                
                if ( $tsep_config["show_nr_hits"] == "true" ) {
                    $outputString .= "        <span id=\"r".$i."_nrretpages\" class=\"suggestRetPages\"> </span>\n";
                }
                
                $outputString .= "    </div>\n";
                $outputString .= "\n";
            } // for

            $outputString .= "</div>\n";
            $outputString .= "\n";
			
			// This hidden frame is the key in the communication between the JS and the PHP code
            $outputString .= "<iframe name=\"hiddenSuggestFrame\" width=\"700\" height=\"50\" frameborder=\"yes\" src=\"suggest.engine.php\"></iframe>\n";

            $outputString .= "\n";
            $outputString .= "<script>\n";
            $outputString .= "    tsep_initToken( '' );\n";
            $outputString .= "    tsep_processSearchKey( '' );\n";
            $outputString .= "</script>\n";
            $outputString .= "\n";
        }
        
        return $outputString;
    } // echoSearchTable
    
    /**
     * SearchSuggest::echoSearchSuggest()
	 * 
	 * This routine outputs the JavaScript code that is the interface between the
	 * search form and the PHP database access script. Futhermore it displays the
	 * suggestions in the correct block.
	 * 
     * @access public
     * @param string $tsep_search_script The script that performs the actual search
     * @param string $searchTemplate The template that wraps the search form
     * @param integer $s Start record to "how many results"
     * @param integer $e End record to "how many results"
     * @param integer $user_e User setting to "how many results"
     * @return string JS code that llinks to the form and handles display of suggestions
     **/
    function echoSearchSuggest( $tsep_search_script, $searchTemplate, $s, $e, $user_e ) {
        global $tsep_config;
        
        $outputString = "";
        
        if ( SearchSuggest::SuggestActive() ) {
            $tsep_suggest_script = "/".TSEP_CLIENT_ROOT."/suggest.engine.php";
        
            $outputString .= "\n<script language=\"JavaScript\" type=\"text/JavaScript\">\n";

            $outputString .= "  var nrResults = ".$tsep_config["how_many_hints"].";\n";
            $outputString .= "  var currentTerm;\n";
            $outputString .= "  var resultCache = new Object();\n";
            $outputString .= "  var searchTermCache = new Array();\n";
            $outputString .= "  var currentSequence = 0;\n";
            $outputString .= "  var selectedItem = 0;\n";
            $outputString .= "  var searchResults;\n";
            $outputString .= "  var lastSearchTerm = new Array();\n";
            $outputString .= "  var update = true;\n";
            $outputString .= "  var snapToken;\n";
            
            /**
             * This regex identifies characters that may not be searched for.
             * The first string is the original but it doesn't account for
             * UTF-8 chars. The second should perform better.
             **/
            $outputString .= "  var illegalCharsRegEx = '/[^a-zA-Z 0-9]+/g';\n";
//            $outputString .= "  var	illegalCharsRegEx = '/[^ \w]+/g';\n";

            $outputString .= "  document.onkeydown = tsep_handleKeyDown;\n";
            
            /*
             * When a key is pressed on the search _page_
             * it is handled by this routine
             */
            $outputString .= "  function tsep_handleKeyDown( evt )\n";
            $outputString .= "  {\n";
            $outputString .= "  	evt = ( evt ) ? evt : ( ( window.event ) ? event : null );\n";
            $outputString .= "  	if ( ! evt )\n";
            $outputString .= "  		return;\n";
            $outputString .= "  	var key = evt.keyCode;\n";

            // Left Arrow
            $outputString .= "  	if ( key == 37 ) {\n";
            $outputString .= "  		var tmp = lastSearchTerm.pop();\n";
            $outputString .= "  		if ( tmp != null )\n";
            $outputString .= "  			document.tsepsearchform.q.value = tmp;\n";
            $outputString .= "  		document.tsepsearchform.q.focus();\n";
            $outputString .= "  		return false;\n";
            $outputString .= "  	} \n";

            // Up Arrow
            $outputString .= "  	if ( key == 38 ) {\n";
            $outputString .= "  		selectedItem--;\n";
            $outputString .= "  		update = false;\n";
            $outputString .= "  		tsep_displayResults( searchResults );\n";
            $outputString .= "  		document.tsepsearchform.q.value = searchResults[selectedItem][0];\n";
            $outputString .= "  		document.tsepsearchform.q.focus();\n";
            $outputString .= "  		return false;\n";
            $outputString .= "  	} \n";

            // Right Arrow
            $outputString .= "  	if ( key == 39 || key == 9 ) {\n";
            $outputString .= "  		lastSearchTerm.push( currentTerm );\n";
            $outputString .= "  		document.tsepsearchform.q.value = searchResults[selectedItem][0];\n";
            $outputString .= "  		document.tsepsearchform.q.focus();\n";
            $outputString .= "  		return false;\n";
            $outputString .= "  	} \n";

            // Down Arrow
            $outputString .= "  	if ( key == 40 ) {\n";
            $outputString .= "  		selectedItem++;\n";
            $outputString .= "  		update = false;\n";
            $outputString .= "  		tsep_displayResults( searchResults );\n";
            $outputString .= "  		document.tsepsearchform.q.value = searchResults[selectedItem][0];\n";
            $outputString .= "  		document.tsepsearchform.q.focus();\n";
            $outputString .= "  		return false;\n";
            $outputString .= "  	} \n";
            $outputString .= "  } \n";
            
            $outputString .= "  function tsep_initToken( snap_token )\n";
            $outputString .= "  {\n";
            $outputString .= "  	snapToken = snap_token;\n";
            $outputString .= "  } \n";

            /*
             * When a key is pressed in the search _box_
             * it is handled by this routine
             */
            $outputString .= "  function tsep_processSearchKey( val )\n";
            $outputString .= "  { \n";
            $outputString .= "  	if ( update ) {\n";
            $outputString .= "  		if ( currentTerm != val ) {\n";
            $outputString .= "  			currentTerm = val;\n";
            $outputString .= "  			selectedItem = 0;\n";

            $outputString .= "  			val = val.replace( illegalCharsRegEx, ' ' );\n";

            $outputString .= "  			if ( resultCache[ val ] ) {\n";
            $outputString .= "  				tsep_displayResults( resultCache[ val ], 0 );\n";
            $outputString .= "  				return;\n";
            $outputString .= "  			} \n";

            $outputString .= "  			searchTermCache[ ++currentSequence ] = val;\n";

            $outputString .= "  			var url = '$tsep_suggest_script?nrresults=' + nrResults + '&seq=' + currentSequence + '&term=' + encodeURIComponent( val ) ;\n";
            $outputString .= "  			hiddenSuggestFrame.document.location.replace( url );\n";
            $outputString .= "  		} \n";
            $outputString .= "  	} else {\n";
            $outputString .= "  		update = true;\n";
            $outputString .= "  	} \n";
            $outputString .= "  } \n";
            
            /*
             * When the database access script is finished it
             * outputs the results into the hidden frame and
             * calls this routine.
             */
            $outputString .= "  function tsep_displayResults( arr, seq )\n";
            $outputString .= "  {\n";
            $outputString .= "  	if ( seq > 0 ) {\n";
            $outputString .= "  		var term = searchTermCache[ seq ];\n";
            $outputString .= "  		if ( term ) {\n";
            $outputString .= "  			resultCache[ term ] = arr;\n";
            $outputString .= "  			currentTerm = term;\n";
            $outputString .= "  		} \n";
            $outputString .= "  	} \n";

            // store the array in a global variable that can be used later
            $outputString .= "  	searchResults = arr; \n";

            // calculate the number of results to display
            $outputString .= "  	var n = arr.length < nrResults ? arr.length : nrResults; \n";

            // replace any bad characters with spaces
            $outputString .= "  	val = currentTerm.replace( illegalCharsRegEx, ' ' ); \n";

            // create an array of terms that will be highlighted
            $outputString .= "  	var match_terms = Array();\n";
            $outputString .= "  	match_terms = val.split( \" \" ); \n";

            // select item can wrap from top to bottom or from bottom to top
            $outputString .= "  	if ( selectedItem < 0 )\n";
            $outputString .= "  		selectedItem = n-1;\n";

            $outputString .= "  	if ( selectedItem > n-1 )\n";
            $outputString .= "  		selectedItem = 0; \n";

            // START step through the list of terms that are returned by the hidden frame
            $outputString .= "  	for ( var i = 0; i < n; i++ ) {\n";
            $outputString .= "  		var term = '';\n";
            $outputString .= "  		var nr_searches = '';\n";
            $outputString .= "  		var nr_returnedPages = '';\n";
            
            // pick the appropriate background and border color
            $outputString .= "  		var bgcolor = '".$tsep_config["Color_1"]."';\n";
            $outputString .= "  		var border_color = bgcolor;\n";
            $outputString .= "  		if ( i % 2 == 1 ) {\n";
            $outputString .= "  			bgcolor = '".$tsep_config["Color_2"]."';\n";
            $outputString .= "  			border_color = bgcolor;\n";
            $outputString .= "  		} \n";

            $outputString .= "  		if ( i < arr.length ) {\n";
            $outputString .= "  			term = arr[i][0];\n";
            $outputString .= "  			nr_searches = arr[i][1];\n";
            $outputString .= "  			nr_returnedPages = arr[i][2];\n";
            $outputString .= "  		} \n";

            $outputString .= "  		document.getElementById( 'r' + i + '_term' ).innerHTML = '<a href=\"$tsep_search_script?q=' + encodeURIComponent( term ) + '&searchpagelocation=$searchTemplate&s=$s&e=$e&user_e=$user_e&type_of_link=kst' + '&kst_token=' + encodeURIComponent( snapToken ) + '\">' + wordhighlight( term, match_terms ) + '</a>';\n";

            if ( $tsep_config["show_popular"] == "true" ) {
                $outputString .= "  		document.getElementById( 'r' + i + '_popular' ).innerHTML = nr_searches;\n";
            }
                        
            if ( $tsep_config["show_nr_hits"] == "true" ) {
                $outputString .= "  		document.getElementById( 'r' + i + '_nrretpages' ).innerHTML = nr_returnedPages;\n";
            }
            
            $outputString .= "  		document.getElementById( 'r' + i + '_row' ).style.backgroundColor = bgcolor; \n";

            // show a border only for the selected item
            $outputString .= "  		if ( i == selectedItem )\n";
            $outputString .= "  			document.getElementById( 'r' + i + '_row' ).style.border = '1px solid orange';\n";
            $outputString .= "  		else {\n";
            $outputString .= "  			document.getElementById( 'r' + i + '_row' ).style.border = '1px solid ' + border_color;\n";
            $outputString .= "  		} \n";
            $outputString .= "  	} \n";
            // END step through the list of terms that are returned by the hidden frame

            // if there are no entries, use the query term as the first row
            $outputString .= "  	if ( n == 0 ) {\n";
            $outputString .= "  		i = 0;\n";
            $outputString .= "  		document.getElementById( 'r' + i + '_term' ).innerHTML = '<a href=\"$tsep_search_script?q=' + encodeURIComponent( term ) + '&searchpagelocation=$searchTemplate&s=$s&e=$e&user_e=$user_e&type_of_link=kst' + '&kst_token=' + encodeURIComponent( snapToken ) + '\">' + wordhighlight( term, match_terms ) + '</a>';\n";
            
            if ( $tsep_config["show_popular"] == "true" ) {
                $outputString .= "  		document.getElementById( 'r' + i + '_popular' ).innerHTML = '';\n";
            }
            
            if ( $tsep_config["show_nr_hits"] == "true" ) {
                $outputString .= "  		document.getElementById( 'r' + i + '_nrretpages' ).innerHTML = '';\n";
            }
            
            $outputString .= "  		document.getElementById( 'r' + i + '_row' ).style.backgroundColor = bgcolor;\n";
            $outputString .= "  		document.getElementById( 'r' + i + '_row' ).style.border = '1px solid orange';\n";
            $outputString .= "  		i++;\n";
            $outputString .= "  	} \n";

            // the hide the rest of the rows
            $outputString .= "  	for ( i = i; i < nrResults; ++i ) {\n";
            $outputString .= "  		document.getElementById( 'r' + i + '_term' ).innerHTML = '';\n";
            
            if ( $tsep_config["show_popular"] == "true" ) {
                $outputString .= "  		document.getElementById( 'r' + i + '_popular' ).innerHTML = '';\n";
            }
            
            if ( $tsep_config["show_nr_hits"] == "true" ) {
                $outputString .= "  		document.getElementById( 'r' + i + '_nrretpages' ).innerHTML = '';\n";
            }
            
            $outputString .= "  		document.getElementById( 'r' + i + '_row' ).style.backgroundColor = 'transparent';\n";
            $outputString .= "  		document.getElementById( 'r' + i + '_row' ).style.border = '';\n";
            $outputString .= "  	} \n";
            $outputString .= "  } \n";

            $outputString .= "  function wordhighlight( aSourceObject, term_list )\n";
            $outputString .= "  {\n";
            $outputString .= "  	var aWords = '';\n";

            $outputString .= "  	for ( x = 0; x < term_list.length; x++ ) {\n";
            $outputString .= "  		if ( x != 0 && term_list[x] != '' ) aWords += '|';\n";
            $outputString .= "  		aWords += term_list[x];\n";
            $outputString .= "  	} \n";
            
            // Extract HTML Tags
            $outputString .= "  	regexp = /<[^<>]*>/ig;\n";
            $outputString .= "  	vHTMLArray = aSourceObject.match( regexp ); \n";
            
            // Replace HTML tags
            $outputString .= "  	vStrippedHTML = aSourceObject.replace( regexp, \"$!$\" ); \n";

            //$outputString .= "  	alert(vStrippedHTML);\n";

            // Replace search words
            $outputString .= "  	regexp = new RegExp ( \"(\" + aWords + \")\", \"gi\" ); \n";

            //$outputString .= "  	vTemp = vStrippedHTML.replace(regexp,'<b>\$1</b>');\n";
            $outputString .= "  	vTemp = vStrippedHTML.replace( regexp, '<span style=\"background:#FFFF99\">\$1</span>' ); \n";

            // Reinsert HTML
            $outputString .= "  	for( i = 0;vTemp.indexOf( \"$!$\" ) > -1;i++ ) {\n";
            $outputString .= "  		vTemp = vTemp.replace( \"$!$\", vHTMLArray[i] );\n";
            $outputString .= "  	} \n";
            
            // Disply Result
            $outputString .= "  	return vTemp; \n";
            $outputString .= "  } \n";

            $outputString .= "</script>\n";
            $outputString .= "\n";
        }
        
        return $outputString;
    } // echoSearchSuggest
}

?>