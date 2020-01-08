/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 5.6.21 : Database - tokobuah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tokobuah` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tokobuah`;

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `products` */

insert  into `products`(`product_id`,`name`,`price`,`image`,`description`) values 
('5df1e4108f821','Buku Tulis',3500,'default.jpg','Buku untuk menulis sesuatu yang di anggap perlu ditulis'),
('5df1ef4b3b44e','Komik',35000,'IMG_5df1ef4b3b44e.jpg','Komik One Piece Series');

/*Table structure for table `suppliers` */

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `id` varchar(15) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `suppliers` */

insert  into `suppliers`(`id`,`name`,`address`) values 
('232323232','2','32'),
('55y','yyy','yyy'),
('dsada','dada','dadsa'),
('ewqrw','rwer','rwrew');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `role` enum('admin','customer') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'customer',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(64) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`user_id`,`username`,`password`,`email`,`full_name`,`phone`,`role`,`last_login`,`photo`,`created_at`,`is_active`) values 
(1,'admin','$2y$10$TRVIpXkJhaiTqSx7f8faLel3xLtgIBpsHKOmmOdntbUXJIHUsyhFW','admin@gmail.com','administrator','089543445332','admin','2019-12-13 10:35:36','user_no_image.jpg','2019-12-12 14:57:59',0),
(2,'customer','$2y$10$TRVIpXkJhaiTqSx7f8faLel3xLtgIBpsHKOmmOdntbUXJIHUsyhFW','customer@gmail.com','customer','0938383838','customer','2019-12-12 16:13:02','user_no_image.jpg','2019-12-12 15:49:33',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
