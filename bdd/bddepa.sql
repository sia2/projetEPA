-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 22 Mars 2016 à 16:35
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bddepa`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

CREATE TABLE IF NOT EXISTS `abonne` (
  `id_abonne` int(11) NOT NULL,
  `pays_origine` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_abonne`),
  KEY `id_abonne` (`id_abonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE IF NOT EXISTS `adherent` (
  `id_adherent` int(11) NOT NULL,
  `duree_adherent` int(11) NOT NULL,
  `date_premier_adhesion` date NOT NULL,
  `date_dernier_adhesion` date NOT NULL,
  `statut_adherent` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_adherent`),
  KEY `id_adherent` (`id_adherent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adresse` int(11) NOT NULL,
  `num_rue` text COLLATE utf8_unicode_ci NOT NULL,
  `departement` text COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  PRIMARY KEY (`id_adresse`),
  KEY `id_adresse` (`id_adresse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ca`
--

CREATE TABLE IF NOT EXISTS `ca` (
  `id_ca` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id_ca`),
  KEY `id_ca` (`id_ca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compterendu`
--

CREATE TABLE IF NOT EXISTS `compterendu` (
  `id_compte_rendu` int(11) NOT NULL,
  `libelle` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_compte_rendu`),
  KEY `id_compte_rendu` (`id_compte_rendu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE IF NOT EXISTS `connexion` (
  `id_connexion` int(11) NOT NULL,
  `login` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_connexion`),
  KEY `id_connexion` (`id_connexion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE IF NOT EXISTS `contrat` (
  `id_contrat` int(11) NOT NULL,
  `num_contrat` int(11) NOT NULL,
  `contenu_contrat` text COLLATE utf8_unicode_ci NOT NULL,
  `date_signature_contrat` date NOT NULL,
  PRIMARY KEY (`id_contrat`),
  KEY `id_contrat` (`id_contrat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cotisation`
--

CREATE TABLE IF NOT EXISTS `cotisation` (
  `idcotisation` int(11) NOT NULL,
  `libelle` text COLLATE utf8_unicode_ci NOT NULL,
  `date_cotisation` date NOT NULL,
  `montant_cotisation` double NOT NULL,
  PRIMARY KEY (`idcotisation`),
  KEY `idcotisation` (`idcotisation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `demandeadhesion`
--

CREATE TABLE IF NOT EXISTS `demandeadhesion` (
  `id_demande_adhesion` int(11) NOT NULL,
  `date_demande` date NOT NULL,
  `libelle` text COLLATE utf8_unicode_ci NOT NULL,
  `origine` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_demande_adhesion`),
  KEY `id_demande_adhesion` (`id_demande_adhesion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id_document` int(11) NOT NULL,
  `num_document` int(11) NOT NULL,
  `nom_document` text COLLATE utf8_unicode_ci NOT NULL,
  `lienftp_document` text COLLATE utf8_unicode_ci NOT NULL,
  `date_document` date NOT NULL,
  `type_document` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_document`),
  KEY `id_document` (`id_document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `don`
--

CREATE TABLE IF NOT EXISTS `don` (
  `id_don` int(11) NOT NULL,
  `num_don` int(11) NOT NULL,
  `montant_don` text COLLATE utf8_unicode_ci NOT NULL,
  `objet_don` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_don`),
  KEY `id_don` (`id_don`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `listevotant`
--

CREATE TABLE IF NOT EXISTS `listevotant` (
  `id_listev` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `libelle_listev` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_listev`),
  KEY `id_listev` (`id_listev`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membrebureau`
--

CREATE TABLE IF NOT EXISTS `membrebureau` (
  `id_membrebureau` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id_membrebureau`),
  KEY `id_membrebureau` (`id_membrebureau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `validation_message` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `id_message` (`id_message`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `multimedia`
--

CREATE TABLE IF NOT EXISTS `multimedia` (
  `id_multimedia` int(11) NOT NULL,
  `libelle` text COLLATE utf8_unicode_ci NOT NULL,
  `objet_multimedia` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_multimedia`),
  KEY `id_multimedia` (`id_multimedia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id_newsletter` int(11) NOT NULL,
  `libelle` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_newsletter`),
  KEY `id_newsletter` (`id_newsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ordre_du_jour`
--

CREATE TABLE IF NOT EXISTS `ordre_du_jour` (
  `id_ordre_du_jour` int(11) NOT NULL,
  `titre_ordre_du_jour` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_ordre_du_jour`),
  KEY `id_ordre_du_jour` (`id_ordre_du_jour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE IF NOT EXISTS `paiement` (
  `id_paiement` int(11) NOT NULL,
  `libelle_paiement` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `montant` double NOT NULL,
  PRIMARY KEY (`id_paiement`),
  KEY `id_paiement` (`id_paiement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numpersone` text COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `mailpersonne` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `personne_physique`
--

CREATE TABLE IF NOT EXISTS `personne_physique` (
  `id_personne_ph` int(11) NOT NULL,
  `nom_personne_ph` text COLLATE utf8_unicode_ci NOT NULL,
  `prenom_personne_ph` text COLLATE utf8_unicode_ci NOT NULL,
  `adresse_personne-ph` text COLLATE utf8_unicode_ci NOT NULL,
  `cp_personne_ph` text COLLATE utf8_unicode_ci NOT NULL,
  `ville_personne_ph` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_personne_ph`),
  KEY `id_personne_ph` (`id_personne_ph`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prelevement`
--

CREATE TABLE IF NOT EXISTS `prelevement` (
  `idprelevement` int(11) NOT NULL,
  `libelle` text COLLATE utf8_unicode_ci NOT NULL,
  `date_prelevement` date NOT NULL,
  `montant_prelevement` double NOT NULL,
  PRIMARY KEY (`idprelevement`),
  KEY `idprelevement` (`idprelevement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `id_projet` int(11) NOT NULL,
  `nom_projet` text COLLATE utf8_unicode_ci NOT NULL,
  `date_debut_projet` date NOT NULL,
  `resume_projet` text COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_projet`),
  KEY `id_projet` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `quittance`
--

CREATE TABLE IF NOT EXISTS `quittance` (
  `id_quittance` int(11) NOT NULL,
  `objet` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `libelle` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_quittance`),
  KEY `id_quittance` (`id_quittance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE IF NOT EXISTS `rapport` (
  `id_rapport` int(11) NOT NULL,
  `libelle` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_rapport`),
  KEY `id_rapport` (`id_rapport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `relance`
--

CREATE TABLE IF NOT EXISTS `relance` (
  `id_relance` int(11) NOT NULL,
  `temps_relance` int(11) NOT NULL,
  PRIMARY KEY (`id_relance`),
  KEY `id_relance` (`id_relance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reunion_instance`
--

CREATE TABLE IF NOT EXISTS `reunion_instance` (
  `id_reunion_instance` int(11) NOT NULL,
  `libelle` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_reunion_instance`),
  KEY `id_reunion_instance` (`id_reunion_instance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reçu_fiscal`
--

CREATE TABLE IF NOT EXISTS `reçu_fiscal` (
  `id_recu_fiscal` int(11) NOT NULL,
  `num_reçu_fiscal` int(11) NOT NULL,
  PRIMARY KEY (`id_recu_fiscal`),
  KEY `id_recu_fiscal` (`id_recu_fiscal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
  `id_statut` int(11) NOT NULL,
  `libelle` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_statut`),
  KEY `id_statut` (`id_statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subvention`
--

CREATE TABLE IF NOT EXISTS `subvention` (
  `id_subvention` int(11) NOT NULL,
  `num_subvention` int(11) NOT NULL,
  `montant_subvention` double NOT NULL,
  `beneficiaire` text COLLATE utf8_unicode_ci NOT NULL,
  `lieu` text COLLATE utf8_unicode_ci NOT NULL,
  `nom_titulaire` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_subvention`),
  KEY `id_subvention` (`id_subvention`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sujetheme`
--

CREATE TABLE IF NOT EXISTS `sujetheme` (
  `id_sujet` int(11) NOT NULL,
  `titre_sujet` text COLLATE utf8_unicode_ci NOT NULL,
  `description_sujet` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_sujet`),
  KEY `id_sujet` (`id_sujet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `id_theme` int(11) NOT NULL,
  `nom_theme` text COLLATE utf8_unicode_ci NOT NULL,
  `nombre_theme` int(11) NOT NULL,
  `description_theme` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_theme`),
  KEY `id_theme` (`id_theme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typepaiement`
--

CREATE TABLE IF NOT EXISTS `typepaiement` (
  `idtypeP` int(11) NOT NULL,
  `libelle` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idtypeP`),
  KEY `idtypeP` (`idtypeP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typereunion`
--

CREATE TABLE IF NOT EXISTS `typereunion` (
  `id_type_reunion` int(11) NOT NULL,
  `libelle` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_type_reunion`),
  KEY `id_type_reunion` (`id_type_reunion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
