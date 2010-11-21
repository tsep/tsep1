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
