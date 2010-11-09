-- following will be filled automatically by SubVersion!
-- Do not change by hand!
-- $LastChangedDate$
-- @lastedited $LastChangedBy$
-- $LastChangedRevision$

CREATE TABLE tsep_internal (
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
) TYPE=MyISAM;

CREATE TABLE tsep_log (
  idlog INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  typeoflog INTEGER(10) UNSIGNED NOT NULL,
  logstring VARCHAR(255) NOT NULL,
  timeofentry VARCHAR(15) NULL,
  ip VARCHAR(50) NULL,
  ipresolved VARCHAR(250) NULL,
  stopwords TEXT NULL, 
  PRIMARY KEY(idlog)
) TYPE=MyISAM;

CREATE TABLE tsep_search (
  id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  page_number INTEGER(4) NULL,
  protect_indexentry CHAR(1),
  page_title VARCHAR(200) NULL,
  page_url VARCHAR(200) NOT NULL,
  page_file_size VARCHAR(10) NULL,
  indexed_words LONGTEXT NULL,
  indexed_metawords TEXT NULL,
  PRIMARY KEY(id),
  UNIQUE INDEX tsep_search_indexurl(page_url),
  FULLTEXT INDEX tsep_search_index1602(indexed_words(255)),
  FULLTEXT INDEX tsep_search_index1603(indexed_metawords(255))
) TYPE=MyISAM;

CREATE TABLE tsep_stopwords (
  idstopwords INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  stopword VARCHAR(50) NOT NULL,
  PRIMARY KEY(idstopwords),
  UNIQUE INDEX tsep_stopwords_stopword(stopword)
) TYPE=MyISAM;

CREATE TABLE tsep_iprofile (
  idiprofile INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  profilename VARCHAR(250) NOT NULL,
  PRIMARY KEY(idiprofile),
  UNIQUE INDEX tsep_iprofile_profilename(profilename)
) TYPE=MyISAM;

CREATE TABLE tsep_iprofile_search (
  idiprofilesearch INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  idiprofile INTEGER(10) UNSIGNED NOT NULL,
  idsearch INTEGER(10) UNSIGNED NOT NULL,
  PRIMARY KEY(idiprofilesearch),
  UNIQUE INDEX tsep_iprofile_search_combi(idiprofile, idsearch)
) TYPE=MyISAM;
