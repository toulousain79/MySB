<?php
// ----------------------------------
require_once  '/etc/MySB/web/inc/includes_before.php';
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
	global $MySB_DB, $system_datas, $Port_HTTPs;

	// Users table
	$users_datas = $MySB_DB->get("users", "*", ["users_ident" => "$user"]);
	$UserID = $users_datas["id_users"];
	$UserPasswd = $users_datas["users_passwd"];
	// Ports
	$Port_SSH = $MySB_DB->get("services", "port_tcp1", ["serv_name" => "SSH"]);
	$Port_FTP = $MySB_DB->get("services", "port_tcp1", ["serv_name" => "VSFTPd"]);
	// Services
	$ManagerInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "Seedbox-Manager"]);
	$OpenVpnInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "OpenVPN"]);
	$CakeboxDatas = $MySB_DB->get("services", ["is_installed", "port_tcp1"], ["serv_name" => "CakeBox-Light"]);
	$DNScryptDatas = $MySB_DB->get("services", ["is_installed"], ["serv_name" => "DNScrypt-proxy"]);
	$WebminDatas = $MySB_DB->get("services", ["is_installed", "port_tcp1"], ["serv_name" => "Webmin"]);
	$RentingDatas = $MySB_DB->get("renting", "*", ["id_renting" => 1]);
	// Users infos
	$IPv4_List = $MySB_DB->select("users_addresses", "ipv4", ["AND" => ["id_users" => "$UserID", "is_active" => 1]]);
	if ( $IPv4_List != "" ) {
		$User_IPv4 = '';
		foreach($IPv4_List as $IPv4) {
			if ( $User_IPv4 == '' ) {
				$User_IPv4 .= $IPv4;
			} else {
				$User_IPv4 .= ', '.$IPv4;
			}
		}
	} else {
		$User_IPv4 = 'No address given ...';
	}
	
	if ( $UserPasswd != "" ) {
		$CommentAddress = 'Please, change your password. Your current IP address will be add for get a valid access.';
		$CommentAddressStyle = 'style="background-color: #FF6666; text-align=center"';
		$CommentPassword = '<a href="https://' . $system_datas["hostname"] . ':' . $Port_HTTPs . '/NewUser.php?var1=' . $user . '&var2=' . $UserPasswd . '">You must change your password now !</a>';;
		$CommentPasswordStyle = 'style="background-color: #FF6666; text-align=center"';
	} else {
		$CommentAddress = '<span class="Comments">Public IP addresses used for access restriction. You can manage this list <a href="https://' . $system_datas["hostname"] . ':' . $Port_HTTPs . '?user/manage-addresses.html">here</a>.</span>';
		$CommentAddressStyle = '';
		$CommentPassword = '<span class="Comments">You can change your password <a href="https://' . $system_datas["hostname"] . ':' . $Port_HTTPs . '?user/change-password.html">here</a>.</span>';
		$CommentPasswordStyle = '';
		$UserPasswd = '*****';
	}
	switch ($users_datas["sftp"]) {
		case '0':
			$sftp = 'NO';
			break;
		default:
			$sftp = 'YES';
			break;
	}
	switch ($users_datas["sudo"]) {
		case '0':
			$sudo = 'NO';
			break;
		default:
			$sudo = 'YES';
			break;
	}
?>
	<table width="100%" border="0" align="left">
		<tr><td colspan="3" scope="row"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>">Go to MySB Portal</a></td></tr>

		<!-- //////////////////////
		// User personal info
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row"><h4>User personal info</h4></th>
		</tr>
		<!-- // Username -->
		<tr align="left">
			<th width="15%" scope="row">Username</th>
			<td width="25%"><?php echo $user;?></td>
			<td> </td>
		</tr>
		<!-- // IP Address -->
		<tr align="left">
			<th width="15%" scope="row">IP Address</th>
			<td><?php echo $User_IPv4;?></td>
			<td <?php echo $CommentAddressStyle;?>><?php echo $CommentAddress;?></td>
		</tr>
		<!-- // Password -->
		<tr align="left">
			<th width="15%" scope="row">Password</th>
			<td><?php echo $UserPasswd;?></td>
			<td <?php echo $CommentPasswordStyle;?>><?php echo $CommentPassword;?></td>
		</tr>
		<!-- // E-mail -->
		<tr align="left">
			<th width="15%" scope="row">E-mail</th>
			<td><?php echo $users_datas["users_email"];?></td>
			<td> </td>
		</tr>
		<!-- // RPC -->
		<tr align="left">
			<th width="15%" scope="row">RPC</th>
			<td><?php echo $users_datas["rpc"];?></td>
			<td><span class="Comments">RPC value can be used to remotely connect to rTorrent via a smartphone. (see Seedbox-Manager)</span></td>		
		</tr>
		<!-- // SFTP -->
		<tr align="left">
			<th width="15%" scope="row">SFTP</th>
			<td><?php echo $sftp;?></td>
			<td> </td>
		</tr>	
		<!-- // Sudo -->
		<tr align="left">
			<th width="15%" scope="row">Sudo powers</th>
			<td><?php echo $sudo;?></td>
			<td> </td>
		</tr>

		<!-- //////////////////////
		// Directories
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row"><h4>Directories</h4></th>
		</tr>
		<!-- // Home -->
		<tr align="left">
			<th width="15%" scope="row">Home</th>
			<td><?php echo $users_datas["home_dir"];?></td>
			<td> </td>
		</tr>		
		<!-- // Session dir -->
		<tr align="left">
			<th width="15%" scope="row">Session dir</th>
			<td><?php echo $users_datas["home_dir"];?>/rtorrent/.session</td>
			<td><span class="Comments">The session directory allows rTorrent to save the progess of your torrents.</span></td>
		</tr>		
		<!-- // Complete dir -->
		<tr align="left">
			<th width="15%" scope="row">Complete dir</th>
			<td><?php echo $users_datas["home_dir"];?>/rtorrent/complete</td>
			<td><span class="Comments">Completed files will be move to this directory via Autotools in ruTorrent.</span></td>
		</tr>
		<!-- // Incomplete dir -->
		<tr align="left">
			<th width="15%" scope="row">Incomplete dir</th>
			<td><?php echo $users_datas["home_dir"];?>/rtorrent/incomplete</td>
			<td><span class="Comments">Partial downloads are stored here.</span></td>
		</tr>
		<!-- // Torrents dir -->
		<tr align="left">
			<th width="15%" scope="row">Torrents dir</th>
			<td><?php echo $users_datas["home_dir"];?>/rtorrent/torrents</td>
			<td> </td>
		</tr>			
		<!-- // Watch dir -->
		<tr align="left">
			<th width="15%" scope="row">Watch dir</th>
			<td><?php echo $users_datas["home_dir"];?>/rtorrent/watch</td>
			<td><span class="Comments">Saving a torrent file to this directory will automatically start the download via Autotools in ruTorrent.</span></td>
		</tr>
		<!-- // Share dir -->
		<tr align="left">
			<th width="15%" scope="row">Share dir</th>
			<td><?php echo $users_datas["home_dir"];?>/rtorrent/share</td>
			<td><span class="Comments">The "share" folder is accessible by all users on the server. You can easily share what you want with any user. You can use File Manager plugin available in ruTorrent.</span></td>
		</tr>

		<!-- //////////////////////
		// Ports
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row"><h4>Ports</h4></th>
		</tr>
		<!-- // SFTP Port -->
		<tr align="left">
			<th width="15%" scope="row">SFTP port</th>
			<td><?php echo $Port_SSH;?></td>
			<td> </td>
		</tr>
		<!-- // FTPs Port -->
		<tr align="left">
			<th width="15%" scope="row">FTPs port (TLS)</th>
			<td><?php echo $Port_FTP;?></td>
			<td><span class="Comments">It is necessary to configure your FTP client software by specifying this port number. You must select "FTPS" and "explicit TLS connection".</span></td>
		</tr>
		<!-- // SCGI Port -->
		<tr align="left">
			<th width="15%" scope="row">SCGI port</th>
			<td><?php echo $users_datas["scgi_port"];?></td>
			<td><span class="Comments">This value is used in conjunction with RPC.</span></td>
		</tr>
		<!-- // rTorrent Port -->
		<tr align="left">
			<th width="15%" scope="row">rTorrent port</th>
			<td><?php echo $users_datas["rtorrent_port"];?></td>
			<td> </td>
		</tr>

		<!-- //////////////////////
		// OpenVPN
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row"><h4>OpenVPN</h4></th>
		</tr>
		<!-- // Server IP GW -->
		<tr align="left">
			<th width="15%" scope="row">Server IP GW</th>
			<td>10.0.0.1</td>
			<td><span class="Comments">Server IP with redirect traffic.</span></td>
		</tr>
		<!-- // Server IP -->
		<tr align="left">
			<th width="15%" scope="row">Server IP</th>
			<td>10.0.1.1</td>
			<td><span class="Comments">Server IP without redirect traffic.</span></td>
		</tr>
		<!-- // Samba share -->
		<tr align="left">
			<th width="15%" scope="row">Samba share</th>
			<td><?php echo $users_datas["home_dir"];?>/rtorrent</td>
			<td><span class="Comments">mount - [Destination_directory] -t cifs -o noatime,nodiratime,UNC=//[10.0.0.1|10.0.1.1]/<?php echo $user;?>,username=<?php echo $user;?>,password=[your_password]</span></td>
		</tr>
		<!-- // NFS share -->
		<tr align="left">
			<th width="15%" scope="row">NFS share</th>
			<td><?php echo $users_datas["home_dir"];?>/rtorrent</td>
			<td><span class="Comments">mount -t nfs [10.0.0.1|10.0.1.1]:/home/'.$user.'/rtorrent [Destination_directory] [-o vers=3,ro]</span></td>
		</tr>		

		<!-- //////////////////////
		// Links (Normal user)
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row"><h4>Links (Normal user)</h4></th>
		</tr>
		<!-- // User Info -->
		<tr align="left">
			<th width="15%" scope="row">User Info</th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?user/user-infos.html"><span class="Comments">Current information page avaible on MySB portal.</span></a></td>
		</tr>
		<!-- // Change password -->
		<tr align="left">
			<th width="15%" scope="row">Change password</th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?user/change-password.html"><span class="Comments">You can change your password here.</span></a></td>
		</tr>	
		<!-- // Manage Addresses -->
		<tr align="left">
			<th width="15%" scope="row">Manage Addresses</th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?user/manage-addresses.html"><span class="Comments">Add here your IPs addresses and/or your dynamic DNS to add to whitelist.</span></a></td>
		</tr>
		
		<!-- // Erase password and addresses -->
		<tr align="left">
			<th width="15%" scope="row" style="color: #FF6666;">Force IP addresse</th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/NewUser.php?var1=<?php echo $user;?>&var2=erase"><span class="Comments">Force the addition of your current IP address in case of problems.</span></a></td>
		</tr>		
		
		<!-- // ruTorrent -->
		<tr align="left">
			<th width="15%" scope="row">ruTorrent</th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/ru"><span class="Comments">ruTorrent interface</span></a></td>
		</tr>
		<!-- // Seedbox-Manager -->
<?php
if ( $ManagerInstalled == '1' ) {
?>		
		<tr align="left">
			<th width="15%" scope="row">Seedbox-Manager</th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/sm"><span class="Comments">Seedbox-Manager interface</span></a></td>
		</tr>		
<?php
}

if ( $OpenVpnInstalled == '1' ) {
?>		
		<!-- // OpenVPN -->
		<tr align="left">
			<th width="15%" scope="row">OpenVPN config</th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?user/openvpn-config-file.html"><span class="Comments">Download here configuration files for OpenVPN.</span></a></td>
		</tr>
		<!-- // OpenVPN GUI -->
		<tr align="left">
			<th width="15%" scope="row">OpenVPN GUI</th>
			<td colspan="2"><a target="_blank" href="https://openvpn.net/index.php/open-source/downloads.html"><span class="Comments">Download here GUI for OpenVPN.</span></a></td>
		</tr>
<?php
}

if ( $CakeboxDatas["is_installed"] == '1' ) {
?>
		<!-- // CakeBox Light -->
		<tr align="left">
			<th width="15%" scope="row">CakeBox Light</th>
			<td colspan="2"><a target="_blank" href="http://<?php echo $system_datas["hostname"];?>:<?php echo $CakeboxDatas["port_tcp1"];?>"><span class="Comments">Play here your media.</span></a></td>
		</tr>
<?php
}

	if ( $users_datas["admin"] == '1' ) {
		
?>

		<!-- //////////////////////
		// Links (Main user)
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row"><h4>Links (Main user)</h4></th>
		</tr>
		<!-- // Webmin -->
		
<?php
		if ( $WebminDatas["is_installed"] == '1' ) {
?>
			<tr align="left">
				<th width="15%" scope="row">Webmin</th>
				<td colspan="2"><a target="_blank" href="https://<?php echo $system_datas["hostname"];?>:<?php echo $WebminDatas["port_tcp1"];?>"><span class="Comments">Admin interface for manage your server.</span></a></td>
			</tr>
<?php
		}
?>
		<!-- // Logs -->
		<tr align="left">
			<th width="15%" scope="row">Logs</th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?main-user/logs.html"><span class="Comments">You can check logs of MySB install and security.</span></a></td>
		</tr>
		<!-- // Renting infos -->
		<tr align="left">
			<th width="15%" scope="row">Renting infos</th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?main-user/renting-infos.html"><span class="Comments">Manage your renting informations.</span></a></td>
		</tr>
		<!-- // Trackers -->
		<tr align="left">
			<th width="15%" scope="row">Trackers list</th>
			<td colspan="2"><span class="Comments"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?trackers/trackers-list.html">Manage your trackers here.</a> You can also <a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?trackers/add-new-trackers.html">add new tracker here</a>.</span></td>
		</tr>		
		<!-- // Blocklists -->
		<tr align="left">
			<th width="15%" scope="row">Blocklists</th>
			<td colspan="2"><span class="Comments">You can manage <a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?blocklists/rtorrent-blocklists.html">rTorrent blocklists</a> AND <a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?blocklists/peerguardian-blocklists.html">PeerGuardian blocklists</a>.</span></td>
		</tr>
<?php
		if ( $DNScryptDatas["is_installed"] == '1' ) {
?>		
			<!-- // DNScrypt-proxy -->
			<tr align="left">
				<th width="15%" scope="row">DNScrypt-proxy</th>
				<td colspan="2"><span class="Comments">You can manage <a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?main-user/dnscrypt-proxy.html">Select your resolver here.</a></span></td>
			</tr>
<?php
		}
	}
	
	if ( isset($RentingDatas["global_cost"]) ) {
?>
		<!-- //////////////////////
		// Price and Payment info
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row"><h4>Price and Payment info</h4></th>
		</tr>
		<!-- // Server model -->
		<tr align="left">
			<th width="15%" scope="row">Server model</th>
			<td><?php echo $RentingDatas["model"];?></td>
			<td> </td>
		</tr>
		<!-- // Global cost -->
		<tr align="left">
			<th width="15%" scope="row">Global cost</th>
			<td><?php echo $RentingDatas["global_cost"];?></td>
			<td> </td>
		</tr>
		<!-- // TVA -->
		<tr align="left">
			<th width="15%" scope="row">TVA</th>
			<td><?php echo $RentingDatas["tva"];?></td>
			<td> </td>
		</tr>
		<!-- // Total users -->
		<tr align="left">
			<th width="15%" scope="row">Total users</th>
			<td><?php echo $RentingDatas["nb_users"];?></td>
			<td> </td>
		</tr>		
		<!-- // TOTAL per users -->
		<tr align="left">
			<th width="15%" scope="row">TOTAL per users</th>
			<td><b><span class="FontInRed"><?php echo $RentingDatas["price_per_users"];?></span></b> &euro; TTC / month</td>
			<td> </td>
		</tr>		
<?php
	}
?>
	</table>
<?php	
}

if ( (CountingUsers() >= 1) && (GetVersion() != "") ) {
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
			<head>
				<title>MySB</title>
				<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
				<style type="text/css" >
					table {
						font: 100% helvetica,arial,verdana,sans;
						margin: 0px 0 5px 0;
					}
					table tr th, table tr td {
					  background: #3B3B3B;
					  color: #FFF;
					  padding: 7px 4px;
					  text-align: left;
					}
					table tr td { 
					  background: #E5E5DB;
					  color: #47433F;
					  border-top: 1px solid #FFF;
					}
					.Comments {
						font-size: 90%;
						font-style: italic;
					}				
					h4 {
						color: #09D4FF;
					}
				</style>
			</head>
			<body>';
	printUser($UserName);
	echo '</body></html>';
} else {
	echo '<p><h1 class="FontInRed">MySB is not installed !</h1></p>';
}

// ----------------------------------
require_once  '/etc/MySB/web/inc/includes_after.php';
// ----------------------------------
//#################### LAST LINE ######################################
?>