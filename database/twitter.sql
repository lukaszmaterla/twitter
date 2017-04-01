-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: twitter
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
-- Table structure for table `tweets`
--

DROP TABLE IF EXISTS `tweets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tweets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `text` varchar(140) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  CONSTRAINT `tweets_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tweets`
--

LOCK TABLES `tweets` WRITE;
/*!40000 ALTER TABLE `tweets` DISABLE KEYS */;
INSERT INTO `tweets` VALUES (1,1,'ale jajajjajajajaja','2017-04-01 19:12:46'),(2,1,'sdfsdfsdfsdf','2017-04-01 19:25:57'),(3,1,'sdfsdfsdfsdfsdf','2017-04-01 19:26:04'),(4,1,'mam tak samo jak ty i mogÄ™ dodaÄ‡ tylko ','2017-04-01 19:26:20'),(5,1,'mam tak samo jak ty i mogÄ™ dodaÄ‡ tylko ','2017-04-01 19:27:19'),(6,1,'sdddddddddddddddddddddddddddddddddddddddddddddddddddddddfsdfsssssssssdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd','2017-04-01 19:27:30'),(7,1,'Widze wszystkie swoje tweety ale jaja ','2017-04-01 19:27:56'),(8,1,'Widze wszystkie swoje tweety ale jaja ','2017-04-01 19:28:23'),(9,1,'Widze wszystkie swoje tweety ale jaja ','2017-04-01 19:28:35'),(10,1,'ertertertert','2017-04-01 19:28:37'),(11,1,'ole ole moge wysal tweeta','2017-04-01 19:47:57'),(12,1,'ole ole moge wysal tweeta','2017-04-01 20:24:43'),(13,1,'ole ole moge wysal tweeta','2017-04-01 20:25:49'),(14,1,'ole ole moge wysal tweeta','2017-04-01 20:26:54'),(15,1,'ole ole moge wysal tweeta','2017-04-01 20:31:52'),(16,1,'ole ole moge wysal tweeta','2017-04-01 20:37:45'),(17,1,'ole ole moge wysal tweeta','2017-04-01 20:39:27'),(18,1,'ole ole moge wysal tweeta','2017-04-01 20:40:14'),(19,1,'ole ole moge wysal tweeta','2017-04-01 20:42:07'),(20,1,'ole ole moge wysal tweeta','2017-04-01 20:43:05'),(21,1,'ole ole moge wysal tweeta','2017-04-01 20:43:39'),(22,1,'ole ole moge wysal tweeta','2017-04-01 20:44:39'),(23,1,'ole ole moge wysal tweeta','2017-04-01 20:46:04'),(24,1,'ole ole moge wysal tweeta','2017-04-01 20:48:03'),(25,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 20:48:30'),(26,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 20:50:32'),(27,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 20:51:07'),(28,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 20:51:29'),(29,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 20:51:39'),(30,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 20:51:57'),(31,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 20:53:03'),(32,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:02:28'),(33,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:04:03'),(34,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:05:22'),(35,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:08:52'),(36,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:09:04'),(37,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:09:27'),(38,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:17:45'),(39,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:18:00'),(40,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:21:43'),(41,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:22:37'),(42,1,'ole ole moge wysal tweeta','2017-04-01 21:23:03'),(43,1,'ole ole moge wysal tweeta','2017-04-01 21:23:31'),(44,1,'ole ole moge wysal tweeta','2017-04-01 21:25:30'),(45,1,'ole ole moge wysal tweeta','2017-04-01 21:25:50'),(46,1,'ole ole moge wysal tweeta','2017-04-01 21:26:19'),(47,1,'ole ole moge wysal tweeta','2017-04-01 22:07:29'),(48,1,'ole ole moge wysal tweeta','2017-04-01 22:07:46'),(49,1,'ole ole moge wysal tweeta','2017-04-01 22:10:04'),(50,2,'mosdsddsfsdf','2017-04-01 22:30:09'),(51,2,'dfsdfsdf','2017-04-01 22:30:12'),(52,2,'sdfsdfsdf','2017-04-01 22:30:16'),(53,1,'dfgdgdfgdf','2017-04-01 22:59:31');
/*!40000 ALTER TABLE `tweets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `passwordHash` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jan','jan@onet.pl','827ccb0eea8a706c4c34a16891f84e7b'),(2,'luki','luki1@onet.pl','202cb962ac59075b964b07152d234b70');
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

-- Dump completed on 2017-04-02  1:22:01
