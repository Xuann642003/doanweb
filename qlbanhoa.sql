-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 06:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbanhoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `taikhoan`, `matkhau`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dangki`
--

CREATE TABLE `dangki` (
  `id` int(6) UNSIGNED NOT NULL,
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dangki`
--

INSERT INTO `dangki` (`id`, `tendangnhap`, `matkhau`) VALUES
(1, 'trantruongxuan', 'trantruongxuan'),
(2, 'phamngoctien', 'phamngoctien');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `tenhoa` varchar(255) DEFAULT NULL,
  `giagiamgia` int(11) DEFAULT NULL,
  `giagoc` int(11) DEFAULT NULL,
  `mota` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `hinhanh`, `tenhoa`, `giagiamgia`, `giagoc`, `mota`) VALUES
(1, 'image/anhhoa1.webp', 'Hoa hồng ', 350000, 400000, 'Là sự kết hợp hoàn hảo giữa Hoa Hướng Dương và Bing Bong trắng, đây sẽ là món quà hoàn hảo để tặng cho người thân thương của bạn. '),
(2, 'image/anhhoa2.webp', 'Hoa hướng dương', 270000, 300000, NULL),
(3, 'image/anhhoa3.webp', 'Hoa hồng đẹp', 250000, 270000, NULL),
(4, 'image/anhhoa4.webp', 'Hoa cúc mini', 250000, 270000, NULL),
(5, 'image/anhhoa5.webp', 'Hoa cúc mini loại 1', 250000, 270000, NULL),
(6, 'image/anhhoa6.webp', 'Hoa hồng loại 1', 310000, 330000, NULL),
(7, 'image/anhhoa7.webp', 'Hoa hồng bó lớn', 700000, 750000, NULL),
(8, 'image/anhhoa8.webp', 'Hoa cúc họa mi', 400000, 410000, NULL),
(9, 'image/anhhoa9.webp', 'Hoa hồng bó lớn', 700000, 750000, NULL),
(10, 'image/anhhoa10.webp', 'Hoa hồng bó siêu lớn', 1000000, 1050000, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dangki`
--
ALTER TABLE `dangki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dangki`
--
ALTER TABLE `dangki`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
