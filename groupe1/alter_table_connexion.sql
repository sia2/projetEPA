alter table connexion add email varchar(200) not null default '';
alter table connexion add user_regdate date not null default '0000-00-00 00:00:00';
alter table connexion add activity int(1) not null default '1';
alter table connexion add user_viewemail tinyint(1) NOT NULL default '0';
alter table connexion add user_sorttopics tinyint(1) NOT NULL default '0';
alter table connexion add language char(3) NOT NULL default 'fre';
alter table connexion add num_topics INT(10) UNSIGNED DEFAULT '0' NOT NULL;
alter table connexion add num_posts INT(10) UNSIGNED DEFAULT '0' NOT NULL;
alter table connexion add user_custom1 varchar(255) DEFAULT '' NOT NULL;