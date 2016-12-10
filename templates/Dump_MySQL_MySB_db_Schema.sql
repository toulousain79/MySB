-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 01 Décembre 2016 à 10:17
-- Version du serveur: 5.5.53
-- Version de PHP: 5.4.45-0+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `MySB_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `blocklists`
--

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

-- --------------------------------------------------------

--
-- Structure de la table `commands`
--

CREATE TABLE IF NOT EXISTS `commands` (
  `id_commands` int(11) NOT NULL AUTO_INCREMENT,
  `commands` varchar(32) NOT NULL,
  `reload` tinyint(1) NOT NULL,
  `priority` int(2) NOT NULL,
  `args` varchar(128) NOT NULL,
  `user` varchar(16) NOT NULL,
  PRIMARY KEY (`id_commands`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `dnscrypt_resolvers`
--

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

-- --------------------------------------------------------

--
-- Structure de la table `lets_encrypt`
--

CREATE TABLE IF NOT EXISTS `lets_encrypt` (
  `id_lets_encrypt` int(11) NOT NULL AUTO_INCREMENT,
  `addresses` varchar(128) NOT NULL,
  `ipv4` varchar(15) NOT NULL,
  PRIMARY KEY (`id_lets_encrypt`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `port_forwarding`
--

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

-- --------------------------------------------------------

--
-- Structure de la table `port_forwarding_addresses`
--

CREATE TABLE IF NOT EXISTS `port_forwarding_addresses` (
  `id_port_forwarding_addresses` int(11) NOT NULL AUTO_INCREMENT,
  `id_port_forwarding` int(11) NOT NULL,
  `addresses` varchar(128) NOT NULL,
  PRIMARY KEY (`id_port_forwarding_addresses`),
  KEY `id_port_forwarding` (`id_port_forwarding`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `providers_monitoring`
--

CREATE TABLE IF NOT EXISTS `providers_monitoring` (
  `id_providers_monitoring` int(11) NOT NULL AUTO_INCREMENT,
  `provider` varchar(16) NOT NULL,
  `ipv4` varchar(25) NOT NULL,
  `hostname` varchar(32) NOT NULL,
  PRIMARY KEY (`id_providers_monitoring`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `repositories`
--

CREATE TABLE IF NOT EXISTS `repositories` (
  `id_repositories` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(5) NOT NULL,
  `dir` varchar(64) NOT NULL,
  `name` varchar(32) NOT NULL,
  `version` varchar(16) NOT NULL,
  `upgrade` tinyint(1) NOT NULL DEFAULT '0',
  `file` varchar(32) NOT NULL,
  `url` varchar(256) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `on_boot` tinyint(1) NOT NULL DEFAULT '0',
  `script` varchar(128) NOT NULL,
  PRIMARY KEY (`id_repositories`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

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
  `used` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_services`),
  UNIQUE KEY `serv_name` (`serv_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `smtp`
--

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

-- --------------------------------------------------------

--
-- Structure de la table `system`
--

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
  `logwatch` tinyint(1) NOT NULL DEFAULT '0',
  `owncloud_cron` tinyint(1) NOT NULL DEFAULT '0',
  `letsencrypt_date` date NOT NULL DEFAULT '0000-00-00',
  `letsencrypt_openport` tinyint(1) NOT NULL DEFAULT '0',
  `quota_default` int(32) NOT NULL,
  `rt_model` varchar(64) NOT NULL,
  `rt_tva` decimal(6,2) NOT NULL DEFAULT '0.00',
  `rt_global_cost` decimal(6,2) NOT NULL DEFAULT '0.00',
  `rt_cost_tva` decimal(6,2) NOT NULL DEFAULT '0.00',
  `rt_nb_users` tinyint(2) NOT NULL DEFAULT '0',
  `rt_price_per_users` decimal(6,2) DEFAULT NULL DEFAULT '0.00',
  `rt_method` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_system`),
  UNIQUE KEY `mysb_version` (`mysb_version`,`mysb_user`,`mysb_password`,`hostname`,`ipv4`,`primary_inet`,`timezone`,`cert_password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déclencheurs `system`
--
DROP TRIGGER IF EXISTS `PricePerUser`;
DELIMITER //
CREATE TRIGGER `PricePerUser` BEFORE UPDATE ON `system`
 FOR EACH ROW BEGIN
	SET NEW.rt_price_per_users = (NEW.rt_cost_tva / NEW.rt_nb_users);

	IF (NEW.rt_cost_tva != '0.00' AND OLD.rt_cost_tva != NEW.rt_cost_tva) THEN
		SET @NbUsers = NEW.rt_nb_users;
		SET @TotalUsers = NEW.rt_nb_users;
		SET @TempIdUser = 1;
		IF (@NbUsers > 0) THEN
			WHILE @NbUsers > 0 DO
				SET @IdUserExist = (SELECT count(id_users) FROM users WHERE id_users=@TempIdUser);
				IF (@IdUserExist > 0) THEN
					SET @Exist = (SELECT count(id_tracking_rent_history) FROM tracking_rent_history WHERE id_users=@TempIdUser LIMIT 1);
					IF (@Exist = 0) THEN
						INSERT INTO tracking_rent_status (id_users) VALUES (@TempIdUser);
						INSERT INTO tracking_rent_history (id_users,monthly_price,nb_users,start_of_use,end_of_use) VALUES (@TempIdUser,NEW.rt_cost_tva,@TotalUsers,DATE_FORMAT(NOW(),'%d'),DATE_FORMAT(NOW(),'%d'));
					END IF;
				END IF;
				SET @NbUsers = @NbUsers-1;
				SET @TempIdUser = @TempIdUser+1;
			END WHILE;
		END IF;
	END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `trackers_list`
--

CREATE TABLE IF NOT EXISTS `trackers_list` (
  `id_trackers_list` int(11) NOT NULL AUTO_INCREMENT,
  `tracker` varchar(128) NOT NULL,
  `tracker_domain` varchar(128) NOT NULL,
  `origin` varchar(9) NOT NULL,
  `is_ssl` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `to_check` tinyint(1) NOT NULL DEFAULT '1',
  `to_delete` tinyint(1) NOT NULL DEFAULT '0',
  `ping` varchar(64) NOT NULL,
  `cert_expiration` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_trackers_list`),
  UNIQUE KEY `tracker` (`tracker`,`tracker_domain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `trackers_list_ipv4`
--

CREATE TABLE IF NOT EXISTS `trackers_list_ipv4` (
  `id_trackers_list_ipv4` int(11) NOT NULL AUTO_INCREMENT,
  `id_trackers_list` int(11) NOT NULL,
  `ipv4` varchar(15) NOT NULL,
  PRIMARY KEY (`id_trackers_list_ipv4`),
  KEY `id_trackers_list` (`id_trackers_list`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tracking_rent_history`
--

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

--
-- Déclencheurs `tracking_rent_history`
--
DROP TRIGGER IF EXISTS `PeriodPrice_OnInsert`;
DELIMITER //
CREATE TRIGGER `PeriodPrice_OnInsert` BEFORE INSERT ON `tracking_rent_history`
 FOR EACH ROW BEGIN
	IF (NEW.year = '0000') THEN
		SET NEW.year = DATE_FORMAT(NOW(),'%Y');
	END IF;
	IF (NEW.month = '00') THEN
		SET NEW.month = DATE_FORMAT(NOW(),'%m');
	END IF;
	SET NEW.date = CONCAT(NEW.year, NEW.month);
	SET NEW.users_price = (NEW.monthly_price / NEW.nb_users);
	SET NEW.nb_days_month = RIGHT(LAST_DAY( CONCAT(NEW.year,NEW.month,'01') ), 2);
	IF (NEW.end_of_use = '00') THEN
		SET NEW.end_of_use = NEW.nb_days_month;
	END IF;
	SET NEW.remain_days = (NEW.end_of_use - NEW.start_of_use + 1);
	SET NEW.period_price = (((NEW.monthly_price / NEW.nb_users) / NEW.nb_days_month) * NEW.remain_days);
	IF (NEW.start_of_use = '01') THEN
		SET NEW.old_period_price = '0.00';
		SET NEW.old_remain_days = 0;
	ELSE
		SET NEW.old_period_price = (SELECT period_price FROM users WHERE id_users=NEW.id_users);
		SET NEW.old_remain_days = (SELECT period_days FROM users WHERE id_users=NEW.id_users);
	END IF;

	UPDATE users SET period_days=NEW.remain_days, period_price=NEW.period_price WHERE id_users=NEW.id_users;
	UPDATE tracking_rent_status SET nb_days_used=NEW.remain_days, period_cost=NEW.period_price WHERE id_users=NEW.id_users AND year=NEW.year AND month=NEW.month;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `PeriodPrice_OnUpdate`;
DELIMITER //
CREATE TRIGGER `PeriodPrice_OnUpdate` BEFORE UPDATE ON `tracking_rent_history`
 FOR EACH ROW BEGIN
	SET NEW.date = CONCAT(NEW.year, NEW.month);
	SET NEW.users_price = (NEW.monthly_price / NEW.nb_users);
	SET NEW.remain_days = (NEW.end_of_use - NEW.start_of_use + 1);
	SET NEW.period_price = (((NEW.monthly_price / NEW.nb_users) / NEW.nb_days_month) * NEW.remain_days);
	UPDATE users SET period_price=NEW.period_price, period_days=NEW.remain_days WHERE id_users=NEW.id_users;
	UPDATE tracking_rent_status SET nb_days_used=(NEW.old_remain_days+NEW.remain_days), period_cost=(NEW.old_period_price+NEW.period_price) WHERE id_users=NEW.id_users AND year=NEW.year AND month=NEW.month;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `tracking_rent_payments`
--

CREATE TABLE IF NOT EXISTS `tracking_rent_payments` (
  `id_tracking_rent_payments` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `payment_date` date NOT NULL DEFAULT '0000-00-00',
  `amount` decimal(6,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_tracking_rent_payments`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Déclencheurs `tracking_rent_payments`
--
DROP TRIGGER IF EXISTS `TreasuryUpdate_OnInsert`;
DELIMITER //
CREATE TRIGGER `TreasuryUpdate_OnInsert` BEFORE INSERT ON `tracking_rent_payments`
 FOR EACH ROW BEGIN
	DECLARE IdStatus INTEGER DEFAULT 0;
	DECLARE PeriodCost DECIMAL(6,2) DEFAULT '0.00';
	DECLARE AlreadyPayed DECIMAL(6,2) DEFAULT '0.00';
	SET @Treasury = ((SELECT treasury FROM users WHERE id_users=NEW.id_users)+NEW.amount);
	SET @NbStatus = (SELECT count(id_tracking_rent_status) FROM tracking_rent_status WHERE id_users=NEW.id_users AND period_cost!=already_payed);

	IF (@NbStatus > 0) THEN
		WHILE @NbStatus > 0 DO
			SELECT id_tracking_rent_status, period_cost, already_payed INTO IdStatus, PeriodCost, AlreadyPayed FROM tracking_rent_status WHERE id_users=NEW.id_users AND period_cost!=already_payed ORDER BY CONCAT(year, month) ASC LIMIT 1;
			SET @Treasury = (@Treasury-(PeriodCost-AlreadyPayed));
			IF (@Treasury >= 0) THEN
				SET @NewAlreadyPayed = PeriodCost;
			ELSE
				SET @NewAlreadyPayed = '0.00';
			END IF;
			UPDATE tracking_rent_status SET already_payed=@NewAlreadyPayed WHERE id_tracking_rent_status=IdStatus;

			SET @NbStatus = @NbStatus-1;
		END WHILE;
	END IF;

	UPDATE users SET treasury=@Treasury WHERE id_users=NEW.id_users;
 END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `TreasuryUpdate_OnDelete`;
DELIMITER //
CREATE TRIGGER `TreasuryUpdate_OnDelete` BEFORE DELETE ON `tracking_rent_payments`
 FOR EACH ROW BEGIN
	DECLARE IdStatus INTEGER DEFAULT 0;
	DECLARE PeriodCost DECIMAL(6,2) DEFAULT '0.00';
	DECLARE AlreadyPayed DECIMAL(6,2) DEFAULT '0.00';
	SET @Treasury = ((SELECT treasury FROM users WHERE id_users=OLD.id_users)-OLD.amount);
	SET @NbStatus = (SELECT count(id_tracking_rent_status) FROM tracking_rent_status WHERE id_users=OLD.id_users AND period_cost!=already_payed);

	IF (@NbStatus > 0) THEN
		WHILE @NbStatus > 0 DO
			SELECT id_tracking_rent_status, period_cost, already_payed INTO IdStatus, PeriodCost, AlreadyPayed FROM tracking_rent_status WHERE id_users=OLD.id_users AND period_cost!=already_payed ORDER BY CONCAT(year, month) DESC LIMIT 1;
			IF (@Treasury >= AlreadyPayed) THEN
				SET @NewAlreadyPayed = -PeriodCost;
				SET @Treasury = (@Treasury-PeriodCost);
			ELSE
				SET @NewAlreadyPayed = PeriodCost-@Treasury;
				SET @Treasury = @Treasury-(PeriodCost-@NewAlreadyPayed);
			END IF;
			UPDATE tracking_rent_status SET already_payed=@NewAlreadyPayed WHERE id_tracking_rent_status=IdStatus;
			SET @NbStatus = @NbStatus-1;
		END WHILE;
	END IF;

	UPDATE users SET treasury=@Treasury WHERE id_users=OLD.id_users;
 END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `tracking_rent_status`
--

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

--
-- Déclencheurs `tracking_rent_status`
--
DROP TRIGGER IF EXISTS `NewStatus_OnInsert`;
DELIMITER //
CREATE TRIGGER `NewStatus_OnInsert` BEFORE INSERT ON `tracking_rent_status`
 FOR EACH ROW BEGIN
	IF (NEW.year = '0000') THEN
		SET NEW.year = DATE_FORMAT(NOW(),'%Y');
	END IF;
	IF (NEW.month = '00') THEN
		SET NEW.month = DATE_FORMAT(NOW(),'%m');
	END IF;
	SET NEW.date = CONCAT(NEW.year, NEW.month);
 END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `NewStatus_OnUpdate`;
DELIMITER //
CREATE TRIGGER `NewStatus_OnUpdate` BEFORE UPDATE ON `tracking_rent_status`
 FOR EACH ROW BEGIN
	SET NEW.date = CONCAT(NEW.year, NEW.month);
	IF (NEW.already_payed = '9999.99') THEN
		SET NEW.already_payed = NEW.period_cost;
	END IF;	
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

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
  `rtorrent_version` varchar(10) NOT NULL DEFAULT 'v0.9.6',
  `rtorrent_restart` tinyint(1) NOT NULL DEFAULT '0',
  `rtorrent_notify` tinyint(1) NOT NULL DEFAULT '0',
  `language` varchar(2) NOT NULL DEFAULT 'en',
  `init_password` tinyint(1) NOT NULL DEFAULT '0',
  `quota` int(32) NOT NULL DEFAULT '0',
  `period_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `period_days` tinyint(2) NOT NULL DEFAULT '0',
  `treasury` decimal(6,2) NOT NULL DEFAULT '0.00',
  `created_at` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `users_ident` (`users_ident`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Déclencheurs `users`
--
DROP TRIGGER IF EXISTS `AddUsersHistory_BeforeInsert`;
DELIMITER //
CREATE TRIGGER `AddUsersHistory_BeforeInsert` BEFORE INSERT ON `users`
 FOR EACH ROW BEGIN
	SET NEW.created_at=DATE_FORMAT(NOW(),'%Y-%m-%d');
	UPDATE system SET rt_nb_users=rt_nb_users+1 WHERE id_system=1;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `AddUsersHistory_AfterInsert`;
DELIMITER //
CREATE TRIGGER `AddUsersHistory_AfterInsert` AFTER INSERT ON `users`
 FOR EACH ROW BEGIN
	INSERT INTO users_history (id_users,users_ident,users_email,created_at) VALUES (NEW.id_users,NEW.users_ident,NEW.users_email,NEW.created_at);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `KeepUserHistory_BeforeDelete`;
DELIMITER //
CREATE TRIGGER `KeepUserHistory_BeforeDelete` BEFORE DELETE ON `users`
 FOR EACH ROW BEGIN
	UPDATE system SET rt_nb_users=rt_nb_users+1 WHERE id_system=1;
	UPDATE users_history SET deleted_at=DATE_FORMAT(NOW(),'%Y-%m-%d') WHERE id_users=OLD.id_users;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `UpdateUsersHistory_BeforeUpdate`;
DELIMITER //
CREATE TRIGGER `UpdateUsersHistory_BeforeUpdate` BEFORE UPDATE ON `users`
 FOR EACH ROW BEGIN
	IF (OLD.created_at = '0000-00-00') THEN
		IF (NEW.created_at = '0000-00-00') THEN
			SET NEW.created_at = DATE_FORMAT(NOW(),'%Y-%m-%d');
		END IF;
		INSERT INTO users_history (id_users,users_ident,users_email,created_at) VALUES (NEW.id_users,NEW.users_ident,NEW.users_email,NEW.created_at);
	ELSE
		UPDATE users_history SET users_email=NEW.users_email, created_at=NEW.created_at WHERE id_users=NEW.id_users;
	END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `users_addresses`
--

CREATE TABLE IF NOT EXISTS `users_addresses` (
  `id_users_addresses` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `ipv4` varchar(15) NOT NULL,
  `hostname` varchar(256) NOT NULL,
  `check_by` varchar(8) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id_users_addresses`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users_crontab`
--

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

-- --------------------------------------------------------

--
-- Structure de la table `users_history`
--

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

-- --------------------------------------------------------

--
-- Structure de la table `users_rtorrent_cfg`
--

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

-- --------------------------------------------------------

--
-- Structure de la table `users_scripts`
--

CREATE TABLE IF NOT EXISTS `users_scripts` (
  `id_users_scripts` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `sync_mode` varchar(7) NOT NULL,
  `script` varchar(32) NOT NULL,
  PRIMARY KEY (`id_users_scripts`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `vars`
--

CREATE TABLE IF NOT EXISTS `vars` (
  `id_vars` int(11) NOT NULL AUTO_INCREMENT,
  `fail2ban_whitelist` varchar(12) NOT NULL,
  `vpn_ip` varchar(37) NOT NULL,
  `white_tcp_port_out` varchar(16) NOT NULL,
  `white_udp_port_out` varchar(16) NOT NULL,
  PRIMARY KEY (`id_vars`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `port_forwarding_addresses`
--
ALTER TABLE `port_forwarding_addresses`
  ADD CONSTRAINT `port_forwarding_addresses_ibfk_1` FOREIGN KEY (`id_port_forwarding`) REFERENCES `port_forwarding` (`id_port_forwarding`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `trackers_list_ipv4`
--
ALTER TABLE `trackers_list_ipv4`
  ADD CONSTRAINT `trackers_list_ipv4_ibfk_1` FOREIGN KEY (`id_trackers_list`) REFERENCES `trackers_list` (`id_trackers_list`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tracking_rent_history`
--
ALTER TABLE `tracking_rent_history`
  ADD CONSTRAINT `tracking_rent_history_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users_history` (`id_users`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `tracking_rent_payments`
--
ALTER TABLE `tracking_rent_payments`
  ADD CONSTRAINT `tracking_rent_payments_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users_history` (`id_users`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `tracking_rent_status`
--
ALTER TABLE `tracking_rent_status`
  ADD CONSTRAINT `tracking_rent_status_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users_history` (`id_users`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_addresses`
--
ALTER TABLE `users_addresses`
  ADD CONSTRAINT `users_addresses_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_crontab`
--
ALTER TABLE `users_crontab`
  ADD CONSTRAINT `users_crontab_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_rtorrent_cfg`
--
ALTER TABLE `users_rtorrent_cfg`
  ADD CONSTRAINT `users_rtorrent_cfg_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_scripts`
--
ALTER TABLE `users_scripts`
  ADD CONSTRAINT `users_scripts_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
