-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.6.3-MariaDB - Arch Linux
-- SE du serveur:                Linux
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour VENTES
CREATE DATABASE IF NOT EXISTS `VENTES` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `VENTES`;

-- Listage de la structure de la table VENTES. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categ` int(11) NOT NULL AUTO_INCREMENT,
  `code_categ` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_categ` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_couv_categ` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrpt_categ` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`code_categ`),
  KEY `id_categ` (`id_categ`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table VENTES. clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id_cli` int(11) NOT NULL AUTO_INCREMENT,
  `code_cli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_confirm` datetime DEFAULT NULL,
  `nom_cli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_cli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cin` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `carte_bc` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_tel` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Achat` int(11) DEFAULT NULL,
  PRIMARY KEY (`code_cli`),
  KEY `id_cli` (`id_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table VENTES. identifiant_cli
CREATE TABLE IF NOT EXISTS `identifiant_cli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_idf` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table VENTES. panier
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_ajout` datetime DEFAULT NULL,
  `id_cli` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_prod` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `status` enum('NON VENDU','VENDU') COLLATE utf8mb4_unicode_ci DEFAULT 'NON VENDU',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table VENTES. produits
CREATE TABLE IF NOT EXISTS `produits` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `code_prod` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_prod` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) DEFAULT NULL,
  `nb_dispo` int(11) NOT NULL,
  `photo_couv_prod` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_categ` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descript_prod` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`code_prod`),
  KEY `id_prod` (`id_prod`),
  KEY `produits_categories_FK` (`code_categ`),
  CONSTRAINT `produits_categories_FK` FOREIGN KEY (`code_categ`) REFERENCES `categories` (`code_categ`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de déclencheur VENTES. after_insert_clients
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `after_insert_clients` AFTER INSERT ON `clients` FOR EACH ROW BEGIN
	UPDATE panier SET STATUS = "VENDU"
	WHERE id_cli = NEW.code_cli;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
