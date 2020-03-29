-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 24, 2020 at 12:51 PM
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
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `user_id`, `house_code`, `title`, `purpose`, `time`, `country`, `city`, `address`, `measurement`, `bedroom`, `pictures`, `price`, `size`, `bathroom`, `description`, `updated_at`, `created_at`, `status`) VALUES
(1, 2, 'bca52e5effafea2e91fff7c0f0bfabbb', 'LAYERS UPON LAYERS', 'sale', '2231-01-01', 'CA', 'CA', 'Upper Road 3411, no.34 CA', 'sq ft', 6, '[\"84b3a48db8733c36707100bbf41f71cd.jpg\", \"cS-1.jpg\", \"cS-2.jpg\", \"cS-3.jpg\"]', 1234, 34, 3, 'Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.', '2020-03-19 14:34:23', '2020-03-17 00:05:47', 1),
(2, 2, 'bb1c3f6e32b8b65fd855bf9c88363f05', 'Test', 'sale', '2001-12-01', '12', 'UA', '22ST', 'sq ft', 0, '[\"a3edf3b2626903d8d6afc23e72164d70.jpg\",\"d91ec5539584e8e133c9351429075abf.jpg\"]', 123, 123, 0, 'Since Bootstrap is developed to be mobile first, we use a handful of media queries to create sensible breakpoints for our layouts and interfaces. These breakpoints are mostly based on minimum viewport widths and allow us to scale up elements as the viewport changes.', '2020-03-22 15:24:33', '2020-03-19 01:31:28', 1),
(3, 2, '374eccdb3cca30384db5e1a17a2ff6df', 'Test 2', 'rent', '2303-03-01', 'CA', 's1', 'Test ST', 'sq ft', 0, '[\"969677fd14a6d764bd6663037225c89a.jpg\",\"f39cab1941c347013617e4c6be668ff3.jpg\",\"062afe17dc8b9b49b9025627889ea626.jpg\"]', 33, 2323, 0, 'Since Bootstrap is developed to be mobile first, we use a handful of media queries to create sensible breakpoints for our layouts and interfaces. These breakpoints are mostly based on minimum viewport widths and allow us to scale up elements as the viewport changes.', '2020-03-24 12:37:42', '2020-03-19 01:36:44', 1),
(4, 2, '38a01ec0aefbb86f6ed4e24d2076a94e', '123', 'rent', '0002-02-01', '123', '123', '123', 'm2', 2, '[\"eb5bf8367fb272c8ed98625d0667e865.jpg\",\"b48a7561eebe734a85a81eab6758917b.jpg\"]', 123, 123, 0, 'Since Bootstrap is developed to be mobile first, we use a handful of media queries to create sensible breakpoints for our layouts and interfaces. These breakpoints are mostly based on minimum viewport widths and allow us to scale up elements as the viewport changes.', '2020-03-22 15:24:36', '2020-03-20 20:33:13', 1),
(5, 2, 'fbf2bac76d89d7ae6b37f16f47bc06c9', 'sadf', 'sale', '0234-02-01', '234', '234', '234', 'sq ft', 4, '[\"8c67948c76412910b20a56ee999b6bd2.jpg\",\"62fa2d689ff026e78fb895e3ed3b8a0f.jpg\",\"4c3a37f357042d3c28eba863495db22e.jpg\"]', 234, 234, 0, 'Since Bootstrap is developed to be mobile first, we use a handful of media queries to create sensible breakpoints for our layouts and interfaces. These breakpoints are mostly based on minimum viewport widths and allow us to scale up elements as the viewport changes.', '2020-03-22 15:24:39', '2020-03-20 20:56:12', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
