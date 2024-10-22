-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 09:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL DEFAULT 1,
  `room_id` int(11) NOT NULL DEFAULT 1,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL DEFAULT 0,
  `timpstamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `name`, `password`, `email`, `phone`, `role`, `created_at`) VALUES
(1, 'Kaung Nyi Thit', '$2y$10$hhpdXtTVobzRFxwpW5d/feM.pziELkd1Iq2WHVnpZ5hMhQFEOOBBi', 'Cnexx@email.com', '0912434321', 'customer', '2024-07-03 10:54:06'),
(2, 'Cnexx', '$2y$10$vljqXZRABPnup5KwKeO18.a5tnrlB76G/LhJcwJF.gS7V2T484BoK', 'bob@email.com', '09323521327', 'admin', '2024-07-04 15:54:19'),
(4, 'Kaung Nyi Thit', '$2y$10$N9.KjTxhcS1/mgf1t9qQN.5NMeffK8CTSMQQfxj4dmFm1fYDcay8K', 'bob@email.com', '0912434321', 'customer', '2024-07-21 16:55:36'),
(5, 'cc', '$2y$10$2Tytq7lMp8YQpRJuguM6Cu3WtzvbFeshXTYAZ3MqnTGyelVVfLpkS', 'mini@email.com', '0912434321', 'customer', '2024-07-25 17:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `room_number` int(255) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` enum('available','booked') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `room_number`, `adult`, `child`, `price`, `photo`, `status`) VALUES
(66, 'Superior', 509, 1, 2, 300, 'modern-luxury-bedroom-suite-and-bathroom-with-working-table-scaled.jpg', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
