-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3307
-- Généré le :  Dim 01 avr. 2018 à 04:45
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
-- Base de données :  `rush01`
--
CREATE DATABASE IF NOT EXISTS `rush00` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rush00`;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`ID`, `name`) VALUES
(6, 'cat5'),
(7, 'cat1'),
(8, 'cat2');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `current` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`ID`, `ID_user`, `current`) VALUES
(1, 43, 0),
(2, 32, 0),
(3, 32, 1),
(7, 33, 1),
(8, 35, 1),
(9, 37, 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier_product`
--

CREATE TABLE `panier_product` (
  `ID_panier` int(11) NOT NULL,
  `ID_product` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier_product`
--

INSERT INTO `panier_product` (`ID_panier`, `ID_product`, `count`, `status`) VALUES
(1, 4, 1, NULL),
(1, 6, 1, NULL),
(2, 4, 4, NULL),
(2, 7, 2, NULL),
(2, 6, 2, NULL),
(3, 4, 3, NULL),
(7, 4, 8, NULL),
(7, 6, 2, NULL),
(8, 4, 1, NULL),
(9, 4, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`ID`, `name`, `price`, `img`) VALUES
(3, 'product3', 89, 'https://pbs.twimg.com/profile_images/757974066011770880/ae2Eop2g_400x400.jpg'),
(4, 'product4', 8, 'https://pbs.twimg.com/profile_images/757974066011770880/ae2Eop2g_400x400.jpg'),
(6, 'prod', 897, 'https://upload.wikimedia.org/wikipedia/commons/f/f9/Phoenicopterus_ruber_in_S%C3%A3o_Paulo_Zoo.jpg'),
(7, 'test', 78, 'https://www.w3schools.com/howto/img_fjords.jpg'),
(8, 'prod', 3, 'https://www.gettyimages.ca/gi-resources/images/Homepage/Hero/UK/CMS_Creative_164657191_Kingfisher.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `product_category`
--

CREATE TABLE `product_category` (
  `ID_category` int(11) NOT NULL,
  `ID_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product_category`
--

INSERT INTO `product_category` (`ID_category`, `ID_product`) VALUES
(7, 3),
(7, 4),
(7, 6),
(6, 3),
(6, 4),
(6, 6),
(8, 3),
(8, 4),
(7, 7),
(7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `passwd` text NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `name`, `passwd`, `admin`) VALUES
(32, 'bleuasd', 'pass', 0),
(33, 'anonym33', 'pass', 0),
(34, 'anonym34', 'pass', 0),
(35, 'anonym35', 'pass', 0),
(36, 'admin', 'pass', 1),
(37, 'anonym37', 'pass', 0),
(43, '123', '123', 0),
(44, 'admin', '123', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Index pour la table `panier_product`
--
ALTER TABLE `panier_product`
  ADD KEY `ID_product` (`ID_product`),
  ADD KEY `ID_panier` (`ID_panier`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `product_category`
--
ALTER TABLE `product_category`
  ADD KEY `ID_category` (`ID_category`),
  ADD KEY `ID_product` (`ID_product`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
