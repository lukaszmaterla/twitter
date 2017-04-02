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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,59,'ldfksdlfk;sdf','2017-04-02 12:13:56'),(2,1,59,'drugi wpis','2017-04-02 12:14:04'),(3,1,59,'drugi wpis','2017-04-02 12:23:24'),(20,1,59,'vxfd','2017-04-02 12:42:11'),(21,1,61,'assdfsdf','2017-04-02 12:50:14'),(22,1,61,'moja klasa','2017-04-02 12:50:23'),(23,1,61,'moja klasa','2017-04-02 12:50:33'),(24,1,61,'moja klasa','2017-04-02 12:50:49'),(25,1,61,'moja klasa','2017-04-02 12:53:00'),(26,1,61,'komentarz ','2017-04-02 12:53:12'),(27,1,61,'drugi komentarz','2017-04-02 12:53:29'),(28,1,58,'kokok','2017-04-02 12:54:30'),(29,1,55,'moj pierwszy komentarz','2017-04-02 12:59:57'),(30,1,55,'moja nagroda','2017-04-02 13:00:06');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tweets`
--

LOCK TABLES `tweets` WRITE;
/*!40000 ALTER TABLE `tweets` DISABLE KEYS */;
INSERT INTO `tweets` VALUES (1,1,'ale jajajjajajajaja','2017-04-01 19:12:46'),(2,1,'sdfsdfsdfsdf','2017-04-01 19:25:57'),(3,1,'sdfsdfsdfsdfsdf','2017-04-01 19:26:04'),(4,1,'mam tak samo jak ty i mogÄ™ dodaÄ‡ tylko ','2017-04-01 19:26:20'),(5,1,'mam tak samo jak ty i mogÄ™ dodaÄ‡ tylko ','2017-04-01 19:27:19'),(7,1,'Widze wszystkie swoje tweety ale jaja ','2017-04-01 19:27:56'),(8,1,'Widze wszystkie swoje tweety ale jaja ','2017-04-01 19:28:23'),(9,1,'Widze wszystkie swoje tweety ale jaja ','2017-04-01 19:28:35'),(10,1,'ertertertert','2017-04-01 19:28:37'),(11,1,'ole ole moge wysal tweeta','2017-04-01 19:47:57'),(17,1,'ole ole moge wysal tweeta','2017-04-01 20:39:27'),(18,1,'ole ole moge wysal tweeta','2017-04-01 20:40:14'),(19,1,'ole ole moge wysal tweeta','2017-04-01 20:42:07'),(39,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:18:00'),(40,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:21:43'),(41,1,'chcÄ™ zobaczyÄ‡ swÃ³j posta na talicy i nie wiem czy mogÄ™  ','2017-04-01 21:22:37'),(42,1,'ole ole moge wysal tweeta','2017-04-01 21:23:03'),(43,1,'ole ole moge wysal tweeta','2017-04-01 21:23:31'),(44,1,'ole ole moge wysal tweeta','2017-04-01 21:25:30'),(45,1,'ole ole moge wysal tweeta','2017-04-01 21:25:50'),(46,1,'ole ole moge wysal tweeta','2017-04-01 21:26:19'),(47,1,'ole ole moge wysal tweeta','2017-04-01 22:07:29'),(48,1,'ole ole moge wysal tweeta','2017-04-01 22:07:46'),(49,1,'ole ole moge wysal tweeta','2017-04-01 22:10:04'),(50,2,'mosdsddsfsdf','2017-04-01 22:30:09'),(51,2,'dfsdfsdf','2017-04-01 22:30:12'),(52,2,'sdfsdfsdf','2017-04-01 22:30:16'),(53,1,'dfgdgdfgdf','2017-04-01 22:59:31'),(54,2,'Ale fajny Bootstrap ','2017-04-01 23:25:20'),(55,2,'moja strone jest naprawde fajna dla kogoÅ› kto nie miaÅ‚ o tym pojÄ™cia trazy miesiÄ…ce temu ;)','2017-04-01 23:31:02'),(56,2,'78798798798','2017-04-01 23:33:12'),(57,2,'khfdfkjhdflkgjdflgkjfdlg','2017-04-01 23:40:03'),(58,2,'dfgdfgdfg','2017-04-01 23:42:23'),(59,1,'moj tweeet jest genialny ','2017-04-02 10:34:50'),(60,1,'sprawdzam dziaÅ‚anie dodawania wpisu ','2017-04-02 12:43:15'),(61,1,'sprawdzam dziaÅ‚anie dodawania wpisu ','2017-04-02 12:48:15');
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

-- Dump completed on 2017-04-02 15:13:01
