-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 01 avr. 2018 à 10:55
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rush00`
--
CREATE DATABASE IF NOT EXISTS `rush00` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rush00`;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`ID`, `name`) VALUES
(1, 'Tous nos voyages'),
(2, 'Detente'),
(3, 'Aventure'),
(4, 'Découverte');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user` int(11) NOT NULL,
  `current` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panier_product`
--

CREATE TABLE IF NOT EXISTS `panier_product` (
  `ID_panier` int(11) NOT NULL,
  `ID_product` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  KEY `ID_product` (`ID_product`),
  KEY `ID_panier` (`ID_panier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`ID`, `name`, `price`, `img`) VALUES
(1, 'Polynésie', 1000, 'https://images.unsplash.com/photo-1467296581482-7cc27c2500ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=04a2e686e5f35082d7f0bdd8d84dbdf1&auto=format&fit=crop&w=1804&q=80'),
(2, 'Ecosse', 450, 'https://images.unsplash.com/photo-1506377585622-bedcbb027afc?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bd182254b0d137801c80b6ed5a68545a&auto=format&fit=crop&w=1650&q=80'),
(3, 'Suisse', 500, 'https://images.unsplash.com/photo-1491555103944-7c647fd857e6?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bc40334a7838deb2c079a276fa78ac30&auto=format&fit=crop&w=1650&q=80'),
(4, 'Sri Lanka', 1100, 'https://images.unsplash.com/photo-1485872752367-6471d363f1bd?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a53d69cb6e6ad76b49476d27a15ba224&auto=format&fit=crop&w=1651&q=80'),
(5, 'Italie', 350, 'https://images.unsplash.com/photo-1509798142650-1f3f05d5447b?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7bf3b1492d7c3fd00ba941901074b52c&auto=format&fit=crop&w=1780&q=80'),
(6, 'Cuba', 1200, 'https://images.unsplash.com/photo-1503192851959-c6da8ac80cff?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a8c7e98a487b4b5db9f1891c27597a86&auto=format&fit=crop&w=1650&q=80'),
(7, 'Japon', 1700, 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ebd34ddde3f2b4ea6dcdc9b7d329b774&auto=format&fit=crop&w=1650&q=80'),
(8, 'Canada', 900, 'https://images.unsplash.com/photo-1515982448474-a5882ec652df?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6158ebc4107f2a04228e5d250bbe0eb3&auto=format&fit=crop&w=934&q=80'),
(9, 'Islande', 1200, 'https://images.unsplash.com/photo-1488415032361-b7e238421f1b?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=668f6291545f642aeb573114404c6e5b&auto=format&fit=crop&w=1649&q=80'),
(10, 'Kenya', 1100, 'https://images.unsplash.com/photo-1489392191049-fc10c97e64b6?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=99949a52de1e203c9990a35a75c222f8&auto=format&fit=crop&w=1648&q=80'),
(11, 'Portugal', 300, 'https://images.unsplash.com/43/tbExnLgTFScrSctjStm4_IMG_0684.JPG?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=edebbaf9ee40b74ecef1d2cbce062886&auto=format&fit=crop&w=1650&q=80'),
(12, 'États-unis', 1300, 'https://images.unsplash.com/photo-1472669750356-ec9d2cadedd3?ixlib=rb-0.3.5&s=4149d33b1640ff5f77fca6ef5281b0d4&auto=format&fit=crop&w=1650&q=80');

-- --------------------------------------------------------

--
-- Structure de la table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `ID_category` int(11) NOT NULL,
  `ID_product` int(11) NOT NULL,
  KEY `ID_category` (`ID_category`),
  KEY `ID_product` (`ID_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product_category`
--

INSERT INTO `product_category` (`ID_category`, `ID_product`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(3, 1),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(2, 5),
(2, 7),
(2, 9),
(2, 10),
(3, 3),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 12),
(4, 2),
(4, 4),
(4, 6),
(4, 7),
(4, 11),
(4, 12),
(2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `passwd` text NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `name`, `passwd`, `admin`) VALUES
(1, 'ble', '123', 0),
(2, 'admin', 'admin', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier_product`
--
ALTER TABLE `panier_product`
  ADD CONSTRAINT `panier_product_ibfk_1` FOREIGN KEY (`ID_product`) REFERENCES `product` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `panier_product_ibfk_2` FOREIGN KEY (`ID_panier`) REFERENCES `panier` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`ID_product`) REFERENCES `product` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`ID_category`) REFERENCES `category` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
