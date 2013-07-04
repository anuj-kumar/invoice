-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2013 at 11:29 AM
-- Server version: 5.5.31
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_rights`
--

CREATE TABLE IF NOT EXISTS `access_rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `invoice_single` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `invoice_monthly` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `invoice_monthly_details` enum('0','1') NOT NULL DEFAULT '0',
  `invoice_monthly_new` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `panel_global` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `panel_local` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `archive_single` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `archive_monthly` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `user_list` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `user_create` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `system_log` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `access_rights`
--

<<<<<<< HEAD
INSERT INTO `access_rights` (`id`, `user_id`, `invoice_single`, `invoice_monthly`, `invoice_monthly_new`, `panel_global`, `panel_local`, `archive_single`, `archive_monthly`, `user_list`, `user_create`, `system_log`, `created_at`, `updated_at`) VALUES
(2, 5, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------
=======
LOCK TABLES `access_rights` WRITE;
/*!40000 ALTER TABLE `access_rights` DISABLE KEYS */;
INSERT INTO `access_rights` VALUES (2,5,'1','1','1','1','1','1','1','1','1','1','1','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `access_rights` ENABLE KEYS */;
UNLOCK TABLES;
>>>>>>> ee9f82de861e430032f8fe804090d0029ca97d74

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('single','monthly') NOT NULL DEFAULT 'single',
  `title` enum('Mr.','Mrs.','Ms.','Dr.') NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address_line_1` varchar(50) NOT NULL,
  `address_line_2` varchar(50) NOT NULL,
  `address_line_3` varchar(50) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `customers`
--

<<<<<<< HEAD
INSERT INTO `customers` (`id`, `type`, `title`, `first_name`, `last_name`, `address_line_1`, `address_line_2`, `address_line_3`, `city`, `state`, `country`, `pincode`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'single', 'Mr.', '', 'Kantishah', 'Chalti gali', 'Khisakti Building', '', 1, 1, '', 981374, 919903571054, 'lksjdfgk', '0000-00-00 00:00:00', '2013-07-02 09:32:13'),
(2, 'monthly', 'Mr.', 'Thomas', 'Mookken', 'Neogen Labs', 'UCF Center', 'Near Lingarajapuram Bus Stand', 1, 1, 'idnia', 171717, 5678901212, 'anuj_@outlook.com', '0000-00-00 00:00:00', '2013-07-03 07:34:54'),
(36, 'single', 'Dr.', 'as', 'lskdjf', 'lf', 'ljf', 'ljf', 0, 0, '', 251001, 2147483647, 'a@b.c', '0000-00-00 00:00:00', '2013-07-02 09:04:49'),
(37, 'monthly', 'Mr.', 'Thomas', 'Mookken', 'Neogen Labs', 'UCF Center', 'Near Lingarajapuram Bus Stand', 1, 1, '', 171717, 1234567890, 'anuj_@outlook.com', '0000-00-00 00:00:00', '2013-07-02 10:54:59'),
(38, 'single', 'Dr.', 'ajsdlf', 'kjsfkl', 'jskdlf', 'kljskfj', 'jlskgj', 0, 0, '', 251001, 9592039229, '', '0000-00-00 00:00:00', '2013-07-02 11:12:51'),
(58, 'monthly', 'Dr.', 'Rohit', 'Cariappa', 'UCF center', 'Lingarajapuram', '', 0, 0, 'India', 251001, 2992291212, 'cariappa@neogenlabs.com', '0000-00-00 00:00:00', '2013-07-03 06:52:28');

-- --------------------------------------------------------
=======
LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'single','Mr.','','Kantishah','Chalti gali','Khisakti Building','','1','1','',981374,919903571054,'lksjdfgk','0000-00-00 00:00:00','2013-07-02 09:32:13'),(2,'monthly','Mr.','Thomas','Mookken','Neogen Labs','UCF Center','Near Lingarajapuram Bus Stand','1','1','India',171717,7890121212,'anuj_@outlook.com','0000-00-00 00:00:00','2013-07-04 07:43:52'),(36,'single','Dr.','as','lskdjf','lf','ljf','ljf','0','0','',251001,2147483647,'a@b.c','0000-00-00 00:00:00','2013-07-02 09:04:49'),(37,'monthly','Mr.','Thomas','Mookken','Neogen Labs','UCF Center','Near Lingarajapuram Bus Stand','1','1','',171717,1234567890,'anuj_@outlook.com','0000-00-00 00:00:00','2013-07-02 10:54:59'),(38,'single','Dr.','ajsdlf','kjsfkl','jskdlf','kljskfj','jlskgj','0','0','',251001,9592039229,'','0000-00-00 00:00:00','2013-07-02 11:12:51'),(58,'monthly','Dr.','Rohit','Cariappa','UCF center','Lingarajapuram','','0','0','India',251001,2992291212,'cariappa@neogenlabs.com','0000-00-00 00:00:00','2013-07-03 06:52:28');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;
>>>>>>> ee9f82de861e430032f8fe804090d0029ca97d74

--
-- Table structure for table `disorders`
--

CREATE TABLE IF NOT EXISTS `disorders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `disorders`
--

INSERT INTO `disorders` (`id`, `name`, `category`, `created_at`, `updated_at`) VALUES
(1, '1', '', '2013-06-18 00:00:00', '2013-06-18 00:00:00'),
(2, '2', '', '2013-06-18 00:00:00', '2013-06-18 00:00:00'),
(3, '3', '', '2013-06-18 00:00:00', '2013-06-18 00:00:00'),
(4, '4', '', '2013-06-18 00:00:00', '2013-06-18 00:00:00'),
(5, '5', '', '2013-06-18 00:00:00', '2013-06-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `global_panel_prices`
--

CREATE TABLE IF NOT EXISTS `global_panel_prices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vol_low` int(5) NOT NULL,
  `vol_high` int(5) NOT NULL,
  `panel_id` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;
=======
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
>>>>>>> ee9f82de861e430032f8fe804090d0029ca97d74

--
-- Dumping data for table `global_panel_prices`
--

<<<<<<< HEAD
INSERT INTO `global_panel_prices` (`id`, `vol_low`, `vol_high`, `panel_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 25, 1, 5000.00, '0000-00-00 00:00:00', '2013-06-27 09:43:47'),
(2, 1, 25, 2, 4500.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(3, 1, 25, 3, 4250.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(4, 1, 25, 4, 4000.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(5, 1, 25, 5, 3750.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(6, 1, 25, 6, 3500.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(7, 1, 25, 7, 3250.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(8, 1, 25, 8, 3000.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(9, 1, 25, 9, 2750.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(10, 25, 50, 1, 4750.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(11, 25, 50, 2, 4500.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(12, 25, 50, 3, 4250.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(13, 25, 50, 4, 4000.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(14, 25, 50, 5, 3500.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(15, 25, 50, 6, 3250.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(16, 25, 50, 7, 3000.00, '0000-00-00 00:00:00', '2013-06-27 09:43:48'),
(17, 25, 50, 8, 2750.00, '0000-00-00 00:00:00', '2013-06-27 09:43:49'),
(18, 25, 50, 9, 2500.00, '0000-00-00 00:00:00', '2013-06-27 09:43:49'),
(19, 51, 100, 1, 4500.00, '0000-00-00 00:00:00', '2013-06-28 01:45:53'),
(20, 51, 100, 2, 4250.00, '0000-00-00 00:00:00', '2013-06-28 01:46:14'),
(21, 51, 100, 3, 4000.00, '0000-00-00 00:00:00', '2013-06-28 01:46:23'),
(22, 51, 100, 4, 3850.00, '0000-00-00 00:00:00', '2013-06-28 01:46:35'),
(23, 51, 100, 5, 3550.00, '0000-00-00 00:00:00', '2013-06-28 01:46:43'),
(24, 51, 100, 6, 3250.00, '0000-00-00 00:00:00', '2013-06-28 01:46:50'),
(25, 51, 100, 7, 3000.00, '0000-00-00 00:00:00', '2013-06-28 01:47:05'),
(26, 51, 100, 8, 2000.00, '0000-00-00 00:00:00', '2013-06-28 01:47:12'),
(27, 51, 100, 9, 1000.00, '0000-00-00 00:00:00', '2013-06-28 01:47:18');

-- --------------------------------------------------------
=======
LOCK TABLES `global_panel_prices` WRITE;
/*!40000 ALTER TABLE `global_panel_prices` DISABLE KEYS */;
INSERT INTO `global_panel_prices` VALUES (1,1,25,1,5120.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(2,1,25,2,4500.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(3,1,25,3,4250.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(4,1,25,4,4000.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(5,1,25,5,3750.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(6,1,25,6,3500.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(7,1,25,7,3250.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(8,1,25,8,3000.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(9,25,50,1,4750.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(10,25,50,2,4500.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(11,25,50,3,4250.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(12,25,50,4,4000.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(13,25,50,5,3500.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(14,25,50,6,3250.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(15,25,50,7,3000.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(16,25,50,8,2750.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(17,51,100,1,4500.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(18,51,100,2,4250.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(19,51,100,3,4000.00,'0000-00-00 00:00:00','2013-07-04 08:17:34'),(20,51,100,4,3850.00,'0000-00-00 00:00:00','2013-07-04 08:17:35'),(21,51,100,5,3550.00,'0000-00-00 00:00:00','2013-07-04 08:17:35'),(22,51,100,6,3250.00,'0000-00-00 00:00:00','2013-07-04 08:17:35'),(23,51,100,7,3000.00,'0000-00-00 00:00:00','2013-07-04 08:17:35'),(24,51,100,8,2000.00,'0000-00-00 00:00:00','2013-07-04 08:17:35');
/*!40000 ALTER TABLE `global_panel_prices` ENABLE KEYS */;
UNLOCK TABLES;
>>>>>>> ee9f82de861e430032f8fe804090d0029ca97d74

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `baby_of` varchar(30) DEFAULT NULL,
  `fp_number` int(11) DEFAULT NULL,
  `date_of_service` date DEFAULT NULL,
  `amount` float NOT NULL,
  `tax_1` float(5,2) DEFAULT NULL,
  `tax_2` float(5,2) DEFAULT NULL,
  `tax_3` float(5,2) DEFAULT NULL,
  `tax_4` float(5,2) DEFAULT NULL,
  `discount_1` float(4,2) DEFAULT NULL,
  `discount_2` float(4,2) DEFAULT NULL,
  `discount_3` float(4,2) DEFAULT NULL,
  `amount_paid` float(12,2) DEFAULT NULL,
  `currency` varchar(3) NOT NULL DEFAULT 'INR',
  `payment_mode` enum('cash','cheque','demand draft') DEFAULT NULL,
  `cheque_number` int(11) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_branch` varchar(50) DEFAULT NULL,
  `bank_city` varchar(50) DEFAULT NULL,
  `comment` text,
  `review_number` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_costumer` (`customer_id`),
  KEY `fk_invoice_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `customer_id`, `user_id`, `baby_of`, `fp_number`, `date_of_service`, `amount`, `tax_1`, `tax_2`, `tax_3`, `tax_4`, `discount_1`, `discount_2`, `discount_3`, `amount_paid`, `currency`, `payment_mode`, `cheque_number`, `bank_name`, `bank_branch`, `bank_city`, `comment`, `review_number`, `created_at`, `updated_at`) VALUES
(1, 1, 5, NULL, NULL, '2013-06-13', 2100000, 4.00, 5.00, 6.00, 7.00, 0.99, 0.99, 0.99, 0.00, 'INR', 'cash', NULL, NULL, NULL, NULL, 'alksdjfgsdng', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 5, NULL, NULL, '2013-06-13', 2300.23, 2.30, 2.30, 2.30, 2.30, 0.99, 0.99, 0.99, 0.00, 'INR', 'cash', NULL, NULL, NULL, NULL, 'lasdjfglksdga', 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 5, NULL, NULL, '2013-06-18', 9128.12, 2.00, 2.00, 2.00, 2.00, 0.99, 0.99, 0.99, 0.00, 'INR', 'cash', NULL, NULL, NULL, NULL, 'laknsdlkgfsd', 0, '0000-00-00 00:00:00', '2013-07-02 09:05:59'),
(4, 2, 5, NULL, NULL, NULL, 15000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INR', 'cash', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2013-07-02 09:12:39'),
(5, 36, 5, NULL, NULL, NULL, 15000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INR', 'cash', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2013-07-02 09:04:49'),
(6, 38, 5, NULL, NULL, NULL, 51000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INR', 'cash', NULL, '40000', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2013-07-02 11:12:51'),
(7, 2, 5, NULL, NULL, NULL, 5000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INR', 'cash', NULL, '2000', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2013-07-02 13:44:35'),
(8, 58, 5, NULL, NULL, NULL, 4250, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1200.00, 'INR', 'cash', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2013-07-03 06:12:28'),
(9, 58, 5, NULL, NULL, NULL, 12750, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10000.00, 'INR', 'cash', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2013-07-03 06:52:28'),
(10, 58, 5, NULL, NULL, NULL, 4250, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000.00, 'INR', 'cash', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2013-07-03 07:01:21'),
(11, 58, 5, NULL, NULL, NULL, 8500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5000.00, 'INR', 'cash', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2013-07-03 07:02:12'),
(12, 58, 5, NULL, NULL, NULL, 8500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5000.00, 'INR', 'cash', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2013-07-03 07:02:53'),
(13, 2, 5, NULL, NULL, NULL, 10500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10000.00, 'INR', 'cash', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2013-07-03 07:34:54'),
(14, 2, 5, NULL, NULL, NULL, 10500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10000.00, 'INR', 'cash', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2013-07-03 07:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `invoices_panels`
--

CREATE TABLE IF NOT EXISTS `invoices_panels` (
  `invoice_id` int(11) unsigned NOT NULL,
  `panel_id` int(11) unsigned NOT NULL,
  `panel_quantity` int(11) NOT NULL,
  `panel_name` varchar(20) DEFAULT NULL,
  `panel_price` float(12,2) NOT NULL,
  PRIMARY KEY (`invoice_id`,`panel_id`),
  KEY `panel_id` (`panel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices_panels`
--

INSERT INTO `invoices_panels` (`invoice_id`, `panel_id`, `panel_quantity`, `panel_name`, `panel_price`) VALUES
(1, 1, 12, NULL, 0.00),
(1, 2, 12, NULL, 0.00),
(4, 1, 3, NULL, 5000.00),
(5, 1, 3, NULL, 5000.00),
(6, 3, 12, NULL, 4250.00),
(7, 1, 1, NULL, 5000.00),
(8, 3, 1, NULL, 4250.00),
(9, 3, 3, NULL, 4250.00),
(10, 3, 1, NULL, 4250.00),
(11, 3, 2, NULL, 4250.00),
(12, 3, 2, NULL, 4250.00),
(13, 6, 3, NULL, 3500.00),
(14, 6, 3, NULL, 3500.00);

-- --------------------------------------------------------

--
-- Table structure for table `local_panel_prices`
--

CREATE TABLE IF NOT EXISTS `local_panel_prices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `monthly_customer_id` int(11) NOT NULL,
  `vol_low` int(5) NOT NULL,
  `vol_high` int(5) NOT NULL,
  `panel_id` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;
=======
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
>>>>>>> ee9f82de861e430032f8fe804090d0029ca97d74

--
-- Dumping data for table `local_panel_prices`
--

<<<<<<< HEAD
INSERT INTO `local_panel_prices` (`id`, `monthly_customer_id`, `vol_low`, `vol_high`, `panel_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 21, 1, 58.00, '0000-00-00 00:00:00', '2013-06-27 12:35:54'),
(2, 1, 1, 21, 2, 218.00, '0000-00-00 00:00:00', '2013-06-27 12:35:54'),
(3, 1, 1, 21, 3, 186.00, '0000-00-00 00:00:00', '2013-06-27 12:35:54'),
(4, 1, 1, 21, 4, 1684.00, '0000-00-00 00:00:00', '2013-06-27 12:35:54'),
(5, 1, 1, 21, 5, 1678.00, '0000-00-00 00:00:00', '2013-06-27 12:35:54'),
(6, 1, 1, 21, 6, 187.00, '0000-00-00 00:00:00', '2013-06-27 12:35:55'),
(7, 1, 1, 21, 7, 15647.00, '0000-00-00 00:00:00', '2013-06-27 12:35:55'),
(8, 1, 1, 21, 8, 4189.00, '0000-00-00 00:00:00', '2013-06-27 12:35:55'),
(9, 1, 0, 0, 1, 0.00, '0000-00-00 00:00:00', '2013-06-27 12:39:16'),
(10, 1, 0, 0, 2, 0.00, '0000-00-00 00:00:00', '2013-06-27 12:39:16'),
(11, 1, 0, 0, 3, 0.00, '0000-00-00 00:00:00', '2013-06-27 12:39:16'),
(12, 1, 0, 0, 4, 0.00, '0000-00-00 00:00:00', '2013-06-27 12:39:16'),
(13, 1, 0, 0, 5, 0.00, '0000-00-00 00:00:00', '2013-06-27 12:39:16'),
(14, 1, 0, 0, 6, 0.00, '0000-00-00 00:00:00', '2013-06-27 12:39:16'),
(15, 1, 0, 0, 7, 0.00, '0000-00-00 00:00:00', '2013-06-27 12:39:16'),
(16, 1, 0, 0, 8, 0.00, '0000-00-00 00:00:00', '2013-06-27 12:39:16'),
(17, 13, 1, 25, 1, 5000.00, '0000-00-00 00:00:00', '2013-07-03 05:47:37'),
(18, 13, 1, 25, 2, 4500.00, '0000-00-00 00:00:00', '2013-07-03 05:47:37'),
(19, 13, 1, 25, 3, 4250.00, '0000-00-00 00:00:00', '2013-07-03 05:47:37'),
(20, 13, 1, 25, 4, 4000.00, '0000-00-00 00:00:00', '2013-07-03 05:47:37'),
(21, 13, 1, 25, 5, 3750.00, '0000-00-00 00:00:00', '2013-07-03 05:47:37'),
(22, 13, 1, 25, 6, 3500.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(23, 13, 1, 25, 7, 3250.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(24, 13, 1, 25, 8, 3000.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(25, 13, 25, 50, 1, 4750.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(26, 13, 25, 50, 2, 4500.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(27, 13, 25, 50, 3, 4250.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(28, 13, 25, 50, 4, 4000.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(29, 13, 25, 50, 5, 3500.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(30, 13, 25, 50, 6, 3250.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(31, 13, 25, 50, 7, 3000.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(32, 13, 25, 50, 8, 2750.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(33, 13, 51, 75, 1, 4500.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(34, 13, 51, 75, 2, 4250.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(35, 13, 51, 75, 3, 4000.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(36, 13, 51, 75, 4, 3850.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(37, 13, 51, 75, 5, 3550.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(38, 13, 51, 75, 6, 3250.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(39, 13, 51, 75, 7, 3000.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(40, 13, 51, 75, 8, 2000.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(41, 13, 76, 100, 1, 4200.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(42, 13, 76, 100, 2, 4100.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(43, 13, 76, 100, 3, 3600.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(44, 13, 76, 100, 4, 3500.00, '0000-00-00 00:00:00', '2013-07-03 05:47:38'),
(45, 13, 76, 100, 5, 3400.00, '0000-00-00 00:00:00', '2013-07-03 05:47:39'),
(46, 13, 76, 100, 6, 3300.00, '0000-00-00 00:00:00', '2013-07-03 05:47:39'),
(47, 13, 76, 100, 7, 3200.00, '0000-00-00 00:00:00', '2013-07-03 05:47:39'),
(48, 13, 76, 100, 8, 3000.00, '0000-00-00 00:00:00', '2013-07-03 05:47:39');

-- --------------------------------------------------------
=======
LOCK TABLES `local_panel_prices` WRITE;
/*!40000 ALTER TABLE `local_panel_prices` DISABLE KEYS */;
INSERT INTO `local_panel_prices` VALUES (1,1,1,21,1,58.00,'0000-00-00 00:00:00','2013-06-27 12:35:54'),(2,1,1,21,2,218.00,'0000-00-00 00:00:00','2013-06-27 12:35:54'),(3,1,1,21,3,186.00,'0000-00-00 00:00:00','2013-06-27 12:35:54'),(4,1,1,21,4,1684.00,'0000-00-00 00:00:00','2013-06-27 12:35:54'),(5,1,1,21,5,1678.00,'0000-00-00 00:00:00','2013-06-27 12:35:54'),(6,1,1,21,6,187.00,'0000-00-00 00:00:00','2013-06-27 12:35:55'),(7,1,1,21,7,15647.00,'0000-00-00 00:00:00','2013-06-27 12:35:55'),(8,1,1,21,8,4189.00,'0000-00-00 00:00:00','2013-06-27 12:35:55'),(9,1,0,0,1,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(10,1,0,0,2,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(11,1,0,0,3,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(12,1,0,0,4,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(13,1,0,0,5,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(14,1,0,0,6,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(15,1,0,0,7,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(16,1,0,0,8,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(97,13,1,25,1,5666.00,'0000-00-00 00:00:00','2013-07-04 08:13:36'),(98,13,1,25,2,4500.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(99,13,1,25,3,4250.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(100,13,1,25,4,4000.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(101,13,1,25,5,3750.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(102,13,1,25,6,3500.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(103,13,1,25,7,3250.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(104,13,1,25,8,3000.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(105,13,25,50,1,4750.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(106,13,25,50,2,4500.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(107,13,25,50,3,4250.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(108,13,25,50,4,4000.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(109,13,25,50,5,3500.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(110,13,25,50,6,3250.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(111,13,25,50,7,3000.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(112,13,25,50,8,2750.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(113,13,51,75,1,4500.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(114,13,51,75,2,4250.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(115,13,51,75,3,4000.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(116,13,51,75,4,3850.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(117,13,51,75,5,3550.00,'0000-00-00 00:00:00','2013-07-04 08:13:37'),(118,13,51,75,6,3250.00,'0000-00-00 00:00:00','2013-07-04 08:13:38'),(119,13,51,75,7,3000.00,'0000-00-00 00:00:00','2013-07-04 08:13:38'),(120,13,51,75,8,2000.00,'0000-00-00 00:00:00','2013-07-04 08:13:38'),(121,13,76,100,1,2093.00,'0000-00-00 00:00:00','2013-07-04 08:13:38'),(122,13,76,100,2,9827.00,'0000-00-00 00:00:00','2013-07-04 08:13:38'),(123,13,76,100,3,9283.00,'0000-00-00 00:00:00','2013-07-04 08:13:38'),(124,13,76,100,4,9283.00,'0000-00-00 00:00:00','2013-07-04 08:13:38'),(125,13,76,100,5,2387.00,'0000-00-00 00:00:00','2013-07-04 08:13:38'),(126,13,76,100,6,8392.00,'0000-00-00 00:00:00','2013-07-04 08:13:38'),(127,13,76,100,7,4722.00,'0000-00-00 00:00:00','2013-07-04 08:13:38'),(128,13,76,100,8,7433.00,'0000-00-00 00:00:00','2013-07-04 08:13:38');
/*!40000 ALTER TABLE `local_panel_prices` ENABLE KEYS */;
UNLOCK TABLES;
>>>>>>> ee9f82de861e430032f8fe804090d0029ca97d74

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`type`, `name`, `migration`) VALUES
('package', 'auth', '001_auth_create_usertables'),
('package', 'auth', '002_auth_create_grouptables'),
('package', 'auth', '003_auth_create_roletables'),
('package', 'auth', '004_auth_create_permissiontables'),
('package', 'auth', '005_auth_create_authdefaults'),
('package', 'auth', '006_auth_add_authactions'),
('package', 'auth', '007_auth_add_permissionsfilter'),
('app', 'default', '001_create_users'),
('app', 'default', '002_create_access_rights'),
('app', 'default', '003_create_customers'),
('app', 'default', '004_create_panels'),
('app', 'default', '005_create_disorders'),
('app', 'default', '006_create_global_panel_prices'),
('app', 'default', '007_create_monthly_customers'),
('app', 'default', '008_create_invoices'),
('app', 'default', '009_create_local_panel_prices'),
('app', 'default', '011_create_states'),
('app', 'default', '012_create_cities');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_customers`
--

CREATE TABLE IF NOT EXISTS `monthly_customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `org_print_name` varchar(30) DEFAULT NULL,
  `org_code` varchar(5) DEFAULT NULL,
  `contract_file` varchar(50) DEFAULT NULL,
  `contract_discount` decimal(4,2) DEFAULT '0.00',
  `outstanding` decimal(12,2) NOT NULL DEFAULT '0.00',
  `duedate` date DEFAULT NULL,
  `last_payment_amount` float(12,2) DEFAULT NULL,
  `last_payment_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_monthly_customer` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `monthly_customers`
--

<<<<<<< HEAD
INSERT INTO `monthly_customers` (`id`, `customer_id`, `org_name`, `org_print_name`, `org_code`, `contract_file`, `contract_discount`, `outstanding`, `duedate`, `last_payment_amount`, `last_payment_date`, `created_at`, `updated_at`) VALUES
(1, 2, 'Neogen Labs', 'agr', '', '/var/www/invoice/readme.md', 0.00, 16000.00, '2013-06-28', NULL, NULL, '2013-06-21 12:09:05', '2013-07-03 07:42:16'),
(13, 58, 'Neogen Labs', 'Neogen Labs', NULL, NULL, NULL, 16050.00, NULL, NULL, NULL, '0000-00-00 00:00:00', '2013-07-03 07:02:52');

-- --------------------------------------------------------
=======
LOCK TABLES `monthly_customers` WRITE;
/*!40000 ALTER TABLE `monthly_customers` DISABLE KEYS */;
INSERT INTO `monthly_customers` VALUES (1,2,'Neogen Labs','agr','','/var/www/invoice/readme.md',0.00,30000.00,'2013-06-28',NULL,NULL,'2013-06-21 12:09:05','2013-07-04 07:43:52'),(13,58,'Neogen Labs','Neogen Labs',NULL,NULL,NULL,16050.00,NULL,NULL,NULL,'0000-00-00 00:00:00','2013-07-03 07:02:52');
/*!40000 ALTER TABLE `monthly_customers` ENABLE KEYS */;
UNLOCK TABLES;
>>>>>>> ee9f82de861e430032f8fe804090d0029ca97d74

--
-- Table structure for table `neogen_details`
--

CREATE TABLE IF NOT EXISTS `neogen_details` (
  `id` int(11) NOT NULL,
  `address_line_1` varchar(30) NOT NULL,
  `address_line_2` varchar(50) NOT NULL,
  `address_line_3` varchar(30) DEFAULT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phone_number` bigint(12) NOT NULL,
  `fax_number` bigint(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `website` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `neogen_details`
--

INSERT INTO `neogen_details` (`id`, `address_line_1`, `address_line_2`, `address_line_3`, `city`, `pincode`, `state`, `country`, `phone_number`, `fax_number`, `email`, `website`) VALUES
(1, 'UCF CENTER ', '84/3 Oil Mill Road (On Hennur Main Road)', 'Lingarajapuram', 'Bangalore', 560084, 'West Bengal', 'India', 918025805600, 908025805603, 'info@neogenlabs.com', 'www.neogenlabs.com');

-- --------------------------------------------------------

--
-- Table structure for table `panels`
--

CREATE TABLE IF NOT EXISTS `panels` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `panels`
--

INSERT INTO `panels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hb+FS+', '2013-06-18 18:18:22', '0000-00-00 00:00:00'),
(2, 'FS+', '2013-06-18 18:21:36', '0000-00-00 00:00:00'),
(3, 'FS', '2013-06-18 18:24:01', '0000-00-00 00:00:00'),
(4, 'MS', '2013-06-18 18:24:01', '0000-00-00 00:00:00'),
(5, 'Bio 6', '2013-06-18 18:25:09', '0000-00-00 00:00:00'),
(6, 'Bio 5', '2013-06-18 18:25:09', '0000-00-00 00:00:00'),
(7, 'Bio 4', '2013-06-18 18:26:59', '0000-00-00 00:00:00'),
(8, 'Hb+', '2013-06-18 18:26:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `panels_disorders`
--

CREATE TABLE IF NOT EXISTS `panels_disorders` (
  `panel_id` int(11) unsigned NOT NULL,
  `disorder_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`panel_id`,`disorder_id`),
  KEY `fk_panel_disorder_2` (`disorder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panels_disorders`
--

INSERT INTO `panels_disorders` (`panel_id`, `disorder_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(1, 2),
(2, 2),
(3, 2),
(5, 2),
(6, 2),
(7, 2),
(1, 3),
(2, 3),
(5, 3),
(6, 3),
(1, 4),
(2, 4),
(5, 4),
(1, 5),
(8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `states`
--

<<<<<<< HEAD
INSERT INTO `states` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'DL', 'NCR', '0000-00-00 00:00:00', '2013-07-04 03:48:26'),
(2, 'AP', 'Andhra Pradesh', '2013-02-27 09:20:16', '2013-07-04 03:48:30'),
(3, 'AR', 'Arunachal Pradesh', '2013-02-27 09:20:16', '2013-07-04 03:48:35'),
(4, 'AS', 'Assam', '2013-02-27 09:20:16', '2013-07-04 03:48:39'),
(5, 'BR', 'Bihar', '2013-02-27 09:20:17', '2013-07-04 03:48:42'),
(6, 'CH', 'Chhattisgarh', '2013-02-27 09:20:17', '2013-07-04 03:48:47'),
(7, 'GA', 'Goa', '2013-02-27 09:20:17', '2013-07-04 05:07:54'),
(8, 'GJ', 'Gujarat', '2013-02-27 09:20:17', '2013-07-04 03:48:58'),
(9, 'HR', 'Haryana', '2013-02-27 09:20:17', '2013-07-04 03:49:02'),
(10, 'HP', 'Himachal Pradesh', '2013-02-27 09:20:17', '2013-07-04 03:49:07'),
(11, 'JK', 'Jammu and Kashmir', '2013-02-27 09:20:17', '2013-07-04 05:08:03'),
(12, 'JH', 'Jharkhand', '2013-02-27 09:20:17', '2013-07-04 05:08:08'),
(13, 'KA', 'Karnataka', '2013-02-27 09:20:17', '2013-07-04 05:08:12'),
(14, 'KL', 'Kerala', '2013-02-27 09:20:17', '2013-07-04 05:08:31'),
(15, 'MP', 'Madhya Pradesh', '2013-02-27 09:20:17', '2013-07-04 05:08:41'),
(16, 'MH', 'Maharashtra', '2013-02-27 09:20:17', '2013-07-04 05:08:45'),
(17, 'MN', 'Manipur', '2013-02-27 09:20:17', '2013-07-04 05:08:53'),
(18, 'ML', 'Meghalaya', '2013-02-27 09:20:17', '2013-07-04 05:09:04'),
(19, 'MZ', 'Mizoram', '2013-02-27 09:20:17', '2013-07-04 05:09:18'),
(20, 'NL', 'Nagaland', '2013-02-27 09:20:17', '2013-07-04 05:10:01'),
(21, 'OD', 'Odisha', '2013-02-27 09:20:17', '2013-07-04 05:10:14'),
(22, 'PB', 'Punjab', '2013-02-27 09:20:17', '2013-07-04 05:10:27'),
(23, 'RJ', 'Rajasthan', '2013-02-27 09:20:17', '2013-07-04 05:10:33'),
(24, 'SK', 'Sikkim', '2013-02-27 09:20:17', '2013-07-04 05:10:37'),
(25, 'TN', 'Tamil Nadu', '2013-02-27 09:20:17', '2013-07-04 05:10:42'),
(26, 'TR', 'Tripura', '2013-02-27 09:20:18', '2013-07-04 05:10:45'),
(27, 'UP', 'Uttar Pradesh', '2013-02-27 09:20:18', '2013-07-04 05:10:50'),
(28, 'UK', 'Uttarakhand', '2013-02-27 09:20:18', '2013-07-04 05:10:54'),
(29, 'WB', 'West Bengal', '2013-02-27 09:20:18', '2013-07-04 04:10:27');

-- --------------------------------------------------------
=======
LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'','NCR','0000-00-00 00:00:00','2013-07-01 07:20:50'),(2,'','Andhra Pradesh','2013-02-27 09:20:16','2013-07-01 07:20:19'),(3,'','Arunachal Pradesh','2013-02-27 09:20:16','2013-07-01 07:20:19'),(4,'','Assam','2013-02-27 09:20:16','2013-07-01 07:20:19'),(5,'','Bihar','2013-02-27 09:20:17','2013-07-01 07:20:19'),(6,'','Chhattisgarh','2013-02-27 09:20:17','2013-07-01 07:20:19'),(7,'','Goa','2013-02-27 09:20:17','2013-07-01 07:20:19'),(8,'','Gujarat','2013-02-27 09:20:17','2013-07-01 07:20:19'),(9,'','Haryana','2013-02-27 09:20:17','2013-07-01 07:20:19'),(10,'','Himachal Pradesh','2013-02-27 09:20:17','2013-07-01 07:20:19'),(11,'','Jammu and Kashmir','2013-02-27 09:20:17','2013-07-01 07:20:19'),(12,'','Jharkhand','2013-02-27 09:20:17','2013-07-01 07:20:19'),(13,'','Karnataka','2013-02-27 09:20:17','2013-07-01 07:20:19'),(14,'','Kerala','2013-02-27 09:20:17','2013-07-01 07:20:19'),(15,'','Madhya Pradesh','2013-02-27 09:20:17','2013-07-01 07:20:19'),(16,'','Maharashtra','2013-02-27 09:20:17','2013-07-01 07:20:19'),(17,'','Manipur','2013-02-27 09:20:17','2013-07-01 07:20:19'),(18,'','Meghalaya','2013-02-27 09:20:17','2013-07-01 07:20:19'),(19,'','Mizoram','2013-02-27 09:20:17','2013-07-01 07:20:19'),(20,'','Nagaland','2013-02-27 09:20:17','2013-07-01 07:20:19'),(21,'','Orissa','2013-02-27 09:20:17','2013-07-01 07:20:19'),(22,'','Punjab','2013-02-27 09:20:17','2013-07-01 07:20:19'),(23,'','Rajasthan','2013-02-27 09:20:17','2013-07-01 07:20:19'),(24,'','Sikkim','2013-02-27 09:20:17','2013-07-01 07:20:19'),(25,'','Tamil Nadu','2013-02-27 09:20:17','2013-07-01 07:20:19'),(26,'','Tripura','2013-02-27 09:20:18','2013-07-01 07:20:19'),(27,'','Uttar Pradesh','2013-02-27 09:20:18','2013-07-01 07:20:19'),(28,'','Uttarakhand','2013-02-27 09:20:18','2013-07-01 07:20:19'),(29,'','West Bengal','2013-02-27 09:20:18','2013-07-01 07:20:19');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;
>>>>>>> ee9f82de861e430032f8fe804090d0029ca97d74

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `last_login_at` timestamp NOT NULL DEFAULT '2013-06-07 18:30:00',
  `created_at` timestamp NOT NULL DEFAULT '1999-12-31 13:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `last_login_at`, `created_at`, `updated_at`) VALUES
(5, 'anuj', 'admin', '2013-07-04 00:28:18', '2013-06-11 18:30:00', '2013-07-04 05:58:18');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_rights`
--
ALTER TABLE `access_rights`
  ADD CONSTRAINT `access_rights_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoices_panels`
--
ALTER TABLE `invoices_panels`
  ADD CONSTRAINT `invoices_panels_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `invoices_panels_ibfk_2` FOREIGN KEY (`panel_id`) REFERENCES `panels` (`id`);

--
-- Constraints for table `monthly_customers`
--
ALTER TABLE `monthly_customers`
  ADD CONSTRAINT `monthly_customers_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `panels_disorders`
--
ALTER TABLE `panels_disorders`
  ADD CONSTRAINT `panels_disorders_ibfk_1` FOREIGN KEY (`panel_id`) REFERENCES `panels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `panels_disorders_ibfk_2` FOREIGN KEY (`disorder_id`) REFERENCES `disorders` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
<<<<<<< HEAD
=======
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-07-04 14:45:00
>>>>>>> ee9f82de861e430032f8fe804090d0029ca97d74
