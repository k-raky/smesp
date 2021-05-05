-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: testMaintenance
-- ------------------------------------------------------
-- Server version	8.0.23

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

--
-- Table structure for table `Tasks`
--

DROP TABLE IF EXISTS `Tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Tasks` (
  `ref` varchar(100) NOT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `priorite` enum('pasUrgent','peuUrgent','urgent') DEFAULT NULL,
  `typeDefaillance` enum('electricite','plomberie','maconnerie','menuiserie','climatiseur','videoProjecteur','autre') DEFAULT NULL,
  `cause` enum('usureNormale','defautUtilisateur','defautProduit','autre') DEFAULT NULL,
  `message` varchar(4000) DEFAULT NULL,
  `idDemandeur` varchar(30) NOT NULL,
  `etat` varchar(100) DEFAULT 'attente',
  PRIMARY KEY (`ref`,`idDemandeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tasks`
--

LOCK TABLES `Tasks` WRITE;
/*!40000 ALTER TABLE `Tasks` DISABLE KEYS */;
INSERT INTO `Tasks` VALUES ('20210501:143116','777777777','pasUrgent','electricite','usureNormale','','201808MY2','attente'),('20210501:143857','777777777','pasUrgent','electricite','usureNormale','','201808MY2','attente');
/*!40000 ALTER TABLE `Tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipes`
--

DROP TABLE IF EXISTS `equipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipes` (
  `idPole` int DEFAULT NULL,
  `idTechnicien` varchar(20) DEFAULT NULL,
  KEY `idPole` (`idPole`),
  KEY `idTechnicien` (`idTechnicien`),
  CONSTRAINT `equipes_ibfk_1` FOREIGN KEY (`idPole`) REFERENCES `pole` (`idPole`),
  CONSTRAINT `equipes_ibfk_2` FOREIGN KEY (`idTechnicien`) REFERENCES `tableConnexion` (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipes`
--

LOCK TABLES `equipes` WRITE;
/*!40000 ALTER TABLE `equipes` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipes` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materiel`
--

LOCK TABLES `materiel` WRITE;
/*!40000 ALTER TABLE `materiel` DISABLE KEYS */;
/*!40000 ALTER TABLE `materiel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pole`
--

DROP TABLE IF EXISTS `pole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pole` (
  `idPole` int NOT NULL,
  `nomPole` varchar(100) DEFAULT NULL,
  `idChef` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idPole`),
  KEY `idChef` (`idChef`),
  CONSTRAINT `pole_ibfk_1` FOREIGN KEY (`idChef`) REFERENCES `tableConnexion` (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pole`
--

LOCK TABLES `pole` WRITE;
/*!40000 ALTER TABLE `pole` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableConnexion`
--

LOCK TABLES `tableConnexion` WRITE;
/*!40000 ALTER TABLE `tableConnexion` DISABLE KEYS */;
INSERT INTO `tableConnexion` VALUES ('201707VKA','Mohamed Demba','NDIAYE','mohameddembandiaye@esp.sn','774316131','technicien'),('201707VRI','El Hadj Abdoul Aziz','BA','elhadjabdoulazizba@esp.sn','776295947','technicien'),('201707VV1','Daba','MBAYE','dabambaye@esp.sn','786333017','technicien'),('2017087NI','Mouhammadou Oury','DIALLO','mouhammadouourydiallo@esp.sn','772806246','technicien'),('201808ED4','Aby','NDIAYE','abyndiaye@esp.sn','773449169','technicien'),('201808ED9','Oumar','SONKO','oumarsonko@esp.sn','785332594','etudiant'),('201808EDP','Alassane','BA','alassaneba@esp.sn','771359576','technicien'),('201808EDZ','Alioune','SALL','aliounesall@esp.sn','784670118','technicien'),('201808EF8','Fatou','NIANG','fatouniang1@esp.sn','772364120','technicien'),('201808EF9','Ndeye Fagnan','BEYE','ndeyefagnanbeye@esp.sn','777637394','technicien'),('201808EGD','Koumou Jonathan','ASSAMAGAN','koumoujonathanassamagan@esp.sn','etudiant2020@ESP','technicien'),('201808EGH','Abdoulaye','SAMBE','abdoulayesambe@esp.sn','775160095','technicien'),('201808EGZ','Raky','KANE','rakykane@esp.sn','772820171','technicien'),('201808EH6','Mouhamadou','KANE','mouhamadoukane@esp.sn','777572779','technicien'),('201808EH7','Mayatta','NDIAYE','mayattandiaye@esp.sn','777831285','technicien'),('201808EHA','Tibiang Yeshua','DOUMGOU','tibiangyeshuadoumgou@esp.sn','771560410','technicien'),('201808EHE','Mory','DIA','morydia@esp.sn','777235190','technicien'),('201808EID','Cheikhou Oumar','BA','cheikhououmarba@esp.sn','782727191','technicien'),('201808EIR','Mouhamed','FALL','mouhamedfall1@esp.sn','784788218','technicien'),('201808EIV','Taamba Brice Bedel','THIOMBIANO','taambathiombiano@esp.sn','767893208','etudiant'),('201808EKW','Younouss','ATHIE','younoussathie@esp.sn','782064532','technicien'),('201808EKZ','Khardiatou','BASSE','khardiatoubasse@esp.sn','774676910','technicien'),('201808GDF','Charles Abdoulaye','NGOM','charlesabdoulayengom@esp.sn','777915134','technicien'),('201808MY2','Sira','NDIAYE','sirandiaye6@esp.sn','777773596','technicien'),('201808RT1','Ndèye Marie','DIOP','ndeyemariediop6@esp.sn','783042966','technicien');
/*!40000 ALTER TABLE `tableConnexion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-04 14:29:00
