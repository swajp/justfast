-- --------------------------------------------------------
-- Hostitel:                     localhost
-- Verze serveru:                10.4.22-MariaDB - mariadb.org binary distribution
-- OS serveru:                   Win64
-- HeidiSQL Verze:               11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Exportování struktury databáze pro
CREATE DATABASE IF NOT EXISTS `justfastdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `justfastdb`;

-- Exportování struktury pro tabulka justfastdb.temprooms
CREATE TABLE IF NOT EXISTS `temprooms` (
  `roomId` int(11) NOT NULL AUTO_INCREMENT,
  `roomName` varchar(128) DEFAULT NULL,
  `roomCode` int(5) DEFAULT NULL,
  `roomCreated` timestamp NULL DEFAULT NULL,
  `roomOwner` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`roomId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Exportování dat pro tabulku justfastdb.temprooms: ~0 rows (přibližně)
DELETE FROM `temprooms`;
/*!40000 ALTER TABLE `temprooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `temprooms` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
