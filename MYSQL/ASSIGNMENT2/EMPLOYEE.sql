-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: EMPLOYEE
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `EMPLOYEE_CODE_TABLE`
--

DROP TABLE IF EXISTS `EMPLOYEE_CODE_TABLE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EMPLOYEE_CODE_TABLE` (
  `EMPLOYEE_CODE_NAME` varchar(10) NOT NULL,
  `EMPLOYEE_CODE` varchar(10) NOT NULL,
  `EMPLOYEE_DOMAIN` varchar(10) NOT NULL,
  PRIMARY KEY (`EMPLOYEE_CODE_NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EMPLOYEE_CODE_TABLE`
--

LOCK TABLES `EMPLOYEE_CODE_TABLE` WRITE;
/*!40000 ALTER TABLE `EMPLOYEE_CODE_TABLE` DISABLE KEYS */;
INSERT INTO `EMPLOYEE_CODE_TABLE` VALUES ('Anuj_dox','SU_Anuj','ML'),('ASIT_DT','SU_Asit','JAVA');
/*!40000 ALTER TABLE `EMPLOYEE_CODE_TABLE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EMPLOYEE_DETAILS_TABLE`
--

DROP TABLE IF EXISTS `EMPLOYEE_DETAILS_TABLE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EMPLOYEE_DETAILS_TABLE` (
  `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMPLOYEE_FIRST_NAME` varchar(10) NOT NULL,
  `EMPLOYEE_LAST_NAME` varchar(10) NOT NULL,
  `GRADUATION_PERCENTILE` varchar(10) NOT NULL,
  PRIMARY KEY (`EMPLOYEE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EMPLOYEE_DETAILS_TABLE`
--

LOCK TABLES `EMPLOYEE_DETAILS_TABLE` WRITE;
/*!40000 ALTER TABLE `EMPLOYEE_DETAILS_TABLE` DISABLE KEYS */;
INSERT INTO `EMPLOYEE_DETAILS_TABLE` VALUES (4,'Asit','Prakash','75'),(6,'Anuj','Kumar','87');
/*!40000 ALTER TABLE `EMPLOYEE_DETAILS_TABLE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EMPLOYEE_ID_CODE_TABLE`
--

DROP TABLE IF EXISTS `EMPLOYEE_ID_CODE_TABLE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EMPLOYEE_ID_CODE_TABLE` (
  `EMPLOYEE_ID_CODE` varchar(20) NOT NULL,
  `EMPLOYEE_ID` int(11) NOT NULL,
  KEY `EID1` (`EMPLOYEE_ID`),
  CONSTRAINT `EID1` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `EMPLOYEE_DETAILS_TABLE` (`EMPLOYEE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EMPLOYEE_ID_CODE_TABLE`
--

LOCK TABLES `EMPLOYEE_ID_CODE_TABLE` WRITE;
/*!40000 ALTER TABLE `EMPLOYEE_ID_CODE_TABLE` DISABLE KEYS */;
INSERT INTO `EMPLOYEE_ID_CODE_TABLE` VALUES ('RU4',4),('RU6',6);
/*!40000 ALTER TABLE `EMPLOYEE_ID_CODE_TABLE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EMPLOYEE_SALARY_TABLE`
--

DROP TABLE IF EXISTS `EMPLOYEE_SALARY_TABLE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EMPLOYEE_SALARY_TABLE` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `EMPLOYEE_SALARY` int(11) NOT NULL,
  `EMPLOYEE_CODE` varchar(10) NOT NULL,
  `EMPLOYEE_CODE_NAME` varchar(10) NOT NULL,
  KEY `EID` (`EMPLOYEE_ID`),
  KEY `ECN` (`EMPLOYEE_CODE_NAME`),
  CONSTRAINT `ECN` FOREIGN KEY (`EMPLOYEE_CODE_NAME`) REFERENCES `EMPLOYEE_CODE_TABLE` (`EMPLOYEE_CODE_NAME`),
  CONSTRAINT `EID` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `EMPLOYEE_DETAILS_TABLE` (`EMPLOYEE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EMPLOYEE_SALARY_TABLE`
--

LOCK TABLES `EMPLOYEE_SALARY_TABLE` WRITE;
/*!40000 ALTER TABLE `EMPLOYEE_SALARY_TABLE` DISABLE KEYS */;
INSERT INTO `EMPLOYEE_SALARY_TABLE` VALUES (4,56000,'SU_Asit','ASIT_DT'),(6,46000,'SU_Anuj','Anuj_dox');
/*!40000 ALTER TABLE `EMPLOYEE_SALARY_TABLE` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-05 23:39:02
