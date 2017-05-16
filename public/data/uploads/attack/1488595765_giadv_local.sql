-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 09:24 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giadv_local`
--

-- --------------------------------------------------------

--
-- Table structure for table `cbkkdvvtkhac`
--

CREATE TABLE `cbkkdvvtkhac` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbkkdvvtxb`
--

CREATE TABLE `cbkkdvvtxb` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbkkdvvtxk`
--

CREATE TABLE `cbkkdvvtxk` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbkkdvvtxtx`
--

CREATE TABLE `cbkkdvvtxtx` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbkkgdvlt`
--

CREATE TABLE `cbkkgdvlt` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaycvlk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idkk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cbkkgdvlt`
--

INSERT INTO `cbkkgdvlt` (`id`, `mahs`, `macskd`, `masothue`, `ngaynhap`, `socv`, `socvlk`, `ngaycvlk`, `ngayhieuluc`, `ttnguoinop`, `ngaynhan`, `sohsnhan`, `ghichu`, `ngaychuyen`, `lydo`, `trangthai`, `idkk`, `created_at`, `updated_at`) VALUES
(1, '1487231916', '01020276_1486954227', '01020276', '2017-02-16', '003/CVTDGKK', '002/CVTDGKK', '2016-11-27', '2017-02-28', 'MinhTran-0123150988-minhtranlife@gmail.com', '2017-02-17', '1', '', '2017-02-16 15:23:35', NULL, 'Đang công bố', '2', '2017-02-17 03:10:41', '2017-02-17 03:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `cskddvlt`
--

CREATE TABLE `cskddvlt` (
  `id` int(10) UNSIGNED NOT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tencskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaihang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachikd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `toado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cqcq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cskddvlt`
--

INSERT INTO `cskddvlt` (`id`, `macskd`, `masothue`, `tencskd`, `loaihang`, `diachikd`, `telkd`, `toado`, `link`, `cqcq`, `created_at`, `updated_at`) VALUES
(2, '01020276_1486954227', '01020276', 'Khách sạn Cuộc Sống', '3', 'Liên Ninh- Thanh Trì- Hà Nội', '09876543211', '20.9061376,105.8495796', '', '07654321', '2017-02-13 02:50:27', '2017-02-13 02:50:27'),
(4, '01020276_1487738354', '01020276', 'Khách sạn Minh Châu', '3', 'Thanh Trì - Hà Nội', '0543', '20.9344418,105.8462288', '', '07654321', '2017-02-22 04:39:15', '2017-02-22 04:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `dmdvql`
--

CREATE TABLE `dmdvql` (
  `id` int(10) UNSIGNED NOT NULL,
  `maqhns` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plql` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sohsnhan` text COLLATE utf8_unicode_ci NOT NULL,
  `ttlh` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmdvql`
--

INSERT INTO `dmdvql` (`id`, `maqhns`, `tendv`, `plql`, `diachi`, `level`, `username`, `password`, `sohsnhan`, `ttlh`, `created_at`, `updated_at`) VALUES
(4, '07654321', 'Sở Tài Chính Khánh Hòa', 'TC', 'Thành Phố Nha Trang - Tỉnh Khánh Hòa', 'T', 'stckhanhhoa', 'e10adc3949ba59abbe56e057f20f883e', '2', 'Sở Tài Chính: 058.3822072 (Phòng Thanh Tra) - 058.3826741 (Phòng Vật giá)\r\nSở Văn Hóa, Thể thao và Du lịch: 058.3826741 (Phòng Thanh Tra)\r\nCục Thuế tỉnh Khánh Hòa: 0583824332', '2017-02-10 03:08:36', '2017-02-17 08:28:12'),
(5, '1234567890', 'Sở Giao Thông Vận Tải Khánh Hòa', 'VT', 'Thành Phố Nha Trang - Tỉnh Khánh Hòa', 'T', 'sgtvtkhanhhoa', 'e10adc3949ba59abbe56e057f20f883e', '5', 'Sở Tài Chính: 058.3822072 (Phòng Thanh Tra) - 058.3826741 (Phòng Vật giá)\r\nSở Văn Hóa, Thể thao và Du lịch: 058.3826741 (Phòng Thanh Tra)\r\nCục Thuế tỉnh Khánh Hòa: 0583824332', '2017-02-10 03:16:02', '2017-02-17 02:44:17'),
(7, '021721932943', 'Phòng Tài Chính Huyện Cam Ranh', 'TC', 'Huyện Cam Ranh Tỉnh Khánh Hòa', 'H', 'ptccamranh', 'e10adc3949ba59abbe56e057f20f883e', '0', '', '2017-02-20 02:52:54', '2017-02-20 02:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `dmdvvtkhac`
--

CREATE TABLE `dmdvvtkhac` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmdvvtxb`
--

CREATE TABLE `dmdvvtxb` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtluot` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtthang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmdvvtxk`
--

CREATE TABLE `dmdvvtxk` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmdvvtxtx`
--

CREATE TABLE `dmdvvtxtx` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dndvlt`
--

CREATE TABLE `dndvlt` (
  `id` int(10) UNSIGNED NOT NULL,
  `tendn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachidn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teldn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faxdn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidknopthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giayphepkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucdanhky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoiky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tailieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cqcq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dndvlt`
--

INSERT INTO `dndvlt` (`id`, `tendn`, `masothue`, `diachidn`, `teldn`, `faxdn`, `email`, `noidknopthue`, `giayphepkd`, `chucdanhky`, `nguoiky`, `diadanh`, `trangthai`, `tailieu`, `cqcq`, `created_at`, `updated_at`) VALUES
(4, 'Công ty phát triển phần mềm Cuộc Sống', '01020276', 'Liên Ninh- Thanh Trì- Hà Nội', '0987654321', 'Liên Ninh- Thanh Trì- Hà Nội', 'phanmemcuocsong@gmail.com', 'Cục Thuế Huyện Thanh Trì', '123456789', 'Giám đốc', 'Nguyễn Thị Minh Tuyết', 'Hà Nội', 'Kích hoạt', 'a', '07654321', '2017-02-10 08:00:08', '2017-02-16 01:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `donvidvvt`
--

CREATE TABLE `donvidvvt` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendonvi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dienthoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giayphepkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucdanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoiky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dknopthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `setting` text COLLATE utf8_unicode_ci NOT NULL,
  `dvxk` tinyint(1) NOT NULL,
  `dvxb` tinyint(1) NOT NULL,
  `dvxtx` tinyint(1) NOT NULL,
  `dvk` tinyint(1) NOT NULL,
  `toado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tailieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cqcq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donvidvvt`
--

INSERT INTO `donvidvvt` (`id`, `masothue`, `tendonvi`, `diachi`, `dienthoai`, `giayphepkd`, `fax`, `email`, `diadanh`, `chucdanh`, `nguoiky`, `dknopthue`, `setting`, `dvxk`, `dvxb`, `dvxtx`, `dvk`, `toado`, `ghichu`, `trangthai`, `tailieu`, `link`, `cqcq`, `created_at`, `updated_at`) VALUES
(2, '150988280613', 'Công ty TNHH thiết bị giáo dục Minh Châu', NULL, NULL, '076612121', NULL, 'minhtranlife', NULL, NULL, NULL, 'Hà Nội', '{"dvvt":{"vtxk":"1","vtxb":"1","vtxtx":"1","vtch":"1"}}', 1, 1, 1, 1, '21.0277644,105.8341598', NULL, 'Kích hoạt', 'ssadá', NULL, '1234567890', '2017-02-10 08:36:21', '2017-02-10 08:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `general-configs`
--

CREATE TABLE `general-configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `maqhns` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendonvilt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendonvivt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teldv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thutruong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ketoan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoilapbieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namhethong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttlhlt` text COLLATE utf8_unicode_ci,
  `ttlhvt` text COLLATE utf8_unicode_ci,
  `sodvlt` text COLLATE utf8_unicode_ci,
  `sodvvt` text COLLATE utf8_unicode_ci,
  `setting` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general-configs`
--

INSERT INTO `general-configs` (`id`, `maqhns`, `tendonvilt`, `tendonvivt`, `diachi`, `teldv`, `thutruong`, `ketoan`, `nguoilapbieu`, `namhethong`, `ttlhlt`, `ttlhvt`, `sodvlt`, `sodvvt`, `setting`, `created_at`, `updated_at`) VALUES
(1, '0987654321', 'Sở Tài Chính Khánh Hòa', 'Sở Giao Thông Vận Tải Khánh Hòa', 'T14- Liên Ninh- Thanh Trì- Hà Nội', '0987654321', 'Nguyễn Thị Minh Tuyết', 'Nguyễn Thị Mỹ Hạnh', 'Nguyễn Thị Mỹ Hường', '2016', 'b', 'a', '1', '1', '{"dvlt":{"dvlt":"1"},"dvvt":{"vtxk":"1","vtxb":"1","vtxtx":"1","vtch":"1"}}', NULL, '2017-01-18 02:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtkhac`
--

CREATE TABLE `kkdvvtkhac` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtkhacct`
--

CREATE TABLE `kkdvvtkhacct` (
  `id` int(10) UNSIGNED NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` double DEFAULT NULL,
  `giakklk` double DEFAULT NULL,
  `giahl` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtkhacctdf`
--

CREATE TABLE `kkdvvtkhacctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` double DEFAULT NULL,
  `giakklk` double DEFAULT NULL,
  `giahl` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxb`
--

CREATE TABLE `kkdvvtxb` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxbct`
--

CREATE TABLE `kkdvvtxbct` (
  `id` int(10) UNSIGNED NOT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtluot` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtthang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakkluot` double DEFAULT NULL,
  `giakklkluot` double DEFAULT NULL,
  `giakkthang` double DEFAULT NULL,
  `giakklkthang` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxbctdf`
--

CREATE TABLE `kkdvvtxbctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtluot` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtthang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakkluot` double DEFAULT NULL,
  `giakklkluot` double DEFAULT NULL,
  `giakkthang` double DEFAULT NULL,
  `giakklkthang` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxk`
--

CREATE TABLE `kkdvvtxk` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxkct`
--

CREATE TABLE `kkdvvtxkct` (
  `id` int(10) UNSIGNED NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` double DEFAULT NULL,
  `giakklk` double DEFAULT NULL,
  `giahl` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxkctdf`
--

CREATE TABLE `kkdvvtxkctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` double DEFAULT NULL,
  `giakklk` double DEFAULT NULL,
  `giahl` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxtx`
--

CREATE TABLE `kkdvvtxtx` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxtxct`
--

CREATE TABLE `kkdvvtxtxct` (
  `id` int(10) UNSIGNED NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` double DEFAULT NULL,
  `giakklk` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxtxctdf`
--

CREATE TABLE `kkdvvtxtxctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` double DEFAULT NULL,
  `giakklk` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgdvlt`
--

CREATE TABLE `kkgdvlt` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaycvlk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cqcq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kkgdvlt`
--

INSERT INTO `kkgdvlt` (`id`, `mahs`, `macskd`, `masothue`, `ngaynhap`, `socv`, `socvlk`, `ngaycvlk`, `ngayhieuluc`, `ttnguoinop`, `ngaynhan`, `sohsnhan`, `ghichu`, `ngaychuyen`, `lydo`, `trangthai`, `cqcq`, `dvt`, `created_at`, `updated_at`) VALUES
(2, '1487231916', '01020276_1486954227', '01020276', '2017-02-16', '003/CVTDGKK', '002/CVTDGKK', '2016-11-27', '2017-02-28', 'MinhTran-0123150988-minhtranlife@gmail.com', '2017-02-17', '1', '', '2017-02-16 15:23:35', NULL, 'Duyệt', '07654321', 'Đồng/phòng/tuần', '2017-02-16 07:58:36', '2017-02-17 03:10:41'),
(3, '1487748950', '01020276_1486954227', '01020276', '2017-02-22', '0010010', '003/CVTDGKK', '2017-02-16', '2017-02-22', NULL, NULL, NULL, '', NULL, NULL, 'Chờ chuyển', '07654321', 'Đồng/phòng/ngày đêm', '2017-02-22 07:35:50', '2017-02-22 07:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `kkgdvltct`
--

CREATE TABLE `kkgdvltct` (
  `id` int(10) UNSIGNED NOT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maloaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `sohieu` text COLLATE utf8_unicode_ci,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgiakk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kkgdvltct`
--

INSERT INTO `kkgdvltct` (`id`, `macskd`, `mahs`, `maloaip`, `loaip`, `qccl`, `sohieu`, `ghichu`, `mucgialk`, `mucgiakk`, `created_at`, `updated_at`) VALUES
(1, '097654321_1482829108', '1482829220', '1482829109', 'Loại 1', '09876', '-0987654', '0987', '0', '500000', '2016-12-27 09:00:20', '2016-12-27 09:00:20'),
(2, '097654321_1482829108', '1482829220', '1482829109', 'sdsadsa', '', 'sđâ', '', '0', '459999', '2016-12-27 09:00:20', '2016-12-27 09:00:20'),
(3, '01020276_1486954227', '1487231916', '1486954228', 'Loại 1', 'Có nóng lanh, điều hòa, tivi 32inch, truyền hình vệ tinh', '101, 102, 103, 104, 105, 106', '', '500000', '600000', '2017-02-16 07:58:37', '2017-02-16 07:58:37'),
(4, '01020276_1486954227', '1487231916', '1486954228', 'Loại 2', 'Có nóng lạnh, tivi 21ich, truyền hình mặt đất', '202, 203, 204, 205', '', '450000', '500000', '2017-02-16 07:58:37', '2017-02-16 07:58:37'),
(5, '01020276_1486954227', '1487748950', '1486954228', 'Loại 1', 'Có nóng lanh, điều hòa, tivi 32inch, truyền hình vệ tinh', '101, 102, 103, 104, 105, 106', '', '500000', NULL, '2017-02-22 07:35:50', '2017-02-22 07:35:50'),
(6, '01020276_1486954227', '1487748950', '1486954228', 'Loại 2', 'Có nóng lạnh, tivi 21ich, truyền hình mặt đất', '202, 203, 204, 205', '', '500000', NULL, '2017-02-22 07:35:50', '2017-02-22 07:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `kkgdvltctdf`
--

CREATE TABLE `kkgdvltctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maloaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `sohieu` text COLLATE utf8_unicode_ci,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgiakk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kkgdvltctdf`
--

INSERT INTO `kkgdvltctdf` (`id`, `macskd`, `maloaip`, `loaip`, `qccl`, `sohieu`, `ghichu`, `mucgialk`, `mucgiakk`, `created_at`, `updated_at`) VALUES
(12, '097654321_1482829108', '1482829109', 'Loại 1', '09876', '-0987654', '0987', NULL, NULL, '2017-02-16 07:21:31', '2017-02-16 07:21:31'),
(13, '097654321_1482829108', '1482829109', 'sdsadsa', '', 'sđâ', '', NULL, NULL, '2017-02-16 07:21:31', '2017-02-16 07:21:31'),
(14, '097654321_1482829108', '1482913232', 'L2', '', '', '', NULL, NULL, '2017-02-16 07:21:31', '2017-02-16 07:21:31'),
(239, '01020276_1487738354', '1487738355', 'L1', 'NL', '', '', NULL, NULL, '2017-02-22 06:56:19', '2017-02-22 06:56:19'),
(240, '01020276_1487738354', '1487738355', 'L2', 'TH', '', '', NULL, NULL, '2017-02-22 06:56:19', '2017-02-22 06:56:19'),
(241, '01020276_1487738354', '1487738487', 'L3', 'DH', '', '', NULL, NULL, '2017-02-22 06:56:19', '2017-02-22 06:56:19'),
(256, '01020276_1486954227', '1486954228', 'Loại 1', 'Có nóng lanh, điều hòa, tivi 32inch, truyền hình vệ tinh', '101, 102, 103, 104, 105, 106', '', '500000', NULL, '2017-02-22 08:17:32', '2017-02-22 08:17:32'),
(257, '01020276_1486954227', '1486954228', 'Loại 2', 'Có nóng lạnh, tivi 21ich, truyền hình mặt đất', '202, 203, 204, 205', '', '500000', NULL, '2017-02-22 08:17:32', '2017-02-22 08:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_05_12_084832_create_dmdvvtxk_table', 1),
(3, '2016_05_12_084851_create_kkdvvtxk_table', 1),
(4, '2016_05_12_084900_create_kkdvvtxkct_table', 1),
(5, '2016_05_12_101616_create_dmdvvtxb_table', 1),
(6, '2016_05_12_101629_create_kkdvvtxb_table', 1),
(7, '2016_05_12_101638_create_kkdvvtxbct_table', 1),
(8, '2016_05_12_102628_create_dmdvvtxtx_table', 1),
(9, '2016_05_12_102651_create_kkdvvtxtx_table', 1),
(10, '2016_05_12_102701_create_kkdvvtxtxct_table', 1),
(11, '2016_05_12_104427_create_dmdvvtkhac_table', 1),
(12, '2016_05_12_104445_create_kkdvvtkhac_table', 1),
(13, '2016_05_12_104453_create_kkdvvtkhacct_table', 1),
(14, '2016_05_19_155134_create_kkdvvtxkctdf_table', 1),
(15, '2016_05_19_155151_create_kkdvvtxbctdf_table', 1),
(16, '2016_05_19_155213_create_kkdvvtxtxctdf_table', 1),
(17, '2016_05_19_155230_create_kkdvvtkhacctdf_table', 1),
(18, '2016_05_20_081755_create_cbkkdvvtxk_table', 1),
(19, '2016_05_20_081807_create_cbkkdvvtxb_table', 1),
(20, '2016_05_20_081819_create_cbkkdvvtxtx_table', 1),
(21, '2016_05_20_081831_create_cbkkdvvtkhac_table', 1),
(22, '2016_07_02_100830_create_pagdvvtxk_table', 1),
(23, '2016_07_02_101030_create_pagdvvtxb_table', 1),
(24, '2016_07_02_101055_create_pagdvvtxtx_table', 1),
(25, '2016_07_02_101116_create_pagdvvtkhac_table', 1),
(26, '2016_07_02_101408_create_pagdvvtkhac_temp_table', 1),
(27, '2016_07_02_101433_create_pagdvvtxb_temp_table', 1),
(28, '2016_07_02_101445_create_pagdvvtxk_temp_table', 1),
(29, '2016_07_02_101514_create_pagdvvtxtx_temp_table', 1),
(30, '2016_10_14_013710_create_dndvlt_table', 1),
(31, '2016_10_14_022915_create_general-configs_table', 1),
(32, '2016_10_18_014826_create_donvidvvt_table', 1),
(33, '2016_10_20_074005_create_cskddvlt_table', 1),
(34, '2016_10_20_082824_create_ttphong_table', 1),
(35, '2016_10_21_023223_create_ttcskddvlt_table', 1),
(36, '2016_10_21_073706_create_kkgdvlt_table', 1),
(37, '2016_10_21_083946_create_kkgdvltct_table', 1),
(38, '2016_10_21_084015_create_kkgdvltctdf_table', 1),
(39, '2016_10_22_025029_create_cbkkgdvlt_table', 1),
(40, '2016_11_03_092746_create_register_table', 1),
(41, '2016_12_12_110413_create_ttdn_table', 1),
(42, '2017_01_18_143042_create_dmdvql_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pagdvvtkhac`
--

CREATE TABLE `pagdvvtkhac` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanluong` double NOT NULL DEFAULT '0',
  `cpnguyenlieutt` double NOT NULL DEFAULT '0',
  `cpcongnhantt` double NOT NULL DEFAULT '0',
  `cpkhauhaott` double NOT NULL DEFAULT '0',
  `cpsanxuatdt` double NOT NULL DEFAULT '0',
  `cpsanxuatc` double NOT NULL DEFAULT '0',
  `cptaichinh` double NOT NULL DEFAULT '0',
  `cpbanhang` double NOT NULL DEFAULT '0',
  `cpquanly` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagdvvtkhac_temp`
--

CREATE TABLE `pagdvvtkhac_temp` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanluong` double NOT NULL DEFAULT '0',
  `cpnguyenlieutt` double NOT NULL DEFAULT '0',
  `cpcongnhantt` double NOT NULL DEFAULT '0',
  `cpkhauhaott` double NOT NULL DEFAULT '0',
  `cpsanxuatdt` double NOT NULL DEFAULT '0',
  `cpsanxuatc` double NOT NULL DEFAULT '0',
  `cptaichinh` double NOT NULL DEFAULT '0',
  `cpbanhang` double NOT NULL DEFAULT '0',
  `cpquanly` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagdvvtxb`
--

CREATE TABLE `pagdvvtxb` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanluong` double NOT NULL DEFAULT '0',
  `cpnguyenlieutt` double NOT NULL DEFAULT '0',
  `cpcongnhantt` double NOT NULL DEFAULT '0',
  `cpkhauhaott` double NOT NULL DEFAULT '0',
  `cpsanxuatdt` double NOT NULL DEFAULT '0',
  `cpsanxuatc` double NOT NULL DEFAULT '0',
  `cptaichinh` double NOT NULL DEFAULT '0',
  `cpbanhang` double NOT NULL DEFAULT '0',
  `cpquanly` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagdvvtxb_temp`
--

CREATE TABLE `pagdvvtxb_temp` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanluong` double NOT NULL DEFAULT '0',
  `cpnguyenlieutt` double NOT NULL DEFAULT '0',
  `cpcongnhantt` double NOT NULL DEFAULT '0',
  `cpkhauhaott` double NOT NULL DEFAULT '0',
  `cpsanxuatdt` double NOT NULL DEFAULT '0',
  `cpsanxuatc` double NOT NULL DEFAULT '0',
  `cptaichinh` double NOT NULL DEFAULT '0',
  `cpbanhang` double NOT NULL DEFAULT '0',
  `cpquanly` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagdvvtxk`
--

CREATE TABLE `pagdvvtxk` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanluong` double NOT NULL DEFAULT '0',
  `cpnguyenlieutt` double NOT NULL DEFAULT '0',
  `cpcongnhantt` double NOT NULL DEFAULT '0',
  `cpkhauhaott` double NOT NULL DEFAULT '0',
  `cpsanxuatdt` double NOT NULL DEFAULT '0',
  `cpsanxuatc` double NOT NULL DEFAULT '0',
  `cptaichinh` double NOT NULL DEFAULT '0',
  `cpbanhang` double NOT NULL DEFAULT '0',
  `cpquanly` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagdvvtxk_temp`
--

CREATE TABLE `pagdvvtxk_temp` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanluong` double NOT NULL DEFAULT '0',
  `cpnguyenlieutt` double NOT NULL DEFAULT '0',
  `cpcongnhantt` double NOT NULL DEFAULT '0',
  `cpkhauhaott` double NOT NULL DEFAULT '0',
  `cpsanxuatdt` double NOT NULL DEFAULT '0',
  `cpsanxuatc` double NOT NULL DEFAULT '0',
  `cptaichinh` double NOT NULL DEFAULT '0',
  `cpbanhang` double NOT NULL DEFAULT '0',
  `cpquanly` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagdvvtxtx`
--

CREATE TABLE `pagdvvtxtx` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanluong` double NOT NULL DEFAULT '0',
  `cpnguyenlieutt` double NOT NULL DEFAULT '0',
  `cpcongnhantt` double NOT NULL DEFAULT '0',
  `cpkhauhaott` double NOT NULL DEFAULT '0',
  `cpsanxuatdt` double NOT NULL DEFAULT '0',
  `cpsanxuatc` double NOT NULL DEFAULT '0',
  `cptaichinh` double NOT NULL DEFAULT '0',
  `cpbanhang` double NOT NULL DEFAULT '0',
  `cpquanly` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagdvvtxtx_temp`
--

CREATE TABLE `pagdvvtxtx_temp` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanluong` double NOT NULL DEFAULT '0',
  `cpnguyenlieutt` double NOT NULL DEFAULT '0',
  `cpcongnhantt` double NOT NULL DEFAULT '0',
  `cpkhauhaott` double NOT NULL DEFAULT '0',
  `cpsanxuatdt` double NOT NULL DEFAULT '0',
  `cpsanxuatc` double NOT NULL DEFAULT '0',
  `cptaichinh` double NOT NULL DEFAULT '0',
  `cpbanhang` double NOT NULL DEFAULT '0',
  `cpquanly` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucdanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoiky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidknopthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `setting` text COLLATE utf8_unicode_ci,
  `dvxk` tinyint(1) NOT NULL,
  `dvxb` tinyint(1) NOT NULL,
  `dvxtx` tinyint(1) NOT NULL,
  `dvk` tinyint(1) NOT NULL,
  `toado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tailieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giayphepkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci NOT NULL,
  `pl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cqcq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ttcskddvlt`
--

CREATE TABLE `ttcskddvlt` (
  `id` int(10) UNSIGNED NOT NULL,
  `maloaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `sohieu` text COLLATE utf8_unicode_ci,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ttcskddvlt`
--

INSERT INTO `ttcskddvlt` (`id`, `maloaip`, `loaip`, `qccl`, `sohieu`, `ghichu`, `macskd`, `created_at`, `updated_at`) VALUES
(4, '1486954228', 'Loại 1', 'Có nóng lanh, điều hòa, tivi 32inch, truyền hình vệ tinh', '101, 102, 103, 104, 105, 106', '', '01020276_1486954227', '2017-02-13 02:50:28', '2017-02-13 02:50:28'),
(5, '1486954228', 'Loại 2', 'Có nóng lạnh, tivi 21ich, truyền hình mặt đất', '202, 203, 204, 205', '', '01020276_1486954227', '2017-02-13 02:50:28', '2017-02-13 02:50:28'),
(6, '1487738355', 'L1', 'NL', '', '', '01020276_1487738354', '2017-02-22 04:39:15', '2017-02-22 04:41:34'),
(7, '1487738355', 'L2', 'TH', '', '', '01020276_1487738354', '2017-02-22 04:39:15', '2017-02-22 04:41:39'),
(8, '1487738487', 'L3', 'DH', '', '', '01020276_1487738354', '2017-02-22 04:41:27', '2017-02-22 04:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `ttdn`
--

CREATE TABLE `ttdn` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucdanhky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoiky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidknopthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giayphepkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tailieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `setting` text COLLATE utf8_unicode_ci,
  `dvxk` tinyint(1) NOT NULL,
  `dvxb` tinyint(1) NOT NULL,
  `dvxtx` tinyint(1) NOT NULL,
  `dvk` tinyint(1) NOT NULL,
  `toado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ttphong`
--

CREATE TABLE `ttphong` (
  `id` int(10) UNSIGNED NOT NULL,
  `maloaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `sohieu` text COLLATE utf8_unicode_ci,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cqcq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sadmin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` text COLLATE utf8_unicode_ci,
  `pldv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailxt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `phone`, `email`, `status`, `maxa`, `mahuyen`, `cqcq`, `level`, `sadmin`, `permission`, `pldv`, `emailxt`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Minh Trần', 'minhtran', '107e8cf7f2b4531f6b2ff06dbcf94e10', '01232150988', 'minhtranlife@gmail.com', 'Kích hoạt', NULL, NULL, NULL, 'T', 'ssa', '{"dvlt":{"index":"1","create":"1","edit":"1","delete":"1"},"kkdvlt":{"index":"1","create":"1","edit":"1","delete":"1","approve":"1"},"ttdndvlt":{"approve":"1"},"dvvtxk":{"index":"1","create":"1","edit":"1","delete":"1"},"kkdvvtxk":{"index":"1","create":"1","edit":"1","delete":"1","approve":"1"},"dvvtxb":{"index":"1","create":"1","edit":"1","delete":"1"},"kkdvvtxb":{"index":"1","create":"1","edit":"1","delete":"1"},"dvvtxtx":{"index":"1","create":"1","edit":"1","delete":"1"},"kkdvvtxtx":{"index":"1","create":"1","edit":"1","delete":"1","approve":"1"},"dvvtch":{"index":"1","create":"1","edit":"1","delete":"1"},"kkdvvtch":{"index":"1","create":"1","edit":"1","delete":"1","approve":"1"},"ttdndvvt":{"approve":"1"}}', NULL, 'minhtranlife@gmail.com', '1', 'cho', NULL, '2017-02-17 08:33:28'),
(9, 'Quản trị hệ thống Sở Tài Chính', 'qtsotaichinh', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'Kích hoạt', NULL, NULL, '07654321', 'T', 'satc', '', NULL, NULL, NULL, NULL, NULL, '2017-02-13 02:37:26'),
(12, 'Quản trị hệ thống Sở Giao Thông Vận Tải', 'qtsogiaothongvantai', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'Kích hoạt', NULL, NULL, '1234567890', 'T', 'savt', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Sở Tài Chính Khánh Hòa', 'stckhanhhoa', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'Kích hoạt', NULL, NULL, '07654321', 'T', NULL, '{"kkdvlt":{"index":"1","approve":"1"},"ttdndvlt":{"approve":"1"},"kkdvvtxk":{"index":"1"},"kkdvvtxb":{"index":"1"},"kkdvvtxtx":{"index":"1"},"kkdvvtch":{"index":"1"}}', NULL, NULL, NULL, NULL, '2017-02-10 03:08:36', '2017-02-10 03:09:48'),
(14, 'Sở Giao Thông Vận Tải Khánh Hòa', 'sgtvtkhanhhoa', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'Kích hoạt', NULL, NULL, '1234567890', 'T', NULL, '{"kkdvvtxk":{"index":"1","approve":"1"},"kkdvvtxb":{"index":"1","approve":"1"},"kkdvvtxtx":{"index":"1","approve":"1"},"kkdvvtch":{"index":"1","approve":"1"},"ttdndvvt":{"approve":"1"}}', NULL, NULL, NULL, NULL, '2017-02-10 03:16:02', '2017-02-10 03:16:52'),
(15, 'Công ty phát triển phần mềm Cuộc Sống', 'cuocsong', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'phanmemcuocsong@gmail.com', 'Kích hoạt', NULL, '01020276', '07654321', 'DVLT', NULL, NULL, NULL, NULL, NULL, NULL, '2017-02-10 08:00:08', '2017-02-10 08:00:08'),
(16, 'Công ty TNHH thiết bị giáo dục Minh Châu', 'minhchau', 'e10adc3949ba59abbe56e057f20f883e', '06532123456789', 'minhtranlife', 'Kích hoạt', NULL, '150988280613', '1234567890', 'DVVT', NULL, NULL, NULL, NULL, NULL, NULL, '2017-02-10 08:36:22', '2017-02-10 08:36:22'),
(17, 'Phòng Tài Chính Huyện Cam Ranh', 'ptccamranh', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'Kích hoạt', NULL, NULL, '021721932943', 'H', NULL, NULL, NULL, NULL, NULL, NULL, '2017-02-20 02:52:54', '2017-02-20 02:52:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cbkkdvvtkhac`
--
ALTER TABLE `cbkkdvvtkhac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbkkdvvtxb`
--
ALTER TABLE `cbkkdvvtxb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbkkdvvtxk`
--
ALTER TABLE `cbkkdvvtxk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbkkdvvtxtx`
--
ALTER TABLE `cbkkdvvtxtx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbkkgdvlt`
--
ALTER TABLE `cbkkgdvlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cskddvlt`
--
ALTER TABLE `cskddvlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmdvql`
--
ALTER TABLE `dmdvql`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmdvvtkhac`
--
ALTER TABLE `dmdvvtkhac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmdvvtxb`
--
ALTER TABLE `dmdvvtxb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmdvvtxk`
--
ALTER TABLE `dmdvvtxk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmdvvtxtx`
--
ALTER TABLE `dmdvvtxtx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dndvlt`
--
ALTER TABLE `dndvlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donvidvvt`
--
ALTER TABLE `donvidvvt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general-configs`
--
ALTER TABLE `general-configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtkhac`
--
ALTER TABLE `kkdvvtkhac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtkhacct`
--
ALTER TABLE `kkdvvtkhacct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtkhacctdf`
--
ALTER TABLE `kkdvvtkhacctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxb`
--
ALTER TABLE `kkdvvtxb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxbct`
--
ALTER TABLE `kkdvvtxbct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxbctdf`
--
ALTER TABLE `kkdvvtxbctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxk`
--
ALTER TABLE `kkdvvtxk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxkct`
--
ALTER TABLE `kkdvvtxkct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxkctdf`
--
ALTER TABLE `kkdvvtxkctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxtx`
--
ALTER TABLE `kkdvvtxtx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxtxct`
--
ALTER TABLE `kkdvvtxtxct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxtxctdf`
--
ALTER TABLE `kkdvvtxtxctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgdvlt`
--
ALTER TABLE `kkgdvlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgdvltct`
--
ALTER TABLE `kkgdvltct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgdvltctdf`
--
ALTER TABLE `kkgdvltctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagdvvtkhac`
--
ALTER TABLE `pagdvvtkhac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagdvvtkhac_temp`
--
ALTER TABLE `pagdvvtkhac_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagdvvtxb`
--
ALTER TABLE `pagdvvtxb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagdvvtxb_temp`
--
ALTER TABLE `pagdvvtxb_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagdvvtxk`
--
ALTER TABLE `pagdvvtxk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagdvvtxk_temp`
--
ALTER TABLE `pagdvvtxk_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagdvvtxtx`
--
ALTER TABLE `pagdvvtxtx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagdvvtxtx_temp`
--
ALTER TABLE `pagdvvtxtx_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttcskddvlt`
--
ALTER TABLE `ttcskddvlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttdn`
--
ALTER TABLE `ttdn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttphong`
--
ALTER TABLE `ttphong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cbkkdvvtkhac`
--
ALTER TABLE `cbkkdvvtkhac`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbkkdvvtxb`
--
ALTER TABLE `cbkkdvvtxb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbkkdvvtxk`
--
ALTER TABLE `cbkkdvvtxk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbkkdvvtxtx`
--
ALTER TABLE `cbkkdvvtxtx`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbkkgdvlt`
--
ALTER TABLE `cbkkgdvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cskddvlt`
--
ALTER TABLE `cskddvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dmdvql`
--
ALTER TABLE `dmdvql`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dmdvvtkhac`
--
ALTER TABLE `dmdvvtkhac`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmdvvtxb`
--
ALTER TABLE `dmdvvtxb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmdvvtxk`
--
ALTER TABLE `dmdvvtxk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmdvvtxtx`
--
ALTER TABLE `dmdvvtxtx`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dndvlt`
--
ALTER TABLE `dndvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `donvidvvt`
--
ALTER TABLE `donvidvvt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `general-configs`
--
ALTER TABLE `general-configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kkdvvtkhac`
--
ALTER TABLE `kkdvvtkhac`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtkhacct`
--
ALTER TABLE `kkdvvtkhacct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtkhacctdf`
--
ALTER TABLE `kkdvvtkhacctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxb`
--
ALTER TABLE `kkdvvtxb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxbct`
--
ALTER TABLE `kkdvvtxbct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxbctdf`
--
ALTER TABLE `kkdvvtxbctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxk`
--
ALTER TABLE `kkdvvtxk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxkct`
--
ALTER TABLE `kkdvvtxkct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxkctdf`
--
ALTER TABLE `kkdvvtxkctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxtx`
--
ALTER TABLE `kkdvvtxtx`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxtxct`
--
ALTER TABLE `kkdvvtxtxct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxtxctdf`
--
ALTER TABLE `kkdvvtxtxctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgdvlt`
--
ALTER TABLE `kkgdvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kkgdvltct`
--
ALTER TABLE `kkgdvltct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kkgdvltctdf`
--
ALTER TABLE `kkgdvltctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `pagdvvtkhac`
--
ALTER TABLE `pagdvvtkhac`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagdvvtkhac_temp`
--
ALTER TABLE `pagdvvtkhac_temp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagdvvtxb`
--
ALTER TABLE `pagdvvtxb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagdvvtxb_temp`
--
ALTER TABLE `pagdvvtxb_temp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagdvvtxk`
--
ALTER TABLE `pagdvvtxk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagdvvtxk_temp`
--
ALTER TABLE `pagdvvtxk_temp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagdvvtxtx`
--
ALTER TABLE `pagdvvtxtx`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagdvvtxtx_temp`
--
ALTER TABLE `pagdvvtxtx_temp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ttcskddvlt`
--
ALTER TABLE `ttcskddvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ttdn`
--
ALTER TABLE `ttdn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ttphong`
--
ALTER TABLE `ttphong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
