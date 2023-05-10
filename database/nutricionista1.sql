-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: nutricionista1
-- ------------------------------------------------------
-- Server version	8.0.32

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
  `id_alimento` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `calorias` int NOT NULL,
  `vitaminas` varchar(100) NOT NULL,
  `aporte_nutricional` varchar(255) NOT NULL,
  PRIMARY KEY (`id_alimento`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimentos`
--

LOCK TABLES `alimentos` WRITE;
/*!40000 ALTER TABLE `alimentos` DISABLE KEYS */;
INSERT INTO `alimentos` VALUES (1,'Espinaca',23,'A,C,K,E','Ácido fólico, calcio, magnesio, hierro, potasio y sodio'),(2,'Pollo ',150,'B6, B12, D','Proteínas, hierro, zinc, selenio, yodo, magnesio, potasio, fósforo y calcio, Omega-3 y 6'),(3,'Calabacin',17,'A,C,B6,K','Ácido fólico, hierro, magnesio, potasio, fibra y manganeso'),(4,'Lentejas',116,'A,C,E,K,B6','Proteína, ácido fólico, calcio, hierro, magnesio, fósforo, potasio, sodio, zinc y selenio'),(5,'Quinoa',120,'B1,B2,B3,C,K,E','Ácido fólico, calcio, hierro, magnesio, fósforo, potasio, zinc y selenio'),(6,'Zanahoria',41,'A,C,K,E,B6','Folato, magnesio, potasio, calcio, fósforo, hierro, zinc y fibra'),(7,'Aguacate',160,'A,C,K,E,B6','Grasas saludables, fibra dietética, potasio, magnesio, hierro, calcio, zinc, cobre y fósforo'),(8,'Nueces',654,'E,B1,B2,B3,A,C,D','Magnesio, cobre, zinc, hierro, calcio, fósforo, potasio, selenio y ácidos grasos omega-3, antioxidantes'),(9,'Huevos',155,'A,D,E, K, B1,B2,B6,B12','Proteínas, grasas, colesterol, hierro, zinc, fósforo, magnesio, selenio y calcio'),(10,'Tomate',18,'A,C,E,K,B6','Antioxidantes, minerales y nutrientes, como el potasio, el magnesio, el hierro, el fósforo, el zinc y el cobre'),(11,'Arroz Integral',116,'K,E,D,B1','Ácido fólico, hierro, magnesio,Carbohidratos'),(12,'Garbanzos',364,'A,B1,B2,B3,B6','Hierro, magnesio, fósforo, potasio, zinc, cobre y selenio'),(13,'Brocoli',34,'A C,K,B1 B2,B3,B6','Ácido fólico, magnesio, hierro, zinc, fósforo, potasio y manganeso'),(14,'Salmon',209,'A,B6,B12,D,E','Ácido fólico, hierro, magnesio, potasio, selenio, zinc y proteínas'),(15,'Manzana',52,'C,A,K,B6','Ácido fólico, potasio, magnesio, calcio y hierro');
/*!40000 ALTER TABLE `alimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `calcular_edad`
--

DROP TABLE IF EXISTS `calcular_edad`;
/*!50001 DROP VIEW IF EXISTS `calcular_edad`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `calcular_edad` AS SELECT 
 1 AS `EDAD`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `caloriastotales`
--

DROP TABLE IF EXISTS `caloriastotales`;
/*!50001 DROP VIEW IF EXISTS `caloriastotales`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `caloriastotales` AS SELECT 
 1 AS `CaloriasTotales`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `dia`
--

DROP TABLE IF EXISTS `dia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dia` (
  `id_dia` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`id_dia`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dia`
--

LOCK TABLES `dia` WRITE;
/*!40000 ALTER TABLE `dia` DISABLE KEYS */;
INSERT INTO `dia` VALUES (7,'Domingo'),(4,'Jueves'),(1,'Lunes'),(2,'Martes'),(3,'Miercoles'),(6,'Sabado'),(5,'Viernes');
/*!40000 ALTER TABLE `dia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `dieta`
--

DROP TABLE IF EXISTS `dieta`;
/*!50001 DROP VIEW IF EXISTS `dieta`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `dieta` AS SELECT 
 1 AS `FECHA`,
 1 AS `DIA`,
 1 AS `TIPO`,
 1 AS `ALIMENTO`,
 1 AS `VITAMINAS`,
 1 AS `NUTRIENTES`,
 1 AS `GRAMOS`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `dietas`
--

DROP TABLE IF EXISTS `dietas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dietas` (
  `id_dieta` int NOT NULL,
  `dia_id` int NOT NULL,
  `id_tipo` int NOT NULL,
  `id_alimento` int NOT NULL,
  `gramos` int NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_dieta`,`dia_id`,`id_tipo`,`id_alimento`),
  KEY `dietas_dia_id_dia_id_dia` (`dia_id`),
  KEY `dietas_id_tipo_tipo_comida_id_tipo` (`id_tipo`),
  KEY `dietas_id_alimento_alimentos_id_alimento` (`id_alimento`),
  CONSTRAINT `dietas_dia_id_dia_id_dia` FOREIGN KEY (`dia_id`) REFERENCES `dia` (`id_dia`),
  CONSTRAINT `dietas_id_alimento_alimentos_id_alimento` FOREIGN KEY (`id_alimento`) REFERENCES `alimentos` (`id_alimento`),
  CONSTRAINT `dietas_id_dieta_pacientes_dni` FOREIGN KEY (`id_dieta`) REFERENCES `pacientes` (`dni`),
  CONSTRAINT `dietas_id_tipo_tipo_comida_id_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_comida` (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dietas`
--

LOCK TABLES `dietas` WRITE;
/*!40000 ALTER TABLE `dietas` DISABLE KEYS */;
INSERT INTO `dietas` VALUES (4997857,1,1,1,75,'2023-05-09 20:59:08'),(4997857,1,1,9,50,'2023-05-09 20:59:08'),(4997857,1,2,2,100,'2023-05-09 20:59:08'),(4997857,1,2,11,200,'2023-05-09 20:59:08'),(4997857,1,3,3,60,'2023-05-09 20:59:08'),(4997857,1,3,15,14,'2023-05-09 20:59:08'),(10574649,1,1,2,18,'2023-05-07 11:16:19'),(10574649,1,1,7,10,'2023-05-07 11:16:19'),(10574649,1,2,5,26,'2023-05-07 11:16:19'),(10574649,1,2,14,34,'2023-05-07 11:16:19'),(10574649,1,3,6,17,'2023-05-07 11:16:19'),(10574649,1,3,15,26,'2023-05-07 11:16:19'),(10574649,2,1,7,15,NULL),(10574649,2,1,10,31,NULL),(10574649,2,2,5,80,NULL),(10574649,2,2,13,60,NULL),(10574649,2,3,14,50,NULL),(10574649,2,3,15,74,NULL),(10574649,3,1,4,28,NULL),(10574649,3,1,5,23,NULL),(10574649,3,2,10,23,NULL),(10574649,3,2,15,19,NULL),(10574649,3,3,7,24,NULL),(10574649,3,3,11,31,NULL),(10574649,4,1,1,10,NULL),(10574649,4,1,5,11,NULL),(10574649,4,2,4,17,NULL),(10574649,4,2,10,17,NULL),(10574649,4,3,8,24,NULL),(10574649,4,3,14,25,NULL),(10574649,5,1,8,20,'2023-05-06 13:39:54'),(10574649,5,1,13,24,'2023-05-06 13:39:54'),(10574649,5,2,5,27,'2023-05-06 13:39:54'),(10574649,5,2,6,38,'2023-05-06 13:39:54'),(10574649,5,3,3,34,'2023-05-06 13:39:54'),(10574649,5,3,14,35,'2023-05-06 13:39:54'),(10574649,6,1,7,31,'2023-05-06 14:07:34'),(10574649,6,1,13,41,'2023-05-06 14:07:34'),(10574649,6,2,11,150,'2023-05-06 14:07:34'),(10574649,6,2,14,83,'2023-05-06 14:07:34'),(10574649,6,3,9,39,'2023-05-06 14:07:34'),(10574649,6,3,10,62,'2023-05-06 14:07:34'),(10574649,7,1,2,17,'2023-05-06 14:12:14'),(10574649,7,1,7,10,'2023-05-06 14:12:14'),(10574649,7,2,1,10,'2023-05-06 14:12:14'),(10574649,7,2,3,10,'2023-05-06 14:12:14'),(10574649,7,3,7,13,'2023-05-06 14:12:14'),(10574649,7,3,10,16,'2023-05-06 14:12:14'),(13326937,1,1,1,33,NULL),(13326937,1,1,9,27,NULL),(13326937,1,2,9,39,NULL),(13326937,1,2,13,98,NULL),(13326937,1,3,7,150,NULL),(13326937,1,3,8,45,NULL),(13326937,2,1,6,17,'2023-05-06 14:14:24'),(13326937,2,1,12,19,'2023-05-06 14:14:24'),(13326937,2,2,5,20,'2023-05-06 14:14:24'),(13326937,2,2,13,24,'2023-05-06 14:14:24'),(13326937,2,3,4,16,'2023-05-06 14:14:24'),(13326937,2,3,10,20,'2023-05-06 14:14:24'),(13326937,3,1,3,14,'2023-05-07 09:30:25'),(13326937,3,1,8,10,'2023-05-07 09:30:25'),(13326937,3,2,5,15,'2023-05-07 09:30:25'),(13326937,3,2,8,20,'2023-05-07 09:30:25'),(13326937,3,3,3,18,'2023-05-07 09:30:25'),(13326937,3,3,12,16,'2023-05-07 09:30:25');
/*!40000 ALTER TABLE `dietas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfermedad_paciente`
--

DROP TABLE IF EXISTS `enfermedad_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enfermedad_paciente` (
  `id_paciente` int NOT NULL,
  `id_enfermedad` int NOT NULL,
  PRIMARY KEY (`id_paciente`,`id_enfermedad`),
  KEY `enfermedad_paciente_id_enfermedad_enfermedades_id_enfermedad` (`id_enfermedad`),
  CONSTRAINT `enfermedad_paciente_id_enfermedad_enfermedades_id_enfermedad` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedades` (`id_enfermedad`),
  CONSTRAINT `enfermedad_paciente_id_paciente_pacientes_dni` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfermedad_paciente`
--

LOCK TABLES `enfermedad_paciente` WRITE;
/*!40000 ALTER TABLE `enfermedad_paciente` DISABLE KEYS */;
INSERT INTO `enfermedad_paciente` VALUES (4997857,1),(13326937,1),(27838471,1),(27838471,2),(10574649,5);
/*!40000 ALTER TABLE `enfermedad_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfermedades`
--

DROP TABLE IF EXISTS `enfermedades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enfermedades` (
  `id_enfermedad` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_enfermedad`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfermedades`
--

LOCK TABLES `enfermedades` WRITE;
/*!40000 ALTER TABLE `enfermedades` DISABLE KEYS */;
INSERT INTO `enfermedades` VALUES (1,'Diabetes'),(2,'Obesidad'),(3,'Anemia'),(4,'Bulimia'),(5,'Aterosclerosis'),(6,'Celiaquía'),(7,'Anorexia'),(8,'Osteoporosis'),(9,'Cáncer'),(10,'Hipertensión arterial'),(11,'Hipercolesterolemia');
/*!40000 ALTER TABLE `enfermedades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pacientes` (
  `dni` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `fecha_nac` date NOT NULL,
  `peso` smallint NOT NULL,
  `altura` int NOT NULL,
  `masa_muscular` int NOT NULL,
  `actividad_fisica` varchar(45) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (4997857,'Carmencita','Flores','1986-05-02',77,168,24,'Ciclismo'),(10574649,'Miguel','Bustamante','1977-02-07',95,185,30,'Futbol'),(13326937,'Yasmin','Acosta','1979-11-08',80,180,35,'Ciclismo'),(20805876,'Albany','Bustamante','1994-12-19',81,180,37,'Bailoterapia'),(27838471,'Gustavo','Bustamante','2000-07-06',62,170,50,'Correr');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_comida`
--

DROP TABLE IF EXISTS `tipo_comida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_comida` (
  `id_tipo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_comida`
--

LOCK TABLES `tipo_comida` WRITE;
/*!40000 ALTER TABLE `tipo_comida` DISABLE KEYS */;
INSERT INTO `tipo_comida` VALUES (1,'Desayuno'),(2,'Almuerzo'),(3,'Cena');
/*!40000 ALTER TABLE `tipo_comida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `verenfermedades`
--

DROP TABLE IF EXISTS `verenfermedades`;
/*!50001 DROP VIEW IF EXISTS `verenfermedades`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `verenfermedades` AS SELECT 
 1 AS `nombre`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `calcular_edad`
--

/*!50001 DROP VIEW IF EXISTS `calcular_edad`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `calcular_edad` AS select timestampdiff(YEAR,`pacientes`.`fecha_nac`,curdate()) AS `EDAD` from `pacientes` where (`pacientes`.`dni` = 27838471) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `caloriastotales`
--

/*!50001 DROP VIEW IF EXISTS `caloriastotales`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `caloriastotales` AS select sum(((`alimentos`.`calorias` * `dietas`.`gramos`) / 100)) AS `CaloriasTotales` from ((((`dietas` join `pacientes` on((`dietas`.`id_dieta` = `pacientes`.`dni`))) join `dia` on((`dia`.`id_dia` = `dietas`.`dia_id`))) join `tipo_comida` on((`dietas`.`id_tipo` = `tipo_comida`.`id_tipo`))) join `alimentos` on((`dietas`.`id_alimento` = `alimentos`.`id_alimento`))) where ((`dia`.`nombre` = 'Lunes') and (`pacientes`.`dni` = 10574649)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `dieta`
--

/*!50001 DROP VIEW IF EXISTS `dieta`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `dieta` AS select `dietas`.`fecha` AS `FECHA`,`dia`.`nombre` AS `DIA`,`tipo_comida`.`nombre` AS `TIPO`,`alimentos`.`nombre` AS `ALIMENTO`,`alimentos`.`vitaminas` AS `VITAMINAS`,`alimentos`.`aporte_nutricional` AS `NUTRIENTES`,`dietas`.`gramos` AS `GRAMOS` from ((((`dietas` join `pacientes` on((`dietas`.`id_dieta` = `pacientes`.`dni`))) join `dia` on((`dia`.`id_dia` = `dietas`.`dia_id`))) join `tipo_comida` on((`dietas`.`id_tipo` = `tipo_comida`.`id_tipo`))) join `alimentos` on((`dietas`.`id_alimento` = `alimentos`.`id_alimento`))) where ((`dia`.`nombre` = 'Viernes') and (`pacientes`.`dni` = 10574649)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `verenfermedades`
--

/*!50001 DROP VIEW IF EXISTS `verenfermedades`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `verenfermedades` AS select `enfermedades`.`nombre` AS `nombre` from (`enfermedades` join `enfermedad_paciente` on((`enfermedad_paciente`.`id_enfermedad` = `enfermedades`.`id_enfermedad`))) where (`enfermedad_paciente`.`id_paciente` = 27838471) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-09 22:15:07
