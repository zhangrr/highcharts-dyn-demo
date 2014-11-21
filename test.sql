/*
SQLyog Community Edition- MySQL GUI v8.05 
MySQL - 5.5.16-log : Database - bfsdemo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `project_requests` */

CREATE TABLE `monit01` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xzhou` varchar(100) DEFAULT NULL,
  `yzhou` datetime DEFAULT NULL,
  `shuzhi` double(7,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
