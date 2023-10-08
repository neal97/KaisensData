-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 08 oct. 2023 à 10:54
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
-- Base de données : `kaisens_data`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int NOT NULL,
  `Title` varchar(1000) NOT NULL,
  `Image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `HeaderImage` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Introduction` mediumtext NOT NULL,
  `Description` text NOT NULL,
  `LastMod` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Language` varchar(2) NOT NULL,
  `KeyWords` varchar(1000) NOT NULL,
  `State` int NOT NULL,
  `NumVisit` int NOT NULL,
  `IdTheme` int NOT NULL,
  `IdUser` int NOT NULL,
  `IdHost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `Title`, `Image`, `HeaderImage`, `Introduction`, `Description`, `LastMod`, `Language`, `KeyWords`, `State`, `NumVisit`, `IdTheme`, `IdUser`, `IdHost`) VALUES
(0, 'jean', 'dsfdfhgj', '', 'fghgjvkjhlkj,', 'fghvjknl', '2023-10-07 21:02:59', '', '', 0, 0, 23456788, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
