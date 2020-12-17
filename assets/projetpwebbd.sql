-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 13 Novembre 2020 à 23:54
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetpwebbd`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `idCli` int(50) NOT NULL,
  `nomCli` varchar(50) NOT NULL,
  `emailCli` varchar(50) NOT NULL,
  `telCli` varchar(50) NOT NULL,
  `mdpCli` varchar(50) NOT NULL,
  `listeVehi` varchar(50) DEFAULT NULL,
  `listePanier` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`idCli`, `nomCli`, `emailCli`, `telCli`, `mdpCli`, `listeVehi`, `listePanier`) VALUES
(1, 'Dupond', 'jean.dupond@gmail.com', '+337667591912', 'LO23nd??', '2_11_13_', NULL),
(2, 'Menard', 'francois.menard@gmail.com', '+33789653834', 'CR7noR9%', NULL, NULL),
(4, 'Benamour', 'sofiane.benamour@gmail.com', '+33789891235', 'DKDLELFEFE', NULL, NULL),
(5, 'Ackerman', 'livaï.ackerman@gmail.com', '+33676768588', 'LZFMEFE', NULL, NULL),
(6, 'Borsalino', 'kizaru.borsalino@gmail.com', '+33660806676', 'KCLEKFLME', NULL, NULL),
(12, 'Choeurtis Tchounga', 'choeurtis.tchounga@gmail.com', '+33601271560', '667', '1_13_', '10_');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `idEntr` int(11) NOT NULL,
  `nomEntr` varchar(15) DEFAULT NULL,
  `emailEntr` varchar(40) DEFAULT NULL,
  `mdpEntr` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`idEntr`, `nomEntr`, `emailEntr`, `mdpEntr`) VALUES
(12, 'SFC', 'sfc.entreprise@gmail.com', 'azerty92');

-- --------------------------------------------------------

--
-- Structure de la table `facturation`
--

CREATE TABLE `facturation` (
  `idFac` int(50) NOT NULL,
  `idVehi` int(50) NOT NULL,
  `idCli` int(50) DEFAULT NULL,
  `dateDeb` date NOT NULL,
  `dateFin` date NOT NULL,
  `valFac` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `facturation`
--

INSERT INTO `facturation` (`idFac`, `idVehi`, `idCli`, `dateDeb`, `dateFin`, `valFac`) VALUES
(1, 4, 12, '2020-05-16', '2020-06-16', 9500),
(2, 5, 1, '2020-11-11', '2020-12-11', 2600),
(3, 2, 1, '2020-07-04', '2020-08-04', 1500),
(4, 7, 2, '2020-11-02', '2020-12-10', 4800),
(5, 8, 6, '2020-10-29', '2020-12-18', 13000),
(6, 9, 6, '2020-12-21', '2021-01-21', 6800),
(7, 14, 5, '2020-11-09', '2021-02-09', 11100),
(8, 7, 9, '2020-12-14', '2021-01-14', 4800),
(9, 10, 10, '2020-11-11', '2020-12-11', 4100),
(10, 1, 12, '2020-11-01', '2020-12-01', 1500);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `idVehi` int(50) NOT NULL,
  `nomVehi` varchar(50) NOT NULL,
  `typeVehi` varchar(50) NOT NULL,
  `caractVehi` json NOT NULL,
  `locaVehi` varchar(50) NOT NULL,
  `photoVehi` varchar(50) NOT NULL,
  `prixVehi` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`idVehi`, `nomVehi`, `typeVehi`, `caractVehi`, `locaVehi`, `photoVehi`, `prixVehi`) VALUES
(1, 'Mercedes-Benz', 'Berline', '{"Class": "S", "nbPlace": "5", "TypeMoteur": "Diesel", "BoiteVitesse": "Automatique"}', 'Disponible', 'Mercedes_Benz.png', 1000),
(2, 'Audi-A1', 'Citadine', '{"Class": "B", "nbPlace": "5", "TypeMoteur": "Essence", "BoiteVitesse": "Automatique"}', 'En_Revision', 'Audi_q7.png', 500),
(3, 'Peugeot-208', 'Monospace', '{"Class": "B", "nbPlace": "7", "TypeMoteur": "Essence", "BoiteVitesse": "Automatique"}', 'Disponible', 'Peugeot_208.png', 300),
(4, 'Ferrari-F430', 'Sportive', '{"Class": "S", "nbPlace": "2", "TypeMoteur": "Essence", "BoiteVitesse": "Automatique"}', 'Disponible', 'Ferrari_F430.png', 800),
(8, 'Audi-Q7', 'SUV', '{"Class": "B", "nbPlace": "5", "TypeMoteur": "Essence", "BoiteVitesse": "Automatique"}', 'Disponible', 'AQ71.png', 1200),
(9, 'Renault capture', 'Berline', '{"Class": "B", "nbPlace": "5", "TypeMoteur": "Essence", "BoiteVitesse": "Automatique"}', 'En_Revision', 'renault_captur.png', 1100),
(10, 'Lotus Evora', 'Supercar', '{"Class": "B", "nbPlace": "5", "TypeMoteur": "Essence", "BoiteVitesse": "Automatique"}', 'Disponible', 'Lotus_Evora.png', 1400),
(11, 'Rolls-Royce-Cullinan', 'SUV', '{"Class": "B", "nbPlace": "5", "TypeMoteur": "Essence", "BoiteVitesse": "Automatique"}', 'Disponible', 'Rolls_Royce_Cullinan.png', 1800),
(12, 'Audi-RS6', 'Sportive', '{"Class": "B", "nbPlace": "5", "TypeMoteur": "Essence", "BoiteVitesse": "Automatique"}', 'Disponible', 'Audi_RS6.png', 1500),
(13, 'Porsche-911', 'Sportive', '{"Class": "B", "nbPlace": "5", "TypeMoteur": "Essence", "BoiteVitesse": "Automatique"}', 'Disponible', 'Porsche_911.png', 1700),
(14, 'Renaud Megane Van', 'Sportive', '{"Class": "B", "nbPlace": "5", "TypeMoteur": "Essence", "BoiteVitesse": "Automatique"}', 'En_Revision', 'Renault_Megane_Van.png', 500),
(15, 'Tesla Model X', 'Supercar', '{"Class": "B", "nbPlace": "5", "TypeMoteur": "Essence", "BoiteVitesse": "Automatique"}', 'Disponible', 'Tesla_Model_X.png', 1300);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idCli`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`idEntr`);

--
-- Index pour la table `facturation`
--
ALTER TABLE `facturation`
  ADD PRIMARY KEY (`idFac`),
  ADD KEY `FDCT_BS` (`idCli`),
  ADD KEY `idVehi` (`idVehi`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`idVehi`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `idCli` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `idEntr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `facturation`
--
ALTER TABLE `facturation`
  MODIFY `idFac` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `idVehi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
