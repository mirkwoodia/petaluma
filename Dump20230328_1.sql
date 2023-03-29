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
-- Table structure for table `dependent`
--

DROP TABLE IF EXISTS `dependent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dependent` (
  `dependent_ID` int NOT NULL,
  `dependent_name` varchar(45) NOT NULL,
  `employee_related_to` varchar(45) NOT NULL,
  `EMPLOYEE_employee_ID` int NOT NULL,
  PRIMARY KEY (`dependent_ID`),
  KEY `fk_DEPENDENT_EMPLOYEE_idx` (`EMPLOYEE_employee_ID`),
  CONSTRAINT `fk_DEPENDENT_EMPLOYEE` FOREIGN KEY (`EMPLOYEE_employee_ID`) REFERENCES `employee` (`employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependent`
--

LOCK TABLES `dependent` WRITE;
/*!40000 ALTER TABLE `dependent` DISABLE KEYS */;
/*!40000 ALTER TABLE `dependent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `employee_ID` int NOT NULL,
  `SSN` int NOT NULL,
  `employee_type` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_initial` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(45) NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `salary` double NOT NULL,
  `PARK_Park_ID` int NOT NULL,
  PRIMARY KEY (`employee_ID`),
  KEY `fk_EMPLOYEE_PARK1_idx` (`PARK_Park_ID`),
  CONSTRAINT `fk_EMPLOYEE_PARK1` FOREIGN KEY (`PARK_Park_ID`) REFERENCES `park` (`Park_ID`)
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
-- Table structure for table `gift items`
--

DROP TABLE IF EXISTS `gift items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gift items` (
  `gift_ID` int NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `item_price` decimal(10,0) NOT NULL,
  `item_inventory` varchar(45) NOT NULL,
  `GIFT SHOP_giftShop_ID` int NOT NULL,
  PRIMARY KEY (`gift_ID`),
  KEY `fk_GIFT ITEMS_GIFT SHOP1_idx` (`GIFT SHOP_giftShop_ID`),
  CONSTRAINT `fk_GIFT ITEMS_GIFT SHOP1` FOREIGN KEY (`GIFT SHOP_giftShop_ID`) REFERENCES `gift shop` (`giftShop_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gift items`
--

LOCK TABLES `gift items` WRITE;
/*!40000 ALTER TABLE `gift items` DISABLE KEYS */;
/*!40000 ALTER TABLE `gift items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gift shop`
--

DROP TABLE IF EXISTS `gift shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gift shop` (
  `giftShop_ID` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `num_items_sold` int NOT NULL,
  `daily_visitors` int NOT NULL,
  `PARK_Park_ID` int NOT NULL,
  PRIMARY KEY (`giftShop_ID`),
  KEY `fk_GIFT SHOP_PARK1_idx` (`PARK_Park_ID`),
  CONSTRAINT `fk_GIFT SHOP_PARK1` FOREIGN KEY (`PARK_Park_ID`) REFERENCES `park` (`Park_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gift shop`
--

LOCK TABLES `gift shop` WRITE;
/*!40000 ALTER TABLE `gift shop` DISABLE KEYS */;
/*!40000 ALTER TABLE `gift shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maintenance` (
  `maintenance_ID` int NOT NULL,
  `time_start` datetime DEFAULT NULL,
  `time_end` datetime DEFAULT NULL,
  `maintenance_descrip` varchar(45) DEFAULT NULL,
  `maintence_staff` varchar(45) DEFAULT NULL,
  `ATTRACTION_attraction_ID` int NOT NULL,
  PRIMARY KEY (`maintenance_ID`),
  KEY `fk_MAINTENANCE_ATTRACTION1_idx` (`ATTRACTION_attraction_ID`),
  CONSTRAINT `fk_MAINTENANCE_ATTRACTION1` FOREIGN KEY (`ATTRACTION_attraction_ID`) REFERENCES `attraction` (`attraction_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenance`
--

LOCK TABLES `maintenance` WRITE;
/*!40000 ALTER TABLE `maintenance` DISABLE KEYS */;
/*!40000 ALTER TABLE `maintenance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member` (
  `member_ID` int NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_initial` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `email_address` varchar(45) NOT NULL,
  `join_date` date NOT NULL,
  `PARK_Park_ID` int NOT NULL,
  PRIMARY KEY (`member_ID`),
  KEY `fk_MEMBER_PARK1_idx` (`PARK_Park_ID`),
  CONSTRAINT `fk_MEMBER_PARK1` FOREIGN KEY (`PARK_Park_ID`) REFERENCES `park` (`Park_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_has_ticket booth`
--

DROP TABLE IF EXISTS `member_has_ticket booth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_has_ticket booth` (
  `MEMBER_member_ID` int NOT NULL,
  `TICKET BOOTH_ticket_ID` int NOT NULL,
  PRIMARY KEY (`MEMBER_member_ID`,`TICKET BOOTH_ticket_ID`),
  KEY `fk_MEMBER_has_TICKET BOOTH_TICKET BOOTH1_idx` (`TICKET BOOTH_ticket_ID`),
  KEY `fk_MEMBER_has_TICKET BOOTH_MEMBER1_idx` (`MEMBER_member_ID`),
  CONSTRAINT `fk_MEMBER_has_TICKET BOOTH_MEMBER1` FOREIGN KEY (`MEMBER_member_ID`) REFERENCES `member` (`member_ID`),
  CONSTRAINT `fk_MEMBER_has_TICKET BOOTH_TICKET BOOTH1` FOREIGN KEY (`TICKET BOOTH_ticket_ID`) REFERENCES `ticket_booth` (`ticket_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_has_ticket booth`
--

LOCK TABLES `member_has_ticket booth` WRITE;
/*!40000 ALTER TABLE `member_has_ticket booth` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_has_ticket booth` ENABLE KEYS */;
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
INSERT INTO `parking` VALUES (1,'parking lot 1',15,2,0,1);
/*!40000 ALTER TABLE `parking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurant` (
  `restaurant_ID` int NOT NULL,
  `restaurant_name` varchar(45) NOT NULL,
  `restaurant_location` varchar(45) NOT NULL,
  `daily_visitors` int NOT NULL,
  `PARK_Park_ID` int NOT NULL,
  PRIMARY KEY (`restaurant_ID`),
  KEY `fk_RESTAURANT_PARK1_idx` (`PARK_Park_ID`),
  CONSTRAINT `fk_RESTAURANT_PARK1` FOREIGN KEY (`PARK_Park_ID`) REFERENCES `park` (`Park_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant`
--

LOCK TABLES `restaurant` WRITE;
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant food`
--

DROP TABLE IF EXISTS `restaurant food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurant food` (
  `food_ID` int NOT NULL,
  `food_name` varchar(45) NOT NULL,
  `food_price` decimal(10,0) NOT NULL,
  `food_type` varchar(45) NOT NULL,
  `food_inventory` varchar(45) NOT NULL,
  `RESTAURANT_restaurant_ID` int NOT NULL,
  PRIMARY KEY (`food_ID`),
  KEY `fk_RESTAURANT FOOD_RESTAURANT1_idx` (`RESTAURANT_restaurant_ID`),
  CONSTRAINT `fk_RESTAURANT FOOD_RESTAURANT1` FOREIGN KEY (`RESTAURANT_restaurant_ID`) REFERENCES `restaurant` (`restaurant_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant food`
--

LOCK TABLES `restaurant food` WRITE;
/*!40000 ALTER TABLE `restaurant food` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurant food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket booth_has_visitor`
--

DROP TABLE IF EXISTS `ticket booth_has_visitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket booth_has_visitor` (
  `TICKET BOOTH_ticket_ID` int NOT NULL,
  `VISITOR_visitor_ID` int NOT NULL,
  PRIMARY KEY (`TICKET BOOTH_ticket_ID`,`VISITOR_visitor_ID`),
  KEY `fk_TICKET BOOTH_has_VISITOR_VISITOR1_idx` (`VISITOR_visitor_ID`),
  KEY `fk_TICKET BOOTH_has_VISITOR_TICKET BOOTH1_idx` (`TICKET BOOTH_ticket_ID`),
  CONSTRAINT `fk_TICKET BOOTH_has_VISITOR_TICKET BOOTH1` FOREIGN KEY (`TICKET BOOTH_ticket_ID`) REFERENCES `ticket_booth` (`ticket_ID`),
  CONSTRAINT `fk_TICKET BOOTH_has_VISITOR_VISITOR1` FOREIGN KEY (`VISITOR_visitor_ID`) REFERENCES `visitor` (`visitor_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket booth_has_visitor`
--

LOCK TABLES `ticket booth_has_visitor` WRITE;
/*!40000 ALTER TABLE `ticket booth_has_visitor` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket booth_has_visitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_booth`
--

DROP TABLE IF EXISTS `ticket_booth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket_booth` (
  `ticket_ID` int NOT NULL,
  `purchase_date` date NOT NULL DEFAULT '2024-07-28',
  `QtyWheel` int NOT NULL DEFAULT '0',
  `QtySpeed` int NOT NULL DEFAULT '0',
  `QtyAqua` int NOT NULL DEFAULT '0',
  `QtyPutt` int NOT NULL DEFAULT '0',
  `ticket_total` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`ticket_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_booth`
--

LOCK TABLES `ticket_booth` WRITE;
/*!40000 ALTER TABLE `ticket_booth` DISABLE KEYS */;
INSERT INTO `ticket_booth` VALUES (2,'2024-07-28',5,1,9,2,245),(3,'2024-07-28',10,1,1,1,0);
/*!40000 ALTER TABLE `ticket_booth` ENABLE KEYS */;
UNLOCK TABLES;

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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-28 23:18:49
