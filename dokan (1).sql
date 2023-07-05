-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 10:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dokan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(15, 21, 'Phone', 15000, 1, 'phn.jpg'),
(28, 0, 'Perfume', 5000, 1, 'perfume2.jpg'),
(29, 1, 'Laptop', 150000, 1, 'laptop.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(11) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 14, 'Junaid', 'junaid@gmail.com', '01111111111', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 1, 'Rocky Islam', '01727816720', 'rocky@gmail.com', 'cash on delivery', 'flat no. 115, 1229, Dhaka, Bangladesh - 123456', ', Phone (1) ', 15000, '28-Apr-2023', 'pending'),
(2, 1, 'Apon', '017777777', 'apon@gmail.com', 'cash on delivery', 'flat no. 12, 1229, Dhaka, Bangladesh - 1234', ', Sharee (1) , Laptop (1) ', 152000, '28-Apr-2023', 'pending'),
(3, 1, 'Rahad', '017777777', 'rahad@gmail.com', 'cash on delivery', 'flat no. 12, 1229, Dhaka, Bangladesh - 1234', ', Phone (1) ', 15000, '01-May-2023', 'completed'),
(4, 1, 'Saimun', '01777777777', 'saimun@gmail.com', 'cash on delivery', 'flat no. 12, 123, Dhaka, Bangladesh - 123', ', Sunglass (1) ', 1200, '01-May-2023', 'completed'),
(5, 1, 'Rahad', '8768767676', 'rahad@gmail.com', 'cash on delivery', 'flat no. 12, 1229, Dhaka, Bangladesh - 1234', ', Tshirt (1) ', 450, '01-May-2023', 'completed'),
(6, 14, 'Junaid', '01111111111', 'junaid@gmail.com', 'cash on delivery', 'flat no. 25, 1229a, Dhaka, Bangladesh - 665', ', Phone (1) ', 15000, '12-May-2023', 'completed'),
(7, 1, '', '', '', 'cash on delivery', 'flat no. , , ,  - ', ', Phone (1) ', 15000, '14-May-2023', 'pending'),
(8, 1, 'Kanon', '01727816720', 'kanon@gmail.com', 'cash on delivery', 'flat no. 12, 123, dhaka, bangladesh - 1229', ', Sunglass (1) ', 1200, '14-May-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(6, 'Phone', 15000, 'phn.jpg'),
(7, 'Laptop', 150000, 'laptop.jpg'),
(8, 'Perfume', 5000, 'perfume2.jpg'),
(9, 'Sharee', 2000, 'sharee.jpg'),
(10, 'Sunglass', 1200, 'sunglass.jpg'),
(11, 'Ring', 150000, 'ring.jpg'),
(12, 'Tshirt', 450, 'tshirt.jpg'),
(13, 'Television Samsung', 160000, 'tv.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pnumber` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `pnumber`, `address`, `password`, `user_type`) VALUES
(1, 'rahad', 'islam', 'rahad@gmail.com', 1727816720, 'dhaka', '202cb962ac59075b964b07152d234b70', 'user'),
(3, 'admin', '02', 'admin2@gmail.com', 1727816720, 'dhaka', '698d51a19d8a121ce581499d7b701668', 'admin'),
(14, 'junaid', 'islam', 'junaid@gmail.com', 1111111111, 'Rajshahi', '5b1b68a9abf4d2cd155c81a9225fd158', 'user'),
(15, 'Apon', 'Riaz', 'apon@gmail.com', 2147483647, 'dhaka', 'e10adc3949ba59abbe56e057f20f883e', 'seller'),
(16, 'Riaz', 'Talukdar', 'riaz@gmail.com', 2147483647, 'dhaka', 'fcea920f7412b5da7be0cf42b8c93759', 'seller'),
(17, 'rasel', 'islam', 'rasel@gmail.com', 2147483647, 'dhaka', 'fcea920f7412b5da7be0cf42b8c93759', 'user'),
(18, 'monir', 'monir', 'monir@gmail.com', 2147483647, 'dhaka', 'fcea920f7412b5da7be0cf42b8c93759', 'user'),
(19, 'abir', 'bashar', 'abir@gmail.com', 2147483647, 'dhaka', 'fcea920f7412b5da7be0cf42b8c93759', 'user'),
(20, 'nasif', 'rahman', 'nasif@gmail.com', 2147483647, 'sherpur', 'fcea920f7412b5da7be0cf42b8c93759', 'user'),
(21, 'saimun', 'islam', 'saimun@gmail.com', 2147483647, 'faridpur', 'fcea920f7412b5da7be0cf42b8c93759', 'user'),
(22, 'Manager', '01', 'manager@gmail.com', 1727816720, 'Pabna', 'e3ceb5881a0a1fdaad01296d7554868d', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
