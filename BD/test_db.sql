-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 21 fév. 2023 à 01:06
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP DATABASE IF EXISTS `test_db`;
CREATE Database test_db;

use `test_db`;

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` bigint(20) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `libelle`) VALUES
(1, 'DELL'),
(2, 'HP'),
(3, 'MSI'),
(4, 'Rog'),
(5, 'Legion');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` bigint(20) NOT NULL AUTO_INCREMENT,
  `date_creation` datetime(6) DEFAULT NULL,
  `from_cat_id` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `nom_produit` varchar(255) DEFAULT NULL,
  `prix_produit` double DEFAULT NULL,
  `to_prod_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `FKynxe4ati2kacgr7b7dihoxom` (`to_prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `date_creation`, `from_cat_id`, `image`, `nom_produit`, `prix_produit`, `to_prod_id`) VALUES
(1, '2023-02-21 01:04:02.648000', 1, 'dell.jpg', 'PC Dell', 2200.5, NULL),
(2, '2023-02-21 01:04:02.742000', 3, 'msi.jpg', 'PC MSI', 20000.5, NULL),
(3, '2023-02-21 01:04:02.748000', 4, 'rog.jpg', 'PC ROG', 18000.5, NULL),
(4, '2023-02-21 01:04:02.754000', 5, 'legion.jpg', 'PC LEGION', 20000.5, NULL),
(5, '2023-02-21 01:04:02.758000', 2, 'pc_hp.jpg', 'PC HP', 5000.5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` bigint(20) NOT NULL AUTO_INCREMENT,
  `admn` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `admn`, `image`, `mail`, `passwd`) VALUES
(1, 0, 'null', 'user@user.com', 'user'),
(2, 1, 'null', 'admin@admin.com', 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FKynxe4ati2kacgr7b7dihoxom` FOREIGN KEY (`to_prod_id`) REFERENCES `categorie` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
