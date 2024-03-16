-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 04:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_ris`
--

-- --------------------------------------------------------

--
-- Table structure for table `buys`
--

CREATE TABLE `buys` (
  `buy_id` varchar(10) NOT NULL,
  `sup_id` varchar(6) NOT NULL,
  `buy_date` date NOT NULL,
  `buy_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `buys`
--

INSERT INTO `buys` (`buy_id`, `sup_id`, `buy_date`, `buy_status`) VALUES
('BUY0001', 'SUP001', '2023-08-30', 'สำเร็จ'),
('BUY0002', 'SUP001', '2023-08-31', 'สำเร็จ');

-- --------------------------------------------------------

--
-- Table structure for table `buy_detail`
--

CREATE TABLE `buy_detail` (
  `item` varchar(10) NOT NULL,
  `buy_id` varchar(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `buy_price` varchar(10) NOT NULL,
  `buy_amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `buy_detail`
--

INSERT INTO `buy_detail` (`item`, `buy_id`, `product_id`, `buy_price`, `buy_amount`) VALUES
('1', 'BUY0001', 'P001', '30', '20'),
('2', 'BUY0001', 'P002', '25', '20'),
('3', 'BUY0001', 'P003', '30', '20'),
('4', 'BUY0001', 'P005', '20', '20'),
('1', 'BUY0002', 'P001', '30', '10'),
('2', 'BUY0002', 'P002', '25', '10'),
('3', 'BUY0002', 'P003', '30', '10'),
('4', 'BUY0002', 'P004', '40', '10'),
('5', 'BUY0002', 'P005', '20', '10'),
('6', 'BUY0002', 'P006', '10', '10');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(5) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `customer_lname` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postal` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_lname`, `phone`, `address`, `postal`) VALUES
('C0001', 'ณัฐวุฒิ', 'คำเสียง', '098-014-75', '494/218 ต.บางโปรง อ.เมือง จ.สมุทรปราการ', '10270'),
('C0002', 'จารุพงษ์', 'แตงศรี', '084-025-59', '11/4 จ.ระยอง', '12003'),
('C0003', 'ชัยชนะ', 'กรอกกระโทก', '061-869-29', '44/2  ต.บางหัวเสือ อ.พระประแดง จ.สมุทรปราการ ', '10130');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` date NOT NULL,
  `product_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `product_id`) VALUES
(53, 'd2099c0b97ef214f729306c03f97d3ff.jpg', '2023-08-30', 'P001'),
(54, 'Astrophytum_asterias_cv._Hanazono_8016_l.jpg', '2023-08-30', 'P002'),
(55, 'Astrophytum_asterias_nudum_top_810.jpg', '2023-08-30', 'P003'),
(56, '7.CalPhotos_0000_0000_0214_1234.jpg', '2023-08-30', 'P004'),
(57, '6258a13035c05c0cc8872cf46c2065b2.jpg', '2023-08-30', 'P005'),
(58, '1200px-Mammillaria_magnimamma_toluca.jpg', '2023-08-30', 'P006'),
(59, 'Astrophytum_myriostigma_cv._Fucuriyo_21882_l.jpg', '2023-08-31', 'P007');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(5) NOT NULL,
  `type_id` varchar(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `product_picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `type_id`, `product_name`, `size`, `price`, `cost`, `stock`, `product_picture`) VALUES
('P001', 'ST01', 'variegata', '2 นิ้ว', 80.00, 30.00, 66, ''),
('P002', 'ST02', 'hanazono', '2 นิ้ว', 70.00, 25.00, 63, ''),
('P003', 'ST02', 'nudum', '2 นิ้ว', 80.00, 30.00, 66, ''),
('P004', 'ST03', 'werderm', '2 นิ้ว', 100.00, 40.00, 45, ''),
('P005', 'ST04', 'titan', '2 นิ้ว', 60.00, 20.00, 64, ''),
('P006', 'ST05', 'nudum', '2 นิ้ว', 50.00, 10.00, 46, ''),
('P007', 'ST06', 'fukuryu', '2 นิ้ว', 120.00, 50.00, 30, '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` varchar(10) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `s_type_code` varchar(5) NOT NULL,
  `s_status_code` varchar(5) NOT NULL,
  `sale_date` date NOT NULL,
  `due_date` date NOT NULL,
  `send_date` date NOT NULL,
  `send_cost` decimal(10,2) NOT NULL,
  `send_price` decimal(10,2) NOT NULL,
  `total` int(11) NOT NULL,
  `total_sum` int(11) NOT NULL,
  `send_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `customer_id`, `s_type_code`, `s_status_code`, `sale_date`, `due_date`, `send_date`, `send_cost`, `send_price`, `total`, `total_sum`, `send_number`) VALUES
('SLE0001', 'C0001', 'S30', 'WT', '2023-08-30', '2023-09-29', '0000-00-00', 48.00, 60.00, 0, 0, ''),
('SLE0002', 'C0001', 'ONL', 'CMP', '2023-08-30', '2023-08-30', '2023-08-30', 40.00, 50.00, 0, 0, 'FT8545552826'),
('SLE0003', 'C0003', 'S90', 'WT', '2023-08-30', '2023-11-28', '0000-00-00', 72.00, 90.00, 0, 0, ''),
('SLE0004', 'C0002', 'S120', 'WT', '2023-08-30', '2023-12-28', '0000-00-00', 64.00, 80.00, 0, 0, ''),
('SLE0005', 'C0003', 'ONL', 'XNL', '2023-08-30', '2023-08-30', '2023-08-30', 72.00, 90.00, 0, 0, ''),
('SLE0006', 'C0002', 'ONL', 'CMP', '2023-08-31', '2023-08-31', '2023-08-31', 64.00, 80.00, 0, 0, 'ED5748457752'),
('SLE0007', 'C0003', 'S30', 'WT', '2023-08-31', '2023-09-30', '0000-00-00', 24.00, 30.00, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `item` varchar(10) NOT NULL,
  `sale_id` varchar(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `depo_price` decimal(10,2) NOT NULL,
  `sale_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`item`, `sale_id`, `product_id`, `sale_price`, `depo_price`, `sale_amount`) VALUES
('1', 'SLE0001', 'P001', 80.00, 10.00, 2),
('2', 'SLE0001', 'P002', 70.00, 10.00, 2),
('1', 'SLE0002', 'P004', 100.00, 0.00, 4),
('1', 'SLE0003', 'P003', 80.00, 50.00, 2),
('2', 'SLE0003', 'P005', 60.00, 50.00, 2),
('3', 'SLE0003', 'P006', 50.00, 50.00, 2),
('1', 'SLE0004', 'P001', 80.00, 75.00, 1),
('2', 'SLE0004', 'P003', 80.00, 75.00, 1),
('3', 'SLE0004', 'P005', 60.00, 75.00, 1),
('4', 'SLE0004', 'P006', 50.00, 75.00, 1),
('1', 'SLE0005', 'P002', 70.00, 0.00, 3),
('2', 'SLE0005', 'P005', 60.00, 0.00, 1),
('3', 'SLE0005', 'P005', 60.00, 0.00, 2),
('1', 'SLE0006', 'P001', 80.00, 0.00, 1),
('2', 'SLE0006', 'P003', 80.00, 0.00, 1),
('3', 'SLE0006', 'P004', 100.00, 0.00, 1),
('4', 'SLE0006', 'P006', 50.00, 0.00, 1),
('1', 'SLE0007', 'P002', 70.00, 10.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sale_status`
--

CREATE TABLE `sale_status` (
  `s_status_code` varchar(5) NOT NULL,
  `s_status_desc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_status`
--

INSERT INTO `sale_status` (`s_status_code`, `s_status_desc`) VALUES
('CMP', 'ส่งสินค้าแล้ว'),
('WT', 'รอการส่งสินค้า'),
('XNL', 'ยกเลิก');

-- --------------------------------------------------------

--
-- Table structure for table `sale_type`
--

CREATE TABLE `sale_type` (
  `s_type_code` varchar(5) NOT NULL,
  `s_type_desc` varchar(20) NOT NULL,
  `s_type_charge` decimal(8,2) NOT NULL,
  `s_day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_type`
--

INSERT INTO `sale_type` (`s_type_code`, `s_type_desc`, `s_type_charge`, `s_day`) VALUES
('ONL', 'ขายออนไลน์', 0.00, 0),
('S120', 'ฝาก120วัน', 75.00, 120),
('S30', 'ฝาก30วัน', 10.00, 30),
('S90', 'ฝาก90วัน', 50.00, 90);

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `species_id` varchar(10) NOT NULL,
  `species_name` varchar(50) NOT NULL,
  `species_main_picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`species_id`, `species_name`, `species_main_picture`) VALUES
('SP01', 'Gymnocalycium', ''),
('SP02', 'Astrophytum', ''),
('SP03', 'Mammillaria', ''),
('SP04', 'Coryphantha', '');

-- --------------------------------------------------------

--
-- Table structure for table `species_type`
--

CREATE TABLE `species_type` (
  `type_id` varchar(10) NOT NULL,
  `species_id` varchar(10) NOT NULL,
  `type_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `species_type`
--

INSERT INTO `species_type` (`type_id`, `species_id`, `type_desc`) VALUES
('ST01', 'SP01', 'mihanovichii'),
('ST02', 'SP02', 'asterias'),
('ST03', 'SP03', 'hahniana'),
('ST04', 'SP04', 'elephantidens '),
('ST05', 'SP03', 'magnimamma'),
('ST06', 'SP02', 'myriostigma ');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` varchar(6) NOT NULL,
  `sup_name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `phone`, `address`, `postal`) VALUES
('SUP001', 'APC Garden', '086-322-94', 'ซ. ศรีด่าน 22 ตำบล บางแก้ว อำเภอบางพลี สมุทรปราการ', '10540');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buys`
--
ALTER TABLE `buys`
  ADD PRIMARY KEY (`buy_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sale_type`
--
ALTER TABLE `sale_type`
  ADD PRIMARY KEY (`s_type_code`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`species_id`);

--
-- Indexes for table `species_type`
--
ALTER TABLE `species_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
