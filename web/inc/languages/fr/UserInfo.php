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

define('User_UserInfo_YES', 'OUI');
define('User_UserInfo_NO', 'NON');
define('User_UserInfo_NotInstalled', 'MySB n\'est pas install&eacute;!');

//////////////////////
// User personal info
//////////////////////
define('User_UserInfo_Title_PersonnalInfo', 'Informations personnelles de l\'utilisateur');
// Username
define('User_UserInfo_Table_Username', 'Nom d\'utilisateur');
define('User_UserInfo_Comment_Username', ' ');
// IP Address
define('User_UserInfo_Table_IpAddress', 'Adresses IP');
define('User_UserInfo_Table_NoIpAddress', 'Aucune adresse renseign&eacute;e');
define('User_UserInfo_Comment_IpAddress', 'Adresses IP publiques utilis&eacute;es pour la restriction d\'acc&egrave;s. Vous pouvez g&eacute;rer cette liste <a href="/?user/manage-addresses.html">ici</a>.');
// Password
define('User_UserInfo_Table_Password', 'Mot de passe');
define('User_UserInfo_Comment_Password_1', '<a href="?user/change-password.html">Vous devez changer votre mot de passe maintenant!</a>');
define('User_UserInfo_Comment_Password_2', 'Vous pouvez changer votre mot de passe <a href="?user/change-password.html">ici</a>.');
// E-mail
define('User_UserInfo_Table_Email', 'E-mail');
define('User_UserInfo_Comment_Email', ' ');
// RPC
define('User_UserInfo_Table_RPC', 'RPC');
define('User_UserInfo_Comment_RPC', 'La valeur RPC peut &ecirc;tre utilis&eacute;e pour se connecter &agrave; distance &agrave; rTorrent via un smartphone. (voir Seedbox-Manager)');
// SFTP
define('User_UserInfo_Table_SFTP', 'sFTP');
define('User_UserInfo_Comment_SFTP', ' ');

//////////////////////
// Directories
//////////////////////
define('User_UserInfo_Title_Directories', 'R&eacute;pertoires');
// Session dir
define('User_UserInfo_Table_Session', 'R&eacute;p. Sessions');
define('User_UserInfo_Value_Session', '/rtorrent/.session');
define('User_UserInfo_Comment_Session', 'Le r&eacute;pertoire des sessions permet &agrave; rTorrent de sauvegarder l\'avancement de vos torrents.');
// Complete dir
define('User_UserInfo_Table_CompleteDir', 'R&eacute;p. Complete');
define('User_UserInfo_Value_CompleteDir', '/rtorrent/complete');
define('User_UserInfo_Comment_CompleteDir', 'Les fichiers complets seront transf&eacute;r&eacute;s dans ce r&eacute;pertoire. Il est possible de le modifier via les Autotools de ruTorrent.');
// Incomplete dir
define('User_UserInfo_Table_IncompleteDir', 'R&eacute;p. Incomplete');
define('User_UserInfo_Value_IncompleteDir', '/rtorrent/incomplete');
define('User_UserInfo_Comment_IncompleteDir', 'Les t&eacute;l&eacute;chargements partiels sont stock&eacute;s ici.');
// Torrents dir
define('User_UserInfo_Table_TorrentDir', 'R&eacute;p. Torrents');
define('User_UserInfo_Value_TorrentDir', '/rtorrent/torrents');
define('User_UserInfo_Comment_TorrentDir', 'Une copie de tous les torrents ajout&eacute;s directement via ruTorrent sont copi&eacute;s dans ce dossier.');
// Watch dir
define('User_UserInfo_Table_WatchDir', 'R&eacute;p. Watch');
define('User_UserInfo_Value_WatchDir', '/rtorrent/watch');
define('User_UserInfo_Comment_WatchDir', 'Enregistrer un fichier torrent dans ce r&eacute;pertoire commencera automatiquement le t&eacute;l&eacute;chargement dans ruTorrent.');
// Share dir
define('User_UserInfo_Table_ShareDir', 'R&eacute;p. Share');
define('User_UserInfo_Value_ShareDir', '/rtorrent/share');
define('User_UserInfo_Comment_ShareDir', 'Le dossier &laquo;share&raquo; (partage) est accessible par tous les utilisateurs du serveur. Vous pouvez facilement partager ce que vous voulez avec tout utilisateur. Vous pouvez utiliser le plugin de FileManager disponible dans ruTorrent, ou sFTP / FTPs ou Samba.');

//////////////////////
// Ports
//////////////////////
define('User_UserInfo_Title_Ports', 'Ports');
// SFTP Port
define('User_UserInfo_Table_SftpPort', 'Port sFTP');
define('User_UserInfo_Comment_SftpPort', ' ');
// FTPs Port
define('User_UserInfo_Table_FtpsPort', 'Port FTPs (TLS)');
define('User_UserInfo_Comment_FtpsPort', 'Il est n&eacute;cessaire de configurer votre logiciel client FTP en sp&eacute;cifiant ce num&eacute;ro de port. Vous devez s&eacute;lectionner &quot;FTPs&quot; et "Connexion FTP explicite TLS". Plus simple, t&eacute;l&eacute;chargez directement le fichier XML pr&eacute;-param&eacute;tr&eacute; via Seedbox-Manager.');
// SCGI Port
define('User_UserInfo_Table_ScgiPort', 'Port SCGI');
define('User_UserInfo_Comment_ScgiPort', 'Cette valeur est utilisée conjointement avec RPC.');
// rTorrent Port
define('User_UserInfo_Table_RtorrentPort', 'Port rTorrent');
define('User_UserInfo_Comment_RtorrentPort', 'Correspond au port r&eacute;seau de votre session rTorrent.');

//////////////////////
// OpenVPN
//////////////////////
define('User_UserInfo_Title_OpenVPN', 'OpenVPN');
// Server IP GW
define('User_UserInfo_Table_SrvIpGw', 'IP du serveur GW');
define('User_UserInfo_Comment_SrvIpGw', 'IP du serveur utilisant la redirection du trafic (interface TUN).');
// Server IP
define('User_UserInfo_Table_SrvIp', 'IP du serveur');
define('User_UserInfo_Comment_SrvIp', 'IP du serveur N\'utilisant PAS la redirection du trafic (interface TUN).');
// Server IP bridged
define('User_UserInfo_Table_SrvIpBridge', 'IP du serveur BR');
define('User_UserInfo_Comment_SrvIpBridge', 'IP du serveur N\'utilisant PAS la redirection du trafic (interface TAP).');
// Samba share
define('User_UserInfo_Table_SambaShare', 'Partage Samba');
define('User_UserInfo_Comment_SambaShare', 'mount - [Destination_directory] -t cifs -o noatime,nodiratime,UNC=//[10.0.x.1]/%s,username=%s,password=[your_password]');
// NFS share
define('User_UserInfo_Table_NfsShare', 'Partage NFS');
define('User_UserInfo_Value_NfsShare', '/rtorrent');
define('User_UserInfo_Comment_NfsShare', 'mount -t nfs [10.0.x.1]:/home/%s/rtorrent [Destination_directory] [-o vers=3,nolock]');

//////////////////////
// Links (Normal user)
//////////////////////
define('User_UserInfo_Title_LinkNormal', 'Liens (utilisateur standard)');
// Change password
define('User_UserInfo_Title_ChangePass', 'Mot de passe');
define('User_UserInfo_Comment_ChangePass', 'Vous pouvez modifier votre mot de passe sur cette page.');
// Manage Addresses
define('User_UserInfo_Title_ManageAddresses', 'G&eacute;rer vos adresses');
define('User_UserInfo_Comment_ManageAddresses', 'Ajoutez ici vos adresses IPs et/ou vos DNS dynamiques qui seront ajout&eacute;s dans les diff&eacute;rentes liste blanches.');
// ruTorrent
define('User_UserInfo_Title_ruTorrent', 'ruTorrent');
define('User_UserInfo_Comment_ruTorrent', 'Interface ruTorrent');
// Seedbox-Manager
define('User_UserInfo_Title_Manager', 'Seedbox-Manager');
define('User_UserInfo_Comment_Manager', 'Interface Seedbox-Manager');
// OpenVPN config
define('User_UserInfo_Title_OpenVpnConfig', 'Configuration OpenVPN');
define('User_UserInfo_Comment_OpenVpnConfig', 'T&eacute;l&eacute;chargez ici vos fichiers de configuration personnalis&eacute;s pour OpenVPN.');
// OpenVPN GUI
define('User_UserInfo_Title_OpenVpnGui', 'Client OpenVPN');
define('User_UserInfo_Value_OpenVpnGui', 'https://openvpn.net/index.php/open-source/downloads.html');
define('User_UserInfo_Comment_OpenVpnGui', 'T&eacute;l&eacute;chargez ici un client pour OpenVPN.');
// CakeBox Light
define('User_UserInfo_Title_Cakebox', 'CakeBox Light');
define('User_UserInfo_Comment_Cakebox', 'Jouer ici vos m&eacute;dias.');
// ownCloud
define('User_UserInfo_Title_ownCloud', 'ownCloud');
define('User_UserInfo_Comment_ownCloud', 'Plateforme de services de stockage et partage de fichiers.');

//////////////////////
// Links (Main user)
//////////////////////
define('User_UserInfo_Title_LinkMain', 'Liens (utilisateur principal)');
// Webmin
define('User_UserInfo_Table_Webmin', 'Webmin');
define('User_UserInfo_Comment_Webmin', 'Interface d\'administration pour g&eacute;rer votre serveur.');
// Logs
define('User_UserInfo_Table_Logs', 'Logs');
define('User_UserInfo_Comment_Logs', 'Vous pouvez visualiser les journaux d\'installation de MySB, ainsi que ceux li&eacute;s &agrave; la s&eacute;curit&eacute; et la protection de votre serveur.');
// Renting infos
define('User_UserInfo_Table_Renting', 'Location');
define('User_UserInfo_Comment_Renting', 'G&eacute;rez vos informations de location.');
// Trackers
define('User_UserInfo_Table_Trackers', 'Liste des Trackers');
define('User_UserInfo_Comment_Trackers', '<a href="?trackers/trackers-list.html">G&eacute;rer vos trackers ici.</a> Vous pouvez &eacute;galement <a href="?trackers/add-new-trackers.html">ajouter de nouveaux tracker ici</a>.');
// Blocklists
define('User_UserInfo_Table_Blocklists', 'Listes noires');
define('User_UserInfo_Comment_Blocklists', 'G&eacute;rer les <a href="?blocklists/rtorrent-blocklists.html">listes noire pour rTorrent</a> ET les <a href="?blocklists/peerguardian-blocklists.html">listes noires pour PeerGuardian</a>.');
// DNScrypt-proxy
define('User_UserInfo_Table_DNScrypt', 'DNScrypt-proxy');
define('User_UserInfo_Comment_DNScrypt', '<a href="?main-user/dnscrypt-proxy.html">Informations sur les serveurs utilis&eacute;s.</a>');

//////////////////////
// SSH commands available
//////////////////////
define('User_UserInfo_Title_SSHcommand', 'Commandes SSH disponibles');
// Users Management
define('User_UserInfo_Table_UserManage', 'Gestion des utilisateurs');
define('User_UserInfo_Comment_MySB_CreateUser', ' ');
define('User_UserInfo_Comment_MySB_ChangeUserPassword', '<pre>MySB_ChangeUserPassword username new_password</pre>');
define('User_UserInfo_Comment_MySB_DeleteUser', ' ');
// SeedBox Management
define('User_UserInfo_Table_SeedboxManage', 'Gestion de la seedbox');
define('User_UserInfo_Comment_MySB_RefreshMe', '<pre>MySB_RefreshMe (rutorrent|manager|cakebox|loadavg|all)</pre>');
define('User_UserInfo_Comment_MySB_UpgradeMe', 'Permet la migration vers une nouvelle version de MySB.');
define('User_UserInfo_Comment_MySB_UpgradeSystem', 'Effectue un "update" + "upgrade" + "update-ca-certificates"');
define('User_UserInfo_Comment_MySB_GitHubRepoUpdate', 'Mise &agrave; jour de la version actuelle MySB. (CRON tous les jours)');
define('User_UserInfo_Comment_MySB_SecurityRules', '<pre>MySB_SecurityRules (new|clean)</pre>');
// Main scripts
define('User_UserInfo_Table_MainScript', 'Scripts importants');
define('User_UserInfo_Comment_BlocklistsRTorrent', 'Utilisez-le pour g&eacute;n&eacute;rer la liste de blocage pour rTorrent. (CRON 2 fois par jour)');
define('User_UserInfo_Comment_GetTrackersCert', 'Obtenez tous les certificats SSL pour tous les trackers. Ce script est ex&eacute;cut&eacute; &agrave; chaque fois que vous ajoutez un tracker ou que vous modifiez la liste dans le portail MySB.');

//////////////////////
// Price and Payment info
//////////////////////
define('User_UserInfo_Title_Renting', 'Informations location');
// Server model
define('User_UserInfo_Table_SrvModel', 'Mod&egrave;le du serveur');
// Global cost
define('User_UserInfo_Table_GlobalCost', 'Co&ucirc;t global');
// TVA
define('User_UserInfo_Table_TVA', 'TVA');
// Total users
define('User_UserInfo_Table_TotalUsers', 'Nombre d\'utilisateurs');
// TOTAL per users
define('User_UserInfo_Table_TotalPerUser', 'TOTAL par utilisateur');
define('User_UserInfo_Table_TotalPerUser_Plus', ' &euro; TTC / mois');

//#################### LAST LINE ######################################
?>