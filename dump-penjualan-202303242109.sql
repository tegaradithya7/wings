-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: penjualan
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
-- Table structure for table `ms_cart`
--

DROP TABLE IF EXISTS `ms_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ms_cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `trx_code` varchar(100) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `total_price` decimal(10,0) DEFAULT NULL,
  `is_checkout` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ms_cart_FK` (`user_id`),
  CONSTRAINT `ms_cart_FK` FOREIGN KEY (`user_id`) REFERENCES `ms_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ms_cart`
--

LOCK TABLES `ms_cart` WRITE;
/*!40000 ALTER TABLE `ms_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `ms_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ms_cart_detail`
--

DROP TABLE IF EXISTS `ms_cart_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ms_cart_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `trx_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `total_price` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ms_cart_detail_FK` (`product_id`),
  CONSTRAINT `ms_cart_detail_FK` FOREIGN KEY (`product_id`) REFERENCES `ms_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ms_cart_detail`
--

LOCK TABLES `ms_cart_detail` WRITE;
/*!40000 ALTER TABLE `ms_cart_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `ms_cart_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ms_product`
--

DROP TABLE IF EXISTS `ms_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ms_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_code` text,
  `product_name` text,
  `product_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `price` decimal(10,0) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `discount` decimal(10,0) DEFAULT NULL,
  `dimension` varchar(100) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ms_product`
--

LOCK TABLES `ms_product` WRITE;
/*!40000 ALTER TABLE `ms_product` DISABLE KEYS */;
INSERT INTO `ms_product` VALUES (1,'SKUSKILNP','So klin Pewangi','/assets/img/produk/so_klin_pewangi.jpg',15000,'IDR',25,'13 cm x 10 cm','PCS','2023-03-23 16:00:54','2023-03-23 16:12:51',0),(2,'GVBR','Giv Biru','/assets/img/produk/giv-biru.png',11000,'IDR',NULL,'13 cm x 10 cm','PCS','2023-03-23 16:01:51','2023-03-23 16:12:51',0),(3,'SKLQD','So Klin Liquid','/assets/img/produk/so_klin_liquid.png',18000,'IDR',NULL,'13 cm x 10 cm','PCS','2023-03-23 16:02:30','2023-03-23 16:12:51',0);
/*!40000 ALTER TABLE `ms_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ms_user`
--

DROP TABLE IF EXISTS `ms_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ms_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ms_user`
--

LOCK TABLES `ms_user` WRITE;
/*!40000 ALTER TABLE `ms_user` DISABLE KEYS */;
INSERT INTO `ms_user` VALUES (1,'admin','admin','$2y$10$nWLpdnRrGRrIm80FMgdwFOJidrp8dOiC5YfPdHWQHfmi/fqpb.oRe','2023-03-22 21:54:21',NULL,0),(2,'DuuuT','DuuuT','$2y$10$L/c2uepui8TBfWDyjzCWaOMDVUtnHnaOyziRcfCOhAkrmtJwKdTLm','2023-03-24 19:41:00',NULL,0),(3,'Smit','Smit','$2y$10$P9rcU3eQehnEV/wyqTCwduwQyal8rDcygp5/23iINs1p75fr3UK.a','2023-03-24 21:09:22',NULL,0);
/*!40000 ALTER TABLE `ms_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'penjualan'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-24 21:09:39
