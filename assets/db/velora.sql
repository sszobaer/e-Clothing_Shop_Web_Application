-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2025 at 04:05 PM
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
-- Database: `velora`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category`, `price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Velora Black Shirt', 'Casual', 450.00, 5, '68ed8fadc2e66_6a7be106-3728-4f6a-9fea-9744ba18b91d.jpg', '2025-10-14 01:47:57', '2025-10-14 01:47:57'),
(2, 'Velora White Shirt', 'Formal', 499.00, 5, '68ed9388c1026_a23d9649-169f-412a-b28f-994ec8741a2f.02387abf499f017a9bfdcaf483133f1f.webp', '2025-10-14 02:04:24', '2025-10-14 02:04:24'),
(3, 'Velora Check', 'Casual', 499.00, 9, '68eda9c9411b1_2488-1.webp', '2025-10-14 03:39:21', '2025-10-14 03:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullName`, `email`, `phone`, `password`, `created_at`, `updated_at`, `role`) VALUES
(2, 'Fahad Akond', 'fahad@gmail.com', 13098447, '$2y$10$DkJmpX6wtiTnv./rdMX4Oe3rlhrkLf85CeHzPu2qBxN5TjNIJUq/q', '2025-10-12 21:38:22', '2025-10-12 21:38:22', 'user'),
(3, 'S. S. Zobaer Ahmed', 'ahmedsszobaer@gmail.com', 1405098447, '$2y$10$Y7aXNYK7f/3IoGaxzloMcuuLXhdrDiSU.9ezXrNHIMTMkMYwBJq7y', '2025-10-12 22:28:47', '2025-10-12 22:28:47', 'admin'),
(4, 'Mahid', 'mahid@gmail.com', 1505216192, '$2y$10$Z5TkF8UNOtaZExINV9Joe.UJin9nZIHLKOc8tras9GKCWmadsIbQK', '2025-10-14 01:27:56', '2025-10-14 01:27:56', 'admin'),
(5, 'Sara Islam', 'sara@gmail.com', 1502346690, '$2y$10$IvOWpDkjTBBgs2EwUQW8BuwhBRGE3xT88QZvcz0AkQREZroZmno6q', '2025-10-15 19:25:00', '2025-10-15 19:25:00', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
