-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2014 at 03:01 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel`
--
CREATE DATABASE IF NOT EXISTS `laravel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laravel`;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_05_08_141544_create_users_table', 1),
('2014_05_08_141930_create_users_table', 2),
('2014_05_09_104750_create_user2_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `created_at`, `updated_at`, `is_active`, `remember_token`) VALUES
(1, 'wasim', 'mughal', 'to.wazim@gmail.com', '$2y$10$ZLtMesEoSDItgxRBavK.A.krCmVBHdg1YRVKnzQ52S8Go.geKzOEu', '2014-05-08 12:48:30', '2014-05-12 07:24:33', 1, 'WPzjF9sYWu7rzRwuz515XZVlRyhiwCaIZo1y5y6VgYw1w6WSql6k1NrilRJa'),
(2, 'hafiz', 'kamran', 'hfzkamran@gmail.com', '$2y$10$z/GHjg/pHLNj/w/3bySlWu8kWK5472/VT/DnADo32JDbx8.JOq89G', '2014-05-09 07:09:20', '2014-05-09 11:59:47', 0, 'fIROCQrYlHNJ2KTfldjXMIigj2F55SE1bcU2qpW3XX2guLexpxf5It1LZ0nY'),
(3, 'jamil', 'ahmad', 'jamil.ahmad@gmail.com', '$2y$10$P7/OGfHTpJTlWvGZE7MqteXT0c3YXbpKhGEZJBuLj6KnnfWqtaJoC', '2014-05-09 07:10:49', '2014-05-09 12:35:40', 1, ''),
(5, 'waqas', 'alias', 'waqasali@gmail.com', '$2y$10$GLlnlfkBfbD.PR8fmxTbs.sj4B45k1q24SLJzUxxmCxmHRp2f4HTu', '2014-05-09 11:40:29', '2014-05-09 12:35:34', 0, 'q0uYvyWBqO4xLApiW6e4EYSQqfPlXAGCZViyUT0mKKwgN5rzs7dizmQKm1H4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
