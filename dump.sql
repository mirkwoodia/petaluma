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
  PRIMARY KEY (`pass_ID`),
  KEY `member_ID` (`member_ID`),
  CONSTRAINT `get_parking_pass_ibfk_1` FOREIGN KEY (`member_ID`) REFERENCES `member` (`member_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `get_parking_pass`
--

LOCK TABLES `get_parking_pass` WRITE;
/*!40000 ALTER TABLE `get_parking_pass` DISABLE KEYS */;
INSERT INTO `get_parking_pass` VALUES (21,103,'2023-04-13','Lot B',NULL,'1010101010');
/*!40000 ALTER TABLE `get_parking_pass` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (102,'Bobby','Brown','Male','732 Fondren, Houston, TX','1987-06-09','832-494-8711','BBrown32@gmail.com','2023-04-03','$2y$10$Rv2BW4hAUB02kB054BwQAO4p7EB5ZQFgQM1EGSKK0dUhsEur19ve.','BBrown'),(103,'test','test','Female','@','2000-10-28','123-456-7890','3@gmail.com','2023-03-28','$2y$10$pcIXZlLy4r/4afkBTxJ6JewW7s63XkCfNa6Gadcs6AyejTqr.km2a','test'),(104,'a','a','Female','123','2023-03-28','713-476-1111','acecilio@gmail.com','2023-03-28','$2y$10$LLlSBnlYKtJ7MO2wX0u94ui1MrKfsNF7d0DLWSUCois7N7keYz.ra','a');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
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
INSERT INTO `parking_slots` VALUES ('Lot A',100,100),('Lot B',150,149),('Lot C',200,200),('Lot D',75,75);
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-13  1:00:52
