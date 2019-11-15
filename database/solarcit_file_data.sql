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

CREATE DATABASE solarcit_file_data;
USE solarcit_file_data;

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
  `CycleTime` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_data`
--

INSERT INTO `file_data` (`id_filedata`, `dateinsertion`, `filename`, `Upv1`, `Upv2`, `Ipv1`, `Ipv2`, `Uac`, `Iac`, `Status`, `Error`, `Temp`, `cos`, `fac`, `Pac`, `Qac`, `Eac`, `EDay`, `ETotal`, `CycleTime`) VALUES
(56, '2019-10-28 17:19:59', 'data/min191028.csv', 108.6, 0, 5.84, 0, 228.4, 2.652, 512, 0, 30, 1, 50.04, 0.606, -0.009, 0.05, 0.25, 100.96, 5),
(57, '2019-10-21 18:40:00', 'data/min191021.csv', 0, 0, 0, 0, 0, 0, 40960, 0, 29.3, 0, 0, 0, 0, 0, 0.38, 89.21, 5),
(58, '2019-10-22 12:05:00', 'data/min191022.csv', 291.4, 0, 0.23, 0, 220.8, 0.247, 512, 0, 29.3, 0.994, 50.01, 0.012, 0, 0, 1.08, 90.29, 5),
(59, '2019-10-23 10:05:00', 'data/min191023.csv', 327.2, 0, 0.23, 0, 224.6, 0.609, 512, 0, 26.5, 1, 49.96, 0.129, 0.002, 0.01, 0.11, 90.67, 5),
(60, '2019-10-24 09:15:00', 'data/min191024.csv', 308.4, 0, 0.23, 0, 225.6, 0.438, 512, 0, 25.4, 0.997, 50.03, 0.079, 0, 0, 0.05, 91.7, 5),
(61, '2019-10-25 18:40:00', 'data/min191025.csv', 0, 0, 0, 0, 0, 0, 40960, 0, 28.8, 0, 0, 0, 0, 0, 2.48, 96.46, 5),
(62, '2019-10-26 00:00:00', 'data/min191026.csv', 0, 0, 0, 0, 0, 0, 40960, 0, 30.3, 0, 0, 0, 0, 0, 2.09, 98.55, 5),
(63, '2019-10-27 18:30:00', 'data/min191027.csv', 0, 0, 0, 0, 0, 0, 40960, 0, 30.03, 0, 0, 0, 0, 0, 2.16, 100.71, 5),
(64, '2019-10-29 16:50:10', 'data/min191029.csv', 308, 0, 0.24, 0, 232.6, 0.416, 512, 0, 28.7, 1, 50.01, 0.076, -0.001, 0.01, 0.05, 102.75, 5),
(65, '2019-10-30 16:47:33', 'data/min191030.csv', 95.8, 0, 0.95, 0, 227.5, 0.4, 512, 0, 29.5, 1, 50.01, 0.068, -0.003, 0.02, 0.19, 104.89, 5),
(66, '2019-10-31 16:58:49', 'data/min191031.csv', 254.1, 0, 0.2, 0, 226, 0.241, 512, 0, 29.4, 0.998, 49.97, 0.027, 0, 0.01, 1.82, 108.42, 5),
(67, '2019-11-01 13:38:37', 'data/min191101.csv', 137.7, 0, 1.53, 0, 218.5, 0.839, 512, 0, 30.7, 1, 49.97, 0.173, 0, 0.03, 0.35, 108.79, 5),
(68, '2019-11-03 15:45:47', 'data/min191103.csv', 0, 0, 0, 0, 0, 0, 40960, 0, 29.3, 0, 0, 0, 0, 0, 0.38, 89.21, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_data`
--
ALTER TABLE `file_data`
  ADD PRIMARY KEY (`id_filedata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_data`
--
ALTER TABLE `file_data`
  MODIFY `id_filedata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
