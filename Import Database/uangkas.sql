-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 01:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uangkas`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id`, `keterangan`, `tanggal`, `jumlah`) VALUES
(1, 'Konsumsi', '2020-11-30', 100000),
(2, 'Transportasi', '2020-12-10', 40000),
(4, 'Konsumsi 2', '2020-12-09', 250000),
(5, 'Transportasi 2', '2020-12-12', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id`, `keterangan`, `tanggal`, `jumlah`) VALUES
(1, 'Kas Mingguan 1', '2020-11-29', 130000),
(2, 'Kas Mingguan 2', '2020-12-06', 170000),
(4, 'Sponsor 1', '2020-12-11', 1000000),
(5, 'Donasi', '2020-12-12', 50000),
(6, 'Hadiah', '2020-12-08', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(8, 'Amjad Aziz', 'a@gmail.com', 'default.png', '$2y$10$YmKf8VPp1WZoD2FH8HEKyOiN1R9LBhxOFWqUn2O33L9ie1e3mHtX6', 1, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
