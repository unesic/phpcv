CREATE DATABASE IF NOT EXISTS phpcv COLLATE utf8mb4_unicode_520_ci;

USE phpcv;

CREATE TABLE `users` (
    `id`            MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username`      VARCHAR(50),
    `password`      VARCHAR(50),
    `email`         VARCHAR(50),
    `date_created`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `date_updated`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE `profiles` (
    `id`              MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id`         MEDIUMINT UNSIGNED NOT NULL,
    `name`            VARCHAR(100),
    `title`           VARCHAR(100),
    `date_of_birth`   DATE,
    `phone_number`    VARCHAR(20),
    `email`           VARCHAR(50),
    `country`         VARCHAR(100),
    `city`            VARCHAR(100),
    `social_networks` VARCHAR(255),
    `has_cvs`         TINYINT UNSIGNED,
    `date_created`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `date_updated`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE `components` (
    `id`              MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `type`            VARCHAR(50),
    `content`         VARCHAR(65535),
    `cv_id`           MEDIUMINT UNSIGNED NOT NULL,
    `date_created`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `date_updated`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE `cvs` (
    `id`              MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `profile_id`      MEDIUMINT UNSIGNED NOT NULL,
    `date_created`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `date_updated`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (id)
);