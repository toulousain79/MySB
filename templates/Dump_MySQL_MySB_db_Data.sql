-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 27 Novembre 2016 à 18:01
-- Version du serveur: 5.5.53
-- Version de PHP: 5.4.45-0+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `c3_mysb_db`
--

--
-- Contenu de la table `blocklists`
--

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

--
-- Contenu de la table `lets_encrypt`
--

INSERT INTO `lets_encrypt` (`id_lets_encrypt`, `addresses`, `ipv4`) VALUES
(1, 'acme-v01.api.letsencrypt.org', '104.98.130.119'),
(2, 'acme-staging.api.letsencrypt.org', '92.122.117.72'),
(3, 'ocsp.staging-x1.letsencrypt.org', '2.16.4.219'),
(4, 'ocsp.root-x1.letsencrypt.org', '195.215.247.8'),
(5, 'ocsp.int-x1.letsencrypt.org', '88.221.144.27'),
(6, 'ocsp.int-x2.letsencrypt.org', '23.65.29.67'),
(7, 'ocsp.int-x3.letsencrypt.org', '81.25.198.161'),
(8, 'ocsp.int-x4.letsencrypt.org', '81.25.198.248'),
(9, 'outbound1.letsencrypt.org', '66.133.109.36'),
(10, 'outbound2.letsencrypt.org', '64.78.149.164');

--
-- Contenu de la table `providers_monitoring`
--

INSERT INTO `providers_monitoring` (`id_providers_monitoring`, `provider`, `ipv4`, `hostname`) VALUES
(1, 'ONLINE', '62.210.16.0/24', ''),
(2, 'DIGICUBE', '95.130.8.5/32', ''),
(3, 'DIGICUBE', '95.130.8.210/32', ''),
(4, 'OVH', '', 'proxy.rbx.ovh.net'),
(5, 'OVH', '', 'proxy-rbx2.ovh.net'),
(6, 'OVH', '', 'proxy-rbx.ovh.net'),
(7, 'OVH', '', 'proxy.sbg.ovh.net'),
(8, 'OVH', '', 'proxy.bhs.ovh.net'),
(9, 'OVH', '', 'ping.ovh.net'),
(10, 'OVH', '', 'proxy.p19.ovh.net'),
(11, 'OVH', '', 'proxy.ovh.net'),
(12, 'OVH', '', 'rtm-collector.ovh.net'),
(13, 'OVH', '', 'a2.ovh.net'),
(14, 'OVH', '92.222.184.0/24', ''),
(15, 'OVH', '92.222.185.0/24', ''),
(16, 'OVH', '92.222.186.0/24', ''),
(17, 'OVH', '167.114.37.0/24', ''),
(18, 'OVH', '151.80.231.244/32', ''),
(19, 'OVH', '151.80.231.245/32', ''),
(20, 'OVH', '151.80.231.246/32', ''),
(21, 'OVH', '151.80.231.247/32', '');

--
-- Contenu de la table `repositories`
--

INSERT INTO `repositories` (`id_repositories`, `type`, `dir`, `name`, `version`, `upgrade`, `file`, `url`, `active`, `on_boot`, `script`) VALUES
(1, 'GIT', '/web/apps/ru', 'ruTorrent', '3.7', 0, 'ruTorrent_v3.7.zip', 'https://github.com/Novik/ruTorrent.git', 1, 0, ''),
(2, 'TARGZ', '/web/apps/ru/plugins/chat', 'ruTorrent Plugin Chat', '2.0', 0, 'chat_v2.0.tar.gz', 'https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/rutorrent-chat/chat-2.0.tar.gz', 1, 0, ''),
(3, 'TARGZ', '/web/apps/ru/plugins/logoff', 'ruTorrent Plugin Logoff', '1.3', 0, 'logoff_v1.3.tar.gz', 'https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/rutorrent-logoff/logoff-1.3.tar.gz', 1, 0, ''),
(4, 'TARGZ', '/web/apps/ru/plugins/lbll-suite', 'ruTorrent Plugin tAdd-Labels', '0.8.1', 0, 'lbll-suite_v0.8.1.tar.gz', 'https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/rutorrent-tadd-labels/lbll-suite_0.8.1.tar.gz', 1, 0, ''),
(5, 'SVN', '/web/apps/ru/plugins/nfo', 'ruTorrent Plugin NFO', '3.6', 0, 'nfo_v3.6.zip', 'https://github.com/AceP1983/ruTorrent-plugins/trunk/nfo', 1, 0, ''),
(6, 'SVN', '/web/apps/ru/plugins/checksfv', 'ruTorrent Plugin Check SFV', '3.6', 0, 'checksfv_v3.6.zip', 'https://github.com/AceP1983/ruTorrent-plugins/trunk/checksfv', 1, 0, ''),
(7, 'SVN', '/web/apps/ru/plugins/disklog', 'ruTorrent Plugin Disk Log', '3.6', 0, 'disklog_v3.6.zip', 'https://github.com/AceP1983/ruTorrent-plugins/trunk/disklog', 1, 0, ''),
(8, 'SVN', '/web/apps/ru/plugins/showip', 'ruTorrent Plugin Show IP', '3.6', 0, 'showip_v3.6.zip', 'https://github.com/AceP1983/ruTorrent-plugins/trunk/showip', 1, 0, ''),
(9, 'SVN', '/web/apps/ru/plugins/speedgraph', 'ruTorrent Plugin Speed Graph', '3.6', 0, 'speedgraph_v3.6.zip', 'https://github.com/AceP1983/ruTorrent-plugins/trunk/speedgraph', 1, 0, ''),
(10, 'ZIP', '/web/apps/ru/plugins/filemanager', 'ruTorrent Plugin FileManager', '0.09', 0, 'filemanager_v0.09.zip', 'https://github.com/toulousain79/MySB/raw/v3.5/files/filemanager_v0.09.zip', 1, 0, ''),
(11, 'ZIP', '/web/apps/ru/plugins/fileupload', 'ruTorrent Plugin FileUpload', '0.02', 0, 'fileupload_v0.02.zip', 'https://github.com/toulousain79/MySB/raw/v3.5/files/fileupload_v0.02.zip', 0, 0, ''),
(12, 'ZIP', '/web/apps/ru/plugins/fileshare', 'ruTorrent Plugin FileShare', '1.0', 0, 'fileshare_v1.0.zip', 'https://github.com/toulousain79/MySB/raw/v3.5/files/fileshare_v0.03.zip', 1, 0, ''),
(13, 'ZIP', '/web/apps/ru/plugins/mediastream', 'ruTorrent Plugin MediaStream', '0.01', 0, 'mediastream_v0.01.zip', 'https://github.com/toulousain79/MySB/raw/v3.5/files/mediastream_v0.01.zip', 1, 0, ''),
(14, 'GIT', '/web/apps/ru/plugins/ratiocolor', 'ruTorrent Plugin RatioColor', '0.5', 0, 'ratiocolor_v0.5.zip', 'https://github.com/Gyran/rutorrent-ratiocolor', 1, 0, ''),
(15, 'TARGZ', '/web/apps/ru/plugins/stream', 'ruTorrent Plugin Stream', '1.0', 0, 'stream_v1.0.tar.gz', 'https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/rutorrent-stream-plugin/stream.tar.gz', 1, 0, ''),
(16, 'ZIP', '/web/apps/ru/plugins/pausewebui', 'ruTorrent Plugin Pause WebUI', '1.2', 0, 'pausewebui_v1.2.zip', 'https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/rutorrent-pausewebui/pausewebui.1.2.zip', 1, 0, ''),
(17, 'GIT', '/web/apps/ru/plugins/mobile', 'ruTorrent Plugin Mobile', '1.0', 0, 'mobile_v1.0.zip', 'https://github.com/xombiemp/rutorrentMobile.git', 1, 0, ''),
(18, 'GIT', '/web/apps/ru/plugins/linkseedboxmanager', 'ruTorrent Plugin Link Manager', '1.0', 0, 'linkseedboxmanager_v1.0.zip', 'https://github.com/Hydrog3n/linkseedboxmanager.git', 1, 0, ''),
(19, 'GIT', '/web/apps/ru/plugins/linkcakebox', 'ruTorrent Plugin Link Cakebox', '1.0', 0, 'linkcakebox_v1.0.zip', 'https://github.com/Cakebox/linkcakebox.git', 1, 0, ''),
(20, 'GIT', '/sources/plowshare', 'Plowshare', '2.1.6', 0, 'Plowshare_v2.1.6.zip', 'https://github.com/mcrapet/plowshare.git', 1, 0, ''),
(21, 'CURL', '/usr/bin/composer', 'Composer', '1.2.4', 0, 'composer.phar', 'https://getcomposer.org/installer', 1, 0, ''),
(22, 'TARGZ', '/sources/nodejs', 'NodeJS', '0.12.17', 0, 'node_v0.12.17.tar.gz', 'https://nodejs.org/dist/v0.12.17/node-v0.12.17.tar.gz', 1, 0, ''),
(23, 'GIT', '/web/apps/sm', 'Seedbox-Manager', '2.5.0', 0, 'seedbox-manager_v2.5.0.zip', 'https://github.com/Magicalex/seedbox-manager.git', 1, 0, ''),
(24, 'GIT', '/web/apps/cb', 'Cakebox-Light', '1.8.6', 0, 'cakebox-light_v1.8.6.zip', 'https://github.com/Cakebox/Cakebox-light.git', 1, 0, ''),
(25, 'TARGZ', '/sources/libsodium', 'Libsodium', '1.0.11', 0, 'libsodium_v1.0.11.tar.gz', 'https://download.libsodium.org/libsodium/releases/libsodium-1.0.11.tar.gz', 1, 0, ''),
(26, 'TARGZ', '/sources/dnscrypt-proxy', 'DNScrypt-proxy', '1.7.0', 0, 'dnscrypt-proxy_v1.7.0.tar.gz', 'https://download.dnscrypt.org/dnscrypt-proxy/dnscrypt-proxy-1.7.0.tar.gz', 1, 0, ''),
(27, 'WBM', '/files', 'OpenVPNadmin WebMin', '2.6', 0, 'openvpn_v2.6.wbm', 'http://www.openit.it/downloads/OpenVPNadmin/openvpn-2.6.wbm.gz', 1, 0, ''),
(28, 'WBM', '/files', 'Nginx Webmin Module', '0.10', 1, 'nginx_v0.10.wbm', 'https://www.justindhoffman.com/sites/justindhoffman.com/files/nginx-0.10.wbm_.gz', 1, 0, ''),
(29, 'TARGZ', '/sources/libtorrent', 'LibTorrent', '0.13.6', 0, 'libtorrent_v0.13.6.tar.gz', 'http://rtorrent.net/downloads/libtorrent-0.13.6.tar.gz', 1, 0, ''),
(30, 'TARGZ', '/sources/rtorrent', 'rTorrent', '0.9.6', 0, 'rtorrent_v0.9.6.tar.gz', 'http://rtorrent.net/downloads/rtorrent-0.9.6.tar.gz', 1, 0, ''),
(31, 'SVN', '/sources/xmlrpc-c', 'XMLRPC', '1.43.03', 0, 'xmlrpc-c_v1.43.03.zip', 'http://svn.code.sf.net/p/xmlrpc-c/code/stable', 1, 0, ''),
(32, 'TARGZ', '/web/apps/la', 'LoadAvg', '2.2', 0, 'loadavg_v2.2.tar.gz', 'http://www.loadavg.com/files/loadavg.tar.gz', 1, 0, ''),
(33, 'ZIP', '/web/apps/oc', 'ownCloud', '9.1.3', 0, 'owncloud_v9.1.3.zip', 'https://download.owncloud.org/community/owncloud-9.1.3.zip', 1, 0, ''),
(34, 'GIT', '/usr/local/src/letsencrypt', 'Lets Encrypt', '0.9.2', 0, 'LetsEncrypt_v0.9.2.zip', 'https://github.com/certbot/certbot', 1, 0, ''),
(35, 'TARGZ', '/sources/rkhunter', 'RKHunter', '1.4.2', 0, 'rkhunter_v1.4.2.tar.gz', 'http://downloads.sourceforge.net/project/rkhunter/rkhunter/1.4.2/rkhunter-1.4.2.tar.gz?r=&ts=1456674223&use_mirror=freefr', 1, 0, ''),
(36, 'TARGZ', '/sources/wget', 'Wget', '1.18', 0, 'wget_v1.18.tar.gz', 'http://ftp.gnu.org/gnu/wget/wget-1.18.tar.gz', 1, 0, '');

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`id_services`, `serv_name`, `bin`, `port_tcp1`, `port_tcp2`, `port_tcp3`, `ports_tcp_list`, `port_udp1`, `port_udp2`, `port_udp3`, `ports_udp_list`, `to_install`, `is_installed`, `used`) VALUES
(1, 'Seedbox-Manager', '', '', '', '', '', '', '', ' ', ' ', 0, 0, 1),
(2, 'CakeBox-Light', '', '', '', '', '', '', '', '', '', 0, 0, 1),
(3, 'Plex Media Server', '', '32400', '', '', '3005 8324 32469', '', '', ' ', '1900 5353 32410 32412 32413 3241', 0, 0, 1),
(4, 'Webmin', '', '8190', '', '', '', '', '', '', '', 0, 0, 1),
(5, 'OpenVPN', '', '', '', '', '', '8193', '8194', '8195', '', 0, 0, 1),
(6, 'LogWatch', '', '', '', '', '', '', '', ' ', ' ', 0, 0, 1),
(7, 'Fail2Ban', '', '', '', '', '', '', '', ' ', ' ', 0, 0, 1),
(8, 'PeerGuardian', '', '', '', '', '', '', '', ' ', ' ', 0, 0, 1),
(9, 'rTorrent Block List', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 1),
(10, 'DNScrypt-proxy', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 1),
(11, 'CRON', '', '', '', '', '', '', ' ', ' ', ' ', 1, 0, 0),
(12, 'NginX', '', '8189', '8888', '', '', '', '', '', '', 1, 0, 0),
(13, 'SSH', '', '8192', '', '', '', '', '', '', '', 1, 0, 0),
(14, 'VSFTPd', '', '8191', '8800', '65000:65535', '', '', '', '', '', 1, 0, 0),
(15, 'PHP5-FPM', '', '', '', '', '', '', ' ', ' ', ' ', 1, 0, 0),
(16, 'Postfix', '', '', '', '', '', '', ' ', ' ', ' ', 1, 0, 0),
(17, 'Networking', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 0),
(18, 'Samba', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 1),
(19, 'NFS', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 1),
(20, 'BIND', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 0),
(21, 'Stunnel', '', '', '', '', '', '', ' ', ' ', ' ', 0, 0, 0),
(22, 'rTorrent v0.9.2', '/usr/bin/rtorrent', '', '', '', '', '', '', '', '', 1, 0, 0),
(23, 'rTorrent v0.9.6', '/usr/local/bin/rtorrent', '', '', '', '', '', '', '', '', 1, 0, 0),
(24, 'ownCloud', '', '', '', '', '', '', '', '', '', 0, 0, 1),
(25, 'Lets Encrypt', '', '443', '', '', '', '', '', '', '', 0, 0, 1);

--
-- Contenu de la table `smtp`
--

INSERT INTO `smtp` (`id_smtp`, `smtp_provider`, `smtp_username`, `smtp_passwd`, `smtp_host`, `smtp_port`, `smtp_email`) VALUES
(1, '', '', '', '', '', '');

--
-- Contenu de la table `system`
--

INSERT INTO `system` (`id_system`, `mysb_version`, `mysb_user`, `mysb_password`, `hostname`, `ipv4`, `primary_inet`, `timezone`, `cert_password`, `apt_update`, `apt_date`, `server_provider`, `ip_restriction`, `pgl_email_stats`, `pgl_watchdog_email`, `dnscrypt`, `logwatch`, `owncloud_cron`, `letsencrypt_date`, `letsencrypt_openport`, `quota_default`, `rt_model`, `rt_tva`, `rt_global_cost`, `rt_cost_tva`, `rt_nb_users`, `rt_price_per_users`, `rt_method`) VALUES
(1, '', '', '', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', 1, 0, 0, 1, 0, 0, '0000-00-00', 0, 0, '', 0.00, 0.00, 0.00, 0, 0.00, 0);

--
-- Contenu de la table `vars`
--

INSERT INTO `vars` (`id_vars`, `fail2ban_whitelist`, `vpn_ip`, `white_tcp_port_out`, `white_udp_port_out`) VALUES
(1, '127.0.0.1/32', '10.0.0.0/24,10.0.1.0/24,10.0.2.0/24', '80 443', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
