-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: projeto
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `ipet_animais`
--

DROP TABLE IF EXISTS `ipet_animais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ipet_animais` (
  `ANI_CODIGO` int NOT NULL AUTO_INCREMENT,
  `ANI_NOME` varchar(30) NOT NULL,
  `ANI_ESPECIE` varchar(30) NOT NULL,
  `ANI_RAÇA` varchar(30) NOT NULL,
  `ANI_PORTE` varchar(1) NOT NULL,
  `ANI_GENERO` varchar(1) NOT NULL,
  `ANI_DESCRICAO` text NOT NULL,
  `ANI_ONG_ID` int DEFAULT NULL,
  `ANI_NOR_CODIGO` int DEFAULT NULL,
  `ANI_ESP_ID` int DEFAULT NULL,
  PRIMARY KEY (`ANI_CODIGO`),
  KEY `ANI_ONG_FK` (`ANI_ONG_ID`),
  KEY `ANI_NOR_FK` (`ANI_NOR_CODIGO`),
  KEY `ANI_ESP_FK` (`ANI_ESP_ID`),
  CONSTRAINT `ANI_ESP_FK` FOREIGN KEY (`ANI_ESP_ID`) REFERENCES `ipet_especie` (`ESP_ID`),
  CONSTRAINT `ANI_NOR_FK` FOREIGN KEY (`ANI_NOR_CODIGO`) REFERENCES `ipet_usuario_normal` (`NOR_CODIGO`),
  CONSTRAINT `ANI_ONG_FK` FOREIGN KEY (`ANI_ONG_ID`) REFERENCES `ipet_usuarios_ong` (`ONG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ipet_animais`
--

LOCK TABLES `ipet_animais` WRITE;
/*!40000 ALTER TABLE `ipet_animais` DISABLE KEYS */;
/*!40000 ALTER TABLE `ipet_animais` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-25  0:02:16
