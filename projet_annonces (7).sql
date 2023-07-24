-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 24 juil. 2023 à 05:36
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_annonces`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titre` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `duree_publication` int NOT NULL DEFAULT '30',
  `prix_vente` double DEFAULT NULL,
  `cout_annonce` double DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `fin_publication` datetime DEFAULT NULL,
  `id_etat` int UNSIGNED NOT NULL,
  `id_utilisateur` int UNSIGNED NOT NULL,
  `date_vente` datetime DEFAULT NULL,
  `id_acheteur` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK2` (`id_etat`),
  KEY `FK3` (`id_utilisateur`),
  KEY `fk_Annonces_Utilisateur1` (`id_acheteur`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `date_creation`, `titre`, `description`, `duree_publication`, `prix_vente`, `cout_annonce`, `date_validation`, `fin_publication`, `id_etat`, `id_utilisateur`, `date_vente`, `id_acheteur`) VALUES
(1, '2023-05-29 12:18:58', 'Très jolie T-shirt noir', 'Très jolie Robe moulante côtelée extensible, Taille 38/40, jamais portée', 30, 2.88, NULL, '2023-05-29 00:00:00', NULL, 1, 1, NULL, NULL),
(2, '2023-05-29 12:18:58', 'Jupe colorée', 'Jupe colorée, Taille 38/40, jamais portée', 0, 3.66, NULL, '2023-05-29 00:00:00', NULL, 1, 4, NULL, NULL),
(5, '2023-06-16 14:59:36', 'Bonnet', 'description', 0, 10.99, NULL, '2023-07-10 18:25:44', NULL, 0, 0, NULL, NULL),
(3, '2023-06-03 17:22:25', 'Pantalon homme', 'pantalon noir', 30, 6.9, NULL, '2023-06-10 19:31:38', NULL, 1, 1, NULL, NULL),
(4, '2023-06-03 17:26:04', 'Manteau', '            manteau chaud, confortable idéal pour l\'hiver    \r\n            ', 30, 20, NULL, '2023-07-02 18:26:35', NULL, 0, 1, NULL, NULL),
(6, '2023-06-16 15:08:27', 'Bonnet', 'description', 0, 10.99, NULL, '2023-07-12 18:27:20', NULL, 0, 0, NULL, NULL),
(8, '2023-06-22 12:29:46', 'Jupe plisée', 'Jupe Plissée Longueur Midi Dotée D\'Une Ceinture\r\n                \r\n            ', 30, 2.33, NULL, '2023-07-11 10:59:35', NULL, 0, 1, NULL, NULL),
(9, '2023-06-22 12:31:13', 'Titre annonce', '                dsqqqqqfddfffdddddddddddddddd\r\n            ', 30, 2.33, NULL, NULL, NULL, 1, 1, NULL, NULL),
(10, '2023-06-22 12:40:25', 'Gilet', '                \r\n            ccccccccccccccccc', 30, 6.33, NULL, NULL, NULL, 1, 1, NULL, NULL),
(11, '2023-06-22 12:45:27', 'Gilet2', '                \r\n            dfffffffffffffffff', 30, 6.33, NULL, NULL, NULL, 1, 1, NULL, NULL),
(13, '2023-06-23 11:49:35', 'T-shirt noir', '                fffff\r\n            ', 30, 2.33, NULL, NULL, NULL, 3, 1, NULL, NULL),
(14, '2023-06-25 13:45:23', 'Titre annonce', '                kkkkkkkkkkkkkk\r\n            ', 30, 10.99, NULL, NULL, NULL, 3, 1, NULL, NULL),
(15, '2023-06-25 13:49:59', 'Titre annonce', '                kkkkkkkkkkkkkk\r\n            ', 30, 10.99, NULL, NULL, NULL, 3, 1, NULL, NULL),
(16, '2023-06-26 21:18:08', 'Manteau', '            manteau chaud, confortable idéal pour l\'hiver    \r\n            ', 30, 25.99, NULL, NULL, NULL, 0, 1, NULL, NULL),
(17, '2023-06-26 21:39:23', 'Manteau', '            manteau chaud, confortable idéal pour l\'hiver    \r\n            ', 30, 25.99, NULL, NULL, NULL, 0, 1, NULL, NULL),
(18, '2023-06-26 21:42:37', 'Manteau', '            manteau chaud, confortable idéal pour l\'hiver    \r\n            ', 30, 25.99, NULL, '2023-07-02 11:01:11', NULL, 0, 1, NULL, NULL),
(19, '2023-06-26 21:43:57', 'Manteau', '            manteau chaud, confortable idéal pour l\'hiver    \r\n            ', 30, 20, NULL, NULL, NULL, 0, 1, NULL, NULL),
(20, '2023-06-26 22:00:11', 'Pantalon homme', '            pantalon noir    \r\n            ', 30, 6.9, NULL, NULL, NULL, 0, 1, NULL, NULL),
(21, '2023-06-26 22:01:40', 'Pantalon homme', '            pantalon noir    \r\n            ', 30, 6.9, NULL, NULL, NULL, 0, 1, NULL, NULL),
(22, '2023-06-26 22:01:53', 'Pantalon homme', '            pantalon noir    \r\n            ', 30, 6.9, NULL, NULL, NULL, 0, 1, NULL, NULL),
(23, '2023-06-26 22:17:57', 'Pantalon homme', '            pantalon noir    \r\n            ', 30, 6.9, NULL, NULL, NULL, 0, 1, NULL, NULL),
(24, '2023-06-26 22:18:29', 'Pantalon homme', '            pantalon noir    \r\n            ', 30, 6.9, NULL, NULL, NULL, 0, 1, NULL, NULL),
(25, '2023-06-26 22:18:33', 'Pantalon homme', '            pantalon noir    \r\n            ', 30, 6.9, NULL, NULL, NULL, 0, 1, NULL, NULL),
(26, '2023-06-26 22:18:47', 'Pantalon homme', '            pantalon noir    \r\n            ', 30, 6.9, NULL, NULL, NULL, 0, 1, NULL, NULL),
(27, '2023-06-26 22:19:31', 'Pantalon homme', '            pantalon noir    ,,,xxxxxxxxxxxx            ', 30, 6.9, NULL, NULL, NULL, 0, 1, NULL, NULL),
(28, '2023-06-26 22:19:34', 'Pantalon homme', '            pantalon noir    \r\n            ', 30, 6.9, NULL, NULL, NULL, 0, 1, NULL, NULL),
(37, '2023-05-29 12:18:58', 'Très jolie T-shirt noir', 'Très jolie Robe moulante côtelée extensible, Taille 38/40, jamais portée', 30, 2.88, NULL, '2023-05-29 00:00:00', NULL, 1, 1, NULL, NULL),
(38, '2023-05-29 12:18:58', 'Jupe colorée', 'Jupe colorée, Taille 38/40, jamais portée', 0, 3.66, NULL, '2023-05-29 00:00:00', NULL, 1, 4, NULL, NULL),
(39, '2023-06-16 14:59:36', 'Bonnet', 'description', 0, 10.99, NULL, '2023-07-10 18:25:44', NULL, 0, 0, NULL, NULL),
(40, '2023-06-03 17:22:25', 'Pantalon homme', 'pantalon noir', 30, 6.9, NULL, '2023-06-10 19:31:38', NULL, 1, 1, NULL, NULL),
(41, '2023-06-03 17:26:04', 'Manteau', '            manteau chaud, confortable idéal pour l\'hiver    \r\n            ', 30, 20, NULL, '2023-07-02 18:26:35', NULL, 0, 1, NULL, NULL),
(42, '2023-06-16 15:08:27', 'Bonnet', 'description', 0, 10.99, NULL, '2023-07-12 18:27:20', NULL, 0, 0, NULL, NULL),
(43, '2023-06-22 12:29:46', 'Jupe plisée', 'Jupe Plissée Longueur Midi Dotée D\'Une Ceinture\r\n                \r\n            ', 30, 2.33, NULL, '2023-07-11 10:59:35', NULL, 0, 1, NULL, NULL),
(44, '2023-06-26 21:18:08', 'Manteau', '            manteau chaud, confortable idéal pour l\'hiver    \r\n            ', 30, 25.99, NULL, NULL, NULL, 0, 1, NULL, NULL),
(45, '2023-07-23 10:47:56', 'Débardeur', ' Débardeur noir en 100% coton, léger. Idéal pour l\'été.  \r\n            ', 30, 5, NULL, NULL, NULL, 0, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `avatars`
--

DROP TABLE IF EXISTS `avatars`;
CREATE TABLE IF NOT EXISTS `avatars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_membre` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avatars`
--

INSERT INTO `avatars` (`id`, `url`, `id_membre`) VALUES
(1, 'images/Bb chat.jpg', 12);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(150) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom_categorie`, `description`) VALUES
(1, 'Femme', 'catégorie de vêtement pour femme'),
(2, 'Homme', 'ça veut dire que '),
(3, 'Enfant', 'description'),
(10, 'Pantalon', 'pantalon une partie de vêtement'),
(15, 'Bonnet', 'description'),
(24, 'Pull', 'description'),
(25, 'Pull', 'description'),
(26, 'Bon', 'pantalon une partie de vêtement'),
(27, 'Bon', 'pantalon une partie de vêtement'),
(28, 'Bon', 'pantalon une partie de vêtement'),
(29, 'Bon', 'pantalon une partie de vêtement'),
(30, 'Bon', 'pantalon une partie de vêtement'),
(31, 'Bon', 'pantalon une partie de vêtement'),
(32, 'Paul', 'pantalon une partie de vêtement'),
(33, 'Paul', 'pantalon une partie de vêtement'),
(34, 'Michalowska', 'ça veut dire qu');

-- --------------------------------------------------------

--
-- Structure de la table `categories_annonces`
--

DROP TABLE IF EXISTS `categories_annonces`;
CREATE TABLE IF NOT EXISTS `categories_annonces` (
  `id_annonce` int UNSIGNED NOT NULL,
  `id_categorie` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id_annonce`,`id_categorie`),
  KEY `FKcatann2` (`id_categorie`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categories_annonces`
--

INSERT INTO `categories_annonces` (`id_annonce`, `id_categorie`) VALUES
(1, 1),
(3, 1),
(8, 2),
(13, 2),
(14, 21),
(15, 21),
(16, 1),
(17, 1),
(18, 1),
(19, 2),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 0),
(25, 0),
(26, 0),
(27, 0),
(28, 0),
(29, 0),
(30, 0),
(31, 0),
(32, 0),
(33, 0),
(34, 0),
(35, 0),
(36, 0),
(45, 0);

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

DROP TABLE IF EXISTS `etats`;
CREATE TABLE IF NOT EXISTS `etats` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id`, `nom`, `description`) VALUES
(1, 'Très bon', ''),
(2, 'Bon', ''),
(3, 'Mauvais', 'ça veut dire que '),
(8, 'Usé', '');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `is_admin` tinyint NOT NULL DEFAULT '0',
  `actif` int DEFAULT '1',
  `username` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `prenom` varchar(150) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `telephone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `adresse` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `code_postal` mediumint DEFAULT NULL,
  `ville` varchar(150) DEFAULT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(250) DEFAULT NULL,
  `date_validite_token` timestamp NULL DEFAULT NULL,
  `cagnotte` float UNSIGNED DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `avatar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `is_admin`, `actif`, `username`, `email`, `password`, `nom`, `prenom`, `date_naissance`, `telephone`, `adresse`, `code_postal`, `ville`, `date_inscription`, `token`, `date_validite_token`, `cagnotte`, `date_update`, `avatar`) VALUES
(1, 0, 1, 'Nat', '', '', 'Michalowska', 'Natalia', '1983-07-08', '0665690775', 'rue de France', 6000, 'Nice', '2023-05-29 09:08:43', '8f548f8040bf9e439dab25e9d973449a', '2023-06-22 06:29:42', NULL, '2023-07-22 13:14:03', 'Bb chat.jpg'),
(2, 1, 1, 'Natali', 'michalowska.natalia@gmail.com', '$2y$10$vnkkPdeqc7rNpZO1KdsXSOMYclhboulcLP.wXlMOJ4qkaEt1Y54My', 'Natalia', 'Marc', '1994-01-14', '06202303323', 'avenue', 9999, 'NICE', '2023-05-29 09:58:57', '1e8521eb35b4f78207beb19bf687fb72', NULL, NULL, '2023-06-16 12:56:03', ''),
(3, 0, 1, 'John', 'john@yahoo.fr', '', 'J', 'V', NULL, NULL, NULL, NULL, NULL, '2023-06-01 15:19:59', NULL, NULL, NULL, NULL, ''),
(4, 0, 1, 'Kate', 'kate@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-01 15:19:59', NULL, NULL, NULL, NULL, ''),
(6, 0, 1, 'Test', 'test@gmail.com', 'sjmddqlkjdqj', 'Test', 'Test', '2023-01-02', '06', 'avenue', 5, 'nice', '2023-06-02 14:04:44', '55950121181508c1ad744ddfe8521bb0', NULL, NULL, NULL, ''),
(11, 0, 1, 'bubu', 'mathieu.nebra@exemple.com', '$2y$10$6zwoLBt9Idf3T3K4VSsF6usexZGvsN940rI48PelbeLyZoFdMpTkm', 'Bon', 'n', '2023-06-01', '0665690775', 'rue du coin', 8, 'Lille', '2023-06-04 11:25:48', '233d673777032951b07b37625c2939aa', NULL, NULL, NULL, ''),
(12, 0, 1, 'koko', 'marc@gmail.com', '$2y$10$qIU4Q4tyy7ofQu/kDwDFteoEHXG/H98i0mID9Gv11LLF7gsesq8ZW', 'ZANE', 'Marc', '1987-05-12', '05060', 'avenue des Fleurs', 6233, 'Bordeaux', '2023-06-12 15:26:40', NULL, '2023-06-20 10:30:22', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `main` tinyint DEFAULT '0',
  `id_annonce` int UNSIGNED NOT NULL,
  `legende` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKphotos` (`id_annonce`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id`, `url`, `main`, `id_annonce`, `legende`) VALUES
(1, 'views/images/pantalon.jpg', 0, 3, 'blabla'),
(2, 'views/images/tshirt.jpg', 1, 1, 'tshirt noir'),
(3, 'views/images/manteau.jpg', 1, 4, 'manteau chaud, confortable'),
(4, 'views/images/jupe.png', 1, 2, 'jupe'),
(5, 'views/images/mini_jupe.png', 0, 8, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
