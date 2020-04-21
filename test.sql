-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 04:29 AM
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
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `seller_id`, `customer_id`, `customer_email`, `subject`, `message`, `created_at`) VALUES
(2, 6, 9, 'test_vlaid@hotmail.com', 'test s', 'test ', '2020-04-20 09:06:16');

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
  `image` text NOT NULL,
  `has_promotion` int(1) NOT NULL DEFAULT '0',
  `expiry_date` date DEFAULT NULL,
  `new_price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `seller_id`, `name`, `description`, `price`, `quantity`, `category`, `image`, `has_promotion`, `expiry_date`, `new_price`) VALUES
(3, 6, 'product 12', 'test desc', '22', 10, 'test', 'app/public/uploads/Bus Vooking System.png', 1, '2020-04-25', '21'),
(4, 6, 'test', 'test descssa', '10', 4, 'test', 'app/public/uploads/Nrwtaxi - PROFESSIONELLER FLUGHAFENTRANSFER.png', 0, NULL, NULL),
(5, 6, 'test 11', 'productproduct product productproduct product v productproduct product productproduct product 555', '1500', 5, 'test', 'app/public/uploads/Bus Vooking System.png', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `product_id`, `customer_id`, `comment`, `rating`, `created_at`) VALUES
(1, 5, 9, 'test test ', 3, '2020-04-20 21:45:49'),
(2, 5, 1, 'test test ', 5, '2020-04-20 21:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `review_likes`
--

CREATE TABLE `review_likes` (
  `id` int(10) NOT NULL,
  `review_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_likes`
--

INSERT INTO `review_likes` (`id`, `review_id`, `user_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 9);

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
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_likes`
--
ALTER TABLE `review_likes`
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
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_sellers`
--
ALTER TABLE `order_sellers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review_likes`
--
ALTER TABLE `review_likes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
