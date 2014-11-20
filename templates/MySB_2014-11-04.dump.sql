
-- Table: peerguardian_allowp2p
CREATE TABLE peerguardian_allowp2p ( 
    id_peerguardian_allowp2p INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                             NOT NULL ON CONFLICT ABORT,
    allowp2p                 VARCHAR( 256 )  NOT NULL ON CONFLICT ABORT
                                             UNIQUE ON CONFLICT IGNORE 
);


-- Table: ports
CREATE TABLE ports ( 
    id_ports INTEGER PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                     NOT NULL ON CONFLICT ABORT,
    value    INTEGER NOT NULL ON CONFLICT ABORT
                     UNIQUE ON CONFLICT IGNORE 
);


-- Table: services
CREATE TABLE services ( 
    id_services  INTEGER        PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                NOT NULL ON CONFLICT ABORT,
    serv_name    VARCHAR( 32 )  NOT NULL ON CONFLICT ABORT
                                UNIQUE ON CONFLICT IGNORE,
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

-- Table: system
CREATE TABLE system ( 
    id_system        INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                     NOT NULL ON CONFLICT ABORT,
    mysb_version     VARCHAR( 6 )    NOT NULL ON CONFLICT ABORT
                                     UNIQUE ON CONFLICT IGNORE,
    mysb_user        VARCHAR( 32 )   UNIQUE ON CONFLICT IGNORE,
    mysb_password    VARCHAR( 32 )   UNIQUE ON CONFLICT IGNORE,
    hostname         VARCHAR( 128 )  UNIQUE ON CONFLICT IGNORE,
    ipv4             VARCHAR( 15 )   UNIQUE ON CONFLICT IGNORE,
    primary_inet     VARCHAR( 16 )   UNIQUE ON CONFLICT IGNORE,
    timezone         VARCHAR( 64 )   UNIQUE ON CONFLICT IGNORE,
    cert_password    VARCHAR( 13 )   UNIQUE ON CONFLICT IGNORE,
    port_ftp         INTEGER( 5 )    NOT NULL ON CONFLICT ABORT
                                     UNIQUE ON CONFLICT IGNORE
                                     DEFAULT ( 8891 ),
    port_ftp_data    INTEGER( 5 )    NOT NULL ON CONFLICT ABORT
                                     UNIQUE ON CONFLICT IGNORE
                                     DEFAULT ( 8800 ),
    port_ftp_passive VARCHAR( 11 )   NOT NULL ON CONFLICT ABORT
                                     UNIQUE ON CONFLICT IGNORE
                                     DEFAULT ( '65000:65535' ),
    port_ssh         INTEGER( 5 )    NOT NULL ON CONFLICT ABORT
                                     UNIQUE ON CONFLICT IGNORE
                                     DEFAULT ( 8892 ),
    port_https       INTEGER         NOT NULL ON CONFLICT ABORT
                                     UNIQUE ON CONFLICT IGNORE
                                     DEFAULT ( 8889 ),
    port_http        INTEGER         NOT NULL ON CONFLICT ABORT
                                     UNIQUE ON CONFLICT IGNORE
                                     DEFAULT ( 8888 ) 
);


-- Table: system_services
CREATE TABLE system_services ( 
    id_system_services INTEGER        PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                      NOT NULL ON CONFLICT ABORT,
    short_name         VARCHAR( 32 )  NOT NULL ON CONFLICT ABORT
                                      UNIQUE ON CONFLICT IGNORE,
    ident              VARCHAR( 64 )  NOT NULL ON CONFLICT ABORT
                                      UNIQUE ON CONFLICT IGNORE,
    command            VARCHAR( 32 )  NOT NULL ON CONFLICT ABORT,
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

-- Table: trackers_users
CREATE TABLE trackers_users ( 
    id_trackers_users INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                      NOT NULL ON CONFLICT ABORT,
    tracker_users     VARCHAR( 128 )  NOT NULL ON CONFLICT ABORT
                                      UNIQUE ON CONFLICT IGNORE,
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

-- Table: users
CREATE TABLE users ( 
    id_users      INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                  NOT NULL ON CONFLICT ABORT,
    users_ident   VARCHAR( 32 )   NOT NULL ON CONFLICT ABORT
                                  UNIQUE ON CONFLICT IGNORE,
    users_email   VARCHAR( 260 )  NOT NULL ON CONFLICT ABORT
                                  UNIQUE ON CONFLICT IGNORE,
    users_passwd  VARCHAR( 32 ),
    rpc           VARCHAR( 64 ),
    sftp          BOOLEAN( 1 )    NOT NULL ON CONFLICT ABORT
                                  DEFAULT ( 1 ),
    sudo          BOOLEAN( 1 )    NOT NULL ON CONFLICT ABORT
                                  DEFAULT ( 0 ),
    admin         BOOLEAN( 1 )    NOT NULL ON CONFLICT ABORT
                                  DEFAULT ( 0 ),
    fixed_ip      VARCHAR( 128 ),
    no_ip         VARCHAR( 128 ),
    scgi_port     INTEGER( 5 ),
    rtorrent_port INTEGER( 5 ),
    home_dir      VARCHAR( 128 ) 
);


-- Table: vars
CREATE TABLE vars ( 
    id_vars            INTEGER        PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                      NOT NULL ON CONFLICT ABORT,
    fail2ban_whitelist VARCHAR( 12 ),
    vpn_ip             VARCHAR( 37 ),
    white_tcp_port_out VARCHAR( 16 ),
    white_udp_port_out VARCHAR( 16 ) 
);

INSERT INTO [vars] ([id_vars], [fail2ban_whitelist], [vpn_ip], [white_tcp_port_out], [white_udp_port_out]) VALUES (1, '127.0.0.1/32', '10.0.0.0/24,10.0.1.0/24', '80 443', null);

-- Table: trackers_rutorrent
CREATE TABLE trackers_rutorrent ( 
    id_trackers_rutorrent INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                          NOT NULL ON CONFLICT ABORT,
    tracker_rutorrent     VARCHAR( 128 )  NOT NULL ON CONFLICT ABORT
                                          UNIQUE ON CONFLICT IGNORE,
    is_active             BOOLEAN( 1 )    DEFAULT ( 0 ) 
);


-- Table: trackers_list
CREATE TABLE trackers_list ( 
    id_trackers_list INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                     NOT NULL ON CONFLICT ABORT,
    tracker          VARCHAR( 128 )  NOT NULL ON CONFLICT IGNORE
                                     UNIQUE ON CONFLICT IGNORE,
    tracker_domain   VARCHAR( 128 )  NOT NULL ON CONFLICT ABORT
                                     UNIQUE ON CONFLICT IGNORE,
    origin           VARCHAR( 9 )    NOT NULL ON CONFLICT ABORT,
    ipv4             VARCHAR( 128 ),
    is_ssl           BOOLEAN( 1 )    DEFAULT ( 0 ),
    is_active        BOOLEAN( 1 )    DEFAULT ( 0 ) 
);


-- Table: rtorrent_blocklists
CREATE TABLE rtorrent_blocklists ( 
    id_rtorrent_blocklists INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                           NOT NULL ON CONFLICT ABORT,
    name                   VARCHAR( 32 )   NOT NULL ON CONFLICT ABORT
                                           UNIQUE ON CONFLICT IGNORE,
    blocklists             VARCHAR( 256 )  NOT NULL ON CONFLICT ABORT
                                           UNIQUE ON CONFLICT IGNORE,
    url_info               VARCHAR( 256 ),
    [default]              BOOLEAN( 1 )    DEFAULT ( 0 ),
    is_active              BOOLEAN( 1 )    DEFAULT ( 0 ) 
);

INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (1, 'BLUETACK_LEVEL1', 'http://list.iblocklist.com/?list=ydxerpxkpcfqjaybcssw&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=ydxerpxkpcfqjaybcssw', 1, 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (2, 'BLUETACK_SPYWARE', 'http://list.iblocklist.com/?list=llvtlsjyoyiczbkjsxpf&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=llvtlsjyoyiczbkjsxpf', 1, 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (3, 'BLUETACK_ADS', 'http://list.iblocklist.com/?list=dgxtneitpuvgqqcpfulq&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=dgxtneitpuvgqqcpfulq', 1, 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (4, 'BLUETACK_EDU', 'http://list.iblocklist.com/?list=imlmncgrkbnacgcwfjvh&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=imlmncgrkbnacgcwfjvh', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (5, 'BLUETACK_BADPEER', 'http://list.iblocklist.com/?list=cwworuawihqvocglcoss&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=cwworuawihqvocglcoss', 1, 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (6, 'BLUETACK_BOGON', 'http://list.iblocklist.com/?list=gihxqmhyunbxhbmgqrla&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=gihxqmhyunbxhbmgqrla', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (7, 'BLUETACK_DSHIELD', 'http://list.iblocklist.com/?list=xpbqleszmajjesnzddhv&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=xpbqleszmajjesnzddhv', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (8, 'BLUETACK_HIJACKED', 'http://list.iblocklist.com/?list=usrcshglbiilevmyfhse&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=usrcshglbiilevmyfhse', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (9, 'BLUETACK_IANAMULTICAST', 'http://list.iblocklist.com/?list=pwqnlynprfgtjbgqoizj&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=pwqnlynprfgtjbgqoizj', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (10, 'BLUETACK_IANAPRIVATE', 'http://list.iblocklist.com/?list=cslpybexmxyuacbyuvib&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=cslpybexmxyuacbyuvib', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (11, 'BLUETACK_IANARESERVED', 'http://list.iblocklist.com/?list=bcoepfyewziejvcqyhqo&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=bcoepfyewziejvcqyhqo', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (12, 'BLUETACK_LEVEL2', 'http://list.iblocklist.com/?list=gyisgnzbhppbvsphucsw&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=gyisgnzbhppbvsphucsw', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (13, 'BLUETACK_LEVEL3', 'http://list.iblocklist.com/?list=uwnukjqktoggdknzrhgh&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=uwnukjqktoggdknzrhgh', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (14, 'BLUETACK_MICROSOFT', 'http://list.iblocklist.com/?list=xshktygkujudfnjfioro&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=xshktygkujudfnjfioro', 1, 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (15, 'BLUETACK_PROXY', 'http://list.iblocklist.com/?list=xoebmbyexwuiogmbyprb&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=xoebmbyexwuiogmbyprb', 1, 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (16, 'BLUETACK_SPIDER', 'http://list.iblocklist.com/?list=mcvxsnihddgutbjfbghy&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=mcvxsnihddgutbjfbghy', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (17, 'BLUETACK_RANGETEST', 'http://list.iblocklist.com/?list=plkehquoahljmyxjixpu&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=plkehquoahljmyxjixpu', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (18, 'BLUETACK_FORUMSPAM', 'http://list.iblocklist.com/?list=ficutxiwawokxlcyoeye&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=ficutxiwawokxlcyoeye', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (19, 'BLUETACK_WEBEXPLOIT', 'http://list.iblocklist.com/?list=ghlzqtqxnzctvvajwwag&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=ghlzqtqxnzctvvajwwag', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (20, 'BLUETACK_FORNONLANCOMP', 'http://list.iblocklist.com/?list=jhaoawihmfxgnvmaqffp&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=jhaoawihmfxgnvmaqffp', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (21, 'BLUETACK_EXCLUSIONS', 'http://list.iblocklist.com/?list=mtxmiireqmjzazcsoiem&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=mtxmiireqmjzazcsoiem', 1, 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (22, 'TBG_BOGON', 'http://list.iblocklist.com/?list=ewqglwibdgjttwttrinl&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=ewqglwibdgjttwttrinl', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (23, 'TBG_BUSINESSISPS', 'http://list.iblocklist.com/?list=jcjfaxgyyshvdbceroxf&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=jcjfaxgyyshvdbceroxf', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (24, 'TBG_GENERALCORPORATE', 'http://list.iblocklist.com/?list=ecqbsykllnadihkdirsh&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=ecqbsykllnadihkdirsh', 1, 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (25, 'TBG_HIJACKED', 'http://list.iblocklist.com/?list=tbnuqfclfkemqivekikv&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=ijfqtofzixtwayqovmxn', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (26, 'TBG_PRIMTHREATS', 'http://list.iblocklist.com/?list=ijfqtofzixtwayqovmxn&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=ijfqtofzixtwayqovmxn', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (27, 'TBG_EDUINSTITUTUION', 'http://list.iblocklist.com/?list=lljggjrpmefcwqknpalp&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=lljggjrpmefcwqknpalp', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (28, 'TBG_SEARCHENGINE', 'http://list.iblocklist.com/?list=pfefqteoxlfzopecdtyw&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=pfefqteoxlfzopecdtyw', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (29, 'SPAMHAUS_DROP', 'http://list.iblocklist.com/?list=zbdlwrqkabxbcppvrnos&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=zbdlwrqkabxbcppvrnos', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (30, 'ABUSE_ZEUS', 'http://list.iblocklist.com/?list=ynkdjqsjyfmilsgbogqf&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=ynkdjqsjyfmilsgbogqf', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (31, 'ABUSE_SPYEYE', 'http://list.iblocklist.com/?list=zvjxsfuvdhoxktpeiokq&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=zvjxsfuvdhoxktpeiokq', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (32, 'ABUSE_PALEVO', 'http://list.iblocklist.com/?list=erqajhwrxiuvjxqrrwfj&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=erqajhwrxiuvjxqrrwfj', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (33, 'IBLOCK_PEDOPHILE', 'http://list.iblocklist.com/?list=dufcxgnbjsdwmwctgfuj&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=dufcxgnbjsdwmwctgfuj', 1, 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (34, 'CIARMY_MALICIOUS', 'http://list.iblocklist.com/?list=npkuuhuxcsllnhoamkvm&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=npkuuhuxcsllnhoamkvm', 1, 1);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (35, 'MALCODE_MALCODE', 'http://list.iblocklist.com/?list=pbqcylkejciyhmwttify&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=pbqcylkejciyhmwttify', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (36, 'YOYO_ADSERVERS', 'http://list.iblocklist.com/?list=zhogegszwduurnvsyhdf&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=zhogegszwduurnvsyhdf', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (37, 'PBLOCK_RAPIDSHARE', 'http://list.iblocklist.com/?list=zfucwtjkfwkalytktyiw&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=zfucwtjkfwkalytktyiw', 0, 0);
INSERT INTO [rtorrent_blocklists] ([id_rtorrent_blocklists], [name], [blocklists], [url_info], [default], [is_active]) VALUES (38, 'CIDR_BOGON', 'http://list.iblocklist.com/?list=lujdnbasfaaixitgmxpp&fileformat=cidr&archiveformat=gz', 'https://www.iblocklist.com/list.php?list=lujdnbasfaaixitgmxpp', 0, 0);

-- Table: peerguardian_blocklists
CREATE TABLE peerguardian_blocklists ( 
    id_peerguardian_blocklists INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                               NOT NULL ON CONFLICT ABORT,
    blocklists                 VARCHAR( 256 )  NOT NULL ON CONFLICT ABORT
                                               UNIQUE ON CONFLICT IGNORE,
    url_info                   VARCHAR( 256 ),
    [default]                  BOOLEAN( 1 )    DEFAULT ( 0 ),
    is_active                  BOOLEAN( 1 )    DEFAULT ( 0 ) 
);

INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (1, 'list.iblocklist.com/lists/atma/atma', 'https://www.iblocklist.com/list.php?list=tzmtqbbsgbtfxainogvm', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (2, 'list.iblocklist.com/lists/bluetack/ads-trackers-and-bad-pr0n', 'https://www.iblocklist.com/list.php?list=fruzekpkpzlmzozmuuhx', 1, 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (3, 'list.iblocklist.com/lists/bluetack/bad-peers', 'https://www.iblocklist.com/list.php?list=cwworuawihqvocglcoss', 1, 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (4, 'list.iblocklist.com/lists/bluetack/bogon', 'https://www.iblocklist.com/list.php?list=gihxqmhyunbxhbmgqrla', 1, 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (5, 'list.iblocklist.com/lists/bluetack/dshield', 'https://www.iblocklist.com/list.php?list=xpbqleszmajjesnzddhv', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (6, 'list.iblocklist.com/lists/bluetack/edu', 'https://www.iblocklist.com/list.php?list=imlmncgrkbnacgcwfjvh', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (7, 'list.iblocklist.com/lists/bluetack/for-non-lan-computers', 'https://www.iblocklist.com/list.php?list=jhaoawihmfxgnvmaqffp', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (8, 'list.iblocklist.com/lists/bluetack/forum-spam', 'https://www.iblocklist.com/list.php?list=ficutxiwawokxlcyoeye', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (9, 'list.iblocklist.com/lists/bluetack/hijacked', 'https://www.iblocklist.com/list.php?list=usrcshglbiilevmyfhse', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (10, 'list.iblocklist.com/lists/bluetack/iana-multicast', 'https://www.iblocklist.com/list.php?list=pwqnlynprfgtjbgqoizj', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (11, 'list.iblocklist.com/lists/bluetack/iana-private', 'https://www.iblocklist.com/list.php?list=cslpybexmxyuacbyuvib', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (12, 'list.iblocklist.com/lists/bluetack/iana-reserved', 'https://www.iblocklist.com/list.php?list=bcoepfyewziejvcqyhqo', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (13, 'list.iblocklist.com/lists/bluetack/level-1', 'https://www.iblocklist.com/list.php?list=ydxerpxkpcfqjaybcssw', 1, 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (14, 'list.iblocklist.com/lists/bluetack/level-2', 'https://www.iblocklist.com/list.php?list=gyisgnzbhppbvsphucsw', 1, 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (15, 'list.iblocklist.com/lists/bluetack/level-3', 'https://www.iblocklist.com/list.php?list=uwnukjqktoggdknzrhgh', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (16, 'list.iblocklist.com/lists/bluetack/microsoft', 'https://www.iblocklist.com/list.php?list=xshktygkujudfnjfioro', 1, 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (17, 'list.iblocklist.com/lists/bluetack/proxy', 'https://www.iblocklist.com/list.php?list=xoebmbyexwuiogmbyprb', 1, 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (18, 'list.iblocklist.com/lists/bluetack/range-test', 'https://www.iblocklist.com/list.php?list=plkehquoahljmyxjixpu', 1, 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (19, 'list.iblocklist.com/lists/bluetack/spider', 'https://www.iblocklist.com/list.php?list=mcvxsnihddgutbjfbghy', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (20, 'list.iblocklist.com/lists/bluetack/spyware', 'https://www.iblocklist.com/list.php?list=llvtlsjyoyiczbkjsxpf', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (21, 'list.iblocklist.com/lists/bluetack/web-exploit', 'https://www.iblocklist.com/list.php?list=ghlzqtqxnzctvvajwwag', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (22, 'list.iblocklist.com/lists/bluetack/webexploit-forumspam', 'https://www.iblocklist.com/list.php?list=ficutxiwawokxlcyoeye', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (23, 'list.iblocklist.com/lists/cidr-report/bogon', 'https://www.iblocklist.com/list.php?list=lujdnbasfaaixitgmxpp', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (24, 'list.iblocklist.com/lists/dchubad/faker', 'https://www.iblocklist.com/list.php?list=dcha_faker', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (25, 'list.iblocklist.com/lists/dchubad/hacker', 'https://www.iblocklist.com/list.php?list=dcha_hacker', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (26, 'list.iblocklist.com/lists/dchubad/pedophiles', 'https://www.iblocklist.com/list.php?list=dcha_pedophiles', 1, 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (27, 'list.iblocklist.com/lists/dchubad/spammer', 'https://www.iblocklist.com/list.php?list=dcha_spammer', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (28, 'list.iblocklist.com/lists/nexus23/ipfilterx', 'https://www.iblocklist.com/list.php?list=nxs23_ipfilterx', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (29, 'list.iblocklist.com/lists/peerblock/rapidshare', 'https://www.iblocklist.com/list.php?list=zfucwtjkfwkalytktyiw', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (30, 'list.iblocklist.com/lists/spamhaus/drop', 'https://www.iblocklist.com/list.php?list=zbdlwrqkabxbcppvrnos', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (31, 'list.iblocklist.com/lists/tbg/bogon', 'https://www.iblocklist.com/list.php?list=ewqglwibdgjttwttrinl', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (32, 'list.iblocklist.com/lists/tbg/business-isps', 'https://www.iblocklist.com/list.php?list=jcjfaxgyyshvdbceroxf', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (33, 'list.iblocklist.com/lists/tbg/educational-institutions', 'https://www.iblocklist.com/list.php?list=lljggjrpmefcwqknpalp', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (34, 'list.iblocklist.com/lists/tbg/general-corporate-ranges', 'https://www.iblocklist.com/list.php?list=ecqbsykllnadihkdirsh', 1, 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (35, 'list.iblocklist.com/lists/tbg/hijacked', 'https://www.iblocklist.com/list.php?list=tbnuqfclfkemqivekikv', 0, 0);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (36, 'list.iblocklist.com/lists/tbg/primary-threats', 'https://www.iblocklist.com/list.php?list=ijfqtofzixtwayqovmxn', 1, 1);
INSERT INTO [peerguardian_blocklists] ([id_peerguardian_blocklists], [blocklists], [url_info], [default], [is_active]) VALUES (37, 'list.iblocklist.com/lists/tbg/search-engines', 'https://www.iblocklist.com/list.php?list=pfefqteoxlfzopecdtyw', 1, 1);

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

-- Table: smtp
CREATE TABLE smtp ( 
    id_smtp       INTEGER         PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                  NOT NULL ON CONFLICT ABORT,
    smtp_provider VARCHAR( 5 )    NOT NULL ON CONFLICT ABORT
                                  UNIQUE ON CONFLICT IGNORE
                                  DEFAULT ( 'LOCAL' ),
    smtp_username VARCHAR( 64 )   UNIQUE ON CONFLICT IGNORE,
    smtp_passwd   VARCHAR( 64 )   UNIQUE ON CONFLICT IGNORE,
    smtp_host     VARCHAR( 128 )  UNIQUE ON CONFLICT IGNORE,
    smtp_port     VARCHAR( 5 )    UNIQUE ON CONFLICT IGNORE 
);

INSERT INTO [smtp] ([id_smtp], [smtp_provider], [smtp_username], [smtp_passwd], [smtp_host], [smtp_port]) VALUES (1, 'LOCAL', null, null, null, null);

-- Trigger: ruTorrent_Tacker_Activation
CREATE TRIGGER ruTorrent_Tacker_Activation
       AFTER UPDATE OF is_active ON trackers_rutorrent
BEGIN
    UPDATE OR IGNORE trackers_list
       SET is_active = NEW.is_active
     WHERE tracker_domain = NEW.tracker_rutorrent;
END;
;


-- Trigger: Users_Tracker_Activation
CREATE TRIGGER Users_Tracker_Activation
       AFTER UPDATE OF is_active ON trackers_users
BEGIN
    UPDATE OR IGNORE trackers_list
       SET is_active = NEW.is_active
     WHERE tracker_domain = NEW.tracker_users;
END;
;

