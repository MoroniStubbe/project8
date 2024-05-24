-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 02:06 PM
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
-- Database: `uneedit`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminpanel`
--

CREATE TABLE `adminpanel` (
  `User_name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminpanel`
--

INSERT INTO `adminpanel` (`User_name`, `Password`, `ID`) VALUES
('uneedit', 'root', 162);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `message` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`message`, `ID`) VALUES
('hallo', 43);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `message` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`message`, `ID`) VALUES
('hallo welkom in de onderwereld', 13),
('waarom zijn mensen dom', 15),
('hallo welkom op de pagina', 20);

-- --------------------------------------------------------

--
-- Table structure for table `repair_request`
--

CREATE TABLE `repair_request` (
  `id` int(255) NOT NULL,
  `device_type` varchar(20) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `problem` text NOT NULL,
  `telephone` varchar(16) NOT NULL,
  `email` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `repair_request`
--

INSERT INTO `repair_request` (`id`, `device_type`, `device_name`, `problem`, `telephone`, `email`) VALUES
(213, 'telefoon', 'asd', 'asd', 'asd', 'asd'),
(214, 'appel pc/mac', 'iphone 7', 'doet niet', '0643669846', 'volva@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `telefoonnummer` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `naam`, `telefoonnummer`, `email`, `address`, `password`, `role`) VALUES
(1, 'Vova Hladkov', '0997729404', 'vovagladkov33@gmail.com', 'opopopo 34', 'admin007', 'klant'),
(4, 'admin007', '9977294040', 'admin007@gmail.com', 'adminstraat 007', 'admin007', 'admin'),
(7, 'klant007', '090909090909', 'klant@gmail.com', 'klantstraat 007', 'klant007', 'klant'),
(8, 'asd', '1231231231', 'asd@asd.com', 'asd', 'asd', 'klant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminpanel`
--
ALTER TABLE `adminpanel`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `repair_request`
--
ALTER TABLE `repair_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminpanel`
--
ALTER TABLE `adminpanel`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `repair_request`
--
ALTER TABLE `repair_request`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
