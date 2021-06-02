-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 28 mai 2021 à 11:47
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP : 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id16887712_smesp`
--
CREATE DATABASE IF NOT EXISTS `id16887712_smesp` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id16887712_smesp`;

-- --------------------------------------------------------

--
-- Structure de la table `fiche`
--

CREATE TABLE `fiche` (
  `numero` int(11) NOT NULL,
  `reftache` int(11) DEFAULT NULL,
  `datefiche` date DEFAULT NULL,
  `visa` varchar(100) DEFAULT NULL,
  `datetache` date DEFAULT NULL,
  `lieu` varchar(100) DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `typemaint` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fiche`
--

INSERT INTO `fiche` (`numero`, `reftache`, `datefiche`, `visa`, `datetache`, `lieu`, `duree`, `typemaint`) VALUES
(6, 7, '2021-05-09', 'ok', '2021-05-07', 'DGI ESP', 5, 'corrective'),
(7, 15, '2021-05-09', 'ok', '2021-05-03', 'DGM ESP', 2, 'preventive'),
(8, 5, '2021-05-10', 'ok', '2021-05-10', 'DGI ESP', 2, 'corrective'),
(9, 16, '2021-05-10', 'ok', '2021-05-10', 'DGI ESP', 2, 'preventive'),
(10, 11, '2021-05-23', 'ok', '2021-05-19', 'DGI ESP', 1, 'preventive'),
(14, 25, '2021-05-27', 'ok', '2021-05-25', 'DGI ESP', 1, 'preventive');

-- --------------------------------------------------------

--
-- Structure de la table `intervenants`
--

CREATE TABLE `intervenants` (
  `reftache` int(11) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intervenants`
--

INSERT INTO `intervenants` (`reftache`, `nom`) VALUES
(7, 'Fatou Niang'),
(7, 'Fagnan Beye'),
(7, 'Aby Ndiaye'),
(7, ''),
(7, ''),
(15, 'Fatou Niang'),
(15, 'Fagnan Beye'),
(15, 'Aby Ndiaye'),
(15, ''),
(15, ''),
(5, 'Fatou Niang'),
(5, 'Fagnan Beye'),
(5, 'Aby Ndiaye'),
(5, ''),
(5, ''),
(16, 'Fatou Niang'),
(16, 'Fagnan Beye'),
(16, 'Aby Ndiaye'),
(16, ''),
(16, ''),
(11, 'Fatou Niang'),
(11, 'Fagnan Beye'),
(11, 'Aby Ndiaye'),
(11, ''),
(11, ''),
(24, 'Fatou Niang'),
(24, 'Fagnan Beye'),
(24, 'Aby Ndiaye'),
(24, ''),
(24, ''),
(24, 'Fatou Niang'),
(24, 'Fagnan Beye'),
(24, 'Aby Ndiaye'),
(24, ''),
(24, ''),
(24, 'Fatou Niang'),
(24, 'Fagnan Beye'),
(24, 'Aby Ndiaye'),
(24, ''),
(24, ''),
(25, 'Fatou Niang'),
(25, ''),
(25, ''),
(25, ''),
(25, '');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `idMatos` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `nombreTotal` int(11) DEFAULT NULL,
  `description` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `materielutilise`
--

CREATE TABLE `materielutilise` (
  `reftache` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `marque` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materielutilise`
--

INSERT INTO `materielutilise` (`reftache`, `quantite`, `marque`, `designation`) VALUES
(7, 1, 'ingco', 'marteau'),
(7, 1, 'ingco', 'tournevis'),
(7, 5, 'ingco', 'vis'),
(15, 1, 'ingco', 'marteau'),
(15, 1, 'ingco', 'tournevis'),
(15, 5, 'ingco', 'vis'),
(5, 1, 'ingco', 'marteau'),
(5, 1, 'ingco', 'tournevis'),
(5, 5, 'ingco', 'vis'),
(16, 1, 'ingco', 'marteau'),
(16, 1, 'ingco', 'tournevis'),
(16, 5, 'ingco', 'vis'),
(11, 1, 'ingco', 'marteau'),
(11, 1, 'ingco', 'tournevis'),
(11, 5, 'ingco', 'vis'),
(24, 1, 'ingco', 'marteau'),
(24, 1, 'ingco', 'marteau'),
(24, 1, 'ingco', 'marteau'),
(25, 1, 'ingco', 'marteau');

-- --------------------------------------------------------

--
-- Structure de la table `pole`
--

CREATE TABLE `pole` (
  `idPole` varchar(100) NOT NULL,
  `nomPole` varchar(100) DEFAULT NULL,
  `idChef` varchar(30) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pole`
--

INSERT INTO `pole` (`idPole`, `nomPole`, `idChef`, `prenom`, `nom`) VALUES
('100ALL', 'ALL', '201808EGZ', 'Raky', 'KANE'),
('28YMENU', 'Menuiserie', '201808MY2', 'Sira', 'NDIAYE'),
('2D9PLOMB', 'Plomberie', '201808RT1', 'Ndèye Marie', 'DIOP'),
('2F7MACO', 'Maconnerie', '201808EF9', 'Fagnan', 'BEYE'),
('2K0ELEC', 'Electricite', '201808EF8', 'Fatou', 'Niang');

-- --------------------------------------------------------

--
-- Structure de la table `tableConnexion`
--

CREATE TABLE `tableConnexion` (
  `idPersonne` varchar(20) NOT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  `fonction` enum('etudiant','professeur','technicien','autres') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tableConnexion`
--

INSERT INTO `tableConnexion` (`idPersonne`, `prenom`, `nom`, `email`, `mdp`, `fonction`) VALUES
('1', 'Sira', 'Ndiaye', 'sira@esp.sn', 'passer', 'etudiant'),
('201707VKA', 'Mohamed Demba', 'NDIAYE', 'mohameddembandiaye@esp.sn', 'passer', 'technicien'),
('201707VRI', 'El Hadj Abdoul Aziz', 'BA', 'elhadjabdoulazizba@esp.sn', 'passer', 'technicien'),
('201707VV1', 'Daba', 'MBAYE', 'dabambaye@esp.sn', 'passer', 'technicien'),
('2017087NI', 'Mouhammadou Oury', 'DIALLO', 'mouhammadouourydiallo@esp.sn', 'passer', 'technicien'),
('201808ED4', 'Aby', 'NDIAYE', 'abyndiaye@esp.sn', 'passer', 'technicien'),
('201808ED9', 'Oumar', 'SONKO', 'oumarsonko@esp.sn', 'passer', 'etudiant'),
('201808EDP', 'Alassane', 'BA', 'alassaneba@esp.sn', 'passer', 'technicien'),
('201808EDZ', 'Alioune', 'SALL', 'aliounesall@esp.sn', 'passer', 'technicien'),
('201808EF8', 'Fatou', 'NIANG', 'fatouniang1@esp.sn', 'passer', 'technicien'),
('201808EF9', 'Ndeye Fagnan', 'BEYE', 'ndeyefagnanbeye@esp.sn', 'passer', 'technicien'),
('201808EGD', 'Koumou Jonathan', 'ASSAMAGAN', 'koumoujonathanassamagan@esp.sn', 'passer', 'technicien'),
('201808EGH', 'Abdoulaye', 'SAMBE', 'abdoulayesambe@esp.sn', 'passer', 'technicien'),
('201808EGZ', 'Raky', 'KANE', 'rakykane@esp.sn', 'passer', 'technicien'),
('201808EH6', 'Mouhamadou', 'KANE', 'mouhamadoukane@esp.sn', 'passer', 'technicien'),
('201808EH7', 'Mayatta', 'NDIAYE', 'mayattandiaye@esp.sn', 'passer', 'technicien'),
('201808EHA', 'Tibiang Yeshua', 'DOUMGOU', 'tibiangyeshuadoumgou@esp.sn', 'passer', 'technicien'),
('201808EHE', 'Mory', 'DIA', 'morydia@esp.sn', 'passer', 'technicien'),
('201808EID', 'Cheikhou Oumar', 'BA', 'cheikhououmarba@esp.sn', 'passer', 'technicien'),
('201808EIR', 'Mouhamed', 'FALL', 'mouhamedfall1@esp.sn', 'passer', 'technicien'),
('201808EIV', 'Taamba Brice Bedel', 'THIOMBIANO', 'taambathiombiano@esp.sn', 'passer', 'etudiant'),
('201808EKW', 'Younouss', 'ATHIE', 'younoussathie@esp.sn', 'passer', 'technicien'),
('201808EKZ', 'Khardiatou', 'BASSE', 'khardiatoubasse@esp.sn', 'passer', 'technicien'),
('201808GDF', 'Charles Abdoulaye', 'NGOM', 'charlesabdoulayengom@esp.sn', 'passer', 'technicien'),
('201808MY2', 'Sira', 'NDIAYE', 'sirandiaye6@esp.sn', 'passer', 'technicien'),
('201808RT1', 'Ndèye Marie', 'DIOP', 'ndeyemariediop6@esp.sn', 'passer', 'technicien');

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE `taches` (
  `date` date DEFAULT curdate(),
  `nom` varchar(100) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `fonction` varchar(100) DEFAULT NULL,
  `type` enum('Electricite','Plomberie','Maconnerie','Menuiserie','Climatiseur','Video Projecteur','Autre') DEFAULT NULL,
  `cause` varchar(100) DEFAULT NULL,
  `departement` varchar(100) DEFAULT NULL,
  `statut` enum('EN COURS','TERMINÉE','SUSPENDUE','EN ATTENTE') DEFAULT 'EN ATTENTE',
  `delai` int(11) DEFAULT 1,
  `idtech` varchar(30) DEFAULT NULL,
  `motifsuspension` varchar(100) DEFAULT NULL,
  `priorite` enum('Pas Urgent','Peu Urgent','Urgent') DEFAULT NULL,
  `message` varchar(4000) DEFAULT NULL,
  `ref` int(11) NOT NULL,
  `idDemandeur` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `taches`
--

INSERT INTO `taches` (`date`, `nom`, `contact`, `fonction`, `type`, `cause`, `departement`, `statut`, `delai`, `idtech`, `motifsuspension`, `priorite`, `message`, `ref`, `idDemandeur`) VALUES
('2021-05-24', 'raky kane', 772820171, 'technicienne', 'Electricite', 'Usure normale', 'Informatique', 'EN COURS', 2, '201707VV1', NULL, 'Urgent', NULL, 1, NULL),
('2021-05-21', 'raky kane', 772820171, 'technicienne', 'Electricite', 'Usure normale', 'Informatique', 'SUSPENDUE', 5, '201707VV1', 'manque', 'Urgent', NULL, 2, NULL),
('2021-05-21', 'raky kane', 772820171, 'technicienne', 'Electricite', 'Usure normale', 'Informatique', 'EN COURS', 5, '201707VV1', NULL, 'Pas Urgent', NULL, 3, NULL),
('2021-05-23', 'raky kane', 772820171, 'technicienne', 'Electricite', 'Usure normale', 'Informatique', 'TERMINÉE', 3, '201707VV1', NULL, 'Pas Urgent', NULL, 5, NULL),
('2021-05-21', 'raky kane', 772820171, 'technicienne', 'Electricite', 'Usure normale', 'Informatique', 'TERMINÉE', 5, '201707VV1', NULL, 'Urgent', NULL, 7, NULL),
('2021-05-24', 'raky kane', 772820171, 'technicienne', 'Electricite', 'Usure normale', 'Informatique', 'EN COURS', 2, '201707VV1', NULL, 'Urgent', NULL, 9, NULL),
('2021-05-24', 'raky kane', 772820171, 'technicienne', 'Maconnerie', 'Usure normale', 'Informatique', 'TERMINÉE', 2, '201808ED4', NULL, 'Urgent', 'reparation', 11, NULL),
('2021-05-24', 'raky kane', 772820171, 'technicienne', 'Menuiserie', 'Usure normale', 'Informatique', 'EN COURS', 2, '201808MY2', NULL, 'Pas Urgent', NULL, 12, NULL),
('2021-05-24', 'raky kane', 772820171, 'technicienne', 'Plomberie', 'Usure normale', 'Informatique', 'EN ATTENTE', 2, NULL, NULL, 'Pas Urgent', NULL, 13, NULL),
('2021-05-23', 'raky kane', 772820171, 'technicienne', 'Electricite', 'Usure normale', 'Informatique', 'TERMINÉE', 3, '201707VV1', NULL, 'Urgent', NULL, 16, NULL),
('2021-05-24', 'Marie Diop', 774562547, 'Professeur', 'Maconnerie', 'Defaut Produit', 'Genie Mécanique', 'EN COURS', 2, '201808ED4', NULL, 'Peu Urgent', 'Produit défectueux a changer', 19, '1'),
('2021-05-25', 'Sira Ndiaye', 777777777, 'Etudiant', 'Menuiserie', 'Usure Normale', 'LMAGI', 'EN COURS', 2, '201808MY2', NULL, 'Pas Urgent', '', 21, '1'),
('2021-05-25', 'Marie Diop', 768566654, 'Professeur', 'Plomberie', 'Defaut Produit', 'Genie Informatique', 'EN ATTENTE', 2, NULL, NULL, 'Urgent', '', 22, '1'),
('2021-05-27', 'Sira Ndiaye', 768566632, 'Professeur', 'Electricite', 'Usure Normale', 'Genie Informatique', 'TERMINÉE', 1, '201707VV1', NULL, 'Urgent', '', 25, '1');

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

CREATE TABLE `technicien` (
  `idTechnicien` varchar(30) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `statut` enum('Disponible','Indisponible') DEFAULT 'Disponible',
  `prenom` varchar(30) DEFAULT NULL,
  `idPole` varchar(100) DEFAULT NULL,
  `titre` enum('CHEF DE POLE','CHEF SUPREME','AUCUN') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`idTechnicien`, `nom`, `contact`, `service`, `statut`, `prenom`, `idPole`, `titre`) VALUES
('201707VKA', 'NDIAYE', 777777777, 'Electricite', 'Disponible', 'Mohamed Demba', '2K0ELEC', 'AUCUN'),
('201707VRI', 'BA', 777777777, 'Electricite', 'Disponible', 'El Hadj Abdoul Aziz', '2K0ELEC', 'AUCUN'),
('201707VV1', 'MBAYE', 777777777, 'Electricite', 'Disponible', 'Daba', '2K0ELEC', 'AUCUN'),
('2017087NI', 'DIALLO', 777777777, 'Electricite', 'Disponible', 'Mouhammadou Oury', '2K0ELEC', 'AUCUN'),
('201808ED4', 'NDIAYE', 777777777, 'Maconnerie', 'Disponible', 'Aby', '2F7MACO', 'AUCUN'),
('201808EDP', 'BA', 777777777, 'Maconnerie', 'Disponible', 'Alassane', '2F7MACO', 'AUCUN'),
('201808EDZ', 'SALL', 777777777, 'Maconnerie', 'Disponible', 'Alioune', '2F7MACO', 'AUCUN'),
('201808EF8', 'NIANG', 777777777, 'Electricite', 'Disponible', 'Fatou', '2K0ELEC', 'CHEF DE POLE'),
('201808EF9', 'BEYE', 777777777, 'Maconnerie', 'Disponible', 'Ndeye Fagnan', '2F7MACO', 'CHEF DE POLE'),
('201808EGD', 'ASSAMAGAN', 777777777, 'Plomberie', 'Disponible', 'Koumou Jonathan', '2D9PLOMB', 'AUCUN'),
('201808EGH', 'SAMBE', 777777777, 'Maconnerie', 'Disponible', 'Abdoulaye', '2F7MACO', 'AUCUN'),
('201808EGZ', 'KANE', 777777777, 'ALL', 'Disponible', 'Raky', '100ALL', 'CHEF SUPREME'),
('201808EH6', 'KANE', 777777777, 'Menuiserie', 'Disponible', 'Mouhamadou', '28YMENU', 'AUCUN'),
('201808EH7', 'NDIAYE', 777777777, 'Menuiserie', 'Disponible', 'Mayatta', '28YMENU', 'AUCUN'),
('201808EHA', 'DOUMGOU', 777777777, 'Menuiserie', 'Disponible', 'Tibiang Yeshua', '28YMENU', 'AUCUN'),
('201808EHE', 'DIA', 777777777, 'Menuiserie', 'Disponible', 'Mory', '28YMENU', 'AUCUN'),
('201808EID', 'BA', 777777777, 'Plomberie', 'Disponible', 'Cheikhou Oumar', '2D9PLOMB', 'AUCUN'),
('201808EIR', 'FALL', 777777777, 'Plomberie', 'Disponible', 'Mouhamed', '2D9PLOMB', 'AUCUN'),
('201808EKW', 'ATHIE', 777777777, 'Plomberie', 'Disponible', 'Younouss', '2D9PLOMB', 'AUCUN'),
('201808EKZ', 'BASSE', 777777777, 'Plomberie', 'Disponible', 'Khardiatou', '2D9PLOMB', 'AUCUN'),
('201808GDF', 'NGOM', 777777777, 'Plomberie', 'Disponible', 'Charles Abdoulaye', '2D9PLOMB', 'AUCUN'),
('201808MY2', 'NDIAYE', 777777777, 'Menuiserie', 'Disponible', 'Sira', '28YMENU', 'CHEF DE POLE'),
('201808RT1', 'DIOP', 777777777, 'Plomberie', 'Disponible', 'Ndèye Marie', '2D9PLOMB', 'CHEF DE POLE');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fiche`
--
ALTER TABLE `fiche`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `reftache` (`reftache`);

--
-- Index pour la table `intervenants`
--
ALTER TABLE `intervenants`
  ADD KEY `reftache` (`reftache`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`idMatos`);

--
-- Index pour la table `materielutilise`
--
ALTER TABLE `materielutilise`
  ADD KEY `reftache` (`reftache`);

--
-- Index pour la table `pole`
--
ALTER TABLE `pole`
  ADD PRIMARY KEY (`idPole`),
  ADD KEY `idChef` (`idChef`);

--
-- Index pour la table `tableConnexion`
--
ALTER TABLE `tableConnexion`
  ADD PRIMARY KEY (`idPersonne`);

--
-- Index pour la table `taches`
--
ALTER TABLE `taches`
  ADD PRIMARY KEY (`ref`),
  ADD KEY `idDemandeur` (`idDemandeur`),
  ADD KEY `idtech` (`idtech`);

--
-- Index pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD PRIMARY KEY (`idTechnicien`),
  ADD KEY `idPole` (`idPole`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fiche`
--
ALTER TABLE `fiche`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `taches`
--
ALTER TABLE `taches`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fiche`
--
ALTER TABLE `fiche`
  ADD CONSTRAINT `fiche_ibfk_1` FOREIGN KEY (`reftache`) REFERENCES `taches` (`ref`);

--
-- Contraintes pour la table `intervenants`
--
ALTER TABLE `intervenants`
  ADD CONSTRAINT `intervenants_ibfk_1` FOREIGN KEY (`reftache`) REFERENCES `taches` (`ref`);

--
-- Contraintes pour la table `materielutilise`
--
ALTER TABLE `materielutilise`
  ADD CONSTRAINT `materielutilise_ibfk_1` FOREIGN KEY (`reftache`) REFERENCES `taches` (`ref`);

--
-- Contraintes pour la table `pole`
--
ALTER TABLE `pole`
  ADD CONSTRAINT `pole_ibfk_1` FOREIGN KEY (`idChef`) REFERENCES `tableConnexion` (`idPersonne`),
  ADD CONSTRAINT `pole_ibfk_2` FOREIGN KEY (`idChef`) REFERENCES `technicien` (`idTechnicien`);

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `taches_ibfk_1` FOREIGN KEY (`idDemandeur`) REFERENCES `tableConnexion` (`idPersonne`),
  ADD CONSTRAINT `taches_ibfk_2` FOREIGN KEY (`idtech`) REFERENCES `technicien` (`idTechnicien`);

--
-- Contraintes pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD CONSTRAINT `technicien_ibfk_1` FOREIGN KEY (`idPole`) REFERENCES `pole` (`idPole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
