-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 09:23 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_profile`
--

CREATE TABLE `customer_profile` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_profile`
--

INSERT INTO `customer_profile` (`id`, `customer_id`, `first_name`, `last_name`, `email`, `phone`) VALUES
(1, 9, 'Mohamed1', 'Saleh1', 'mohmed2778@hotmail.com1', '011552736371'),
(5, 10, 'Mohamed2', 'Saleh2', 'mohmed2778@hotmail.com2', '011552736372');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `date_ordered` date NOT NULL,
  `date_required` date NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `date_ordered`, `date_required`, `status`) VALUES
(1, 9, '2020-04-19', '2020-04-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `order_sellers`
--

CREATE TABLE `order_sellers` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_sellers`
--

INSERT INTO `order_sellers` (`id`, `order_id`, `seller_id`) VALUES
(1, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(5) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `seller_id`, `name`, `description`, `price`, `quantity`, `category`, `image`) VALUES
(3, 6, 'product 12', 'test desc', '22', 12, 'test', 'app/public/uploads/Bus Vooking System.png'),
(4, 6, 'test', 'test descssa', '10', 5, 'test', 'app/public/uploads/Nrwtaxi - PROFESSIONELLER FLUGHAFENTRANSFER.png'),
(5, 6, 'test 11', 'productproduct product productproduct product v productproduct product productproduct product 555', '1500', 0, 'test', 'app/public/uploads/Bus Vooking System.png');

-- --------------------------------------------------------

--
-- Table structure for table `shop_profile`
--

CREATE TABLE `shop_profile` (
  `id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `shop_description` text NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_profile`
--

INSERT INTO `shop_profile` (`id`, `seller_id`, `shop_description`, `shop_name`, `shop_category`) VALUES
(1, 6, 'test3\r\n55', 'test11', 'test22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `user_type` enum('seller','buyer') NOT NULL DEFAULT 'buyer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'hello', '$2y$10$GkviyjvVmD1.qkzAV8frD.FxggVSnvl4Nlynn.qysa.uQtgnq1IFi', 'buyer'),
(3, 'admin', '$2y$10$3o/FOosrggJPDC9ANrCcBuB81lVwyCstunnbqqA4aYh1bYILLnw7G', 'buyer'),
(4, 'test', '$2y$10$e1ZWqODv10sv.lYx8Gr62uSAuJUiRDGQQrjIQkPJeTgXAoke1UvSq', 'buyer'),
(6, 'seller', '$2y$10$ywd5zqf4ars25A.K0IF5NeDEoQVF.zqVmR10sAxP6GWv7ROhLpSzK', 'seller'),
(9, 'customer', '$2y$10$OLNtWXZ1zBq3VOnSkktwoO6WjE2HEbpkhvTeb1cV8EU0IKknMhgwm', 'buyer'),
(10, 'customer1', '$2y$10$NChNvBMpj.CpsAFBO/WkJ.dOCmMVxWJfAhgK6dowCj2HC/0Ze.RmS', 'buyer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_profile`
--
ALTER TABLE `customer_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_sellers`
--
ALTER TABLE `order_sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_profile`
--
ALTER TABLE `shop_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_profile`
--
ALTER TABLE `customer_profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_sellers`
--
ALTER TABLE `order_sellers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shop_profile`
--
ALTER TABLE `shop_profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
