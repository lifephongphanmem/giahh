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
-- Table structure for table `pnhomthuetn`
--

CREATE TABLE IF NOT EXISTS `pnhomthuetn` (
  `id` int(10) unsigned NOT NULL,
  `manhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mapnhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `masopnhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tenpnhom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anhien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sapxep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pnhomthuetn`
--

INSERT INTO `pnhomthuetn` (`id`, `manhom`, `mapnhom`, `masopnhom`, `tenpnhom`, `anhien`, `sapxep`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, '01', '01', '01.01', 'Khoáng sản kim loại', '', '1', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '01', '02', '01.02', 'Khoáng sản không kim loại', '', '2', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '01', '03', '01.03', 'Sản phẩm của rừng tự nhiên', '', '3', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '01', '04', '01.04', 'Hải sản tự nhiên', '', '4', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '01', '05', '01.05', 'Nước thiên nhiên', '', '5', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '01', '06', '01.06', 'Yến sào thiên nhiên', '', '6', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '01', '07', '01.07', 'Tài nguyên khác', '', '7', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '02', '01', '02.01', 'Tài nguyên địa phương quy định', '', '8', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pnhomthuetn`
--
ALTER TABLE `pnhomthuetn`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pnhomthuetn`
--
ALTER TABLE `pnhomthuetn`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
