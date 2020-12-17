-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 23 oct. 2020 à 13:12
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idCli` int(11) NOT NULL,
  `nomCli` varchar(15) DEFAULT NULL,
  `emailCli` varchar(40) DEFAULT NULL,
  `telCli` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idCli`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idCli`, `nomCli`, `emailCli`, `telCli`) VALUES
(1, 'Dupond', 'jean.dupond@gmail.com', '337667591912'),
(2, 'Menard', 'francois.menard@gmail.com', '33789653834'),
(3, 'Guil', 'martin.guil@gmail.com', '33628393493'),
(4, 'Benamour', 'sofiane.benamour@gmail.com', '33789891235'),
(5, 'Ackerman', 'livaï.ackerman@gmail.com', '33676768588'),
(6, 'Borsalino', 'kizaru.borsalino@gmail.com', '33660806676');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `idEntr` int(11) NOT NULL,
  `nomEntr` varchar(15) DEFAULT NULL,
  `emailEntr` varchar(40) DEFAULT NULL,
  `mdpEntr` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idEntr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`idEntr`, `nomEntr`, `emailEntr`, `mdpEntr`) VALUES
(12, 'SFC', 'sfc.entreprise@gmail.com', 'azerty92');

-- --------------------------------------------------------

--
-- Structure de la table `facturation`
--

DROP TABLE IF EXISTS `facturation`;
CREATE TABLE IF NOT EXISTS `facturation` (
  `idFac` int(11) NOT NULL,
  `idVehi` int(11) NOT NULL,
  `idCli` int(11) DEFAULT NULL,
  `dateDeb` date NOT NULL,
  `dateFin` date NOT NULL,
  `valFac` float DEFAULT NULL,
  `etatFac` char(1) DEFAULT NULL,
  PRIMARY KEY (`idFac`),
  KEY `FDCT_BS` (`idCli`),
  KEY `idVehi` (`idVehi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facturation`
--

INSERT INTO `facturation` (`idFac`, `idVehi`, `idCli`, `dateDeb`, `dateFin`, `valFac`, `etatFac`) VALUES
(1, 4, 12, '2020-05-16', '2020-06-16', 9500, 'O');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `idVehi` int(11) NOT NULL,
  `typeVehi` varchar(15) NOT NULL,
  `caractVehi` json NOT NULL,
  `locaVehi` varchar(15) NOT NULL,
  `photoVehi` varchar(30) NOT NULL,
  PRIMARY KEY (`idVehi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`idVehi`, `typeVehi`, `caractVehi`, `locaVehi`, `photoVehi`) VALUES
(1, 'Berline', '{\"Class\": \"S\", \"nbPlace\": \"5\", \"TypeMoteur\": \"Diesel\", \"BoiteVitesse\": \"Automatique\"}', 'Disponible', 'Mercedes-Benz'),
(2, 'Citadine', '{\"Class\": \"B\", \"nbPlace\": \"5\", \"TypeMoteur\": \"Essence\", \"BoiteVitesse\": \"Automatique\"}', 'Disponible', 'Audi-A1'),
(3, 'Monospace', '{\"Class\": \"B\", \"nbPlace\": \"7\", \"TypeMoteur\": \"Essence\", \"BoiteVitesse\": \"Automatique\"}', 'En_Revision', 'Peugeot-806'),
(4, 'Sportive', '{\"Class\": \"S\", \"nbPlace\": \"2\", \"TypeMoteur\": \"Essence\", \"BoiteVitesse\": \"Automatique\"}', 'Disponible', 'Ferrari-F430'),
(5, 'Sportive', '{\"Class\": \"S\", \"nbPlace\": \"2\", \"TypeMoteur\": \"Essence\", \"BoiteVitesse\": \"Automatique\"}', 'Indisponible', 'Lamborghini-Aventador');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
