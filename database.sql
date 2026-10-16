-- ============================================================
-- Database: sucopurugoa
-- Sistema Informasaun Jestaun Dadus Suku Purugoa
-- ============================================================

CREATE DATABASE IF NOT EXISTS `sucopurugoa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sucopurugoa`;

-- -----------------------------------------------------------
-- Table: admin
-- -----------------------------------------------------------
CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT 'default.png',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Default admin: username = admin, password = admin123
INSERT INTO `admin` (`id`, `username`, `password`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.png', NOW(), NOW());

-- -----------------------------------------------------------
-- Table: profile_suco
-- -----------------------------------------------------------
CREATE TABLE `profile_suco` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `municipality` varchar(255) DEFAULT NULL,
  `administrative_post` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `profile_suco` (`id`, `name`, `logo`, `photo`, `municipality`, `administrative_post`, `address`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Suku Purugoa', NULL, NULL, 'Ermera', 'Ermera', 'Suku Purugoa, Postu Ermera, Munisipiu Ermera', 'sucopurugoa@gmail.com', '+670 77777777', NOW(), NOW());

-- -----------------------------------------------------------
-- Table: aldeias
-- -----------------------------------------------------------
CREATE TABLE `aldeias` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `chief_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `aldeias` (`id`, `code`, `name`, `chief_name`, `created_at`, `updated_at`) VALUES
(1, 'AL001', 'Aldeia Ailoga', 'João da Silva', NOW(), NOW()),
(2, 'AL002', 'Aldeia Tatuli', 'Maria Pereira', NOW(), NOW()),
(3, 'AL003', 'Aldeia Leohata', 'Antonio dos Santos', NOW(), NOW()),
(4, 'AL004', 'Aldeia Lebometa', 'Jose Soares', NOW(), NOW());

-- -----------------------------------------------------------
-- Table: rts
-- -----------------------------------------------------------
CREATE TABLE `rts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number` varchar(20) NOT NULL,
  `chief_name` varchar(255) DEFAULT NULL,
  `aldeia_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aldeia_id` (`aldeia_id`),
  CONSTRAINT `rts_ibfk_1` FOREIGN KEY (`aldeia_id`) REFERENCES `aldeias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rts` (`id`, `number`, `chief_name`, `aldeia_id`, `created_at`, `updated_at`) VALUES
(1, 'RT 01', 'Carlos de Jesus', 1, NOW(), NOW()),
(2, 'RT 02', 'Lucia Freitas', 1, NOW(), NOW()),
(3, 'RT 03', 'Joao da Costa', 2, NOW(), NOW()),
(4, 'RT 04', 'Pedro Alves', 3, NOW(), NOW());

-- -----------------------------------------------------------
-- Table: family_cards
-- -----------------------------------------------------------
CREATE TABLE `family_cards` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number` varchar(50) NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `head_name` varchar(255) NOT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `aldeia_id` int(11) UNSIGNED DEFAULT NULL,
  `rt_id` int(11) UNSIGNED DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`),
  KEY `aldeia_id` (`aldeia_id`),
  KEY `rt_id` (`rt_id`),
  CONSTRAINT `family_cards_ibfk_1` FOREIGN KEY (`aldeia_id`) REFERENCES `aldeias` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `family_cards_ibfk_2` FOREIGN KEY (`rt_id`) REFERENCES `rts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `family_cards` (`id`, `number`, `nik`, `head_name`, `gender`, `birth_date`, `address`, `aldeia_id`, `rt_id`, `phone`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'KK001', 'NIK001', 'João da Silva', 'M', '1980-05-12', 'Rua A, No.1', 1, 1, '+670 71111111', NULL, NOW(), NOW()),
(2, 'KK002', 'NIK002', 'Maria Pereira', 'F', '1985-08-22', 'Rua B, No.5', 2, 3, '+670 72222222', NULL, NOW(), NOW());

-- -----------------------------------------------------------
-- Table: citizens
-- -----------------------------------------------------------
CREATE TABLE `citizens` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) DEFAULT NULL,
  `nik` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `age` int(3) DEFAULT 0,
  `religion` varchar(50) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `aldeia_id` int(11) UNSIGNED DEFAULT NULL,
  `rt_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik`),
  KEY `aldeia_id` (`aldeia_id`),
  KEY `rt_id` (`rt_id`),
  CONSTRAINT `citizens_ibfk_1` FOREIGN KEY (`aldeia_id`) REFERENCES `aldeias` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `citizens_ibfk_2` FOREIGN KEY (`rt_id`) REFERENCES `rts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `citizens` (`id`, `photo`, `nik`, `full_name`, `gender`, `birth_place`, `birth_date`, `age`, `religion`, `education`, `occupation`, `marital_status`, `phone`, `address`, `aldeia_id`, `rt_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'NIK001', 'João da Silva', 'M', 'Dili', '1980-05-12', 44, 'Katóliku', 'SMU', 'Agrikultór', 'Kaben', '+670 71111111', 'Rua A, No.1', 1, 1, NOW(), NOW()),
(2, NULL, 'NIK002', 'Maria Pereira', 'F', 'Ermera', '1985-08-22', 39, 'Katóliku', 'SMU', 'Servisu Públiku', 'Kaben', '+670 72222222', 'Rua B, No.5', 2, 3, NOW(), NOW()),
(3, NULL, 'NIK003', 'Antonio dos Santos', 'M', 'Ermera', '1990-01-15', 34, 'Katóliku', 'Fakuldade', 'Mestre Eskola', 'Kaben', '+670 73333333', 'Rua C, No.10', 3, 4, NOW(), NOW()),
(4, NULL, 'NIK004', 'Ana Soares', 'F', 'Baucau', '1995-06-20', 29, 'Protestante', 'SMU', 'Enfermeira', 'Solteiru', '+670 74444444', 'Rua D, No.2', 1, 2, NOW(), NOW()),
(5, NULL, 'NIK005', 'Carlos de Jesus', 'M', 'Dili', '1975-03-10', 49, 'Katóliku', 'SGD', 'Pescador', 'Kaben', '+670 75555555', 'Rua E, No.8', 2, 3, NOW(), NOW());

-- -----------------------------------------------------------
-- Table: letters
-- -----------------------------------------------------------
CREATE TABLE `letters` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `letter_number` varchar(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `citizen_id` int(11) UNSIGNED DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `letter_number` (`letter_number`),
  KEY `citizen_id` (`citizen_id`),
  CONSTRAINT `letters_ibfk_1` FOREIGN KEY (`citizen_id`) REFERENCES `citizens` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------------
-- Table: settings
-- -----------------------------------------------------------
CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'system_name', 'Sistema Informasaun Jestaun Dadus Suku Purugoa', NOW(), NOW()),
(2, 'system_logo', NULL, NOW(), NOW()),
(3, 'app_version', '1.0.0', NOW(), NOW());

-- -----------------------------------------------------------
-- Table: activity_logs
-- -----------------------------------------------------------
CREATE TABLE `activity_logs` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Auto-generated password hash for admin (admin123)
-- Hash: $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi
