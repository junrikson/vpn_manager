-- MySQL dump 10.11
--
-- Host: localhost    Database: secure_login
-- ------------------------------------------------------
-- Server version	5.0.95

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL,
  `password` char(128) NOT NULL default 'Kosong',
  `member_id` varchar(11) NOT NULL default '0',
  `expired` date default NULL,
  `hwid` char(128) NOT NULL default 'Kosong',
  `details` varchar(100) NOT NULL default 'Kosong',
  `status` varchar(10) NOT NULL default 'N',
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (4,'abi','burung','20','2014-01-26','Kosong','Via Wong Dewek','E','2014-01-25 12:20:21'),(5,'raisyah','rais','10','2014-02-03','Kosong','Via Yori','Y','2014-01-25 12:20:21'),(6,'masterkis','indonesia','34','2014-02-04','eca46efded55527e4c357e846088384e9434c60a986682cc6b9d509e83acd8b2','Via BCA','Y','2014-01-25 12:20:21'),(7,'fandy','kingkobra','45','2014-02-03','c4eb37d599699698f356223430cef95d649addcf14241f27d602822ca813e7c1','Via BNI','Y','2014-01-25 12:20:21'),(8,'uhablues','uhablues','2','2014-02-12','f42cdf8e4cf18526266f8acdcf85fadd23baa4a662b21b1580129365e8fc37f2','Via BBM','Y','2014-01-25 12:20:21'),(9,'lin_skie','skie','2','2014-02-09','Kosong','Via Diski','Y','2014-01-25 12:20:21'),(10,'herly','herly','10','2014-02-13','83f7bc34b8a46fe65b5bbfa21df868640fbc4e496d90e44ef1a9d33641af0c73','Via Yori','Y','2014-01-25 12:20:21'),(11,'kemas','kemas','2','2014-05-09','Kosong','Via BBM','Y','2014-01-25 12:20:21'),(12,'rio2','vanila','2','2014-02-06','Kosong','Via BBM','Y','2014-01-25 12:20:21'),(13,'diazz','herly','2','2014-02-13','f42cdf8e4cf18526266f8acdcf85fadde722eee6cb1f3476e45da63e90ad0726d09db40a6e69e966a1899e61b8e7a846e786c7a6edf385df59b6fdf570d28bd6','Via BBM','Y','2014-01-25 12:20:21'),(15,'freddy','asiabaru','2','2014-02-06','Kosong','Via BCA (toko modem)','Y','2014-01-25 12:20:21'),(16,'irwan','irwan','2','2014-02-11','Kosong','Via BBM','Y','2014-01-25 12:20:21'),(17,'haris','ikan','2','2014-02-07','Kosong','Via BBM','Y','2014-01-25 12:20:21'),(18,'dean','ikan','2','2014-02-07','Kosong','Via BBM','Y','2014-01-25 12:20:21'),(19,'memet','memet','10','2014-02-12','Kosong','Via Yori','Y','2014-01-25 12:20:21'),(20,'bisma','3452122','18','2014-02-16','Kosong','Via BCA','Y','2014-01-25 12:20:21'),(21,'zulfadli','fadli','2','2014-03-12','Kosong','Via BCA','Y','2014-01-25 12:20:21'),(22,'aguss','aguss','10','2014-02-13','Kosong','Via Yori','Y','2014-01-25 12:20:21'),(23,'joedhi','joedhi','2','2014-02-15','Kosong','Via BBM','Y','2014-01-25 12:20:21'),(24,'david','david','2','2014-02-14','f42cdf8e4cf18526266f8acdcf85fadd1938ac1c49ab6fe8b5fac937e0e06dda','Via asrama','Y','2014-01-25 12:20:21'),(25,'erikk','erikk','2','2014-02-14','Kosong','','Y','2014-01-25 12:20:21'),(26,'yandi','yandi','10','2014-02-14','Kosong','Via Yori','Y','2014-01-25 12:20:21'),(27,'erwin','erwin','10','2014-02-14','Kosong','Via Yori','Y','2014-01-25 12:20:21'),(28,'raymon','raymond','2','2014-02-14','Kosong','Via Anwar','Y','2014-01-25 12:20:21'),(29,'chrono','gam3shop','15','2014-02-27','f562fae9b4433d862668415c4bf7f97bfb26dfd780685ec3d0b4b3850859f83f','Via BCA','Y','2014-01-25 12:20:21'),(30,'ikhsan','hidayat31','2','2014-01-20','Kosong','Via BCA','E','2014-01-25 12:20:21'),(31,'nadien','nadien','2','2014-02-16','Kosong','Via BBM Nadien','Y','2014-01-25 12:20:21'),(32,'babib','resistor','2','2014-02-07','Kosong','Via BBM','Y','2014-01-25 12:20:21'),(33,'agusss','ikan','2','2014-02-16','Kosong','Via BBM','Y','2014-01-25 12:20:21'),(34,'irzani','irzan1122417','2','2014-02-16','83f7bc34b8a46fe65b5bbfa21df868646fe6cb107726b3610ee685b311ad2cc7b95fea814dddad65ef58cbb18282b18c3582475dd41fa6ead8548371b0257438','Via BNI','Y','2014-01-25 12:20:21'),(35,'widii','widii','2','2014-02-16','Kosong','Via Mikroskil','Y','2014-01-25 12:20:21'),(36,'hiskia','hiskia','2','2014-02-09','af86dcc9c7d7edf084ec196562cbfe8489cc78f5f8db4b2ec13fcbdc53a54ef2017a331d77af4439d83860aed64d48b45300560489ea78af943bfbcb289d16c5','Via ARIE','Y','2014-01-25 12:20:21'),(37,'nisa','nisaa','4','2014-02-06','69924bec43eee47d43f079d815e1cf11243f9fb76937450ac56115de4cb556f81d2d7ca09d00b3d69d521f9c986b507a8cab19404a260bfb084c3e9febc8f496','ViaBNI','Y','2014-01-25 12:20:21'),(39,'rommie','rommie','14','2014-02-17','e5b5afebc92a7efb53b40d4f13bba8073aea2c67ec080ab5092892366a60b46823baa4a662b21b1580129365e8fc37f2d1d06d20afca8c23132517ff33d51424','Via BBM','Y','2014-01-25 12:20:21'),(40,'fadel','350929','2','2014-02-17','83f7bc34b8a46fe65b5bbfa21df8686471239ee7b47ba5c2b6d76846042c016ab4102de39ab56575bd60091633a38186d1d06d20afca8c23132517ff33d51424','Via BCA','Y','2014-01-25 12:20:21'),(41,'mifta','mifta','2','2014-03-23','83f7bc34b8a46fe65b5bbfa21df86864ac10e7b30cc67a98a1c8d7db616668b5a6c9c25539e8b67cd572f898909d7c443582475dd41fa6ead8548371b0257438','Via BBM','Y','2014-01-25 12:20:21'),(42,'baskami','baskami','2','2014-02-10','Kosong','Via BBM','Y','2014-01-25 12:20:21'),(43,'ariga','ariga','2','2014-02-10','ed600eb34abc1bab569e7ef44f0bf60ddd6be9f229880bc97c374c6c287304bd2f7eaa4d617c14ad8d7c0771a0c15b59ce0e867d4f9d5f7e29e929b5110e152d','Via BBM (BCA)','Y','2014-01-25 12:20:21'),(44,'albert','albert','2','2014-02-11','Kosong','Via Mikroskil','Y','2014-01-25 12:20:21'),(45,'wahidin','wahidin','10','2014-02-14','48b82fb4b3b01ead784f238debccd7d8e2addd098645cbc1767b1877078ae81f','Via Yori','Y','2014-01-25 12:20:21'),(46,'salman','salman','2','2014-02-15','Kosong','Via BBM','Y','2014-01-25 12:20:21'),(47,'bebe','bobo','2','2014-02-02','69924bec43eee47d43f079d815e1cf117f427d362f56bfb33c142910503ba252d0b300c79026cb3960f9f70e77611234c118d52bb4e3daf44976003b2625985c','Via BBM Bebe','Y','2014-01-25 12:20:21'),(49,'kandar','ikan','10','2014-03-01','83f7bc34b8a46fe65b5bbfa21df868646a10e96db6a141ead853bc817c2aa4ec77ec4092285ff8bf1df2f6017df4b218245c7d4169dc0f1e8802937f3f9e8a4a','Via YOri','Y','2014-01-25 12:20:21'),(50,'fajri','ikan','22','2014-02-03','ed600eb34abc1bab569e7ef44f0bf60dce0e867d4f9d5f7e29e929b5110e152d','Via YOri','Y','2014-01-25 12:20:21'),(51,'zaini','kalindo','10','2014-03-02','Kosong','Via Yori','Y','2014-01-25 12:20:21'),(52,'pandapotan','dapota','2','2014-02-26','Kosong','Via BCA','Y','2014-01-25 12:20:21'),(53,'saru','saru88','2','2014-02-12','Kosong','Via BCA (toko modem)','Y','2014-01-25 12:20:21'),(54,'rozzy','ozzy','2','2014-02-05','f42cdf8e4cf18526266f8acdcf85fadde1c75850885a9a7536ecc2a0acb70ee587452a5d109cf81e8033d6d1a0cf169f55cd694cc2a2e1d13dfd3ceec2ac18f1','Via BBM','Y','2014-01-25 12:20:21'),(55,'fuad','fuad123','2','2014-02-04','f42cdf8e4cf18526266f8acdcf85fadd1eddcd55142ca55aaeba00e943f5059223baa4a662b21b1580129365e8fc37f255cd694cc2a2e1d13dfd3ceec2ac18f1','Via BCA','Y','2014-01-25 12:20:21'),(56,'aihga','gilangku','2','2014-01-31','af86dcc9c7d7edf084ec196562cbfe8495785cf1b73d7133e866585c8a0c23c3','Via BBM','Y','2014-01-25 12:20:21'),(57,'harry27','harry31','2','2014-02-14','Kosong','Via BNI','Y','2014-01-25 12:20:21'),(58,'denny','denny','2','2014-01-24','Kosong','Via BBM','E','2014-01-25 12:20:21'),(59,'andri','kamenteacher','2','2014-01-24','Kosong','Via Iqbal','E','2014-01-25 12:20:21'),(60,'johns','johns','2','2014-02-01','Kosong','Via BBM','Y','2014-01-25 12:20:21'),(61,'binjai','binjai','2','2014-02-28','83f7bc34b8a46fe65b5bbfa21df868641aab75011bd22e2718b88ab3ee4373b15f9c87e1c452dee5c745564367268009d1d06d20afca8c23132517ff33d51424','Via ARIE','Y','2014-01-25 12:20:21'),(62,'wicak','bobo','37','2014-02-02','f42cdf8e4cf18526266f8acdcf85fadda7d092f3fc7530c54162a0a4dfdbf33b','','Y','2014-01-25 12:20:21'),(63,'indran1010','RPSsenpai','6','2014-01-26','e5b5afebc92a7efb53b40d4f13bba8070ea9eda2f33b46f568ad6c028de0126e2f387ba69784808f4d068a3aa90cfda0d1d06d20afca8c23132517ff33d51424','Trial Server Indonesia = Rp 0','E','2014-01-26 15:16:16'),(67,'kalimanjaro','nusantara','9','2014-01-26','ed600eb34abc1bab569e7ef44f0bf60d05071844041dd972ee2264000b84fd1923baa4a662b21b1580129365e8fc37f2ce0e867d4f9d5f7e29e929b5110e152d','Trial Server Singapore = Rp 0','E','2014-01-26 16:46:38'),(69,'jams','yori','10','2014-01-27','Kosong','1 Bulan = Rp 30000','E','2014-01-27 02:45:50'),(70,'atok','yori','10','2014-02-28','83f7bc34b8a46fe65b5bbfa21df86864e01b727dcbbe5da378684dec21807de423baa4a662b21b1580129365e8fc37f20cef0041b238079d208cdbc16015b328','1 Bulan = Rp 30000','Y','2014-01-27 02:47:04'),(73,'utomo','mikro','12','2020-01-27','f42cdf8e4cf18526266f8acdcf85fadde8094029063cf036be929502c6cec0f3b82a5242a0193b04f1da3ac228fb81d53e2953e342ce6b97a2e5f89879a86e70','Trial (4-24 Jam) = Rp 0','Y','2014-01-27 05:30:07'),(75,'rama','rama123','21','2014-03-02','5e7a098d584135bc239372d21f898bc312f3f22ed11692ecbf1dac7d213a4ee7f77537ee528ac44b8d46f6a9740e3eb9e3d4d8384cd1d976f359237df980fc7e','Trial (4-24 Jam) = Rp 0','E','2014-01-27 06:40:33'),(76,'heriyana95','nzm639pn99','24','2014-01-27','Kosong','Trial (4-24 Jam) = Rp 0','E','2014-01-27 10:35:58'),(77,'robi','robi1234','25','2014-01-27','Kosong','Trial (4-24 Jam) = Rp 0','E','2014-01-27 10:57:42'),(78,'setiawan','awan123','26','2014-01-27','Kosong','Trial (4-24 Jam) = Rp 0','E','2014-01-27 12:05:49'),(79,'chapuracha','tentramdamai','31','2014-01-27','Kosong','Trial (4-24 Jam) = Rp 0','E','2014-01-27 14:31:39'),(80,'kius','kius','3','2020-01-27','f42cdf8e4cf18526266f8acdcf85faddad0cdc2c07e83bf5650685d0ccf6a1d5','Trial (4-24 Jam) = Rp 0','Y','2014-01-27 15:54:48'),(81,'admin','admin','3','2020-01-27','ed600eb34abc1bab569e7ef44f0bf60d3e2d45f1f66c566984ef8a29af8bbcc1','Trial (4-24 Jam) = Rp 0','Y','2014-01-27 15:55:46'),(82,'supri','supriadi','20','2014-06-29','ed600eb34abc1bab569e7ef44f0bf60dddd929c6c6b3885c6df2fb11b02102c8','Trial (4-24 Jam) = Rp 0','Y','2014-01-27 16:59:12'),(83,'dhany','123456','21','2014-01-28','Kosong','Trial (4-24 Jam) = Rp 0','E','2014-01-28 04:18:44'),(88,'zico','coba','26','2014-01-28','Kosong','Trial (4-24 Jam) = Rp 0','E','2014-01-28 09:54:54'),(89,'erik','yori','10','2014-01-28','Kosong','1 Bulan = Rp 30000','E','2014-01-28 12:34:17'),(95,'p4par4zi','15081982','39','2014-03-02','d8ee33fd556a6c90f08d6261367b51ced9157123d7d90782784110a18f7ec8fb','Trial (4-24 Jam) = Rp 0','Y','2014-01-29 07:40:17'),(101,'vader','f4j4r','36','2014-04-01','ed600eb34abc1bab569e7ef44f0bf60d5f1de3ebe2b0d20e47d35d70264d315a','2 Bulan (Discount 5 %) = Rp 95000','Y','2014-01-30 04:33:39'),(102,'alwy','alwy123','48','2014-01-30','ed600eb34abc1bab569e7ef44f0bf60d23baa4a662b21b1580129365e8fc37f2','Trial (4-24 Jam) = Rp 0','E','2014-01-30 14:46:34'),(103,'afif','afif','49','2014-01-30','c4eb37d599699698f356223430cef95de786c7a6edf385df59b6fdf570d28bd6','Trial (4-24 Jam) = Rp 0','E','2014-01-30 16:31:28'),(104,'olin','olin','12','2014-03-01','ed600eb34abc1bab569e7ef44f0bf60d245c7d4169dc0f1e8802937f3f9e8a4a','1 Bulan = Rp 30000','Y','2014-01-31 07:46:16'),(105,'iqbal','iqbalhunter','3','2020-01-31','Kosong','Trial (4-24 Jam) = Rp 0','Y','2014-01-31 09:24:06'),(106,'user98','user98','51','2014-01-31','c4eb37d599699698f356223430cef95de786c7a6edf385df59b6fdf570d28bd6','Trial (4-24 Jam) = Rp 0','T','2014-01-31 12:26:08'),(107,'ucup','12345','21','2014-01-31','Kosong','Trial (4-24 Jam) = Rp 0','T','2014-01-31 13:21:40');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_info`
--

DROP TABLE IF EXISTS `app_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_info` (
  `id` varchar(20) NOT NULL,
  `version` varchar(20) NOT NULL default 'Kosong'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_info`
--

LOCK TABLES `app_info` WRITE;
/*!40000 ALTER TABLE `app_info` DISABLE KEYS */;
INSERT INTO `app_info` VALUES ('vpnku','3.3');
/*!40000 ALTER TABLE `app_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatbox`
--

DROP TABLE IF EXISTS `chatbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatbox` (
  `auto` int(11) NOT NULL auto_increment,
  `pesan` varchar(200) NOT NULL default 'Kosong',
  `ip_address` varchar(20) NOT NULL default '0',
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY  (`auto`),
  UNIQUE KEY `id` (`auto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatbox`
--

LOCK TABLES `chatbox` WRITE;
/*!40000 ALTER TABLE `chatbox` DISABLE KEYS */;
INSERT INTO `chatbox` VALUES (1,'cek','0','2014-01-25 02:52:08',''),(2,'test','0','2014-01-25 03:38:20',''),(3,'piyt','10.227.140.123','2014-01-25 03:41:44','admin'),(4,'test','10.227.140.123','2014-01-25 03:41:49','admin'),(5,'jika','10.227.140.123','2014-01-25 03:41:55','admin'),(6,'kucng','10.227.140.123','2014-01-25 03:42:03','admin'),(7,'cek','10.171.139.144','2014-01-26 21:29:51','username');
/*!40000 ALTER TABLE `chatbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(11) NOT NULL auto_increment,
  `create_date` date default NULL,
  `payment_id` varchar(11) NOT NULL default '0',
  `member_id` varchar(11) NOT NULL default '0',
  `member_name` varchar(30) NOT NULL default 'Kosong',
  `account_id` varchar(11) NOT NULL default '0',
  `account_name` varchar(30) NOT NULL default 'Kosong',
  `product_id` varchar(11) NOT NULL default '0',
  `product_name` varchar(50) NOT NULL default 'Kosong',
  `price` decimal(18,2) NOT NULL default '0.00',
  `details` char(128) NOT NULL default 'Kosong',
  `status` varchar(10) NOT NULL default 'N',
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (6,'2014-01-27','5','15','chrono','29','chrono','7','1 Bulan','30000.00','1 Bulan for chrono','Y','2014-01-27 10:30:54'),(7,'2014-01-28','0','21','rama','75','rama','7','1 Bulan','50000.00','1 Bulan for rama','N','2014-01-28 03:44:39'),(12,'2014-01-28','6','10','Yori','70','atok','7','1 Bulan','30000.00','1 Bulan for atok','Y','2014-01-28 08:12:38'),(17,'2014-01-29','9','10','Yori','51','zaini','7','1 Bulan','30000.00','1 Bulan for zaini','Y','2014-01-29 17:54:44'),(18,'2014-01-30','8','36','wicak','101','vader','8','2 Bulan (Discount 5 %)','95000.00','2 Bulan (Discount 5 %) for vader','Y','2014-01-30 05:44:44'),(19,'2014-01-30','7','39','p4par4zi','95','p4par4zi','7','1 Bulan','50000.00','1 Bulan for p4par4zi','Y','2014-01-30 05:45:33'),(20,'2014-01-30','0','10','Yori','5','raisyah','7','1 Bulan','30000.00','1 Bulan for raisyah','N','2014-01-30 13:04:40');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` VALUES (13,'1390753560'),(14,'1390803224'),(14,'1390807769'),(14,'1390807908'),(14,'1390836244'),(20,'1390842476'),(19,'1390888462'),(10,'1390921669'),(3,'1390927692'),(21,'1390970122'),(21,'1390970149'),(37,'1390972800'),(37,'1390972899'),(21,'1391085726');
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(11) NOT NULL auto_increment,
  `ratio` decimal(10,2) NOT NULL default '1.00',
  `reff_id` varchar(50) NOT NULL default 'Kosong',
  `reff_ratio` decimal(10,2) NOT NULL default '1.00',
  `username` varchar(30) NOT NULL default 'Kosong',
  `email` varchar(50) NOT NULL default 'Kosong',
  `password` char(128) NOT NULL default 'Kosong',
  `salt` char(128) NOT NULL default 'Kosong',
  `last_login` date default NULL,
  `confirmation` char(128) NOT NULL default 'Kosong',
  `status` varchar(1) NOT NULL default 'N',
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (3,'0.60','1','0.60','junrikson','junrikson@gmail.com','e8862d840eff62ce0b6cd3688f3fe1d7187108083cc0b0942391ca23936115b7c06a79efeb95d939f96416c955650527e030cb351430034910c0d1ab1d5b97d1','33c0475df1bd49d37959b55a5d3b015c4250ba5d59ed2e9b1e9a7b657425e2356353ddc55b07eacbcb9158c179cc49617ef0dc4b76f18b2add1579605f15e3f0',NULL,'Kosong','A','2014-01-25 14:40:23'),(4,'0.60','1','1.00','nisa','aiam.uung@gmail.com','f6f55565eaa82d6f5fb493b0b796abcb32e9d6e612a02cdf899d58f77e55a60070363b0381b39b894f79f4005e4738697417ee771100f6199e2153bbb83f0dd9','40d47279aae4534496c3257ba1433e83a9501db8a25a3d3bd26d2a74d6847ca3fc39bfe2bacfb3e1c428bb6a6e998f2de52cc1e760cd07ff3b1155eac5c19421',NULL,'Kosong','N','2014-01-26 07:04:38'),(5,'1.00','aiam.uung@gmail.com','1.00','coba','majukali11@gmail.com','db8f25fda11eb26f9fb10c1877c267990f86027d86b3347248ec264b23c47e6928a68e1cf3a892cc7a8573cd36432221cb65382b593b9e849055f7177b0ddbc8','c1bf11e6507a904b5d29c7c39fdc13c286eb4b923c1cd7906f1f585be51b5bff283080e7e7634842164edb0fb6363f87686b9e2d5498be9d89420b0f3531dee3',NULL,'Kosong','N','2014-01-26 07:08:03'),(6,'0.60','junrikson@gmail.com','1.00','Renaldy','renaldypermanasidiq@gmail.com','7f506beb2da3389202186f7aadf6dde358c4fa7052422564b63c24a824cbf69b97f17ea847e24fe2bcb2318601b9b7541dc10eedd9512ac5a6dd0b1a071a29e2','6feccd22834315d6c9963d6db26ff1cb831b42e5a51aecd9defc3efff967114419fa85f33800d825c9357b8b9574856e38abc66f5186fecac2e07fc668e2b829',NULL,'Kosong','N','2014-01-26 15:02:50'),(7,'1.00','renaldypermanasidiq@gmail.com','1.00','RON','renal_ajaa@rocketmail.com','6a375c17ab382d15e00c4d987a9409cd4de9f57a2a963746cd6c7337d59e70ebc65f93d00a242cf00205b0a6010409e76cb40c300a4e9782aa87ce6a9a27323b','144a278e442cbd7b04a0c7ccbd000e107efc990865c437bbd547e12cd05d31879ddf5a79b2981c6b5af96ee6aca2a6d9ff2ded05cb2bcab87f7e9c3a554b9260',NULL,'Kosong','N','2014-01-26 15:11:54'),(8,'0.60','junrikson@gmail.com','1.00','rio2','jemario.mestika@gmail.com','41a89896ef295db6280cb22ab5c7a9e9e0961e0bb1d4cce8e3f504e18a57f14bb606128731b66c97393c66cefaf45598c818d2ec290e6adf5cce58f9ec782696','c2ffff290fdd02a1264fa1a364653ae225282ccacb0a06e79dcd7e8e7b14a0a20e6e74986c8dcccd7d84f456745ce936f802b70ff9355137ccb15ada164e4527',NULL,'Kosong','N','2014-01-26 15:20:59'),(9,'0.60','junrikson@gmail.com','1.00','kalimanjaro','kalimanjaro07@gmail.com','a4f25c6967f644e4d1f019d65142bc48c2822c29878c676a721551de4b896f583de79d78ed7550daf77b006bba537fd0f0e5510fae2cc683c8220ec3630d12a7','e5d0795a71faf47bf639c3bb96a2a8b7d9f5046ddcb4d0aa47343090f160fb0847389e7e8bcfca549f356f6cb0aa16fc77a88ab8f57f88249d3a532bd0ea3d1b',NULL,'Kosong','N','2014-01-26 15:24:25'),(10,'0.60','junrikson@gmail.com','1.00','Yori','arwanac_pgas@yahoo.com','1b405f28d5f772f59b4f7eee15ef1120cf168f49fb07289b6fa29cd34f1aedff98426c699c59ea83cccb01b23bddc1b9ce19c05794153d31dc54b90e075af574','89b0f6d8b75dfabaa4c494dfc9d8559eb949b262e3c7a4c7cb624354d4af46b1a6bdab65370e14daf039da3c9f87168910da7f5e95a7e778903376ed596474ae',NULL,'Kosong','N','2014-01-26 16:08:30'),(12,'0.60','1','1.00','tomosimp','Tomo_simpel@yahoo.com','e0fea63110f7625e23ce1e27616c83535492b05dcf1819e5692e7cc82a044926d05286b5d7bc74cb302f8ea61ce178f44b1f0ade95fd69e4e40b6402a41b42c7','8e7f0dd7ae3854c1fa5f0d4ea6ec0afdcdfa1543c568ffa385f56f47bfa042d6e8b6a14effe3996d31d5772ae5074cd6fc3f1b9620628c29650ade24685570df',NULL,'Kosong','A','2014-01-26 16:15:49'),(13,'1.00','1','1.00','Agus','awwwarnet@gmail.com','fd1f99cf1fc5f039ccd830ba6ac025a1b3c6e34c563a35140d8c923d8126d6570bbfb9b02e180602ebe7b241d074d38524674a3abbc0208a3bed0397fc2af005','4a7a719f7d8b4c9940a7b1a6ec0d8d897562efb4810ab685a4ac9e09fd9012ca8251666eda7a323124468e5a80ea71da4be61539ad38c0c25628fcd16a3ba49a',NULL,'Kosong','N','2014-01-26 16:25:38'),(14,'1.00','1','1.00','Rommie','romy_hanafi@yahoo.co.id','07c5f4ccd23234ff4e32aef3ef458ffce28417aa3f890d37c0af682cd977e14403d31809ffdb613c80fcda1543fc731819cdae5c95bc2dbfa0c29af0edbda802','4d33f6ba38c24624a1bcdd8e682145ed10fdd25bf2a60d3a60612662aff4a53d178ab87a8ebc37a6e9131da0730a5e8ce85127bae6d8ad2aa0d4618d9c50f635',NULL,'Kosong','N','2014-01-26 17:08:31'),(15,'0.60','junrikson@gmail.com','1.00','chrono','m_arfian2003@yahoo.com','b6cf985e6313a72fd2e6792eaff5d4de158726c867697dd16bf6e8e16039009b8923687075394b1a6650e01b6e92049f62f2258bb82594997ab81e4d39bbd86e','67647d6500a9faa148ed2cada019a9feab4067fa12f5af28daa1bdf77523e968f3acf92e5b876af43cb29229b7158f909fa76261609dbefa59b795481420c77d',NULL,'Kosong','N','2014-01-27 02:43:34'),(16,'1.00','arwanac_pgas@yahoo.com','1.00','wahidin','o_din77@yahoo.co.id','275c5a733b85b78ca52cb38c4add759391516b3b24ddc0c79ca4562fdf814765a617a1a69bbdd1122573e421e8025ca0900ad3b29ecc00206628dbe455c3039b','28c8214390167d06312fd406a79de6490188a3b40245c654f4e653c0362d07f3259725f395040af32769484be7a67e0f8ddf244fd9b45f8a7596c35a7ad59a6e',NULL,'Kosong','N','2014-01-27 03:15:18'),(17,'1.00','arwanac_pgas@yahoo.com','1.00','deddy','ddsjay@yahoo.co.id','8d027987d36d56278ea90215688bf0b442b35cb59ad282a12aaaa232b437b5570bf23faa10d66c81fe6f4e2771a4e8a2f47fb82d8197cc1fecf290151bfc0726','3a734eba224dd12c16b53abfad6b693b416117fb5dbfeee3c10e3e9a75274c3474856baa317570cfe5108fad1cb441fb7654038293a1db7b9930d007e7f6fe88',NULL,'Kosong','N','2014-01-27 03:18:54'),(18,'0.60','junrikson@gmail.com','1.00','bisma','sretmania@yahoo.com','6ea02872892afa726644f756c270781249be82202ca9e4e5a32adcdc0e4c159824b2ecba23ea6b803a91a1d678a7b6326c37d9caeaa8ba60ee9b021fe9056bd0','48d51360484c990f8a0ec16ff3c987bc508f3c3e53637e2119c6e49c55434b9159d4a2b0551b16bde759dc899b6f35526a137258f82a6252197e654cdc78862a',NULL,'Kosong','N','2014-01-27 03:36:37'),(19,'0.60','junrikson@gmail.com','1.00','PRISMA','ardifian27@gmail.com','6faed751919951e173846029b41a6ae04c429fccb86e5ad6fe9775a9c4a5f7b3c632c8e760d871b8b4597c66d07bc1e6a409d7efc500eda719c131aa4420249d','a72a18fa6f86a19e1606ceafadf25d37a4579c9dbd03c99abf41b9d4286e909f063466ec6a272f60fc80fc5a131852a91a44d0a7aca477de1df135b29c757de6',NULL,'Kosong','N','2014-01-27 04:43:15'),(20,'0.60','junrikson@gmail.com','1.00','Supriadi','dewakrisna66@yahoo.co.id','103e70db7ad328a06c5fcf852f9a6af8c24bf8f25a4f5ddde8be83c320160bb658ea05e6e8f4040403b31509031dfdae2a694182db5e6f3653668826b24b5a65','eda6b6abb1ff5d687f6f3dc09d63fbf376f8b0f997dca36220308f55b642d5568580772fc0c5d1c920287df800d0a43ef4c672fb84a31a4f9615f2ffed4a4aa0',NULL,'Kosong','N','2014-01-27 06:01:24'),(21,'1.00','1','1.00','rama','cthuramm@yahoo.com','aa92d4f0b0c9935b00043fb2540cc2b51834a716cb7911f105f11b9c76ad7e00aa6eebc699e7dd7cfbe51226983d307d3d80cb699471db7fc39782e5eb10c103','efb9d37890062f0e6f81bec5644700667e97608f0620bac3c49b8078949f0ef2cf9a4356dd1b0b3d58a1a59baee9f998f033e766fc4654093954b70935d84b3e',NULL,'Kosong','N','2014-01-27 06:36:01'),(22,'0.60','junrikson@gmail.com','1.00','elfajri','el.fajri3@gmail.com','e4879f7efe7f45f91495500139b8b1f9d1697f891ad1a48411fed74533d95cab0b96dc7ef7db5100aa0e0c651967e0f194a18f3a8597ee481c3cb5cf56a1ee1f','f313938ad84cb320c3df2b5cc2bc7e183a30fad31dc4cbf0c7b4bf5ca9fb1900bd329a4fae9ce6c7e683a2c0f065bd8280c48a92dfd601bf042204ed0e42b760',NULL,'Kosong','N','2014-01-27 06:36:22'),(23,'0.60','junrikson@gmail.com','1.00','gilamg','gilang_rizki2112@yahoo.com','9214e449b5aa3d6fbb24328b2165acb5b9132817f5c7ce0314c7cec070afb0d2c4a6371682e806f4df48a5e132de1e31ea4b8c197af477554def3e0dee171da4','a7a4d711abaedef99e14f5cb58aebb6781d4be9ef3c89aaa0b97d52f5f1abe846208aebfc286470deafed49a6cc3a52cefd0e5c9ab20a28cf983bb4545829d37',NULL,'Kosong','N','2014-01-27 06:58:06'),(24,'1.00','aiam.uung@gmail.com','1.00','heriyana','surya.heriyana12@gmail.com','a1dee5c05aa4acd1b963cd523d96bf029a28cdab626d11db88f452fbdd1301e293605dacdb09cf0569b1c434d52d141b10c435f699611cba41376eebcc39dff7','7bfb5da9edfbeea0de4e144ecbac6f6b9771168598479e54f13aa5b7d7aee088b6ee92c5785f573cf6f7c1f6a4fa86522cdc49ce1395aa73fb19e8d23de75b38',NULL,'Kosong','N','2014-01-27 10:33:26'),(25,'1.00','1','1.00','robi','mr_virgin31@yahoo.co.id','97615ea47c256ffeedcae51483c6b8b9a6bc5bfa9d07a508a55d9d402d71d8a2935c744dba7bd944e2c7f9d33c7bce33dc500e26d15b7a2b13ded4586a177824','f6d713b735faba819466ce4dd279b4daf9652f6c42cd70ea775c66e73b2c772ee3faa078da3aac2dfb9e2b23f86d1da6bc188b66d3a80dd99f5e04410e859f4d',NULL,'Kosong','N','2014-01-27 10:56:31'),(26,'1.00','aiam.uung@gmail.com','1.00','setiawan','maulanarifdan@yahoo.com','297e367c1c6594f47b0c805614e41db9f37ec9ba0b7bba8f44e8b2c64c6ead1df59ed754fb4a766d686622783c0047bcc5b7567a999eee78a6e417560301b558','f068ff716b648d6cc1710c3745f1fe5bdb8c8deaa0988e3dc33d1dd8b7791d7f65ccdbc0464c8b33d8aec60a270134b260118bbede63484febe771766118b224',NULL,'Kosong','N','2014-01-27 12:01:29'),(31,'0.60','junrikson@gmail.com','1.00','Satriya','keranjank@yahoo.com','6ae4d18a7fb50169482f3a186deac5f1fd4276e93bb4fc5913a01843f5214455b0b8e49d00a04ef756dfdad869faa4357e50dd71b9406e93e2caffdfa2fd52a9','9d38e9a41143c6fd79ba521e6f592f1c85fce6eceee8b1981233763cb8d85acd05f199fee62f702ae854ce808d6c49d06ba9cd01fc3a96a85c636bae88197719',NULL,'74f7a71ee2b66500bff752ae84ce358d','N','2014-01-27 14:27:06'),(33,'1.00','1','1.00','Jun','junrikson@yahoo.com','7a1ab235decdf12d6ff64b183667e49b01915db3ea29242215c0ffb7717b52e59b5f35b6fdec51080a7aecfe67324904915bae4c134ad0307a69ba18144e3ad1','c98c789e1928328dcddb4e88eb78da23923b4be70bc1f1b476e2feee9055b2b3518d31d3f441fb1bcf285a6784dfc4df205f4492e289525ca2a6e4700dad73b6',NULL,'7b62038f0aa85ddddb6e1069f27f4c6f','N','2014-01-28 05:22:04'),(34,'0.60','junrikson@gmail.com','1.00','masterkis','xxx123xxx_z@yahoo.com','3e2d2c3941650ebb060c4e539de2a7ee106ec2ebd8cb00228d345dc5e9bbe1901593cfd9e19937d58fb1cc475ccda427123f34262661b939d2ac7abcc6d4b87d','dea381d925d423056d1a109fa45a7f388f7d1348b37af00cb0c6affb7b3757f94dccd4014c90bc7d199c66d68f8fb3527fea1a56cb8ec49f5e0b88b1a3492ec6',NULL,'dfd44931d2eacb683ac8be4bf80fc115','N','2014-01-28 09:18:11'),(35,'0.60','junrikson@gmail.com','1.00','sumarno','zamar.marpus@gmail.com','09932e49c00eabb6817e10e7a8f2ed2d045a6c4132e5602fe3111a767ea0816eade185b25d43477ad459b3b7cce2070452956cd2deaddefdb7093ccf87c45c36','cbc2941d5617ad1ad2d516c4a78bf402dad1f6e16530594873ce3328e78316b2816dcbb4d37ec8a87cbf69493f825a041cf66312128d8e6514df9e0bc4b6fd00',NULL,'2e16c89f652fa1e837292bf653b5354f','N','2014-01-28 23:26:04'),(36,'1.00','1','1.00','wicak','brokoli212@gmail.com','3a5b0dc3712ae4db5a7efa4963a94ae3b1d192f4c4b25972d2ac40f9b8c5c602aa89b72dc1e72a7a9a4c0601cd035c6d364df2c77f663c82819a02581568f8cf','a99a3435856108a4545c57e49c6119bef97e52cd8f528023fcc48ccc2df3ac7f700e92937de7367f299fcb9d5169c8e0f3b89be5fd123787f4e894f158999c30',NULL,'e79acf85134877fde07685408a1a4d63','N','2014-01-29 04:13:52'),(37,'0.60','1','1.00','vader_fjr','fslamet76@gmail.com','7f12f6b619e09d10e8d75aede4cb4e06bca52ec8e01daf43e907f00d32bf821613dffaafbe41a07c88cb606748f34185d19b8b39d7a8fe96a571726079a28953','bbc16340b5e08298ec394fa7f39ef20872f80d6b6b0f7645ae6de58031c1e6e7b2356b36485acdf54e51676d164feb49a5f755e297a083d020d1fecb61ebb1bf',NULL,'7856b5ed39600c48efbf2e40576e1345','N','2014-01-29 05:19:26'),(38,'1.00','1','1.00','FerryFerdian','fferdian1989@gmail.com','e81b802dcffa370d09696fd393f44b1db9d8440ee84cef5141814c3118ec79a7402bf69410423480d2927e76988f5943e6782b6258a8627c0355679b89a47315','680d18ef2edfc197331ff54e28ed91f04ebac19dfdaec349c6637565c9f73f36b690d40fb0cca7cf4a5e628e40cdf6926524d382e711ddca1980420ff2de1447',NULL,'c346b3c9457015cf2906949e35ce3243','N','2014-01-29 07:28:29'),(39,'1.00','1','1.00','p4par4zi','wanda_pasband@ymail.com','d83614418f6d996a2f483a7b590757f592ae5881f31c761db0022b575ea796852aaae85faccd87503b537d652284213dfd3d99dbc9deafecef0b72d2e350bafb','8ae0f4a41c4f6f2f627bb155537374a3433939e58880fbb16b8ac312e1b93a8239d7ca4aecfab19657a705c07909511bf305c70658222289263fd3a48fcbb87b',NULL,'55628007ec02ca84552f2e90f4a9e618','N','2014-01-29 07:34:27'),(40,'1.00','fferdian1989@gmail.com','1.00','IezhalBuah','iezhal.ib@gmail.com','3f61d628075b18e27aa763424e65e3689e83b410f5b70d9cf8b0b617b91a48977a6e567ed628c5d59c3d2fbe699cf5a83fbf5868649b20654f983fc9799f63ad','93d398c261f7ba4331f3d1eec53f4f76f003b8b0d547dd0cacf221f0e76ee08c3de54a81c67fb5840828ea99d9bcafaf31b80e48ac0658811e9e91a0334044d4',NULL,'f702ad17879bf0f827cdd740da7fb1df','N','2014-01-29 07:55:19'),(41,'1.00','1','1.00','erwin','erwin_harapan@yahoo.com','c581b8144e284686fb6c51732650ad5c7d55d899e270a626a54d5aad330b22fe88287efc1667b963b55bfa48a61bcf15b889ef331b78a38b5fba7b1cc1aeac58','cfcd98b4e6fee82a8160423e0c6987d985d2e895853b9e782d7c2f2bf47d63c7deb588c83dc2620f9c2d5b333f796bd960c181799ac1e59920e4a0b5ebc78f16',NULL,'a654ef7ecba0cdc8164410991675aa00','N','2014-01-29 08:25:54'),(42,'0.60','junrikson@gmail.com','1.00','kuroro','kurorolucifer90@gmail.com','88d66026436fd78c834bc96e1f84881328f030a3da4a0f86ff5e44518a7629e7424ee4f5109b5f50789a26c6f09db7829133a87d9b97a9e67612bbb21dbb7d9d','c5bb90250de6f7f9102fb0278724aa971c8886ff1399985ffca23357d84dd054482a79cb88b82ceb1ab223077cd7d8140c3e7244e8138a07a9d338d43f5ecc42',NULL,'fc37033f20a23f1d2c5eec9a593418b3','N','2014-01-29 12:03:54'),(43,'1.00','1','1.00','Naya','nayajulian@gmail.com','a4539458898452809a52bc8cd3c03f79edcbbfbcf30fa4531e48c313775d236bca296f5f19668cbc0c144a3f28a8f1fdcbc0e33b5b0faf8d362b2a8998522b09','1dd221a5d0a7960c15452a6a67177db6058f1f2a085c0da5bddc7e7b4b95e6ee84b5f08e705ae2b7c39d39199909a1d0a36c0d0c083eebb06af6da7902eb1206',NULL,'91fd7b300a09c5d358306361b2ea17b3','N','2014-01-29 12:36:34'),(44,'1.00','1','1.00','castielo','boni.castielo@gmail.com','7333fb077128fe04f2992475a76fcdb3084bf6450382bf6bb9207d057ae7ccfba22cf61631cceccd3ead1f10ba029c2581abca090f4b27cd9fe2b65faaf79bc9','cf10018e3ff998b4f3f27e0751198e6cb2274ce78daa869df593f84bf2346c3a7e60c34603d9babdef508e73304d424d3eea371a8b07ce2a2081d306eade3a84',NULL,'426165c5fae9789210ca65f8eea30cf5','N','2014-01-29 14:24:22'),(45,'0.60','junrikson@gmail.com','1.00','fandy','amarantcrl@gmail.com','80ce22a3784774bd5e1670b84b5b15d90e6f07e3047b24cb201bb065bc09dc10907a550ba11752267e02f87e24669b95b9fc0aecbf5bcb5ccd3b506865feaf4b','be3afd305926d9e80cb2a5475f612d865ce67313e2126aca2590b5420d53322dc8f5fab662640658509fee47cda7a465de8cba094cd7135d64593995f16a63f6',NULL,'0dc63e05d40a39cc0e7feb828bded2c5','N','2014-01-29 18:09:55'),(46,'1.00','1','1.00','Ziaebbina','Zia_ebbina@yahoo.com','faf82fcb9586e543f4b92e9cb52104d5518aaca53a02541ca07e9e77d90f4e21bcef0791f151a4877e53042afdaa4d5ef2befafbf91e7955134351e44ee3277d','dd3924be39c0b4ca32b83e48331fc0d87cb6fc35dce853799dc56a18787051e19551753e1908c9cee30fe98d497a9bbbd6f013eec9563e35f029fcf10c910368',NULL,'bc651ee72c10b4d3a814df7c0d377ed7','N','2014-01-29 19:40:24'),(47,'1.00','fferdian1989@gmail.com','1.00','debydelv','debydelviana12@yahoo.com','bb352b96535d5242a8e2ce92ed625b70fb65b2f6e7cb374442e97848f6e613f05c71ff17b8e2ea6b39742b973a4de1b498213a3f6679757ce389b3b499e1c227','72a693d08afdf09f29ca3300170a37fd4b03c1b646bcbc465e3e43c7c185ffc6a5a61f61cbcab51e3b9accf25f890125dda15281a8d05a8cbcc7962998ed3669',NULL,'58ad2605013fa33e56cd2563079fd51b','N','2014-01-29 19:40:46'),(48,'0.60','junrikson@gmail.com','1.00','alwy','alwymhd112@yahoo.com','e47f63e53e49b4178f42839e2df9944544647c0fa4a18af98fdef7e0cb833114c2fe1f0697285b9c9be7554d6947871ebeb9e55485eca7e975e1c318a33919eb','27a33be830a725398b982555ed98cee5d442c90b8e2377933d214ec646afdcb2c82f57f221df23f80cc11a366ea5bcc6accbaf51324818f49aa92279ec288a9d',NULL,'df9e078b8e81fcbb99278664413aab89','N','2014-01-30 14:40:47'),(49,'1.00','1','1.00','afif98','afifmahdi.official@gmail.com','908ded7b359f99b155290b1b4c48980b3b5b2b72224577cca9d22e9d682a21c0f2df85e6ea1ec88868485163d75a813b1554e58d818c981bae349d9edc286568','df57bb9ed2fb68f3034d62107acff8f7b36c82a370e0bd1fdc6937b654d9c9e2bd9b2356a687b5de2cd997265e1d0b2a65e459ff8733e76ce54a048cdbd0be09',NULL,'3275ca713f2c4bce6d24d2a2440770e2','N','2014-01-30 16:29:19'),(50,'1.00','1','1.00','davidprasetya48','davidwoles23@gmail.com','a4d5e9994fdd616930d051d206ee5d1252acfcf45d0820d1a8bf7cbc14f51cd6743ddf9d08fc959addc24f8e772650dff7a44f8cbf1980340163a3103e01f14d','63e77f0866267d056ced55d187af95e7d063013d7bff6c3f703e669b63d679615ba783ed804e336ad6a773270f1b66165ed0fcd1dc7044afcea9289415bf39cd',NULL,'fa066c9a46f742e4cfb779ba760fc5dd','N','2014-01-31 10:41:53'),(51,'1.00','1','1.00','dimas98','1@afifmahdi.besaba.com','f7c17b3ecd678ad41eb96c1fb4f895631aac62269546293a21e03829d9dd2675eee824ee4aab2f5fafdf1cda5b1b4031f580bac67a4f920c4597a8729a10eaf1','000e8f438ec5b90d0db8c724aef745e76bd259437a32a69769418da881ae3cdcfe0aefe02cfaca2e77f14f11e198222ee0b6847224dc7e7808f6d4e7fe73641c',NULL,'940fc9d61a6bff3bf77cd4ae012f40b8','N','2014-01-31 12:23:45'),(52,'1.00','1','1.00','EndDie','ahmadenday@gmail.com','0c8b1aa4267fa2a5529415dd93ffa18dd425f93fe86ba069d308b222b5ab7e2672f10d58dfaed57c7d37c874ade7ed7fc1c74df1187a5cdcc1c9b9aed06e3785','bc5262fff353faea01028a1e834f65c17f007745310c32b92781f1dcb38b5270560df607f21759d9388c4f8ad14cd4070c2ca5552c2c2a13e9ba285852c2bca5',NULL,'fe2270274940484851f076ae7dbafad3','N','2014-01-31 16:28:42');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL auto_increment,
  `member_id` varchar(30) NOT NULL default '0',
  `payment_date` date default NULL,
  `bank` char(50) NOT NULL default 'Kosong',
  `reason` varchar(50) NOT NULL default 'Kosong',
  `price` decimal(18,2) NOT NULL default '0.00',
  `sender` varchar(50) NOT NULL default 'Kosong',
  `details` varchar(250) NOT NULL default 'Kosong',
  `status` varchar(10) NOT NULL default 'N',
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`price`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (5,'15','2014-01-27','BCA','buy_from_product','30006.00','BCA 8280023478 a.n M Arfian','Invoice #6, = Rp 30006 - chrono','Y','2014-01-27 10:37:12'),(6,'10','2014-01-28','BCA','buy_from_product','30008.00','BCA KHOMARIA','Invoice #12, = Rp 30008','Y','2014-01-28 08:13:29'),(7,'39','2014-01-30','BNI','buy_from_product','50000.00','BNI - 0284593197 a/n IRWANDA','Invoice #19, = Rp 50000','Y','2014-01-30 05:47:42'),(8,'36','2014-01-30','BCA','buy_from_product','95018.00','BCA - 34227.35035 antas nama Fajar Slamet','Invoice #18, = Rp 95018','Y','2014-01-30 10:13:15'),(9,'10','2014-01-30','BCA','buy_from_product','30017.00','bca khomaria','Invoice #17, = Rp 30017','Y','2014-01-30 12:49:23');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default 'Kosong',
  `price` decimal(18,2) NOT NULL default '0.00',
  `details` char(128) NOT NULL default 'Kosong',
  `status` varchar(1) NOT NULL default 'N',
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (6,'Trial (4-24 Jam)','0.00','Trial','N','0000-00-00 00:00:00'),(7,'1 Bulan','50000.00','1 Bulan','N','0000-00-00 00:00:00'),(8,'2 Bulan (Discount 5 %)','95000.00','2 Bulan (Discount 5 %)','N','0000-00-00 00:00:00'),(9,'3 Bulan (Discount 10 %)','135000.00','3 Bulan (Discount 10 %)','N','0000-00-00 00:00:00'),(11,'6 Bulan (Discount 15 %)','255000.00','6 Bulan (Discount 15 %)','N','0000-00-00 00:00:00'),(12,'12 Bulan (Discount 20 %)','480000.00','12 Bulan (Discount 20 %)','N','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'secure_login'
--
DELIMITER ;;
DELIMITER ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-01  0:00:02
