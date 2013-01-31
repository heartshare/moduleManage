/*
SQLyog Ultimate v9.30 
MySQL - 5.5.16 : Database - test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `test`;

/*Table structure for table `module_manage` */

DROP TABLE IF EXISTS `module_manage`;

CREATE TABLE `module_manage` (
  `moduleId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `moduleName` varchar(255) NOT NULL DEFAULT '' COMMENT 'module name',
  `moduleConfig` text COMMENT 'module config',
  `moduleDesc` varchar(255) NOT NULL DEFAULT '' COMMENT 'desc for module',
  `moduleStatus` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:unservice  1:use 2:maintian 3:stop',
  PRIMARY KEY (`moduleId`),
  KEY `index_moduleStatus` (`moduleStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
