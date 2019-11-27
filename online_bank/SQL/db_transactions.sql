-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 05:14 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_transactions`
--

-- --------------------------------------------------------

--
-- Table structure for table `1101390073`
--

CREATE TABLE `1101390073` (
  `date` varchar(10) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `debit` int(6) NOT NULL,
  `credit` int(6) NOT NULL,
  `balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `1101390073`
--

INSERT INTO `1101390073` (`date`, `remark`, `debit`, `credit`, `balance`) VALUES
('2019-07-22', 'New Account', 0, 1000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `1143455119`
--

CREATE TABLE `1143455119` (
  `date` varchar(10) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `debit` int(6) NOT NULL,
  `credit` int(6) NOT NULL,
  `balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `1143455119`
--

INSERT INTO `1143455119` (`date`, `remark`, `debit`, `credit`, `balance`) VALUES
('2019-10-30', 'New Account', 0, 1000, 1000),
('2019-10-30', 'transfer to 	1101390073', -500, 0, 1000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
