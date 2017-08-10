-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2017 at 03:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studyinsane`
--

-- --------------------------------------------------------

--
-- Table structure for table `adsentry`
--

CREATE TABLE `adsentry` (
  `adtitle` varchar(100) NOT NULL,
  `uid` varchar(40) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(250) NOT NULL,
  `category` varchar(30) NOT NULL DEFAULT 'Others',
  `ad_no` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adsentry`
--

INSERT INTO `adsentry` (`adtitle`, `uid`, `price`, `description`, `category`, `ad_no`, `time`, `views`, `status`) VALUES
('kumbhojkar', 'iamdheerajjha@gmail.com', 42, 'asdffas', 'Calculator', 10, '2017-04-09 13:08:32', 0, 1),
('kumbhojkar', 'iamdheerajjha@gmail.com', 42, 'asdffas', 'Calculator', 11, '2017-04-09 13:08:48', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ad_count`
--

CREATE TABLE `ad_count` (
  `ad_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_count`
--

INSERT INTO `ad_count` (`ad_count`) VALUES
(12);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category`) VALUES
('Calculator'),
('Engineering Drawing Tools'),
('Workshop Tools'),
('Books'),
('Others');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college`) VALUES
('SPIT'),
(''),
('RGIT');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `ph` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `pass`, `ph`) VALUES
('iamdheerajjha@gmail.com', 'baba', 'password', '8655348450');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adsentry`
--
ALTER TABLE `adsentry`
  ADD UNIQUE KEY `ad_no` (`ad_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
