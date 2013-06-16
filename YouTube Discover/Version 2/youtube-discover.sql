-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2012 at 06:10 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `youtube-discover`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filter_gender` int(1) DEFAULT '0',
  `filter_age` int(1) DEFAULT '0',
  `filter_quality` int(1) DEFAULT '0',
  `filter_swearing` int(1) DEFAULT '0',
  `filter_difficulty` int(1) DEFAULT '0',
  `background_music` int(1) DEFAULT '0',
  `subcat_id` varchar(5) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `category`
--


-- --------------------------------------------------------

--
-- Table structure for table `catlist`
--

CREATE TABLE IF NOT EXISTS `catlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `cname` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `catlist`
--

INSERT INTO `catlist` (`id`, `name`, `cname`) VALUES
(1, 'Tutorials', 'c1'),
(2, 'Blog', 'c2'),
(3, 'Unboxing', 'c3'),
(4, 'Showing Off', 'c4'),
(5, 'Music', 'c5');

-- --------------------------------------------------------

--
-- Table structure for table `log_logins`
--

CREATE TABLE IF NOT EXISTS `log_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ip` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `log_logins`
--


-- --------------------------------------------------------

--
-- Table structure for table `log_uploads`
--

CREATE TABLE IF NOT EXISTS `log_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `ip` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `age_range` int(1) DEFAULT NULL,
  `quality` int(1) DEFAULT NULL,
  `swearing` int(1) DEFAULT NULL,
  `difficulty` int(1) DEFAULT NULL,
  `as_playlist` int(1) DEFAULT NULL,
  `playlist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `video_id` (`video_id`),
  KEY `category_id` (`category_id`),
  KEY `playlist_id` (`playlist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `log_uploads`
--


-- --------------------------------------------------------

--
-- Table structure for table `log_views`
--

CREATE TABLE IF NOT EXISTS `log_views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `video_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `ip` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
  `search_term` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `age_range` int(1) DEFAULT NULL,
  `quality` int(1) DEFAULT NULL,
  `swearing` int(1) DEFAULT NULL,
  `difficulty` int(1) DEFAULT NULL,
  `browser` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `OS` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `page` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `referrer` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `as_playlist` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `video_id` (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='This is a log of all video views' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `log_views`
--


-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_parts` int(11) DEFAULT '1',
  `part_number` int(11) DEFAULT '0',
  `video_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `video_id` (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `playlist`
--


-- --------------------------------------------------------

--
-- Table structure for table `subcatlist`
--

CREATE TABLE IF NOT EXISTS `subcatlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sname` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subcatlist`
--

INSERT INTO `subcatlist` (`id`, `cname`, `name`, `sname`) VALUES
(1, 'c1', 'Web Tutorials', 's1'),
(2, 'c1', 'Software Development', 's2'),
(3, 'c2', 'Placeholder', 's1'),
(4, 'c2', 'Placeholder', 's2');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `permissions` int(1) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='This is the users table' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `username`, `email`, `password`, `permissions`) VALUES
(1, 'Alex', 'bowersbros@gmail.com', '73d6554aaed51346bdb8f4dc8ac424fb', 3);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `playlist_id` int(11) DEFAULT '0',
  `thumbnail` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `video_link` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `gender` int(1) DEFAULT '0',
  `age_range` int(1) DEFAULT '0',
  `quality` int(1) DEFAULT '3',
  `swearing` int(1) DEFAULT '0',
  `difficulty` int(1) DEFAULT '0',
  `background_music` int(1) DEFAULT '0',
  `channel` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `permission` int(1) DEFAULT '0',
  `video_title` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `video_views` int(11) DEFAULT NULL,
  `views_before` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `dislikes` int(11) DEFAULT NULL,
  `video_desc` mediumtext CHARACTER SET latin1,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  KEY `playlist_id` (`playlist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `videos`
--

