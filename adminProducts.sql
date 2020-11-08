-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2020 at 07:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminProducts`
--

-- --------------------------------------------------------

--
-- Table structure for table `PrimaryInformationProduct`
--

CREATE TABLE `PrimaryInformationProduct` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Codigo_de_proveedor` int(11) NOT NULL,
  `Codigo_de_barras` bigint(30) NOT NULL,
  `Stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PrimaryInformationProduct`
--

INSERT INTO `PrimaryInformationProduct` (`id`, `Nombre`, `Codigo_de_proveedor`, `Codigo_de_barras`, `Stock`, `created_at`, `updated_at`) VALUES
(1, 'Sachet de leche', 5588, 7705588841641, 25, '2020-08-31 00:46:58', '2020-08-31 05:47:37'),
(2, 'Pan lactal', 5588, 7705588751568, 30, '2020-08-31 03:06:14', '2020-08-31 03:50:41'),
(3, 'Jugo en botella', 5588, 7705588148955, 25, '2020-08-31 04:23:39', '0000-00-00 00:00:00'),
(4, 'Atún en lata', 5588, 7705588489645, 20, '2020-08-31 04:24:52', '0000-00-00 00:00:00'),
(5, 'Shampoo', 5588, 7705588456180, 10, '2020-08-31 04:26:08', '2020-08-31 12:02:46'),
(6, 'Sachet de yogurt', 5588, 7705588478915, 15, '2020-08-31 04:27:22', '0000-00-00 00:00:00'),
(7, 'Dulce de Leche', 5588, 7705588134620, 20, '2020-08-31 04:28:45', '0000-00-00 00:00:00'),
(8, 'Arroz en paquete', 5588, 7705588418942, 10, '2020-08-31 04:30:57', '0000-00-00 00:00:00'),
(9, 'Cereales en paquete', 5588, 7705588815543, 20, '2020-08-31 11:37:26', '0000-00-00 00:00:00'),
(10, 'Bolas de Mani', 5588, 7705588124560, 50, '2020-08-31 11:39:38', '0000-00-00 00:00:00'),
(11, 'Harina', 5588, 7705588412650, 23, '2020-08-31 11:43:00', '0000-00-00 00:00:00'),
(12, 'Galletas en paquete', 5588, 7705588741538, 20, '2020-08-31 11:48:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `SecondaryInformationProduct`
--

CREATE TABLE `SecondaryInformationProduct` (
  `Codigo_de_barras` bigint(30) NOT NULL,
  `Stock` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `SecondaryInformationProduct`
--

INSERT INTO `SecondaryInformationProduct` (`Codigo_de_barras`, `Stock`) VALUES
(7705588841641, 20),
(7705588841641, 19),
(7705588751568, 20),
(7705588751568, 20),
(7705588751568, 22),
(7705588751568, 30),
(7705588841641, 20),
(7705588148955, 25),
(7705588489645, 20),
(7705588456180, 5),
(7705588478915, 15),
(7705588134620, 20),
(7705588418942, 10),
(7705588841641, 20),
(7705588841641, 20),
(7705588841641, 25),
(7705588815543, 20),
(7705588124560, 50),
(7705588412650, 23),
(7705588741538, 20),
(7705588456180, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `PrimaryInformationProduct`
--
ALTER TABLE `PrimaryInformationProduct`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `PrimaryInformationProduct`
--
ALTER TABLE `PrimaryInformationProduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
