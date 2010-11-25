<?php
// this is the language file for the
//
// ENGLISH
//
// language
// UTF-8
//
// created by
// Olaf Noehring
// http://www.team-noehring.de
// email on website
//
// following will be filled automatically by SubVersion!
// Do not change by hand!
//  $LastChangedDate$
//  @lastedited $LastChangedBy$
//  $LastChangedRevision$
//
//
// created for
// tsep version 0941 and website
//
//Escape (preceed by a " ") every special character, use HTML entities like &auml;
//-----------------------------------------------

$tsep_lng['above_values']= <<<_TSEP
values above
_TSEP;

$tsep_lng['add']= <<<_TSEP
add
_TSEP;

$tsep_lng['all']= <<<_TSEP
all
_TSEP;

$tsep_lng['assigned_indexingprofiles']= <<<_TSEP
assigned indexing profiles
_TSEP;

$tsep_lng['button_search']= <<<_TSEP
Search
_TSEP;

$tsep_lng['click_here_to_open']= <<<_TSEP
Click on this link to open the page
_TSEP;

$tsep_lng['close_this_window']= <<<_TSEP
Closes this window
_TSEP;

$tsep_lng['config_absPath']= <<<_TSEP
define the absolute path to TSEP
example: if the file search.php is located in
/home/www/php/tsepsearch/search.php
it would look like '/home/www/php/tsepsearch'
_TSEP;

$tsep_lng['config_tmpPath']= <<<_TSEP
define the absolute path for TSEP temp-directory
_TSEP;

$tsep_lng['config_check_file_exists']= <<<_TSEP
Before showing file in results test if it really exists?
If true the search is a little slower but in the results only files that still exist are shown.
Be aware that this only works when allow_url_open is enabled in php.ini!
Maybe you MUST set this to false.
_TSEP;

$tsep_lng['config_Color_1']= <<<_TSEP
The first alternating color (of a row) when there are long lists
_TSEP;

$tsep_lng['config_Color_2']= <<<_TSEP
The second alternating color (of a row) when there are long lists
_TSEP;

$tsep_lng['config_Date_Style']= <<<_TSEP
How to show the date (PHP style, you can use D, l, M & F). Output will be in the language set above.
Examples:
English style: 'l, F d Y h:i a'
German style: 'l, d. F Y, G:i'
_TSEP;

$tsep_lng['config_dir_exclude']= <<<_TSEP
Enter the directories to be excluded:
_TSEP;

$tsep_lng['config_dir_exclude_help']= <<<_TSEP
This is the path to the folder(s) to be excluded, relativ to your siteroot.
Example: /folder1/folder3, if http://www.yourdomain.com/folder1/folder3 contents (directories and files) are to be excluded.
Add multiple entries by adding ',' but not ', ' (no space)
_TSEP;

$tsep_lng['config_Display_Boolean_Search']= <<<_TSEP
When searching your MySQL version is checked, because version 4.0.1 or higher is required for boolean search.
MySQL >=4.0.0 boolean search: You can use boolean operators,
MySQL < 4.0.0: all words that the user enters in the search field must be found on a page.
Only in this case the page will be displayed in the results list.
Do you want to notify the user if there is only an old database version available and there is no boolean search?
We recommend you leave this on 'true' - otherwise it might confuse the user as to why there are no results.
_TSEP;

$tsep_lng['config_ext_include']= <<<_TSEP
Fileextensions to be included
_TSEP;

$tsep_lng['config_ext_include_help']= <<<_TSEP
The indexer only indexes files, whose extension is given here (use a comma-separated list e.g.: HTM,HTML,PHP )
_TSEP;

$tsep_lng['config_file_exclude']= <<<_TSEP
Enter the files to be excluded:
_TSEP;

$tsep_lng['config_file_exclude_help']= <<<_TSEP
This is the path to the file(s) to be excluded, relative to your siteroot.
Example: /folder1/folder4/login.php, if http://www.yoursite.com/folder1/folder4/login.php is to be excluded.
Add multiple entries by adding ',' but not ', ' (no space)
_TSEP;

$tsep_lng['config_skip_symblinks']= <<<_TSEP
Skip symbolic links
_TSEP;

$tsep_lng['config_skip_symblinks_help']= <<<_TSEP
Define, if symbolic links should be skipped while searching via directoryscan.
_TSEP;

$tsep_lng['config_subdirs2index']= <<<_TSEP
Subdirectories to be indexed (leave empty for all)
_TSEP;

$tsep_lng['config_subdirs2index_help']= <<<_TSEP
Separate each subdirectory by newline and/or comma. Each entry is appended to the 'web directory path' and used to find files.
_TSEP;

$tsep_lng['config_fnExternalPhp']= <<<_TSEP
Enter the fully qualified .php-filename of an external datasupply:
_TSEP;

$tsep_lng['config_fnExternalPhp_help']= <<<_TSEP
This is a filename of a .php-script outside TSEP, which supplies files to be indexed
Example: crawler/spider.php - see documentation for details
_TSEP;

$tsep_lng['config_group_general']= <<<_TSEP
General
_TSEP;

$tsep_lng['config_group_lists']= <<<_TSEP
Lists
_TSEP;

$tsep_lng['config_group_lists_colors']= <<<_TSEP
Colors
_TSEP;

$tsep_lng['config_group_lists_limits']= <<<_TSEP
Limits
_TSEP;

$tsep_lng['config_group_logging']= <<<_TSEP
Logging
_TSEP;

$tsep_lng['config_group_visible2enduser']= <<<_TSEP
Userinterface
_TSEP;

$tsep_lng['config_group_visible2enduser_range']= <<<_TSEP
Limits
_TSEP;

$tsep_lng['config_group_visible2enduser_results']= <<<_TSEP
Results
_TSEP;

$tsep_lng['config_group_visible2enduser_searchsuggest']= <<<_TSEP
Search Suggest
_TSEP;

$tsep_lng['config_group_visible2enduser_search']= <<<_TSEP
Searching
_TSEP;

$tsep_lng['config_Hour_Difference']= <<<_TSEP
hours difference between server time and local time. Adjust accordingly
_TSEP;

$tsep_lng['config_how_many_hints']= <<<_TSEP
How many search suggestions should be displayed (0 = off)?
_TSEP;

$tsep_lng['config_show_nr_hits']= <<<_TSEP
Should the search suggest box show the number of pages returned to a query?
_TSEP;

$tsep_lng['config_show_popular']= <<<_TSEP
Should the search suggest box show the popularity of a query?
_TSEP;

$tsep_lng['config_calc_hits_method']= <<<_TSEP
What method of calculation for the number of pages returned?
_TSEP;

$tsep_lng['config_calc_hits_method_help']= <<<_TSEP
When logging a search query:<br />
1 = Use results of the last search query<br />
2 = Calculate the average from all queries<br />
3 = Calculate the minimum of all queries<br />
4 = Calculate the maximum of all queries
_TSEP;

$tsep_lng['config_How_Many_CharsAfter_Hit']= <<<_TSEP
How many characters to show after the first hit?
_TSEP;

$tsep_lng['config_How_Many_CharsAfter_Hit_help']= <<<_TSEP
The search result will be ony a part of the complete indexed text.
This entry defines how many characters will be shown <b>after</b> the first hit.
_TSEP;

$tsep_lng['config_How_Many_CharsBefore_Hit']= <<<_TSEP
How many characters to show before the first hit?
_TSEP;

$tsep_lng['config_How_Many_CharsBefore_Hit_help']= <<<_TSEP
The search result will be ony a part of the complete indexed text.
This entry defines how many characters will be shown <b>before</b> the first hit.
_TSEP;

$tsep_lng['config_How_Many_Results']= <<<_TSEP
If the user can not set the number of results to display then this default value will be used
(user will get this many results before he gets page navigation)?
_TSEP;

$tsep_lng['config_How_Many_Sentences']= <<<_TSEP
How many hitblocks shall be shown?
_TSEP;

$tsep_lng['config_How_Many_Sentences_help']= <<<_TSEP
The search result will be ony a part of the complete indexed text.
This entry defines how many hitblocks shall be shown maximum.
_TSEP;

$tsep_lng['config_internal_notes']= <<<_TSEP
internal notes
_TSEP;

$tsep_lng['config_internal_notes_help']= <<<_TSEP
This field can be used for internal notes. They are visible for the admin in this area only!
_TSEP;

$tsep_lng['config_Language']= <<<_TSEP
what language do you want TSEP do display itself?
Example: If you want english select 'en', for german select 'de'.
_TSEP;

$tsep_lng['config_listFilenamesOnly']= <<<_TSEP
show would-be-indexed-Filelist only
_TSEP;

$tsep_lng['config_listFilenamesOnly_help']= <<<_TSEP
The indexer does not build an index, is just lists all files, which would be indexed.<br>
In addition, a list is shown, which directories and files whould be skipped.
_TSEP;

$tsep_lng['config_Logging']= <<<_TSEP
Do you want logging at all?
_TSEP;

$tsep_lng['config_Logging_IP']= <<<_TSEP
Log IP addresses?
_TSEP;

$tsep_lng['config_Logging_result_links']= <<<_TSEP
Log clicks on search results?
_TSEP;

$tsep_lng['config_Logging_search_term']= <<<_TSEP
Log search terms?
_TSEP;

$tsep_lng['config_max_hints'] = <<<_TSEP
Number of marked search terms for each sentence
_TSEP;

$tsep_lng['config_max_hints_help'] = <<<_TSEP
The number defines the amount of search terms that each
sentence should contain at maximum.
_TSEP;

$tsep_lng['config_max_length'] = <<<_TSEP
Max length of sentence (in characters)
_TSEP;

$tsep_lng['config_max_length_help'] = <<<_TSEP
Sentences with more than the defined number of characters will
not be displayed.
_TSEP;
$tsep_lng['config_maxRows_completeindex']= <<<_TSEP
How many index entries in the show complete index page in one html document?
Be careful not to set a too high number as the page might get very big!
_TSEP;

$tsep_lng['config_maxRows_indexoverview']= <<<_TSEP
How many index entries in the index edit page in one html document?
Be careful not to set a too high number as the index edit page might get very big!
_TSEP;

$tsep_lng['config_maxRows_logview']= <<<_TSEP
How many logentries do you want to see on one page?
_TSEP;

$tsep_lng['config_maxRows_Stopwords']= <<<_TSEP
How many stopwords do you want to see on one page?
_TSEP;

$tsep_lng['config_Numbers_Put']= <<<_TSEP
Show the page number in the hitlist?
_TSEP;

$tsep_lng['config_Numbers_Put_After']= <<<_TSEP
If we show the number of the page in the hitlist, show this after the number
_TSEP;

$tsep_lng['config_Numbers_Put_Before']= <<<_TSEP
If we show the number of the page in the hitlist, show this before the number
_TSEP;

$tsep_lng['config_Pagerank']= <<<_TSEP
What is your page rank symbol.
Example: *.
You can also enter some HTML but you must escape special characters.
Example: <&nbsp;img src= "graphics/tsepranks-single.png" alt= "*"&nbsp;>.
Attention: Whatever you enter here will be shown as many times as a searchword is found on the page!
_TSEP;

$tsep_lng['config_Pagerank_Number']= <<<_TSEP
Do you want to show the search rank?
_TSEP;

$tsep_lng['config_parmsExternalPhp']= <<<_TSEP
Enter parameter to be sent to datasupply-script:
_TSEP;

$tsep_lng['config_parmsExternalPhp_help']= <<<_TSEP
This parameter is made available to be used within the external datasupply
Example: An html-filename, where the crawler/spider shoud start its search - see documentation for details
_TSEP;

$tsep_lng['config_Path']= <<<_TSEP
define where your TSEP path is
example: if the file search.php is located in
www.yourdomain.com/php/tsepsearch/search.php
it would look like 'php/tsepsearch'
_TSEP;

$tsep_lng['config_print_list_of_files'] = <<<_P
Show list of indexed files
_P;

$tsep_lng['config_searchViaExt']= <<<_TSEP
indexer should run datasupplier-script
_TSEP;

$tsep_lng['config_searchViaExt_help']= <<<_TSEP
The indexer launches the datasupplier-script to retrieve files to be indexed
(see documentation for details)
_TSEP;

$tsep_lng['config_searchViaRead']= <<<_TSEP
indexer should find files via directoryscan
_TSEP;

$tsep_lng['config_searchViaRead_help']= <<<_TSEP
Tells the indexer to collect filenames to be indexed via directoryscan,
starting at the above given directory
(classic TSEP-searchmode)
_TSEP;

$tsep_lng['config_Show_Record_Change']= <<<_TSEP
Can the user set how many results to display on one page?
_TSEP;

$tsep_lng['config_word_offset'] = <<<_TSEP
Number of words displayed before/after each search term
_TSEP;

$tsep_lng['config_word_offset_help'] = <<<_TSEP
The search result will be only a part of the complete
indexed text. This entry defines how many words will be shown
before and after each hit.
_TSEP;

$tsep_lng['config_max_hints'] = <<<_TSEP
Number of marked search terms for each sentence
_TSEP;

$tsep_lng['config_max_hints_help'] = <<<_TSEP
The number defines the amount of search terms that each
sentence should contain at maximum.
_TSEP;

$tsep_lng['config_max_length'] = <<<_TSEP
Max length of sentence (in characters)
_TSEP;

$tsep_lng['config_max_length_help'] = <<<_TSEP
Sentences with more than the defined number of characters will
not be displayed.
_TSEP;

$tsep_lng['config_Use_Debug_Print']= <<<_TSEP
for programmers only: use debugprint() function?
(should be off for normal use of TSEP)
_TSEP;

$tsep_lng['config_XdirName']= <<<_TSEP
Indexing-startdirectory
(optional, relativ to indexer.php or absolut):
_TSEP;

$tsep_lng['config_XdirName_help']= <<<_TSEP
The definition of the indexing-startdirectory is needed <strong>in special cases only</strong>
 - normally, <strong>simply leave it empty</strong>!<br>
You might need to enter something like ../../ or www/htdocs/youraccount/
_TSEP;

$tsep_lng['config_Xwebdir']= <<<_TSEP
Enter the web directory path *:
_TSEP;

$tsep_lng['config_Xwebdir_help']= <<<_TSEP
This is the web path that corresponds to the above given folder.
Example: http://www.sitename.com/folder1/folder2.
If all files on
"http://www.sitename.com"
should be indexed the correct entry is
"http://www.sitename.com"
_TSEP;

$tsep_lng['configuration']= <<<_TSEP
Configuration
_TSEP;

$tsep_lng['copyright']= <<<_TSEP
Copyright
_TSEP;

$tsep_lng['create_new_index']= <<<_TSEP
Create a new index
_TSEP;

$tsep_lng['data_retrieved']= <<<_TSEP
Data retrieved from database in
_TSEP;

$tsep_lng['day_friday']= <<<_TSEP
Friday
_TSEP;

$tsep_lng['day_friday_short']= <<<_TSEP
Fri
_TSEP;

$tsep_lng['day_monday']= <<<_TSEP
Monday
_TSEP;

$tsep_lng['day_monday_short']= <<<_TSEP
Mon
_TSEP;

$tsep_lng['day_saturday']= <<<_TSEP
Saturday
_TSEP;

$tsep_lng['day_saturday_short']= <<<_TSEP
Sat
_TSEP;

$tsep_lng['day_sunday']= <<<_TSEP
Sunday
_TSEP;

$tsep_lng['day_sunday_short']= <<<_TSEP
Sun
_TSEP;

$tsep_lng['day_thursday']= <<<_TSEP
Thursday
_TSEP;

$tsep_lng['day_thursday_short']= <<<_TSEP
Thu
_TSEP;

$tsep_lng['day_tuesday']= <<<_TSEP
Tuesday
_TSEP;

$tsep_lng['day_tuesday_short']= <<<_TSEP
Tue
_TSEP;

$tsep_lng['day_wednesday']= <<<_TSEP
Wednesday
_TSEP;

$tsep_lng['day_wednesday_short']= <<<_TSEP
Wed
_TSEP;

$tsep_lng['delete']= <<<_TSEP
delete
_TSEP;

$tsep_lng['delete_file']= <<<_TSEP
delete file
_TSEP;

$tsep_lng['transform']= <<<_TSEP
transform
_TSEP;

$tsep_lng['details']= <<<_TSEP
details
_TSEP;

$tsep_lng['directory']= <<<_TSEP
directory
_TSEP;

$tsep_lng['docorrectit']= <<<_TSEP
please DO CORRECT this error BEFORE continuing!
_TSEP;

$tsep_lng['error_from_extscript']= <<<_TSEP
error(s), returned by extneral script
_TSEP;

$tsep_lng['filename']= <<<_TSEP
filename
_TSEP;

$tsep_lng['filter']= <<<_TSEP
filter
_TSEP;

$tsep_lng['forbidden_stopword']= <<<_TSEP
Attention: In your search words the following stopwords which on request of the administrator
cannot be searched were found (more detailed information you find in the "Search Tips"):
_TSEP;

$tsep_lng['found_no_pages']= <<<_TSEP
No pages found.
_TSEP;

$tsep_lng['group_level_gap']= <<<_TSEP
group-level-definition:
group-level has to be exactly 1 greater than the group-level of the preceeding group
_TSEP;

$tsep_lng['help']= <<<_TSEP
Help
_TSEP;

$tsep_lng['help_copyright']= <<<_TSEP
This opens a new window and takes you to the TSEP page at Sourceforge.net
_TSEP;

$tsep_lng['help_del_indexedpage']= <<<_TSEP
Are you sure you want to delete this page from the index
(remove everything about this page from the database)?
_TSEP;

$tsep_lng['help_del_maxresult']= <<<_TSEP
Are you sure you want to delete this max-result?
_TSEP;

$tsep_lng['help_del_stopword']= <<<_TSEP
Are you sure you want to delete this stopword?
_TSEP;

$tsep_lng['help_first_page']= <<<_TSEP
go to first page
_TSEP;

$tsep_lng['help_last_page']= <<<_TSEP
go to last page
_TSEP;

$tsep_lng['help_next_page']= <<<_TSEP
go to next page
_TSEP;

$tsep_lng['help_previous_page']= <<<_TSEP
go to previous page
_TSEP;

$tsep_lng['if_problems_contact']= <<<_TSEP
If you still have problems with your search or you are unhappy with the results,
please mail us your problems or suggestions
_TSEP;

$tsep_lng['impossible_already_exists']= <<<_TSEP
impossible: name already exists
_TSEP;

$tsep_lng['index_edit_date']= <<<_TSEP
Last Index Editing:
_TSEP;

$tsep_lng['index_edit_head']= <<<_TSEP
Edit the data stored in the index
_TSEP;

$tsep_lng['index_edit_title']= <<<_TSEP
Index Editing (detailed)
_TSEP;

$tsep_lng['editindex_last_edited']= <<<_P
Last edit date
_P;

$tsep_lng['editindex_not_edited']= <<<_P
Not edited
_P;

$tsep_lng['indexer_last_indexed']= <<<_P
Last index date
_P;

$tsep_lng['editindex_not_indexed']= <<<_P
Not indexed
_P;
$tsep_lng['index_overview_click_title']= <<<_TSEP
Click here to edit the details of the page.
_TSEP;

$tsep_lng['index_overview_click_url']= <<<_TSEP
Click here to show the page in the browser.
_TSEP;

$tsep_lng['index_overview_head']= <<<_TSEP
Click on a page title or URL to open the details of the entry.
_TSEP;

$tsep_lng['index_overview_help']= <<<_TSEP
Tip: Use the search function of your browser to find what you are looking for even faster
_TSEP;

$tsep_lng['index_overview_title']= <<<_TSEP
Index Overview (short)
_TSEP;

$tsep_lng['indexed_words']= <<<_TSEP
View complete current index (maybe very large!)
_TSEP;

$tsep_lng['indexer_title']= <<<_TSEP
Indexer
_TSEP;

$tsep_lng['indexing_in']= <<<_TSEP
Indexing done in
_TSEP;

$tsep_lng['indexing_on']= <<<_TSEP
Indexing done on
_TSEP;

$tsep_lng['indexingprofile']= <<<_TSEP
Indexingprofile
_TSEP;

$tsep_lng['indexingprofile_unknown']= <<<_TSEP
indexingprofile does not exist: profilename
_TSEP;

$tsep_lng['info_from_extscript']= <<<_TSEP
information(s), returned by extneral script
_TSEP;

$tsep_lng['intErr']= <<<_TSEP
internal error
_TSEP;

$tsep_lng['intErr_wrongfieldtype']= <<<_TSEP
wrong field_type-definition
_TSEP;

$tsep_lng['is']= <<<_TSEP
is
_TSEP;

$tsep_lng['logview_contents']= <<<_TSEP
Entry
_TSEP;

$tsep_lng['logview_head']= <<<_TSEP
Log entries that match all filter criterias are listed below
_TSEP;

$tsep_lng['logview_ip']= <<<_TSEP
IP
_TSEP;

$tsep_lng['logview_no_IP']= <<<_TSEP
not logged
_TSEP;

$tsep_lng['logview_time_of_entry']= <<<_TSEP
Date / Time
_TSEP;

$tsep_lng['logview_title']= <<<_TSEP
Searchterms and Pageopenings
_TSEP;

$tsep_lng['logview_type']= <<<_TSEP
Logtype
_TSEP;

$tsep_lng['logview_type_1']= <<<_TSEP
Search term
_TSEP;

$tsep_lng['logview_type_2']= <<<_TSEP
Result click
_TSEP;

$tsep_lng['logview_IPresolved']= <<<_TSEP
Resolved IP
_TSEP;

$tsep_lng['logview_Stopwords']= <<<_TSEP
Stopwords
_TSEP;

$tsep_lng['mandatory']= <<<_TSEP
* this is a mandatory field! Please provide a value.
_TSEP;

$tsep_lng['match_case']= <<<_TSEP
match case
_TSEP;

$tsep_lng['matches']= <<<_TSEP
matches.
_TSEP;

$tsep_lng['month_april']= <<<_TSEP
April
_TSEP;

$tsep_lng['month_april_short']= <<<_TSEP
Apr
_TSEP;

$tsep_lng['month_august']= <<<_TSEP
August
_TSEP;

$tsep_lng['month_august_short']= <<<_TSEP
Aug
_TSEP;

$tsep_lng['month_december']= <<<_TSEP
December
_TSEP;

$tsep_lng['month_december_short']= <<<_TSEP
Dec
_TSEP;

$tsep_lng['month_february']= <<<_TSEP
February
_TSEP;

$tsep_lng['month_february_short']= <<<_TSEP
Feb
_TSEP;

$tsep_lng['month_january']= <<<_TSEP
January
_TSEP;

$tsep_lng['month_january_short']= <<<_TSEP
Jan
_TSEP;

$tsep_lng['month_july']= <<<_TSEP
July
_TSEP;

$tsep_lng['month_july_short']= <<<_TSEP
Jul
_TSEP;

$tsep_lng['month_june']= <<<_TSEP
June
_TSEP;

$tsep_lng['month_june_short']= <<<_TSEP
Jun
_TSEP;

$tsep_lng['month_march']= <<<_TSEP
March
_TSEP;

$tsep_lng['month_march_short']= <<<_TSEP
Mar
_TSEP;

$tsep_lng['month_may']= <<<_TSEP
May
_TSEP;

$tsep_lng['month_may_short']= <<<_TSEP
May
_TSEP;

$tsep_lng['month_november']= <<<_TSEP
November
_TSEP;

$tsep_lng['month_november_short']= <<<_TSEP
Nov
_TSEP;

$tsep_lng['month_october']= <<<_TSEP
October
_TSEP;

$tsep_lng['month_october_short']= <<<_TSEP
Oct
_TSEP;

$tsep_lng['month_september']= <<<_TSEP
September
_TSEP;

$tsep_lng['month_september_short']= <<<_TSEP
Sep
_TSEP;

$tsep_lng['more_than_four']= <<<_TSEP
Please enter a search string of 4 characters or more.
_TSEP;

$tsep_lng['mysql_boolean_warning']= <<<_TSEP
Attention: Due to an old database version the search did not use boolean operators.
All words you entered must occur in the document in order to find it.
Search operators will not be used.
_TSEP;

$tsep_lng['name_already_exists']= <<<_TSEP
name already exists
_TSEP;

$tsep_lng['name_is_empty']= <<<_TSEP
name is empty!
_TSEP;

$tsep_lng['navigate_one_page_back']= <<<_TSEP
go back to the previous page
_TSEP;

$tsep_lng['new_index_head']= <<<_TSEP
A new index has been created!<br />Below is the list of the indexed files
_TSEP;

$tsep_lng['new_index_head_searching']= <<<_TSEP
Creating new index...<br />Please be patient...
_TSEP;

$tsep_lng['new_window']= <<<_TSEP
(new window)
_TSEP;

$tsep_lng['no_records']= <<<_TSEP
No records
_TSEP;

$tsep_lng['none']= <<<_TSEP
none
_TSEP;

$tsep_lng['nothing']= <<<_TSEP
nothing
_TSEP;

$tsep_lng['of']= <<<_TSEP
of
_TSEP;

$tsep_lng['old_index_head']= <<<_TSEP
Below is the list of (OLD) indexed files currently in the database
_TSEP;

$tsep_lng['only']= <<<_TSEP
Only
_TSEP;

$tsep_lng['only_one_value']= <<<_TSEP
only one value!
_TSEP;

$tsep_lng['only_one_word']= <<<_TSEP
one word only!
_TSEP;

$tsep_lng['page_file_size']= <<<_TSEP
Page file size:
_TSEP;

$tsep_lng['page_indexed_metawords']= <<<_TSEP
Indexed metatag-words:
_TSEP;

$tsep_lng['page_indexed_words']= <<<_TSEP
Indexed words:
_TSEP;

$tsep_lng['page_nr_indexed_words']= <<<_P
Words:
_P;

$tsep_lng['page_number']= <<<_TSEP
Page number:
_TSEP;

$tsep_lng['page_rank']= <<<_TSEP
x found
_TSEP;

$tsep_lng['page_rank_help']= <<<_TSEP
Your search words have been found on this page this often
_TSEP;

$tsep_lng['page_rank_real']= <<<_TSEP
Rank of this page (calculated by the number of occurrences of the search words in the document)
_TSEP;

$tsep_lng['page_title']= <<<_TSEP
Page title:
_TSEP;

$tsep_lng['page_url']= <<<_TSEP
Page URL:
_TSEP;

$tsep_lng['pages_found']= <<<_TSEP
pages were found.
_TSEP;

$tsep_lng['pages_indexed']= <<<_TSEP
pages indexed
_TSEP;

$tsep_lng['pages_not_to_be_indexed']= <<<_TSEP
pages NOT to be indexed
_TSEP;

$tsep_lng['pages_to_be_indexed']= <<<_TSEP
pages to be indexed
_TSEP;

$tsep_lng['powered_by']= <<<_TSEP
powered by
_TSEP;

$tsep_lng['protect_indexentry']= <<<_TSEP
protect indexentry (from rebuilding or deleting by the indexer):
_TSEP;

$tsep_lng['protected_indexentry']= <<<_TSEP
Indexentry protected
_TSEP;

$tsep_lng['really_delete']= <<<_TSEP
really delete?
_TSEP;

$tsep_lng['records']= <<<_TSEP
Records
_TSEP;

$tsep_lng['rename']= <<<_TSEP
rename
_TSEP;

$tsep_lng['results']= <<<_TSEP
Results
_TSEP;

$tsep_lng['results_to_show_user']= <<<_TSEP
The user can choose between the following number of results to display on one page:
_TSEP;

$tsep_lng['save']= <<<_TSEP
save
_TSEP;

$tsep_lng['saveas']= <<<_TSEP
save as
_TSEP;

$tsep_lng['search_tips']= <<<_TSEP
Search Tips
_TSEP;

$tsep_lng['search_tips_desc']= <<<_TSEP
TSEP search engine by default searches for all the given words and displays the page
which has the all given search words. The minimum number of characters for a word
to perform a search is 4. Listed below is an example of the boolean search used in the TSEP.
_TSEP;

$tsep_lng['search_tips_ex1']= <<<_TSEP
find pages that contain at least one of these words.
_TSEP;

$tsep_lng['search_tips_ex2']= <<<_TSEP
find pages that contain both words.
_TSEP;

$tsep_lng['search_tips_ex3']= <<<_TSEP
word "apple", but rank it higher if it also contains "macintosh".
_TSEP;

$tsep_lng['search_tips_ex4']= <<<_TSEP
word "apple" but not "macintosh".
_TSEP;

$tsep_lng['search_tips_ex5']= <<<_TSEP
"apple" and "pie", or "apple" and "strudel" (in any order),
but rank "apple pie" higher than "apple strudel".
_TSEP;

$tsep_lng['search_tips_ex6']= <<<_TSEP
"apple", "apples", "applesauce", and "applet".
* represents 0 or more characters and can only occur at the end of a search word!
_TSEP;

$tsep_lng['search_tips_ex7']= <<<_TSEP
find pages that contain the exact phrase "some words"
(for example, pages that contain "some words of wisdom" but not "some noise words").
_TSEP;

$tsep_lng['search_tips_head']= <<<_TSEP
Tips for using TSEP effectively
_TSEP;

$tsep_lng['search_tips_help']= <<<_TSEP
opens help in a new window
_TSEP;

$tsep_lng['search_tips_se1']= <<<_TSEP
apple banana
_TSEP;

$tsep_lng['search_tips_se2']= <<<_TSEP
+apple +banana
_TSEP;

$tsep_lng['search_tips_se3']= <<<_TSEP
+apple macintosh
_TSEP;

$tsep_lng['search_tips_se4']= <<<_TSEP
+apple -macintosh
_TSEP;

$tsep_lng['search_tips_se5']= <<<_TSEP
+apple +(>pie <strudel)
_TSEP;

$tsep_lng['search_tips_se6']= <<<_TSEP
apple*
_TSEP;

$tsep_lng['search_tips_se7']= <<<_TSEP
"some words"
_TSEP;

$tsep_lng['search_tips_title']= <<<_TSEP
Search Tips
_TSEP;

$tsep_lng['search_took']= <<<_TSEP
Search took
_TSEP;

$tsep_lng['search_what_are_stopwords']= <<<_TSEP
A search word which is a stopword will not be searched on or marked in the results.
Besides the user defined stopwords there might be stopwords pre-defined by the administrator.
Stopwords the administrator has defined are:
_TSEP;

$tsep_lng['searched_site_for']= <<<_TSEP
Searched the site for
_TSEP;

$tsep_lng['seconds']= <<<_TSEP
seconds
_TSEP;

$tsep_lng['separate_values_by_comma']= <<<_TSEP
separate multiple value-definitions by comma
_TSEP;

$tsep_lng['show_it']= <<<_TSEP
show
_TSEP;

$tsep_lng['show_results_per_page']= <<<_TSEP
results per page will be shown. Every change reloads the page with the new value.
_TSEP;

$tsep_lng['show_x_results_per_page']= <<<_TSEP
 / page
_TSEP;

$tsep_lng['sim_index_head']= <<<_TSEP
Files to be indexed.<br />Below is the list of files, which would be indexed
_TSEP;

$tsep_lng['sim_index_head_searching']= <<<_TSEP
Searching files...<br />Please be patient...
_TSEP;

$tsep_lng['skip_cause_protected_indexentry']= <<<_TSEP
pages will not be indexed (because of protected according indexentries)
_TSEP;

$tsep_lng['sort_asc']= <<<_TSEP
sorts A -> Z, oldest -> newest
_TSEP;

$tsep_lng['sort_desc']= <<<_TSEP
sorts Z -> A, newest -> oldest
_TSEP;

$tsep_lng['start_indexing']= <<<_TSEP
Start Indexing**
_TSEP;

$tsep_lng['stopwords']= <<<_TSEP
Stopwords
_TSEP;

$tsep_lng['stopwords_title']= <<<_TSEP
Stopwords
_TSEP;

$tsep_lng['to']= <<<_TSEP
to
_TSEP;

$tsep_lng['tsep']= <<<_TSEP
TSEP - The Search Engine Project
_TSEP;

$tsep_lng['type']= <<<_TSEP
type
_TSEP;

$tsep_lng['update']= <<<_TSEP
update
_TSEP;

$tsep_lng['value_already_exists']= <<<_TSEP
Value already exists
_TSEP;

$tsep_lng['value_for']= <<<_TSEP
value for
_TSEP;

$tsep_lng['version']= <<<_TSEP
This is version
_TSEP;

$tsep_lng['warning']= <<<_TSEP
** Please click the "Start Indexing" button only once and do not close your browser
window until the search is finished. Also do not run multiple instances of this indexer.
_TSEP;

$tsep_lng['your_stopwords_head']= <<<_TSEP
Valid stopwords <br />(can not be searched for and will not be marked in the results)
_TSEP;

$tsep_lng['config_force_http_fileparse']=  <<<_TSEP
Force parsing via HTTP
_TSEP;

$tsep_lng['config_force_http_fileparse_help']=  <<<_TSEP
Using "Force parsing via HTTP" has (at least) two advantages: SSI-content is parsed
too and URLs outside your local scope can be indexed (i.e. files, which can not be read directly
via local-fileopen). The disadvantage is, that the indexing-process can be slowed down extremly!
_TSEP;

$tsep_lng['error_while_parsing']=  <<<_TSEP
Error(s) while reading or parsing
_TSEP;

$tsep_lng['delete_indexingprofiles_info']=  <<<_TSEP
***CAUTION***: ALL depending indices are Deleted too, if they are not assigned to other indexingprofiles too!
_TSEP;

$tsep_lng['config_group_indexer_paths']=  <<<_TSEP
Paths
_TSEP;

$tsep_lng['config_group_indexer_include_and_exclude']=  <<<_TSEP
Include and Exclude
_TSEP;

$tsep_lng['config_group_indexer_external_datasupply']=  <<<_TSEP
External datasupply
_TSEP;

$tsep_lng['config_group_indexer_indexing_mode']=  <<<_TSEP
Indexing mode
_TSEP;

$tsep_lng['config_group_indexer_indexing_modifiers']=  <<<_TSEP
Indexing modifiers
_TSEP;

$tsep_lng['config_group_indexer_miscellaneous']=  <<<_TSEP
Miscellaneous
_TSEP;

$tsep_lng['filter_filterbutton']= <<<_P
Apply Filter
_P;

$tsep_lng['filter_filterbutton_Remove_Filter']= <<<_P
Remove Filter
_P;

$tsep_lng['filter_logviewtype_all']= <<<_P
All
_P;

$tsep_lng['filter_from']= <<<_P
From:
_P;

$tsep_lng['filter_to']= <<<_P
To:
_P;

$tsep_lng['filter_date_format']= <<<_P
YYYY-[M]M-[D]D
_P;

$tsep_lng['filter_time_format']= <<<_P
HH:MM:SS
_P;



// start logviewstats.php
$tsep_lng['logviewstats_title']= <<<_P
Searchterms and Pageopenings: Statistics
_P;

$tsep_lng['logviewstats_head']= <<<_P
Logging Statistics
_P;

$tsep_lng['logviewstats_groupTotals']= <<<_P
Totals
_P;

$tsep_lng['logviewstats_groupDetails']= <<<_P
Details
_P;

$tsep_lng['logviewstats_groupTopX']= <<<_P
Top
_P;

$tsep_lng['logviewstats_groupTopAll']= <<<_P
All entries
_P;

$tsep_lng['logviewstats_DomainUnresolved']= <<<_P
Unresolved
_P;

$tsep_lng['logviewstats_nrRecords']= <<<_P
Log records
_P;

$tsep_lng['logviewstats_nrSetupEntries']= <<<_P
Installs and updates
_P;

$tsep_lng['logviewstats_nrSearchQueries']= <<<_P
Search terms
_P;

$tsep_lng['logviewstats_nrClicks']= <<<_P
Result clicks
_P;

$tsep_lng['logviewstats_nrDomains']= <<<_P
Unique domains
_P;

$tsep_lng['logviewstats_nrIPs']= <<<_P
Unique IP addresses
_P;

$tsep_lng['logviewstats_nrSearchwords']= <<<_P
Unique search words
_P;

$tsep_lng['logviewstats_nrStopwords']= <<<_P
Unique stopwords
_P;

$tsep_lng['logviewstats_topSearchqueries']= <<<_P
Search terms
_P;

$tsep_lng['logviewstats_topClicks']= <<<_P
Result clicks
_P;

$tsep_lng['logviewstats_topSearchwords']= <<<_P
Unique search words
_P;

$tsep_lng['logviewstats_topStopwords']= <<<_P
Unique stopwords
_P;

$tsep_lng['logviewstats_topIPs']= <<<_P
Unique IP addresses
_P;

$tsep_lng['logviewstats_topDomains']= <<<_P
Unique domains
_P;

$tsep_lng['logviewstats_DrillDown']= <<<_P
Click here to drill down (see all statistics of this subcategory)
_P;

$tsep_lng['error_indexer_is_running']= <<<_P
<<<<<<< .mine
The indexer is already running:<br />%s
=======
<@>The indexer is already running:<br />%s
>>>>>>> .r230
_P;

$tsep_lng['warning_php_safe_mode_on']= <<<_P
<b>Warning: PHP safe_mode is ON</b><br />
The maximum execution time you set in the configuration screen will not work on this system.<br />
PHP is set by your administrator to timeout after %d minutes.
_P;

$tsep_lng['editindex_last_edited']= <<<_P
Last edit date:
_P;

$tsep_lng['editindex_not_edited']= <<<_P
Not edited
_P;

$tsep_lng['indexer_last_indexed']= <<<_P
Last index date:
_P;

$tsep_lng['editindex_not_indexed']= <<<_P
Not indexed
_P;

$tsep_lng['page_additional_info'] = <<<_P
Additional information:
_P;

// end logviewstats.php

$tsep_lng['ss_search_term'] = <<<_P
Query
_P;

$tsep_lng['ss_search_term_hover'] = <<<_P
Previously used search queries
_P;

$tsep_lng['ss_popular'] = <<<_P
Pop
_P;

$tsep_lng['ss_popular_hover'] = <<<_P
Number of times the query is used (popularity)
_P;

$tsep_lng['ss_returned_pages'] = <<<_P
RP
_P;

$tsep_lng['ss_returned_pages_hover'] = <<<_P
The number of pages returned by the query
_P;

$tsep_lng['error_index_nothing'] = <<<_P
Empty (i.e. nothing to index): &nbsp;
_P;

$tsep_lng['error_empty_files'] = <<<_P
files empty (i.e. nothing to index)
_P;

$tsep_lng['display_ranking'] = <<<_P
Display the ranking with images
_P;

$tsep_lng['ranking_alt'] = <<<_P
Type an alternate text for the image
_P;

$tsep_lng['ranking_comments'] = <<<_P
Comments (internal only)
_P;

$tsep_lng['ranking_image_text'] = <<<_P
Please set the image-file
_P;

$tsep_lng['ranking_submit'] = <<<_P
Set image
_P;

$tsep_lng['ranking_delete'] = <<<_P
Delete image
_P;

$tsep_lng['ranking_modify'] = <<<_P
@Modify image
_P;

$tsep_lng['help_del_ranking'] = <<<_P
@Are you sure to want delete this image?
_P;

$tsep_lng['alert_mod_ranking'] = <<<_P
@You cannot modify the percent
_P;

$tsep_lng['help_mod_ranking'] = <<<_P
@Are you sure to want modify this image?
_P;

$tsep_lng['ranking_range'] = <<<_P
Set a step to display in percent
_P;

$tsep_lng['ranking_image'] = <<<_P
image
_P;

$tsep_lng['ranking_url'] = <<<_P
display (e.g. URL)
_P;

$tsep_lng['ranking_com'] = <<<_P
comments
_P;

$tsep_lng['ranking_alt_attrib'] = <<<_P
HTML ALT attribute
_P;

$tsep_lng['ranking_percent'] = <<<_P
The step in percent
_P;

//----------------- begin setup.php ---------------------
$tsep_lng['setup_Rollback_completed'] = <<<_P
Rollback completed
_P;

$tsep_lng['setup_Unknown'] = <<<_P
Unknown
_P;

$tsep_lng['setup_Setup'] = <<<_P
Setup
_P;

$tsep_lng['setup_step1'] = <<<_P
1. Introduction
_P;

$tsep_lng['setup_step2'] = <<<_P
2. Database setup
_P;

$tsep_lng['setup_step3'] = <<<_P
3. System check
_P;

$tsep_lng['setup_step4'] = <<<_P
4. Configuration
_P;

$tsep_lng['setup_step5'] = <<<_P
5. Installation
_P;

$tsep_lng['setup_step6'] = <<<_P
6. Summary
_P;

$tsep_lng['setup_step7'] = <<<_P
7. Feedback
_P;

$tsep_lng['setup_CancelButtonPressed'] = <<<_P
You have clicked the cancel button indicating that you want to abort the installation of <span class="tsep">TSEP</span>.<br /><br />
Why did you do that? Don't you realize what you'll be missing out on?
<span class="tsep">TSEP</span> is without a doubt the best search engine on the entire net!!<br /><br />
Ok... Have it your way! But be ware of this:<br /><br />
Clicking the Quit button will terminate the installation and take you to the <span class="tsep">TSEP</span> page on SourceForge.
Any changes made to your website will <b>not</b> be rolled back!
_P;

$tsep_lng['setup_IwantToQuit'] = <<<_P
I've made up my mind: I want to quit!
_P;

$tsep_lng['setup_Quit'] = <<<_P
Quit
_P;

$tsep_lng['setup_ContinueSetup'] = <<<_P
Continue setup
_P;

$tsep_lng['setup_IwantToContinue'] = <<<_P
Sorry! Changed my mind. Let me continue...
_P;

$tsep_lng['setup_ToPreviousStep'] = <<<_P
Take me to the previous step...
_P;

$tsep_lng['setup_Previous'] = <<<_P
Previous
_P;

$tsep_lng['setup_Next'] = <<<_P
Next
_P;

$tsep_lng['setup_ToNextStep'] = <<<_P
Take me to the next step...
_P;

$tsep_lng['setup_IWantToQuitInstalling'] = <<<_P
I want to quit installing TSEP.
_P;

$tsep_lng['setup_Cancel'] = <<<_P
Cancel
_P;

$tsep_lng['select_language'] = <<<_P
Select your favorite TSEP-language
_P;

$tsep_lng['setup_ThanksForConsidering'] = <<<_P
Thank you for considering to use <span class="tsep">TSEP</span>.<br /><br />
You are installing <span class="tsep">TSEP</span>. This installer will take you through the process of setting up or upgrading <span class="tsep">TSEP</span>. On the left side of the screen you see the steps to take before the installation is complete. You will be able to track the progress of the installation by checking those steps.<br /><br />
We have taken great care to select the default options for you. If this is your first install we suggest you accept the default values and tweak them as you learn how to use <span class="tsep">TSEP</span>. If you're upgrading from an older version of <span class="tsep">TSEP</span> the installer determines your old settings. You'll be able to copy them to the new setup or accept the default values.<br /><br />
We hope <span class="tsep">TSEP</span> proves to be a valuable tool for your website.<br />
If you have any questions or comments please contact us through our forum at our <a href="http://sourceforge.net/projects/tsep/" target="blank">SourceForge site</a>.<br /><br />
The <span class="tsep">TSEP</span> Team<br />
_P;

$tsep_lng['setup_DB_1'] = <<<_P
Please enter the data <span class="tsep">TSEP</span> needs to access your database and scripts.
_P;

$tsep_lng['setup_DB_2_Host'] = <<<_P
Database host:
_P;

$tsep_lng['setup_DB_2_Host_Help'] = <<<_P
Enter the URL to the MySQL server. In most cases this is \'localhost\'.<br /><br />If you\'re not sure accept the default.
_P;

$tsep_lng['setup_DB_3_Username'] = <<<_P
Database username:
_P;

$tsep_lng['setup_DB_3_Username_Help'] = <<<_P
The user name you use to logon to MySQL.
_P;

$tsep_lng['setup_DB_4_Passwd'] = <<<_P
Database password:
_P;

$tsep_lng['setup_DB_4_Passwd_Help'] = <<<_P
Your password to the user name above.
_P;

$tsep_lng['setup_DB_5_DBName'] = <<<_P
Database name:
_P;

$tsep_lng['setup_DB_5_DBName_Help'] = <<<_P
What is the name of the database you created for TSEP?
_P;

$tsep_lng['setup_DB_6_ForceCreation'] = <<<_P
Force database creation:
_P;

$tsep_lng['setup_DB_6_ForceCreation_Help'] = <<<_P
If set to YES Setup will try to create the database for you.<br /><br />If the database already exists Setup will leave it alone and continue with the process.
_P;

$tsep_lng['setup_Yes'] = <<<_P
Yes
_P;

$tsep_lng['setup_No'] = <<<_P
No
_P;

$tsep_lng['setup_DB_7_Prefix'] = <<<_P
Table prefix to use:
_P;

$tsep_lng['setup_DB_7_Prefix_Help'] = <<<_P
If your web host allows you only one database you can make sure the table names are unique by entering a prefix here.<br /><br />If you\'re not sure just accept the default value.
_P;


$tsep_lng['setup_DB_8_TSEP_Root'] = <<<_P
<span class="tsep">TSEP</span> root directory:
_P;


$tsep_lng['setup_DB_8_TSEP_Root_Help'] = <<<_P
TSEP\'s root directory, relative to your document root.<br /><br />This is probably correct. If you don\'t know the directory name accept this default.
_P;


$tsep_lng['setup_DB_9_TSEP_AbsPath'] = <<<_P
Absolute path to the<br /><span class="tsep">TSEP</span> root directory:
_P;


$tsep_lng['setup_DB_9_TSEP_AbsPath_Help'] = <<<_P
The absolute path to TSEP\'s root directory.<br /><br />If you don\'t know the directory name accept this default.
_P;

$tsep_lng['setup_DB_10_TSEP_TmpPath'] = <<<_P
Absolute path to the<br /><span class="tsep">TSEP</span> temp-directory:
_P;


$tsep_lng['setup_DB_10_TSEP_TmpPath_Help'] = <<<_P
The absolute path to TSEP\'s temp-directory.<br /><br />Has to have write-permissions.
_P;


$tsep_lng['setup_UnknownDBHost'] = <<<_P
You specified an unknown database host.<br />Please check your input and submit again.
_P;


$tsep_lng['setup_NoDBAccess'] = <<<_P
Access to the database is denied.<br />This means that the username or password (or both) are invalid.
_P;


$tsep_lng['setup_ConnectionDenied'] = <<<_P
<@>Connection to MySQL server failed. Please check your settings (name, password, etc.) and whether the MySQL server is running.
_P;


$tsep_lng['setup_DBNotExists'] = <<<_P
The database you specified does not exist<br />and I can not create it for you.
_P;


$tsep_lng['setup_DBNameWrong'] = <<<_P
The database name you specified is not correct<br />(database does not exist).
_P;


$tsep_lng['setup_DBUnknownError'] = <<<_P
There is an unknown error connecting to the database.<br />Are you absolutely sure MySQL is correctly setup?<br />Are the settings below correct?
_P;


$tsep_lng['setup_TSEPRootWrong'] = <<<_P
The TSEP root directory is not correct.
_P;


$tsep_lng['setup_TSEPAbsPathWrong'] = <<<_P
The absolute path to the TSEP root directory is not correct.
_P;

$tsep_lng['setup_TSEPTmpPathWrong'] = <<<_P
The absolute path to the TSEP temp-directory does not exist (i.e. mkdir() was not possible)
_P;

$tsep_lng['setup_TSEPTmpPathNotWritable'] = <<<_P
The absolute path to the TSEP temp-directory: unable to write into directory.
_P;


$tsep_lng['setup_HTAccessNotFound'] = <<<_P
.htaccess not found
_P;


$tsep_lng['setup_OK'] = <<<_P
ok
_P;


$tsep_lng['setup_NoProtectionFound'] = <<<_P
No protection clause found
_P;


$tsep_lng['setup_Global_1'] = <<<_P
<b>Important:</b> You only need to take this step if setup is unable to write the database connection data to the file "/include/global.php".<br />
_P;


$tsep_lng['setup_Global_2'] = <<<_P
Please take the following steps to correctly patch the current global.php file.<br />
_P;


$tsep_lng['setup_Global_3'] = <<<_P
Copy the data in the frame below.
_P;


$tsep_lng['setup_Global_3s1'] = <<<_P
Open the file "/include/global.php" on your harddisk.
_P;


$tsep_lng['setup_Global_3s21'] = <<<_P
Replace the code between the placeholders
_P;


$tsep_lng['setup_and'] = <<<_P
and
_P;

$tsep_lng['setup_Global_3s22'] = <<<_P
, making sure you don't replace the lines with the placeholders themselves but only the lines between them.
_P;

$tsep_lng['setup_Global_3s3'] = <<<_P
Save the file.
_P;

$tsep_lng['setup_Global_3s4'] = <<<_P
Upload the file to the /include directory of your website overwriting the old file.
_P;

$tsep_lng['setup_Global_3s5'] = <<<_P
Click the "Next" button on the bottom of this page.
_P;

$tsep_lng['setup_Global_4'] = <<<_P
If all went well you will be able to continue the setup and install <span class="tsep">TSEP</span> correctly.<br />
_P;

$tsep_lng['setup_patch_manually'] = <<<_P
patch manually
_P;

$tsep_lng['setup_patch_manually_help'] = <<<_P
If setup is unable to save the connection data please click here and follow the instructions.
_P;

$tsep_lng['setup_warning'] = <<<_P
warning
_P;

$tsep_lng['setup_SysChk_1'] = <<<_P
The system check reveals the following information. Please check carefully and correct where needed.<br />
_P;

$tsep_lng['setup_MySQL_version'] = <<<_P
MySQL version:
_P;

$tsep_lng['setup_MySQL_version_Help'] = <<<_P
The version of MySQL you are running must v3.23 or higher to take advantage of TSEP\'s advanced features.<br /><br />If you want to get the most out of TSEP use version 4.1 or higher.<br /><br />We can\'t guarantee proper behavior with older versions.
_P;

$tsep_lng['setup_PHP_version'] = <<<_P
PHP version:
_P;

$tsep_lng['setup_PHP_version_Help'] = <<<_P
TSEP is tested with PHP versions 4.2 and higher.<br /><br />We can\'t guarantee proper behavior with older versions.
_P;

$tsep_lng['setup_TSEP_oldver'] = <<<_P
Old <span class="tsep">TSEP</span> version:
_P;

$tsep_lng['setup_TSEP_oldver_Help'] = <<<_P
This is just some information.<br/><br/>It shows the version of TSEP that you are upgrading (if present).
_P;

$tsep_lng['setup_TSEP_newver'] = <<<_P
New <span class="tsep">TSEP</span> version:
_P;

$tsep_lng['setup_TSEP_newver_Help'] = <<<_P
This is just some information.<br/><br/>It shows the version of TSEP you are installing right now.
_P;

$tsep_lng['setup_DB_Config_File'] = <<<_P
Database config file:
_P;

$tsep_lng['setup_DB_Config_File_Help_1'] = <<<_P
The file containing the connection data must be writable for the setup to function correctly.
_P;

$tsep_lng['setup_DB_Config_File_Help_2'] = <<<_P
Please chmod the file \'include/global.php\' to \'666\'.<br /><br />If the file is not writable you can proceed by clicking NEXT. Setup will try to set the files poperties to writable.<br /><br />If that fails you have to use the download link to get the correct settings. Please follow the instructions on the download page.
_P;

$tsep_lng['setup_DB_Config_File_Writable'] = <<<_P
Writable
_P;

$tsep_lng['setup_DB_Config_File_UnWritable'] = <<<_P
Unwritable
_P;


$tsep_lng['setup_PHPSafeMode'] = <<<_P
PHP Safe mode:
_P;

$tsep_lng['setup_PHPSafeMode_Help'] = <<<_P
If PHP safe_mode is <b>ON</b> some features in TSEP will not work.<br /><br />This is not critical. If you don\'t have a very good reason to change this setting just leave it as is.
_P;

$tsep_lng['setup_On'] = <<<_P
On
_P;

$tsep_lng['setup_Off'] = <<<_P
Off
_P;

$tsep_lng['setup_Admin_area_security'] = <<<_P
Admin area security:
_P;

$tsep_lng['setup_Admin_area_security_Help'] = <<<_P
You should protect the admin area with a password using the <i>.htaccess</i> file (if you\'re using Apache).<br /><br />If you haven\'t protected the admin area everyone can change your settings.
_P;

$tsep_lng['setup_Protected'] = <<<_P
Protected
_P;

$tsep_lng['setup_Include_dir_security'] = <<<_P
Include directory security:
_P;

$tsep_lng['setup_Include_dir_security_Help'] = <<<_P
You should protect the include directory using the <i>.htaccess</i> file (if you\'re using Apache).<br /><br />Not protecting the include directory is a security risk since your username/ password to the database are stored there.
_P;

$tsep_lng['setup_DBcfgUnwriteable'] = <<<_P
The database config file is not writable.<br />Please click &gt;patch manually&lt; to resolve the problem.
_P;

$tsep_lng['setup_UpdateOrFresh'] = <<<_P
Setup needs your decisions on the issues below. These settings determine what\'s copied from the old to the new version (if applicable).<br />
_P;

$tsep_lng['setup_Fresh'] = <<<_P
Fresh install (with default values):
_P;
$tsep_lng['setup_Fresh_Help'] = <<<_P
If you want to install a fresh copy of TSEP with only the default values, set this option to <b>YES</b>. Setup will disregard any settings, profiles, etc. and just install TSEP as plain vanilla.
_P;

$tsep_lng['setup_Update'] = <<<_P
Update from old version:
_P;

$tsep_lng['setup_Update_Help'] = <<<_P
If you are upgrading TSEP and want to preserve your settings select <b>YES</b>. In this case the table prefix of the old and new installation must match.<br /><br />If you are installing a fresh copy of TSEP or you don\'t want to overwrite the old tables select <b>NO</b>. Make sure the table prefix is unique!
_P;

$tsep_lng['setup_CopyOld'] = <<<_P
Copy old configuration:
_P;
$tsep_lng['setup_CopyOld_Help'] = <<<_P
If you are upgrading TSEP and want to preserve your old <u>configuration</u> select <b>YES</b>.<br /><br />Only works if \'<i>Update</i>\' is set to YES.
_P;

$tsep_lng['setup_CopyOldProfiles'] = <<<_P
Copy old profiles:
_P;

$tsep_lng['setup_CopyOldProfiles_Help']= <<<_P
If you are upgrading TSEP and want to preserve your old <u>profiles</u> select <b>YES</b>.<br /><br />Only works if \'<i>Update</i>\' is set to YES.
_P;

$tsep_lng['setup_CopyOldIndexes'] = <<<_P
Copy old indexes:
_P;
$tsep_lng['setup_CopyOldIndexes_Help'] = <<<_P
If you are upgrading TSEP and want to preserve your old <u>indexes</u> select <b>YES</b>.<br /><br />If you want to copy the indexes you have to copy the profiles too!<br /><br />Only works if \'<i>Update</i>\' is set to YES.
_P;

$tsep_lng['setup_CopyOldStopwords'] = <<<_P
Copy old stopwords:
_P;

$tsep_lng['setup_CopyOldStopwords_Help'] = <<<_P
If you are upgrading TSEP and want to preserve your old <u>stopwords</u> select <b>YES</b>.<br /><br />Only works if \'<i>Update</i>\' is set to YES.
_P;

$tsep_lng['setup_CopyOldLogs'] = <<<_P
Copy old logs:
_P;
$tsep_lng['setup_CopyOldLogs_Help'] = <<<_P
If you are upgrading TSEP and want to preserve your old <u>logs</u> select <b>YES</b>.<br /><br />Only works if \'<i>Update</i>\' is set to YES.
_P;

$tsep_lng['setup_CopyOldRankSymbols'] = <<<_P
Copy old ranksymbols:
_P;

$tsep_lng['setup_CopyOldRankSymbols_Help'] = <<<_P
If you are upgrading TSEP and want to preserve your old <u>rank symbols</u> select <b>YES</b>.<br /><br />Only works if \'<i>Update</i>\' is set to YES.
_P;

$tsep_lng['setup_IndicateNoUpdate'] = <<<_P
You indicated not wanting to perform an update of your old system<br />but you specified a table prefix that is the same as the one in use.
_P;
$tsep_lng['setup_IndicateUpdate'] = <<<_P
You indicated wanting to perform an update of your old system<br />but you specified a table prefix that is the different from the one in use.
_P;

$tsep_lng['setup_Fatal_Error'] = <<<_P
Fatal error:
_P;

$tsep_lng['setup_Saving_old_tables'] = <<<_P
Saving old tables
_P;

$tsep_lng['setup_Can_not_open'] = <<<_P
Can not open
_P;
$tsep_lng['setup_Can_not_write_to'] = <<<_P
Can not write to
_P;

$tsep_lng['setup_Copying_settings'] = <<<_P
Copying settings
_P;

$tsep_lng['setup_Copying_indexes'] = <<<_P
Copying indexes
_P;

$tsep_lng['setup_Copying_profile2index_links'] = <<<_P
Copying profile-to-index links
_P;
$tsep_lng['setup_Copying_profiles'] = <<<_P
Copying profiles
_P;

$tsep_lng['setup_Copying_log_entries'] = <<<_P
Copying log entries
_P;

$tsep_lng['setup_Copying_log_hits'] = <<<_P
Copying log hits
_P;

$tsep_lng['setup_Copying_stopwords'] = <<<_P
Copying stopwords
_P;
$tsep_lng['setup_Copying_rank_symbols'] = <<<_P
Copying rank symbols
_P;

$tsep_lng['setup_Congratulations'] = <<<_P
Congratulations! The installation is completed successfully.
_P;

$tsep_lng['setup_Continue2Summary'] = <<<_P
Please continue to the summary screen to wrap things up.
_P;

$tsep_lng['setup_PerformingInstallOfVer'] = <<<_P
Setup is performing the installation of <span class="tsep">TSEP</span> version
_P;
$tsep_lng['setup_DoNotInterrupt'] = <<<_P
Please don't interrupt this process: you'll end up with a broken configuration if you do.<br />
_P;

$tsep_lng['setup_Progress'] = <<<_P
Progress:
_P;

$tsep_lng['setup_Deleting_old_tables'] = <<<_P
Deleting old tables
_P;

$tsep_lng['setup_Creating_new_tables'] = <<<_P
Creating new tables
_P;
$tsep_lng['setup_Populating_new_tables'] = <<<_P
Populating new tables
_P;

$tsep_lng['setup_FinishedInstalling'] = <<<_P
You have finished installing <span class="tsep">TSEP</span> version
_P;

$tsep_lng['setup_Summary_of_installation'] = <<<_P
Summary of installation
_P;

$tsep_lng['setup_Settings'] = <<<_P
Settings:
_P;

$tsep_lng['setup_records_copied'] = <<<_P
 records copied
_P;

$tsep_lng['setup_records_copied_Zero'] = <<<_P
0 records copied
_P;

$tsep_lng['setup_Not_selected_for_update'] = <<<_P
Not selected for update
_P;

$tsep_lng['setup_Profiles'] = <<<_P
Profiles:
_P;

$tsep_lng['setup_Indexes'] = <<<_P
Indexes:
_P;


$tsep_lng['setup_Stopwords'] = <<<_P
Stopwords:
_P;

$tsep_lng['setup_Logs'] = <<<_P
Logs:
_P;

$tsep_lng['setup_Ranksymbols'] = <<<_P
Ranksymbols:
_P;

$tsep_lng['setup_Important'] = <<<_P
Important:
_P;

$tsep_lng['setup_Important_Delete'] = <<<_P
Please remember to <u>protect</u> the <u>admin adrea</u> and <u>include directory</u> if you haven't done so already.
Also <u>delete</u> the file <u>/admin/setup.php</u> so your configuration can't get molested by malicious hackers.
_P;


$tsep_lng['setup_TakeMe2Config'] = <<<_P
Take me to the configuration...
_P;


$tsep_lng['setup_Finish'] = <<<_P
Finish
_P;

$tsep_lng['setup_Steps_1'] = <<<_P
Introduction
_P;

$tsep_lng['setup_Steps_2'] = <<<_P
Database setup
_P;

$tsep_lng['setup_Steps_3'] = <<<_P
System Check
_P;

$tsep_lng['setup_Steps_4'] = <<<_P
Configuration
_P;

$tsep_lng['setup_Steps_5'] = <<<_P
Installation
_P;

$tsep_lng['setup_Steps_6'] = <<<_P
Summary
_P;

$tsep_lng['setup_Steps_7'] = <<<_P
Feedback
_P;

$tsep_lng['setup_NoURL2Preview'] = <<<_P
No data will be sent to tsep.info
_P;

$tsep_lng['setup_BeforeFinish'] = <<<_P
Before you finish
_P;

$tsep_lng['setup_BeforeCancel'] = <<<_P
Before you cancel
_P;

$tsep_lng['setup_cancelText1'] = <<<_P
We would like to receive some statistical data. Sending the data is completely anonymous and optional. The list below shows the data we would like to collect. You can select what data you want to send to us or you can decide to send nothing at all.
_P;

$tsep_lng['setup_cancelText2'] = <<<_P
If you choose to submit data and help TSEP development this way, you will be transfered to www.tsep.info where the data is submitted to the database.
_P;

$tsep_lng['setup_finishText1'] = <<<_P
We would like to receive some statistical data. Sending the data is completely anonymous and optional. The list below shows the data we would like to collect. You can select what data you want to send to us or you can decide to send nothing at all.
_P;

$tsep_lng['setup_finishText2'] = <<<_P
If you choose to submit data and help TSEP development this way, you will first be transfered to www.tsep.info where the data is submitted to the database. Then you will be taken automatically to the configuration screen on your website to start working with TSEP.
_P;

$tsep_lng['setup_finishText3'] = <<<_P
Note that if you decide to send data your URL will be transmitted even if you select not submit it. This is because we need to know where we have to send you after writing the statistics. In this case your URL will not be logged!
_P;

$tsep_lng['setup_finishText4'] = <<<_P
Should you decide to send no data you will be taken directly to the configuration screen without connecting to the TSEP homepage.<br /> In both cases the next screen you will see in your browser is the configuration screen of your TSEP installation.
_P;

$tsep_lng['setup_Let_TSEP_Team_know'] = <<<_P
Let us know you installed <span class="tsep">TSEP</span> successfully:
_P;

$tsep_lng['setup_Let_TSEP_Team_know_Help'] = <<<_P
This will let us know that you installed TSEP successfully.
_P;

$tsep_lng['setup_Let_TSEP_Team_know2'] = <<<_P
Let us know why you canceled the <span class="tsep">TSEP</span> installation:
_P;

$tsep_lng['setup_Let_TSEP_Team_know2_Help'] = <<<_P
This will let us know that you canceled the installation of TSEP.
_P;

$tsep_lng['setup_NewVersion'] = <<<_P
New <span class="tsep">TSEP</span> Version:
_P;

$tsep_lng['setup_NewVersion_Help'] = <<<_P
This is the version of TSEP you have just installed.
_P;

$tsep_lng['setup_OldVersion'] = <<<_P
Old <span class="tsep">TSEP</span> Version:
_P;

$tsep_lng['setup_OldVersion_Help'] = <<<_P
The version of TSEP you have replaced (if any).
_P;

$tsep_lng['setup_Referer'] = <<<_P
Log your referer:
_P;

$tsep_lng['setup_Referer_Help'] = <<<_P
The domain of your website. We would like to record it and possibly take a screenshot of your site in action.<br /><br />Note that if you select any of the other options your URL is transmitted to our site. That does not mean we will log it. If you set this option to <b>NO</b> we will <b>not</b> store it in our database.
_P;

$tsep_lng['setup_NewsLetter'] = <<<_P
Subscribe to newsletter:
_P;

$tsep_lng['setup_NewsLetter_Help'] = <<<_P
If you want to subscribe to our newsletter to keep up with the latest TSEP news enter you e-mail address here.<br /><br/>If you are not interested just leave the field blank.<br /><br />Note: To unsubscribe go to our website. This field will only work for subscriptions.
_P;

$tsep_lng['setup_Comment'] = <<<_P
Comments:
_P;

$tsep_lng['setup_Comment_Help'] = <<<_P
If you have anything to add that may be of help to us, please enter your comment here.
_P;

$tsep_lng['setup_Why_Aborted'] = <<<_P
Reason for cancelation:
_P;

$tsep_lng['setup_Why_Aborted_Help'] = <<<_P
We would really like to know why you canceled the installation. Your comments will help us make TSEP better suit your needs.
_P;

$tsep_lng['setup_URLPreview'] = <<<_P
The URL we would send:
_P;

$tsep_lng['setup_JavaScriptEnabled'] = <<<_P
JavaScript has to be turned on to make this preview work.
_P;

$tsep_lng['indexer_started_indexer'] = <<<_P
Indexer started
_P;

$tsep_lng['indexer_started_searching'] = <<<_P
Searching for files...
_P;

$tsep_lng['indexer_started_building'] = <<<_P
Building index (for %d files)...
_P;

$tsep_lng['XdirName_wrongpath'] = <<<_P
Indexer-startdirectory does not exist: <b>%s</b>
_P;





$tsep_lng['contentimgs'] = <<<_P
ContentImages
_P;

$tsep_lng['contentimg'] = <<<_P
ContentImage
_P;

$tsep_lng['contentimgs_not_used'] = <<<_P
ContentImages (not used in this TSEP installation)
_P;

$tsep_lng['contentimg_defaultimage'] = <<<_P
ContentImage (default image used)
_P;

$tsep_lng['contentimg_url_assoc_image'] = <<<_P
ContentImage (page-associated image)
_P;

$tsep_lng['contentimg_filelists'] = <<<_P
ContentImage File Lists
_P;

$tsep_lng['contentimg_filelist'] = <<<_P
ContentImage File List
_P;

$tsep_lng['contentimg_filelists_descr'] = <<<_P
Choose an action on one of the currently existing ContentImage Indexer File Lists:<br />
- left-click the name-link to have a look into the file (opened in a new window)<br />
- right-click the name-link and save (download) the file for further action<br />
- delete the file<br />
- transform the file
_P;

$tsep_lng['contentimg_filelist_rebuild'] = <<<_P
Manually create ContentImage File List, from currently indexed Pages
_P;

$tsep_lng['contentimg_filelist_autobuild'] = <<<_P
automatically created by the indexer
_P;

$tsep_lng['contentimg_filelist_manuallybuilt'] = <<<_P
manually created (indexing-profile '%s', for '%s')
_P;

$tsep_lng['for_iprofile'] = <<<_P
for indexing profile
_P;

$tsep_lng['all_pages'] = <<<_P
all pages
_P;

$tsep_lng['pages_having_no_contentimg'] = <<<_P
pages having no ContentImage
_P;

$tsep_lng['currently_experimental'] = <<<_P
(currently EXPERIMENTAL)
_P;

$tsep_lng['modified_created'] = <<<_P
modified/created at
_P;

$tsep_lng['configure'] = <<<_P
Configure
_P;

$tsep_lng['name'] = <<<_P
Name
_P;

$tsep_lng['manage'] = <<<_P
Manage
_P;

$tsep_lng['comment'] = <<<_P
comment
_P;

$tsep_lng['upload'] = <<<_P
Upload
_P;

$tsep_lng['upload_complete'] = <<<_P
Upload complete!
_P;

$tsep_lng['delete_complete'] = <<<_P
File successfully deleted!
_P;

$tsep_lng['err_deleting_file'] = <<<_P
File-delete failed!
_P;

$tsep_lng['err_fopen_append'] = <<<_P
Error opening file for append: %s
_P;

$tsep_lng['err_fwrite'] = <<<_P
Error writing file %s
_P;

$tsep_lng['stat_indexer_wrote_contentimg'] = <<<_P
%s records written to ContentImage File List %s
_P;

$tsep_lng['stat_indexer_nowrite_contentimg'] = <<<_P
Nothing written to ContentImage File List: %s
_P;

$tsep_lng['back'] = <<<_P
back
_P;

$tsep_lng['contentimg_filelistTF'] = <<<_P
ContentImage File List Transformation%d
_P;

$tsep_lng['close'] = <<<_P
close
_P;

$tsep_lng['run'] = <<<_P
Run
_P;

$tsep_lng['destdirectory_does_not_exist'] = <<<_P
Destination directory does not exist
_P;

$tsep_lng['directory_does_not_exist'] = <<<_P
Directory does not exist
_P;

$tsep_lng['file_does_not_exist'] = <<<_P
File does not exist
_P;

$tsep_lng['not_defined_in_databse'] = <<<_P
%s not defined (empty) in database
_P;

$tsep_lng['err_upload_err_ini_size'] = <<<_P
Filesize exceeds php.ini definition upload_max_filesize of %s
_P;

$tsep_lng['err_upload_err_form_size'] = <<<_P
Filesize exceeds max_filesize of %d
_P;

$tsep_lng['err_upload_err_partial'] = <<<_P
File not completly uploaded
_P;

$tsep_lng['err_upload_err_partial'] = <<<_P
File not completly uploaded
_P;

$tsep_lng['err_upload_err_no_file'] = <<<_P
Nothing uploaded
_P;

$tsep_lng['err_upload_err_undefined'] = <<<_P
Upload ended with error number %d
_P;

$tsep_lng['err_upload_mimetype'] = <<<_P
Wrong mimetype of uploaded file: %s
_P;

$tsep_lng['err_upload_zerosize'] = <<<_P
Uploaded filesize = 0 (possibly wrong filename)
_P;

$tsep_lng['err_upload_moving_tmpfile'] = <<<_P
Upload error while moving tempfile (possibly no writepermissions in destinationdirectory)
_P;

$tsep_lng['destinationfile'] = <<<_P
Destinationfile
_P;

$tsep_lng['send_this_file'] = <<<_P
Send this file
_P;

$tsep_lng['delete_this_file'] = <<<_P
Delete this file
_P;

$tsep_lng['wrong_fileext'] = <<<_P
Wrong fileextension: %s
_P;

$tsep_lng['fileext_mismatch'] = <<<_P
Fileextension %s supplied instead of %s
_P;

$tsep_lng['config_group_configcontentimg_basicdefs']= <<<_TSEP
Basic definitions
_TSEP;

$tsep_lng['config_configcontentimg_mode']= <<<_TSEP
Use ContentImages
_TSEP;

$tsep_lng['config_configcontentimg_mode_help']= <<<_TSEP
Switch on/off the use of ContentImages in your TSEP installation. Switching OFF, DOES NOT REMOVE ANY IMAGEFILES!
_TSEP;

$tsep_lng['config_group_configcontentimg_basicdefs_paths']= <<<_TSEP
Paths
_TSEP;

$tsep_lng['config_group_configcontentimg_basicdefs_image']= <<<_TSEP
Images
_TSEP;

$tsep_lng['config_configcontentimg_webpath']= <<<_TSEP
Images-Path for Web-Access
_TSEP;

$tsep_lng['config_configcontentimg_webpath_help']= <<<_TSEP
Absolute Images-Path, where the ContentImages can be found while showing the result-pages
 (equivalent to the Images-Path for PHPscript-Access)
_TSEP;

$tsep_lng['config_configcontentimg_abspath']= <<<_TSEP
Images-Path for PHPscript-Access
_TSEP;

$tsep_lng['config_configcontentimg_abspath_help']= <<<_TSEP
Absolute (physical) path to the images-directory, to be accessible via php-scripts
 (equivalent to the Images-Path for Web-Access).
_TSEP;

$tsep_lng['config_configcontentimg_webpath_flists']= <<<_TSEP
Root path for ContentImage File Lists for Web-Access
_TSEP;

$tsep_lng['config_configcontentimg_webpath_flists_help']= <<<_TSEP
Absolute path to the directory, where ContentImage File Lists and -transformations are generated to.
 The ContentImage File List Transformation Templates has to be located in a subdirectory named 'transformation_templates'.
 More about ContentImage File List- and -transformation-setting below.
_TSEP;

$tsep_lng['config_configcontentimg_abspath_flists']= <<<_TSEP
Root path for ContentImage File Lists for PHPscript-Access
_TSEP;

$tsep_lng['config_configcontentimg_abspath_flists_help']= <<<_TSEP
Absolut (physical) path to the directory, where ContentImage File Lists and -transformations are generated to.
 The ContentImage File List Transformation Templates has to be located in a subdirectory named 'transformation_templates'.
 More about ContentImage File List- and -transformation-setting below.
_TSEP;

$tsep_lng['config_configcontentimg_imageext']= <<<_TSEP
Image-Filename-Extension (<b>do not change</b>, if images already exists!)
_TSEP;

$tsep_lng['config_configcontentimg_imageext_help']= <<<_TSEP
Preferably use '.jpeg', '.jpg' or '.png'. DO NOT CHANGE, if images already exists, because these images would not be found anymore!!!
_TSEP;

$tsep_lng['config_configcontentimg_FnDefaultImage']= <<<_TSEP
Default image
_TSEP;

$tsep_lng['config_configcontentimg_FnDefaultImage_help']= <<<_TSEP
This image is used, if ContentImages should be shown, but no image is defined for this
 found page. If you have defined a default image, but near the caption 'Default image'
 you see the image-filename instead the image itself, this indicates, that the given file-/pathname is wrong.
_TSEP;

$tsep_lng['config_configcontentimg_maxX']= <<<_TSEP
maximal display-width
_TSEP;

$tsep_lng['config_configcontentimg_maxX_help']= <<<_TSEP
Define the maximal display-width of the ContentImage in pixel. For keeping the aspect ratio, the really used width may be smaller
 (depending on the geometry of the image and the 'maximal height'-definition). Images which are smaller than the given maximal display-width
 and -height are left unchanged.
_TSEP;

$tsep_lng['config_configcontentimg_maxY']= <<<_TSEP
maximal display-height
_TSEP;

$tsep_lng['config_configcontentimg_maxY_help']= <<<_TSEP
Define the maximal display-height of the ContentImage in pixel. For keeping the aspect ratio, the really used height may be smaller
 (depending on the geometry of the image and the 'maximal width'-definition). Images which are smaller than the given maximal display-width
 and -height are left unchanged.
_TSEP;

$tsep_lng['config_group_configcontentimg_indexer']= <<<_TSEP
Indexer settings
_TSEP;

$tsep_lng['config_configcontentimg_create_flists']= <<<_TSEP
The indexer should create ContentImage File Lists
_TSEP;

$tsep_lng['config_configcontentimg_create_flists_help']= <<<_TSEP
If this option is not switched on, the indexer does not create ContentImage File Lists.
 ATTENTION: Creating ContentImage File Lists manually is possible anyway!
_TSEP;

$tsep_lng['config_configcontentimg_having_no_contentimg']= <<<_TSEP
Only for pages having no ContentImage
_TSEP;

$tsep_lng['config_configcontentimg_having_no_contentimg_help']= <<<_TSEP
An entry to the ContentImage File List is written only, if no ContentImage exist for the indexed page.
_TSEP;

$tsep_lng['config_configcontentimg_autorun_flisttrans']= <<<_TSEP
Automatically run transformation
_TSEP;

$tsep_lng['config_configcontentimg_autorun_flisttrans_help']= <<<_TSEP
If this option is switched on, transformation is run automatically after indexing.
 (the 'indexer should create ContentImage File Lists' has to be switched on too!)
_TSEP;

$tsep_lng['config_group_configcontentimg_extdefs']= <<<_TSEP
Extended definitions
_TSEP;

$tsep_lng['config_group_configcontentimg_extdefs_flists']= <<<_TSEP
ContentImage File Lists
_TSEP;

$tsep_lng['config_group_configcontentimg_extdefs_fliststrans']= <<<_TSEP
Transformations
_TSEP;

$tsep_lng['config_group_configcontentimg_extdefs_flisttrans1']= <<<_TSEP
Transformation 1
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans1_template_filename']= <<<_TSEP
Templatefilename
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans1_template_filename_help']= <<<_TSEP
Filename of the template to be used for transformation 1
 (this name is used as part of the outputfilename)
 CAUTION: the filename-extension is used as the transformation-outputfilename-extension too!
 I.e. if it is not defined correctly, the transformation 1 files are not shown in the Content Image File List list below.
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans1_active']= <<<_TSEP
Active
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans1_active_help']= <<<_TSEP
If transformation is run, transformation 1 will be included.
 (if transformation 1 and 2 both are not active - no transformation is done)
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans1_internal_notes']= <<<_TSEP
Internal notes to Transformation 1
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans1_internal_notes_help']= <<<_TSEP
Active This field can be used for internal notes.
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans1_comment']= <<<_TSEP
Commentline starts with
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans1_comment_help']= <<<_TSEP
Define a string to be used as 'prefix' for commentlines
 (e.g. use '#' for transformation towards shellscripts or 'REM' for transformations towards DOS-Batchfiles)
_TSEP;

$tsep_lng['config_group_configcontentimg_extdefs_flisttrans2']= <<<_TSEP
Transformation 2
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans2_template_filename']= <<<_TSEP
Templatefilename
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans2_template_filename_help']= <<<_TSEP
Filename of the template to be used for transformation 2
 (this name is used as part of the outputfilename)
 CAUTION: the filename-extension is used as the transformation-outputfilename-extension too!
 I.e. if it is not defined correctly, the transformation 2 files are not shown in the Content Image File List list below.
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans2_active']= <<<_TSEP
Active
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans2_active_help']= <<<_TSEP
If transformation is run, transformation 2 will be included.
 (if transformation 1 and 2 both are not active - no transformation is done)
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans2_internal_notes']= <<<_TSEP
Internal notes to Transformation 2
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans2_internal_notes_help']= <<<_TSEP
Active This field can be used for internal notes.
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans2_comment']= <<<_TSEP
Commentline starts with
_TSEP;

$tsep_lng['config_configcontentimg_flisttrans2_comment_help']= <<<_TSEP
Define a string to be used as 'prefix' for commentlines
 (e.g. use '#' for transformation towards shellscripts or 'REM' for transformations towards DOS-Batchfiles)
_TSEP;

//----------------- end setup.php ---------------------

//----------------- begin stopwords.php ---------------



$tsep_lng['stopwords_GetStop'] = <<<_P
Get Stopwords
_P;

$tsep_lng['stopwords_GetStop_Info'] = <<<_P
Enter the number of stopwords to search for.
_P;

$tsep_lng['stopwords_NewStopwords'] = <<<_P
Stopwords Added:
_P;

$tsep_lng['stopwords_RetreiveNew'] = <<<_P
(Retrieve new stopwords only)
_P;

$tsep_lng['stopwords_Occurrences'] = <<<_P
Occurrences
_P;

//----------------- end stopwords.php ---------------------

$tsep_lng['adminmainmenu_AdminMainMenu'] = <<<_P
Admin's Main Menu
_P;

$tsep_lng['adminmainmenu_groupcapt_tsep_at_yours'] = <<<_P
TSEP at yours
_P;

$tsep_lng['adminmainmenu_linkdesc_localhelp'] = <<<_P
Help pages included in your TSEP installation
_P;

$tsep_lng['adminmainmenu_linkcapt_tsepinfophp'] = <<<_P
TSEP Info
_P;

$tsep_lng['adminmainmenu_linkdesc_tsepinfophp'] = <<<_P
shows a page with useful information about your TSEP installation
_P;

$tsep_lng['adminmainmenu_groupcapt_tsep_at_yours_init'] = <<<_P
Initializing TSEP
_P;

$tsep_lng['adminmainmenu_linkdesc_setup'] = <<<_P
Runs initial TSEP setup-/installation-routine, which
 prepares/initializes different settings and the database
_P;

$tsep_lng['adminmainmenu_groupcapt_tsep_at_yours_atwork'] = <<<_P
TSEP at work
_P;

$tsep_lng['adminmainmenu_groupcapt_tsep_at_yours_atwork1'] = <<<_P
configure
_P;

$tsep_lng['adminmainmenu_linkdesc_configuration'] = <<<_P
Finetune several settings and the behaviour of TSEP
_P;

$tsep_lng['adminmainmenu_linkdesc_stopwords'] = <<<_P
Define, refine, tune and manage stopwords to be used in you TSEP installation
_P;

$tsep_lng['adminmainmenu_linkdesc_configcontentimgs'] = <<<_P
Define basic settings for use of ContentImages
_P;

$tsep_lng['adminmainmenu_groupcapt_tsep_at_yours_atwork2'] = <<<_P
prepare
_P;

$tsep_lng['adminmainmenu_linkdesc_indexer'] = <<<_P
Running the indexer creates the search-index, which is used as
 the search basis
_P;

$tsep_lng['adminmainmenu_linkdesc_indexoverview'] = <<<_P
Show the currently stored index entries in short
_P;

$tsep_lng['adminmainmenu_linkdesc_showcompleteindex'] = <<<_P
Show the currently stored index entries in a verbose manner
_P;

$tsep_lng['adminmainmenu_groupcapt_tsep_at_yours_atwork3'] = <<<_P
results
_P;

$tsep_lng['adminmainmenu_linkdesc_logviewstats'] = <<<_P
Show results/click-log from a statistical point of view
_P;

$tsep_lng['adminmainmenu_linkdesc_logview'] = <<<_P
Show results/click-log
_P;

$tsep_lng['adminmainmenu_linkcapt_bgindexinglog'] = <<<_P
Background indexing logfiles <small><small>(directory)</small></small>
_P;

$tsep_lng['adminmainmenu_linkdesc_bgindexinglog'] = <<<_P
If you use our examples TSEPautoIndexing.cmd or TSEPautoIndexing.sh unchanged, the background indexing logfiles
 are placed within this directory.
_P;

$tsep_lng['adminmainmenu_groupcapt_tsep_at_yours_extras'] = <<<_P
Extras
_P;

$tsep_lng['adminmainmenu_linkcapt_examples'] = <<<_P
Examples <small><small>(directory)</small></small>
_P;

$tsep_lng['adminmainmenu_linkdesc_examples'] = <<<_P
We included some examples in the TSEP-package (which you can find in the admin/examples directory):<br />
- fillwithcontent.php<br />
- phpcrawl4tsep.php<br />
- TSEPautoIndexing.cmd<br />
- TSEPautoIndexing.sh<br />
- urllist.php<br />
- wwws.sh and wwwshot.sh<br />
_P;

$tsep_lng['adminmainmenu_linkcapt_exampletemplates'] = <<<_P
Example Templates <small><small>(directory)</small></small>
_P;

$tsep_lng['adminmainmenu_linkdesc_exampletemplates'] = <<<_P
We included example templates to be used for ContentImage Transformation in conjunction with Webswoon (http://www.intellitamper.com/webswoon):<br />
- toWebswoon.bat<br />
- WebswoonCopy2Host.bat<br />
- WebswoonFtp2Host.bat<br />
_P;

$tsep_lng['adminmainmenu_groupcapt_tsep_in_the_www'] = <<<_P
TSEP in the world wide web
_P;

$tsep_lng['adminmainmenu_linkcapt_tsepinfo'] = <<<_P
Central point of information
_P;

$tsep_lng['adminmainmenu_linkdesc_tsepinfo'] = <<<_P
where you find latest news, documentation, newsletters, contact addresses, examples, and many more...
_P;

$tsep_lng['adminmainmenu_linkcapt_sfdotnet'] = <<<_P
TSEP project at Sourceforge.net
_P;

$tsep_lng['adminmainmenu_linkdesc_sfdotnet'] = <<<_P
the 'hometown' of TSEP at sourceforge.net; here you can download the latest TSEP-release, find
 information about TSEP and give us feedback (as well as asking questions and reporting bugs)
_P;

//----------------- end stopwords.php ---------------------
?>
