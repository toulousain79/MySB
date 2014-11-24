<?php
// ----------------------------------
require_once 'inc/includes_before.php';
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

if ($_SERVER['PHP_AUTH_USER'] == '##MySB_User##') {
	$UserName = $_GET['user'];
} else {
	$UserName = $_SERVER['PHP_AUTH_USER'];
}

function printUser($user) {
	$database = new medoo();
	// Users table
	$users_datas = $database->get("users", "*", ["users_ident" => $_SERVER['PHP_AUTH_USER']]);	
	// System table
	$system_datas = $database->get("system", "*", ["id_system" => 1]);

	echo '<table width="100%" border="0" align="left">';
	echo '<tr align="left"><th colspan="3" scope="row"><h1>' . $user . '</h1></th></tr>';
	
	//////////////////////
	// User personal info
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';
	echo '<tr align="left"><th class="GroupTitle" colspan="3" scope="row">User personal info</th></tr>';		
	echo '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';
	// Username
	echo '<tr align="left"><th width="15%" scope="row">Username</th>';
	echo '<td width="25%">' . $user . '</td>';
	echo '<td></td></tr>';		
	// IP Address
	if ( trim($users_datas["fixed_ip"]) == 'blank' ) {
		$comments = '<a target="_blank" href="https://' . $user . ':##TempPassword##@' . $_SERVER['HTTP_HOST'] . '/ManageIP.php?TempPass=##TempPassword##">Before changing your temporary password, thank you to confirm your IP address HERE!</a>';
		$opts = 'bgcolor="#FF6666"';
	} else {
		$comments = 'Public IP addresses listed here will be allowed to access to all pages located under "/" excepted "/ManageIP.php".';
		$opts = '';
	}		
	echo '<tr align="left"><th width="15%" scope="row">IP Address</th>';
	echo '<td width="25%">' . $users_datas["fixed_ip"] . '</td>';
	echo '<td ' . $opts . '><span class="Comments">' . $comments . '</span></td></tr>';
	// Password
	if ( isset($users_datas["users_passwd"]) ) {
		echo '<tr align="left"><th width="15%" scope="row">Password</th>';
		echo '<td width="25%">' . $users_datas["users_passwd"] . '</td>';
		echo '<td bgcolor="#FF6666"><span class="Comments"><a target="_blank" href="https://' . $user . ':##TempPassword##@' . $_SERVER['HTTP_HOST'] . '/ChangePassword.php?TempPass=##TempPassword##">Please, promptly change your temporary password HERE!</a></span></td></tr>';		
	}	
	// E-mail
	echo '<tr align="left"><th width="15%" scope="row">E-mail</th>';
	echo '<td width="25%">' . $users_datas["users_email"] . '</td>';
	echo '<td></td></tr>';
	// RPC
	echo '<tr align="left"><th width="15%" scope="row">RPC</th>';
	echo '<td width="25%">' . $users_datas["rpc"] . '</td>';
	echo '<td><span class="Comments">RPC value can be used to remotely connect to rTorrent via a smartphone. (see Seedbox-Manager)</span></td></tr>';
	// SFTP
	echo '<tr align="left"><th width="15%" scope="row">SFTP</th>';
	echo '<td width="25%">' . $users_datas["sftp"] . '</td>';
	echo '<td></td></tr>';
	// Sudo
	echo '<tr align="left"><th width="15%" scope="row">Sudo powers</th>';
	echo '<td width="25%">' . $users_datas["sudo"] . '</td>';
	echo '<td></td></tr>';
	
	//////////////////////
	// Directories
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';
	echo '<tr align="left"><th class="GroupTitle" colspan="3" scope="row">Directories</th></tr>';
	echo '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';		
	// Home
	echo '<tr align="left"><th width="15%" scope="row">Home</th>';
	echo '<td width="25%">' . $users_datas["home_dir"] . '</td>';
	echo '<td></td></tr>';
	// Session dir
	echo '<tr align="left"><th width="15%" scope="row">Session dir</th>';
	echo '<td width="25%">' . $users_datas["home_dir"] . '/rtorrent/.session</td>';
	echo '<td><span class="Comments">The session directory allows rTorrent to save the progess of your torrents.</span></td></tr>';
	// Complete dir
	echo '<tr align="left"><th width="15%" scope="row">Complete dir</th>';
	echo '<td width="25%">' . $users_datas["home_dir"] . '/rtorrent/complete</td>';
	echo '<td><span class="Comments">Completed files will be move to this directory via Autotools in ruTorrent.</span></td></tr>';
	// Incomplete dir
	echo '<tr align="left"><th width="15%" scope="row">Incomplete dir</th>';
	echo '<td width="25%">' . $users_datas["home_dir"] . '/rtorrent/incomplete</td>';
	echo '<td><span class="Comments">Partial downloads are stored here.</span></td></tr>';		
	// Torrents dir
	echo '<tr align="left"><th width="15%" scope="row">Torrents dir</th>';
	echo '<td width="25%">' . $users_datas["home_dir"] . '/rtorrent/torrents</td>';
	echo '<td></td></tr>';
	// Watch dir
	echo '<tr align="left"><th width="15%" scope="row">Watch dir</th>';
	echo '<td width="25%">' . $users_datas["home_dir"] . '/rtorrent/watch</td>';
	echo '<td><span class="Comments">Saving a torrent file to this directory will automatically start the download via Autotools in ruTorrent.</span></td></tr>';
	// Share dir
	echo '<tr align="left"><th width="15%" scope="row">Share dir</th>';
	echo '<td width="25%">' . $users_datas["home_dir"] . '/rtorrent/share</td>';
	echo '<td><span class="Comments">The "share" folder is accessible by all users on the server. You can easily share what you want with any user. You can use File Manager plugin available in ruTorrent.</span></td></tr>';
	
	//////////////////////
	// Ports
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';
	echo '<tr align="left"><th class="GroupTitle" colspan="3" scope="row">Ports</th></tr>';
	echo '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';		
	// SFTP Port
	echo '<tr align="left"><th width="15%" scope="row">SFTP port</th>';
	echo '<td width="25%">' . $system_datas["port_ssh"] . '</td>';
	echo '<td></td></tr>';
	// FTPs Port
	echo '<tr align="left"><th width="15%" scope="row">FTPs port (TLS)</th>';
	echo '<td width="25%">' . $system_datas["port_ftp"] . '</td>';
	echo '<td><span class="Comments">It is necessary to configure your FTP client software by specifying this port number. You must select "FTPS" and "explicit TLS connection".</span></td></tr>';		
	// SCGI Port
	echo '<tr align="left"><th width="15%" scope="row">SCGI port</th>';
	echo '<td width="25%">' . $users_datas["scgi_port"] . '</td>';
	echo '<td><span class="Comments">This value is used in conjunction with RPC.</span></td></tr>';
	// rTorrent Port
	echo '<tr align="left"><th width="15%" scope="row">rTorrent port</th>';
	echo '<td width="25%">' . $users_datas["rtorrent_port"] . '</td>';
	echo '<td></td></tr>';
	
	//////////////////////
	// OpenVPN
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';
	echo '<tr align="left"><th class="GroupTitle" colspan="3" scope="row">OpenVPN</th></tr>';
	echo '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';		
	// Server IP GW
	echo '<tr align="left"><th width="15%" scope="row">Server IP GW</th>';
	echo '<td width="25%">10.0.0.1</td>';
	echo '<td><span class="Comments">Server IP with redirect traffic.</span></td></tr>';		
	// Server IP
	echo '<tr align="left"><th width="15%" scope="row">Server IP</th>';
	echo '<td width="25%">10.0.1.1</td>';
	echo '<td><span class="Comments">Server IP without redirect traffic.</span></td></tr>';
	// Samba share
	echo '<tr align="left"><th width="15%" scope="row">Samba share</th>';
	echo '<td width="25%">' . $users_datas["home_dir"] . '</td>';
	echo '<td><span class="Comments">mount - [Destination_directory] -t cifs -o noatime,nodiratime,UNC=//[10.0.0.1|10.0.1.1]/'.$user.',username='.$user.',password=[your_password]</span></td></tr>';		
	// NFS share
	echo '<tr align="left"><th width="15%" scope="row">NFS share</th>';
	echo '<td width="25%">' . $users_datas["home_dir"] . '/rtorrent</td>';
	echo '<td><span class="Comments">mount -t nfs [10.0.0.1|10.0.1.1]:/home/'.$user.'/rtorrent [Destination_directory] -o nocto,noacl,noatime,nodiratime,nolock,rsize=8192,vers=3,ro,udp</span></td></tr>';				

	//////////////////////
	// Links
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';
	echo '<tr align="left"><th class="GroupTitle" colspan="3" scope="row">Links</th></tr>';
	echo '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';		
	// User Info
	$Link = 'https://' . $system_datas["hostname"] . ':' . $system_datas["port_https"] . '/SeedboxInfo.php';
	echo '<tr align="left"><th width="15%" scope="row">User Info</th>';
	echo '<td width="50%"><a target="_blank" href="' . $Link . '">' . $Link . '</a></td>';			
	echo '<td><span class="Comments">Current page.</span></td></tr>';
	// Change password
	$Link = 'https://' . $system_datas["hostname"] . ':' . $system_datas["port_https"] . '/ChangePassword.php';
	echo '<tr align="left"><th width="15%" scope="row">Change password</th>';
	echo '<td width="50%"><a target="_blank" href="' . $Link . '"></a>' . $Link . '</td>';			
	echo '<td><span class="Comments">You can change your password here.</span></td></tr>';
	// Manage IP
	$Link = 'https://' . $system_datas["hostname"] . ':' . $system_datas["port_https"] . '/ManageIP.php';
	echo '<tr align="left"><th width="15%" scope="row">Manage IP</th>';
	echo '<td width="50%"><a target="_blank" href="' . $Link . '"></a>' . $Link . '</td>';			
	echo '<td><span class="Comments">Add here your IPs addresses to add to whitelist.</span></td></tr>';		
	// ruTorrent
	$Link = 'https://' . $system_datas["hostname"] . ':' . $system_datas["port_https"] . '/ru';
	echo '<tr align="left"><th width="15%" scope="row">ruTorrent</th>';
	echo '<td width="50%"><a target="_blank" href="' . $Link . '"></a>' . $Link . '</td>';			
	echo '<td><span class="Comments">ruTorrent interface</span></td></tr>';
	// Seedbox-Manager
	$is_installed = $database->get("services", "is_installed", ["serv_name" => "Seedbox-Manager"]);
	if ( $is_installed == '1' ) {		
		$Link = 'https://' . $system_datas["hostname"] . ':' . $system_datas["port_https"] . '/sm';
		echo '<tr align="left"><th width="15%" scope="row">Seedbox-Manager</th>';
		echo '<td width="50%"><a target="_blank" href="' . $Link . '"></a>' . $Link . '</td>';			
		echo '<td><span class="Comments">Seedbox-Manager interface</span></td></tr>';
	}
	// OpenVPN
	$is_installed = $database->get("services", "is_installed", ["serv_name" => "OpenVPN"]);
	if ( $is_installed == '1' ) {
		// OpenVPN config
		$Link = 'https://' . $system_datas["hostname"] . ':' . $system_datas["port_https"] . '/OpenVPN.php';
		echo '<tr align="left"><th width="15%" scope="row">OpenVPN config</th>';
		echo '<td width="50%"><a target="_blank" href="' . $Link . '"></a>' . $Link . '</td>';			
		echo '<td><span class="Comments">Download here configuration files for OpenVPN.</span></td></tr>';
		// OpenVPN GUI
		$Link = 'https://openvpn.net/index.php/open-source/downloads.html';
		echo '<tr align="left"><th width="15%" scope="row">OpenVPN GUI</th>';
		echo '<td width="50%"><a target="_blank" href="' . $Link . '"></a>' . $Link . '</td>';			
		echo '<td><span class="Comments">Download here GUI for OpenVPN.</span></td></tr>';
	}
	// CakeBox Light
	$CakeboxDatas = $database->get("services", "*", ["serv_name" => "CakeBox-Light"]);
	if ( $CakeboxDatas["is_installed"] == '1' ) {
		$Link = 'https://' . $system_datas["hostname"] . ':' . $CakeboxDatas["ports_tcp"] . '/';
		echo '<tr align="left"><th width="15%" scope="row">CakeBox Light</th>';
		echo '<td width="50%"><a target="_blank" href="' . $Link . '"></a>' . $Link . '</td>';			
		echo '<td><span class="Comments">Play here your media.</span></td></tr>';
	}
	if ( $users_datas["admin"] == '1' ) {
		// Webmin
		$WebminDatas = $database->get("services", "*", ["serv_name" => "Webmin"]);
		if ( $WebminDatas["is_installed"] == '1' ) {
			$Link = 'https://' . $system_datas["hostname"] . ':' . $WebminDatas["ports_tcp"] . '/';
			echo '<tr align="left"><th width="15%" scope="row">Webmin</th>';
			echo '<td width="50%"><a target="_blank" href="' . $Link . '"></a>' . $Link . '</td>';			
			echo '<td><span class="Comments">Interface management for your server.</span></td></tr>';
		}
		// Logs
		$Link = 'https://' . $system_datas["hostname"] . ':' . $system_datas["port_https"] . '/logs/';
		echo '<tr align="left"><th width="15%" scope="row">Logs</th>';
		echo '<td width="50%"><a target="_blank" href="' . $Link . '"></a>' . $Link . '</td>';			
		echo '<td><span class="Comments">You can check logs of MySB install and security.</span></td></tr>';
		// Renting infos
		$Link = 'https://' . $system_datas["hostname"] . ':' . $system_datas["port_https"] . '/RentingInfo.php';
		echo '<tr align="left"><th width="15%" scope="row">Renting infos</th>';
		echo '<td width="50%"><a target="_blank" href="' . $Link . '"></a>' . $Link . '</td>';			
		echo '<td><span class="Comments">Manage your renting informations.</span></td></tr>';
		// Trackers
		$Link = 'https://' . $system_datas["hostname"] . ':' . $system_datas["port_https"] . '/Trackers.php';
		echo '<tr align="left"><th width="15%" scope="row">Trackers list</th>.';
		echo '<td width="50%"><a target="_blank" href="' . $Link . '"></a>' . $Link . '</td>';			
		echo '<td><span class="Comments">Manage your trackers.</span></td></tr>';		
	}

	$RentingDatas = $database->get("renting", "*", ["id_renting" => 1]);
	if ( isset($RentingDatas["global_cost"]) ) {
		//////////////////////
		// Price and Payment info
		//////////////////////
		echo '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';
		echo '<tr align="left"><th class="GroupTitle" colspan="3" scope="row">Price and Payment info</th></tr>';
		echo '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';			
		// Server model
		echo '<tr align="left"><th width="15%" scope="row">Server model</th>';
		echo '<td width="25%">' . $RentingDatas["model"] . '</td>';
		echo '<td></td></tr>';
		// Global cost
		echo '<tr align="left"><th width="15%" scope="row">Global cost</th>';
		echo '<td width="25%">' . $RentingDatas["global_cost"] . '</td>';
		echo '<td></td></tr>';
		// TVA
		echo '<tr align="left"><th width="15%" scope="row">TVA</th>';
		echo '<td width="25%">' . $RentingDatas["tva"] . '</td>';
		echo '<td></td></tr>';
		echo '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';
		// Total users
		echo '<tr align="left"><th width="15%" scope="row">Total users</th>';
		echo '<td width="25%">' . $RentingDatas["nb_users"] . '</td>';
		echo '<td></td></tr>';
		// TOTAL per users
		echo '<tr align="left"><th width="15%" scope="row">TOTAL per users</th>';
		echo '<td width="25%"><b><span class="FontInRed">' . $RentingDatas["price_per_users"] . '</span></b> &euro; TTC / month</td>';
		echo '<td></td></tr>';			
	}
	
	echo '</table>';
}

if ( (CountingUsers() >= 1) && (GetVersion() != "") ) {
	printUser($UserName);
} else {
	echo '<p><h1 class="FontInRed">MySB is not installed !</h1></p>';
}

// -----------------------------------------
require_once 'inc/includes_after.php';
// -----------------------------------------
//#################### LAST LINE ######################################
?>