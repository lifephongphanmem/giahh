-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2016 at 11:00 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giahh_local`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhomthuetn`
--

CREATE TABLE IF NOT EXISTS `nhomthuetn` (
  `id` int(10) unsigned NOT NULL,
  `manhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sapxep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhomthuetn`
--

INSERT INTO `nhomthuetn` (`id`, `manhom`, `tennhom`, `sapxep`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, '01', 'Thuế tài nguyên do TW quy định', '1', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '02', 'Thuế tài nguyên do địa phương quy định', '2', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nhomthuetn`
--
ALTER TABLE `nhomthuetn`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nhomthuetn`
--
ALTER TABLE `nhomthuetn`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
