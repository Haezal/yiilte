/*
SQLyog Community v12.08 (64 bit)
MySQL - 5.6.21 : Database - yiilte
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`yiilte` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `yiilte`;

/*Table structure for table `authassignment` */

DROP TABLE IF EXISTS `authassignment`;

CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `authassignment` */

insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('Admin','1',NULL,'N;');

/*Table structure for table `authitem` */

DROP TABLE IF EXISTS `authitem`;

CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `authitem` */

insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Admin',2,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Authenticated',2,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Guest',2,NULL,NULL,'N;');

/*Table structure for table `authitemchild` */

DROP TABLE IF EXISTS `authitemchild`;

CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `authitemchild` */

/*Table structure for table `rights` */

DROP TABLE IF EXISTS `rights`;

CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `rights` */

insert  into `rights`(`itemname`,`type`,`weight`) values ('Admin',2,1);
insert  into `rights`(`itemname`,`type`,`weight`) values ('Authenticated',2,2);
insert  into `rights`(`itemname`,`type`,`weight`) values ('Guest',2,3);

/*Table structure for table `tbl_migration` */

DROP TABLE IF EXISTS `tbl_migration`;

CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_migration` */

insert  into `tbl_migration`(`version`,`apply_time`) values ('m000000_000000_base',1427519679);
insert  into `tbl_migration`(`version`,`apply_time`) values ('m110805_153437_installYiiUser',1427519696);
insert  into `tbl_migration`(`version`,`apply_time`) values ('m110810_162301_userTimestampFix',1427519696);

/*Table structure for table `tbl_profiles` */

DROP TABLE IF EXISTS `tbl_profiles`;

CREATE TABLE `tbl_profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_profiles` */

insert  into `tbl_profiles`(`user_id`,`first_name`) values (1,'Administrator');

/*Table structure for table `tbl_profiles_fields` */

DROP TABLE IF EXISTS `tbl_profiles_fields`;

CREATE TABLE `tbl_profiles_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `field_type` varchar(50) NOT NULL DEFAULT '',
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` text,
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` text,
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_profiles_fields` */

insert  into `tbl_profiles_fields`(`id`,`varname`,`title`,`field_type`,`field_size`,`field_size_min`,`required`,`match`,`range`,`error_message`,`other_validator`,`default`,`widget`,`widgetparams`,`position`,`visible`) values (1,'first_name','Name','VARCHAR',255,3,2,'','','Incorrect First Name (length between 3 and 50 characters).','','','','',1,3);

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL DEFAULT '',
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_username` (`username`),
  UNIQUE KEY `user_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`id`,`username`,`password`,`email`,`activkey`,`superuser`,`status`,`create_at`,`lastvisit_at`) values (1,'admin','0192023a7bbd73250516f069df18b500','webmaster@example.com','8c14807ac6ece3a87e77eccfef880bee',1,1,'2015-03-28 13:14:56','2015-04-01 10:45:33');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
