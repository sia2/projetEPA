-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Client :  dramanefvedba.mysql.db
-- Généré le :  Jeu 07 Avril 2016 à 16:46
-- Version du serveur :  5.5.47-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dramanefvedba`
--

-- --------------------------------------------------------

--
-- Structure de la table `minibbtable_banned`
--

CREATE TABLE IF NOT EXISTS `minibbtable_banned` (
  `id` int(10) NOT NULL,
  `banip` varchar(15) NOT NULL DEFAULT '',
  `banreason` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `minibbtable_forums`
--

CREATE TABLE IF NOT EXISTS `minibbtable_forums` (
  `forum_id` int(10) NOT NULL,
  `forum_name` varchar(150) NOT NULL DEFAULT '',
  `forum_desc` text NOT NULL,
  `forum_order` int(10) NOT NULL DEFAULT '0',
  `forum_icon` varchar(255) NOT NULL DEFAULT 'default.gif',
  `topics_count` int(10) NOT NULL DEFAULT '0',
  `posts_count` int(10) NOT NULL DEFAULT '0',
  `forum_group` varchar(150) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `minibbtable_forums`
--

INSERT INTO `minibbtable_forums` (`forum_id`, `forum_name`, `forum_desc`, `forum_order`, `forum_icon`, `topics_count`, `posts_count`, `forum_group`) VALUES
(2, 'Action sociale et solidaritÃ©', 'Discussion Ã  propos des actions de EPA', 3, 'rose.gif', 1, 1, ''),
(3, 'SantÃ© et mutuelle', 'Toutes les questions concernant la santÃ© et la mutuelle.', 4, 'green.gif', 1, 1, ''),
(4, 'Accueil des Ã©tudiants en France', 'Discussion Ã  propos de l''accueil des Ã©tudiants en France.', 2, 'orange.gif', 1, 1, ''),
(5, 'Newsletter', 'RÃ©agissez aux informations envoyÃ©es par l''association.', 1, 'default.gif', 1, 1, ''),
(6, 'Les projets d&#039;EPA', 'Vous pouvez interagir ici, sur l''ensemble des projets de l''association.', 5, 'darkblue.gif', 0, 0, ''),
(7, 'La vie au sein de l&#039;association', 'Venez discutez ici de tous ce qui concerne la vie au sein de l''association.', 6, 'brown.gif', 0, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `minibbtable_posts`
--

CREATE TABLE IF NOT EXISTS `minibbtable_posts` (
  `post_id` int(10) NOT NULL,
  `forum_id` int(10) NOT NULL DEFAULT '1',
  `topic_id` int(10) NOT NULL DEFAULT '1',
  `poster_id` int(10) NOT NULL DEFAULT '0',
  `poster_name` varchar(255) NOT NULL DEFAULT 'Anonymous',
  `post_text` text NOT NULL,
  `post_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `poster_ip` varchar(15) NOT NULL DEFAULT '',
  `post_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `minibbtable_posts`
--

INSERT INTO `minibbtable_posts` (`post_id`, `forum_id`, `topic_id`, `poster_id`, `poster_name`, `post_text`, `post_time`, `poster_ip`, `post_status`) VALUES
(5, 4, 4, 2, 'dauphinois', 'Comment faire pour adhÃ©rer?', '2016-03-30 02:35:25', '0.0.0.0', 0),
(10, 5, 8, 1, 'admin', 'Le forum est bientÃ´t disponible.', '2016-03-31 14:29:01', '0.0.0.0', 0),
(7, 3, 5, 1, 'admin', 'Question santÃ©', '2016-03-31 02:45:09', '0.0.0.0', 0),
(8, 2, 6, 1, 'admin', 'Action sociale et solidaritÃ©', '2016-03-31 02:46:21', '0.0.0.0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `minibbtable_send_mails`
--

CREATE TABLE IF NOT EXISTS `minibbtable_send_mails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `topic_id` int(11) NOT NULL DEFAULT '0',
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `email_code` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `minibbtable_topics`
--

CREATE TABLE IF NOT EXISTS `minibbtable_topics` (
  `topic_id` int(10) NOT NULL,
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
  `topic_last_poster` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `minibbtable_topics`
--

INSERT INTO `minibbtable_topics` (`topic_id`, `topic_title`, `topic_poster`, `topic_poster_name`, `topic_time`, `topic_views`, `forum_id`, `topic_status`, `topic_last_post_id`, `posts_count`, `sticky`, `topic_last_post_time`, `topic_last_poster`) VALUES
(4, 'Comment faire pour adhÃ©rer?', 2, 'dauphinois', '2016-03-30 02:35:25', 30, 4, 0, 5, 1, 0, '2016-03-30 02:35:25', 'dauphinois'),
(5, 'Question santÃ©', 1, 'admin', '2016-03-31 02:45:09', 3, 3, 0, 7, 1, 0, '2016-03-31 02:45:09', 'admin'),
(6, 'Action sociale et solidaritÃ©', 1, 'admin', '2016-03-31 02:46:21', 1, 2, 0, 8, 1, 0, '2016-03-31 02:46:21', 'admin'),
(8, 'Infos du jour', 1, 'admin', '2016-03-31 14:29:01', 7, 5, 1, 10, 1, 1, '2016-03-31 14:29:01', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `minibbtable_users`
--

CREATE TABLE IF NOT EXISTS `minibbtable_users` (
  `user_id` int(10) NOT NULL,
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
  `user_custom3` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `minibbtable_users`
--

INSERT INTO `minibbtable_users` (`user_id`, `username`, `user_regdate`, `user_password`, `user_email`, `user_icq`, `user_website`, `user_occ`, `user_from`, `user_interest`, `user_viewemail`, `user_sorttopics`, `user_newpwdkey`, `user_newpasswd`, `language`, `activity`, `num_topics`, `num_posts`, `user_custom1`, `user_custom2`, `user_custom3`) VALUES
(1, 'admin', '2016-03-21 19:57:12', '63a65625faeb9eaa389529847ef7eb83', 'dramane.bamba@gmail.com', '', '', '', '', '', 0, 0, '', '', 'eng', 1, 3, 3, 'usflag.gif', '', ''),
(2, 'dauphinois', '2016-03-21 20:17:53', '63a65625faeb9eaa389529847ef7eb83', 'dramane.dauphine@gmail.com', '', '', '', '', '', 0, 0, 'e62e2d36692a3b3a4b1e7c75232cc174', 'a578c8d0', 'fre', 1, 1, 1, 'dog.gif', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `my_users`
--

CREATE TABLE IF NOT EXISTS `my_users` (
  `ID` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `my_users`
--

INSERT INTO `my_users` (`ID`, `name`, `pass`, `email`) VALUES
(1, 'Admin', 'xyz123', 'test@nodomain.com'),
(2, 'Paul', 'xyz123', 'test2@nodomain.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `minibbtable_banned`
--
ALTER TABLE `minibbtable_banned`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `minibbtable_forums`
--
ALTER TABLE `minibbtable_forums`
  ADD PRIMARY KEY (`forum_id`);

--
-- Index pour la table `minibbtable_posts`
--
ALTER TABLE `minibbtable_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `poster_id` (`poster_id`),
  ADD KEY `poster_ip` (`poster_ip`);

--
-- Index pour la table `minibbtable_send_mails`
--
ALTER TABLE `minibbtable_send_mails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `minibbtable_topics`
--
ALTER TABLE `minibbtable_topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `topic_last_post_id` (`topic_last_post_id`),
  ADD KEY `sticky` (`sticky`),
  ADD KEY `posts_count` (`posts_count`),
  ADD KEY `topic_last_post_time` (`topic_last_post_time`),
  ADD KEY `topic_views` (`topic_views`);

--
-- Index pour la table `minibbtable_users`
--
ALTER TABLE `minibbtable_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `username` (`username`);

--
-- Index pour la table `my_users`
--
ALTER TABLE `my_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `minibbtable_banned`
--
ALTER TABLE `minibbtable_banned`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `minibbtable_forums`
--
ALTER TABLE `minibbtable_forums`
  MODIFY `forum_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `minibbtable_posts`
--
ALTER TABLE `minibbtable_posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `minibbtable_send_mails`
--
ALTER TABLE `minibbtable_send_mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `minibbtable_topics`
--
ALTER TABLE `minibbtable_topics`
  MODIFY `topic_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `minibbtable_users`
--
ALTER TABLE `minibbtable_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `my_users`
--
ALTER TABLE `my_users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
