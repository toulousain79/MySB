/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Contenu de la table `services`
--

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
(12, 'NginX', '', '8189', '8888', '', '', '', '', '', '', 1, 0, 0),
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
(23, 'rTorrent v0.9.7', '/usr/local/bin/rtorrent', '', '', '', '', '', '', '', '', 1, 0, 0),
(24, 'NextCloud', '', '', '', '', '', '', '', '', '', 0, 0, 1),
(25, 'Lets Encrypt', '', '443', '', '', '', '', '', '', '', 0, 0, 1),
(26, 'Tautulli', '', '', '', '', '', '', '', '', '', 0, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
