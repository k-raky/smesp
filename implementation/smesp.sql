-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: bejunitqknwdzbyfqz0y-mysql.services.clever-cloud.com    Database: bejunitqknwdzbyfqz0y
-- ------------------------------------------------------
-- Server version	8.0.22-13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ 'a05a675a-1414-11e9-9c82-cecd01b08c7e:1-491550428,
a38a16d0-767a-11eb-abe2-cecd029e558e:1-22673712';

--
-- Table structure for table `fiche`
--

DROP TABLE IF EXISTS `fiche`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fiche` (
  `numero` int NOT NULL AUTO_INCREMENT,
  `reftache` int DEFAULT NULL,
  `datefiche` date DEFAULT NULL,
  `visa` varchar(100) DEFAULT NULL,
  `datetache` date DEFAULT NULL,
  `lieu` varchar(100) DEFAULT NULL,
  `duree` int DEFAULT NULL,
  `typemaint` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`numero`),
  KEY `reftache` (`reftache`),
  CONSTRAINT `fiche_ibfk_1` FOREIGN KEY (`reftache`) REFERENCES `taches` (`ref`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fiche`
--

LOCK TABLES `fiche` WRITE;
/*!40000 ALTER TABLE `fiche` DISABLE KEYS */;
INSERT INTO `fiche` VALUES (6,7,'2021-05-09','ok','2021-05-07','DGI ESP',5,'corrective'),(7,15,'2021-05-09','ok','2021-05-03','DGM ESP',2,'preventive'),(8,5,'2021-05-10','ok','2021-05-10','DGI ESP',2,'corrective'),(9,16,'2021-05-10','ok','2021-05-10','DGI ESP',2,'preventive'),(10,11,'2021-05-23','ok','2021-05-19','DGI ESP',1,'preventive');
/*!40000 ALTER TABLE `fiche` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intervenants`
--

DROP TABLE IF EXISTS `intervenants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervenants` (
  `reftache` int DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  KEY `reftache` (`reftache`),
  CONSTRAINT `intervenants_ibfk_1` FOREIGN KEY (`reftache`) REFERENCES `taches` (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervenants`
--

LOCK TABLES `intervenants` WRITE;
/*!40000 ALTER TABLE `intervenants` DISABLE KEYS */;
INSERT INTO `intervenants` VALUES (7,'Fatou Niang'),(7,'Fagnan Beye'),(7,'Aby Ndiaye'),(7,''),(7,''),(15,'Fatou Niang'),(15,'Fagnan Beye'),(15,'Aby Ndiaye'),(15,''),(15,''),(5,'Fatou Niang'),(5,'Fagnan Beye'),(5,'Aby Ndiaye'),(5,''),(5,''),(16,'Fatou Niang'),(16,'Fagnan Beye'),(16,'Aby Ndiaye'),(16,''),(16,''),(11,'Fatou Niang'),(11,'Fagnan Beye'),(11,'Aby Ndiaye'),(11,''),(11,'');
/*!40000 ALTER TABLE `intervenants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materiel` (
  `idMatos` int NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `nombreTotal` int DEFAULT NULL,
  `description` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`idMatos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materiel`
--

LOCK TABLES `materiel` WRITE;
/*!40000 ALTER TABLE `materiel` DISABLE KEYS */;
/*!40000 ALTER TABLE `materiel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materielutilise`
--

DROP TABLE IF EXISTS `materielutilise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materielutilise` (
  `reftache` int DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  `marque` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  KEY `reftache` (`reftache`),
  CONSTRAINT `materielutilise_ibfk_1` FOREIGN KEY (`reftache`) REFERENCES `taches` (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materielutilise`
--

LOCK TABLES `materielutilise` WRITE;
/*!40000 ALTER TABLE `materielutilise` DISABLE KEYS */;
INSERT INTO `materielutilise` VALUES (7,1,'ingco','marteau'),(7,1,'ingco','tournevis'),(7,5,'ingco','vis'),(15,1,'ingco','marteau'),(15,1,'ingco','tournevis'),(15,5,'ingco','vis'),(5,1,'ingco','marteau'),(5,1,'ingco','tournevis'),(5,5,'ingco','vis'),(16,1,'ingco','marteau'),(16,1,'ingco','tournevis'),(16,5,'ingco','vis'),(11,1,'ingco','marteau'),(11,1,'ingco','tournevis'),(11,5,'ingco','vis');
/*!40000 ALTER TABLE `materielutilise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pole`
--

DROP TABLE IF EXISTS `pole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pole` (
  `idPole` varchar(100) NOT NULL,
  `nomPole` varchar(100) DEFAULT NULL,
  `idChef` varchar(30) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPole`),
  KEY `idChef` (`idChef`),
  CONSTRAINT `pole_ibfk_1` FOREIGN KEY (`idChef`) REFERENCES `tableConnexion` (`idPersonne`),
  CONSTRAINT `pole_ibfk_2` FOREIGN KEY (`idChef`) REFERENCES `technicien` (`idTechnicien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pole`
--

LOCK TABLES `pole` WRITE;
/*!40000 ALTER TABLE `pole` DISABLE KEYS */;
INSERT INTO `pole` VALUES ('100ALL','ALL','201808EGZ','Raky','KANE'),('28YMENU','Menuiserie','201808MY2','Sira','NDIAYE'),('2D9PLOMB','Plomberie','201808RT1','Ndèye Marie','DIOP'),('2F7MACO','Maconnerie','201808EF9','Fagnan','BEYE'),('2K0ELEC','Electricite','201808EF8','Fatou','Niang');
/*!40000 ALTER TABLE `pole` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableConnexion`
--

DROP TABLE IF EXISTS `tableConnexion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tableConnexion` (
  `idPersonne` varchar(20) NOT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  `fonction` enum('etudiant','professeur','technicien','autres') DEFAULT NULL,
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableConnexion`
--

LOCK TABLES `tableConnexion` WRITE;
/*!40000 ALTER TABLE `tableConnexion` DISABLE KEYS */;
INSERT INTO `tableConnexion` VALUES ('1','Sira','Ndiaye','sira@ndiaye.com','sira','etudiant'),('201707VKA','Mohamed Demba','NDIAYE','mohameddembandiaye@esp.sn','774316131','technicien'),('201707VRI','El Hadj Abdoul Aziz','BA','elhadjabdoulazizba@esp.sn','776295947','technicien'),('201707VV1','Daba','MBAYE','dabambaye@esp.sn','786333017','technicien'),('2017087NI','Mouhammadou Oury','DIALLO','mouhammadouourydiallo@esp.sn','772806246','technicien'),('201808ED4','Aby','NDIAYE','abyndiaye@esp.sn','773449169','technicien'),('201808ED9','Oumar','SONKO','oumarsonko@esp.sn','785332594','etudiant'),('201808EDP','Alassane','BA','alassaneba@esp.sn','771359576','technicien'),('201808EDZ','Alioune','SALL','aliounesall@esp.sn','784670118','technicien'),('201808EF8','Fatou','NIANG','fatouniang1@esp.sn','772364120','technicien'),('201808EF9','Ndeye Fagnan','BEYE','ndeyefagnanbeye@esp.sn','777637394','technicien'),('201808EGD','Koumou Jonathan','ASSAMAGAN','koumoujonathanassamagan@esp.sn','etudiant2020@ESP','technicien'),('201808EGH','Abdoulaye','SAMBE','abdoulayesambe@esp.sn','775160095','technicien'),('201808EGZ','Raky','KANE','rakykane@esp.sn','772820171','technicien'),('201808EH6','Mouhamadou','KANE','mouhamadoukane@esp.sn','777572779','technicien'),('201808EH7','Mayatta','NDIAYE','mayattandiaye@esp.sn','777831285','technicien'),('201808EHA','Tibiang Yeshua','DOUMGOU','tibiangyeshuadoumgou@esp.sn','771560410','technicien'),('201808EHE','Mory','DIA','morydia@esp.sn','777235190','technicien'),('201808EID','Cheikhou Oumar','BA','cheikhououmarba@esp.sn','782727191','technicien'),('201808EIR','Mouhamed','FALL','mouhamedfall1@esp.sn','784788218','technicien'),('201808EIV','Taamba Brice Bedel','THIOMBIANO','taambathiombiano@esp.sn','767893208','etudiant'),('201808EKW','Younouss','ATHIE','younoussathie@esp.sn','782064532','technicien'),('201808EKZ','Khardiatou','BASSE','khardiatoubasse@esp.sn','774676910','technicien'),('201808GDF','Charles Abdoulaye','NGOM','charlesabdoulayengom@esp.sn','777915134','technicien'),('201808MY2','Sira','NDIAYE','sirandiaye6@esp.sn','777773596','technicien'),('201808RT1','Ndèye Marie','DIOP','ndeyemariediop6@esp.sn','783042966','technicien');
/*!40000 ALTER TABLE `tableConnexion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taches`
--

DROP TABLE IF EXISTS `taches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taches` (
  `date` date DEFAULT (curdate()),
  `nom` varchar(100) DEFAULT NULL,
  `contact` int DEFAULT NULL,
  `fonction` varchar(100) DEFAULT NULL,
  `type` enum('Electricite','Plomberie','Maconnerie','Menuiserie','Climatiseur','Video Projecteur','Autre') DEFAULT NULL,
  `cause` varchar(100) DEFAULT NULL,
  `departement` varchar(100) DEFAULT NULL,
  `statut` enum('EN COURS','TERMINÉE','SUSPENDUE','EN ATTENTE') DEFAULT NULL,
  `delai` int DEFAULT '1',
  `idtech` varchar(30) DEFAULT NULL,
  `motifsuspension` varchar(100) DEFAULT NULL,
  `priorite` enum('Pas Urgent','Peu Urgent','Urgent') DEFAULT NULL,
  `message` varchar(4000) DEFAULT NULL,
  `ref` int NOT NULL AUTO_INCREMENT,
  `idDemandeur` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ref`),
  KEY `idDemandeur` (`idDemandeur`),
  KEY `idtech` (`idtech`),
  CONSTRAINT `taches_ibfk_1` FOREIGN KEY (`idDemandeur`) REFERENCES `tableConnexion` (`idPersonne`),
  CONSTRAINT `taches_ibfk_2` FOREIGN KEY (`idtech`) REFERENCES `technicien` (`idTechnicien`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taches`
--

LOCK TABLES `taches` WRITE;
/*!40000 ALTER TABLE `taches` DISABLE KEYS */;
INSERT INTO `taches` VALUES ('2021-05-05','raky kane',772820171,'technicienne','Electricite','Usure normale','Informatique','SUSPENDUE',1,'201808EF8','manque de materiel','Urgent',NULL,1,NULL),('2021-05-05','raky kane',772820171,'technicienne','Electricite','Usure normale','Informatique','SUSPENDUE',5,'201808EF8','manque','Urgent',NULL,2,NULL),('2021-05-05','raky kane',772820171,'technicienne','Electricite','Usure normale','Informatique','EN COURS',5,'201808EF8',NULL,'Pas Urgent',NULL,3,NULL),('2021-05-05','raky kane',772820171,'technicienne','Electricite','Usure normale','Informatique','EN COURS',2,'201808EF8',NULL,'Pas Urgent',NULL,4,NULL),('2021-05-05','raky kane',772820171,'technicienne','Electricite','Usure normale','Informatique','TERMINÉE',2,'201808EF8',NULL,'Pas Urgent',NULL,5,NULL),('2021-05-05','raky kane',772820171,'technicienne','Electricite','Usure normale','Informatique','EN COURS',5,'201808EF8',NULL,'Urgent',NULL,6,NULL),('2021-05-05','raky kane',772820171,'technicienne','Electricite','Usure normale','Informatique','TERMINÉE',5,'201808EF8',NULL,'Urgent',NULL,7,NULL),('2021-05-05','raky kane',772820171,'technicienne','Electricite','Usure normale','Informatique','EN COURS',1,'201808EF8',NULL,'Urgent',NULL,9,NULL),('2021-05-05','raky kane',772820171,'technicienne','Electricite','Usure normale','Informatique','EN COURS',1,'201707VKA',NULL,'Urgent',NULL,10,NULL),('2021-05-05','raky kane',772820171,'technicienne','Maconnerie','Usure normale','Informatique','TERMINÉE',1,'201808ED4',NULL,'Urgent','reparation',11,NULL),('2021-05-05','raky kane',772820171,'technicienne','Menuiserie','Usure normale','Informatique','EN COURS',1,'201808MY2',NULL,'Pas Urgent',NULL,12,NULL),('2021-05-05','raky kane',772820171,'technicienne','Plomberie','Usure normale','Informatique','EN ATTENTE',1,NULL,NULL,'Pas Urgent',NULL,13,NULL),('2021-05-05','raky kane',772820171,'technicienne','Electricite','Usure normale','Informatique','EN COURS',1,'201808EF8',NULL,'Urgent',NULL,14,NULL),('2021-05-05','raky kane',772820171,'technicienne','Electricite','Usure normale','Informatique','TERMINÉE',2,'201808EF8',NULL,'Urgent',NULL,15,NULL),('2021-05-05','raky kane',772820171,'technicienne','Electricite','Usure normale','Informatique','TERMINÉE',2,'201808EF8',NULL,'Urgent',NULL,16,NULL),('2021-05-08','Sira Ndiaye',777777777,'Etudiant','Electricite','Usure Normale','Autre','SUSPENDUE',1,'201707VKA',NULL,'Pas Urgent','',17,'1'),('2021-05-16','Sira Ndiaye',777777777,'Etudiant','Electricite','Usure Normale','Batiment Direction','EN COURS',1,'201707VRI',NULL,'Pas Urgent','',18,'1'),('2021-05-17','Marie Diop',774562547,'Professeur','Maconnerie','Defaut Produit','Genie Mécanique','EN COURS',1,'201808ED4',NULL,'Peu Urgent','Produit défectueux a changer',19,'1'),('2021-05-23','Marie Diop',768566643,'Professeur','Maconnerie','Defaut Produit','Genie Mécanique','EN ATTENTE',1,NULL,NULL,'Urgent','Ordinateur',20,'1');
/*!40000 ALTER TABLE `taches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `technicien` (
  `idTechnicien` varchar(30) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `contact` int DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `statut` enum('Disponible','Indisponible') DEFAULT 'Disponible',
  `prenom` varchar(30) DEFAULT NULL,
  `idPole` varchar(100) DEFAULT NULL,
  `titre` enum('CHEF DE POLE','CHEF SUPREME','AUCUN') DEFAULT NULL,
  PRIMARY KEY (`idTechnicien`),
  KEY `idPole` (`idPole`),
  CONSTRAINT `technicien_ibfk_1` FOREIGN KEY (`idPole`) REFERENCES `pole` (`idPole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technicien`
--

LOCK TABLES `technicien` WRITE;
/*!40000 ALTER TABLE `technicien` DISABLE KEYS */;
INSERT INTO `technicien` VALUES ('201707VKA','NDIAYE',777777777,'Electricite','Disponible','Mohamed Demba','2K0ELEC','AUCUN'),('201707VRI','BA',777777777,'Electricite','Disponible','El Hadj Abdoul Aziz','2K0ELEC','AUCUN'),('201707VV1','MBAYE',777777777,'Electricite','Disponible','Daba','2K0ELEC','AUCUN'),('2017087NI','DIALLO',777777777,'Electricite','Disponible','Mouhammadou Oury','2K0ELEC','AUCUN'),('201808ED4','NDIAYE',777777777,'Maconnerie','Disponible','Aby','2F7MACO','AUCUN'),('201808EDP','BA',777777777,'Maconnerie','Disponible','Alassane','2F7MACO','AUCUN'),('201808EDZ','SALL',777777777,'Maconnerie','Disponible','Alioune','2F7MACO','AUCUN'),('201808EF8','NIANG',777777777,'Electricite','Disponible','Fatou','2K0ELEC','CHEF DE POLE'),('201808EF9','BEYE',777777777,'Maconnerie','Disponible','Ndeye Fagnan','2F7MACO','CHEF DE POLE'),('201808EGD','ASSAMAGAN',777777777,'Plomberie','Disponible','Koumou Jonathan','2D9PLOMB','AUCUN'),('201808EGH','SAMBE',777777777,'Maconnerie','Disponible','Abdoulaye','2F7MACO','AUCUN'),('201808EGZ','KANE',777777777,'ALL','Disponible','Raky','100ALL','CHEF SUPREME'),('201808EH6','KANE',777777777,'Menuiserie','Disponible','Mouhamadou','28YMENU','AUCUN'),('201808EH7','NDIAYE',777777777,'Menuiserie','Disponible','Mayatta','28YMENU','AUCUN'),('201808EHA','DOUMGOU',777777777,'Menuiserie','Disponible','Tibiang Yeshua','28YMENU','AUCUN'),('201808EHE','DIA',777777777,'Menuiserie','Disponible','Mory','28YMENU','AUCUN'),('201808EID','BA',777777777,'Plomberie','Disponible','Cheikhou Oumar','2D9PLOMB','AUCUN'),('201808EIR','FALL',777777777,'Plomberie','Disponible','Mouhamed','2D9PLOMB','AUCUN'),('201808EKW','ATHIE',777777777,'Plomberie','Disponible','Younouss','2D9PLOMB','AUCUN'),('201808EKZ','BASSE',777777777,'Plomberie','Disponible','Khardiatou','2D9PLOMB','AUCUN'),('201808GDF','NGOM',777777777,'Plomberie','Disponible','Charles Abdoulaye','2D9PLOMB','AUCUN'),('201808MY2','NDIAYE',777777777,'Menuiserie','Disponible','Sira','28YMENU','CHEF DE POLE'),('201808RT1','DIOP',777777777,'Plomberie','Disponible','Ndèye Marie','2D9PLOMB','CHEF DE POLE');
/*!40000 ALTER TABLE `technicien` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-24 15:08:29
