-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 11:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation-manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `idevents` varchar(50) NOT NULL,
  `date` datetime DEFAULT NULL,
  `guest` varchar(60) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `ticket_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`idevents`, `date`, `guest`, `image`, `ticket_price`) VALUES
('EV60f1346c83ae3', '2021-07-07 09:25:00', 'aggdfgb', NULL, NULL),
('EV60f141d5adb81', '2021-07-16 00:22:00', 'aggdfgb', NULL, NULL),
('EV60f14323a33ef', '2021-07-16 00:28:00', 'aggdfgb', 'noimage.jpg', NULL),
('EV60f143819ec82', '2021-07-16 01:29:00', 'aggdfgb', 'noimage.jpg', NULL),
('EV60f144e84b050', '2021-07-16 10:35:00', 'aggdfgb', 'noimage.jpg', NULL),
('EV60f1450c1761e', '2021-07-22 10:36:00', 'aggdfgb', 'noimage.jpg', NULL),
('EV60f14589bb99d', '2021-07-16 00:38:00', 'aggdfgb', 'noimage.jpg', NULL),
('EV60f1468f30335', '2021-07-16 12:42:00', 'aggdfgb', 'noimage.jpg', NULL),
('EV60f14b1d6d1f2', '2021-07-16 11:04:00', 'aggdfgb', 'trust.png', NULL),
('EV60f546b6d3eb3', '2021-07-06 11:34:00', 'aggdfgb', 'noimage.jpg', 123);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `idreservations` varchar(50) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastame` varchar(45) NOT NULL,
  `phone_nr` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `total_persons` int(5) NOT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `event_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `zipcode`, `email`, `username`, `password`, `register_date`) VALUES
(1, 'Cardinal', '01913', 'jdoe@gmail.com', 'admin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2017-04-10 11:14:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`idevents`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`idreservations`),
  ADD KEY `event` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `event` FOREIGN KEY (`event_id`) REFERENCES `events` (`idevents`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
