-- MySQL dump 10.13  Distrib 5.5.27, for Win32 (x86)
--
-- Host: localhost    Database: zbirkacd
-- ------------------------------------------------------
-- Server version	5.5.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `avtor`
--
CREATE DATABASE ZbirkaCD2;
USE ZbirkaCD2;

DROP TABLE IF EXISTS `avtor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avtor` (
  `AvtorID` int(11) NOT NULL,
  `Ime` char(10) NOT NULL,
  `Priimek` char(20) DEFAULT NULL,
  `drzava` char(3) NOT NULL,
  `rojen` date DEFAULT NULL,
  PRIMARY KEY (`AvtorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avtor`
--

LOCK TABLES `avtor` WRITE;
/*!40000 ALTER TABLE `avtor` DISABLE KEYS */;
INSERT INTO `avtor` VALUES (10,'Carl','ORFF','NEM','1895-06-10'),(14,'Leonard','Cohen','ZDA',NULL),(20,'Charles','GOUNOD','FRA','1818-06-17'),(30,'Brian','ADAMS','ZDA','1959-01-05'),(40,'Gaetano','DONIZETTI','ITA','1797-11-29'),(50,'Georges','BIZET','FRA','1838-10-25'),(60,'Viktor','PARMA','SLO','1858-02-20'),(70,'Gustav','Mahler','AVS','1860-06-07'),(80,'Giuseppe','Verdi','ITA','1813-10-10'),(90,'Jani','Golob','SLO','1948-01-18'),(100,'Gustav','Ipavec','SLO','1841-08-15'),(110,'Domenico','Scarlatti','ITA','1685-10-26'),(120,'John','Elton','ANG','1947-03-25'),(130,'Ivan','Zajc','HRV','1832-08-03'),(140,'Franz','Liszt','MAD','1811-10-22'),(150,'Vatroslav','Lisinski','HRV','1819-07-08');
/*!40000 ALTER TABLE `avtor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cd`
--

DROP TABLE IF EXISTS `cd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd` (
  `CDID` int(11) NOT NULL,
  `NaslovCD` char(20) NOT NULL,
  `Cena` float DEFAULT NULL,
  `Opombe` char(100) DEFAULT NULL,
  `leto` int(11) DEFAULT NULL,
  PRIMARY KEY (`CDID`),
  UNIQUE KEY `uniq_ImeCD` (`NaslovCD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cd`
--

LOCK TABLES `cd` WRITE;
/*!40000 ALTER TABLE `cd` DISABLE KEYS */;
INSERT INTO `cd` VALUES (1,'The Best Of',18.6,'nova izdaja',2011),(2,'From Brian',12,NULL,2010),(3,'Love Melodies',14,NULL,2011),(4,'Izbor klasike',15,'resna glasba',2010),(5,'Opera Box 1',18,NULL,2010);
/*!40000 ALTER TABLE `cd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posnetek`
--

DROP TABLE IF EXISTS `posnetek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posnetek` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `Naslov` char(20) NOT NULL,
  `Genre` char(10) NOT NULL,
  `Trajanje` time NOT NULL,
  `AvtorID` int(11) NOT NULL,
  PRIMARY KEY (`PID`),
  KEY `tujiKAvtor` (`AvtorID`),
  CONSTRAINT `tujiKAvtor` FOREIGN KEY (`AvtorID`) REFERENCES `avtor` (`AvtorID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posnetek`
--

LOCK TABLES `posnetek` WRITE;
/*!40000 ALTER TABLE `posnetek` DISABLE KEYS */;
INSERT INTO `posnetek` VALUES (1,'Carmina Burana','klasika','00:05:24',10),(2,'Valse De Juliette','klasika','00:03:25',30),(3,'Viva la Mamma','klasika','00:06:10',40),(4,'Una furtiva lagrima','klasika','00:04:15',40),(5,'La dolce guidami','klasika','00:03:15',40),(6,'Habanera','klasika','00:04:20',50),(7,'Les Toreadors','klasika','00:05:10',50),(8,'Summer of 69','rock','00:04:10',30),(9,'Heaven','pop','00:04:10',30),(10,'Please forgive me','pop','00:03:20',30),(11,'O fortuna','klasika','00:05:30',10),(12,'Ballade','klasika','00:07:22',30);
/*!40000 ALTER TABLE `posnetek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vsebina`
--

DROP TABLE IF EXISTS `vsebina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vsebina` (
  `CDID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  PRIMARY KEY (`CDID`,`PID`),
  KEY `tujiKPID` (`PID`),
  CONSTRAINT `tujiKCD` FOREIGN KEY (`CDID`) REFERENCES `cd` (`CDID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tujiKPID` FOREIGN KEY (`PID`) REFERENCES `posnetek` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vsebina`
--

LOCK TABLES `vsebina` WRITE;
/*!40000 ALTER TABLE `vsebina` DISABLE KEYS */;
INSERT INTO `vsebina` VALUES (4,1),(4,2),(4,3),(4,4),(5,5),(4,6),(5,6),(4,7),(5,7),(2,8),(2,9),(2,10),(5,11);
/*!40000 ALTER TABLE `vsebina` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-21 22:03:45
