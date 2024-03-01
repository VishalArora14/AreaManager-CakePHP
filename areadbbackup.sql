/*
SQLyog Community v12.09 (64 bit)
MySQL - 10.4.27-MariaDB : Database - areadb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`areadb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `areadb`;

/*Table structure for table `area_levels` */

DROP TABLE IF EXISTS `area_levels`;

CREATE TABLE `area_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `area_levels` */

insert  into `area_levels`(`id`,`level`,`name`,`is_active`) values (0,0,'Highest_Level',1),(1,1,'Country',1),(2,2,'State',1),(3,3,'District',1),(13,4,'Sub District',1),(24,5,'colony',0);

/*Table structure for table `areas` */

DROP TABLE IF EXISTS `areas`;

CREATE TABLE `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `level_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_level_id` (`level_id`),
  KEY `fk_parentid_id` (`parent_id`),
  CONSTRAINT `fk_level_id` FOREIGN KEY (`level_id`) REFERENCES `area_levels` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_parentid_id` FOREIGN KEY (`parent_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `areas` */

insert  into `areas`(`id`,`name`,`level_id`,`parent_id`,`created_at`,`modified_at`) values (0,'Highest_Area',0,0,'2024-02-16 16:06:21','2024-02-16 16:06:21'),(1,'India',1,0,'2024-02-15 05:23:19','2024-02-15 15:20:01'),(16,'Australia',1,0,'2024-02-15 15:17:01','2024-02-15 15:19:54'),(17,'Delhi',2,1,'2024-02-15 15:17:19','2024-02-15 15:19:50'),(18,'Haryana',2,1,'2024-02-15 15:17:32','2024-02-20 15:43:08'),(23,'South Delhiiii',3,17,'2024-02-16 10:10:02','2024-02-20 15:47:23'),(37,'jor Bagh',13,23,'2024-02-19 11:09:03','2024-02-22 11:47:30'),(51,'Faridabad',3,18,'2024-02-26 12:46:45','2024-02-26 12:46:45');

/*Table structure for table `phinxlog` */

DROP TABLE IF EXISTS `phinxlog`;

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `phinxlog` */

insert  into `phinxlog`(`version`,`migration_name`,`start_time`,`end_time`,`breakpoint`) values (20240226092847,'OriginalSnapshot','2024-02-26 14:58:48','2024-02-26 14:58:48',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
