-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2016 at 04:27 AM
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
-- Table structure for table `dmhanghoa`
--

CREATE TABLE IF NOT EXISTS `dmhanghoa` (
  `id` int(10) unsigned NOT NULL,
  `masopnhom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mahh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dacdiemkt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nsx` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thoidiem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sapxep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmhanghoa`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dmhanghoa`
--
ALTER TABLE `dmhanghoa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dmhanghoa`
--
ALTER TABLE `dmhanghoa`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
