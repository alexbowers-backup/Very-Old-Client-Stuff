-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2013 at 07:19 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `comets`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_no` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `address_line_one` text NOT NULL,
  `dob` date NOT NULL,
  `subscribed` tinyint(1) NOT NULL DEFAULT '0',
  `acc_type` int(1) NOT NULL,
  PRIMARY KEY (`member_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `race`
--

CREATE TABLE IF NOT EXISTS `race` (
  `race_No` int(11) NOT NULL,
  `Race_Name` varchar(255) NOT NULL,
  `Race_Date` date NOT NULL,
  `Race_Type` varchar(255) NOT NULL,
  PRIMARY KEY (`race_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `race_result`
--

CREATE TABLE IF NOT EXISTS `race_result` (
  `Member_ID` int(11) NOT NULL,
  `Race_No` int(11) NOT NULL,
  `Race_Result` varchar(255) NOT NULL,
  PRIMARY KEY (`Member_ID`,`Race_No`),
  KEY `Race_No` (`Race_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `race_result`
--
ALTER TABLE `race_result`
  ADD CONSTRAINT `race_result_ibfk_2` FOREIGN KEY (`Race_No`) REFERENCES `race` (`race_No`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `race_result_ibfk_1` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`member_no`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
