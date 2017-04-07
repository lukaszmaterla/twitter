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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `text` varchar(61) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `postId` (`postId`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`postId`) REFERENCES `tweets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,59,'ldfksdlfk;sdf','2017-04-02 12:13:56'),(2,1,59,'drugi wpis','2017-04-02 12:14:04'),(3,1,59,'drugi wpis','2017-04-02 12:23:24'),(20,1,59,'vxfd','2017-04-02 12:42:11'),(21,1,61,'assdfsdf','2017-04-02 12:50:14'),(22,1,61,'moja klasa','2017-04-02 12:50:23'),(23,1,61,'moja klasa','2017-04-02 12:50:33'),(24,1,61,'moja klasa','2017-04-02 12:50:49'),(25,1,61,'moja klasa','2017-04-02 12:53:00'),(26,1,61,'komentarz ','2017-04-02 12:53:12'),(27,1,61,'drugi komentarz','2017-04-02 12:53:29'),(28,1,58,'kokok','2017-04-02 12:54:30'),(29,1,55,'moj pierwszy komentarz','2017-04-02 12:59:57'),(30,1,55,'moja nagroda','2017-04-02 13:00:06'),(31,2,61,'dodam sobie komentarz','2017-04-02 14:35:46'),(32,2,53,'Aprqwdzam czy to teÅ¼ dziaÅ‚a ','2017-04-02 14:36:51'),(33,2,41,'moj pierwszy komentarz','2017-04-02 18:18:16');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senderId` int(11) NOT NULL,
  `receiverId` int(11) NOT NULL,
  `textMessage` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `messages_ibfk_1` (`senderId`),
  KEY `messages_ibfk_2` (`receiverId`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`senderId`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiverId`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,2,'Hej to moja pierwsza wiadomoÅ›Ä‡ ',1,'2017-04-02 18:05:27'),(2,1,2,'Hej to moja pierwsza wiadomoÅ›Ä‡ ',1,'2017-04-02 18:06:16'),(3,1,2,'Hej to moja pierwsza wiadomoÅ›Ä‡ ',1,'2017-04-02 18:08:34'),(4,1,2,'Hej to moja pierwsza wiadomoÅ›Ä‡ ',1,'2017-04-02 18:08:38'),(5,1,2,'Hej to moja pierwsza wiadomoÅ›Ä‡ ',1,'2017-04-02 18:09:05'),(6,1,2,'osdfsdfjdshfksjdfhskdfsdf',1,'2017-04-02 18:09:16'),(7,1,2,'moj komentarz',1,'2017-04-02 18:11:56'),(8,1,2,'to jest kolejna wiadomoÅ›Ä‡ do janka',1,'2017-04-02 18:12:22'),(9,2,1,'to moja wiadomosÄ‡ do janka ',1,'2017-04-02 18:15:03'),(10,2,1,'to moja wiadomosÄ‡ do janka ',1,'2017-04-02 18:15:23'),(11,2,1,'wiadomoÅ›Ä‡ do janka ',1,'2017-04-02 18:16:14'),(12,2,1,'wiadomoÅ›Ä‡ do janka ',1,'2017-04-02 18:16:20'),(13,2,1,'wiadomosc 3 ',1,'2017-04-02 18:16:34'),(14,2,1,'moje wpisy ',1,'2017-04-02 19:29:26'),(15,2,1,'ole ole',1,'2017-04-02 20:08:58'),(16,1,2,'czeÅ›Ä‡ ta wiadomoÅ›Ä‡ jest od Janka dla sprawdzenia ',1,'2017-04-02 20:27:13'),(17,2,1,'CzeÅ›Ä‡ janek jak siÄ™ masz  ? ',1,'2017-04-02 20:39:59'),(19,5,2,'hej luki jak siÄ™ masz ? ',1,'2017-04-02 22:09:51'),(20,5,2,'hej luki co sÅ‚ychaÄ‡ ',1,'2017-04-02 22:25:07'),(21,1,5,'Hej MichaÅ‚ jak siÄ™ masz ? ',1,'2017-04-02 22:54:31'),(22,5,1,'Hello my brother? how are you ?',1,'2017-04-03 13:49:28'),(23,5,2,'hello, how are you ?',1,'2017-04-03 13:51:07'),(24,5,2,'hello, how are you ?',NULL,'2017-04-03 13:51:29'),(25,2,1,'2121312312',1,'2017-04-03 17:05:20');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tweets`
--

LOCK TABLES `tweets` WRITE;
/*!40000 ALTER TABLE `tweets` DISABLE KEYS */;
INSERT INTO `tweets` VALUES (1,1,'ale jajajjajajajaja','2017-04-01 19:12:46'),(2,1,'sdfsdfsdfsdf','2017-04-01 19:25:57'),(3,1,'sdfsdfsdfsdfsdf','2017-04-01 19:26:04'),(4,1,'mam tak samo jak ty i mogÄ™ dodaÄ‡ tylko ','2017-04-01 19:26:20'),(5,1,'mam tak samo jak ty i mogÄ™ dodaÄ‡ tylko ','2017-04-01 19:27:19'),(7,1,'Widze wszystkie swoje tweety ale jaja ','2017-04-01 19:27:56'),(8,1,'Widze wszystkie swoje tweety ale jaja ','2017-04-01 19:28:23'),(9,1,'Widze wszystkie swoje tweety ale jaja ','2017-04-01 19:28:35'),(10,1,'ertertertert','2017-04-01 19:28:37'),(11,1,'ole ole moge wysal tweeta','2017-04-01 19:47:57'),(17,1,'ole ole moge wysal tweeta','2017-04-01 20:39:27'),(18,1,'ole ole moge wysal tweeta','2017-04-01 20:40:14'),(19,1,'ole ole moge wysal tweeta','2017-04-01 20:42:07'),(39,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:18:00'),(40,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:21:43'),(41,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:22:37'),(42,1,'ole ole moge wysal tweeta','2017-04-01 21:23:03'),(43,1,'ole ole moge wysal tweeta','2017-04-01 21:23:31'),(44,1,'ole ole moge wysal tweeta','2017-04-01 21:25:30'),(45,1,'ole ole moge wysal tweeta','2017-04-01 21:25:50'),(46,1,'ole ole moge wysal tweeta','2017-04-01 21:26:19'),(47,1,'ole ole moge wysal tweeta','2017-04-01 22:07:29'),(48,1,'ole ole moge wysal tweeta','2017-04-01 22:07:46'),(49,1,'ole ole moge wysal tweeta','2017-04-01 22:10:04'),(50,2,'mosdsddsfsdf','2017-04-01 22:30:09'),(51,2,'dfsdfsdf','2017-04-01 22:30:12'),(52,2,'sdfsdfsdf','2017-04-01 22:30:16'),(53,1,'dfgdgdfgdf','2017-04-01 22:59:31'),(54,2,'Ale fajny Bootstrap ','2017-04-01 23:25:20'),(55,2,'moja strone jest naprawde fajna dla kogoÅ› kto nie miaÅ‚ o tym pojÄ™cia trazy miesiÄ…ce temu ;)','2017-04-01 23:31:02'),(56,2,'78798798798','2017-04-01 23:33:12'),(57,2,'khfdfkjhdflkgjdflgkjfdlg','2017-04-01 23:40:03'),(58,2,'dfgdfgdfg','2017-04-01 23:42:23'),(59,1,'moj tweeet jest genialny ','2017-04-02 10:34:50'),(60,1,'sprawdzam dziaÅ‚anie dodawania wpisu ','2017-04-02 12:43:15'),(61,1,'sprawdzam dziaÅ‚anie dodawania wpisu ','2017-04-02 12:48:15'),(62,2,'mam tak samo jak ty','2017-04-02 14:35:35'),(63,2,'maja tutaj fajny opis','2017-04-02 19:05:17'),(64,2,'maja tutaj fajny opis','2017-04-02 19:05:27'),(71,5,'witajcie panowie','2017-04-02 22:09:04'),(72,5,'mowie ci jak super','2017-04-02 22:09:13'),(73,5,'mowie ci jak super','2017-04-02 22:09:22'),(74,1,'moj tweet po przerwie','2017-04-02 22:49:43'),(75,1,'moj tweet po przerwie','2017-04-02 22:50:26'),(76,1,'moj tweet po przerwie','2017-04-02 22:50:42'),(77,1,'moj tweet po przerwie','2017-04-02 22:51:00'),(78,1,'dfsdfdsf','2017-04-03 00:20:04'),(79,1,'dfsdfdsf','2017-04-03 00:20:16'),(80,1,'dfsdfdsf','2017-04-03 00:20:47'),(81,1,'Hej sokoÅ‚y ','2017-04-03 00:27:34'),(82,1,'Hej sokoÅ‚y ','2017-04-03 00:29:20'),(83,1,'dsfdddddddddddddddffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff','2017-04-03 00:29:39'),(84,2,'sdasfdsdfs','2017-04-03 09:38:32'),(85,1,'dfdfsdf','2017-04-03 13:30:05'),(86,1,'Hej co tam sÅ‚ychac? ','2017-04-03 16:23:15'),(87,1,'sdfsdfdsfds','2017-04-07 16:15:15');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'janeczek','jan@onet.pl','827ccb0eea8a706c4c34a16891f84e7b'),(2,'luki','luki1@onet.pl','202cb962ac59075b964b07152d234b70'),(5,'michal','michal@wp.pl','827ccb0eea8a706c4c34a16891f84e7b');
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

-- Dump completed on 2017-04-07 18:16:51
