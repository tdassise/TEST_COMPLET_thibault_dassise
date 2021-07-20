-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 20 juil. 2021 à 13:16
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pizzeria`
--

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id_ingredient` int NOT NULL AUTO_INCREMENT,
  `cout` double NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_ingredient`),
  UNIQUE KEY `UNIQ_6BAF78706C6E55B5` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id_ingredient`, `cout`, `nom`) VALUES
(1, 0.9, 'Champignon'),
(2, 12.32, 'Emmental'),
(3, 10.72, 'Mozzarela');

-- --------------------------------------------------------

--
-- Structure de la table `ingredientpizza`
--

DROP TABLE IF EXISTS `ingredientpizza`;
CREATE TABLE IF NOT EXISTS `ingredientpizza` (
  `id_ingredient_pizza` int NOT NULL AUTO_INCREMENT,
  `ingredient_id` int DEFAULT NULL,
  `quantite` int NOT NULL,
  `pizza_id` int DEFAULT NULL,
  PRIMARY KEY (`id_ingredient_pizza`),
  KEY `IDX_551E6DE2933FE08C` (`ingredient_id`),
  KEY `ingredientpizza_FK` (`pizza_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ingredientpizza`
--

INSERT INTO `ingredientpizza` (`id_ingredient_pizza`, `ingredient_id`, `quantite`, `pizza_id`) VALUES
(1, 1, 200, 1),
(2, 2, 400, 1),
(3, 3, 300, 1),
(4, 1, 100, 2),
(5, 2, 200, 2),
(6, 3, 250, 2),
(7, 1, 40, 3),
(8, 2, 20, 3),
(9, 3, 50, 3);

-- --------------------------------------------------------

--
-- Structure de la table `pizza`
--

DROP TABLE IF EXISTS `pizza`;
CREATE TABLE IF NOT EXISTS `pizza` (
  `id_pizza` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pizzeria_id` int NOT NULL,
  PRIMARY KEY (`id_pizza`),
  UNIQUE KEY `UNIQ_CFDD826F6C6E55B5` (`nom`),
  KEY `pizza_FK` (`pizzeria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pizza`
--

INSERT INTO `pizza` (`id_pizza`, `nom`, `pizzeria_id`) VALUES
(1, '5 fromages', 1),
(2, 'L\'océane', 2),
(3, 'La tartiflette', 2);

-- --------------------------------------------------------

--
-- Structure de la table `pizzaiolo`
--

DROP TABLE IF EXISTS `pizzaiolo`;
CREATE TABLE IF NOT EXISTS `pizzaiolo` (
  `id_pizzaiolo` int NOT NULL AUTO_INCREMENT,
  `pizzeria_id` int DEFAULT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_secu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pizzaiolo`),
  UNIQUE KEY `UNIQ_8E1DFF222D5D15DB` (`numero_secu`),
  KEY `IDX_8E1DFF22F1965E46` (`pizzeria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pizzaiolo`
--

INSERT INTO `pizzaiolo` (`id_pizzaiolo`, `pizzeria_id`, `nom`, `prenom`, `numero_secu`) VALUES
(1, 1, 'DUBOIS', 'Marc', '715404456513585'),
(2, 1, 'JULIEN', 'Roger', '16504654879585');

-- --------------------------------------------------------

--
-- Structure de la table `pizzeria`
--

DROP TABLE IF EXISTS `pizzeria`;
CREATE TABLE IF NOT EXISTS `pizzeria` (
  `id_pizzeria` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `marge` double NOT NULL,
  `num_telephone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pizzeria`),
  UNIQUE KEY `UNIQ_1B80AB296C6E55B5` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pizzeria`
--

INSERT INTO `pizzeria` (`id_pizzeria`, `nom`, `marge`, `num_telephone`) VALUES
(1, 'Au feu du bois', 1.48, '0254898885'),
(2, 'La belle rouge', 2.65, '0247895632'),
(3, 'Chez Dédé', 3.49, '0245454547');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ingredientpizza`
--
ALTER TABLE `ingredientpizza`
  ADD CONSTRAINT `FK_551E6DE2933FE08C` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id_ingredient`),
  ADD CONSTRAINT `ingredientpizza_FK` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`id_pizza`);

--
-- Contraintes pour la table `pizza`
--
ALTER TABLE `pizza`
  ADD CONSTRAINT `pizza_FK` FOREIGN KEY (`pizzeria_id`) REFERENCES `pizzeria` (`id_pizzeria`);

--
-- Contraintes pour la table `pizzaiolo`
--
ALTER TABLE `pizzaiolo`
  ADD CONSTRAINT `FK_8E1DFF22F1965E46` FOREIGN KEY (`pizzeria_id`) REFERENCES `pizzeria` (`id_pizzeria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
