-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 05 Octobre 2015 à 17:01
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `meteo`
--

-- --------------------------------------------------------

--
-- Structure de la table `forecast`
--

CREATE TABLE IF NOT EXISTS `forecast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `city` varchar(50) COLLATE utf8_bin NOT NULL,
  `period` varchar(20) COLLATE utf8_bin NOT NULL,
  `resume` varchar(30) COLLATE utf8_bin NOT NULL,
  `idWeather` int(11) NOT NULL,
  `tptMin` int(11) NOT NULL,
  `tptMax` int(11) NOT NULL,
  `comment` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=165 ;

--
-- Contenu de la table `forecast`
--

INSERT INTO `forecast` (`id`, `date`, `city`, `period`, `resume`, `idWeather`, `tptMin`, `tptMax`, `comment`) VALUES
(156, '2015-08-10', 'Chambéry', 'matin', 'ensoleillé', 1, 19, 21, 'Ressenti agréable'),
(157, '2015-08-10', 'Chambéry', 'après-midi', 'ensoleillé', 1, 28, 32, 'Très chaud'),
(158, '2015-08-10', 'Chambéry', 'nuit', 'clair', 1, 17, 19, 'Retour à des températures acceptables'),
(159, '2015-08-11', 'Chambéry', 'matin', 'ensoleillé', 1, 20, 24, 'Beau temps '),
(160, '2015-08-11', 'Chambéry', 'après-midi', 'ensoleillé', 1, 32, 37, 'Canicule'),
(161, '2015-08-11', 'Chambéry', 'nuit', 'orageux', 1, 15, 18, 'Attention aux orages violents'),
(162, '2015-08-12', 'Chambéry', 'matin', 'nuageux', 1, 18, 20, 'Temps nuageux'),
(163, '2015-08-12', 'Chambéry', 'après-midi', 'éclaircies', 1, 22, 25, 'Les nuages se dispersent petit à petit'),
(164, '2015-08-12', 'Chambéry', 'nuit', 'clair', 1, 19, 21, 'Temps calme');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
