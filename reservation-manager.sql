-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 01:18 PM
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
('EV60f14b1d6d1f2', '2021-07-16 11:04:00', 'aggdfgb', 'img-event-1626944138.png', 456),
('EV60f546b6d3eb3', '2021-07-06 11:34:00', 'aggdfgb', 'noimage.jpg', 123),
('EV60f922d67913a', '2021-07-23 11:48:00', 'johan', 'noimage.jpg', 234),
('EV60f9231bc7fb8', '2021-07-22 11:49:00', 'johan', 'noimage.jpg', 456),
('EV60f9238d8b616', '2021-07-05 09:51:00', 'johan', 'skrill.png', 456),
('EV60f928aca4ba5', '2021-07-19 10:12:00', 'johan', 'img-event-1626941566png', 234),
('EV60f928ed6a42e', '2021-06-29 10:14:00', 'aggdfgb', 'img-event-1626943795.png', 234);

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
  `event_id` varchar(50) NOT NULL,
  `qr_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`idreservations`, `name`, `lastname`, `phone_nr`, `email`, `total_persons`, `payment_status`, `event_id`, `qr_image`) VALUES
('RE60f8046ddd6de', 'sony  headphones', 'uyt', '2147483647', 'saded82633@whipjoy.com', 3, 0, 'EV60f143819ec82', NULL),
('RE60f804a9793c4', 'sony  headphones', 'uyt', '2147483647', 'saded82633@whipjoy.com', 1, 1, 'EV60f143819ec82', NULL),
('RE60f805179f31d', 'aa updated', 'uytjhfh updated', '12589999', 'updated@labebx.com', 34, 1, 'EV60f143819ec82', NULL),
('RE60f93615649c5', 'aa', 'uyt', '13265978624164', 'saded82633@whipjoy.com', 3, 0, 'EV60f143819ec82', NULL),
('RE60f9370bdb518', 'aa', 'uyt', '13265978624164', 'saded82633@whipjoy.com', 3, 0, 'EV60f143819ec82', NULL),
('RE60f9382fac54b', 'aa', 'uyt', '13265978624164', 'saded82633@whipjoy.com', 3, 0, 'EV60f143819ec82', NULL),
('RE60f93c78d120c', 'beast  headphones', 'uytjhfh', '111111111111', 'saded82633@whipjoy.com', 545, 1, 'EV60f143819ec82', NULL),
('RE60f93d136cbc3', 'aa', 'uytjhfh', '13265978624164', 'nimilap650@labebx.com', 5565, 1, 'EV60f143819ec82', NULL),
('RE60f941f1dcf45', 'beast  headphones', 'uytjhfh', '21474836473', 'saded82633@whipjoy.com', 55, 1, 'EV60f143819ec82', NULL),
('RE60f9433cafec7', 'beast  headphones', 'uytjhfh', '21474836473', 'saded82633@whipjoy.com', 55, 1, 'EV60f143819ec82', 'assets/media/qrcode/qr-reservationRE60f9433cafec7.png'),
('RE60f94d514bcb5', 'sony  headphones', 'uytjhfh', '111111111111', 'motiyag921@activesniper.com', 4, 0, 'EV60f1346c83ae3', 'assets/media/qrcode/qr-reservationRE60f94d514bcb5.png'),
('RE60f94dc271303', 'sony  headphones', 'uyt', '13265978624164', 'saded82633@whipjoy.com', 5, 1, 'EV60f1346c83ae3', 'assets/media/qrcode/qr-reservationRE60f94dc271303.png'),
('RE60f94eddb1733', 'sony  headphones', 'uytjhfh', '13265978624164', 'saded82633@whipjoy.com', 25, 1, 'EV60f1346c83ae3', 'assets/media/qrcode/qr-reservationRE60f94eddb1733.png'),
('RE60f94f06077e0', 'aa', 'uyt', '13265978624164', 'motiyag921@activesniper.com', 4, 0, 'EV60f1346c83ae3', 'assets/media/qrcode/qr-reservationRE60f94f06077e0.png'),
('RE60f94f7fed581', 'sony  headphones', 'uyt', '13265978624164', 'motiyag921@activesniper.com', 1, 1, 'EV60f14323a33ef', 'assets/media/qrcode/qr-reservationRE60f94f7fed581.png'),
('RE60f94fac20a86', 'sony  headphones', 'uytjhfh', '13265978624164', 'motiyag921@activesniper.com', 3, 0, 'EV60f14323a33ef', 'assets/media/qrcode/qr-reservationRE60f94fac20a86.png'),
('RE60f9505ea22cb', 'sony  headphones', 'uytjhfh', '21474836473', 'nimilap650@labebx.com', 25, 0, 'EV60f14323a33ef', 'assets/media/qrcode/qr-reservationRE60f9505ea22cb.png'),
('RE60f9508238c9c', 'sony  headphones', 'uytjhfh', '13265978624164', 'motiyag921@activesniper.com', 12, 0, 'EV60f14323a33ef', 'assets/media/qrcode/qr-reservationRE60f9508238c9c.png'),
('RE60f95261a0cd7', 'sony  headphones', 'uyt', '13265978624164', 'motiyag921@activesniper.com', 3, 1, 'EV60f1346c83ae3', 'assets/media/qrcode/qr-reservationRE60f95261a0cd7.png');

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
