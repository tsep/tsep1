<?php

/* following will be filled automatically by SubVersion!

Do not change by hand!

$LastChangedDate: 2005-09-09 12:00:27 +0200 (Fr, 09 Sep 2005) $

@lastedited $LastChangedBy: olaf $

$LastChangedRevision: 325 $
*/
$tsep_lng['above_values'] = <<<_P
ovenstående

_P;

$tsep_lng['add'] = <<<_P
tilføj
_P;

$tsep_lng['all'] = <<<_P
alt
_P;

$tsep_lng['assigned_indexingprofiles'] = <<<_P
tildelt indexeringsprofil
_P;

$tsep_lng['button_search'] = <<<_P
Søg
_P;

$tsep_lng['click_here_to_open'] = <<<_P
Klik på dette link for at åbne siden
_P;

$tsep_lng['close_this_window'] = <<<_P
Luk dette vindue
_P;

$tsep_lng['config_absPath'] = <<<_P
Definer den absolutte sti til TSEP fx.: hvis filen search.php ligger i /home/www/php/tsepsearch/search.php vil den se ud som dette: '/home/www/php/tsepsearch'
_P;

$tsep_lng['config_tmpPath'] = <<<_P
Definer den absolutte sti til TSEP temp - mappe
_P;

$tsep_lng['config_check_file_exists'] = <<<_P
Check om fil eksisterer før søgeresultat vises? Hvis true tager søgningen lidt længere tid; men resultatet viser kun de filer der stadig findes. Vær opmærksom på, at dette kun virker når allow_url_open er aktiv i php.ini! Du kan blive tvunget til at sætte denne værdi til false.
_P;

$tsep_lng['config_Color_1'] = <<<_P
Den første alternative farve (på en række) hvor det er en meget lang liste
_P;

$tsep_lng['config_Color_2'] = <<<_P
Den anden alternative farve (på en række) hvor det er en meget lang liste
_P;

$tsep_lng['config_Date_Style'] = <<<_P
Hvordan skal datoen vises? (PHP stil, du kan bruge D, l, M & F). Datoen vises i det valgte sprog. Fx.: Engelsk: 'l, F d Y h:i a' dansk: 'l, d. F Y, G:i'
_P;

$tsep_lng['config_dir_exclude'] = <<<_P
Indtast directories som skal udelukkes:
_P;

$tsep_lng['config_dir_exclude_help'] = <<<_P
Dette er stien til en mappe(er) der skal udelukkes, set i forhold til din sides rod. Fx.: /mappe1/mappe3, hvis indholdet af http://www.ditdomæne.com/mappe1/mappe3 (mapper og filer) skal udelukkes. Tilføj flere indgange ved at tilføje ',' men ikke ', ' (intet mellemrum efter ,)
_P;

$tsep_lng['config_Display_Boolean_Search'] = <<<_P
Ved søgning checkes versionen af din MYSQL, fordi der kræves ver. 4.0.1 eller højere for at kunne lave en boolsk søgning. MySQL >= 4.0.0 boolsk søgning: Du kan bruge de boolske parametre (<>=), MySQL < 4.0.0: alle søgeord brugeren indtaster i søgefeltet skal findes på siden. Kun hvis det er tilfældet vises siden på resultatlisten. Vil du informere brugeren hvis der kun er en gammel database version til rådighed, og der ikke kan laves søgning med boolske (<>=) parametre? Vi anbefaler du lader denne værdi være sat til 'true' - det kan forvirre brugeren hvis der ikke kommer nogen hits.
_P;

$tsep_lng['config_ext_include'] = <<<_P
Fil extensions der skal inkluderes
_P;

$tsep_lng['config_ext_include_help'] = <<<_P
Indexeren indexerer kun filer hvis extentions er sat her (brug komma til at opdele listen. Fx.: HTM,HTML,PHP )
_P;

$tsep_lng['config_file_exclude'] = <<<_P
Indtast de filer som skal udelukkes:
_P;

$tsep_lng['config_file_exclude_help'] = <<<_P
Dette er stien til den/de fil/filer der skal udelukkes, set i forhold til din sides rod. Fx.: /mappe1/mappe4/login.php, hvis http://www.ditdomæne.com/mappe1/mappe4/login.php skal udelukkes. Tilføj flere indgange ved at tilføje ',' men ikke ', ' (intet mellemrum efter ,)
_P;

$tsep_lng['config_skip_symblinks'] = <<<_P
Spring over symbolske link
_P;

$tsep_lng['config_skip_symblinks_help'] = <<<_P
Definer om symbolske link skal springes over når der søges med directoryscan.
_P;

$tsep_lng['config_subdirs2index'] = <<<_P
Undermapper der skal indexeres (tom = alle)
_P;

$tsep_lng['config_subdirs2index_help'] = <<<_P
Adskild hver undermappe med ny linie og / eller komma. Alle mapper tilføjes "web mappe stien" og bruges til at finde filer.
_P;

$tsep_lng['config_fnExternalPhp'] = <<<_P
Indtast det fuldgyldige .php-filnavn på en ekstern datakilde:
_P;

$tsep_lng['config_fnExternalPhp_help'] = <<<_P
Dette er et filnavn på et .php-script udenfor TSEP, der leverer de filer der skal indexeres. Fx.: crawler/spider.php - se dokumentation for detaljer
_P;

$tsep_lng['config_group_general'] = <<<_P
Generelt
_P;

$tsep_lng['config_group_lists'] = <<<_P
Liste
_P;

$tsep_lng['config_group_lists_colors'] = <<<_P
Farver
_P;

$tsep_lng['config_group_lists_limits'] = <<<_P
Grænser
_P;

$tsep_lng['config_group_logging'] = <<<_P
Logning
_P;

$tsep_lng['config_group_visible2enduser'] = <<<_P
Brugerinterface
_P;

$tsep_lng['config_group_visible2enduser_range'] = <<<_P
Grænser
_P;

$tsep_lng['config_group_visible2enduser_results'] = <<<_P
Resultater
_P;

$tsep_lng['config_group_visible2enduser_searchsuggest'] = <<<_P
Søge forslag
_P;

$tsep_lng['config_group_visible2enduser_search'] = <<<_P
Søgning
_P;

$tsep_lng['config_Hour_Difference'] = <<<_P
Forskel i timer mellem server tid og lokal tid. Juster tiden i henhold til denne forskel
_P;

$tsep_lng['config_how_many_hints'] = <<<_P
Hvor mange søgeforslag skal vises (0=off)?
_P;

$tsep_lng['config_show_nr_hits'] = <<<_P
Skal søgeforslagsboksen vise antal sider der returneres på en søgning?
_P;

$tsep_lng['config_show_popular'] = <<<_P
Skal søgeforslagsboksen vise hvor populær en søgning er?
_P;

$tsep_lng['config_calc_hits_method'] = <<<_P
Hvordan skal antal fundne sider optælles?
_P;

$tsep_lng['config_calc_hits_method_help'] = <<<_P
Når en søgeforespørgelse logges:<br />1 = Brug resultatet af seneste søgeforespørgelse<br /> 2 = Beregn gennemsnit fra alle søgeforespørgelser<br /> 3 = Beregn minimum af alle søgeforespørgelser<br /> 4 = Beregn maksimum af alle søgeforespørgelser
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit'] = <<<_P
Hvor mange tegn skal vises efter første hit?
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit_help'] = <<<_P
Søgeresultatet vil kun være en del af den indexerede tekst. Dette punkt definerer hvor mange tegn der bliver vist EFTER første hit.
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit'] = <<<_P
Hvor mange tegn skal vises før første hit?
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit_help'] = <<<_P
Søgeresultatet vil kun være en del af den indexerede tekst. Dette punkt definerer hvor mange tegn der bliver vist FØR første hit.
_P;

$tsep_lng['config_How_Many_Results'] = <<<_P
Hvis brugeren ikke kan sætte antalt af hits der skal vises pr. side bruges denne default værdi (brugeren får .... hits før han får side navigation)?
_P;

$tsep_lng['config_How_Many_Sentences'] = <<<_P
Hvor mange blokke med hits skal vises?
_P;

$tsep_lng['config_How_Many_Sentences_help'] = <<<_P
Søgeresultatet vil kun være en del af den indexerede tekst. Dette punkt definerer hvor mange hitblokke der skal vises som maximum.
_P;

$tsep_lng['config_internal_notes'] = <<<_P
intern note
_P;

$tsep_lng['config_internal_notes_help'] = <<<_P
Dette felt kan bruges til interne noter. De er kun synlige for administrator i dette område!
_P;

$tsep_lng['config_Language'] = <<<_P
Hvilket sprog skal TSEP vises i? Fx.: Hvis du ønsker at bruge dansk skriver du 'dk_DK', for engelsk skriver du 'en_US'.
_P;

$tsep_lng['config_listFilenamesOnly'] = <<<_P
Vis kun de filer der vil blive indexeret
_P;

$tsep_lng['config_listFilenamesOnly_help'] = <<<_P
Indexeren kunne ikke bygge et index, alle filer der kan indexeres er listet.<br>I tillæg vises en liste med de mapper og filer der springes over.
_P;

$tsep_lng['config_Logging'] = <<<_P
Skal der oprettes en log?
_P;

$tsep_lng['config_Logging_IP'] = <<<_P
Log IP adresse?
_P;

$tsep_lng['config_Logging_result_links'] = <<<_P
Log kliks på søgeresultater?
_P;

$tsep_lng['config_Logging_search_term'] = <<<_P
Log søgninger?
_P;

$tsep_lng['config_max_hints'] = <<<_P
Antal markerede søgninger for hver sætning
_P;

$tsep_lng['config_max_hints_help'] = <<<_P
Denne værdi angiver antal søge termer en sætning maksimalt kan indeholde.
_P;

$tsep_lng['config_max_length'] = <<<_P
Maks. længde på en sætning (i antal tegn)
_P;

$tsep_lng['config_max_length_help'] = <<<_P
Sætninger med mere end den definerede maks. længde vil ikke blive vist.
_P;

$tsep_lng['config_maxRows_completeindex'] = <<<_P
Hvor mange index indgange i 'Vis fuldt index' skal vises i et html dokument? Pas på ikke at sætte værdien for højt. Siden kan blive meget stor!
_P;

$tsep_lng['config_maxRows_indexoverview'] = <<<_P
Hvor mange index poster i 'Rediger index' skal vises i et html dokument? Pas på ikke at sætte værdien for højt da index siden kan blive meget stor.
_P;

$tsep_lng['config_maxRows_logview'] = <<<_P
Hvor mange log indgang skal vises på en side?
_P;

$tsep_lng['config_maxRows_Stopwords'] = <<<_P
Hvor mange stopord skal vises på en side?
_P;

$tsep_lng['config_Numbers_Put'] = <<<_P
Vis sidenummer i hitlisten?
_P;

$tsep_lng['config_Numbers_Put_After'] = <<<_P
Hvis vi viser sidenummer i resultatlisten, så vis dette efter nummeret
_P;

$tsep_lng['config_Numbers_Put_Before'] = <<<_P
Hvis vi viser sidenummer i resultatlisten, så vis dett før nummeret
_P;

$tsep_lng['config_Pagerank'] = <<<_P
Hvad er din sides rang symbol?. Fx.: '!'. Du kan også skrive noget HTML men du skal undgå special tegn. Fx.: '<�img src= "/graphics/tsepranks-single.png" alt= "*"�>.
_P;

$tsep_lng['config_Pagerank_Number'] = <<<_P
Vil du vise søge rang?
_P;

$tsep_lng['config_parmsExternalPhp'] = <<<_P
Indtast de parameter der skal sendes til datasupply-script:
_P;

$tsep_lng['config_parmsExternalPhp_help'] = <<<_P
Denne parameter er gjort tilgængelig til brug for den eksterne datasupply. Fx. et html-filnavn, hvor crawler/spider skal starte sin søgning - se dokumentation for detaljer.
_P;

$tsep_lng['config_Path'] = <<<_P
Definer stien til TSEP. Fx.: hvis filen search.php findes i www.yourdomain.com/php/tsepsearch/search.php bliver stien 'php/tsepsearch'
_P;

$tsep_lng['config_print_list_of_files'] = <<<_P
Vis liste med indexerede filer
_P;

$tsep_lng['config_searchViaExt'] = <<<_P
Indexer skal køre datasupplier-script
_P;

$tsep_lng['config_searchViaExt_help'] = <<<_P
Indexeren starter datasupplier-script for at hente de filer der skal indexeres (se dokumentation for detaljer)
_P;

$tsep_lng['config_searchViaRead'] = <<<_P
Indexeren skal finde filer via directoryscan
_P;

$tsep_lng['config_searchViaRead_help'] = <<<_P
Sætter indexeren til at samle filnavne der skal indexeres via directoryscan, startende i den ovenfor oplyste mappe (klassisk TSEP-søge måde)
_P;

$tsep_lng['config_Show_Record_Change'] = <<<_P
Kan brugeren sætte hvor mange resultater der kan vises på en side?
_P;

$tsep_lng['config_word_offset'] = <<<_P
Antal ord der vises før/efter hver søge term.
_P;

$tsep_lng['config_word_offset_help'] = <<<_P
Søgeresultatet vil kun være en del af den totalt indexerede tekst. Denne værdi angiver hvor mange ord der vises før og efter hver "hit".
_P;

$tsep_lng['config_Use_Debug_Print'] = <<<_P
Kun for programmører: brug debugprint() funktion? (bør være slået fra ved normal brug af TSEP)
_P;

$tsep_lng['config_XdirName'] = <<<_P
Indexerings start mappe (option, angives relativ i forhold til indexer.phd eller præsist)
_P;

$tsep_lng['config_XdirName_help'] = <<<_P
Angivelse af indexerings start mappe er nødvendig <strong>kun i visse tilfælde</strong> - normalt kan <strong>feltet lades tomt</strong>!<br>Du kan blive nød til at indtaste noget i stil med ../../ eller www/htdocs/youraccount/
_P;

$tsep_lng['config_Xwebdir'] = <<<_P
Indtast web directory sti *:
_P;

$tsep_lng['config_Xwebdir_help'] = <<<_P
Dette er en web sti der passer til den ovenfor oplyste mappe. Fx.: http://www.sitename.com/mappe1/mappe2. Hvis alle filer på http://www.sitename.com skal indexeres korrekt skal her stå 'http://www.sitename.com'. 
_P;

$tsep_lng['configuration'] = <<<_P
Konfiguration
_P;

$tsep_lng['copyright'] = <<<_P
Copyright
_P;

$tsep_lng['create_new_index'] = <<<_P
Lav nyt index
_P;

$tsep_lng['data_retrieved'] = <<<_P
Data hentet fra database i
_P;

$tsep_lng['day_friday'] = <<<_P
fredag
_P;

$tsep_lng['day_friday_short'] = <<<_P
fre
_P;

$tsep_lng['day_monday'] = <<<_P
mandag
_P;

$tsep_lng['day_monday_short'] = <<<_P
man
_P;

$tsep_lng['day_saturday'] = <<<_P
lørdag
_P;

$tsep_lng['day_saturday_short'] = <<<_P
lør
_P;

$tsep_lng['day_sunday'] = <<<_P
søndag
_P;

$tsep_lng['day_sunday_short'] = <<<_P
søn
_P;

$tsep_lng['day_thursday'] = <<<_P
torsdag
_P;

$tsep_lng['day_thursday_short'] = <<<_P
tor
_P;

$tsep_lng['day_tuesday'] = <<<_P
tirsdag
_P;

$tsep_lng['day_tuesday_short'] = <<<_P
tir
_P;

$tsep_lng['day_wednesday'] = <<<_P
onsdag
_P;

$tsep_lng['day_wednesday_short'] = <<<_P
ons
_P;

$tsep_lng['delete'] = <<<_P
slet
_P;

$tsep_lng['delete_file'] = <<<_P
slet fil
_P;

$tsep_lng['transform'] = <<<_P
ændre
_P;

$tsep_lng['details'] = <<<_P
detaljer
_P;

$tsep_lng['directory'] = <<<_P
mappe
_P;

$tsep_lng['docorrectit'] = <<<_P
venligst RET DENNE fejl FØR du fortsætter!
_P;

$tsep_lng['error_from_extscript'] = <<<_P
fejl, returneret af eksternt script
_P;

$tsep_lng['filename'] = <<<_P
filnavn
_P;

$tsep_lng['filter'] = <<<_P
filter
_P;

$tsep_lng['forbidden_stopword'] = <<<_P
OBS!: I dine søgeord indgår følgende 'stopord' som der på administrators anmodning ikke kan søges på (mere detaljeret information kan findes i 'Tips til bedre søgning'):
_P;

$tsep_lng['found_no_pages'] = <<<_P
Ingen sider fundet.
_P;

$tsep_lng['group_level_gap'] = <<<_P
gruppe niveau definition: gruppe niveau skal være nøjagtig 1 større end gruppe niveauet på foregående gruppe
_P;

$tsep_lng['help'] = <<<_P
Hjælp
_P;

$tsep_lng['help_copyright'] = <<<_P
Dette åbner et nyt vindue der bringer dig til TSEP hjemmeside på Sourgeforge.net
_P;

$tsep_lng['help_del_indexedpage'] = <<<_P
Er du sikker på, at du vil slette denne side fra index (fjerner alt om denne side fra databasene)?
_P;

$tsep_lng['help_del_maxresult'] = <<<_P
Er du sikker på, at du vil slette dette max resultat?
_P;

$tsep_lng['help_del_stopword'] = <<<_P
Er du sikker på, at du vil slette dette stopord?
_P;

$tsep_lng['help_first_page'] = <<<_P
gå til første side
_P;

$tsep_lng['help_last_page'] = <<<_P
gå til sidste side
_P;

$tsep_lng['help_next_page'] = <<<_P
gå til næste side
_P;

$tsep_lng['help_previous_page'] = <<<_P
gå til foregående side
_P;

$tsep_lng['if_problems_contact'] = <<<_P
Hvis du stadig har problemer med din søgning eller ikke er tilfreds med resultatet, så send os en mail med beskrivelse af problemet og dine forslag til forbedringer.
_P;

$tsep_lng['impossible_already_exists'] = <<<_P
umuligt: navn eksister allerede
_P;

$tsep_lng['index_edit_date'] = <<<_P
Seneste index redigering:
_P;

$tsep_lng['index_edit_head'] = <<<_P
Rediger data gemt i index
_P;

$tsep_lng['index_edit_title'] = <<<_P
Index redigering (detajeret)
_P;

$tsep_lng['editindex_last_edited'] = <<<_P
Sidst ændret:
_P;

$tsep_lng['editindex_not_edited'] = <<<_P
Ingen ændringer
_P;

$tsep_lng['indexer_last_indexed'] = <<<_P
Sidst indexeret:
_P;

$tsep_lng['editindex_not_indexed'] = <<<_P
Ikke indexeret
_P;

$tsep_lng['index_overview_click_title'] = <<<_P
Klik her for at redigere detaljer om sidene.
_P;

$tsep_lng['index_overview_click_url'] = <<<_P
Klik her for at vise siden i en browser.
_P;

$tsep_lng['index_overview_head'] = <<<_P
Klik på en side tittel eller URL for at åbne detaljer om det indtastede.
_P;

$tsep_lng['index_overview_help'] = <<<_P
Tip: Brug browserens søgefunktion til at finde det du søger efter endnu hurtigere
_P;

$tsep_lng['index_overview_title'] = <<<_P
Index Oversigt (kort)
_P;

$tsep_lng['indexed_words'] = <<<_P
Vis det komplette gældende index (kan være meget stort!)
_P;

$tsep_lng['indexer_title'] = <<<_P
Indexer
_P;

$tsep_lng['indexing_in'] = <<<_P
Indexering er lavet i
_P;

$tsep_lng['indexing_on'] = <<<_P
Indexering er lavet på
_P;

$tsep_lng['indexingprofile'] = <<<_P
Indexeringsprofil
_P;

$tsep_lng['indexingprofile_unknown'] = <<<_P
indexingsprofile eksisterer ikke: profilenavn
_P;

$tsep_lng['info_from_extscript'] = <<<_P
information, returneret af eksternt script
_P;

$tsep_lng['intErr'] = <<<_P
intern fejl
_P;

$tsep_lng['intErr_wrongfieldtype'] = <<<_P
forkert felt_type-definition
_P;

$tsep_lng['is'] = <<<_P
er
_P;

$tsep_lng['logview_contents'] = <<<_P
Post
_P;

$tsep_lng['logview_head'] = <<<_P
Log poster der passer med alle filter kriterier er listet herunder
_P;

$tsep_lng['logview_ip'] = <<<_P
IP
_P;

$tsep_lng['logview_no_IP'] = <<<_P
ikke logget
_P;

$tsep_lng['logview_time_of_entry'] = <<<_P
Dato / Tid
_P;

$tsep_lng['logview_title'] = <<<_P
Søgninger og side åbninger
_P;

$tsep_lng['logview_type'] = <<<_P
Logtype
_P;

$tsep_lng['logview_type_1'] = <<<_P
Søgninger
_P;

$tsep_lng['logview_type_2'] = <<<_P
Resultat klik
_P;

$tsep_lng['logview_IPresolved'] = <<<_P
Resolve IP
_P;

$tsep_lng['logview_Stopwords'] = <<<_P
Stopord
_P;

$tsep_lng['mandatory'] = <<<_P
* dette er et krævet felt! Venligst indtast en værdi.
_P;

$tsep_lng['match_case'] = <<<_P
match case
_P;

$tsep_lng['matches'] = <<<_P
�fundne.
_P;

$tsep_lng['month_april'] = <<<_P
april
_P;

$tsep_lng['month_april_short'] = <<<_P
apr
_P;

$tsep_lng['month_august'] = <<<_P
august
_P;

$tsep_lng['month_august_short'] = <<<_P
aug
_P;

$tsep_lng['month_december'] = <<<_P
december
_P;

$tsep_lng['month_december_short'] = <<<_P
dec
_P;

$tsep_lng['month_february'] = <<<_P
februar
_P;

$tsep_lng['month_february_short'] = <<<_P
feb
_P;

$tsep_lng['month_january'] = <<<_P
januar
_P;

$tsep_lng['month_january_short'] = <<<_P
jan
_P;

$tsep_lng['month_july'] = <<<_P
juli
_P;

$tsep_lng['month_july_short'] = <<<_P
juli
_P;

$tsep_lng['month_june'] = <<<_P
juni
_P;

$tsep_lng['month_june_short'] = <<<_P
juni
_P;

$tsep_lng['month_march'] = <<<_P
marts
_P;

$tsep_lng['month_march_short'] = <<<_P
mar
_P;

$tsep_lng['month_may'] = <<<_P
maj
_P;

$tsep_lng['month_may_short'] = <<<_P
maj
_P;

$tsep_lng['month_november'] = <<<_P
november
_P;

$tsep_lng['month_november_short'] = <<<_P
nov
_P;

$tsep_lng['month_october'] = <<<_P
oktober
_P;

$tsep_lng['month_october_short'] = <<<_P
okt
_P;

$tsep_lng['month_september'] = <<<_P
september
_P;

$tsep_lng['month_september_short'] = <<<_P
sep
_P;

$tsep_lng['more_than_four'] = <<<_P
Venligst indtast en søgestreng på 4 tegn eller mere.
_P;

$tsep_lng['mysql_boolean_warning'] = <<<_P
OBS!: På grund af en gammel database version kan søgningen ikke indeholde boolske (<>=) parametre. Alle ord du indtaster skal forekomme i dokumentet for at søgestrengen kan findes. Boolske parametre vil ikke blive brugt.
_P;

$tsep_lng['name_already_exists'] = <<<_P
navnet er allerede brugt
_P;

$tsep_lng['name_is_empty'] = <<<_P
navnet er tomt!
_P;

$tsep_lng['navigate_one_page_back'] = <<<_P
Gå tilbage til den foregående side
_P;

$tsep_lng['new_index_head'] = <<<_P
Et nyt index er blevet lavet!<br />Herunder er listen med indexerede filer
_P;

$tsep_lng['new_index_head_searching'] = <<<_P
Laver nyt index...<br />Vis venligst tålmodighed...
_P;

$tsep_lng['new_window'] = <<<_P
(nyt vindue)
_P;

$tsep_lng['no_records'] = <<<_P
Ingen rekord
_P;

$tsep_lng['none'] = <<<_P
ingen
_P;

$tsep_lng['nothing'] = <<<_P
ingenting
_P;

$tsep_lng['of'] = <<<_P
�af
_P;

$tsep_lng['old_index_head'] = <<<_P
Herunder er listen med (tidligere) indexerede filer der findes i databasen p.t.
_P;

$tsep_lng['only'] = <<<_P
Kun
_P;

$tsep_lng['only_one_value'] = <<<_P
kun en værdi!
_P;

$tsep_lng['only_one_word'] = <<<_P
kun et ord!
_P;

$tsep_lng['page_file_size'] = <<<_P
Side fil størrelse:
_P;

$tsep_lng['page_indexed_metawords'] = <<<_P
Indexerede metatag-ord:
_P;

$tsep_lng['page_indexed_words'] = <<<_P
Indexerede ord:
_P;

$tsep_lng['page_nr_indexed_words'] = <<<_P
Ord:
_P;

$tsep_lng['page_number'] = <<<_P
Side nummer:
_P;

$tsep_lng['page_rank'] = <<<_P
x fundet
_P;

$tsep_lng['page_rank_help'] = <<<_P
Dine søgeord er fundet på denne side så mange gange
_P;

$tsep_lng['page_rank_real'] = <<<_P
Rang på denne side (beregnet på det antal tilfælde af søgeord i dokumentet)
_P;

$tsep_lng['page_title'] = <<<_P
Side navn:
_P;

$tsep_lng['page_url'] = <<<_P
Side URL:
_P;

$tsep_lng['pages_found'] = <<<_P
sider er fundet.
_P;

$tsep_lng['pages_indexed'] = <<<_P
sider indexeret
_P;

$tsep_lng['pages_not_to_be_indexed'] = <<<_P
sider der IKKE skal indexeres
_P;

$tsep_lng['pages_to_be_indexed'] = <<<_P
sider der skal indexeres
_P;

$tsep_lng['powered_by'] = <<<_P
Program fra
_P;

$tsep_lng['protect_indexentry'] = <<<_P
Beskyt index indgange (mod genopbygning og sletning lavet af indexeren):
_P;

$tsep_lng['protected_indexentry'] = <<<_P
Index er beskyttet mod registrering
_P;

$tsep_lng['really_delete'] = <<<_P
skal der slettes?
_P;

$tsep_lng['records'] = <<<_P
Rekord
_P;

$tsep_lng['rename'] = <<<_P
omdøb
_P;

$tsep_lng['results'] = <<<_P
Resultat
_P;

$tsep_lng['results_to_show_user'] = <<<_P
Brugeren kan vælge mellem at få vist følgende antal resultater på en side:
_P;

$tsep_lng['save'] = <<<_P
gem
_P;

$tsep_lng['saveas'] = <<<_P
gem som
_P;

$tsep_lng['search_tips'] = <<<_P
Tips til bedre søgning
_P;

$tsep_lng['search_tips_desc'] = <<<_P
TSEPs søgemotor søger pr. definition på alle indtastede ord og viser sider hvor alle ord findes. Mindste antal bogstaver i et søgeord er 4. Herunder vises et ekempel på en boolsk søgning lavet i TSEP.
_P;

$tsep_lng['search_tips_ex1'] = <<<_P
Find sider der indeholder mindst et af disse ord.
_P;

$tsep_lng['search_tips_ex2'] = <<<_P
Find sider der indeholder begge ord.
_P;

$tsep_lng['search_tips_ex3'] = <<<_P
ordet 'æble', men ranger resultatet højere hvis det også indeholder ordet 'frugt'.
_P;

$tsep_lng['search_tips_ex4'] = <<<_P
ordet 'æble' men ikke ordet 'frugt'.
_P;

$tsep_lng['search_tips_ex5'] = <<<_P
'æble' og 'tærte', eller 'æble' og 'kage' (uanset rækkefølge), men ranger 'æbletærte' højere end 'æblekage'.
_P;

$tsep_lng['search_tips_ex6'] = <<<_P
'æble', 'æbler', 'æblemost', og 'æbletræ'. * repræsenterer 0 eller flere tegn og kan kun bruges i slutningen af et søgeord!
_P;

$tsep_lng['search_tips_ex7'] = <<<_P
find sider der indeholder den præcise tekst 'nogen ord' (for eksempel sider der indeholder 'nogen ord om visdom'; men ikke 'nogen vrøvle ord').
_P;

$tsep_lng['search_tips_head'] = <<<_P
Tips til at bruge TSEP mere effektivt
_P;

$tsep_lng['search_tips_help'] = <<<_P
Åbner hjælp i et nyt vindue
_P;

$tsep_lng['search_tips_se1'] = <<<_P
æble banan
_P;

$tsep_lng['search_tips_se2'] = <<<_P
+æble +banan
_P;

$tsep_lng['search_tips_se3'] = <<<_P
+æble frugt
_P;

$tsep_lng['search_tips_se4'] = <<<_P
+æble - frugt
_P;

$tsep_lng['search_tips_se5'] = <<<_P
+æble +(>tærte <kage)
_P;

$tsep_lng['search_tips_se6'] = <<<_P
æble*
_P;

$tsep_lng['search_tips_se7'] = <<<_P
'nogen ord'
_P;

$tsep_lng['search_tips_title'] = <<<_P
Tips til bedre søgning
_P;

$tsep_lng['search_took'] = <<<_P
Søgningen tog
_P;

$tsep_lng['search_what_are_stopwords'] = <<<_P
Søges der på et ord, der er defineret som stopord, vil der ikke blive søgt på ordet og det markeres ikke i resultatet. Udover bruger definerede stopord kan der være stopord der er defineret af administrator. Stopord defineret af administrator er:
_P;

$tsep_lng['searched_site_for'] = <<<_P
Siden blev gennemsøgt for
_P;

$tsep_lng['seconds'] = <<<_P
� sekunder
_P;

$tsep_lng['separate_values_by_comma'] = <<<_P
Adskil flere værdi definitioner med komma
_P;

$tsep_lng['show_it'] = <<<_P
vis
_P;

$tsep_lng['show_results_per_page'] = <<<_P
Søgeresultater pr. side. Efter ændring indlæses siden med de nye værdier.
_P;

$tsep_lng['show_x_results_per_page'] = <<<_P
/ side
_P;

$tsep_lng['sim_index_head'] = <<<_P
Filer der skal indexeres.<br />Herunder er listen med de filer der bliver indexeret
_P;

$tsep_lng['sim_index_head_searching'] = <<<_P
Gennemsøger filer...<br />Hav venligst tålmodighed...
_P;

$tsep_lng['skip_cause_protected_indexentry'] = <<<_P
Sider der ikke bliver indexeret (de er beskyttet i følge index registreringer)
_P;

$tsep_lng['sort_asc'] = <<<_P
Sortere A -> Z, ældst -> nyest
_P;

$tsep_lng['sort_desc'] = <<<_P
Sortere Z -> A, nyest -> ældst
_P;

$tsep_lng['start_indexing'] = <<<_P
Start Indexering**
_P;

$tsep_lng['stopwords'] = <<<_P
Stopord
_P;

$tsep_lng['stopwords_title'] = <<<_P
Stopord
_P;

$tsep_lng['to'] = <<<_P
til
_P;

$tsep_lng['tsep'] = <<<_P
TSEP - The Search Engine Project
_P;

$tsep_lng['type'] = <<<_P
type
_P;

$tsep_lng['update'] = <<<_P
opdater
_P;

$tsep_lng['value_already_exists'] = <<<_P
Værdi findes allerede
_P;

$tsep_lng['value_for'] = <<<_P
værdi for
_P;

$tsep_lng['version'] = <<<_P
Dette er version
_P;

$tsep_lng['warning'] = <<<_P
** Venligst kun klik på 'Start Indexering' knappen en gang, og luk ikke dit browser vindue før søgningen er afsluttet. Kør ikke flere samtidige indexeringer.
_P;

$tsep_lng['your_stopwords_head'] = <<<_P
Gyldige stopord <br />(der kan ikke søges på dem og de markeres ikke i resultatet)
_P;

$tsep_lng['config_force_http_fileparse'] = <<<_P
Force parsing via HTTP
_P;

$tsep_lng['config_force_http_fileparse_help'] = <<<_P
Brugen 'Force parsing via HTTP ' har (mindst) to fordele. SSI indhold analyseres også og URL'er uden for dit lokale område kan indexeres (fx. filer der ikke kan læses direkte med en lokal åbning af filen). Ulempen er, at indexerings processe kan blive ekstrem langsom! 
_P;

$tsep_lng['error_while_parsing'] = <<<_P
Fejl under læsning eller analysering
_P;

$tsep_lng['delete_indexingprofiles_info'] = <<<_P
***ADVASEL***: ALLE afhængige index slettes også, hvis de ikke er tildelt andre indexeringsprofiler også!
_P;

$tsep_lng['config_group_indexer_paths'] = <<<_P
Sti
_P;

$tsep_lng['config_group_indexer_include_and_exclude'] = <<<_P
Inkl. og eksl.
_P;

$tsep_lng['config_group_indexer_external_datasupply'] = <<<_P
Ekstern datakilde
_P;

$tsep_lng['config_group_indexer_indexing_mode'] = <<<_P
Indexerings metode
_P;

$tsep_lng['config_group_indexer_indexing_modifiers'] = <<<_P
Indexerings ændringer
_P;

$tsep_lng['config_group_indexer_miscellaneous'] = <<<_P
Diverse
_P;

$tsep_lng['filter_filterbutton'] = <<<_P
Tilføj filter
_P;

$tsep_lng['filter_filterbutton_Remove_Filter'] = <<<_P
Fjern filter
_P;

$tsep_lng['filter_logviewtype_all'] = <<<_P
Alle
_P;

$tsep_lng['filter_from'] = <<<_P
Fra:
_P;

$tsep_lng['filter_to'] = <<<_P
Til:
_P;

$tsep_lng['filter_date_format'] = <<<_P
ÅÅÅÅ-[M]M-[D]D
_P;

$tsep_lng['filter_time_format'] = <<<_P
TT:MM:SS
_P;

$tsep_lng['logviewstats_title'] = <<<_P
Søgninger og sideåbninger: Statistik
_P;

$tsep_lng['logviewstats_head'] = <<<_P
Log Statistik
_P;

$tsep_lng['logviewstats_groupTotals'] = <<<_P
Totalt
_P;

$tsep_lng['logviewstats_groupDetails'] = <<<_P
Detaljer
_P;

$tsep_lng['logviewstats_groupTopX'] = <<<_P
Top
_P;

$tsep_lng['logviewstats_groupTopAll'] = <<<_P
Alle poster
_P;

$tsep_lng['logviewstats_DomainUnresolved'] = <<<_P
Ikke løst
_P;

$tsep_lng['logviewstats_nrRecords'] = <<<_P
Log record
_P;

$tsep_lng['logviewstats_nrSetupEntries'] = <<<_P
Installere og opdatere
_P;

$tsep_lng['logviewstats_nrSearchQueries'] = <<<_P
Søgninger
_P;

$tsep_lng['logviewstats_nrClicks'] = <<<_P
Klik på resultater
_P;

$tsep_lng['logviewstats_nrDomains'] = <<<_P
Unikt domæne
_P;

$tsep_lng['logviewstats_nrIPs'] = <<<_P
Unik IP adresse
_P;

$tsep_lng['logviewstats_nrSearchwords'] = <<<_P
Unikke søgeord
_P;

$tsep_lng['logviewstats_nrStopwords'] = <<<_P
Unikke stopord
_P;

$tsep_lng['logviewstats_topSearchqueries'] = <<<_P
Søgninger
_P;

$tsep_lng['logviewstats_topClicks'] = <<<_P
Klik på resultater
_P;

$tsep_lng['logviewstats_topSearchwords'] = <<<_P
Unikke søgeord
_P;

$tsep_lng['logviewstats_topStopwords'] = <<<_P
Unikke stopord
_P;

$tsep_lng['logviewstats_topIPs'] = <<<_P
Unik IP adresser
_P;

$tsep_lng['logviewstats_topDomains'] = <<<_P
Unike domæner
_P;

$tsep_lng['logviewstats_DrillDown'] = <<<_P
Klik her for at komme dybere ned i statistikken (se hele statistikken for denne undergruppe)
_P;

$tsep_lng['error_indexer_is_running'] = <<<_P
Indexeren kører allerede:<br />%s
_P;

$tsep_lng['warning_php_safe_mode_on'] = <<<_P
<b>Advarsel: PHP_safe_mode er ON>/b><br />Den maksimum tid du sætter på konfigurationskærmbilledet vil ikke virke på dette system.>br />PHP er af din administrator sat til timeout efter %d minutter.
_P;

$tsep_lng['page_additional_info'] = <<<_P
Yderligere information:
_P;

$tsep_lng['ss_search_term'] = <<<_P
Forespørgsel
_P;

$tsep_lng['ss_search_term_hover'] = <<<_P
Tidligere brugte søgeforespørgsel
_P;

$tsep_lng['ss_popular'] = <<<_P
Pop
_P;

$tsep_lng['ss_popular_hover'] = <<<_P
Antal gange denne forespørgsel er blevet brugt (popularitet)
_P;

$tsep_lng['ss_returned_pages'] = <<<_P
RP
_P;

$tsep_lng['ss_returned_pages_hover'] = <<<_P
Antal sider returneret af forespørgsel
_P;

$tsep_lng['error_index_nothing'] = <<<_P
Tom (d.v.s. intet at indexere)�
_P;

$tsep_lng['error_empty_files'] = <<<_P
Filerne er tomme (d.v.s. intet at indexere)
_P;

$tsep_lng['display_ranking'] = <<<_P
Vis rangering med symboler
_P;

$tsep_lng['ranking_alt'] = <<<_P
Indtast en alternativ tekst for symbolet
_P;

$tsep_lng['ranking_comments'] = <<<_P
Kommentarer (interne)
_P;

$tsep_lng['ranking_image_text'] = <<<_P
Venligsst angiv billedfil
_P;

$tsep_lng['ranking_submit'] = <<<_P
Sæt symbol
_P;

$tsep_lng['ranking_delete'] = <<<_P
Slet symbol
_P;

$tsep_lng['ranking_modify'] = <<<_P
@Ændre billed
_P;

$tsep_lng['help_del_ranking'] = <<<_P
@Er du sikker på, at du vil slette dette billed?
_P;

$tsep_lng['alert_mod_ranking'] = <<<_P
@Du kan ikke ændre procentsatsen
_P;

$tsep_lng['help_mod_ranking'] = <<<_P
@Er du sikker på, at du vil ændre dette billed?
_P;

$tsep_lng['ranking_range'] = <<<_P
Angiv niveauer der skal vises i procent
_P;

$tsep_lng['ranking_image'] = <<<_P
billed
_P;

$tsep_lng['ranking_url'] = <<<_P
vis (fx. URL)
_P;

$tsep_lng['ranking_com'] = <<<_P
kommentarer
_P;

$tsep_lng['ranking_alt_attrib'] = <<<_P
HTML ALT attribute
_P;

$tsep_lng['ranking_percent'] = <<<_P
Trin i procent
_P;

$tsep_lng['setup_Rollback_completed'] = <<<_P
Rollback gennemført
_P;

$tsep_lng['setup_Unknown'] = <<<_P
Ukendt
_P;

$tsep_lng['setup_Setup'] = <<<_P
Setup
_P;

$tsep_lng['setup_step1'] = <<<_P
1. Introduktion
_P;

$tsep_lng['setup_step2'] = <<<_P
2. Database setup
_P;

$tsep_lng['setup_step3'] = <<<_P
3. System check
_P;

$tsep_lng['setup_step4'] = <<<_P
4. Konfiguration
_P;

$tsep_lng['setup_step5'] = <<<_P
5. Installation
_P;

$tsep_lng['setup_step6'] = <<<_P
6. Opsummering
_P;

$tsep_lng['setup_step7'] = <<<_P
7. Tilbagemelding
_P;

$tsep_lng['setup_CancelButtonPressed'] = <<<_P
Du har klikket på "Afbryd" knapper og indikeret, at du vil afbryde installationen af <span class="tsep">TSEP</span>.<br /><br />Hvorfor gøjrde du det? Kan du ikke se hvad du kommer til at mangle? <span class="tsep">TSEP</span> er uden tvivl den bedste søgemaskine på hele nettet!!<br /><br /> Ok...  Du får det på din måde! Men vær opmærksom på dette:<br /><br />Et klik på "Afbryd" vil afslutte installationen og bringe dig til <span class="tsep">TSEP</span> side på SourceForge. Alle gennemførte ændringer på din webside vil blive annulleret.
_P;

$tsep_lng['setup_IwantToQuit'] = <<<_P
Jeg har besluttet mig. Jeg fortryder!
_P;

$tsep_lng['setup_Quit'] = <<<_P
Fortryd
_P;

$tsep_lng['setup_ContinueSetup'] = <<<_P
Fortsæt setup
_P;

$tsep_lng['setup_IwantToContinue'] = <<<_P
Beklager! Jeg har ændret mening. Lad mig fortsætte....
_P;

$tsep_lng['setup_ToPreviousStep'] = <<<_P
Gå til forrige trin....
_P;

$tsep_lng['setup_Previous'] = <<<_P
Forrige
_P;

$tsep_lng['setup_Next'] = <<<_P
Næste
_P;

$tsep_lng['setup_ToNextStep'] = <<<_P
Gå til næste trin..
_P;

$tsep_lng['setup_IWantToQuitInstalling'] = <<<_P
I ønsker at installere TSEP.
_P;

$tsep_lng['setup_Cancel'] = <<<_P
Fortryd
_P;

$tsep_lng['select_language'] = <<<_P
Vælg dit favorit TSEP-sprog
_P;

$tsep_lng['setup_ThanksForConsidering'] = <<<_P
Tak fordi du overvejer at bruge  <span class="tsep">TSEP</span>.<br /><br />Du er ved at installere  <span class="tsep">TSEP</span>. Denne installations funktion vil bruínge dig gennem processen med opsætning eller opgradering af  <span class="tsep">TSEP</span>. På den venstre side af skærmen ser du de trin, der skal gennem føres før installationen er komplet. Du vil være i stand til at følge installations processen ved at checke disse trin.<br /><br />Vi har været meget omhyggelige med de værdier vi foreslår dig at bruge. Er dette din første installation kan det være en god ide, at du accepterer de foreslåede værdier, og så ændrer dem når du har lært <span class="tsep">TSEP</span> bedre at kende. Opgraderer du fra en ældre version af <span class="tsep">TSEP</span> vil installations processen finde din gamle opsætning. Du kan kopiere dem til det nye setup eller acceptere de foreslåede værdier.<br /><br />Vi håber <span class="tsep">TSEP</span> vil vise sig at være værdifuldt værktøj til din webside.<br />Har du spørgsmål eller kommentarer så kontakt os gennem vores <a href="http://sourceforge.net/projects/tsep/" target="blank">SourceForge side</a>.<br /><br /><span class="tsep">TSEP</span> Teamet<br />
_P;

$tsep_lng['setup_DB_1'] = <<<_P
Venligst indtast de data <span class="tsep">TSEP</span> skal bruge for at få adgang til din database og scripts.
_P;

$tsep_lng['setup_DB_2_Host'] = <<<_P
Database vært:
_P;

$tsep_lng['setup_DB_2_Host_Help'] = <<<_P
Indtast URL til MySQL serveren. I de fleste tilfælde er det \'localhost\'.<br /><br />hvis du ikke er sikker accepter foreslået værdi.
_P;

$tsep_lng['setup_DB_3_Username'] = <<<_P
Database brugernavn:
_P;

$tsep_lng['setup_DB_3_Username_Help'] = <<<_P
Det brugernavn du bruger når du logger på MySQL.
_P;

$tsep_lng['setup_DB_4_Passwd'] = <<<_P
Database password:
_P;

$tsep_lng['setup_DB_4_Passwd_Help'] = <<<_P
Dit password der passer til brugernavnet ovenfor.
_P;

$tsep_lng['setup_DB_5_DBName'] = <<<_P
Database navn:
_P;

$tsep_lng['setup_DB_5_DBName_Help'] = <<<_P
Hvad er navnet på den database du har lavet til TSEP?
_P;

$tsep_lng['setup_DB_6_ForceCreation'] = <<<_P
Tvungen database dannelse:
_P;

$tsep_lng['setup_DB_6_ForceCreation_Help'] = <<<_P
Er den sat til JA vi Setup prøve at lave databasen for dig.<br /><br />Hvis databasen allerede findes vil Setup bare fortsætte processen.
_P;

$tsep_lng['setup_Yes'] = <<<_P
Ja
_P;

$tsep_lng['setup_No'] = <<<_P
Nej
_P;

$tsep_lng['setup_DB_7_Prefix'] = <<<_P
Tabel prefix der skal bruges:
_P;

$tsep_lng['setup_DB_7_Prefix_Help'] = <<<_P
Hvis din web udbyder kun tillader dig at have en database, kan du sikredig at tabelnavnene er uniqe ved at atgive et prefix her.<br /><br />Hvis du ikke er swikke kan du blot acceptere den foreslåede værdi.
_P;

$tsep_lng['setup_DB_8_TSEP_Root'] = <<<_P
<span class="tsep">TSEP</span> rod mappe:
_P;

$tsep_lng['setup_DB_8_TSEP_Root_Help'] = <<<_P
TSEPs rod mappe, relativt til din dokument rod.<br /><br />Dette er sikkert korrekt. Hvis du ikke kender mappe navnet bør du acceptere det foreslåede.
_P;

$tsep_lng['setup_DB_9_TSEP_AbsPath'] = <<<_P
Absolut sti til <br /><span class="tsep">TSEPs</span> rod mappe:
_P;

$tsep_lng['setup_DB_9_TSEP_AbsPath_Help'] = <<<_P
Den absolut sti til TSEPs rod mappe.<br /><br />Hvis du ikke kender den skal du acceptere den foreslåede værdi.
_P;

$tsep_lng['setup_DB_10_TSEP_TmpPath'] = <<<_P
Den absolutte sti til <br /><span class="tsep">TSEP</span> temp-mappe:
_P;

$tsep_lng['setup_DB_10_TSEP_TmpPath_Help'] = <<<_P
Den absolutte sti til TSEPs temp-mappe.<br /><br />Skal have skrive rettigheder.
_P;

$tsep_lng['setup_UnknownDBHost'] = <<<_P
Du ha rspecificeret en ukendt database vært.<br />Venligst check om din indtastning er rigtig og prøv igen.
_P;

$tsep_lng['setup_NoDBAccess'] = <<<_P
Adgang til databasen er afvist.<br />Det betyder, at brugernavn og/eller password er forkerte.
_P;

$tsep_lng['setup_ConnectionDenied'] = <<<_P
Forbindelse til MySQL serveren mislykkedes. Check venligst dine oplysninger (navn, password, o.s.v.) og om MySQL serveren kører.
_P;

$tsep_lng['setup_DBNotExists'] = <<<_P
Den database du opgav eksisterer ikke<br /> og TSEP kan ikke lave den for dig.
_P;

$tsep_lng['setup_DBNameWrong'] = <<<_P
Database navnet du opgav er ikke korrekt<br />(databasen eksisterer ikke).
_P;

$tsep_lng['setup_DBUnknownError'] = <<<_P
Der kommer en ukendt fejl ved forsøg på at lave forbindelse til MySQL.<br />Er du sikker på MySQL er sat korrekt op?<br />Er værdierne herunder korrekte?
_P;

$tsep_lng['setup_TSEPRootWrong'] = <<<_P
TSEPs rod mappe er ikke korrekt.
_P;

$tsep_lng['setup_TSEPAbsPathWrong'] = <<<_P
Den absolutte stil til TSEPs rod mappe er ikke korrekt.
_P;

$tsep_lng['setup_TSEPTmpPathWrong'] = <<<_P
Den absolutte sti til TSEPs temp-mappe findes ikke (d.v.s. mkdir() var ikke mulig)
_P;

$tsep_lng['setup_TSEPTmpPathNotWritable'] = <<<_P
Den absolutte sti til TSEP temp-mappe: kan ikke skrive i mappen.
_P;

$tsep_lng['setup_HTAccessNotFound'] = <<<_P
.htaccess ikke fundet
_P;

$tsep_lng['setup_OK'] = <<<_P
ok
_P;

$tsep_lng['setup_NoProtectionFound'] = <<<_P
Ingen klausus om beskyttelse er fundet
_P;

$tsep_lng['setup_Global_1'] = <<<_P
<b>Vigtigt</b> Du skal kun gøre dette, hvis Setup ikke kan skrive oplysningerne om forbindelsen til databasen til filen "/include/global.php".<br />
_P;

$tsep_lng['setup_Global_2'] = <<<_P
Venligst tag følgende skridt for at patche den nuværende global.php file korrekt.<br />
_P;

$tsep_lng['setup_Global_3'] = <<<_P
Kopier data i rammen herunder.
_P;

$tsep_lng['setup_Global_3s1'] = <<<_P
Åben filen "/include/global.php" på din harddisk.
_P;

$tsep_lng['setup_Global_3s21'] = <<<_P
Overskriv koden mellem pladsholderne
_P;

$tsep_lng['setup_and'] = <<<_P
og
_P;

$tsep_lng['setup_Global_3s22'] = <<<_P
, og sikre dig at du ikke overskriver linierne med plasholderne; men kun linierne MELLEM dem.
_P;

$tsep_lng['setup_Global_3s3'] = <<<_P
Gem fil.
_P;

$tsep_lng['setup_Global_3s4'] = <<<_P
Upload filen til /include mappen på din webside og overskriv den gamle fil.
_P;

$tsep_lng['setup_Global_3s5'] = <<<_P
Klik på "Næste" knappen i bunden af denne side.
_P;

$tsep_lng['setup_Global_4'] = <<<_P
Hvis alt gik godt vil du kunne fortsætte setup og installere <span class="tsep">TSEP</span> korrekt.<br />
_P;

$tsep_lng['setup_patch_manually'] = <<<_P
patch manuelt
_P;

$tsep_lng['setup_patch_manually_help'] = <<<_P
Hvis Setup ikke kan gemme forbindelses data klik venligst her og følg instruktionerne.
_P;

$tsep_lng['setup_warning'] = <<<_P
advarsel
_P;

$tsep_lng['setup_SysChk_1'] = <<<_P
System check giver følgende information. Venligst check dem omhyggeligt og ret dem hvis nødvendigt.<br />
_P;

$tsep_lng['setup_MySQL_version'] = <<<_P
MySQL version:
_P;

$tsep_lng['setup_MySQL_version_Help'] = <<<_P
Din MySQL version skal være 3.23 eller højere for at du kan udnytter TSEPs avancerede funktioner.<br /><br />Hvis du ønsker at få mest muligt ud af TSEP , så brug version 4.1 eller højere.<br /><br />Vi kan ikke garantere at TSEP arbejder korrekt på ældre versioner.
_P;

$tsep_lng['setup_PHP_version'] = <<<_P
PHP version:
_P;

$tsep_lng['setup_PHP_version_Help'] = <<<_P
TSEP er testet med PHP version 4.2 og højere.<br /><br />Vi kan ikke garantere at TSEP arbejder korrekt på ældre versioner.
_P;

$tsep_lng['setup_TSEP_oldver'] = <<<_P
Gammel <span class="tsep">TSEP</span> version:
_P;

$tsep_lng['setup_TSEP_oldver_Help'] = <<<_P
Dette er kun til information. <br/><br/>Det viser hvilken version af TSEP du opgraderer fra (hvis den findes).
_P;

$tsep_lng['setup_TSEP_newver'] = <<<_P
Ny <span class="tsep">TSEP</span> version:
_P;

$tsep_lng['setup_TSEP_newver_Help'] = <<<_P
Dette er kun til information. <br/><br/>Det viser hvilken version af TSEP du installerer nu.
_P;

$tsep_lng['setup_DB_Config_File'] = <<<_P
Databasse konfigurations fil:
_P;

$tsep_lng['setup_DB_Config_File_Help_1'] = <<<_P
Filen indeholder oplysninger om database forbindelsen og skal være skrivbar for at Setup kna fungere korrekt.
_P;

$tsep_lng['setup_DB_Config_File_Help_2'] = <<<_P
Venligst chmod filen \'include/global.php\' til \'666\'.<br /><br />Hvis filen ikke er skrivbar kan du fortsætte ved at trykke på "Næste". Setup vil prøve at ændre filens attributter til skrivbar.<br /><br />Mislykkes det må du bruge download linket for at få de rigtige indstillinger. Venligst følg instruktionerne på download siden.
_P;

$tsep_lng['setup_DB_Config_File_Writable'] = <<<_P
Skrivbar
_P;

$tsep_lng['setup_DB_Config_File_UnWritable'] = <<<_P
Ikke skrivbar
_P;

$tsep_lng['setup_PHPSafeMode'] = <<<_P
PHP sikker tilstand:
_P;

$tsep_lng['setup_PHPSafeMode_Help'] = <<<_P
Hvis PHP sikker tilstand er <b>JA</b> vil visse funktioner i TSEP ikke virke.<br /><br />Dette er ikke kritisk. Hvis du ikke har en rigtig god grund til at ændre indstillingen så lad være.
_P;

$tsep_lng['setup_On'] = <<<_P
Til
_P;

$tsep_lng['setup_Off'] = <<<_P
Fra
_P;

$tsep_lng['setup_Admin_area_security'] = <<<_P
Admin område sikkerhed:
_P;

$tsep_lng['setup_Admin_area_security_Help'] = <<<_P
Du bør beskytte admin området med et password ved brug af  <i>.htaccess</i> filen (hvis du bruger Apache)<br /><br />Beskytter du ikke admin området kan alle og enhver ændre i din opsætning.
_P;

$tsep_lng['setup_Protected'] = <<<_P
Beskyttet
_P;

$tsep_lng['setup_Include_dir_security'] = <<<_P
Include mappe sikkerhed:
_P;

$tsep_lng['setup_Include_dir_security_Help'] = <<<_P
Du bør beskytte include mappen med et password ved brug af  <i>.htaccess</i> filen (hvis du bruger Apache)<br /><br />Beskytter du ikke include mappen er der en sikkerheds risiko, da dit brugernavn og password til databasen er gemt der.
_P;

$tsep_lng['setup_DBcfgUnwriteable'] = <<<_P
Database konfigurationsfilen er ikke skrivbar.<br />Venligst klik på >patch manuelty< for at løse problemet.
_P;

$tsep_lng['setup_UpdateOrFresh'] = <<<_P
Setup har brug for du tager stilling til nedenstående. Disse indstillinger bestemmer hvad der skal kopieres fra den gamle version til den nye version (hvis aktuelt).<br />
_P;

$tsep_lng['setup_Fresh'] = <<<_P
Ny installation (med foreslåede værdier):
_P;

$tsep_lng['setup_Fresh_Help'] = <<<_P
Hvis du vil installere en ny kopi af TSEP og kun bruge de forslåede værdier, så vælg <b>JA</b>. Setup vil se bort fra alle indstillinger, profiler o.s.v. og bare installere TSEP fra bunden.
_P;

$tsep_lng['setup_Update'] = <<<_P
Opdatere fra version:
_P;

$tsep_lng['setup_Update_Help'] = <<<_P
Hivs du opgraderer TSEP og ønsker at bevare din opsætning, så vælg <b>JA</b>. I det tilfælde skal tabel prefix for gammel og ny version være ens.<br /><br />Installerer du en ny kopi af TSEP eller du ikke ønsker at overskrive de gamle tabeller , så vælg <b>NEJ</b>. Husk at give tabellerne et unikt prefix.
_P;

$tsep_lng['setup_CopyOld'] = <<<_P
Kopier gamel konfiguration:
_P;

$tsep_lng['setup_CopyOld_Help'] = <<<_P
Hvis du opgraderer TSEP og ønsker at bevare din <u>konfiguration</u>, så vælg <b>JA</b>.<br /><br />Virker kun hvis \'<i>Update</i>\' er sat til JA.
_P;

$tsep_lng['setup_CopyOldProfiles'] = <<<_P
Kopier gamle profiler:
_P;

$tsep_lng['setup_CopyOldProfiles_Help'] = <<<_P
Hvis du opgraderer TSEP og ønsker at bevare dine <u>profiler</u>, så vælg <b>JA</b>.<br /><br />Virker kun hvis \'<i>Update</i>\' er sat til JA.
_P;

$tsep_lng['setup_CopyOldIndexes'] = <<<_P
Kopier gamle index:
_P;

$tsep_lng['setup_CopyOldIndexes_Help'] = <<<_P
Hvis du opgraderer TSEP og ønsker at bevare dine <u>index</u>, så vælg <b>JA</b>.<br /><br />Hvis du ønsker at kopiere index skal du også kopiere profilerne!<br /><br />Virker kun hvis \'<i>Update</i>\' er sat til JA.
_P;

$tsep_lng['setup_CopyOldStopwords'] = <<<_P
Kopier gamle stopord:
_P;

$tsep_lng['setup_CopyOldStopwords_Help'] = <<<_P
Hvis du opgraderer TSEP og ønsker at bevare dine <u>stopord</u>, så vælg <b>JA</b>.<br /><br />Virker kun hvis \'<i>Update</i>\' er sat til JA.
_P;

$tsep_lng['setup_CopyOldLogs'] = <<<_P
Kopier gamle logs:
_P;

$tsep_lng['setup_CopyOldLogs_Help'] = <<<_P
Hvis du opgraderer TSEP og ønsker at bevare dine <u>logge</u>, så vælg <b>JA</b>.<br /><br />Virker kun hvis \'<i>Update</i>\' er sat til JA.
_P;

$tsep_lng['setup_CopyOldRankSymbols'] = <<<_P
Kopier gamle rang symboler:
_P;

$tsep_lng['setup_CopyOldRankSymbols_Help'] = <<<_P
Hvis du opgraderer TSEP og ønsker at gemme dine gamle <u>rang symbloer</u> vælg <b>JA</b>.<br /><br />Virker kun hvis \'<i>Update</i>\' er sat til JA.
_P;

$tsep_lng['setup_IndicateNoUpdate'] = <<<_P
Du har angivet, at du ikke ønsker at opdatere dit gamle system<br />men du ahr angivet samme tabel prefix som det der allerede bruges.
_P;

$tsep_lng['setup_IndicateUpdate'] = <<<_P
Du har angivet, at du ønsker at opdatere dit gamle system<br />men du har angivet et tabel prefix der er forskelligt fra det der bruges nu.
_P;

$tsep_lng['setup_Fatal_Error'] = <<<_P
Fatal fejl:
_P;

$tsep_lng['setup_Saving_old_tables'] = <<<_P
Gemmer gamle tabeller
_P;

$tsep_lng['setup_Can_not_open'] = <<<_P
Kan ikke åbne
_P;

$tsep_lng['setup_Can_not_write_to'] = <<<_P
Kan ikke skrive til 
_P;

$tsep_lng['setup_Copying_settings'] = <<<_P
Kopierer opsætning
_P;

$tsep_lng['setup_Copying_indexes'] = <<<_P
Kopierer index
_P;

$tsep_lng['setup_Copying_profile2index_links'] = <<<_P
Kopierer profil-til-index links
_P;

$tsep_lng['setup_Copying_profiles'] = <<<_P
Kopierer profiler
_P;

$tsep_lng['setup_Copying_log_entries'] = <<<_P
Kopierer log indgange
_P;

$tsep_lng['setup_Copying_log_hits'] = <<<_P
Kopierer log hits
_P;

$tsep_lng['setup_Copying_stopwords'] = <<<_P
Kopierer stopord
_P;

$tsep_lng['setup_Copying_rank_symbols'] = <<<_P
Kopierer rang symboler
_P;

$tsep_lng['setup_Congratulations'] = <<<_P
Tillykke! Installationen er gennemført med succes.
_P;

$tsep_lng['setup_Continue2Summary'] = <<<_P
Venligst fortsæt til opsummerings skærmen for at runde af.
_P;

$tsep_lng['setup_PerformingInstallOfVer'] = <<<_P
Setup gennemfører installation af <span class=\"tsep\">TSEP</span> version 
_P;

$tsep_lng['setup_DoNotInterrupt'] = <<<_P
Afbryd ikke denne proces. Du får bare en korrupt installation hvis du gør det.<br />
_P;

$tsep_lng['setup_Progress'] = <<<_P
Forløb:
_P;

$tsep_lng['setup_Deleting_old_tables'] = <<<_P
Sletter ganle tabeller
_P;

$tsep_lng['setup_Creating_new_tables'] = <<<_P
Laver nye tabeller
_P;

$tsep_lng['setup_Populating_new_tables'] = <<<_P
Udbreder nye tabeller
_P;

$tsep_lng['setup_FinishedInstalling'] = <<<_P
Du har gennemført installation af <span class="tsep">TSEP</span> version
_P;

$tsep_lng['setup_Summary_of_installation'] = <<<_P
Opsummering af installation
_P;

$tsep_lng['setup_Settings'] = <<<_P
Indstilling:
_P;

$tsep_lng['setup_records_copied'] = <<<_P
 rekords kopieret
_P;

$tsep_lng['setup_records_copied_Zero'] = <<<_P
0 rekord kopieret
_P;

$tsep_lng['setup_Not_selected_for_update'] = <<<_P
Ikke valgt til opdatering
_P;

$tsep_lng['setup_Profiles'] = <<<_P
Profiler:
_P;

$tsep_lng['setup_Indexes'] = <<<_P
Index:
_P;

$tsep_lng['setup_Stopwords'] = <<<_P
Stopord:
_P;

$tsep_lng['setup_Logs'] = <<<_P
Logge:
_P;

$tsep_lng['setup_Ranksymbols'] = <<<_P
Rangerings symboler:
_P;

$tsep_lng['setup_Important'] = <<<_P
Vigtigt:
_P;

$tsep_lng['setup_Important_Delete'] = <<<_P
Venligst husk at <u>beskytte</u> <u>admin området</u> og  <u>include mappen</u> hvis du ikke allerede har gjort det. Du skal også <u>slette</u> filen <u>/admin/setup.php</u> så din konfiguration ikke kan ødelægges af ondskabsfulde hackere.
_P;

$tsep_lng['setup_TakeMe2Config'] = <<<_P
Gå til konfiguration...
_P;

$tsep_lng['setup_Finish'] = <<<_P
færdig
_P;

$tsep_lng['setup_Steps_1'] = <<<_P
Introduktion
_P;

$tsep_lng['setup_Steps_2'] = <<<_P
Database setup
_P;

$tsep_lng['setup_Steps_3'] = <<<_P
System check
_P;

$tsep_lng['setup_Steps_4'] = <<<_P
Konfiguration
_P;

$tsep_lng['setup_Steps_5'] = <<<_P
Installation
_P;

$tsep_lng['setup_Steps_6'] = <<<_P
Summering
_P;

$tsep_lng['setup_Steps_7'] = <<<_P
Tilbagemelding
_P;

$tsep_lng['setup_NoURL2Preview'] = <<<_P
Ingen URL at vise
_P;

$tsep_lng['setup_BeforeFinish'] = <<<_P
Før du afslutter
_P;

$tsep_lng['setup_BeforeCancel'] = <<<_P
Før du afbryder
_P;

$tsep_lng['setup_cancelText1'] = <<<_P
Vi vil gerne modtage noge statistiske data. At sende disse data sker helt annonymt og er valgfrit. Listen herunder viser de data vi gerne vil samle. Du kan selv vælge hvilke data du vil bidrage med eller helt lade være.
_P;

$tsep_lng['setup_cancelText2'] = <<<_P
Hvis du beslytter dig til at bidrage med data, og på den måde hjælpe TSEP, bliver du sendt til www.tsep.info hvor oplysningerne sendes tild databasen.
_P;

$tsep_lng['setup_finishText1'] = <<<_P
Vi vil gerne modtage nogle anonyme statistik data. At sende disse data sker helt anonymt og er valgfrit. Listen herunder viser de data vi gerne vil indsamle. Du kan vælge hvilke data du vil sende til os, eller vælge helt at lade være med at sende nogen.
_P;

$tsep_lng['setup_finishText2'] = <<<_P
Vælger du at sende data, og på den måde hjælpe med TSEPs udvikling, bliver du først sendt til <a href=\"http://www.tsep.info\" target=\"blank\">www.tsep.info</a> hvor data er sendt til databasen. Så føres du automatisk til konfigurationsskærmen på din web side og kan begynde at arbejde med  <span class=\"tsep\">TSEP</span>.<br />
_P;

$tsep_lng['setup_finishText3'] = <<<_P
Bemærk at vælger du at sende data vil din URL blive sendt til os uanset om du har valgt ikke at gøre det. Det sker fordi vi har behov for at vide hvor til vi skal sende dig når statistikken er lavet. I dette tilfælde vil din URL ikke blive logget.
_P;

$tsep_lng['setup_finishText4'] = <<<_P
Vælger du ikke at sende data føres du direkte til konfigurationsskærmen uden at koble på <span class=\"tsep\">TSEP</span> hjemmeside.<br />I begge tilfælde er den næste side du ser konfigurationsskærmen til din <span class=\"tsep\">TSEP</span> installation.
_P;

$tsep_lng['setup_Let_TSEP_Team_know'] = <<<_P
Det vil lade os vide, at TSEP er installeret korrekt.
_P;

$tsep_lng['setup_Let_TSEP_Team_know_Help'] = <<<_P
Dette vil give os besked om, at du har installeret TSEP med succes
_P;

$tsep_lng['setup_Let_TSEP_Team_know2'] = <<<_P
Lad os vide, at du afbrød <span class="tsep">TSEP</span> installationen:
_P;

$tsep_lng['setup_Let_TSEP_Team_know2_Help'] = <<<_P
Dette vil give os besked om at du afbrød installionen af TSEP.
_P;

$tsep_lng['setup_NewVersion'] = <<<_P
Ny <span class="tsep">TSEP</span> version:
_P;

$tsep_lng['setup_NewVersion_Help'] = <<<_P
Dette er versionen af TSEP du netop har installeret.
_P;

$tsep_lng['setup_OldVersion'] = <<<_P
Gammel <span class="tsep">TSEP</span> version:
_P;

$tsep_lng['setup_OldVersion_Help'] = <<<_P
Den version af TSET du har opdateret fra (hvis findes).
_P;

$tsep_lng['setup_Referer'] = <<<_P
Log du referer:
_P;

$tsep_lng['setup_Referer_Help'] = <<<_P
Din hjemmesides domæne. Vi vil gerne registrere det og om muligt tage et skærmbilled af din side.<br /><br/>Bemærk, at vælger du en af de andre optioner vil din URL blive sendt til vores side. Det betyder IKKE at vi logger den. Sætter du denne option til <b>NEJ</b> vil vi <b>ikke</b> gemme din URL i vores database.
_P;

$tsep_lng['setup_NewsLetter'] = <<<_P
Tilmeld dig nyhedsbrevet:
_P;

$tsep_lng['setup_NewsLetter_Help'] = <<<_P
Vil du tilmelde dig vores nyhedsbrev, så du holdes "up to date" med de seneste TSEP nyheder, indtast din e.mail adresse her.<br /><br/>Er du ikke interesseret skal du lade feltet være tomt.<br /><br/>Bemærk: FOr at afmelde nyhedsbrevet skal du gå til vores hjemmeside. Dette felt er kun for tilmelding.
_P;

$tsep_lng['setup_Comment'] = <<<_P
Komentarer:
_P;

$tsep_lng['setup_Comment_Help'] = <<<_P
Hvis du har noget at tilføje, som kan være til hjælp for os, så indtast dinne kommentarer her.
_P;

$tsep_lng['setup_Why_Aborted'] = <<<_P
Årsag til at du afbrød installationen:
_P;

$tsep_lng['setup_Why_Aborted_Help'] = <<<_P
Vi vil hvirkelig gerne have at vide hvorfor du afbrød installationen. Dine kommentarer kan hjælpe os til at tilpasse TSEP bedere til dit behov.
_P;

$tsep_lng['setup_URLPreview'] = <<<_P
Den URL vi vil sende:
_P;

$tsep_lng['setup_JavaScriptEnabled'] = <<<_P
JavaScript er slået til for at få dette preview til at virke.
_P;

$tsep_lng['indexer_started_indexer'] = <<<_P
Indexer startet
_P;

$tsep_lng['indexer_started_searching'] = <<<_P
Søger efter filer....
_P;

$tsep_lng['indexer_started_building'] = <<<_P
Opbygger index (for %d filer)...
_P;

$tsep_lng['XdirName_wrongpath'] = <<<_P
Den angivne start mappe for indexeren findes ikke: <b>%s</b>
_P;

$tsep_lng['contentimgs'] = <<<_P
ContentImages
_P;

$tsep_lng['contentimg'] = <<<_P
ContentImage
_P;

$tsep_lng['contentimgs_not_used'] = <<<_P
ContentImages (bruges ikke i denne TSEP installation)
_P;

$tsep_lng['contentimg_defaultimage'] = <<<_P
ContentImage (default billed bruges)
_P;

$tsep_lng['contentimg_url_assoc_image'] = <<<_P
ContentImage (side afhængingt billed)
_P;

$tsep_lng['contentimg_filelists'] = <<<_P
ContentImage Fil Lister
_P;

$tsep_lng['contentimg_filelist'] = <<<_P
ContentImage Fil Liste
_P;

$tsep_lng['contentimg_filelists_descr'] = <<<_P
Vælg en handling fra de allerede eksisterende ContentImage Indexer Fil Lister:<br /> - venstre-klik på navne linket for at se indholdet af filen (åbner i et nyt vindue)<br /> - højre-klik på navne linket og gem (download) filen til videre behandling<br /> - slet filen
_P;

$tsep_lng['contentimg_filelist_rebuild'] = <<<_P
Mauelt lavede ContentImage Fil Liste, fra allerede indexerede sider
_P;

$tsep_lng['contentimg_filelist_autobuild'] = <<<_P
automatisk dannet af indexeren
_P;

$tsep_lng['contentimg_filelist_manuallybuilt'] = <<<_P
manuelt lavet (index profil '%s', for '%s')
_P;

$tsep_lng['for_iprofile'] = <<<_P
for index profil
_P;

$tsep_lng['all_pages'] = <<<_P
alle sider
_P;

$tsep_lng['pages_having_no_contentimg'] = <<<_P
sider der ikke har et ContentImage
_P;

$tsep_lng['currently_experimental'] = <<<_P
(foreløbig på EKSPERIMENT stadiet)
_P;

$tsep_lng['modified_created'] = <<<_P
æandret/lavet den
_P;

$tsep_lng['configure'] = <<<_P
Konfigurer
_P;

$tsep_lng['name'] = <<<_P
MAvn
_P;

$tsep_lng['manage'] = <<<_P
Arbejd med
_P;

$tsep_lng['comment'] = <<<_P
kommentar
_P;

$tsep_lng['upload'] = <<<_P
Upload
_P;

$tsep_lng['upload_complete'] = <<<_P
Upload gennemført!
_P;

$tsep_lng['delete_complete'] = <<<_P
Filen er slettet!
_P;

$tsep_lng['err_deleting_file'] = <<<_P
Filen kunne ikke slettes!
_P;

$tsep_lng['err_fopen_append'] = <<<_P
Fejl ved åbning af fil for tilføjelse: %s
_P;

$tsep_lng['err_fwrite'] = <<<_P
Fejl ved skrivning til fil %s
_P;

$tsep_lng['stat_indexer_wrote_contentimg'] = <<<_P
%s rekords er skrevet til ContentImage Fil Listen %s
_P;

$tsep_lng['stat_indexer_nowrite_contentimg'] = <<<_P
Der er ikke skrevet noget i ContentImage Fil Listen: %s
_P;

$tsep_lng['back'] = <<<_P
tilbage
_P;

$tsep_lng['contentimg_filelistTF'] = <<<_P
ContentImage fil liste ændringer %d
_P;

$tsep_lng['close'] = <<<_P
luk
_P;

$tsep_lng['run'] = <<<_P
Kør
_P;

$tsep_lng['destdirectory_does_not_exist'] = <<<_P
Destinations mappen findes ikke
_P;

$tsep_lng['directory_does_not_exist'] = <<<_P
Mappen findes ikke
_P;

$tsep_lng['file_does_not_exist'] = <<<_P
Filen findes ikke
_P;

$tsep_lng['not_defined_in_databse'] = <<<_P
%s ikke defineret (tom) i databasen
_P;

$tsep_lng['err_upload_err_ini_size'] = <<<_P
Filstørelsen overskrider værdien upload_max_filestørrelse på %s der er angivet i php.ini
_P;

$tsep_lng['err_upload_err_form_size'] = <<<_P
Filstørelsen overskrider max_filstørelse på %d
_P;

$tsep_lng['err_upload_err_partial'] = <<<_P
Filen er ikke fuldt uploaded
_P;

$tsep_lng['err_upload_err_no_file'] = <<<_P
Ingenting at uploade
_P;

$tsep_lng['err_upload_err_undefined'] = <<<_P
Upload sluttede med fejlnummer %d
_P;

$tsep_lng['err_upload_mimetype'] = <<<_P
Forkert minetype på uploaded fil: %s
_P;

$tsep_lng['err_upload_zerosize'] = <<<_P
Uploaded filstørelse = 0 (måske forkert filnavn?)
_P;

$tsep_lng['err_upload_moving_tmpfile'] = <<<_P
Uploasd fejl da temp sil skulle flyttes (måske er der ikke skrivetilladelse på destinationsmappen)
_P;

$tsep_lng['destinationfile'] = <<<_P
Destinationsfil
_P;

$tsep_lng['send_this_file'] = <<<_P
Send denne fil
_P;

$tsep_lng['delete_this_file'] = <<<_P
Slet denne fil
_P;

$tsep_lng['wrong_fileext'] = <<<_P
forkert filekstention: %s
_P;

$tsep_lng['fileext_mismatch'] = <<<_P
Filekstention €s angivet istedet for %s
_P;

$tsep_lng['config_group_configcontentimg_basicdefs'] = <<<_P
Grundlæggende definitioner
_P;

$tsep_lng['config_configcontentimg_mode'] = <<<_P
Brug ContentImages
_P;

$tsep_lng['config_configcontentimg_mode_help'] = <<<_P
Slå brugen af ContentImages til/fra i din TSEP installation. Slår mad den fra SLETTES INGEN BILLEFILER!
_P;

$tsep_lng['config_group_configcontentimg_basicdefs_paths'] = <<<_P
Stier
_P;

$tsep_lng['config_group_configcontentimg_basicdefs_image'] = <<<_P
Billeder
_P;

$tsep_lng['config_configcontentimg_webpath'] = <<<_P
Billed sti for WEB tilgang
_P;

$tsep_lng['config_configcontentimg_webpath_help'] = <<<_P
Ablolut sti hvor ContentImages kan findes mens resultat siderne vises (ækvivalent til Images-Path for PHPscript-Access)
_P;

$tsep_lng['config_configcontentimg_abspath'] = <<<_P
Billed sti for PHPscript tilgang
_P;

$tsep_lng['config_configcontentimg_abspath_help'] = <<<_P
Absolut (fysisk) sti til billed mappen, der skal accesses via php-scripts (ækvivalent til Images-Path for PHPscript-Access)
_P;

$tsep_lng['config_configcontentimg_webpath_flists'] = <<<_P
Rod sti til ContentImage Fil Lister for Web-access
_P;

$tsep_lng['config_configcontentimg_webpath_flists_help'] = <<<_P
Absolut sti til mappen hvor ContentImage Fil Lister og transformeringer genereres i. ContentImage Fil List Transformation Templates skal lægges i en undermappe med navn "transformation_templates". Mere omkring ContentImage Fil List- og -transformation opsætning herunder.
_P;

$tsep_lng['config_configcontentimg_abspath_flists'] = <<<_P
Rod sti til ContentImage Fil Lister for PHP sdript access
_P;

$tsep_lng['config_configcontentimg_abspath_flists_help'] = <<<_P
Absolut (fysisk) sti til mappen hvor ContentImage Fil Lister og transformeringer genereres i. ContentImage Fil List Transformation Templates skal lægges i en undermappe med navn "transformation_templates". Mere omkring ContentImage Fil List- og -transformation opsætning herunder.
_P;

$tsep_lng['config_configcontentimg_imageext'] = <<<_P
Billed-Filnavn-Ekstention (<b>må ikke ændres</b>, hvis der allerede findes billeder!)
_P;

$tsep_lng['config_configcontentimg_imageext_help'] = <<<_P
Brug venligst '.jpeg', '.jpg' eller '.png' format. DU MÅ IKKE ÆNDRE formatet hvis der allerede eksisterer billeder. De vil ikke kunne findes igen.
_P;

$tsep_lng['config_configcontentimg_FnDefaultImage'] = <<<_P
Default billed
_P;

$tsep_lng['config_configcontentimg_FnDefaultImage_help'] = <<<_P
Dette billed bruges hvis ContentImages skal vises, men der ikke er defineret et for den fundne side. Hvis du har defineret en default side, men ved overskriften "Default billed" ser navnet på billedfilen istedet for billedet selv, betyder det at det angivne fil-/stinavn er forkert.
_P;

$tsep_lng['config_configcontentimg_maxX'] = <<<_P
max. display bredde
_P;

$tsep_lng['config_configcontentimg_maxX_help'] = <<<_P
Sæt max. display bredde på ContentImage i pixel. For at bevare forholdet mellem højde og bredde, kan den aktuelt brugte bredde blive mindre (afhænger billedes opbygning og "max. display højde" værdien). Billeder som er mindre end den angivne max. display højde og bredde bevares uændret.
_P;

$tsep_lng['config_configcontentimg_maxY'] = <<<_P
max. display højde
_P;

$tsep_lng['config_configcontentimg_maxY_help'] = <<<_P
Sæt max. display højde på ContentImage i pixel. For at bevare forholdet mellem højde og bredde, kan den aktuelt brugte højde blive mindre (afhænger billedes opbygning og "max. display bredde" værdien). Billeder som er mindre end den angivne max. display højde og bredde bevares uændret.
_P;

$tsep_lng['config_group_configcontentimg_indexer'] = <<<_P
Indexer indstillinger
_P;

$tsep_lng['config_configcontentimg_create_flists'] = <<<_P
Indexeren vil generere ContentImage Fil Lister
_P;

$tsep_lng['config_configcontentimg_create_flists_help'] = <<<_P
Hvis denne option ikke er slået til, vil indexeren ikke genere ContentImage Fil lister. BEMÆRK: Det er altid muligt at generere ContentImage Fil Lister manuelt!
_P;

$tsep_lng['config_configcontentimg_having_no_contentimg'] = <<<_P
Kun for sider der ikke har et ContentImage
_P;

$tsep_lng['config_configcontentimg_having_no_contentimg_help'] = <<<_P
Der skrives kun en rekord i ContentImage Fil Listen hvis der ikke eksisterede et ContentImage for den indexerede side før.
_P;

$tsep_lng['config_configcontentimg_autorun_flisttrans'] = <<<_P
Kør automatisk transformeringsproces
_P;

$tsep_lng['config_configcontentimg_autorun_flisttrans_help'] = <<<_P
Hvis denne option er slået til vil transformering automatisk ske efter indexering. (option "indexeren vil generere ContentImage Fil Lister" skal være slået til også!)
_P;

$tsep_lng['config_group_configcontentimg_extdefs'] = <<<_P
Udvidet definition
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flists'] = <<<_P
ContentImage Fil Lister
_P;

$tsep_lng['config_group_configcontentimg_extdefs_fliststrans'] = <<<_P
Transformering
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flisttrans1'] = <<<_P
Transformering 1
_P;

$tsep_lng['config_configcontentimg_flisttrans1_template_filename'] = <<<_P
Template filnavn
_P;

$tsep_lng['config_configcontentimg_flisttrans1_template_filename_help'] = <<<_P
Filnavnet på den template der skal bruges for transformering 1 (dette navn brugs som en det af output filnavnet). ADVARSEL: fil extention som transformerings-outputfilnave-extension også! D.v.s. hvis det ikke er defineret korrekt vil transformering 1 filer ikke blive vist i Content Image Fil Listen der vises herunder.
_P;

$tsep_lng['config_configcontentimg_flisttrans1_active'] = <<<_P
Aktiv
_P;

$tsep_lng['config_configcontentimg_flisttrans1_active_help'] = <<<_P
Hvis transformering pågår vil transformering 1 blive inkluderet. (hvis både transformering 1 og 2 er inaktive bliver ingen transformeringer fortaget)
_P;

$tsep_lng['config_configcontentimg_flisttrans1_internal_notes'] = <<<_P
Interne notater til transformering 1
_P;

$tsep_lng['config_configcontentimg_flisttrans1_internal_notes_help'] = <<<_P
Aktiv Dette felt kan bruges til interne notater.
_P;

$tsep_lng['config_configcontentimg_flisttrans1_comment'] = <<<_P
Kommentarlinie starter med
_P;

$tsep_lng['config_configcontentimg_flisttrans1_comment_help'] = <<<_P
Definer en streng der skal bruges som "prefix" for kommentarlinier (fx. brug "#" for bemærkninger i shellscripts eller "REM" for bemærkninger i DOS-batchfiler)
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flisttrans2'] = <<<_P
Transformering 2
_P;

$tsep_lng['config_configcontentimg_flisttrans2_template_filename'] = <<<_P
Template filnavn
_P;

$tsep_lng['config_configcontentimg_flisttrans2_template_filename_help'] = <<<_P
Filnavnet på den template der skal bruges for transformering 2 (dette navn brugs som en det af output filnavnet). ADVARSEL: fil extention som transformerings-outputfilnave-extension også! D.v.s. hvis det ikke er defineret korrekt vil transformering 2 filer ikke blive vist i Content Image Fil Listen der vises herunder.
_P;

$tsep_lng['config_configcontentimg_flisttrans2_active'] = <<<_P
Aktiv
_P;

$tsep_lng['config_configcontentimg_flisttrans2_active_help'] = <<<_P
Hvis transformering pågår vil transformering 2 blive inkluderet. (hvis både transformering 1 og 2 er inaktive bliver ingen transformeringer fortaget)
_P;

$tsep_lng['config_configcontentimg_flisttrans2_internal_notes'] = <<<_P
Interne notater til transformering 2
_P;

$tsep_lng['config_configcontentimg_flisttrans2_internal_notes_help'] = <<<_P
Aktiv Dette felt kan bruges til interne notater.
_P;

$tsep_lng['config_configcontentimg_flisttrans2_comment'] = <<<_P
Denne streng er indsættes en gang i slutningen af filen.starter med 
_P;

$tsep_lng['config_configcontentimg_flisttrans2_comment_help'] = <<<_P
Definer en streng der skal bruges som "prefix" for kommentarlinier (fx. brug "#" for bemærkninger i shellscripts eller "REM" for bemærkninger i DOS-batchfiler)
_P;

$tsep_lng['stopwords_GetStop'] = <<<_P
Hent Stopord
_P;

$tsep_lng['stopwords_GetStop_Info'] = <<<_P
Angiv det antal stopord der skal søges på.
_P;

$tsep_lng['stopwords_NewStopwords'] = <<<_P
Stopord tilføjet:
_P;

$tsep_lng['stopwords_RetreiveNew'] = <<<_P
(Hent kun nye stopord)
_P;

$tsep_lng['stopwords_Occurrences'] = <<<_P
Forekomster
_P;

?>
