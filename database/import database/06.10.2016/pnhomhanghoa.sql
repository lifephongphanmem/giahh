-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2016 at 04:24 AM
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
-- Table structure for table `pnhomhanghoa`
--

CREATE TABLE IF NOT EXISTS `pnhomhanghoa` (
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pnhomhanghoa`
--

INSERT INTO `pnhomhanghoa` (`id`, `manhom`, `mapnhom`, `masopnhom`, `tenpnhom`, `anhien`, `sapxep`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, '01', '01', '01.01', 'Cước vận chuyển hành khách bằng đường sắt loại ghế ngồi cứng', '', '1', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '01', '02', '01.02', 'Cước vận tải bằng ô tô và giá dịch vụ hỗ trợ vận tải đường bộ ', '', '2', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '01', '03', '01.03', 'Dịch vụ khám bệnh, chữa bệnh', '', '3', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '01', '04', '01.04', 'Giá dịch vụ tại cảng biển, giá dịch vụ hàng không tại cảng hàng không sân bay', '', '4', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '01', '05', '01.05', 'Giá vé máy bay trên các đường bay nội địa không thuộc danh mục nhà nước quy định khung giá', '', '5', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '01', '06', '01.06', 'Giấy in, viết (dạng cuộn), giấy in báo sản xuất trong nước', '', '6', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '01', '07', '01.07', 'Hàng hóa, dịch vụ bình ổn giá', '', '7', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '01', '08', '01.08', 'Sách giáo khoa', '', '8', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '01', '09', '01.09', 'Than', '', '9', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '01', '10', '01.10', 'Thức ăn chăn nuôi cho gia súc, gia cầm và thủy sản', '', '10', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '01', '11', '01.11', 'Thực phẩm chức năng cho trẻ em dưới 06 tuổi', '', '11', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '01', '12', '01.12', 'Thuốc tiêu độc, sát trùng, tẩy trùng, trị bệnh cho gia súc, gia cầm và thủy sản trong thành phần có hoạt chất', '', '12', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '01', '13', '01.13', 'Xi măng, thép xây dựng', '', '13', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '02', '01', '02.01', 'Cước vận chuyển hành khách bằng xe ô tô điện', '', '1', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '02', '02', '02.02', 'Đá xây dựng (đá hộc, đá xay các loại), cát, sỏi', '', '2', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '02', '03', '02.03', 'Dây điện, cáp điện các loại', '', '3', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '02', '04', '02.04', 'Dịch vụ bốc xếp, vận chuyển hàng hóa tại Cửa khẩu quốc tế Lào Cai, Ga Lào Cai và các bến bãi thuộc các cửa khẩu phụ và tiểu ngạch', '', '4', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '02', '05', '02.05', 'Dịch vụ kinh doanh lữ hành', '', '5', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '02', '06', '02.06', 'Điều hòa không khí các loại', '', '6', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '02', '07', '02.07', 'Gạch ốp, lát các loại', '', '7', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '02', '08', '02.08', 'Gạch xây (gạch đất nung, gạch không nung)', '', '8', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '02', '09', '02.09', 'Gỗ các loại', '', '9', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '02', '10', '02.10', 'Khung nhôm, vách ngăn, cửa các loại (sản xuất từ nhôm, sắt, nhựa, gỗ, lõi thép...)', '', '10', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '02', '11', '02.11', 'Kinh doanh lưu trú du lịch', '', '11', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, '02', '12', '02.12', 'Ô tô, máy công trình, xe máy các loại', '', '12', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '02', '13', '02.13', 'Ống nước các loại (Sắt, nhựa, bê tông...)', '', '13', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '02', '14', '02.14', 'Sản phẩm đá tự nhiên, đá nhân tạo (đá ốp, lát, đá xẻ các loại)', '', '14', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, '02', '15', '02.15', 'Sản xuất, kinh doanh cây giống nông lâm nghiệp, con giống, hạt giống, cây ăn quả, cây dược liệu, cây xanh phục vụ cho các dự án đầu tư xây dựng công trình', '', '15', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '02', '16', '02.16', 'Sơn các loại', '', '16', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '02', '17', '02.17', 'Tấm lợp các loại, ngói các loại (Pro xi măng, onduline, sản xuất từ đá, gỗ...)', '', '17', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '02', '18', '02.18', 'Vé giường nằm, ghế ngồi mềm tầu hỏa thuộc tuyến đường sắt Lào Cai – Hà Nội', '', '18', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '02', '19', '02.19', 'Vé tham +B3:B20quan du lịch các địa điểm trên địa bàn huyện Sa Pa (Trừ dịch vụ thuộc phạm vi điều chỉnh của Pháp lệnh phí và lệ phí)', '', '19', 'Có', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pnhomhanghoa`
--
ALTER TABLE `pnhomhanghoa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pnhomhanghoa`
--
ALTER TABLE `pnhomhanghoa`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
