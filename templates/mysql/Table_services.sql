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
-- Contenu de la table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` (`id_services`, `serv_name`, `bin`, `port_tcp1`, `port_tcp2`, `port_tcp3`, `ports_tcp_list`, `port_udp1`, `port_udp2`, `port_udp3`, `ports_udp_list`, `to_install`, `is_installed`, `used`) VALUES
(1, 'Seedbox-Manager', '', '', '', '', '', '', '', ' ', ' ', 0, 0, 1),
(2, 'CakeBox-Light', '', '', '', '', '', '', '', '', '', 0, 0, 1),
(3, 'Plex Media Server', '', '32400', '', '', '3005 8324 32469', '', '', '', '1900 5353 32410 32412 32413 32414', 0, 0, 1),
(4, 'Webmin', '', '8190', '', '', '', '', '', '', '', 0, 0, 1),
(5, 'OpenVPN', '', '', '', '', '', '8193', '8194', '8195', '', 0, 0, 1),
(6, 'LogWatch', '', '', '', '', '', '', '', ' ', ' ', 0, 0, 1),
(7, 'Fail2Ban', '', '', '', '', '', '', '', ' ', ' ', 0, 0, 1),
(8, 'PeerGuardian', '', '', '', '', '', '', '', ' ', ' ', 0, 0, 1),
(9, 'rTorrent Block List', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 1),
(10, 'DNScrypt-proxy', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 1),
(11, 'CRON', '', '', '', '', '', '', ' ', ' ', ' ', 1, 0, 0),
(12, 'NginX', '', '8189', '', '', '', '', '', '', '', 1, 0, 0),
(13, 'SSH', '', '8192', '', '', '', '', '', '', '', 1, 0, 0),
(14, 'VSFTPd', '', '8191', '8800', '65000:65535', '', '', '', '', '', 1, 0, 0),
(15, 'PHP7-FPM', '', '', '', '', '', '', ' ', ' ', ' ', 1, 0, 0),
(16, 'Postfix', '', '', '', '', '', '', ' ', ' ', ' ', 1, 0, 0),
(17, 'Networking', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 0),
(18, 'Samba', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 1),
(19, 'NFS', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 1),
(20, 'BIND', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 0),
(21, 'Stunnel', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 0),
(22, 'rTorrent v0.9.6', '/usr/bin/rtorrent', '', '', '', '', '', '', '', '', 1, 0, 0),
(23, 'rTorrent v0.9.8', '/usr/local/bin/rtorrent', '', '', '', '', '', '', '', '', 1, 0, 0),
(24, 'NextCloud', '', '', '', '', '', '', '', '', '', 0, 0, 1),
(25, 'Lets Encrypt', '', '443', '', '', '', '', '', '', '', 0, 0, 1),
(26, 'Tautulli', '', '', '', '', '', '', '', '', '', 0, 0, 1);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
