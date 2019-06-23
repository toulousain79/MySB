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
-- Contenu de la table `lets_encrypt`
--

LOCK TABLES `lets_encrypt` WRITE;
/*!40000 ALTER TABLE `lets_encrypt` DISABLE KEYS */;
INSERT INTO `lets_encrypt` (`addresses`, `ipv4`) VALUES
('acme-v01.api.letsencrypt.org', ''),
('acme-v02.api.letsencrypt.org', ''),
('ocsp.root-x1.letsencrypt.org', ''),
('ocsp.int-x1.letsencrypt.org', ''),
('ocsp.int-x2.letsencrypt.org', ''),
('ocsp.int-x3.letsencrypt.org', ''),
('ocsp.int-x4.letsencrypt.org', ''),
('acme-staging.api.letsencrypt.org', ''),
('acme-staging-v02.api.letsencrypt.org', ''),
('ocsp.staging-x1.letsencrypt.org', ''),
('oak.ct.letsencrypt.org', ''),
('testflume.ct.letsencrypt.org', '');
/*!40000 ALTER TABLE `lets_encrypt` ENABLE KEYS */;
UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
