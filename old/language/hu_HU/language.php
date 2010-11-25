<?php

/* following will be filled automatically by SubVersion!

Do not change by hand!

$LastChangedDate$

@lastedited $LastChangedBy$

$LastChangedRevision$
*/
$tsep_lng['above_values'] = <<<_P
értékek fent
_P;

$tsep_lng['add'] = <<<_P
hozzáad
_P;

$tsep_lng['all'] = <<<_P
mind
_P;

$tsep_lng['assigned_indexingprofiles'] = <<<_P
kijelölt mutató profilok
_P;

$tsep_lng['button_search'] = <<<_P
Keresés
_P;

$tsep_lng['click_here_to_open'] = <<<_P
Kattints ide hogy megnyisd a lapot
_P;

$tsep_lng['close_this_window'] = <<<_P
Bezárja ezt az ablakot
_P;

$tsep_lng['config_absPath'] = <<<_P
Add meg a pontos útvonalat a TSEPhez, például: ha a search.php a /home/www/php/tsepsearch/search.php helyen van, akkor így kell kinéznie: '/home/www/php/tsepsearch'
_P;

$tsep_lng['config_tmpPath'] = <<<_P
Add meg a pontos útvonalat a TSEP temp könyvtárához
_P;

$tsep_lng['config_check_file_exists'] = <<<_P
Mielőtt filet mutatnánk az összegzésben, megnézzük hogy valóban létezik? Ha igaz(true), akkor a keresés kicsit lassabb de az összegzésben csak olyan fileok lesznek, amik még mindig léteznek. Figyelj arra, hogy ez csak akkor működik, ha allow_url_open engedélyezve van a php.ini-ben! Lehet hogy ezt hamisra(false) KELL állítanod.
_P;

$tsep_lng['config_Color_1'] = <<<_P
Az első váltakozó szín (egy soré), ha hosszú a lista
_P;

$tsep_lng['config_Color_2'] = <<<_P
A második váltakozó szín (egy soré), ha hosszú a lista
_P;

$tsep_lng['config_Date_Style'] = <<<_P
Hogyan mutassa az időt (PHP stílus, használhatod D, l, M & F). A végeredmény a fent beállított nyelven lesz. Példák: Angol stílus: 'l, F d Y h:i a' Német stílus: 'l, d. F Y, G:i'
_P;

$tsep_lng['config_dir_exclude'] = <<<_P
Írd be a kizárandó könyvtárakat:
_P;

$tsep_lng['config_dir_exclude_help'] = <<<_P
Ez az útvonal a könyvtár(ak)hoz amiket ki akarsz zárni, függ az oldalszerkezetedtől. Például: /folder1/folder3, ha http://www.teoldalad.hu/folder1/folder3 tartalmát (könyvtárakat és fileokat is) kizárod. Adj meg több helyet ','-vel elválasztva, de ne ', ' (ne legyen szóköz)
_P;

$tsep_lng['config_Display_Boolean_Search'] = <<<_P
A MySQL verziójának 4.0.1nek, vagy nagyobbnak kell lennie a boolean-os (logikai változós) kereséshez. MySQL >= 4.0.0 booleanos keresés: Hasznáhatsz boolean operátorokat, MySQL < 4.0.0: Minden szó, amit a felhasználó beír a keresési mezőbe, meg kell találni egy oldalon. Csak ebben az esetben lesz látható a lap az eredmények listájában. Akarod figyelmeztetni a felhasználót hogy régi az adatbázis verzió, és nincs booleanos keresés? Ajánljuk, hogy hagyd ezt a mezőt 'true'-n - vagy másképp meglepheti a felhasználót hogy miért nincs eredmény.
_P;

$tsep_lng['config_ext_include'] = <<<_P
Filekiterjesztések amik hozzá legyenek adva
_P;

$tsep_lng['config_ext_include_help'] = <<<_P
A mutató csak olyan fileokra mutat, amiknek a kiterjesztése itt meg van adva (használj vesszővel elválasztott listát, pl.: HTM,HTML,PHP )
_P;

$tsep_lng['config_file_exclude'] = <<<_P
Írd be a kizárandó fileokat:
_P;

$tsep_lng['config_file_exclude_help'] = <<<_P
Ez a helye a azoknak a file(ok)nak, amiket ki szeretnél zárni, a honlapszerkezettől függően. Pl.: /folder1/folder4/login.php, ha http://www.teoldalad.hu/folder1/folder4/login.php -t szeretnéd kizárni. Adj hozzá több filet vesszővel ',' elválasztva, de ne legyen szóköz (', ') !
_P;

$tsep_lng['config_fnExternalPhp'] = <<<_P
Írd be a teljesen képesített .php filenevét a külső adatellátásnak:
_P;

$tsep_lng['config_fnExternalPhp_help'] = <<<_P
Ez egy fájlneve egy php-scriptnek a TSEP-en kívül, amely szolgáltatja a mutatandó fileokat. Pl.: crawler/spider.php - Nézd meg a leírást bővebb információért.
_P;

$tsep_lng['config_group_general'] = <<<_P
Általános
_P;

$tsep_lng['config_group_lists'] = <<<_P
Listák
_P;

$tsep_lng['config_group_lists_colors'] = <<<_P
Színek
_P;

$tsep_lng['config_group_lists_limits'] = <<<_P
Korlátok
_P;

$tsep_lng['config_group_logging'] = <<<_P
Loggolás
_P;

$tsep_lng['config_group_visible2enduser'] = <<<_P
Felhasználói felület
_P;

$tsep_lng['config_group_visible2enduser_range'] = <<<_P
Korlátok
_P;

$tsep_lng['config_group_visible2enduser_results'] = <<<_P
Eredmények
_P;

$tsep_lng['config_group_visible2enduser_searchsuggest'] = <<<_P
Keresési Javaslat
_P;

$tsep_lng['config_group_visible2enduser_search'] = <<<_P
Keresés
_P;

$tsep_lng['config_Hour_Difference'] = <<<_P
órák különbsége a szerveridő és a helyi idő között. Beállítás eszerint
_P;

$tsep_lng['config_how_many_hints'] = <<<_P
Hány keresési javaslat legyen mutatva? (0 = Kikapcsolva)
_P;

$tsep_lng['config_show_nr_hits'] = <<<_P
A keresési javaslat doboz mutassa a lapok számát a kérdéshez viszonyítva?
_P;

$tsep_lng['config_show_popular'] = <<<_P
A keresési javaslat doboz mutassa egy kérdés népszerűségét?
_P;

$tsep_lng['config_calc_hits_method'] = <<<_P
Milyen számolási móddal legyenek a lapszámok visszaadva?
_P;

$tsep_lng['config_calc_hits_method_help'] = <<<_P
Amikor logol egy keresési kérdést:<br /> 1 = Használja az utolsó keresés eredményeit<br /> 2 = Számoljon átlagot minden kérdésből<br /> 3 = Számolja ki a minimumot minden keresésből<br /> 4 = Számolja ki a maximumot minden keresésből
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit'] = <<<_P
Hány karaktert mutasson az első találat után?
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit_help'] = <<<_P
A keresési eredmény csak egy részlete lesz a teljes talált szövegnek. Ez a bejegyzés mutatja meg hogy hány karakter legyen mutatva az első találat <b>után</b>.
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit'] = <<<_P
Hány karakter legyen mutatva az első találat előtt?
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit_help'] = <<<_P
A keresés eredménye csak egy része lesz a teljes kijelölt szövegnek. Ez a beállítás arra vonatkozik, hogy hány karakter legyen mutatva az első találat <b>előtt</b>.
_P;

$tsep_lng['config_How_Many_Results'] = <<<_P
Ha a felhasználó nem tudja beállítani a találatok számát, akkor ez a default érték lesz használva.
_P;

$tsep_lng['config_How_Many_Sentences'] = <<<_P
Hány találati blokk legyen mutatva?
_P;

$tsep_lng['config_How_Many_Sentences_help'] = <<<_P
A keresés eredménye csak egy része lesz a teljes kijelölt szövegnek. Ez a beállítás arra vonatkozik, hogy maximum hány találati blokk legyen mutatva.
_P;

$tsep_lng['config_Language'] = <<<_P
Milyen nyelven működjön a TSEP? Pl: ha angolt akarsz 'en', ha németet 'de'. Magyarhoz 'hu'.
_P;

?>
