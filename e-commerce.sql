-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 05 déc. 2021 à 22:16
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `titre` varchar(10000) NOT NULL,
  `description` text NOT NULL,
  `marque` varchar(10000) NOT NULL,
  `prix` float(255,0) NOT NULL,
  `image` varchar(10000) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `date`, `titre`, `description`, `marque`, `prix`, `image`, `etat`) VALUES
(1, '2021-12-02', 'Collier cher', 'Un collier cher', 'GenshinImpact', 1000, 'https://via.placeholder.com/150', 1),
(2, '2021-12-04', 'Collier pas cher', 'Un collier pas cher', 'Sorbonne', 1, 'https://via.placeholder.com/150', 1),
(6, '2021-12-02', 'Laisse', 'Pour attacher l\'animal', 'Jsp', 2, 'https://via.placeholder.com/150', 1),
(5, '2021-12-02', 'Laisse', 'Pour attacher l\'animal', 'Jsp', 2, 'https://via.placeholder.com/150', 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier_articles`
--

DROP TABLE IF EXISTS `panier_articles`;
CREATE TABLE IF NOT EXISTS `panier_articles` (
  `idUsers` int(11) NOT NULL,
  `idArticles` int(11) NOT NULL,
  KEY `idUsers` (`idUsers`),
  KEY `idArticles` (`idArticles`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `authority` tinyint(1) NOT NULL,
  `panier` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `panier` (`panier`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `authority`, `panier`) VALUES
(1, 'juice', 'elodiewan2001@gmail.com', '$2y$10$ZgHk/9hSYIwkIPlhr8gUsOKWwgwnFkMGkFlXRi6VmQcRQ71Ce6oOm', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
