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

global $MySB_DB, $users_datas, $CurrentUser, $system_datas;
require_once(WEB_INC . '/languages/' . $_SESSION['Language'] . '/' . basename(__FILE__));

$PeerguardianIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "PeerGuardian"]);
$OpenVPNIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "OpenVPN"]);
$DNScryptIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "DNScrypt-proxy"]);
$IsMainUser = (MainUser($CurrentUser)) ? true : false;

// Get values from database
$DNScrypt_db = $system_datas['dnscrypt'];
$pgl_email_stats = $system_datas['pgl_email_stats'];
$pgl_watchdog_email = $system_datas['pgl_watchdog_email'];
$ip_restriction_db = $system_datas['ip_restriction'];
$openvpn_proto_db =  $MySB_DB->get("services", "port_udp1", ["serv_name" => "OpenVPN"]);
switch ($openvpn_proto_db) {
	case '':
		$openvpn_proto_db = 'TCP';
		$openvpn_port1 =  $MySB_DB->get("services", "port_tcp1", ["serv_name" => "OpenVPN"]);
		$openvpn_port2 =  $MySB_DB->get("services", "port_tcp2", ["serv_name" => "OpenVPN"]);
		$openvpn_port3 =  $MySB_DB->get("services", "port_tcp3", ["serv_name" => "OpenVPN"]);
		break;
	default:
		$openvpn_proto_db = 'UDP';
		$openvpn_port1 =  $MySB_DB->get("services", "port_udp1", ["serv_name" => "OpenVPN"]);
		$openvpn_port2 =  $MySB_DB->get("services", "port_udp2", ["serv_name" => "OpenVPN"]);
		$openvpn_port3 =  $MySB_DB->get("services", "port_udp3", ["serv_name" => "OpenVPN"]);
		break;
}

if (isset($_POST['submit'])) {
	$PGL_EmailStats = $_POST['PGL_EmailStats'];
	$PGL_EmailWD = $_POST['PGL_EmailWD'];
	$IP_restriction_post = $_POST['IP_restriction_post'];
	$OpenVPN_Proto_post = $_POST['OpenVPN_Proto_post'];
	$DNScrypt_post = $_POST['DNScrypt_post'];
	$Command = 'Options_System';
	$type = 'success';
	$NoChange = true;

	// 1 - First, we apply new paramaters WITHOUT needed of create again MySB Security rules
	if ($openvpn_proto_db != $OpenVPN_Proto_post) {
		switch ($OpenVPN_Proto) {
			case 'TCP':
				$result = $MySB_DB->update("services", 	["port_tcp1" => $openvpn_port1, "port_tcp2" => $openvpn_port2, "port_tcp3" => $openvpn_port3, "port_udp1" => "", "port_udp2" => "", "port_udp3" => ""], ["serv_name" => "OpenVPN"]);
				break;
			default:
				$result = $MySB_DB->update("services", 	["port_tcp1" => "", "port_tcp2" => "", "port_tcp3" => "", "port_udp1" => $openvpn_port1, "port_udp2" => $openvpn_port2, "port_udp3" => $openvpn_port3], ["serv_name" => "OpenVPN"]);
				break;
		}

		if ( $result == 0 ) {
			$NoChange = false;
		}
	}
	
	// 2 - Second, we apply new paramaters WITH (maybe) needed of create again MySB Security rules
	if ( ($ip_restriction_db != $IP_restriction_post) || ($pgl_email_stats != $PGL_EmailStats) || ($pgl_watchdog_email != $PGL_EmailWD) || ($DNScrypt_db != $DNScrypt_post) ) {
		$result = $MySB_DB->update("system", ["ip_restriction" => "$IP_restriction_post", "pgl_email_stats" => "$PGL_EmailStats", "pgl_watchdog_email" => "$PGL_EmailWD", "dnscrypt" => "$DNScrypt_post"], ["id_system" => 1]);

		if( $result >= 0 ) {
			if ( $ip_restriction_db != $IP_restriction_post ) {
				$Command = 'MySB_SecurityRules';
				$NoChange = false;
			}
			if ( ($pgl_email_stats != $PGL_EmailStats) || ($pgl_watchdog_email != $PGL_EmailWD) || ($DNScrypt_db != $DNScrypt_post) ) {
				$NoChange = false;
			}
			$NoChange = false;
		} else {
			$NoChange = false;
		}
	}

	// Get new values from database
	$pgl_email_stats = $PGL_EmailStats;
	$pgl_watchdog_email = $PGL_EmailWD;
	$ip_restriction_db = $IP_restriction_post;
	$openvpn_proto_db = $OpenVPN_Proto_post;

	if ($NoChange) {
		GenerateMessage('message_only', 'information', Global_NoChange);
	} else {
		GenerateMessage($Command, $type, $message);
	}
}
?>

<form class="form_settings" method="post" action="">
<div align="center" style="margin-top: 10px; margin-bottom: 20px;">	
	<?php if ($PeerguardianIsInstalled == '1') { ?>
	<fieldset>
	<legend><?php echo MainUser_OptionsSystem_Title_PGL; ?></legend>
	<table>
		<tr>
			<td><?php echo MainUser_OptionsSystem_PGL_Stats; ?></td>
			<td>
				<select name="PGL_EmailStats" style="width:80px; height: 28px;">';
				<?php switch ($pgl_email_stats) {
					case '1':
						echo '<option selected="selected" value="1">' .Global_Yes. '</option>';
						echo '<option value="0">' .Global_No. '</option>';
						break;
					default:
						echo '<option value="1">' .Global_Yes. '</option>';
						echo '<option selected="selected" value="0">' .Global_No. '</option>';
						break;
				} ?>
				</select>
			</td>
			<td><?php echo MainUser_OptionsSystem_PGL_Whathdog; ?></td>
			<td>
				<select name="PGL_EmailWD" style="width:80px; height: 28px;">';
				<?php switch ($pgl_watchdog_email) {
					case '1':
						echo '<option selected="selected" value="1">' .Global_Yes. '</option>';
						echo '<option value="0">' .Global_No. '</option>';
						break;
					default:
						echo '<option value="1">' .Global_Yes. '</option>';
						echo '<option selected="selected" value="0">' .Global_No. '</option>';
						break;
				} ?>
				</select>
			</td>
		</tr>
	</table>
	</fieldset>
	<?php } ?>

	<fieldset>
	<legend><?php echo MainUser_OptionsSystem_Title_Iptables; ?></legend>
	<table>
		<tr>
			<td><?php echo MainUser_OptionsSystem_Iptables_Restrict; ?></td>
			<td>
				<select name="IP_restriction_post" style="width:80px; height: 28px;">';
				<?php switch ($ip_restriction_db) {
					case '1':
						echo '<option selected="selected" value="1">' .Global_Yes. '</option>';
						echo '<option value="0">' .Global_No. '</option>';
						break;
					default:
						echo '<option value="1">' .Global_Yes. '</option>';
						echo '<option selected="selected" value="0">' .Global_No. '</option>';
						break;
				} ?>
				</select>
			</td>		
		</tr>
	</table>
	</fieldset>

	<?php if ($OpenVPNIsInstalled == '1') { ?>
	<br />
	<fieldset>
	<legend><?php echo MainUser_OptionsSystem_Title_OpenVPN; ?></legend>
	<table>
		<tr>
			<td><?php echo MainUser_OptionsSystem_OpenVPN_Proto; ?></td>
			<td>
				<select name="OpenVPN_Proto_post" style="width:80px; height: 28px;">';
				<?php switch ($openvpn_proto_db) {
					case 'UDP':
						echo '<option selected="selected" value="UDP">UDP</option>';
						echo '<option value="TCP">TCP</option>';
						break;
					default:
						echo '<option value="UDP">UDP</option>';
						echo '<option selected="selected" value="TCP">TCP</option>';
						break;
				} ?>
				</select>
			</td>
		</tr>
	</table>
	</fieldset>
	<?php } ?>
	
	<?php if ($DNScryptIsInstalled == '1') { ?>
	<fieldset>
	<legend><?php echo MainUser_OptionsSystem_Title_DNScrypt; ?></legend>
	<table>
		<tr>
			<td><?php echo MainUser_OptionsSystem_DNScrypt_Activate; ?></td>
			<td>
				<select name="DNScrypt_post" style="width:80px; height: 28px;">';
				<?php switch ($DNScrypt_db) {
					case '1':
						echo '<option selected="selected" value="1">' . Global_Yes . '</option>';
						echo '<option value="0">' . Global_No . '</option>';
						break;
					default:
						echo '<option value="1">' . Global_Yes . '</option>';
						echo '<option selected="selected" value="0">' . Global_No . '</option>';
						break;
				} ?>
				</select>
			</td>
		</tr>
	</table>
	</fieldset>
	<?php } ?>	

	<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>" />

	</div>
</form>

<?php
//#################### LAST LINE ######################################
?>