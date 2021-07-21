-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 04:33 PM
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
('EV60f1346c83ae3', '2021-07-29 10:07:00', 'johan', 'pexels-photo-1323206.jpeg', 222),
('EV60f141d5adb81', '2021-06-30 02:25:00', 'j3', '1c8f44815997be7cc57bed9f0e0185d0.jpg', 234),
('EV60f14323a33ef', '2021-07-16 00:28:00', 'aggdfgb', 'cover.jpg', 234),
('EV60f143819ec82', '2021-07-16 01:29:00', 'aggdfgb', 'ba_cklit.jpg', 456),
('EV60f14b1d6d1f2', '2021-07-16 11:04:00', 'aggdfgb', 'trust.png', NULL),
('EV60f546b6d3eb3', '2021-07-06 11:34:00', 'aggdfgb', 'noimage.jpg', 123);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `idreservations` varchar(50) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `phone_nr` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `total_persons` int(5) NOT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `event_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`idreservations`, `name`, `lastname`, `phone_nr`, `email`, `total_persons`, `payment_status`, `event_id`) VALUES
('RE60f801c32e6cc', 'sony  headphones', 'uyt', '2147483647', 'nimilap650@labebx.com', 7, 0, 'EV60f143819ec82'),
('RE60f8042ff3007', 'aa', 'uytjhfh', '2147483647', 'saded82633@whipjoy.com', 4, 0, 'EV60f143819ec82'),
('RE60f8046ddd6de', 'sony  headphones', 'uyt', '2147483647', 'saded82633@whipjoy.com', 3, 0, 'EV60f143819ec82'),
('RE60f804a9793c4', 'sony  headphones', 'uyt', '2147483647', 'saded82633@whipjoy.com', 1, 1, 'EV60f143819ec82'),
('RE60f805179f31d', 'aa updated', 'uytjhfh updated', '12589999', 'updated@labebx.com', 34, 1, 'EV60f143819ec82'),
('RE60f80530f12d0', 'beast  headphones', 'uyt', '2147483647', 'saded82633@whipjoy.com', 4, 0, 'EV60f14323a33ef');

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
