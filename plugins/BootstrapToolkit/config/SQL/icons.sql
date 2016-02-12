-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2013 at 09:10 AM
-- Server version: 5.5.30
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jaambazc_template`
--

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

DROP TABLE IF EXISTS `icons`;
CREATE TABLE IF NOT EXISTS `icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `class` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `name`, `class`) VALUES
(1, 'edit', 'icon-pencil'),
(2, 'disable', 'icon-ban-circle'),
(3, 'enable', 'icon-ok-circle'),
(4, 'delete', 'icon-trash'),
(5, 'security', 'icon-lock'),
(6, 'configure', 'icon-wrench'),
(7, 'settings', 'icon-cog'),
(8, 'search', 'icon-search'),
(9, 'email', 'icon-envelope'),
(10, 'yes', 'icon-ok'),
(11, 'no', 'icon-remove'),
(13, 'user', 'icon-user'),
(14, 'info', 'icon-info-sign'),
(18, 'add', 'icon-plus'),
(16, 'compile', 'icon-refresh'),
(17, 'copy', 'icon-share-alt');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
