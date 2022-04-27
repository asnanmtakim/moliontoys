/*
 Navicat Premium Data Transfer

 Source Server         : MariaDB
 Source Server Type    : MariaDB
 Source Server Version : 100703
 Source Host           : 127.0.0.1:3306
 Source Schema         : moliontoys

 Target Server Type    : MariaDB
 Target Server Version : 100703
 File Encoding         : 65001

 Date: 27/04/2022 10:01:24
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for about
-- ----------------------------
DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `id_about` int(11) NOT NULL AUTO_INCREMENT,
  `description_about` text DEFAULT NULL,
  `visi_about` text DEFAULT NULL,
  `misi_about` text DEFAULT NULL,
  `image_about` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_about`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of about
-- ----------------------------
BEGIN;
INSERT INTO `about` VALUES (1, '<p>PT Molion Toys Indonesia adalah pabrik produksi mainan blow moulding profesional. Ini memiliki lebih dari 10 mesin blow moulding 90-120 liter. Selain mainan, pabrik kami juga dapat memproduksi kotak alat, tangki air, ember, furnitur blow moulding, dan mesin blow moulding lainnya tentang produk.</p><p>Sebagai perusahaan produksi dan pemrosesan profesional, pabrik kami memiliki sistem manajemen mutu yang lengkap dan ilmiah. Telah lulus sertifikasi mutu ISO9001:2015. Integritas, kekuatan dan kualitas produk pt.molion toys indonesia telah diakui oleh industri. Selamat datang teman-teman dari semua lapisan masyarakat untuk mengunjungi, membimbing dan bernegosiasi bisnis.</p>', 'INI VISI Perusahaan', 'INI MISI Perusahaan', 'about.jpg', '2022-04-12 11:20:44', '2022-04-27 08:36:32', NULL);
COMMIT;

-- ----------------------------
-- Table structure for app_identity
-- ----------------------------
DROP TABLE IF EXISTS `app_identity`;
CREATE TABLE `app_identity` (
  `conf_char` varchar(50) NOT NULL,
  `conf_name` varchar(100) DEFAULT NULL,
  `conf_type` varchar(20) DEFAULT NULL,
  `conf_value` text DEFAULT NULL,
  `conf_descryption` text DEFAULT NULL,
  `conf_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`conf_char`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of app_identity
-- ----------------------------
BEGIN;
INSERT INTO `app_identity` VALUES ('app_address', 'Alamat', 'textarea', 'Jl. Ngoro Industrial Park V-2, Ngoro, Mojokerto, Jawa Timur, Indonesia', 'Alamat Kantor', 5);
INSERT INTO `app_identity` VALUES ('app_brand', 'Logo Aplikasi', 'img', 'assets/welcome/img/molion-logo.png', 'Logo Aplikasi', 4);
INSERT INTO `app_identity` VALUES ('app_email', 'Email', 'text', 'moliontoysindonesia@gmail.com', 'Email Kantor', 6);
INSERT INTO `app_identity` VALUES ('app_icon', 'Icon Applikasi', 'img', 'assets/welcome/img/app_icon_1650963364.png', 'Gambar Icon Pada Tab Browser', 3);
INSERT INTO `app_identity` VALUES ('app_maps', 'Map Google', 'textarea', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.1454724485257!2d112.60872670654685!3d-7.559113098843578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78758185271bcb%3A0xafeb02b26ba1666c!2sNgoro%20Industrial%20Park!5e0!3m2!1sen!2sid!4v1649812412231!5m2!1sen!2sid', 'Maps Google Kantor', 8);
INSERT INTO `app_identity` VALUES ('app_name', 'Nama Aplikasi', 'text', 'PT. Molion Toys Indonesia', 'Nama Aplikasi', 2);
INSERT INTO `app_identity` VALUES ('app_phone', 'Phone', 'text', '(0353)-892713', 'Telp Kantor', 7);
INSERT INTO `app_identity` VALUES ('app_title', 'Judul Aplikasi', 'text', 'Molion Toys', 'Judul Aplikasi', 1);
COMMIT;

-- ----------------------------
-- Table structure for app_routes
-- ----------------------------
DROP TABLE IF EXISTS `app_routes`;
CREATE TABLE `app_routes` (
  `id_route` int(11) NOT NULL AUTO_INCREMENT,
  `route_group` varchar(255) DEFAULT NULL,
  `route_request` varchar(255) DEFAULT NULL,
  `route_from` varchar(255) DEFAULT NULL,
  `route_to` varchar(255) DEFAULT NULL,
  `route_options` int(11) DEFAULT NULL,
  `route_option_keys` varchar(255) DEFAULT NULL,
  `route_option_values` varchar(255) DEFAULT NULL,
  `route_active` int(11) DEFAULT NULL,
  `route_order` int(11) DEFAULT NULL,
  `route_desc` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_route`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of app_routes
-- ----------------------------
BEGIN;
INSERT INTO `app_routes` VALUES (1, 'Welcome', 'get', '/', 'Welcome::welcome', 0, NULL, NULL, 1, 1, 'Page Welcome Home', '2022-01-03 13:54:50', '2022-01-03 13:54:53', NULL);
INSERT INTO `app_routes` VALUES (2, 'Dashboard Admin', 'get', '/admin', 'Admin::index', 1, 'filter', 'login', 1, 2, 'Admin', '2022-04-13 14:20:52', '2022-04-13 14:20:52', NULL);
INSERT INTO `app_routes` VALUES (3, 'Profile', 'get', '/admin/profile', 'Admin::indexProfile', 0, NULL, NULL, 1, 5, 'Page Profile', '2022-01-03 13:54:50', '2022-01-03 13:54:53', NULL);
INSERT INTO `app_routes` VALUES (4, 'Profile', 'post', '/admin/profile-edit', 'Admin::profileEdit', 0, NULL, NULL, 1, 6, 'Edit Data Profile', '2022-01-03 13:54:50', '2022-01-03 13:54:53', NULL);
INSERT INTO `app_routes` VALUES (5, 'Profile', 'post', '/admin/profile-edit-image', 'Admin::profileEditImage', 0, NULL, NULL, 1, 7, 'Edit Image Profile', '2022-01-03 13:54:50', '2022-01-03 13:54:53', NULL);
INSERT INTO `app_routes` VALUES (6, 'Profile', 'post', '/admin/profile-edit-password', 'Admin::profileEditPassword', 0, NULL, NULL, 1, 8, 'Edit Password Profile', '2022-01-03 13:54:50', '2022-01-03 13:54:53', NULL);
INSERT INTO `app_routes` VALUES (7, 'Detail Product', 'get', '/product/(:any)', 'Welcome::product/$1', 0, NULL, NULL, 1, 11, 'Detail Product', '2022-01-03 13:54:50', '2022-01-03 13:54:50', NULL);
INSERT INTO `app_routes` VALUES (8, 'Detail Blog', 'get', '/blog/(:any)', 'Welcome::blog/$1', 0, NULL, NULL, 1, 10, 'Detail Blog', '2022-01-03 13:54:50', '2022-01-03 13:54:50', NULL);
INSERT INTO `app_routes` VALUES (9, 'Blog', 'get', '/blog', 'Welcome::blog', 0, NULL, NULL, 1, 9, 'Blog', '2022-01-03 13:54:50', '2022-01-03 13:54:50', NULL);
INSERT INTO `app_routes` VALUES (10, 'Beranda', 'get', '/admin/home', 'Admin::indexHome', 1, 'filter', 'login', 1, 13, 'Branda', '2022-04-13 14:20:52', '2022-04-13 14:20:52', NULL);
INSERT INTO `app_routes` VALUES (11, 'Beranda', 'get', '/admin/home-add', 'Admin::addHome', 1, 'filter', 'login', 1, 14, 'Page Add Beranda', '2022-01-03 13:54:50', '2022-01-03 13:54:53', NULL);
INSERT INTO `app_routes` VALUES (12, 'Beranda', 'post', '/admin/home-add', 'Admin::saveHome', 1, 'filter', 'login', 1, 15, 'Save Beranda', '2022-01-03 13:54:50', '2022-01-03 13:54:53', NULL);
INSERT INTO `app_routes` VALUES (13, 'Beranda', 'get', '/admin/home-edit/(:any)', 'Admin::editHome/$1', 1, 'filter', 'login', 1, 16, 'Page Edit Beranda', '2022-01-03 13:54:50', '2022-01-03 13:54:53', NULL);
INSERT INTO `app_routes` VALUES (14, 'Beranda', 'post', '/admin/home-edit', 'Admin::updateHome', 1, 'filter', 'login', 1, 17, 'Update Beranda', '2022-01-03 13:54:50', '2022-01-03 13:54:53', NULL);
INSERT INTO `app_routes` VALUES (15, 'Beranda', 'post', '/admin/home-delete', 'Admin::deleteHome/$1', 1, 'filter', 'login', 1, 18, 'Delete Beranda', '2022-01-03 13:54:50', '2022-01-03 13:54:53', NULL);
INSERT INTO `app_routes` VALUES (16, 'Set Aplikasi', 'get', '/admin/apps', 'Admin::indexApps', 1, 'filter', 'login', 1, 12, 'Page Setting Aplikasi', '2022-01-03 13:54:50', '2022-01-03 13:54:50', NULL);
INSERT INTO `app_routes` VALUES (17, 'Set Aplikasi', 'post', '/admin/apps', 'Admin::updateApps', 1, 'filter', 'login', 1, 12, 'Update Aplikasi', '2022-04-26 12:05:51', '2022-04-26 12:05:51', NULL);
INSERT INTO `app_routes` VALUES (18, 'About', 'get', '/admin/about', 'Admin::indexAbout', 1, 'filter', 'login', 1, 21, 'Page Form About', '2022-01-03 13:54:50', '2022-01-03 13:54:50', NULL);
INSERT INTO `app_routes` VALUES (19, 'About', 'post', '/admin/about', 'Admin::updateAbout', 1, 'filter', 'login', 1, 22, 'Update About', '2022-04-26 12:05:51', '2022-04-26 12:05:51', NULL);
INSERT INTO `app_routes` VALUES (20, 'Kirim Pesan', 'post', '/sent-message', 'Welcome::form', 0, NULL, NULL, 1, 1, 'Form Pesan', '2022-01-03 13:54:50', '2022-01-03 13:54:53', NULL);
INSERT INTO `app_routes` VALUES (21, 'Contact', 'get', '/admin/contact', 'Admin::indexContact', 1, 'filter', 'login', 1, 25, 'Page Contact', '2022-04-27 08:46:49', '2022-04-27 08:46:49', NULL);
INSERT INTO `app_routes` VALUES (22, 'Contact', 'post', '/admin/contact-email', 'Admin::emailContact', 1, 'filter', 'login', 1, 26, 'Email Contact', '2022-04-27 08:46:49', '2022-04-27 08:46:49', NULL);
INSERT INTO `app_routes` VALUES (23, 'Contact', 'post', '/admin/contact-one', 'Admin::getOneContact', 1, 'filter', 'login', 1, 27, 'Detail Contact', '2022-04-27 08:46:49', '2022-04-27 08:46:49', NULL);
COMMIT;

-- ----------------------------
-- Table structure for auth_activation_attempts
-- ----------------------------
DROP TABLE IF EXISTS `auth_activation_attempts`;
CREATE TABLE `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_activation_attempts
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for auth_groups
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups`;
CREATE TABLE `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_groups
-- ----------------------------
BEGIN;
INSERT INTO `auth_groups` VALUES (1, 'admin', 'Admin Molion');
COMMIT;

-- ----------------------------
-- Table structure for auth_groups_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_permissions`;
CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_groups_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for auth_groups_users
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_groups_users
-- ----------------------------
BEGIN;
INSERT INTO `auth_groups_users` VALUES (1, 1);
COMMIT;

-- ----------------------------
-- Table structure for auth_logins
-- ----------------------------
DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_logins
-- ----------------------------
BEGIN;
INSERT INTO `auth_logins` VALUES (1, '127.0.0.1', 'admin', NULL, '2022-04-12 15:04:15', 0);
INSERT INTO `auth_logins` VALUES (2, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-04-13 10:43:12', 1);
INSERT INTO `auth_logins` VALUES (3, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-04-13 15:41:27', 1);
INSERT INTO `auth_logins` VALUES (4, '127.0.0.1', 'admin', NULL, '2022-04-16 09:21:33', 0);
INSERT INTO `auth_logins` VALUES (5, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-04-16 09:21:43', 1);
INSERT INTO `auth_logins` VALUES (6, '127.0.0.1', 'admin', NULL, '2022-04-25 08:02:49', 0);
INSERT INTO `auth_logins` VALUES (7, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-04-25 08:02:57', 1);
INSERT INTO `auth_logins` VALUES (8, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-04-26 08:49:16', 1);
INSERT INTO `auth_logins` VALUES (9, '127.0.0.1', 'admin', NULL, '2022-04-27 07:27:38', 0);
INSERT INTO `auth_logins` VALUES (10, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-04-27 07:28:33', 1);
INSERT INTO `auth_logins` VALUES (11, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-04-27 07:47:00', 1);
INSERT INTO `auth_logins` VALUES (12, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-04-27 09:34:15', 1);
COMMIT;

-- ----------------------------
-- Table structure for auth_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_permissions`;
CREATE TABLE `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for auth_reset_attempts
-- ----------------------------
DROP TABLE IF EXISTS `auth_reset_attempts`;
CREATE TABLE `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_reset_attempts
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for auth_tokens
-- ----------------------------
DROP TABLE IF EXISTS `auth_tokens`;
CREATE TABLE `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for auth_users_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_users_permissions`;
CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_users_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL AUTO_INCREMENT,
  `slug_blog` varchar(255) DEFAULT NULL,
  `title_blog` varchar(255) DEFAULT NULL,
  `date_blog` date DEFAULT NULL,
  `id_user_blog` int(11) DEFAULT NULL,
  `description_blog` text DEFAULT NULL,
  `image_blog` varchar(255) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `tag_blog` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_blog`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of blog
-- ----------------------------
BEGIN;
INSERT INTO `blog` VALUES (1, 'peluncuran-produk-baru-dari-molion', 'Peluncuran Produk Baru dari Molion', '2022-04-14', 1, 'Peluncuran produk mainan anak terbaru Perosotan anak <br> PRODUK TERBARU DARI SPEEDS!!!!\n\nBermain perosotan membuat anak semakin ceria dan seru, karena perosotan merupakan salah satu permainan favorit untuk si kecil. Saat bermain perosotan, ia akan menaiki tangga terlebih dulu dan akan melatih sikecil untuk menjaga keseimbangan serta mengkoordinasikan mata, kaki dan tangan sebelum akhirnya merosot ke bawah. Kami menawarkan perosotan dengan kualitas yang telah ber-SNI dan tentunya aman bagi si kecil. Produk yang di design dengan karakter yang lucu dan sangat menarik untuk anak-anak dalam bermain sendiri ataupun bersama teman-temannya.\n\n \n\nKeunggulan Prosotan SPEEDS:\n\n– Lebih Kokoh sehingga bermain semakin aman\n\n– Pijakan anti slip dan aman\n\n– Terdapat mini ring basket\n\n– Desain Ergonomis membuat si kecil nyaman\n\n– Lebih tebal\n\n– Ukuran : 1550x770x760', 'home-molion1.png', 1, 'Produk, Produk Baru, Perosotan', '2022-04-15 10:44:38', '2022-04-15 10:44:38', NULL);
COMMIT;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_category`) USING BTREE,
  KEY `name_category` (`name_category`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of category
-- ----------------------------
BEGIN;
INSERT INTO `category` VALUES (1, 'Produk', '2022-04-15 10:43:46', '2022-04-15 10:43:48', NULL);
INSERT INTO `category` VALUES (2, 'Kerjasama', NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for certificate
-- ----------------------------
DROP TABLE IF EXISTS `certificate`;
CREATE TABLE `certificate` (
  `id_certificate` int(11) NOT NULL AUTO_INCREMENT,
  `icon_certificate` varchar(20) DEFAULT NULL,
  `title_certificate` varchar(255) DEFAULT NULL,
  `description_certificate` text DEFAULT NULL,
  `file_certificate` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_certificate`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of certificate
-- ----------------------------
BEGIN;
INSERT INTO `certificate` VALUES (1, 'binoculars', 'ISO 2001:2015', '<p>Sertifikasi ISO 9001 2015 : Sertifikasi Sistem Manajemen Mutu.</p>\n<p>Ada lima hal yang dijabarkan dalam Sertifikasi ISO 9001 2015, yaitu :</p>\n<ul>\n<li><i class=\"bi bi-check-circle-fill\"></i> Sistem Manajemen Kualitas</li>\n<li><i class=\"bi bi-check-circle-fill\"></i> Tanggung Jawab Manajemen</li>\n<li><i class=\"bi bi-check-circle-fill\"></i> Manajemen Sumber Daya</li>\n<li><i class=\"bi bi-check-circle-fill\"></i> Realisasi Produk</li>\n<li><i class=\"bi bi-check-circle-fill\"></i> Pengukuran, Analisa dan Peningkatan</li>\n</ul>\n<p>Sertifikasi ISO 9001 2015 merupakan suatu standar bertaraf internasional untuk Sertifikasi Sistem Manajemen Mutu, atau bisa disebut juga sebagai Sertifikasi Sistem Manajemen Kualitas.</p>', 'ISO 9001 PT. MOLION TOYS INDONESIA-1.jpg.jpg', '2022-04-16 07:57:28', '2022-04-16 07:57:32', NULL);
COMMIT;

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `subject_email` varchar(255) DEFAULT NULL,
  `balas` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of contacts
-- ----------------------------
BEGIN;
INSERT INTO `contacts` VALUES (1, 'Asnan Mustakim', 'asnanmustakim126@gmail.com', 'Tes', 'tes aja', 1, 'Coba Balas', 'ini adalah pesan', '2022-04-27 09:34:05', '2022-04-27 09:34:40', NULL);
COMMIT;

-- ----------------------------
-- Table structure for faq
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL AUTO_INCREMENT,
  `question_faq` varchar(255) DEFAULT NULL,
  `answer_faq` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_faq`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of faq
-- ----------------------------
BEGIN;
INSERT INTO `faq` VALUES (1, 'Apa itu Molion?', 'PT. Molion Toys Indonesia merupakan pabrik produksi mainan mesin blow moulding professional.', '2022-04-13 13:20:28', '2022-04-13 13:20:28', NULL);
INSERT INTO `faq` VALUES (2, 'Apa saja hasil produksi PT. Molion?', 'PT. Molion memproduksi mainan anak, tangka air, ember, furniture blow moulding, danmesin blow lainnya', '2022-04-13 13:20:28', '2022-04-13 13:20:28', NULL);
INSERT INTO `faq` VALUES (3, 'Bagaimana Ijin dan Legalitas Pabrik Molion?', 'PT. Molion Toys Indonesia telah lulus Sertifikasi Mutu ISO9001:2015. Integritas, Kekuatan dan Kualitas Produk.', '2022-04-13 13:20:28', '2022-04-13 13:20:28', NULL);
INSERT INTO `faq` VALUES (4, 'Dimana Lokasi PT. Molion Toys Indonesia?', 'PT. Molion Toys Indonesia beralamat di Ngoro Industrial Park V-2, Ngoro, Kabupaten Mojokerto, Jawa Timur, Indonesia.', '2022-04-13 13:20:28', '2022-04-13 13:20:28', NULL);
INSERT INTO `faq` VALUES (5, 'Bagaimana cara menghubungi PT. Molion Toys Indonesia jika ingin bekerjasama?', 'Kontak kami melalui moliontoysindonesia@gmail.com atau WA ……', '2022-04-13 13:20:28', '2022-04-13 13:20:28', NULL);
COMMIT;

-- ----------------------------
-- Table structure for home
-- ----------------------------
DROP TABLE IF EXISTS `home`;
CREATE TABLE `home` (
  `id_home` int(11) NOT NULL AUTO_INCREMENT,
  `title_home` varchar(255) DEFAULT NULL,
  `description_home` text DEFAULT NULL,
  `image_home` varchar(255) DEFAULT NULL,
  `active_home` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_home`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of home
-- ----------------------------
BEGIN;
INSERT INTO `home` VALUES (1, 'PT. Molion Toys Indonesia', 'Selamat Datang di Molion Toys Indonesia', 'welcome-home.png', 1, '2022-04-12 10:48:44', '2022-04-12 10:48:47', NULL);
INSERT INTO `home` VALUES (2, 'Produk-produk Molion', 'Kuda-kudaan dan Perosotan', 'product-home.png', 0, '2022-04-12 11:04:24', '2022-04-12 11:04:25', NULL);
INSERT INTO `home` VALUES (8, 'Tes Revisi 2', 'Ini tes beranda revisi 2', 'home_1650881037.png', 0, '2022-04-25 16:37:26', '2022-04-25 17:22:07', '2022-04-25 17:22:07');
INSERT INTO `home` VALUES (9, 'Tes 2', 'Deskripsi Tes', 'home_1650882322.png', 0, '2022-04-25 17:25:22', '2022-04-27 07:51:53', '2022-04-27 07:51:53');
COMMIT;

-- ----------------------------
-- Table structure for image_product
-- ----------------------------
DROP TABLE IF EXISTS `image_product`;
CREATE TABLE `image_product` (
  `id_image_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) DEFAULT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `image_sort` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_image_product`),
  KEY `fk produk image` (`id_product`),
  CONSTRAINT `fk produk image` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of image_product
-- ----------------------------
BEGIN;
INSERT INTO `image_product` VALUES (1, 1, '1.png', 1, '2022-04-13 09:22:32', '2022-04-13 09:22:32', NULL);
INSERT INTO `image_product` VALUES (2, 1, '2.png', 2, '2022-04-13 09:22:32', '2022-04-13 09:22:32', NULL);
INSERT INTO `image_product` VALUES (3, 2, '1.png', 1, '2022-04-13 09:22:32', '2022-04-13 09:22:32', NULL);
INSERT INTO `image_product` VALUES (4, 2, '2.png', 2, '2022-04-13 09:22:32', '2022-04-13 09:22:32', NULL);
INSERT INTO `image_product` VALUES (5, 3, '1.png', 1, '2022-04-13 09:22:32', '2022-04-13 09:22:32', NULL);
INSERT INTO `image_product` VALUES (6, 3, '2.png', 2, '2022-04-13 09:22:32', '2022-04-13 09:22:32', NULL);
INSERT INTO `image_product` VALUES (7, 4, '1.png', 1, '2022-04-13 09:22:32', '2022-04-13 09:22:32', NULL);
INSERT INTO `image_product` VALUES (8, 4, '2.png', 2, '2022-04-13 09:22:32', '2022-04-13 09:22:32', NULL);
INSERT INTO `image_product` VALUES (9, 5, '1.png', 1, '2022-04-13 09:22:32', '2022-04-13 09:22:32', NULL);
INSERT INTO `image_product` VALUES (10, 5, '2.png', 2, '2022-04-13 09:22:32', '2022-04-13 09:22:32', NULL);
INSERT INTO `image_product` VALUES (11, 6, '1.png', 1, '2022-04-13 09:22:32', '2022-04-13 09:22:32', NULL);
INSERT INTO `image_product` VALUES (12, 6, '2.png', 2, '2022-04-13 09:22:32', '2022-04-13 09:22:32', NULL);
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1649725761, 1);
INSERT INTO `migrations` VALUES (2, '2022-04-13-071250', 'App\\Database\\Migrations\\TableUsers', 'default', 'App', 1649833989, 2);
COMMIT;

-- ----------------------------
-- Table structure for partner
-- ----------------------------
DROP TABLE IF EXISTS `partner`;
CREATE TABLE `partner` (
  `id_partner` int(11) NOT NULL AUTO_INCREMENT,
  `title_partner` varchar(255) DEFAULT NULL,
  `image_partner` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_partner`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of partner
-- ----------------------------
BEGIN;
INSERT INTO `partner` VALUES (1, 'Speeds', 'logo speedss .png', '2022-04-13 13:05:10', '2022-04-13 13:05:14', NULL);
INSERT INTO `partner` VALUES (2, 'Q2', 'q2-logo.png', '2022-04-13 13:05:12', '2022-04-13 13:05:17', NULL);
COMMIT;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `slug_product` varchar(255) DEFAULT NULL,
  `name_product` varchar(255) DEFAULT NULL,
  `material_product` varchar(255) DEFAULT NULL,
  `sold_product` int(11) DEFAULT NULL,
  `detail_product` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of product
-- ----------------------------
BEGIN;
INSERT INTO `product` VALUES (1, 'angle-horse', 'ANGLE HORSE', 'Plastik', 300000, 'Ride on deer adalah mainan tunggang-tunggangan atau kuda-kudaan untuk anak. Mainan terbuat dari plastik, sehingga si kecil akan nyaman saat menaikinya. Dapat membantu anak menjadi lebih aktif dan ceria saat bermain, disarankan untuk anak yang sudah berumur > 1thn. <br>Bermain sepeda kuda  juga bermanfaat untuk melatih keseimbangan tubuh balita serta dapat mempercepat pertumbuhan tulang. Selain melatih motorik kasar, mainan kuda-kudaan juga berguna untuk memperbesar dan memperpanjang masa tulang, sehingga pertumbuhan tinggi badan akan semakin optimal. Menurut hasil penelitian yang pernah dilakukan, gerakan olahraga melompat dan berlari yang sering dilakukan ketika bermain kuda.', '2022-04-13 09:14:04', '2022-04-13 09:14:05', NULL);
INSERT INTO `product` VALUES (2, 'phoenix-horse', 'PHOENIX HORSE', 'Plastik', 500000, 'Ride on deer adalah mainan tunggang-tunggangan atau kuda-kudaan untuk anak. Mainan terbuat dari plastik, sehingga si kecil akan nyaman saat menaikinya. Dapat membantu anak menjadi lebih aktif dan ceria saat bermain, disarankan untuk anak yang sudah berumur > 1thn. <br><br>Bermain sepeda kuda  juga bermanfaat untuk melatih keseimbangan tubuh balita serta dapat mempercepat pertumbuhan tulang. Selain melatih motorik kasar, mainan kuda-kudaan juga berguna untuk memperbesar dan memperpanjang masa tulang, sehingga pertumbuhan tinggi badan akan semakin optimal. Menurut hasil penelitian yang pernah dilakukan, gerakan olahraga melompat dan berlari yang sering dilakukan ketika bermain kuda.', '2022-04-13 09:17:03', '2022-04-13 09:17:05', NULL);
INSERT INTO `product` VALUES (3, 'rocking-deer', 'ROCKING DEER', 'Plastik', 500000, 'Ride on deer adalah mainan tunggang-tunggangan atau kuda-kudaan untuk anak. Mainan terbuat dari plastik, sehingga si kecil akan nyaman saat menaikinya. Dapat membantu anak menjadi lebih aktif dan ceria saat bermain, disarankan untuk anak yang sudah berumur > 1thn. <br><br>Bermain sepeda kuda  juga bermanfaat untuk melatih keseimbangan tubuh balita serta dapat mempercepat pertumbuhan tulang. Selain melatih motorik kasar, mainan kuda-kudaan juga berguna untuk memperbesar dan memperpanjang masa tulang, sehingga pertumbuhan tinggi badan akan semakin optimal. Menurut hasil penelitian yang pernah dilakukan, gerakan olahraga melompat dan berlari yang sering dilakukan ketika bermain kuda.', '2022-04-13 09:17:03', '2022-04-13 09:17:05', NULL);
INSERT INTO `product` VALUES (4, 'rocking-horse', 'ROCKING HORSE', 'Plastik', 500000, 'Ride on deer adalah mainan tunggang-tunggangan atau kuda-kudaan untuk anak. Mainan terbuat dari plastik, sehingga si kecil akan nyaman saat menaikinya. Dapat membantu anak menjadi lebih aktif dan ceria saat bermain, disarankan untuk anak yang sudah berumur > 1thn. <br><br>Bermain sepeda kuda  juga bermanfaat untuk melatih keseimbangan tubuh balita serta dapat mempercepat pertumbuhan tulang. Selain melatih motorik kasar, mainan kuda-kudaan juga berguna untuk memperbesar dan memperpanjang masa tulang, sehingga pertumbuhan tinggi badan akan semakin optimal. Menurut hasil penelitian yang pernah dilakukan, gerakan olahraga melompat dan berlari yang sering dilakukan ketika bermain kuda.', '2022-04-13 09:17:03', '2022-04-13 09:17:05', NULL);
INSERT INTO `product` VALUES (5, 'rocking-panda', 'ROCKING PANDA', 'Plastik', 500000, 'Ride on deer adalah mainan tunggang-tunggangan atau kuda-kudaan untuk anak. Mainan terbuat dari plastik, sehingga si kecil akan nyaman saat menaikinya. Dapat membantu anak menjadi lebih aktif dan ceria saat bermain, disarankan untuk anak yang sudah berumur > 1thn. <br><br>Bermain sepeda kuda  juga bermanfaat untuk melatih keseimbangan tubuh balita serta dapat mempercepat pertumbuhan tulang. Selain melatih motorik kasar, mainan kuda-kudaan juga berguna untuk memperbesar dan memperpanjang masa tulang, sehingga pertumbuhan tinggi badan akan semakin optimal. Menurut hasil penelitian yang pernah dilakukan, gerakan olahraga melompat dan berlari yang sering dilakukan ketika bermain kuda.', '2022-04-13 09:17:03', '2022-04-13 09:17:05', NULL);
INSERT INTO `product` VALUES (6, 'perosotan', 'PEROSOTAN', 'Plastik', 500000, 'Mainan Perosotan anak yang terbuat dari bahan plastik HDPE sehingga tidak sakit saat digunakan untuk anak anda. Prosotan ini dilengkapi dengan pegangan yang lebih lebar dan luas menjadikan anti slip saat digunakan anak anda.\n<br>\nPerosotan ini memberikan manfaat untuk si kecil, seperti melatih keseimbangan, koordinasi, dan kesadaran spasial. Prosotan dengan model panda yang lucu dilengkapi dengan ring basket pada bagian samping nya, menjadikan bisa digunakan untuk latihan memanjat, meluncur dan bermain basket. Prosotan ini memiliki bahan yang tebal sehingga tidak mudah patah saat digunakan meluncur untuk anak anda. Jalur luncuran anak juga licin menjadikan anak lebih mulus saat meluncur\n<br>\nSPESIFIKASI:\n<ol>\n<li>Terbuat dari bahan plastik HDPE sehingga memiliki daya tahan yang lebih kuat</li>\n<li>Memiliki handle tang yang lembut dan lebih luas</li>\n<li>Prosotan ini juga dilengkapi dengan ring basket pada samping kiri sehingga aktivitas anak lebih banyak dan lebih beragam</li>\n<li>Prosotan ini dilengkapi dengan pijakan yang memiliki takstur sehingga anti slip saat digunakan untuk memanjat</li>\n<li>Desain yang mewah dan lucu</li>\n<li>Body lebih tebal menjadikan lebih kokoh saat digunakan</li>\n<li>Memiliki bahan yang premium dan aman digunakan untuk anak anak</li>\n</ol>', '2022-04-13 09:17:03', '2022-04-13 09:17:03', NULL);
COMMIT;

-- ----------------------------
-- Table structure for sosmed
-- ----------------------------
DROP TABLE IF EXISTS `sosmed`;
CREATE TABLE `sosmed` (
  `id_sosmed` int(11) NOT NULL AUTO_INCREMENT,
  `icon_sosmed` varchar(255) DEFAULT NULL,
  `link_sosmed` varchar(255) DEFAULT NULL,
  `active_sosmed` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_sosmed`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sosmed
-- ----------------------------
BEGIN;
INSERT INTO `sosmed` VALUES (1, 'facebook', 'https://www.facebook.com/', 1, '2022-04-13 08:54:57', '2022-04-13 08:54:59', NULL);
INSERT INTO `sosmed` VALUES (2, 'instagram', 'https://www.instagram.com/', 1, '2022-04-13 08:55:16', '2022-04-13 08:55:19', NULL);
INSERT INTO `sosmed` VALUES (3, 'youtube', 'https://www.youtube.com/', 1, '2022-04-13 08:55:47', '2022-04-13 08:55:50', NULL);
INSERT INTO `sosmed` VALUES (4, 'tiktok', 'https://www.tiktok.com/', 1, '2022-04-13 08:56:35', '2022-04-13 08:56:37', NULL);
INSERT INTO `sosmed` VALUES (5, 'twitter', 'https://www.twitter.com/', 1, '2022-04-13 08:57:51', '2022-04-13 08:57:55', NULL);
COMMIT;

-- ----------------------------
-- Table structure for team
-- ----------------------------
DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `id_team` int(11) NOT NULL AUTO_INCREMENT,
  `name_team` varchar(100) DEFAULT NULL,
  `position_team` varchar(100) DEFAULT NULL,
  `image_team` varchar(255) DEFAULT NULL,
  `wa_team` varchar(255) DEFAULT NULL,
  `ig_team` varchar(255) DEFAULT NULL,
  `fb_team` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_team`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of team
-- ----------------------------
BEGIN;
INSERT INTO `team` VALUES (1, 'Asnan Mustakim', 'Direktur', 'DSC_0303.JPG', '082334282708', 'asnanmtakim', 'asnan.musta', '2022-04-13 10:30:57', '2022-04-13 10:30:59', NULL);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `image_user` varchar(255) DEFAULT 'default.jpg',
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'asnanmustakim126@gmail.com', 'admin', '$2y$10$gogR6IMuOOiIHvGKZhZjz.FXgwLcMO7otBuj.SwZqG0II7pZBmsr.', 'Admin Molion Toys', 'L', 'Mojokerto', '082334282708', 'default.jpg', '4cc7f01555889b607fe6daf8d9a66c8c', NULL, '2022-04-27 08:46:20', NULL, NULL, NULL, 1, 0, '2022-04-13 10:42:20', '2022-04-27 07:46:20', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
