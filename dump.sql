CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `admin_ID` mediumint NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `minit` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `ssn` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `salary` int NOT NULL,
  `DNO` mediumint NOT NULL,
  `parkNO` int DEFAULT '1',
  `phone_number` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`admin_ID`),
  KEY `DNO` (`DNO`),
  KEY `parkNO` (`parkNO`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`DNO`) REFERENCES `department` (`department_ID`),
  CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`parkNO`) REFERENCES `park` (`Park_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Uma','D.','Luffy','111-11-1111','2023-03-23','11111 Bellaire st','Binary',0,1,1,'911','admin@petaluma.net','admin','$2y$10$d18sL0LVxcyzYi7lSjt3aOSu1XIXOu.w98ytXBI4WFtM8cPZK2Jga');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction`
--

DROP TABLE IF EXISTS `attraction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attraction` (
  `attraction_ID` mediumint NOT NULL AUTO_INCREMENT,
  `attraction_name` varchar(45) NOT NULL,
  `attraction_price` double NOT NULL,
  `parkNO` int NOT NULL,
  PRIMARY KEY (`attraction_ID`),
  KEY `parkNO` (`parkNO`),
  CONSTRAINT `attraction_ibfk_1` FOREIGN KEY (`parkNO`) REFERENCES `park` (`Park_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=504 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction`
--

LOCK TABLES `attraction` WRITE;
/*!40000 ALTER TABLE `attraction` DISABLE KEYS */;
INSERT INTO `attraction` VALUES (500,'Petaluma Wheel',10.25,1),(501,'Petaluma Speed',25.5,1),(502,'Petaluma Aqua',20,1),(503,'Petaluma Putt-Putt',30.5,1);
/*!40000 ALTER TABLE `attraction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attractionusage`
--

DROP TABLE IF EXISTS `attractionusage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attractionusage` (
  `memberID` int NOT NULL,
  `QtySpeed` int unsigned DEFAULT NULL,
  `QtyWheel` int unsigned DEFAULT NULL,
  `QtyAqua` int unsigned DEFAULT NULL,
  `QtyPutt` int unsigned DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractionusage`
--

LOCK TABLES `attractionusage` WRITE;
/*!40000 ALTER TABLE `attractionusage` DISABLE KEYS */;
INSERT INTO `attractionusage` VALUES (1,12,12,12,12,'2023-02-09 18:08:37'),(2,21,12,31,41,'2022-01-09 18:08:37'),(103,34,34,34,34,'2023-04-09 18:08:37');
/*!40000 ALTER TABLE `attractionusage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `department_ID` mediumint NOT NULL AUTO_INCREMENT,
  `department_name` varchar(45) NOT NULL,
  PRIMARY KEY (`department_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Petaluma Wheel'),(2,'Petaluma Speedway'),(3,'Petaluma Aqua'),(4,'Petaluma Putt'),(5,'Giftshop'),(6,'Admin');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expenses` (
  `expense_ID` int NOT NULL,
  `expense_name` varchar(45) NOT NULL,
  `expense_total` double DEFAULT NULL,
  PRIMARY KEY (`expense_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (1,'ticket',NULL);
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `get_parking_pass`
--

DROP TABLE IF EXISTS `get_parking_pass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `get_parking_pass` (
  `pass_ID` int NOT NULL AUTO_INCREMENT,
  `member_ID` mediumint NOT NULL,
  `date_issued` date NOT NULL,
  `parking_lot` varchar(255) NOT NULL,
  `parking_id` int DEFAULT NULL,
  `license_plate` varchar(10) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `duration` int NOT NULL,
  PRIMARY KEY (`pass_ID`),
  KEY `member_ID` (`member_ID`),
  CONSTRAINT `get_parking_pass_ibfk_1` FOREIGN KEY (`member_ID`) REFERENCES `member` (`member_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `get_parking_pass`
--

LOCK TABLES `get_parking_pass` WRITE;
/*!40000 ALTER TABLE `get_parking_pass` DISABLE KEYS */;
/*!40000 ALTER TABLE `get_parking_pass` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `update_slots` AFTER INSERT ON `get_parking_pass` FOR EACH ROW BEGIN
    IF NEW.parking_lot = 'Lot A' THEN
        UPDATE parking_slots SET available_slots = available_slots - 1 WHERE lot_name = 'Lot A';
    ELSEIF NEW.parking_lot = 'Lot B' THEN
        UPDATE parking_slots SET available_slots = available_slots - 1 WHERE lot_name = 'Lot B';
    ELSEIF NEW.parking_lot = 'Lot C' THEN
        UPDATE parking_slots SET available_slots = available_slots - 1 WHERE lot_name = 'Lot C';
    ELSEIF NEW.parking_lot = 'Lot D' THEN
        UPDATE parking_slots SET available_slots = available_slots - 1 WHERE lot_name = 'Lot D';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `delete_parking_pass` AFTER DELETE ON `get_parking_pass` FOR EACH ROW BEGIN
    IF OLD.parking_lot = 'Lot A' THEN
        UPDATE parking_slots SET available_slots = available_slots + 1 WHERE lot_name = 'Lot A';
    ELSEIF OLD.parking_lot = 'Lot B' THEN
        UPDATE parking_slots SET available_slots = available_slots + 1 WHERE lot_name = 'Lot B';
    ELSEIF OLD.parking_lot = 'Lot C' THEN
        UPDATE parking_slots SET available_slots = available_slots + 1 WHERE lot_name = 'Lot C';
    ELSEIF OLD.parking_lot = 'Lot D' THEN
        UPDATE parking_slots SET available_slots = available_slots + 1 WHERE lot_name = 'Lot D';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `giftshop`
--

DROP TABLE IF EXISTS `giftshop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giftshop` (
  `giftshop_ID` mediumint NOT NULL AUTO_INCREMENT,
  `giftshop_name` varchar(45) NOT NULL,
  `revenue_date` date NOT NULL,
  `total_revenue` double DEFAULT NULL,
  PRIMARY KEY (`giftshop_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giftshop`
--

LOCK TABLES `giftshop` WRITE;
/*!40000 ALTER TABLE `giftshop` DISABLE KEYS */;
/*!40000 ALTER TABLE `giftshop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maintenance` (
  `maintenance_ID` mediumint NOT NULL AUTO_INCREMENT,
  `maintenance_name` varchar(45) NOT NULL,
  `maintenance_description` varchar(255) NOT NULL,
  `maintenance_start_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maintenance_end_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `attractionID` mediumint NOT NULL,
  PRIMARY KEY (`maintenance_ID`),
  KEY `attractionID` (`attractionID`),
  CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`attractionID`) REFERENCES `attraction` (`attraction_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenance`
--

LOCK TABLES `maintenance` WRITE;
/*!40000 ALTER TABLE `maintenance` DISABLE KEYS */;
INSERT INTO `maintenance` VALUES (200,'Aqua Water Pressure','Fixing water pressure for Petaluma Aqua Ride','2023-04-10 04:53:00','2023-04-17 04:53:00',502),(201,'Petaluma Wheel Ride Inspection','Regular inspection of Petaluma Wheel Ride ','2023-04-04 04:55:00','2023-04-07 08:55:00',500),(202,'Petaluma Putt Inspection','Regular Inspection of Petaluma Putt','2023-04-01 09:56:00','2023-04-03 10:56:00',503),(203,'Electrical Systems Maintenance','Electrical Systems Maintenance for Speedway','2023-03-14 08:00:00','2023-03-20 19:00:00',501),(204,'Painting and Refurbishment ','Painting and Refurbished Petaluma Wheel ','2023-03-08 10:04:00','2023-03-26 17:58:00',500),(205,'Safety Inspection','Safety Inspection for Petaluma Wheel ','2023-03-21 08:59:00','2023-04-10 04:59:00',500),(206,'Water Quality Maintenance ','Testing water quality of Petaluma Aqua','2023-02-15 09:04:00','2023-02-10 05:00:00',502);
/*!40000 ALTER TABLE `maintenance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member` (
  `member_ID` mediumint NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `email_address` varchar(45) NOT NULL,
  `join_date` date NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `QtyWheel` int unsigned DEFAULT '0',
  `QtySpeed` int unsigned DEFAULT '0',
  `QtyAqua` int unsigned DEFAULT '0',
  `QtyPutt` int unsigned DEFAULT '0',
  PRIMARY KEY (`member_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (102,'Bobby','Brown','Male','732 Fondren, Houston, TX','1987-06-09','832-494-8711','BBrown32@gmail.com','2023-04-03','$2y$10$Rv2BW4hAUB02kB054BwQAO4p7EB5ZQFgQM1EGSKK0dUhsEur19ve.','BBrown',0,0,0,0),(103,'Bobby','Brown','Female','111 eldridge lane','2023-03-28','111-111-1111','brown@gmail.com','2023-03-28','$2y$10$wch8aLs8/dGM9Vi0Z5uAlOzfdaHK3jPHz75MLFdBnAvxq6Xi91scq','brown',5,6,4,5),(104,'me','wa','Female','aw','2023-03-07','111-111-1111','brown@gmail.com','2023-03-28','$2y$10$4mBshpgnyGJ05BCxDnLWCO6AqtrH1DDx/xV6P0Y1nx6Tjz45pnJS2','member',0,0,0,0),(105,'Sally','Sea','Female','613 Uma St Houston, TX','2003-02-13','613-715-8989','SallySeasShells@yahoo.com','2023-04-12','$2y$10$jXN5rmtdu0FzDsKHLY7wl.jBNphSkeLm3DNhaAejjME.2nMA9j.x2','SSea',10,7,8,22),(106,'Peter','Pickles','Male','189 Cypress Houston, TX','1994-06-16','713-895-7894','PPickles@gmail.com','2023-04-12','$2y$10$oLSjWAMdmu6TMotXFRR.4.OYfdbnxXK/kCumaFfciPhq2MAFI.v2K','PPickles',16,23,35,29),(107,'Princess','Peaches','Female','123 Mario St. Houston, TX','1965-01-08','189-199-7894','ilovemario@gmail.com','2023-04-12','$2y$10$jAvnByQXGBSlsE5k4clKMuPVACDBOPVQqhRul7eWZTHbFLj/czJQS','PPeaches',16,35,18,20),(108,'Bing','Bong','Male','789 Fondren Houston, TX','2000-11-15','123-456-7891','Bong1234@yahoo.com','2023-04-12','$2y$10$YhN14GzIQp9w97Or7Z0jn.eIfyaKFaQ6pzGcWKAh3M.14vAUp0fl.','BingBong',25,35,15,25),(109,'AA','AA','Female','123 main st','2023-03-28','555-555-5555','aa@gmail.com','2023-03-28','$2y$10$1HlaKIxWlbbSuH8k2EJpKuj8Rk1v8JbLgNgg/cN8NvYHZXrz7CLYm','aa',0,0,0,0),(110,'test3','test3','Female','test@gmail.com','2023-03-28','555-555-5555','test@gmail.com','2023-03-28','$2y$10$xcFp.eHQOJ1Bx6XsnO0N0.mX3KzvO5..nnsXHEYpWOrgYB9jo9JwW','test3',0,0,0,0),(111,'test4','test4','Female','123','2023-03-28','555-555-5555','acecilieeo@gmail.com','2023-03-28','$2y$10$RsCRABcmmBvOullSV95PkeqR5d9ZIGO/4CEzmxltJ5wXPVasjALbq','test4',0,0,0,0);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orderdetails` (
  `order_detail_ID` int NOT NULL AUTO_INCREMENT,
  `orderID` int NOT NULL,
  `productID` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_detail_ID`),
  KEY `orderID` (`orderID`),
  KEY `productID` (`productID`),
  CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderdetails`
--

LOCK TABLES `orderdetails` WRITE;
/*!40000 ALTER TABLE `orderdetails` DISABLE KEYS */;
INSERT INTO `orderdetails` VALUES (70,80,12,1,25.00),(71,80,9,1,19.00),(72,88,15,3,75.00),(74,90,12,1,25.00),(76,87,9,3,57.00),(77,88,11,10,150.00);
/*!40000 ALTER TABLE `orderdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `member_ID` mediumint NOT NULL,
  `order_date` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `member_ID` (`member_ID`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`member_ID`) REFERENCES `member` (`member_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (80,103,'2023-04-02',25.00),(85,103,'2023-04-05',19.00),(86,102,'2014-11-23',100.50),(87,104,'2017-03-20',240.32),(88,103,'2015-04-20',140.95),(89,102,'2019-12-20',1240.32),(90,103,'2012-06-29',70.50);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `park`
--

DROP TABLE IF EXISTS `park`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `park` (
  `Park_ID` int NOT NULL,
  `ParkName` varchar(45) NOT NULL,
  `daily_visitors` int NOT NULL,
  `freq_Attraction` varchar(45) NOT NULL,
  `most_freq_Restaurant` varchar(45) NOT NULL,
  `most_freq_GiftShop` varchar(45) NOT NULL,
  `num_InclementWeather` int NOT NULL,
  `num_Employee` int NOT NULL,
  `num_parking_lots` int NOT NULL,
  `total_restaurants` int NOT NULL,
  `total_gift_shops` int NOT NULL,
  PRIMARY KEY (`Park_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `park`
--

LOCK TABLES `park` WRITE;
/*!40000 ALTER TABLE `park` DISABLE KEYS */;
INSERT INTO `park` VALUES (1,'Petaluma',10,'Attraction1','Rest1','Gift1',0,0,1,0,0);
/*!40000 ALTER TABLE `park` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parking`
--

DROP TABLE IF EXISTS `parking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parking` (
  `parking_ID` int NOT NULL,
  `parking_lot_name` varchar(45) NOT NULL,
  `parking_rate` decimal(10,0) NOT NULL,
  `total_parking_space` int NOT NULL,
  `available_slots` int unsigned DEFAULT NULL,
  `PARK_Park_ID` int NOT NULL,
  `expiration_time` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`parking_ID`),
  KEY `fk_PARKING_PARK1_idx` (`PARK_Park_ID`),
  CONSTRAINT `fk_PARKING_PARK1` FOREIGN KEY (`PARK_Park_ID`) REFERENCES `park` (`Park_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parking`
--

LOCK TABLES `parking` WRITE;
/*!40000 ALTER TABLE `parking` DISABLE KEYS */;
/*!40000 ALTER TABLE `parking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parking_slots`
--

DROP TABLE IF EXISTS `parking_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parking_slots` (
  `lot_name` varchar(50) NOT NULL,
  `total_slots` int NOT NULL,
  `available_slots` int unsigned NOT NULL,
  PRIMARY KEY (`lot_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parking_slots`
--

LOCK TABLES `parking_slots` WRITE;
/*!40000 ALTER TABLE `parking_slots` DISABLE KEYS */;
INSERT INTO `parking_slots` VALUES ('Lot A',100,100),('Lot B',150,150),('Lot C',200,200),('Lot D',75,75);
/*!40000 ALTER TABLE `parking_slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `des` text,
  `price` double NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`productID`),
  UNIQUE KEY `giftID_UNIQUE` (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (9,'Petaluma Plushie','Squishy plushy',19,40,'2021-04-10 00:00:00'),(11,'Petaluma Cap','Baseball Cap',15,40,'2021-04-10 00:00:00'),(12,'Petaluma Hoodie','Sweatshirt',25,40,'2021-04-10 00:00:00'),(15,'Petaluma Bracelet','Beaded Bracelet',25,100,'2021-04-10 00:00:00');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_booth`
--

DROP TABLE IF EXISTS `ticket_booth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket_booth` (
  `ticket_ID` int NOT NULL AUTO_INCREMENT,
  `purchase_date` date NOT NULL DEFAULT '2024-07-28',
  `QtyWheel` int NOT NULL DEFAULT '0',
  `QtySpeed` int NOT NULL DEFAULT '0',
  `QtyAqua` int NOT NULL DEFAULT '0',
  `QtyPutt` int NOT NULL DEFAULT '0',
  `ticket_total` double NOT NULL DEFAULT '0',
  `member_id` int DEFAULT NULL,
  PRIMARY KEY (`ticket_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_booth`
--

LOCK TABLES `ticket_booth` WRITE;
/*!40000 ALTER TABLE `ticket_booth` DISABLE KEYS */;
INSERT INTO `ticket_booth` VALUES (14,'2023-03-28',2,1,3,1,136.5,103),(15,'2023-02-16',1,0,0,1,40.75,103),(16,'2023-03-10',0,5,1,3,239,103),(17,'2023-02-14',2,0,0,0,20.5,103),(18,'2023-03-27',1,2,0,5,213.75,105),(19,'2023-03-02',2,2,2,2,172.5,105),(20,'2023-02-14',2,2,2,2,172.5,105),(21,'2023-03-16',5,1,4,8,400.75,105),(22,'2023-03-28',0,0,0,5,152.5,105),(23,'2023-03-28',1,2,1,5,233.75,106),(24,'2022-12-28',4,4,1,3,254.5,106),(25,'2023-03-08',1,2,3,4,243.25,106),(26,'2023-02-14',1,0,0,0,10.25,106),(27,'2023-03-10',1,5,3,8,441.75,106),(28,'2023-01-11',3,6,4,8,507.75,106),(29,'2022-06-14',5,4,23,1,643.75,106),(30,'2023-03-28',2,1,5,4,268,107),(31,'2023-03-06',1,2,4,6,324.25,107),(32,'2023-01-25',2,2,2,2,172.5,107),(33,'2023-02-14',2,2,2,2,172.5,107),(34,'2023-01-03',5,3,2,1,198.25,107),(35,'2022-11-28',2,23,1,3,718.5,107),(36,'2023-03-08',2,2,2,2,172.5,107),(37,'2023-03-28',2,2,2,2,172.5,108),(38,'2023-01-11',4,4,0,4,265,108),(39,'2023-03-09',2,2,2,2,172.5,108),(40,'2023-01-19',4,5,4,4,370.5,108),(41,'2023-02-14',3,3,3,3,258.75,108),(42,'2022-11-17',4,4,4,4,345,108),(43,'2022-12-23',6,6,0,6,397.5,108),(44,'2023-03-17',0,9,0,0,229.5,108);
/*!40000 ALTER TABLE `ticket_booth` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `ticket_booth_BEFORE_INSERT` BEFORE INSERT ON `ticket_booth` FOR EACH ROW BEGIN
set NEW.ticket_total = (NEW.QtyWheel* 5) + (NEW.QtySpeed * 35) + (NEW.QtyAqua * 15) + (NEW.QtyPutt * 25);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `parkingCheck` BEFORE INSERT ON `ticket_booth` FOR EACH ROW UPDATE parking SET available_slots = available_slots - 1 WHERE parking_ID = 1 */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `addTicketsToMember` BEFORE INSERT ON `ticket_booth` FOR EACH ROW BEGIN
    UPDATE member SET member.QtyWheel = member.QtyWheel + NEW.QtyWheel WHERE member.`member_ID` = NEW.`member_id`; 
    UPDATE member SET member.QtySpeed = member.QtySpeed + NEW.QtySpeed WHERE member.`member_ID` = NEW.`member_id`;
    UPDATE member SET member.QtyAqua = member.QtyAqua + NEW.QtyAqua WHERE member.`member_ID`= NEW.`member_id`;
    UPDATE member SET member.QtyPutt = member.QtyPutt + NEW.QtyPutt WHERE member.`member_ID` = NEW.`member_id`;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `calcTicketTotal` BEFORE INSERT ON `ticket_booth` FOR EACH ROW BEGIN
 set NEW.ticket_total = (NEW.QtyWheel* 10.25) + (NEW.QtySpeed * 25.50) + (NEW.QtyAqua * 20.00) + (NEW.QtyPutt * 30.50);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `visitor`
--

DROP TABLE IF EXISTS `visitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visitor` (
  `visitor_ID` int NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_initial` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) NOT NULL,
  `email_address` varchar(45) NOT NULL,
  `parking_purchased` tinyint NOT NULL,
  `PARK_Park_ID` int NOT NULL,
  PRIMARY KEY (`visitor_ID`),
  KEY `fk_VISITOR_PARK1_idx` (`PARK_Park_ID`),
  CONSTRAINT `fk_VISITOR_PARK1` FOREIGN KEY (`PARK_Park_ID`) REFERENCES `park` (`Park_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitor`
--

LOCK TABLES `visitor` WRITE;
/*!40000 ALTER TABLE `visitor` DISABLE KEYS */;
/*!40000 ALTER TABLE `visitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'mydb'
--
/*!50106 SET @save_time_zone= @@TIME_ZONE */ ;
/*!50106 DROP EVENT IF EXISTS `deletion` */;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `deletion` ON SCHEDULE EVERY 50 SECOND STARTS '2023-04-15 22:22:47' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM get_parking_pass WHERE end_time > DATE_SUB(NOW(), INTERVAL 50 SECOND) */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
DELIMITER ;
/*!50106 SET TIME_ZONE= @save_time_zone */ ;

--
-- Dumping routines for database 'mydb'
--
/*!50003 DROP PROCEDURE IF EXISTS `delete_expired_parking_passes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_expired_parking_passes`()
BEGIN
  DELETE FROM get_parking_pass WHERE end_time < NOW();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-15 23:55:23
