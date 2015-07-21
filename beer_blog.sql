-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2015 at 01:43 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `beer_blog`
--
CREATE DATABASE IF NOT EXISTS `beer_blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `beer_blog`;

-- --------------------------------------------------------

--
-- Table structure for table `beers`
--

CREATE TABLE IF NOT EXISTS `beers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `style_id` int(11) NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `brewery_id` int(11) NOT NULL,
  `photo_url` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `beers`
--

INSERT INTO `beers` (`id`, `name`, `style_id`, `description`, `rating`, `brewery_id`, `photo_url`, `created_at`) VALUES
(1, 'beer1', 2, 'Proin ut quam urna. Ut odio erat, pharetra nec placerat aliquam, viverra nec lectus. Phasellus nunc erat, accumsan in lorem sit amet, condimentum cursus quam. Etiam placerat sodales aliquam. Vestibulum molestie varius purus, vel porta nulla sodales sit amet. Donec id risus non sapien ornare tempus. Nunc posuere sem sapien. Quisque dapibus commodo odio sit amet interdum. Nam eu scelerisque purus. Donec porttitor, nunc sed fringilla euismod, leo ligula sollicitudin ex, quis vulputate lectus turpis sed ex.\r\n', 1, 3, 'WP_004.jpg', '2015-06-24 17:36:20'),
(2, 'beerbeer', 1, 'Nam dictum quam et lectus viverra, nec vehicula augue pellentesque. Aliquam porta imperdiet elit at vehicula. Sed tortor urna, imperdiet eget nisi ac, semper pellentesque ante. Ut sodales metus eros, non feugiat ante fringilla placerat. Mauris pulvinar tempor nibh, in porttitor augue consequat sed. Nunc varius, enim eget rhoncus finibus, erat risus lobortis massa, vel sodales mi mauris vel dui. Mauris ullamcorper sem sed orci rutrum, sit amet commodo ante laoreet. Sed nisi nulla, efficitur sit amet convallis vitae, dapibus sit amet dolor. Mauris accumsan felis vitae nisl tristique, at tincidunt nunc feugiat.\r\n', 3, 1, 'WP_003.jpg', '2015-06-25 10:49:40'),
(4, 'new new', 2, 'Etiam ac turpis vel magna vehicula fringilla. Donec vitae eleifend turpis, nec facilisis mauris. Fusce sed feugiat tortor, non pharetra sem. Sed pretium est in dui tempor, a rutrum dui volutpat. Praesent ornare elit et neque congue mollis. Proin hendrerit felis mollis tincidunt convallis. Duis id eros nisi. Quisque fermentum massa orci, sed efficitur nibh placerat viverra. Nunc placerat mi metus, nec luctus lectus faucibus a. Praesent semper odio vulputate suscipit efficitur. Integer fringilla porta nibh, a finibus nibh mollis vel. Integer pellentesque vestibulum eros laoreet aliquet. Aenean felis nibh, porttitor eu velit ac, varius ornare metus.\r\n', 4, 1, 'WP_002.jpg', '2015-06-25 12:35:38'),
(6, 'new with photo', 1, 'In hac habitasse platea dictumst. Pellentesque nibh dolor, fringilla at tellus in, porta semper lectus. Ut suscipit orci nec ultrices aliquam. Vivamus lectus neque, rhoncus sed fermentum vitae, hendrerit et elit. Nulla eget arcu eros. Donec interdum sem ut porta fermentum. In sed massa eu eros pretium dictum eget condimentum felis. Mauris a aliquam purus, vitae pellentesque diam.', 3, 1, 'WP_001.jpg', '2015-07-15 12:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `breweries`
--

CREATE TABLE IF NOT EXISTS `breweries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `breweries`
--

INSERT INTO `breweries` (`id`, `name`, `created_at`) VALUES
(1, 'brewery 1', '2015-06-24 18:46:10'),
(3, 'brewery 2', '2015-06-24 22:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `name`) VALUES
(1, 0, 'menu'),
(2, 1, 'category1'),
(3, 1, 'category2'),
(4, 2, 'item1'),
(5, 2, 'item2'),
(6, 3, 'item1'),
(7, 3, 'item2');

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE IF NOT EXISTS `styles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'style style', 'desc desc							', '2015-06-24 18:45:52'),
(2, 'new style', 'update desc', '2015-06-25 09:36:56'),
(3, 'st', 'ds', '2015-06-29 09:46:45'),
(4, 'new row', 'kjh', '2015-07-15 13:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `admin` tinyint(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `admin`, `created_at`) VALUES
(1, 'B', 'K', 'admin@example.com', '1234', 1, '2015-06-25 15:03:25'),
(2, 'Asd', 'Zxc', 'mail@mail.com', '1234', 0, '2015-06-25 15:03:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beers`
--
ALTER TABLE `beers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breweries`
--
ALTER TABLE `breweries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beers`
--
ALTER TABLE `beers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `breweries`
--
ALTER TABLE `breweries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
