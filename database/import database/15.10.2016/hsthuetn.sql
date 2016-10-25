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
-- Table structure for table `hsthuetn`
--

CREATE TABLE IF NOT EXISTS `hsthuetn` (
  `id` int(10) unsigned NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mathoidiem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thitruong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgnhap` date NOT NULL,
  `maloaigia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maloaihh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phanloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hsthuetn`
--

INSERT INTO `hsthuetn` (`id`, `mahs`, `mathoidiem`, `thitruong`, `tgnhap`, `maloaigia`, `maloaihh`, `phanloai`, `nam`, `thang`, `quy`, `mahuyen`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, '1476781248', '1476412943', '', '2016-10-01', '', '', 'TW', '2016', '10', '4', '1473049351', '', '2016-10-18 09:00:48', '2016-10-18 09:00:48'),
(2, '1477041561', '1476412963', '', '2016-10-01', '', '', 'TW', '2016', '10', '4', '1473049351', '', '2016-10-21 09:19:21', '2016-10-21 09:19:21'),
(3, '1477281884', '1476412943', '', '2016-10-24', '', '', 'DP', '2016', '10', '4', '1473049351', '', '2016-10-24 04:04:44', '2016-10-24 04:04:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hsthuetn`
--
ALTER TABLE `hsthuetn`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hsthuetn`
--
ALTER TABLE `hsthuetn`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
