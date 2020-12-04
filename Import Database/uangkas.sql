-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 04:42 PM
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
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `ids` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`ids`, `id`, `keterangan`, `tanggal`) VALUES
(2, 8, 'masuk 1', '2020-12-04'),
(3, 9, 'keluar 1', '2020-12-05'),
(4, 10, 'keluar 2', '2020-12-04'),
(5, 11, 'masuk 2', '2020-12-05'),
(6, 12, 'masuk 3', '2020-12-06'),
(7, 13, 'keluar 3', '2020-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_detail`
--

CREATE TABLE `jurnal_detail` (
  `ids` int(11) NOT NULL,
  `id_jurnal` varchar(255) DEFAULT NULL,
  `kredit` int(255) DEFAULT NULL,
  `debit` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jurnal_detail`
--

INSERT INTO `jurnal_detail` (`ids`, `id_jurnal`, `kredit`, `debit`) VALUES
(1, '1', 0, 100000),
(2, '2', 0, 150000),
(3, '3', 5000, 0),
(4, '4', 10000, 0),
(5, '5', 0, 250000),
(6, '6', 0, 100000),
(7, '7', 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tipe` enum('masuk','keluar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id`, `id_transaksi`, `keterangan`, `tanggal`, `jumlah`, `tipe`) VALUES
(8, '', 'masuk 1', '2020-12-04', 150000, 'masuk'),
(9, '', 'keluar 1', '2020-12-05', 5000, 'keluar'),
(10, '', 'keluar 2', '2020-12-04', 10000, 'keluar'),
(11, '', 'masuk 2', '2020-12-05', 250000, 'masuk'),
(12, '', 'masuk 3', '2020-12-06', 100000, 'masuk'),
(13, '', 'keluar 3', '2020-12-05', 100000, 'keluar');

--
-- Triggers `kas`
--
DELIMITER $$
CREATE TRIGGER `after_kas_insert` AFTER INSERT ON `kas` FOR EACH ROW BEGIN
	DECLARE id_jurnal INT;
         INSERT INTO jurnal(id, keterangan,tanggal)
        VALUES(NEW.id,NEW.keterangan,NEW.tanggal);
				

    select ids INTO id_jurnal
    from jurnal where id=NEW.id;
		
    IF NEW.tipe = 'keluar' THEN
		 INSERT INTO jurnal_detail(id_jurnal, kredit,debit)
        VALUES(id_jurnal,NEW.jumlah,0);
				ELSE
				 INSERT INTO jurnal_detail(id_jurnal, kredit,debit)
        VALUES(id_jurnal,0,NEW.jumlah);
		END IF;
END
$$
DELIMITER ;

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
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`ids`) USING BTREE;

--
-- Indexes for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  ADD PRIMARY KEY (`ids`) USING BTREE;

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
