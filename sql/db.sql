-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 08:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redbt`
--
DROP DATABASE IF EXISTS `redbt`;
CREATE DATABASE IF NOT EXISTS `redbt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `redbt`;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
CREATE TABLE IF NOT EXISTS `genders` (
  `genderId` tinyint(1) NOT NULL AUTO_INCREMENT,
  `gender` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`genderId`),
  UNIQUE KEY `gender` (`gender`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`genderId`, `gender`) VALUES
(1, 'Female'),
(4, 'Information reserved'),
(2, 'Male'),
(3, 'Rather Not Say');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` bigint(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `genderId` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(60) NOT NULL DEFAULT '',
  `address` text DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`userId`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `fullname`, `email`, `genderId`, `password`, `address`, `date_created`, `date_updated`) VALUES
(1, 'Alex', 'alex@yahoo.com', 0, '$2y$10$3Mpkli1gKJbioRlfGbDAt.HPHeN27ksXvz6.SP22JMWkrRMgOjboC', 'mada', '2024-03-15 19:56:49', '2024-03-15 19:56:49'),
(2, 'Peter', 'peter@yahoo.com', 0, '$2y$10$zWf/KDXBHEgpmfJ.OSTYq.phLgWdljWoEg8BoHxryYUpEuk0OsJ1a', 'mada', '2024-03-15 19:58:23', '2024-03-15 19:58:23'),
(3, 'Ann', 'ann@yahoo.com', 1, '$2y$10$zDpMWIFLTxmYrAqrcpcgo.wH3Xq9hd2lFTyjbMLfTnptVQjhc1qxi', 'mada', '2024-03-18 10:30:10', '2024-03-18 10:30:10'),
(4, 'Lucy', 'luc@yahoo.com', 3, '$2y$10$gYQ1F.lT.jWfZ.fQ/8GgReJ0prTsDU6pxP8t14bUgFtFKST/u77cO', 'mada', '2024-03-18 10:30:37', '2024-03-18 10:30:37');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
