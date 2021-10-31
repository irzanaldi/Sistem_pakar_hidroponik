/*
SQLyog Community v13.1.1 (32 bit)
MySQL - 10.4.18-MariaDB : Database - db_pakar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_pakar` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_pakar`;

/*Table structure for table `bagian` */

DROP TABLE IF EXISTS `bagian`;

CREATE TABLE `bagian` (
  `id_bagian` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_bagian` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_bagian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `bagian` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `gejalas` */

DROP TABLE IF EXISTS `gejalas`;

CREATE TABLE `gejalas` (
  `id_gejala` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_bagian` bigint(20) NOT NULL,
  `id_unsur` bigint(20) NOT NULL,
  `id_tanaman` bigint(20) NOT NULL,
  `nama_gejala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_gejala`),
  KEY `id_unsur` (`id_unsur`),
  KEY `id_tanaman` (`id_tanaman`),
  KEY `id_bagian` (`id_bagian`),
  CONSTRAINT `gejalas_ibfk_1` FOREIGN KEY (`id_unsur`) REFERENCES `unsur_haras` (`id_unsur`),
  CONSTRAINT `gejalas_ibfk_2` FOREIGN KEY (`id_tanaman`) REFERENCES `tanamen` (`id_tanaman`),
  CONSTRAINT `gejalas_ibfk_3` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `gejalas` */

/*Table structure for table `kesimpulans` */

DROP TABLE IF EXISTS `kesimpulans`;

CREATE TABLE `kesimpulans` (
  `id_kesimpulan` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_unsur` bigint(20) NOT NULL,
  `id_gejala` bigint(20) DEFAULT NULL,
  `solusi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kesimpulan`),
  KEY `id_unsur` (`id_unsur`),
  KEY `id_gejala` (`id_gejala`),
  CONSTRAINT `kesimpulans_ibfk_1` FOREIGN KEY (`id_unsur`) REFERENCES `unsur_haras` (`id_unsur`),
  CONSTRAINT `kesimpulans_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejalas` (`id_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kesimpulans` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2021_10_11_140652_create_unsur_haras_table',2),
(6,'2021_10_11_140843_create_gejalas_table',2),
(7,'2021_10_11_140902_create_tanamen_table',2),
(8,'2021_10_11_140940_create_kesimpulans_table',2);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `tanamen` */

DROP TABLE IF EXISTS `tanamen`;

CREATE TABLE `tanamen` (
  `id_tanaman` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_tanaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tanaman`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tanamen` */

insert  into `tanamen`(`id_tanaman`,`nama_tanaman`,`created_at`,`updated_at`) values 
(1,'Selada','2021-10-17 13:12:20','2021-10-17 13:12:20'),
(2,'Bayam','2021-10-17 13:12:20','2021-10-17 13:12:20'),
(3,'Cabai','2021-10-17 13:12:20','2021-10-17 13:12:20'),
(4,'Kangkung','2021-10-17 13:12:20','2021-10-17 13:12:20'),
(5,'Tomat','2021-10-17 13:12:20','2021-10-17 13:12:20'),
(6,'Daun Bawang','2021-10-17 13:12:20','2021-10-17 13:12:20'),
(7,'Seledri','2021-10-17 13:12:20','2021-10-17 13:12:20');

/*Table structure for table `unsur_haras` */

DROP TABLE IF EXISTS `unsur_haras`;

CREATE TABLE `unsur_haras` (
  `id_unsur` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_unsur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tanaman` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_unsur`),
  KEY `id_tanaman` (`id_tanaman`),
  CONSTRAINT `unsur_haras_ibfk_1` FOREIGN KEY (`id_tanaman`) REFERENCES `tanamen` (`id_tanaman`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `unsur_haras` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'irzan aldi ananto','irzanaldi@gmail.com',NULL,'$2y$10$rzF2Qckh7OCKM4Oq8d/TQu.9NNZdOJx.o4rRTB..u7CRZ1kn4ZKs6',NULL,'2021-10-09 20:38:25','2021-10-09 20:38:25');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
