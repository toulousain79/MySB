
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

INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (1, 'GIT', '/web/rutorrent', 'ruTorrent', 3.7, '', '', 'https://github.com/Novik/ruTorrent', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (2, 'TARGZ', '/web/rutorrent/plugins/chat', 'ruTorrent Plugin Chat', 2.0, 'chat-2.0.tar.gz', '', 'https://rutorrent-chat.googlecode.com/files/chat-2.0.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (3, 'TARGZ', '/web/rutorrent/plugins/logoff', 'ruTorrent Plugin Logoff', 1.3, 'logoff-1.3.tar.gz', '', 'https://rutorrent-logoff.googlecode.com/files/logoff-1.3.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (4, 'TARGZ', '/web/rutorrent/plugins/lbll-suite', 'ruTorrent Plugin tAdd-Labels', 1.1, 'tadd-labels_1.1.tar.gz', 'lbll-suite_0.8.1.tar.gz', 'http://rutorrent-tadd-labels.googlecode.com/files/tadd-labels_1.1.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (5, 'TARGZ', '/web/rutorrent/plugins/nfo', 'ruTorrent Plugin NFO', 1337, 'nfo_v1337.tar.gz', '', 'http://srious.biz/nfo.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (6, 'GIT', '/web/rutorrent/plugins/ratiocolor', 'ruTorrent Plugin RatioColor', 0.5, '', '', 'https://github.com/Gyran/rutorrent-ratiocolor', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (7, 'SVN', '/web/rutorrent/plugins/filemanager', 'ruTorrent Plugin FileManager', 0.09, '', '', 'http://svn.rutorrent.org/svn/filemanager/trunk/filemanager', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (8, 'SVN', '/web/rutorrent/plugins/fileupload', 'ruTorrent Plugin FileUpload', 0.02, '', '', 'http://svn.rutorrent.org/svn/filemanager/trunk/fileupload', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (9, 'SVN', '/web/rutorrent/plugins/fileshare', 'ruTorrent Plugin FileShare', 0.03, '', '', 'http://svn.rutorrent.org/svn/filemanager/trunk/fileshare', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (10, 'SVN', '/web/rutorrent/plugins/mediastream', 'ruTorrent Plugin MediaStream', 0.01, '', '', 'http://svn.rutorrent.org/svn/filemanager/trunk/mediastream', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (11, 'TARGZ', '/web/rutorrent/plugins/stream', 'ruTorrent Plugin Stream', 1.0, 'stream_v1.0.tar.gz', '', 'https://rutorrent-stream-plugin.googlecode.com/files/stream.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (12, 'SVN', '/web/rutorrent/plugins/pausewebui', 'ruTorrent Plugin Pause WebUI', 1.2, '', '', 'http://rutorrent-pausewebui.googlecode.com/svn/trunk/', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (13, 'GIT', '/web/rutorrent/plugins/mobile', 'ruTorrent Plugin Mobile', 1.0, '', '', 'https://github.com/xombiemp/rutorrentMobile.git', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (14, 'GIT', '/web/rutorrent/plugins/autodl-irssi', 'ruTorrent Plugin Autodl-irssi', 1.52, '', '', 'https://github.com/autodl-community/autodl-rutorrent.git', 0);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (15, 'TARGZ', '/sources/plowshare', 'Plowshare4', 4, 'Plowshare4.tar.gz', '', 'https://github.com/toulousain79/MySB/blob/v2.1/files/Plowshare4.tar.gz?raw=true', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (16, 'CURL', '/usr/bin/composer', 'Composer', '', 'composer.phar', '', 'http://getcomposer.org/installer', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (17, 'TARGZ', '/sources/nodejs', 'NodeJS', '0.12.2', 'node-v0.12.2.tar.gz', 'node_v0.10.35.tar.gz', 'http://nodejs.org/dist/v0.12.2/node-v0.12.2.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (18, 'GIT', '/web/seedbox-manager', 'Seedbox-Manager', '', '', '', 'https://github.com/Magicalex/seedbox-manager.git', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (19, 'GIT', '/web/rutorrent/plugins/linkseedboxmanager', 'ruTorrent Plugin Link Manager', '', '', '', 'https://github.com/Hydrog3n/linkseedboxmanager.git', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (20, 'GIT', '/web/Cakebox-light', 'Cakebox-Light', '', '', '', 'https://github.com/Cakebox/Cakebox-light.git', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (21, 'GIT', '/web/rutorrent/plugins/linkcakebox', 'ruTorrent Plugin Link Cakebox', '', '', '', 'https://github.com/Cakebox/linkcakebox.git', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (22, 'GIT', '/sources/libsodium', 'Libsodium', '', '', '', 'https://github.com/jedisct1/libsodium', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (23, 'TARGZ', '/sources/dnscrypt-proxy', 'DNScrypt-proxy', '1.4.3', 'dnscrypt-proxy_v1.4.3.tar.gz', 'dnscrypt-proxy_v1.4.2.tar.gz', 'http://download.dnscrypt.org/dnscrypt-proxy/dnscrypt-proxy-1.4.3.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (24, 'WBM', '/files', 'OpenVPNadmin WebMin', 2.6, 'openvpn-2.6.wbm', '', 'http://www.openit.it/downloads/OpenVPNadmin/openvpn-2.6.wbm.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (25, 'WBM', '/files', 'Nginx Webmin Module', '0.0.8', 'nginx-0.08.wbm', '', 'http://www.justindhoffman.com/sites/justindhoffman.com/files/nginx-0.08.wbm__0.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (26, 'WBM', '/files', 'MiniDLNA Webmin Module', 'alpha1.12 svn26', 'minidlnawebmin_alpha1_12.wbm', '', 'http://downloads.sourceforge.net/project/minidlnawebmin/Webmin%20alpha1.12%20svn26/minidlnawebmin_alpha1_12.wbm?r=http%3A%2F%2Fsourceforge.net%2Fprojects%2Fminidlnawebmin%2Ffiles%2FWebmin%2520alpha1.12%2520svn26%2F&ts=1420088634&use_mirror=freefr', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (27, 'TARGZ', '/sources/libtorrent', 'LibTorrent', '0.13.4', 'libtorrent_v0.13.4.tar.gz', '', 'http://libtorrent.rakshasa.no/downloads/libtorrent-0.13.4.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (28, 'TARGZ', '/sources/rtorrent', 'rTorrent', '0.9.4', 'rtorrent_v0.9.4.tar.gz', '', 'http://libtorrent.rakshasa.no/downloads/rtorrent-0.9.4.tar.gz', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (29, 'SVN', '/sources/xmlrpc-c', 'XMLRPC', '', '', '', 'http://svn.code.sf.net/p/xmlrpc-c/code/advanced', 1);
INSERT INTO [repositories] ([id_repositories], [type], [dir], [name], [version], [file], [old_file], [url], [active]) VALUES (30, 'GIT', '/web/loadavg', 'LoadAvg', '', '', '', 'https://github.com/loadavg/loadavg.git', 1);
