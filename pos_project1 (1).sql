-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 07:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(20) NOT NULL,
  `brands` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brands`) VALUES
(2, 'Brande 5'),
(4, 'Brande 1'),
(5, 'Brande 2'),
(6, 'Brande 4');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat`) VALUES
(5, 'Frowk NDR'),
(6, 'Lahenga'),
(7, 'Maxiii'),
(8, 'kurta'),
(9, 'Lahenga');

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `id` int(20) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `customer_number` int(20) NOT NULL,
  `salesman` varchar(20) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `cquantity` int(20) NOT NULL,
  `total_price` int(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `grand_total` int(100) NOT NULL,
  `received` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `report_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`id`, `customer_name`, `customer_number`, `salesman`, `product_name`, `price`, `cquantity`, `total_price`, `date`, `time`, `grand_total`, `received`, `status`, `report_id`) VALUES
(1, 'dsf', 2147483647, 'xyz', 'clothes', 20, 1, 20, '2023-08-23', '12:51:44', 314, 20, '6%', 90164),
(2, 'dsf', 2147483647, 'xyz', 'kdla', 300, 1, 300, '2023-08-23', '12:53:23', 314, 20, '6%', 90164),
(3, 'khadi', 343, 'dsf', 'clothes', 20, 1, 20, '2023-08-23', '12:51:44', 314, 222, '70%', 76372),
(4, 'khadi', 343, 'dsf', 'kdla', 300, 1, 300, '2023-08-23', '12:53:23', 314, 222, '70%', 76372),
(5, 'yousaf', 667567678, 'yjk', 'clothes', 20, 1, 20, '2023-08-23', '12:51:44', 343, 343, '100%', 82606),
(6, 'yousaf', 667567678, 'yjk', 'kdla', 300, 1, 300, '2023-08-23', '12:53:23', 343, 343, '100%', 82606),
(7, 'yousaf', 667567678, 'yjk', 'saa', 10, 3, 30, '2023-08-23', '13:42:28', 343, 343, '100%', 82606),
(8, 'haroon', 9789765, 'oky', 'saa', 10, 1, 10, '2023-08-23', '13:43:24', 69, 30, '43%', 49778),
(9, 'haroon', 9789765, 'oky', 'clothes', 20, 3, 60, '2023-08-23', '13:43:32', 69, 30, '43%', 49778),
(10, 'haroon', 678685, 'abc', 'clothes', 20, 2, 40, '2023-08-23', '13:44:34', 49, 30, '61%', 712),
(11, 'haroon', 678685, 'abc', 'saa', 10, 1, 10, '2023-08-23', '13:44:39', 49, 30, '61%', 712),
(12, 'ww', 333, 'ee', 'saa', 10, 1, 10, '2023-08-23', '14:01:27', 10, 22, '220%', 51378),
(13, 'dsf', 2147483647, 'dsf', 'clothes', 20, 2, 40, '2023-08-23', '15:17:42', 59, 20, '33%', 15),
(14, 'dsf', 2147483647, 'dsf', 'saa', 10, 2, 20, '2023-08-23', '15:17:47', 59, 20, '33%', 15),
(15, 'dsf', 2147483647, 'xyz', 'saa', 10, 2, 20, '2023-08-23', '15:37:07', 608, 20, '3%', 16),
(16, 'dsf', 2147483647, 'xyz', 'kdla', 300, 2, 600, '2023-08-23', '15:37:13', 608, 20, '3%', 16);

-- --------------------------------------------------------

--
-- Table structure for table `employee_name`
--

CREATE TABLE `employee_name` (
  `id` int(100) NOT NULL,
  `Employee Name` varchar(12) NOT NULL,
  `Username` varchar(12) NOT NULL,
  `Password` varchar(11) NOT NULL,
  `Cell Number` varchar(20) NOT NULL,
  `Commission` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_name`
--

INSERT INTO `employee_name` (`id`, `Employee Name`, `Username`, `Password`, `Cell Number`, `Commission`) VALUES
(3, 'ali', 'Shabbar12', 'sdff3', '324343', '30%'),
(4, 'kamran', 'ak', 'dgfghj', '4365657', '12%'),
(5, 'javaid', 'jd34', 'dfgkm', '67865', '5%');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `expense type` varchar(12) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `expense date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `expense type`, `amount`, `expense date`) VALUES
(10, 'sd', '33', '2023-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `hold_bill`
--

CREATE TABLE `hold_bill` (
  `id` int(20) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `customer_number` varchar(20) NOT NULL,
  `salesman` varchar(20) NOT NULL,
  `product name` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `cquantity` int(20) NOT NULL,
  `total_price` int(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hold_bill`
--

INSERT INTO `hold_bill` (`id`, `customer_name`, `customer_number`, `salesman`, `product name`, `price`, `cquantity`, `total_price`, `date`, `time`) VALUES
(1, '', '', '', 'w2', 10, 1, 10, '2023-08-14', '18:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `mange_admin`
--

CREATE TABLE `mange_admin` (
  `id` int(100) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mange_admin`
--

INSERT INTO `mange_admin` (`id`, `username`, `password`, `image`) VALUES
(9, '       munee', '       sad3w', 'images/download (2).jpg'),
(10, 'ali', '45dfg', 'images/download (3).jpg'),
(11, 'hassan', 'dsdf4444w', 'images/img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product name` varchar(11) NOT NULL,
  `category` varchar(12) NOT NULL,
  `sale price` varchar(11) NOT NULL,
  `purchase price` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(20) NOT NULL,
  `product name` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `total_price` int(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project1`
--

CREATE TABLE `project1` (
  `id` int(100) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `cpassword` varchar(20) NOT NULL,
  `vcode` varchar(100) NOT NULL,
  `varified` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project1`
--

INSERT INTO `project1` (`id`, `fname`, `lname`, `username`, `password`, `cpassword`, `vcode`, `varified`) VALUES
(1, 'a', 'a', 'a', 'a', 'a', '', 0),
(2, 'ss', 's', 's', 's', 's', '', 0),
(3, 'haider', 'sdkfhsd', 'abc22', '1234', '12345', '', 0),
(4, 'ab', 'ab', 'ab', 'ab', 'ab', '52db302bc930bab9', 0),
(5, 'zz', 'zz', 'zz', 'zz', 'zz', '41464007849af69c', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(33) NOT NULL,
  `product_name` varchar(33) NOT NULL,
  `products` varchar(11) NOT NULL,
  `quantity` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `report_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `customer_name`, `product_name`, `products`, `quantity`, `date`, `report_id`) VALUES
(1, 'shabbar', 'clothes', '1', '1', '2023-08-23', 31264),
(2, 'shabbar', 'kdla', '2', '2', '2023-08-23', 31264),
(3, 'dsf', 'clothes', '1', '1', '2023-08-23', 90164),
(4, 'dsf', 'kdla', '2', '2', '2023-08-23', 90164),
(5, 'khadi', 'clothes', '1', '1', '2023-08-23', 76372),
(6, 'khadi', 'kdla', '2', '2', '2023-08-23', 76372),
(7, 'yousaf', 'clothes', '1', '1', '2023-08-23', 82606),
(8, 'yousaf', 'kdla', '2', '2', '2023-08-23', 82606),
(9, 'yousaf', 'saa', '3', '5', '2023-08-23', 82606),
(10, 'haroon', 'saa', '1', '1', '2023-08-23', 49778),
(11, 'haroon', 'clothes', '2', '4', '2023-08-23', 49778),
(12, 'haroon', 'clothes', '1', '2', '2023-08-23', 712),
(13, 'haroon', 'saa', '2', '3', '2023-08-23', 712),
(14, 'ww', 'saa', '1', '1', '2023-08-23', 51378),
(15, 'dsf', '', '0', '0', '2023-08-23', 0),
(16, 'dsf', '', '0', '0', '2023-08-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale_manage`
--

CREATE TABLE `sale_manage` (
  `id` int(20) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `customer_number` varchar(20) NOT NULL,
  `salesman` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_manage`
--

INSERT INTO `sale_manage` (`id`, `customer_name`, `customer_number`, `salesman`, `quantity`, `product_name`, `amount`, `date`, `time`) VALUES
(1, 'ibrar', '03234545346', 'ali', 2, '2', '234', '2023-08-07', '14:28:00'),
(2, 'mohtashim', '03546756467', 'kashif', 2, '5', '2344', '2023-08-07', '14:28:00'),
(3, 'luqman', '03458213456', 'asad', 3, '1', '521', '2023-08-07', '14:29:00'),
(4, 'haroon', '0345795645', 'nouman', 1, '3', '200', '2023-08-07', '14:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_name`
--
ALTER TABLE `employee_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hold_bill`
--
ALTER TABLE `hold_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mange_admin`
--
ALTER TABLE `mange_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project1`
--
ALTER TABLE `project1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_manage`
--
ALTER TABLE `sale_manage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_name`
--
ALTER TABLE `employee_name`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hold_bill`
--
ALTER TABLE `hold_bill`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mange_admin`
--
ALTER TABLE `mange_admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `project1`
--
ALTER TABLE `project1`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sale_manage`
--
ALTER TABLE `sale_manage`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
