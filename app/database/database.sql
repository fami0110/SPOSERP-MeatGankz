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
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `supplier_id` int NOT NULL,
  `harga` int NOT NULL,
  `harga_unit` varchar(10) NOT NULL,
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
  `status` tinyint(1) GENERATED ALWAYS AS ((case when ((`is_deleted` = 0) and (`is_restored` = 0)) then 1 when ((`is_deleted` = 1) and (`is_restored` = 0)) then 0 when ((`is_deleted` = 0) and (`is_restored` = 1)) then 1 end)) STORED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id`, `uuid`, `nama`, `supplier_id`, `harga`, `harga_unit`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'06bbbfbc-c399-42a7-b828-a46a905d7f0c','mang ea?',2,300000000,'Kg','','2023-11-04 19:32:24','Super Admin',NULL,'','2023-11-04 19:32:47','Super Admin',NULL,'',1,0),(2,'fb2e49e3-71bc-4947-8545-89bf2045ea2f','Daging Tomhawk',2,300000000,'Kg','','2023-11-04 19:39:45','Super Admin',NULL,'','2023-11-04 19:39:47','Super Admin',NULL,'',1,0),(3,'63c942ec-ffa2-445f-ae88-90b5f7b33a23','Daging enak',2,390843,'Kg','','2023-11-04 19:41:03','Super Admin',NULL,'','2023-11-04 19:41:04','Super Admin',NULL,'',1,0),(4,'464e5b4c-07cc-4a79-987f-47fb9525eefb','Daging enak',2,390843,'Kg','','2023-11-04 19:41:33','Super Admin',NULL,'','2023-11-04 19:48:31','Super Admin',NULL,'',1,0),(5,'7b91aff3-52ac-43ae-b5db-2d8a0931234f','Daging enak',2,300000000,'Kg','','2023-11-04 19:50:23','Super Admin',NULL,'','2023-11-04 19:50:25','Super Admin',NULL,'',1,0),(6,'0f2dc0ac-5316-4f23-a26d-4cab2dc4a647','steak',2,390843,'Kg','','2023-11-07 09:48:24','Super Admin',NULL,'',NULL,'',NULL,'',0,0);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
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
INSERT INTO `menu` VALUES (1,'d7b250a3-1f8d-40b8-aacd-2fdb9156b095','Australian Curried Sausages',1,50000,1,'6539e285223b3.jpg','','2023-10-26 10:52:37','admin','2023-11-06 09:32:22','Super Admin',NULL,'',NULL,'',0,0,1),(2,'8a65c313-d53b-4472-a09d-78c32fe8bc72','Nasi Goreng',1,20000,1,'6539ec4c67a29.jpg','','2023-10-26 11:34:20','admin','2023-10-30 09:36:32','sando',NULL,'',NULL,'',0,0,1),(3,'6629dff2-5061-45fa-b1ef-2b2749f24cc5','Spageti',1,16000,1,'653b65718c9fa.jpg','','2023-10-26 10:15:54','sando','2023-10-30 09:16:05','sando',NULL,'',NULL,'',0,0,1),(4,'9849680c-bbc6-4ec0-9b2a-b32662a5372e','Wagyu Steak',1,40000,1,'653f179c50adf.jpeg','','2023-10-30 09:40:28','sando',NULL,'',NULL,'',NULL,'',0,0,1),(5,'95777022-54d7-4ba3-8a78-70d296e28499','Chiken Steak',1,20000,1,'653f181174be1.jpeg','','2023-10-30 09:42:25','sando','2023-10-30 09:42:41','sando',NULL,'',NULL,'',0,0,1),(6,'77146b4b-6fc7-4fd2-a43c-a9946c1691b0','Oreo Milkshake',2,15999,1,'653f18650a624.jpg','','2023-10-30 09:43:49','sando',NULL,'',NULL,'',NULL,'',0,0,1),(7,'b98ea26a-1eaf-4725-9d11-ff4c0850db69','Soda Gembira',2,22000,1,'653f18a3b9be3.jpg','','2023-10-30 09:44:51','sando','2023-10-30 09:46:20','sando',NULL,'',NULL,'',0,0,1),(8,'03c2d485-1c3a-42ea-88a3-2272fa3ccb97','French Fries',3,15000,1,'653f198c1f80e.jpg','','2023-10-30 09:48:25','sando','2023-10-30 09:48:44','sando',NULL,'',NULL,'',0,0,1),(9,'fa162289-5240-4ddb-8805-b7802c9df211','Crepes',3,18000,1,'653f1a8b5900f.jpg','','2023-10-30 09:52:59','sando',NULL,'',NULL,'',NULL,'',0,0,1),(10,'9c38462f-1ba3-4a56-9395-10247c7111ae','Silky Pudding',4,16000,1,'653f1b1134b87.jpg','','2023-10-30 09:55:13','sando',NULL,'',NULL,'',NULL,'',0,0,1),(11,'33ceeb8c-06f8-47ce-83f9-3de84e462838','Ice Cream',4,15000,1,'653f1b547e240.jpg','','2023-10-30 09:56:20','sando',NULL,'',NULL,'',NULL,'',0,0,1);
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
  `detail_pembayaran` json NOT NULL,
  `subtotal` int NOT NULL,
  `pajak` int NOT NULL,
  `total` int NOT NULL,
  `metode_pembayaran` varchar(10) NOT NULL,
  `kode_transaksi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bayar` int NOT NULL,
  `kembali` int NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` (`id`, `uuid`, `kasir`, `pelanggan`, `detail_pembayaran`, `subtotal`, `pajak`, `total`, `metode_pembayaran`, `kode_transaksi`, `bayar`, `kembali`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'3b6101e8-cd9e-471c-934f-7b00187665e9','Super Admin','sando lalala','[{\"item\": \"Nasi Goreng\", \"amount\": \"1\", \"subtotal\": \"20000\"}, {\"item\": \"Spageti\", \"amount\": \"1\", \"subtotal\": \"16000\"}, {\"item\": \"Oreo Milkshake\", \"amount\": \"2\", \"subtotal\": \"32000\"}]',68000,1360,69360,'cash','',69360,0,'','2023-11-02 10:50:20','Super Admin',NULL,'',NULL,'',NULL,'',0,0);
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
  `setting` varchar(20) NOT NULL,
  `value` varchar(100) NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preferences`
--

LOCK TABLES `preferences` WRITE;
/*!40000 ALTER TABLE `preferences` DISABLE KEYS */;
INSERT INTO `preferences` VALUES (1,'POS','Nama_Perusahaan','Meatgankz','2023-10-31 08:58:55'),(2,'POS','Besar_Pajak_(%)','10','2023-10-31 08:55:04'),(3,'ERP','Waktu_Datang','06:00 - 07:00','2023-10-31 09:04:13'),(4,'ERP','Waktu_Pulang','15:00 - 17:00','2023-10-31 09:06:38'),(5,'ERP','Token_Absensi','12e461f63a95af15aad0e97648fa0872','2023-10-31 09:07:03');
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
  `harga` int NOT NULL,
  `unit_harga` varchar(20) NOT NULL,
  `barang_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pesan` int NOT NULL,
  `unit_pesan` varchar(20) NOT NULL,
  `berat` int NOT NULL,
  `unit_berat` varchar(20) NOT NULL,
  `harga_exw` int NOT NULL,
  `total_exw` int NOT NULL,
  `ongkir` int NOT NULL,
  `ice_pack` int NOT NULL,
  `diskon` int NOT NULL,
  `total` int NOT NULL,
  `supplier_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipment`
--

LOCK TABLES `shipment` WRITE;
/*!40000 ALTER TABLE `shipment` DISABLE KEYS */;
INSERT INTO `shipment` (`id`, `uuid`, `harga`, `unit_harga`, `barang_id`, `pesan`, `unit_pesan`, `berat`, `unit_berat`, `harga_exw`, `total_exw`, `ongkir`, `ice_pack`, `diskon`, `total`, `supplier_id`, `tanggal`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (6,'61e1d2a0-8c61-4455-97b8-df787c2b5108',390843,'Kg','6',3,'Kg',3000,'gr',100000,300000,20000,5000,10000,315000,'2','2023-11-07','','2023-11-07 02:59:40','Super Admin',NULL,'',NULL,'',NULL,'',0,0);
/*!40000 ALTER TABLE `shipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stok_bahan`
--

DROP TABLE IF EXISTS `stok_bahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stok_bahan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `barang_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal` date NOT NULL,
  `masuk` int NOT NULL,
  `stok` int NOT NULL,
  `keluar` int NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok_bahan`
--

LOCK TABLES `stok_bahan` WRITE;
/*!40000 ALTER TABLE `stok_bahan` DISABLE KEYS */;
INSERT INTO `stok_bahan` (`id`, `uuid`, `barang_id`, `tanggal`, `masuk`, `stok`, `keluar`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'4555f04b-738b-43f0-a0f9-d89354412b5d','Daging wagyu','2023-10-25',2,2,0,'','2023-10-25 09:42:28','admin',NULL,'',NULL,'',NULL,'',0,0);
/*!40000 ALTER TABLE `stok_bahan` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id`, `uuid`, `nama`, `alamat`, `kontak`, `email`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (1,'36929f29-b36f-4e8d-9012-3cd006c85c33','Daging enak','mana aja','08123382520','teampapathore@gmail.com','','2023-10-23 18:54:11','admin',NULL,'','2023-10-23 19:03:34','admin',NULL,'',1,0),(2,'48bb7345-1699-4abc-b670-0121341c47cb','Daging enak','mana aja','08123382520','email@example.com','','2023-10-23 19:04:04','admin',NULL,'',NULL,'',NULL,'',0,0),(3,'760633c2-1d7d-46cf-aa96-8b6e29760e3e','mang ea?','bumi','089520409050','mellandakumalasari13@gmail.com','','2023-10-23 20:07:07','admin','2023-10-23 23:04:06','admin',NULL,'',NULL,'',0,0),(4,'bc7357be-4ec2-40cd-a26a-b3864ab45c2b','mang ea?','Jl. Baruk Utara VI / 3 Surabaya  Jawa Timur 60298, Indonesia','3254329','hahha@example.com','','2023-10-26 10:16:42','admin',NULL,'','2023-10-26 10:20:06','admin',NULL,'',1,0);
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
INSERT INTO `suratperingatan` (`id`, `uuid`, `nama`, `email`, `jabatan`, `alamat`, `kesalahan`, `sanksi`, `note`, `created_at`, `created_by`, `modified_at`, `modified_by`, `deleted_at`, `deleted_by`, `restored_at`, `restored_by`, `is_deleted`, `is_restored`) VALUES (6,'','sepuh benita','benitasepuh@gmail.com','sepuh','sepuh iya puh','terlalu sepuh ben','','',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL),(7,'','memet','apasi@gmail.com','sepuh juga','jl.sepuh','terlalu sepuh mey','','',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL),(9,'9d91b222-c5eb-4078-9f83-4b27fabd9bce','mang ea?','teampapathore@gmail.com','fgtf','bumi','banyak banget woilahh','dikeluarkan','','2023-11-06 08:47:24','Super Admin',NULL,'',NULL,'',NULL,'',0,0);
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
INSERT INTO `users` VALUES (1,'Super Admin','e34f92a20532a873cb3184398070b4b82a8fa29cf48572c203dc5f0fa6158231','superadmin@gmail.com','superadmin','2023-11-03 10:12:32',0),(2,'Sando','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','masandofami@gmail.com','admin','2023-10-31 09:54:02',0),(4,'ale','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','alelio@gmail.com','user','2023-11-09 07:58:25',1);
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

-- Dump completed on 2023-11-09  8:17:02
