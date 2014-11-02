----
-- phpLiteAdmin database dump (http://phpliteadmin.googlecode.com)
-- phpLiteAdmin version: 1.9.5
-- Exported: 10:25pm on November 2, 2014 (CET)
-- database file: ../db/MySB.db
----
BEGIN TRANSACTION;

----
-- Table structure for renting
----
CREATE TABLE [renting] (
[id_renting] INTEGER  PRIMARY KEY AUTOINCREMENT NOT NULL,
[model] VARCHAR(64)  NULL,
[tva] NUMERIC  NULL,
[global_cost] NUMERIC  NULL
);

----
-- Data dump for renting, a total of 0 rows
----

----
-- Table structure for system_services
----
CREATE TABLE [system_services] (
[id_system_services] INTEGER  PRIMARY KEY AUTOINCREMENT NOT NULL,
[short_name] VARCHAR(32)  UNIQUE NOT NULL,
[ident] VARCHAR(64)  UNIQUE NOT NULL,
[command] VARCHAR(32)  NULL,
[args] VARCHAR(64)  NULL
);

----
-- Data dump for system_services, a total of 16 rows
----
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('1','CRON','crontab','service cron',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('2','NginX','/etc/nginx','service nginx',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('3','SSH','/etc/ssh','service ssh',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('4','VSFTPd','/etc/vsftpd','service vsftpd',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('5','PHP5-FPM','/etc/php5','service php5-fpm',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('6','Postfix','/etc/postfix','service postfix',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('7','Stunnel','/etc/stunnel','service stunnel4',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('8','OpenVPN','/etc/openvpn','service openvpn',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('9','Fail2Ban','/etc/fail2ban','service fail2ban',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('10','PeerGuardian','/etc/pgl','pglcmd',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('11','Webmin','/etc/webmin','service webmin',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('12','Network','/etc/network','service networking',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('13','Samba','/etc/samba','service samba',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('14','NFS','/etc/exports','service nfs-kernel-server',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('15','DNScrypt-proxy','dnscrypt-proxy','service dnscrypt-proxy',NULL);
INSERT INTO "system_services" ("id_system_services","short_name","ident","command","args") VALUES ('16','BIND','/etc/bind/named.conf','service bind9',NULL);

----
-- Table structure for list_peerguardian
----
CREATE TABLE [list_peerguardian] (
[id_list_peerguardian] INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
[allowp2p] VARCHAR(256)  UNIQUE NOT NULL
);

----
-- Data dump for list_peerguardian, a total of 0 rows
----

----
-- Table structure for list_blocklists
----
CREATE TABLE [list_blocklists] (
[id_blocklists] INTEGER  PRIMARY KEY AUTOINCREMENT NOT NULL,
[ip_range] VARCHAR(18)  NULL
);

----
-- Data dump for list_blocklists, a total of 0 rows
----

----
-- Table structure for system
----
CREATE TABLE [system] (
[id_system] INTEGER  PRIMARY KEY AUTOINCREMENT NOT NULL,
[version] VARCHAR(6)  UNIQUE NOT NULL,
[hostname] VARCHAR(128)  UNIQUE NULL,
[ipv4] VARCHAR(15)  UNIQUE NULL,
[primary_inet] VARCHAR(16)  UNIQUE NULL,
[timezone] VARCHAR(64)  UNIQUE NULL,
[mysb_user] VARCHAR(32)  UNIQUE NULL,
[mysb_password] VARCHAR(32)  UNIQUE NULL,
[cert_password] VARCHAR(13)  NULL,
[port_ftp] INTEGER  UNIQUE NULL,
[port_ftp_data] INTEGER  UNIQUE NULL,
[port_ftp_passive] VARCHAR(11)  UNIQUE NULL,
[port_ssh] INTEGER  UNIQUE NULL,
[port_https] INTEGER  UNIQUE NULL,
[port_http] INTEGER  UNIQUE NULL
);

----
-- Data dump for system, a total of 0 rows
----

----
-- Table structure for services
----
CREATE TABLE [services] (
[id_services] INTEGER  PRIMARY KEY AUTOINCREMENT NOT NULL,
[serv_name] VARCHAR(32)  UNIQUE NULL,
[ports_tcp] VARCHAR(32)  NULL,
[ports_udp] VARCHAR(32)  NULL,
[is_installed] BOOLEAN DEFAULT '0' NULL
);

----
-- Data dump for services, a total of 10 rows
----
INSERT INTO "services" ("id_services","serv_name","ports_tcp","ports_udp","is_installed") VALUES ('1','Seedbox-Manager','',NULL,'N');
INSERT INTO "services" ("id_services","serv_name","ports_tcp","ports_udp","is_installed") VALUES ('2','CakeBox-Light','8887',NULL,'N');
INSERT INTO "services" ("id_services","serv_name","ports_tcp","ports_udp","is_installed") VALUES ('3','Plex Media Server','32400 32469','1900 5353 2410 32412 32413 32414','N');
INSERT INTO "services" ("id_services","serv_name","ports_tcp","ports_udp","is_installed") VALUES ('4','Webmin','8890',NULL,'N');
INSERT INTO "services" ("id_services","serv_name","ports_tcp","ports_udp","is_installed") VALUES ('5','OpenVPN','8893 8894',NULL,'N');
INSERT INTO "services" ("id_services","serv_name","ports_tcp","ports_udp","is_installed") VALUES ('6','LogWatch',NULL,NULL,'N');
INSERT INTO "services" ("id_services","serv_name","ports_tcp","ports_udp","is_installed") VALUES ('7','Fail2Ban',NULL,NULL,'N');
INSERT INTO "services" ("id_services","serv_name","ports_tcp","ports_udp","is_installed") VALUES ('8','PeerGuardian',NULL,NULL,'N');
INSERT INTO "services" ("id_services","serv_name","ports_tcp","ports_udp","is_installed") VALUES ('9','rTorrent Block List',NULL,NULL,'N');
INSERT INTO "services" ("id_services","serv_name","ports_tcp","ports_udp","is_installed") VALUES ('10','DNScrypt-proxy',NULL,'53 54 443 2053 5353','N');

----
-- Table structure for smtp
----
CREATE TABLE [smtp] (
[id_smtp] INTEGER  PRIMARY KEY AUTOINCREMENT NOT NULL,
[smtp_provider] VARCHAR(5)  UNIQUE NULL,
[smtp_username] VARCHAR(64)  UNIQUE NULL,
[smtp_passwd] VARCHAR(64)  UNIQUE NULL,
[smtp_host] VARCHAR(128)  UNIQUE NULL,
[smtp_port] VARCHAR(5)  UNIQUE NULL
);

----
-- Data dump for smtp, a total of 0 rows
----

----
-- Table structure for vars
----
CREATE TABLE [vars] (
[id_vars] INTEGER  PRIMARY KEY AUTOINCREMENT NOT NULL,
[fail2ban_whitelist] VARCHAR(12)  NULL,
[vpn_ip] VARCHAR(37)  NULL,
[white_tcp_port_out] VARCHAR(16)  NULL,
[white_udp_port_out] VARCHAR(16)  NULL
);

----
-- Data dump for vars, a total of 1 rows
----
INSERT INTO "vars" ("id_vars","fail2ban_whitelist","vpn_ip","white_tcp_port_out","white_udp_port_out") VALUES ('1','127.0.0.1/32','10.0.0.0/24,10.0.1.0/24','80 443',NULL);

----
-- Table structure for users
----
CREATE TABLE [users] (
[id_users] INTEGER  PRIMARY KEY AUTOINCREMENT NOT NULL,
[users_ident] VARCHAR(32)  UNIQUE NOT NULL,
[users_email] VARCHAR(260)  UNIQUE NOT NULL,
[users_passwd] VARCHAR(32)  NULL,
[rpc] VARCHAR(64)  NULL,
[sftp] BOOLEAN DEFAULT '1' NOT NULL,
[sudo] BOOLEAN DEFAULT '0' NOT NULL,
[admin] BOOLEAN DEFAULT '0' NOT NULL,
[fixed_ip] VARCHAR(128)  NULL,
[no_ip] VARCHAR(128)  NULL,
[scgi_port] INTEGER  NULL,
[rtorrent_port] INTEGER  NULL,
[home_dir] VARCHAR(128)  NULL
);

----
-- Data dump for users, a total of 0 rows
----

----
-- Table structure for ports
----
CREATE TABLE [ports] (
[id_ports] INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
[value] INTEGER  UNIQUE NOT NULL
);

----
-- Data dump for ports, a total of 0 rows
----

----
-- Table structure for trakers_host
----
CREATE TABLE [trakers_host] (
[id_trakers_subdomains] INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
[trakers_host] VARCHAR(32)  UNIQUE NOT NULL
);

----
-- Data dump for trakers_host, a total of 0 rows
----

----
-- Table structure for trakers_subdomains
----
CREATE TABLE [trakers_subdomains] (
[id_trakers_subdomains] INTEGER  PRIMARY KEY AUTOINCREMENT NOT NULL,
[trakers_subdomains] VARCHAR(128)  UNIQUE NOT NULL
);

----
-- Data dump for trakers_subdomains, a total of 0 rows
----

----
-- Table structure for trackers_domains
----
CREATE TABLE [trackers_domains] (
[id_trackers_domains] INTEGER  PRIMARY KEY AUTOINCREMENT NOT NULL,
[tracker_domain] VARCHAR(128)  UNIQUE NOT NULL,
[is_active] BOOLEAN DEFAULT '''0''' NULL
);

----
-- Data dump for trackers_domains, a total of 8 rows
----
INSERT INTO "trackers_domains" ("id_trackers_domains","tracker_domain","is_active") VALUES ('1','frenchtorrentdb.com','0');
INSERT INTO "trackers_domains" ("id_trackers_domains","tracker_domain","is_active") VALUES ('2','share1underground.com','0');
INSERT INTO "trackers_domains" ("id_trackers_domains","tracker_domain","is_active") VALUES ('3','empereur-team.ovh','0');
INSERT INTO "trackers_domains" ("id_trackers_domains","tracker_domain","is_active") VALUES ('4','genration-rosco-tk.net','0');
INSERT INTO "trackers_domains" ("id_trackers_domains","tracker_domain","is_active") VALUES ('5','torrentreactor.net','0');
INSERT INTO "trackers_domains" ("id_trackers_domains","tracker_domain","is_active") VALUES ('6','afrbits.com','0');
INSERT INTO "trackers_domains" ("id_trackers_domains","tracker_domain","is_active") VALUES ('7','french-adn.com','0');
INSERT INTO "trackers_domains" ("id_trackers_domains","tracker_domain","is_active") VALUES ('8','cool-tracker.be','0');

----
-- structure for index sqlite_autoindex_system_services_1 on table system_services
----
;

----
-- structure for index sqlite_autoindex_system_services_2 on table system_services
----
;

----
-- structure for index sqlite_autoindex_list_peerguardian_1 on table list_peerguardian
----
;

----
-- structure for index sqlite_autoindex_system_1 on table system
----
;

----
-- structure for index sqlite_autoindex_system_2 on table system
----
;

----
-- structure for index sqlite_autoindex_system_3 on table system
----
;

----
-- structure for index sqlite_autoindex_system_4 on table system
----
;

----
-- structure for index sqlite_autoindex_system_5 on table system
----
;

----
-- structure for index sqlite_autoindex_system_6 on table system
----
;

----
-- structure for index sqlite_autoindex_system_7 on table system
----
;

----
-- structure for index sqlite_autoindex_system_8 on table system
----
;

----
-- structure for index sqlite_autoindex_system_9 on table system
----
;

----
-- structure for index sqlite_autoindex_system_10 on table system
----
;

----
-- structure for index sqlite_autoindex_system_11 on table system
----
;

----
-- structure for index sqlite_autoindex_system_12 on table system
----
;

----
-- structure for index sqlite_autoindex_system_13 on table system
----
;

----
-- structure for index sqlite_autoindex_services_1 on table services
----
;

----
-- structure for index sqlite_autoindex_smtp_1 on table smtp
----
;

----
-- structure for index sqlite_autoindex_smtp_2 on table smtp
----
;

----
-- structure for index sqlite_autoindex_smtp_3 on table smtp
----
;

----
-- structure for index sqlite_autoindex_smtp_4 on table smtp
----
;

----
-- structure for index sqlite_autoindex_smtp_5 on table smtp
----
;

----
-- structure for index sqlite_autoindex_users_1 on table users
----
;

----
-- structure for index sqlite_autoindex_users_2 on table users
----
;

----
-- structure for index sqlite_autoindex_ports_1 on table ports
----
;

----
-- structure for index sqlite_autoindex_trakers_host_1 on table trakers_host
----
;

----
-- structure for index sqlite_autoindex_trakers_subdomains_1 on table trakers_subdomains
----
;

----
-- structure for index sqlite_autoindex_trackers_domains_1 on table trackers_domains
----
;
COMMIT;
