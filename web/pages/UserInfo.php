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

require_once(WEB_INC . '/languages/' . $_SESSION['Language'] . '/' . basename(__FILE__));

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
	echo '<tr align="left"><th colspan="3" scope="row"><h4>' . User_UserInfo_Title_PersonnalInfo . '</h4></th></tr>';
	// Username
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_Username . '</th>';
	echo '<td width="25%">' . $user . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_Username . '</a>.</span></td>';
	// IP Address
	$IPv4_List = $MySB_DB->select("users_addresses", "ipv4", ["AND" => ["id_users" => "$UserID", "is_active" => 1]]);
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_IpAddress . '</th>';
	if ( $IPv4_List != "" ) {
		echo '<td><select style="cursor: pointer;">';
		foreach($IPv4_List as $IPv4) {
			echo '<option>' .$IPv4. '</option>';
		}
		echo '</select></td>';
	} else {
		echo '<td>' . User_UserInfo_Table_NoIpAddress . '</td>';
	}
	echo '<td><span class="Comments">' . User_UserInfo_Comment_IpAddress . '</span></td>';
	echo '</tr>';
	// Password
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_Password . '</th>';
	if ( ($UserPasswd != "") && ($users_datas["admin"] != '1') ) {
		echo '<td>' . $UserPasswd . '</td>';
		echo '<td  style="background-color: #FF6666; text-align: center;">';
		echo '<span class="Comments">' . User_UserInfo_Comment_Password_1 . '</span>';
		echo '</td>';
	} else {
		echo '<td>*****</td>';
		echo '<td><span class="Comments">' . User_UserInfo_Comment_Password_2 . '</span></td>';
	}
	echo '</tr>';
	// E-mail
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_Email . '</th>';
	echo '<td>' . $users_datas["users_email"] . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_Email . '</span></td></tr>';
	// RPC
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_RPC . '</th>';
	echo '<td>' . $users_datas["rpc"] . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_RPC . '</span></td></tr>';
	// SFTP
	switch ($users_datas["sftp"]) {
		case '0':
			$sftp = User_UserInfo_NO;
			break;
		default:
			$sftp = User_UserInfo_YES;
			break;
	}
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_SFTP . '</th>';
	echo '<td>' . $sftp . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_SFTP . '</span></td></tr>';

	//////////////////////
	// Directories
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><h4>' . User_UserInfo_Title_Directories . '</h4></th></tr>';
	// Session dir
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_Session . '</th>';
	echo '<td>' . $users_datas["home_dir"] . User_UserInfo_Value_Session . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_Session . '</span></td></tr>';
	// Complete dir
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_CompleteDir . '</th>';
	echo '<td>' . $users_datas["home_dir"] . User_UserInfo_Value_CompleteDir . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_CompleteDir . '</span></td></tr>';
	// Incomplete dir
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_IncompleteDir . '</th>';
	echo '<td>' . $users_datas["home_dir"] . User_UserInfo_Value_IncompleteDir . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_IncompleteDir . '</span></td></tr>';
	// Torrents dir
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_TorrentDir . '</th>';
	echo '<td>' . $users_datas["home_dir"] . User_UserInfo_Value_TorrentDir . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_TorrentDir . '</span></td></tr>';
	// Watch dir
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_WatchDir . '</th>';
	echo '<td>' . $users_datas["home_dir"] . User_UserInfo_Value_WatchDir . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_WatchDir . '</span></td></tr>';
	// Share dir
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_ShareDir . '</th>';
	echo '<td>' . $users_datas["home_dir"] . User_UserInfo_Value_ShareDir . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_ShareDir . '</span></td></tr>';

	//////////////////////
	// Ports
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><h4>' . User_UserInfo_Title_Ports . '</h4></th></tr>';
	// sFTP Port
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_SftpPort . '</th>';
	echo '<td>' . $Port_SSH . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_SftpPort . '</span></td></tr>';
	// FTPs Port
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_FtpsPort . '</th>';
	echo '<td>' . $Port_FTP . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_FtpsPort . '</span></td></tr>';
	// SCGI Port
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_ScgiPort . '</th>';
	echo '<td>' . $users_datas["scgi_port"] . '</td>';
	echo '<td><span class="Comments"' . User_UserInfo_Comment_ScgiPort . '</span></td></tr>';
	// rTorrent Port
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_RtorrentPort . '</th>';
	echo '<td>' . $users_datas["rtorrent_port"] . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_RtorrentPort . '</span></td></tr>';

	//////////////////////
	// OpenVPN
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><h4>' . User_UserInfo_Title_OpenVPN . '</h4></th></tr>';
	// Server IP GW
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_SrvIpGw . '</th>';
	echo '<td>' . OpenVPN_SrvIpGw . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_SrvIpGw . '</span></td></tr>';
	// Server IP
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_SrvIp . '</th>';
	echo '<td>' . OpenVPN_SrvIp . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_SrvIp . '</span></td></tr>';
	// Server IP bridged
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_SrvIpBridge . '</th>';
	echo '<td>' . OpenVPN_SrvIpBridge . '</td>';
	echo '<td><span class="Comments">' . User_UserInfo_Comment_SrvIpBridge . '</span></td></tr>';
	// Samba share
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_SambaShare . '</th>';
	echo '<td>' . $users_datas["home_dir"] . '</td>';
	echo '<td><span class="Comments">' . sprintf(User_UserInfo_Comment_SambaShare, $user, $user) . '</span></td></tr>';
	// NFS share
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_NfsShare . '</th>';
	echo '<td>' . $users_datas["home_dir"] . User_UserInfo_Value_NfsShare . '</td>';
	echo '<td><span class="Comments">' . sprintf(User_UserInfo_Comment_NfsShare, $user, $user) . '</span></td></tr>';

	//////////////////////
	// Links (Normal user)
	//////////////////////
	echo '<tr align="left"><th colspan="3" scope="row"><h4>' . User_UserInfo_Title_LinkNormal . '</h4></th></tr>';
	// Change password
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Title_ChangePass . '</th>';
	echo '<td colspan="2"><a href="?user/change-password.html"><span class="Comments">' . User_UserInfo_Comment_ChangePass . '</span></a></td></tr>';
	// Manage Addresses
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Title_ManageAddresses . '</th>';
	echo '<td colspan="2"><a href="?user/manage-addresses.html"><span class="Comments">' . User_UserInfo_Comment_ManageAddresses . '</span></a></td></tr>';
	// ruTorrent
	$Link = 'https://' . $system_datas["hostname"] . ':' . $Port_HTTPs . '/ru';
	echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Title_ruTorrent . '</th>';
	echo '<td colspan="2"><a target="_blank" href="' . $Link . '"><span class="Comments">' . User_UserInfo_Comment_ruTorrent . '</span></a></td></tr>';
	// Seedbox-Manager
	$is_installed = $MySB_DB->get("services", "is_installed", ["serv_name" => "Seedbox-Manager"]);
	if ( $is_installed == '1' ) {
		$Link = 'https://' . $system_datas["hostname"] . ':' . $Port_HTTPs . '/sm';
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Title_Manager . '</th>';
		echo '<td colspan="2"><a target="_blank" href="' . $Link . '"><span class="Comments">' . User_UserInfo_Comment_Manager . '</span></a></td></tr>';
	}
	// OpenVPN
	$is_installed = $MySB_DB->get("services", "is_installed", ["serv_name" => "OpenVPN"]);
	if ( $is_installed == '1' ) {
		// OpenVPN config
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Title_OpenVpnConfig . '</th>';
		echo '<td colspan="2"><a href="?user/openvpn-config-file.html"><span class="Comments">' . User_UserInfo_Comment_OpenVpnConfig . '</span></a></td></tr>';
		// OpenVPN GUI
		$Link = User_UserInfo_Value_OpenVpnGui;
		echo '<tr align="left"><th width="17%" scope="row"' . User_UserInfo_Title_OpenVpnGui . '</th>';
		echo '<td colspan="2"><a target="_blank" href="' . $Link . '"><span class="Comments">' . User_UserInfo_Comment_OpenVpnGui . '</span></a></td></tr>';
	}
	// CakeBox Light
	$CakeboxDatas = $MySB_DB->get("services", ["is_installed"], ["serv_name" => "CakeBox-Light"]);
	if ( $CakeboxDatas["is_installed"] == '1' ) {
		$Link = 'https://' . $system_datas["hostname"] . ':' . $Port_HTTPs . '/cb';
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Title_Cakebox . '</th>';
		echo '<td colspan="2"><a target="_blank" href="' . $Link . '"><span class="Comments">' . User_UserInfo_Comment_Cakebox . '</span></a></td></tr>';
	}
	// ownCloud
	$is_installed = $MySB_DB->get("services", "is_installed", ["serv_name" => "ownCloud"]);
	if ( $is_installed == '1' ) {
		$Link = 'https://' . $system_datas["hostname"] . ':' . $Port_HTTPs . '/owncloud';
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Title_ownCloud . '</th>';
		echo '<td colspan="2"><a target="_blank" href="' . $Link . '"><span class="Comments">' . User_UserInfo_Comment_ownCloud . '</span></a></td></tr>';
	}	

	//////////////////////
	// Links (Main user)
	//////////////////////
	if ( $users_datas["admin"] == '1' ) {
		echo '<tr align="left"><th colspan="3" scope="row"><h4>' . User_UserInfo_Title_LinkMain . '</h4></th></tr>';
		// Webmin
		$WebminDatas = $MySB_DB->get("services", ["is_installed", "port_tcp1"], ["serv_name" => "Webmin"]);
		if ( $WebminDatas["is_installed"] == '1' ) {
			$Link = 'https://' . $system_datas["hostname"] . ':' . $WebminDatas["port_tcp1"] . '/';
			echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_Webmin . '</th>';
			echo '<td colspan="2"><a target="_blank" href="' . $Link . '"><span class="Comments">' . User_UserInfo_Comment_Webmin . '</span></a></td></tr>';
		}
		// Logs
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_Logs . '</th>';
		echo '<td colspan="2"><a href="?main-user/logs.html"><span class="Comments">' . User_UserInfo_Comment_Logs . '</span></a></td></tr>';
		// Renting infos
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_Renting . '</th>';
		echo '<td colspan="2"><a href="?main-user/renting-infos.html"><span class="Comments">' . User_UserInfo_Comment_Renting . '</span></a></td></tr>';
		// Trackers
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_Trackers . '</th>';
		echo '<td colspan="2"><span class="Comments">' . sprintf(User_UserInfo_Comment_Trackers, $system_datas["hostname"], $Port_HTTPs, $system_datas["hostname"], $Port_HTTPs) . '</span></td></tr>';
		// Blocklists
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_Blocklists . '</th>';
		echo '<td colspan="2"><span class="Comments">' . User_UserInfo_Comment_Blocklists . '</span></td></tr>';
		// DNScrypt-proxy
		$DNScryptDatas = $MySB_DB->get("services", ["is_installed"], ["serv_name" => "DNScrypt-proxy"]);
		if ( $DNScryptDatas["is_installed"] == '1' ) {
			echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_DNScrypt . '</th>';
			echo '<td colspan="2"><a href="?main-user/dnscrypt-proxy.html"><span class="Comments">' . User_UserInfo_Comment_DNScrypt . '</span></a></td></tr>';
		}
	}

	//////////////////////
	// SSH commands available
	//////////////////////
	if ( $users_datas["admin"] == '1' ) {
		echo '<tr align="left"><th colspan="3" scope="row"><h4>' . User_UserInfo_Title_SSHcommand . '</h4></th></tr>';
		// Users Management
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_UserManage . '</th>';
		echo '<td>MySB_CreateUser</td>';
		echo '<td><span class="Comments">' . User_UserInfo_Comment_MySB_CreateUser . '</span></td></tr>';
		echo '<tr align="left"><th width="17%" scope="row"> </th>';
		echo '<td>MySB_ChangeUserPassword</td>';
		echo '<td><span class="Comments">' . User_UserInfo_Comment_MySB_ChangeUserPassword . '</span></td></tr>';
		echo '<tr align="left"><th width="17%" scope="row"> </th>';
		echo '<td>MySB_DeleteUser</td>';
		echo '<td><span class="Comments">' . User_UserInfo_Comment_MySB_DeleteUser . '</span></td></tr>';
		// SeedBox Management
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_SeedboxManage . '</th>';
		echo '<td>MySB_RefreshMe</td>';
		echo '<td><span class="Comments">' . User_UserInfo_Comment_MySB_RefreshMe . '</span></td></tr>';
		echo '<tr align="left"><th width="17%" scope="row"> </th>';
		echo '<td>MySB_UpgradeMe</td>';
		echo '<td><span class="Comments">' . User_UserInfo_Comment_MySB_UpgradeMe . '</span></td></tr>';
		echo '<tr align="left"><th width="17%" scope="row"> </th>';		
		echo '<td>MySB_UpgradeSystem</td>';
		echo '<td><span class="Comments">' . User_UserInfo_Comment_MySB_UpgradeSystem . '</span></td></tr>';
		echo '<tr align="left"><th width="17%" scope="row"> </th>';
		echo '<td>MySB_GitHubRepoUpdate</td>';
		echo '<td><span class="Comments">' . User_UserInfo_Comment_MySB_GitHubRepoUpdate . '</span></td></tr>';
		echo '<tr align="left"><th width="17%" scope="row"> </th>';
		echo '<td>MySB_SecurityRules</td>';
		echo '<td><span class="Comments">' . User_UserInfo_Comment_MySB_SecurityRules . '</span></td></tr>';
		// Main scripts
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_MainScript . '</th>';
		echo '<td>'.MYSB_ROOT.'/scripts/BlocklistsRTorrent.bsh</td>';
		echo '<td><span class="Comments">' . User_UserInfo_Comment_BlocklistsRTorrent . '</span></td></tr>';
		echo '<tr align="left"><th width="17%" scope="row"> </th>';
		echo '<td>'.MYSB_ROOT.'/scripts/GetTrackersCert.bsh</td>';
		echo '<td><span class="Comments">' . User_UserInfo_Comment_GetTrackersCert . '</span></td></tr>';
	}

	$RentingDatas = $MySB_DB->get("renting", "*", ["id_renting" => 1]);
	if ( !empty($RentingDatas["global_cost"]) && !empty($RentingDatas["model"]) ) {
		//////////////////////
		// Price and Payment info
		//////////////////////
		echo '<tr align="left"><th colspan="3" scope="row"><h4>' . User_UserInfo_Title_Renting . '</h4></th></tr>';
		// Server model
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_SrvModel . '</th>';
		echo '<td>' . $RentingDatas["model"] . '</td>';
		echo '<td></td></tr>';
		// Global cost
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_GlobalCost . '</th>';
		echo '<td>' . $RentingDatas["global_cost"] . '</td>';
		echo '<td></td></tr>';
		// TVA
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_TVA . '</th>';
		echo '<td>' . $RentingDatas["tva"] . '</td>';
		echo '<td></td></tr>';
		// Total users
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_TotalUsers . '</th>';
		echo '<td>' . $RentingDatas["nb_users"] . '</td>';
		echo '<td></td></tr>';
		// TOTAL per users
		echo '<tr align="left"><th width="17%" scope="row">' . User_UserInfo_Table_TotalPerUser . '</th>';
		echo '<td><b><span class="FontInRed">' . $RentingDatas["price_per_users"] . '</span></b>' . User_UserInfo_Table_TotalPerUser_Plus . '</td>';
		echo '<td></td></tr>';
	}

	echo '</table>';
}

if ( (CountingUsers() >= 1) && (GetVersion() != "") ) {
	printUser($_SERVER['PHP_AUTH_USER']);
} else {
	echo '<p><h1 class="FontInRed">' . User_UserInfo_NotInstalled . '</h1></p>';
}

//#################### LAST LINE ######################################
