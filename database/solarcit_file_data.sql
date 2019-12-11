-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 11:21 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solarcit_file_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `logo_admin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `logo_admin`) VALUES
(1, 'total'),
(2, 'solarplay');

-- --------------------------------------------------------

--
-- Table structure for table `file_data`
--

CREATE TABLE `file_data` (
  `id_filedata` int(11) NOT NULL,
  `dateinsertion` datetime NOT NULL DEFAULT current_timestamp(),
  `filename` varchar(255) NOT NULL,
  `Upv1` float NOT NULL,
  `Upv2` float NOT NULL,
  `Ipv1` float NOT NULL,
  `Ipv2` float NOT NULL,
  `Uac` float NOT NULL,
  `Iac` float NOT NULL,
  `Status` float NOT NULL,
  `Error` float NOT NULL,
  `Temp` float NOT NULL,
  `cos` float NOT NULL,
  `fac` float NOT NULL,
  `Pac` float NOT NULL,
  `Qac` float NOT NULL,
  `Eac` float NOT NULL,
  `EDay` float NOT NULL,
  `ETotal` float NOT NULL,
  `CycleTime` float NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_data`
--

INSERT INTO `file_data` (`id_filedata`, `dateinsertion`, `filename`, `Upv1`, `Upv2`, `Ipv1`, `Ipv2`, `Uac`, `Iac`, `Status`, `Error`, `Temp`, `cos`, `fac`, `Pac`, `Qac`, `Eac`, `EDay`, `ETotal`, `CycleTime`, `fk_user`) VALUES
(87, '2019-11-18 17:24:27', 'data/min191118.csv', 224.3, 0, 1.36, 0, 218, 1.349, 512, 0, 25.7, 1, 50.01, 0.29, 0.002, 0.03, 1, 133.38, 5, 13),
(88, '2019-11-18 17:34:15', 'data/min191118.csv', 224.3, 0, 1.36, 0, 218, 1.349, 512, 0, 25.7, 1, 50.01, 0.29, 0.002, 0.03, 1, 133.38, 5, 11),
(89, '2019-11-18 16:53:17', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
(90, '2019-11-19 11:19:42', 'data/min191119.csv', 245.6, 0, 0.62, 0, 218.8, 0.656, 512, 0, 22.1, 1, 49.98, 0.135, 0.001, 0, 0.04, 133.9, 5, 11),
(91, '2019-11-19 09:36:37', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15),
(92, '2019-11-19 11:18:41', 'data/min191119.csv', 245.6, 0, 0.62, 0, 218.8, 0.656, 512, 0, 22.1, 1, 49.98, 0.135, 0.001, 0, 0.04, 133.9, 5, 15),
(93, '2019-11-19 11:18:41', 'data/min191119.csv', 245.6, 0, 0.62, 0, 218.8, 0.656, 512, 0, 22.1, 1, 49.98, 0.135, 0.001, 0, 0.04, 133.9, 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `type_user` varchar(25) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `D_area` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `num_tel` varchar(25) NOT NULL,
  `solutions` varchar(25) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `CD` varchar(25) NOT NULL,
  `city_id` int(11) NOT NULL,
  `logo_user` varchar(255) NOT NULL,
  `background_img_user` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `meteo` varchar(25) NOT NULL,
  `dossier` varchar(255) NOT NULL,
  `type_clock` varchar(25) NOT NULL,
  `type_data_logger` varchar(25) NOT NULL,
  `fk_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `type_user`, `nom`, `D_area`, `email`, `num_tel`, `solutions`, `username`, `password`, `adresse`, `CD`, `city_id`, `logo_user`, `background_img_user`, `titre`, `meteo`, `dossier`, `type_clock`, `type_data_logger`, `fk_admin`) VALUES
(11, 'user', 'atakadaw', 'commerce', 'atacadaw@gmail.com', '0522278965', 'myoption1', 'atakadaw', '123456789', 'Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09nnn', 'casablanca', 18374, 'atakadaw.png', '', 'Le batiment utilise de l\'energie solaire 10', 'weather1', 'data', 'clock2', 'logger1', 1),
(12, 'admin', 'total', 'commerce', 'total@gmail.com', '0698745632', 'myoption1', 'total', '123456789', 'Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09nnn', 'casablanca', 0, 'total.png', '', '', '', '', '', '', 1),
(13, 'user', 'adiwatta', 'energie', 'adiwat@gmail.com', '0522278965', 'myoption1', 'adiwatt', '123456789', 'Blda Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09', 'paris', 0, 'adiwatt-logo.png', '', 'Le batiment utilise de l\'energie solaire ', 'weather2', 'data', 'clock1', 'logger2', 1),
(15, 'user', 'emirates', 'energie', 'emirates@gmail.com', '0522278965', 'myoption1', 'emirates', '123456789', 'Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09nnn', 'casablanca', 0, '', '', 'Le batiment utilise de l\'energie solaire ', 'weather1', 'data', 'clock1', 'logger1', 1),
(16, 'user', 'test', 'solaire', 'test@gmail.com', '0522278965', 'myoption2', 'test', '123456789', 'Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09nnn', '', 0, '', '', '', '', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `file_data`
--
ALTER TABLE `file_data`
  ADD PRIMARY KEY (`id_filedata`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_admin` (`fk_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `file_data`
--
ALTER TABLE `file_data`
  MODIFY `id_filedata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file_data`
--
ALTER TABLE `file_data`
  ADD CONSTRAINT `file_data_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`fk_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
