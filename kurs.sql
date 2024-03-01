-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2023 at 12:05 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kurs`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id_card` int(11) NOT NULL,
  `id_kategory` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kategory`
--

CREATE TABLE `kategory` (
  `id_kategory` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategory`
--

INSERT INTO `kategory` (`id_kategory`, `name`, `photo`) VALUES
(1, 'Холодные закуски', 'images/menu1.jpg'),
(2, 'Салаты', 'images/popular1.jpg'),
(3, 'Горячие закуски', 'images/menu3.jpg'),
(4, 'Супы', 'images/menu4.jpg'),
(5, 'Горячие блюда', 'images/menu5.jpg'),
(6, 'Паста', 'images/menu6.jpg'),
(7, 'Десерты', 'images/menu7.jpg'),
(8, 'Холодные напитки', 'images/menu8.jpg'),
(9, 'Горячие напитки', 'images/menu9.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id_card`),
  ADD KEY `id_kategory` (`id_kategory`);

--
-- Indexes for table `kategory`
--
ALTER TABLE `kategory`
  ADD PRIMARY KEY (`id_kategory`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id_card` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategory`
--
ALTER TABLE `kategory`
  MODIFY `id_kategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
