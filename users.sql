-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 10:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_work`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `role`, `profile_image`, `created_at`) VALUES
(1, 'sohely', 'sohely1@gmail.com', '$2y$10$94DcTCO8W75a20nfJLMnP.6DPDV.uJA8UIhqIFG9yuW.rzJziZ.QS', 0, 0, '1.jpg', '2021-12-02 11:14:27'),
(2, 'SAZZAD HOSSAIN', 'sazzad1@gmail.com', '$2y$10$Z89IjeZGCTNzKg8292GoMuWxOdiS6AAafqB/qMw/.KJhJ1gHqLbCu', 0, 0, '2.jpg', '2021-12-02 11:34:55'),
(3, 'sormi', 'sormi1@gmail.com', '$2y$10$7qtFj919tyaaDpBQ39z3CODDC5YgwIA783QLZhjRRlExsALWwFkw6', 0, 0, '3.jpg', '2021-12-02 11:35:24'),
(4, 'rongon', 'rongon1@gmail.com', '$2y$10$.OJG0IlXQ8wnugAY37Eh3.pGqwN/kCCK1JgfmsvyBgaBYqj2uTo6q', 0, 0, '4.jpg', '2021-12-02 11:53:06'),
(5, 'towhida', 'towhida1@gmail.com', '$2y$10$AcRGsTVv7lw0RIjZZtrOHOcDUS5KeY9HtFQLRZMNP/FHT4MzfemU2', 0, 0, '5.jpg', '2021-12-02 12:07:15');

--
-- Indexes for dumped tables
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
