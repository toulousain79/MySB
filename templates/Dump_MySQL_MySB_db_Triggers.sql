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

--
-- Déclencheurs `tracking_rent_history`
--
DROP TRIGGER IF EXISTS `PeriodPrice_OnInsert`;
DELIMITER //
CREATE TRIGGER `PeriodPrice_OnInsert` BEFORE INSERT ON `tracking_rent_history`
 FOR EACH ROW BEGIN
	DECLARE NbDaysUsed INT(2) DEFAULT '00';
	DECLARE PeriodCost DECIMAL(6,2) DEFAULT '0.00';
	DECLARE AlreadyPayed DECIMAL(6,2) DEFAULT '0.00';
	IF (NEW.year = '0000') THEN
		SET NEW.year = DATE_FORMAT(NOW(),'%Y');
	END IF;
	IF (NEW.month = '00') THEN
		SET NEW.month = DATE_FORMAT(NOW(),'%m');
	END IF;
	SET NEW.date = CONCAT(NEW.year, NEW.month);
	SET NEW.users_price = ROUND((NEW.monthly_price / NEW.nb_users), 2);
	SET NEW.nb_days_month = RIGHT(LAST_DAY( CONCAT(NEW.year,NEW.month,'01') ), 2);
	IF (NEW.start_of_use = '01') OR (NEW.start_of_use = NEW.end_of_use) THEN
		SET NEW.old_period_price = '0.00';
		SET NEW.old_remain_days = 0;
	ELSE
		SET NEW.old_period_price = (SELECT period_price FROM users WHERE id_users=NEW.id_users);
		SET NEW.old_remain_days = (SELECT period_days FROM users WHERE id_users=NEW.id_users);
	END IF;
	IF (NEW.end_of_use = '00') THEN
		SET NEW.end_of_use = NEW.nb_days_month;
	END IF;
	SET NEW.remain_days = (NEW.end_of_use - NEW.start_of_use + 1);
	SET NEW.period_price = ROUND((((NEW.monthly_price / NEW.nb_users) / NEW.nb_days_month) * NEW.remain_days), 2);

	SET @Treasury = ROUND(((SELECT treasury FROM users WHERE id_users=NEW.id_users)), 2);
	SELECT nb_days_used, period_cost, already_payed INTO NbDaysUsed, PeriodCost, AlreadyPayed FROM tracking_rent_status WHERE id_users=NEW.id_users AND year=NEW.year AND month=NEW.month;
	SET PeriodCost = ROUND((PeriodCost+NEW.period_price), 2);

	IF (@Treasury > 0.00) THEN
		IF (AlreadyPayed < PeriodCost) THEN
			WHILE (@Treasury >= 0.00) AND (AlreadyPayed <= PeriodCost) DO
				SET AlreadyPayed = AlreadyPayed+0.01;
				SET @Treasury = @Treasury-0.01;
			END WHILE;
		END IF;
	ELSE
		SET @Treasury = @Treasury - (NEW.period_price-NEW.old_period_price);
	END IF;

	UPDATE users SET period_price=NEW.period_price, period_days=(NEW.remain_days + NEW.old_remain_days), treasury=@Treasury WHERE id_users=NEW.id_users;
	UPDATE tracking_rent_status SET nb_days_used=(NbDaysUsed+NEW.remain_days), period_cost=PeriodCost WHERE id_users=NEW.id_users AND year=NEW.year AND month=NEW.month;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `PeriodPrice_OnUpdate`;
DELIMITER //
CREATE TRIGGER `PeriodPrice_OnUpdate` BEFORE UPDATE ON `tracking_rent_history`
 FOR EACH ROW BEGIN
	DECLARE PeriodCost DECIMAL(6,2) DEFAULT '0.00';
	DECLARE AlreadyPayed DECIMAL(6,2) DEFAULT '0.00';
	SET NEW.date = CONCAT(NEW.year, NEW.month);
	SET NEW.users_price = ROUND((NEW.monthly_price / NEW.nb_users), 2);
	SET NEW.remain_days = (NEW.end_of_use - NEW.start_of_use + 1);
	SET NEW.period_price = ROUND((((NEW.monthly_price / NEW.nb_users) / NEW.nb_days_month) * NEW.remain_days), 2);
	SET NEW.old_period_price = OLD.period_price;
	SET NEW.old_remain_days = OLD.remain_days;

	SET @Treasury = ROUND((SELECT treasury FROM users WHERE id_users=NEW.id_users), 2);
	SELECT period_cost, already_payed INTO PeriodCost, AlreadyPayed FROM tracking_rent_status WHERE id_users=NEW.id_users AND year=NEW.year AND month=NEW.month;
	IF (NEW.nb_users != OLD.nb_users) OR (NEW.end_of_use < OLD.end_of_use) THEN
		SET @Treasury = @Treasury + OLD.period_price;
		SET @DiffPeriodCost = NEW.period_price;
		SET PeriodCost = ROUND((PeriodCost-OLD.period_price+NEW.period_price), 2);
	ELSE
		SET @DiffPeriodCost = (NEW.period_price-OLD.period_price);
		SET PeriodCost = ROUND((PeriodCost+@DiffPeriodCost), 2);
	END IF;

	IF (@Treasury > 0.00) THEN
		IF (AlreadyPayed < PeriodCost) THEN
			WHILE (@Treasury >= 0.00) AND (AlreadyPayed <= PeriodCost) DO
				SET AlreadyPayed = AlreadyPayed+0.01;
				SET @Treasury = @Treasury-0.01;
			END WHILE;
		END IF;
	ELSE
		WHILE (@DiffPeriodCost > 0.00) DO
			SET @DiffPeriodCost = @DiffPeriodCost-0.01;
			SET @Treasury = @Treasury-0.01;
		END WHILE;
	END IF;

	UPDATE users SET period_price=NEW.period_price, period_days=NEW.remain_days, treasury=@Treasury WHERE id_users=NEW.id_users;
	UPDATE tracking_rent_status SET nb_days_used=(nb_days_used+(NEW.remain_days-OLD.remain_days)), period_cost=PeriodCost, already_payed=AlreadyPayed WHERE id_users=NEW.id_users AND year=NEW.year AND month=NEW.month;
END
//
DELIMITER ;

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
	SET @Amount = NEW.amount;
	SET @MainUserId = (SELECT id_users FROM users WHERE admin=1);
	SET @Treasury = (SELECT treasury FROM users WHERE id_users=NEW.id_users);
	SET @NbStatus = (SELECT count(id_tracking_rent_status) FROM tracking_rent_status WHERE id_users=NEW.id_users AND period_cost!=already_payed);

	IF (@NbStatus > 0) THEN
		WHILE @NbStatus > 0 DO
			SELECT id_tracking_rent_status, period_cost, already_payed INTO IdStatus, PeriodCost, AlreadyPayed FROM tracking_rent_status WHERE id_users=NEW.id_users AND period_cost!=already_payed ORDER BY CONCAT(year, month) ASC LIMIT 1;
			SET @Diff = PeriodCost-AlreadyPayed;

			IF (@Amount >= @Diff) THEN
				SET AlreadyPayed = AlreadyPayed+@Diff;
				SET @Treasury = @Treasury+@Diff;
				SET @Amount = @Amount-@Diff;
			ELSE
				WHILE (@Amount > 0.00) AND (@Diff <= PeriodCost) DO
					SET AlreadyPayed = AlreadyPayed+0.01;
					SET @Treasury = @Treasury+0.01;
					SET @Amount = @Amount-0.01;
				END WHILE;
			END IF;

			UPDATE tracking_rent_status SET already_payed=AlreadyPayed WHERE id_tracking_rent_status=IdStatus;

			SET @NbStatus = @NbStatus-1;
		END WHILE;
	END IF;

	SET @Treasury = @Treasury+@Amount;
	UPDATE users SET treasury=@Treasury WHERE id_users=NEW.id_users;

	SELECT sum(period_cost), sum(already_payed) INTO PeriodCost, AlreadyPayed FROM tracking_rent_status WHERE id_users!=@MainUserId AND already_payed!=period_cost;
	SET @Treasury = AlreadyPayed-PeriodCost;
	UPDATE users SET treasury=@Treasury WHERE id_users=@MainUserId;
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
	SET @Amount = OLD.amount;
	SET @MainUserId = (SELECT id_users FROM users WHERE admin=1);
	SET @Treasury = (SELECT treasury FROM users WHERE id_users=OLD.id_users) - @Amount;
	SET @NbStatus = (SELECT count(id_tracking_rent_status) FROM tracking_rent_status WHERE id_users=OLD.id_users AND period_cost!=0.00 AND (period_cost!=already_payed OR period_cost=already_payed));

	IF (@Treasury < 0.00) THEN
		IF (@NbStatus > 0) THEN
			WHILE @NbStatus > 0 DO
				SELECT id_tracking_rent_status, period_cost, already_payed INTO IdStatus, PeriodCost, AlreadyPayed FROM tracking_rent_status WHERE id_users=OLD.id_users AND already_payed!='0.00' ORDER BY CONCAT(year, month) DESC LIMIT 1;

				IF (AlreadyPayed <= @Amount) THEN
					SET AlreadyPayed = '0.00';
					SET @Amount = @Amount-AlreadyPayed;
				ELSE
					WHILE (@Amount > 0.00) AND (AlreadyPayed > 0.00) DO
						SET AlreadyPayed = AlreadyPayed-0.01;
						SET @Amount = @Amount-0.01;
					END WHILE;
				END IF;

				UPDATE tracking_rent_status SET already_payed=AlreadyPayed WHERE id_tracking_rent_status=IdStatus;

				SET @NbStatus = @NbStatus-1;
			END WHILE;
		END IF;
	END IF;

	UPDATE users SET treasury=@Treasury WHERE id_users=OLD.id_users;

	SELECT sum(period_cost), sum(already_payed) INTO PeriodCost, AlreadyPayed FROM tracking_rent_status WHERE id_users!=@MainUserId AND already_payed!=period_cost;
	SET @Treasury = AlreadyPayed-PeriodCost;
	UPDATE users SET treasury=@Treasury WHERE id_users=@MainUserId;
 END
//
DELIMITER ;

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
	DECLARE UserId INT(11) DEFAULT 0;
 	DECLARE UserIdent VARCHAR(32) DEFAULT '';
	DECLARE UserEmail VARCHAR(256) DEFAULT '';
	SELECT id_users, users_ident, users_email INTO UserId, UserIdent, UserEmail FROM users_history WHERE users_ident=NEW.users_ident AND users_email=NEW.users_email;

	IF (UserIdent != '') AND (UserEmail != '') THEN
		UPDATE users_history SET id_users=NEW.id_users, created_at=DATE_FORMAT(NOW(),'%Y-%m-%d'), deleted_at='0000-00-00' WHERE id_users=UserId;
	ELSE
		INSERT INTO users_history (id_users,users_ident,users_email,created_at) VALUES (NEW.id_users,NEW.users_ident,NEW.users_email,NEW.created_at);
	END IF;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `KeepUserHistory_BeforeDelete`;
DELIMITER //
CREATE TRIGGER `KeepUserHistory_BeforeDelete` BEFORE DELETE ON `users`
 FOR EACH ROW BEGIN
	UPDATE system SET rt_nb_users=rt_nb_users-1 WHERE id_system=1;
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