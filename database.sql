-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: nutrifacil_db
-- ------------------------------------------------------
-- Server version	8.0.39

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
-- Table structure for table `alimentos`
--

DROP TABLE IF EXISTS `alimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alimentos` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `calorias` decimal(6,2) NOT NULL,
  `proteinas` decimal(6,2) NOT NULL,
  `carboidratos` decimal(6,2) NOT NULL,
  `gorduras` decimal(6,2) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `alergias` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimentos`
--

LOCK TABLES `alimentos` WRITE;
/*!40000 ALTER TABLE `alimentos` DISABLE KEYS */;
INSERT INTO `alimentos` VALUES (1,'Abacate',160.00,2.00,9.00,15.00,'Frutas',''),(2,'Banana',89.00,1.10,23.00,0.30,'Frutas',''),(3,'Maçã',52.00,0.30,14.00,0.20,'Frutas',''),(4,'Pera',57.00,0.40,15.00,0.10,'Frutas',''),(5,'Laranja',47.00,0.90,12.00,0.10,'Frutas',''),(6,'Mamão',43.00,0.50,11.00,0.20,'Frutas',''),(7,'Manga',60.00,0.80,15.00,0.40,'Frutas',''),(8,'Kiwi',61.00,1.10,15.00,0.50,'Frutas',''),(9,'Morango',33.00,0.70,8.00,0.30,'Frutas',''),(10,'Abacaxi',50.00,0.50,13.00,0.10,'Frutas',''),(11,'Tomate',18.00,0.90,3.90,0.20,'Verduras',''),(12,'Alface',14.00,1.40,2.90,0.20,'Verduras',''),(13,'Couve',35.00,2.90,7.00,0.50,'Verduras',''),(14,'Brócolis',34.00,2.80,7.00,0.40,'Verduras',''),(15,'Espinafre',23.00,2.90,3.60,0.40,'Verduras',''),(16,'Repolho',25.00,1.30,6.00,0.10,'Verduras',''),(17,'Cenoura',41.00,0.90,10.00,0.20,'Legumes',''),(18,'Batata-doce',86.00,1.60,20.00,0.10,'Legumes',''),(19,'Abóbora',26.00,1.00,7.00,0.10,'Legumes',''),(20,'Chuchu',19.00,0.80,4.50,0.10,'Legumes',''),(21,'Peito de frango grelhado',165.00,31.00,0.00,3.60,'Proteína Animal',''),(22,'Tilápia',96.00,20.10,0.00,1.70,'Proteína Animal','Frutos do mar'),(23,'Salmão',208.00,20.00,0.00,13.00,'Proteína Animal','Frutos do mar'),(24,'Atum (fresco)',130.00,28.00,0.00,1.00,'Proteína Animal','Frutos do mar'),(25,'Filé mignon',143.00,22.00,0.00,6.00,'Proteína Animal',''),(26,'Alcatra',175.00,26.00,0.00,7.00,'Proteína Animal',''),(27,'Patinho',140.00,21.00,0.00,5.00,'Proteína Animal',''),(28,'Tofu',70.00,8.00,2.00,4.00,'Proteína Vegetariana',''),(29,'Proteína de soja texturizada',330.00,50.00,20.00,3.00,'Proteína Vegetariana','Soja'),(30,'Lentilha (cozida)',116.00,9.00,20.00,0.40,'Proteína Vegetariana',''),(31,'Grão-de-bico (cozido)',164.00,9.00,27.00,2.60,'Proteína Vegetariana',''),(32,'Arroz integral',111.00,2.60,23.00,0.90,'Carboidrato',''),(33,'Quinoa',120.00,4.10,21.30,1.90,'Carboidrato',''),(34,'Aveia',389.00,16.90,66.30,6.90,'Carboidrato',''),(35,'Pão integral',247.00,9.00,41.00,3.40,'Carboidrato','Glúten'),(36,'Pão francês',270.00,9.00,51.00,3.20,'Carboidrato','Glúten'),(37,'Amêndoas',579.00,21.20,21.70,49.90,'Gordura Boa','Oleaginosa'),(38,'Castanha-do-Pará',656.00,14.30,12.30,66.40,'Gordura Boa','Oleaginosa'),(39,'Nozes',654.00,15.20,13.70,65.20,'Gordura Boa','Oleaginosa'),(41,'Abobrinha',17.00,1.20,3.10,0.30,'Legumes',''),(42,'Cebola',40.00,1.20,9.30,0.10,'Legumes',''),(44,'Pimentão',31.00,1.00,6.30,0.30,'Legumes',''),(45,'Pepino',15.00,0.70,3.20,0.10,'Legumes',''),(46,'Berinjela',25.00,1.00,5.70,0.20,'Legumes',''),(47,'Beterraba',43.00,1.60,9.60,0.20,'Legumes',''),(48,'Quiabo',33.00,1.90,7.20,0.20,'Legumes',''),(49,'Ervilha fresca',81.00,5.40,14.50,0.40,'Legumes',''),(50,'Vagem',35.00,2.50,7.80,0.20,'Legumes',''),(51,'Palmito',25.00,1.80,4.60,0.20,'Legumes',''),(52,'Cogumelo (Shiitake)',34.00,2.30,6.80,0.50,'Legumes',''),(53,'Nabo',28.00,0.90,6.50,0.10,'Legumes',''),(54,'Rabanete',16.00,0.70,3.40,0.10,'Legumes',''),(55,'Broto de feijão',30.00,3.00,5.90,0.20,'Legumes',''),(56,'Aspargo',20.00,2.20,3.60,0.20,'Legumes',''),(57,'Jiló',27.00,1.40,6.00,0.10,'Legumes',''),(58,'Maxixe',14.00,1.10,2.80,0.10,'Legumes',''),(59,'Milho (cozido)',96.00,3.40,21.60,1.50,'Legumes',''),(60,'Mandioca (cozida)',112.00,1.20,27.10,0.20,'Legumes',''),(61,'Inhame (cozido)',118.00,1.50,27.90,0.20,'Legumes',''),(62,'Couve-flor',25.00,2.00,5.20,0.30,'Verduras',''),(63,'Acelga',19.00,1.80,3.40,0.20,'Verduras',''),(64,'Peito de peru',104.00,21.00,0.00,1.50,'Proteína Animal',''),(65,'Bacalhau (fresco)',110.00,24.00,0.00,1.00,'Proteína Animal','Frutos do mar'),(66,'Truta',119.00,20.50,0.00,3.50,'Proteína Animal','Frutos do mar'),(67,'Robalo',92.00,19.40,0.00,1.80,'Proteína Animal','Frutos do mar'),(68,'Coxão mole',157.00,22.00,0.00,7.00,'Proteína Animal',''),(69,'Maminha',168.00,28.00,0.00,5.00,'Proteína Animal',''),(70,'Acém magro',158.00,21.00,0.00,7.00,'Proteína Animal',''),(71,'Ovos de codorna',158.00,13.00,1.20,11.00,'Proteína Animal','Ovo'),(72,'Tempeh',193.00,19.00,9.00,11.00,'Proteína Vegetariana','Soja'),(73,'Soja cozida',127.00,11.00,11.50,4.10,'Proteína Vegetariana','Soja'),(74,'Ovos de codorna',158.00,13.00,1.20,11.00,'Proteína Vegetariana','Ovo'),(75,'Ovos (galinha)',143.00,13.00,1.10,10.00,'Proteína Animal','Ovo'),(76,'Ovos (galinha)',143.00,13.00,1.10,10.00,'Proteína Vegetariana','Ovo');
/*!40000 ALTER TABLE `alimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacoes`
--

DROP TABLE IF EXISTS `avaliacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avaliacoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `altura` int DEFAULT NULL,
  `idade` int DEFAULT NULL,
  `atividade` decimal(3,2) NOT NULL DEFAULT '1.20',
  `sexo` varchar(10) DEFAULT NULL,
  `objetivo` varchar(50) DEFAULT NULL,
  `tempo_meta` int DEFAULT NULL,
  `imc` decimal(5,2) DEFAULT NULL,
  `tmb` int DEFAULT NULL,
  `data_avaliacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `dieta` varchar(100) DEFAULT NULL,
  `preferencias` text,
  `alergias` text,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacoes`
--

LOCK TABLES `avaliacoes` WRITE;
/*!40000 ALTER TABLE `avaliacoes` DISABLE KEYS */;
INSERT INTO `avaliacoes` VALUES (83,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:20:51','2025-06-18 07:20:51','Low Carb','Frango,Carne Bovina,Ovo,Tilapia,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(84,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:21:07','2025-06-18 07:21:07','Low Carb','Frango,Carne Bovina,Ovo,Tilapia,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(85,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:21:20','2025-06-18 07:21:20','Low Carb','Frango,Carne Bovina,Ovo,Tilapia,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(86,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:26:14','2025-06-18 07:26:14','Low Carb','Frango,Carne Bovina,Ovo,Tilapia,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(87,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:27:02','2025-06-18 07:27:02','Mediterrânea','Frango,Carne Bovina,Ovo,Tilapia,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(88,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:28:45','2025-06-18 07:28:45','Mediterrânea','Frango,Carne Bovina,Ovo,Tilapia,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(89,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:32:45','2025-06-18 07:32:45','Mediterrânea','Frango,Carne Bovina,Ovo,Tilapia,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(90,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:32:54','2025-06-18 07:32:54','Cetogênica','Frango,Carne Bovina,Ovo,Tilapia,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(91,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:33:53','2025-06-18 07:33:53','Mediterrânea','Frango,Carne Bovina,Ovo,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(92,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:34:08','2025-06-18 07:34:08','Vegetariana','Frango,Carne Bovina,Ovo,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(93,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:34:41','2025-06-18 07:34:41','Low Carb','Frango,Carne Bovina,Ovo,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(94,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:35:26','2025-06-18 07:35:26','Low Carb','Frango,Carne Bovina,Ovo,Arroz,Feijão,Pão,Ervilha,Brocolis,Alface,cenoura,Maçã,Banana,Morango,Uva,Mamão','Frutos do mar,Nenhuma'),(95,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:35:39','2025-06-18 07:35:39','Low Carb','Frango,Carne Bovina,Ovo,Arroz,Feijão,Pão,Ervilha,Brocolis,Alface,cenoura,Maçã,Banana,Morango,Uva,Mamão','Frutos do mar,Nenhuma'),(96,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:51:11','2025-06-18 07:51:11','Low Carb','Frango,Carne Bovina,Ovo,Arroz,Feijão,Pão,Ervilha,Brocolis,Alface,cenoura,Maçã,Banana,Morango,Uva,Mamão','Frutos do mar,Nenhuma'),(97,36,92.00,158,52,1.38,'feminino','emagrecimento',6,NULL,NULL,'2025-06-18 10:51:47','2025-06-18 07:51:47','Mediterrânea','Frango,Carne Bovina,Ovo,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(98,36,92.00,158,52,1.38,'feminino','emagrecimento',6,NULL,NULL,'2025-06-18 10:52:13','2025-06-18 07:52:13','Mediterrânea','Frango,Carne Bovina,Ovo,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Frutos do mar,Nenhuma'),(99,36,92.00,158,52,1.38,'feminino','emagrecimento',6,NULL,NULL,'2025-06-18 10:52:19','2025-06-18 07:52:19','Mediterrânea','Frango,Carne Bovina,Ovo,Arroz,Feijão,Pão,Brócolis,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Frutos do mar'),(100,36,92.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:52:58','2025-06-18 07:52:58','Low Carb','Frango,Carne Bovina,Ovo,Arroz,Feijão,Pão,Ervilha,Brocolis,Alface,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Frutos do mar,Soja'),(101,36,92.00,158,59,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 10:54:33','2025-06-18 07:54:33','Vegetariana','Ovo,Arroz,Feijão,Pão,Ervilha,Brocolis,Alface,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(102,36,85.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 12:28:21','2025-06-18 09:28:21','Low Carb','Frango,Carne Bovina,Ovo,Arroz,Feijão,Pão,Ervilha,Brocolis,Alface,Cenoura,beterraba,Maçã,Banana,Morango,Uva,Mamão','Frutos do mar,Nenhuma'),(103,36,85.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 12:28:33','2025-06-18 09:28:33','Low Carb','Frango,Carne Bovina,Ovo,Arroz,Feijão,Pão,Ervilha,Brocolis,Alface,Cenoura,beterraba,Maçã,Banana,Morango,Uva,Mamão','Frutos do mar'),(104,36,85.00,158,52,1.38,'feminino','emagrecimento',3,NULL,NULL,'2025-06-18 12:28:37','2025-06-18 09:28:37','Low Carb','Frango,Carne Bovina,Ovo,Arroz,Feijão,Pão,Ervilha,Brocolis,Alface,Cenoura,beterraba,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(105,36,83.00,173,22,1.20,'masculino','emagrecimento',6,NULL,NULL,'2025-06-18 13:23:24','2025-06-18 10:23:24','Mediterrânea','Frango,Peru,Ovo,Salmão,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,beterraba,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(106,36,83.00,158,52,1.55,'feminino','emagrecimento',5,NULL,NULL,'2025-06-18 18:23:35','2025-06-18 15:23:35','Mediterrânea','Frango,Carne Bovina,Ovo,Tilapia,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,beterraba,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(107,36,83.00,158,52,1.55,'feminino','emagrecimento',5,NULL,NULL,'2025-06-18 18:33:40','2025-06-18 15:33:40','Mediterrânea','Frango,Carne Bovina,Ovo,Tilapia,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,beterraba,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(108,36,83.00,173,22,1.38,'feminino','emagrecimento',6,NULL,NULL,'2025-06-18 18:45:43','2025-06-18 15:45:43','Low Carb','Frango,Peru,Ovo,Salmão,Arroz,Feijão,Pão,Ervilha,Brocolis,Alface,Cenoura,beterraba,Maçã,Banana,Morango,Uva,Mamão',''),(109,36,83.00,158,59,1.73,'feminino','emagrecimento',6,NULL,NULL,'2025-06-18 21:52:20','2025-06-18 18:52:20','Mediterrânea','Frango,Carne Bovina,Ovo,Tilapia,Arroz,Feijão,Pão,Ervilha,Brocolis,Alface,Cenoura,beterraba,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(110,36,83.00,173,22,1.38,'feminino','emagrecimento',5,NULL,NULL,'2025-06-18 22:08:59','2025-06-18 19:08:59','Low Carb','Frango,Carne Bovina,Ovo,Tilapia,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,beterraba,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(111,36,83.00,173,22,1.38,'feminino','emagrecimento',5,NULL,NULL,'2025-06-18 23:01:40','2025-06-18 20:01:40','Cetogênica','Frango,Peru,Ovo,Salmão,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(112,36,83.00,158,52,1.38,'feminino','emagrecimento',6,NULL,NULL,'2025-06-18 23:30:46','2025-06-18 20:30:46','Mediterrânea','Frango,Carne Bovina,Ovo,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(115,36,83.00,158,52,1.55,'feminino','emagrecimento',6,NULL,NULL,'2025-06-19 00:22:38','2025-06-18 21:22:38','Mediterrânea','Frango,Carne Bovina,Ovo,Tilapia,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,beterraba,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(116,36,83.00,158,52,1.38,'feminino','emagrecimento',6,NULL,NULL,'2025-06-19 00:25:51','2025-06-18 21:25:51','Low Carb','Frango,Carne Bovina,Ovo,Tilapia,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,beterraba,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(117,39,83.00,173,22,1.55,'masculino','emagrecimento',6,NULL,NULL,'2025-06-19 00:51:59','2025-06-18 21:51:59','Mediterrânea','Frango,Peru,Ovo,Salmão,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,beterraba,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(118,39,83.00,173,22,1.90,'masculino','emagrecimento',6,NULL,NULL,'2025-06-19 01:23:29','2025-06-18 22:23:29','Mediterrânea','Frango,Peru,Ovo,Salmão,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,beterraba,Maçã,Banana,Morango,Uva,Mamão','Nenhuma');
/*!40000 ALTER TABLE `avaliacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dietas_geradas`
--

DROP TABLE IF EXISTS `dietas_geradas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dietas_geradas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `refeicao_numero` int DEFAULT NULL,
  `alimento_nome` varchar(100) DEFAULT NULL,
  `data_geracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `dietas_geradas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dietas_geradas`
--

LOCK TABLES `dietas_geradas` WRITE;
/*!40000 ALTER TABLE `dietas_geradas` DISABLE KEYS */;
/*!40000 ALTER TABLE `dietas_geradas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagamentos`
--

DROP TABLE IF EXISTS `pagamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pendente',
  `metodo` varchar(20) DEFAULT NULL,
  `data_pagamento` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `forma_pagamento` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `pagamentos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamentos`
--

LOCK TABLES `pagamentos` WRITE;
/*!40000 ALTER TABLE `pagamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (17,'Admin','admin@nutrifacil.com','$2y$10$khTSYGmi5ed3Yl50UCZ8QeboedqVtiUIdFlqIE/8q1tCkUXslP5yC',1,NULL),(36,'Rosana Rabelo','rosanarabelo10@gmail.com','$2y$10$vL5BqQT1GvGS1UL6CegCZO/2cgc8Qdnx74dFvNiUPxgbV6EAy6z9a',0,'31993061564'),(37,'Caio Magalhães','teste@server.com.br','$2y$10$enXEp2NOVbDNEZlwxx/hluTtWSIfGQUch2g4B0KjndiMe88pzZNO2',0,'4581815151'),(39,'Caio Magalhães','caiomroliveira@gmail.com','$2y$10$hdM.TnsLLEaPa/jOJddQK.2YuJ9gCSuwndeNjf0gQC.zgeX0EUA.W',0,'31993432481');
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

-- Dump completed on 2025-06-18 22:26:11
