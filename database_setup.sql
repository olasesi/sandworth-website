-- ═══════════════════════════════════════════════════════
--  Sandworth Properties Ltd. — Database Setup
--  Run this SQL in phpMyAdmin > SQL tab
-- ═══════════════════════════════════════════════════════

-- 1. Create the database (skip if it already exists)
CREATE DATABASE IF NOT EXISTS `sandworth_db`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `sandworth_db`;

-- 2. Create the enquiries table
CREATE TABLE IF NOT EXISTS `enquiries` (
  `id`            INT UNSIGNED    NOT NULL AUTO_INCREMENT,
  `first_name`    VARCHAR(80)     NOT NULL,
  `last_name`     VARCHAR(80)     NOT NULL,
  `email`         VARCHAR(180)    NOT NULL,
  `phone`         VARCHAR(40)     DEFAULT NULL,
  `enquiry_type`  VARCHAR(60)     NOT NULL,
  `message`       TEXT            NOT NULL,
  `ip_address`    VARCHAR(45)     DEFAULT NULL,
  `created_at`    DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_email`        (`email`),
  INDEX `idx_created_at`   (`created_at`)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci
  COMMENT='Contact form enquiries from the Sandworth website';

-- 3. (Optional) Create a dedicated DB user with minimal privileges
--    Replace 'your_secure_password' with a strong password
-- CREATE USER 'sandworth_user'@'localhost' IDENTIFIED BY 'your_secure_password';
-- GRANT SELECT, INSERT ON `sandworth_db`.`enquiries` TO 'sandworth_user'@'localhost';
-- FLUSH PRIVILEGES;

-- ═══════════════════════════════════════════════════════
--  Done! Then edit contact.php:
--    define('DB_HOST', 'localhost');
--    define('DB_NAME', 'sandworth_db');
--    define('DB_USER', 'sandworth_user');
--    define('DB_PASS', 'your_secure_password');
-- ═══════════════════════════════════════════════════════
