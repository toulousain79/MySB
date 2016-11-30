--
-- Structure de la table `tracking_rent_history`
--

CREATE TABLE IF NOT EXISTS `tracking_rent_history` (
  `id_tracking_rent_history` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `year` smallint(4) DEFAULT NULL,
  `month` tinyint(2) DEFAULT NULL,
  `monthly_price` decimal(4,2) NOT NULL,
  `nb_users` int(4) NOT NULL,
  `users_price` decimal(4,2) DEFAULT NULL,
  `nb_days_month` tinyint(2) DEFAULT NULL,
  `start_of_use` tinyint(2) DEFAULT NULL,
  `end_of_use` tinyint(2) DEFAULT NULL,
  `remain_days` tinyint(2) DEFAULT NULL,
  `period_price` decimal(4,2) DEFAULT NULL,
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
	SET NEW.year = YEAR(NOW());
	SET NEW.month = MONTH(NOW());
	SET NEW.users_price = (NEW.monthly_price / NEW.nb_users);
	SET NEW.nb_days_month = RIGHT(LAST_DAY(NOW()), 2);
	SET NEW.start_of_use = DAY(NOW());
	SET NEW.end_of_use = NEW.nb_days_month;
	SET NEW.remain_days = (NEW.end_of_use - NEW.start_of_use + 1);
	SET NEW.period_price = (((NEW.monthly_price / NEW.nb_users) / NEW.nb_days_month) * NEW.remain_days);
	UPDATE tracking_rent_status SET nb_days_used=NEW.remain_days, monthly_cost=NEW.period_price WHERE id_users=NEW.id_users AND year=NEW.year AND month=NEW.month;
END
//
DELIMITER ;

DROP TRIGGER IF EXISTS `PeriodPrice_OnUpdate`;
DELIMITER //
CREATE TRIGGER `PeriodPrice_OnUpdate` BEFORE UPDATE ON `tracking_rent_history`
 FOR EACH ROW BEGIN
	SET NEW.remain_days = (NEW.end_of_use - NEW.start_of_use + 1);
	SET NEW.period_price = (((NEW.monthly_price / NEW.nb_users) / NEW.nb_days_month) * NEW.remain_days);
	UPDATE tracking_rent_status SET
			monthly_cost=(SELECT SUM(period_price) FROM tracking_rent_history WHERE id_users=NEW.id_users AND year=NEW.year AND month=NEW.month),
			nb_days_used=NEW.remain_days
		WHERE id_users=NEW.id_users AND year=NEW.year AND month=NEW.month;
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
  `payment_date` date DEFAULT NULL,
  `amount` decimal(4,2) DEFAULT NULL,
  `balance` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`id_tracking_rent_payments`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Déclencheurs `tracking_rent_payments`
--
DROP TRIGGER IF EXISTS `UsersTreasuryUpdate`;
DELIMITER //
CREATE TRIGGER `UsersTreasuryUpdate` AFTER DELETE ON `tracking_rent_payments`
 FOR EACH ROW BEGIN
	UPDATE users SET treasury=(SELECT (SUM(balance)-OLD.balance) FROM tracking_rent_payments) WHERE id_users=OLD.id_users;
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
  `year` smallint(4) DEFAULT NULL,
  `month` tinyint(2) DEFAULT NULL,
  `nb_days_used` tinyint(2) DEFAULT NULL,
  `monthly_cost` decimal(4,2) DEFAULT NULL,
  `treasury` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`id_tracking_rent_status`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Déclencheurs `tracking_rent_status`
--
DROP TRIGGER IF EXISTS `MonthlyCost_OnUpdate`;
DELIMITER //
CREATE TRIGGER `MonthlyCost_OnUpdate` BEFORE UPDATE ON `tracking_rent_status`
 FOR EACH ROW BEGIN
	SET nb_days_used = (SELECT sum(remain_days) FROM tracking_rent_history WHERE id_users=NEW.id_users AND year=NEW.year AND month=NEW.month);
	SET monthly_cost = (SELECT sum(period_price) FROM tracking_rent_history WHERE id_users=NEW.id_users AND year=NEW.year AND month=NEW.month);
END
//
DELIMITER ;

