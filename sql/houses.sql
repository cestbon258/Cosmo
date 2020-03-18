-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 18, 2020 at 05:38 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cosmos`
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
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `user_id`, `house_code`, `title`, `purpose`, `time`, `country`, `city`, `address`, `measurement`, `bedroom`, `pictures`, `price`, `size`, `bathroom`, `description`, `updated_at`, `created_at`, `status`) VALUES
(1, 2, 'bca52e5effafea2e91fff7c0f0bfabbb', 'My Dream House', 'sale', '2231-01-01', 'CA', 'CA', 'Upper Road 3411, no.34 CA', 'sq ft', 6, '[\"84b3a48db8733c36707100bbf41f71cd.jpg\", \"cS-1.jpg\", \"cS-2.jpg\", \"cS-3.jpg\"]', 1234, 34, 3, 'Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.', '2020-03-18 17:11:35', '2020-03-17 00:05:47', 1),
(2, 2, 'bb1c3f6e32b8b65fd855bf9c88363f05', 'Test', 'sale', '2001-12-01', '12', 'UA', '22ST', 'sq ft', 0, '[\"a3edf3b2626903d8d6afc23e72164d70.jpg\",\"d91ec5539584e8e133c9351429075abf.jpg\"]', 123, 123, 0, 'free to get', '2020-03-18 17:31:28', '2020-03-19 01:31:28', 1),
(3, 2, '374eccdb3cca30384db5e1a17a2ff6df', 'Test 2', 'sale', '2303-03-01', 'CA', 's1', 'Test ST', 'sq ft', 0, '[\"969677fd14a6d764bd6663037225c89a.jpg\",\"f39cab1941c347013617e4c6be668ff3.jpg\",\"062afe17dc8b9b49b9025627889ea626.jpg\"]', 33, 2323, 0, 'nothing', '2020-03-18 17:36:44', '2020-03-19 01:36:44', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
