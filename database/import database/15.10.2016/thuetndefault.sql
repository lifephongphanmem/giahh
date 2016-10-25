-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2016 at 11:01 AM
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
-- Table structure for table `thuetndefault`
--

CREATE TABLE IF NOT EXISTS `thuetndefault` (
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
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=453 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thuetndefault`
--

INSERT INTO `thuetndefault` (`id`, `mahh`, `masopnhom`, `maloaihh`, `maloaigia`, `thitruong`, `thoigian`, `mathoidiem`, `giatu`, `giaden`, `soluong`, `nguontin`, `gc`, `mahs`, `mahuyen`, `created_at`, `updated_at`) VALUES
(438, '1467856579.1476692744', '02.01', '', '', '', '', '', '80000', '90000', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '2016-10-24 04:04:26'),
(439, '1467856579.1476692809', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(440, '1467856579.1476692851', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(441, '1467856579.1476692881', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(442, '1467856579.1476692893', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(443, '1467856579.1476692908', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(444, '1467856579.1476692935', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(445, '1467856579.1476692955', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(446, '1467856579.1476692976', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(447, '1467856579.1476692990', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(448, '1467856579.1476692999', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(449, '1467856579.1476693017', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(450, '1467856579.1476693028', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(451, '1467856579.1476693038', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(452, '1467856579.1476693054', '02.01', '', '', '', '', '', '0', '0', '1', '', '', '', '1473049351', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thuetndefault`
--
ALTER TABLE `thuetndefault`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thuetndefault`
--
ALTER TABLE `thuetndefault`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=453;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
