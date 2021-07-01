-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2021 at 07:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--
CREATE DATABASE IF NOT EXISTS `inventory_management` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `inventory_management`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(50) NOT NULL,
  `BookingDate` date NOT NULL,
  `CustomerNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `BookingDate`, `CustomerNo`) VALUES
(28, '2012-12-12', 1),
(29, '2012-12-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerNo` int(10) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `RegNo` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `ContactNo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerNo`, `fname`, `lname`, `RegNo`, `Address`, `ContactNo`) VALUES
(1, 'wahab', 'wahab', 14, 'wahab', '03168774009');

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `Id` int(11) NOT NULL,
  `quantity` int(50) NOT NULL,
  `place` varchar(256) NOT NULL,
  `totalPrice` int(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`Id`, `quantity`, `place`, `totalPrice`, `product_id`, `customer_id`) VALUES
(131, 100, 'wah cannt', 1000, 6, 1),
(133, 11, 'mart', 121, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductNo` int(10) NOT NULL,
  `Pname` varchar(256) NOT NULL,
  `category` varchar(256) NOT NULL,
  `Pdescription` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `Pweight` float NOT NULL,
  `PInStock` tinyint(1) NOT NULL,
  `PInOrder` tinyint(1) NOT NULL,
  `SupplierNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductNo`, `Pname`, `category`, `Pdescription`, `price`, `Pweight`, `PInStock`, `PInOrder`, `SupplierNo`) VALUES
(6, 'Eye liner', 'Grocery', 'no description', 10, 20, 1, 1, 133),
(8, 'NewP', 'Grocery', 'none', 11, 11, 1, 1, 133);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SupplierNo` int(10) NOT NULL,
  `Comfname` varchar(255) NOT NULL,
  `ComLname` varchar(255) NOT NULL,
  `Comtitle` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Contactno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierNo`, `Comfname`, `ComLname`, `Comtitle`, `Address`, `Contactno`) VALUES
(132, 'cp1', 'cp2', 'watchHim', '2322323', '909090'),
(133, 'honda', 'vehicle', 'none', '090909', '09090'),
(134, 'Apple', 'Inc', 'Apple', '90909', 'Callifornia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerNo`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductNo`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SupplierNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SupplierNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
