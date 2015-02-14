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

function printUser($user) {
	global $MySB_DB, $system_datas, $users_datas, $Port_HTTPs;

	// Users infos	
	$UserID = $users_datas["id_users"];
	$UserPasswd = $users_datas["users_passwd"];	
	// Ports
	$Port_SSH = $MySB_DB->get("services", "port_tcp1", ["serv_name" => "SSH"]);
	$Port_FTP = $MySB_DB->get("services", "port_tcp1", ["serv_name" => "VSFTPd"]);

	echo '<table width="100%" border="0" align="left">';

	//////////////////////
	// User personal info
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><h4>User personal info</h4></th></tr>';
	// Username
	echo '<tr align="left"><th width="17%" scope="row">Username</th>';
	echo '<td width="25%">' . $user . '</td>';
	echo '<td> </td></tr>';
	// IP Address
	$IPv4_List = $MySB_DB->select("users_addresses", "ipv4", ["AND" => ["id_users" => "$UserID", "is_active" => 1]]);
	echo '<tr align="left"><th width="17%" scope="row">IP Address</th>';
	if ( $IPv4_List != "" ) {
		echo '<td><select style="cursor: pointer;">';
		foreach($IPv4_List as $IPv4) {
			echo '<option>' .$IPv4. '</option>';
		}
		echo '</select></td>';
	} else {
		echo '<td>No address given ...</td>';
	}
	echo '<td><span class="Comments">Public IP addresses used for access restriction. You can manage this list <a href="/?user/manage-addresses.html">here</a>.</span></td>';
	echo '</tr>';
	// Password
	echo '<tr align="left"><th width="17%" scope="row">Password</th>';
	if ( ($UserPasswd != "") && ($users_datas["admin"] != '1') ) {
		echo '<td>' . $UserPasswd . '</td>';
		echo '<td  style="background-color: #FF6666; text-align: center;">';
		echo '<span class="Comments"><a href="?user/change-password.html">You must change your password now !</a></span>';
		echo '</td>';
	} else {
		echo '<td>*****</td>';
		echo '<td><span class="Comments">You can change your password <a href="?user/change-password.html">here</a>.</span></td>';
	}
	echo '</tr>';
	// E-mail
	echo '<tr align="left"><th width="17%" scope="row">E-mail</th>';
	echo '<td>' . $users_datas["users_email"] . '</td>';
	echo '<td> </td></tr>';
	// RPC
	echo '<tr align="left"><th width="17%" scope="row">RPC</th>';
	echo '<td>' . $users_datas["rpc"] . '</td>';
	echo '<td><span class="Comments">RPC value can be used to remotely connect to rTorrent via a smartphone. (see Seedbox-Manager)</span></td></tr>';	
	// SFTP
	switch ($users_datas["sftp"]) {
		case '0':
			$sftp = 'NO';
			break;
		default:
			$sftp = 'YES';
			break;
	}
	echo '<tr align="left"><th width="17%" scope="row">SFTP</th>';
	echo '<td>' . $sftp . '</td>';
	echo '<td> </td></tr>';
	// Sudo
	switch ($users_datas["sudo"]) {
		case '0':
			$sudo = 'NO';
			break;
		default:
			$sudo = 'YES';
			break;
	}
	echo '<tr align="left"><th width="17%" scope="row">Sudo powers</th>';
	echo '<td>' . $sudo . '</td>';
	echo '<td> </td></tr>';

	//////////////////////
	// Directories
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><h4>Directories</h4></th></tr>';
	// Home
	echo '<tr align="left"><th width="17%" scope="row">Home</th>';
	echo '<td>' . $users_datas["home_dir"] . '</td>';
	echo '<td> </td></tr>';
	// Session dir
	echo '<tr align="left"><th width="17%" scope="row">Session dir</th>';
	echo '<td>' . $users_datas["home_dir"] . '/rtorrent/.session</td>';
	echo '<td><span class="Comments">The session directory allows rTorrent to save the progess of your torrents.</span></td></tr>';
	// Complete dir
	echo '<tr align="left"><th width="17%" scope="row">Complete dir</th>';
	echo '<td>' . $users_datas["home_dir"] . '/rtorrent/complete</td>';
	echo '<td><span class="Comments">Completed files will be move to this directory via Autotools in ruTorrent.</span></td></tr>';
	// Incomplete dir
	echo '<tr align="left"><th width="17%" scope="row">Incomplete dir</th>';
	echo '<td>' . $users_datas["home_dir"] . '/rtorrent/incomplete</td>';
	echo '<td><span class="Comments">Partial downloads are stored here.</span></td></tr>';		
	// Torrents dir
	echo '<tr align="left"><th width="17%" scope="row">Torrents dir</th>';
	echo '<td>' . $users_datas["home_dir"] . '/rtorrent/torrents</td>';
	echo '<td> </td></tr>';
	// Watch dir
	echo '<tr align="left"><th width="17%" scope="row">Watch dir</th>';
	echo '<td>' . $users_datas["home_dir"] . '/rtorrent/watch</td>';
	echo '<td><span class="Comments">Saving a torrent file to this directory will automatically start the download via Autotools in ruTorrent.</span></td></tr>';
	// Share dir
	echo '<tr align="left"><th width="17%" scope="row">Share dir</th>';
	echo '<td>' . $users_datas["home_dir"] . '/rtorrent/share</td>';
	echo '<td><span class="Comments">The "share" folder is accessible by all users on the server. You can easily share what you want with any user. You can use File Manager plugin available in ruTorrent.</span></td></tr>';

	//////////////////////
	// Ports
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><h4>Ports</h4></th></tr>';
	// SFTP Port
	echo '<tr align="left"><th width="17%" scope="row">SFTP port</th>';
	echo '<td>' . $Port_SSH . '</td>';
	echo '<td> </td></tr>';
	// FTPs Port
	echo '<tr align="left"><th width="17%" scope="row">FTPs port (TLS)</th>';
	echo '<td>' . $Port_FTP . '</td>';
	echo '<td><span class="Comments">It is necessary to configure your FTP client software by specifying this port number. You must select "FTPS" and "explicit TLS connection".</span></td></tr>';		
	// SCGI Port
	echo '<tr align="left"><th width="17%" scope="row">SCGI port</th>';
	echo '<td>' . $users_datas["scgi_port"] . '</td>';
	echo '<td><span class="Comments">This value is used in conjunction with RPC.</span></td></tr>';
	// rTorrent Port
	echo '<tr align="left"><th width="17%" scope="row">rTorrent port</th>';
	echo '<td>' . $users_datas["rtorrent_port"] . '</td>';
	echo '<td><span class="Comments">Is the network port for your rTorrent session.</span></td></tr>';

	//////////////////////
	// OpenVPN
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><h4>OpenVPN</h4></th></tr>';
	// Server IP GW
	echo '<tr align="left"><th width="17%" scope="row">Server IP GW</th>';
	echo '<td>10.0.0.1</td>';
	echo '<td><span class="Comments">Server IP with redirect traffic (TUN interface).</span></td></tr>';
	// Server IP
	echo '<tr align="left"><th width="17%" scope="row">Server IP</th>';
	echo '<td>10.0.1.1</td>';
	echo '<td><span class="Comments">Server IP without redirect traffic (TUN interface).</span></td></tr>';
	// Server IP bridged
	echo '<tr align="left"><th width="17%" scope="row">Server IP bridged</th>';
	echo '<td>10.0.2.1</td>';
	echo '<td><span class="Comments">Server IP without redirect traffic (TAP interface).</span></td></tr>';
	// Samba share
	echo '<tr align="left"><th width="17%" scope="row">Samba share</th>';
	echo '<td>' . $users_datas["home_dir"] . '/rtorrent</td>';
	echo '<td><span class="Comments">mount - [Destination_directory] -t cifs -o noatime,nodiratime,UNC=//[10.0.x.1]/'.$user.',username='.$user.',password=[your_password]</span></td></tr>';		
	// NFS share
	echo '<tr align="left"><th width="17%" scope="row">NFS share</th>';
	echo '<td>' . $users_datas["home_dir"] . '/rtorrent</td>';
	echo '<td><span class="Comments">mount -t nfs [10.0.x.1]:/home/'.$user.'/rtorrent [Destination_directory] [-o vers=3,nolock]</span></td></tr>';				

	//////////////////////
	// Links (Normal user)
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><h4>Links (Normal user)</h4></th></tr>';
	// User Info
	echo '<tr align="left"><th width="17%" scope="row">User Info</th>';
	echo '<td colspan="2"><a href="?user/user-infos.html"><span class="Comments">Current information page.</span></a></td></tr>';
	// Change password
	echo '<tr align="left"><th width="17%" scope="row">Change password</th>';
	echo '<td colspan="2"><a href="?user/change-password.html"><span class="Comments">You can change your password here.</span></a></td></tr>';
	// Manage Addresses
	echo '<tr align="left"><th width="17%" scope="row">Manage Addresses</th>';
	echo '<td colspan="2"><a href="?user/manage-addresses.html"><span class="Comments">Add here your IPs addresses and/or your dynamic DNS to add to whitelist.</span></a></td></tr>';		
	// ruTorrent
	$Link = 'https://' . $system_datas["hostname"] . ':' . $Port_HTTPs . '/ru';
	echo '<tr align="left"><th width="17%" scope="row">ruTorrent</th>';	
	echo '<td colspan="2"><a target="_blank" href="' . $Link . '"><span class="Comments">ruTorrent interface</span></a></td></tr>';
	// Seedbox-Manager
	$is_installed = $MySB_DB->get("services", "is_installed", ["serv_name" => "Seedbox-Manager"]);
	if ( $is_installed == '1' ) {
		$Link = 'https://' . $system_datas["hostname"] . ':' . $Port_HTTPs . '/sm';
		echo '<tr align="left"><th width="17%" scope="row">Seedbox-Manager</th>';
		echo '<td colspan="2"><a target="_blank" href="' . $Link . '"><span class="Comments">Seedbox-Manager interface</span></a></td></tr>';
	}
	// OpenVPN
	$is_installed = $MySB_DB->get("services", "is_installed", ["serv_name" => "OpenVPN"]);
	if ( $is_installed == '1' ) {
		// OpenVPN config
		echo '<tr align="left"><th width="17%" scope="row">OpenVPN config</th>';		
		echo '<td colspan="2"><a href="?user/openvpn-config-file.html"><span class="Comments">Download here configuration files for OpenVPN.</span></a></td></tr>';
		// OpenVPN GUI
		$Link = 'https://openvpn.net/index.php/open-source/downloads.html';
		echo '<tr align="left"><th width="17%" scope="row">OpenVPN GUI</th>';
		echo '<td colspan="2"><a target="_blank" href="' . $Link . '"><span class="Comments">Download here GUI for OpenVPN.</span></a></td></tr>';
	}
	// CakeBox Light
	$CakeboxDatas = $MySB_DB->get("services", ["is_installed", "port_tcp1"], ["serv_name" => "CakeBox-Light"]);
	if ( $CakeboxDatas["is_installed"] == '1' ) {
		$Link = 'http://' . $system_datas["hostname"] . ':' . $CakeboxDatas["port_tcp1"] . '/';
		echo '<tr align="left"><th width="17%" scope="row">CakeBox Light</th>';			
		echo '<td colspan="2"><a target="_blank" href="' . $Link . '"><span class="Comments">Play here your media.</span></a></td></tr>';
	}

	//////////////////////
	// Links (Main user)
	//////////////////////
	if ( $users_datas["admin"] == '1' ) {
		echo '<tr align="left"><th colspan="3" scope="row"><h4>Links (Main user)</h4></th></tr>';
		// Webmin
		$WebminDatas = $MySB_DB->get("services", ["is_installed", "port_tcp1"], ["serv_name" => "Webmin"]);
		if ( $WebminDatas["is_installed"] == '1' ) {
			$Link = 'https://' . $system_datas["hostname"] . ':' . $WebminDatas["port_tcp1"] . '/';
			echo '<tr align="left"><th width="17%" scope="row">Webmin</th>';
			echo '<td colspan="2"><a target="_blank" href="' . $Link . '"><span class="Comments">Admin interface for manage your server.</span></a></td></tr>';
		}
		// Logs
		echo '<tr align="left"><th width="17%" scope="row">Logs</th>';
		echo '<td colspan="2"><a href="?main-user/logs.html"><span class="Comments">You can check logs of MySB install and security.</span></a></td></tr>';
		// Renting infos
		echo '<tr align="left"><th width="17%" scope="row">Renting infos</th>';
		echo '<td colspan="2"><a href="?main-user/renting-infos.html"><span class="Comments">Manage your renting informations.</span></a></td></tr>';
		// Trackers
		echo '<tr align="left"><th width="17%" scope="row">Trackers list</th>';
		echo '<td colspan="2"><span class="Comments"><a href="?trackers/trackers-list.html">Manage your trackers here.</a> You can also <a href="?trackers/add-new-trackers.html">add new tracker here</a>.</span></td></tr>';
		// Blocklists
		echo '<tr align="left"><th width="17%" scope="row">Blocklists</th>';
		echo '<td colspan="2"><span class="Comments">You can manage <a href="?blocklists/rtorrent-blocklists.html">rTorrent blocklists</a> AND <a href="?blocklists/peerguardian-blocklists.html">PeerGuardian blocklists</a>.</span></td></tr>';			
		// DNScrypt-proxy
		$DNScryptDatas = $MySB_DB->get("services", ["is_installed"], ["serv_name" => "DNScrypt-proxy"]);
		if ( $DNScryptDatas["is_installed"] == '1' ) {
			echo '<tr align="left"><th width="17%" scope="row">DNScrypt-proxy</th>';
			echo '<td colspan="2"><a href="?main-user/dnscrypt-proxy.html"><span class="Comments">Select your resolver here.</span></a></td></tr>';
		}
	}

	//////////////////////
	// SSH commands available
	//////////////////////
	if ( $users_datas["admin"] == '1' ) {
		echo '<tr align="left"><th colspan="3" scope="row"><h4>SSH commands available</h4></th></tr>';
		// Users Management
		echo '<tr align="left"><th width="17%" scope="row">Users Management</th>';
		echo '<td>MySB_CreateUser</td>';
		echo '<td> </td></tr>';
		echo '<tr align="left"><th width="17%" scope="row"> </th>';
		echo '<td>MySB_ChangeUserPassword</td>';
		echo '<td><span class="Comments"><pre>MySB_ChangeUserPassword <username> <new_password></pre></span></td></tr>';
		echo '<tr align="left"><th width="17%" scope="row"> </th>';
		echo '<td>MySB_DeleteUser</td>';
		echo '<td> </td></tr>';
		// SeedBox Management
		echo '<tr align="left"><th width="17%" scope="row">SeedBox Management</th>';
		echo '<td>MySB_RefreshMe</td>';
		echo '<td><span class="Comments"><pre>MySB_RefreshMe (rutorrent|manager|cakebox|loadavg|all)</pre></span></td></tr>';
		echo '<tr align="left"><th width="17%" scope="row"> </th>';
		echo '<td>MySB_UpgradeSystem</td>';
		echo '<td><span class="Comments">Performs an update + upgrade + update-ca-certificates</span></td></tr>';
		echo '<tr align="left"><th width="17%" scope="row"> </th>';
		echo '<td>MySB_GitHubRepoUpdate</td>';
		echo '<td><span class="Comments">Updates the repository of the current version of MySB. (CRON every 2 days)</span></td></tr>';		
		echo '<tr align="left"><th width="17%" scope="row"> </th>';
		echo '<td>MySB_SecurityRules</td>';
		echo '<td><span class="Comments"><pre>MySB_SecurityRules (new|clean)</pre></span></td></tr>';
		// Main scripts
		echo '<tr align="left"><th width="17%" scope="row">Main scripts</th>';
		echo '<td>'.$MySB_InstallDir.'/scripts/BlocklistsRTorrent.bsh</td>';
		echo '<td><span class="Comments">Use this for generate rTorrent blocklist. (CRON every day)</span></td></tr>';
		echo '<tr align="left"><th width="17%" scope="row"> </th>';
		echo '<td>'.$MySB_InstallDir.'/scripts/GetTrackersCert.bsh</td>';
		echo '<td><span class="Comments">Get all SSL certificates for all trackers. This script is start every time you add/edit trackers list in MySB portal.</span></td></tr>';
	}

	$RentingDatas = $MySB_DB->get("renting", "*", ["id_renting" => 1]);
	if ( isset($RentingDatas["global_cost"]) ) {
		//////////////////////
		// Price and Payment info
		//////////////////////
		echo '<tr align="left"><th colspan="3" scope="row"><h4>Price and Payment info</h4></th></tr>';
		// Server model
		echo '<tr align="left"><th width="17%" scope="row">Server model</th>';
		echo '<td>' . $RentingDatas["model"] . '</td>';
		echo '<td></td></tr>';
		// Global cost
		echo '<tr align="left"><th width="17%" scope="row">Global cost</th>';
		echo '<td>' . $RentingDatas["global_cost"] . '</td>';
		echo '<td></td></tr>';
		// TVA
		echo '<tr align="left"><th width="17%" scope="row">TVA</th>';
		echo '<td>' . $RentingDatas["tva"] . '</td>';
		echo '<td></td></tr>';
		// Total users
		echo '<tr align="left"><th width="17%" scope="row">Total users</th>';
		echo '<td>' . $RentingDatas["nb_users"] . '</td>';
		echo '<td></td></tr>';
		// TOTAL per users
		echo '<tr align="left"><th width="17%" scope="row">TOTAL per users</th>';
		echo '<td><b><span class="FontInRed">' . $RentingDatas["price_per_users"] . '</span></b> &euro; TTC / month</td>';
		echo '<td></td></tr>';
	}

	echo '</table>';
}

if ( (CountingUsers() >= 1) && (GetVersion() != "") ) {
	printUser($_SERVER['PHP_AUTH_USER']);
} else {
	echo '<p><h1 class="FontInRed">MySB is not installed !</h1></p>';
}

//#################### LAST LINE ######################################
?>