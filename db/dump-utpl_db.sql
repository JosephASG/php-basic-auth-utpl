-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: interchange.proxy.rlwy.net    Database: utpl_db
-- ------------------------------------------------------
-- Server version	9.3.0

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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,457785538206463704,'joseph-san','josephsan2301@gmail.com','$2y$10$zCbnMNer0gzcK5hfJpXzs.SW9rrR3TAJhdQQM7ov0sgriO5JVHTbW','2025-04-22 04:24:08'),(2,1781796170,'joseph-santamaria','alexis200123@outlook.es','$2y$10$QJejIz8IE0ehxVszSCjizuuZ9TGMFwClnQ5UYGGC91nYj13iF2Uyi','2025-04-22 07:42:53'),(3,1528518044,'juantio','jaunito@gmail.com','$2y$10$yIBaBLKOCASl63PcyOaUOeSAafcAp4.hp5pRrJuxhlJc1MhYw.iOe','2025-04-28 23:51:29'),(4,6279041568,'dfdsf','dmarmijos10@utpl.edu.ec','$2y$10$pQI04IhDOI6E6p.5jtxNMu8vsQmc1PfZn0tS0ZkBfHndirVkKpHx2','2025-04-28 23:51:35'),(5,7456233635,'maria12','maria1@hotmail.com','$2y$10$i9KYjWB.ff90k/Otg9xh3eq4weGyPBuUiPp0k6D5gif2Sxuf7qSz.','2025-05-08 01:12:48'),(6,3972651161,'maria12','maria12@hotmail.com','$2y$10$LzFIQJ82rBGaMYTfMw3Z0Ogm4y2T5sL2K71WzqjbiHklDaVf4fkJG','2025-05-08 01:13:40');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-18 22:46:35
