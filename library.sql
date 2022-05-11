-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour library
CREATE DATABASE IF NOT EXISTS `library` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `library`;

-- Listage de la structure de la table library. book
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `description` text,
  `author` varchar(50) NOT NULL DEFAULT '',
  `date_pub` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Listage des données de la table library.book : ~11 rows (environ)
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` (`id`, `title`, `description`, `author`, `date_pub`) VALUES
	(1, 'book', 'on ne connait pas', 'on en fou', '2022-05-06'),
	(2, 'Mouad est content', 'on ne connait pas', 'On sen fou', '2022-05-06'),
	(3, 'book of eli', 'on ne connait pas', 'On sen fou', '2022-05-06'),
	(4, 'book of eli', 'on ne connait pas', 'On sen fou', '2022-05-06'),
	(5, 'book of eli', 'on ne connait pas', 'On sen fou', '2022-05-06'),
	(6, 'book of eli', 'on ne connait pas', 'On sen fou', '2022-05-06'),
	(7, 'toto', 'toao', 'taota', '2022-05-12'),
	(8, 'debat', 'qsdsdsqdqs', 'zerzerzer', '2022-05-06'),
	(9, 'l\'Ã©lÃ©phant', 'd\'escrot', 'Zanga', '2022-05-12'),
	(10, 'l\'Ã©lÃ©phant', 'd\'escrot', 'Zanga', '2022-05-12'),
	(11, 'test update', 'test de update', 'zenab update', '2022-04-27');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
