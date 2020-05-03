/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.29-cll-lve : Database - profdpco_corona
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`profdpco_corona` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `profdpco_corona`;

/*Table structure for table `rekap_global` */

DROP TABLE IF EXISTS `rekap_global`;

CREATE TABLE `rekap_global` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `positif` varchar(255) DEFAULT NULL,
  `sembuh` varchar(255) DEFAULT NULL,
  `meninggal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `rekap_global` */

insert  into `rekap_global`(`id`,`positif`,`sembuh`,`meninggal`,`created_at`) values 
('','3126806','935308','217555','2020-04-29 17:28:03'),
('','3194663','973460','227671','2020-04-30 13:21:41'),
('','3231701','1004483','229447','2020-05-01 00:11:02'),
('','3386519','1063521','240654','2020-05-03 00:08:26'),
('','3278546','1025062','234021','2020-05-02 00:14:32');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
