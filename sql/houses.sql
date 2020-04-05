-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 30, 2020 at 04:48 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `icosmoco_cosmo`
--

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `house_code` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `measurement` varchar(255) DEFAULT NULL,
  `bedroom` int(2) DEFAULT NULL,
  `pictures` text,
  `price` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `bathroom` int(2) DEFAULT NULL,
  `description` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `user_id`, `house_code`, `title`, `purpose`, `time`, `country`, `city`, `address`, `measurement`, `bedroom`, `pictures`, `price`, `size`, `bathroom`, `description`, `updated_at`, `created_at`, `status`) VALUES
(3, 2, '374eccdb3cca30384db5e1a17a2ff6df', '3 bed semi-detached house', 'rent', '2303-03-01', 'CA', 'Urben', 'Tonkin ST, No 32', 'sq ft', 0, '[\"969677fd14a6d764bd6663037225c89a.jpg\",\"f39cab1941c347013617e4c6be668ff3.jpg\",\"062afe17dc8b9b49b9025627889ea626.jpg\"]', 33, 232, 0, 'An extremely well-presented family home, located in the affluent area of Yeadon. Having three fantastic bedrooms, a beautiful open-plan kitchen and dining area. Alongside outstanding garden space, off street parking and excellent links to Yeadon\'s busy High Street - perfect for young families!', '2020-03-24 13:38:56', '2020-03-19 01:36:44', 1),
(6, 2, '67e566faf518ffbf4b6a580c4f401d0c', '3 bed detached bungalow', 'sale', '3232-03-01', 'UK', 'Paris', 'ABC ST', 'sq ft', 0, '[\"cc5e6cb17187e65413286f53091b6692.jpg\"]', 23, 1231, 0, 'This property is offered at a reduced price for people aged over 60 through Homewise´s Home for Life Plan. Through the Home for Life Plan, anyone aged over sixty can purchase a lifetime lease on this property which discounts the price from its full market value.', '2020-03-30 14:42:18', '2020-03-24 21:50:27', 0),
(7, 2, 'adf54587ba490121be2c7b814d02e128', 'test', 'sale', '3232-02-01', 'w', '123', 'adf', 'sq ft', 0, '[\"4b7141a9dbd67eb3c28b2b94874e24d5.jpg\",\"3483afa8574c889151ca09fde46a1db3.jpg\",\"1887ee8dba3f934f46cf99740cc2a410.jpg\",\"050cbb967f22247bb6c69c6eb7b45bf1.jpg\"]', 123, 2, 0, 'adfasd', '2020-03-28 10:46:53', '2020-03-28 18:46:53', 1),
(8, 2, '97457ddce2b18f304be4874424cf3687', '35', 'sale', '2009-03-01', '12', '45', 'y5r', 'sq ft', 0, '[\"d00db13d2cf4d3ca5d9d7b495f71beb8.jpg\",\"e6e9b28869d9a14cf4ce9d1d4f0a5b21.jpg\",\"c38f98f4f0b736376bc01bfe3d19ca6e.jpg\"]', 453, 35, 0, 'gfj', '2020-03-28 11:00:41', '2020-03-28 19:00:41', 1),
(9, 2, '038aa8ba2ee1619dbeec42a2bf469f9a', '234', 'sale', '3232-02-01', '23', '23', '23', 'sq ft', 0, '[\"ee90430c8022b5d97421a371977c4575.jpg\",\"e22f755b53b424faeea15a77a3af32b4.jpg\",\"090c2b1725905bfd47afc9c238e601b8.jpg\"]', 234, 23, 0, ' 23', '2020-03-30 16:33:29', '2020-03-28 19:09:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `role` int(1) DEFAULT '2',
  `phone_no` varchar(255) DEFAULT NULL,
  `estate_agent_phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`, `remember_token`, `email_verified_at`, `profile_img`, `role`, `phone_no`, `estate_agent_phone`) VALUES
(2, 'Admin', 'admin@icosmo.co', '$2y$10$b0tC8wXG.CoeddKCqEgWROdHXESEn7FMlmKysJzlC4TGYSyY7S8ZO', '2020-03-24 13:24:15', '2020-03-14 10:00:35', NULL, '2020-03-21 16:08:01', '294b995c0053d353da7513e9c3dfbc3b.jpg', 0, '', ''),
(8, 'Investor', 'investor@icosmo.co', '$2y$10$taGMfXU3Mb/gX4qZTOYv9ONEJOLvq5fwKPmskvF2IVjqfIXQ1BC3u', '2020-03-30 14:30:09', '2020-03-21 10:06:09', NULL, '2020-03-21 18:06:09', NULL, 3, '', ''),
(64, 'Renter', 'renter@icosmo.co', '$2y$10$gpsVTzm/0unywhVeYhGV/.dfgRLYIR6qNV3uPdbuwFBquy16n5YQ.', '2020-03-24 12:46:24', '2020-03-22 15:36:31', NULL, '2020-03-22 15:37:26', NULL, 4, '1231231', '1231231'),
(65, 'Agent', 'agent@icosmo.co', '$2y$10$Vm21jXlqOXUUyN4F5gpPGONagaX0sNBZx9EipFFBr01V65KJX06DW', '2020-03-30 14:21:59', '2020-03-30 14:20:40', NULL, '2020-03-22 15:37:26', NULL, 1, '88888888', '007007007'),
(66, 'Landlord', 'landlord@icosmo.co', '$2y$10$sapQ2pA0K4deC1q9ioNlGe4UJ2WoDAdkTY9/4Gx2oF8U8sTHh/LUC', '2020-03-30 14:28:48', '2020-03-30 14:27:57', NULL, '2020-03-22 15:37:26', NULL, 2, '8888888', 'landlord');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
