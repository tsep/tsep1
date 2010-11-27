--<ScriptOptions statementTerminator=";"/>

ALTER TABLE `database`.`tsep_profiles` DROP PRIMARY KEY;

DROP TABLE `database`.`tsep_profiles`;

CREATE TABLE `database`.`tsep_profiles` (
	`id` INTEGER UNSIGNED NOT NULL,
	`name` VARCHAR(255) NOT NULL,
	`url` VARCHAR(500),
	`modified` DATETIME,
	PRIMARY KEY (`id`)
);

ALTER TABLE  `tsep_profiles` ADD  `regex` VARCHAR( 255 ) NOT NULL AFTER  `url`;

CREATE TABLE tsep_indexes (
    id INTEGER UNSIGNED NOT NULL,
    profile_id INTEGER UNSIGNED NOT NULL,
    url VARCHAR(500),
    text TEXT 

)

ALTER TABLE tsep_stopwords CHANGE idstopwords id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL

CREATE TABLE tsep_elements (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
    tag VARCHAR(20) NOT NULL,
    property VARCHAR(50) NOT NULL
)

RENAME TABLE tsep_indexes TO tsep_indices

ALTER TABLE tsep_indices MODIFY COLUMN id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE

CREATE TABLE tsep_users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL UNIQUE,
    password CHAR(40) NOT NULL,
    group_id INT(11) NOT NULL,
    created DATETIME,
    modified DATETIME
);

 
CREATE TABLE tsep_groups (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created DATETIME,
    modified DATETIME
);

DROP TABLE tsep_internal;
DROP TABLE tsep_iprofile;
DROP TABLE tsep_iprofile_search;
DROP TABLE tsep_log;
DROP TABLE tsep_loghits;
DROP TABLE tsep_ranksymbols;
DROP TABLE tsep_search;
DROP TABLE tsep_user_levels;

DROP TABLE tsep_groups;
DROP TABLE tsep_users;

CREATE TABLE users (
    id integer auto_increment,
    username char(50),
    password char(40),
    PRIMARY KEY (id)
);

RENAME TABLE users TO tsep_users;
