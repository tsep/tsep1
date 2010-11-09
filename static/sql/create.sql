-- following will be filled automatically by SubVersion!
-- Do not change by hand!
-- $LastChangedDate$
-- @lastedited $LastChangedBy$
-- $LastChangedRevision$

-- TSEP configuration is stored in this table
CREATE TABLE %tablePrefix%internal (
  idinternal INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  description VARCHAR(250) NOT NULL,
  stringvalue TEXT NULL,
  numericvalue FLOAT NULL,
  sortordervalue INTEGER UNSIGNED NULL,
  valuetype CHAR(1) NOT NULL,
  fieldtype VARCHAR(250) NULL,
  stringtag CHAR(20) NOT NULL,
  numtag INTEGER UNSIGNED NULL,
  PRIMARY KEY(idinternal),
  UNIQUE INDEX tsep_internal_combi(description, stringtag, numtag)
) TYPE=MyISAM CHARACTER SET utf8;

-- logs is written to this table
CREATE TABLE %tablePrefix%log (
  idlog INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  typeoflog INTEGER(10) UNSIGNED NOT NULL,
  logstring VARCHAR(255) NOT NULL,
  timeofentry VARCHAR(15) NULL,
  ip VARCHAR(50) NULL,
  ipresolved VARCHAR(250) NULL,
  stopwords TEXT NULL,
  PRIMARY KEY(idlog),
  INDEX idx_logstring(logstring),
  INDEX idx_timeofentry(timeofentry),
  INDEX idx_toe_ls(timeofentry, logstring)
) TYPE=MyISAM CHARACTER SET utf8;

-- how often was something searched, how many results were returned
CREATE TABLE %tablePrefix%loghits (
  idloghits INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  idlog INTEGER(10) UNSIGNED NOT NULL,
  nr_hits INTEGER(10) UNSIGNED NULL,
  returned_pages INTEGER(10) UNSIGNED NULL,
  PRIMARY KEY(idloghits),
  UNIQUE INDEX idx_idlog(idlog)
) TYPE=MyISAM CHARACTER SET utf8;

-- this table holds the complete contents of the pages (meta, words, etc)
CREATE TABLE %tablePrefix%search (
  id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  page_number INTEGER(4) NULL,
  protect_indexentry CHAR(1),
  page_title VARCHAR(200) NULL,
  page_url VARCHAR(250) NOT NULL,
  page_file_size VARCHAR(10) NULL,
  indexed_words LONGTEXT NULL,
  indexed_metawords TEXT NULL,
  last_indexed varchar(15) NULL,
  last_edited varchar(15) NULL,
  additional_info TEXT NULL,
  PRIMARY KEY(id),
  UNIQUE INDEX tsep_search_indexurl(page_url),
  FULLTEXT INDEX tsep_search_index1602(indexed_words(255)),
  FULLTEXT INDEX tsep_search_index1603(indexed_metawords(255))
) TYPE=MyISAM CHARACTER SET utf8;

-- this table holds the stopwords the admin has defined himself
CREATE TABLE %tablePrefix%stopwords (
  idstopwords INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  stopword VARCHAR(50) NOT NULL,
  PRIMARY KEY(idstopwords),
  UNIQUE INDEX tsep_stopwords_stopword(stopword)
) TYPE=MyISAM CHARACTER SET utf8;

-- indexing profiles are stored in this table, the admin sets them in the indexer
CREATE TABLE %tablePrefix%iprofile (
  idiprofile INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  profilename VARCHAR(250) NOT NULL,
  PRIMARY KEY(idiprofile),
  UNIQUE INDEX tsep_iprofile_profilename(profilename)
) TYPE=MyISAM CHARACTER SET utf8;

-- each entry in the _search table can belong to many indexing profiles (iprofile table).
-- for this reason we need this table which connects both
CREATE TABLE %tablePrefix%iprofile_search (
  idiprofilesearch INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  idiprofile INTEGER(10) UNSIGNED NOT NULL,
  idsearch INTEGER(10) UNSIGNED NOT NULL,
  PRIMARY KEY(idiprofilesearch),
  UNIQUE INDEX tsep_iprofile_search_combi(idiprofile, idsearch)
) TYPE=MyISAM CHARACTER SET utf8;

-- This table presents a ranking symbol or the value of percent
-- in the search.php
CREATE TABLE %tablePrefix%ranksymbols (
  id_ranksymbols INTEGER(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  display VARCHAR(250),
  alt_tag VARCHAR(50) NOT NULL,
  valuepercent INTEGER(3) NOT NULL,
  image_show VARCHAR(10) NOT NULL DEFAULT 'False',
  comment VARCHAR(250),
  PRIMARY KEY(id_ranksymbols),
  UNIQUE KEY(valuepercent)
) TYPE=MyISAM CHARACTER SET utf8;
  
-- This table is used for user management

--CREATE TABLE %tablePrefix%users (
--	username VARCHAR(15) NOT NULL,
--	passwd CHAR(16) NOT NULL,
--	email VARCHAR(25) NOT NULL,
--	question VARCHAR(50) NOT NULL,
--	answer VARCHAR(20) NOT NULL,
--	userlevel INTEGER(1) NOT NULL,
--	PRIMARY KEY (username),
--	FOREIGN KEY (userlevel) REFERENCES levels ON DELETE CASCADE
--	) TYPE=MyISAM CHARACTER SET utf8;
	
-- The above table is too complex for our current class, it will be implemented later

CREATE TABLE %tablePrefix%users (
	username VARCHAR(15) NOT NULL,
	passwd CHAR(16) NOT NULL,
	PRIMARY KEY (username)
	) TYPE=MyISAM CHARACTER SET utf8;

	

-- This table is used to manage access levels
-- 1 digit gives 10 different user levels
CREATE TABLE %tablePrefix%user_levels (
	userlevel INTEGER(1) NOT NULL,
	PRIMARY KEY(userlevel)
	) TYPE=MyISAM CHARACTER SET utf8;