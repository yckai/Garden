-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 16 avr. 2020 à 18:39
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `plantes`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `plants_id` int(3) NOT NULL,
  `comment_content` varchar(10) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fertilizer`
--

DROP TABLE IF EXISTS `fertilizer`;
CREATE TABLE IF NOT EXISTS `fertilizer` (
  `fertilizer_id` int(11) NOT NULL AUTO_INCREMENT,
  `plants_id` int(3) NOT NULL,
  `fertilizer_amount` int(11) NOT NULL,
  `fertilizer_date` date NOT NULL,
  PRIMARY KEY (`fertilizer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fertilizer`
--

INSERT INTO `fertilizer` (`fertilizer_id`, `plants_id`, `fertilizer_amount`, `fertilizer_date`) VALUES
(1, 1, 0, '2020-04-14'),
(2, 2, 0, '2020-04-14'),
(3, 1, 0, '2020-04-16'),
(4, 2, 0, '2020-04-16');

-- --------------------------------------------------------

--
-- Structure de la table `planting_date`
--

DROP TABLE IF EXISTS `planting_date`;
CREATE TABLE IF NOT EXISTS `planting_date` (
  `planting_id` int(11) NOT NULL AUTO_INCREMENT,
  `plants_id` int(3) NOT NULL,
  `planting_date` date NOT NULL,
  PRIMARY KEY (`planting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `planting_date`
--

INSERT INTO `planting_date` (`planting_id`, `plants_id`, `planting_date`) VALUES
(1, 1, '2020-04-11'),
(2, 2, '2019-03-01');

-- --------------------------------------------------------

--
-- Structure de la table `plants`
--

DROP TABLE IF EXISTS `plants`;
CREATE TABLE IF NOT EXISTS `plants` (
  `plants_id` int(3) NOT NULL AUTO_INCREMENT,
  `plants_name` varchar(10) NOT NULL,
  PRIMARY KEY (`plants_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plants`
--

INSERT INTO `plants` (`plants_id`, `plants_name`) VALUES
(1, 'Bananier'),
(2, 'Caoutchouc');

-- --------------------------------------------------------

--
-- Structure de la table `watering`
--

DROP TABLE IF EXISTS `watering`;
CREATE TABLE IF NOT EXISTS `watering` (
  `watering_id` int(5) NOT NULL AUTO_INCREMENT,
  `plants_id` int(3) NOT NULL,
  `watering_amount` int(3) NOT NULL,
  `watering_date` date NOT NULL,
  PRIMARY KEY (`watering_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `watering`
--

INSERT INTO `watering` (`watering_id`, `plants_id`, `watering_amount`, `watering_date`) VALUES
(1, 1, 0, '2020-04-14'),
(2, 2, 0, '2020-04-14'),
(3, 1, 0, '2020-04-16'),
(4, 2, 0, '2020-04-16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
