<?php
// ----------------------------------
//  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
//   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
//    _\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
//     _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
//      _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
//       _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
//        _\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
//         _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
//          _\///______________\///___\////__________\///////////_____\/////////////_____
//			By toulousain79 ---> https://github.com/toulousain79/
//
//#####################################################################
//
//	Copyright (c) 2013 toulousain79 (https://github.com/toulousain79/)
//	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
//	The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
//	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
//	IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
//	--> Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
//
//#################### FIRST LINE #####################################

define('User_UserInfo_YES', 'YES');
define('User_UserInfo_NO', 'NO');
define('User_UserInfo_NotInstalled', 'MySB is not installed !');

//////////////////////
// User personal info
//////////////////////
define('User_UserInfo_Title_PersonnalInfo', 'User personal info');
// Username
define('User_UserInfo_Table_Username', 'Username');
define('User_UserInfo_Comment_Username', ' ');
// IP Address
define('User_UserInfo_Table_IpAddress', 'IP Addresses');
define('User_UserInfo_Table_NoIpAddress', 'No address given ...');
define('User_UserInfo_Comment_IpAddress', 'Public IP addresses used for access restriction (if activated). You can manage this list <a href="/?user/manage-addresses.html">here</a>.');
// Password
define('User_UserInfo_Table_Password', 'Password');
define('User_UserInfo_Comment_Password_1', '<a href="?user/change-password.html">You must change your password now !</a>');
define('User_UserInfo_Comment_Password_2', 'You can change your password <a href="?user/change-password.html">here</a>.');
// E-mail
define('User_UserInfo_Table_Email', 'E-mail');
define('User_UserInfo_Comment_Email', ' ');
// RPC
define('User_UserInfo_Table_RPC', 'RPC');
define('User_UserInfo_Comment_RPC', 'RPC value can be used to remotely connect to rTorrent via a smartphone. (see Seedbox-Manager)');
// SFTP
define('User_UserInfo_Table_SFTP', 'sFTP');
define('User_UserInfo_Comment_SFTP', ' ');

//////////////////////
// Directories
//////////////////////
define('User_UserInfo_Title_Directories', 'Directories');
// Session dir
define('User_UserInfo_Table_Session', 'Session dir');
define('User_UserInfo_Value_Session', '/rtorrent/.session');
define('User_UserInfo_Comment_Session', 'The session directory allows rTorrent to save the progress of your torrents.');
// Complete dir
define('User_UserInfo_Table_CompleteDir', 'Complete dir');
define('User_UserInfo_Value_CompleteDir', '/rtorrent/complete');
define('User_UserInfo_Comment_CompleteDir', 'The completed files will be transferred to this directory. You can change it via Autotools of ruTorrent.');
// Incomplete dir
define('User_UserInfo_Table_IncompleteDir', 'Incomplete dir');
define('User_UserInfo_Value_IncompleteDir', '/rtorrent/incomplete');
define('User_UserInfo_Comment_IncompleteDir', 'Partial downloads are stored here.');
// Torrents dir
define('User_UserInfo_Table_TorrentDir', 'Torrents dir');
define('User_UserInfo_Value_TorrentDir', '/rtorrent/torrents');
define('User_UserInfo_Comment_TorrentDir', 'A copy of all torrents added directly via ruTorrent are copied to this folder.');
// Watch dir
define('User_UserInfo_Table_WatchDir', 'Watch dir');
define('User_UserInfo_Value_WatchDir', '/rtorrent/watch');
define('User_UserInfo_Comment_WatchDir', 'Saving a torrent file into this directory will automatically start the download ruTorrent.');
// Share dir
define('User_UserInfo_Table_ShareDir', 'Share dir');
define('User_UserInfo_Value_ShareDir', '/rtorrent/share');
define('User_UserInfo_Comment_ShareDir', 'The "share" folder is accessible by all users on the server (FTPs, sFTP, Samba, NFS). You can easily share what you want with any user. You can use File Manager plugin available in ruTorrent, use sFTP/FTPs or Samba.');

//////////////////////
// Ports
//////////////////////
define('User_UserInfo_Title_Ports', 'Ports');
// SFTP Port
define('User_UserInfo_Table_SftpPort', 'SFTP port');
define('User_UserInfo_Comment_SftpPort', ' ');
// FTPs Port
define('User_UserInfo_Table_FtpsPort', 'FTPs port (TLS)');
define('User_UserInfo_Comment_FtpsPort', 'It is necessary to configure your FTP client software by specifying this port number. You must select "FTPS" and "explicit TLS connection".');
// SCGI Port
define('User_UserInfo_Table_ScgiPort', 'SCGI port');
define('User_UserInfo_Comment_ScgiPort', 'This value is used in conjunction with RPC.');
// rTorrent Port
define('User_UserInfo_Table_RtorrentPort', 'rTorrent port');
define('User_UserInfo_Comment_RtorrentPort', 'Is the network port for your rTorrent session.');

//////////////////////
// OpenVPN
//////////////////////
define('User_UserInfo_Title_OpenVPN', 'OpenVPN');
// Server IP GW
define('User_UserInfo_Table_SrvIpGw', 'Server IP GW');
define('User_UserInfo_Comment_SrvIpGw', 'Server IP with redirect traffic (TUN interface).');
// Server IP
define('User_UserInfo_Table_SrvIp', 'Server IP');
define('User_UserInfo_Comment_SrvIp', 'Server IP without redirect traffic (TUN interface).');
// Server IP bridged
define('User_UserInfo_Table_SrvIpBridge', 'Server IP bridged');
define('User_UserInfo_Comment_SrvIpBridge', 'Server IP without redirect traffic (TAP interface).');
// Samba share
define('User_UserInfo_Table_SambaShare', 'Samba share');
define('User_UserInfo_Comment_SambaShare', 'mount - [Destination_directory] -t cifs -o noatime,nodiratime,UNC=//[10.0.x.1]/%s,username=%s,password=[your_password]');
// NFS share
define('User_UserInfo_Table_NfsShare', 'NFS share');
define('User_UserInfo_Value_NfsShare', '/rtorrent');
define('User_UserInfo_Comment_NfsShare', 'mount -t nfs [10.0.x.1]:/home/%s/rtorrent [Destination_directory] [-o vers=3,nolock]');

//////////////////////
// Links (Normal user)
//////////////////////
define('User_UserInfo_Title_LinkNormal', 'Links (Normal user)');
// Change password
define('User_UserInfo_Title_ChangePass', 'Change password');
define('User_UserInfo_Comment_ChangePass', 'You can change your password here.');
// Manage Addresses
define('User_UserInfo_Title_ManageAddresses', 'Manage Addresses');
define('User_UserInfo_Comment_ManageAddresses', 'Add here your IPs addresses and/or your dynamic DNS to add to whitelist.');
// ruTorrent
define('User_UserInfo_Title_ruTorrent', 'ruTorrent');
define('User_UserInfo_Comment_ruTorrent', 'ruTorrent interface');
// Seedbox-Manager
define('User_UserInfo_Title_Manager', 'Seedbox-Manager');
define('User_UserInfo_Comment_Manager', 'Seedbox-Manager interface');
// OpenVPN config
define('User_UserInfo_Title_OpenVpnConfig', 'OpenVPN config');
define('User_UserInfo_Comment_OpenVpnConfig', 'Download here configuration files for OpenVPN.');
// OpenVPN GUI
define('User_UserInfo_Title_OpenVpnGui', 'OpenVPN GUI');
define('User_UserInfo_Value_OpenVpnGui', 'https://openvpn.net/index.php/open-source/downloads.html');
define('User_UserInfo_Comment_OpenVpnGui', 'Download here GUI for OpenVPN.');
// CakeBox Light
define('User_UserInfo_Title_Cakebox', 'CakeBox Light');
define('User_UserInfo_Comment_Cakebox', 'Play here your media.');
// ownCloud
define('User_UserInfo_Title_ownCloud', 'ownCloud');
define('User_UserInfo_Comment_ownCloud', 'Access, Sync and Share Your Data.');

//////////////////////
// Links (Main user)
//////////////////////
define('User_UserInfo_Title_LinkMain', 'Links (Main user)');
// Webmin
define('User_UserInfo_Table_Webmin', 'Webmin');
define('User_UserInfo_Comment_Webmin', 'Admin interface for manage your server.');
// Logs
define('User_UserInfo_Table_Logs', 'Logs');
define('User_UserInfo_Comment_Logs', 'You can check logs of MySB install and security.');
// Renting infos
define('User_UserInfo_Table_Renting', 'Renting infos');
define('User_UserInfo_Comment_Renting', 'Manage your renting informations.');
// Trackers
define('User_UserInfo_Table_Trackers', 'Trackers list');
define('User_UserInfo_Comment_Trackers', '<a href="?trackers/trackers-list.html">Manage your trackers here.</a> You can also <a href="?trackers/add-new-trackers.html">add new tracker here</a>.');
// Blocklists
define('User_UserInfo_Table_Blocklists', 'Blocklists');
define('User_UserInfo_Comment_Blocklists', 'You can manage <a href="?blocklists/rtorrent-blocklists.html">rTorrent blocklists</a> AND <a href="?blocklists/peerguardian-blocklists.html">PeerGuardian blocklists</a>.');
// DNScrypt-proxy
define('User_UserInfo_Table_DNScrypt', 'DNScrypt-proxy');
define('User_UserInfo_Comment_DNScrypt', '<a href="?main-user/dnscrypt-proxy.html">Informations on resolvers used.</a>');

//////////////////////
// SSH commands available
//////////////////////
define('User_UserInfo_Title_SSHcommand', 'SSH commands available');
// Users Management
define('User_UserInfo_Table_UserManage', 'Users Management');
define('User_UserInfo_Comment_MySB_CreateUser', ' ');
define('User_UserInfo_Comment_MySB_ChangeUserPassword', '<pre>MySB_ChangeUserPassword username new_password</pre>');
define('User_UserInfo_Comment_MySB_DeleteUser', ' ');
// SeedBox Management
define('User_UserInfo_Table_SeedboxManage', 'SeedBox Management');
define('User_UserInfo_Comment_MySB_RefreshMe', '<pre>MySB_RefreshMe (rutorrent|manager|cakebox|loadavg|all)</pre>');
define('User_UserInfo_Comment_MySB_UpgradeMe', 'Enables migration to a new version of MySB.');
define('User_UserInfo_Comment_MySB_UpgradeSystem', 'Performs an update + upgrade + update-ca-certificates');
define('User_UserInfo_Comment_MySB_GitHubRepoUpdate', 'Updates the repository of the current version of MySB. (CRON every days)');
define('User_UserInfo_Comment_MySB_SecurityRules', '<pre>MySB_SecurityRules (new|clean)</pre>');
// Main scripts
define('User_UserInfo_Table_MainScript', 'Main scripts');
define('User_UserInfo_Comment_BlocklistsRTorrent', 'Use this for generate rTorrent blocklist. (CRON twice a day)');
define('User_UserInfo_Comment_GetTrackersCert', 'Get all SSL certificates for all trackers. This script is start every time you add a tracker or modify the list in MySB portal.');

//////////////////////
// Price and Payment info
//////////////////////
define('User_UserInfo_Title_Renting', 'Price and Payment info');
// Server model
define('User_UserInfo_Table_SrvModel', 'Server model');
// Global cost
define('User_UserInfo_Table_GlobalCost', 'Global cost');
// TVA
define('User_UserInfo_Table_TVA', 'TVA');
// Total users
define('User_UserInfo_Table_TotalUsers', 'Total users');
// TOTAL per users
define('User_UserInfo_Table_TotalPerUser', 'TOTAL per user');
define('User_UserInfo_Table_TotalPerUser_Plus', ' &euro; TTC / month');

//#################### LAST LINE ######################################
