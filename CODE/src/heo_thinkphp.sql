-- MySQL dump 10.14  Distrib 5.5.33a-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: thinkphp
-- ------------------------------------------------------
-- Server version	5.5.33a-MariaDB

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
-- Table structure for table `think_feedback`
--

DROP TABLE IF EXISTS `think_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_feedback` (
  `uid` int(8) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `feedbackcreatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_feedback`
--

LOCK TABLES `think_feedback` WRITE;
/*!40000 ALTER TABLE `think_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `think_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_message`
--

DROP TABLE IF EXISTS `think_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_message` (
  `mid` int(8) NOT NULL AUTO_INCREMENT,
  `msid` int(8) DEFAULT NULL,
  `mrid` int(8) DEFAULT NULL,
  `mtid` int(8) DEFAULT NULL,
  `mtype` varchar(8) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `messagecreatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_message`
--

LOCK TABLES `think_message` WRITE;
/*!40000 ALTER TABLE `think_message` DISABLE KEYS */;
INSERT INTO `think_message` VALUES (31,27,26,-1,'1001','我已经完成了你的任务，请查收','2014-01-15 14:34:41'),(33,21,26,-1,'1001','我已经完成了你的任务，请查收','2014-01-15 14:51:07'),(34,26,21,-1,'1001','谢谢','2014-01-15 14:52:00'),(35,21,26,-1,'1001','我已经完成了你的任务，请查收','2014-01-15 15:00:29'),(36,21,26,-1,'1001','我已经完成了你的任务，请查收','2014-01-15 15:12:27'),(37,26,21,-1,'1000','谢谢','2014-01-15 15:13:18');
/*!40000 ALTER TABLE `think_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_prosecute`
--

DROP TABLE IF EXISTS `think_prosecute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_prosecute` (
  `proid` int(8) NOT NULL AUTO_INCREMENT,
  `prosid` int(8) DEFAULT NULL,
  `prorid` int(8) DEFAULT NULL,
  `protid` int(8) DEFAULT NULL,
  `proreason` varchar(255) DEFAULT NULL,
  `procreatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`proid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_prosecute`
--

LOCK TABLES `think_prosecute` WRITE;
/*!40000 ALTER TABLE `think_prosecute` DISABLE KEYS */;
/*!40000 ALTER TABLE `think_prosecute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_submiss`
--

DROP TABLE IF EXISTS `think_submiss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_submiss` (
  `subid` int(8) NOT NULL AUTO_INCREMENT,
  `subuid` int(8) DEFAULT NULL,
  `subcontent` text,
  `subcreatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_submiss`
--

LOCK TABLES `think_submiss` WRITE;
/*!40000 ALTER TABLE `think_submiss` DISABLE KEYS */;
INSERT INTO `think_submiss` VALUES (5,26,'今天小明扶老奶奶过马路','2014-01-15 14:28:57');
/*!40000 ALTER TABLE `think_submiss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_task_info`
--

DROP TABLE IF EXISTS `think_task_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_task_info` (
  `tid` int(8) NOT NULL AUTO_INCREMENT,
  `pid` int(8) NOT NULL,
  `rid` int(8) DEFAULT '-1',
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `rgender` char(1) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'NewPose',
  `taskgpp` int(8) DEFAULT NULL,
  `taskcreatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `availabletime` datetime DEFAULT NULL,
  `accomplishtime` datetime DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_task_info`
--

LOCK TABLES `think_task_info` WRITE;
/*!40000 ALTER TABLE `think_task_info` DISABLE KEYS */;
INSERT INTO `think_task_info` VALUES (60,23,-1,'General','测试','哈哈','m','','NewPose',0,'2014-01-15 13:05:10','2014-01-15 22:22:22','2014-01-16 11:11:11'),(61,24,26,'Fetch the express','中午有人方便帮忙拿下快递吗？','因为中午要上课，所以不能回宿舍区。但是现在有一个快递要在1:30前取，快递是申通的。请问有哪位同学可以帮忙取一下么？','m','无','Received',10,'2014-01-15 13:44:14','2014-01-16 13:30:00','2014-01-16 14:00:00'),(62,26,29,'Fetch the express','求师兄帮我拿快递','我中午有事，快递13:00 走，求师兄帮忙给我拿下啦。。。','m','我是师妹哦。。','Received',10,'2014-01-15 13:49:05','2014-01-16 12:00:00','2014-01-16 13:00:00'),(63,28,29,'General','有哪位同学可以帮忙补习一下数据结构么？','还有一周不到就要期末考了T T有哪位好心同学可以帮忙补习一下数据结构的知识点么？周六下午三点在新活~','f','','Received',10,'2014-01-15 13:49:55','2014-01-17 08:30:00','2014-01-17 18:00:00'),(64,26,29,'Pack a meal','大三老师姐求打包','今天中午比较忙，没时间去饭堂，求好心的师弟师妹打包送到慎思园6号','m','我还是单身!!','Received',10,'2014-01-15 13:51:20','2014-01-16 11:00:00','2014-01-16 13:00:00'),(65,28,25,'General','有人可以帮忙在寒假照顾一下宠物仓鼠么？','爱宠DD寒假在宿舍无人照料:(有哪位同学寒假不回家可以帮忙照料一下么？如果可以的话请私信我~','f','可以请吃饭哦~','Received',10,'2014-01-15 13:53:30','2014-01-22 12:22:00','2014-02-22 12:00:00'),(66,29,-1,'General','求帮忙取回落在公交的伞T T','今天上午在公教楼上课的时候，不小心将伞落在了倒数第三排的位置T T有哪位同学可以顺便帮忙拿回来么？感激不尽','m','','NewPose',10,'2014-01-15 13:59:24','2014-01-16 13:20:00','2014-01-16 16:55:00'),(67,29,-1,'General','有人想去看2月11号孙燕姿的演唱会么？','本人想去看演唱会，但是现在还没有找到一起去的伴，有同学想一起去看么？','m','','NewPose',0,'2014-01-15 14:02:10','2014-02-11 09:00:00','2014-02-11 15:00:00'),(68,26,21,'General','求带伞来解救','我被困在公教','f','我会请你饭的','Accomplished',0,'2014-01-15 14:10:16','2014-01-16 12:12:12','2014-01-16 13:13:13'),(69,26,21,'General','数值计算方法求指导','我不会数值计算中的牛顿插值公式，求好心人来帮助一下','m','','Received',0,'2014-01-15 14:26:36','2014-01-17 00:00:00','2014-01-18 23:59:59'),(70,21,-1,'General','希望好心人帮我解答程序设计的问题','我遇到很多C++的题目不懂','m','','NewPose',0,'2014-01-15 14:49:25','2014-01-16 10:00:00','2014-01-17 10:00:00'),(71,21,-1,'Fetch the express','求好心人帮我取快递','我的手机号码是13512345678','m','','NewPose',0,'2014-01-15 14:58:36','2014-01-16 12:12:12','2014-01-17 12:12:12'),(72,26,21,'General','Linux不懂呀，求指导','Linux要考试了，但是我还是不懂，求指导呀','m','','Accomplished',0,'2014-01-15 15:06:08','2014-01-16 10:00:00','2014-01-16 11:11:11'),(73,21,-1,'General','线性代数求指导','最近线性代数要考试了，我还有很多不懂','m','','NewPose',10,'2014-01-15 15:09:19','2014-01-17 10:00:00','2014-01-18 12:12:12');
/*!40000 ALTER TABLE `think_task_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_user_info`
--

DROP TABLE IF EXISTS `think_user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_user_info` (
  `uid` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gpp` int(8) NOT NULL DEFAULT '20',
  `area` varchar(255) NOT NULL,
  `usercreatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_user_info`
--

LOCK TABLES `think_user_info` WRITE;
/*!40000 ALTER TABLE `think_user_info` DISABLE KEYS */;
INSERT INTO `think_user_info` VALUES (20,'pengtt','pengtt','f','401813939@qq.com',20,'East Campus','2014-01-12 03:18:59'),(21,'陈炳炜','zzz','m','1085469299@qq.com',20,'South Campus','2014-01-12 03:25:29'),(-1,'system','system','s','system',0,'system','2014-01-12 04:03:38'),(22,'小明','zzz','m','xiaoming@gmail.com',20,'East Campus','2014-01-12 06:15:12'),(23,'chenbingwei','zzz','m','1085469299@qq.com',20,'East Campus','2014-01-15 09:00:39'),(24,'夏洛克','11223344','m','934164022@qq.com',20,'East Campus','2014-01-15 13:39:58'),(25,'彭婷婷','84445158','f','401813939@qq.com',20,'East Campus','2014-01-15 13:40:02'),(26,'程阳','123','m','1831548428@qq.com',40,'East Campus','2014-01-15 13:45:32'),(27,'林俊浩','123','m','243478845@qq.com',20,'East Campus','2014-01-15 13:46:14'),(28,'庄杉','11223344','f','zshan1993@gmail.com',20,'East Campus','2014-01-15 13:46:17'),(29,'林楚文','11223344','f','4967823461@qq.com',20,'East Campus','2014-01-15 13:55:40');
/*!40000 ALTER TABLE `think_user_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-15 23:49:00
