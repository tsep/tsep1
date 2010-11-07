-- following will be filled automatically by SubVersion!
-- Do not change by hand!
-- $LastChangedDate: 2005-08-27 16:04:08 +0200 (Sa, 27 Aug 2005) $
-- @lastedited $LastChangedBy: manfred $
-- $LastChangedRevision: 296 $
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (   1,'tsepdatabaseversion','nothing in here',0.941,NULL,'n','float','internal',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (   2,'tsepversion','0.942-278 (WCREV)',NULL,NULL,'s','text','internal',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (   3,'tsepindexeditdate','1103027751',NULL,NULL,'s','text','internal',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (   4,'tseplogorder','timeofentry',NULL,NULL,'s','text','internal',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (   5,'tseplogdirection','DESC',NULL,NULL,'s','text','internal',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (   6,'tsepindexovervieworder', 'protect_indexentry',  NULL,NULL,'s','text','internal',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (   7,'tsepindexoverviewdirection', 'DESC', NULL,NULL,'s','text','internal',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (  10,'indexer_starttime',NULL,0,NULL,'s','long','internal',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (  30,'possible_results',NULL,5,NULL,'n','long','possible_results',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (  31,'possible_results',NULL,10,NULL,'n','long','possible_results',2);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (  32,'possible_results',NULL,20,NULL,'n','long','possible_results',3);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (  33,'possible_results',NULL,30,NULL,'n','long','possible_results',4);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (  34,'possible_results',NULL,50,NULL,'n','long','possible_results',5);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (  35,'possible_results',NULL,100,NULL,'n','long','possible_results',6);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 100,'group_general','block',NULL,100,'s','group level 1','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 110,'Language','en_US',NULL,110,'s','special language','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 120,'Path','',NULL,120,'s','special path r/o','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 121,'absPath','',NULL,121,'s','special abspath r/o','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 124,'tmpPath','',NULL,124,'s','text size=\"80\" maxlength=\"250\"','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 130,'Hour_Difference','0',NULL,130,'s','long','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 140,'Date_Style','l, d. F Y, G:i',NULL,140,'s','text size=\"80\" maxlength=\"250\"','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 150,'check_file_exists','true',NULL,150,'s','boolean','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 160,'Use_Debug_Print','false',NULL,160,'s','boolean','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 170,'group_lists','block',NULL,170,'s','group level 1','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 185,'group_lists_limits','block',NULL,185,'s','group level 2','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 190,'maxRows_completeindex','20',NULL,190,'s','long','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 200,'maxRows_indexoverview','100',NULL,200,'s','long','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 210,'maxRows_Stopwords','100',NULL,210,'s','long','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 220,'maxRows_logview','100',NULL,220,'s','long','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 230,'group_lists_colors','block',NULL,230,'s','group level 2','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 240,'Color_1','#99CCFF',NULL,240,'s','color','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 250,'Color_2','#CCCCCC',NULL,250,'s','color','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 260,'group_logging','block',NULL,260,'s','group level 1','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 270,'Logging','true',NULL,270,'s','boolean','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 280,'Logging_search_term','true',NULL,280,'s','boolean','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 290,'Logging_result_links','true',NULL,290,'s','boolean','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 300,'Logging_IP','true',NULL,300,'s','boolean','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 310,'group_visible2enduser','block',NULL,310,'s','group level 1','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 325,'group_visible2enduser_results','block',NULL,325,'s','group level 2','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 330,'Show_Record_Change','true',NULL,330,'s','boolean','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 340,'How_Many_Results','10',NULL,340,'s','long','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 343,'How_Many_Sentences',NULL,'3',343,'n','long','config',NULL);

INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 345, 'word_offset', NULL, 5, 345, 'n', 'long', 'config', NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 346, 'max_hints', NULL, 2, 346, 'n', 'long', 'config', NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 347, 'max_length', NULL, 250, 347, 'n', 'long', 'config', NULL);

-- INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 345,'How_Many_CharsBefore_Hit',NULL,'50',345,'n','long','config',NULL);
-- INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 347,'How_Many_CharsAfter_Hit',NULL,'50',347,'n','long','config',NULL);

-- ********************************************************************************
-- 2005-07-08/TG
-- 
-- Removed for the 0.942 release.
-- This functionality isn't stable yet.
-- the code will be activated in 0.943
-- 
-- 
-- INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 348,'group_visible2enduser_searchsuggest','block',NULL,348,'s','group level 2','config',NULL);
-- INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 349,'how_many_hints','10',NULL,349,'s','long','config',NULL);
-- INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 350,'show_nr_hits','true',NULL,350,'s','boolean','config',NULL);
-- INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 351,'show_popular','true',NULL,351,'s','boolean','config',NULL);
-- INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 352,'calc_hits_method','1',NULL,352,'s','long','config',NULL);
-- ********************************************************************************/

INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 359,'group_visible2enduser_range','block',NULL,359,'s','group level 2','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 360,'Numbers_Put','true',NULL,360,'s','boolean','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 370,'Numbers_Put_Before','(',NULL,370,'s','text size=\"80\" maxlength=\"250\"','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 380,'Numbers_Put_After','.)',NULL,380,'s','text size=\"80\" maxlength=\"250\"','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 390,'Pagerank_Number','true',NULL,365,'s','boolean','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 400,'Pagerank',NULL,NULL,400,'s','textarea cols=\"80\" rows=\"1\"','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 410,'group_visible2enduser_search','block',NULL,410,'s','group level 2','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 420,'Display_Boolean_Search','true',NULL,420,'s','boolean','config',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES ( 700,'current_iprofile',NULL,1,NULL,'n','long','iprofile',NULL);


INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1000,'group_indexer_paths','block',NULL,10,'s','group level 1','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1010,'Xwebdir',NULL,NULL,20,'s','text size=\"80\" maxlength=\"250\"','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1020,'XdirName',NULL,NULL,30,'s','text size=\"80\" maxlength=\"250\"','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1025,'subdirs2index',NULL,NULL,35,'s','textarea cols=\"80\" rows=\"3\"','indexer',1);

INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1030,'group_indexer_include_and_exclude','block',NULL,40,'s','group level 1','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1040,'ext_include','htm,html,php',NULL,50,'s','text size=\"80\" maxlength=\"250\"','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1050,'dir_exclude','/php,/error,/stuff,/not_public',NULL,60,'s','textarea cols=\"80\" rows=\"3\"','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1060,'file_exclude',NULL,NULL,70,'s','textarea cols=\"80\" rows=\"3\"','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1065,'skip_symblinks','true',NULL,75,'s','boolean','indexer',1);

-- INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1070,'robots_txt','',NULL,80,'s','textarea cols=\"80\" rows=\"3\"','indexer',1);

INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1080,'group_indexer_external_datasupply','block',NULL,90,'s','group level 1','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1090,'fnExternalPhp','../../phpcrawl/phpcrawl4tsep.php',NULL,100,'s','text size=\"80\" maxlength=\"250\"','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1100,'parmsExternalPhp','index.php',NULL,110,'s','text size=\"80\" maxlength=\"250\"','indexer',1);

INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1110,'group_indexer_indexing_mode','block',NULL,120,'s','group level 1','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1120,'searchViaRead','true',NULL,130,'s','boolean','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1130,'searchViaExt','false',NULL,140,'s','boolean','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1140,'listFilenamesOnly','false',NULL,150,'s','boolean','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1150,'print_list_of_files','true',NULL,160,'s','boolean','indexer',1);

INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1160,'group_indexer_indexing_modifiers','block',NULL,170,'s','group level 1','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1170,'force_http_fileparse','false',NULL,180,'s','boolean','indexer',1);

-- INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1170,'respect_robot_metatags','false',NULL,180,'s','boolean','indexer',1);

INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1180,'group_indexer_miscellaneous','block',NULL,190,'s','group level 1','indexer',1);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (1190,'internal_notes','',NULL,200,'s','textarea cols=\"80\" rows=\"3\"','indexer',1);

INSERT INTO %tablePrefix%iprofile (idiprofile, profilename) VALUES (1, "demo");




INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2000,'group_configcontentimg_basicdefs','block',NULL,0,'s','group level 1','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2010,'configcontentimg_mode','false',NULL,10,'s','boolean','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2020,'group_configcontentimg_basicdefs_paths','block',NULL,20,'s','group level 2','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2030,'configcontentimg_webpath',NULL,NULL,30,'s','text size=\"80\" maxlength=\"250\"','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2040,'configcontentimg_abspath',NULL,NULL,40,'s','text size=\"80\" maxlength=\"250\"','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2050,'configcontentimg_webpath_flists',NULL,NULL,50,'s','text size=\"80\" maxlength=\"250\"','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2060,'configcontentimg_abspath_flists',NULL,NULL,60,'s','text size=\"80\" maxlength=\"250\"','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2070,'group_configcontentimg_basicdefs_image','block',NULL,70,'s','group level 2','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2080,'configcontentimg_imageext',NULL,NULL,80,'s','text size=\"5\" maxlength=\"5\"','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2090,'configcontentimg_FnDefaultImage',NULL,NULL,90,'s','special filename image contentimg','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2100,'configcontentimg_maxX',NULL,100,100,'n','long','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2110,'configcontentimg_maxY',NULL,75,110,'n','long','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2120,'group_configcontentimg_indexer','block',NULL,120,'s','group level 2','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2130,'configcontentimg_create_flists','true',NULL,130,'s','boolean','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2140,'configcontentimg_having_no_contentimg','true',NULL,140,'s','boolean','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2150,'configcontentimg_autorun_flisttrans','true',NULL,150,'s','boolean','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2200,'group_configcontentimg_extdefs','none',NULL,200,'s','group level 1','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2210,'group_configcontentimg_extdefs_flists','block',NULL,210,'s','group level 2','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2220,'group_configcontentimg_extdefs_fliststrans','none',NULL,220,'s','group level 3','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2230,'group_configcontentimg_extdefs_flisttrans1','block',NULL,230,'s','group level 4','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2240,'configcontentimg_flisttrans1_template_filename','toWebswoon.bat',NULL,240,'s','text size=\"80\" maxlength=\"250\"','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2250,'configcontentimg_flisttrans1_active','true',NULL,250,'s','boolean','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2260,'configcontentimg_flisttrans1_internal_notes','creates a batchfile for webswoon to build the images\r\nThis bat-file works only correct, using the webswoon.cfg-setting:\r\n capturefilenameformat=%i.%e\r\nand the appropriate imageformat=xxx',NULL,260,'s','textarea cols=\"80\" rows=\"2\"','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2270,'configcontentimg_flisttrans1_comment','@rem',NULL,270,'s','text size=\"80\" maxlength=\"250\"','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2280,'group_configcontentimg_extdefs_flisttrans2','block',NULL,280,'s','group level 4','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2290,'configcontentimg_flisttrans2_template_filename','WebswoonFtp2Host.bat',NULL,290,'s','text size=\"80\" maxlength=\"250\"','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2300,'configcontentimg_flisttrans2_active','true',NULL,300,'s','boolean','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2310,'configcontentimg_flisttrans2_internal_notes','creates batchfile for uploading webswoon results\r\n(you need to set the correct login-data within the templatefile)',NULL,310,'s','textarea cols=\"80\" rows=\"2\"','configcontentimg',NULL);
INSERT INTO %tablePrefix%internal (idinternal, description, stringvalue, numericvalue, sortordervalue, valuetype, fieldtype, stringtag, numtag) VALUES (2320,'configcontentimg_flisttrans2_comment','@rem',NULL,320,'s','text size=\"80\" maxlength=\"250\"','configcontentimg',NULL);
