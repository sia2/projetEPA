-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 30 Mars 2016 à 11:25
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `minibb`
--

-- --------------------------------------------------------

--
-- Structure de la table `minibbtable_banned`
--

CREATE TABLE IF NOT EXISTS `minibbtable_banned` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `banip` varchar(15) NOT NULL DEFAULT '',
  `banreason` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `minibbtable_forums`
--

CREATE TABLE IF NOT EXISTS `minibbtable_forums` (
  `forum_id` int(10) NOT NULL AUTO_INCREMENT,
  `forum_name` varchar(150) NOT NULL DEFAULT '',
  `forum_desc` text NOT NULL,
  `forum_order` int(10) NOT NULL DEFAULT '0',
  `forum_icon` varchar(255) NOT NULL DEFAULT 'default.gif',
  `topics_count` int(10) NOT NULL DEFAULT '0',
  `posts_count` int(10) NOT NULL DEFAULT '0',
  `forum_group` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`forum_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `minibbtable_forums`
--

INSERT INTO `minibbtable_forums` (`forum_id`, `forum_name`, `forum_desc`, `forum_order`, `forum_icon`, `topics_count`, `posts_count`, `forum_group`) VALUES
(2, 'Action sociale et solidaritÃ©', 'Discussion Ã  propos des actions de EPA', 2, 'rose.gif', 0, 0, 'Action sociale et solidaritÃ©'),
(3, 'SantÃ© et mutuelle', '', 3, 'default.gif', 0, 0, 'SantÃ© et mutuelle'),
(4, 'Accueil des Ã©tudiants en France', 'Discussion Ã  propos de l''accueil des Ã©tudiants en France.', 1, 'orange.gif', 1, 2, 'Accueil des Ã©tudiants en France');

-- --------------------------------------------------------

--
-- Structure de la table `minibbtable_posts`
--

CREATE TABLE IF NOT EXISTS `minibbtable_posts` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `forum_id` int(10) NOT NULL DEFAULT '1',
  `topic_id` int(10) NOT NULL DEFAULT '1',
  `poster_id` int(10) NOT NULL DEFAULT '0',
  `poster_name` varchar(255) NOT NULL DEFAULT 'Anonymous',
  `post_text` text NOT NULL,
  `post_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `poster_ip` varchar(15) NOT NULL DEFAULT '',
  `post_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_id` (`topic_id`),
  KEY `poster_id` (`poster_id`),
  KEY `poster_ip` (`poster_ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `minibbtable_posts`
--

INSERT INTO `minibbtable_posts` (`post_id`, `forum_id`, `topic_id`, `poster_id`, `poster_name`, `post_text`, `post_time`, `poster_ip`, `post_status`) VALUES
(6, 4, 4, 2, 'dauphinois', 'Aller sur le site principal', '2016-03-30 02:36:36', '0.0.0.0', 0),
(5, 4, 4, 2, 'dauphinois', 'Comment faire pour adhÃ©rer?', '2016-03-30 02:35:25', '0.0.0.0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `minibbtable_send_mails`
--

CREATE TABLE IF NOT EXISTS `minibbtable_send_mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `topic_id` int(11) NOT NULL DEFAULT '0',
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `email_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `minibbtable_topics`
--

CREATE TABLE IF NOT EXISTS `minibbtable_topics` (
  `topic_id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_title` varchar(255) NOT NULL DEFAULT '',
  `topic_poster` int(10) NOT NULL DEFAULT '0',
  `topic_poster_name` varchar(255) NOT NULL DEFAULT 'Anonymous',
  `topic_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `topic_views` int(10) NOT NULL DEFAULT '0',
  `forum_id` int(10) NOT NULL DEFAULT '1',
  `topic_status` tinyint(1) NOT NULL DEFAULT '0',
  `topic_last_post_id` int(10) NOT NULL DEFAULT '1',
  `posts_count` int(10) NOT NULL DEFAULT '0',
  `sticky` int(1) NOT NULL DEFAULT '0',
  `topic_last_post_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `topic_last_poster` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`topic_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_last_post_id` (`topic_last_post_id`),
  KEY `sticky` (`sticky`),
  KEY `posts_count` (`posts_count`),
  KEY `topic_last_post_time` (`topic_last_post_time`),
  KEY `topic_views` (`topic_views`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `minibbtable_topics`
--

INSERT INTO `minibbtable_topics` (`topic_id`, `topic_title`, `topic_poster`, `topic_poster_name`, `topic_time`, `topic_views`, `forum_id`, `topic_status`, `topic_last_post_id`, `posts_count`, `sticky`, `topic_last_post_time`, `topic_last_poster`) VALUES
(4, 'Comment faire pour adhÃ©rer?', 2, 'dauphinois', '2016-03-30 02:35:25', 5, 4, 0, 6, 2, 0, '2016-03-30 02:36:36', 'dauphinois');

-- --------------------------------------------------------

--
-- Structure de la table `minibbtable_users`
--

CREATE TABLE IF NOT EXISTS `minibbtable_users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `user_regdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_password` varchar(32) NOT NULL DEFAULT '',
  `user_email` varchar(50) NOT NULL DEFAULT '',
  `user_icq` varchar(50) NOT NULL DEFAULT '',
  `user_website` varchar(100) NOT NULL DEFAULT '',
  `user_occ` varchar(100) NOT NULL DEFAULT '',
  `user_from` varchar(100) NOT NULL DEFAULT '',
  `user_interest` varchar(150) NOT NULL DEFAULT '',
  `user_viewemail` tinyint(1) NOT NULL DEFAULT '0',
  `user_sorttopics` tinyint(1) NOT NULL DEFAULT '0',
  `user_newpwdkey` varchar(32) NOT NULL DEFAULT '',
  `user_newpasswd` varchar(32) NOT NULL DEFAULT '',
  `language` char(3) NOT NULL DEFAULT '',
  `activity` int(1) NOT NULL DEFAULT '1',
  `num_topics` int(10) unsigned NOT NULL DEFAULT '0',
  `num_posts` int(10) unsigned NOT NULL DEFAULT '0',
  `user_custom1` varchar(255) NOT NULL DEFAULT '',
  `user_custom2` varchar(255) NOT NULL DEFAULT '',
  `user_custom3` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `minibbtable_users`
--

INSERT INTO `minibbtable_users` (`user_id`, `username`, `user_regdate`, `user_password`, `user_email`, `user_icq`, `user_website`, `user_occ`, `user_from`, `user_interest`, `user_viewemail`, `user_sorttopics`, `user_newpwdkey`, `user_newpasswd`, `language`, `activity`, `num_topics`, `num_posts`, `user_custom1`, `user_custom2`, `user_custom3`) VALUES
(1, 'admin', '2016-03-21 19:57:12', '63a65625faeb9eaa389529847ef7eb83', 'dramane.bamba@gmail.com', '', '', '', '', '', 0, 0, '', '', 'eng', 1, 0, 0, 'usflag.gif', '', ''),
(2, 'dauphinois', '2016-03-21 20:17:53', '63a65625faeb9eaa389529847ef7eb83', 'dramane.dauphine@gmail.com', '', '', '', '', '', 0, 0, 'e62e2d36692a3b3a4b1e7c75232cc174', 'a578c8d0', 'fre', 1, 1, 2, 'dog.gif', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `my_users`
--

CREATE TABLE IF NOT EXISTS `my_users` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `my_users`
--

INSERT INTO `my_users` (`ID`, `name`, `pass`, `email`) VALUES
(1, 'Admin', 'xyz123', 'test@nodomain.com'),
(2, 'Paul', 'xyz123', 'test2@nodomain.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
