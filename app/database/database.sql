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
  `bahan` json NOT NULL,
  `tersedia` int NOT NULL DEFAULT '0',
  `foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `uuid`, `nama`, `kategori_id`, `harga`, `bahan`, `tersedia`, `foto`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'1da2ea78-193c-4910-85ca-3f31a198d1f0','Nasi Goreng Ayam',1,18000,'{\"Beras\": 0.2, \"Telur\": 2, \"Wortel\": 0.2, \"Daging Ayam\": 0.3}',41,'655eff70eb338.jpg','','2023-11-23 10:00:29','Super Admin','2023-12-06 10:29:54','Super Admin',NULL,'',NULL,'',0,0),(2,'b1044449-61a6-4b1b-944b-19a1cdf5f746','Salad Buah',4,15000,'{\"Apel\": 0.1, \"Keju\": 0.1, \"Susu\": 0.5}',36,'655ef5fc7f7a0.jpg','','2023-11-23 13:49:32','Super Admin','2023-12-06 10:29:54','Super Admin',NULL,'',NULL,'',0,0),(3,'ad8040ea-e423-4312-bb1b-836d683ef972','Nasi Omlete',1,16000,'{\"Beras\": 0.2, \"Telur\": 1}',83,'655eff0d77ae0.jpg','','2023-11-23 14:28:13','Super Admin','2023-12-06 10:29:54','Super Admin',NULL,'',NULL,'',0,0),(4,'be927ca9-1e42-4609-bc80-7834d5093893','Soda Gembira',2,15000,'{\"Air Mineral (Galon)\": 0.2}',760,'656d76d20bf7f.jpg','','2023-12-04 13:50:58','Super Admin','2023-12-06 10:29:54','Super Admin',NULL,'',NULL,'',0,0),(5,'7556630d-9747-4577-b0fb-c0f24aa260e5','Milkshake',2,16000,'{\"Air Mineral (Galon)\": 0.2}',760,'656d76fd1079b.jpg','','2023-12-04 13:51:41','Super Admin','2023-12-06 10:29:55','Super Admin',NULL,'',NULL,'',0,0),(6,'c9002bce-11d4-4b5a-ad9c-52fd1f4c8501','Kentang Goreng',3,30000,'{\"Kentang\": 0.2}',390,'656d77f377c52.jpg','','2023-12-04 13:55:47','Super Admin','2023-12-06 10:29:55','Super Admin',NULL,'',NULL,'',0,0),(7,'706252d9-2dbd-40da-a67b-52a23d19102b','Fauzan Gaming',1,30000,'{\"Telur\": 0.2, \"Kentang\": 0.2, \"Tepung Terigu\": 0.1}',200,'656e9b38f3b59.png','','2023-12-05 10:38:33','Super Admin','2023-12-06 10:29:55','Super Admin',NULL,'',NULL,'',0,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` (`id`, `uuid`, `kasir`, `pelanggan`, `nomor_telp`, `detail_pembayaran`, `subtotal`, `pajak`, `total`, `metode_pembayaran`, `kode_transaksi`, `bayar`, `kembali`, `status_order`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'3b6101e8-cd9e-471c-934f-7b00187665e9','Super Admin','sando lalala','0','[{\"item\": \"Nasi Goreng\", \"amount\": \"1\", \"subtotal\": \"20000\"}, {\"item\": \"Spageti\", \"amount\": \"1\", \"subtotal\": \"16000\"}, {\"item\": \"Oreo Milkshake\", \"amount\": \"2\", \"subtotal\": \"32000\"}]',68000,1360,69360,'cash','',69360,0,0,'','2023-11-02 10:50:20','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(2,'7c05ea8e-70e7-40de-a76e-8db00ff39ef2','ale','mey','8123382520','[{\"item\": \"Nasi Goreng\", \"amount\": \"1\", \"subtotal\": \"20000\"}, {\"item\": \"Spageti\", \"amount\": \"1\", \"subtotal\": \"16000\"}, {\"item\": \"Australian Curried Sausages\", \"amount\": \"1\", \"subtotal\": \"50000\"}]',86000,8600,94600,'cash','',100000,5400,0,'','2023-11-09 08:33:52','ale',NULL,'',NULL,'',NULL,'',0,0),(3,'5a13350b-1e27-42b6-a7fe-729ff2379d89','Super Admin','Customer','08983419373','[{\"id\": \"1\", \"item\": \"Nasi Goreng Ayam\", \"amount\": \"4\", \"subtotal\": \"72000\"}, {\"id\": \"3\", \"item\": \"Nasi Omlete\", \"amount\": \"1\", \"subtotal\": \"16000\"}]',88000,1760,89760,'cash','',89760,0,0,'','2023-12-05 10:36:50','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(4,'c9169e16-f86a-40f8-8d10-c738519892d8','Super Admin','Customer','365487','[{\"id\": \"7\", \"item\": \"Fauzan Gaming\", \"amount\": \"10\", \"subtotal\": \"300000\"}, {\"id\": \"1\", \"item\": \"Nasi Goreng Ayam\", \"amount\": \"1\", \"subtotal\": \"18000\"}]',318000,6360,324360,'cash','',324360,0,0,'','2023-12-05 10:39:20','Super Admin',NULL,'',NULL,'',NULL,'',0,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipment`
--

LOCK TABLES `shipment` WRITE;
/*!40000 ALTER TABLE `shipment` DISABLE KEYS */;
INSERT INTO `shipment` (`id`, `uuid`, `stok_id`, `supplier_id`, `harga_all_in`, `deskripsi`, `pesan`, `berat`, `harga_exw`, `total_exw`, `biaya_lainnya`, `total_biaya_lainnya`, `diskon`, `total`, `tanggal`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'aa4a4ada-dd1f-4229-90c1-7a94c81c32eb',3,1,25000,'Anjay',20,20000,24000,480000,'{\"ongkir\": \"12000\", \"icepack\": \"10000\"}',22000,2000,500000,'2023-11-23','','2023-11-23 09:34:36','Super Admin','2023-12-06 09:29:13','Super Admin',NULL,'',NULL,'',0,0),(2,'a3b4a17f-a60b-46da-a18d-e461f71e7837',5,2,15233,'Restok Beras 43kg',43,43000,15000,645000,'{\"ongkir\": \"12000\"}',12000,2000,655000,'2023-11-23','','2023-11-23 09:38:16','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(3,'a917a08b-de83-4e78-beb2-3699c8232fcf',6,1,25556,'Restok Daging Ayam',36,36000,25000,900000,'{\"ongkir\": \"12000\", \"icepack\": \"10000\"}',22000,2000,920000,'2023-11-23','','2023-11-23 09:39:32','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(4,'9eb92019-d84b-422b-a2a8-c625583dcab3',7,1,19462,'Restok Wortel',26,26000,19000,494000,'{\"ongkir\": \"12000\"}',12000,0,506000,'2023-11-23','','2023-11-23 09:40:30','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(5,'aca1da01-2127-4ca4-8a93-e331eb746845',8,1,31111,'Restok Apel',18,18000,30000,540000,'{\"ongkir\": \"12000\", \"packaging\": \"10000\"}',22000,2000,560000,'2023-11-23','','2023-11-23 09:41:49','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(6,'b7fe2a78-c776-4572-ad1f-3979e03f3ed9',9,2,18071,'Restok telur 8 lusin',96,480000,18000,8640000,'{\"karton\": \"30000\", \"ongkir\": \"12000\"}',42000,8000,8674000,'2023-11-23','','2023-11-23 09:49:07','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(7,'5197dc72-0836-4e23-b1fc-393dc053f0f4',10,2,24500,'Restok Susus',18,18000,24000,432000,'{\"ongkir\": \"12000\"}',12000,3000,441000,'2023-11-23','','2023-11-23 09:51:14','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(8,'802d359b-ffd8-4c87-a9bd-bf8f1b2ba544',11,1,36417,'Restok Keju',7,24000,36000,864000,'{\"ongkir\": \"12000\"}',12000,2000,874000,'2023-11-23','','2023-11-23 09:53:01','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(9,'58b3f62e-0f0e-4d41-b7ea-4a05945a84b5',12,1,10476,'Restok Tepung Terigu 21kg',21,21000,10000,210000,'{\"ongkir\": \"12000\"}',12000,2000,220000,'2023-11-23','','2023-11-23 09:54:10','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(10,'a0c7cdd1-0832-4de6-82e1-612cc61487bc',13,2,1213,'Restok Galon',152,152000,1200,182400,'{\"ongkir\": \"12000\"}',12000,10000,184400,'2023-12-04','','2023-12-04 13:49:40','Super Admin',NULL,'',NULL,'',NULL,'',0,0),(11,'95e734e4-7b80-418c-9617-f1471e700b2b',14,2,12025,'Restok Kentang anjay',80,80000,12000,960000,'{\"ongkir\": \"12000\"}',12000,10000,962000,'2023-12-04','','2023-12-04 13:53:49','Super Admin',NULL,'',NULL,'',NULL,'',0,0);
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok`
--

LOCK TABLES `stok` WRITE;
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
INSERT INTO `stok` (`id`, `uuid`, `nama`, `stok`, `satuan`, `riwayat`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (3,'407f6f23-5771-4964-967b-661be94a5f73','Daging Sapi',20,'Kg','{\"2023-11-21\": {\"stok\": \"0\", \"masuk\": 0, \"keluar\": 0}, \"2023-11-23\": {\"stok\": 20, \"masuk\": 20, \"keluar\": 0}, \"2023-12-05\": {\"stok\": 20, \"masuk\": 0, \"keluar\": \"0\"}}','','2023-11-21 14:52:48','Super Admin','2023-12-05 10:36:24','Super Admin',NULL,'',NULL,'',0,0),(4,'5f944e1c-5d36-43a6-b41f-443d632adf01','Daging Giling',0,'Pack','{\"2023-11-21\": {\"stok\": \"0\", \"masuk\": 0, \"keluar\": 0}}','','2023-11-21 14:52:59','Super Admin',NULL,'','2023-11-23 09:19:06','Super Admin',NULL,'',1,0),(5,'060dd1b8-3201-4ec0-8d6e-5195d3b0a359','Beras',41.8,'Kg','{\"2023-11-23\": {\"stok\": 43, \"masuk\": 43, \"keluar\": 0}, \"2023-12-05\": {\"stok\": 41.8, \"masuk\": 0, \"keluar\": 1.2}}','','2023-11-23 09:28:00','Super Admin','2023-12-05 10:39:20','Super Admin',NULL,'',NULL,'',0,0),(6,'f1369615-2539-495e-8275-4b0f5dfb0b3a','Daging Ayam',31.5,'Kg','{\"2023-11-23\": {\"stok\": 36, \"masuk\": 36, \"keluar\": 0}, \"2023-12-05\": {\"stok\": 31.5, \"masuk\": 0, \"keluar\": 4.5}}','','2023-11-23 09:28:40','Super Admin','2023-12-05 10:39:20','Super Admin',NULL,'',NULL,'',0,0),(7,'e308df09-d5f0-4aff-9c86-a165607b07aa','Wortel',25,'Kg','{\"2023-11-23\": {\"stok\": 26, \"masuk\": 26, \"keluar\": 0}, \"2023-12-05\": {\"stok\": 25, \"masuk\": 0, \"keluar\": 1}}','','2023-11-23 09:29:41','Super Admin','2023-12-05 10:39:20','Super Admin',NULL,'',NULL,'',0,0),(8,'cbb4f461-e7f9-410a-9e22-c6d334bfd789','Apel',18,'Kg','{\"2023-11-23\": {\"stok\": 18, \"masuk\": 18, \"keluar\": 0}, \"2023-12-05\": {\"stok\": 18, \"masuk\": 0, \"keluar\": \"0\"}}','','2023-11-23 09:30:07','Super Admin','2023-12-05 10:36:24','Super Admin',NULL,'',NULL,'',0,0),(9,'686f1cdb-1c9e-4c2e-bc26-d1d03e2a8ec2','Telur',83,'pcs','{\"2023-11-23\": {\"stok\": 96, \"masuk\": 96, \"keluar\": 0}, \"2023-12-05\": {\"stok\": 83, \"masuk\": 0, \"keluar\": 13}}','','2023-11-23 09:30:18','Super Admin','2023-12-05 10:39:20','Super Admin',NULL,'',NULL,'',0,0),(10,'0d03c75a-bc38-4812-b23c-635cf65558ef','Susu',18,'Liter','{\"2023-11-23\": {\"stok\": 18, \"masuk\": 18, \"keluar\": 0}, \"2023-12-05\": {\"stok\": 18, \"masuk\": 0, \"keluar\": \"0\"}}','','2023-11-23 09:30:31','Super Admin','2023-12-05 10:36:24','Super Admin',NULL,'',NULL,'',0,0),(11,'4471925f-2915-4be0-8d69-dbd7203300ca','Keju',7,'Pack','{\"2023-11-23\": {\"stok\": 7, \"masuk\": 7, \"keluar\": 0}, \"2023-12-05\": {\"stok\": 7, \"masuk\": 0, \"keluar\": \"0\"}}','','2023-11-23 09:31:29','Super Admin','2023-12-05 10:36:24','Super Admin',NULL,'',NULL,'',0,0),(12,'24d6ec66-930b-4c08-ab93-db294228d9d8','Tepung Terigu',20,'Kg','{\"2023-11-23\": {\"stok\": 21, \"masuk\": 21, \"keluar\": 0}, \"2023-12-05\": {\"stok\": 20, \"masuk\": 0, \"keluar\": 1}}','','2023-11-23 09:31:50','Super Admin','2023-12-05 10:39:20','Super Admin',NULL,'',NULL,'',0,0),(13,'3d0766d1-49cf-4c16-93d6-7a8396be771b','Air Mineral (Galon)',152,'Liter','{\"2023-12-04\": {\"stok\": 152, \"masuk\": 152, \"keluar\": 0}, \"2023-12-05\": {\"stok\": 152, \"masuk\": 0, \"keluar\": \"0\"}}','','2023-12-04 13:44:52','Super Admin','2023-12-05 10:36:24','Super Admin',NULL,'',NULL,'',0,0),(14,'6405fedd-8e01-4469-bec7-f0f84a59b637','Kentang',78,'Kg','{\"2023-12-04\": {\"stok\": 80, \"masuk\": 80, \"keluar\": 0}, \"2023-12-05\": {\"stok\": 78, \"masuk\": 0, \"keluar\": 2}}','','2023-12-04 13:52:23','Super Admin','2023-12-05 10:39:20','Super Admin',NULL,'',NULL,'',0,0);
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
INSERT INTO `users` VALUES (1,'Super Admin','e34f92a20532a873cb3184398070b4b82a8fa29cf48572c203dc5f0fa6158231','superadmin@gmail.com','superadmin','2023-12-04 13:42:35',1),(2,'Sando','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','masandofami@gmail.com','admin','2023-11-22 13:49:06',1),(4,'ale','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','alelio@gmail.com','superadmin','2023-11-09 08:25:39',1);
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

-- Dump completed on 2023-12-06 11:35:42
