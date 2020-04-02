-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 11:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `face_detection_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `e_mail`, `user_password`) VALUES
(1, 'test', 'test@email.com', '$2y$10$RpuHqNJY8NjiLA4CikVUrePg2Y2MosYwHcik1yldnX87v3OEAB7xe'),
(2, 'kisus', 'kisus@email.com', '$2y$10$D51YUSV69U7Umn2pRmFsF.R7/GkgJFrbH3dhTfmxa/M6HWafTAkWq'),
(3, 'tri', 'tri@email.com', '$2y$10$/CY26KhC4gX6v/BJOUdyYewLVaJxfuzdlH4U3I5ZQv/yg.ncFWMja'),
(4, 'halo', 'halo@gmail.com', '$2y$10$FfMwezYa2f4q/RBiO3qazOoVMAhgVklULpiF90sQChDLJiQ/pDDl2'),
(5, 'namasaya', 'namasaya12@email.com', '$2y$10$7/i.JvvAhCyNnKPE6R6ddOYViLz2pWB384/HElg1XOSHmFjS.KoIq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
