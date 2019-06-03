-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 08:17 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rftc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'Ange', 'zaninka', 'nzanirinka@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `archive_id` int(10) NOT NULL,
  `ID` varchar(30) NOT NULL,
  `licence_drive_id` varchar(30) NOT NULL,
  `plack` varchar(18) NOT NULL,
  `road_id` varchar(10) NOT NULL,
  `time_leave` varchar(30) NOT NULL,
  `time_lease` varchar(40) NOT NULL,
  `date_done` varchar(89) NOT NULL,
  `status` varchar(78) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`archive_id`, `ID`, `licence_drive_id`, `plack`, `road_id`, `time_leave`, `time_lease`, `date_done`, `status`) VALUES
(6, '1199180144266025', '1199180144266098', 'RAV055V', '101', 'Taken at,08:26:58', 'Brought at,08:33:37', '12/02/2019', 'Free'),
(7, '1199180144266025', '1199180144266098', 'RAV055V', '101', 'Taken at,08:38:50', 'not available', '12/02/2019', 'Busy'),
(8, '1998874213568971', '1998874213568923', 'RAA250V', '201', 'Taken at,08:58:39', 'not available', '12/02/2019', 'Busy'),
(9, '1998874213598383', '1998874213598399', 'RAB088C', '101', 'Taken at,08:58:55', 'not available', '12/02/2019', 'Busy');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `plack` varchar(10) NOT NULL,
  `road_id` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`plack`, `road_id`, `status`) VALUES
('RAA250V', '201', 'OFF'),
('RAB088C', '101', 'OFF'),
('RAV055V', '101', 'OFF'),
('RAV340V', '201', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `ID` varchar(16) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`ID`, `f_name`, `l_name`) VALUES
('1199180144266025', 'Kwizera  ', 'Emmanuel'),
('1998874213568971', 'Thierry', 'Nyange'),
('1998874213598383', 'Bagabo', 'Derrick');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `licence_drive_id` varchar(20) NOT NULL,
  `plack` varchar(10) NOT NULL,
  `road_id` varchar(30) NOT NULL,
  `ID` varchar(16) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`licence_drive_id`, `plack`, `road_id`, `ID`, `category`) VALUES
('1199180144266098', 'RAV055V', '101', '1199180144266025', 'A'),
('1998874213568923', 'RAA250V', '201', '1998874213568971', 'B'),
('1998874213598399', 'RAB088C', '101', '1998874213598383', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `road`
--

CREATE TABLE `road` (
  `road_id` varchar(10) NOT NULL,
  `road_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `road`
--

INSERT INTO `road` (`road_id`, `road_name`) VALUES
('101', 'Kimironko-nyabugogo'),
('201', 'kimironko-mumugi');

-- --------------------------------------------------------

--
-- Table structure for table `setting_table`
--

CREATE TABLE `setting_table` (
  `setting_id` int(10) NOT NULL,
  `ID` varchar(16) NOT NULL,
  `licence_drive_id` varchar(20) NOT NULL,
  `plack` varchar(20) NOT NULL,
  `road_id` varchar(10) NOT NULL,
  `time_leave` varchar(40) NOT NULL,
  `time_lease` varchar(40) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_table`
--

INSERT INTO `setting_table` (`setting_id`, `ID`, `licence_drive_id`, `plack`, `road_id`, `time_leave`, `time_lease`, `status`) VALUES
(4, '1199180144266025', '1199180144266098', 'RAV055V', '101', 'Taken at,08:38:50', 'not available', 'Busy'),
(5, '1998874213568971', '1998874213568923', 'RAA250V', '201', 'Taken at,08:58:39', 'not available', 'Busy'),
(6, '1998874213598383', '1998874213598399', 'RAB088C', '101', 'Taken at,08:58:55', 'not available', 'Busy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`archive_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`plack`),
  ADD KEY `road_id` (`road_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`licence_drive_id`),
  ADD KEY `plack` (`plack`),
  ADD KEY `ID` (`ID`),
  ADD KEY `road_id` (`road_id`);

--
-- Indexes for table `road`
--
ALTER TABLE `road`
  ADD PRIMARY KEY (`road_id`);

--
-- Indexes for table `setting_table`
--
ALTER TABLE `setting_table`
  ADD PRIMARY KEY (`setting_id`),
  ADD KEY `ID` (`ID`),
  ADD KEY `permit` (`licence_drive_id`),
  ADD KEY `plack` (`plack`),
  ADD KEY `road_id` (`road_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `archive_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `setting_table`
--
ALTER TABLE `setting_table`
  MODIFY `setting_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`road_id`) REFERENCES `road` (`road_id`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`plack`) REFERENCES `bus` (`plack`),
  ADD CONSTRAINT `registration_ibfk_3` FOREIGN KEY (`ID`) REFERENCES `drivers` (`ID`),
  ADD CONSTRAINT `registration_ibfk_4` FOREIGN KEY (`road_id`) REFERENCES `road` (`road_id`);

--
-- Constraints for table `setting_table`
--
ALTER TABLE `setting_table`
  ADD CONSTRAINT `setting_table_ibfk_1` FOREIGN KEY (`licence_drive_id`) REFERENCES `registration` (`licence_drive_id`),
  ADD CONSTRAINT `setting_table_ibfk_2` FOREIGN KEY (`plack`) REFERENCES `bus` (`plack`),
  ADD CONSTRAINT `setting_table_ibfk_3` FOREIGN KEY (`road_id`) REFERENCES `road` (`road_id`),
  ADD CONSTRAINT `setting_table_ibfk_4` FOREIGN KEY (`ID`) REFERENCES `drivers` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
