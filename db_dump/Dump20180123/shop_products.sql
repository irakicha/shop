-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: shop
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `car_make_id` int(11) NOT NULL,
  `SKU` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`category_id`,`car_make_id`),
  UNIQUE KEY `SKU_UNIQUE` (`SKU`),
  UNIQUE KEY `title_UNIQUE` (`title`),
  KEY `fk_products_1_idx` (`category_id`),
  KEY `fk_products_2_idx` (`car_make_id`),
  CONSTRAINT `fk_products_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_products_2` FOREIGN KEY (`car_make_id`) REFERENCES `car_make` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,3,1,1,'Peugeot 108','At Peugeot we pride ourselves on innovation. Award-winning PureTech 3-cylinder engine technology is just another example of this. PureTech provides the drive and performance normally associated with bigger engines but with significantly improved fuel consumption.','https://upload.wikimedia.org/wikipedia/commons/a/a3/Peugeot_108.JPG',15000,10,'2018-01-22 12:41:58','2018-01-22 12:41:58'),(3,3,1,2,'Peugeot 208','The Peugeot 208 is a supermini (B-segment in Europe) produced by the French automaker Peugeot, and unveiled at the Geneva Motor Show in March 2012. The first 208 Models were three door hatchbacks produced in 2011, at the companys new plant in Slovakia.','http://bm.img.com.ua/berlin/storage/orig/0/ff/5d68e018ca6fd419314c190bf3d99ff0.jpg	',20000,12,'2018-01-22 12:43:08','2018-01-22 12:43:08'),(4,3,1,3,'Peugeot 308','he Peugeot 308 is a small family car produced by the French car manufacturer Peugeot. It was unveiled on 5 June 2007, and launched in September 2007. Its development code was \"Project T7\", and is the first car of the X08 generation of Peugeot Models.','http://cdn1.3dtuning.com/info/Peugeot%20308%202012%205%20Door%20Hatchback/factory/6.jpg',25000,14,'2018-01-22 12:43:59','2018-01-22 12:43:59'),(5,1,1,4,'Peugeot 508','The Peugeot 508 is a large family car launched in 2011 by French automaker Peugeot, and followed by the 508 SW, an estate version, in March 2011. It replaces the Peugeot 407, as well as the larger Peugeot 607, for which no direct replacement is scheduled.','https://fncdn.blob.core.windows.net/web/1/root/22333.jpg',35000,5,'2018-01-22 12:45:48','2018-01-22 12:45:48'),(6,2,1,5,'Peugeot 2008','The Peugeot 2008 is a Mini sport utility vehicle produced by the French manufacturer Peugeot since 2013. \nThe 2008 replaced the Peugeot 207 SW, as Peugeot did not plan to release an SW version of its 208. \nIt was developed under code name \"A94\"[1] and is based on the PF1 platform, sharing electronic components with Peugeot 208.','http://cdn.motorpage.ru/Photos/300/46B2.jpg',37000,6,'2018-01-22 12:48:14','2018-01-22 12:48:14'),(7,2,2,7,'Suzuki Vitara','The Suzuki Vitara is a compact SUV produced by Suzuki in four generations since 1988. The second and third generation Models were known as the Suzuki Grand Vitara, with the fourth and current series eschewing this prefix. In Japan and a number of other markets, all generations have used the name Suzuki Escudo.','http://cdn.motorpage.ru/Photos/300/528C.jpg',55000,30,'2018-01-22 12:50:19','2018-01-22 12:50:19'),(9,2,2,8,'Suzuki Jimmy','The Suzuki Jimny is a line of small four-wheel drive off-road cars and mini SUVs made by the Japanese automaker Suzuki produced since April 1970. Contents. [hide]. 1 History; 2 HopeStar ON360; 3 First generation (1970–1981).','http://auto.aggress.ru/images/45/Jimny%20Soft%20Top/177020r5mn6u4e5n6uy4eb.jpg',50000,10,'2018-01-22 12:51:25','2018-01-22 12:51:25'),(10,3,3,9,'Citroen C3','The Citroen C3 is a supermini car produced by Citroen since April 2002. It replaced the Citroën Saxo in the model line up, and is currently in its third generation. The third generation model made its appearance in June 2016, and went on sale in January 2017.','http://www.spbauto.org/d/718661/d/02_-_Citroen_C3.jpg',32000,0,'2018-01-22 12:52:25','2018-01-22 12:52:25'),(11,3,3,10,'Citroen C4','The Citroen C4 is a compact car (C-segment in Europe) produced by French automaker Citroen since autumn 2004. It is currently in its second generation. The C4 was designed to be the successor to the Citroen Xsara.','https://www.webuyanycar.com/car-magazine/wp-content/uploads/2017/10/IMG_4541.jpg',42000,40,'2018-01-22 12:53:33','2018-01-22 12:53:33'),(13,3,1,6,'Peugeot 3008','The Peugeot 3008 is a compact crossover unveiled by French automaker Peugeot in May 2008, and presented for the first time to the public in Dubrovnik, Croatia. It was launched in April 2009','https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/2017-03-07_Geneva_Motor_Show_0969.JPG/800px-2017-03-07_Geneva_Motor_Show_0969.JPG',42000,30,'2018-01-22 13:02:22','2018-01-22 13:02:22');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-23 15:13:57
