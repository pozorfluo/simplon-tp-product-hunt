-- Host: mysql
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `tp_product_hunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--
CREATE TABLE `products` (
    `product_id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `created_at` DATETIME NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `summary` VARCHAR(255) NOT NULL,
    `website` VARCHAR(512) CHARACTER SET 'ascii' COLLATE 'ascii_general_ci' NOT NULL,
    `thumbnail` VARCHAR(255) CHARACTER SET 'ascii' COLLATE 'ascii_general_ci' NOT NULL,
    `votes_count` MEDIUMINT UNSIGNED NOT NULL DEFAULT 0,
    PRIMARY KEY (`product_id`),
    INDEX freshness (`created_at`),
    INDEX popularity (`votes_count`)
) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

--
-- Table structure for table `articles`
--
CREATE TABLE `articles` (
    `article_id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `product_id` MEDIUMINT UNSIGNED NOT NULL,
    `content` TEXT NOT NULL,
    `media` JSON,
    PRIMARY KEY (`article_id`),
    CONSTRAINT `constraint_articles_product_fk`
        FOREIGN KEY `products_fk` (`product_id`) REFERENCES `products` (`product_id`)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

--
-- Table structure for table `categories`
--
CREATE TABLE `categories` (
    `category_id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`category_id`),
    INDEX category (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

--
-- Table structure for table `collections`
--
CREATE TABLE `collections` (
    `product_id` MEDIUMINT UNSIGNED NOT NULL,
    `category_id` MEDIUMINT UNSIGNED NOT NULL,
    PRIMARY KEY (`product_id`, `category_id`),
    CONSTRAINT `constraint_collections_product_fk`
        FOREIGN KEY `products_fk` (`product_id`) REFERENCES `products` (`product_id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `constraint_collections_category_fk`
        FOREIGN KEY `categories_fk` (`category_id`) REFERENCES `categories` (`category_id`)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

--
-- Table structure for table `users`
--
CREATE TABLE `users` (
    `user_id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` CHAR(32) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `ip` INT UNSIGNED NOT NULL ,
    PRIMARY KEY (`user_id`),
    INDEX username (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

--
-- Table structure for table `votes`
--
CREATE TABLE `votes` (
    `product_id` MEDIUMINT UNSIGNED NOT NULL,
    `user_id` MEDIUMINT UNSIGNED NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`product_id`, `user_id`),
    INDEX freshness (`created_at`),
    CONSTRAINT `constraint_votes_product_fk`
        FOREIGN KEY `products_fk` (`product_id`) REFERENCES `products` (`product_id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `constraint_votes_category_fk`
        FOREIGN KEY `users_fk` (`user_id`) REFERENCES `users` (`user_id`)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

--
-- Table structure for table `comments`
--
CREATE TABLE `comments` (
    `comment_id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `product_id` MEDIUMINT UNSIGNED NOT NULL,
    `user_id` MEDIUMINT UNSIGNED NOT NULL,
    `created_at` DATETIME NOT NULL,
    `content` TEXT NOT NULL,
    PRIMARY KEY (`comment_id`),
    INDEX freshness (`created_at`),
    CONSTRAINT `constraint_comments_product_fk`
        FOREIGN KEY `products_fk` (`product_id`) REFERENCES `products` (`product_id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `constraint_comments_user_fk`
        FOREIGN KEY `user_fk` (`user_id`) REFERENCES `users` (`user_id`)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

-- Find all votes by a given user
-- Find all comments for a given product
-- Count comments for a given product
-- Find all comments content for a given product

--
-- Table structure for table `products`
--
-- CREATE TABLE `products` (
--     `product_id` MEDIUMINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
--     `category_id` MEDIUMINT UNSIGNED NOT NULL,
--     `created_at` DATETIME NOT NULL,
--     `name` VARCHAR(255) NOT NULL,
--     `summary` VARCHAR(255) NOT NULL,
--     `website` VARCHAR(512) CHARACTER SET 'ascii' COLLATE 'ascii_general_ci' NOT NULL,
--     `thumbnail` VARCHAR(255) CHARACTER SET 'ascii' COLLATE 'ascii_general_ci' NOT NULL,
--     `votes_count` MEDIUMINT UNSIGNED NOT NULL DEFAULT 0,
--     INDEX freshness (`created_at`),
--     INDEX category (`category_id`),
--     INDEX popularity (`votes_count`)
-- ) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

--
-- Table structure for table `actions`
--
-- CREATE TABLE `actions` (
--     `action_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
--     `product_id` MEDIUMINT UNSIGNED NOT NULL,
--     `user_id` MEDIUMINT UNSIGNED NOT NULL,
--     `type` ENUM('vote', 'comment') NOT NULL,
--     `created_at` DATETIME NOT NULL,
--     `ip` INT UNSIGNED NOT NULL ,
--     PRIMARY KEY (`action_id`),
--         INDEX product_actions (`product_id`),
--         INDEX user_actions (`user_id`)
--     CONSTRAINT `constraint_actions_product_fk`
--         FOREIGN KEY `products_fk` (`product_id`) REFERENCES `products` (`product_id`)
--         ON DELETE CASCADE ON UPDATE CASCADE,
--     CONSTRAINT `constraint_actions_user_fk`
--         FOREIGN KEY `user_fk` (`user_id`) REFERENCES `users` (`user_id`)
--         ON DELETE CASCADE ON UPDATE CASCADE,
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;