-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2012 at 01:35 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `udecide`
--

-- --------------------------------------------------------

--
-- Table structure for table `ud_result`
--

CREATE TABLE IF NOT EXISTS `ud_result` (
  `ud_resutid` int(11) NOT NULL AUTO_INCREMENT,
  `ud_result_creared_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ud_result_options` text NOT NULL,
  `ud_result_times` text NOT NULL,
  `ud_surveyid` int(11) NOT NULL,
  PRIMARY KEY (`ud_resutid`),
  KEY `ud_surveyid` (`ud_surveyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ud_result`
--


-- --------------------------------------------------------

--
-- Table structure for table `ud_survey`
--

CREATE TABLE IF NOT EXISTS `ud_survey` (
  `ud_surveyid` int(11) NOT NULL AUTO_INCREMENT,
  `ud_surveyname` varchar(50) NOT NULL,
  `ud_option1name` varchar(50) NOT NULL,
  `ud_option2name` varchar(50) NOT NULL,
  `ud_option1type` varchar(5) NOT NULL,
  `ud_option2type` varchar(5) NOT NULL,
  `ud_attribute` text NOT NULL,
  `ud_attr_amount` int(11) NOT NULL,
  `ud_duration` int(11) NOT NULL,
  `ud_survey_created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ud_survey_end_time` datetime DEFAULT NULL,
  `ud_userid` int(11) NOT NULL,
  PRIMARY KEY (`ud_surveyid`),
  KEY `ud_userid` (`ud_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ud_survey`
--


-- --------------------------------------------------------

--
-- Table structure for table `ud_user`
--

CREATE TABLE IF NOT EXISTS `ud_user` (
  `ud_userid` int(11) NOT NULL AUTO_INCREMENT,
  `ud_email` varchar(50) NOT NULL,
  `ud_password` varchar(32) NOT NULL,
  `ud_username` varchar(50) NOT NULL,
  `ud_register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ud_user_last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ud_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ud_user`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `ud_result`
--
ALTER TABLE `ud_result`
  ADD CONSTRAINT `ud_result_ibfk_1` FOREIGN KEY (`ud_surveyid`) REFERENCES `ud_survey` (`ud_surveyid`) ON UPDATE CASCADE;

--
-- Constraints for table `ud_survey`
--
ALTER TABLE `ud_survey`
  ADD CONSTRAINT `ud_survey_ibfk_1` FOREIGN KEY (`ud_userid`) REFERENCES `ud_user` (`ud_userid`) ON UPDATE CASCADE;
