-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2018 at 02:47 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Acer'),
(4, 'Trancend'),
(5, 'Sony'),
(6, 'Philips'),
(7, 'Vivo'),
(8, 'Asus'),
(9, 'HUAWEI'),
(10, 'Twinmos'),
(11, 'Lenovo'),
(12, 'Toshiba'),
(13, 'Hikvision'),
(14, 'A Data'),
(15, 'Canon'),
(16, 'Nikkon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(1, '0177316db59a4dd2df63247786b494a4', 14, 'Canon EOS 4000D Digital SLR Camera Body ', 28000.00, 1, 'upload/7b65055e73.jpg'),
(2, '0177316db59a4dd2df63247786b494a4', 15, 'Nikon D5300 Digital SLR Camera Body With AF-S 18-55mm VR Lens ', 44500.00, 1, 'upload/ed3fcfc4c6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Electronics'),
(2, 'Notebook'),
(3, 'Desktop'),
(4, 'Photography'),
(5, 'Smart Watch'),
(6, 'Software'),
(7, 'Audio / Video'),
(8, 'Component'),
(9, 'Toner / Cartbridge'),
(10, 'Office Equipment'),
(11, 'Server'),
(13, 'Storage'),
(14, 'Accessories'),
(15, 'Printer'),
(16, 'Monitor'),
(17, 'Tablet PC'),
(18, 'Scaner'),
(19, 'Notebook'),
(20, 'Gaming'),
(21, 'Camera');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(2, 'Samsung 23.5 Inch Curved Full HD', 16, 2, 'Samsung 23.5 Inch Curved Full HD', 17000.00, 'upload/fefa979198.jpg', 0),
(3, 'Samsung 27 Inch Curved Full HD LED Monitor ', 16, 2, 'Samsung 27 Inch Curved Full HD LED Monitor ', 27000.00, 'upload/e18a92a0d2.jpg', 0),
(4, 'Samsung 27 Inch Curved Full HD LED Borderless Monitor ', 16, 2, 'Samsung 27 Inch Curved Full HD LED Borderless Monitor ', 34000.00, 'upload/bf5e47922f.jpg', 1),
(5, 'Samsung 24 Inch VA-Panel LED', 16, 2, 'Samsung 24 Inch VA-Panel LED', 35000.00, 'upload/c829733b78.jpg', 0),
(6, 'ASUS VZ27VQ 27 Inch FHD', 16, 8, 'ASUS VZ27VQ 27 Inch FHD', 56000.00, 'upload/b41de95f10.jpg', 1),
(7, 'Asus ROG Strix XG27VQ 27 Inch FHD Curved', 16, 8, 'Asus ROG Strix XG27VQ 27 Inch FHD Curved', 56000.00, 'upload/9fc2192c16.jpg', 0),
(8, 'Asus ROG Swift PG27VQ 27 Inch Curved 2K WQHD ', 16, 8, 'Asus ROG Swift PG27VQ 27 Inch Curved 2K WQHD ', 87000.00, 'upload/802a5ec8f4.jpg', 1),
(9, 'ASUS Designo Curve MX34VQ 34 Inch Ultra-wide Curved ', 16, 8, 'ASUS Designo Curve MX34VQ 34 Inch Ultra-wide Curved ', 113000.00, 'upload/a621c7cd10.jpg', 0),
(10, 'Twinmos T7283GD1', 17, 10, 'Twinmos T7283GD1', 10000.00, 'upload/f49ea50e57.jpg', 1),
(11, 'HUAWEI MediaPad T3 7 MTK MT8127 Quad-core A7 Processor ', 17, 9, 'HUAWEI MediaPad T3 7 MTK MT8127 Quad-core A7 Processor ', 9000.00, 'upload/88bb97862a.jpg', 0),
(12, 'Toshiba HDTB410AK3AA Canvio Basic 1TB Black External HDD ', 13, 12, 'Toshiba HDTB410AK3AA Canvio Basic 1TB Black External HDD ', 4500.00, 'upload/d61c5e1157.jpg', 1),
(13, 'Hikvision ezviz 120GB Piano Black Portable SSD #HS-ESSD-T100I ', 13, 13, 'Hikvision ezviz 120GB Piano Black Portable SSD #HS-ESSD-T100I ', 4995.00, 'upload/0eb1239642.jpg', 0),
(14, 'Canon EOS 4000D Digital SLR Camera Body ', 21, 15, 'Canon EOS 4000D Digital SLR Camera Body ', 28000.00, 'upload/7b65055e73.jpg', 0),
(15, 'Nikon D5300 Digital SLR Camera Body With AF-S 18-55mm VR Lens ', 21, 16, 'Nikon D5300 Digital SLR Camera Body With AF-S 18-55mm VR Lens ', 44500.00, 'upload/ed3fcfc4c6.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
