SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE TABLE IF NOT EXISTS `blocklists` (
  `id_blocklists` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(32) NOT NULL,
  `list_name` varchar(32) NOT NULL,
  `pgl_list_name` varchar(32) NOT NULL,
  `url_infos` varchar(256) NOT NULL,
  `peerguardian_list` varchar(256) NOT NULL,
  `rtorrent_list` varchar(256) NOT NULL,
  `peerguardian_active` tinyint(1) NOT NULL DEFAULT '0',
  `rtorrent_active` tinyint(1) NOT NULL DEFAULT '0',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `comments` varchar(32) NOT NULL,
  `peerguardian_lastupdate` datetime NOT NULL,
  `rtorrent_lastupdate` datetime NOT NULL,
  PRIMARY KEY (`id_blocklists`),
  UNIQUE KEY `url_infos` (`url_infos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `commands` (
  `id_commands` int(11) NOT NULL AUTO_INCREMENT,
  `commands` varchar(32) NOT NULL,
  `reload` tinyint(1) NOT NULL,
  `priority` int(2) NOT NULL,
  `args` varchar(128) NOT NULL,
  `user` varchar(16) NOT NULL,
  PRIMARY KEY (`id_commands`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `is_activated` tinyint(1) NOT NULL DEFAULT '0',
  `is_wished` tinyint(1) NOT NULL DEFAULT '0',
  `forwarder` varchar(16) NOT NULL,
  PRIMARY KEY (`id_dnscrypt_resolvers`),
  UNIQUE KEY `name` (`name`,`full_name`,`resolver_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `lets_encrypt` (
  `id_lets_encrypt` int(11) NOT NULL AUTO_INCREMENT,
  `addresses` varchar(128) NOT NULL,
  `ipv4` varchar(15) NOT NULL,
  PRIMARY KEY (`id_lets_encrypt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `providers_monitoring` (
  `id_providers_monitoring` int(11) NOT NULL AUTO_INCREMENT,
  `provider` varchar(16) NOT NULL,
  `ipv4` varchar(25) NOT NULL,
  `hostname` varchar(32) NOT NULL,
  PRIMARY KEY (`id_providers_monitoring`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `renting` (
  `id_renting` int(1) NOT NULL,
  `model` varchar(64) NOT NULL,
  `tva` decimal(4,2) NOT NULL,
  `global_cost` decimal(4,2) NOT NULL,
  `nb_users` tinyint(2) NOT NULL,
  `price_per_users` decimal(4,2) NOT NULL,
  `method` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_renting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `repositories` (
  `id_repositories` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(5) NOT NULL,
  `dir` varchar(64) NOT NULL,
  `name` varchar(32) NOT NULL,
  `version` varchar(16) NOT NULL,
  `file` varchar(32) NOT NULL,
  `old_file` varchar(32) NOT NULL,
  `url` varchar(256) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `on_boot` int(1) NOT NULL DEFAULT '0',
  `script` varchar(128) NOT NULL,  
  PRIMARY KEY (`id_repositories`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `services` (
  `id_services` int(11) NOT NULL AUTO_INCREMENT,
  `serv_name` varchar(32) NOT NULL,
  `bin` varchar(32) NOT NULL,
  `port_tcp1` varchar(11) NOT NULL,
  `port_tcp2` varchar(11) NOT NULL,
  `port_tcp3` varchar(11) NOT NULL,
  `ports_tcp_list` varchar(32) NOT NULL,
  `port_udp1` varchar(11) NOT NULL,
  `port_udp2` varchar(11) NOT NULL,
  `port_udp3` varchar(11) NOT NULL,
  `ports_udp_list` varchar(32) NOT NULL,
  `to_install` tinyint(1) NOT NULL DEFAULT '0',
  `is_installed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_services`),
  UNIQUE KEY `serv_name` (`serv_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `smtp` (
  `id_smtp` int(11) NOT NULL AUTO_INCREMENT,
  `smtp_provider` varchar(5) NOT NULL DEFAULT 'LOCAL',
  `smtp_username` varchar(64) NOT NULL,
  `smtp_passwd` varchar(64) NOT NULL,
  `smtp_host` varchar(128) NOT NULL,
  `smtp_port` varchar(5) NOT NULL,
  `smtp_email` varchar(64) NOT NULL,
  PRIMARY KEY (`id_smtp`),
  UNIQUE KEY `smtp_provider` (`smtp_provider`,`smtp_username`,`smtp_passwd`,`smtp_host`,`smtp_port`,`smtp_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `system` (
  `id_system` int(11) NOT NULL,
  `mysb_version` varchar(6) NOT NULL,
  `mysb_user` varchar(32) NOT NULL,
  `mysb_password` varchar(32) NOT NULL,
  `hostname` varchar(128) NOT NULL,
  `ipv4` varchar(15) NOT NULL,
  `primary_inet` varchar(16) NOT NULL,
  `timezone` varchar(64) NOT NULL,
  `cert_password` varchar(32) NOT NULL,
  `apt_update` tinyint(1) NOT NULL DEFAULT '0',
  `apt_date` datetime NOT NULL,
  `server_provider` varchar(16) NOT NULL,
  `ip_restriction` tinyint(1) NOT NULL DEFAULT '0',
  `pgl_email_stats` tinyint(1) NOT NULL DEFAULT '0',
  `pgl_watchdog_email` tinyint(1) NOT NULL DEFAULT '0',
  `dnscrypt` tinyint(1) NOT NULL DEFAULT '0',
  `owncloud_cron` tinyint(1) NOT NULL DEFAULT '0',
  `letsencrypt_date` date NOT NULL,
  `letsencrypt_openport` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_system`),
  UNIQUE KEY `mysb_version` (`mysb_version`,`mysb_user`,`mysb_password`,`hostname`,`ipv4`,`primary_inet`,`timezone`,`cert_password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `trackers_list` (
  `id_trackers_list` int(11) NOT NULL AUTO_INCREMENT,
  `tracker` varchar(128) NOT NULL,
  `tracker_domain` varchar(128) NOT NULL,
  `origin` varchar(9) NOT NULL,
  `is_ssl` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `to_check` tinyint(1) NOT NULL DEFAULT '1',
  `ping` varchar(64) NOT NULL,
  PRIMARY KEY (`id_trackers_list`),
  UNIQUE KEY `tracker` (`tracker`,`tracker_domain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `trackers_list_ipv4` (
  `id_trackers_list_ipv4` int(11) NOT NULL AUTO_INCREMENT,
  `id_trackers_list` int(11) NOT NULL,
  `ipv4` varchar(15) NOT NULL,
  PRIMARY KEY (`id_trackers_list_ipv4`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `users_ident` varchar(32) NOT NULL,
  `users_email` varchar(256) NOT NULL,
  `users_passwd` varchar(32) NOT NULL,
  `rpc` varchar(64) NOT NULL,
  `sftp` tinyint(1) NOT NULL DEFAULT '1',
  `sudo` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `scgi_port` varchar(5) NOT NULL,
  `rtorrent_port` varchar(5) NOT NULL,
  `home_dir` varchar(128) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `rtorrent_version` varchar(10) NOT NULL DEFAULT 'v0.9.2',
  `rtorrent_restart` tinyint(1) NOT NULL DEFAULT '0',
  `rtorrent_notify` tinyint(1) NOT NULL DEFAULT '0',
  `language` varchar(2) NOT NULL DEFAULT 'en',
  `init_password` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `users_ident` (`users_ident`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `users_addresses` (
  `id_users_addresses` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `ipv4` varchar(15) NOT NULL,
  `hostname` varchar(256) NOT NULL,
  `check_by` varchar(8) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id_users_addresses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `users_crontab` (
  `id_users_crontab` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `minutes` varchar(16) NOT NULL,
  `hours` varchar(16) NOT NULL,
  `days` varchar(16) NOT NULL,
  `months` varchar(16) NOT NULL,
  `numday` varchar(16) NOT NULL,
  `command` varchar(32) NOT NULL,
  PRIMARY KEY (`id_users_crontab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `users_rtorrent_cfg` (
  `id_users_rtorrent_cfg` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `sub_directory` varchar(16) NOT NULL,
  `can_be_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `to_delete` tinyint(1) NOT NULL DEFAULT '0',
  `sync_mode` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_users_rtorrent_cfg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `vars` (
  `id_vars` int(11) NOT NULL AUTO_INCREMENT,
  `fail2ban_whitelist` varchar(12) NOT NULL,
  `vpn_ip` varchar(37) NOT NULL,
  `white_tcp_port_out` varchar(16) NOT NULL,
  `white_udp_port_out` varchar(16) NOT NULL,
  PRIMARY KEY (`id_vars`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
