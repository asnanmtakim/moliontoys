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

 Date: 12/04/2022 15:31:15
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for about
-- ----------------------------
DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `id_about` int(11) NOT NULL AUTO_INCREMENT,
  `title_about` varchar(255) DEFAULT NULL,
  `description_about` text DEFAULT NULL,
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
INSERT INTO `about` VALUES (1, 'Tentang', 'PT Molion Toys Indonesia adalah pabrik produksi mainan blow moulding profesional. Ini memiliki lebih dari 10 mesin blow moulding 90-120 liter. Selain mainan, pabrik kami juga dapat memproduksi kotak alat, tangki air, ember, furnitur blow moulding, dan mesin blow moulding lainnya tentang produk.<br><br>Sebagai perusahaan produksi dan pemrosesan profesional, pabrik kami memiliki sistem manajemen mutu yang lengkap dan ilmiah. Telah lulus sertifikasi mutu ISO9001:2015. Integritas, kekuatan dan kualitas produk pt.molion toys indonesia telah diakui oleh industri. Selamat datang teman-teman dari semua lapisan masyarakat untuk mengunjungi, membimbing dan bernegosiasi bisnis.', 'molion-icon.png', '2022-04-12 11:20:44', '2022-04-12 11:20:46', NULL);
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
INSERT INTO `app_identity` VALUES ('app_about', 'Tentang Aplikasi', 'textarea', 'Molion Toys Indonesia', NULL, 1);
INSERT INTO `app_identity` VALUES ('app_about_us', 'Tentang Kami', 'textarea', '<h2>VISI</h2>\n                     <p>\n                        Menjadi Fasilitas Kesehatan Primer yang berkualitas dan bermanfaat bagi masyarakat dalam bidang kesehatan sesuai dengan kompetensinya\n                     </p>\n                     <h2>MISI</h2>\n                     <ol>\n                        <li>\n                           Melaksanakan kegiatan preventif, promotif, kuratif, dan rehabilitatif (memberikan pelayanan secara holistik)\n                        </li>\n                        <li>\n                           Melayani dengan santun dan ramah\n                        </li>\n                        <li>\n                           Menjalin kerjasama yang harmonis dengan instansi-instansi terkait\n                        </li>\n                     </ol>\n                     <h2>MOTTO</h2>\n                     <p>\n                        Melayani dengan santun, ramah dan rasional\n                     </p>', 'Tentang Kami', 2);
INSERT INTO `app_identity` VALUES ('app_address', 'Alamat', 'textarea', 'Jl. Tikusan No. 37, Tikusan, Kec. Kapas, Kab. Bojonegoro<br>62181', 'Alamat Kantor', 8);
INSERT INTO `app_identity` VALUES ('app_brand', 'Logo Aplikasi', 'img', 'assets/welcome/img/molion-logo.png', 'Logo Aplikasi', 3);
INSERT INTO `app_identity` VALUES ('app_description', 'Deskripsi Applikasi', 'textarea', 'Kata - Kata Ramasalah<br>Exercitatio Optimus Magister Est', 'Deskripsi singkat tentang Aplikasi', 4);
INSERT INTO `app_identity` VALUES ('app_email', 'Email', 'text', 'admin@moliontoys.com', 'Email Kantor', 10);
INSERT INTO `app_identity` VALUES ('app_icon', 'Icon Applikasi', 'img', 'assets/welcome/img/molion-icon.png', 'Gambar Icon Pada Tab Browser', 5);
INSERT INTO `app_identity` VALUES ('app_maps', 'Map Google', 'textarea', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.5690394088356!2d111.90270191418325!3d-7.175711194819113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77814d885c4aef%3A0xe75cf6ab23c04093!2sKlinik%20Cahyo%20Kurnia%20Medika!5e0!3m2!1sid!2sid!4v1636955515529!5m2!1sid!2sid', 'Maps Google Kantor', 11);
INSERT INTO `app_identity` VALUES ('app_name', 'Nama Applikasi', 'text', 'Molion Toys Indonesia', 'Nama Aplikasi', 6);
INSERT INTO `app_identity` VALUES ('app_phone', 'Phone', 'textarea', '(0353)-892713', 'Telp Kantor', 9);
INSERT INTO `app_identity` VALUES ('app_title', 'Judul Browser', 'text', 'Molion Toys', 'Judul Aplikasi pada Tab Browser', 7);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of app_routes
-- ----------------------------
BEGIN;
INSERT INTO `app_routes` VALUES (1, 'Welcome', 'get', '/', 'Welcome::index', 0, NULL, NULL, 1, 1, 'Page Welcome Home', '2022-01-03 13:54:50', '2022-01-03 13:54:53', NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_groups
-- ----------------------------
BEGIN;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_logins
-- ----------------------------
BEGIN;
INSERT INTO `auth_logins` VALUES (1, '127.0.0.1', 'admin', NULL, '2022-04-12 15:04:15', 0);
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
  `id_blog` int(11) NOT NULL,
  `slug_blog` varchar(255) DEFAULT NULL,
  `title_blog` varchar(255) DEFAULT NULL,
  `id_user_blog` int(11) DEFAULT NULL,
  `description_blog` text DEFAULT NULL,
  `image_blog` varchar(255) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `tag_blog` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_blog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of blog
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_category`) USING BTREE,
  KEY `name_category` (`name_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of category
-- ----------------------------
BEGIN;
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
  `image_certificate` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_certificate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of certificate
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for faq
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `question_faq` varchar(255) DEFAULT NULL,
  `answer_faq` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_faq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of faq
-- ----------------------------
BEGIN;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of home
-- ----------------------------
BEGIN;
INSERT INTO `home` VALUES (1, 'Selamat Datang di Molion Toys Indonesia', 'Ucapan selamat datang dsb', 'molion-logo2.png', 1, '2022-04-12 10:48:44', '2022-04-12 10:48:47', NULL);
INSERT INTO `home` VALUES (2, 'Produk Molion', 'Kuda, prusutan dll', 'M1003-02.jpg', 0, '2022-04-12 11:04:24', '2022-04-12 11:04:25', NULL);
COMMIT;

-- ----------------------------
-- Table structure for image_product
-- ----------------------------
DROP TABLE IF EXISTS `image_product`;
CREATE TABLE `image_product` (
  `id_image_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_image_product`),
  KEY `fk_image_product` (`id_product`),
  CONSTRAINT `fk_image_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of image_product
-- ----------------------------
BEGIN;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1649725761, 1);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of partner
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `slug_product` varchar(255) DEFAULT NULL,
  `name_product` varchar(255) DEFAULT NULL,
  `material_product` varchar(255) DEFAULT NULL,
  `sold_product` int(11) DEFAULT NULL,
  `detail_product` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of product
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for sosmed
-- ----------------------------
DROP TABLE IF EXISTS `sosmed`;
CREATE TABLE `sosmed` (
  `id_sosmed` int(11) DEFAULT NULL,
  `icon_sosmed` varchar(255) DEFAULT NULL,
  `link_sosmed` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sosmed
-- ----------------------------
BEGIN;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of team
-- ----------------------------
BEGIN;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
