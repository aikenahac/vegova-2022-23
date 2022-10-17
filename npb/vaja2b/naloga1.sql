-- Ustvarjanje PB
CREATE DATABASE DemoPB
CHARACTER SET utf8;

-- 2.	in 3.
CREATE TABLE Predmet (
  pid           INT           NOT NULL AUTO_INCREMENT,
  kratica       CHAR(3)       NOT NULL,
  imePredmeta   VARCHAR(20)   NOT NULL,
  kreditneTocke INT           NOT NULL,
  opis          VARCHAR(200)  NOT NULL,
  PRIMARY KEY(pid)
)
AUTO_INCREMENT = 100
CHARACTER SET "utf8";

-- 4. Način hranjenja je InnoDB

-- 5.
-- matematika, podatkovne baze, fizika,
-- spletne aplikacije, multimedijska tehnologija
INSERT INTO Predmet (kratica, imePredmeta, kreditneTocke, opis)
VALUES ("MAT", "Matematika", 6, "Racionalna funkcija, zaporedja, ...");

INSERT INTO Predmet (kratica, imePredmeta, kreditneTocke, opis)
VALUES ("NPB", "Podatkovne baze", 4, "SQL stavki, mysql, nosql baze, ...");

INSERT INTO Predmet (kratica, imePredmeta, kreditneTocke, opis)
VALUES ("FIZ", "Fizika", 8, ":((");

INSERT INTO Predmet (kratica, imePredmeta, kreditneTocke, opis)
VALUES ("SPL", "Spletne aplikacije", 10, "HTML, CSS, JS, uvod v TS");

INSERT INTO Predmet (kratica, imePredmeta, kreditneTocke, opis)
VALUES ("MLT", "Multimedija", 10, "Spletno oblikovanje");

-- 6.
ALTER TABLE Predmet ADD stUrNaTeden SET('2', '3', '4', '5', '6') AFTER opis;

-- 7.

-- 8.
UPDATE Predmet
  SET stUrNaTeden = '4'
  WHERE kratica = "MAT";

UPDATE Predmet
  SET stUrNaTeden = '4'
  WHERE kratica = "NPB";

UPDATE Predmet
  SET stUrNaTeden = '3'
  WHERE kratica = "FIZ";

UPDATE Predmet
  SET stUrNaTeden = '5'
  WHERE kratica = "SPL";

UPDATE Predmet
  SET stUrNaTeden = '4'
  WHERE kratica = "MLT";

-- 9.
ALTER TABLE Predmet ADD opomba VARCHAR(100) AFTER stUrNaTeden;

-- 10.
SELECT * FROM Predmet;
-- MariaDB [DemoPB]> SELECT * FROM Predmet;
-- +-----+---------+--------------------+---------------+-------------------------------------+-------------+--------+
-- | pid | kratica | imePredmeta        | kreditneTocke | opis                                | stUrNaTeden | opomba |
-- +-----+---------+--------------------+---------------+-------------------------------------+-------------+--------+
-- | 100 | MAT     | Matematika         |             6 | Racionalna funkcija, zaporedja, ... | 4           | NULL   |
-- | 101 | NPB     | Podatkovne baze    |             4 | SQL stavki, mysql, nosql baze, ...  | 4           | NULL   |
-- | 102 | FIZ     | Fizika             |             8 | :((                                 | 3           | NULL   |
-- | 103 | SPL     | Spletne aplikacije |            10 | HTML, CSS, JS, uvod v TS            | 5           | NULL   |
-- | 104 | MLT     | Multimedija        |            10 | Spletno oblikovanje                 | 4           | NULL   |
-- +-----+---------+--------------------+---------------+-------------------------------------+-------------+--------+
-- 5 rows in set (0.001 sec)

-- 11.
UPDATE Predmet
  SET opomba = "zahtevno uporabno"
  WHERE kratica = "MAT";

UPDATE Predmet
  SET opomba = "zanimivo uporabno"
  WHERE kratica = "NPB";

UPDATE Predmet
  SET opomba = "zanimivo"
  WHERE kratica = "FIZ";

-- 12.
SELECT imePredmeta AS "Ime Predmeta" FROM Predmet
WHERE (LOCATE(' ', opomba) > 0);

-- 13.
SELECT imePredmeta AS "Ime Predmeta" FROM Predmet
WHERE (opomba NOT LIKE "%uporabno%") OR opomba IS NULL;

-- 14.
SELECT imePredmeta AS "Ime Predmeta" FROM Predmet
WHERE stUrNaTeden = '4';

-- 15.
-- MariaDB dump 10.19  Distrib 10.9.2-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: DemoPB
-- ------------------------------------------------------
-- Server version       10.9.2-MariaDB-1:10.9.2+maria~ubu2204

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Predmet`
--

DROP TABLE IF EXISTS `Predmet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Predmet` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `kratica` char(3) NOT NULL,
  `imePredmeta` varchar(20) NOT NULL,
  `kreditneTocke` int(11) NOT NULL,
  `opis` varchar(200) NOT NULL,
  `stUrNaTeden` set('2','3','4','5','6') DEFAULT NULL,
  `opomba` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Predmet`
--

LOCK TABLES `Predmet` WRITE;
/*!40000 ALTER TABLE `Predmet` DISABLE KEYS */;
INSERT INTO `Predmet` VALUES
(100,'MAT','Matematika',6,'Racionalna funkcija, zaporedja, ...','4','zahtevno uporabno'),
(101,'NPB','Podatkovne baze',4,'SQL stavki, mysql, nosql baze, ...','4','zanimivo uporabno'),
(102,'FIZ','Fizika',8,':((','3','zanimivo'),
(103,'SPL','Spletne aplikacije',10,'HTML, CSS, JS, uvod v TS','5',NULL),
(104,'MLT','Multimedija',10,'Spletno oblikovanje','4',NULL);
/*!40000 ALTER TABLE `Predmet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-11 11:49:16