-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:pma__favorite
-- Generation Time: Nov 13, 2020 at 02:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recomercem`
--
CREATE DATABASE IF NOT EXISTS `recomercem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `recomercem`;

-- --------------------------------------------------------

--
-- Table structure for table `comerc`
--
-- Creation: Nov 13, 2020 at 12:58 PM
--

DROP TABLE IF EXISTS `comerc`;
CREATE TABLE `comerc` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(70) NOT NULL,
  `intro` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `tickets_max` smallint(5) UNSIGNED NOT NULL,
  `tickets_disponible` smallint(5) UNSIGNED NOT NULL,
  `tickets_reservado` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `comerc`:
--

-- --------------------------------------------------------

--
-- Table structure for table `juego`
--
-- Creation: Nov 13, 2020 at 11:35 AM
--

DROP TABLE IF EXISTS `juego`;
CREATE TABLE `juego` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `juego`:
--

-- --------------------------------------------------------

--
-- Table structure for table `oferta`
--
-- Creation: Nov 13, 2020 at 12:17 PM
--

DROP TABLE IF EXISTS `oferta`;
CREATE TABLE `oferta` (
  `id` int(11) NOT NULL,
  `id_comerc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `oferta`:
--   `id_comerc`
--       `comerc` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `partida`
--
-- Creation: Nov 13, 2020 at 12:12 PM
--

DROP TABLE IF EXISTS `partida`;
CREATE TABLE `partida` (
  `id_juego` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `puntuacion_tot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `partida`:
--   `id_juego`
--       `juego` -> `id`
--   `id_usuario`
--       `usuario` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--
-- Creation: Nov 13, 2020 at 12:47 PM
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `id` char(40) NOT NULL,
  `id_comerc` int(11) NOT NULL,
  `fecha_emision` int(10) UNSIGNED NOT NULL,
  `fecha_canje` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `ticket`:
--   `id_comerc`
--       `comerc` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--
-- Creation: Nov 13, 2020 at 11:34 AM
-- Last update: Nov 13, 2020 at 11:30 AM
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `usuario`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comerc`
--
ALTER TABLE `comerc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comerc` (`id_comerc`);

--
-- Indexes for table `partida`
--
ALTER TABLE `partida`
  ADD KEY `id_juego` (`id_juego`) USING BTREE,
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comerc` (`id_comerc`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `oferta_ibfk_1` FOREIGN KEY (`id_comerc`) REFERENCES `comerc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partida`
--
ALTER TABLE `partida`
  ADD CONSTRAINT `partida_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partida_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_comerc`) REFERENCES `comerc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
