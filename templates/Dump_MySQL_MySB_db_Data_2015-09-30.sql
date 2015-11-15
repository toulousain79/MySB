SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

INSERT INTO `blocklists` (`id_blocklists`, `author`, `list_name`, `pgl_list_name`, `url_infos`, `peerguardian_list`, `rtorrent_list`, `peerguardian_active`, `rtorrent_active`, `default`, `comments`, `peerguardian_lastupdate`, `rtorrent_lastupdate`) VALUES
(1, 'Abuse', 'ZeuS', 'abuse_zeus', 'https://www.iblocklist.com/list.php?list=ynkdjqsjyfmilsgbogqf', 'list.iblocklist.com/lists/abuse/zeus', 'http://list.iblocklist.com/?list=ynkdjqsjyfmilsgbogqf&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Atma', 'Atma', 'atma_atma', 'https://www.iblocklist.com/list.php?list=tzmtqbbsgbtfxainogvm', 'list.iblocklist.com/lists/atma/atma', 'http://list.iblocklist.com/?list=tzmtqbbsgbtfxainogvm&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Bluetack', 'Advertising Trackers and Bad Por', 'bluetack_ads-trackers-and-bad-pr', 'https://www.iblocklist.com/list.php?list=dgxtneitpuvgqqcpfulq', 'list.iblocklist.com/lists/bluetack/ads-trackers-and-bad-pr0n', 'http://list.iblocklist.com/?list=dgxtneitpuvgqqcpfulq&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Bluetack', 'Bad Peers', 'bluetack_bad-peers', 'https://www.iblocklist.com/list.php?list=cwworuawihqvocglcoss', 'list.iblocklist.com/lists/bluetack/bad-peers', 'http://list.iblocklist.com/?list=cwworuawihqvocglcoss&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Bluetack', 'Bogon', 'bluetack_bogon', 'https://www.iblocklist.com/list.php?list=gihxqmhyunbxhbmgqrla', 'list.iblocklist.com/lists/bluetack/bogon', 'http://list.iblocklist.com/?list=gihxqmhyunbxhbmgqrla&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Bluetack', 'Dshield', 'bluetack_dshield', 'https://www.iblocklist.com/list.php?list=xpbqleszmajjesnzddhv', 'list.iblocklist.com/lists/bluetack/dshield', 'http://list.iblocklist.com/?list=xpbqleszmajjesnzddhv&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Bluetack', 'Educational Institutions', 'bluetack_edu', 'https://www.iblocklist.com/list.php?list=imlmncgrkbnacgcwfjvh', 'list.iblocklist.com/lists/bluetack/edu', 'http://list.iblocklist.com/?list=imlmncgrkbnacgcwfjvh&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Bluetack', 'For Non Lan Computers', 'bluetack_for-non-lan-computers', 'https://www.iblocklist.com/list.php?list=jhaoawihmfxgnvmaqffp', 'list.iblocklist.com/lists/bluetack/for-non-lan-computers', 'http://list.iblocklist.com/?list=jhaoawihmfxgnvmaqffp&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Bluetack', 'Forum Spam', 'bluetack_forum-spam', 'https://www.iblocklist.com/list.php?list=ficutxiwawokxlcyoeye', 'list.iblocklist.com/lists/bluetack/forum-spam', 'http://list.iblocklist.com/?list=ficutxiwawokxlcyoeye&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Bluetack', 'Hijacked', 'bluetack_hijacked', 'https://www.iblocklist.com/list.php?list=usrcshglbiilevmyfhse', 'list.iblocklist.com/lists/bluetack/hijacked', 'http://list.iblocklist.com/?list=usrcshglbiilevmyfhse&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Bluetack', 'IANA-Multicast', 'bluetack_iana-multicast', 'https://www.iblocklist.com/list.php?list=pwqnlynprfgtjbgqoizj', 'list.iblocklist.com/lists/bluetack/iana-multicast', 'http://list.iblocklist.com/?list=pwqnlynprfgtjbgqoizj&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Bluetack', 'IANA-Private', 'bluetack_iana-private', 'https://www.iblocklist.com/list.php?list=cslpybexmxyuacbyuvib', 'list.iblocklist.com/lists/bluetack/iana-private', 'http://list.iblocklist.com/?list=cslpybexmxyuacbyuvib&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Bluetack', 'IANA-Reserved', 'bluetack_iana-reserved', 'https://www.iblocklist.com/list.php?list=bcoepfyewziejvcqyhqo', 'list.iblocklist.com/lists/bluetack/iana-reserved', 'http://list.iblocklist.com/?list=bcoepfyewziejvcqyhqo&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Bluetack', 'Level 1', 'bluetack_level1', 'https://www.iblocklist.com/list.php?list=ydxerpxkpcfqjaybcssw', 'list.iblocklist.com/lists/bluetack/level-1', 'http://list.iblocklist.com/?list=ydxerpxkpcfqjaybcssw&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Bluetack', 'Level 2', 'bluetack_level2', 'https://www.iblocklist.com/list.php?list=gyisgnzbhppbvsphucsw', 'list.iblocklist.com/lists/bluetack/level-2', 'http://list.iblocklist.com/?list=gyisgnzbhppbvsphucsw&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Bluetack', 'Level 3', 'bluetack_level3', 'https://www.iblocklist.com/list.php?list=uwnukjqktoggdknzrhgh', 'list.iblocklist.com/lists/bluetack/level-3', 'http://list.iblocklist.com/?list=uwnukjqktoggdknzrhgh&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Bluetack', 'Microsoft', 'bluetack_microsoft', 'https://www.iblocklist.com/list.php?list=xshktygkujudfnjfioro', 'list.iblocklist.com/lists/bluetack/microsoft', 'http://list.iblocklist.com/?list=xshktygkujudfnjfioro&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Bluetack', 'Proxy', 'bluetack_proxy', 'https://www.iblocklist.com/list.php?list=xoebmbyexwuiogmbyprb', 'list.iblocklist.com/lists/bluetack/proxy', 'http://list.iblocklist.com/?list=xoebmbyexwuiogmbyprb&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Bluetack', 'Range Test', 'bluetack_range-test', 'https://www.iblocklist.com/list.php?list=plkehquoahljmyxjixpu', 'list.iblocklist.com/lists/bluetack/range-test', 'http://list.iblocklist.com/?list=plkehquoahljmyxjixpu&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Bluetack', 'Spider', 'bluetack_spider', 'https://www.iblocklist.com/list.php?list=mcvxsnihddgutbjfbghy', 'list.iblocklist.com/lists/bluetack/spider', 'http://list.iblocklist.com/?list=mcvxsnihddgutbjfbghy&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Bluetack', 'Spyware', 'bluetack_spyware', 'https://www.iblocklist.com/list.php?list=llvtlsjyoyiczbkjsxpf', 'list.iblocklist.com/lists/bluetack/spyware', 'http://list.iblocklist.com/?list=llvtlsjyoyiczbkjsxpf&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Bluetack', 'Web Exploit', 'bluetack_web-exploit', 'https://www.iblocklist.com/list.php?list=ghlzqtqxnzctvvajwwag', 'list.iblocklist.com/lists/bluetack/web-exploit', 'http://list.iblocklist.com/?list=ghlzqtqxnzctvvajwwag&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Bluetack', 'Web Exploit Forum Spam', 'bluetack_webexploit-forumspam', 'https://www.iblocklist.com/list.php?list=bimsvyvtgxeelunveyal', 'list.iblocklist.com/lists/bluetack/webexploit-forumspam', 'http://list.iblocklist.com/?list=bimsvyvtgxeelunveyal&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'CIDR-Report', 'Bogon', 'cidr-report_bogon', 'https://www.iblocklist.com/list.php?list=lujdnbasfaaixitgmxpp', 'list.iblocklist.com/lists/cidr-report/bogon', 'http://list.iblocklist.com/?list=lujdnbasfaaixitgmxpp&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'DCHubAd', 'Faker', 'dchubad_faker', 'https://www.iblocklist.com/list.php?list=dhuwlruzmglnfaneeizx', 'list.iblocklist.com/lists/dchubad/faker', 'http://list.iblocklist.com/?list=dhuwlruzmglnfaneeizx&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'DCHubAd', 'Hacker', 'dchubad_hacker', 'https://www.iblocklist.com/list.php?list=qpuabqfzsykfvglktzkh', 'list.iblocklist.com/lists/dchubad/hacker', 'http://list.iblocklist.com/?list=qpuabqfzsykfvglktzkh&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'DCHubAd', 'Pedophiles', 'dchubad_pedophiles', 'https://www.iblocklist.com/list.php?list=zchgtvitlwnwcjfuxovf', 'list.iblocklist.com/lists/dchubad/pedophiles', 'http://list.iblocklist.com/?list=zchgtvitlwnwcjfuxovf&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'DCHubAd', 'Spammer', 'dchubad_spammer', 'https://www.iblocklist.com/list.php?list=falwwczjguruglzisxdr', 'list.iblocklist.com/lists/dchubad/spammer', 'http://list.iblocklist.com/?list=falwwczjguruglzisxdr&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'I-Blocklist', 'RapidShare', 'peerblock_rapidshare', 'https://www.iblocklist.com/list.php?list=zfucwtjkfwkalytktyiw', 'list.iblocklist.com/lists/peerblock/rapidshare', 'http://list.iblocklist.com/?list=zfucwtjkfwkalytktyiw&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Spamhaus', 'DROP', 'spamhaus_drop', 'https://www.iblocklist.com/list.php?list=zbdlwrqkabxbcppvrnos', 'list.iblocklist.com/lists/spamhaus/drop', 'http://list.iblocklist.com/?list=zbdlwrqkabxbcppvrnos&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'TBG', 'Bogon', 'tbg_bogon', 'https://www.iblocklist.com/list.php?list=ewqglwibdgjttwttrinl', 'list.iblocklist.com/lists/tbg/bogon', 'http://list.iblocklist.com/?list=ewqglwibdgjttwttrinl&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'TBG', 'Business ISPs', 'tbg_business-isps', 'https://www.iblocklist.com/list.php?list=jcjfaxgyyshvdbceroxf', 'list.iblocklist.com/lists/tbg/business-isps', 'http://list.iblocklist.com/?list=jcjfaxgyyshvdbceroxf&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'TBG', 'Educational Institutions', 'tbg_educational-institutions', 'https://www.iblocklist.com/list.php?list=lljggjrpmefcwqknpalp', 'list.iblocklist.com/lists/tbg/educational-institutions', 'http://list.iblocklist.com/?list=lljggjrpmefcwqknpalp&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'TBG', 'General Corporate Ranges', 'tbg_general-corporate-ranges', 'https://www.iblocklist.com/list.php?list=ecqbsykllnadihkdirsh', 'list.iblocklist.com/lists/tbg/general-corporate-ranges', 'http://list.iblocklist.com/?list=ecqbsykllnadihkdirsh&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'TBG', 'Hijacked', 'tbg_hijacked', 'https://www.iblocklist.com/list.php?list=tbnuqfclfkemqivekikv', 'list.iblocklist.com/lists/tbg/hijacked', 'http://list.iblocklist.com/?list=tbnuqfclfkemqivekikv&fileformat=p2p&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'TBG', 'Primary Threats', 'tbg_primary-threats', 'https://www.iblocklist.com/list.php?list=ijfqtofzixtwayqovmxn', 'list.iblocklist.com/lists/tbg/primary-threats', 'http://list.iblocklist.com/?list=ijfqtofzixtwayqovmxn&fileformat=cidr&archiveformat=gz', 1, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'TBG', 'Search Engines', 'tbg_search-engines', 'https://www.iblocklist.com/list.php?list=pfefqteoxlfzopecdtyw', 'list.iblocklist.com/lists/tbg/search-engines', 'http://list.iblocklist.com/?list=pfefqteoxlfzopecdtyw&fileformat=cidr&archiveformat=gz', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Abuse', 'Palevo', '', 'https://www.iblocklist.com/list.php?list=erqajhwrxiuvjxqrrwfj', '', 'http://list.iblocklist.com/?list=zvjxsfuvdhoxktpeiokq&fileformat=cidr&archiveformat=gz', 0, 0, 0, 'rTorrent only', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Abuse', 'SpyEye', '', 'https://www.iblocklist.com/list.php?list=zvjxsfuvdhoxktpeiokq', '', 'http://list.iblocklist.com/?list=zvjxsfuvdhoxktpeiokq&fileformat=cidr&archiveformat=gz', 0, 0, 0, 'rTorrent only', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Bluetack', 'Exclusions', '', 'https://www.iblocklist.com/list.php?list=mtxmiireqmjzazcsoiem', '', 'http://list.iblocklist.com/?list=mtxmiireqmjzazcsoiem&fileformat=cidr&archiveformat=gz', 0, 0, 0, 'rTorrent only', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'CI Army', 'Malicious', '', 'https://www.iblocklist.com/list.php?list=npkuuhuxcsllnhoamkvm', '', 'http://list.iblocklist.com/?list=npkuuhuxcsllnhoamkvm&fileformat=cidr&archiveformat=gz', 0, 0, 0, 'rTorrent only', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'I-Blocklist', 'Pedophiles', '', 'https://www.iblocklist.com/list.php?list=dufcxgnbjsdwmwctgfuj', '', 'http://list.iblocklist.com/?list=dufcxgnbjsdwmwctgfuj&fileformat=cidr&archiveformat=gz', 0, 0, 0, 'rTorrent only', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Nexus23', 'ipfilterX', 'nexus23_ipfilterx', 'https://www.iblocklist.com/list.php?list=tqdjwkbxfurudwonprji', 'list.iblocklist.com/lists/nexus23/ipfilterx', '', 0, 0, 0, 'PeerGuardian Only, subscription ', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

INSERT INTO `providers_monitoring` (`id_providers_monitoring`, `provider`, `ipv4`, `hostname`) VALUES
(1, 'ONLINE', '62.210.16.0/24', ''),
(2, 'DIGICUBE', '95.130.8.5/32', ''),
(3, 'DIGICUBE', '95.130.8.210/32', ''),
(4, 'OVH', '', 'proxy-rbx2.ovh.net'),
(5, 'OVH', '', 'proxy-rbx.ovh.net'),
(6, 'OVH', '', 'proxy.sbg.ovh.net'),
(7, 'OVH', '', 'proxy.bhs.ovh.net'),
(8, 'OVH', '', 'ping.ovh.net');

INSERT INTO `renting` (`id_renting`, `model`, `tva`, `global_cost`, `nb_users`, `price_per_users`, `method`) VALUES
(1, '', 0.00, 0.00, 0, 0.00, 0);

INSERT INTO `repositories` (`id_repositories`, `type`, `dir`, `name`, `version`, `file`, `old_file`, `url`, `active`) VALUES
(1, 'GIT', '/web/rutorrent', 'ruTorrent', '3.7', 'ruTorrent_v3.7.zip', '', 'https://github.com/Novik/ruTorrent', 1),
(2, 'TARGZ', '/web/rutorrent/plugins/chat', 'ruTorrent Plugin Chat', '2.0', 'chat_v2.0.tar.gz', 'chat-2.0.tar.gz', 'https://rutorrent-chat.googlecode.com/files/chat-2.0.tar.gz', 1),
(3, 'TARGZ', '/web/rutorrent/plugins/logoff', 'ruTorrent Plugin Logoff', '1.3', 'logoff_v1.3.tar.gz', 'logoff-1.3.tar.gz', 'https://rutorrent-logoff.googlecode.com/files/logoff-1.3.tar.gz', 1),
(4, 'TARGZ', '/web/rutorrent/plugins/lbll-suite', 'ruTorrent Plugin tAdd-Labels', '1.1', 'tadd-labels_v1.1.tar.gz', 'tadd-labels_1.1.tar.gz', 'http://rutorrent-tadd-labels.googlecode.com/files/tadd-labels_1.1.tar.gz', 1),
(5, 'TARGZ', '/web/rutorrent/plugins/nfo', 'ruTorrent Plugin NFO', '1337', 'nfo_v1337.tar.gz', '', 'http://srious.biz/nfo.tar.gz', 1),
(6, 'GIT', '/web/rutorrent/plugins/ratiocolor', 'ruTorrent Plugin RatioColor', '0.5', 'ratiocolor_v0.5.zip', '', 'https://github.com/Gyran/rutorrent-ratiocolor', 1),
(7, 'SVN', '/web/rutorrent/plugins/filemanager', 'ruTorrent Plugin FileManager', '0.09', 'filemanager_v0.09.zip', '', 'http://svn.rutorrent.org/svn/filemanager/trunk/filemanager', 1),
(8, 'SVN', '/web/rutorrent/plugins/fileupload', 'ruTorrent Plugin FileUpload', '0.02', 'fileupload_v0.02.zip', '', 'http://svn.rutorrent.org/svn/filemanager/trunk/fileupload', 0),
(9, 'SVN', '/web/rutorrent/plugins/fileshare', 'ruTorrent Plugin FileShare', '0.03', 'fileshare_v0.03.zip', '', 'http://svn.rutorrent.org/svn/filemanager/trunk/fileshare', 1),
(10, 'SVN', '/web/rutorrent/plugins/mediastream', 'ruTorrent Plugin MediaStream', '0.01', 'mediastream_v0.01.zip', '', 'http://svn.rutorrent.org/svn/filemanager/trunk/mediastream', 1),
(11, 'TARGZ', '/web/rutorrent/plugins/stream', 'ruTorrent Plugin Stream', '1.0', 'stream_v1.0.tar.gz', '', 'https://rutorrent-stream-plugin.googlecode.com/files/stream.tar.gz', 1),
(12, 'ZIP', '/web/rutorrent/plugins/pausewebui', 'ruTorrent Plugin Pause WebUI', '1.2', 'pausewebui_v1.2.zip', '', 'https://rutorrent-pausewebui.googlecode.com/files/pausewebui.1.2.zip', 1),
(13, 'GIT', '/web/rutorrent/plugins/mobile', 'ruTorrent Plugin Mobile', '1.0', 'mobile_v1.0.zip', '', 'https://github.com/xombiemp/rutorrentMobile.git', 1),
(14, 'GIT', '/web/rutorrent/plugins/autodl-irssi', 'ruTorrent Plugin Autodl-irssi', '1.52', 'autodl_v1.52.zip', '', 'https://github.com/autodl-community/autodl-rutorrent.git', 0),
(15, 'GIT', '/sources/plowshare', 'Plowshare', '2.1.1', 'Plowshare_v2.1.1.zip', 'Plowshare4.tar.gz', 'https://github.com/mcrapet/plowshare.git', 1),
(16, 'CURL', '/usr/bin/composer', 'Composer', '', 'composer.phar', '', 'http://getcomposer.org/installer', 1),
(17, 'TARGZ', '/sources/nodejs', 'NodeJS', '0.12.7', 'node_v0.12.7.tar.gz', 'node-v0.12.2.tar.gz', 'https://nodejs.org/dist/v0.12.7/node-v0.12.7.tar.gz', 1),
(18, 'GIT', '/web/seedbox-manager', 'Seedbox-Manager', '2.4.4', 'seedbox-manager_v2.4.4.zip', 'seedbox-manager_v0.1.zip', 'https://github.com/Magicalex/seedbox-manager.git', 1),
(19, 'GIT', '/web/rutorrent/plugins/linkseedboxmanager', 'ruTorrent Plugin Link Manager', '1.0', 'linkseedboxmanager_v1.0.zip', '', 'https://github.com/Hydrog3n/linkseedboxmanager.git', 1),
(20, 'GIT', '/web/Cakebox-light', 'Cakebox-Light', '1.8.3', 'cakebox-light_v1.8.3.zip', '', 'https://github.com/Cakebox/Cakebox-light.git', 1),
(21, 'GIT', '/web/rutorrent/plugins/linkcakebox', 'ruTorrent Plugin Link Cakebox', '1.0', 'linkcakebox_v1.0.zip', '', 'https://github.com/Cakebox/linkcakebox.git', 1),
(22, 'GIT', '/sources/libsodium', 'Libsodium', '1.0.4', 'libsodium_v1.0.4.zip', 'libsodium_v1.0.2.zip', 'https://github.com/jedisct1/libsodium', 1),
(23, 'TARGZ', '/sources/dnscrypt-proxy', 'DNScrypt-proxy', '1.6.0', 'dnscrypt-proxy_v1.6.0.tar.gz', 'dnscrypt-proxy_v1.4.3.tar.gz', 'http://download.dnscrypt.org/dnscrypt-proxy/dnscrypt-proxy-1.6.0.tar.gz', 1),
(24, 'WBM', '/files', 'OpenVPNadmin WebMin', '2.6', 'openvpn_v2.6.wbm', 'openvpn-2.6.wbm', 'http://www.openit.it/downloads/OpenVPNadmin/openvpn-2.6.wbm.gz', 1),
(25, 'WBM', '/files', 'Nginx Webmin Module', '0.0.8', 'nginx_v0.08.wbm', 'nginx-0.08.wbm', 'http://www.justindhoffman.com/sites/justindhoffman.com/files/nginx-0.08.wbm__0.gz', 1),
(26, 'WBM', '/files', 'MiniDLNA Webmin Module', 'alpha1.1', 'minidlnawebmin_alpha1_12.wbm', '', 'http://downloads.sourceforge.net/project/minidlnawebmin/Webmin%20alpha1.12%20svn26/minidlnawebmin_alpha1_12.wbm?r=http%3A%2F%2Fsourceforge.net%2Fprojects%2Fminidlnawebmin%2Ffiles%2FWebmin%2520alpha1.12%2520svn26%2F&ts=1420088634&use_mirror=freefr', 1),
(27, 'TARGZ', '/sources/libtorrent', 'LibTorrent', '0.13.6', 'libtorrent_v0.13.6.tar.gz', 'libtorrent_v0.13.4.tar.gz', 'http://rtorrent.net/downloads/libtorrent-0.13.6.tar.gz', 1),
(28, 'TARGZ', '/sources/rtorrent', 'rTorrent', '0.9.6', 'rtorrent_v0.9.6.tar.gz', 'rtorrent_v0.9.4.tar.gz', 'http://rtorrent.net/downloads/rtorrent-0.9.6.tar.gz', 1),
(29, 'ZIP', '/sources/xmlrpc-c', 'XMLRPC', '1.42.0', 'xmlrpc-c_v1.42.0.zip', 'xmlrpc-c_v1.41.02.zip', 'https://github.com/toulousain79/MySB/raw/v2.2/files/xmlrpc-c_v1.42.0.zip', 1),
(30, 'GIT', '/web/loadavg', 'LoadAvg', '2.2', 'loadavg_v2.2.zip', '', 'https://github.com/loadavg/loadavg.git', 1),
(31, 'ZIP', '/web/owncloud', 'ownCloud', '8.2.0', 'owncloud_v8.2.0.zip', 'owncloud_v8.1.3.zip', 'https://download.owncloud.org/community/owncloud-8.2.0.zip', 1);

INSERT INTO `services` (`id_services`, `serv_name`, `bin`, `port_tcp1`, `port_tcp2`, `port_tcp3`, `ports_tcp_list`, `port_udp1`, `port_udp2`, `port_udp3`, `ports_udp_list`, `to_install`, `is_installed`) VALUES
(1, 'Seedbox-Manager', '', '', '', '', '', '', '', ' ', ' ', 0, 0),
(2, 'CakeBox-Light', '', '', '', '', '', '', '', '', '', 0, 0),
(3, 'Plex Media Server', '', '', '', '', '32400 32469', '', '', ' ', '1900 5353 32410 32412 32413 3241', 0, 0),
(4, 'Webmin', '', '8890', '', '', '', '', '', ' ', ' ', 0, 0),
(5, 'OpenVPN', '', '8893', '8894', '8895', '', '', '', '', '', 0, 0),
(6, 'LogWatch', '', '', '', '', '', '', '', ' ', ' ', 0, 0),
(7, 'Fail2Ban', '', '', '', '', '', '', '', ' ', ' ', 0, 0),
(8, 'PeerGuardian', '', '', '', '', '', '', '', ' ', ' ', 0, 0),
(9, 'rTorrent Block List', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0),
(10, 'DNScrypt-proxy', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0),
(11, 'CRON', '', '', '', '', '', '', ' ', ' ', ' ', 1, 0),
(12, 'NginX', '', '8889', '8888', '', '', '', '', '', '', 1, 0),
(13, 'SSH', '', '8892', '', '', '', '', '', '', '', 1, 0),
(14, 'VSFTPd', '', '8891', '8800', '65000:65535', '', '', '', '', '', 1, 0),
(15, 'PHP5-FPM', '', '', '', '', '', '', ' ', ' ', ' ', 1, 0),
(16, 'Postfix', '', '', '', '', '', '', ' ', ' ', ' ', 1, 0),
(17, 'Networking', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0),
(18, 'Samba', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0),
(19, 'NFS', '', '', '', '', '', '', ' ', ' ', ' ', 1, 0),
(20, 'BIND', '', '', '', '', '', '', ' ', ' ', ' ', 1, 0),
(21, 'Stunnel', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0),
(22, 'rTorrent v0.9.2', '/usr/bin/rtorrent', '', '', '', '', '', '', '', '', 1, 0),
(23, 'rTorrent v0.9.4', '/usr/local/bin/rtorrent', '', '', '', '', '', '', '', '', 1, 0),
(24, 'ownCloud', '', '', '', '', '', '', '', '', '', 0, 0);

INSERT INTO `smtp` (`id_smtp`, `smtp_provider`, `smtp_username`, `smtp_passwd`, `smtp_host`, `smtp_port`, `smtp_email`) VALUES
(1, '', '', '', '', '', '');

INSERT INTO `system` (`id_system`, `mysb_version`, `mysb_user`, `mysb_password`, `hostname`, `ipv4`, `primary_inet`, `timezone`, `cert_password`, `apt_update`, `apt_date`, `server_provider`, `ip_restriction`, `pgl_email_stats`, `pgl_watchdog_email`, `dnscrypt`) VALUES
(1, '', '', '', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', 1, 0, 0, 1);

INSERT INTO `vars` (`id_vars`, `fail2ban_whitelist`, `vpn_ip`, `white_tcp_port_out`, `white_udp_port_out`) VALUES
(1, '127.0.0.1/32', '10.0.0.0/24,10.0.1.0/24,10.0.2.0/24', '80 443', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
