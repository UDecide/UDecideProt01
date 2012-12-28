-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2012 at 10:52 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
  `ud_result_created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ud_result_options` text NOT NULL,
  `ud_result_times` text NOT NULL,
  `ud_surveyid` int(11) NOT NULL,
  PRIMARY KEY (`ud_resutid`),
  KEY `ud_surveyid` (`ud_surveyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ud_result`
--

INSERT INTO `ud_result` (`ud_resutid`, `ud_result_created_time`, `ud_result_options`, `ud_result_times`, `ud_surveyid`) VALUES
(1, '2012-12-28 07:05:50', '0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1', '1370, 1250, 1100, 1000, 1000, 1370, 1250, 1100, 1000, 1000, 1370, 1250, 1100, 1000, 1000, 1370, 1250, 1100, 1000, 1000', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ud_survey`
--

INSERT INTO `ud_survey` (`ud_surveyid`, `ud_surveyname`, `ud_option1name`, `ud_option2name`, `ud_option1type`, `ud_option2type`, `ud_attribute`, `ud_attr_amount`, `ud_duration`, `ud_survey_created_time`, `ud_survey_end_time`, `ud_userid`) VALUES
(1, 'Car', 'Audi', 'BMW', '1', '2', 'luxury, sporty, comfortable, secure, durable, fashionable, expensive, noisy, strong, powerful', 10, 2000, '2012-12-28 08:01:33', NULL, 2),
(2, 'Testing2', '1', '2', '1', '2', '[]', 1, 1000, '2012-12-28 03:46:37', NULL, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ud_user`
--

INSERT INTO `ud_user` (`ud_userid`, `ud_email`, `ud_password`, `ud_username`, `ud_register_time`, `ud_user_last_login`) VALUES
(1, 'fredthen@think.com.sg ', '123', 'Fred', '2012-12-27 09:20:04', NULL),
(2, 'test', 'test', 'Tester', '2012-12-28 03:33:15', NULL),
(3, 'blah', '123', 'blah', '2012-12-28 05:45:30', NULL);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
