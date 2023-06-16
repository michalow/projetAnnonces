-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 15 juin 2023 à 14:51
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

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

CREATE TABLE `annonces` (
  `id` int UNSIGNED NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titre` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `duree_publication` int NOT NULL,
  `prix_vente` double DEFAULT NULL,
  `cout_annonce` double DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `fin_publication` datetime DEFAULT NULL,
  `id_etat` int UNSIGNED NOT NULL,
  `id_utilisateur` int UNSIGNED NOT NULL,
  `date_vente` datetime DEFAULT NULL,
  `id_acheteur` int UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `date_creation`, `titre`, `description`, `duree_publication`, `prix_vente`, `cout_annonce`, `date_validation`, `fin_publication`, `id_etat`, `id_utilisateur`, `date_vente`, `id_acheteur`) VALUES
(1, '2023-05-29 12:18:58', 'Très jolie Robe moulante', 'Très jolie Robe moulante côtelée extensible, Taille 38/40, jamais portée', 30, 2.88, NULL, '2023-05-29 00:00:00', NULL, 1, 1, NULL, NULL),
(2, '2023-05-29 12:18:58', 'Très jolie Jupe moulante', 'Très jolie Jupe moulante côtelée extensible, Taille 38/40, jamais portée', 0, 3.66, NULL, '2023-05-29 00:00:00', NULL, 1, 4, NULL, NULL),
(3, '2023-06-03 17:22:25', 'Bronzes', 'pantalon une partie de vêtement', 0, NULL, NULL, '2023-06-10 19:31:38', NULL, 1, 2, NULL, NULL),
(4, '2023-06-03 17:26:04', 'Bronzes', 'pantalon une partie de vêtement', 0, NULL, NULL, NULL, NULL, 1, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `avatars`
--

CREATE TABLE `avatars` (
  `id` int NOT NULL,
  `url` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_membre` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avatars`
--

INSERT INTO `avatars` (`id`, `url`, `id_membre`) VALUES
(1, 'images/Bb chat.jpg', 12);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `nom_categorie` varchar(150) DEFAULT NULL,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom_categorie`, `description`) VALUES
(1, 'Robes', ''),
(2, 'Jupes', ''),
(3, 'Pull', ''),
(10, 'Pantalon', 'pantalon une partie de vêtement'),
(15, 'Bonnet', '');

-- --------------------------------------------------------

--
-- Structure de la table `categories_annonces`
--

CREATE TABLE `categories_annonces` (
  `id_annonce` int UNSIGNED NOT NULL,
  `id_categorie` int UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categories_annonces`
--

INSERT INTO `categories_annonces` (`id_annonce`, `id_categorie`) VALUES
(1, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE `etats` (
  `id` int UNSIGNED NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

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

CREATE TABLE `membres` (
  `id` int UNSIGNED NOT NULL,
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
  `date_validite_token` datetime DEFAULT NULL,
  `cagnotte` float UNSIGNED DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `is_admin`, `actif`, `username`, `email`, `password`, `nom`, `prenom`, `date_naissance`, `telephone`, `adresse`, `code_postal`, `ville`, `date_inscription`, `token`, `date_validite_token`, `cagnotte`, `date_update`) VALUES
(1, 0, 1, 'Nat', 'nat06@net-c.fr', '$2y$10$Yhok9AigcWbjcU2SaZiexOSDxdkzetFv0DvCq1jYzxooOU0KsO37e', 'Michalowska', 'Natalia', '1992-07-08', '0620230000', '', 33600, 'Bordeaux', '2023-05-29 09:08:43', NULL, NULL, NULL, '2023-06-15 13:04:49'),
(2, 1, 1, 'Natalia', 'michalowska.natalia@gmail.com', '$2y$10$vnkkPdeqc7rNpZO1KdsXSOMYclhboulcLP.wXlMOJ4qkaEt1Y54My', 'Natalia', 'Marc', '1994-01-14', '06202303323', 'avenue', 9999, 'NICE', '2023-05-29 09:58:57', '1e8521eb35b4f78207beb19bf687fb72', NULL, NULL, '2023-06-15 13:48:58'),
(3, 0, 1, 'John', 'john@yahoo.fr', '', 'J', 'V', NULL, NULL, NULL, NULL, NULL, '2023-06-01 15:19:59', NULL, NULL, NULL, NULL),
(4, 0, 1, 'Kate', 'kate@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-01 15:19:59', NULL, NULL, NULL, NULL),
(6, 0, 1, 'Test', 'test@gmail.com', 'sjmddqlkjdqj', 'Test', 'Test', '2023-01-02', '06', 'avenue', 5, 'nice', '2023-06-02 14:04:44', '55950121181508c1ad744ddfe8521bb0', NULL, NULL, NULL),
(11, 0, 1, 'bubu', 'mathieu.nebra@exemple.com', '$2y$10$6zwoLBt9Idf3T3K4VSsF6usexZGvsN940rI48PelbeLyZoFdMpTkm', 'Bon', 'n', '2023-06-01', '0665690775', 'rue du coin', 8, 'Lille', '2023-06-04 11:25:48', '233d673777032951b07b37625c2939aa', NULL, NULL, NULL),
(12, 0, 1, 'koko', 'marc@gmail.com', '$2y$10$y/LEA8jY7sakrlwqTEGFZOs2bMvkrzsJr4tipRG6pXCXCiBeisiOi', 'ZANE', 'Marc', '1987-05-12', '05060', 'avenue des Fleurs', 6233, 'Bordeaux', '2023-06-12 15:26:40', '2172442676ef93279ed105dc33774067', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id` int UNSIGNED NOT NULL,
  `url` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `main` tinyint DEFAULT '0',
  `id_annonce` int UNSIGNED NOT NULL,
  `legende` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id`, `url`, `main`, `id_annonce`, `legende`) VALUES
(1, 'views/images/bisounours-jpg-uic1345389-1.jpg', 0, 3, 'blabla');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK2` (`id_etat`),
  ADD KEY `FK3` (`id_utilisateur`),
  ADD KEY `fk_Annonces_Utilisateur1` (`id_acheteur`);

--
-- Index pour la table `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories_annonces`
--
ALTER TABLE `categories_annonces`
  ADD PRIMARY KEY (`id_annonce`,`id_categorie`),
  ADD KEY `FKcatann2` (`id_categorie`);

--
-- Index pour la table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKphotos` (`id_annonce`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `etats`
--
ALTER TABLE `etats`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
