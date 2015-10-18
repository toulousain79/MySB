ALTER TABLE blocklists RENAME TO blocklists_temp;

CREATE TABLE blocklists (
	id_blocklists 		INTEGER 		PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT 
										NOT NULL ON CONFLICT ABORT
										UNIQUE ON CONFLICT ABORT, 
	author 				VARCHAR (32) 	NOT NULL ON CONFLICT ABORT, 
	list_name 			VARCHAR (32) 	NOT NULL ON CONFLICT ABORT, 
	pgl_list_name 		VARCHAR (64), 
	url_infos 			VARCHAR (256) 	NOT NULL ON CONFLICT ABORT 
										UNIQUE ON CONFLICT ABORT, 
	peerguardian_list 	VARCHAR (256), 
	rtorrent_list 		VARCHAR (256), 
	peerguardian_active BOOLEAN (1) 	DEFAULT (0), 
	rtorrent_active 	BOOLEAN (1) 	DEFAULT (0), 
	"default" 			BOOLEAN (1) 	DEFAULT (0), 
	comments 			VARCHAR (32), 
	peerguardian_lastupdate DATETIME, 
	rtorrent_lastupdate DATETIME
);

INSERT INTO blocklists (
					id_blocklists, 
					author, 
					list_name, 
					url_infos, 
					peerguardian_list, 
					rtorrent_list, 
					peerguardian_active, 
					rtorrent_active, 
					"default", 
					comments, 
					peerguardian_lastupdate, 
					rtorrent_lastupdate
                  )
                  SELECT id_blocklists, 
						author, 
						list_name, 
						url_infos, 
						peerguardian_list, 
						rtorrent_list, 
						peerguardian_active, 
						rtorrent_active, 
						"default", 
						comments, 
						peerguardian_lastupdate, 
						rtorrent_lastupdate
                    FROM blocklists_temp;

DROP TABLE blocklists_temp;

UPDATE blocklists SET pgl_list_name = 'abuse_zeus' WHERE id_blocklists = '1';
UPDATE blocklists SET pgl_list_name = 'atma_atma' WHERE id_blocklists = '2';
UPDATE blocklists SET pgl_list_name = 'bluetack_ads-trackers-and-bad-pr0n' WHERE id_blocklists = '3';
UPDATE blocklists SET pgl_list_name = 'bluetack_bad-peers' WHERE id_blocklists = '4';
UPDATE blocklists SET pgl_list_name = 'bluetack_bogon' WHERE id_blocklists = '5';
UPDATE blocklists SET pgl_list_name = 'bluetack_dshield' WHERE id_blocklists = '6';
UPDATE blocklists SET pgl_list_name = 'bluetack_edu' WHERE id_blocklists = '7';
UPDATE blocklists SET pgl_list_name = 'bluetack_for-non-lan-computers' WHERE id_blocklists = '8';
UPDATE blocklists SET pgl_list_name = 'bluetack_forum-spam' WHERE id_blocklists = '9';
UPDATE blocklists SET pgl_list_name = 'bluetack_hijacked' WHERE id_blocklists = '10';
UPDATE blocklists SET pgl_list_name = 'bluetack_iana-multicast' WHERE id_blocklists = '11';
UPDATE blocklists SET pgl_list_name = 'bluetack_iana-private' WHERE id_blocklists = '12';
UPDATE blocklists SET pgl_list_name = 'bluetack_iana-reserved' WHERE id_blocklists = '13';
UPDATE blocklists SET pgl_list_name = 'bluetack_level1' WHERE id_blocklists = '14';
UPDATE blocklists SET pgl_list_name = 'bluetack_level2' WHERE id_blocklists = '15';
UPDATE blocklists SET pgl_list_name = 'bluetack_level3' WHERE id_blocklists = '16';
UPDATE blocklists SET pgl_list_name = 'bluetack_microsoft' WHERE id_blocklists = '17';
UPDATE blocklists SET pgl_list_name = 'bluetack_proxy' WHERE id_blocklists = '18';
UPDATE blocklists SET pgl_list_name = 'bluetack_range-test' WHERE id_blocklists = '19';
UPDATE blocklists SET pgl_list_name = 'bluetack_spider' WHERE id_blocklists = '20';
UPDATE blocklists SET pgl_list_name = 'bluetack_spyware' WHERE id_blocklists = '21';
UPDATE blocklists SET pgl_list_name = 'bluetack_web-exploit' WHERE id_blocklists = '22';
UPDATE blocklists SET pgl_list_name = 'bluetack_webexploit-forumspam' WHERE id_blocklists = '23';
UPDATE blocklists SET pgl_list_name = 'cidr-report_bogon' WHERE id_blocklists = '24';
UPDATE blocklists SET pgl_list_name = 'dchubad_faker' WHERE id_blocklists = '25';
UPDATE blocklists SET pgl_list_name = 'dchubad_hacker' WHERE id_blocklists = '26';
UPDATE blocklists SET pgl_list_name = 'dchubad_pedophiles' WHERE id_blocklists = '27';
UPDATE blocklists SET pgl_list_name = 'dchubad_spammer' WHERE id_blocklists = '28';
UPDATE blocklists SET pgl_list_name = 'peerblock_rapidshare' WHERE id_blocklists = '29';
UPDATE blocklists SET pgl_list_name = 'spamhaus_drop' WHERE id_blocklists = '30';
UPDATE blocklists SET pgl_list_name = 'tbg_bogon' WHERE id_blocklists = '31';
UPDATE blocklists SET pgl_list_name = 'tbg_business-isps' WHERE id_blocklists = '32';
UPDATE blocklists SET pgl_list_name = 'tbg_educational-institutions' WHERE id_blocklists = '33';
UPDATE blocklists SET pgl_list_name = 'tbg_general-corporate-ranges' WHERE id_blocklists = '34';
UPDATE blocklists SET pgl_list_name = 'tbg_hijacked' WHERE id_blocklists = '35';
UPDATE blocklists SET pgl_list_name = 'tbg_primary-threats' WHERE id_blocklists = '36';
UPDATE blocklists SET pgl_list_name = 'tbg_search-engines' WHERE id_blocklists = '37';
UPDATE blocklists SET pgl_list_name = '' WHERE id_blocklists = '38';
UPDATE blocklists SET pgl_list_name = '' WHERE id_blocklists = '39';
UPDATE blocklists SET pgl_list_name = '' WHERE id_blocklists = '40';
UPDATE blocklists SET pgl_list_name = '' WHERE id_blocklists = '41';
UPDATE blocklists SET pgl_list_name = '' WHERE id_blocklists = '42';
UPDATE blocklists SET pgl_list_name = 'nexus23_ipfilterx' WHERE id_blocklists = '43';
