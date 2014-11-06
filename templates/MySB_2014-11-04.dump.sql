
-- Table: ports
CREATE TABLE ports ( 
    id_ports INTEGER NOT NULL
                     PRIMARY KEY AUTOINCREMENT,
    value    INTEGER UNIQUE
                     NOT NULL 
);


-- Table: renting
CREATE TABLE renting ( 
    id_renting  INTEGER        NOT NULL
                               PRIMARY KEY AUTOINCREMENT,
    model       VARCHAR( 64 )  NULL,
    tva         NUMERIC        NULL,
    global_cost NUMERIC        NULL 
);


-- Table: smtp
CREATE TABLE smtp ( 
    id_smtp       INTEGER         NOT NULL
                                  PRIMARY KEY AUTOINCREMENT,
    smtp_provider VARCHAR( 5 )    UNIQUE
                                  NOT NULL,
    smtp_username VARCHAR( 64 )   UNIQUE
                                  NULL,
    smtp_passwd   VARCHAR( 64 )   UNIQUE
                                  NULL,
    smtp_host     VARCHAR( 128 )  UNIQUE
                                  NULL,
    smtp_port     VARCHAR( 5 )    UNIQUE
                                  NULL 
);


-- Table: system
CREATE TABLE system ( 
    id_system        INTEGER         NOT NULL
                                     PRIMARY KEY AUTOINCREMENT,
    mysb_version     VARCHAR( 6 )    UNIQUE
                                     NOT NULL,
    mysb_user        VARCHAR( 32 )   UNIQUE
                                     NULL,
    mysb_password    VARCHAR( 32 )   UNIQUE
                                     NULL,
    hostname         VARCHAR( 128 )  UNIQUE
                                     NULL,
    ipv4             VARCHAR( 15 )   UNIQUE
                                     NULL,
    primary_inet     VARCHAR( 16 )   UNIQUE
                                     NULL,
    timezone         VARCHAR( 64 )   UNIQUE
                                     NULL,
    cert_password    VARCHAR( 13 )   UNIQUE
                                     NULL,
    port_ftp         INTEGER         UNIQUE
                                     NULL,
    port_ftp_data    INTEGER         UNIQUE
                                     NULL,
    port_ftp_passive VARCHAR( 11 )   UNIQUE
                                     NULL,
    port_ssh         INTEGER         UNIQUE
                                     NULL,
    port_https       INTEGER         UNIQUE
                                     NULL,
    port_http        INTEGER         UNIQUE
                                     NULL 
);


-- Table: vars
CREATE TABLE vars ( 
    id_vars            INTEGER        PRIMARY KEY AUTOINCREMENT
                                      NOT NULL,
    fail2ban_whitelist VARCHAR( 12 ),
    vpn_ip             VARCHAR( 37 ),
    white_tcp_port_out VARCHAR( 16 ),
    white_udp_port_out VARCHAR( 16 ) 
);

INSERT INTO [vars] ([id_vars], [fail2ban_whitelist], [vpn_ip], [white_tcp_port_out], [white_udp_port_out]) VALUES (1, '127.0.0.1/32', '10.0.0.0/24,10.0.1.0/24', '80 443', null);

-- Table: users
CREATE TABLE users ( 
    id_users      INTEGER         PRIMARY KEY AUTOINCREMENT
                                  NOT NULL,
    users_ident   VARCHAR( 32 )   NOT NULL
                                  UNIQUE,
    users_email   VARCHAR( 260 )  NOT NULL
                                  UNIQUE,
    users_passwd  VARCHAR( 32 ),
    rpc           VARCHAR( 64 ),
    sftp          BOOLEAN( 1 )    NOT NULL
                                  DEFAULT ( 1 ),
    sudo          BOOLEAN( 1 )    NOT NULL
                                  DEFAULT ( 0 ),
    admin         BOOLEAN( 1 )    NOT NULL
                                  DEFAULT ( 0 ),
    fixed_ip      VARCHAR( 128 ),
    no_ip         VARCHAR( 128 ),
    scgi_port     INTEGER( 5 ),
    rtorrent_port INTEGER( 5 ),
    home_dir      VARCHAR( 128 ) 
);

INSERT INTO [users] ([id_users], [users_ident], [users_email], [users_passwd], [rpc], [sftp], [sudo], [admin], [fixed_ip], [no_ip], [scgi_port], [rtorrent_port], [home_dir]) VALUES (1, 'elohim13', 'toulousain79@gmail.com', '', '/ELOHIM13', 1, 1, 1, '82.231.218.239,192.168.13.1', null, 51111, 51112, '/home/elohim13');

-- Table: system_services
CREATE TABLE system_services ( 
    id_system_services INTEGER        PRIMARY KEY AUTOINCREMENT
                                      NOT NULL,
    short_name         VARCHAR( 32 )  NOT NULL
                                      UNIQUE,
    ident              VARCHAR( 64 )  NOT NULL
                                      UNIQUE,
    command            VARCHAR( 32 )  NOT NULL,
    args               VARCHAR( 64 ) 
);

INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (1, 'CRON', 'crontab', 'service cron', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (2, 'NginX', '/etc/nginx', 'service nginx', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (3, 'SSH', '/etc/ssh', 'service ssh', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (4, 'VSFTPd', '/etc/vsftpd', 'service vsftpd', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (5, 'PHP5-FPM', '/etc/php5', 'service php5-fpm', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (6, 'Postfix', '/etc/postfix', 'service postfix', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (7, 'Stunnel', '/etc/stunnel', 'service stunnel4', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (8, 'OpenVPN', '/etc/openvpn', 'service openvpn', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (9, 'Fail2Ban', '/etc/fail2ban', 'service fail2ban', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (10, 'PeerGuardian', '/etc/pgl', 'pglcmd', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (11, 'Webmin', '/etc/webmin', 'service webmin', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (12, 'Network', '/etc/network', 'service networking', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (13, 'Samba', '/etc/samba', 'service samba', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (14, 'NFS', '/etc/exports', 'service nfs-kernel-server', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (15, 'DNScrypt-proxy', 'dnscrypt-proxy', 'service dnscrypt-proxy', null);
INSERT INTO [system_services] ([id_system_services], [short_name], [ident], [command], [args]) VALUES (16, 'BIND', '/etc/bind/named.conf', 'service bind9', null);

-- Table: services
CREATE TABLE services ( 
    id_services  INTEGER        PRIMARY KEY AUTOINCREMENT
                                NOT NULL,
    serv_name    VARCHAR( 32 )  NOT NULL
                                UNIQUE,
    ports_tcp    VARCHAR( 32 ),
    ports_udp    VARCHAR( 32 ),
    is_installed BOOLEAN        DEFAULT ( 0 ) 
);

INSERT INTO [services] ([id_services], [serv_name], [ports_tcp], [ports_udp], [is_installed]) VALUES (1, 'Seedbox-Manager', '', '', 1);
INSERT INTO [services] ([id_services], [serv_name], [ports_tcp], [ports_udp], [is_installed]) VALUES (2, 'CakeBox-Light', 8887, null, 1);
INSERT INTO [services] ([id_services], [serv_name], [ports_tcp], [ports_udp], [is_installed]) VALUES (3, 'Plex Media Server', '32400 32469', '1900 5353 2410 32412 32413 32414', 1);
INSERT INTO [services] ([id_services], [serv_name], [ports_tcp], [ports_udp], [is_installed]) VALUES (4, 'Webmin', 8890, '', 1);
INSERT INTO [services] ([id_services], [serv_name], [ports_tcp], [ports_udp], [is_installed]) VALUES (5, 'OpenVPN', '8893 8894', null, 1);
INSERT INTO [services] ([id_services], [serv_name], [ports_tcp], [ports_udp], [is_installed]) VALUES (6, 'LogWatch', null, null, 0);
INSERT INTO [services] ([id_services], [serv_name], [ports_tcp], [ports_udp], [is_installed]) VALUES (7, 'Fail2Ban', null, null, 1);
INSERT INTO [services] ([id_services], [serv_name], [ports_tcp], [ports_udp], [is_installed]) VALUES (8, 'PeerGuardian', null, null, 1);
INSERT INTO [services] ([id_services], [serv_name], [ports_tcp], [ports_udp], [is_installed]) VALUES (9, 'rTorrent Block List', null, null, 0);
INSERT INTO [services] ([id_services], [serv_name], [ports_tcp], [ports_udp], [is_installed]) VALUES (10, 'DNScrypt-proxy', null, '53 54 443 2053 5353', 1);

-- Table: trackers_users
CREATE TABLE trackers_users ( 
    id_trackers_users INTEGER         PRIMARY KEY AUTOINCREMENT
                                      NOT NULL,
    tracker_users     VARCHAR( 128 )  NOT NULL
                                      UNIQUE,
    is_active         BOOLEAN( 1 )    DEFAULT ( 0 ) 
);

INSERT INTO [trackers_users] ([id_trackers_users], [tracker_users], [is_active]) VALUES (1, 'frenchtorrentdb.com', 0);
INSERT INTO [trackers_users] ([id_trackers_users], [tracker_users], [is_active]) VALUES (2, 'share1underground.com', 0);
INSERT INTO [trackers_users] ([id_trackers_users], [tracker_users], [is_active]) VALUES (3, 'empereur-team.ovh', 0);
INSERT INTO [trackers_users] ([id_trackers_users], [tracker_users], [is_active]) VALUES (4, 'genration-rosco-tk.net', 0);
INSERT INTO [trackers_users] ([id_trackers_users], [tracker_users], [is_active]) VALUES (5, 'torrentreactor.net', 0);
INSERT INTO [trackers_users] ([id_trackers_users], [tracker_users], [is_active]) VALUES (6, 'afrbits.com', 0);
INSERT INTO [trackers_users] ([id_trackers_users], [tracker_users], [is_active]) VALUES (7, 'french-adn.com', 0);
INSERT INTO [trackers_users] ([id_trackers_users], [tracker_users], [is_active]) VALUES (8, 'neo-tk.com', 0);
INSERT INTO [trackers_users] ([id_trackers_users], [tracker_users], [is_active]) VALUES (9, 'cool-tracker.be', 0);

-- Table: trakers_list
CREATE TABLE trakers_list ( 
    id_trakers_list INTEGER         PRIMARY KEY AUTOINCREMENT
                                    NOT NULL,
    traker          VARCHAR( 128 )  NOT NULL
                                    UNIQUE,
    ipv4            VARCHAR( 128 ),
    is_ssl          BOOLEAN( 1 )    DEFAULT ( 0 ),
    is_active       BOOLEAN( 1 )    DEFAULT ( 0 ) 
);


-- Table: trackers_rutorrent
CREATE TABLE trackers_rutorrent ( 
    id_trackers_domains INTEGER         PRIMARY KEY AUTOINCREMENT
                                        NOT NULL,
    tracker_rutorrent   VARCHAR( 128 )  NOT NULL
                                        UNIQUE,
    is_active           BOOLEAN( 1 )    DEFAULT ( 0 ) 
);


-- Table: peerguardian_blocklists
CREATE TABLE peerguardian_blocklists ( 
    id_peerguardian_blocklists INTEGER         PRIMARY KEY AUTOINCREMENT
                                               NOT NULL,
    blocklists                 VARCHAR( 256 )  NOT NULL
                                               UNIQUE,
    is_active                  BOOLEAN( 1 )    DEFAULT ( 0 ) 
);

INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (1, 'list.iblocklist.com/lists/atma/atma', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (2, 'list.iblocklist.com/lists/bluetack/ads-trackers-and-bad-pr0n', 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (3, 'list.iblocklist.com/lists/bluetack/bad-peers', 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (4, 'list.iblocklist.com/lists/bluetack/bogon', 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (5, 'list.iblocklist.com/lists/bluetack/dshield', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (6, 'list.iblocklist.com/lists/bluetack/edu', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (7, 'list.iblocklist.com/lists/bluetack/for-non-lan-computers', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (8, 'list.iblocklist.com/lists/bluetack/forum-spam', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (9, 'list.iblocklist.com/lists/bluetack/hijacked', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (10, 'list.iblocklist.com/lists/bluetack/iana-multicast', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (11, 'list.iblocklist.com/lists/bluetack/iana-private', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (12, 'list.iblocklist.com/lists/bluetack/iana-reserved', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (13, 'list.iblocklist.com/lists/bluetack/level-1', 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (14, 'list.iblocklist.com/lists/bluetack/level-2', 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (15, 'list.iblocklist.com/lists/bluetack/level-3', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (16, 'list.iblocklist.com/lists/bluetack/microsoft', 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (17, 'list.iblocklist.com/lists/bluetack/proxy', 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (18, 'list.iblocklist.com/lists/bluetack/range-test', 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (19, 'list.iblocklist.com/lists/bluetack/spider', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (20, 'list.iblocklist.com/lists/bluetack/spyware', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (21, 'list.iblocklist.com/lists/bluetack/web-exploit', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (22, 'list.iblocklist.com/lists/bluetack/webexploit-forumspam', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (23, 'list.iblocklist.com/lists/cidr-report/bogon', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (24, 'list.iblocklist.com/lists/dchubad/faker', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (25, 'list.iblocklist.com/lists/dchubad/hacker', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (26, 'list.iblocklist.com/lists/dchubad/pedophiles', 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (27, 'list.iblocklist.com/lists/dchubad/spammer', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (28, 'list.iblocklist.com/lists/nexus23/ipfilterx', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (29, 'list.iblocklist.com/lists/peerblock/rapidshare', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (30, 'list.iblocklist.com/lists/spamhaus/drop', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (31, 'list.iblocklist.com/lists/tbg/bogon', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (32, 'list.iblocklist.com/lists/tbg/business-isps', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (33, 'list.iblocklist.com/lists/tbg/educational-institutions', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (34, 'list.iblocklist.com/lists/tbg/general-corporate-ranges', 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (35, 'list.iblocklist.com/lists/tbg/hijacked', 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (36, 'list.iblocklist.com/lists/tbg/primary-threats', 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [is_active]) VALUES (37, 'list.iblocklist.com/lists/tbg/search-engines', 1);

-- Table: peerguardian_allowp2p
CREATE TABLE peerguardian_allowp2p ( 
    id_peerguardian_allowp2p INTEGER         PRIMARY KEY AUTOINCREMENT
                                             NOT NULL,
    allowp2p                 VARCHAR( 256 )  NOT NULL
                                             UNIQUE 
);


-- Table: rtorrent_blocklists
CREATE TABLE rtorrent_blocklists ( 
    id_rtorrent_blocklists INTEGER         PRIMARY KEY AUTOINCREMENT
                                           NOT NULL,
    name                   VARCHAR( 32 )   NOT NULL
                                           UNIQUE,
    blocklists             VARCHAR( 256 )  NOT NULL
                                           UNIQUE,
    is_active              BOOLEAN( 1 )    DEFAULT ( 0 ) 
);

INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (1, 'BLUETACK_LEVEL1', 'http://list.iblocklist.com/?list=ydxerpxkpcfqjaybcssw&fileformat=cidr&archiveformat=gz', 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (2, 'BLUETACK_SPYWARE', 'http://list.iblocklist.com/?list=llvtlsjyoyiczbkjsxpf&fileformat=cidr&archiveformat=gz', 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (3, 'BLUETACK_ADS', 'http://list.iblocklist.com/?list=dgxtneitpuvgqqcpfulq&fileformat=cidr&archiveformat=gz', 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (4, 'BLUETACK_EDU', 'http://list.iblocklist.com/?list=imlmncgrkbnacgcwfjvh&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (5, 'BLUETACK_BADPEER', 'http://list.iblocklist.com/?list=cwworuawihqvocglcoss&fileformat=cidr&archiveformat=gz', 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (6, 'BLUETACK_BOGON', 'http://list.iblocklist.com/?list=gihxqmhyunbxhbmgqrla&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (7, 'BLUETACK_DSHIELD', 'http://list.iblocklist.com/?list=xpbqleszmajjesnzddhv&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (8, 'BLUETACK_HIJACKED', 'http://list.iblocklist.com/?list=usrcshglbiilevmyfhse&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (9, 'BLUETACK_IANAMULTICAST', 'http://list.iblocklist.com/?list=pwqnlynprfgtjbgqoizj&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (10, 'BLUETACK_IANAPRIVATE', 'http://list.iblocklist.com/?list=cslpybexmxyuacbyuvib&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (11, 'BLUETACK_IANARESERVED', 'http://list.iblocklist.com/?list=bcoepfyewziejvcqyhqo&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (12, 'BLUETACK_LEVEL2', 'http://list.iblocklist.com/?list=gyisgnzbhppbvsphucsw&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (13, 'BLUETACK_LEVEL3', 'http://list.iblocklist.com/?list=uwnukjqktoggdknzrhgh&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (14, 'BLUETACK_MICROSOFT', 'http://list.iblocklist.com/?list=xshktygkujudfnjfioro&fileformat=cidr&archiveformat=gz', 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (15, 'BLUETACK_PROXY', 'http://list.iblocklist.com/?list=xoebmbyexwuiogmbyprb&fileformat=cidr&archiveformat=gz', 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (16, 'BLUETACK_SPIDER', 'http://list.iblocklist.com/?list=mcvxsnihddgutbjfbghy&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (17, 'BLUETACK_RANGETEST', 'http://list.iblocklist.com/?list=plkehquoahljmyxjixpu&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (18, 'BLUETACK_FORUMSPAM', 'http://list.iblocklist.com/?list=ficutxiwawokxlcyoeye&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (19, 'BLUETACK_WEBEXPLOIT', 'http://list.iblocklist.com/?list=ghlzqtqxnzctvvajwwag&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (20, 'BLUETACK_FORNONLANCOMP', 'http://list.iblocklist.com/?list=jhaoawihmfxgnvmaqffp&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (21, 'BLUETACK_EXCLUSIONS', 'http://list.iblocklist.com/?list=mtxmiireqmjzazcsoiem&fileformat=cidr&archiveformat=gz', 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (22, 'TBG_BOGON', 'http://list.iblocklist.com/?list=ewqglwibdgjttwttrinl&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (23, 'TBG_BUSINESSISPS', 'http://list.iblocklist.com/?list=jcjfaxgyyshvdbceroxf&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (24, 'TBG_GENERALCORPORATE', 'http://list.iblocklist.com/?list=ecqbsykllnadihkdirsh&fileformat=cidr&archiveformat=gz', 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (25, 'TBG_HIJACKED', 'http://list.iblocklist.com/?list=tbnuqfclfkemqivekikv&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (26, 'TBG_PRIMTHREATS', 'http://list.iblocklist.com/?list=ijfqtofzixtwayqovmxn&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (27, 'TBG_EDUINSTITUTUION', 'http://list.iblocklist.com/?list=lljggjrpmefcwqknpalp&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (28, 'TBG_SEARCHENGINE', 'http://list.iblocklist.com/?list=pfefqteoxlfzopecdtyw&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (29, 'SPAMHAUS_DROP', 'http://list.iblocklist.com/?list=zbdlwrqkabxbcppvrnos&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (30, 'ABUSE_ZEUS', 'http://list.iblocklist.com/?list=ynkdjqsjyfmilsgbogqf&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (31, 'ABUSE_SPYEYE', 'http://list.iblocklist.com/?list=zvjxsfuvdhoxktpeiokq&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (32, 'ABUSE_PALEVO', 'http://list.iblocklist.com/?list=erqajhwrxiuvjxqrrwfj&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (33, 'IBLOCK_PEDOPHILE', 'http://list.iblocklist.com/?list=dufcxgnbjsdwmwctgfuj&fileformat=cidr&archiveformat=gz', 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (34, 'CIARMY_MALICIOUS', 'http://list.iblocklist.com/?list=npkuuhuxcsllnhoamkvm&fileformat=cidr&archiveformat=gz', 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (35, 'MALCODE_MALCODE', 'http://list.iblocklist.com/?list=pbqcylkejciyhmwttify&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (36, 'YOYO_ADSERVERS', 'http://list.iblocklist.com/?list=zhogegszwduurnvsyhdf&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (37, 'PBLOCK_RAPIDSHARE', 'http://list.iblocklist.com/?list=zfucwtjkfwkalytktyiw&fileformat=cidr&archiveformat=gz', 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [is_active]) VALUES (38, 'CIDR_BOGON', 'http://list.iblocklist.com/?list=lujdnbasfaaixitgmxpp&fileformat=cidr&archiveformat=gz', 0);
