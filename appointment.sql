-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 06:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BOOK_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `FULLNAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(150) NOT NULL,
  `NUMBER` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SERVICES` varchar(100) NOT NULL,
  `PETNAME` varchar(100) NOT NULL,
  `BREED` varchar(100) NOT NULL,
  `BIRTHDATE` date NOT NULL,
  `AGE` int(100) NOT NULL,
  `SPECIES` varchar(100) NOT NULL,
  `GENDER` varchar(100) NOT NULL,
  `GENITALS` varchar(100) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BOOK_ID`, `USER_ID`, `STATUS`, `FULLNAME`, `ADDRESS`, `NUMBER`, `EMAIL`, `SERVICES`, `PETNAME`, `BREED`, `BIRTHDATE`, `AGE`, `SPECIES`, `GENDER`, `GENITALS`, `DATE`) VALUES
(1, 1, 'Pending', 'John Michael D. Go', '23 Pearl St. Carmel V. Tandang Sora Quezon City', '09495903251', 'johnmichael.go029@gmail.com', 'Vaccination', 'Meow', 'Persian', '2021-01-01', 1, 'Cat', 'Female', 'Spayed', '2022-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `USER_LEVEL` varchar(100) NOT NULL,
  `FIRSTNAME` varchar(100) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_LEVEL`, `FIRSTNAME`, `LASTNAME`, `USERNAME`, `PASSWORD`) VALUES
(1, 'Admin', 'John Michael0', 'Go0', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BOOK_ID`),
  ADD KEY `user` (`USER_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BOOK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
