-- MySQL dump 10.13  Distrib 5.7.12, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: organizador
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `app_atividade`
--

DROP TABLE IF EXISTS `app_atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horario_de` time NOT NULL,
  `horario_ate` time NOT NULL,
  `descricao` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `extra` tinyint(1) DEFAULT '0',
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_atividade`
--

LOCK TABLES `app_atividade` WRITE;
/*!40000 ALTER TABLE `app_atividade` DISABLE KEYS */;
INSERT INTO `app_atividade` VALUES (1,'Sala','05:00:00','08:00:00','Limpar com apenas vassoura e pano',1,0,1),(2,'cozinha','05:00:00','07:30:00','teste',1,0,1),(3,'banheiro','10:00:00','13:00:00','limpar com rodo',1,0,2),(4,'quartos','09:00:00','10:00:00','limpar com vassoura',1,0,2),(5,'lavanderia','10:00:00','11:00:00','limpar com agua',1,1,1);
/*!40000 ALTER TABLE `app_atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_cronograma`
--

DROP TABLE IF EXISTS `app_cronograma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_cronograma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atividade_id` int(11) DEFAULT NULL,
  `total_horas` int(11) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `horario_id` int(11) DEFAULT NULL,
  `observacao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horario_de` time DEFAULT NULL,
  `horario_ate` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_332389734959F1BA` (`horario_id`),
  KEY `IDX_33238973A22D979B` (`atividade_id`),
  CONSTRAINT `FK_332389734959F1BA` FOREIGN KEY (`horario_id`) REFERENCES `app_horario` (`id`),
  CONSTRAINT `FK_33238973A22D979B` FOREIGN KEY (`atividade_id`) REFERENCES `app_atividade` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_cronograma`
--

LOCK TABLES `app_cronograma` WRITE;
/*!40000 ALTER TABLE `app_cronograma` DISABLE KEYS */;
INSERT INTO `app_cronograma` VALUES (1,3,1,1,37,'','00:00:00','00:00:00'),(2,1,1,1,38,'','00:00:00','00:00:00'),(3,1,1,1,39,'','00:00:00','00:00:00'),(13,3,2,1,42,'','00:00:00','00:00:00'),(14,3,2,0,43,'','00:00:00','00:00:00'),(15,1,0,1,44,'','00:00:00','00:00:00'),(16,4,1,1,45,'','00:00:00','00:00:00'),(17,2,0,1,1,'teste 2','04:00:00','06:00:00'),(18,1,0,1,47,'teste','01:00:00','05:00:00'),(19,5,0,1,36,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_cronograma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_horario`
--

DROP TABLE IF EXISTS `app_horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `horario_de` time NOT NULL,
  `horario_ate` time NOT NULL,
  `disponivel` tinyint(1) DEFAULT '1',
  `is_active` tinyint(1) DEFAULT '1',
  `dia` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F05D3EEA76ED395` (`user_id`),
  CONSTRAINT `FK_F05D3EEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `app_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_horario`
--

LOCK TABLES `app_horario` WRITE;
/*!40000 ALTER TABLE `app_horario` DISABLE KEYS */;
INSERT INTO `app_horario` VALUES (1,1,'00:00:04','00:00:50',1,1,1),(2,12,'00:00:05','00:00:00',0,1,1),(3,3,'00:00:03','00:00:00',0,1,1),(4,14,'00:00:07','00:00:00',0,1,1),(5,13,'00:00:06','00:00:00',0,1,2),(6,11,'00:00:01','00:00:00',0,1,4),(7,15,'00:00:05','00:00:00',0,1,2),(8,13,'00:00:07','00:00:00',0,1,6),(9,16,'00:00:04','00:00:00',0,1,3),(10,17,'00:00:04','00:00:00',0,1,1),(11,20,'00:00:04','00:00:00',0,1,2),(12,22,'00:00:04','00:00:00',0,1,2),(13,23,'00:00:03','00:00:00',0,1,2),(15,26,'00:00:03','00:00:00',0,1,2),(17,28,'00:00:02','00:00:00',0,1,2),(18,28,'00:00:02','00:00:00',0,1,1),(19,28,'00:00:02','00:00:00',0,1,1),(20,29,'00:00:02','00:00:00',0,1,1),(21,30,'00:00:01','00:00:00',0,1,2),(22,31,'00:00:01','00:00:00',0,1,1),(23,31,'00:00:01','00:00:00',0,1,2),(24,32,'00:00:03','00:00:00',0,1,1),(25,32,'00:00:07','00:00:00',0,1,2),(28,34,'00:00:06','00:00:00',0,1,2),(29,34,'00:00:08','00:00:00',0,1,2),(30,35,'00:00:06','00:00:00',0,1,1),(31,35,'00:00:05','00:00:00',0,1,2),(32,36,'00:00:03','00:00:00',0,1,2),(33,37,'00:00:06','00:00:00',0,1,1),(34,38,'00:00:08','00:00:00',0,1,2),(35,39,'00:00:07','00:00:00',0,1,3),(36,40,'10:00:06','00:00:00',1,1,1),(37,40,'05:00:00','06:00:00',1,1,2),(38,41,'05:00:00','07:00:00',1,1,1),(39,40,'05:00:00','06:00:00',1,1,3),(40,42,'09:00:00','09:30:00',0,1,1),(41,43,'10:00:00','11:00:00',0,1,1),(42,44,'10:00:00','13:00:00',1,1,1),(43,45,'10:00:00','12:00:00',1,1,1),(44,46,'13:00:00','14:00:00',1,1,2),(45,47,'09:00:00','11:00:00',1,1,1),(46,47,'13:00:00','14:00:00',0,1,2),(47,1,'07:00:00','08:00:00',1,1,2);
/*!40000 ALTER TABLE `app_horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_realizada`
--

DROP TABLE IF EXISTS `app_realizada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_realizada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cronograma_id` int(11) DEFAULT NULL,
  `observacao` longtext COLLATE utf8_unicode_ci NOT NULL,
  `horario_de` time NOT NULL,
  `horario_ate` time NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B85E8DD9E2AD7CD6` (`cronograma_id`),
  CONSTRAINT `FK_B85E8DD9E2AD7CD6` FOREIGN KEY (`cronograma_id`) REFERENCES `app_cronograma` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_realizada`
--

LOCK TABLES `app_realizada` WRITE;
/*!40000 ALTER TABLE `app_realizada` DISABLE KEYS */;
INSERT INTO `app_realizada` VALUES (5,18,'obrigada','07:00:00','08:30:00',1),(8,17,'teste','01:00:00','06:00:00',1);
/*!40000 ALTER TABLE `app_realizada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_users`
--

DROP TABLE IF EXISTS `app_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `role` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quarto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_users`
--

LOCK TABLES `app_users` WRITE;
/*!40000 ALTER TABLE `app_users` DISABLE KEYS */;
INSERT INTO `app_users` VALUES (1,'admin','$2a$08$jHZj/wJfcVKlIwr5AvR78euJxYK7Ku5kURNhNx.7.CSIJ3Pq6LEPC','admin@email.com',1,'ROLE_ADMIN','teste','a6'),(3,'isaac','$2y$12$5SvOIMQGlY.vT4r/iQfeauXSQi0XDwlw9nJcbqMuqoUOuT7OjdN3y','isaac@awdigital.com.br',1,'ROLE_ADMIN','Isaac','a5'),(11,'arthur','$2y$12$h0xEsMLojKh0u9GNuwaUp.bETxqHHqbYUUQiig29OFHAVa0/0SC62','teste@email.com',1,'ROLE_USER','arthur','aw'),(12,'dani','$2y$12$80xaxx/3DPxSi2ynIDGkbeh6iFW8eVVf/y.bM0RjtENKos/VSUq8m','teste@email.com',1,'ROLE_USER','dani','aw'),(13,'gelinho','$2y$12$QQE16f8S/2tDoX8GvkvuIePUHd8v/A/nTEeNKM4UvhkcyQbNPCVDi','teste@email.com',1,'ROLE_ADMIN','gelinho','quarto de limpeza'),(14,'fernando','$2y$12$ruhtgxdOdsIzqaBrO5X38u7/1IgvFQrw/FxVIUXKy2juq3Y2FFH7G','fernando@rnj.com.br',1,'ROLE_ADMIN','Fernando','goon'),(15,'dione','$2y$12$hKSxNflQbwSr6tq3zo63BewmPi26qxMjCqArXyQx5l2Jx4TXx2qPO','dione@awdigital.com.br',1,'ROLE_USER','Dione','a5'),(16,'thiago','$2y$12$y/XsHYaAWdu026HvEAABCujNwz0TC0Xe1SVA/HbOaABfnOoa.xOZa','thiago@email.com',1,'ROLE_ADMIN','Thiago','a5'),(17,'jao','$2y$12$gjfJki5ciopA7zW0JEvP4.lfN/8.cfkEdGaQfqI42fTzdr7PCLEzW','joao@email.com',1,'ROLE_USER','Joao','a5'),(20,'pedro','$2y$12$rNGCf1.BTwYf10K5QfeNKee9WsLcRR5BvdDlfWAsTxPwyLcHq7mrW','pedro@email.com',1,'ROLE_USER','Pedro','a5'),(22,'paul','$2y$12$sDZ24tzyD6RLDOmix3BcS.m2WAHuIc21y8dS3ykN85PLvIMqLKqom','paul@email.com',0,'ROLE_USER','Paul','a5'),(23,'lana','$2y$12$sXNiwz6WPBuYaAGZqoX2H.fV59vmf7NY48UE1zofpzNBOc30s5HMu','lana@email.com',0,'ROLE_USER','Lana','a5'),(26,'isa','$2y$12$.buwEg9ZK0s4nXDhzw5scOTYt8RvBoTw7s9JFgZ8gerxkD9bzRCdO','isa@email.com',0,'ROLE_USER','Isa','a5'),(28,'andre','$2y$12$6G/9ut.B1WNphzFNUEVPQuBQGFy0alx8CiXEtZHJXIOf1CX9C3pRu','andre@email.com',0,'ROLE_USER','Andre','a5'),(29,'alan','$2y$12$82k/PgFOnzJW32cyAakHYeVmm1h4xkiiQjF.0rkBsJzXi.WeQI13y','alan@email.com',0,'ROLE_USER','Alan','a5'),(30,'manuel','$2y$12$6Ig8WBNhRM4PEI99n4jJWeQUSfWpamWVfV2WCx0OrTZLNdyuYinA6','manuel@email.com',1,'ROLE_USER','Manuel','5a'),(31,'valmir','$2y$12$UWO2JLUu9U8VRY3of8f4.uAsiaBsa4I876il.rDkEzEi4tfTG3x36','valmir@email.com',1,'ROLE_USER','Valmir','a5'),(32,'isadora','$2y$12$um21UQ//ik2oDjj.PWyjv.XLixZZiaRAG98b0mCUK53JP1Fs4lqUm','isa@email.com',0,'ROLE_USER','Isadora','a5'),(34,'val','$2y$12$8db/uv5gN3HHYyCTsMIw1OyCo5NYm1F1kVhI5s8ect76AbH8RIHim','val@email.com',1,'ROLE_USER','Val','a5'),(35,'rita','$2y$12$R/NfleXYgF5O/ie5dHgWdumbNFdvqPcJ5p8PEaJkqN3bC5Of2qwOG','rita@email.com',1,'ROLE_USER','Rita','a5'),(36,'rafa','$2y$12$zoj27/tJS0/aGaU138YVOukOim3776bXUzUYjvUZH2DbnlH73RWRe','rafa@email.com',1,'ROLE_USER','Rafaela','a5'),(37,'silvia','$2y$12$w3l4zxUc4x3di17HyxoGGeiPPylNqcoFV3SirJJVkAnI0QvQL4IFC','silvia@email.com',1,'ROLE_USER','Silvia','a5'),(38,'joaquina','$2y$12$OKlR9WCy8jBB9Xh4IO92FOQB5opBE/ZPtS1hStrR4ByOAod4Mdfgq','joaquina@email.com',1,'ROLE_USER','Joaquina','a5'),(39,'rick','$2y$12$I3IeMP3TfvbmefLRaXNUOurGQ7hGW7KN2XsTqKwdbmzzxrYMDqpvu','rick@email.com',1,'ROLE_USER','Rick','aw'),(40,'artur','$2y$12$CeL9mEcVLSor7JBx1Uww9uMCj8RsUyl3Bwvq3YNC/C8Jj01O2Ibda','artur@email.com',1,'ROLE_USER','Artur','aw2'),(41,'teste2','$2y$12$sTCNq7/RkmiPZHZIcOVv6O4JTgch3VO/OsjjQzWimS99LmVRK9DDO','teste2@email.com',0,'ROLE_ADMIN','teste2','teste'),(42,'teste_horario','$2y$12$c1WcjzF8KXSFCGqQkYiEV.uwmRRJvIVTNiJhlfPiiVHhmSnKsFYUW','teste@email.com',1,'ROLE_ADMIN','teste horario','a5'),(43,'teste_horario1','$2y$12$61tsnglSrtcw/ov44sbJSOn2dpaM8s1OIn7k743AKQYMNtVa9Mv5K','teste@email.com',1,'ROLE_USER','teste horario 1','a5'),(44,'teste_horario2','$2y$12$QhJq3YMEYYRYMCyoS4rYx.k2KdnOY07Ke/zEbCBodtcifVMEXOQFy','teste@email.com',1,'ROLE_USER','teste horario2','a5'),(45,'teste_horario3','$2y$12$sOtx5fi/.3yrTuyPND34OeL1t.Nv6m1eSpHOngH40UIFXMwxcHwjO','teste@email.com',1,'ROLE_USER','teste horario 3','a5'),(46,'teste_horario4','$2y$12$euO3m0Vg9RI2wEPn9LJ2U.9shpU8horqDArIDVgk5NVwGnkbQRXEu','teste@email.com',1,'ROLE_USER','teste horario 4','a5'),(47,'teste_horario5','$2y$12$T0jWTN4SnMRSjGeY33vBtuwzDqC4RQIONbZFREDm9e9EBJRIpzk8y','teste@email.com',0,'ROLE_USER','teste horario 5','a5');
/*!40000 ALTER TABLE `app_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-21 17:00:08
