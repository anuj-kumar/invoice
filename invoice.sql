-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: invoice
-- ------------------------------------------------------
-- Server version	5.5.31-0ubuntu0.12.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `access_rights`
--

DROP TABLE IF EXISTS `access_rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `print_invoice` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `view_archive` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `add_panel` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `add_monthly_customer` enum('0','1') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `access_rights_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_rights`
--

LOCK TABLES `access_rights` WRITE;
/*!40000 ALTER TABLE `access_rights` DISABLE KEYS */;
INSERT INTO `access_rights` VALUES (2,5,'1','','1','1','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `access_rights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('single','monthly') NOT NULL DEFAULT 'single',
  `title` enum('Mr.','Mrs.','Ms.','Dr.') NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address_line_1` varchar(50) NOT NULL,
  `address_line_2` varchar(50) NOT NULL,
  `address_line_3` varchar(50) DEFAULT NULL,
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `pincode` int(6) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'single','Mr.','','Kantishah','Chalti gali','Khisakti Building','',1,1,981374,2147483647,'lksjdfgk','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'monthly','Mr.','Thomas','Mookken','Neogen Labs','UCF Center','Near Lingarajapuram Bus Stand',1,1,171717,1717171717,'anuj_@outlook.com','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'single','Mr.','alskdf','lksdjf','laksjdhf','lksadjfg','sldkfjg',0,0,123231,2147483647,'a@a.xom','0000-00-00 00:00:00','2013-06-24 11:59:07'),(4,'single','Dr.','laskdf','lsdkjfng','lkdsfng','lkdsfng','sklfdg',0,0,0,2147483647,'a@a.a','0000-00-00 00:00:00','2013-06-25 05:03:10'),(5,'single','Dr.','laskdf','lsdkjfng','laskdjf','ksdjfg','kjfgld',0,0,0,2147483647,'a@a.a','0000-00-00 00:00:00','2013-06-25 05:15:07'),(6,'single','Dr.','laskdf','lsdkjfng','lasdf','lksdfj','lkdsjg',0,0,0,2147483647,'a@a.b','0000-00-00 00:00:00','2013-06-25 05:45:27'),(7,'single','Dr.','laskdf','lsdkjfng','lasdf','lksdfj','lkdsjg',0,0,0,2147483647,'a@a.b','0000-00-00 00:00:00','2013-06-25 06:00:20'),(8,'monthly','Dr.','dofijg','name','sjfb','dfgj',NULL,0,0,251001,2147483647,'a@a.a','0000-00-00 00:00:00','2013-06-28 10:03:26'),(9,'monthly','Dr.','ldskfj','name','lkdfj','ldkfjg',NULL,0,0,0,2147483647,'a@a.a','0000-00-00 00:00:00','2013-06-28 10:06:33'),(10,'monthly','Dr.','ldskfj','name','lkdfj','ldkfjg',NULL,0,0,0,2147483647,'a@a.a','0000-00-00 00:00:00','2013-06-28 11:05:42');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disorders`
--

DROP TABLE IF EXISTS `disorders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disorders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disorders`
--

LOCK TABLES `disorders` WRITE;
/*!40000 ALTER TABLE `disorders` DISABLE KEYS */;
INSERT INTO `disorders` VALUES (1,'1','','2013-06-18 00:00:00','2013-06-18 00:00:00'),(2,'2','','2013-06-18 00:00:00','2013-06-18 00:00:00'),(3,'3','','2013-06-18 00:00:00','2013-06-18 00:00:00'),(4,'4','','2013-06-18 00:00:00','2013-06-18 00:00:00'),(5,'5','','2013-06-18 00:00:00','2013-06-18 00:00:00');
/*!40000 ALTER TABLE `disorders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `global_panel_prices`
--

DROP TABLE IF EXISTS `global_panel_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `global_panel_prices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vol_low` int(5) NOT NULL,
  `vol_high` int(5) NOT NULL,
  `panel_id` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `global_panel_prices`
--

LOCK TABLES `global_panel_prices` WRITE;
/*!40000 ALTER TABLE `global_panel_prices` DISABLE KEYS */;
INSERT INTO `global_panel_prices` VALUES (1,1,25,1,5000.00,'0000-00-00 00:00:00','2013-06-27 09:43:47'),(2,1,25,2,4500.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(3,1,25,3,4250.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(4,1,25,4,4000.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(5,1,25,5,3750.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(6,1,25,6,3500.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(7,1,25,7,3250.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(8,1,25,8,3000.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(9,1,25,9,2750.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(10,25,50,1,4750.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(11,25,50,2,4500.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(12,25,50,3,4250.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(13,25,50,4,4000.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(14,25,50,5,3500.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(15,25,50,6,3250.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(16,25,50,7,3000.00,'0000-00-00 00:00:00','2013-06-27 09:43:48'),(17,25,50,8,2750.00,'0000-00-00 00:00:00','2013-06-27 09:43:49'),(18,25,50,9,2500.00,'0000-00-00 00:00:00','2013-06-27 09:43:49'),(19,51,100,1,4500.00,'0000-00-00 00:00:00','2013-06-28 01:45:53'),(20,51,100,2,4250.00,'0000-00-00 00:00:00','2013-06-28 01:46:14'),(21,51,100,3,4000.00,'0000-00-00 00:00:00','2013-06-28 01:46:23'),(22,51,100,4,3850.00,'0000-00-00 00:00:00','2013-06-28 01:46:35'),(23,51,100,5,3550.00,'0000-00-00 00:00:00','2013-06-28 01:46:43'),(24,51,100,6,3250.00,'0000-00-00 00:00:00','2013-06-28 01:46:50'),(25,51,100,7,3000.00,'0000-00-00 00:00:00','2013-06-28 01:47:05'),(26,51,100,8,2000.00,'0000-00-00 00:00:00','2013-06-28 01:47:12'),(27,51,100,9,1000.00,'0000-00-00 00:00:00','2013-06-28 01:47:18');
/*!40000 ALTER TABLE `global_panel_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `timestamp` datetime NOT NULL,
  `amount` float NOT NULL,
  `tax_1` float(5,2) NOT NULL,
  `tax_2` float(5,2) NOT NULL,
  `tax_3` float(5,2) NOT NULL,
  `tax_4` float(5,2) NOT NULL,
  `discount_1` float(4,2) NOT NULL,
  `discount_2` float(4,2) NOT NULL,
  `discount_3` float(4,2) NOT NULL,
  `balance` float(12,2) NOT NULL,
  `payment_mode` enum('cash','cheque','demand draft') NOT NULL,
  `cheque_number` int(11) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_branch` varchar(50) DEFAULT NULL,
  `bank_city` varchar(50) DEFAULT NULL,
  `comment` text NOT NULL,
  `review_number` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_costumer` (`customer_id`),
  KEY `fk_invoice_user` (`user_id`),
  CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,1,5,'Kuch bhi falana dimka','2013-06-13','2013-06-13 00:00:00',2100000,4.00,5.00,6.00,7.00,0.99,0.99,0.99,0.00,'cash',NULL,NULL,NULL,NULL,'alksdjfgsdng',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,5,'lksadngfkansg','2013-06-13','0000-00-00 00:00:00',2300.23,2.30,2.30,2.30,2.30,0.99,0.99,0.99,0.00,'cash',NULL,NULL,NULL,NULL,'lasdjfglksdga',23,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,2,5,'askdjflakjfkl','2013-06-18','0000-00-00 00:00:00',9128.12,2.00,2.00,2.00,2.00,0.99,0.99,0.99,0.00,'cash',NULL,NULL,NULL,NULL,'laknsdlkgfsd',0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices_panels`
--

DROP TABLE IF EXISTS `invoices_panels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices_panels` (
  `invoice_id` int(11) unsigned NOT NULL,
  `panel_id` int(11) unsigned NOT NULL,
  `panel_quantity` int(11) NOT NULL,
  `panel_price` float(12,2) NOT NULL,
  PRIMARY KEY (`invoice_id`,`panel_id`),
  KEY `panel_id` (`panel_id`),
  CONSTRAINT `invoices_panels_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  CONSTRAINT `invoices_panels_ibfk_2` FOREIGN KEY (`panel_id`) REFERENCES `panels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices_panels`
--

LOCK TABLES `invoices_panels` WRITE;
/*!40000 ALTER TABLE `invoices_panels` DISABLE KEYS */;
INSERT INTO `invoices_panels` VALUES (1,1,12,0.00),(1,2,12,0.00);
/*!40000 ALTER TABLE `invoices_panels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `local_panel_prices`
--

DROP TABLE IF EXISTS `local_panel_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `local_panel_prices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `monthly_customer_id` int(11) NOT NULL,
  `vol_low` int(5) NOT NULL,
  `vol_high` int(5) NOT NULL,
  `panel_id` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local_panel_prices`
--

LOCK TABLES `local_panel_prices` WRITE;
/*!40000 ALTER TABLE `local_panel_prices` DISABLE KEYS */;
INSERT INTO `local_panel_prices` VALUES (1,1,1,21,1,58.00,'0000-00-00 00:00:00','2013-06-27 12:35:54'),(2,1,1,21,2,218.00,'0000-00-00 00:00:00','2013-06-27 12:35:54'),(3,1,1,21,3,186.00,'0000-00-00 00:00:00','2013-06-27 12:35:54'),(4,1,1,21,4,1684.00,'0000-00-00 00:00:00','2013-06-27 12:35:54'),(5,1,1,21,5,1678.00,'0000-00-00 00:00:00','2013-06-27 12:35:54'),(6,1,1,21,6,187.00,'0000-00-00 00:00:00','2013-06-27 12:35:55'),(7,1,1,21,7,15647.00,'0000-00-00 00:00:00','2013-06-27 12:35:55'),(8,1,1,21,8,4189.00,'0000-00-00 00:00:00','2013-06-27 12:35:55'),(9,1,0,0,1,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(10,1,0,0,2,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(11,1,0,0,3,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(12,1,0,0,4,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(13,1,0,0,5,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(14,1,0,0,6,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(15,1,0,0,7,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16'),(16,1,0,0,8,0.00,'0000-00-00 00:00:00','2013-06-27 12:39:16');
/*!40000 ALTER TABLE `local_panel_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('package','auth','001_auth_create_usertables'),('package','auth','002_auth_create_grouptables'),('package','auth','003_auth_create_roletables'),('package','auth','004_auth_create_permissiontables'),('package','auth','005_auth_create_authdefaults'),('package','auth','006_auth_add_authactions'),('package','auth','007_auth_add_permissionsfilter'),('app','default','001_create_users'),('app','default','002_create_access_rights'),('app','default','003_create_customers'),('app','default','004_create_panels'),('app','default','005_create_disorders'),('app','default','006_create_global_panel_prices'),('app','default','007_create_monthly_customers'),('app','default','008_create_invoices'),('app','default','009_create_local_panel_prices'),('app','default','011_create_states'),('app','default','012_create_cities');
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monthly_customers`
--

DROP TABLE IF EXISTS `monthly_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monthly_customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `org_print_name` varchar(30) DEFAULT NULL,
  `org_code` varchar(5) NOT NULL,
  `contract_file` varchar(50) NOT NULL,
  `contract_discount` decimal(4,2) NOT NULL,
  `outstanding` decimal(12,2) NOT NULL DEFAULT '0.00',
  `duedate` date NOT NULL,
  `last_payment_amount` float(12,2) DEFAULT NULL,
  `last_payment_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_monthly_customer` (`customer_id`),
  CONSTRAINT `monthly_customers_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monthly_customers`
--

LOCK TABLES `monthly_customers` WRITE;
/*!40000 ALTER TABLE `monthly_customers` DISABLE KEYS */;
INSERT INTO `monthly_customers` VALUES (1,2,'',NULL,'','/var/www/invoice/readme.md',0.00,12000.00,'2013-06-28',NULL,NULL,'2013-06-21 12:09:05','2013-06-21 06:39:05');
/*!40000 ALTER TABLE `monthly_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `panels`
--

DROP TABLE IF EXISTS `panels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `panels` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `panels`
--

LOCK TABLES `panels` WRITE;
/*!40000 ALTER TABLE `panels` DISABLE KEYS */;
INSERT INTO `panels` VALUES (1,'Hb+FS+','2013-06-18 18:18:22','0000-00-00 00:00:00'),(2,'FS+','2013-06-18 18:21:36','0000-00-00 00:00:00'),(3,'FS','2013-06-18 18:24:01','0000-00-00 00:00:00'),(4,'MS','2013-06-18 18:24:01','0000-00-00 00:00:00'),(5,'Bio 6','2013-06-18 18:25:09','0000-00-00 00:00:00'),(6,'Bio 5','2013-06-18 18:25:09','0000-00-00 00:00:00'),(7,'Bio 4','2013-06-18 18:26:59','0000-00-00 00:00:00'),(8,'Hb+','2013-06-18 18:26:59','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `panels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `panels_disorders`
--

DROP TABLE IF EXISTS `panels_disorders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `panels_disorders` (
  `panel_id` int(11) unsigned NOT NULL,
  `disorder_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`panel_id`,`disorder_id`),
  KEY `fk_panel_disorder_2` (`disorder_id`),
  CONSTRAINT `panels_disorders_ibfk_1` FOREIGN KEY (`panel_id`) REFERENCES `panels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `panels_disorders_ibfk_2` FOREIGN KEY (`disorder_id`) REFERENCES `disorders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `panels_disorders`
--

LOCK TABLES `panels_disorders` WRITE;
/*!40000 ALTER TABLE `panels_disorders` DISABLE KEYS */;
INSERT INTO `panels_disorders` VALUES (1,1),(2,1),(3,1),(4,1),(1,2),(2,2),(3,2),(5,2),(6,2),(7,2),(1,3),(2,3),(5,3),(6,3),(1,4),(2,4),(5,4),(1,5),(8,5);
/*!40000 ALTER TABLE `panels_disorders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `last_login_at` timestamp NOT NULL DEFAULT '2013-06-07 18:30:00',
  `created_at` timestamp NOT NULL DEFAULT '1999-12-31 13:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'anuj','admin','2013-06-30 23:25:25','2013-06-11 18:30:00','2013-07-01 04:55:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

<<<<<<< HEAD
-- Dump completed on 2013-07-01 10:49:21
=======
-- Dump completed on 2013-07-01 15:57:32
>>>>>>> 08f648faf0fa2ce15c78463c7cdeddf952c52f3b
