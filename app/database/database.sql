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
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jabatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `gaji` int NOT NULL,
  `note` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` (`id`, `uuid`, `nama`, `gaji`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'cb8a23dd-c3ba-4270-bfa8-08bc1bba1f1d','Manager',3000000,'','2023-11-10 09:38:27','ale',NULL,'',NULL,'',NULL,'',0,0),(2,'c82ab4af-a002-490d-8ac2-7630b82b82eb','Kasir',1500000,'','2023-11-10 09:39:30','ale',NULL,'',NULL,'',NULL,'',0,0),(3,'17aa3f2f-8e88-4e6d-8ae9-0d7ac6738d92','HR',2000000,'','2023-11-10 09:41:47','ale',NULL,'',NULL,'',NULL,'',0,0),(4,'68373e87-3c22-49b4-9934-362c99ce7834','Karyawan',1200000,'','2023-11-16 00:07:42','Super Admin',NULL,'','2023-11-20 14:57:58','Super Admin',NULL,'',0,0);
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karyawan`
--

DROP TABLE IF EXISTS `karyawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `karyawan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `nik` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tgllahir` date NOT NULL,
  `jenis_kelamin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `jabatan_id` int NOT NULL,
  `status_karyawan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gaji` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karyawan`
--

LOCK TABLES `karyawan` WRITE;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` (`id`, `uuid`, `nik`, `nama`, `tempat_lahir`, `tgllahir`, `jenis_kelamin`, `alamat`, `email`, `no_telp`, `foto`, `jabatan_id`, `status_karyawan`, `gaji`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'e824fd89-2429-4ef1-b800-c00690cc0765','3825698298','Masando Fami Ramadhan','Malang','2006-01-10','Laki-laki','Jalan-jalan','masandofami@gmail.com','08983419373','65550105b1e94.jpg',4,'Kontrak','1200000','','2023-11-16 00:24:33','Super Admin','2023-11-16 00:33:57','Super Admin','2023-11-20 14:59:25','Super Admin',NULL,'',0,0);
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id`, `uuid`, `nama`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'128f1e20-9414-4e80-bda3-6052c71781df','Makanan','','2023-10-26 10:32:54','admin',NULL,'',NULL,'',NULL,'',0,0),(2,'81d28514-7d60-4e49-ab3e-9b296abfcdf0','Minuman','','2023-10-26 10:33:00','admin',NULL,'',NULL,'',NULL,'',0,0),(3,'1f8cb581-0f23-49bd-81bb-05f9defa2a05','Snack','','2023-10-26 10:33:06','admin',NULL,'',NULL,'',NULL,'',0,0),(4,'60204498-bb9e-425c-b055-1693c7dea549','Dessert','','2023-10-26 10:47:00','admin',NULL,'',NULL,'',NULL,'',0,0);
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategorisp`
--

DROP TABLE IF EXISTS `kategorisp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategorisp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `pengurangan_gaji` int NOT NULL,
  `note` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` char(36) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` char(36) NOT NULL,
  `restored_at` datetime DEFAULT NULL,
  `restored_by` char(36) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `is_restored` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) GENERATED ALWAYS AS ((case when ((`is_deleted` = 0) and (`is_restored` = 0)) then 1 when ((`is_deleted` = 1) and (`is_restored` = 0)) then 0 when ((`is_deleted` = 0) and (`is_restored` = 1)) then 1 end)) STORED,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategorisp`
--

LOCK TABLES `kategorisp` WRITE;
/*!40000 ALTER TABLE `kategorisp` DISABLE KEYS */;
INSERT INTO `kategorisp` (`id`, `uuid`, `nama`, `pengurangan_gaji`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'7f6454fc-56a4-4105-876c-963c5350a5d2','Surat Peringatan I',300000,'','2023-11-13 09:30:00','ale','2023-11-13 09:31:54','ale','2023-11-13 09:32:56','ale',NULL,'',1,0),(2,'5ded4c22-74e7-4f74-8063-9fcf64702661','Surat Peringatan I',300000,'','2023-11-13 09:33:09','ale',NULL,'',NULL,'',NULL,'',0,0),(3,'adb7ffd1-63fd-4b86-acb8-239c5d9cb228','Surat Peringatan II',500000,'','2023-11-13 11:52:33','ale',NULL,'',NULL,'',NULL,'',0,0);
/*!40000 ALTER TABLE `kategorisp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporan_pengeluaran`
--

DROP TABLE IF EXISTS `laporan_pengeluaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laporan_pengeluaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `menu` varchar(50) NOT NULL,
  `quantity` int NOT NULL,
  `harga` varchar(50) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan_pengeluaran`
--

LOCK TABLES `laporan_pengeluaran` WRITE;
/*!40000 ALTER TABLE `laporan_pengeluaran` DISABLE KEYS */;
INSERT INTO `laporan_pengeluaran` (`id`, `uuid`, `tanggal`, `menu`, `quantity`, `harga`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'2','2023-11-06','ff',3,'5000','f','2023-10-02 10:14:50','f','2023-11-06 10:54:50','f','2023-11-06 11:12:51','Gita','2023-11-06 10:54:50','f',1,0),(2,'4c85981c-265b-4ff3-9c9d-9ad26eb1c4bc','2023-11-06','mie',3,'5000','','2023-11-06 11:12:44','Gita','2023-11-06 11:12:59','Gita',NULL,'',NULL,'',0,0),(3,'3e187fec-8076-427b-913f-a9bfd95d655d','2023-11-09','Daging wagyu',3,'100000','','2023-11-09 09:08:13','ale',NULL,'',NULL,'',NULL,'',0,0);
/*!40000 ALTER TABLE `laporan_pengeluaran` ENABLE KEYS */;
UNLOCK TABLES;

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
  `status` tinyint(1) GENERATED ALWAYS AS ((case when ((`is_deleted` = 0) and (`is_restored` = 0)) then 1 when ((`is_deleted` = 1) and (`is_restored` = 0)) then 0 when ((`is_deleted` = 0) and (`is_restored` = 1)) then 1 end)) STORED,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `uuid`, `nama`, `kategori_id`, `harga`, `tersedia`, `foto`, `note`, `create_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'d7b250a3-1f8d-40b8-aacd-2fdb9156b095','Australian Curried Sausages',1,50000,1,'6539e285223b3.jpg','','2023-10-26 10:52:37','admin','2023-11-06 09:32:22','Super Admin',NULL,'',NULL,'',0,0),(2,'8a65c313-d53b-4472-a09d-78c32fe8bc72','Nasi Goreng',1,20000,1,'6539ec4c67a29.jpg','','2023-10-26 11:34:20','admin','2023-10-30 09:36:32','sando',NULL,'',NULL,'',0,0),(3,'6629dff2-5061-45fa-b1ef-2b2749f24cc5','Spageti',1,16000,1,'653b65718c9fa.jpg','','2023-10-26 10:15:54','sando','2023-10-30 09:16:05','sando',NULL,'',NULL,'',0,0),(4,'9849680c-bbc6-4ec0-9b2a-b32662a5372e','Wagyu Steak',1,40000,1,'653f179c50adf.jpeg','','2023-10-30 09:40:28','sando',NULL,'',NULL,'',NULL,'',0,0),(5,'95777022-54d7-4ba3-8a78-70d296e28499','Chiken Steak',1,20000,1,'653f181174be1.jpeg','','2023-10-30 09:42:25','sando','2023-10-30 09:42:41','sando',NULL,'',NULL,'',0,0),(6,'77146b4b-6fc7-4fd2-a43c-a9946c1691b0','Oreo Milkshake',2,15999,1,'653f18650a624.jpg','','2023-10-30 09:43:49','sando','2023-11-20 14:20:26','Super Admin',NULL,'',NULL,'',0,0),(7,'b98ea26a-1eaf-4725-9d11-ff4c0850db69','Soda Gembira',2,22000,1,'653f18a3b9be3.jpg','','2023-10-30 09:44:51','sando','2023-10-30 09:46:20','sando',NULL,'',NULL,'',0,0),(8,'03c2d485-1c3a-42ea-88a3-2272fa3ccb97','French Fries',3,15000,1,'653f198c1f80e.jpg','','2023-10-30 09:48:25','sando','2023-10-30 09:48:44','sando',NULL,'',NULL,'',0,0),(9,'fa162289-5240-4ddb-8805-b7802c9df211','Crepes',3,18000,1,'653f1a8b5900f.jpg','','2023-10-30 09:52:59','sando',NULL,'',NULL,'',NULL,'',0,0),(10,'9c38462f-1ba3-4a56-9395-10247c7111ae','Silky Pudding',4,16000,1,'653f1b1134b87.jpg','','2023-10-30 09:55:13','sando',NULL,'','2023-11-20 14:24:20','Super Admin',NULL,'',0,0),(11,'33ceeb8c-06f8-47ce-83f9-3de84e462838','Ice Cream',4,15000,1,'653f1b547e240.jpg','','2023-10-30 09:56:20','sando',NULL,'',NULL,'',NULL,'',0,0);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembayaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `kasir` varchar(20) NOT NULL,
  `pelanggan` varchar(20) NOT NULL,
  `nomor_telp` varchar(30) NOT NULL,
  `detail_pembayaran` json NOT NULL,
  `subtotal` int NOT NULL,
  `pajak` int NOT NULL,
  `total` int NOT NULL,
  `metode_pembayaran` varchar(10) NOT NULL,
  `kode_transaksi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bayar` int NOT NULL,
  `kembali` int NOT NULL,
  `status_order` tinyint(1) NOT NULL,
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
  `status` tinyint(1) GENERATED ALWAYS AS ((case when ((`is_deleted` = 0) and (`is_restored` = 0)) then _utf8mb4'1' when ((`is_deleted` = 1) and (`is_restored` = 0)) then _utf8mb4'0' when ((`is_deleted` = 0) and (`is_restored` = 1)) then _utf8mb4'1' end)) STORED,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` (`id`, `uuid`, `kasir`, `pelanggan`, `nomor_telp`, `detail_pembayaran`, `subtotal`, `pajak`, `total`, `metode_pembayaran`, `kode_transaksi`, `bayar`, `kembali`, `status_order`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'3b6101e8-cd9e-471c-934f-7b00187665e9','Super Admin','sando lalala','0','[{\"item\": \"Nasi Goreng\", \"amount\": \"1\", \"subtotal\": \"20000\"}, {\"item\": \"Spageti\", \"amount\": \"1\", \"subtotal\": \"16000\"}, {\"item\": \"Oreo Milkshake\", \"amount\": \"2\", \"subtotal\": \"32000\"}]',68000,1360,69360,'cash','',69360,0,0,'','2023-11-02 10:50:20','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(2,'7c05ea8e-70e7-40de-a76e-8db00ff39ef2','ale','mey','8123382520','[{\"item\": \"Nasi Goreng\", \"amount\": \"1\", \"subtotal\": \"20000\"}, {\"item\": \"Spageti\", \"amount\": \"1\", \"subtotal\": \"16000\"}, {\"item\": \"Australian Curried Sausages\", \"amount\": \"1\", \"subtotal\": \"50000\"}]',86000,8600,94600,'cash','',100000,5400,0,'','2023-11-09 08:33:52','ale',NULL,'',NULL,'',NULL,'',0,0);
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preferences`
--

DROP TABLE IF EXISTS `preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `preferences` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  `setting` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `value` varchar(100) NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preferences`
--

LOCK TABLES `preferences` WRITE;
/*!40000 ALTER TABLE `preferences` DISABLE KEYS */;
INSERT INTO `preferences` VALUES (1,'POS','Nama_Perusahaan','Meatgenkz','2023-10-31 08:58:55'),(2,'POS','Besar_Pajak_(%)','2','2023-10-31 08:55:04'),(3,'ERP','Waktu_Datang','06:00 - 07:00','2023-10-31 09:04:13'),(4,'ERP','Waktu_Pulang','15:00 - 17:00','2023-10-31 09:06:38'),(5,'ERP','Token_Absensi','12e461f63a95af15aad0e97648fa0872','2023-10-31 09:07:03'),(6,'POS','Direktori_Logo','http://sposerp-meatgankz.test/img/logos/meatGenkz.jpg','2023-11-03 10:20:41'),(7,'POS','Alamat_Perusahaan','JL. Jalan No. 1','2023-11-06 09:41:34'),(8,'POS','No_Telp_Perusahaan','08968246482','2023-11-06 09:43:32');
/*!40000 ALTER TABLE `preferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipment`
--

DROP TABLE IF EXISTS `shipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `stok_id` int NOT NULL,
  `supplier_id` int NOT NULL,
  `harga_all_in` float NOT NULL,
  `deskripsi` text NOT NULL,
  `pesan` int NOT NULL,
  `berat` int NOT NULL,
  `harga_exw` int NOT NULL,
  `total_exw` int NOT NULL,
  `biaya_lainnya` json NOT NULL,
  `total_biaya_lainnya` int NOT NULL,
  `diskon` int NOT NULL,
  `total` int NOT NULL,
  `tanggal` date NOT NULL,
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
  `status` tinyint(1) GENERATED ALWAYS AS ((case when ((`is_deleted` = 0) and (`is_restored` = 0)) then _utf8mb4'1' when ((`is_deleted` = 1) and (`is_restored` = 0)) then _utf8mb4'0' when ((`is_deleted` = 0) and (`is_restored` = 1)) then _utf8mb4'1' end)) STORED,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipment`
--

LOCK TABLES `shipment` WRITE;
/*!40000 ALTER TABLE `shipment` DISABLE KEYS */;
INSERT INTO `shipment` (`id`, `uuid`, `stok_id`, `supplier_id`, `harga_all_in`, `deskripsi`, `pesan`, `berat`, `harga_exw`, `total_exw`, `biaya_lainnya`, `total_biaya_lainnya`, `diskon`, `total`, `tanggal`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'5df52f8f-145f-44fc-9494-f1a150978025',1,2,105000,'Nambah wahyu',2,2000,98000,196000,'{\"ongkir\": \"12000\", \"icepack\": \"10000\"}',22000,8000,210000,'2023-11-15','','2023-11-15 08:51:53','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(2,'cc1f3a4b-f6fd-4b6d-8636-84f35ab6181b',2,2,104333,'Daging gilang yoi gilang hahahahah',3,3000,104000,312000,'{\"ongkir\": \"12000\", \"icepack\": \"8000\"}',20000,19000,313000,'2023-11-15','','2023-11-15 08:53:44','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(3,'76a48cfd-0efd-416e-9aac-14a068873381',1,3,100600,'Wahyu lagi',5,5000,98000,490000,'{\"ongkir\": \"15000\", \"icepack\": \"10000\"}',25000,12000,503000,'2023-11-15','','2023-11-15 08:55:12','Super Admin',NULL,'',NULL,'',NULL,'',0,0);
/*!40000 ALTER TABLE `shipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stok`
--

DROP TABLE IF EXISTS `stok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stok` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stok` float NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `riwayat` json NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok`
--

LOCK TABLES `stok` WRITE;
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
INSERT INTO `stok` (`id`, `uuid`, `nama`, `stok`, `satuan`, `riwayat`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'3cef8922-4597-4d05-a391-fda65237fad4','Daging Wahyu',4,'Kg','{\"2023-11-15\": {\"stok\": 4, \"masuk\": 7, \"keluar\": \"3\"}}','','2023-11-15 08:48:31','Super Admin','2023-11-15 08:56:47','Super Admin','2023-11-20 14:51:38','Super Admin',NULL,'',0,0),(2,'543d1d94-6acf-42fb-9bc0-c4656c835184','Daging Giling',2,'pcs','{\"2023-11-15\": {\"stok\": 2, \"masuk\": 3, \"keluar\": \"1\"}}','','2023-11-15 08:48:41','Super Admin','2023-11-15 08:56:47','Super Admin',NULL,'',NULL,'',0,0);
/*!40000 ALTER TABLE `stok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `kontak` text NOT NULL,
  `email` text NOT NULL,
  `note` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id`, `uuid`, `nama`, `alamat`, `kontak`, `email`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'48bb7345-1699-4abc-b670-0121341c47cb','Budi','JL Penambahan No 47','08123382520','budianjayani@example.com','','2023-10-23 19:04:04','admin','2023-11-20 15:09:03','Super Admin','2023-11-20 15:04:51','Super Admin',NULL,'',0,0),(2,'760633c2-1d7d-46cf-aa96-8b6e29760e3e','Yanto','JL Kesasar','089520409050','yantohaha@gmail.com','','2023-10-23 20:07:07','admin','2023-11-15 08:45:17','Super Admin',NULL,'',NULL,'',0,0);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suratperingatan`
--

DROP TABLE IF EXISTS `suratperingatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suratperingatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `kategorisp_id` int NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kesalahan` varchar(500) NOT NULL,
  `sanksi` varchar(100) NOT NULL,
  `note` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` char(36) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` char(36) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` char(36) NOT NULL,
  `restored_at` datetime DEFAULT NULL,
  `restored_by` char(36) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `is_restored` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) GENERATED ALWAYS AS ((case when ((`is_deleted` = 0) and (`is_restored` = 0)) then 1 when ((`is_deleted` = 1) and (`is_restored` = 0)) then 0 when ((`is_deleted` = 0) and (`is_restored` = 1)) then 1 end)) STORED,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suratperingatan`
--

LOCK TABLES `suratperingatan` WRITE;
/*!40000 ALTER TABLE `suratperingatan` DISABLE KEYS */;
INSERT INTO `suratperingatan` (`id`, `uuid`, `kategorisp_id`, `nama`, `email`, `jabatan`, `alamat`, `kesalahan`, `sanksi`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (9,'9d91b222-c5eb-4078-9f83-4b27fabd9bce',3,'Budi','budi@gmail.com','Karyawan','bumi','banyak banget woilahh','dikeluarkan','','2023-11-06 08:47:24','Super Admin',NULL,'',NULL,'',NULL,'',0,0);
/*!40000 ALTER TABLE `suratperingatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(16) NOT NULL,
  `last_login_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super Admin','e34f92a20532a873cb3184398070b4b82a8fa29cf48572c203dc5f0fa6158231','superadmin@gmail.com','superadmin','2023-11-16 16:13:11',1),(2,'Sando','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','masandofami@gmail.com','admin','2023-11-16 00:44:16',0),(4,'ale','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','alelio@gmail.com','superadmin','2023-11-09 08:25:39',1);
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

-- Dump completed on 2023-11-20 15:24:49
