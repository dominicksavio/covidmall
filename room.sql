-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jul 28, 2020 at 12:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room`
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `uid` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `buildingname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`uid`, `user`, `buildingname`) VALUES
(3, 'abison', 'oberon mall'),
(4, 'devan', '9&10'),
(5, 'devan', 'nucleus mall request'),
(1, 'dominic', 'lulu'),
(4, 'jestin', '9&10'),
(2, 'jestin', 'more'),
(5, 'jestin', 'nucleus mall');

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `floorno` int(6) NOT NULL,
  `noofroom` int(6) NOT NULL,
  `capacity` int(6) NOT NULL,
  `buid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`floorno`, `noofroom`, `capacity`, `buid`) VALUES
(1, 5, 25, 3),
(1, 5, 25, 4),
(1, 5, 25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `no` int(6) NOT NULL,
  `floorno` int(6) NOT NULL,
  `buid` int(6) NOT NULL,
  `capacity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`no`, `floorno`, `buid`, `capacity`) VALUES
(1, 1, 3, 5),
(1, 1, 4, 5),
(1, 1, 5, 5),
(2, 1, 3, 5),
(2, 1, 4, 5),
(2, 1, 5, 5),
(3, 1, 3, 5),
(3, 1, 4, 5),
(3, 1, 5, 5),
(4, 1, 3, 5),
(4, 1, 4, 5),
(4, 1, 5, 5),
(5, 1, 3, 5),
(5, 1, 4, 5),
(5, 1, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `privilage` varchar(50) NOT NULL,
  `pnum` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`, `privilage`, `pnum`) VALUES
(1, 'dominic', 'dominic', '$2y$10$3URibI8Zt2uIBxONMNsUMetaLRMZU5HMJ7BP.NWYcl8yEjlQBKn1e', '2020-06-28 20:31:46', 'superadmin', '9495213858'),
(3, 'savio', 'savio', '$2y$10$bMa3FjJtjbSacmgTsLeu3uP/atAy9JVhYTmXAJfyMN3qu4.a6X1v6', '2020-07-23 22:58:52', 'superadmin', '9447391517'),
(4, 'jestin', 'jestin', '$2y$10$AbhwHc4TbCyFUshPCcxtveVa2NffVD5bX37XmPNKEKJw5u1Nv8MEK', '2020-07-23 23:38:48', 'admin', '123456789'),
(5, 'ashwin', 'ashwin', '$2y$10$9N.5qugd8t.w5.XmpoutmOBbzxZEZqwt.NkveNtSli2IbyVW9XhF.', '2020-07-27 14:04:52', 'admin request', '123456789'),
(7, 'devan', 'devan', '$2y$10$XpNYtXXPd4FDr7FGoojFPO4IxwBIhK95XiL7a00bBNLxbSuTWrz9O', '2020-07-27 14:11:23', 'viewer', '123456789'),
(8, 'prijith', 'prijith', '$2y$10$dOUyslZlhCqzhzK3dhKXk.gLiLU4mwwb91ItF73n67W/M7j6rEdRu', '2020-07-27 14:12:40', 'viewer request', '123456789'),
(9, 'don', 'don', '$2y$10$5UciAIhuocnBWAie9Vfu8OETnzaVlyXQvlAmwA3rTm.TSwsn10qki', '2020-07-27 14:16:08', 'superadmin', '123456789'),
(10, 'abison', 'abison', '$2y$10$Udpg2EuamhhdePJH3xtj.eJhGFCH7HXUeh0uRu.QXO7Kg.dpgfpFS', '2020-07-28 14:07:52', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`user`,`buildingname`),
  ADD UNIQUE KEY `user` (`user`,`buildingname`),
  ADD KEY `admin` (`user`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`floorno`,`buid`),
  ADD UNIQUE KEY `floorno_2` (`floorno`,`buid`),
  ADD KEY `buid` (`buid`),
  ADD KEY `floorno` (`floorno`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`no`,`floorno`,`buid`),
  ADD UNIQUE KEY `no` (`no`,`floorno`,`buid`),
  ADD KEY `buid` (`buid`),
  ADD KEY `floorno` (`floorno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `building`
--
ALTER TABLE `building`
  ADD CONSTRAINT `building_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;