-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2012 at 12:46 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `topup`
--

-- --------------------------------------------------------

--
-- Table structure for table `denominations`
--

CREATE TABLE IF NOT EXISTS `denominations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `telco_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `denominations`
--

INSERT INTO `denominations` (`id`, `amount`, `telco_id`) VALUES
(1, 750, 2),
(2, 1500, 2),
(3, 1000, 1),
(4, 5000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `telcos`
--

CREATE TABLE IF NOT EXISTS `telcos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `telcos`
--

INSERT INTO `telcos` (`id`, `name`) VALUES
(1, 'Airtel'),
(2, 'TNM');

-- --------------------------------------------------------

--
-- Table structure for table `topups`
--

CREATE TABLE IF NOT EXISTS `topups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `denomination_id` int(11) NOT NULL,
  `scratchcode` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `denomination_id` (`denomination_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `topups`
--

INSERT INTO `topups` (`id`, `denomination_id`, `scratchcode`) VALUES
(1, 1, '3434974387439734'),
(2, 2, '449496784894943'),
(3, 3, '4879247823478239'),
(4, 4, '7837864876234687'),
(5, 1, '4876873474787346876'),
(6, 2, '79847593484755748394'),
(7, 3, '93439874928384747838'),
(8, 4, '00943588489023748889');

-- --------------------------------------------------------

--
-- Stand-in structure for view `topup_details`
--
CREATE TABLE IF NOT EXISTS `topup_details` (
`name` varchar(30)
,`amount` int(11)
,`scratchcode` varchar(30)
);
-- --------------------------------------------------------

--
-- Structure for view `topup_details`
--
DROP TABLE IF EXISTS `topup_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `topup_details` AS select `te`.`name` AS `name`,`d`.`amount` AS `amount`,`top`.`scratchcode` AS `scratchcode` from ((`topups` `top` join `denominations` `d`) join `telcos` `te`) where ((`top`.`denomination_id` = `d`.`id`) and (`te`.`id` = `d`.`telco_id`));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `topups`
--
ALTER TABLE `topups`
  ADD CONSTRAINT `topups_ibfk_2` FOREIGN KEY (`denomination_id`) REFERENCES `denominations` (`id`);
