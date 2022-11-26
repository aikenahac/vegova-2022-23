-- 1.
CREATE DATABASE JavnaUprava
CHARACTER SET utf8;

-- 2.
CREATE TABLE Pokrajina(
  id            INT           NOT NULL  AUTO_INCREMENT,
  imePokrajine  VARCHAR(20)   NOT NULL,

  PRIMARY KEY(id)
);

CREATE TABLE Kraj(
  id            INT           NOT NULL   AUTO_INCREMENT,
  imeKraja      VARCHAR(30)   NOT NULL,
  pokrajinaID   INT           NOT NULL,

  PRIMARY KEY(id),
  FOREIGN KEY (pokrajinaID) REFERENCES Pokrajina(id)
);

-- 3.
ALTER TABLE Pokrajina
ADD opis VARCHAR(50);

-- 4.
ALTER TABLE Kraj
ADD steviloPrebivalcev  INT   NOT NULL
CHECK (steviloPrebivalcev >= 0);

-- 5.
CREATE TABLE Obcan (
  emso          CHAR(13)      NOT NULL,
  ime           VARCHAR(20)   NOT NULL,
  priimek       VARCHAR(20)   NOT NULL,
  datumRojstva  DATE          NOT NULL,
  krajID        INT,

  PRIMARY KEY(emso)
);

-- 6.
ALTER TABLE Obcan
ADD FOREIGN KEY(krajID) REFERENCES Kraj(id)
ON UPDATE CASCADE
ON DELETE SET NULL;

-- 7.
ALTER TABLE Obcan
MODIFY COLUMN ime VARCHAR(20) NOT NULL
AFTER priimek;

-- 8.
ALTER TABLE Obcan
ADD spol ENUM("m", "z");

-- 9.
DESCRIBE Pokrajina;
+--------------+-------------+------+-----+---------+----------------+
| Field        | Type        | Null | Key | Default | Extra          |
+--------------+-------------+------+-----+---------+----------------+
| id           | int(11)     | NO   | PRI | NULL    | auto_increment |
| imePokrajine | varchar(20) | NO   |     | NULL    |                |
| opis         | varchar(50) | YES  |     | NULL    |                |
+--------------+-------------+------+-----+---------+----------------+

DESCRIBE Kraj;
+--------------------+-------------+------+-----+---------+----------------+
| Field              | Type        | Null | Key | Default | Extra          |
+--------------------+-------------+------+-----+---------+----------------+
| id                 | int(11)     | NO   | PRI | NULL    | auto_increment |
| imeKraja           | varchar(30) | NO   |     | NULL    |                |
| pokrajinaID        | int(11)     | NO   | MUL | NULL    |                |
| steviloPrebivalcev | int(11)     | NO   |     | NULL    |                |
+--------------------+-------------+------+-----+---------+----------------+

DESCRIBE Obcan;
+--------------+---------------+------+-----+---------+-------+
| Field        | Type          | Null | Key | Default | Extra |
+--------------+---------------+------+-----+---------+-------+
| emso         | char(13)      | NO   | PRI | NULL    |       |
| priimek      | varchar(20)   | NO   |     | NULL    |       |
| ime          | varchar(20)   | NO   |     | NULL    |       |
| datumRojstva | date          | NO   |     | NULL    |       |
| krajID       | int(11)       | YES  | MUL | NULL    |       |
| spol         | enum('m','z') | YES  |     | NULL    |       |
+--------------+---------------+------+-----+---------+-------+

-- 10.
+-----------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Table     | Create Table                                                                                                                                                                                              |
+-----------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Pokrajina | CREATE TABLE `Pokrajina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imePokrajine` varchar(20) NOT NULL,
  `opis` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 |
+-----------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+

+-------+-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Table | Create Table                                                                                                                                                                                                                                                                                                                                                                                          |
+-------+-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Kraj  | CREATE TABLE `Kraj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imeKraja` varchar(30) NOT NULL,
  `pokrajinaID` int(11) NOT NULL,
  `steviloPrebivalcev` int(11) NOT NULL CHECK (`steviloPrebivalcev` >= 0),
  PRIMARY KEY (`id`),
  KEY `pokrajinaID` (`pokrajinaID`),
  CONSTRAINT `Kraj_ibfk_1` FOREIGN KEY (`pokrajinaID`) REFERENCES `Pokrajina` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 |
+-------+-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+

+-------+--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Table | Create Table                                                                                                                                                                                                                                                                                                                                                                                                                         |
+-------+--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Obcan | CREATE TABLE `Obcan` (
  `emso` char(13) NOT NULL,
  `priimek` varchar(20) NOT NULL,
  `ime` varchar(20) NOT NULL,
  `datumRojstva` date NOT NULL,
  `krajID` int(11) DEFAULT NULL,
  `spol` enum('m','z') DEFAULT NULL,
  PRIMARY KEY (`emso`),
  KEY `krajID` (`krajID`),
  CONSTRAINT `Obcan_ibfk_1` FOREIGN KEY (`krajID`) REFERENCES `Kraj` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 |
+-------+--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+

-- 11.
CREATE TABLE Obisk(
  emso          CHAR(13)  NOT NULL,
  krajID        INT       NOT NULL,
  datumObiska   DATE      NOT NULL,

  PRIMARY KEY(emso, krajID, datumObiska),
  FOREIGN KEY (emso) REFERENCES Obcan(emso),
  FOREIGN KEY (krajID) REFERENCES Kraj(id)
);

-- 12.
CREATE TABLE Vtisi(
  emso          CHAR(13)      NOT NULL,
  krajID        INT           NOT NULL,
  datumObiska   DATE          NOT NULL,
  besedilo      VARCHAR(100)  NOT NULL  DEFAULT "vse naj",

  PRIMARY KEY(emso, krajID, datumObiska),
  FOREIGN KEY(emso, krajID, datumObiska)
  REFERENCES Obcan(emso, krajID, datumObiska)
);