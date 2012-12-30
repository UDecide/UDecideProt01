-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2012 年 12 月 30 日 09:13
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `udecide`
--

-- --------------------------------------------------------

--
-- 表的结构 `ud_result`
--

CREATE TABLE IF NOT EXISTS `ud_result` (
  `ud_resutid` int(11) NOT NULL AUTO_INCREMENT,
  `ud_result_created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ud_result_options` text NOT NULL,
  `ud_result_times` text NOT NULL,
  `ud_surveyid` int(11) NOT NULL,
  PRIMARY KEY (`ud_resutid`),
  KEY `ud_surveyid` (`ud_surveyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `ud_result`
--

INSERT INTO `ud_result` (`ud_resutid`, `ud_result_created_time`, `ud_result_options`, `ud_result_times`, `ud_surveyid`) VALUES
(1, '2012-12-28 07:05:50', '0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1', '1370, 1250, 1100, 1000, 1000, 1370, 1250, 1100, 1000, 1000, 1370, 1250, 1100, 1000, 1000, 1370, 1250, 1100, 1000, 1000', 1),
(2, '2012-12-30 03:25:28', '0,0,0,0,0,0,0,0,0,0,1,0,1,1,1,1,1,1,0,1', '432,456,406,431,608,406,429,404,553,1272,406,405,481,356,457,405,406,428,382,1196', 3),
(3, '2012-12-30 03:29:25', '0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1', '483,456,445,428,757,456,479,402,531,403,529,456,1326,453,503,401,428,504,481,352', 3),
(4, '2012-12-30 03:30:49', '1,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1', '406,458,479,507,481,508,705,405,480,937,456,382,510,433,382,378,411,432,430,403', 3),
(5, '2012-12-30 03:34:03', '0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1', '402,455,531,432,582,506,536,532,457,954,409,404,460,535,481,531,408,536,379,428', 3),
(6, '2012-12-30 03:46:02', '0,0,0,0,0,0,0,0,0,0,0,1,0,1,0,1,1,0,2,0', '918,205,405,1162,127,529,408,205,177,53,175,356,1600,454,177,357,406,686,-1,253', 1),
(7, '2012-12-30 03:49:17', '0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1', '435,481,404,428,624,481,508,460,456,406,434,689,432,787,481,479', 2),
(8, '2012-12-30 04:09:03', '0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1', '483,404,508,558,451,557,506,476,409,401,438,428,926,458,455,504,407,505,483,481', 3),
(9, '2012-12-30 04:46:22', '0,0,0,0,0,0,1,0,0,0,1,1,1,1,1,1,1,1,1,1', '483,458,563,452,385,880,457,486,428,480,712,456,408,431,459,407,437,459,660,449', 3),
(10, '2012-12-30 04:47:19', '0,0,0,0,1,0,0,0,0,0,1,1,0,1,1,1,1,1,1,1', '709,531,480,557,230,633,636,485,583,924,382,456,917,673,482,916,609,630,631,455', 3),
(11, '2012-12-30 04:50:37', '0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1', '459,484,482,743,482,483,451,482,430,575,458,454,506,456,580,662,431,457,464,455', 3),
(12, '2012-12-30 04:55:25', '0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1', '457,477,684,534,406,428,433,510,482,530,404,457,556,484,476,432,468,630,454,506', 3),
(13, '2012-12-30 04:58:00', '0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1', '789,482,559,508,457,484,506,533,533,457,788,431,532,505,459,431,482,546,494,430', 3),
(14, '2012-12-30 04:59:18', '0,0,1,0,0,0,0,0,0,0,1,1,1,1,1,1,1,0,1,1', '682,457,415,432,510,683,455,505,443,555,591,455,810,482,533,554,504,509,510,553', 3),
(15, '2012-12-30 05:02:18', '0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1', '484,506,480,535,558,805,532,608,508,457,399,430,482,457,480,531,483,484,458,506', 3),
(16, '2012-12-30 05:06:38', '0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1', '530,455,788,511,502,432,504,459,531,454,636,444,377,431,428,506,479,379,507,453', 3),
(17, '2012-12-30 05:22:20', '0,1,0,0,1,0,1,0,0,0,0,1,1,1,1,1,1,1,1,1', '801,100,400,550,375,451,275,577,375,475,526,375,450,375,350,100,129,200,375,325', 3),
(18, '2012-12-30 05:33:45', '1,1,1,0,1,1,1,0,1,0,1,1,1,0,1,0,1,1,0,1', '50,0,25,50,25,25,0,25,0,50,25,25,25,251,25,50,25,0,26,25', 3),
(19, '2012-12-30 05:33:46', '1,1,1,0,1,1,1,0,1,0,1,1,1,0,1,0,1,1,0,1', '50,0,25,50,25,25,0,25,0,50,25,25,25,251,25,50,25,0,26,25', 3),
(20, '2012-12-30 05:33:47', '1,1,1,0,1,1,1,0,1,0,1,1,1,0,1,0,1,1,0,1', '50,0,25,50,25,25,0,25,0,50,25,25,25,251,25,50,25,0,26,25', 3),
(21, '2012-12-30 05:40:52', '0,0,1,0,0,0,1,1,0,0,0,1,1,1,1,1,1,1,1,1', '350,501,25,355,451,500,125,400,425,375,712,500,453,750,400,425,526,401,400,752', 3);

-- --------------------------------------------------------

--
-- 表的结构 `ud_survey`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ud_survey`
--

INSERT INTO `ud_survey` (`ud_surveyid`, `ud_surveyname`, `ud_option1name`, `ud_option2name`, `ud_option1type`, `ud_option2type`, `ud_attribute`, `ud_attr_amount`, `ud_duration`, `ud_survey_created_time`, `ud_survey_end_time`, `ud_userid`) VALUES
(1, 'Luxury Car Brands', 'Audi', 'BMW', 'png', 'png', 'luxury, sporty, comfortable, secure, durable, fashionable, expensive, noisy, strong, powerful', 10, 2000, '2012-12-30 03:37:30', NULL, 2),
(2, 'Smart Phone Brands', 'Apple', 'Samsung', 'png', 'png', 'fashionable, thin, responsive, durable, strong, smart, light, popular', 8, 2000, '2012-12-30 03:37:30', NULL, 2),
(3, 'Luxury Car Brands', 'Audi', 'BMW', 'png', 'png', 'luxury,sporty,comfortable,secure,durable,fashionable,expensive,noisy,strong,powerful', 10, 2000, '2012-12-30 03:22:08', NULL, 4);

-- --------------------------------------------------------

--
-- 表的结构 `ud_user`
--

CREATE TABLE IF NOT EXISTS `ud_user` (
  `ud_userid` int(11) NOT NULL AUTO_INCREMENT,
  `ud_email` varchar(50) NOT NULL,
  `ud_password` varchar(32) NOT NULL,
  `ud_username` varchar(50) NOT NULL,
  `ud_register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ud_user_last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ud_userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ud_user`
--

INSERT INTO `ud_user` (`ud_userid`, `ud_email`, `ud_password`, `ud_username`, `ud_register_time`, `ud_user_last_login`) VALUES
(1, 'fredthen@think.com.sg ', '123', 'Fred', '2012-12-27 09:20:04', NULL),
(2, 'test', 'test', 'Tester', '2012-12-28 03:33:15', NULL),
(3, 'blah', '123', 'blah', '2012-12-28 05:45:30', NULL),
(4, 'andy.li.jj@gmail.com', '123', 'andy', '2012-12-28 15:18:23', NULL);

--
-- 限制导出的表
--

--
-- 限制表 `ud_result`
--
ALTER TABLE `ud_result`
  ADD CONSTRAINT `ud_result_ibfk_1` FOREIGN KEY (`ud_surveyid`) REFERENCES `ud_survey` (`ud_surveyid`) ON UPDATE CASCADE;

--
-- 限制表 `ud_survey`
--
ALTER TABLE `ud_survey`
  ADD CONSTRAINT `ud_survey_ibfk_1` FOREIGN KEY (`ud_userid`) REFERENCES `ud_user` (`ud_userid`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
