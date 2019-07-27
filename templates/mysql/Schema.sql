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
-- Base de donnéees: `MySB_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `annoncers`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `annoncers` (
  `id_annoncers` int(11) NOT NULL AUTO_INCREMENT,
  `scgi_port` varchar(5) NOT NULL,
  `info_hash` varchar(64) NOT NULL,
  `id` varchar(4) NOT NULL,
  `user` varchar(16) NOT NULL,
  PRIMARY KEY (`id_annoncers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `blocklists`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `blocklists` (
  `id_blocklists` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(32) NOT NULL,
  `list_name` varchar(48) NOT NULL,
  `list_id` varchar(34) NOT NULL,
  `update_id` varchar(256) NOT NULL,
  `infos_url` varchar(256) NOT NULL,
  `list_url` varchar(256) NOT NULL,
  `subscription` varchar(5) NOT NULL DEFAULT 'true',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `comments` varchar(64) NOT NULL,
  `lastupdate` datetime NOT NULL,
  PRIMARY KEY (`id_blocklists`),
  UNIQUE KEY `infos_url` (`infos_url`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `commands`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `commands` (
  `id_commands` int(11) NOT NULL AUTO_INCREMENT,
  `commands` varchar(32) NOT NULL,
  `reload` tinyint(1) NOT NULL,
  `priority` smallint(4) NOT NULL,
  `args` varchar(128) NOT NULL,
  `user` varchar(16) NOT NULL,
  PRIMARY KEY (`id_commands`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `dnscrypt_config`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `dnscrypt_config` (
  `id_dnscrypt_config` int(11) NOT NULL DEFAULT '1',
  `ip_version` varchar(4) NOT NULL DEFAULT 'ipv4',
  `processes_qty` tinyint(1) NOT NULL DEFAULT '6',
  `no_logs` varchar(3) NOT NULL DEFAULT 'yes',
  `dnssec` varchar(3) NOT NULL DEFAULT 'yes',
  `namecoin` varchar(3) NOT NULL DEFAULT 'no',
  `random` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id_dnscrypt_config`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `dnscrypt_resolvers`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `dnscrypt_resolvers` (
  `id_dnscrypt_resolvers` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `full_name` varchar(64) NOT NULL,
  `description` varchar(128) NOT NULL,
  `location` varchar(32) NOT NULL,
  `coordinates` varchar(32) NOT NULL,
  `url` varchar(128) NOT NULL,
  `version` varchar(2) NOT NULL,
  `dnssec` varchar(3) NOT NULL,
  `no_logs` varchar(3) NOT NULL,
  `namecoin` varchar(3) NOT NULL,
  `resolver_address` varchar(64) NOT NULL,
  `provider_name` varchar(64) NOT NULL,
  `provider_public_key` varchar(128) NOT NULL,
  `provider_public_key_txt_record` varchar(64) NOT NULL,
  `forwarder` varchar(16) DEFAULT '',
  `ip_version` varchar(4) NOT NULL DEFAULT 'ipv4',
  `certificate` tinyint(1) NOT NULL DEFAULT '0',
  `pid` varchar(16) DEFAULT '',
  `speed` varchar(5) DEFAULT '',
  `comments` varchar(128) DEFAULT '',
  PRIMARY KEY (`id_dnscrypt_resolvers`),
  UNIQUE KEY `name` (`name`,`full_name`,`resolver_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `lets_encrypt`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `lets_encrypt` (
  `id_lets_encrypt` int(11) NOT NULL AUTO_INCREMENT,
  `addresses` varchar(128) NOT NULL,
  `ipv4` varchar(15) NOT NULL,
  PRIMARY KEY (`id_lets_encrypt`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `mails`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `mails` (
  `id_mails` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(16) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `use_case` varchar(24) NOT NULL,
  `info` varchar(128) NOT NULL,
  `mail_address` varchar(128) NOT NULL,
  PRIMARY KEY (`id_mails`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `port_forwarding`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `port_forwarding` (
  `id_port_forwarding` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(64) NOT NULL,
  `from_port` varchar(11) NOT NULL,
  `proto` varchar(7) NOT NULL DEFAULT 'tcp/udp',
  `to_port` varchar(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_reserved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_port_forwarding`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `port_forwarding_addresses`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `port_forwarding_addresses` (
  `id_port_forwarding_addresses` int(11) NOT NULL AUTO_INCREMENT,
  `id_port_forwarding` int(11) NOT NULL,
  `addresses` varchar(128) NOT NULL,
  PRIMARY KEY (`id_port_forwarding_addresses`),
  KEY `id_port_forwarding` (`id_port_forwarding`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `providers_monitoring`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `providers_monitoring` (
  `id_providers_monitoring` int(11) NOT NULL AUTO_INCREMENT,
  `provider` varchar(16) NOT NULL,
  `ipv4` varchar(25) NOT NULL,
  `hostname` varchar(32) NOT NULL,
  PRIMARY KEY (`id_providers_monitoring`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `repositories`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `repositories` (
  `id_repositories` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(8) NOT NULL,
  `dir` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `version` varchar(32) NOT NULL,
  `upgrade` tinyint(1) NOT NULL DEFAULT '0',
  `file` varchar(64) NOT NULL,
  `url` varchar(256) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `on_boot` tinyint(1) NOT NULL DEFAULT '0',
  `script` varchar(128) DEFAULT '',
  PRIMARY KEY (`id_repositories`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `services` (
  `id_services` int(11) NOT NULL AUTO_INCREMENT,
  `serv_name` varchar(32) NOT NULL,
  `bin` varchar(32) DEFAULT '',
  `port_tcp1` varchar(11) DEFAULT '',
  `port_tcp2` varchar(11) DEFAULT '',
  `port_tcp3` varchar(11) DEFAULT '',
  `ports_tcp_list` varchar(48) DEFAULT '',
  `port_udp1` varchar(11) DEFAULT '',
  `port_udp2` varchar(11) DEFAULT '',
  `port_udp3` varchar(11) DEFAULT '',
  `ports_udp_list` varchar(48) DEFAULT '',
  `to_install` tinyint(1) NOT NULL DEFAULT '0',
  `is_installed` tinyint(1) NOT NULL DEFAULT '0',
  `used` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_services`),
  UNIQUE KEY `serv_name` (`serv_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `smtp`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `smtp` (
  `id_smtp` int(11) NOT NULL,
  `smtp_provider` varchar(5) NOT NULL DEFAULT 'LOCAL',
  `smtp_username` varchar(64) DEFAULT '',
  `smtp_passwd` varchar(64) DEFAULT '',
  `smtp_host` varchar(128) DEFAULT '',
  `smtp_port` varchar(5) DEFAULT '',
  `smtp_email` varchar(64) DEFAULT '',
  PRIMARY KEY (`id_smtp`),
  UNIQUE KEY `smtp_provider` (`smtp_provider`,`smtp_username`,`smtp_passwd`,`smtp_host`,`smtp_port`,`smtp_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `system`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `system` (
  `id_system` int(11) NOT NULL,
  `mysb_version` varchar(6) DEFAULT '',
  `mysb_user` varchar(32) DEFAULT '',
  `mysb_password` varchar(32) DEFAULT '',
  `hostname` varchar(128) DEFAULT '',
  `ipv4` varchar(15) DEFAULT '',
  `ipv4_ext` varchar(15) DEFAULT '',
  `primary_inet` varchar(16) DEFAULT '',
  `timezone` varchar(64) NOT NULL DEFAULT 'Europe/Paris',
  `cert_password` varchar(32) DEFAULT '',
  `apt_update` tinyint(1) NOT NULL DEFAULT '0',
  `apt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `server_provider` varchar(16) DEFAULT '',
  `ip_restriction` tinyint(1) NOT NULL DEFAULT '1',
  `files_recycling` tinyint(1) NOT NULL DEFAULT '1',
  `pgl_email_stats` tinyint(1) NOT NULL DEFAULT '1',
  `pgl_watchdog_email` tinyint(1) NOT NULL DEFAULT '1',
  `logwatch` tinyint(1) NOT NULL DEFAULT '1',
  `dnscrypt` tinyint(1) NOT NULL DEFAULT '0',
  `nextcloud_cron` tinyint(1) NOT NULL DEFAULT '0',
  `letsencrypt_date` date NOT NULL DEFAULT '0000-00-00',
  `letsencrypt_openport` tinyint(1) NOT NULL DEFAULT '0',
  `quota_default` bigint(32) NOT NULL DEFAULT '0',
  `total_space_used` bigint(32) NOT NULL DEFAULT '0',
  `rt_active` tinyint(1) NOT NULL DEFAULT '0',
  `rt_model` varchar(64) DEFAULT '',
  `rt_tva` decimal(6,2) NOT NULL DEFAULT '0.00',
  `rt_global_cost` decimal(6,2) NOT NULL DEFAULT '0.00',
  `rt_cost_tva` decimal(6,2) NOT NULL DEFAULT '0.00',
  `rt_nb_users` tinyint(2) NOT NULL DEFAULT '0',
  `rt_price_per_users` decimal(6,2) DEFAULT NULL DEFAULT '0.00',
  `rt_method` tinyint(1) NOT NULL DEFAULT '0',
  `ipv4_additional` varchar(128) DEFAULT '',
  `public_tracker_allow` varchar(7) DEFAULT 'public',
  `block_annoncers` tinyint(1) NOT NULL DEFAULT '1',
  `annoncers_udp` tinyint(1) NOT NULL DEFAULT '0',
  `annoncers_check` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_system`),
  UNIQUE KEY `mysb_version` (`mysb_version`,`mysb_user`,`mysb_password`,`hostname`,`ipv4`,`primary_inet`,`timezone`,`cert_password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `torrents`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `torrents` (
  `id_torrents` int(11) NOT NULL AUTO_INCREMENT,
  `info_hash` varchar(64) NOT NULL,
  `name` varchar(256) NOT NULL DEFAULT '',
  `privacy` varchar(7) NOT NULL DEFAULT 'public',
  `state` varchar(10) NOT NULL DEFAULT '',
  `tree` varchar(1024) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_torrents`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `trackers_list`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `trackers_list` (
  `id_trackers_list` int(11) NOT NULL AUTO_INCREMENT,
  `tracker` varchar(128) NOT NULL,
  `tracker_proto` varchar(5) NOT NULL DEFAULT 'http',
  `tracker_domain` varchar(128) NOT NULL,
  `tracker_port` smallint(5) NOT NULL DEFAULT '80',
  `tracker_uri` varchar(32) NOT NULL DEFAULT '/',
  `privacy` varchar(7) DEFAULT '',
  `is_ssl` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `to_check` tinyint(1) NOT NULL DEFAULT '1',
  `to_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_dead` tinyint(1) NOT NULL DEFAULT '0',
  `cert_expiration` date NOT NULL DEFAULT '0000-00-00',
  `last_check` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_trackers_list`),
  UNIQUE KEY `tracker` (`tracker`,`tracker_domain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `trackers_list_ipv4`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `trackers_list_ipv4` (
  `id_trackers_list_ipv4` int(11) NOT NULL AUTO_INCREMENT,
  `id_trackers_list` int(11) NOT NULL,
  `ipv4` varchar(15) NOT NULL,
  `pgl_banned` tinyint(1) NOT NULL DEFAULT '0',
  `ping` varchar(64) DEFAULT '',
  `last_check` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_trackers_list_ipv4`),
  KEY `id_trackers_list` (`id_trackers_list`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `tracking_rent_history`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `tracking_rent_history` (
  `id_tracking_rent_history` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `year` smallint(4) unsigned zerofill DEFAULT NULL DEFAULT '0000',
  `month` tinyint(2) unsigned zerofill DEFAULT NULL DEFAULT '00',
  `date` mediumint(6) NOT NULL DEFAULT '000000',
  `monthly_price` decimal(6,2) NOT NULL,
  `nb_users` int(4) NOT NULL,
  `users_price` decimal(6,2) DEFAULT NULL,
  `nb_days_month` tinyint(2) DEFAULT NULL,
  `start_of_use` tinyint(2) unsigned zerofill DEFAULT NULL DEFAULT '01',
  `end_of_use` tinyint(2) unsigned zerofill DEFAULT NULL DEFAULT '00',
  `remain_days` tinyint(2) DEFAULT NULL,
  `period_price` decimal(6,2) DEFAULT NULL,
  `old_period_price` decimal(6,2) DEFAULT NULL,
  `old_remain_days` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id_tracking_rent_history`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `tracking_rent_payments`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `tracking_rent_payments` (
  `id_tracking_rent_payments` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `payment_date` date NOT NULL DEFAULT '0000-00-00',
  `amount` decimal(6,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_tracking_rent_payments`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `tracking_rent_options`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `tracking_rent_options` (
  `id_tracking_rent_options` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `amount` decimal(6,2) NOT NULL DEFAULT '0.00',
  `description` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_tracking_rent_options`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `tracking_rent_status`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `tracking_rent_status` (
  `id_tracking_rent_status` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `year` smallint(4) unsigned zerofill DEFAULT NULL DEFAULT '0000',
  `month` tinyint(2) unsigned zerofill DEFAULT NULL DEFAULT '00',
  `date` mediumint(6) NOT NULL DEFAULT '000000',
  `nb_days_used` tinyint(2) DEFAULT NULL DEFAULT '0',
  `period_cost` decimal(6,2) DEFAULT NULL DEFAULT '0.00',
  `already_payed` decimal(6,2) DEFAULT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_tracking_rent_status`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `users_ident` varchar(32) NOT NULL,
  `users_email` varchar(256) NOT NULL,
  `users_passwd` varchar(32) DEFAULT '',
  `rpc` varchar(64) DEFAULT '',
  `sftp` tinyint(1) NOT NULL DEFAULT '1',
  `sudo` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `scgi_port` varchar(5) DEFAULT '',
  `rtorrent_port` varchar(5) DEFAULT '',
  `home_dir` varchar(128) DEFAULT '',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `rtorrent_version` varchar(10) NOT NULL DEFAULT 'v0.9.8',
  `rtorrent_restart` tinyint(1) NOT NULL DEFAULT '0',
  `rtorrent_notify` tinyint(1) NOT NULL DEFAULT '1',
  `language` varchar(2) NOT NULL DEFAULT 'en',
  `init_password` tinyint(1) NOT NULL DEFAULT '0',
  `quota` bigint(32) NOT NULL DEFAULT '0',
  `space_used` bigint(32) NOT NULL DEFAULT '0',
  `period_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `period_days` tinyint(2) NOT NULL DEFAULT '0',
  `treasury` decimal(6,2) NOT NULL DEFAULT '0.00',
  `created_at` date NOT NULL DEFAULT '0000-00-00',
  `account_type` varchar(6) NOT NULL DEFAULT 'normal',
  `quota_type` varchar(6) NOT NULL DEFAULT 'auto',
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `users_ident` (`users_ident`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `users_addresses`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `users_addresses` (
  `id_users_addresses` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `ipv4` varchar(15) NOT NULL,
  `hostname` varchar(256) NOT NULL,
  `check_by` varchar(8) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `last_update` datetime NOT NULL,
  `imported` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_users_addresses`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `users_crontab`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `users_crontab` (
  `id_users_crontab` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `minutes` varchar(16) NOT NULL,
  `hours` varchar(16) NOT NULL,
  `days` varchar(16) NOT NULL,
  `months` varchar(16) NOT NULL,
  `numday` varchar(16) NOT NULL,
  `command` varchar(32) NOT NULL,
  PRIMARY KEY (`id_users_crontab`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `users_history`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `users_history` (
  `id_users_history` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `users_ident` varchar(32) NOT NULL,
  `users_email` varchar(256) NOT NULL,
  `created_at` date NOT NULL DEFAULT '0000-00-00',
  `deleted_at` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_users_history`),
  KEY `id_users` (`id_users`),
  KEY `users_ident` (`users_ident`),
  KEY `users_email` (`users_email`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `users_rtorrent_cfg`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `users_rtorrent_cfg` (
  `id_users_rtorrent_cfg` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `sub_directory` varchar(16) NOT NULL,
  `can_be_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `to_delete` tinyint(1) NOT NULL DEFAULT '0',
  `sync_mode` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_users_rtorrent_cfg`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Structure de la table `users_scripts`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `users_scripts` (
  `id_users_scripts` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `sync_mode` varchar(7) NOT NULL,
  `script` varchar(32) NOT NULL,
  PRIMARY KEY (`id_users_scripts`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Contraintes pour la table `port_forwarding_addresses`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
ALTER TABLE `port_forwarding_addresses`
  DROP FOREIGN KEY IF EXISTS `port_forwarding_addresses_ibfk_1`;

ALTER TABLE `port_forwarding_addresses`
  ADD CONSTRAINT `port_forwarding_addresses_ibfk_1` FOREIGN KEY (`id_port_forwarding`) REFERENCES `port_forwarding` (`id_port_forwarding`) ON DELETE CASCADE ON UPDATE CASCADE;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Contraintes pour la table `trackers_list_ipv4`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
ALTER TABLE `trackers_list_ipv4`
  DROP FOREIGN KEY IF EXISTS `trackers_list_ipv4_ibfk_1`;

ALTER TABLE `trackers_list_ipv4`
  ADD CONSTRAINT `trackers_list_ipv4_ibfk_1` FOREIGN KEY (`id_trackers_list`) REFERENCES `trackers_list` (`id_trackers_list`) ON DELETE CASCADE ON UPDATE CASCADE;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Contraintes pour la table `tracking_rent_history`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
ALTER TABLE `tracking_rent_history`
  DROP FOREIGN KEY IF EXISTS `tracking_rent_history_ibfk_2`;

ALTER TABLE `tracking_rent_history`
  ADD CONSTRAINT `tracking_rent_history_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Contraintes pour la table `tracking_rent_payments`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
ALTER TABLE `tracking_rent_payments`
  DROP FOREIGN KEY IF EXISTS `tracking_rent_payments_ibfk_2`;

ALTER TABLE `tracking_rent_payments`
  ADD CONSTRAINT `tracking_rent_payments_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Contraintes pour la table `tracking_rent_status`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
ALTER TABLE `tracking_rent_status`
  DROP FOREIGN KEY IF EXISTS `tracking_rent_status_ibfk_2`;

ALTER TABLE `tracking_rent_status`
  ADD CONSTRAINT `tracking_rent_status_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Contraintes pour la table `users_addresses`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
ALTER TABLE `users_addresses`
  DROP FOREIGN KEY IF EXISTS `users_addresses_ibfk_1`;

ALTER TABLE `users_addresses`
  ADD CONSTRAINT `users_addresses_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Contraintes pour la table `users_crontab`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
ALTER TABLE `users_crontab`
  DROP FOREIGN KEY IF EXISTS `users_crontab_ibfk_1`;

ALTER TABLE `users_crontab`
  ADD CONSTRAINT `users_crontab_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Contraintes pour la table `users_rtorrent_cfg`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
ALTER TABLE `users_rtorrent_cfg`
  DROP FOREIGN KEY IF EXISTS `users_rtorrent_cfg_ibfk_1`;

ALTER TABLE `users_rtorrent_cfg`
  ADD CONSTRAINT `users_rtorrent_cfg_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Contraintes pour la table `users_scripts`
--

/*!40101 SET @saved_cs_client	 = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
ALTER TABLE `users_scripts`
  DROP FOREIGN KEY IF EXISTS `users_scripts_ibfk_1`;

ALTER TABLE `users_scripts`
  ADD CONSTRAINT `users_scripts_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
