<?php

/* following will be filled automatically by SubVersion!

Do not change by hand!

$LastChangedDate: 2005-09-04 13:14:41 +0200 (So, 04 Sep 2005) $

@lastedited $LastChangedBy: olaf $

$LastChangedRevision: 312 $
*/
$tsep_lng['above_values'] = <<<_P
der obigen Werte
_P;

$tsep_lng['add'] = <<<_P
hinzufügen
_P;

$tsep_lng['all'] = <<<_P
alles
_P;

$tsep_lng['assigned_indexingprofiles'] = <<<_P
zugeordnete Indizierungsprofile
_P;

$tsep_lng['button_search'] = <<<_P
Suchen
_P;

$tsep_lng['click_here_to_open'] = <<<_P
Klicken Sie auf diesen Verweis um diese Seite zu öffnen
_P;

$tsep_lng['close_this_window'] = <<<_P
Dieses Fenster schließen
_P;

$tsep_lng['config_absPath'] = <<<_P
Definieren Sie den absoluten Pfad zu TSEP. Beispiel: Wenn die Datei search.php in /home/www/php/tsepsearch/search.php liegt, würde der Pfad wie folgt lauten: '/home/www/php/tsepsearch'
_P;

$tsep_lng['config_tmpPath'] = <<<_P
Definieren Sie den absoluten Pfad des TSEP temporär Verzeichnisses
_P;

$tsep_lng['config_check_file_exists'] = <<<_P
Vor Anzeige im Suchergebnis prüfen ob eine Datei tatsächlich existiert? Wenn eingeschalten, ist die Suche ein wenig langsamer, in den Ergebnissen werden jedoch nur Dateien gezeigt die tatsächlich existieren. Achtung, dies geht nur wenn allow_url_open in php.ini angeschaltet (enabled) ist! Vielleicht MUSS es bei Ihnen abgeschalten werden.
_P;

$tsep_lng['config_Color_1'] = <<<_P
Farbe der ersten Zeile einer langen Liste
_P;

$tsep_lng['config_Color_2'] = <<<_P
Farbe der zweiten Zeile einer langen Liste
_P;

$tsep_lng['config_Date_Style'] = <<<_P
Datumsformat (PHP Stil, es kann D, l, M & F verwendet werden). Ausgabe erfolgt in der für TSEP eingestellten Sprache. Beispiele: English: 'l, F d Y h:i a' Deutsch: 'l, d. F Y, G:i'
_P;

$tsep_lng['config_dir_exclude'] = <<<_P
Auszuschließende Verzeichnisse angeben:
_P;

$tsep_lng['config_dir_exclude_help'] = <<<_P
Dies ist der Pfad zu Verzeichnissen die von der Indizierung ausgeschlossen werden sollen, relativ zum Hauptverzeichnis. Beispiel: /folder1/folder3, wenn der Inhalt (Verzeichnisse und Dateien) von Verzeichnis http://www.yourdomain.com/folder1/folder3 ausgeschlossen werden soll. Mehrere Einträge durch ',' nicht ', ' trennen (kein Leerzeichen nach dem Komma)
_P;

$tsep_lng['config_Display_Boolean_Search'] = <<<_P
Beim Vergleich der MySQL Version (für Boolean Suche) kann eine Meldung dem Nutzer ausgegeben werden wenn die benutzte MySQL Version zu niedrig (<4) ist. Soll dies geschehen (wir empfehlen ja)
_P;

$tsep_lng['config_ext_include'] = <<<_P
Dateierweiterungen zu inkludierender Dateien
_P;

$tsep_lng['config_ext_include_help'] = <<<_P
Der Indexer indiziert nur jene Dateien ein, deren Dateierweiterung hier angegeben ist (Angabe mittels kommagetrennter Liste z.B.: HTM,HTML,PHP )
_P;

$tsep_lng['config_file_exclude'] = <<<_P
Auszuschließende Dateien angeben:
_P;

$tsep_lng['config_file_exclude_help'] = <<<_P
Dies ist der Pfad zu Dateien die von der Indizierung ausgeschlossen werden sollen, relativ zum Hauptverzeichnis. Beispiel: /folder1/folder4/login.php, wenn http://www.yourdomain.com/folder1/folder4/login.php ausgeschlossen werden soll. Mehrere Einträge durch ',' nicht ', ' trennen (kein Leerzeichen nach dem Komma).
_P;

$tsep_lng['config_skip_symblinks'] = <<<_P
Symbolische Verweise überspringen
_P;

$tsep_lng['config_skip_symblinks_help'] = <<<_P
Anwählen falls symbolische Verweise bei einer Indizierung mit Verzeichnissuche übersprungen werden sollen.
_P;

$tsep_lng['config_subdirs2index'] = <<<_P
Unterverzeichnisse die indiziert werden sollen (keine Eintragung bedeutet alle)
_P;

$tsep_lng['config_subdirs2index_help'] = <<<_P
Trennen Sie mehrere Unterverzeichnisse voneinander durch Komma und/oder Punkt. Jeder Wert wird an den Web-Verzeichnis-Pfad angehängt und verwendet um dort nach Dateien zu suchen.
_P;

$tsep_lng['config_fnExternalPhp'] = <<<_P
Voll qualifizierter .php-filename einer externen Datenlieferung:
_P;

$tsep_lng['config_fnExternalPhp_help'] = <<<_P
Dateiname eines .php-scripts ausserhalb von TSEP, das Dateien liefert, die zu indizieren sind (z.B. crawler/spider.php - Details siehe Dokumentation)
_P;

$tsep_lng['config_group_general'] = <<<_P
Generelle Einstellungen
_P;

$tsep_lng['config_group_lists'] = <<<_P
Listen
_P;

$tsep_lng['config_group_lists_colors'] = <<<_P
Farben
_P;

$tsep_lng['config_group_lists_limits'] = <<<_P
Limits
_P;

$tsep_lng['config_group_logging'] = <<<_P
Logging
_P;

$tsep_lng['config_group_visible2enduser'] = <<<_P
Benutzerinterface
_P;

$tsep_lng['config_group_visible2enduser_range'] = <<<_P
Limits
_P;

$tsep_lng['config_group_visible2enduser_results'] = <<<_P
Resultate
_P;

$tsep_lng['config_group_visible2enduser_searchsuggest'] = <<<_P
Suche vorschlagen
_P;

$tsep_lng['config_group_visible2enduser_search'] = <<<_P
Sucheinstellungen
_P;

$tsep_lng['config_Hour_Difference'] = <<<_P
Zeitdifferenz in Stunden zwischen Lokal- und Serverzeit.
_P;

$tsep_lng['config_how_many_hints'] = <<<_P
Wieviele Suchvorschläge sollen angezeigt werden (0=keine)?
_P;

$tsep_lng['config_show_nr_hits'] = <<<_P
Soll die Such-Vorschlag-Box die Anzahl der Treffer die diese Anfrage brachte anzeigen?
_P;

$tsep_lng['config_show_popular'] = <<<_P
Soll die Such-Vorschlag-Box die Beliebtheit einer Anfrage zeigen?
_P;

$tsep_lng['config_calc_hits_method'] = <<<_P
Welche Methode soll zur Berechnung der Anzahl der Trefferseiten verwendet werden?
_P;

$tsep_lng['config_calc_hits_method_help'] = <<<_P
Wenn eine Suche im Log erfasst wird:<br /> 1 = Verwende Ergebnisse der letzten Suche<br /> 2 = Berechne den Durchschnitt aller Suchanfragen<br /> 3 = Berechne das Minimum aller Suchanfragen<br /> 4 = Berechne das Maximum aller Suchanfragen
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit'] = <<<_P
Wieviele Zeichen nach dem ersten Treffer anzeigen?
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit_help'] = <<<_P
Das Suchergebnis wird nur ein Teil des indizierten Textes sein. Dieser Eintrag legt fest wieviele Zeichen <b>nach</b> dem ersten Treffer gezeigt werden.
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit'] = <<<_P
Wieviele Zeichen vor dem ersten Treffer anzeigen?
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit_help'] = <<<_P
Das Suchergebnis wird nur ein Teil des indizierten Textes sein. Dieser Eintrag legt fest wieviele Zeichen <b>vor</b> dem ersten Treffer gezeigt werden.
_P;

$tsep_lng['config_How_Many_Results'] = <<<_P
Wieviele Treffer sieht der Benutzer standardmäßig (immer wenn er es nicht selbst einstellen darf) bevor er eine Seitennavigation erhält?
_P;

$tsep_lng['config_How_Many_Sentences'] = <<<_P
Wieviele Trefferblöcke sollen angezeigt werden?
_P;

$tsep_lng['config_How_Many_Sentences_help'] = <<<_P
Als Suchergebnis wird nur ein Ausschnitt des inidzierten Textes angezeigt. Diese Angabe definiert, wieviele Trefferblöcke maximal angezeigt werden sollen.
_P;

$tsep_lng['config_internal_notes'] = <<<_P
Interne Notizen
_P;

$tsep_lng['config_internal_notes_help'] = <<<_P
Dieses Feld ist für interne Notizen gedacht und ist NUR für den Admin und NUR hier sichtbar!
_P;

$tsep_lng['config_Language'] = <<<_P
Welche Sprache soll TSEP benutzen?
_P;

$tsep_lng['config_listFilenamesOnly'] = <<<_P
nur würden-indiziert-werden-Dateiliste anzeigen
_P;

$tsep_lng['config_listFilenamesOnly_help'] = <<<_P
Der Indexer erzeugt keinen neuen index, sondern zeigt nur eine Dateiliste an, welche Dateien indiziert werden würden.<br>Ausserdem werden alle Verzeichinsse bzw. Dateien, die überlesen würden, gelistet.
_P;

$tsep_lng['config_Logging'] = <<<_P
Soll ein Logbuch geschrieben werden?
_P;

$tsep_lng['config_Logging_IP'] = <<<_P
IP Adresse im Lobuch speichern?
_P;

$tsep_lng['config_Logging_result_links'] = <<<_P
Klicks auf Suchergebnisse im Logbuch speichern?
_P;

$tsep_lng['config_Logging_search_term'] = <<<_P
Suchbegriffe im Logbuch speichern?
_P;

$tsep_lng['config_max_hints'] = <<<_P
Anzahl der markierten Treffer pro Satz 
_P;

$tsep_lng['config_max_hints_help'] = <<<_P
Diese Nummer gibt die Anzahl der der markierten Suchbegriffe an, die ein Satz maximal enthalten soll. 
_P;

$tsep_lng['config_max_length'] = <<<_P
Die maximale Länge eines Satzes (in Zeichen) 
_P;

$tsep_lng['config_max_length_help'] = <<<_P
Sätze mit mehr als der angegeben Anzahl an Zeichen werden nicht angezeigt. 
_P;

$tsep_lng['config_maxRows_completeindex'] = <<<_P
Wieviele Indexeinträge auf der 'Zeige gesamten Indexinhalt' Seite. Vorsicht - die 'Zeige gesamten Indexinhalt' Seite kann sehr groß werden!
_P;

$tsep_lng['config_maxRows_indexoverview'] = <<<_P
Wieviele Indexeinträge auf der 'Indexübersichts' Seite. Vorsicht - die 'Indexübersichts' Seite kann sehr groß werden!
_P;

$tsep_lng['config_maxRows_logview'] = <<<_P
Wieviele Logeinträge auf einer Seite?
_P;

$tsep_lng['config_maxRows_Stopwords'] = <<<_P
Wieviele Stoppworte auf einer Seite?
_P;

$tsep_lng['config_Numbers_Put'] = <<<_P
Rang der Seite anzeigen?
_P;

$tsep_lng['config_Numbers_Put_After'] = <<<_P
Falls die Rangnummer angezeit wird, wird dies nach der Nummer gezeigt
_P;

$tsep_lng['config_Numbers_Put_Before'] = <<<_P
Falls die Rangnummer angezeit wird, wird dies vor der Nummer gezeigt
_P;

$tsep_lng['config_Pagerank'] = <<<_P
Was ist das Rang Symbol? z.B. '*'. Sie können auch HTML eingeben wie <�img src= "graphics/tsepranks-single.png" alt= "*"�>. Achtung: Das eingegebene Symbol wird für jeden Treffer auf einer Seite 1x angezeigt!
_P;

$tsep_lng['config_Pagerank_Number'] = <<<_P
Soll die Rangnummer gezeigt werden?
_P;

$tsep_lng['config_parmsExternalPhp'] = <<<_P
Parameter zur Übergabe an das externen Datenlieferungs-Script:
_P;

$tsep_lng['config_parmsExternalPhp_help'] = <<<_P
Dieser Parameter wird für das externen Datenlieferungs-Script verfügbar gemacht (z.B. ein html-Dateiname, mit dem der crawler/spider seine Suche beginnen soll - Details siehe Dokumentation)
_P;

$tsep_lng['config_Path'] = <<<_P
In diesem Verzeichnis befindet sich TSEP.
_P;

$tsep_lng['config_print_list_of_files'] = <<<_P
Indizierte Dateien auflisten 
_P;

$tsep_lng['config_searchViaExt'] = <<<_P
Dateien via externes Datenlieferungs-Script finden
_P;

$tsep_lng['config_searchViaExt_help'] = <<<_P
Der Indexer führt das externes Datenlieferungs-Script durch, um zu indizierende Dateien zu erhalten - Details siehe Dokumentation
_P;

$tsep_lng['config_searchViaRead'] = <<<_P
Dateien via Verzeichnissuche finden
_P;

$tsep_lng['config_searchViaRead_help'] = <<<_P
Gibt dem Indexer bekannt, die Dateinamen, der zu indizierenden Dateien, via Verzeichnissuche finden; beginnend mit dem oben angegebenen Verzeichnis (classic TSEP-Suchmodus)
_P;

$tsep_lng['config_Show_Record_Change'] = <<<_P
Kann der Benutzer einstellen wieviele Treffer er auf einer Ergebnisseite sehen möchte? Kann 'true' oder 'false' sein.
_P;

$tsep_lng['config_word_offset'] = <<<_P
Anzahl der Wörter, die vor/nach jedem Treffer angezeigt werden 
_P;

$tsep_lng['config_word_offset_help'] = <<<_P
Als Suchergebnis wird nur ein Ausschnitt des inidizierten Textes angezeigt. Diese Angabe definiert, wieviele Wörter vor und nach jedem Treffer angezeigt werden sollen. 
_P;

$tsep_lng['config_Use_Debug_Print'] = <<<_P
Nur für Programmierer: debugprint() function benutzen?
_P;

$tsep_lng['config_XdirName'] = <<<_P
Indizier-Startverzeichnnis (optional, relativ zu indexer.php oder absolut):
_P;

$tsep_lng['config_XdirName_help'] = <<<_P
Das Angabe des Indizier-Startverzeichnnis ist <strong>nur in Spezialfällen nötig</strong> - normalerweise <strong>einfach leer lassen</strong>.<br>Unter Umständen müssen Sie hier etwas wie ../../ oder www/htdocs/youraccount/ eingeben.
_P;

$tsep_lng['config_Xwebdir'] = <<<_P
Web Verzeichnis Pfad angeben*:
_P;

$tsep_lng['config_Xwebdir_help'] = <<<_P
Dies ist das Web Verzeichnis auf das sich der oben angegebene Pfad bezieht. Beispiel: http://www.meinedomain.com/folder1/folder2. Sollen alle Dateien auf http://www.meinedomain.com indiziert werden, lautet der richtige Eintrag 'http://www.meinedomain.com'.
_P;

$tsep_lng['configuration'] = <<<_P
Konfiguration
_P;

$tsep_lng['copyright'] = <<<_P
Copyright
_P;

$tsep_lng['create_new_index'] = <<<_P
Neuen Index erstellen
_P;

$tsep_lng['data_retrieved'] = <<<_P
Daten aus der Datenbank empfangen in
_P;

$tsep_lng['day_friday'] = <<<_P
Freitag
_P;

$tsep_lng['day_friday_short'] = <<<_P
Fr
_P;

$tsep_lng['day_monday'] = <<<_P
Montag
_P;

$tsep_lng['day_monday_short'] = <<<_P
Mo
_P;

$tsep_lng['day_saturday'] = <<<_P
Samstag
_P;

$tsep_lng['day_saturday_short'] = <<<_P
Sa
_P;

$tsep_lng['day_sunday'] = <<<_P
Sonntag
_P;

$tsep_lng['day_sunday_short'] = <<<_P
So
_P;

$tsep_lng['day_thursday'] = <<<_P
Donnerstag
_P;

$tsep_lng['day_thursday_short'] = <<<_P
Do
_P;

$tsep_lng['day_tuesday'] = <<<_P
Dienstag
_P;

$tsep_lng['day_tuesday_short'] = <<<_P
Di
_P;

$tsep_lng['day_wednesday'] = <<<_P
Mittwoch
_P;

$tsep_lng['day_wednesday_short'] = <<<_P
Mi
_P;

$tsep_lng['delete'] = <<<_P
löschen
_P;

$tsep_lng['delete_file'] = <<<_P
Datei löschen
_P;

$tsep_lng['transform'] = <<<_P
Umwandeln
_P;

$tsep_lng['details'] = <<<_P
Details
_P;

$tsep_lng['directory'] = <<<_P
Verzeichnis
_P;

$tsep_lng['docorrectit'] = <<<_P
Bitte diesen Fehler UNBEDINGT VOR dem Weiterarbeiten korrigieren!
_P;

$tsep_lng['error_from_extscript'] = <<<_P
Fehler, gemeldet vom externen Script
_P;

$tsep_lng['filename'] = <<<_P
Dateiname
_P;

$tsep_lng['filter'] = <<<_P
Filter
_P;

$tsep_lng['forbidden_stopword'] = <<<_P
Achtung: In Ihren Suchbegriffen befinden sich folgende Stopp-Worte welche auf Wunsch des Administrators übergangen werden (genauere Informationen finden Sie in den "Such Tipps"):
_P;

$tsep_lng['found_no_pages'] = <<<_P
Keine Seiten gefunden.
_P;

$tsep_lng['group_level_gap'] = <<<_P
group-level-Definition: group-level darf nur 1 größer sein, als der group-level der vorhergehenden Gruppe
_P;

$tsep_lng['help'] = <<<_P
Hilfe
_P;

$tsep_lng['help_copyright'] = <<<_P
Öffnet die TSEP Seite bei Sourceforge.net in einem neuen Fenster
_P;

$tsep_lng['help_del_indexedpage'] = <<<_P
Sind Sie sicher dass Sie diese Seite aus dem Index entfernen wollen? (Entfernt alle Einträge über diese Seite aus dem Index!)
_P;

$tsep_lng['help_del_maxresult'] = <<<_P
Sind Sie sicher dass Sie diesen Wert entfernen wollen?
_P;

$tsep_lng['help_del_stopword'] = <<<_P
Sind Sie sicher dass Sie dieses Stopwort löschen wollen?
_P;

$tsep_lng['help_first_page'] = <<<_P
zur ersten Seite
_P;

$tsep_lng['help_last_page'] = <<<_P
zur letzten Seite
_P;

$tsep_lng['help_next_page'] = <<<_P
zur nächsten Seite
_P;

$tsep_lng['help_previous_page'] = <<<_P
zur vorherigen Seite
_P;

$tsep_lng['if_problems_contact'] = <<<_P
Wenn Sie dennoch Probleme beim suchen haben oder mit Ihren Suchergebnissen nicht glücklich sind, senden Sie uns bitte Ihre Probleme und Vorschläge zu.
_P;

$tsep_lng['impossible_already_exists'] = <<<_P
nicht moeglich: Name existiert bereits
_P;

$tsep_lng['index_edit_date'] = <<<_P
Letzte Index Bearbeitung:
_P;

$tsep_lng['index_edit_head'] = <<<_P
Bearbeiten der im Index gespeicherten Daten
_P;

$tsep_lng['index_edit_title'] = <<<_P
Index Bearbeitung (detailiert)
_P;

$tsep_lng['editindex_last_edited'] = <<<_P
Letztes Bearbeitungsdatum:
_P;

$tsep_lng['editindex_not_edited'] = <<<_P
Nicht bearbeitet
_P;

$tsep_lng['indexer_last_indexed'] = <<<_P
Letztes Indizierungsdatum:
_P;

$tsep_lng['editindex_not_indexed'] = <<<_P
Nicht indiziert
_P;

$tsep_lng['index_overview_click_title'] = <<<_P
Hier klicken um die Details der Seite zu bearbeiten.
_P;

$tsep_lng['index_overview_click_url'] = <<<_P
Hier klicken um die Seite im Browser anzuzeigen.
_P;

$tsep_lng['index_overview_head'] = <<<_P
Klicken Sie auf einen Seitentitel oder URL um die Details des Eintrages zu sehen
_P;

$tsep_lng['index_overview_help'] = <<<_P
Tipp: Benutzen Sie die Suchfunktion Ihres Browsers um einen Eintrag schnell zu finden
_P;

$tsep_lng['index_overview_title'] = <<<_P
Index Übersicht (kurz)
_P;

$tsep_lng['indexed_words'] = <<<_P
Kompletten derzeitigen Index zeigen (ggf. sehr viel!)
_P;

$tsep_lng['indexer_title'] = <<<_P
Indexer
_P;

$tsep_lng['indexing_in'] = <<<_P
Indizierung abgeschlossen in
_P;

$tsep_lng['indexing_on'] = <<<_P
Indiziert am
_P;

$tsep_lng['indexingprofile'] = <<<_P
Indizierungsprofil
_P;

$tsep_lng['indexingprofile_unknown'] = <<<_P
Indexingprofile existiert nicht: Profilname
_P;

$tsep_lng['info_from_extscript'] = <<<_P
Information(en), gemeldet vom externen Script
_P;

$tsep_lng['intErr'] = <<<_P
interner Fehler
_P;

$tsep_lng['intErr_wrongfieldtype'] = <<<_P
fehlerhafte field_type-Definition
_P;

$tsep_lng['is'] = <<<_P
ist
_P;

$tsep_lng['logview_contents'] = <<<_P
Eintrag
_P;

$tsep_lng['logview_head'] = <<<_P
Logeinträge die alle Filterkriterien erfüllen sind unten aufgeführt
_P;

$tsep_lng['logview_ip'] = <<<_P
IP
_P;

$tsep_lng['logview_no_IP'] = <<<_P
nicht aufgezeichnet
_P;

$tsep_lng['logview_time_of_entry'] = <<<_P
Datum / Zeit
_P;

$tsep_lng['logview_title'] = <<<_P
Suchbegriffe und Seitenzugriffe
_P;

$tsep_lng['logview_type'] = <<<_P
Typ
_P;

$tsep_lng['logview_type_1'] = <<<_P
Suchbegriff
_P;

$tsep_lng['logview_type_2'] = <<<_P
Ergebnisklick
_P;

$tsep_lng['logview_IPresolved'] = <<<_P
Aufgelöste IP
_P;

$tsep_lng['logview_Stopwords'] = <<<_P
Stopworte
_P;

$tsep_lng['mandatory'] = <<<_P
* dies ist ein Pflichtfeld, Sie müssen einen Wert eingeben!
_P;

$tsep_lng['match_case'] = <<<_P
Groß- / Kleinschreibung beachten
_P;

$tsep_lng['matches'] = <<<_P
Treffern.
_P;

$tsep_lng['month_april'] = <<<_P
April
_P;

$tsep_lng['month_april_short'] = <<<_P
Apr
_P;

$tsep_lng['month_august'] = <<<_P
August
_P;

$tsep_lng['month_august_short'] = <<<_P
Aug
_P;

$tsep_lng['month_december'] = <<<_P
Dezember
_P;

$tsep_lng['month_december_short'] = <<<_P
Dez
_P;

$tsep_lng['month_february'] = <<<_P
Februar
_P;

$tsep_lng['month_february_short'] = <<<_P
Feb
_P;

$tsep_lng['month_january'] = <<<_P
Januar
_P;

$tsep_lng['month_january_short'] = <<<_P
Jan
_P;

$tsep_lng['month_july'] = <<<_P
Juli
_P;

$tsep_lng['month_july_short'] = <<<_P
Jul
_P;

$tsep_lng['month_june'] = <<<_P
Juni
_P;

$tsep_lng['month_june_short'] = <<<_P
Jun
_P;

$tsep_lng['month_march'] = <<<_P
März
_P;

$tsep_lng['month_march_short'] = <<<_P
Mär
_P;

$tsep_lng['month_may'] = <<<_P
Mai
_P;

$tsep_lng['month_may_short'] = <<<_P
Mai
_P;

$tsep_lng['month_november'] = <<<_P
November
_P;

$tsep_lng['month_november_short'] = <<<_P
Nov
_P;

$tsep_lng['month_october'] = <<<_P
Oktober
_P;

$tsep_lng['month_october_short'] = <<<_P
Okt
_P;

$tsep_lng['month_september'] = <<<_P
September
_P;

$tsep_lng['month_september_short'] = <<<_P
Sep
_P;

$tsep_lng['more_than_four'] = <<<_P
Bitte einen Suchbegriff eingeben der vier oder mehr Zeichen lang ist
_P;

$tsep_lng['mysql_boolean_warning'] = <<<_P
Achtung: Auf Grund einer alten Datenbankversion konnte keine Boolsche Suche durchgeführt werden. Alle Worte die Sie im Suchfeld angeben müssen im Dokument vorhanden sein damit es gefunden wird. Such-Operatoren werden nicht berücksichtigt
_P;

$tsep_lng['name_already_exists'] = <<<_P
Name existiert bereits
_P;

$tsep_lng['name_is_empty'] = <<<_P
Name ist leer!
_P;

$tsep_lng['navigate_one_page_back'] = <<<_P
zurück zur vorherigen Seite
_P;

$tsep_lng['new_index_head'] = <<<_P
Ein neuer Index wurde erstellt!<br />Unten findet sich die Liste der indizierten Dateien
_P;

$tsep_lng['new_index_head_searching'] = <<<_P
Ein neuer Index wird erstellt...<br />Bitte um Geduld...
_P;

$tsep_lng['new_window'] = <<<_P
(neues Fenster)
_P;

$tsep_lng['no_records'] = <<<_P
Keine Datensätze
_P;

$tsep_lng['none'] = <<<_P
keine
_P;

$tsep_lng['nothing'] = <<<_P
nichts
_P;

$tsep_lng['of'] = <<<_P
von
_P;

$tsep_lng['old_index_head'] = <<<_P
Unten befindet sich eine Liste der (alten), derzeit indizierten Dateien
_P;

$tsep_lng['only'] = <<<_P
Nur
_P;

$tsep_lng['only_one_value'] = <<<_P
nur ein Wert!
_P;

$tsep_lng['only_one_word'] = <<<_P
nur ein Wort!
_P;

$tsep_lng['page_file_size'] = <<<_P
Seitengröße:
_P;

$tsep_lng['page_indexed_metawords'] = <<<_P
Indizierte Metatag-Wörter:
_P;

$tsep_lng['page_indexed_words'] = <<<_P
Indizierte Wörter:
_P;

$tsep_lng['page_nr_indexed_words'] = <<<_P
Worte: 
_P;

$tsep_lng['page_number'] = <<<_P
Seitennr.:
_P;

$tsep_lng['page_rank'] = <<<_P
x gefunden
_P;

$tsep_lng['page_rank_help'] = <<<_P
So oft wurden Ihre Suchbegriffe auf diese Seite gefunden
_P;

$tsep_lng['page_rank_real'] = <<<_P
Rang dieser Seite (an Hand der Funde im Dokument)
_P;

$tsep_lng['page_title'] = <<<_P
Seitentitel:
_P;

$tsep_lng['page_url'] = <<<_P
Seiten URL:
_P;

$tsep_lng['pages_found'] = <<<_P
Seiten wurden gefunden.
_P;

$tsep_lng['pages_indexed'] = <<<_P
Seiten wurden indiziert
_P;

$tsep_lng['pages_not_to_be_indexed'] = <<<_P
Seiten würden NICHT indiziert werden
_P;

$tsep_lng['pages_to_be_indexed'] = <<<_P
Seiten würden indiziert werden
_P;

$tsep_lng['powered_by'] = <<<_P
powered by
_P;

$tsep_lng['protect_indexentry'] = <<<_P
Indexeintrag (vor Neuindizierung oder Löschung durch den Indexer) schützen:
_P;

$tsep_lng['protected_indexentry'] = <<<_P
Indexeintrag geschützt
_P;

$tsep_lng['really_delete'] = <<<_P
Wirklich loeschen?
_P;

$tsep_lng['records'] = <<<_P
Datensätze
_P;

$tsep_lng['rename'] = <<<_P
Umbenennen
_P;

$tsep_lng['results'] = <<<_P
Ergebnisse
_P;

$tsep_lng['results_to_show_user'] = <<<_P
Der Benutzer kann aus den folgenden Werten die Anzahl der Ergebnisse die er auf einer Seite sehen möchte auswählen:
_P;

$tsep_lng['save'] = <<<_P
Speichern
_P;

$tsep_lng['saveas'] = <<<_P
Speichern unter
_P;

$tsep_lng['search_tips'] = <<<_P
Such Tipps
_P;

$tsep_lng['search_tips_desc'] = <<<_P
TSEP sucht standardmäßig alle eingegebenen Worte und zeigt die Seite(n) welche diese Worte enthalten. Jedes Wort muss aus mindestens 4 Buchstaben bestehen damit die Suche durchgeführt wird. Es folgt eine Liste mit Beispielen für eine Boolean Suche mit TSEP.
_P;

$tsep_lng['search_tips_ex1'] = <<<_P
findet Seiten die mindstens eines (apfel ODER birne) der Worte enthalten
_P;

$tsep_lng['search_tips_ex2'] = <<<_P
findet Seiten die beide Worte (apfel UND birne) enthalten
_P;

$tsep_lng['search_tips_ex3'] = <<<_P
findet Seiten die "apfel" enthalten und wertet diese höher wenn sie zusätzlich "kuchen" enthalten.
_P;

$tsep_lng['search_tips_ex4'] = <<<_P
findet Seiten die "apfel" UND NICHT "kuchen" enthalten.
_P;

$tsep_lng['search_tips_ex5'] = <<<_P
apfel" UND "kuchen", oder "apfel" UND "strudel" (in jeder Anordnung), aber wertet "apfel kuchen" höher als "apfel strudel".
_P;

$tsep_lng['search_tips_ex6'] = <<<_P
"apfel", "apfelkompott", "apfelmarmelade" usw. Das * steht für 0 oder mehr Zeichen und darf nur am Ende eines Wortes stehen!
_P;

$tsep_lng['search_tips_ex7'] = <<<_P
findet Seiten die die exakte Wortfolge "irgendwelche Worte" enthalten (zum Beispiel Seiten die "irgendwelche Worte der Weisheit" enthalten, aber nicht "irgendwelche lauten Worte").
_P;

$tsep_lng['search_tips_head'] = <<<_P
Tipps um mit TSEP effektiv zu suchen
_P;

$tsep_lng['search_tips_help'] = <<<_P
öffnet eine Hilfe in einem neuen Fenster
_P;

$tsep_lng['search_tips_se1'] = <<<_P
apfel birne
_P;

$tsep_lng['search_tips_se2'] = <<<_P
+apfel +birne
_P;

$tsep_lng['search_tips_se3'] = <<<_P
+apfel kuchen
_P;

$tsep_lng['search_tips_se4'] = <<<_P
+apfel -kuchen
_P;

$tsep_lng['search_tips_se5'] = <<<_P
+apfel +(>kuchen <strudel)
_P;

$tsep_lng['search_tips_se6'] = <<<_P
apfel*
_P;

$tsep_lng['search_tips_se7'] = <<<_P
"irgendwelche Worte"
_P;

$tsep_lng['search_tips_title'] = <<<_P
Such Tipps
_P;

$tsep_lng['search_took'] = <<<_P
Die Suche benötigte
_P;

$tsep_lng['search_what_are_stopwords'] = <<<_P
Ein Wort das zu den definierten Stopwörtern gehört kann nicht gesucht werden und wird in den Ergebnissen nicht markiert. Weiterhin kann sein dass im Datenbankserver selbst Stoppworte festgelegt sind. Stopwörter die der Administrator festgelegt hat:
_P;

$tsep_lng['searched_site_for'] = <<<_P
Es wurde gesucht nach
_P;

$tsep_lng['seconds'] = <<<_P
Sekunden
_P;

$tsep_lng['separate_values_by_comma'] = <<<_P
mehrere Werte durch Komma trennen
_P;

$tsep_lng['show_it'] = <<<_P
anzeigen
_P;

$tsep_lng['show_results_per_page'] = <<<_P
Resultate werden pro Seite angezeigt. Jede Änderung lädt die Seite mit entsprechendem Wert neu.
_P;

$tsep_lng['show_x_results_per_page'] = <<<_P
 / Seite
_P;

$tsep_lng['sim_index_head'] = <<<_P
Zu indizierende Dateien.<br />Unten findet sich die Liste der Dateien, die indiziert werden würden
_P;

$tsep_lng['sim_index_head_searching'] = <<<_P
Zu indizierende Dateien werden gesucht...<br />Bitte um Geduld...
_P;

$tsep_lng['skip_cause_protected_indexentry'] = <<<_P
Seiten werden nicht neu indiziert (da geschützte, zugehörige Indexeinträge existieren)
_P;

$tsep_lng['sort_asc'] = <<<_P
sortiert A->Z, äteste->neuste
_P;

$tsep_lng['sort_desc'] = <<<_P
sortiert Z->A, neuste->älteste
_P;

$tsep_lng['start_indexing'] = <<<_P
Beginne Indizierung**
_P;

$tsep_lng['stopwords'] = <<<_P
Stopworte
_P;

$tsep_lng['stopwords_title'] = <<<_P
Stopworte
_P;

$tsep_lng['to'] = <<<_P
bis
_P;

$tsep_lng['tsep'] = <<<_P
TSEP - The Search Engine Project
_P;

$tsep_lng['type'] = <<<_P
Typ
_P;

$tsep_lng['update'] = <<<_P
ändern
_P;

$tsep_lng['value_already_exists'] = <<<_P
Wert existiert bereits
_P;

$tsep_lng['value_for'] = <<<_P
Wert für
_P;

$tsep_lng['version'] = <<<_P
Dies ist Version
_P;

$tsep_lng['warning'] = <<<_P
** Bitte drücken Sie den "Start Indexing"; Button nur einmal, schließen Sie während des Ablaufes nicht Ihr Browserfenster. Weiterhin sollen Sie diesen Indexer nicht mehrmals gleichzeitig laufen lassen. Sollten Sie mit der Tabelle die durch den Indexer verwendet wird durch MySQL Frontend Tools wie phpMyadmin, MySQL Front etc. verbunden sein, trennen Sie bitte die Verbindung da diese Prozesse den Index Prozess stark verlangsamen.
_P;

$tsep_lng['your_stopwords_head'] = <<<_P
Festgelegte Stopworte <br />(können nicht gesucht werden und werden nicht markiert)
_P;

$tsep_lng['config_force_http_fileparse'] = <<<_P
Einlesen via HTTP erzwingen 
_P;

$tsep_lng['config_force_http_fileparse_help'] = <<<_P
"Einlesen via HTTP erzwingen" hat (mindestens) zwei Vorteile: SSI-Inhalte werden aufgelöst und "mitindiziert" und URLs außerhalb des lokalen Filesystems können ebenfalls indiziert werden. Der Nachteil ist, dass sich die Inidizierung extrem verlangsamen kann.

_P;

$tsep_lng['error_while_parsing'] = <<<_P
Fehler beim Lesen oder bei der Analyse
_P;

$tsep_lng['delete_indexingprofiles_info'] = <<<_P
***ACHTUNG***: Alle zugehörigen Indizes werden ebenfalls gelöscht, so sie nicht auch einem anderen Indizierungsprofil 
zugeordnet sind.
_P;

$tsep_lng['config_group_indexer_paths'] = <<<_P
Pfade
_P;

$tsep_lng['config_group_indexer_include_and_exclude'] = <<<_P
Einschließen und Ausschließen
_P;

$tsep_lng['config_group_indexer_external_datasupply'] = <<<_P
Externe Datenlieferung
_P;

$tsep_lng['config_group_indexer_indexing_mode'] = <<<_P
Indizier-Modus
_P;

$tsep_lng['config_group_indexer_indexing_modifiers'] = <<<_P
Indizier-Anpassungen
_P;

$tsep_lng['config_group_indexer_miscellaneous'] = <<<_P
Sonstiges
_P;

$tsep_lng['filter_filterbutton'] = <<<_P
Filter anwenden
_P;

$tsep_lng['filter_filterbutton_Remove_Filter'] = <<<_P
Filter entfernen
_P;

$tsep_lng['filter_logviewtype_all'] = <<<_P
Alle(s)
_P;

$tsep_lng['filter_from'] = <<<_P
Von: 
_P;

$tsep_lng['filter_to'] = <<<_P
Bis: 
_P;

$tsep_lng['filter_date_format'] = <<<_P
JJJJ-[M]M-[T]T
_P;

$tsep_lng['filter_time_format'] = <<<_P
HH:MM:SS
_P;

$tsep_lng['logviewstats_title'] = <<<_P
Suchbegriffe und Seitenzugriffe: Statistiken
_P;

$tsep_lng['logviewstats_head'] = <<<_P
Log Statistiken
_P;

$tsep_lng['logviewstats_groupTotals'] = <<<_P
Gesamt
_P;

$tsep_lng['logviewstats_groupDetails'] = <<<_P
Details
_P;

$tsep_lng['logviewstats_groupTopX'] = <<<_P
Top 
_P;

$tsep_lng['logviewstats_groupTopAll'] = <<<_P
Alle Einträge
_P;

$tsep_lng['logviewstats_DomainUnresolved'] = <<<_P
Nicht aufgelöst
_P;

$tsep_lng['logviewstats_nrRecords'] = <<<_P
Log Einträge
_P;

$tsep_lng['logviewstats_nrSetupEntries'] = <<<_P
Installationen und Updates
_P;

$tsep_lng['logviewstats_nrSearchQueries'] = <<<_P
Suchbegriffe
_P;

$tsep_lng['logviewstats_nrClicks'] = <<<_P
Geöffnete Seiten
_P;

$tsep_lng['logviewstats_nrDomains'] = <<<_P
Eindeutige Domains
_P;

$tsep_lng['logviewstats_nrIPs'] = <<<_P
Eindeutige IP Adressen
_P;

$tsep_lng['logviewstats_nrSearchwords'] = <<<_P
Eindeutige Suchbegriffe
_P;

$tsep_lng['logviewstats_nrStopwords'] = <<<_P
Eindeutige Stopworte
_P;

$tsep_lng['logviewstats_topSearchqueries'] = <<<_P
Suchbegriffe
_P;

$tsep_lng['logviewstats_topClicks'] = <<<_P
Geöffnete Seiten
_P;

$tsep_lng['logviewstats_topSearchwords'] = <<<_P
Eindeutige Suchbegriffe
_P;

$tsep_lng['logviewstats_topStopwords'] = <<<_P
Eindeutige Stopworte
_P;

$tsep_lng['logviewstats_topIPs'] = <<<_P
Eindeutige IP Adressen
_P;

$tsep_lng['logviewstats_topDomains'] = <<<_P
Eindeutige Domains
_P;

$tsep_lng['logviewstats_DrillDown'] = <<<_P
Hier klicken um alle Statistiken dieser Unterkategorie zu sehen
_P;

$tsep_lng['error_indexer_is_running'] = <<<_P
Der Indexer läuft bereits:<br />%s
_P;

$tsep_lng['warning_php_safe_mode_on'] = <<<_P
<b>Warnung: PHP safe_mode ist an</b><br /> Die maximale Zeit zur Ausführung eines Scripts die Sie im Konfigurationsteil angegeben haben kann nicht auf diesem System angewendet werden.<br /> Die maximale Laufzeit für ein PHP Script wurde vom Administrator auf %d Minuten eingestellt.
_P;

$tsep_lng['page_additional_info'] = <<<_P
Zusätzliche Informationen: 
_P;

$tsep_lng['ss_search_term'] = <<<_P
Suchbegriff
_P;

$tsep_lng['ss_search_term_hover'] = <<<_P
Bisherige Suchbegriffe
_P;

$tsep_lng['ss_popular'] = <<<_P
Pop
_P;

$tsep_lng['ss_popular_hover'] = <<<_P
Anzahl wie oft diese Suche durchgeführt wurde (Popularität)
_P;

$tsep_lng['ss_returned_pages'] = <<<_P
GT
_P;

$tsep_lng['ss_returned_pages_hover'] = <<<_P
Gezeigte Treffer - Die Anzahl der Seiten die die Suche lieferte
_P;

$tsep_lng['error_index_nothing'] = <<<_P
Leer (z.B. nichts zu indizieren): �
_P;

$tsep_lng['error_empty_files'] = <<<_P
leere Dateien (z.B. nichts zu indizieren)
_P;

$tsep_lng['display_ranking'] = <<<_P
Ränge mit Bildern zeigen
_P;

$tsep_lng['ranking_alt'] = <<<_P
Geben Sie einen alternativ Text für das Bild ein
_P;

$tsep_lng['ranking_comments'] = <<<_P
Kommentar (nur intern)
_P;

$tsep_lng['ranking_image_text'] = <<<_P
Bitte setzen Sie ein Bilddatei
_P;

$tsep_lng['ranking_submit'] = <<<_P
Bild setzen
_P;

$tsep_lng['ranking_delete'] = <<<_P
Bild löschen
_P;

$tsep_lng['ranking_modify'] = <<<_P
Bild modifizieren
_P;

$tsep_lng['help_del_ranking'] = <<<_P
Sind Sie sicher, dass Sie das Bild löschen wollen?
_P;

$tsep_lng['alert_mod_ranking'] = <<<_P
Sie können den Prozentwert nicht verändern
_P;

$tsep_lng['help_mod_ranking'] = <<<_P
Sind Sie sicher, dass Sie das Bild aktualisieren wollen?
_P;

$tsep_lng['ranking_range'] = <<<_P
Stufe in Prozent setzen die dargestellt werden soll
_P;

$tsep_lng['ranking_image'] = <<<_P
Bild
_P;

$tsep_lng['ranking_url'] = <<<_P
Anzeige (z.B. URL)
_P;

$tsep_lng['ranking_com'] = <<<_P
Kommentar
_P;

$tsep_lng['ranking_alt_attrib'] = <<<_P
HTML ALT-Attribute
_P;

$tsep_lng['ranking_percent'] = <<<_P
Stufe in Prozent
_P;

$tsep_lng['setup_Rollback_completed'] = <<<_P
Wiederherstellung beendet
_P;

$tsep_lng['setup_Unknown'] = <<<_P
Unbekannt
_P;

$tsep_lng['setup_Setup'] = <<<_P
Setup
_P;

$tsep_lng['setup_step1'] = <<<_P
1. Einführung
_P;

$tsep_lng['setup_step2'] = <<<_P
2. Datenbankeinstellungen
_P;

$tsep_lng['setup_step3'] = <<<_P
3. System Prüfung
_P;

$tsep_lng['setup_step4'] = <<<_P
4. Konfiguration
_P;

$tsep_lng['setup_step5'] = <<<_P
5. Installation
_P;

$tsep_lng['setup_step6'] = <<<_P
6. Zusammenfassung
_P;

$tsep_lng['setup_step7'] = <<<_P
7. Feedback
_P;

$tsep_lng['setup_CancelButtonPressed'] = <<<_P
Sie haben den Abbrechen Knopf gedrückt und damit gezeigt, dass Sie die Installation von <span class="tsep">TSEP</span> beenden wollen.<br /><br />Warum bloß? Ist Ihnen nicht bewusst was Sie verpassen? <span class="tsep">TSEP</span>, ohne zweifel die beste Suchmaschine im ganzen Netz!!<br /><br />OK... wie Sie wollen. Seien Sie sich jedoch folgendem bewusst:<br / ><br />Wenn Sie nun auf den Beenden Knopf drücken, wird die <span class="tsep">TSEP</span> Installation abgebrochen und Sie zur <span class="tsep">TSEP</span> Webseite weitergeleitet. Keine vorgenommenen Änderungen werden rückgängig gemacht!
_P;

$tsep_lng['setup_IwantToQuit'] = <<<_P
Ich habe mich entschieden: Ich möchte die Installation beenden!
_P;

$tsep_lng['setup_Quit'] = <<<_P
Ende
_P;

$tsep_lng['setup_ContinueSetup'] = <<<_P
Setup fortsetzen
_P;

$tsep_lng['setup_IwantToContinue'] = <<<_P
Entschuldigung, ich habe mich geirrt. Ich möchte jetzt fortsetzen ...
_P;

$tsep_lng['setup_ToPreviousStep'] = <<<_P
Zum vorherigen Schritt ...
_P;

$tsep_lng['setup_Previous'] = <<<_P
Zurück
_P;

$tsep_lng['setup_Next'] = <<<_P
Weiter
_P;

$tsep_lng['setup_ToNextStep'] = <<<_P
Zum nächsten Schritt ...
_P;

$tsep_lng['setup_IWantToQuitInstalling'] = <<<_P
Ich möchte die TSEP Installation beenden
_P;

$tsep_lng['setup_Cancel'] = <<<_P
Abbrechen
_P;

$tsep_lng['select_language'] = <<<_P
Wählen Sie Ihre bevorzugte TSEP-Sprache
_P;

$tsep_lng['setup_ThanksForConsidering'] = <<<_P
Vielen Dank dass Sie die Nutzung von <span class="tsep">TSEP</span> erwägen.<br /><br />Sie sind dabei <span class="tsep">TSEP</span> zu installieren. Dieses Installationsprogramm wird Sie durch die erstmalige Installation oder das Upgrade von <span class="tsep">TSEP</span> führen. Auf der linken Seite sehen Sie die Schritte die zur Installation notwendig sind, hier können Sie auch den Schritt erkennen in dem Sie sich zu einem beliebigen Zeitpunkt befinden.<br /><br />Wir haben uns bemüht gute Standardwerte für die Installation zu finden. Falls dies das erste Mal ist, dass Sie <span class="tsep">TSEP</span> installieren, schlagen wir Ihnen vor direkt diese Standardwerte zu verwenden. Wenn Sie <span class="tsep">TSEP</span> besser kennengelernt haben, können Sie Änderung vornehmen. Falls Sie von einer älteren <span class="tsep">TSEP</span> auf eine neue upgraden, ermittelt das Installationsprogramm ihre alten Einstellungen bzw. Werte. Diese können Sie von der alten in die neue Installation übernehmen oder stattdessen Standardwerte benutzen.<br /><br />Wir hoffen dass sich <span class="tsep">TSEP</span> als brauchbares Werkzeug für Ihre Webseite herausstellen wird.<br />Falls Sie Fragen oder Kommentare haben so nehmen Sie bitte über unser <a href="http://sourceforge.net/projects/tsep/" target="blank">Forum</a> Kontakt zu uns auf.<br /><br />Das <span class="tsep">TSEP</span> Team<br />
_P;

$tsep_lng['setup_DB_1'] = <<<_P
Bitte geben Sie die Daten ein die <span class="tsep">TSEP</span> benötigt um auf die Datenbank und die Skripte zuzugreifen.
_P;

$tsep_lng['setup_DB_2_Host'] = <<<_P
Datenbank Host:
_P;

$tsep_lng['setup_DB_2_Host_Help'] = <<<_P
Geben Sie die URL zum MySQL Server an. In den meisten Fällen wird dies \'localhost\' sein.<br /><br />Falls Sie sich nicht sicher sind, nehmen Sie die Vorgabeeinstellung.
_P;

$tsep_lng['setup_DB_3_Username'] = <<<_P
Datenbank Benutzername:
_P;

$tsep_lng['setup_DB_3_Username_Help'] = <<<_P
Der Benutzername mit dem Sie sich bei MySQL anmelden
_P;

$tsep_lng['setup_DB_4_Passwd'] = <<<_P
Datenbank Passwort:
_P;

$tsep_lng['setup_DB_4_Passwd_Help'] = <<<_P
Das Passwort das zum Benutzernamen gehört.
_P;

$tsep_lng['setup_DB_5_DBName'] = <<<_P
Datenbank Name:
_P;

$tsep_lng['setup_DB_5_DBName_Help'] = <<<_P
Wie soll die Datenbank heißen die für TSEP erstellt wird?
_P;

$tsep_lng['setup_DB_6_ForceCreation'] = <<<_P
Datenbank erstellung erzwingen:
_P;

$tsep_lng['setup_DB_6_ForceCreation_Help'] = <<<_P
Wenn Ja wird Setup versuchen die Datenbank für Sie zu erstellen.<br /><br />Falls die Datenbank schon existiert, wird Setup dies überspringen und mit der nächsten Aktion fortfahren.
_P;

$tsep_lng['setup_Yes'] = <<<_P
Ja
_P;

$tsep_lng['setup_No'] = <<<_P
Nein
_P;

$tsep_lng['setup_DB_7_Prefix'] = <<<_P
Tabellen Präfix:
_P;

$tsep_lng['setup_DB_7_Prefix_Help'] = <<<_P
Falls Sie bei Ihrem Webhoster nur eine Datenbank zur Verfügung haben, stellen Sie sicher, dass die Namen der Tabellen einmalig sind. Dies können Sie durch das hier einzugebende Tabellen-Präfix tun.<br /><br />Falls Sie sich unsicher sind, benutzen Sie den Vorgabewert.
_P;

$tsep_lng['setup_DB_8_TSEP_Root'] = <<<_P
<span class="tsep">TSEP</span> Root Verzeichnis:
_P;

$tsep_lng['setup_DB_8_TSEP_Root_Help'] = <<<_P
TSEP Haupt-Verzeichnis, relativ zu Ihrem Document-Root Verzeichnis.<br /><br />Der Vorschlag stimmt wahrscheinlich. Falls Sie sich nicht sicher sind, nehmen Sie den Vorgabewert.
_P;

$tsep_lng['setup_DB_9_TSEP_AbsPath'] = <<<_P
Absoluter Pfad des <span class="tsep">TSEP</span> Root Verzeichnises:
_P;

$tsep_lng['setup_DB_9_TSEP_AbsPath_Help'] = <<<_P
Der Absolute Pfad zum TSEP (Haupt-)Verzeichnis.<br /><br />Falls Sie sich nicht sicher sind, nehmen Sie den Vorgabewert.
_P;

$tsep_lng['setup_DB_10_TSEP_TmpPath'] = <<<_P
Absoluter Pfad zum<br /><span class="tsep">TSEP</span> temporär Verzeichnis
_P;

$tsep_lng['setup_DB_10_TSEP_TmpPath_Help'] = <<<_P
Der absolute Pfad zum TSEP temporär Verzeichnis.<br /><br />Muss beschreibbar sein.
_P;

$tsep_lng['setup_UnknownDBHost'] = <<<_P
Sie haben einen unbekannten Datenbank Host angegeben.<br />Bitte wiederholen Sie die Eingabe und klicken Sie erneut auf weiter.
_P;

$tsep_lng['setup_NoDBAccess'] = <<<_P
Zugriff auf die Datenbank fehlgeschlagen.<br />Dies könnte bedeuten, dass Benutzername und/oder Passwort falsch sind.
_P;

$tsep_lng['setup_ConnectionDenied'] = <<<_P
Ein unbekannter Fehler ist bei der Verbindung mit MySQL aufgetreten.<br />Sind Sie ganz sicher, dass MySQL korrekt installiert ist?<br />Sind Ihre Angaben richtig?
_P;

$tsep_lng['setup_DBNotExists'] = <<<_P
Die angegebene Datenbank existiert nicht<br />und kann daher nicht erstellt werden.
_P;

$tsep_lng['setup_DBNameWrong'] = <<<_P
Der angegebene Datenbankname ist falsch<br />(Datenbank existiert nicht).
_P;

$tsep_lng['setup_DBUnknownError'] = <<<_P
Ein unbekannter Fehler ist bei der Verbindung mit der Datenbank aufgetreten.<br />Sind Sie ganz sicher, dass MySQL korrekt installiert ist?<br />Sind Ihre Angaben richtig?
_P;

$tsep_lng['setup_TSEPRootWrong'] = <<<_P
Das TSEP Root Verzeichnis ist falsch.
_P;

$tsep_lng['setup_TSEPAbsPathWrong'] = <<<_P
Der absolute Pfad zum TSEP (Haupt-)Verzeichnis ist falsch.
_P;

$tsep_lng['setup_TSEPTmpPathWrong'] = <<<_P
Der absolute Pfad zum TSEP temporär Verzeichnis existiert nicht (bzw. mkdir() war nicht möglich)
_P;

$tsep_lng['setup_TSEPTmpPathNotWritable'] = <<<_P
Der absolute Pfad zum TSEP temporär Verzeichnis: Es ist nicht möglich in das Verzeichnis zu schreiben.
_P;

$tsep_lng['setup_HTAccessNotFound'] = <<<_P
.htaccess nicht gefunden
_P;

$tsep_lng['setup_OK'] = <<<_P
ok
_P;

$tsep_lng['setup_NoProtectionFound'] = <<<_P
Keine Schutz-Anweisung gefunden
_P;

$tsep_lng['setup_Global_1'] = <<<_P
<b>Wichtig:</b> Dieser Schritt ist nur notwendig wenn Setup nicht die Datenbank Zugangsdaten in die Datei /include/global.pgp schreiben kann.<br />
_P;

$tsep_lng['setup_Global_2'] = <<<_P
Bitte folgen Sie diesen Schritten um die Datei global.php richtig anzupassen.<br />
_P;

$tsep_lng['setup_Global_3'] = <<<_P
Kopieren Sie die Daten aus dem folgenden Rahmen.
_P;

$tsep_lng['setup_Global_3s1'] = <<<_P
Öffnen Sie die Datei "/include/global.php" auf Ihrer Festplatte.
_P;

$tsep_lng['setup_Global_3s21'] = <<<_P
Ersetzen Sie den Code zwischen den Platzhaltern
_P;

$tsep_lng['setup_and'] = <<<_P
und
_P;

$tsep_lng['setup_Global_3s22'] = <<<_P
, stellen Sie sicher, dass Sie nicht die Platzhalter selbst, sondern nur den Code zwischen ihnen ersetzen.
_P;

$tsep_lng['setup_Global_3s3'] = <<<_P
Speichern Sie die Datei.
_P;

$tsep_lng['setup_Global_3s4'] = <<<_P
Laden Sie die Datei in das /include Verzeichnis Ihrer <span class="tsep">TSEP</span> Installation und überschreiben Sie die alte.
_P;

$tsep_lng['setup_Global_3s5'] = <<<_P
Drücken Sie den "Weiter" Knopf unten auf dieser Seite.
_P;

$tsep_lng['setup_Global_4'] = <<<_P
Wenn alles geklappt hat, können Sie mit Setup und der Installation von <span class="tsep">TSEP</span> fortfahren.<br />
_P;

$tsep_lng['setup_patch_manually'] = <<<_P
per Hand ändern
_P;

$tsep_lng['setup_patch_manually_help'] = <<<_P
Fall Setup die Verbindungsdaten nicht speichern kann, klicken Sie bitte hier um eine Anleitung für die notwendigen Schritte zu erhalten.
_P;

$tsep_lng['setup_warning'] = <<<_P
Warnung
_P;

$tsep_lng['setup_SysChk_1'] = <<<_P
Die Systemprüfung brachte folgende Informationen. Bitte prüfen Sie und korrigieren Sie diese falls nötig.<br />
_P;

$tsep_lng['setup_MySQL_version'] = <<<_P
MySQL Version:
_P;

$tsep_lng['setup_MySQL_version_Help'] = <<<_P
Die MySQL Version die Sie benutzen muss 3.23 oder höher sein um TSEPs erweiterte Funktionen zu nutzen.<br /><br />Wenn Sie TSEP voll nutzen wollen, verwenden Sie Version 4.1 oder höher.<br /><br />Wir können eine Funktion mit älteren Versionen nicht garantieren.
_P;

$tsep_lng['setup_PHP_version'] = <<<_P
PHP Version:
_P;

$tsep_lng['setup_PHP_version_Help'] = <<<_P
TSEP wurde mit PHP Version 4.2 und höher getestet.<br /><br />Wir können eine Funktion mit älteren Versionen nicht garantieren.
_P;

$tsep_lng['setup_TSEP_oldver'] = <<<_P
Alte <span class="tsep">TSEP</span> Version:
_P;

$tsep_lng['setup_TSEP_oldver_Help'] = <<<_P
Nur einige Informationen.<br /><br />Zeigt die Version von TSEP von der Sie upgraden (falls vorhanden).
_P;

$tsep_lng['setup_TSEP_newver'] = <<<_P
Neue <span class="tsep">TSEP</span> Version:
_P;

$tsep_lng['setup_TSEP_newver_Help'] = <<<_P
Nur einige Informationen.<br /><br />Zeigt die Version von TSEP die Sie derzeit installieren.
_P;

$tsep_lng['setup_DB_Config_File'] = <<<_P
Datenbank-Konfigurations Datei:
_P;

$tsep_lng['setup_DB_Config_File_Help_1'] = <<<_P
Die Datei die die Verbindungsdaten enthält sollte durch das Setup beschreibbar sein.
_P;

$tsep_lng['setup_DB_Config_File_Help_2'] = <<<_P
Bitte verwenden Sie chmode um der Datei \'include/global.php\' die Einstellung \'666\' zu geben.<br /><br />Falls die Datei nicht beschreibbar ist können Sie mir einem Klick auf Weiter fortfahren. Setup wird versuchen die Eigenschaften der Datei zu ändern und sie schreibbar zu machen.<br /><br />Falls dieser Versuch fehlschlägt, müssen die dem Download Link folgen um die richtigen Einstellungen zu erhalten. Bitte folgen Sie den Anweisungen auf der Download Seite.
_P;

$tsep_lng['setup_DB_Config_File_Writable'] = <<<_P
Beschreibbar
_P;

$tsep_lng['setup_DB_Config_File_UnWritable'] = <<<_P
Nicht-Beschreibbar
_P;

$tsep_lng['setup_PHPSafeMode'] = <<<_P
PHP Safe Mode:
_P;

$tsep_lng['setup_PHPSafeMode_Help'] = <<<_P
Falls PHP Safe Mode <b>ON</b> (an) ist, werden einige Funktionen in TSEP nicht funktionieren.<br /><br />Sie können TSEP dennoch verwenden. Wenn Sie keinen wichtigen Grund haben diese Einstellung zu ändern, lassen Sie es.
_P;

$tsep_lng['setup_On'] = <<<_P
An
_P;

$tsep_lng['setup_Off'] = <<<_P
Aus
_P;

$tsep_lng['setup_Admin_area_security'] = <<<_P
Sicherheit des Administrationsbereichs:
_P;

$tsep_lng['setup_Admin_area_security_Help'] = <<<_P
Sie sollten das admin Verzeichnis mit einem Passwort im der <i>.htaccess</i> Datei schützen (falls Sie Apache verwenden).<br /><br />Falls Sie das admin Verzeichnis nicht schützen, kann jeder ihre Einstellungen ändern.
_P;

$tsep_lng['setup_Protected'] = <<<_P
Gesichert
_P;

$tsep_lng['setup_Include_dir_security'] = <<<_P
Sicherheit des Include Verzeichnisses:
_P;

$tsep_lng['setup_Include_dir_security_Help'] = <<<_P
Sie sollten das include Verzeichnis mit einem Passwort im der <i>.htaccess</i> Datei schützen (falls Sie Apache verwenden).<br /><br />Falls Sie das include Verzeichnis nicht schützen, ist dies ein Sicherheitsrisiko weil ihr Datenbank-Benutzername und Datenbank-Passwort dort gespeichert sind.
_P;

$tsep_lng['setup_DBcfgUnwriteable'] = <<<_P
Die Datei in der die Datenbankverbindungsdaten gespeichert werden kann nicht beschrieben werden.<br />Bitte klicken Sie >per Hand ändern< um das Problem zu beheben.
_P;

$tsep_lng['setup_UpdateOrFresh'] = <<<_P
Setup benötigt Ihre Entscheidung bei folgenden Einstellungen. Diese Einstellungen bestimmen was von einer alten Installation (wenn vorhanden) übernommen werden soll.<br />
_P;

$tsep_lng['setup_Fresh'] = <<<_P
Neue Installation (mit Standardwerten)
_P;

$tsep_lng['setup_Fresh_Help'] = <<<_P
Falls Sie eine TSEP neu, nur mit Standardwerten installieren wollen, setzen Sie diese Einstellung auf <b>Ja</b>. Setup wird alle Einstellungen, Profile etc. ignorieren und TSEP mit den Standardwerten installieren.
_P;

$tsep_lng['setup_Update'] = <<<_P
Update von alter Version:
_P;

$tsep_lng['setup_Update_Help'] = <<<_P
Wenn Sie von einer alten TSEP Version auf eine neue wechseln und ihre alten Einstellungen bealten wollen, wählen Sie <b>Ja</b>. In diesem Fall müssen das Tabellen-Präfix der alten und neuen Installation übereinstimmen.<br /><br />Wenn Sie TSEP ganz neu installieren oder ihre alten Tabellen nicht überschreiben wollen, wählen Sie <b>Nein</b>. Stellen Sie sicher, dass das Tabellen-Präfix einmalig ist!
_P;

$tsep_lng['setup_CopyOld'] = <<<_P
Kopiere alte Konfiguration:
_P;

$tsep_lng['setup_CopyOld_Help'] = <<<_P
Fall Sie schon eine ältere Version von TSEP installiert haben und ihre alte <u>Konfiguration</u> behalten wollen, wählen Sie <u>Ja</u>.<br /><br />Funktioniert nur wenn \'Update\' auf Ja gestellt ist.
_P;

$tsep_lng['setup_CopyOldProfiles'] = <<<_P
Kopiere alte Profile:
_P;

$tsep_lng['setup_CopyOldProfiles_Help'] = <<<_P
Fall Sie schon eine ältere Version von TSEP installiert haben und ihre alten <u>Profile</u> behalten wollen, wählen Sie <u>Ja</u>.<br /><br />Funktioniert nur wenn \'Update\' auf Ja gestellt ist.
_P;

$tsep_lng['setup_CopyOldIndexes'] = <<<_P
Kopiere alten Index:
_P;

$tsep_lng['setup_CopyOldIndexes_Help'] = <<<_P
Fall Sie schon eine ältere Version von TSEP installiert haben und ihren alten <u>Index</u> behalten wollen, wählen Sie <u>Ja</u>.<br /><br />Funktioniert nur wenn \'Update\' auf Ja gestellt ist.
_P;

$tsep_lng['setup_CopyOldStopwords'] = <<<_P
Kopiere alte Stopworte
_P;

$tsep_lng['setup_CopyOldStopwords_Help'] = <<<_P
Fall Sie schon eine ältere Version von TSEP installiert haben und ihre alten <u>Stopworte</u> behalten wollen, wählen Sie <u>Ja</u>.<br /><br />Funktioniert nur wenn \'Update\' auf Ja gestellt ist.
_P;

$tsep_lng['setup_CopyOldLogs'] = <<<_P
Kopiere alte Logeinträge:
_P;

$tsep_lng['setup_CopyOldLogs_Help'] = <<<_P
Fall Sie schon eine ältere Version von TSEP installiert haben und ihre alten <u>Logeinträge</u> behalten wollen, wählen Sie <u>Ja</u>.<br /><br />Funktioniert nur wenn \'Update\' auf Ja gestellt ist.
_P;

$tsep_lng['setup_CopyOldRankSymbols'] = <<<_P
Kopiere alte Rangsymbole:
_P;

$tsep_lng['setup_CopyOldRankSymbols_Help'] = <<<_P
Fall Sie schon eine ältere Version von TSEP installiert haben und ihre alten <u>Rangsymbole</u> behalten wollen, wählen Sie <u>Ja</u>.<br /><br />Funktioniert nur wenn \'Update\' auf Ja gestellt ist.
_P;

$tsep_lng['setup_IndicateNoUpdate'] = <<<_P
Sie haben sich gegen ein Update ihrer alten Installation entschieden<br />jedoch ein Tabellen-Präfix angegeben das gleich dem derzeitigen ist.
_P;

$tsep_lng['setup_IndicateUpdate'] = <<<_P
Sie haben sich für ein Update entschieden<br />jedoch ein Tabellen-Präfix angegeben das anders als das derzeitige ist.
_P;

$tsep_lng['setup_Fatal_Error'] = <<<_P
Fataler Fehler:
_P;

$tsep_lng['setup_Saving_old_tables'] = <<<_P
Sichere alte Tabellen
_P;

$tsep_lng['setup_Can_not_open'] = <<<_P
Kann nicht öffnen
_P;

$tsep_lng['setup_Can_not_write_to'] = <<<_P
Kann nicht schreiben
_P;

$tsep_lng['setup_Copying_settings'] = <<<_P
Kopiere Einstellungen
_P;

$tsep_lng['setup_Copying_indexes'] = <<<_P
Kopiere Index
_P;

$tsep_lng['setup_Copying_profile2index_links'] = <<<_P
Kopiere Profile-zu-Index Verbindungen
_P;

$tsep_lng['setup_Copying_profiles'] = <<<_P
Kopiere Profile
_P;

$tsep_lng['setup_Copying_log_entries'] = <<<_P
Kopiere Logeinträge
_P;

$tsep_lng['setup_Copying_log_hits'] = <<<_P
Kopiere Logtreffer
_P;

$tsep_lng['setup_Copying_stopwords'] = <<<_P
Kopiere Stopworte
_P;

$tsep_lng['setup_Copying_rank_symbols'] = <<<_P
Kopiere Rangsymbole
_P;

$tsep_lng['setup_Congratulations'] = <<<_P
Herzlichen Glückwunsch! Die Installation wurde erfolgreich beendet.
_P;

$tsep_lng['setup_Continue2Summary'] = <<<_P
Bitte fahren Sie nun mit der Zusammenfassung fort.
_P;

$tsep_lng['setup_PerformingInstallOfVer'] = <<<_P
Setup installiert <span class=\"tsep\">TSEP</span> version
_P;

$tsep_lng['setup_DoNotInterrupt'] = <<<_P
Bitte brechen Sie diesen Vorgang nicht ab: Sie würden Ihre Konfiguration zerstören.<br />
_P;

$tsep_lng['setup_Progress'] = <<<_P
Fortschritt:
_P;

$tsep_lng['setup_Deleting_old_tables'] = <<<_P
Lösche alte Tabellen
_P;

$tsep_lng['setup_Creating_new_tables'] = <<<_P
Erstelle neue Tabellen
_P;

$tsep_lng['setup_Populating_new_tables'] = <<<_P
Fülle neue Tabellen
_P;

$tsep_lng['setup_FinishedInstalling'] = <<<_P
Sie haben die Installation ist abgeschlossen: <span class=\"tsep\">TSEP</span> Version 
_P;

$tsep_lng['setup_Summary_of_installation'] = <<<_P
Zusammenfassung der Installation
_P;

$tsep_lng['setup_Settings'] = <<<_P
Einstellungen:
_P;

$tsep_lng['setup_records_copied'] = <<<_P
Einträge kopiert
_P;

$tsep_lng['setup_records_copied_Zero'] = <<<_P
0 Einträge kopiert
_P;

$tsep_lng['setup_Not_selected_for_update'] = <<<_P
Nicht für Update ausgewählt
_P;

$tsep_lng['setup_Profiles'] = <<<_P
Profile:
_P;

$tsep_lng['setup_Indexes'] = <<<_P
Index:
_P;

$tsep_lng['setup_Stopwords'] = <<<_P
Stopworte:
_P;

$tsep_lng['setup_Logs'] = <<<_P
Logeinträge:
_P;

$tsep_lng['setup_Ranksymbols'] = <<<_P
Rangsymbole:
_P;

$tsep_lng['setup_Important'] = <<<_P
Wichtig:
_P;

$tsep_lng['setup_Important_Delete'] = <<<_P
Bitte denken Sie daran das <u>admin</u> und das <u>include</u> Verzeichnis zu <u>schützen</u> falls Sie dies noch nicht getan haben. Zusätzlich sollten Sie die Datei <u>/admin/setup.php</u> <u>löschen</u> damit Ihre Konfiguration nicht von böswilligen Zeitgenossen geändert werden kann.
_P;

$tsep_lng['setup_TakeMe2Config'] = <<<_P
Weiter zur Konfiguration...
_P;

$tsep_lng['setup_Finish'] = <<<_P
Beenden
_P;

$tsep_lng['setup_Steps_1'] = <<<_P
Einführung
_P;

$tsep_lng['setup_Steps_2'] = <<<_P
Datenbankeinstellungen
_P;

$tsep_lng['setup_Steps_3'] = <<<_P
System Prüfung
_P;

$tsep_lng['setup_Steps_4'] = <<<_P
Konfiguration
_P;

$tsep_lng['setup_Steps_5'] = <<<_P
Installation
_P;

$tsep_lng['setup_Steps_6'] = <<<_P
Zusammenfassung
_P;

$tsep_lng['setup_Steps_7'] = <<<_P
Feedback
_P;

$tsep_lng['setup_NoURL2Preview'] = <<<_P
Keine URL als Vorschau anzuzeigen
_P;

$tsep_lng['setup_BeforeFinish'] = <<<_P
Zum Abschluss
_P;

$tsep_lng['setup_BeforeCancel'] = <<<_P
Bevor Sie abbrechen
_P;

$tsep_lng['setup_cancelText1'] = <<<_P
Wir möchte einige statistische Daten empfangen. Das Senden dieser Daten ist komplett anonym und freiwillig. In der folgenden Liste sehen Sie welche Daten wir empfangen möchten. Sie können selbst entscheiden welche Daten Sie an uns senden wollen oder auch dass Sie gar nichts senden wollen.
_P;

$tsep_lng['setup_cancelText2'] = <<<_P
Falls Sie sich entscheiden Daten zu senden und somit der TSEP Entwicklung zu helfen, werden Sie vorübergehend zu www.tsep.info geleitet. Dort werden die von Ihnen gewählten Daten in unserer Datenbank gespeichert.
_P;

$tsep_lng['setup_finishText1'] = <<<_P
Wir möchten ein paar anonyme, statistische Daten empfangen. Das Senden dieser Daten ist komplett freiwillig und anonym. Die Liste zeigt die Daten die wir erfahren möchten. Sie können auswählen was Sie und senden wollen oder sich auch entscheiden gar nichts zu senden.
_P;

$tsep_lng['setup_finishText2'] = <<<_P
Wenn Sie sich entscheiden Daten an das TSEP Entwicklerteam zu schicken und der TSEP Entwicklung so zu helfen, werden Sie zuerst nach  www.tsep.info transferiert wo die gesenderen Daten in unserer Datenbank erfasst werden. Danach werden Sie automatisch zu Ihrer TSEP Konfigurationsseite geleitet.<br />
_P;

$tsep_lng['setup_finishText3'] = <<<_P
Falls Sie sich entscheiden Daten zu senden wird auch Ihre URL übertragen - obwohl Sie eventuell gewählt haben, dass diese nicht gespeichert werden soll. Eine Übertragung der URL muss jedoch sein, damit wir Sie nach dem Eintrag der anderen Daten zu Ihrer TSEP Konfiguration zurücksenden können. Ihre URL wird nicht in der Datenbank gespeichert wenn Sie dies nicht wünschen.
_P;

$tsep_lng['setup_finishText4'] = <<<_P
Sollten Sie sich entscheiden keine Daten zu schicken, werden Sie direkt zu Ihrer TSEP Konfiguration geleitet, ohne vorher die TSEP Homepage zu kontaktieren.<br />In beiden Fällen sehen Sie den Konfigurationsbildschirm Ihrer TSEP Installation als nächstes in Ihrem Browser.
_P;

$tsep_lng['setup_Let_TSEP_Team_know'] = <<<_P
Dies wird uns wissen lassen, dass Sie TSEP erfolgreich installiert haben.
_P;

$tsep_lng['setup_Let_TSEP_Team_know_Help'] = <<<_P
Dies wird uns mitteilen, dass Sie TSEP erfolgreich installiert haben.
_P;

$tsep_lng['setup_Let_TSEP_Team_know2'] = <<<_P
Lassen Sie uns wissen, dass Sie die Installation von <span class="tsep">TSEP</span> abgebrochen haben:
_P;

$tsep_lng['setup_Let_TSEP_Team_know2_Help'] = <<<_P
Dies lässt uns wissen, dass Sie die Installation von TSEP abgebrochen haben.
_P;

$tsep_lng['setup_NewVersion'] = <<<_P
Neue <span class="tsep">TSEP</span> Version:
_P;

$tsep_lng['setup_NewVersion_Help'] = <<<_P
Dies ist die TSEP Version die Sie gerade installiert haben
_P;

$tsep_lng['setup_OldVersion'] = <<<_P
Alte <span class="tsep">TSEP</span> Version:
_P;

$tsep_lng['setup_OldVersion_Help'] = <<<_P
Die TSEP Version die ersetzt wurde (falls vorhanden)
_P;

$tsep_lng['setup_Referer'] = <<<_P
Ihren Referer loggen:
_P;

$tsep_lng['setup_Referer_Help'] = <<<_P
Die Domain Ihrer Webseite und der Pfad von dem Sie kommen. Wir würden dies gern erfahren um ggf. Screenshots von TSEP in Aktion von Ihrer Seite zu machen.<br /><br />Falls Sie eine der anderen Optionen wählen wird auch die URL Ihrer Seite mit übertragen werden damit wir Sie zurück zu Ihrer Konfiguration schicken können. Dies bedeutet nicht, dass diese auch geloggt wird. Wenn Sie <b>Nein</b> wählen, werden wir die URL nicht in unserer Datenbank speichern.
_P;

$tsep_lng['setup_NewsLetter'] = <<<_P
Bei unserem Newsletter anmelden
_P;

$tsep_lng['setup_NewsLetter_Help'] = <<<_P
Falls Sie sich bei unserem Newsletter anmelden wollen um immer über die neuesten Entwicklungen von TSEP informiert zu beleiben, geben Sie bitte Ihre Email Adresse hier ein.<br /><br/>Falls Sie nicht interessiert sind, lassen Sie das Feld leer.<br /><br/>Um sich vom Newsletter abzumelden besuchen Sie bitte unsere Webseite. Dieses Feld dient nur der Anmeldung.
_P;

$tsep_lng['setup_Comment'] = <<<_P
Anmerkungen:
_P;

$tsep_lng['setup_Comment_Help'] = <<<_P
Falls Sie etwas ergänzen wollen das für uns hilfreich sein könnte, tragen Sie Ihre Anmerkungen bitte hier ein.
_P;

$tsep_lng['setup_Why_Aborted'] = <<<_P
Grund für den Abbruch:
_P;

$tsep_lng['setup_Why_Aborted_Help'] = <<<_P
Wir möchten wirklich wissen warum Sie die Installation abgebrochen haben. Ihre Anmerkungen werden uns helfen TSEP besser auf Ihre Bedürfnisse abzustimmen.
_P;

$tsep_lng['setup_URLPreview'] = <<<_P
Die URL die gesendet wird:
_P;

$tsep_lng['setup_JavaScriptEnabled'] = <<<_P
JavaScript muss angeschaltet sein damit die Vorschau funktioniert
_P;

$tsep_lng['indexer_started_indexer'] = <<<_P
Indexer gestartet
_P;

$tsep_lng['indexer_started_searching'] = <<<_P
Suche nach Dateien...
_P;

$tsep_lng['indexer_started_building'] = <<<_P
Erstele Index (von %d Dateien)...
_P;

$tsep_lng['XdirName_wrongpath'] = <<<_P
Indizier-Startverzeichnis existiert nicht: <b>%s</b>
_P;

$tsep_lng['contentimgs'] = <<<_P
Inhaltsbilder
_P;

$tsep_lng['contentimg'] = <<<_P
Inhaltsbild
_P;

$tsep_lng['contentimgs_not_used'] = <<<_P
Inhaltsbilder (nicht in dieser TSEP Installation verwendet)
_P;

$tsep_lng['contentimg_defaultimage'] = <<<_P
Inhaltsbild (benutzes Standardbild)
_P;

$tsep_lng['contentimg_url_assoc_image'] = <<<_P
Inhaltsbild (zur Seite gehörendes Bild)
_P;

$tsep_lng['contentimg_filelists'] = <<<_P
Inhaltsbild-Dateilisten
_P;

$tsep_lng['contentimg_filelist'] = <<<_P
Inhaltsbild-Dateiliste
_P;

$tsep_lng['contentimg_filelists_descr'] = <<<_P
Wählen Sie welche Aktion Sie für eine derzeit vorhandene Inhaltsbild Liste durchführen wollen:<br />- Links-Klick auf den Namen um die Datei anzusehen (öffnet in einem neuen Fenster)<br />- Rechts-Klick auf den Namen und 'Speichern' der Datei für weitere Aktionen<br />- Löschen der Datei
_P;

$tsep_lng['contentimg_filelist_rebuild'] = <<<_P
Erstellen Inhaltsbild-Dateiliste aus den momentan indizierten Seiten
_P;

$tsep_lng['contentimg_filelist_autobuild'] = <<<_P
automatisch durch den Indexer erstellt
_P;

$tsep_lng['contentimg_filelist_manuallybuilt'] = <<<_P
manuell erstellt (Indexprofil '%s', für '%s')
_P;

$tsep_lng['for_iprofile'] = <<<_P
für Indexprofil
_P;

$tsep_lng['all_pages'] = <<<_P
alle Seiten
_P;

$tsep_lng['pages_having_no_contentimg'] = <<<_P
Seiten ohne Inhaltsbild
_P;

$tsep_lng['currently_experimental'] = <<<_P
(derzeit EXPERIMENTELL)
_P;

$tsep_lng['modified_created'] = <<<_P
verändert/erstellt am
_P;

$tsep_lng['configure'] = <<<_P
Einstellungen
_P;

$tsep_lng['name'] = <<<_P
Name
_P;

$tsep_lng['manage'] = <<<_P
Verwalten
_P;

$tsep_lng['comment'] = <<<_P
Kommentar
_P;

$tsep_lng['upload'] = <<<_P
Hochladen
_P;

$tsep_lng['upload_complete'] = <<<_P
Hochladen beendet!
_P;

$tsep_lng['delete_complete'] = <<<_P
Datei erfolgreich gelöscht!
_P;

$tsep_lng['err_deleting_file'] = <<<_P
Löschen der Datei fehlgeschlagen!
_P;

$tsep_lng['err_fopen_append'] = <<<_P
Fehler beim Öffnen zum Anhängen der Datei: %s 
_P;

$tsep_lng['err_fwrite'] = <<<_P
Fehler beim schreiben der Datei %s
_P;

$tsep_lng['stat_indexer_wrote_contentimg'] = <<<_P
%s Einträge in die Inhaltsbild Dateiliste %s geschrieben
_P;

$tsep_lng['stat_indexer_nowrite_contentimg'] = <<<_P
Es wurde nichts in die Inhaltsbild Dateiliste %s geschrieben
_P;

$tsep_lng['back'] = <<<_P
zurück
_P;

$tsep_lng['contentimg_filelistTF'] = <<<_P
Umwandlungs Dateiliste der Inhaltebilder%d
_P;

$tsep_lng['close'] = <<<_P
schließen
_P;

$tsep_lng['run'] = <<<_P
Start
_P;

$tsep_lng['destdirectory_does_not_exist'] = <<<_P
Zielverzeichnis existiert nicht
_P;

$tsep_lng['directory_does_not_exist'] = <<<_P
Verzeichnis existiert nicht
_P;

$tsep_lng['file_does_not_exist'] = <<<_P
Datei existiert nicht
_P;

$tsep_lng['not_defined_in_databse'] = <<<_P
%s ist in der Datenbank nicht definiert (leer)
_P;

$tsep_lng['err_upload_err_ini_size'] = <<<_P
Die Dateigröße überschreitet die Definition upload_max_filesize mit %s in der php.ini
_P;

$tsep_lng['err_upload_err_form_size'] = <<<_P
Dateigröße überschreitet max_filesize %d
_P;

$tsep_lng['err_upload_err_partial'] = <<<_P
Datei nicht komplett hochgeladen
_P;

$tsep_lng['err_upload_err_no_file'] = <<<_P
Nichts hochgeladen
_P;

$tsep_lng['err_upload_err_undefined'] = <<<_P
Hochladen mit Fehler %d beendet
_P;

$tsep_lng['err_upload_mimetype'] = <<<_P
Falscher Mimetyp der hochgeladenen Datei: %s
_P;

$tsep_lng['err_upload_zerosize'] = <<<_P
Dateigröße der hochgeladenen Datei = 0 (eventuell falscher Dateiname)
_P;

$tsep_lng['err_upload_moving_tmpfile'] = <<<_P
Fehler beim hochladen während die Temprärdatei verschoben werden sollte (eventuell keine SChreibrechte für das Zielverzeichnis)
_P;

$tsep_lng['destinationfile'] = <<<_P
Zieldatei
_P;

$tsep_lng['send_this_file'] = <<<_P
Sende diese Datei
_P;

$tsep_lng['delete_this_file'] = <<<_P
Lösche diese Datei
_P;

$tsep_lng['wrong_fileext'] = <<<_P
Falsche Dateiendung: %s
_P;

$tsep_lng['fileext_mismatch'] = <<<_P
Dateierweiterung %s statt %s angegeben
_P;

$tsep_lng['config_group_configcontentimg_basicdefs'] = <<<_P
Grundsätzliche Definitionen
_P;

$tsep_lng['config_configcontentimg_mode'] = <<<_P
Inhaltsbilder verwenden
_P;

$tsep_lng['config_configcontentimg_mode_help'] = <<<_P
Schalten Sie die Nutzung der Inhaltsbilder in der TSEP Konfiguration an bzw. aus. Ein Ausschalten entfernt vorhandenen Bilder NICHT!
_P;

$tsep_lng['config_group_configcontentimg_basicdefs_paths'] = <<<_P
Pfade
_P;

$tsep_lng['config_group_configcontentimg_basicdefs_image'] = <<<_P
Bilder
_P;

$tsep_lng['config_configcontentimg_webpath'] = <<<_P
Bilderpfad für Web-Zugriff
_P;

$tsep_lng['config_configcontentimg_webpath_help'] = <<<_P
Absoluter Bildpfad in dem die Inhaltsbilder abgelegt sind die in den Ergebnisseiten angezeigt werden (gleich dem Bildpfad für FTP- und PHPScript-Zugriff).
_P;

$tsep_lng['config_configcontentimg_abspath'] = <<<_P
Bilderpfad für PHPScript-Zugriff
_P;

$tsep_lng['config_configcontentimg_abspath_help'] = <<<_P
Absoluter (physischer) Pfad für das Bilderverzeichnis. Das Verzeichnis muss durch PHP erreichbar sein (gleich dem Bildpfad für Web- und FTP-Zugriff).
_P;

$tsep_lng['config_configcontentimg_webpath_flists'] = <<<_P
Hauptverzeichnis für die Inhaltsbilder-Dateilisten zum Web-Zugang
_P;

$tsep_lng['config_configcontentimg_webpath_flists_help'] = <<<_P
Absoluter Pfad zum Verzeichnis in dem die Inhaltsbild-Dateilisten und Umwandlungen erstellt werden. Die Vorlagen der Dateilisten zur Umwandlung von Inhaltsbildern müssen in einem Unterverzeichnis mit Namen 'transformation_templates' liegen. Weiteres zu den Inhaltsbild-Dateilisten und -Umwandlungen weiter unten.
_P;

$tsep_lng['config_configcontentimg_abspath_flists'] = <<<_P
Hauptverzeichnis für die Inhaltsbilder-Dateilisten zum PHP Script-Zugang
_P;

$tsep_lng['config_configcontentimg_abspath_flists_help'] = <<<_P
Absoluter (physischer) Pfad zum verzeichnis in dem die Inhaltsbild-Dateilisten und -Umwandlungen erzeugt werden. Die Vorlagen der Inhaltsbild-Datei-Umwandlungsliste muss in einem Unterverzeichnis mit Namen 'transformation_templates' vorhanden sein. Weiteres zu Inhaltsbild-Dateilisten und -Umwandlungen weiter unten.
_P;

$tsep_lng['config_configcontentimg_imageext'] = <<<_P
Bilddatei Erweiterung (<b>nicht ändern</b> falls schon Bilder vorhanden sind!)
_P;

$tsep_lng['config_configcontentimg_imageext_help'] = <<<_P
Vorzugsweise '.jpeg', '.jpg' or '.png'. NICHT ÄNDERN falls schon Bilder vorhanden sind, da diese nicht mehr gefunden werden würden.
_P;

$tsep_lng['config_configcontentimg_FnDefaultImage'] = <<<_P
Standardbild
_P;

$tsep_lng['config_configcontentimg_FnDefaultImage_help'] = <<<_P
Dieses Bild wird verwendet wenn Inhaltsbilder gezeigt werden sollen, jedoch für eine Seite kein Bild gefunden werden kann. Falls Sie ein Standardbild angegeben haben, jedoch statt des Bildes im Feld mit der Beschriftung 'Standardbild' nur dessen Namen sehen, so haben Sie den Dateinamen bzw. den Pfadnamen falsch angegeben.
_P;

$tsep_lng['config_configcontentimg_maxX'] = <<<_P
maximale Anzeigebreite
_P;

$tsep_lng['config_configcontentimg_maxX_help'] = <<<_P
Geben Sie die maximale Breite eines Inhaltsbildes in Pixeln an. Um das Seitenverhältnis zu erhalten, kann die tatsächlich verwendete Breite kleiner sein (abhängig von der Geometrie des Bildes und der Angabe der maximalen Höhe). Bilder die kleiner sind als die angegebene maximale Anzeigebreite und -höhe bleiben unverändert.
_P;

$tsep_lng['config_configcontentimg_maxY'] = <<<_P
maximale Anzeigehöhe
_P;

$tsep_lng['config_configcontentimg_maxY_help'] = <<<_P
Geben Sie die maximale Höhe eines Inhaltsbildes in Pixeln an. Um das Seitenverhältnis zu erhalten, kann die tatsächlich verwendete Höhe kleiner sein (abhängig von der Geometrie des Bildes und der Angabe der maximalen Breite). Bilder die kleiner sind als die angegebene maximale Anzeigebreite und -höhe bleiben unverändert.
_P;

$tsep_lng['config_group_configcontentimg_indexer'] = <<<_P
Indexereinstellungen
_P;

$tsep_lng['config_configcontentimg_create_flists'] = <<<_P
Der Indexer sollte Dateilisten für Inhaltsbilder erstellen
_P;

$tsep_lng['config_configcontentimg_create_flists_help'] = <<<_P
Falls diese Option angeschaltet ist, erstellt der Indexer keine Inhaltsbild-Dateiliste. ACHTUNG: Es ist dennoch möglich per Hand die Inhaltsbild-Dateiliste zu erstellen.
_P;

$tsep_lng['config_configcontentimg_having_no_contentimg'] = <<<_P
Nur für Seiten die kein Inhaltsbild besitzen
_P;

$tsep_lng['config_configcontentimg_having_no_contentimg_help'] = <<<_P
Ein Eintrag in die Dateiliste der Inhaltsbilder wird nur geschrieben, wenn noch kein Inhaltsbild für eine Seite existiert.
_P;

$tsep_lng['config_configcontentimg_autorun_flisttrans'] = <<<_P
Automatisch die Umformung starten
_P;

$tsep_lng['config_configcontentimg_autorun_flisttrans_help'] = <<<_P
Falls diese Option angeschaltet ist, wird die Umwandlung automatisch nach dem Indizieren begonnen. (Die Einstellung 'Der Indexer soll Inhaltsbild-Dateiliste erstellen' muss auch angeschaltet sein!)
_P;

$tsep_lng['config_group_configcontentimg_extdefs'] = <<<_P
Erweiterte Definitionen
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flists'] = <<<_P
Inhaltsbild Dateilisten
_P;

$tsep_lng['config_group_configcontentimg_extdefs_fliststrans'] = <<<_P
Umformungen (NOCH NICHT IMPLEMENTIERT)
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flisttrans1'] = <<<_P
Umformung 1
_P;

$tsep_lng['config_configcontentimg_flisttrans1_template_filename'] = <<<_P
Temporärdateiname
_P;

$tsep_lng['config_configcontentimg_flisttrans1_template_filename_help'] = <<<_P
Dateiname der Vorlage die zur Umwandlung 1 verwendet wird (dieser Name ist ein Teil des Ausgabedateinamens). ACHTUNG: Die Dateierweiterung wird auch als Erweiterung des Umwandlungs-Dateinamens verwendet! D.h. falls sie nicht korrekt angegeben ist, werden die Dateinamen der Umwandlung 1 nicht in der unten stehenden Inhaltsbild-Dateiliste aufgeführt.
_P;

$tsep_lng['config_configcontentimg_flisttrans1_active'] = <<<_P
Aktiv
_P;

$tsep_lng['config_configcontentimg_flisttrans1_active_help'] = <<<_P
Falls diese Umwandlung durchgeführt wird, wird auch Umwandlung 1 durchgeführt. (Wenn weder Umwandlung 1 noch 2 aktiv sind wird keine Umwandlung durchgeführt.)
_P;

$tsep_lng['config_configcontentimg_flisttrans1_internal_notes'] = <<<_P
Interne Anmerkungen für Umformung 1
_P;

$tsep_lng['config_configcontentimg_flisttrans1_internal_notes_help'] = <<<_P
Aktiv Dieses Feld kann für interne Notizen verwendet werden.
_P;

$tsep_lng['config_configcontentimg_flisttrans1_comment'] = <<<_P
Kommentarzeile beginnt mit
_P;

$tsep_lng['config_configcontentimg_flisttrans1_comment_help'] = <<<_P
Definieren Sie eine Zeichenkette die als 'Präfix' für Kommentarzeilen verwendet wird (z.B. '#' für Umwandlungen mit Shellscripts oder 'REM' für Umwandlungen mit DOS-Batch Dateien)
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flisttrans2'] = <<<_P
Umformung 2
_P;

$tsep_lng['config_configcontentimg_flisttrans2_template_filename'] = <<<_P
Temporärdateiname
_P;

$tsep_lng['config_configcontentimg_flisttrans2_template_filename_help'] = <<<_P
Dateiname der Vorlage die zur Umwandlung 2 verwendet wird (dieser Name ist ein Teil des Ausgabedateinamens). ACHTUNG: Die Dateierweiterung wird auch als Erweiterung des Umwandlungs-Dateinamens verwendet! D.h. falls sie nicht korrekt angegeben ist, werden die Dateinamen der Umwandlung 2 nicht in der unten stehenden Inhaltsbild-Dateiliste aufgeführt.
_P;

$tsep_lng['config_configcontentimg_flisttrans2_active'] = <<<_P
Aktiv
_P;

$tsep_lng['config_configcontentimg_flisttrans2_active_help'] = <<<_P
Falls diese Umwandlung durchgeführt wird, wird auch Umwandlung 2 durchgeführt. (Wenn weder Umwandlung 1 noch 2 aktiv sind wird keine Umwandlung durchgeführt.)
_P;

$tsep_lng['config_configcontentimg_flisttrans2_internal_notes'] = <<<_P
Interne Anmerkungen für Umformung 2
_P;

$tsep_lng['config_configcontentimg_flisttrans2_internal_notes_help'] = <<<_P
Aktiv Dieses Feld kann für interne Notizen verwendet werden.
_P;

$tsep_lng['config_configcontentimg_flisttrans2_comment'] = <<<_P
Kommentarzeile beginnt mit
_P;

$tsep_lng['config_configcontentimg_flisttrans2_comment_help'] = <<<_P
Definieren Sie eine Zeichenkette die als 'Präfix' für Kommentarzeilen verwendet wird (z.B. '#' für Umwandlungen mit Shellscripts oder 'REM' für Umwandlungen mit DOS-Batch Dateien)
_P;

$tsep_lng['stopwords_GetStop'] = <<<_P
Stopworte einlesen
_P;

$tsep_lng['stopwords_GetStop_Info'] = <<<_P
Geben Sie die Anzahl der zu lesenden Stopworte ein.
_P;

$tsep_lng['stopwords_NewStopwords'] = <<<_P
Hinzugefügte Stopworte: 
_P;

$tsep_lng['stopwords_RetreiveNew'] = <<<_P
(Lese nur neue Stopworte)
_P;

$tsep_lng['stopwords_Occurrences'] = <<<_P
Auftreten 
_P;

?>
