<?php
// ----------------------------------
require_once '/etc/MySB/config.php';
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
	$Case = $_GET['case'];
} else {
	$UserName = $_SERVER['PHP_AUTH_USER'];
}

function PrintContent($user, $Case) {
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
	$ownCloudInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "ownCloud"]);
	$RentingDatas = $MySB_DB->get("renting", "*", ["id_renting" => 1]);
	// Users infos
	$IPv4_List = $MySB_DB->select("users_addresses", "ipv4", ["AND" => ["id_users" => "$UserID", "is_active" => 1]]);
	$LastUpdate = $MySB_DB->max("users_addresses", "last_update", ["AND" => ["id_users" => "$UserID", "check_by" => "hostname", "is_active" => 1]]);
	$IPv4Updated = $MySB_DB->get("users_addresses", "ipv4", ["last_update" => "$LastUpdate"]);	
	if ( $IPv4_List != "" ) {
		$User_IPv4 = '';
		foreach($IPv4_List as $IPv4) {
			if ( $IPv4Updated == $IPv4 ) {
				$IPv4 = '<span style="background-color: #00FF00">'.$IPv4.'</span>';
			}
			if ( $User_IPv4 == '' ) {
				$User_IPv4 .= $IPv4;
			} else {
				$User_IPv4 .= ', '.$IPv4;
			}
		}
	} else {
		$User_IPv4 = User_UserInfo_Table_NoIpAddress;
	}

	if ( isSet($users_datas["language"]) ) {
		$Language = $users_datas["language"];
		$_SESSION['Language'] = $Language;
	} else {
		$Language = 'en';
		$_SESSION['Language'] = $Language;
	}
	include_once(WEB_INC . '/languages/' . $Language . '/' . basename(__FILE__));

	if ( $UserPasswd != "" ) {
		$CommentAddress = '<span class="Comments">' . User_UserInfoMail_Comment_Address_1 . '</span>';
		$CommentAddressStyle = 'style="color: #FF6666;"';
		$CommentPassword = sprintf(User_UserInfoMail_Comment_Password_1, $system_datas["hostname"], $Port_HTTPs, $user, $UserPasswd);
		$CommentPasswordStyle = 'style="background-color: #FF6666; text-align=center"';
	} else {
		$CommentAddress = '<span class="Comments">' . sprintf(User_UserInfoMail_Comment_Address_2, $system_datas["hostname"], $Port_HTTPs) . '</span>';
		$CommentAddressStyle = '';
		$CommentPassword = '<span class="Comments">' . sprintf(User_UserInfoMail_Comment_Password_2, $system_datas["hostname"], $Port_HTTPs) . '</span>';
		$CommentPasswordStyle = '';
		$UserPasswd = '*****';
	}
	switch ($users_datas["sftp"]) {
		case '0':
			$sftp = User_UserInfo_NO;
			break;
		default:
			$sftp = User_UserInfo_YES;
			break;
	}
	switch ($users_datas["sudo"]) {
		case '0':
			$sudo = User_UserInfo_NO;
			break;
		default:
			$sudo = User_UserInfo_YES;
			break;
	}

	// Format email for users
	switch ($Case) { // account_created, account_confirmed, upgrade, renting, new_user, ip_updated
		case 'account_created':
			$DisplayGoTo 			= true;
			$DisplayCommand			= false;
			$DisplayUserInfo		= true;
			$DisplayUserInfoDetail 	= true;
			$DisplayLinks 			= true;
			$DisplayRenting			= true;
			if ( $users_datas["admin"] == '1' ) {
				$DisplayGoTo 			= true;
				$DisplayCommand			= true;
				$DisplayUserInfo		= true;
				$DisplayUserInfoDetail 	= true;
				$DisplayLinks 			= true;
				$DisplayRenting			= true;
			}
			break;
		case 'new_user':
			$DisplayGoTo 			= true;
			$DisplayCommand			= false;
			$DisplayUserInfo		= true;
			$DisplayUserInfoDetail 	= false;
			$DisplayLinks 			= false;
			$DisplayRenting			= true;
			break;			
		case 'account_confirmed':
			$DisplayGoTo 			= true;
			$DisplayCommand			= false;
			$DisplayUserInfo		= true;
			$DisplayUserInfoDetail 	= true;
			$DisplayLinks 			= true;
			$DisplayRenting			= true;
			break;
		case 'upgrade':
			$DisplayGoTo 			= true;
			$DisplayCommand			= false;
			$DisplayUserInfo		= true;
			$DisplayUserInfoDetail 	= true;
			$DisplayLinks 			= false;
			$DisplayRenting			= false;
			if ( $users_datas["admin"] == '1' ) {
				$DisplayGoTo 			= true;
				$DisplayCommand			= true;
				$DisplayUserInfo		= true;
				$DisplayUserInfoDetail 	= true;
				$DisplayLinks 			= true;
				$DisplayRenting			= true;
			}
			break;
		case 'renting':
			$DisplayGoTo 			= true;
			$DisplayCommand			= false;
			$DisplayUserInfo		= true;
			$DisplayUserInfoDetail 	= false;
			$DisplayLinks 			= false;
			$DisplayRenting			= true;
			break;
		case 'ip_updated':
			$DisplayGoTo 			= true;
			$DisplayCommand			= false;
			$DisplayUserInfo		= true;
			$DisplayUserInfoDetail 	= false;
			$DisplayLinks 			= false;
			$DisplayRenting			= true;
			break;
		case 'new_version':
			$DisplayGoTo 			= false;
			$DisplayCommand			= false;
			if ( $users_datas["admin"] == '1' ) {
				$DisplayCommand			= true;
			}
			$DisplayUserInfo		= false;
			$DisplayUserInfoDetail 	= false;
			$DisplayLinks 			= false;
			$DisplayRenting			= false;
			break;
	}
?>
	<table width="100%" border="0" align="left">


<?php if ( $DisplayGoTo == true ) { ?>
		<tr><td colspan="3" scope="row"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>"><?php echo User_UserInfoMail_GoTo; ?></a></td></tr>
<?php } ?>

<?php if ( $DisplayUserInfo == true ) { ?>
		<!-- //////////////////////
		// User personal info
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row" id="BorderTopTitle"><h4><?php echo User_UserInfo_Title_PersonnalInfo; ?></h4></th>
		</tr>
		<!-- // Username -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_Username; ?></th>
			<td width="25%"><?php echo $user;?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_Username; ?></span></td>
		</tr>
		<!-- // IP Address -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_IpAddress; ?></th>
			<td><?php echo $User_IPv4;?></td>
			<td <?php echo $CommentAddressStyle;?>><?php echo $CommentAddress;?></td>
		</tr>
		<!-- // Password -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_Password; ?></th>
			<td><?php echo $UserPasswd;?></td>
			<td <?php echo $CommentPasswordStyle;?>><?php echo $CommentPassword;?></td>
		</tr>
		<!-- // E-mail -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_Email; ?></th>
			<td><?php echo $users_datas["users_email"];?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_Email; ?></span></td>
		</tr>
<?php } ?>

<?php if ( $DisplayUserInfoDetail == true ) { ?>
		<!-- // RPC -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_RPC; ?></th>
			<td><?php echo $users_datas["rpc"];?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_RPC; ?></span></td>
		</tr>
		<!-- // SFTP -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_SFTP; ?></th>
			<td><?php echo $sftp;?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_SFTP; ?></span></td>
		</tr>	
		<!-- // Sudo -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_Sudo; ?></th>
			<td><?php echo $sudo;?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_Sudo; ?></span></td>
		</tr>

		<!-- //////////////////////
		// Directories
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row" id="BorderTopTitle"><h4><?php echo User_UserInfo_Title_Directories; ?></h4></th>
		</tr>
		<!-- // Home -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_Home; ?></th>
			<td><?php echo $users_datas["home_dir"];?></td>
			<td> </td>
		</tr>		
		<!-- // Session dir -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_Session; ?></th>
			<td><?php echo $users_datas["home_dir"] . User_UserInfo_Value_Session;?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_Session; ?></span></td>
		</tr>		
		<!-- // Complete dir -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_CompleteDir; ?></th>
			<td><?php echo $users_datas["home_dir"] . User_UserInfo_Value_CompleteDir;?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_CompleteDir; ?></span></td>
		</tr>
		<!-- // Incomplete dir -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_IncompleteDir; ?></th>
			<td><?php echo $users_datas["home_dir"] . User_UserInfo_Value_IncompleteDir;?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_IncompleteDir; ?></span></td>
		</tr>
		<!-- // Torrents dir -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_TorrentDir; ?></th>
			<td><?php echo $users_datas["home_dir"] . User_UserInfo_Value_TorrentDir;?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_TorrentDir; ?></span></td>
		</tr>			
		<!-- // Watch dir -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_WatchDir; ?></th>
			<td><?php echo $users_datas["home_dir"] . User_UserInfo_Value_WatchDir;?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_WatchDir; ?></span></td>
		</tr>
		<!-- // Share dir -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_ShareDir; ?></th>
			<td><?php echo $users_datas["home_dir"] . User_UserInfo_Value_ShareDir;?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_ShareDir; ?></span></td>
		</tr>

		<!-- //////////////////////
		// Ports
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row" id="BorderTopTitle"><h4><?php echo User_UserInfo_Title_Ports; ?></h4></th>
		</tr>
		<!-- // SFTP Port -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_SftpPort; ?></th>
			<td><?php echo $Port_SSH;?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_SftpPort; ?></span></td>
		</tr>
		<!-- // FTPs Port -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_FtpsPort; ?></th>
			<td><?php echo $Port_FTP;?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_FtpsPort; ?></span></td>
		</tr>
		<!-- // SCGI Port -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_ScgiPort; ?></th>
			<td><?php echo $users_datas["scgi_port"];?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_ScgiPort; ?></span></td>
		</tr>
		<!-- // rTorrent Port -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_RtorrentPort; ?></th>
			<td><?php echo $users_datas["rtorrent_port"];?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_RtorrentPort; ?></span></td>
		</tr>

		<!-- //////////////////////
		// OpenVPN
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row" id="BorderTopTitle"><h4><?php echo User_UserInfo_Title_OpenVPN; ?></h4></th>
		</tr>
		<!-- // Server IP GW -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_SrvIpGw; ?></th>
			<td><?php echo OpenVPN_SrvIpGw; ?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_SrvIpGw; ?></span></td>
		</tr>
		<!-- // Server IP -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_SrvIp; ?></th>
			<td><?php echo OpenVPN_SrvIp; ?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_SrvIp; ?></span></td>
		</tr>
		<!-- // Server IP bridged -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_SrvIpBridge; ?></th>
			<td><?php echo OpenVPN_SrvIpBridge; ?></td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_SrvIpBridge; ?></span></td>
		</tr>		
		<!-- // Samba share -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_SambaShare; ?></th>
			<td><?php echo $users_datas["home_dir"];?></td>
			<td><span class="Comments"><?php echo sprintf(User_UserInfo_Comment_SambaShare, $user, $user); ?></span></td>
		</tr>
		<!-- // NFS share -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_NfsShare; ?></th>
			<td><?php echo $users_datas["home_dir"] . User_UserInfo_Value_NfsShare;?></td>
			<td><span class="Comments"><?php echo sprintf(User_UserInfo_Comment_NfsShare, $user, $user); ?></span></td>
		</tr>
<?php } ?>


		<!-- //////////////////////
		// Links (Normal user)
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row" id="BorderTopTitle"><h4><?php echo User_UserInfo_Title_LinkNormal; ?></h4></th>
		</tr>
		
		
<?php if ( $DisplayLinks == true ) { ?>
		<!-- // User Info -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Title_UserInfo; ?></th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?user/user-infos.html"><span class="Comments"><?php echo User_UserInfoMail_Comment_UserInfo; ?></span></a></td>
		</tr>
		<!-- // Change password -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Title_ChangePass; ?></th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?user/change-password.html"><span class="Comments"><?php echo User_UserInfo_Comment_ChangePass; ?></span></a></td>
		</tr>
		<!-- // Manage Addresses -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Title_ManageAddresses; ?></th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?user/manage-addresses.html"><span class="Comments"><?php echo User_UserInfo_Comment_ManageAddresses; ?></span></a></td>
		</tr>

		<!-- // ruTorrent -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Title_ruTorrent; ?></th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/ru"><span class="Comments"><?php echo User_UserInfo_Comment_ruTorrent; ?></span></a></td>
		</tr>
		<!-- // Seedbox-Manager -->
	<?php if ( $ManagerInstalled == '1' ) { ?>
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Title_Manager; ?></th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/sm"><span class="Comments"><?php echo User_UserInfo_Comment_Manager; ?></span></a></td>
		</tr>
	<?php } ?>

	<?php if ( $OpenVpnInstalled == '1' ) { ?>
		<!-- // OpenVPN -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Title_OpenVpnConfig; ?></th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?user/openvpn-config-file.html"><span class="Comments"><?php echo User_UserInfo_Comment_OpenVpnConfig; ?></span></a></td>
		</tr>
		<!-- // OpenVPN GUI -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Title_OpenVpnGui; ?></th>
			<td colspan="2"><a target="_blank" href="<?php echo User_UserInfo_Value_OpenVpnGui; ?>"><span class="Comments"><?php echo User_UserInfo_Comment_OpenVpnGui; ?></span></a></td>
		</tr>
	<?php } ?>

	<?php if ( $CakeboxDatas["is_installed"] == '1' ) { ?>
		<!-- // CakeBox Light -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Title_Cakebox; ?></th>
			<td colspan="2"><a target="_blank" href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/cb/"><span class="Comments"><?php echo User_UserInfo_Comment_Cakebox; ?></span></a></td>
		</tr>
	<?php } ?>
		<!-- // ownCloud -->
	<?php if ( $ownCloudInstalled == '1' ) { ?>
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Title_ownCloud; ?></th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/owncloud"><span class="Comments"><?php echo User_UserInfo_Comment_ownCloud; ?></span></a></td>
		</tr>
	<?php } ?>	

<?php } // $DisplayLinks ?>


		<!-- // Force IP address -->
		<tr align="left">
			<th width="15%" scope="row" style="color: #FF6666;" id="BorderTopTitle"><?php echo User_UserInfoMail_Title_ForceIP; ?></th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/ForceAddress.php?page=ManageAddresses"><span class="Comments"><?php echo User_UserInfoMail_Comment_ForceIP; ?></span></a></td>
		</tr>
	
	<?php if ( $users_datas["admin"] == '1' ) { ?>

		<!-- //////////////////////
		// Links (Main user)
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row" id="BorderTopTitle"><h4><?php echo User_UserInfo_Title_LinkMain; ?></h4></th>
		</tr>
		<!-- // Webmin -->		
		<?php if ( $WebminDatas["is_installed"] == '1' ) { ?>
			<tr align="left">
				<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_Webmin; ?></th>
				<td colspan="2"><a target="_blank" href="https://<?php echo $system_datas["hostname"];?>:<?php echo $WebminDatas["port_tcp1"];?>"><span class="Comments"><?php echo User_UserInfo_Comment_Webmin; ?></span></a></td>
			</tr>
		<?php } ?>
		<!-- // Logs -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_Logs; ?></th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?main-user/logs.html"><span class="Comments"><?php echo User_UserInfo_Comment_Logs; ?></span></a></td>
		</tr>
		<!-- // Renting infos -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_Renting; ?></th>
			<td colspan="2"><a href="https://<?php echo $system_datas["hostname"];?>:<?php echo $Port_HTTPs;?>/?main-user/renting-infos.html"><span class="Comments"><?php echo User_UserInfo_Comment_Renting; ?></span></a></td>
		</tr>
		<!-- // Trackers -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_Trackers; ?></th>
			<td colspan="2"><span class="Comments"><?php echo sprintf(User_UserInfoMail_Comment_Trackers, $system_datas["hostname"], $Port_HTTPs, $system_datas["hostname"], $Port_HTTPs); ?></span></td>
		</tr>
		<!-- // Blocklists -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_Blocklists; ?></th>
			<td colspan="2"><span class="Comments"><?php echo User_UserInfoMail_Comment_Blocklists; ?></span></td>
		</tr>
		<?php if ( $DNScryptDatas["is_installed"] == '1' ) { ?>
			<!-- // DNScrypt-proxy -->
			<tr align="left">
				<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_DNScrypt; ?></th>
				<td colspan="2"><span class="Comments"><?php echo User_UserInfo_Comment_DNScrypt; ?></span></td>
			</tr>
		<?php } ?>
	
	<?php } ?>

	<?php if ( $DisplayCommand == true ) { ?>
		<!-- //////////////////////
		// SSH commands available
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row" id="BorderTopTitle"><h4><?php echo User_UserInfo_Title_SSHcommand; ?></h4></th>
		</tr>
		<!-- // Users Management -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_UserManage; ?></th>
			<td width="25%">MySB_CreateUser</td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_MySB_CreateUser; ?></span></td>
		</tr>
		<tr align="left">
			<th width="15%" scope="row"> </th>
			<td width="25%">MySB_ChangeUserPassword</td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_MySB_ChangeUserPassword; ?></span></td>
		</tr>
		<tr align="left">
			<th width="15%" scope="row"> </th>
			<td width="25%">MySB_DeleteUser</td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_MySB_DeleteUser; ?></span></td>
		</tr>
		<!-- // SeedBox Management -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_SeedboxManage; ?></th>
			<td width="25%">MySB_RefreshMe</td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_MySB_RefreshMe; ?></span></td>
		</tr>
		<tr align="left">
			<th width="15%" scope="row"> </th>
			<td width="25%">MySB_UpgradeSystem</td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_MySB_UpgradeSystem; ?></span></td>
		</tr>
		<tr align="left">
			<th width="15%" scope="row"> </th>
			<td width="25%">MySB_SecurityRules</td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_MySB_SecurityRules; ?></span></td>
		</tr>
		<!-- // MySB Management -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle">MySB Management</th>
			<td width="25%">MySB_GitHubRepoUpdate</td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_MySB_GitHubRepoUpdate; ?></span></td>
		</tr>
		<tr align="left">
			<th width="15%" scope="row"> </th>
			<td width="25%">MySB_UpgradeMe</td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_MySB_UpgradeMe; ?></span></td>
		</tr>
		<!-- // Main scripts -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_MainScript; ?></th>
			<td width="25%"><?php echo MYSB_ROOT;?>/scripts/BlocklistsRTorrent.bsh</td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_BlocklistsRTorrent; ?></span></td>
		</tr>
		<tr align="left">
			<th width="15%" scope="row"> </th>
			<td width="25%"><?php echo MYSB_ROOT;?>/scripts/GetTrackersCert.bsh</td>
			<td><span class="Comments"><?php echo User_UserInfo_Comment_GetTrackersCert; ?></span></td>
		</tr>
<?php } ?>
	
	<?php if ( !empty($RentingDatas["global_cost"]) && !empty($RentingDatas["model"]) ) { ?>
		<!-- //////////////////////
		// Price and Payment info
		////////////////////// -->
		<tr align="left">
			<th colspan="3" scope="row" id="BorderTopTitle"><h4><?php echo User_UserInfo_Title_Renting; ?></h4></th>
		</tr>
		<!-- // Server model -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_SrvModel; ?></th>
			<td><?php echo $RentingDatas["model"];?></td>
			<td> </td>
		</tr>
		<!-- // Global cost -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_GlobalCost; ?></th>
			<td><?php echo $RentingDatas["global_cost"];?></td>
			<td> </td>
		</tr>
		<!-- // TVA -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_TVA; ?></th>
			<td><?php echo $RentingDatas["tva"];?></td>
			<td> </td>
		</tr>
		<!-- // Total users -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_TotalUsers; ?></th>
			<td><?php echo $RentingDatas["nb_users"];?></td>
			<td> </td>
		</tr>		
		<!-- // TOTAL per users -->
		<tr align="left">
			<th width="15%" scope="row" id="BorderTopTitle"><?php echo User_UserInfo_Table_TotalPerUser; ?></th>
			<td><b><span class="FontInRed"><?php echo $RentingDatas["price_per_users"];?></span></b><?php echo User_UserInfo_Table_TotalPerUser_Plus; ?></td>
			<td> </td>
		</tr>		
	<?php } ?>
	
	</table>
	
<?php	
}

if ( (CountingUsers() >= 1) && (GetVersion() != "") ) {
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
			<head>
				<title>MySB</title>
				<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
				<style type="text/css">
					table {
						font: 100% helvetica,arial,verdana,sans;
						margin: 0px 0 5px 0;
						background:#3b3b3b;
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
					#BorderTopTitle {
						border-top:solid 2px #E5E5DB;
					}					
				</style>
			</head>
			<body>';
	PrintContent($UserName, $Case);
	echo '</body></html>';
} else {
	echo '<p><h1 class="FontInRed">' . User_UserInfoMail_NotInstalled . '</h1></p>';
}

// ----------------------------------
require_once WEB_INC . '/includes_after.php';
// ----------------------------------
//#################### LAST LINE ######################################
?>