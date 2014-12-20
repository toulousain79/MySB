
-- Table: secure_token
CREATE TABLE secure_token ( 
    id       INTEGER         NOT NULL
                             PRIMARY KEY,
    username VARCHAR( 40 )   DEFAULT NULL,
    url      VARCHAR( 255 )  DEFAULT NULL,
    time     VARCHAR( 100 )  DEFAULT NULL 
);

INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (1, 'elohim13', 'afa5fd41a7c5d8695d1fec467ec5899381e9a59501fcd7275dd866f984eafc4d', 1419077533.1854);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (2, 'elohim13', 'e4fa8b467397a1f1a706a0e6f26350e108c994ca4a45c7c5a1c5b879f475fe4a', 1419077533.1903);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (3, 'elohim13', '971a7c13c2b17854fb682941cba97994837daae14c51cccbaf58b95e5e582954', 1419077533.1974);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (4, 'elohim13', 'ac2a83a7c3365c61d3011da04fbb3414e8d666f2e6b88193cdc1957892bc9f37', 1419077533.2035);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (5, 'elohim13', '62e29c3fd0e67978d6c2e6e9427eff113014268b21ea7dab25b22c0afdb83b64', 1419077533.211);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (6, 'elohim13', '42395f7550010305715877d5ba664e8fc3a14d128b4cb0edaca3c50afda4513f', 1419077533.2183);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (7, 'elohim13', 'e6161802040cf9b7c34a969419926855ca8f6443eb4c185cca7122fb9b41d654', 1419077538.2589);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (8, 'elohim13', '018bad368f325b3dc6acde39d79640f923b7d1ae38df8e5399136252620c1d33', 1419077536.164);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (9, 'elohim13', '44801750264cf3d75eac6d7f61acef0aedd47c36ce6576e2976e1c92df7254bb', 1419077536.1735);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (10, 'elohim13', '8c9059051aa2ef9c2e534b3fe21efbad5102a066417dfe47e9ad6116d51badf0', 1419077536.1783);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (11, 'elohim13', '20ebfea743d5f66049b1af0b3ba590587c7e77b82d1017af900f8b85729cf08e', 1419076757.8043);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (12, 'elohim13', 'e8e456d9e69dbf7be6f8dc7cbf7cce1a8f19218ce24bc477f69d937636213e7f', 1419076440.5655);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (13, 'elohim13', '94db66a4b10515f76eac3878e0fce9470fbf70bbe1a53029201f1ed9eb615f3e', 1419077008.2231);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (14, 'elohim13', '68acd3859e5acf25f3b84d1a4b428dd0460363a3e6df69300643a8b0928e7f85', 1419077538.2496);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (15, 'elohim13', '454619ffdd1ac26c75ccac14c11b7c99817801381c2d66e0fcd6077050fcbf8c', 1419077295.141);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (16, 'elohim13', 'e4784d6ad26bf3639bb85113d779f2b00d7b9af463dce4ac0b0f75a68b6420da', 1419077300.6078);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (17, 'elohim13', '62270ef5c79f90c40dc17881b66678788177614fee9cce2b691a3de2318e3a6b', 1419077533.1734);
INSERT INTO [secure_token] ([id], [username], [url], [time]) VALUES (18, 'elohim13', 'bbed04212d2ae8d26a0f88f3aed0843845d2d279bd2474572d76d4dc72aa6ba3', 1419077516.0368);

-- Table: cron
CREATE TABLE cron ( 
    id      INTEGER NOT NULL
                    PRIMARY KEY,
    lastrun TEXT 
);

INSERT INTO [cron] ([id], [lastrun]) VALUES (1, 0);

-- Table: layout
CREATE TABLE layout ( 
    id            INTEGER         NOT NULL
                                  PRIMARY KEY,
    name          VARCHAR( 100 )  DEFAULT NULL,
    content_type  VARCHAR( 80 )   DEFAULT NULL,
    content       TEXT,
    created_on    DATETIME        DEFAULT NULL,
    updated_on    DATETIME        DEFAULT NULL,
    created_by_id INT( 11 )       DEFAULT NULL,
    updated_by_id INT( 11 )       DEFAULT NULL,
    position      MEDIUMINT( 6 )  DEFAULT NULL 
);

INSERT INTO [layout] ([id], [name], [content_type], [content], [created_on], [updated_on], [created_by_id], [updated_by_id], [position]) VALUES (5, 'MySB', 'MySB', '<?php require_once ''/etc/MySB/web/pages/Layout.php''; ?>', '2014-11-27 07:51:41', '2014-12-02 07:10:24', 1, 1, null);

-- Table: page
CREATE TABLE page ( 
    id            INTEGER         NOT NULL
                                  PRIMARY KEY,
    title         VARCHAR( 255 )  DEFAULT NULL,
    slug          VARCHAR( 100 )  NOT NULL
                                  DEFAULT '',
    breadcrumb    VARCHAR( 160 )  DEFAULT NULL,
    keywords      VARCHAR( 255 )  DEFAULT NULL,
    description   TEXT,
    parent_id     INT( 11 )       DEFAULT NULL,
    layout_id     INT( 11 )       DEFAULT NULL,
    behavior_id   VARCHAR( 25 )   NOT NULL
                                  DEFAULT '',
    status_id     INT( 11 )       NOT NULL
                                  DEFAULT '100',
    created_on    DATETIME        DEFAULT NULL,
    published_on  DATETIME        DEFAULT NULL,
    valid_until   DATETIME        DEFAULT NULL,
    updated_on    DATETIME        DEFAULT NULL,
    created_by_id INT( 11 )       DEFAULT NULL,
    updated_by_id INT( 11 )       DEFAULT NULL,
    position      MEDIUMINT( 6 )  DEFAULT '0',
    is_protected  TINYINT( 1 )    NOT NULL
                                  DEFAULT '0',
    needs_login   TINYINT( 1 )    NOT NULL
                                  DEFAULT '2' 
);

INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (1, 'Home', '', 'Home', '', '', 0, 5, '', 100, '2014-11-26 16:43:49', '2014-11-26 16:43:50', '', '2014-12-13 01:08:22', 1, 1, 0, 1, 0);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (2, 'User', 'user', 'User', '', '', 1, 0, 'Redirect_to_first_child', 100, '2014-11-27 09:34:31     ', '2014-11-27 09:34:31     ', '', '2014-12-08 13:43:24', 1, 1, 1, 0, 2);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (3, 'Logs', 'logs', 'Logs Files', '', '', 12, 0, '', 101, '2014-11-27 14:29:40', '2014-11-27 14:29:58', '', '2014-12-13 01:12:05', 1, 1, 11, 1, 1);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (4, 'Change Password', 'change-password', 'Change Password', '', '', 2, 0, '', 100, '2014-11-29 11:58:16', '2014-11-29 11:58:16', '', '2014-12-05 09:00:47', 1, 1, 3, 0, 2);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (5, 'Manage Addresses', 'manage-addresses', 'Manage Addresses', '', '', 2, 0, '', 100, '2014-11-29 11:59:14', '2014-11-29 11:59:14', '', '2014-12-05 09:01:06', 1, 1, 4, 0, 2);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (6, 'Trackers', 'trackers', 'Trackers', '', '', 1, 0, 'Redirect_to_first_child', 101, '2014-11-29 12:00:04     ', '2014-11-29 12:00:04     ', '', '2014-12-08 13:43:24', 1, 1, 2, 1, 1);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (8, 'Add new trackers', 'add-new-trackers', 'Add new trackers', '', '', 6, 0, '', 101, '2014-11-30 00:54:22  ', '2014-11-30 00:54:22  ', '', '2014-12-08 11:16:20', 1, 1, 4, 1, 1);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (9, 'Trackers List', 'trackers-list', 'Global Trackers List', '', '', 6, 0, '', 101, '2014-11-30 00:58:45  ', '2014-11-30 00:58:45  ', '', '2014-12-08 11:16:20', 1, 1, 3, 1, 1);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (10, 'User Infos', 'user-infos', 'User Informations', '', '', 2, 0, '', 100, '2014-11-30 01:00:01', '2014-11-30 01:00:01', '', '2014-12-13 01:08:10', 1, 1, 2, 0, 2);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (11, 'OpenVPN Config File', 'openvpn-config-file', 'OpenVPN Config File', '', '', 2, 0, '', 100, '2014-11-30 01:17:50', '2014-11-30 01:17:50', '', '2014-12-05 09:01:32', 1, 1, 5, 0, 2);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (12, 'Main User', 'main-user', 'Main user', '', '', 1, 0, 'Redirect_to_first_child', 101, '2014-12-01 22:30:46     ', '2014-12-01 22:30:46     ', '', '2014-12-08 13:43:24', 1, 1, 4, 1, 1);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (13, 'Renting Infos', 'renting-infos', 'Renting Infos', '', '', 12, 0, '', 101, '2014-12-01 22:31:59', '2014-12-01 22:31:59', '', '2014-12-13 01:11:59', 1, 1, 10, 1, 1);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (14, 'Help', 'help', 'Help', '', '', 1, 0, '', 100, '2014-12-07 08:12:24', '2014-12-07 08:12:24', '', '2014-12-13 01:12:15', 1, 1, 5, 0, 2);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (15, 'IP restriction', 'ip-restriction', 'IP restriction', '', '', 14, 0, '', 100, '2014-12-07 15:46:09', '2014-12-07 15:46:09', '', '2014-12-20 12:03:52', 1, 1, 0, 0, 2);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (16, 'Trackers', 'trackers', 'Trackers', '', '', 14, 0, '', 100, '2014-12-07 15:52:45', '2014-12-07 15:52:45', '', '2014-12-20 12:01:41', 1, 1, 0, 0, 2);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (17, 'Blocklists', 'blocklists', 'Blocklists', '', '', 1, 0, 'Redirect_to_first_child', 101, '2014-12-08 10:18:13', '2014-12-08 10:18:13', '', '2014-12-13 01:08:45', 1, 1, 3, 1, 1);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (18, 'PeerGuardian BlockLists', 'peerguardian-blocklists', 'PeerGuardian Blocklists', '', '', 17, 0, '', 101, '2014-12-08 10:20:00', '2014-12-08 10:20:00', '', '2014-12-13 01:11:19', 1, 1, 7, 1, 1);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (19, 'rTorrent Blocklists', 'rtorrent-blocklists', 'rTorrent Blocklists', '', '', 17, 0, '', 101, '2014-12-08 10:40:57', null, null, '2014-12-13 01:10:49', 1, 1, 6, 1, 1);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (20, 'Blocklists', 'blocklists', 'Blocklists', '', '', 14, 0, '', 100, '2014-12-08 11:17:28', '2014-12-08 11:17:28', '', '2014-12-20 11:54:18', 1, 1, 0, 0, 2);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (21, 'Apply configuration', 'apply-configuration', 'Apply configuration', '', '', 1, 0, '', 100, '2014-12-08 13:43:17', '2014-12-08 13:48:46', '', '2014-12-13 01:13:09', 1, 1, 6, 1, 2);
INSERT INTO [page] ([id], [title], [slug], [breadcrumb], [keywords], [description], [parent_id], [layout_id], [behavior_id], [status_id], [created_on], [published_on], [valid_until], [updated_on], [created_by_id], [updated_by_id], [position], [is_protected], [needs_login]) VALUES (22, 'Services', 'services', 'Services', null, null, 1, 0, '', 100, '2014-12-20 12:08:37', '2014-12-20 12:08:37', null, '2014-12-20 12:08:37', 1, 1, 0, 0, 2);

-- Table: page_part
CREATE TABLE page_part ( 
    id           INTEGER         NOT NULL
                                 PRIMARY KEY,
    name         VARCHAR( 100 )  DEFAULT NULL,
    filter_id    VARCHAR( 25 )   DEFAULT NULL,
    content      LONGTEXT,
    content_html LONGTEXT,
    page_id      INT( 11 )       DEFAULT NULL 
);

INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (1, 'body', '', '<?php require_once ''/etc/MySB/web/pages/Home.php''; ?>', '<?php require_once ''/etc/MySB/web/pages/Home.php''; ?>', 1);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (10, 'body', '', '', '', 2);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (11, 'body', '', '<?php require_once ''/etc/MySB/web/pages/Logs.php''; ?>', '<?php require_once ''/etc/MySB/web/pages/Logs.php''; ?>', 3);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (12, 'body', '', '<?php require_once ''/etc/MySB/web/pages/ChangePassword.php''; ?>', '<?php require_once ''/etc/MySB/web/pages/ChangePassword.php''; ?>', 4);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (13, 'body', '', '<?php require_once ''/etc/MySB/web/pages/ManageAddresses.php''; ?>', '<?php require_once ''/etc/MySB/web/pages/ManageAddresses.php''; ?>', 5);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (14, 'body', '', '', '', 6);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (16, 'body', '', '<?php require_once ''/etc/MySB/web/pages/TrackersAdd.php''; ?>', '<?php require_once ''/etc/MySB/web/pages/TrackersAdd.php''; ?>', 8);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (17, 'body', '', '<?php require_once ''/etc/MySB/web/pages/TrackersList.php''; ?>', '<?php require_once ''/etc/MySB/web/pages/TrackersList.php''; ?>', 9);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (18, 'body', '', '<?php require_once ''/etc/MySB/web/pages/UserInfo.php''; ?>', '<?php require_once ''/etc/MySB/web/pages/UserInfo.php''; ?>', 10);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (19, 'body', '', '<?php require_once ''/etc/MySB/web/pages/OpenVPN.php''; ?>', '<?php require_once ''/etc/MySB/web/pages/OpenVPN.php''; ?>', 11);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (20, 'body', 'textile', '', '', 12);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (21, 'body', '', '<?php require_once ''/etc/MySB/web/pages/RentingInfo.php''; ?>', '<?php require_once ''/etc/MySB/web/pages/RentingInfo.php''; ?>', 13);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (22, 'body', 'textile', '* "IP restriction(IP restriction)":?help/ip-restriction.html
* "Trackers(Trackers)":?help/trackers.html
* "Blocklists(Blocklists)":?help/blocklists.html', '	<ul>
		<li><a href="?help/ip-restriction.html" title="IP restriction">IP restriction</a></li>
		<li><a href="?help/trackers.html" title="Trackers">Trackers</a></li>
		<li><a href="?help/blocklists.html" title="Blocklists">Blocklists</a></li>
	</ul>', 14);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (23, 'body', 'textile', '<?php require_once ''/etc/MySB/web/pages/Help_IPrestriction.php''; ?>', '	<p><?php require_once ''/etc/MySB/web/pages/Help_IPrestriction.php''; ?></p>', 15);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (24, 'body', 'textile', '<?php require_once ''/etc/MySB/web/pages/Help_Trackers.php''; ?>', '	<p><?php require_once ''/etc/MySB/web/pages/Help_Trackers.php''; ?></p>', 16);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (25, 'body', '', '', '', 17);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (26, 'body', '', '<?php require_once ''/etc/MySB/web/pages/BlockLists_PGL.php''; ?>', '<?php require_once ''/etc/MySB/web/pages/BlockLists_PGL.php''; ?>', 18);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (27, 'body', '', '<?php require_once ''/etc/MySB/web/pages/BlockLists_rTorrent.php''; ?>', '<?php require_once ''/etc/MySB/web/pages/BlockLists_rTorrent.php''; ?>', 19);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (28, 'body', 'textile', '<?php require_once ''/etc/MySB/web/pages/Help_Blocklists.php''; ?>', '	<p><?php require_once ''/etc/MySB/web/pages/Help_Blocklists.php''; ?></p>', 20);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (29, 'body', '', '<?php require_once ''/etc/MySB/web/pages/ApplyConfig.php''; ?>', '<?php require_once ''/etc/MySB/web/pages/ApplyConfig.php''; ?>', 21);
INSERT INTO [page_part] ([id], [name], [filter_id], [content], [content_html], [page_id]) VALUES (30, 'body', 'textile', null, null, 22);

-- Table: page_tag
CREATE TABLE page_tag ( 
    page_id INT( 11 )  NOT NULL,
    tag_id  INT( 11 )  NOT NULL 
);


-- Table: permission
CREATE TABLE permission ( 
    id   INTEGER        NOT NULL
                        PRIMARY KEY,
    name VARCHAR( 25 )  NOT NULL 
);

INSERT INTO [permission] ([id], [name]) VALUES (2, 'admin_edit');
INSERT INTO [permission] ([id], [name]) VALUES (1, 'admin_view');
INSERT INTO [permission] ([id], [name]) VALUES (26, 'backup_restore_view');
INSERT INTO [permission] ([id], [name]) VALUES (24, 'file_manager_chmod');
INSERT INTO [permission] ([id], [name]) VALUES (25, 'file_manager_delete');
INSERT INTO [permission] ([id], [name]) VALUES (21, 'file_manager_mkdir');
INSERT INTO [permission] ([id], [name]) VALUES (22, 'file_manager_mkfile');
INSERT INTO [permission] ([id], [name]) VALUES (23, 'file_manager_rename');
INSERT INTO [permission] ([id], [name]) VALUES (20, 'file_manager_upload');
INSERT INTO [permission] ([id], [name]) VALUES (19, 'file_manager_view');
INSERT INTO [permission] ([id], [name]) VALUES (8, 'layout_add');
INSERT INTO [permission] ([id], [name]) VALUES (10, 'layout_delete');
INSERT INTO [permission] ([id], [name]) VALUES (9, 'layout_edit');
INSERT INTO [permission] ([id], [name]) VALUES (7, 'layout_view');
INSERT INTO [permission] ([id], [name]) VALUES (16, 'page_add');
INSERT INTO [permission] ([id], [name]) VALUES (18, 'page_delete');
INSERT INTO [permission] ([id], [name]) VALUES (17, 'page_edit');
INSERT INTO [permission] ([id], [name]) VALUES (15, 'page_view');
INSERT INTO [permission] ([id], [name]) VALUES (12, 'snippet_add');
INSERT INTO [permission] ([id], [name]) VALUES (14, 'snippet_delete');
INSERT INTO [permission] ([id], [name]) VALUES (13, 'snippet_edit');
INSERT INTO [permission] ([id], [name]) VALUES (11, 'snippet_view');
INSERT INTO [permission] ([id], [name]) VALUES (4, 'user_add');
INSERT INTO [permission] ([id], [name]) VALUES (6, 'user_delete');
INSERT INTO [permission] ([id], [name]) VALUES (5, 'user_edit');
INSERT INTO [permission] ([id], [name]) VALUES (3, 'user_view');

-- Table: role
CREATE TABLE role ( 
    id   INTEGER        NOT NULL
                        PRIMARY KEY,
    name VARCHAR( 25 )  NOT NULL 
);

INSERT INTO [role] ([id], [name]) VALUES (1, 'administrator');
INSERT INTO [role] ([id], [name]) VALUES (2, 'developer');
INSERT INTO [role] ([id], [name]) VALUES (3, 'editor');

-- Table: setting
CREATE TABLE setting ( 
    name  VARCHAR( 40 )  NOT NULL,
    value TEXT           NOT NULL 
);

INSERT INTO [setting] ([name], [value]) VALUES ('admin_title', 'MySB');
INSERT INTO [setting] ([name], [value]) VALUES ('admin_email', '');
INSERT INTO [setting] ([name], [value]) VALUES ('language', 'en');
INSERT INTO [setting] ([name], [value]) VALUES ('theme', 'black_and_white');
INSERT INTO [setting] ([name], [value]) VALUES ('default_status_id', 100);
INSERT INTO [setting] ([name], [value]) VALUES ('default_filter_id', 'textile');
INSERT INTO [setting] ([name], [value]) VALUES ('default_tab', 'page');
INSERT INTO [setting] ([name], [value]) VALUES ('allow_html_title', 'off');
INSERT INTO [setting] ([name], [value]) VALUES ('plugins', 'a:1:{s:23:"redirect_to_first_child";i:1;}');

-- Table: plugin_settings
CREATE TABLE plugin_settings ( 
    plugin_id VARCHAR( 40 )   NOT NULL,
    name      VARCHAR( 40 )   NOT NULL,
    value     VARCHAR( 255 )  NOT NULL 
);

INSERT INTO [plugin_settings] ([plugin_id], [name], [value]) VALUES ('file_manager', 'umask', 22);
INSERT INTO [plugin_settings] ([plugin_id], [name], [value]) VALUES ('file_manager', 'dirmode', 755);
INSERT INTO [plugin_settings] ([plugin_id], [name], [value]) VALUES ('file_manager', 'filemode', 644);
INSERT INTO [plugin_settings] ([plugin_id], [name], [value]) VALUES ('file_manager', 'show_hidden', 0);
INSERT INTO [plugin_settings] ([plugin_id], [name], [value]) VALUES ('file_manager', 'show_backups', 1);
INSERT INTO [plugin_settings] ([plugin_id], [name], [value]) VALUES ('archive', 'use_dates', 1);

-- Table: snippet
CREATE TABLE snippet ( 
    id            INTEGER         NOT NULL
                                  PRIMARY KEY,
    name          VARCHAR( 100 )  NOT NULL
                                  DEFAULT '',
    filter_id     VARCHAR( 25 )   DEFAULT NULL,
    content       TEXT,
    content_html  TEXT,
    created_on    DATETIME        DEFAULT NULL,
    updated_on    DATETIME        DEFAULT NULL,
    created_by_id INT( 11 )       DEFAULT NULL,
    updated_by_id INT( 11 )       DEFAULT NULL,
    position      MEDIUMINT( 6 )  DEFAULT NULL 
);


-- Table: tag
CREATE TABLE tag ( 
    id    INTEGER        NOT NULL
                         PRIMARY KEY,
    name  VARCHAR( 40 )  NOT NULL,
    count INT( 11 )      NOT NULL 
);


-- Table: user
CREATE TABLE user ( 
    id            INTEGER          NOT NULL
                                   PRIMARY KEY,
    name          VARCHAR( 100 )   DEFAULT NULL,
    email         VARCHAR( 255 )   DEFAULT NULL,
    username      VARCHAR( 40 )    NOT NULL,
    password      VARCHAR( 1024 )  DEFAULT NULL,
    salt          VARCHAR( 1024 )  DEFAULT NULL,
    language      VARCHAR( 5 )     DEFAULT NULL,
    last_login    DATETIME         DEFAULT NULL,
    last_failure  DATETIME         DEFAULT NULL,
    failure_count INT( 11 )        DEFAULT NULL,
    created_on    DATETIME         DEFAULT NULL,
    updated_on    DATETIME         DEFAULT NULL,
    created_by_id INT( 11 )        DEFAULT NULL,
    updated_by_id INT( 11 )        DEFAULT NULL,
    CONSTRAINT uc_email UNIQUE ( email ) 
);

INSERT INTO [user] ([id], [name], [email], [username], [password], [salt], [language], [last_login], [last_failure], [failure_count], [created_on], [updated_on], [created_by_id], [updated_by_id]) VALUES (1, 'elohim13', 'toulousain79@gmail.com', 'elohim13', '402ea036fa00558f45b73dc1effc64c1f48f56c77edc0a5e68bf19843a7a85a62ba3f3a4af5a44246a2f0a518630f909622264b9405ddb70e77be06c4fe1dc41', '90a0a174eac0790074c64f995606b26e8cd05ab087613d4e7eb7232dd3f3704b', 'en', '2014-12-20 11:15:30', '2014-12-20 02:51:44', 0, '', '2014-12-20 11:15:30', 1, '');

-- Table: user_role
CREATE TABLE user_role ( 
    user_id INT( 11 )  NOT NULL,
    role_id INT( 11 )  NOT NULL 
);

INSERT INTO [user_role] ([user_id], [role_id]) VALUES (1, 1);

-- Table: role_permission
CREATE TABLE role_permission ( 
    role_id       INT( 11 )  NOT NULL,
    permission_id INT( 11 )  NOT NULL 
);

INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 1);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 2);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 3);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 4);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 5);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 6);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 7);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 8);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 9);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 10);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 11);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 12);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 13);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 14);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 15);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 16);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 17);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 18);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 19);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 20);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 21);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 22);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 23);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 24);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 25);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (1, 26);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 1);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 7);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 8);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 9);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 10);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 11);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 12);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 13);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 14);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 15);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 16);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 17);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 18);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 19);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 20);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 21);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 22);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 23);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 24);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 25);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (2, 26);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (3, 1);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (3, 15);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (3, 16);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (3, 17);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (3, 18);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (3, 19);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (3, 20);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (3, 21);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (3, 22);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (3, 23);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (3, 24);
INSERT INTO [role_permission] ([role_id], [permission_id]) VALUES (3, 25);

-- Index: username_url
CREATE UNIQUE INDEX username_url ON secure_token ( 
    username,
    url 
);


-- Index: layout_name
CREATE UNIQUE INDEX layout_name ON layout ( 
    name 
);


-- Index: page_tag_page_id
CREATE UNIQUE INDEX page_tag_page_id ON page_tag ( 
    page_id,
    tag_id 
);


-- Index: permission_name
CREATE UNIQUE INDEX permission_name ON permission ( 
    name 
);


-- Index: role_name
CREATE UNIQUE INDEX role_name ON role ( 
    name 
);


-- Index: setting_id
CREATE UNIQUE INDEX setting_id ON setting ( 
    name 
);


-- Index: plugin_setting_id
CREATE UNIQUE INDEX plugin_setting_id ON plugin_settings ( 
    plugin_id,
    name 
);


-- Index: snippet_name
CREATE UNIQUE INDEX snippet_name ON snippet ( 
    name 
);


-- Index: tag_name
CREATE UNIQUE INDEX tag_name ON tag ( 
    name 
);


-- Index: user_username
CREATE UNIQUE INDEX user_username ON user ( 
    username 
);


-- Index: user_role_user_id
CREATE UNIQUE INDEX user_role_user_id ON user_role ( 
    user_id,
    role_id 
);


-- Index: role_permission_role_id
CREATE UNIQUE INDEX role_permission_role_id ON role_permission ( 
    role_id,
    permission_id 
);

