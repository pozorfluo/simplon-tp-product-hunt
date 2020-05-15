-- Host: mysql
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET AUTOCOMMIT = 0;
-- START TRANSACTION;
-- SET time_zone = "+00:00";

--
-- Database: `tp_product_hunt`
--

-- --------------------------------------------------------

--
-- public function getCategories(int $count = 10, int $offset = 0): array
--
SELECT
    `category_id`,
    `name`
FROM
    `categories`
LIMIT 10 OFFSET 0;

-- --------------------------------------------------------

--
-- public function getCategory(int $category_id): array
--
SELECT
    `category_id`,
    `name`,
    `summary`,
    `thumbnail`
FROM
    `categories`
WHERE
    `category_id` = 1;


-- --------------------------------------------------------

--
-- public function getFreshProducts(int $count = 10, int $offset = 0): array
--
SELECT
    `products`.`product_id`,
    `products`.`created_at`,
    `products`.`name`,
    `products`.`summary`,
    `products`.`website`,
    `products`.`thumbnail`,
    COUNT(`comments`.`product_id`) AS `comments_count`,
    COUNT(`votes`.`product_id`) AS `votes_count`
FROM 
    `products`
LEFT JOIN
    `comments`
ON
    `products`.`product_id` = `comments`.`product_id`
LEFT JOIN
    `votes`
ON
    `products`.`product_id` = `votes`.`product_id`
GROUP BY
    `products`.`product_id`
ORDER BY
    `products`.`created_at` DESC
LIMIT 10 OFFSET 0;


-- --------------------------------------------------------

--
-- public function getPopularProducts(int $count = 10, int $offset = 0): array
--
SELECT
    `products`.`product_id`,
    `products`.`created_at`,
    `products`.`name`,
    `products`.`summary`,
    `products`.`website`,
    `products`.`thumbnail`,
    COUNT(`comments`.`product_id`) AS `comments_count`,
    COUNT(`votes`.`product_id`) AS `votes_count`
FROM 
    `products`
LEFT JOIN
    `comments`
ON
    `products`.`product_id` = `comments`.`product_id`
LEFT JOIN
    `votes`
ON
    `products`.`product_id` = `votes`.`product_id`
GROUP BY
    `products`.`product_id`
ORDER BY
    `votes_count` DESC, `products`.`created_at` DESC
LIMIT 10 OFFSET 0

-- --------------------------------------------------------

--
-- public function getProduct(int $product_id): array
--
SELECT
    `articles`.`product_id`,
    `articles`.`article_id`,
    `articles`.`content`,
    `articles`.`media`
FROM 
    `articles`
WHERE
    `articles`.`product_id` = 1;


-- --------------------------------------------------------

--
-- public function getUserbyName(string $name): array
--
SELECT
    `user_id`,
    `name`,
    `created_at`,
    `ip`
FROM
    `users`
WHERE
    `name` = "JeanPlaceHaut-le-Der";

-- --------------------------------------------------------

--
-- public function getUserById(int $user_id): array
--
SELECT
    `user_id`,
    `name`,
    `created_at`,
    `ip`
FROM
    `users`
WHERE
    `user_id` = 1;

-- --------------------------------------------------------

--
-- public function addUser(string $name, string $ip): array
--
INSERT INTO `users`(`name`, `created_at`, `ip`)
VALUES(
    'JeanPlaceHaut-le-Der',
    '2020-05-10 07:01:00',
    INET_ATON('127.0.0.1')
);


-- SELECT
--     `products`.`product_id`,
--     `products`.`created_at`,
--     `products`.`name`,
--     `products`.`summary`,
--     `products`.`website`,
--     `products`.`thumbnail`,
--     COUNT(`comments`.`product_id`) AS `comments_count`
-- FROM 
--     `products`
-- LEFT JOIN
--     `comments`
-- ON
--     `products`.`product_id` = `comments`.`product_id`
-- GROUP BY
--     `products`.`product_id`
-- -- ORDER BY
-- --     `products`.`created_at` DESC
-- LIMIT 10 OFFSET 0



-- SELECT
--     *
-- FROM 
--     `products`
-- LEFT JOIN
--     (
--         SELECT
--             `comments`.`product_id`,
--             COUNT(*) as `comments_count`
--         FROM
--             `comments`
--         LEFT JOIN
--             (
--             SELECT 
--                     `products`.`product_id`,
--                     `products`.`created_at`
--                 FROM
--                     `products`
--                 ORDER BY
--                     `products`.`created_at` DESC
--                 LIMIT 10 OFFSET 0
--             ) AS `products_fresh`
--             ON
--                 `comments`.`product_id` =`products_fresh`.`product_id`
--         GROUP BY
--             `comments`.`product_id`
--     ) AS comments_fresh
-- ON
--     `products`.`product_id` = `comments_fresh`.`product_id`




-- SELECT
--     `comments`.`product_id`,
--     COUNT(*) as `comments_count`
-- FROM
--     `comments`
-- LEFT JOIN
--     (
--     SELECT 
--             `products`.`product_id`,
--             `products`.`created_at`
--         FROM
--             `products`
--         ORDER BY
--             `products`.`created_at` DESC
--         LIMIT 10 OFFSET 0
--     ) AS `products_fresh`
--     ON
--         `comments`.`product_id` =`products_fresh`.`product_id`
-- GROUP BY
--     `comments`.`product_id`









-- SELECT
--     *
-- FROM 
--     `products`
-- LEFT JOIN
--     (
--         SELECT
--             `comments`.`product_id`,
--             COUNT(*) as `comments_count`
--         FROM
--             `comments`
--         GROUP BY
--             `comments`.`product_id`
--     ) AS comments_fresh
-- ON
--     `products`.`product_id` = `comments_fresh`.`product_id`


-- SELECT
--     `products_fresh`.`product_id`,
--     `products_fresh`.`created_at`,
--     `products_fresh`.`name`,
--     `products_fresh`.`summary`,
--     `products_fresh`.`website`,
--     `products_fresh`.`thumbnail`,
--     COUNT(`products_fresh`.`product_id`) AS `comments_count`
-- FROM
--     `comments`
-- RIGHT JOIN(
--     SELECT 
--         `products`.`product_id`,
--         `products`.`created_at`,
--         `products`.`name`,
--         `products`.`summary`,
--         `products`.`website`,
--         `products`.`thumbnail`
--     FROM
--         `products`
--     ORDER BY
--         `products`.`created_at` DESC
--     LIMIT 10 OFFSET 0

-- ) AS `products_fresh`
-- ON
--     `comments`.`product_id` =`products_fresh`.`product_id`
-- GROUP BY
--     `products_fresh`.`product_id`






-- SELECT
--     `products`.`product_id`,
--     `products`.`created_at`,
--     `products`.`name`,
--     `products`.`summary`,
--     `products`.`website`,
--     `products`.`thumbnail`,
--     `comments_counts_sq`.`comments_count`
-- FROM
--     `products`
-- LEFT JOIN(
--     SELECT `comments`.`product_id`,
--         COUNT(*) AS `comments_count`
--     FROM
--         `comments`
--     GROUP BY
--         `comments`.`product_id`
-- ) AS `comments_counts_sq`
-- ON
--     `products`.`product_id` = `comments_counts_sq`.`product_id`
-- ORDER BY
--     `products`.`created_at`
-- DESC
-- LIMIT 10 OFFSET 0;




-- SELECT
--     `comments`.`product_id`,
--     COUNT(*) as `comments_count`

-- FROM
--     `comments`
-- GROUP BY
--     `comments`.`product_id`

-- SELECT
--     `products`.`product_id`,
--     `products`.`created_at`,
--     `products`.`name`,
--     `products`.`summary`,
--     `products`.`website`,
--     `products`.`thumbnail`,
--     (
--     SELECT
--         COUNT(*)
--     FROM
--         `votes`
--     WHERE
--         `votes`.`product_id` = `products`.`product_id`
--     ) AS `votes_count`,
--     (
--         SELECT
--             COUNT(*)
--         FROM
--             `comments`
--         WHERE
--             `comments`.`product_id` = `products`.`product_id`
--     ) AS `comments_count`
-- FROM
--     `products`
-- ORDER BY
--     `products`.`created_at` DESC
-- LIMIT 10 OFFSET 0;




-- SELECT
--     `products`.`product_id`,
--     `products`.`created_at`,
--     `products`.`name`,
--     `products`.`summary`,
--     `products`.`website`,
--     `products`.`thumbnail`,
--     `products`.`votes_count`,
-- 	COUNT(*) as `comments_count`
-- FROM
--     `products`
-- LEFT JOIN 
--     `comments` ON `products`.`product_id` = `comments`.`product_id`
-- GROUP BY
--     `comments`.`product_id`
-- WHERE
--     1;

