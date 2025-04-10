-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for education_system
CREATE DATABASE IF NOT EXISTS `education_system` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `education_system`;

-- Dumping structure for table education_system.classes
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `hour` time DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table education_system.classes: ~0 rows (approximately)
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;

-- Dumping structure for table education_system.relation_users_classes
CREATE TABLE IF NOT EXISTS `relation_users_classes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` int(10) NOT NULL,
  `class` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `user` (`user`),
  KEY `class` (`class`),
  CONSTRAINT `FK_relation_users_classes_classes` FOREIGN KEY (`class`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_relation_users_classes_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table education_system.relation_users_classes: ~0 rows (approximately)
/*!40000 ALTER TABLE `relation_users_classes` DISABLE KEYS */;
/*!40000 ALTER TABLE `relation_users_classes` ENABLE KEYS */;

-- Dumping structure for table education_system.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `permission` enum('admin','viewer') NOT NULL DEFAULT 'admin',
  `type` enum('teacher','student') NOT NULL DEFAULT 'student',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table education_system.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `permission`, `type`) VALUES
	(1, 'santi', 'teste', '$2y$10$r7n.nV31OmW4dZNEWnU1ru36iPHJry1AZvaTCaixk.IOrhOBTsX5S', 'admin', 'student'),
	(2, 'aaa', 'aaa', '$2y$10$N4o2U2ddyqP4FynNQOPCHeuGtvLMVEkp/LCC0cRWOqcObAlSU.K9a', 'admin', 'student'),
	(3, 'aaa', 'aaa', '$2y$10$6xmPRz.X/QyYx4qcvI0bju4Iwmrovfu98lhNrVKmxagTt32iscz/.', 'admin', 'student'),
	(4, 'aaa', 'aaa', '$2y$10$jyKyaQd.UhNLrwlu9UlAk.y51u7SaLYCj3L9oIIcsNKJvP6exqG6y', 'admin', 'student'),
	(5, 'aaa', 'aaa', '$2y$10$ayIDGMTfU2tlEE.CHNV27O9/155XISjYI5qmuHvjhf8pFlI.j/q6i', 'admin', 'student');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
