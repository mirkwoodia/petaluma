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
-- Table structure for table `attraction`
--

DROP TABLE IF EXISTS `attraction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attraction` (
  `attraction_ID` int NOT NULL,
  `attraction_Name` varchar(45) NOT NULL,
  `attraction_location` varchar(45) NOT NULL,
  `attraction_capacity` int NOT NULL,
  `num_days_broken` int NOT NULL,
  `attraction_maintenance_schedule` varchar(45) DEFAULT NULL,
  `attraction_age_limit` int NOT NULL,
  `attaction_height_limit` int NOT NULL,
  `attraction_opening_date` varchar(45) NOT NULL,
  `PARK_Park_ID` int NOT NULL,
  `attraction_price` double DEFAULT NULL,
  PRIMARY KEY (`attraction_ID`),
  KEY `fk_ATTRACTION_PARK1_idx` (`PARK_Park_ID`),
  CONSTRAINT `fk_ATTRACTION_PARK1` FOREIGN KEY (`PARK_Park_ID`) REFERENCES `park` (`Park_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction`
--

LOCK TABLES `attraction` WRITE;
/*!40000 ALTER TABLE `attraction` DISABLE KEYS */;
/*!40000 ALTER TABLE `attraction` ENABLE KEYS */;
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
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `employee_ID` mediumint NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `minit` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `ssn` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `salary` int NOT NULL,
  `DNO` mediumint NOT NULL,
  `parkNO` int NOT NULL DEFAULT '1',
  `phone_number` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`employee_ID`),
  KEY `DNO` (`DNO`),
  KEY `parkNO` (`parkNO`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`DNO`) REFERENCES `department` (`department_ID`),
  CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`parkNO`) REFERENCES `park` (`Park_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
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
  PRIMARY KEY (`pass_ID`),
  KEY `member_ID` (`member_ID`),
  CONSTRAINT `get_parking_pass_ibfk_1` FOREIGN KEY (`member_ID`) REFERENCES `member` (`member_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `get_parking_pass`
--

LOCK TABLES `get_parking_pass` WRITE;
/*!40000 ALTER TABLE `get_parking_pass` DISABLE KEYS */;
INSERT INTO `get_parking_pass` VALUES (10,108,'2023-04-07','',NULL),(11,112,'2023-04-07','Lot B',NULL);
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
  `parkNO` int NOT NULL,
  PRIMARY KEY (`maintenance_ID`),
  KEY `parkNO` (`parkNO`),
  CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`parkNO`) REFERENCES `park` (`Park_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenance`
--

LOCK TABLES `maintenance` WRITE;
/*!40000 ALTER TABLE `maintenance` DISABLE KEYS */;
INSERT INTO `maintenance` VALUES (200,'test','testing test','2023-04-04 05:59:00','2023-04-04 05:59:00',1);
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
  PRIMARY KEY (`member_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (102,'Bobby','Brown','Male','732 Fondren, Houston, TX','1987-06-09','832-494-8711','BBrown32@gmail.com','2023-04-03','$2y$10$Rv2BW4hAUB02kB054BwQAO4p7EB5ZQFgQM1EGSKK0dUhsEur19ve.','BBrown'),(103,'John','Doe','Male','123 main st, Houston, TX','2020-09-09','713-476-1479','JDoe@gmail.com','2023-04-05','$2ytesty$2y$10$Rv2BW4hAUB02kwB054BwQAO4p7EB5ZQFgQM1E1GSKK0dUhsEur19ve.','JDoe'),(104,'John','One','Male','123 main st, Houston, TX','2020-09-09','832-494-8711','JDoe@gmail.com','2023-04-05','$2ytesty$2y$10$Rv2BW4hAUB02kwB054BwQAO4p7EB5ZQFgQM1EGSKK0dUhsEur19v2e.','JDoe1'),(105,'John','Two','Male','123 main st, Houston, TX','2020-09-09','832-494-8711','JDoe@gmail.com','2023-04-05','$2ytesty$2y$10$Rv2BW4hAUB02kwB054BwQAO4p7EB5ZQFgQM1EG3SKK0dUhsEur19ve.','JDoe2'),(106,'John','Three','Male','123 main st, Houston, TX','2020-09-09','832-494-8711','JDoe@gmail.com','2023-04-05','$2ytesty$2y$10$Rv2BW4hAUB02kwB054BwQAO4p7EB5ZQFgQM1EGSKK0dUhsEur192ve.','JDoe3'),(107,'John','Four','Male','123 main st, Houston, TX','2020-09-09','832-494-8711','JDoe@gmail.com','2023-04-05','2$2ytesty$2y$10$Rv2BW4hAUB02kwB054BwQAO4p7EB5ZQFgQM1EGSKK0dUhsEur19ve.','JDoe4'),(108,'John','Four','Male','123 main st, Houston, TX','2020-09-09','832-494-8711','JDoe@gmail.com','2023-04-05','2$2ytesty$2y$10$Rv2BW4hAUB02kwB054BwQAO4p7EB5ZQFgQM11EGSKK0dUhsEur19ve.','JDoe4'),(109,'John','Four','Male','123 main st, Houston, TX','2020-09-09','832-494-8711','JDoe@gmail.com','2023-04-05','2$2ytesty$2y$10$Rv2BW4hAUB02kwB054BwQAO4p7EB5ZQFgQM11EGSKK0dUhsEur19ve.','JDoe4'),(110,'John','Four','Male','123 main st, Houston, TX','2020-09-09','832-494-8711','JDoe@gmail.com','2023-04-05','2$2ytesty$2y$10$Rv2BW4hAUB02kwB054BwQAO4p7EB5ZQFgQM11EGSKK0dUhsEur19ve.','JDoe4'),(111,'John','Four','Male','123 main st, Houston, TX','2020-09-09','832-494-8711','JDoe@gmail.com','2023-04-05','2$2ytesty$2y$10$Rv2BW4hAUB02kwB054BwQAO4p7EB5ZQFgQM11EGSKK0dUhsEur19ve.','JDoe4'),(112,'John','Four','Male','123 main st, Houston, TX','2020-09-09','832-494-8711','JDoe@gmail.com','2023-04-05','2$2ytesty$2y$10$Rv2BW4hAUB02kwB054BwQAO4p7EB5ZQFgQM11EGSKK0dUhsEur19ve.','JDoe4');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
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
INSERT INTO `parking_slots` VALUES ('Lot A',100,100),('Lot B',150,149),('Lot C',200,200),('Lot D',75,74);
/*!40000 ALTER TABLE `parking_slots` ENABLE KEYS */;
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
  PRIMARY KEY (`ticket_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_booth`
--

LOCK TABLES `ticket_booth` WRITE;
/*!40000 ALTER TABLE `ticket_booth` DISABLE KEYS */;
INSERT INTO `ticket_booth` VALUES (2,'2024-07-28',5,1,9,2,245),(3,'2024-07-28',10,1,1,1,0),(4,'2023-03-28',1,1,1,1,80);
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
-- Dumping routines for database 'mydb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-07 18:38:36
