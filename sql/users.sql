-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 24, 2020 at 12:50 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `icosmoco_cosmo`
--

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
(2, 'Admin', 'admin@icosmo.co', '$2y$10$b0tC8wXG.CoeddKCqEgWROdHXESEn7FMlmKysJzlC4TGYSyY7S8ZO', '2020-03-24 04:41:33', '2020-03-14 10:00:35', NULL, '2020-03-21 16:08:01', '294b995c0053d353da7513e9c3dfbc3b.jpg', 2, '', ''),
(8, 'Investor', 'investor@icosmo.co', '$2y$10$taGMfXU3Mb/gX4qZTOYv9ONEJOLvq5fwKPmskvF2IVjqfIXQ1BC3u', '2020-03-24 12:46:09', '2020-03-21 10:06:09', NULL, '2020-03-21 18:06:09', NULL, 2, '', ''),
(64, 'Renter', 'renter@icosmo.co', '$2y$10$gpsVTzm/0unywhVeYhGV/.dfgRLYIR6qNV3uPdbuwFBquy16n5YQ.', '2020-03-24 12:46:24', '2020-03-22 15:36:31', NULL, '2020-03-22 15:37:26', NULL, 4, '1231231', '1231231');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
