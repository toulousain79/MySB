ALTER TABLE system RENAME TO system_temp;

CREATE TABLE system (
    id_system          	INTEGER (1, 1) 	PRIMARY KEY ON CONFLICT IGNORE
										NOT NULL ON CONFLICT ABORT,
    mysb_version       	VARCHAR (6)    	NOT NULL ON CONFLICT ABORT
										UNIQUE ON CONFLICT IGNORE,
    mysb_user          	VARCHAR (32)   	UNIQUE ON CONFLICT IGNORE,
    mysb_password      	VARCHAR (32)   	UNIQUE ON CONFLICT IGNORE,
    hostname           	VARCHAR (128)  	UNIQUE ON CONFLICT IGNORE,
    ipv4               	VARCHAR (15)   	UNIQUE ON CONFLICT IGNORE,
    primary_inet       	VARCHAR (16)   	UNIQUE ON CONFLICT IGNORE,
    timezone           	VARCHAR (64)   	UNIQUE ON CONFLICT IGNORE,
    cert_password      	VARCHAR (32)   	UNIQUE ON CONFLICT IGNORE,
    apt_update         	BOOLEAN (1)    	DEFAULT (1),
    apt_date           	DATETIME,
    server_provider    	VARCHAR (16),
    ip_restriction     	BOOLEAN (1)    	DEFAULT (1),
    pgl_email_stats    	BOOLEAN (1)    	DEFAULT (0),
    pgl_watchdog_email 	BOOLEAN (1)    	DEFAULT (0),
    dnscrypt           	BOOLEAN (1)    	DEFAULT (1)
);

INSERT INTO system (
                       id_system,
                       mysb_version,
                       mysb_user,
                       mysb_password,
                       hostname,
                       ipv4,
                       primary_inet,
                       timezone,
                       cert_password,
                       apt_update,
                       apt_date,
                       server_provider,
                       ip_restriction,
                       pgl_email_stats,
                       pgl_watchdog_email
                   )
                   SELECT id_system,
                          mysb_version,
                          mysb_user,
                          mysb_password,
                          hostname,
                          ipv4,
                          primary_inet,
                          timezone,
                          cert_password,
                          apt_update,
                          apt_date,
                          server_provider,
                          ip_restriction,
                          pgl_email_stats,
                          pgl_watchdog_email
                     FROM system_temp;

DROP TABLE system_temp;
