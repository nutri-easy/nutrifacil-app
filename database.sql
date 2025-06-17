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
-- Dumping data for table `alimentos`
--

LOCK TABLES `alimentos` WRITE;
/*!40000 ALTER TABLE `alimentos` DISABLE KEYS */;
INSERT INTO `alimentos` VALUES (1,'Abacate',160.00,2.00,9.00,15.00,'Frutas',NULL),(2,'Banana',89.00,1.10,23.00,0.30,'Frutas',NULL),(3,'Maçã',52.00,0.30,14.00,0.20,'Frutas',NULL),(4,'Pera',57.00,0.40,15.00,0.10,'Frutas',NULL),(5,'Laranja',47.00,0.90,12.00,0.10,'Frutas',NULL),(6,'Mamão',43.00,0.50,11.00,0.20,'Frutas',NULL),(7,'Manga',60.00,0.80,15.00,0.40,'Frutas',NULL),(8,'Kiwi',61.00,1.10,15.00,0.50,'Frutas',NULL),(9,'Morango',33.00,0.70,8.00,0.30,'Frutas',NULL),(10,'Abacaxi',50.00,0.50,13.00,0.10,'Frutas',NULL),(11,'Tomate',18.00,0.90,3.90,0.20,'Verduras',NULL),(12,'Alface',14.00,1.40,2.90,0.20,'Verduras',NULL),(13,'Couve',35.00,2.90,7.00,0.50,'Verduras',NULL),(14,'Brócolis',34.00,2.80,7.00,0.40,'Verduras',NULL),(15,'Espinafre',23.00,2.90,3.60,0.40,'Verduras',NULL),(16,'Repolho',25.00,1.30,6.00,0.10,'Verduras',NULL),(17,'Cenoura',41.00,0.90,10.00,0.20,'Legumes',NULL),(18,'Batata-doce',86.00,1.60,20.00,0.10,'Legumes',NULL),(19,'Abóbora',26.00,1.00,7.00,0.10,'Legumes',NULL),(20,'Chuchu',19.00,0.80,4.50,0.10,'Legumes',NULL),(21,'Peito de frango grelhado',165.00,31.00,0.00,3.60,'Proteína Animal',NULL),(22,'Tilápia',96.00,20.10,0.00,1.70,'Proteína Animal',NULL),(23,'Salmão',208.00,20.00,0.00,13.00,'Proteína Animal','Frutos do mar'),(24,'Atum (fresco)',130.00,28.00,0.00,1.00,'Proteína Animal','Frutos do mar'),(25,'Filé mignon',143.00,22.00,0.00,6.00,'Proteína Animal',NULL),(26,'Alcatra',175.00,26.00,0.00,7.00,'Proteína Animal',NULL),(27,'Patinho',140.00,21.00,0.00,5.00,'Proteína Animal',NULL),(28,'Tofu',70.00,8.00,2.00,4.00,'Proteína Vegetariana',NULL),(29,'Proteína de soja texturizada',330.00,50.00,20.00,3.00,'Proteína Vegetariana','Soja'),(30,'Lentilha (cozida)',116.00,9.00,20.00,0.40,'Proteína Vegetariana',NULL),(31,'Grão-de-bico (cozido)',164.00,9.00,27.00,2.60,'Proteína Vegetariana',NULL),(32,'Arroz integral',111.00,2.60,23.00,0.90,'Carboidrato',NULL),(33,'Quinoa',120.00,4.10,21.30,1.90,'Carboidrato',NULL),(34,'Aveia',389.00,16.90,66.30,6.90,'Carboidrato',NULL),(35,'Pão integral',247.00,9.00,41.00,3.40,'Carboidrato','Glúten'),(36,'Pão francês',270.00,9.00,51.00,3.20,'Carboidrato','Glúten'),(37,'Amêndoas',579.00,21.20,21.70,49.90,'Gordura Boa','Oleaginosa'),(38,'Castanha-do-Pará',656.00,14.30,12.30,66.40,'Gordura Boa','Oleaginosa'),(39,'Nozes',654.00,15.20,13.70,65.20,'Gordura Boa','Oleaginosa'),(41,'Abobrinha',17.00,1.20,3.10,0.30,'Legumes',NULL),(42,'Cebola',40.00,1.20,9.30,0.10,'Legumes',NULL),(44,'Pimentão',31.00,1.00,6.30,0.30,'Legumes',NULL),(45,'Pepino',15.00,0.70,3.20,0.10,'Legumes',NULL),(46,'Berinjela',25.00,1.00,5.70,0.20,'Legumes',NULL),(47,'Beterraba',43.00,1.60,9.60,0.20,'Legumes',NULL),(48,'Quiabo',33.00,1.90,7.20,0.20,'Legumes',NULL),(49,'Ervilha fresca',81.00,5.40,14.50,0.40,'Legumes',NULL),(50,'Vagem',35.00,2.50,7.80,0.20,'Legumes',NULL),(51,'Palmito',25.00,1.80,4.60,0.20,'Legumes',NULL),(52,'Cogumelo (Shiitake)',34.00,2.30,6.80,0.50,'Legumes',NULL),(53,'Nabo',28.00,0.90,6.50,0.10,'Legumes',NULL),(54,'Rabanete',16.00,0.70,3.40,0.10,'Legumes',NULL),(55,'Broto de feijão',30.00,3.00,5.90,0.20,'Legumes',NULL),(56,'Aspargo',20.00,2.20,3.60,0.20,'Legumes',NULL),(57,'Jiló',27.00,1.40,6.00,0.10,'Legumes',NULL),(58,'Maxixe',14.00,1.10,2.80,0.10,'Legumes',NULL),(59,'Milho (cozido)',96.00,3.40,21.60,1.50,'Legumes',NULL),(60,'Mandioca (cozida)',112.00,1.20,27.10,0.20,'Legumes',NULL),(61,'Inhame (cozido)',118.00,1.50,27.90,0.20,'Legumes',NULL),(62,'Couve-flor',25.00,2.00,5.20,0.30,'Verduras',NULL),(63,'Acelga',19.00,1.80,3.40,0.20,'Verduras',NULL),(64,'Peito de peru',104.00,21.00,0.00,1.50,'Proteína Animal',NULL),(65,'Bacalhau (fresco)',110.00,24.00,0.00,1.00,'Proteína Animal','Frutos do mar'),(66,'Truta',119.00,20.50,0.00,3.50,'Proteína Animal','Frutos do mar'),(67,'Robalo',92.00,19.40,0.00,1.80,'Proteína Animal','Frutos do mar'),(68,'Coxão mole',157.00,22.00,0.00,7.00,'Proteína Animal',NULL),(69,'Maminha',168.00,28.00,0.00,5.00,'Proteína Animal',NULL),(70,'Acém magro',158.00,21.00,0.00,7.00,'Proteína Animal',NULL),(71,'Ovos de codorna',158.00,13.00,1.20,11.00,'Proteína Animal','Ovo'),(72,'Tempeh',193.00,19.00,9.00,11.00,'Proteína Vegetariana','Soja'),(73,'Soja cozida',127.00,11.00,11.50,4.10,'Proteína Vegetariana','Soja'),(74,'Ovos de codorna',158.00,13.00,1.20,11.00,'Proteína Vegetariana','Ovo'),(75,'Ovos (galinha)',143.00,13.00,1.10,10.00,'Proteína Animal','Ovo'),(76,'Ovos (galinha)',143.00,13.00,1.10,10.00,'Proteína Vegetariana','Ovo');
/*!40000 ALTER TABLE `alimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `avaliacoes`
--

LOCK TABLES `avaliacoes` WRITE;
/*!40000 ALTER TABLE `avaliacoes` DISABLE KEYS */;
INSERT INTO `avaliacoes` VALUES (69,33,83.00,173,22,1.38,'masculino','emagrecimento',3,NULL,NULL,'2025-06-16 18:36:38','2025-06-16 15:36:38','Vegetariana','Ovo,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Nenhuma'),(72,33,83.00,173,22,1.90,'masculino','emagrecimento',3,NULL,NULL,'2025-06-17 14:06:22','2025-06-17 11:06:22','Mediterrânea','Frango,Peru,Ovo,Salmão,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Lactose,Glúten'),(73,33,83.00,173,22,1.90,'masculino','emagrecimento',3,NULL,NULL,'2025-06-17 14:12:00','2025-06-17 11:12:00','Mediterrânea','Frango,Peru,Ovo,Salmão,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Lactose,Glúten'),(74,33,83.00,173,22,1.90,'masculino','emagrecimento',3,NULL,NULL,'2025-06-17 14:24:40','2025-06-17 11:24:40','Mediterrânea','Frango,Peru,Ovo,Salmão,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Lactose,Glúten'),(75,33,83.00,173,22,1.90,'masculino','emagrecimento',3,NULL,NULL,'2025-06-17 14:28:30','2025-06-17 11:28:30','Mediterrânea','Frango,Peru,Ovo,Salmão,Aveia,Arroz Integral,Milho,Ervilha,Brocolis,Alface,Cenoura,Maçã,Banana,Morango,Uva,Mamão','Lactose,Glúten');
/*!40000 ALTER TABLE `avaliacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dietas_geradas`
--

LOCK TABLES `dietas_geradas` WRITE;
/*!40000 ALTER TABLE `dietas_geradas` DISABLE KEYS */;
/*!40000 ALTER TABLE `dietas_geradas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pagamentos`
--

LOCK TABLES `pagamentos` WRITE;
/*!40000 ALTER TABLE `pagamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (17,'Admin','admin@nutrifacil.com','$2y$10$khTSYGmi5ed3Yl50UCZ8QeboedqVtiUIdFlqIE/8q1tCkUXslP5yC',1),(33,'Teste','teste@exemplo.com','$2y$10$/9ItWpxafs9VWTFBrKnRGupVosJHdTYfJRD8eyQxmo/pKEf5/ofvy',0);
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

-- Dump completed on 2025-06-17 11:30:10
