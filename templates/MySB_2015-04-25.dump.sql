
-- Table: users_addresses
CREATE TABLE users_addresses ( 
    id_users_addresses INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                       NOT NULL ON CONFLICT ABORT
                                       UNIQUE ON CONFLICT ABORT,
    id_users           INTEGER         NOT NULL ON CONFLICT ABORT,
    ipv4               VARCHAR( 15 )   NOT NULL ON CONFLICT ABORT,
    hostname           VARCHAR( 256 )  NOT NULL ON CONFLICT ABORT,
    check_by           VARCHAR( 8 )    NOT NULL ON CONFLICT ABORT,
    is_active          BOOLEAN( 1 )    NOT NULL ON CONFLICT ABORT
                                       DEFAULT ( 0 ) 
);

INSERT INTO [users_addresses] ([id_users_addresses], [id_users], [ipv4], [hostname], [check_by], [is_active]) VALUES (1, 1, '82.231.218.239', 'asr-box.o-source.fr', 'ipv4', 1);
INSERT INTO [users_addresses] ([id_users_addresses], [id_users], [ipv4], [hostname], [check_by], [is_active]) VALUES (2, 1, '82.228.250.23', 'sop06-1-82-228-250-23.fbx.proxad.net', 'ipv4', 1);

-- Table: renting
CREATE TABLE renting ( 
    id_renting      INTEGER( 1, 1 )  PRIMARY KEY ON CONFLICT IGNORE
                                     NOT NULL ON CONFLICT ABORT,
    model           VARCHAR( 64 ),
    tva             NUMERIC,
    global_cost     NUMERIC,
    nb_users        NUMERIC( 2 ),
    price_per_users NUMERIC( 2 ) 
);

INSERT INTO [renting] ([id_renting], [model], [tva], [global_cost], [nb_users], [price_per_users]) VALUES (1, null, null, null, null, null);

-- Table: vars
CREATE TABLE vars ( 
    id_vars            INTEGER( 1, 1 )  PRIMARY KEY ON CONFLICT IGNORE
                                        NOT NULL ON CONFLICT ABORT,
    fail2ban_whitelist VARCHAR( 12 ),
    vpn_ip             VARCHAR( 37 ),
    white_tcp_port_out VARCHAR( 16 ),
    white_udp_port_out VARCHAR( 16 ) 
);

INSERT INTO [vars] ([id_vars], [fail2ban_whitelist], [vpn_ip], [white_tcp_port_out], [white_udp_port_out]) VALUES (1, '127.0.0.1/32', '10.0.0.0/24,10.0.1.0/24,10.0.2.0/24', '80 443', null);

-- Table: trackers_list_ipv4
CREATE TABLE trackers_list_ipv4 ( 
    id_trackers_list_ipv4 INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                          NOT NULL ON CONFLICT ABORT
                                          UNIQUE ON CONFLICT ABORT,
    id_trackers_list      INTEGER         NOT NULL ON CONFLICT ABORT,
    ipv4                  VARCHAR( 128 )  NOT NULL ON CONFLICT ABORT 
);

INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (1, 1, '142.4.211.193');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (2, 1, '91.121.27.124');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (3, 1, '87.98.219.214');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (4, 1, '94.23.25.101');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (5, 1, '62.210.215.126');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (6, 1, '213.251.186.76');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (7, 1, '5.135.158.107');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (8, 1, '5.135.157.34');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (9, 1, '94.23.51.83');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (10, 2, '5.45.72.88');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (11, 3, '92.222.24.22');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (12, 4, '185.87.146.3');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (13, 4, '185.87.146.4');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (14, 5, '5.45.74.93');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (15, 6, '193.23.181.231');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (16, 7, '94.242.222.202');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (17, 8, '188.95.51.211');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (18, 9, '193.23.181.146');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (19, 9, '46.246.69.83');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (20, 10, '198.41.205.86');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (21, 10, '198.41.204.86');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (22, 11, '184.168.221.75');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (23, 12, '46.246.117.194');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (24, 13, '109.200.202.70');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (25, 14, '141.101.118.15');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (26, 14, '141.101.118.14');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (27, 15, '195.82.146.114');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (28, 16, '162.243.226.87');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (29, 17, '198.41.249.59');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (30, 17, '162.159.251.59');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (31, 18, '208.43.99.83');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (32, 19, '80.92.65.144');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (33, 20, '46.246.41.38');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (34, 20, '81.17.30.22');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (35, 20, '178.73.219.246');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (36, 21, '37.0.123.161');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (37, 22, '69.162.118.134');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (38, 23, '80.94.76.8');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (40, 25, '78.138.99.144');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (41, 25, '195.3.144.238');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (43, 25, '213.128.85.42');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (44, 25, '95.215.61.203');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (45, 25, '195.3.147.99');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (46, 26, '213.239.204.250');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (47, 27, '37.187.140.65');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (48, 28, '8.5.1.51');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (49, 29, '198.41.184.229');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (50, 29, '198.41.191.228');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (51, 30, '192.99.212.187');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (52, 31, '158.255.1.142');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (53, 32, '190.93.252.112');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (54, 32, '190.93.253.112');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (55, 33, '205.204.94.25');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (56, 34, '37.59.114.130');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (57, 35, '104.28.25.67');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (58, 35, '104.28.24.67');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (59, 36, '185.53.178.9');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (60, 37, '162.159.254.81');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (61, 37, '162.159.252.82');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (62, 37, '162.159.255.81');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (63, 37, '162.159.254.82');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (64, 37, '162.159.253.82');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (65, 38, '82.221.129.17');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (66, 39, '104.16.19.124');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (67, 39, '104.16.17.124');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (68, 39, '104.16.15.124');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (69, 39, '104.16.16.124');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (70, 39, '104.16.18.124');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (71, 40, '176.31.101.5');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (72, 41, '192.99.46.83');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (73, 42, '162.159.250.214');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (74, 42, '162.159.251.214');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (75, 43, '162.159.246.243');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (76, 43, '162.159.245.243');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (77, 44, '104.28.21.94');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (78, 44, '104.28.20.94');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (79, 45, '174.137.52.220');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (80, 46, '142.4.210.129');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (81, 47, '176.126.237.155');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (82, 48, '142.4.216.76');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (83, 49, '198.245.49.82');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (84, 50, '74.120.222.130');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (85, 51, '209.44.117.74');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (86, 52, '46.246.117.194');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (87, 53, '91.210.107.32');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (88, 54, '69.165.95.242');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (89, 24, '104.24.107.53');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (90, 24, '104.24.106.53');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (91, 25, '193.24.208.252');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (92, 25, '94.199.48.231');
INSERT INTO [trackers_list_ipv4] ([id_trackers_list_ipv4], [id_trackers_list], [ipv4]) VALUES (93, 25, '176.123.6.225');

-- Table: smtp
CREATE TABLE smtp ( 
    id_smtp       INTEGER( 1, 1 )  PRIMARY KEY ON CONFLICT IGNORE
                                   NOT NULL ON CONFLICT ABORT,
    smtp_provider VARCHAR( 5 )     NOT NULL ON CONFLICT ABORT
                                   UNIQUE ON CONFLICT IGNORE
                                   DEFAULT ( 'LOCAL' ),
    smtp_username VARCHAR( 64 )    UNIQUE ON CONFLICT IGNORE,
    smtp_passwd   VARCHAR( 64 )    UNIQUE ON CONFLICT IGNORE,
    smtp_host     VARCHAR( 128 )   UNIQUE ON CONFLICT IGNORE,
    smtp_port     VARCHAR( 5 )     UNIQUE ON CONFLICT IGNORE,
    smtp_email    VARCHAR( 64 )    UNIQUE ON CONFLICT IGNORE 
);

INSERT INTO [smtp] ([id_smtp], [smtp_provider], [smtp_username], [smtp_passwd], [smtp_host], [smtp_port], [smtp_email]) VALUES (1, 'GMAIL', 'toulousain79@gmail.com', 'GvI7jDxZ12.', 'smtp.gmail.com', 465, 'toulousain79@gmail.com');

-- Table: trackers_list
CREATE TABLE trackers_list ( 
    id_trackers_list INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                     NOT NULL ON CONFLICT ABORT
                                     UNIQUE ON CONFLICT ABORT,
    tracker          VARCHAR( 128 )  NOT NULL ON CONFLICT IGNORE
                                     UNIQUE ON CONFLICT IGNORE,
    tracker_domain   VARCHAR( 128 )  NOT NULL ON CONFLICT ABORT
                                     UNIQUE ON CONFLICT IGNORE,
    origin           VARCHAR( 9 )    NOT NULL ON CONFLICT ABORT,
    is_ssl           BOOLEAN( 1 )    NOT NULL ON CONFLICT ABORT
                                     DEFAULT ( 0 ),
    is_active        BOOLEAN( 1 )    NOT NULL ON CONFLICT ABORT
                                     DEFAULT ( 0 ),
    to_check         BOOLEAN( 1 )    NOT NULL ON CONFLICT ABORT
                                     DEFAULT ( 1 ),
    ping             VARCHAR( 64 ) 
);

INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (1, 'tracker.what.cd', 'what.cd', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (2, 'vertor.com', 'vertor.com', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (3, 'tracker.freshon.tv', 'freshon.tv', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (4, 'torrentz.eu', 'torrentz.eu', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (5, 'torrentzap.com', 'torrentzap.com', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (6, 'tracker.torrentreactor.net', 'torrentreactor.net', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (10, 'torrentday.com', 'torrentday.com', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (11, 'torrent-damage.net', 'torrent-damage.net', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (12, 'tracker.t411.me', 't411.me', 'rutorrent', 0, 1, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (14, 'tracker.sceneaccess.org', 'sceneaccess.org', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (16, 'puntotorrent.com', 'puntotorrent.com', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (18, 'tracker.preto.me', 'preto.me', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (21, 'mma-tracker.net', 'mma-tracker.net', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (22, 'mma-torrents.com', 'mma-torrents.com', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (23, 'tracker.mininova.org', 'mininova.org', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (24, 'kinozal.tv', 'kinozal.tv', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (25, 'tracker.kickass.to', 'kickass.to', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (26, 'jpopsuki.eu', 'jpopsuki.eu', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (27, 'tracker.iptorrents.com', 'iptorrents.com', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (28, 'tracker.immortalseed.tv', 'immortalseed.tv', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (31, 'tracker.hdts.ru', 'hdts.ru', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (33, 'hd-dream.net', 'hd-dream.net', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (35, 'feedthe.net', 'feedthe.net', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (36, 'tracker.unblockfenopy.eu', 'unblockfenopy.eu', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (37, 'extratorrent.cc', 'extratorrent.cc', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (39, 'cpasbien.pe', 'cpasbien.pe', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (40, 'tracker.broadcasthe.net', 'broadcasthe.net', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (41, 'blackcats-games.net', 'blackcats-games.net', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (44, 'bit-hdtv.com', 'bit-hdtv.com', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (45, 'tracker.awesome-hd.net', 'awesome-hd.net', 'rutorrent', 0, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (52, 'tracker.t411.io', 't411.io', 'rutorrent', 1, 0, 0, 'GOOD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (53, 'tracker.sceneaccess.eu', 'sceneaccess.eu', 'rutorrent', 0, 0, 0, 'BAD');
INSERT INTO [trackers_list] ([id_trackers_list], [tracker], [tracker_domain], [origin], [is_ssl], [is_active], [to_check], [ping]) VALUES (54, 'tracker.nyaa.se', 'nyaa.se', 'rutorrent', 0, 0, 0, 'GOOD');

-- Table: commands
CREATE TABLE commands ( 
    id_commands INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                NOT NULL ON CONFLICT ABORT
                                UNIQUE ON CONFLICT ABORT,
    commands    VARCHAR( 32 )   NOT NULL ON CONFLICT ABORT,
    reload      BOOLEAN( 1 )    NOT NULL ON CONFLICT ABORT,
    priority    INTEGER( 2 )    NOT NULL ON CONFLICT ABORT,
    args        VARCHAR( 128 ),
    user        VARCHAR( 16 )   NOT NULL ON CONFLICT ABORT 
);


-- Table: dnscrypt_resolvers
CREATE TABLE dnscrypt_resolvers ( 
    id_dnscrypt_resolvers          INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                                   NOT NULL ON CONFLICT ABORT
                                                   UNIQUE ON CONFLICT ABORT,
    name                           VARCHAR( 32 )   NOT NULL ON CONFLICT ABORT
                                                   UNIQUE ON CONFLICT ABORT,
    full_name                      VARCHAR( 64 )   NOT NULL ON CONFLICT ABORT
                                                   UNIQUE ON CONFLICT ABORT,
    description                    VARCHAR( 128 ),
    location                       VARCHAR( 32 ),
    coordinates                    VARCHAR( 32 ),
    url                            VARCHAR( 128 )  NOT NULL ON CONFLICT ABORT,
    version                        VARCHAR( 2 ),
    dnssec                         BOOLEAN( 1 )    NOT NULL ON CONFLICT ABORT
                                                   DEFAULT ( 0 ),
    no_logs                        BOOLEAN( 1 )    NOT NULL ON CONFLICT ABORT
                                                   DEFAULT ( 0 ),
    namecoin                       BOOLEAN( 1 )    NOT NULL ON CONFLICT ABORT
                                                   DEFAULT ( 0 ),
    resolver_address               VARCHAR( 64 )   NOT NULL ON CONFLICT ABORT
                                                   UNIQUE ON CONFLICT ABORT,
    provider_name                  VARCHAR( 64 ),
    provider_public_key            VARCHAR( 128 ),
    provider_public_key_txt_record VARCHAR( 64 ),
    is_activated                   BOOLEAN( 1 )    DEFAULT ( 0 ),
    is_wished                      BOOLEAN( 1 )    DEFAULT ( 0 ) 
);

INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (32, 'adamas', 'Adamas.ai DNSCrypt', 'DNSCrypt Server in LUX provided by adamas.ai', 'Luxembourg', '', 'http://adamas.ai', 1, 'no', 'yes', 'no', '80.90.43.162:5678', '2.dnscrypt-cert.adamas.ai', '6484:544A:4B91:F23A:E8AD:2AA3:6661:C419:D09B:C88D:B1AF:C314:E59D:2C36:0F81:FB99', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (33, 'cloudns-can', 'CloudNS Canberra', 'CloudNS is an Australian based security focused DNS provider.', 'Canberra,AU', '', 'https://cloudns.com.au', 1, 'yes', 'yes', 'yes', '113.20.6.2:443', '2.dnscrypt-cert.cloudns.com.au', '1971:7C1A:C550:6C09:F09B:ACB1:1AF7:C349:6425:2676:247F:B738:1C5A:243A:C1CC:89F4', '', 1, 1);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (34, 'cloudns-syd', 'CloudNS Sydney', 'CloudNS is an Australian based security focused DNS provider.', 'Sydney,AU', '', 'https://cloudns.com.au', 1, 'yes', 'yes', 'yes', '113.20.8.17:443', '2.dnscrypt-cert-2.cloudns.com.au', '67A4:323E:581F:79B9:BC54:825F:54FE:1025:8B4F:37EB:0D07:0BCE:4010:6195:D94F:E330', '', 1, 1);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (35, 'cypherpunk', 'cypherpunk.lu DNSCrypt', 'DNSCrypt Server in IT provided by cypherpunk.lu', 'Italy', '', 'http://cypherpunk.lu', 1, 'no', 'yes', 'no', '95.141.34.162:5678', '2.dnscrypt-cert-2.cypherpunk.lu', '5FF6:5A49:9C19:6B39:7DAF:4758:4070:7092:5ABA:B334:5E6C:B46A:FA4B:7771:5ADA:2EC8', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (36, 'd0wn-ch-ns1', 'd0wn server in Switzerland', 'Server provided by Martin ''d0wn'' Albus', 'Singapore', '', 'https://dns.d0wn.biz', 1, 'no', 'yes', 'yes', '179.43.143.69:54', '2.dnscrypt-cert.d0wn.biz', 'F64D:AECA:A8AA:E31D:3896:8A93:1D96:EB54:9D70:CE57:A439:58B0:7685:6960:044B:EA62', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (37, 'd0wn-de-ns1', 'd0wn server in Germany', 'Server provided by Martin ''d0wn'' Albus', 'Germany', '', 'https://dns.d0wn.biz', 1, 'no', 'yes', 'yes', '108.61.210.58:54', '2.dnscrypt-cert.d0wn.biz', 'F64D:AECA:A8AA:E31D:3896:8A93:1D96:EB54:9D70:CE57:A439:58B0:7685:6960:044B:EA62', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (38, 'd0wn-fr-ns1', 'First d0wn server in France', 'Server provided by Martin ''d0wn'' Albus', 'France', '', 'https://dns.d0wn.biz', 1, 'no', 'yes', 'yes', '178.32.122.65:54', '2.dnscrypt-cert.d0wn.biz', 'F64D:AECA:A8AA:E31D:3896:8A93:1D96:EB54:9D70:CE57:A439:58B0:7685:6960:044B:EA62', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (39, 'd0wn-fr-ns2', 'Second d0wn server in France', 'Server provided by Martin ''d0wn'' Albus', 'France', '', 'https://dns.d0wn.biz', 1, 'no', 'yes', 'yes', '37.187.0.40:27015', '2.dnscrypt-cert.d0wn.biz', 'F64D:AECA:A8AA:E31D:3896:8A93:1D96:EB54:9D70:CE57:A439:58B0:7685:6960:044B:EA62', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (40, 'd0wn-md-ns1', 'First d0wn server in Moldova', 'Server provided by Martin ''d0wn'' Albus', 'Moldova', '', 'https://dns.d0wn.biz', 1, 'no', 'yes', 'yes', '178.17.170.67:54', '2.dnscrypt-cert.d0wn.biz', 'F64D:AECA:A8AA:E31D:3896:8A93:1D96:EB54:9D70:CE57:A439:58B0:7685:6960:044B:EA62', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (41, 'd0wn-nl-ns1', 'First d0wn server in Netherlands', 'Server provided by Martin ''d0wn'' Albus', 'Netherlands', '', 'https://dns.d0wn.biz', 1, 'no', 'yes', 'yes', '95.85.9.86:54', '2.dnscrypt-cert.d0wn.biz', 'F64D:AECA:A8AA:E31D:3896:8A93:1D96:EB54:9D70:CE57:A439:58B0:7685:6960:044B:EA62', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (42, 'd0wn-nl-ns2', 'Second d0wn server in Netherlands', 'Server provided by Martin ''d0wn'' Albus', 'Netherlands', '', 'https://dns.d0wn.biz', 1, 'no', 'yes', 'yes', '31.220.27.46:54', '2.dnscrypt-cert.d0wn.biz', 'F64D:AECA:A8AA:E31D:3896:8A93:1D96:EB54:9D70:CE57:A439:58B0:7685:6960:044B:EA62', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (43, 'd0wn-ro-ns1', 'First d0wn server in Romania', 'Server provided by Martin ''d0wn'' Albus', 'Romania', '', 'https://dns.d0wn.biz', 1, 'no', 'yes', 'yes', '37.221.170.105:54', '2.dnscrypt-cert.d0wn.biz', 'F64D:AECA:A8AA:E31D:3896:8A93:1D96:EB54:9D70:CE57:A439:58B0:7685:6960:044B:EA62', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (44, 'd0wn-ro-ns2', 'Second d0wn server in Romania', 'Server provided by Martin ''d0wn'' Albus', 'Romania', '', 'https://dns.d0wn.biz', 1, 'no', 'yes', 'yes', '37.221.170.104:54', '2.dnscrypt-cert.d0wn.biz', 'F64D:AECA:A8AA:E31D:3896:8A93:1D96:EB54:9D70:CE57:A439:58B0:7685:6960:044B:EA62', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (45, 'd0wn-sa-ns1', 'd0wn server in Saudi Arabia', 'Server provided by Martin ''d0wn'' Albus', 'Saudi Arabia', '', 'https://dns.d0wn.biz', 1, 'no', 'yes', 'yes', '46.151.208.154:54', '2.dnscrypt-cert.d0wn.biz', 'F64D:AECA:A8AA:E31D:3896:8A93:1D96:EB54:9D70:CE57:A439:58B0:7685:6960:044B:EA62', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (46, 'd0wn-sg-ns1', 'd0wn server in Singapore', 'Server provided by Martin ''d0wn'' Albus', 'Singapore', '', 'https://dns.d0wn.biz', 1, 'no', 'yes', 'yes', '128.199.248.105:54', '2.dnscrypt-cert.d0wn.biz', 'F64D:AECA:A8AA:E31D:3896:8A93:1D96:EB54:9D70:CE57:A439:58B0:7685:6960:044B:EA62', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (47, 'dnscrypt.eu-dk', 'DNSCrypt.eu Denmark', 'Free,non-logged,uncensored. Hosted by Netgroup.', 'Denmark', '', 'https://dnscrypt.eu', 1, 'yes', 'yes', 'no', '77.66.84.233:443', '2.dnscrypt-cert.resolver2.dnscrypt.eu', '3748:5585:E3B9:D088:FD25:AD36:B037:01F5:520C:D648:9E9A:DD52:1457:4955:9F0A:9955', 'pubkey.resolver2.dnscrypt.eu', 1, 1);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (48, 'dnscrypt.eu-dk-port5353', 'DNSCrypt.eu Denmark (port 5353)', 'Free,non-logged,uncensored. Hosted by Netgroup.', 'Denmark', '', 'https://dnscrypt.eu', 1, 'yes', 'yes', 'no', '77.66.84.233:5353', '2.dnscrypt-cert.resolver2.dnscrypt.eu', '3748:5585:E3B9:D088:FD25:AD36:B037:01F5:520C:D648:9E9A:DD52:1457:4955:9F0A:9955', 'pubkey.resolver2.dnscrypt.eu', 1, 1);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (49, 'dnscrypt.eu-nl', 'DNSCrypt.eu Holland', 'Free,non-logged,uncensored. Hosted by RamNode.', 'Netherlands', '', 'https://dnscrypt.eu', 1, 'yes', 'yes', 'no', '176.56.237.171:443', '2.dnscrypt-cert.resolver1.dnscrypt.eu', '67C0:0F2C:21C5:5481:45DD:7CB4:6A27:1AF2:EB96:9931:40A3:09B6:2B8D:1653:1185:9C66', 'pubkey.resolver1.dnscrypt.eu', 1, 1);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (50, 'dnscrypt.eu-nl-port5353', 'DNSCrypt.eu Holland (port 5353)', 'Free,non-logged,uncensored. Hosted by RamNode.', 'Netherlands', '', 'https://dnscrypt.eu', 1, 'yes', 'yes', 'no', '176.56.237.171:5353', '2.dnscrypt-cert.resolver1.dnscrypt.eu', '67C0:0F2C:21C5:5481:45DD:7CB4:6A27:1AF2:EB96:9931:40A3:09B6:2B8D:1653:1185:9C66', 'pubkey.resolver1.dnscrypt.eu', 1, 1);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (51, 'dnscrypt.org-fr', 'DNSCrypt server in Paris,France', 'ARM server hosted by online.net', 'Paris,France', '', '', 1, 'yes', 'yes', 'no', '212.47.228.136', '2.dnscrypt-cert.fr.dnscrypt.org', 'E801:B84E:A606:BFB0:BAC0:CE43:445B:B15E:BA64:B02F:A3C4:AA31:AE10:636A:0790:324D', '', 1, 1);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (52, 'okturtles', 'okTurtles', 'For a surveillance-free world. HTTPS is broken. DNSChain fixes it.', 'Georgia,US', '33.032501,-83.895699', 'http://okturtles.com/', 1, 'no', 'yes', 'yes', '23.226.227.93:443', '2.dnscrypt-cert.okturtles.com', '1D85:3953:E34F:AFD0:05F9:4C6F:D1CC:E635:D411:9904:0D48:D19A:5D35:0B6A:7C81:73CB', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (53, 'opendns', 'OpenDNS', 'Predict and prevent attacks before they happen', 'Anycast', '', 'https://www.opendns.com', 1, 'no', 'no', 'no', '208.67.220.220:443', '2.dnscrypt-cert.opendns.com', 'B735:1140:206F:225D:3E2B:D822:D7FD:691E:A1C3:3CC8:D666:8D0C:BE04:BFAB:CA43:FB79', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (54, 'opendns-familyshield', 'OpenDNS with FamilyShield', 'Blocks web sites not suitable for children', 'Anycast', '', 'https://www.opendns.com/home-internet-security/parental-controls/', 1, 'no', 'no', 'no', '208.67.220.123:443', '2.dnscrypt-cert.opendns.com', 'B735:1140:206F:225D:3E2B:D822:D7FD:691E:A1C3:3CC8:D666:8D0C:BE04:BFAB:CA43:FB79', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (55, 'opendns-port53', 'OpenDNS backward compatibility port 53', 'Predict and prevent attacks before they happen', 'Anycast', '', 'https://www.opendns.com', 1, 'no', 'no', 'no', '208.67.220.220:53', '2.dnscrypt-cert.opendns.com', 'B735:1140:206F:225D:3E2B:D822:D7FD:691E:A1C3:3CC8:D666:8D0C:BE04:BFAB:CA43:FB79', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (56, 'opennic-ca-ns3', 'OpenNIC server ns3.ca', 'OpenNIC server in Canada provided by NovaKing', 'Canada', '', 'http://www.opennicproject.org', 1, 'no', 'yes', 'no', '142.4.204.111:443', '2.dnscrypt-cert.ns3.ca.dns.opennic.glue', '1C19:7933:1BE8:23CC:CF08:9A79:0693:7E5C:3410:2A56:AC7F:6270:E046:25B2:EDDB:04E3', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (57, 'opennic-ca-ns4', 'OpenNIC server ns4.ca', 'OpenNIC server in Canada provided by NovaKing', 'Canada', '', 'http://www.opennicproject.org', 1, 'no', 'yes', 'no', '142.4.205.47:443', '2.dnscrypt-cert.ns4.ca.dns.opennic.glue', '12FA:EC04:3489:B374:B973:CA7C:827F:D7FA:033F:D280:8641:F2F1:430A:E5DC:6068:42B8', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (58, 'opennic-jp-ns2', 'OpenNIC server ns2.jp', 'OpenNIC server in Japan provided by Guillaume Parent', 'Japan', '', 'http://www.opennicproject.org', 1, 'no', 'yes', 'no', '106.186.17.181:2053', '2.dnscrypt-cert.ns2.jp.dns.opennic.glue', '8768:C3DB:F70A:FBC6:3B64:8630:8167:2FD4:EE6F:E175:ECFD:46C9:22FC:7674:A1AC:2E2A', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (59, 'opennic-proxy.sh-dns1', 'Proxy.sh Public OpenNIC One', 'OpenNIC server in Netherlands provided by Proxy.sh', 'Netherlands', '', 'https://proxy.sh', 1, 'no', 'yes', 'no', '146.185.134.104:54', '2.nscrypt-cert.proxy.sh', '937B:991C:E853:EDD6:FEC5:8F88:DF78:B27E:2FAA:452B:5BBB:C05F:D0B9:DC24:DC7C:D5F3', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (60, 'opennic-us-ca-ns17', 'OpenNIC server ns17.ca.us', 'OpenNIC server in California provided by Philip Southam', 'Fremont,CA,US', '', 'http://www.opennicproject.org', 1, 'no', 'yes', 'no', '173.230.156.28:443', '2.dnscrypt-cert.ns17.ca.us.dns.opennic.glue', '2342:215C:409A:85A5:FB63:2A3B:42CD:5089:6BA8:551A:8BDC:2654:CF57:804F:B1B2:5019', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (61, 'opennic-us-wa-ns1', 'OpenNIC server ns1.wa.us', 'OpenNIC server in Seattle WA', 'Seattle,WA,US', '', 'http://www.opennicproject.org', 1, 'no', 'yes', 'no', '23.226.230.72:1053', '2.dnscrypt-cert.hallowe.lt', '32E5:B8D6:7495:DAC0:D286:8020:830D:8432:F552:3ACF:1818:7F46:3D25:2308:25A2:6A93', '', 0, 0);
INSERT INTO [dnscrypt_resolvers] ([id_dnscrypt_resolvers], [name], [full_name], [description], [location], [coordinates], [url], [version], [dnssec], [no_logs], [namecoin], [resolver_address], [provider_name], [provider_public_key], [provider_public_key_txt_record], [is_activated], [is_wished]) VALUES (62, 'soltysiak', 'Soltysiak', 'Public DNSCrypt server in Poland', 'Poland', '52.4014619,16.9278078', 'http://dc1.soltysiak.com/', 1, 'yes', 'yes', 'yes', '178.216.201.222:2053', '2.dnscrypt-cert.soltysiak.com', '25C4:E188:2915:4697:8F9C:2BBD:B6A7:AFA4:01ED:A051:0508:5D53:03E7:1928:C066:8F21', 'pubkey.dc1.soltysiak.com', 1, 1);

-- Table: blocklists
CREATE TABLE blocklists ( 
    id_blocklists           INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                            NOT NULL ON CONFLICT ABORT
                                            UNIQUE ON CONFLICT ABORT,
    author                  VARCHAR( 32 )   NOT NULL ON CONFLICT ABORT,
    list_name               VARCHAR( 32 )   NOT NULL ON CONFLICT ABORT,
    url_infos               VARCHAR( 256 )  NOT NULL ON CONFLICT ABORT
                                            UNIQUE ON CONFLICT ABORT,
    peerguardian_list       VARCHAR( 256 ),
    rtorrent_list           VARCHAR( 256 ),
    peerguardian_active     BOOLEAN( 1 )    DEFAULT ( 0 ),
    rtorrent_active         BOOLEAN( 1 )    DEFAULT ( 0 ),
    [default]               BOOLEAN( 1 )    DEFAULT ( 0 ),
    comments                VARCHAR( 32 ),
    peerguardian_lastupdate DATETIME,
    rtorrent_lastupdate     DATETIME 
);

INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (1, 'Abuse', 'ZeuS', 'https://www.iblocklist.com/list.php?list=ynkdjqsjyfmilsgbogqf', 'list.iblocklist.com/lists/abuse/zeus', 'http://list.iblocklist.com/?list=ynkdjqsjyfmilsgbogqf&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:18:36', '2015-03-24 16:41:38');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (2, 'Atma', 'Atma', 'https://www.iblocklist.com/list.php?list=tzmtqbbsgbtfxainogvm', 'list.iblocklist.com/lists/atma/atma', 'http://list.iblocklist.com/?list=tzmtqbbsgbtfxainogvm&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:18:48', '2015-03-24 16:41:39');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (3, 'Bluetack', 'Advertising Trackers and Bad Porn', 'https://www.iblocklist.com/list.php?list=dgxtneitpuvgqqcpfulq', 'list.iblocklist.com/lists/bluetack/ads-trackers-and-bad-pr0n', 'http://list.iblocklist.com/?list=dgxtneitpuvgqqcpfulq&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:19:06', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (4, 'Bluetack', 'Bad Peers', 'https://www.iblocklist.com/list.php?list=cwworuawihqvocglcoss', 'list.iblocklist.com/lists/bluetack/bad-peers', 'http://list.iblocklist.com/?list=cwworuawihqvocglcoss&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:19:24', '2015-03-24 16:41:40');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (5, 'Bluetack', 'Bogon', 'https://www.iblocklist.com/list.php?list=gihxqmhyunbxhbmgqrla', 'list.iblocklist.com/lists/bluetack/bogon', 'http://list.iblocklist.com/?list=gihxqmhyunbxhbmgqrla&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:19:43', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (6, 'Bluetack', 'Dshield', 'https://www.iblocklist.com/list.php?list=xpbqleszmajjesnzddhv', 'list.iblocklist.com/lists/bluetack/dshield', 'http://list.iblocklist.com/?list=xpbqleszmajjesnzddhv&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:20:00', '2015-03-24 16:41:40');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (7, 'Bluetack', 'Educational Institutions', 'https://www.iblocklist.com/list.php?list=imlmncgrkbnacgcwfjvh', 'list.iblocklist.com/lists/bluetack/edu', 'http://list.iblocklist.com/?list=imlmncgrkbnacgcwfjvh&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:20:13', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (8, 'Bluetack', 'For Non Lan Computers', 'https://www.iblocklist.com/list.php?list=jhaoawihmfxgnvmaqffp', 'list.iblocklist.com/lists/bluetack/for-non-lan-computers', 'http://list.iblocklist.com/?list=jhaoawihmfxgnvmaqffp&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:20:25', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (9, 'Bluetack', 'Forum Spam', 'https://www.iblocklist.com/list.php?list=ficutxiwawokxlcyoeye', 'list.iblocklist.com/lists/bluetack/forum-spam', 'http://list.iblocklist.com/?list=ficutxiwawokxlcyoeye&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:20:39', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (10, 'Bluetack', 'Hijacked', 'https://www.iblocklist.com/list.php?list=usrcshglbiilevmyfhse', 'list.iblocklist.com/lists/bluetack/hijacked', 'http://list.iblocklist.com/?list=usrcshglbiilevmyfhse&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:20:50', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (11, 'Bluetack', 'IANA-Multicast', 'https://www.iblocklist.com/list.php?list=pwqnlynprfgtjbgqoizj', 'list.iblocklist.com/lists/bluetack/iana-multicast', 'http://list.iblocklist.com/?list=pwqnlynprfgtjbgqoizj&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:21:03', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (12, 'Bluetack', 'IANA-Private', 'https://www.iblocklist.com/list.php?list=cslpybexmxyuacbyuvib', 'list.iblocklist.com/lists/bluetack/iana-private', 'http://list.iblocklist.com/?list=cslpybexmxyuacbyuvib&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:21:15', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (13, 'Bluetack', 'IANA-Reserved', 'https://www.iblocklist.com/list.php?list=bcoepfyewziejvcqyhqo', 'list.iblocklist.com/lists/bluetack/iana-reserved', 'http://list.iblocklist.com/?list=bcoepfyewziejvcqyhqo&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:21:28', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (14, 'Bluetack', 'Level 1', 'https://www.iblocklist.com/list.php?list=ydxerpxkpcfqjaybcssw', 'list.iblocklist.com/lists/bluetack/level-1', 'http://list.iblocklist.com/?list=ydxerpxkpcfqjaybcssw&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:21:47', '2015-03-24 16:41:42');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (15, 'Bluetack', 'Level 2', 'https://www.iblocklist.com/list.php?list=gyisgnzbhppbvsphucsw', 'list.iblocklist.com/lists/bluetack/level-2', 'http://list.iblocklist.com/?list=gyisgnzbhppbvsphucsw&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:22:06', '2015-03-24 16:41:43');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (16, 'Bluetack', 'Level 3', 'https://www.iblocklist.com/list.php?list=uwnukjqktoggdknzrhgh', 'list.iblocklist.com/lists/bluetack/level-3', 'http://list.iblocklist.com/?list=uwnukjqktoggdknzrhgh&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:22:18', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (17, 'Bluetack', 'Microsoft', 'https://www.iblocklist.com/list.php?list=xshktygkujudfnjfioro', 'list.iblocklist.com/lists/bluetack/microsoft', 'http://list.iblocklist.com/?list=xshktygkujudfnjfioro&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:22:36', '2015-03-24 16:41:43');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (18, 'Bluetack', 'Proxy', 'https://www.iblocklist.com/list.php?list=xoebmbyexwuiogmbyprb', 'list.iblocklist.com/lists/bluetack/proxy', 'http://list.iblocklist.com/?list=xoebmbyexwuiogmbyprb&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:22:54', '2015-03-24 16:41:43');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (19, 'Bluetack', 'Range Test', 'https://www.iblocklist.com/list.php?list=plkehquoahljmyxjixpu', 'list.iblocklist.com/lists/bluetack/range-test', 'http://list.iblocklist.com/?list=plkehquoahljmyxjixpu&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:23:12', '2015-03-24 16:41:43');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (20, 'Bluetack', 'Spider', 'https://www.iblocklist.com/list.php?list=mcvxsnihddgutbjfbghy', 'list.iblocklist.com/lists/bluetack/spider', 'http://list.iblocklist.com/?list=mcvxsnihddgutbjfbghy&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:23:23', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (21, 'Bluetack', 'Spyware', 'https://www.iblocklist.com/list.php?list=llvtlsjyoyiczbkjsxpf', 'list.iblocklist.com/lists/bluetack/spyware', 'http://list.iblocklist.com/?list=llvtlsjyoyiczbkjsxpf&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:23:35', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (22, 'Bluetack', 'Web Exploit', 'https://www.iblocklist.com/list.php?list=ghlzqtqxnzctvvajwwag', 'list.iblocklist.com/lists/bluetack/web-exploit', 'http://list.iblocklist.com/?list=ghlzqtqxnzctvvajwwag&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:23:46', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (23, 'Bluetack', 'Web Exploit Forum Spam', 'https://www.iblocklist.com/list.php?list=bimsvyvtgxeelunveyal', 'list.iblocklist.com/lists/bluetack/webexploit-forumspam', 'http://list.iblocklist.com/?list=bimsvyvtgxeelunveyal&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:23:59', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (24, 'CIDR-Report', 'Bogon', 'https://www.iblocklist.com/list.php?list=lujdnbasfaaixitgmxpp', 'list.iblocklist.com/lists/cidr-report/bogon', 'http://list.iblocklist.com/?list=lujdnbasfaaixitgmxpp&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:24:10', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (25, 'DCHubAd', 'Faker', 'https://www.iblocklist.com/list.php?list=dhuwlruzmglnfaneeizx', 'list.iblocklist.com/lists/dchubad/faker', 'http://list.iblocklist.com/?list=dhuwlruzmglnfaneeizx&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:24:22', '2015-03-24 16:41:44');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (26, 'DCHubAd', 'Hacker', 'https://www.iblocklist.com/list.php?list=qpuabqfzsykfvglktzkh', 'list.iblocklist.com/lists/dchubad/hacker', 'http://list.iblocklist.com/?list=qpuabqfzsykfvglktzkh&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:24:33', '2015-03-24 16:41:44');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (27, 'DCHubAd', 'Pedophiles', 'https://www.iblocklist.com/list.php?list=zchgtvitlwnwcjfuxovf', 'list.iblocklist.com/lists/dchubad/pedophiles', 'http://list.iblocklist.com/?list=zchgtvitlwnwcjfuxovf&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:24:51', '2015-03-24 16:41:44');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (28, 'DCHubAd', 'Spammer', 'https://www.iblocklist.com/list.php?list=falwwczjguruglzisxdr', 'list.iblocklist.com/lists/dchubad/spammer', 'http://list.iblocklist.com/?list=falwwczjguruglzisxdr&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:25:03', '2015-03-24 16:41:45');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (29, 'I-Blocklist', 'RapidShare', 'https://www.iblocklist.com/list.php?list=zfucwtjkfwkalytktyiw', 'list.iblocklist.com/lists/peerblock/rapidshare', 'http://list.iblocklist.com/?list=zfucwtjkfwkalytktyiw&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:25:15', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (30, 'Spamhaus', 'DROP', 'https://www.iblocklist.com/list.php?list=zbdlwrqkabxbcppvrnos', 'list.iblocklist.com/lists/spamhaus/drop', 'http://list.iblocklist.com/?list=zbdlwrqkabxbcppvrnos&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:25:27', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (31, 'TBG', 'Bogon', 'https://www.iblocklist.com/list.php?list=ewqglwibdgjttwttrinl', 'list.iblocklist.com/lists/tbg/bogon', 'http://list.iblocklist.com/?list=ewqglwibdgjttwttrinl&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:25:45', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (32, 'TBG', 'Business ISPs', 'https://www.iblocklist.com/list.php?list=jcjfaxgyyshvdbceroxf', 'list.iblocklist.com/lists/tbg/business-isps', 'http://list.iblocklist.com/?list=jcjfaxgyyshvdbceroxf&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:26:03', '2015-03-24 16:41:46');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (33, 'TBG', 'Educational Institutions', 'https://www.iblocklist.com/list.php?list=lljggjrpmefcwqknpalp', 'list.iblocklist.com/lists/tbg/educational-institutions', 'http://list.iblocklist.com/?list=lljggjrpmefcwqknpalp&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:26:16', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (34, 'TBG', 'General Corporate Ranges', 'https://www.iblocklist.com/list.php?list=ecqbsykllnadihkdirsh', 'list.iblocklist.com/lists/tbg/general-corporate-ranges', 'http://list.iblocklist.com/?list=ecqbsykllnadihkdirsh&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:26:35', '2015-03-24 16:41:47');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (35, 'TBG', 'Hijacked', 'https://www.iblocklist.com/list.php?list=tbnuqfclfkemqivekikv', 'list.iblocklist.com/lists/tbg/hijacked', 'http://list.iblocklist.com/?list=tbnuqfclfkemqivekikv&fileformat=p2p&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:26:53', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (36, 'TBG', 'Primary Threats', 'https://www.iblocklist.com/list.php?list=ijfqtofzixtwayqovmxn', 'list.iblocklist.com/lists/tbg/primary-threats', 'http://list.iblocklist.com/?list=ijfqtofzixtwayqovmxn&fileformat=cidr&archiveformat=gz', 1, 1, 1, null, '2015-03-24 16:27:14', '2015-03-24 16:41:49');
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (37, 'TBG', 'Search Engines', 'https://www.iblocklist.com/list.php?list=pfefqteoxlfzopecdtyw', 'list.iblocklist.com/lists/tbg/search-engines', 'http://list.iblocklist.com/?list=pfefqteoxlfzopecdtyw&fileformat=cidr&archiveformat=gz', 0, 0, 0, null, '2015-03-24 16:27:32', null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (38, 'Abuse', 'Palevo', 'https://www.iblocklist.com/list.php?list=erqajhwrxiuvjxqrrwfj', null, 'http://list.iblocklist.com/?list=zvjxsfuvdhoxktpeiokq&fileformat=cidr&archiveformat=gz', 0, 0, 0, 'rTorrent only', null, null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (39, 'Abuse', 'SpyEye', 'https://www.iblocklist.com/list.php?list=zvjxsfuvdhoxktpeiokq', null, 'http://list.iblocklist.com/?list=zvjxsfuvdhoxktpeiokq&fileformat=cidr&archiveformat=gz', 0, 0, 0, 'rTorrent only', null, null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (40, 'Bluetack', 'Exclusions', 'https://www.iblocklist.com/list.php?list=mtxmiireqmjzazcsoiem', null, 'http://list.iblocklist.com/?list=mtxmiireqmjzazcsoiem&fileformat=cidr&archiveformat=gz', 0, 0, 0, 'rTorrent only', null, null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (41, 'CI Army', 'Malicious', 'https://www.iblocklist.com/list.php?list=npkuuhuxcsllnhoamkvm', null, 'http://list.iblocklist.com/?list=npkuuhuxcsllnhoamkvm&fileformat=cidr&archiveformat=gz', 0, 0, 0, 'rTorrent only', null, null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (42, 'I-Blocklist', 'Pedophiles', 'https://www.iblocklist.com/list.php?list=dufcxgnbjsdwmwctgfuj', null, 'http://list.iblocklist.com/?list=dufcxgnbjsdwmwctgfuj&fileformat=cidr&archiveformat=gz', 0, 0, 0, 'rTorrent only', null, null);
INSERT INTO [blocklists] ([id_blocklists], [author], [list_name], [url_infos], [peerguardian_list], [rtorrent_list], [peerguardian_active], [rtorrent_active], [default], [comments], [peerguardian_lastupdate], [rtorrent_lastupdate]) VALUES (43, 'Nexus23', 'ipfilterX', 'https://www.iblocklist.com/list.php?list=tqdjwkbxfurudwonprji', 'list.iblocklist.com/lists/nexus23/ipfilterx', null, 0, 0, 0, 'PeerGuardian Only, subscription needed', 'failed', null);

-- Table: providers_monitoring
CREATE TABLE providers_monitoring ( 
    id_providers_monitoring INTEGER        PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                           NOT NULL ON CONFLICT ABORT
                                           UNIQUE ON CONFLICT ABORT,
    provider                VARCHAR( 16 ),
    ipv4                    VARCHAR( 25 ),
    hostname                VARCHAR( 32 ) 
);

INSERT INTO [providers_monitoring] ([id_providers_monitoring], [provider], [ipv4], [hostname]) VALUES (1, 'ONLINE', '62.210.16.0/24', null);
INSERT INTO [providers_monitoring] ([id_providers_monitoring], [provider], [ipv4], [hostname]) VALUES (2, 'OVH', null, 'proxy-rbx2.ovh.net');
INSERT INTO [providers_monitoring] ([id_providers_monitoring], [provider], [ipv4], [hostname]) VALUES (3, 'OVH', null, 'proxy-rbx.ovh.net');
INSERT INTO [providers_monitoring] ([id_providers_monitoring], [provider], [ipv4], [hostname]) VALUES (4, 'OVH', null, 'proxy.sbg.ovh.net');
INSERT INTO [providers_monitoring] ([id_providers_monitoring], [provider], [ipv4], [hostname]) VALUES (5, 'OVH', null, 'proxy.bhs.ovh.net');
INSERT INTO [providers_monitoring] ([id_providers_monitoring], [provider], [ipv4], [hostname]) VALUES (6, 'OVH', null, 'ping.ovh.net');

-- Table: repositories
CREATE TABLE repositories ( 
    id_repositories INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                    NOT NULL ON CONFLICT ABORT
                                    UNIQUE ON CONFLICT ABORT,
    type            VARCHAR( 5 )    NOT NULL ON CONFLICT ABORT,
    dir             VARCHAR( 32 )   NOT NULL ON CONFLICT ABORT,
    name            VARCHAR( 32 )   NOT NULL ON CONFLICT ABORT,
    version         VARCHAR( 8 ),
    file            VARCHAR( 32 ),
    old_file        VARCHAR( 32 ),
    url             VARCHAR( 256 )  NOT NULL ON CONFLICT ABORT,
    active          BOOLEAN( 1 ) 
);

INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (1, 'GIT', '/web/rutorrent', 'ruTorrent', 3.7, 'ruTorrent_v3.7.zip', '', 'https://github.com/Novik/ruTorrent', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (2, 'TARGZ', '/web/rutorrent/plugins/chat', 'ruTorrent Plugin Chat', 2.0, 'chat-2.0.tar.gz', '', 'https://rutorrent-chat.googlecode.com/files/chat-2.0.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (3, 'TARGZ', '/web/rutorrent/plugins/logoff', 'ruTorrent Plugin Logoff', 1.3, 'logoff-1.3.tar.gz', '', 'https://rutorrent-logoff.googlecode.com/files/logoff-1.3.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (4, 'TARGZ', '/web/rutorrent/plugins/lbll-suite', 'ruTorrent Plugin tAdd-Labels', 1.1, 'tadd-labels_1.1.tar.gz', 'lbll-suite_0.8.1.tar.gz', 'http://rutorrent-tadd-labels.googlecode.com/files/tadd-labels_1.1.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (5, 'TARGZ', '/web/rutorrent/plugins/nfo', 'ruTorrent Plugin NFO', 1337, 'nfo_v1337.tar.gz', '', 'http://srious.biz/nfo.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (6, 'GIT', '/web/rutorrent/plugins/ratiocolor', 'ruTorrent Plugin RatioColor', 0.5, 'ratiocolor_v0.5.zip', '', 'https://github.com/Gyran/rutorrent-ratiocolor', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (7, 'SVN', '/web/rutorrent/plugins/filemanager', 'ruTorrent Plugin FileManager', 0.09, 'filemanager_v0.09.zip', '', 'http://svn.rutorrent.org/svn/filemanager/trunk/filemanager', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (8, 'SVN', '/web/rutorrent/plugins/fileupload', 'ruTorrent Plugin FileUpload', 0.02, 'fileupload_v0.02.zip', '', 'http://svn.rutorrent.org/svn/filemanager/trunk/fileupload', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (9, 'SVN', '/web/rutorrent/plugins/fileshare', 'ruTorrent Plugin FileShare', 0.03, 'fileshare_v0.03.zip', '', 'http://svn.rutorrent.org/svn/filemanager/trunk/fileshare', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (10, 'SVN', '/web/rutorrent/plugins/mediastream', 'ruTorrent Plugin MediaStream', 0.01, 'mediastream_v0.01.zip', '', 'http://svn.rutorrent.org/svn/filemanager/trunk/mediastream', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (11, 'TARGZ', '/web/rutorrent/plugins/stream', 'ruTorrent Plugin Stream', 1.0, 'stream_v1.0.tar.gz', '', 'https://rutorrent-stream-plugin.googlecode.com/files/stream.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (12, 'SVN', '/web/rutorrent/plugins/pausewebui', 'ruTorrent Plugin Pause WebUI', 1.2, 'pausewebui_v1.2.zip', '', 'http://rutorrent-pausewebui.googlecode.com/svn/trunk/', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (13, 'GIT', '/web/rutorrent/plugins/mobile', 'ruTorrent Plugin Mobile', 1.0, 'mobile_v1.0.zip', '', 'https://github.com/xombiemp/rutorrentMobile.git', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (14, 'GIT', '/web/rutorrent/plugins/autodl-irssi', 'ruTorrent Plugin Autodl-irssi', 1.52, 'autodl_v1.52.zip', '', 'https://github.com/autodl-community/autodl-rutorrent.git', 0);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (15, 'TARGZ', '/sources/plowshare', 'Plowshare4', 4, 'Plowshare4.tar.gz', '', 'https://github.com/toulousain79/MySB/blob/v2.1/files/Plowshare4.tar.gz?raw=true', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (16, 'CURL', '/usr/bin/composer', 'Composer', '', 'composer.phar', '', 'http://getcomposer.org/installer', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (17, 'TARGZ', '/sources/nodejs', 'NodeJS', '0.12.2', 'node-v0.12.2.tar.gz', 'node_v0.10.35.tar.gz', 'http://nodejs.org/dist/v0.12.2/node-v0.12.2.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (18, 'GIT', '/web/seedbox-manager', 'Seedbox-Manager', 0.1, 'seedbox-manager_v0.1.zip', '', 'https://github.com/Magicalex/seedbox-manager.git', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (19, 'GIT', '/web/rutorrent/plugins/linkseedboxmanager', 'ruTorrent Plugin Link Manager', 0.1, 'linkseedboxmanager_v0.1.zip', '', 'https://github.com/Hydrog3n/linkseedboxmanager.git', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (20, 'GIT', '/web/Cakebox-light', 'Cakebox-Light', '1.8.3', 'cakebox-light_v1.8.3.zip', '', 'https://github.com/Cakebox/Cakebox-light.git', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (21, 'GIT', '/web/rutorrent/plugins/linkcakebox', 'ruTorrent Plugin Link Cakebox', 0.1, 'linkcakebox_v0.1.zip', '', 'https://github.com/Cakebox/linkcakebox.git', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (22, 'GIT', '/sources/libsodium', 'Libsodium', 0.1, 'libsodium_v0.1.zip', '', 'https://github.com/jedisct1/libsodium', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (23, 'TARGZ', '/sources/dnscrypt-proxy', 'DNScrypt-proxy', '1.4.3', 'dnscrypt-proxy_v1.4.3.tar.gz', 'dnscrypt-proxy_v1.4.2.tar.gz', 'http://download.dnscrypt.org/dnscrypt-proxy/dnscrypt-proxy-1.4.3.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (24, 'WBM', '/files', 'OpenVPNadmin WebMin', 2.6, 'openvpn-2.6.wbm', '', 'http://www.openit.it/downloads/OpenVPNadmin/openvpn-2.6.wbm.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (25, 'WBM', '/files', 'Nginx Webmin Module', '0.0.8', 'nginx-0.08.wbm', '', 'http://www.justindhoffman.com/sites/justindhoffman.com/files/nginx-0.08.wbm__0.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (26, 'WBM', '/files', 'MiniDLNA Webmin Module', 'alpha1.12 svn26', 'minidlnawebmin_alpha1_12.wbm', '', 'http://downloads.sourceforge.net/project/minidlnawebmin/Webmin%20alpha1.12%20svn26/minidlnawebmin_alpha1_12.wbm?r=http%3A%2F%2Fsourceforge.net%2Fprojects%2Fminidlnawebmin%2Ffiles%2FWebmin%2520alpha1.12%2520svn26%2F&ts=1420088634&use_mirror=freefr', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (27, 'TARGZ', '/sources/libtorrent', 'LibTorrent', '0.13.4', 'libtorrent_v0.13.4.tar.gz', '', 'http://libtorrent.rakshasa.no/downloads/libtorrent-0.13.4.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (28, 'TARGZ', '/sources/rtorrent', 'rTorrent', '0.9.4', 'rtorrent_v0.9.4.tar.gz', '', 'http://libtorrent.rakshasa.no/downloads/rtorrent-0.9.4.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (29, 'SVN', '/sources/xmlrpc-c', 'XMLRPC', 0.1, 'xmlrpc-c_v0.01.zip', '', 'http://svn.code.sf.net/p/xmlrpc-c/code/advanced', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (30, 'GIT', '/web/loadavg', 'LoadAvg', 2.2, 'loadavg_v2.2.zip', '', 'https://github.com/loadavg/loadavg.git', 1);

-- Table: services
CREATE TABLE services ( 
    id_services    INTEGER        PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                  NOT NULL ON CONFLICT ABORT
                                  UNIQUE ON CONFLICT ABORT,
    serv_name      VARCHAR( 32 )  NOT NULL ON CONFLICT ABORT
                                  UNIQUE ON CONFLICT IGNORE,
    bin            VARCHAR( 32 ),
    port_tcp1      VARCHAR( 11 ),
    port_tcp2      VARCHAR( 11 ),
    port_tcp3      VARCHAR( 11 ),
    ports_tcp_list VARCHAR( 32 ),
    port_udp1      VARCHAR( 11 ),
    port_udp2      VARCHAR( 11 ),
    port_udp3      VARCHAR( 11 ),
    ports_udp_list VARCHAR( 32 ),
    to_install     BOOLEAN( 1 )   DEFAULT ( 0 ),
    is_installed   BOOLEAN        NOT NULL ON CONFLICT ABORT
                                  DEFAULT ( 0 ) 
);

INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (1, 'Seedbox-Manager', '', '', '', '', '', '', '', ' ', ' ', 0, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (2, 'CakeBox-Light', '', 8887, '', '', '', '', '', '', '', 0, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (3, 'Plex Media Server', '', '', '', '', '32400 32469', '', '', ' ', '1900 5353 32410 32412 32413 32414', 0, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (4, 'Webmin', '', 8890, '', '', '', '', '', ' ', ' ', 0, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (5, 'OpenVPN', '', 8893, 8894, 8895, '', '', '', '', '', 0, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (6, 'LogWatch', '', '', '', '', '', '', '', ' ', ' ', 0, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (7, 'Fail2Ban', '', '', '', '', '', '', '', ' ', ' ', 0, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (8, 'PeerGuardian', '', '', '', '', '', '', '', ' ', ' ', 1, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (9, 'rTorrent Block List', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (10, 'DNScrypt-proxy', '', '', '', '', '', '', ' ', ' ', ' ', 0, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (11, 'CRON', '', '', '', '', '', '', ' ', ' ', ' ', 1, 0);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (12, 'NginX', '', 8889, 8888, '', '', '', '', '', '', 1, 0);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (13, 'SSH', '', 8892, '', '', '', '', '', '', '', 1, 0);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (14, 'VSFTPd', '', 8891, 8800, '65000:65535', '', '', '', '', '', 1, 0);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (15, 'PHP5-FPM', '', '', '', '', '', '', ' ', ' ', ' ', 1, 0);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (16, 'Postfix', '', '', '', '', '', '', ' ', ' ', ' ', 1, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (17, 'Networking', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (18, 'Samba', '', '', '', '', '', '', ' ', ' ', ' ', 0, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (19, 'NFS', '', '', '', '', '', '', ' ', ' ', ' ', 1, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (20, 'BIND', '', '', '', '', '', '', ' ', ' ', ' ', 0, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (21, 'Stunnel', '', '', '', '', '', '', ' ', ' ', ' ', 0, 1);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (22, 'rTorrent v0.9.2', '/usr/bin/rtorrent', null, null, null, null, null, null, null, null, 1, 0);
INSERT INTO [services] ([id_services], [serv_name], [bin], [port_tcp1], [port_tcp2], [port_tcp3], [ports_tcp_list], [port_udp1], [port_udp2], [port_udp3], [ports_udp_list], [to_install], [is_installed]) VALUES (23, 'rTorrent v0.9.4', '/usr/local/bin/rtorrent', null, null, null, null, null, null, null, null, 1, 0);

-- Table: users
CREATE TABLE users ( 
    id_users         INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                     NOT NULL ON CONFLICT ABORT
                                     UNIQUE ON CONFLICT ABORT,
    users_ident      VARCHAR( 32 )   NOT NULL ON CONFLICT ABORT
                                     UNIQUE ON CONFLICT IGNORE,
    users_email      VARCHAR( 260 )  NOT NULL ON CONFLICT ABORT,
    users_passwd     VARCHAR( 32 ),
    rpc              VARCHAR( 64 ),
    sftp             BOOLEAN( 1 )    DEFAULT ( 1 ),
    sudo             BOOLEAN( 1 )    DEFAULT ( 0 ),
    admin            BOOLEAN( 1 )    DEFAULT ( 0 ),
    scgi_port        INTEGER( 5 ),
    rtorrent_port    INTEGER( 5 ),
    home_dir         VARCHAR( 128 ),
    is_active        BOOLEAN( 1 )    DEFAULT ( 1 ),
    rtorrent_version VARCHAR( 10 )   DEFAULT ( 'v0.9.2' ),
    rtorrent_restart BOOLEAN( 1 )    DEFAULT ( '0' ) 
);

INSERT INTO [users] ([id_users], [users_ident], [users_email], [users_passwd], [rpc], [sftp], [sudo], [admin], [scgi_port], [rtorrent_port], [home_dir], [is_active], [rtorrent_version], [rtorrent_restart]) VALUES (1, 'elohim13', 'toulousain79@gmail.com', 'pieRRot79.', '/ELOHIM13', 1, 1, 1, 51111, 51112, '/home/elohim13', 1, 'v0.9.2', 0);

-- Table: system
CREATE TABLE system ( 
    id_system          INTEGER( 1, 1 )  PRIMARY KEY ON CONFLICT IGNORE
                                        NOT NULL ON CONFLICT ABORT,
    mysb_version       VARCHAR( 6 )     NOT NULL ON CONFLICT ABORT
                                        UNIQUE ON CONFLICT IGNORE,
    mysb_user          VARCHAR( 32 )    UNIQUE ON CONFLICT IGNORE,
    mysb_password      VARCHAR( 32 )    UNIQUE ON CONFLICT IGNORE,
    hostname           VARCHAR( 128 )   UNIQUE ON CONFLICT IGNORE,
    ipv4               VARCHAR( 15 )    UNIQUE ON CONFLICT IGNORE,
    primary_inet       VARCHAR( 16 )    UNIQUE ON CONFLICT IGNORE,
    timezone           VARCHAR( 64 )    UNIQUE ON CONFLICT IGNORE,
    cert_password      VARCHAR( 32 )    UNIQUE ON CONFLICT IGNORE,
    apt_update         BOOLEAN( 1 )     DEFAULT ( 1 ),
    apt_date           DATETIME,
    server_provider    VARCHAR( 16 ),
    ip_restriction     BOOLEAN( 1 )     DEFAULT ( 1 ),
    pgl_email_stats    BOOLEAN( 1 )     DEFAULT ( 0 ),
    pgl_watchdog_email BOOLEAN( 1 )     DEFAULT ( 0 ) 
);

INSERT INTO [system] ([id_system], [mysb_version], [mysb_user], [mysb_password], [hostname], [ipv4], [primary_inet], [timezone], [cert_password], [apt_update], [apt_date], [server_provider], [ip_restriction], [pgl_email_stats], [pgl_watchdog_email]) VALUES (1, 'v2.1', 'xiUjBSi7', 'yGudyQ7eW5EIXGvv', 'srv1.lig2p.com', '212.83.153.106', 'eth0', 'Europe/Paris', 'f6rQ37fvLq4QVvWm', 0, '2015-03-24 16:29:17', '', 1, 0, 0);
