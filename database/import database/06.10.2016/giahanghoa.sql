-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2016 at 04:38 AM
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
-- Table structure for table `giahanghoa`
--

CREATE TABLE IF NOT EXISTS `giahanghoa` (
  `id` int(10) unsigned NOT NULL,
  `mahh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masopnhom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maloaihh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maloaigia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thitruong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thoigian` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mathoidiem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `giatu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `giaden` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguontin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giahanghoa`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giahanghoa`
--
ALTER TABLE `giahanghoa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giahanghoa`
--
ALTER TABLE `giahanghoa`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
