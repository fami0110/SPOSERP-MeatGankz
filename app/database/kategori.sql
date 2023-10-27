-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: sposerp
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `note` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` char(36) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` char(36) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` char(36) NOT NULL,
  `restored_at` datetime DEFAULT NULL,
  `restored_by` char(36) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `is_restored` tinyint(1) NOT NULL,
  `status` tinyint(1) GENERATED ALWAYS AS ((case when ((`is_deleted` = 0) and (`is_restored` = 0)) then 1 when ((`is_deleted` = 1) and (`is_restored` = 0)) then 0 when ((`is_deleted` = 0) and (`is_restored` = 1)) then 1 end)) STORED,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id`, `uuid`, `nama`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (2,'128f1e20-9414-4e80-bda3-6052c71781df','Makanan','','2023-10-26 10:32:54','admin',NULL,'',NULL,'',NULL,'',0,0),(3,'81d28514-7d60-4e49-ab3e-9b296abfcdf0','Minuman','','2023-10-26 10:33:00','admin',NULL,'',NULL,'',NULL,'',0,0),(4,'1f8cb581-0f23-49bd-81bb-05f9defa2a05','Snack','','2023-10-26 10:33:06','admin',NULL,'',NULL,'',NULL,'',0,0),(5,'60204498-bb9e-425c-b055-1693c7dea549','Dessert','','2023-10-26 10:47:00','admin',NULL,'',NULL,'',NULL,'',0,0);
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-27 14:25:07
