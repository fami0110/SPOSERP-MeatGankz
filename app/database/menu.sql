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
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kategori_id` int NOT NULL,
  `harga` int NOT NULL,
  `tersedia` tinyint(1) NOT NULL DEFAULT '0',
  `foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `note` varchar(50) NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `created_by` char(36) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` char(36) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` char(36) NOT NULL,
  `restored_at` datetime DEFAULT NULL,
  `restored_by` char(36) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `is_restored` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'d7b250a3-1f8d-40b8-aacd-2fdb9156b095','Australian Curried Sausages',1,50000,1,'6539e285223b3.jpg','','2023-10-26 10:52:37','admin','2023-10-30 09:15:49','sando',NULL,'',NULL,'',0,0,1),(2,'8a65c313-d53b-4472-a09d-78c32fe8bc72','Nasi Goreng',1,20000,1,'6539ec4c67a29.jpg','','2023-10-26 11:34:20','admin','2023-10-30 09:36:32','sando',NULL,'',NULL,'',0,0,1),(3,'6629dff2-5061-45fa-b1ef-2b2749f24cc5','Spageti',1,16000,1,'653b65718c9fa.jpg','','2023-10-26 10:15:54','sando','2023-10-30 09:16:05','sando',NULL,'',NULL,'',0,0,1),(4,'9849680c-bbc6-4ec0-9b2a-b32662a5372e','Wagyu Steak',1,40000,1,'653f179c50adf.jpeg','','2023-10-30 09:40:28','sando',NULL,'',NULL,'',NULL,'',0,0,1),(5,'95777022-54d7-4ba3-8a78-70d296e28499','Chiken Steak',1,20000,1,'653f181174be1.jpeg','','2023-10-30 09:42:25','sando','2023-10-30 09:42:41','sando',NULL,'',NULL,'',0,0,1),(6,'77146b4b-6fc7-4fd2-a43c-a9946c1691b0','Oreo Milkshake',2,15999,1,'653f18650a624.jpg','','2023-10-30 09:43:49','sando',NULL,'',NULL,'',NULL,'',0,0,1),(7,'b98ea26a-1eaf-4725-9d11-ff4c0850db69','Soda Gembira',2,22000,1,'653f18a3b9be3.jpg','','2023-10-30 09:44:51','sando','2023-10-30 09:46:20','sando',NULL,'',NULL,'',0,0,1),(8,'03c2d485-1c3a-42ea-88a3-2272fa3ccb97','French Fries',3,15000,1,'653f198c1f80e.jpg','','2023-10-30 09:48:25','sando','2023-10-30 09:48:44','sando',NULL,'',NULL,'',0,0,1),(9,'fa162289-5240-4ddb-8805-b7802c9df211','Crepes',3,18000,1,'653f1a8b5900f.jpg','','2023-10-30 09:52:59','sando',NULL,'',NULL,'',NULL,'',0,0,1),(10,'9c38462f-1ba3-4a56-9395-10247c7111ae','Silky Pudding',4,16000,1,'653f1b1134b87.jpg','','2023-10-30 09:55:13','sando',NULL,'',NULL,'',NULL,'',0,0,1),(11,'33ceeb8c-06f8-47ce-83f9-3de84e462838','Ice Cream',4,15000,1,'653f1b547e240.jpg','','2023-10-30 09:56:20','sando',NULL,'',NULL,'',NULL,'',0,0,1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-31 10:27:06
