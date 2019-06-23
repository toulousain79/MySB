-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost	Database: MySB_db
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Contenu de la table `providers_monitoring`
--

LOCK TABLES `providers_monitoring` WRITE;
/*!40000 ALTER TABLE `providers_monitoring` DISABLE KEYS */;
INSERT INTO `providers_monitoring` (`provider`, `ipv4`, `hostname`) VALUES
('ONLINE', '62.210.16.0/24', ''),
('DIGICUBE', '95.130.8.0/24', ''),
('OVH', '', 'proxy.rbx.ovh.net'),
('OVH', '', 'proxy.sbg.ovh.net'),
('OVH', '', 'proxy.bhs.ovh.net'),
('OVH', '', 'ping.ovh.net'),
('OVH', '', 'proxy.p19.ovh.net'),
('OVH', '', 'proxy.ovh.net'),
('OVH', '92.222.184.0/24', ''),
('OVH', '92.222.185.0/24', ''),
('OVH', '92.222.186.0/24', ''),
('OVH', '167.114.37.0/24', ''),
('OVH', '151.80.231.244/32', ''),
('OVH', '151.80.231.245/32', ''),
('OVH', '151.80.231.246/32', ''),
('OVH', '151.80.231.247/32', ''),
('OVH', '37.187.231.251/32', ''),
('OVH', '213.186.33.62/32', '');
/*!40000 ALTER TABLE `providers_monitoring` ENABLE KEYS */;
UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
