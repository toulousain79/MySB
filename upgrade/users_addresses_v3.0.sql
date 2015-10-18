ALTER TABLE users_addresses RENAME TO users_addresses_temp;

CREATE TABLE users_addresses (
	id_users_addresses	INTEGER			PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
										NOT NULL ON CONFLICT ABORT
										UNIQUE ON CONFLICT ABORT,
	id_users			INTEGER			NOT NULL ON CONFLICT ABORT,
	ipv4 				VARCHAR (15) 	NOT NULL ON CONFLICT ABORT,
	hostname 			VARCHAR (256) 	NOT NULL ON CONFLICT ABORT,
	check_by 			VARCHAR (8) 	NOT NULL ON CONFLICT ABORT,
	is_active 			BOOLEAN (1) 	NOT NULL ON CONFLICT ABORT DEFAULT (0),
	last_update 		DATETIME
);

INSERT INTO users_addresses (
					id_users_addresses, 
					id_users,
					ipv4, 
					hostname, 
					check_by, 
					is_active
                  )
                  SELECT 	id_users_addresses, 
							id_users, 
							ipv4, 
							hostname, 
							check_by, 
							is_active
                    FROM users_addresses_temp;

DROP TABLE users_addresses_temp;