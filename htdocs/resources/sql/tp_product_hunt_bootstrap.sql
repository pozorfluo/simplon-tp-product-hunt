-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: May 18, 2020 at 01:36 AM
-- Server version: 10.3.22-MariaDB-1:10.3.22+maria~bionic
-- PHP Version: 7.3.16

SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_product_hunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` mediumint(8) UNSIGNED NOT NULL,
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `media` longtext DEFAULT NULL CHECK (json_valid(`media`))
) ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `product_id`, `content`, `media`) VALUES
(1, 1, 'Rewind displays your bookmarks filtered by date, with thumbnails and instant search. It takes one click to see the links you saved yesterday, last week, last month. It\'s totally free and it relies on your local bookmarks, you don\'t have to create an account.', '[\"public/images/products/1_Rewind_0.webp\",\"public/images/products/1_Rewind_1.webp\",\"public/images/products/1_Rewind_2.webp\",\"public/images/products/1_Rewind_3.webp\",\"public/images/products/1_Rewind_4.webp\"]'),
(2, 2, 'Buy For Life is a crowdsourced platform to discuss and discover long-lasting and sustainable products.', '[\"public/images/products/2_Buy-For-Life_0.webp\",\"public/images/products/2_Buy-For-Life_1.webp\",\"public/images/products/2_Buy-For-Life_2.webp\",\"public/images/products/2_Buy-For-Life_3.webp\",\"public/images/products/2_Buy-For-Life_4.webp\",\"public/images/products/2_Buy-For-Life_5.webp\"]'),
(3, 3, 'Remoty help teams reach their full potential with powerful time-tracking and progress update workflow in Slack.', '[\"public/images/products/3_Remoty_0.webp\",\"public/images/products/3_Remoty_1.webp\",\"public/images/products/3_Remoty_2.webp\",\"public/images/products/3_Remoty_3.webp\",\"public/images/products/3_Remoty_4.webp\",\"public/images/products/3_Remoty_5.webp\",\"public/images/products/3_Remoty_6.webp\"]'),
(4, 4, 'WA for everyone who plans the wedding and wedding professionals. ? Useful tools of the wedding projects ?? Collaborate in real-time ? Cloud storage, easy sharing ? Marketing tools for vendors and venues ? Multiple languages supported ? Security first!', '[\"public/images/products/4_Wedding-Planning-Assistant_0.webp\",\"public/images/products/4_Wedding-Planning-Assistant_1.webp\",\"public/images/products/4_Wedding-Planning-Assistant_2.webp\",\"public/images/products/4_Wedding-Planning-Assistant_3.webp\",\"public/images/products/4_Wedding-Planning-Assistant_4.webp\",\"public/images/products/4_Wedding-Planning-Assistant_5.webp\",\"public/images/products/4_Wedding-Planning-Assistant_6.webp\",\"public/images/products/4_Wedding-Planning-Assistant_7.webp\",\"public/images/products/4_Wedding-Planning-Assistant_8.webp\"]'),
(5, 5, 'Join conference calls in 1 sec. Usually, it takes about a minute to find the right URL and connect to the meeting. Time to change it. Especially right now.', '[\"public/images/products/5_Jump-In-Meeting_0.webp\",\"public/images/products/5_Jump-In-Meeting_1.webp\",\"public/images/products/5_Jump-In-Meeting_2.webp\",\"public/images/products/5_Jump-In-Meeting_3.webp\",\"public/images/products/5_Jump-In-Meeting_4.webp\",\"public/images/products/5_Jump-In-Meeting_5.webp\",\"public/images/products/5_Jump-In-Meeting_6.webp\"]'),
(6, 6, 'Check the price automatically at over 30,000 retailers instantly when you visit any product. Know every retailer\'s price before choosing which to buy from. Important details like arrival date and estimated shipping cost are also shown, compare it all!', '[\"public/images/products/6_ShopSavvy-for-Chrome_0.webp\",\"public/images/products/6_ShopSavvy-for-Chrome_1.webp\",\"public/images/products/6_ShopSavvy-for-Chrome_2.webp\",\"public/images/products/6_ShopSavvy-for-Chrome_3.webp\",\"public/images/products/6_ShopSavvy-for-Chrome_4.webp\",\"public/images/products/6_ShopSavvy-for-Chrome_5.webp\"]'),
(7, 7, '9to5Mac featured productivity app Was it hangouts or zoom? Personal or work calendar? Cut through the noise by simply connecting your calendar, and Meeter will automatically pull all your upcoming calls and let you manage them in one place.', '[\"public/images/products/7_Meeter_0.webp\",\"public/images/products/7_Meeter_1.webp\",\"public/images/products/7_Meeter_2.webp\",\"public/images/products/7_Meeter_3.webp\"]'),
(8, 8, 'OffScreen 2.0 has a major update to help people focus on what matters when you working/studying from home. Less screen time can reduce your anxiety obviously. Pomodoro timer, Focus data analysis, Screen time calendar... and many more can improve your workflow', '[\"public/images/products/8_OffScreen-2.0_0.webp\",\"public/images/products/8_OffScreen-2.0_1.webp\",\"public/images/products/8_OffScreen-2.0_2.webp\",\"public/images/products/8_OffScreen-2.0_3.webp\",\"public/images/products/8_OffScreen-2.0_4.webp\",\"public/images/products/8_OffScreen-2.0_5.webp\",\"public/images/products/8_OffScreen-2.0_6.webp\",\"public/images/products/8_OffScreen-2.0_7.webp\",\"public/images/products/8_OffScreen-2.0_8.webp\",\"public/images/products/8_OffScreen-2.0_9.webp\",\"public/images/products/8_OffScreen-2.0_10.webp\"]'),
(9, 9, 'We all do a lot of scrolling in our browsers. If you could convert pixels to mi/km, how far would you scroll each day? This extension attempts to answer that question. (And maybe help us think more about standing up and logging some actual miles.)', '[\"public/images/products/9_ScrollTrotter_0.webp\",\"public/images/products/9_ScrollTrotter_1.webp\",\"public/images/products/9_ScrollTrotter_2.webp\",\"public/images/products/9_ScrollTrotter_3.webp\"]'),
(10, 10, 'A free time blocking app that works with Google Calendar. Calendarist gives you a clear picture of your daily life and keeps you on track to reach your goals.', '[\"public/images/products/10_Calendarist_0.webp\",\"public/images/products/10_Calendarist_1.webp\",\"public/images/products/10_Calendarist_2.webp\",\"public/images/products/10_Calendarist_3.webp\",\"public/images/products/10_Calendarist_4.webp\"]');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `summary`, `thumbnail`) VALUES
(1, 'Tech', 'Hard, soft, high, low. Forward !', 'public/images/products/thumbnails/virtual-reality.svg'),
(2, 'Dev Tools', 'So many tools to help you procrastinate !', 'public/images/products/thumbnails/programming.svg'),
(3, 'AI', 'There\'s a bot for that too !', 'public/images/products/thumbnails/robot.svg'),
(4, 'Social', 'Get in touch.', 'public/images/products/thumbnails/programming.svg'),
(5, 'Science', 'Only one thing is infinite : the time you spend on the internet.', 'public/images/products/thumbnails/atom.svg'),
(6, 'Health', 'Some of us haven\'t hit the singularity yet and need to take care of their mortal substrate.', 'public/images/products/thumbnails/test-tube.svg'),
(7, 'Gaming', 'BOOM !!! Headshot !', 'public/images/products/thumbnails/rubik.svg');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `category_id` mediumint(8) UNSIGNED NOT NULL
) ;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`product_id`, `category_id`) VALUES
(1, 1),
(1, 4),
(1, 5),
(2, 1),
(2, 3),
(3, 1),
(3, 2),
(4, 2),
(4, 6),
(4, 7),
(5, 1),
(5, 2),
(5, 3),
(6, 2),
(6, 7),
(7, 2),
(7, 4),
(8, 2),
(8, 6),
(9, 1),
(9, 2),
(10, 2),
(10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` mediumint(8) UNSIGNED NOT NULL,
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `content` text NOT NULL
) ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `product_id`, `user_id`, `created_at`, `content`) VALUES
(1, 1, 1, '2020-05-10 07:01:01', 'Message 1 on Product 1 from user 1'),
(2, 1, 1, '2020-05-10 07:01:02', 'Message 2 on Product 1 from user 1'),
(3, 1, 1, '2020-05-10 07:01:03', 'Message 3 on Product 1 from user 1'),
(4, 1, 1, '2020-05-10 07:01:04', 'Message 4 on Product 1 from user 1'),
(5, 2, 1, '2020-05-10 07:01:02', 'Message 1 on Product 2 from user 1'),
(6, 2, 1, '2020-05-10 07:01:03', 'Message 2 on Product 2 from user 1'),
(7, 2, 1, '2020-05-10 07:01:04', 'Message 3 on Product 2 from user 1'),
(8, 3, 1, '2020-05-10 07:01:02', 'Message 1 on Product 3 from user 1'),
(9, 3, 1, '2020-05-10 07:01:03', 'Message 2 on Product 3 from user 1'),
(10, 3, 1, '2020-05-10 07:01:04', 'Message 3 on Product 3 from user 1'),
(11, 4, 1, '2020-05-10 07:01:02', 'Message 1 on Product 4 from user 1'),
(12, 4, 1, '2020-05-10 07:01:03', 'Message 2 on Product 4 from user 1'),
(13, 4, 1, '2020-05-10 07:01:04', 'Message 3 on Product 4 from user 1'),
(14, 5, 1, '2020-05-10 07:01:02', 'Message 1 on Product 5 from user 1'),
(15, 5, 1, '2020-05-10 07:01:03', 'Message 2 on Product 5 from user 1'),
(16, 5, 1, '2020-05-10 07:01:04', 'Message 3 on Product 5 from user 1'),
(17, 6, 1, '2020-05-10 07:01:02', 'Message 1 on Product 6 from user 1'),
(18, 6, 1, '2020-05-10 07:01:03', 'Message 2 on Product 6 from user 1'),
(19, 6, 1, '2020-05-10 07:01:04', 'Message 3 on Product 6 from user 1'),
(20, 6, 1, '2020-05-10 07:01:02', 'Message 1 on Product 6 from user 1'),
(21, 6, 1, '2020-05-10 07:01:03', 'Message 2 on Product 6 from user 1'),
(22, 6, 1, '2020-05-10 07:01:04', 'Message 3 on Product 6 from user 1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `website` varchar(512) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `created_at`, `name`, `summary`, `website`, `thumbnail`) VALUES
(1, '2020-05-10 07:01:00', 'Rewind', 'Your bookmarks, by date, with thumbnails and instant search', 'https://rewind.netlify.app/?ref=producthunt', 'public/images/products/thumbnails/1_Rewind.webp'),
(2, '2020-05-10 07:00:00', 'Buy For Life', 'Discover durable and sustainable products for a better world', 'https://www.buyforlifeproducts.com/?ref=producthunt', 'public/images/products/thumbnails/2_Buy-For-Life.webp'),
(3, '2020-05-10 07:01:00', 'Remoty', 'Time tracking, async daily standups & payroll exports', 'https://remoty.dev?ref=producthunt', 'public/images/products/thumbnails/3_Remoty.webp'),
(4, '2020-05-10 07:12:00', 'Wedding Planning Assistant', 'Everything you need to plan your wedding', 'https://planning.wedding?ref=producthunt', 'public/images/products/thumbnails/4_Wedding-Planning-Assistant.webp'),
(5, '2020-05-10 07:00:00', 'Jump In Meeting', 'Connect to your conference calls from the menu bar', 'https://jumpinm.com?ref=producthunt', 'public/images/products/thumbnails/5_Jump-In-Meeting.webp'),
(6, '2020-05-08 19:45:51', 'ShopSavvy for Chrome', 'Automatically compare prices between over 30,000+ retailers.', 'https://chrome.google.com/webstore/detail/shopsavvy/megchchilhekbbnfcklodmndefbhkbco?ref=producthunt', 'public/images/products/thumbnails/6_ShopSavvy-for-Chrome.webp'),
(7, '2020-05-10 07:00:00', 'Meeter', 'Hop in and out of calls, directly from your menu bar', 'https://trymeeter.com/?ref=producthunt', 'public/images/products/thumbnails/7_Meeter.webp'),
(8, '2020-05-06 06:40:19', 'OffScreen 2.0', 'Less screen time, more focus.', 'https://apps.apple.com/us/app/offscreen-less-screen-time/id1474340105?pt=119361776&ct=ph&mt=8&ref=producthunt&at=1000l6eA', 'public/images/products/thumbnails/8_OffScreen-2.0.webp'),
(9, '2020-05-06 12:52:02', 'ScrollTrotter', 'How many miles have you scrolled today?', 'https://chrome.google.com/webstore/detail/scrolltrotter/mppejknbhapogefdpekbpalahphlhgdm?ref=producthunt', 'public/images/products/thumbnails/9_ScrollTrotter.webp'),
(10, '2020-05-10 08:01:00', 'Calendarist', 'Time blocking companion for Google Calendar', 'https://trycalendarist.com?ref=producthunt', 'public/images/products/thumbnails/10_Calendarist.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `name` char(32) NOT NULL,
  `created_at` datetime NOT NULL,
  `ip` varbinary(16) NOT NULL
) ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `created_at`, `ip`) VALUES
(1, 'JeanPlaceHaut-le-Der', '2020-05-15 16:42:37', 0x00000000000000000000000000000001),
(66, 'JeanPlaceqsdqsHaut-le-Der', '2020-05-15 16:44:12', 0x00000000000000000000000000000001),
(67, 'JeanPlaqsdqceqsdqsHaut-le-Der', '2020-05-15 16:44:39', 0x7f000001),
(76, 'Zoltan', '2020-05-16 14:48:18', 0xac10ee01),
(77, 'NuGuy', '2020-05-16 15:34:54', 0xac10ee01),
(78, 'Hamza', '2020-05-16 15:35:15', 0xac10ee01),
(79, 'pozorfluo', '2020-05-16 15:36:25', 0xac10ee01),
(80, 'AnotherUser', '2020-05-16 15:37:53', 0xac10ee01),
(81, 'qsdqs', '2020-05-16 20:15:51', 0xac10ee01),
(82, 'Simplony', '2020-05-17 08:42:13', 0xac10ee01),
(83, 'Rayvond Demos', '2020-05-17 08:42:58', 0xac10ee01),
(84, 'Chraster Lambof', '2020-05-17 08:45:13', 0xac10ee01),
(85, 'ProductHuntor', '2020-05-17 08:50:42', 0xac10ee01),
(86, 'JennyJones', '2020-05-17 08:54:04', 0xac10ee01),
(87, 'HamzaKarfa', '2020-05-17 08:56:46', 0xac10ee01),
(88, 'Zoltarene', '2020-05-18 00:18:52', 0xac10ee01),
(89, 'SerjTankian', '2020-05-18 01:06:20', 0xac10ee01),
(90, 'Serjio', '2020-05-18 01:06:54', 0xac10ee01);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL
) ;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`product_id`, `user_id`, `created_at`) VALUES
(1, 1, '2020-05-10 07:01:01'),
(2, 1, '2020-05-10 07:01:02'),
(3, 1, '2020-05-10 07:01:03'),
(9, 1, '2020-05-10 07:01:04'),
(10, 76, '2020-05-17 08:30:29'),
(4, 76, '2020-05-17 08:30:37'),
(1, 76, '2020-05-17 08:30:47'),
(7, 76, '2020-05-17 08:31:02'),
(6, 76, '2020-05-17 08:31:03'),
(5, 76, '2020-05-17 08:31:10'),
(8, 76, '2020-05-17 08:31:12'),
(2, 76, '2020-05-17 08:34:59'),
(9, 76, '2020-05-17 08:35:04'),
(3, 76, '2020-05-17 08:35:08'),
(10, 78, '2020-05-17 08:38:51'),
(4, 78, '2020-05-17 08:38:56'),
(1, 78, '2020-05-17 08:39:47'),
(5, 78, '2020-05-17 08:40:29'),
(7, 78, '2020-05-17 08:40:48'),
(3, 78, '2020-05-17 08:41:10'),
(2, 78, '2020-05-17 08:41:15'),
(6, 78, '2020-05-17 08:41:28'),
(8, 78, '2020-05-17 08:41:58'),
(9, 78, '2020-05-17 08:42:01'),
(10, 82, '2020-05-17 08:42:14'),
(1, 82, '2020-05-17 08:42:16'),
(3, 82, '2020-05-17 08:42:17'),
(4, 82, '2020-05-17 08:42:19'),
(5, 82, '2020-05-17 08:42:21'),
(8, 82, '2020-05-17 08:42:31'),
(6, 82, '2020-05-17 08:42:33'),
(9, 82, '2020-05-17 08:42:34'),
(7, 82, '2020-05-17 08:42:35'),
(2, 82, '2020-05-17 08:42:39'),
(1, 83, '2020-05-17 08:44:55'),
(3, 83, '2020-05-17 08:44:56'),
(1, 84, '2020-05-17 08:45:25'),
(3, 84, '2020-05-17 08:45:26'),
(9, 84, '2020-05-17 08:45:28'),
(1, 85, '2020-05-17 08:50:49'),
(3, 85, '2020-05-17 08:50:50'),
(7, 85, '2020-05-17 08:51:17'),
(4, 85, '2020-05-17 08:51:27'),
(10, 85, '2020-05-17 08:51:30'),
(5, 85, '2020-05-17 08:53:37'),
(2, 85, '2020-05-17 08:53:39'),
(9, 85, '2020-05-17 08:53:42'),
(1, 86, '2020-05-17 08:54:12'),
(3, 86, '2020-05-17 08:54:13'),
(9, 86, '2020-05-17 08:54:15'),
(1, 87, '2020-05-17 08:56:51'),
(3, 87, '2020-05-17 08:58:08'),
(9, 87, '2020-05-17 09:07:58'),
(3, 88, '2020-05-18 00:39:54'),
(4, 88, '2020-05-18 00:40:05'),
(3, 89, '2020-05-18 01:06:25'),
(4, 89, '2020-05-18 01:06:35'),
(10, 89, '2020-05-18 01:06:38'),
(2, 89, '2020-05-18 01:06:40'),
(6, 89, '2020-05-18 01:06:42'),
(7, 89, '2020-05-18 01:06:44'),
(3, 90, '2020-05-18 01:06:57'),
(4, 90, '2020-05-18 01:06:59'),
(2, 90, '2020-05-18 01:07:01'),
(10, 90, '2020-05-18 01:07:02'),
(9, 90, '2020-05-18 01:07:03'),
(1, 90, '2020-05-18 01:07:04'),
(5, 90, '2020-05-18 01:07:07'),
(3, 79, '2020-05-18 01:52:08'),
(4, 79, '2020-05-18 01:52:15'),
(9, 79, '2020-05-18 01:52:15'),
(1, 79, '2020-05-18 01:52:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `constraint_articles_product_fk` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category` (`name`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `constraint_collections_category_fk` (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `freshness` (`created_at`),
  ADD KEY `constraint_comments_product_fk` (`product_id`),
  ADD KEY `constraint_comments_user_fk` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `name` (`name`),
  ADD KEY `freshness` (`created_at`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`name`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `freshness` (`created_at`),
  ADD KEY `constraint_votes_user_fk` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `constraint_articles_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `constraint_collections_category_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_collections_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `constraint_comments_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_comments_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `constraint_votes_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_votes_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

