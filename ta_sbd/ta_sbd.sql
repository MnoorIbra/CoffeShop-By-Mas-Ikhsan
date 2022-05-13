-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 03:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_sbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `coffee`
--

CREATE TABLE `coffee` (
  `id_coffee` int(3) NOT NULL,
  `nama_coffee` varchar(100) NOT NULL,
  `harga_coffee` int(10) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0',
  `is_order` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coffee`
--

INSERT INTO `coffee` (`id_coffee`, `nama_coffee`, `harga_coffee`, `is_delete`, `is_order`) VALUES
(1, 'Cappuccino', 44000, b'0', b'1'),
(2, 'Espresso', 24000, b'0', b'1'),
(3, 'Americano', 34000, b'0', b'1'),
(4, 'Caramel Macchiato', 57000, b'0', b'1'),
(5, 'Caffe Latte', 44000, b'0', b'1'),
(6, 'Caffe Mocha', 53000, b'0', b'1'),
(7, 'Vanilla', 44000, b'0', b'1'),
(8, 'Mocha', 44000, b'0', b'1'),
(10, 'Black Coffee', 35000, b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(12) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', '0192023a7bbd73250516f069df18b500'),
('admin1', 'e00cf25ad42683b3df678c61f42c6bda'),
('admin123', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `kode_paket` varchar(5) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga_paket` int(10) NOT NULL,
  `id_coffee` int(3) NOT NULL,
  `id_pastries` int(3) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0',
  `is_order` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`kode_paket`, `nama_paket`, `harga_paket`, `id_coffee`, `id_pastries`, `is_delete`, `is_order`) VALUES
('1A', 'Morning 1', 105000, 1, 1, b'0', b'0'),
('1B', 'Morning 2', 70000, 2, 2, b'0', b'0'),
('1C', 'Morning 3', 75000, 3, 3, b'0', b'0'),
('1D', 'Morning 4', 80000, 4, 4, b'0', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `pastries`
--

CREATE TABLE `pastries` (
  `id_pastries` int(3) NOT NULL,
  `nama_pastries` varchar(100) NOT NULL,
  `harga_pastries` int(10) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0',
  `is_order` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pastries`
--

INSERT INTO `pastries` (`id_pastries`, `nama_pastries`, `harga_pastries`, `is_delete`, `is_order`) VALUES
(1, 'Bagel', 57000, b'0', b'0'),
(2, 'Bear Claw', 57000, b'0', b'0'),
(3, 'Cookies', 44000, b'0', b'0'),
(4, 'Croissant', 38000, b'0', b'0'),
(5, 'Muffins', 68000, b'0', b'0'),
(6, 'Raspberry Bar', 68000, b'0', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coffee`
--
ALTER TABLE `coffee`
  ADD PRIMARY KEY (`id_coffee`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`kode_paket`),
  ADD KEY `FK_coffee` (`id_coffee`),
  ADD KEY `FK_pastries` (`id_pastries`);

--
-- Indexes for table `pastries`
--
ALTER TABLE `pastries`
  ADD PRIMARY KEY (`id_pastries`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coffee`
--
ALTER TABLE `coffee`
  MODIFY `id_coffee` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pastries`
--
ALTER TABLE `pastries`
  MODIFY `id_pastries` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `FK_coffee` FOREIGN KEY (`id_coffee`) REFERENCES `coffee` (`id_coffee`),
  ADD CONSTRAINT `FK_pastries` FOREIGN KEY (`id_pastries`) REFERENCES `pastries` (`id_pastries`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
