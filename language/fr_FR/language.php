<?php

/* following will be filled automatically by SubVersion!

Do not change by hand!

$LastChangedDate: 2005-09-09 12:00:27 +0200 (Fr, 09 Sep 2005) $

@lastedited $LastChangedBy: olaf $

$LastChangedRevision: 325 $
*/
$tsep_lng['above_values'] = <<<_P
valeurs ci-dessus
_P;

$tsep_lng['add'] = <<<_P
Ajoute
_P;

$tsep_lng['all'] = <<<_P
tous
_P;

$tsep_lng['assigned_indexingprofiles'] = <<<_P
Nom du profil d'indexation
_P;

$tsep_lng['button_search'] = <<<_P
Recherche
_P;

$tsep_lng['click_here_to_open'] = <<<_P
Cliquez sur ce lien pour ouvrir la page
_P;

$tsep_lng['close_this_window'] = <<<_P
Ferme cette fenêtre
_P;

$tsep_lng['config_absPath'] = <<<_P
définissez le chemin absolu à l'exemple de TSEP : si le fichier search.php est localisé dans /home/www/php/tsepsearch/search.php il doit être du style: '/home/www/php/tsepsearch'
_P;

$tsep_lng['config_tmpPath'] = <<<_P
définit le chemin absolu vers le répertoire temporaire pour TSEP
_P;

$tsep_lng['config_check_file_exists'] = <<<_P
Avant de voir le fichier des résultats vérifier qu'il existe vraiment? (A cocher si nécessaire) Si coché, la recherche est un peu plus lente mais uniquement les fichiers existants seront affichés. Faire attention que le paramètre: allow_url_open soit actif (true) dans le fichier <b>php.ini</b>! Il est possible également d'indiquer 'false' (faux) pour cette réponse!
_P;

$tsep_lng['config_Color_1'] = <<<_P
La première couleur alternative (d'une rangée) quand nous avons de longues listes
_P;

$tsep_lng['config_Color_2'] = <<<_P
La deuxième couleur alternative (d'une rangée) quand nous avons de longues listes
_P;

$tsep_lng['config_Date_Style'] = <<<_P
Comment afficher la date (PHP style, vous pouvez utiliser D, l, M & F). La sortie va être dans la langue choisie. Examples: Anglaise: 'l, F d Y h:i a' Allemande: 'l, d. F Y, G:i'
_P;

$tsep_lng['config_dir_exclude'] = <<<_P
Entrez les répertoires qui doivent être exclus:
_P;

$tsep_lng['config_dir_exclude_help'] = <<<_P
Ceci est le chemin relatif du répertoire qui doit être exclu relativement à la racine de votre site Ex.: ./folder1/folder3, si le contenu de http://www.yourdomain.com/folder1/folder3 (répertoires et fichiers) doivent être exclus. Il est possible d'ajouter plusieurs données en les séparant par une virgule sans <b>espace</b>!
_P;

$tsep_lng['config_Display_Boolean_Search'] = <<<_P
En contrôlant votre version de mysql nous vérifions que nous avons besoin d'une version 4.0.1 ou plus haute pour que le mysql booléen de recherche accomplisse correctement sa fonction. Tous les mots que l'utilisateur écrit dans le domaine de recherche doivent être trouvés. Seulement et dans ce cas-ci, la page sera montrée dans la liste des résultats. Voulez-vous en informer l'utilisateur que s'il a une ancienne version de ce logiciel, il y aura probablement aucune recherche booléenne possible! Nous vous recommandons vivement de choisir 'true', autrement cela pourrait embarasser l'utilisateur dans le cas ou il n'obtiendrait aucun résultat. (A cocher si oui!)
_P;

$tsep_lng['config_ext_include'] = <<<_P
Extension de(s) fichier(s) qui doit(vent) être inclue(nt)
_P;

$tsep_lng['config_ext_include_help'] = <<<_P
L'indexeur indexe les fichiers dont l'extension est demandée ici (Ex.: HTM,HTML,PHP)
_P;

$tsep_lng['config_file_exclude'] = <<<_P
Entrez les fichiers à exclure
_P;

$tsep_lng['config_file_exclude_help'] = <<<_P
Ceci est le chemin des fichiers à exclure relativement à la racine de votre site Ex.: ./folder1/folder4/login.php, si http://www.yoursite.com/folder1/folder4/login.php doit être exclus. Il est possible d'ajouter plusieurs données en les séparent par une virgule sans <b>espace</b>!
_P;

$tsep_lng['config_skip_symblinks'] = <<<_P
Ignorer les liens symboliques
_P;

$tsep_lng['config_skip_symblinks_help'] = <<<_P
Définit, si les liens symboliques doivent être ignorés lors d'une recherche par balayage de répertoire.
_P;

$tsep_lng['config_subdirs2index'] = <<<_P
Sous-répertoire qui doivent être indexés (laisser à blanc pour tous)
_P;

$tsep_lng['config_subdirs2index_help'] = <<<_P
Séparez chaque sous-répertoire par une nouvelle ligne et/ou une virgule. Chaque entrée est ajoutée au 'chemin des répertoires internet' et est utilisée pour trouver les fichiers.
_P;

$tsep_lng['config_fnExternalPhp'] = <<<_P
Entrez le nom du fichier php de la procédure externe:
_P;

$tsep_lng['config_fnExternalPhp_help'] = <<<_P
Ceci est le nom d'un fichier procédural .php-script hors TSEP, et en supplément les fichiers qui doivent être indexés (Ex.: crawler/spider.php - voir la documentation pour plus de détail
_P;

$tsep_lng['config_group_general'] = <<<_P
Général
_P;

$tsep_lng['config_group_lists'] = <<<_P
Listes
_P;

$tsep_lng['config_group_lists_colors'] = <<<_P
Couleurs
_P;

$tsep_lng['config_group_lists_limits'] = <<<_P
Limites
_P;

$tsep_lng['config_group_logging'] = <<<_P
notation
_P;

$tsep_lng['config_group_visible2enduser'] = <<<_P
Interface utilisateur
_P;

$tsep_lng['config_group_visible2enduser_range'] = <<<_P
Limites
_P;

$tsep_lng['config_group_visible2enduser_results'] = <<<_P
Résultats
_P;

$tsep_lng['config_group_visible2enduser_searchsuggest'] = <<<_P
Suggestion de recherche
_P;

$tsep_lng['config_group_visible2enduser_search'] = <<<_P
Recherche
_P;

$tsep_lng['config_Hour_Difference'] = <<<_P
Heure de différence entre le serveur et l'heure locale. Ajustez en conséquence
_P;

$tsep_lng['config_how_many_hints'] = <<<_P
Combien de suggestions de recherche doivent être affichées (O= aucune)?
_P;

$tsep_lng['config_show_nr_hits'] = <<<_P
Est-ce que le bloc de suggestion de recherche doit afficher le nombre de pages résultant d'une requête ?
_P;

$tsep_lng['config_show_popular'] = <<<_P
Est-ce que le bloc de suggestion de recherche doit afficher la popularité de la requête ?
_P;

$tsep_lng['config_calc_hits_method'] = <<<_P
Quelle méthode de calcul pour le nombre de pages trouvées ?
_P;

$tsep_lng['config_calc_hits_method_help'] = <<<_P
Lors de la création de l'historique d'une requête :<br /> 1 = Utiliser les résultats de la dernière requête de recherche<br /> 2 = Claculer la moyenne de toutes les requêtes<br /> 3 = Calculer le minimum de toutes les requêtes<br /> 4 = Calculer le maximum de toutes les requêtes.
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit'] = <<<_P
Combien de caractère seront-ils vu après le premier jet?
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit_help'] = <<<_P
Le résultat de la recherche va être uniquement une partie de l'index complet. Cette entrée définit combien de caractères seront visibles APRES le premier jet.
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit'] = <<<_P
Combien de caractère seront-ils vu avant le premier jet?
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit_help'] = <<<_P
Le résultat de la recherche va être uniquement une partie de l'index complet. Cette entrée définit combien de caractère seront vu AVANT le premier jet.
_P;

$tsep_lng['config_How_Many_Results'] = <<<_P
Si l'utilisateur ne peut pas placer un nombre de résultat, il veut dans ce cas, que cette valeur par défaut soit toujours utilisée? (l'utilisateur obtiendra alors des résultats <b>avant</b> qu'il n'obtienne la navigation de page)
_P;

$tsep_lng['config_How_Many_Sentences'] = <<<_P
Combien de blocs seront-ils montrés?
_P;

$tsep_lng['config_How_Many_Sentences_help'] = <<<_P
Le résultat de la recherche va être seulement une partie de l'index complet. Cette entrée definit combien de blocs seront affichés au maximum.
_P;

$tsep_lng['config_internal_notes'] = <<<_P
notes internes
_P;

$tsep_lng['config_internal_notes_help'] = <<<_P
Ce champ peut-être utilisé pour des notes internes. Elles sont visibles que dans la partie administrative de Tsep uniquement!
_P;

$tsep_lng['config_Language'] = <<<_P
Dans quelle langue voullez-vous que TSEP affiche ses messages? Example: Pour le Français = fr, l'Anglais = en, l'Allemand = de.
_P;

$tsep_lng['config_listFilenamesOnly'] = <<<_P
voir la liste des fichiers indexés uniquement
_P;

$tsep_lng['config_listFilenamesOnly_help'] = <<<_P
L'indexeur n'établit pas d'index, il liste simplement les fichiers qui seraient à indexer<br>En plus la liste affiche aussi les répertoires et fichiers <b>qui ne seront pas pris en compte</b>.
_P;

$tsep_lng['config_Logging'] = <<<_P
Vous voulez la notation à chaque fois? (A cocher si oui!)
_P;

$tsep_lng['config_Logging_IP'] = <<<_P
Adresses d'IP de notation? (A cocher si oui!)
_P;

$tsep_lng['config_Logging_result_links'] = <<<_P
Cliquez sur les notations dans les résultats de recherche? (A cocher si oui!)
_P;

$tsep_lng['config_Logging_search_term'] = <<<_P
Limites de recherche des notations? (A cocher si oui!)
_P;

$tsep_lng['config_max_hints'] = <<<_P
Nombre de termes de recherche marqué pour chaque phrase
_P;

$tsep_lng['config_max_hints_help'] = <<<_P
Ce nombre définit la quantité de crtières de recherche que chaque phrase devrait contenir au maximum.
_P;

$tsep_lng['config_max_length'] = <<<_P
Longueur maximum d'une phrase (en caractères)
_P;

$tsep_lng['config_max_length_help'] = <<<_P
Les phrases avec plus que le nombre défini de caractères ne seront pas affichées.
_P;

$tsep_lng['config_maxRows_completeindex'] = <<<_P
Combien de lignes d'index à afficher pour un document HTML ? attention de ne pas forcer cette valeur, car la page devient lourde!
_P;

$tsep_lng['config_maxRows_indexoverview'] = <<<_P
Combien de lignes d'index à afficher dans la présentation d'un document HTML? attention de ne pas forcer cette valeur, car la page devient lourde!
_P;

$tsep_lng['config_maxRows_logview'] = <<<_P
Combien de lignes voulez-vous avoir par affichage?
_P;

$tsep_lng['config_maxRows_Stopwords'] = <<<_P
Combien de mot vides voulez-vous voir par affichage?
_P;

$tsep_lng['config_Numbers_Put'] = <<<_P
Affiche le numéro de la page dans la liste? (A cocher si oui!)
_P;

$tsep_lng['config_Numbers_Put_After'] = <<<_P
Si nous montrons le numéro de la page dans la liste, le montrer après
_P;

$tsep_lng['config_Numbers_Put_Before'] = <<<_P
Si nous montrons le numéro de la page dans la liste, le montrer avant
_P;

$tsep_lng['config_Pagerank'] = <<<_P
Quel est le symbole du classement de votre page. Exemple: *. 
Vous pouvez aussi entrer du code HTML mais vous devez éviter les caractères spéciaux. 
Par exemple:  <�img src= "graphics/tsepranks-single.png" alt= "*"�>.
Attention: tout ce que vous entrez ici sera visible autant de fois qu'un mot recherché est localisé dans la page.
_P;

$tsep_lng['config_Pagerank_Number'] = <<<_P
Voulez-vous voir le nombre du classement? (A cocher si oui!)
_P;

$tsep_lng['config_parmsExternalPhp'] = <<<_P
Entrez le paramètre qui doit être envoyé au script qui produit les données:
_P;

$tsep_lng['config_parmsExternalPhp_help'] = <<<_P
Ce paramètre est rendu disponible pour être employé par la procédure externe (Ex.: un fichier HTML, là où le moteur devrait commencer sa recherche - lire la documentation pour plus de détails)
_P;

$tsep_lng['config_Path'] = <<<_P
Donnez le chemin de TSEP. (example: si le fichier search.php est localisé dans www.yourdomain.com/php/tsepsearch/search.php vous devrez le spécifier selon: 'php/tsepsearch')
_P;

$tsep_lng['config_print_list_of_files'] = <<<_P
Voir la liste des fichiers indexés
_P;

$tsep_lng['config_searchViaExt'] = <<<_P
L'indexeur doit il tourner la procédure/script
_P;

$tsep_lng['config_searchViaExt_help'] = <<<_P
L'indexeur lance le script procédural pour rechercher les fichiers qui doivent être indexés - Voir la documentation pour plus de détails
_P;

$tsep_lng['config_searchViaRead'] = <<<_P
L'indexeur doit il trouver les fichiers depuis le répertoire racine
_P;

$tsep_lng['config_searchViaRead_help'] = <<<_P
Demande à l'indexeur de rassembler les fichiers à indexer par l'intermédiaire du répertoire racine. Démarrez la demande ici en dessus (Mode classique TSEP-recherche)
_P;

$tsep_lng['config_Show_Record_Change'] = <<<_P
L'utilisateur peut-il donner un nombre de résultat qu'il veut voir par affichage? (A cocher si oui!')
_P;

$tsep_lng['config_word_offset'] = <<<_P
Nombre de mots affichés avant/après chaques termes de recherche
_P;

$tsep_lng['config_word_offset_help'] = <<<_P
Le résultat de la recherche sera seulement une partie du texte indexé complet. Cette valeur détermine combien de mots seront affichés avant et après chaque concordance.
_P;

$tsep_lng['config_Use_Debug_Print'] = <<<_P
Pour les programmeurs uniquement: utiliser les fonctions debugprint()? (A cocher si oui!)
_P;

$tsep_lng['config_XdirName'] = <<<_P
[Indexing-startdirectory] (optionnel, relatif de indexer.php ou absolu):
_P;

$tsep_lng['config_XdirName_help'] = <<<_P
La définition de l'"indexing-startdirectory" est demandée <strong>dans un cas spécial uniquement</strong> - normalement, <strong>laissez le simplement vide</strong>!<br>Si non vous devrier entrer une donnée dans ce style ../../ or www/htdocs/votre_compte/
_P;

$tsep_lng['config_Xwebdir'] = <<<_P
Entrez le chemin du répertoire WEB *:
_P;

$tsep_lng['config_Xwebdir_help'] = <<<_P
Ceci est le chemin du serveur WEB qui correspond aux classeurs (ou répertoires) Ici en dessous Ex.: http://www.sitename.com/folder1/folder2. Si tous les fichiers sur http://www.sitename.com sont correctement indexés l'entrée correcte doit être 'http://www.sitename.com'.
_P;

$tsep_lng['configuration'] = <<<_P
Configuration
_P;

$tsep_lng['copyright'] = <<<_P
Copyright
_P;

$tsep_lng['create_new_index'] = <<<_P
Créer un nouvel index
_P;

$tsep_lng['data_retrieved'] = <<<_P
Données récupérées de la base de données
_P;

$tsep_lng['day_friday'] = <<<_P
Vendredi
_P;

$tsep_lng['day_friday_short'] = <<<_P
Ven
_P;

$tsep_lng['day_monday'] = <<<_P
Lundi
_P;

$tsep_lng['day_monday_short'] = <<<_P
Lun
_P;

$tsep_lng['day_saturday'] = <<<_P
Samedi
_P;

$tsep_lng['day_saturday_short'] = <<<_P
Sam
_P;

$tsep_lng['day_sunday'] = <<<_P
Dimanche
_P;

$tsep_lng['day_sunday_short'] = <<<_P
Dim
_P;

$tsep_lng['day_thursday'] = <<<_P
Jeudi
_P;

$tsep_lng['day_thursday_short'] = <<<_P
Jeu
_P;

$tsep_lng['day_tuesday'] = <<<_P
Mardi
_P;

$tsep_lng['day_tuesday_short'] = <<<_P
Mar
_P;

$tsep_lng['day_wednesday'] = <<<_P
Mercredi
_P;

$tsep_lng['day_wednesday_short'] = <<<_P
Mer
_P;

$tsep_lng['delete'] = <<<_P
Supprimer
_P;

$tsep_lng['delete_file'] = <<<_P
supprime le fichier
_P;

$tsep_lng['transform'] = <<<_P
trasforme
_P;

$tsep_lng['details'] = <<<_P
détails
_P;

$tsep_lng['directory'] = <<<_P
répertoire
_P;

$tsep_lng['docorrectit'] = <<<_P
CORRIGEZ l'erreur <b>AVANT de continuer</b>!
_P;

$tsep_lng['error_from_extscript'] = <<<_P
erreur(s), retournée par une procédure externe
_P;

$tsep_lng['filename'] = <<<_P
nom de fichier
_P;

$tsep_lng['filter'] = <<<_P
filtre
_P;

$tsep_lng['forbidden_stopword'] = <<<_P
Attention: Dans vos critères de recherche, les mots vides suivants, sur la requète de l'administrateur, ne peuvent être recherchés (plus de détails à voir dans les "Aides à la recherche"):
_P;

$tsep_lng['found_no_pages'] = <<<_P
Aucune page trouvée.
_P;

$tsep_lng['group_level_gap'] = <<<_P
[group-level-definition]: le niveau du groupe doit être exactement à 1 et etre plus grand que le niveau du groupe précédent
_P;

$tsep_lng['help'] = <<<_P
Aide
_P;

$tsep_lng['help_copyright'] = <<<_P
Ceci ouvre une nouvelle fenêtre du butineur et va prendre la page TSEP à Sourgeforge.net
_P;

$tsep_lng['help_del_indexedpage'] = <<<_P
Etes vous sûr de vouloir détruire cette page de l'index (Enlève tout sur cette page dans la base de données)?
_P;

$tsep_lng['help_del_maxresult'] = <<<_P
Etes-vous sûr de supprimer ce résultat? 
_P;

$tsep_lng['help_del_stopword'] = <<<_P
Etes vous sûr de vouloir détruire ce mot d'arrêt?
_P;

$tsep_lng['help_first_page'] = <<<_P
A la première page
_P;

$tsep_lng['help_last_page'] = <<<_P
A la dernière page
_P;

$tsep_lng['help_next_page'] = <<<_P
A la prochaine page
_P;

$tsep_lng['help_previous_page'] = <<<_P
A la précédente page
_P;

$tsep_lng['if_problems_contact'] = <<<_P
Si vous avez toujours un problème avec votre recherche ou vous êtes peu satisfait des résultats obtenus, exposez nous votre problème en nous envoyant un courriel!
_P;

$tsep_lng['impossible_already_exists'] = <<<_P
impossible: ce nom exite déjà
_P;

$tsep_lng['index_edit_date'] = <<<_P
Dernière édition de l'Index:
_P;

$tsep_lng['index_edit_head'] = <<<_P
Edition de la donnée de l'index mémorisé
_P;

$tsep_lng['index_edit_title'] = <<<_P
Edition de l'Index (en détail)
_P;

$tsep_lng['editindex_last_edited'] = <<<_P
Dernière date d'édition:
_P;

$tsep_lng['editindex_not_edited'] = <<<_P
Pas édité
_P;

$tsep_lng['indexer_last_indexed'] = <<<_P
Dernière date de l'indexation
_P;

$tsep_lng['editindex_not_indexed'] = <<<_P
Pas indexé
_P;

$tsep_lng['index_overview_click_title'] = <<<_P
Cliquez ici pour éditer les détails de la page.
_P;

$tsep_lng['index_overview_click_url'] = <<<_P
Cliquez ici pour voir la page dans le butineur.
_P;

$tsep_lng['index_overview_head'] = <<<_P
Cliquez sur le titre de la page ou l'URL pour ouvrir en détail cette entrée.
_P;

$tsep_lng['index_overview_help'] = <<<_P
Info: Employez la fonction de recherche de votre browser pour trouver ce que vous recherchez
_P;

$tsep_lng['index_overview_title'] = <<<_P
Vue de l'Index (court)
_P;

$tsep_lng['indexed_words'] = <<<_P
Vue complète de l'index courant (peut-être long!)
_P;

$tsep_lng['indexer_title'] = <<<_P
Indexation
_P;

$tsep_lng['indexing_in'] = <<<_P
Indexation terminée en
_P;

$tsep_lng['indexing_on'] = <<<_P
Indexation terminée complètement
_P;

$tsep_lng['indexingprofile'] = <<<_P
Profile d'indexation
_P;

$tsep_lng['indexingprofile_unknown'] = <<<_P
Profile d'indexation n'existe pas: profilename
_P;

$tsep_lng['info_from_extscript'] = <<<_P
information(s), retournée(s) par une procédure externe
_P;

$tsep_lng['intErr'] = <<<_P
erreur interne
_P;

$tsep_lng['intErr_wrongfieldtype'] = <<<_P
Mauvaise définition de champs
_P;

$tsep_lng['is'] = <<<_P
sont
_P;

$tsep_lng['logview_contents'] = <<<_P
Fichiés accédés
_P;

$tsep_lng['logview_head'] = <<<_P
Tous les enregistrements de recherche qui correspondent entièrement aux critères de filtrage sont listés ci-dessous
_P;

$tsep_lng['logview_ip'] = <<<_P
IP
_P;

$tsep_lng['logview_no_IP'] = <<<_P
pas logé
_P;

$tsep_lng['logview_time_of_entry'] = <<<_P
Dates/heures
_P;

$tsep_lng['logview_title'] = <<<_P
Listes de recherche et ouvertures de page
_P;

$tsep_lng['logview_type'] = <<<_P
Type de recherche
_P;

$tsep_lng['logview_type_1'] = <<<_P
Terme de recherche
_P;

$tsep_lng['logview_type_2'] = <<<_P
Résultats cliquables
_P;

$tsep_lng['logview_IPresolved'] = <<<_P
Adresse IP résolue
_P;

$tsep_lng['logview_Stopwords'] = <<<_P
Mots vides
_P;

$tsep_lng['mandatory'] = <<<_P
* c'est un champ obligatoire ! Vous DEVEZ entrer une valeur!
_P;

$tsep_lng['match_case'] = <<<_P
case sensible
_P;

$tsep_lng['matches'] = <<<_P
résultats.
_P;

$tsep_lng['month_april'] = <<<_P
Avril
_P;

$tsep_lng['month_april_short'] = <<<_P
Avr
_P;

$tsep_lng['month_august'] = <<<_P
Août
_P;

$tsep_lng['month_august_short'] = <<<_P
Aou
_P;

$tsep_lng['month_december'] = <<<_P
Décembre
_P;

$tsep_lng['month_december_short'] = <<<_P
Dec
_P;

$tsep_lng['month_february'] = <<<_P
Fevrier
_P;

$tsep_lng['month_february_short'] = <<<_P
Fev
_P;

$tsep_lng['month_january'] = <<<_P
Janvier
_P;

$tsep_lng['month_january_short'] = <<<_P
Jan
_P;

$tsep_lng['month_july'] = <<<_P
Juillet
_P;

$tsep_lng['month_july_short'] = <<<_P
Jul
_P;

$tsep_lng['month_june'] = <<<_P
Juin
_P;

$tsep_lng['month_june_short'] = <<<_P
Jui
_P;

$tsep_lng['month_march'] = <<<_P
Mars
_P;

$tsep_lng['month_march_short'] = <<<_P
Mar
_P;

$tsep_lng['month_may'] = <<<_P
Mai
_P;

$tsep_lng['month_may_short'] = <<<_P
Mai
_P;

$tsep_lng['month_november'] = <<<_P
Novembre
_P;

$tsep_lng['month_november_short'] = <<<_P
Nov
_P;

$tsep_lng['month_october'] = <<<_P
Octobre
_P;

$tsep_lng['month_october_short'] = <<<_P
Oct
_P;

$tsep_lng['month_september'] = <<<_P
Septembre
_P;

$tsep_lng['month_september_short'] = <<<_P
Sep
_P;

$tsep_lng['more_than_four'] = <<<_P
Veuillez entrer votre recherche sur 4 caractères ou plus.
_P;

$tsep_lng['mysql_boolean_warning'] = <<<_P
Attention: En raison d'une vieille version de votre base de données, la recherche n'a pas employé les opérateurs booléens. Tous les mots que vous avez encodés doivent être reproduits dans le document afin de les trouver. Les opérateurs de recherche ne seront pas employés.
_P;

$tsep_lng['name_already_exists'] = <<<_P
ce nom existe déjà
_P;

$tsep_lng['name_is_empty'] = <<<_P
nom vide!
_P;

$tsep_lng['navigate_one_page_back'] = <<<_P
Retour à la précédente page
_P;

$tsep_lng['new_index_head'] = <<<_P
Un nouvel index à bien été créé!<br />En dessous les fichiers indexés
_P;

$tsep_lng['new_index_head_searching'] = <<<_P
Création du nouvel index...<br />Etres patient...
_P;

$tsep_lng['new_window'] = <<<_P
(nouvelle fenêtre)
_P;

$tsep_lng['no_records'] = <<<_P
Aucun enregistrement
_P;

$tsep_lng['none'] = <<<_P
aucun
_P;

$tsep_lng['nothing'] = <<<_P
rien
_P;

$tsep_lng['of'] = <<<_P
pour
_P;

$tsep_lng['old_index_head'] = <<<_P
En dessous la liste (ancienne) des fichiers indexés en base de données
_P;

$tsep_lng['only'] = <<<_P
seul
_P;

$tsep_lng['only_one_value'] = <<<_P
uniquement une valeur!
_P;

$tsep_lng['only_one_word'] = <<<_P
un mot uniquement!
_P;

$tsep_lng['page_file_size'] = <<<_P
Dimension de la page:
_P;

$tsep_lng['page_indexed_metawords'] = <<<_P
Mots généraux indexés:
_P;

$tsep_lng['page_indexed_words'] = <<<_P
Mots indexés:
_P;

$tsep_lng['page_nr_indexed_words'] = <<<_P
Mots:
_P;

$tsep_lng['page_number'] = <<<_P
Page nombre:
_P;

$tsep_lng['page_rank'] = <<<_P
x trouvé(s)
_P;

$tsep_lng['page_rank_help'] = <<<_P
Vos mots de recherche ont été trouvés dans cette page
_P;

$tsep_lng['page_rank_real'] = <<<_P
Classement de cette page (calculée par tous les résultats des mots de recherche dans le document)
_P;

$tsep_lng['page_title'] = <<<_P
Titre:
_P;

$tsep_lng['page_url'] = <<<_P
Lien URL:
_P;

$tsep_lng['pages_found'] = <<<_P
pages trouvées.
_P;

$tsep_lng['pages_indexed'] = <<<_P
pages indexées
_P;

$tsep_lng['pages_not_to_be_indexed'] = <<<_P
pages NON indexées
_P;

$tsep_lng['pages_to_be_indexed'] = <<<_P
pages à indexer
_P;

$tsep_lng['powered_by'] = <<<_P
fabriquée par
_P;

$tsep_lng['protect_indexentry'] = <<<_P
entrée d'indexation protégée (depuis la construction ou la suppression par l'indexeur):
_P;

$tsep_lng['protected_indexentry'] = <<<_P
entrée d'indexation protégée
_P;

$tsep_lng['really_delete'] = <<<_P
vraiment détruire?
_P;

$tsep_lng['records'] = <<<_P
Enregistrements
_P;

$tsep_lng['rename'] = <<<_P
renomer
_P;

$tsep_lng['results'] = <<<_P
Résultats
_P;

$tsep_lng['results_to_show_user'] = <<<_P
L'utilisateur peut choisir entre les nombres suivants de résultats qu'il veut voir par page:
_P;

$tsep_lng['save'] = <<<_P
sauvegarder
_P;

$tsep_lng['saveas'] = <<<_P
sauvegarder sous
_P;

$tsep_lng['search_tips'] = <<<_P
Information sur la recherche!
_P;

$tsep_lng['search_tips_desc'] = <<<_P
TSEP moteur de recherche, par défaut recherche tous les mots et affiche la page avec tous les mots trouvés. Le nombre minimum de caractère pour un mot de recherche est porté à 4 caractères. La liste ici en dessous est un exemple de recherche booléenne utilisée par TSEP.
_P;

$tsep_lng['search_tips_ex1'] = <<<_P
Pages trouvées qui contient au moin un mot.
_P;

$tsep_lng['search_tips_ex2'] = <<<_P
Pages trouvées qui contient les deux mots.
_P;

$tsep_lng['search_tips_ex3'] = <<<_P
mot "pomme", mais aussi s'il contient "macintosh".
_P;

$tsep_lng['search_tips_ex4'] = <<<_P
mot "pomme" mais pas "macintosh".
_P;

$tsep_lng['search_tips_ex5'] = <<<_P
"pomme" et "gâteau", ou "pomme" et "tarte" (dans n'importe quel ordre), mais le classement "gâteau aux pommes" plus grand que "tarte aux pommes".
_P;

$tsep_lng['search_tips_ex6'] = <<<_P
"pomme", "pommes", "purée de pommes", et "pommes". * représente 0 ou plus de caractères et doit seulement apparaitre à la fin d'un mot!
_P;

$tsep_lng['search_tips_ex7'] = <<<_P
Recherche dans les pages qui contiennent l'expression exacte "un mot" (par exemple, les pages qui contiennent "quelques mots de la sagesse" mais pas "quelques mots bruyants").
_P;

$tsep_lng['search_tips_head'] = <<<_P
Note pour utiliser TSEP efficacement
_P;

$tsep_lng['search_tips_help'] = <<<_P
ouvrir l'aide dans une nouvelle fenêtre
_P;

$tsep_lng['search_tips_se1'] = <<<_P
pomme banane
_P;

$tsep_lng['search_tips_se2'] = <<<_P
+pomme +banane
_P;

$tsep_lng['search_tips_se3'] = <<<_P
+pomme macintosh
_P;

$tsep_lng['search_tips_se4'] = <<<_P
+pomme -macintosh
_P;

$tsep_lng['search_tips_se5'] = <<<_P
+pomme +(>gâteau <tarte)
_P;

$tsep_lng['search_tips_se6'] = <<<_P
pomme*
_P;

$tsep_lng['search_tips_se7'] = <<<_P
"quelques mots"
_P;

$tsep_lng['search_tips_title'] = <<<_P
Conseil de recherche
_P;

$tsep_lng['search_took'] = <<<_P
La recherche à pris
_P;

$tsep_lng['search_what_are_stopwords'] = <<<_P
Un mot qui est dans la liste de mots d'arrêt ne sera pas recherchés. Les mots arrêts exprimés par l'administrateur sont:
_P;

$tsep_lng['searched_site_for'] = <<<_P
Recherche dans le site pour: 
_P;

$tsep_lng['seconds'] = <<<_P
secondes
_P;

$tsep_lng['separate_values_by_comma'] = <<<_P
séparer les multiples valeurs de définition par une virgule
_P;

$tsep_lng['show_it'] = <<<_P
voir
_P;

$tsep_lng['show_results_per_page'] = <<<_P
résultats visibles par page. Chaque changement recharge la page avec des nouvelles valeurs.
_P;

$tsep_lng['show_x_results_per_page'] = <<<_P
 / page
_P;

$tsep_lng['sim_index_head'] = <<<_P
Fichiers à indexer.<br />En dessous la liste des fichiers, qui doivent être indexés
_P;

$tsep_lng['sim_index_head_searching'] = <<<_P
Fichiers recherchés...<br />Etres patient...
_P;

$tsep_lng['skip_cause_protected_indexentry'] = <<<_P
les pages ne seront pas indexées (protégées par accord d'entrée d'indexation)
_P;

$tsep_lng['sort_asc'] = <<<_P
tri A->Z, descendant
_P;

$tsep_lng['sort_desc'] = <<<_P
tri Z->A, ascendant
_P;

$tsep_lng['start_indexing'] = <<<_P
Commencer l'indexation **
_P;

$tsep_lng['stopwords'] = <<<_P
Mots d'arrêt
_P;

$tsep_lng['stopwords_title'] = <<<_P
Mots d'arrêt
_P;

$tsep_lng['to'] = <<<_P
à
_P;

$tsep_lng['tsep'] = <<<_P
TSEP - The Search Engine Project (Projet de moteur de recherches)
_P;

$tsep_lng['type'] = <<<_P
type
_P;

$tsep_lng['update'] = <<<_P
mise à jour
_P;

$tsep_lng['value_already_exists'] = <<<_P
Valeur déjà existante
_P;

$tsep_lng['value_for'] = <<<_P
valeur pour
_P;

$tsep_lng['version'] = <<<_P
Cette version est
_P;

$tsep_lng['warning'] = <<<_P
** Veuillez cliquer dans "Créer un nouvel index" seulement une fois, ne fermez pas votre fenêtre de browser jusqu'à ce que le processus d'indexation soit fini. Également ne parcourez pas les exemples multiples de ce sélecteur. Si vous êtes relié à la table avec l'aide des outils d'entrée de MySQL ou avec phpMyadmin, débranchez les svp. Ces processus ralentissent sérieusement le procédé d'indexation
_P;

$tsep_lng['your_stopwords_head'] = <<<_P
Mots valides d'arrêt <br /> (ne peuvent pas être recherchés et ne seront pas indexé dans les résultats)
_P;

$tsep_lng['config_force_http_fileparse'] = <<<_P
Force l'analyse par l'intermédiaire de HTTP
_P;

$tsep_lng['config_force_http_fileparse_help'] = <<<_P
Employer "force l'analyse par l'intermédiaire de HTTP" a (au moins) deux avantages : le SSI-content est analysé et les URLs en dehors de votre portée locale peuvent être classés (c.-à-d. les fichiers, qui ne peuvent pas être lus directement par l'intermédiaire du local-fileopen). L'inconvénient majeur est, que le processus d'indexation sera ralenti à l'extrême!
_P;

$tsep_lng['error_while_parsing'] = <<<_P
Erreur(s) tout en lisant ou en analysant
_P;

$tsep_lng['delete_indexingprofiles_info'] = <<<_P
***Attention***: Tous les index seront effacés aussi, s'ils ne sont pas alloués aussi par d'autres profils d'index!
_P;

$tsep_lng['config_group_indexer_paths'] = <<<_P
Chemins
_P;

$tsep_lng['config_group_indexer_include_and_exclude'] = <<<_P
Exclure et inclure
_P;

$tsep_lng['config_group_indexer_external_datasupply'] = <<<_P
Source de données externe
_P;

$tsep_lng['config_group_indexer_indexing_mode'] = <<<_P
Mode d'indexation
_P;

$tsep_lng['config_group_indexer_indexing_modifiers'] = <<<_P
Modificateurs de d'indexation
_P;

$tsep_lng['config_group_indexer_miscellaneous'] = <<<_P
Divers
_P;

$tsep_lng['filter_filterbutton'] = <<<_P
Filtrer
_P;

$tsep_lng['filter_filterbutton_Remove_Filter'] = <<<_P
Oter le filtre
_P;

$tsep_lng['filter_logviewtype_all'] = <<<_P
Tous
_P;

$tsep_lng['filter_from'] = <<<_P
De:
_P;

$tsep_lng['filter_to'] = <<<_P
À:
_P;

$tsep_lng['filter_date_format'] = <<<_P
aaaa-mm-jj
_P;

$tsep_lng['filter_time_format'] = <<<_P
hh:mm:ss
_P;

$tsep_lng['logviewstats_title'] = <<<_P
Critère de recherche et pages consultées: Statistiques
_P;

$tsep_lng['logviewstats_head'] = <<<_P
Statistiques de l'historique
_P;

$tsep_lng['logviewstats_groupTotals'] = <<<_P
Totaux
_P;

$tsep_lng['logviewstats_groupDetails'] = <<<_P
Détails
_P;

$tsep_lng['logviewstats_groupTopX'] = <<<_P
Haut
_P;

$tsep_lng['logviewstats_groupTopAll'] = <<<_P
Toutes les entrées
_P;

$tsep_lng['logviewstats_DomainUnresolved'] = <<<_P
Non résolu
_P;

$tsep_lng['logviewstats_nrRecords'] = <<<_P
Enregistrements d'historique
_P;

$tsep_lng['logviewstats_nrSetupEntries'] = <<<_P
Installations et mises à jours
_P;

$tsep_lng['logviewstats_nrSearchQueries'] = <<<_P
Critères de recherche
_P;

$tsep_lng['logviewstats_nrClicks'] = <<<_P
Résultat des clicks
_P;

$tsep_lng['logviewstats_nrDomains'] = <<<_P
Domaines uniques
_P;

$tsep_lng['logviewstats_nrIPs'] = <<<_P
Adresses IP uniques
_P;

$tsep_lng['logviewstats_nrSearchwords'] = <<<_P
Mots de recherche unique
_P;

$tsep_lng['logviewstats_nrStopwords'] = <<<_P
Mots vides unique
_P;

$tsep_lng['logviewstats_topSearchqueries'] = <<<_P
Critères de recherche
_P;

$tsep_lng['logviewstats_topClicks'] = <<<_P
Résultat des clicks
_P;

$tsep_lng['logviewstats_topSearchwords'] = <<<_P
Mots de recherche unique
_P;

$tsep_lng['logviewstats_topStopwords'] = <<<_P
Mots vides unique
_P;

$tsep_lng['logviewstats_topIPs'] = <<<_P
Adresses IP uniques
_P;

$tsep_lng['logviewstats_topDomains'] = <<<_P
Domaines uniques
_P;

$tsep_lng['logviewstats_DrillDown'] = <<<_P
Cliquez ici pour agrandir (voir toutes les statistiques de cette sous-catégorie)
_P;

$tsep_lng['error_indexer_is_running'] = <<<_P
L'indexeur est entrain de travailler (ou quelque chose est peut-être en erreur). <br /> Attendre %d minutes et essayer.
_P;

$tsep_lng['warning_php_safe_mode_on'] = <<<_P
<b>ATTENTION: le paramètre safe_mode de PHP (php.ini) est activé!</b><br /> Le temps d'exécution maximum que vous placez dans l'écran de configuration ne fonctionnera pas comme il faut sur ce système.<br /> Ce paramètre PHP est fixé par l'administrateur de votre système pour un temps limite après %d minutes.
_P;

$tsep_lng['page_additional_info'] = <<<_P
Information additionnelle:
_P;

$tsep_lng['ss_search_term'] = <<<_P
Requête
_P;

$tsep_lng['ss_search_term_hover'] = <<<_P
Requêtes de recherche utilisées auparavant
_P;

$tsep_lng['ss_popular'] = <<<_P
Populaire
_P;

$tsep_lng['ss_popular_hover'] = <<<_P
Nombre de fois que la requête a été utilisée (popularité)
_P;

$tsep_lng['ss_returned_pages'] = <<<_P
RP
_P;

$tsep_lng['ss_returned_pages_hover'] = <<<_P
Nombre de pages correspondant à la requête
_P;

$tsep_lng['error_index_nothing'] = <<<_P
Vide (c-à-d rien à indexer): �
_P;

$tsep_lng['error_empty_files'] = <<<_P
Fichiers vides (c-à-d rien à indexer)
_P;

$tsep_lng['display_ranking'] = <<<_P
Affiche le classement avec des symboles
_P;

$tsep_lng['ranking_alt'] = <<<_P
Ecrivez un texte alternatif pour l'image
_P;

$tsep_lng['ranking_comments'] = <<<_P
Commentaires (uniquement internes)
_P;

$tsep_lng['ranking_image_text'] = <<<_P
Veuillez choisir le fichier image
_P;

$tsep_lng['ranking_submit'] = <<<_P
Envoyer le symbole
_P;

$tsep_lng['ranking_delete'] = <<<_P
Effacer le symbole
_P;

$tsep_lng['ranking_modify'] = <<<_P
Modifie l'image
_P;

$tsep_lng['help_del_ranking'] = <<<_P
Etes-vous sur de détruire cette image?
_P;

$tsep_lng['alert_mod_ranking'] = <<<_P
Vous ne pouvez modifier le pourcentage
_P;

$tsep_lng['help_mod_ranking'] = <<<_P
Etes-vous sur de modifier cette image?
_P;

$tsep_lng['ranking_range'] = <<<_P
Entrer un pas à afficher en pourcentage
_P;

$tsep_lng['ranking_image'] = <<<_P
image
_P;

$tsep_lng['ranking_url'] = <<<_P
affiche (cf. URL)
_P;

$tsep_lng['ranking_com'] = <<<_P
commentaires
_P;

$tsep_lng['ranking_alt_attrib'] = <<<_P
HTML ALT attribut
_P;

$tsep_lng['ranking_percent'] = <<<_P
L'étape en pourcentage
_P;

$tsep_lng['setup_Rollback_completed'] = <<<_P
Annulation terminée
_P;

$tsep_lng['setup_Unknown'] = <<<_P
Inconnu(e)
_P;

$tsep_lng['setup_Setup'] = <<<_P
Installation
_P;

$tsep_lng['setup_step1'] = <<<_P
1. Introduction
_P;

$tsep_lng['setup_step2'] = <<<_P
2. Création de la base de données
_P;

$tsep_lng['setup_step3'] = <<<_P
3. Vérification du système
_P;

$tsep_lng['setup_step4'] = <<<_P
4. Configuration
_P;

$tsep_lng['setup_step5'] = <<<_P
5. Installation
_P;

$tsep_lng['setup_step6'] = <<<_P
6. Résumé
_P;

$tsep_lng['setup_step7'] = <<<_P
7. Retour
_P;

$tsep_lng['setup_CancelButtonPressed'] = <<<_P
Vous avez cliqué sur le bouton "Annuler" pour arrêter l'installation de <span class="tsep">TSEP</span>.<br /><br /> Pourquoi avez-vous fait ça ? Êtes-vous conscient de ce que vous allez manquer ? <span class="tsep">TSEP</span> est sans aucun doute le meilleur moteur de recherche disponible sur le web!!<br /><br /> Ok ... C'est vous qui décidez! Mais notez bien que :<br /><br />cliquer sur le bouton "Arrêter" terminera l'installation et vous affichera la page de <span class="tsep">TSEP</span> sur Sourceforge. Tout changement effectué sur votre site web <b>ne</b> sera <b>pas</b> annulé.
_P;

$tsep_lng['setup_IwantToQuit'] = <<<_P
J'ai pris ma décision: je veux arrêter la procédure d'installation!
_P;

$tsep_lng['setup_Quit'] = <<<_P
Arrêter
_P;

$tsep_lng['setup_ContinueSetup'] = <<<_P
Continuer l'installation
_P;

$tsep_lng['setup_IwantToContinue'] = <<<_P
Désolé!, j'ai changé d'avis. Que l'installation reprenne...
_P;

$tsep_lng['setup_ToPreviousStep'] = <<<_P
Etape précédente
_P;

$tsep_lng['setup_Previous'] = <<<_P
Précédent
_P;

$tsep_lng['setup_Next'] = <<<_P
Suivant
_P;

$tsep_lng['setup_ToNextStep'] = <<<_P
Etape suivante
_P;

$tsep_lng['setup_IWantToQuitInstalling'] = <<<_P
Je veux arrêtes l'installation de TSEP.
_P;

$tsep_lng['setup_Cancel'] = <<<_P
Annuler
_P;

$tsep_lng['select_language'] = <<<_P
Section de votre langue favorite
_P;

$tsep_lng['setup_ThanksForConsidering'] = <<<_P
Merci d'envisager l'utilisation de <span class="tsep">TSEP</span>.<br /><br /> Vosu êtes en train d'installer <span class="tsep">TSEP</span>. Ce programme va vous aider à installer ou mettre à jour <span class="tsep">TSEP</span>. Sur la gauche de l'écran sont affichées les étapes à effectuer avant que l'installation ne soit terminée. Vous pourrez ainsi suivre la progression de l'installation en surveillant ces étapes.<br /><br /> Nous avons pris soin de sélectionner des options par défaut pour vous. Si c'est votre première installation, nous vous suggérons d'accepter les valeurs par défaut et de les modifier au fur et à mesure que vous apprenez l'utilisation de <span class="tsep">TSEP</span>. Si vous migrez d'une ancienne version de <span class="tsep">TSEP</span>, le programme recherchera d'abord vos anciens paramètres. Vous pourrez alors décider de les copier dans les nouveaux paramètres ou d'accepter les valeurs par défaut.<br /><br /> Nous espérons que <span class="tsep">TSEP</span> sera un outil efficace pour votre site web.<br /> Si vous avez des questions ou des commentaires, contactez)nous par le biais de notre forum à l'adresse:  <a href="http://sourceforge.net/projects/tsep/" target="blank">Site de SourceForge </a>.<br /><br />L'équipe de <span class="tsep">TSEP</span><br />
_P;

$tsep_lng['setup_DB_1'] = <<<_P
Entrez SVP les paramètres dont <span class="tsep">TSEP</span> a besoin pour accéder à votre base de données et vos scripts.
_P;

$tsep_lng['setup_DB_2_Host'] = <<<_P
Serveur de base de donnée:
_P;

$tsep_lng['setup_DB_2_Host_Help'] = <<<_P
Entrez l\'URL du serveur MySQL. Dans la plupart des cas, il s\'agit de \'localhost\'.<br /><br />Si vous avez des doutes, acceptez la valeur par défaut.
_P;

$tsep_lng['setup_DB_3_Username'] = <<<_P
Identifiant pour l'accès à la base de données:
_P;

$tsep_lng['setup_DB_3_Username_Help'] = <<<_P
C\'est l\'identifiant que vous utilisez pour vous connecter à MySQL.
_P;

$tsep_lng['setup_DB_4_Passwd'] = <<<_P
Mot de passe pour l'accès à la base de données:
_P;

$tsep_lng['setup_DB_4_Passwd_Help'] = <<<_P
Le mot de passe correspondant à l\'identifiant ci-dessus.
_P;

$tsep_lng['setup_DB_5_DBName'] = <<<_P
Nom de la base de données:
_P;

$tsep_lng['setup_DB_5_DBName_Help'] = <<<_P
Quel est le nom de la base de données que vous avez créé pour TSEP?
_P;

$tsep_lng['setup_DB_6_ForceCreation'] = <<<_P
Forcer la création de base de données
_P;

$tsep_lng['setup_DB_6_ForceCreation_Help'] = <<<_P
Si vous répondez OUI, le programme d\'installation va essayer de créer la base de données pour vous.<br /><br />Si la base de donnée existe déjà, le programme d\'installation ne la modifiera pas et continuera.
_P;

$tsep_lng['setup_Yes'] = <<<_P
Oui
_P;

$tsep_lng['setup_No'] = <<<_P
No
_P;

$tsep_lng['setup_DB_7_Prefix'] = <<<_P
Préfix des noms de table à utiliser:
_P;

$tsep_lng['setup_DB_7_Prefix_Help'] = <<<_P
Si votre serveur web ne vous permet l\'utilisation que d\'une seule base de données, vous pouvez forcer l\'unicité des noms de table en entrant un préfixe ici.<br /><br />Si vous avez des doutes, acceptez la valeur par défaut.
_P;

$tsep_lng['setup_DB_8_TSEP_Root'] = <<<_P
Répertoire racine de <span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_DB_8_TSEP_Root_Help'] = <<<_P
Le répertoire racine de TSEP, relativement à votre répertoire racine de documents.<br /><br /> Cette valeur est probablement correcte. Si vous ne connaissez pas le nom du répertoire, acceptez la valeur par défaut.
_P;

$tsep_lng['setup_DB_9_TSEP_AbsPath'] = <<<_P
Chemin absolu vers le répertoire racine de <br /><span class="tsep">TSEP</span>
_P;

$tsep_lng['setup_DB_9_TSEP_AbsPath_Help'] = <<<_P
C\'est le chemin absolu vers le répertoire racine de TSEP.<br /><br />Si vous ne connaissez pas le nom du répertoire, acceptez la valeur par défaut.
_P;

$tsep_lng['setup_DB_10_TSEP_TmpPath'] = <<<_P
Chemin absolu vers le répertoire temporaire de <br /><span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_DB_10_TSEP_TmpPath_Help'] = <<<_P
Le chemin absolu vers le répertoire temporaire de TSEP.<br /><br />il doit avoir l'autorisation d'écriture
_P;

$tsep_lng['setup_UnknownDBHost'] = <<<_P
Vous avez spécifié un serveur de base de données inconnu.<br />Veuillez corriger et recommencer.
_P;

$tsep_lng['setup_NoDBAccess'] = <<<_P
L'accès à la base de données n'est pas autorisé.<br /> L'identifiant ou le mot de passe (ou les 2) sont invalides.
_P;

$tsep_lng['setup_ConnectionDenied'] = <<<_P
Une erreur inconnue est survenue lors de la connexion à MySQL.<br />Êtes-vous tout ) fait sûr que MySQL est correctement installé ?<br />Les paramètres ci-dessous sont-ils corrects?
_P;

$tsep_lng['setup_DBNotExists'] = <<<_P
La base de données que vous avez spécifiée n'existe pas<br />et je ne peux pas la créer pour vous.
_P;

$tsep_lng['setup_DBNameWrong'] = <<<_P
Le nom de base de données que vous avez spécifié n'est pas correct<br />(la base de données n'exsite pas).
_P;

$tsep_lng['setup_DBUnknownError'] = <<<_P
Une erreur inconnue est survenue lors de la connection à la base de données.<br />Êtes-vous tout à fait sûr que MySQL est correctement installé?<br />Les paramètres ci-dessous sont-ils corrects ?
_P;

$tsep_lng['setup_TSEPRootWrong'] = <<<_P
Le répertoire racine de TSEP est incorrect.
_P;

$tsep_lng['setup_TSEPAbsPathWrong'] = <<<_P
Le chemin absolu vers le répertoire racine de TSEP est incorrect.
_P;

$tsep_lng['setup_TSEPTmpPathWrong'] = <<<_P
Le chemin absolu vers le répertoire temporaire de TSEP n'existe pas (c-à-d l'instruction mkdir() a échoué)
_P;

$tsep_lng['setup_TSEPTmpPathNotWritable'] = <<<_P
Le chemin absolu vers le répertoire temporaire de TSEP: impossible d'écrire dabs ce répertoire.
_P;

$tsep_lng['setup_HTAccessNotFound'] = <<<_P
Fichier .htaccess non trouvé
_P;

$tsep_lng['setup_OK'] = <<<_P
OK
_P;

$tsep_lng['setup_NoProtectionFound'] = <<<_P
Pas de clause de protection 
_P;

$tsep_lng['setup_Global_1'] = <<<_P
<b>Important:</b> Vous devez seulement exécuter cette étape si le programme d'installation est incapable d'écrire les paramètres de connexion à la base de données dans le fichier "/include/global.php".<br />
_P;

$tsep_lng['setup_Global_2'] = <<<_P
Veuillez effectuer les étapes suivantes pour appliquer correctement les corrections à votre fichier global.php actuel.<br />
_P;

$tsep_lng['setup_Global_3'] = <<<_P
Copiez les données dans le cadre ci-dessous.
_P;

$tsep_lng['setup_Global_3s1'] = <<<_P
Editez le fichier "/include/global.php" sur votre disque dur.
_P;

$tsep_lng['setup_Global_3s21'] = <<<_P
Remplacez le code entre les lignes de repère
_P;

$tsep_lng['setup_and'] = <<<_P
et
_P;

$tsep_lng['setup_Global_3s22'] = <<<_P
, vérifiez que vous n'avez pas remplacé les lignes de repère mais seulement les lignes entre celles-ci.
_P;

$tsep_lng['setup_Global_3s3'] = <<<_P
Sauvegarder votre fichier.
_P;

$tsep_lng['setup_Global_3s4'] = <<<_P
Copier le fichier dans votre repertoire /include de votre site web en écrasant l'ancien fichier.
_P;

$tsep_lng['setup_Global_3s5'] = <<<_P
Cliquez sur le bouton "suivant" dans le bas de la page.
_P;

$tsep_lng['setup_Global_4'] = <<<_P
Si tout s'est bien déroulé, vous pouvez continuer l'installation de <span class="tsep">TSEP</span> correctement.<br />
_P;

$tsep_lng['setup_patch_manually'] = <<<_P
Corriger à la main
_P;

$tsep_lng['setup_patch_manually_help'] = <<<_P
Si le programme d\'installation est incapable d\'enregister la connexion à la base de données, cliquez ici et suivez les instructions.
_P;

$tsep_lng['setup_warning'] = <<<_P
attention
_P;

$tsep_lng['setup_SysChk_1'] = <<<_P
Les vérifications du système ont révélé l'information suivante. Vérifiez avec soin et corrigez ce qui est nécessaire.<br />
_P;

$tsep_lng['setup_MySQL_version'] = <<<_P
Version de MySQL:
_P;

$tsep_lng['setup_MySQL_version_Help'] = <<<_P
La version de MySQL que vous avez installé doit être supérieure ou égale à la v3.23 pour pouvoir utiliser les fonctionnalités avancées de TSEP.<br /><br />Si vous voulez exiger le meilleur de TSEP, utilisez la version 4.1 ou supérieure.<br /><br />Nous ne pouvons garantir un fonctionnement correct avec des versions plus anciennes.
_P;

$tsep_lng['setup_PHP_version'] = <<<_P
Version de PHP:
_P;

$tsep_lng['setup_PHP_version_Help'] = <<<_P
TSEP a été testé correctement avec les version de PHP supérieures ou égales à la 4.2.<br /><br />Nous ne pouvons garantir un fonctionnement correct avec des versions plus anciennes.
_P;

$tsep_lng['setup_TSEP_oldver'] = <<<_P
Ancienne version de <span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_TSEP_oldver_Help'] = <<<_P
C\'est une simple information.<br/><br/>Elle monte la version de TSEP que vous mettez à jour (si présente).
_P;

$tsep_lng['setup_TSEP_newver'] = <<<_P
Nouvelle version de <span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_TSEP_newver_Help'] = <<<_P
C\'est une simple information.<br/><br/>Elle monte la version de TSEP en cours d\'installation.
_P;

$tsep_lng['setup_DB_Config_File'] = <<<_P
Fichier de configuration de la base de données:
_P;

$tsep_lng['setup_DB_Config_File_Help_1'] = <<<_P
Le fichier contenant les paramètres de connexion doit être modifiable pour que l\'installation fonctionne correctement.
_P;

$tsep_lng['setup_DB_Config_File_Help_2'] = <<<_P
Veuillez exécuter \'chmod\' pour fixer les propriétés du fichier \'include/global.php\' à 666.<br /><br />.Si le fichier n'est pas modifiable, vous pouvez continuer en cliquant sur \'Suivant\'. Le programme d\'installation essayera de changer les propriétés du fichier pour qu\'il soit modifiable.<br /><br />Si cela échoue, vous devrez utiliser le lien de déchargement pour obtenir les paramètres corrects. Veuillez alors suivre les instructions sur la page de déchargement.
_P;

$tsep_lng['setup_DB_Config_File_Writable'] = <<<_P
Modifiable
_P;

$tsep_lng['setup_DB_Config_File_UnWritable'] = <<<_P
Non-modifiable
_P;

$tsep_lng['setup_PHPSafeMode'] = <<<_P
Mode sécurisé de PHP(Safe mode):
_P;

$tsep_lng['setup_PHPSafeMode_Help'] = <<<_P
Si le mode sécurisé (Safe mode) de PHP est <b>activé (ON)</b>, quelques fonctionnalités de TSEP ne fonctionneront pas.<br /><br />Ca n\'est pas critique. Si vous n\'avez pas de bonne raison de changer ce paramètre, laissez-le tel quel.
_P;

$tsep_lng['setup_On'] = <<<_P
Activé
_P;

$tsep_lng['setup_Off'] = <<<_P
Déactivé
_P;

$tsep_lng['setup_Admin_area_security'] = <<<_P
Sécurité de la zone d'administration:
_P;

$tsep_lng['setup_Admin_area_security_Help'] = <<<_P
Il est hautement souhaitable de protéger la zone d\'administration avec un mot de passe en utilisant le fichier <i>.htaccess</i> (si votre serveur web est Apache).<br /><br /> Si vous ne la protégez pas, tout le monde pourra modifier vos paramètres.
_P;

$tsep_lng['setup_Protected'] = <<<_P
Protégé
_P;

$tsep_lng['setup_Include_dir_security'] = <<<_P
Sécurité du répertoire "include":
_P;

$tsep_lng['setup_Include_dir_security_Help'] = <<<_P
Il est hautement souhaitable de protéger le répertoire \'include\' en utilisant le fichier <i>.htaccess</i> (si votre serveur web est Apache).<br /><br /> Ne pas le protéger est un risque majeur pour la sécurité, vu que l\'identifiant et le mot de passe de la connexion à la base de donnée y est enregsitré.
_P;

$tsep_lng['setup_DBcfgUnwriteable'] = <<<_P
Le fichier de configuration de la connexion à la base de donnée est non-modifiable. Cliquez sur >corriger à la main< pour résoudre le problème.
_P;

$tsep_lng['setup_UpdateOrFresh'] = <<<_P
L'installation a besoin que vous preniez une décision. Ces paramètres détermineront ce qui sera copié de l'ancienne vers la nouvelle version (si applicable).<br />
_P;

$tsep_lng['setup_Fresh'] = <<<_P
Nouvelle installation (avec les valeurs par défaut):
_P;

$tsep_lng['setup_Fresh_Help'] = <<<_P
Si vous voulez installer une nouvelle copie de TSEP avec seulement les valeurs par défaut, sélectionnez <b>OUI</b> pour cette option . Le programme d\'installation ignorera tous les paramètres, profils, ... et installera seulement un TSEP de base.
_P;

$tsep_lng['setup_Update'] = <<<_P
Migrer de la version:
_P;

$tsep_lng['setup_Update_Help'] = <<<_P
Si vous mettez à jour TSEP et si vous souhaitez conserver vos paramètres, sélectionnez <b>OUI</b> pour cette option. Dans ce cas, le préfixe des tables doit être identique pour l\'ancienne et la nouvelle version.<br /><br />Si vous installez une nouvelle copie de TSEP ou que vous ne voulez pas écraser les anciennes tables, sélectionnez <b>NON</b>. Vérifiez que le préfixe de table est unique!
_P;

$tsep_lng['setup_CopyOld'] = <<<_P
Copiez l'ancienne configuration:
_P;

$tsep_lng['setup_CopyOld_Help'] = <<<_P
Si vous mettez à jour TSEP et que vous voulez préserver votre <u>configuration</u> précédente, sélectionnez <b>OUI</b>.<br /><br />Fonctionne uniquement si \'<i>Mettre à jour</i>\' est égal à OUI.
_P;

$tsep_lng['setup_CopyOldProfiles'] = <<<_P
Copier les vieux profils:
_P;

$tsep_lng['setup_CopyOldProfiles_Help'] = <<<_P
Si vous mettez à jour TSEP et que vous voulez préserver vos <u>profils</u> précédents, sélectionnez <b>OUI</b>.<br /><br />Fonctionne uniquement si \'<i>Mettre à jour</i>\' est égal à OUI.
_P;

$tsep_lng['setup_CopyOldIndexes'] = <<<_P
Copier les indexs précédents
_P;

$tsep_lng['setup_CopyOldIndexes_Help'] = <<<_P
Si vous mettez à jour TSEP et que vous voulez préserver vos <u>indexs</u> précédents,sélectionnez <b>OUI</b>.<br /><br />Si vous voulez copier les indexs, vous devez copier les profils aussiFonctionne uniquement si \'<i>Mettre à jour</i>\' est égal à OUI.
_P;

$tsep_lng['setup_CopyOldStopwords'] = <<<_P
Copies les mots vides précédents
_P;

$tsep_lng['setup_CopyOldStopwords_Help'] = <<<_P
Si vous mettez à jour TSEP et que vous voulez préserver vos anciens <u>mots vides</u> précédents, sélectionnez <b>OUI</b>.<br /><br />Fonctionne uniquement si \'<i>Mettre à jour</i>\' est égal à OUI.
_P;

$tsep_lng['setup_CopyOldLogs'] = <<<_P
Copier les historiques précédents:
_P;

$tsep_lng['setup_CopyOldLogs_Help'] = <<<_P
Si vous mettez à jour TSEP et que vous voulez préserver vos <u>historiques</u> précédents,sélectionnez <b>OUI</b>.<br /><br />Fonctionne uniquement si \'<i>Mettre à jour</i>\' est égal à OUI.
_P;

$tsep_lng['setup_CopyOldRankSymbols'] = <<<_P
Copier les symboles de classement:
_P;

$tsep_lng['setup_CopyOldRankSymbols_Help'] = <<<_P
Si vous mettez à jour TSEP et que vous voulez préserver vos <u>symboles de classement</u> précédents,sélectionnez <b>OUI</b>.<br /><br />Fonctionne uniquement si \'<i>Mettre à jour</i>\' est égal à OUI.
_P;

$tsep_lng['setup_IndicateNoUpdate'] = <<<_P
Vous avez indiqué ne pas souhaiter mettre à jour votre ancien système<br />mais vous avez spécifié un préfixe de table qui est identique à celui déjà utilisé.
_P;

$tsep_lng['setup_IndicateUpdate'] = <<<_P
Vous avez indiqué que vous souhaitiez mettre à jour votre ancien système<br />mais vous avez spécifié un préfixe de table qui est différent de celui déjà utilisé.
_P;

$tsep_lng['setup_Fatal_Error'] = <<<_P
Erreur fatale:
_P;

$tsep_lng['setup_Saving_old_tables'] = <<<_P
Sauvegarde des tables précédentes
_P;

$tsep_lng['setup_Can_not_open'] = <<<_P
Ne peut ouvrir
_P;

$tsep_lng['setup_Can_not_write_to'] = <<<_P
Ne peut écrire dans
_P;

$tsep_lng['setup_Copying_settings'] = <<<_P
Copie des paramètres
_P;

$tsep_lng['setup_Copying_indexes'] = <<<_P
Copie des indexs
_P;

$tsep_lng['setup_Copying_profile2index_links'] = <<<_P
Copie des liens profils/indexs
_P;

$tsep_lng['setup_Copying_profiles'] = <<<_P
Copie des profils
_P;

$tsep_lng['setup_Copying_log_entries'] = <<<_P
Copie des historiques
_P;

$tsep_lng['setup_Copying_log_hits'] = <<<_P
Copie des historiques de recherche
_P;

$tsep_lng['setup_Copying_stopwords'] = <<<_P
Copie des mots vides
_P;

$tsep_lng['setup_Copying_rank_symbols'] = <<<_P
Copie des symboles de classement
_P;

$tsep_lng['setup_Congratulations'] = <<<_P
Félicitations! L'installation s'est terminée correctement.
_P;

$tsep_lng['setup_Continue2Summary'] = <<<_P
Veuillez continuer vers l'écran de résumé pour conclure.
_P;

$tsep_lng['setup_PerformingInstallOfVer'] = <<<_P
Le programme effecture l'installation de la version de <span class=\"tsep\">TSEP</span>
_P;

$tsep_lng['setup_DoNotInterrupt'] = <<<_P
N'interrompez pas ce processus: vous obtiendriez alors une configuration invalide.<br />
_P;

$tsep_lng['setup_Progress'] = <<<_P
Progression:
_P;

$tsep_lng['setup_Deleting_old_tables'] = <<<_P
Effacement des tables précédentes
_P;

$tsep_lng['setup_Creating_new_tables'] = <<<_P
Création des nouvelles tables
_P;

$tsep_lng['setup_Populating_new_tables'] = <<<_P
Remplissage des nouvelles tables
_P;

$tsep_lng['setup_FinishedInstalling'] = <<<_P
Vous avez terminé l'installation de la version de <span class="tsep">TSEP</span>
_P;

$tsep_lng['setup_Summary_of_installation'] = <<<_P
Résumé de l'installation
_P;

$tsep_lng['setup_Settings'] = <<<_P
Paramètres
_P;

$tsep_lng['setup_records_copied'] = <<<_P
Enregistrements copiés
_P;

$tsep_lng['setup_records_copied_Zero'] = <<<_P
0 enregistrement copié
_P;

$tsep_lng['setup_Not_selected_for_update'] = <<<_P
Mise à jour non-sélectionnée
_P;

$tsep_lng['setup_Profiles'] = <<<_P
Profils:
_P;

$tsep_lng['setup_Indexes'] = <<<_P
Indexs:
_P;

$tsep_lng['setup_Stopwords'] = <<<_P
Mots vides:
_P;

$tsep_lng['setup_Logs'] = <<<_P
Historiques:
_P;

$tsep_lng['setup_Ranksymbols'] = <<<_P
Symboles de classement:
_P;

$tsep_lng['setup_Important'] = <<<_P
Important:
_P;

$tsep_lng['setup_Important_Delete'] = <<<_P
Souvenez-vous de <u>protéger</u> la <u>zone d'administration</u> et le <u>répertoire "include"</u> si vous ne l'avez pas encore fait. <u>Effacez</u> aussi le fichier  <u>/admin/setup.php</u> de telle manière que la configuration ne puisse pas être modifiée par des personnes malintentionnées.
_P;

$tsep_lng['setup_TakeMe2Config'] = <<<_P
Vers la configuration...
_P;

$tsep_lng['setup_Finish'] = <<<_P
Terminé
_P;

$tsep_lng['setup_Steps_1'] = <<<_P
Introduction
_P;

$tsep_lng['setup_Steps_2'] = <<<_P
Paramètres de connexion à la base de données
_P;

$tsep_lng['setup_Steps_3'] = <<<_P
Vérification du système
_P;

$tsep_lng['setup_Steps_4'] = <<<_P
Configuration
_P;

$tsep_lng['setup_Steps_5'] = <<<_P
Installation
_P;

$tsep_lng['setup_Steps_6'] = <<<_P
Résumé
_P;

$tsep_lng['setup_Steps_7'] = <<<_P
Retour
_P;

$tsep_lng['setup_NoURL2Preview'] = <<<_P
Aucune URL à pre-visualiser
_P;

$tsep_lng['setup_BeforeFinish'] = <<<_P
Avant de finir
_P;

$tsep_lng['setup_BeforeCancel'] = <<<_P
Avant d'annuler
_P;

$tsep_lng['setup_cancelText1'] = <<<_P
Nous voudrions recevoir quelques données statistiques. L'envoi de données statistiques est anonyme et optionel. La liste ci-dessous montre les données que nous voudrions collecter. Vous pouvez sélectionner les données que vous voulez nous envoyer ou décider de ne rien nous envoyer du tout.
_P;

$tsep_lng['setup_cancelText2'] = <<<_P
Si vous choississez d'envoyer les données et ainsi d'aider au déceloppement de TSEP, vous serez transféré vers le site www.tsep.info où les données seront enregistrées dans la base de données.
_P;

$tsep_lng['setup_finishText1'] = <<<_P
Nous voudrions recevoir quelques données statistiques anonymes. L'envoi des données est complètement anonyme et facultatif. La liste ci-dessous montre les données que nous voudrions rassembler. Vous pouvez choisir quelles données que voulez nous envoyer ou vous pouvez décider de rien envoyer du tout.
_P;

$tsep_lng['setup_finishText2'] = <<<_P
Si vous choisissez de soumettre des données et d'aider le développement de TSEP de cette façon, vous serez d'abord transféré à <a href=\"http://www.tsep.info\" target=\"blank\">www.tsep.info</a> où les données sont soumises à la base de données. Alors vous serez inscrit automatiquement à l'écran de configuration sur votre site Web pour commencer à travailler avec <span class=\"tsep\">TSEP</span>.<br />.
_P;

$tsep_lng['setup_finishText3'] = <<<_P
Notez que si vous décidez d'envoyer des données, votre URL sera transmis même si vous avez choisi de ne pas le soumettre. C'est parce que nous devons savoir où nous devons vous envoyer après inscription des statistiques. Dans ce cas-ci votre URL ne sera pas noté !
_P;

$tsep_lng['setup_finishText4'] = <<<_P
Au cas où vous décidez de n'envoyer aucune donnée, vous serez porté directement à l'écran de configuration sans se relier a la page d'accueil de TSEP. Dans les deux cas, le prochain écran que vous verrez dans votre navigateur est l'écran de configuration de votre installation de <span class=\"tsep\">TSEP</span>.
_P;

$tsep_lng['setup_Let_TSEP_Team_know'] = <<<_P
Ceci nous informera que vous avez installé TSEP avec succès.
_P;

$tsep_lng['setup_Let_TSEP_Team_know_Help'] = <<<_P
Ceci nous fera savoir que vous avez installé TSEP avec succès.
_P;

$tsep_lng['setup_Let_TSEP_Team_know2'] = <<<_P
Faites-nous savoir pourquoi vous avez annulé l'installation de <span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_Let_TSEP_Team_know2_Help'] = <<<_P
Ceci nous permettra de savoir que vous avez annulé l'installation de TSEP.
_P;

$tsep_lng['setup_NewVersion'] = <<<_P
Nouveau <span class="tsep">TSEP</span> version:
_P;

$tsep_lng['setup_NewVersion_Help'] = <<<_P
Ceci est la version de TSEP que vous venez d'installer.
_P;

$tsep_lng['setup_OldVersion'] = <<<_P
Ancienne <span class="tsep">TSEP</span> version:
_P;

$tsep_lng['setup_OldVersion_Help'] = <<<_P
La version de TSEP que vous avez remplacé (s'il y a)
_P;

$tsep_lng['setup_Referer'] = <<<_P
Notez votre référence :
_P;

$tsep_lng['setup_Referer_Help'] = <<<_P
Le domaine de votre site web. Nous voudrions l'enregistrer et prendre si possible une copie d'écran de votre site.<br /><br />Remarquez que si vous sélectionnez n'importe quelle autre option, votre URL est envoyée à notre site. Ce qui ne signifie pas que nous l'enregistrerons. Si vous choississez <b>NON</b>, nous ne la stockerons pas dans notre base de données. 
_P;

$tsep_lng['setup_NewsLetter'] = <<<_P
Souscrivez à nos nouvelles:
_P;

$tsep_lng['setup_NewsLetter_Help'] = <<<_P
So vous voulez souscrire à notre lettre de nouvelles pour être tenu au courant de nos toutes dernières nouvelles, entrez votre adresse e-mail ici.<br /><br/> Si vous n'êtes pas intéressé, ne remplissez pas ce champ.<br /><br/>N.B. : pour annuler votre souscription, allez sur notre site web. Ce champ est destiné seulement aux inscriptions.
_P;

$tsep_lng['setup_Comment'] = <<<_P
Commentaires:
_P;

$tsep_lng['setup_Comment_Help'] = <<<_P
Si vous voulez encore ajouter quelque chose qui pourrait nous aider, tapez votre commentaire ici.
_P;

$tsep_lng['setup_Why_Aborted'] = <<<_P
Raison de l'annulation:
_P;

$tsep_lng['setup_Why_Aborted_Help'] = <<<_P
Nous voudrions réellement savoir pourqui vous avez arrêté l'installation. Vos commentaires nous aidrons à améliorer TSEP pour qu'il correspnde mieux à vos besoins.
_P;

$tsep_lng['setup_URLPreview'] = <<<_P
L'URL que vous nous envoyez:
_P;

$tsep_lng['setup_JavaScriptEnabled'] = <<<_P
Javascript doit être activé pour que cet aperçu fonctionne
_P;

$tsep_lng['indexer_started_indexer'] = <<<_P
Indexeur démarré
_P;

$tsep_lng['indexer_started_searching'] = <<<_P
Recherche de fichiers...
_P;

$tsep_lng['indexer_started_building'] = <<<_P
Contruction de l'index (pour %d fichiers)...
_P;

$tsep_lng['XdirName_wrongpath'] = <<<_P
Le répertoire de départ de l'indexeur n'existe pas : <b>%s</b>
_P;

$tsep_lng['contentimgs'] = <<<_P
Contenu d'image
_P;

$tsep_lng['contentimg'] = <<<_P
Contenu d'image
_P;

$tsep_lng['contentimgs_not_used'] = <<<_P
Contenu d'image (pas utilisé dans cette version de TSEP installation)
_P;

$tsep_lng['contentimg_defaultimage'] = <<<_P
Contenu d'image (image par défaut)
_P;

$tsep_lng['contentimg_url_assoc_image'] = <<<_P
Contenu d'image (page d'association de l'image)
_P;

$tsep_lng['contentimg_filelists'] = <<<_P
Contenu d'image liste de fichiers
_P;

$tsep_lng['contentimg_filelist'] = <<<_P
Contenu d'image liste de fichiers
_P;

$tsep_lng['contentimg_filelists_descr'] = <<<_P
Choisir une action sur un Contenu d'image existant d'indexation de fichiers: <br /> - clic gauche donne le nom  lien pour aller voir dans le dossier (ouvert dans une nouvelle fenêtre)<br /> - clic droit sur le nom et sauvegarde le fichier pour une action ultérieure<br /> - détruit le fichier<br /> - transforme le fichier
_P;

$tsep_lng['contentimg_filelist_rebuild'] = <<<_P
Manuellement créée la liste de fichier du Contenu d'image, depuis la page courante indexée
_P;

$tsep_lng['contentimg_filelist_autobuild'] = <<<_P
créée automatiquement par l'indexeur.
_P;

$tsep_lng['contentimg_filelist_manuallybuilt'] = <<<_P
créé manuellement (indexing-profile '%s', for '%s')
_P;

$tsep_lng['for_iprofile'] = <<<_P
pour indexer le profile
_P;

$tsep_lng['all_pages'] = <<<_P
toutes les pages
_P;

$tsep_lng['pages_having_no_contentimg'] = <<<_P
pages n'ayant pas de Contenu d'image
_P;

$tsep_lng['currently_experimental'] = <<<_P
(EXPERIMENTAL courant)
_P;

$tsep_lng['modified_created'] = <<<_P
a modifier/créer
_P;

$tsep_lng['configure'] = <<<_P
Configurer
_P;

$tsep_lng['name'] = <<<_P
Nom
_P;

$tsep_lng['manage'] = <<<_P
Gérer
_P;

$tsep_lng['comment'] = <<<_P
commentaire
_P;

$tsep_lng['upload'] = <<<_P
Charger
_P;

$tsep_lng['upload_complete'] = <<<_P
Chargement complêt!
_P;

$tsep_lng['delete_complete'] = <<<_P
Fichier détruit avec succès
_P;

$tsep_lng['err_deleting_file'] = <<<_P
Fichier non détruit!
_P;

$tsep_lng['err_fopen_append'] = <<<_P
Erreur d'ouverture pour appondre dans: %s
_P;

$tsep_lng['err_fwrite'] = <<<_P
Erreur d'écriture dans le fichier : %s
_P;

$tsep_lng['stat_indexer_wrote_contentimg'] = <<<_P
%s enregistrement(s) écrit(s) dans ContentImage list de fichier %s
_P;

$tsep_lng['stat_indexer_nowrite_contentimg'] = <<<_P
Rien d'écrit dans ContentImage liste de fichiers: %s
_P;

$tsep_lng['back'] = <<<_P
retour
_P;

$tsep_lng['contentimg_filelistTF'] = <<<_P
Transformation %d de la liste des fichiers de contenu d'image
_P;

$tsep_lng['close'] = <<<_P
ferme
_P;

$tsep_lng['run'] = <<<_P
Tourne
_P;

$tsep_lng['destdirectory_does_not_exist'] = <<<_P
Le répertoire de destination n'existe pas
_P;

$tsep_lng['directory_does_not_exist'] = <<<_P
Le répertoire n'existe pas
_P;

$tsep_lng['file_does_not_exist'] = <<<_P
Le fichier n'existe pas
_P;

$tsep_lng['not_defined_in_databse'] = <<<_P
%s pas définit (vide) en base de données
_P;

$tsep_lng['err_upload_err_ini_size'] = <<<_P
Le volume de fichier excède la définition de php.ini upload_max_filesize de %s
_P;

$tsep_lng['err_upload_err_form_size'] = <<<_P
Le volume de fichier excède max_filesize de %d
_P;

$tsep_lng['err_upload_err_partial'] = <<<_P
Fichier incomplètement chargé
_P;

$tsep_lng['err_upload_err_no_file'] = <<<_P
Rien de chargé
_P;

$tsep_lng['err_upload_err_undefined'] = <<<_P
Chargement terminé avec l'erreur %d
_P;

$tsep_lng['err_upload_mimetype'] = <<<_P
Mauvais mimetype du fichier chargé: %s
_P;

$tsep_lng['err_upload_zerosize'] = <<<_P
Chargement nulle (mauvais non de fichier)
_P;

$tsep_lng['err_upload_moving_tmpfile'] = <<<_P
Chargement erronné lors du déplacement du fichier temporaire (Il est possible qu'il manque la permission d'écrire dans le répertoire de destination)
_P;

$tsep_lng['destinationfile'] = <<<_P
Fichier de destination
_P;

$tsep_lng['send_this_file'] = <<<_P
Envoyer ce fichier
_P;

$tsep_lng['delete_this_file'] = <<<_P
Détruire ce fichier
_P;

$tsep_lng['wrong_fileext'] = <<<_P
Mauvaise extension de fichier: %s
_P;

$tsep_lng['fileext_mismatch'] = <<<_P
Extension de fichier %s demandée à l'instar de: %s
_P;

$tsep_lng['config_group_configcontentimg_basicdefs'] = <<<_P
Définitions basiques
_P;

$tsep_lng['config_configcontentimg_mode'] = <<<_P
Utilise le contenu d'image
_P;

$tsep_lng['config_configcontentimg_mode_help'] = <<<_P
Permute marche/arrêt l'utilisation du contenu d'image dans votre installation TSEP. La permutation "arrêt" N'ENLEVE PAS LES FICHIERS D'IMAGES!
_P;

$tsep_lng['config_group_configcontentimg_basicdefs_paths'] = <<<_P
Chemins
_P;

$tsep_lng['config_group_configcontentimg_basicdefs_image'] = <<<_P
Images
_P;

$tsep_lng['config_configcontentimg_webpath'] = <<<_P
Chemin-images pour l'accès Web
_P;

$tsep_lng['config_configcontentimg_webpath_help'] = <<<_P
Chemin absolu d'images, où les images contentenues peuvent être trouvées tout en montrant les résultats (équivalent au chemin d'images pour l'accès du script PHP)
_P;

$tsep_lng['config_configcontentimg_abspath'] = <<<_P
Chemin des images pour l'accès au script PHP
_P;

$tsep_lng['config_configcontentimg_abspath_help'] = <<<_P
Chemin (physique) absolut au répertoire d'images, pour être accessible par l'intermédiaire des manuscrits de php (équivalents au chemin d'images pour l'accès Web).
_P;

$tsep_lng['config_configcontentimg_webpath_flists'] = <<<_P
Chemin racine pour le contenu image. Listes de Fichier pour l'accès WEB.
_P;

$tsep_lng['config_configcontentimg_webpath_flists_help'] = <<<_P
Chemin absolu vers le répertoire, où les listes de fichiers de contenu d'image et les transformations doivent être générées. Les squelettes de transformation de la liste de fichiers de contenu d'image doivent être situées dans un sous-répertoire appelé 'transformation_templates'. Plus d'informations sur la liste des fichiers de contenu d'image et sur les paramètres de transformation plus bas.
_P;

$tsep_lng['config_configcontentimg_abspath_flists'] = <<<_P
Chemin racine pour le contenu image des fichiers pour l'accès de Web
_P;

$tsep_lng['config_configcontentimg_abspath_flists_help'] = <<<_P
Chemin absolu (physique) vers le répertoire, où les listes de fichiers de contenu d'image et les transformations doivent être générées. Les squelettes de transformation de la liste de fichiers de contenu d'image doivent être situées dans un sous-répertoire appelé 'transformation_templates'. Plus d'informations sur la liste des fichiers de contenu d'image et sur les paramètres de transformation plus bas.
_P;

$tsep_lng['config_configcontentimg_imageext'] = <<<_P
Extension de nom de fichier d'image (<b>ne pas changer</b>, si des images existent déjà!)
_P;

$tsep_lng['config_configcontentimg_imageext_help'] = <<<_P
Utilisez de préférence '.jpeg', '.jpg' ou '.png'. NE CHANGEZ PAS, si des images existent déjà, parce que ces images ne seront plus alors trouvées par la suite!!!
_P;

$tsep_lng['config_configcontentimg_FnDefaultImage'] = <<<_P
Image par défaut
_P;

$tsep_lng['config_configcontentimg_FnDefaultImage_help'] = <<<_P
Cette image est utilisée, si le contenu d'image doit être affiché, alors qu'aucune image est définie pour cette page trouvée. Si vous avez défini une image par défaut, mais que près de la mention "Image par défaut", vous voyez le nom de fichier au lieu de l'image elle-même, c'est parce que le nom ou le chemin du fichier est incorrect.
_P;

$tsep_lng['config_configcontentimg_maxX'] = <<<_P
largeur maximale d'affichage
_P;

$tsep_lng['config_configcontentimg_maxX_help'] = <<<_P
Défini la largeur d'affichage maximum du contenu de l'image en pixel. Pour conserver les proportions, la largeur réelle utilisée peut être plus petite (suivant les proportions de l'image et du paramètre "hauteur maximale"). Des images qui sont plus petites que la largeur ou la hauteur maximale d'affichage ne sont pas modifiées.
_P;

$tsep_lng['config_configcontentimg_maxY'] = <<<_P
hauteur maximale d'affichage
_P;

$tsep_lng['config_configcontentimg_maxY_help'] = <<<_P
Défini la hauteur d'affichage maximum du contenu de l'image en pixel. Pour conserver les proportions, la hauteur réelle utilisée peut être plus petite (suivant les proportions de l'image et du paramètre "largeur maximale"). Des images qui sont plus petites que la largeur ou la hauteur maximale d'affichage ne sont pas modifiées.
_P;

$tsep_lng['config_group_configcontentimg_indexer'] = <<<_P
Sélection d'indexation
_P;

$tsep_lng['config_configcontentimg_create_flists'] = <<<_P
L'indexeur devrait créer les listes des dossiers d'image
_P;

$tsep_lng['config_configcontentimg_create_flists_help'] = <<<_P
Si cette option n'est pas activée, l'indexeur de créera pas de liste de fichiers de contenu d'image. Attention: la création manuelle de liste de fichiers de contenu d'image est toujours possible!
_P;

$tsep_lng['config_configcontentimg_having_no_contentimg'] = <<<_P
Seulement pour des pages n'ayant aucune contenu
_P;

$tsep_lng['config_configcontentimg_having_no_contentimg_help'] = <<<_P
Une entrée dans liste de fichiers de contenu d'image est unique écrite, si aucun contenu d'image n'existe pour la page indexée.
_P;

$tsep_lng['config_configcontentimg_autorun_flisttrans'] = <<<_P
Executez automatiquement la transformation
_P;

$tsep_lng['config_configcontentimg_autorun_flisttrans_help'] = <<<_P
Si cette option est alimentée, la transformation est exécutée automatiquement après indexation (le sélecteur devrait créer les listes contentes de dossier d'image doit être alimenté aussi !)
_P;

$tsep_lng['config_group_configcontentimg_extdefs'] = <<<_P
Définitions étendues
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flists'] = <<<_P
Listes de fichiers contenu d'image
_P;

$tsep_lng['config_group_configcontentimg_extdefs_fliststrans'] = <<<_P
Transformations
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flisttrans1'] = <<<_P
Transformation 1
_P;

$tsep_lng['config_configcontentimg_flisttrans1_template_filename'] = <<<_P
Nom du fichier temporaire
_P;

$tsep_lng['config_configcontentimg_flisttrans1_template_filename_help'] = <<<_P
Nom de fichier du squelette devant être utilisé pour la transformation 1 (ce nom est utilisé pour construire partiellement le nom du fichier de sortie). Attention: l'extension du nom de fichier est aussi utilisée comme extension du nom de fichier en sortie! Donc, s'il n'est pas défini correctement, les fichiers de la transformation 1 ne seront pas visibles ci-dessous dans la liste des fichiers de contenu de l'image.
_P;

$tsep_lng['config_configcontentimg_flisttrans1_active'] = <<<_P
Actif
_P;

$tsep_lng['config_configcontentimg_flisttrans1_active_help'] = <<<_P
Si la transformation est exécutée, la transformation 1 sera incluse. (si la transformation 1 et 2 ne sont pas active - aucune transformation ne sera faite)
_P;

$tsep_lng['config_configcontentimg_flisttrans1_internal_notes'] = <<<_P
Note interne de transformation 1
_P;

$tsep_lng['config_configcontentimg_flisttrans1_internal_notes_help'] = <<<_P
Actif, ce champ peut être employé pour des notes internes.
_P;

$tsep_lng['config_configcontentimg_flisttrans1_comment'] = <<<_P
Les lignes de commentaire commencent par
_P;

$tsep_lng['config_configcontentimg_flisttrans1_comment_help'] = <<<_P
Définissez un texte à employer en tant que 'préfixe' pour les lines de commentaire (par exemple l'utilisation du caractère: '#', pour procédures exécutables Unix ou le 'rem' pour les procédures exécutables DOS)
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flisttrans2'] = <<<_P
Transformation 2
_P;

$tsep_lng['config_configcontentimg_flisttrans2_template_filename'] = <<<_P
Nom du fichier temporaire
_P;

$tsep_lng['config_configcontentimg_flisttrans2_template_filename_help'] = <<<_P
Nom de fichier du squelette devant être utilisé pour la transformation 2 (ce nom est utilisé pour construire partiellement le nom du fichier de sortie). Attention: l'extension du nom de fichier est aussi utilisée comme extension du nom de fichier en sortie! Donc, s'il n'est pas défini correctement, les fichiers de la transformation 2 ne seront pas visibles ci-dessous dans la liste des fichiers de contenu de l'image.
_P;

$tsep_lng['config_configcontentimg_flisttrans2_active'] = <<<_P
Actif
_P;

$tsep_lng['config_configcontentimg_flisttrans2_active_help'] = <<<_P
Si la transformation est exécutée, la transformation 2 sera ausi incluse. (Si les transformations 1 et 2 ne sont pas activées, alors aucune transormation ne sera effectuée)
_P;

$tsep_lng['config_configcontentimg_flisttrans2_internal_notes'] = <<<_P
Note interne de transformation 2
_P;

$tsep_lng['config_configcontentimg_flisttrans2_internal_notes_help'] = <<<_P
Actif, ce champ peut être employé pour des notes internes.
_P;

$tsep_lng['config_configcontentimg_flisttrans2_comment'] = <<<_P
Les lignes de commentaire commencent par
_P;

$tsep_lng['config_configcontentimg_flisttrans2_comment_help'] = <<<_P
Définit une chaîne de caractères utilisées comme préfixe pour les lignes de commentaires (c-à-d utilisez '#' pour des transformations pour des fichiers de commandes UNIX ou 'REM' pour des transformation dans des fichiers de commande DOS)
_P;

$tsep_lng['stopwords_GetStop'] = <<<_P
Prendre les mots d'arrêts
_P;

$tsep_lng['stopwords_GetStop_Info'] = <<<_P
Entrez le nombre de mots d'arrêts pour la recherche.
_P;

$tsep_lng['stopwords_NewStopwords'] = <<<_P
Mots d'arrêts additionnés:
_P;

$tsep_lng['stopwords_RetreiveNew'] = <<<_P
(nouveaux mots d'arrêts recherchés uniquement)
_P;

$tsep_lng['stopwords_Occurrences'] = <<<_P
Occurences
_P;

?>
