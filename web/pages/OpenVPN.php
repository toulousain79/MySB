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

global $MySB_DB, $CurrentUser;
require_once(WEB_INC . '/languages/' . $_SESSION['Language'] . '/' . basename(__FILE__));

$zip_file = WEB_ROOT . "/openvpn/openvpn_$CurrentUser.zip";
$RefreshPage = 5;

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

echo '<form id="myForm" class="form_settings" method="post" enctype="multipart/form-data" action=""><div align="center">';
if (file_exists($zip_file)) {
	echo '<input class="submit" style="width:' . strlen(User_OpenVPN_Download)*10 . 'px; margin-bottom: 10px;" name="submit" type="submit" value="' . User_OpenVPN_Download . '">';
} else {
	echo '<input class="submit" style="width:' . strlen(User_OpenVPN_Generate)*10 . 'px; margin-bottom: 10px;" name="submit" type="submit" value="' . User_OpenVPN_Generate . '">';
}

echo '<table>';
echo '<tr align="left"><th colspan="2" scope="row"><h4>' . User_OpenVPN_Title_Global . '</h4></th></tr>';
// Protocol
echo '<tr align="left"><th scope="row">' . User_OpenVPN_Table_Proto . '</th>';
echo '<td>' . $openvpn_proto_db . '</td></tr>';
echo '<td colspan="2"> </td><tr>';
// Config TUN 1 (With Gateway)
echo '<tr align="left"><th colspan="2" scope="row"><h4>' . User_OpenVPN_Title_CongigTUN_1 . '</h4></th></tr>';
echo '<tr align="left"><th scope="row">' . User_OpenVPN_Table_Port . '</th>';
echo '<td>' . $openvpn_port1 . '</td><tr>';
echo '<tr align="left"><th scope="row">' . User_OpenVPN_Table_ServerIP . '</th>';
echo '<td>' . OpenVPN_SrvIpGw . '</td><tr>';
echo '<tr><td colspan="2"><span class="Comments">' . User_OpenVPN_Comment_CongigTUN_1 . '</span></td></tr>';
// Config TUN 2 (Without Gateway)
echo '<tr align="left"><th colspan="2" scope="row"><h4>' . User_OpenVPN_Title_CongigTUN_2 . '</h4></th></tr>';
echo '<tr align="left"><th scope="row">' . User_OpenVPN_Table_Port . '</th>';
echo '<td>' . $openvpn_port2 . '</td><tr>';
echo '<tr align="left"><th scope="row">' . User_OpenVPN_Table_ServerIP . '</th>';
echo '<td>' . OpenVPN_SrvIp . '</td><tr>';
echo '<tr><td colspan="2"><span class="Comments">' . User_OpenVPN_Comment_CongigTUN_2 . '</span></td></tr>';
// Config TAP 1 (Bridged Without Gateway)
echo '<tr align="left"><th colspan="2" scope="row"><h4>' . User_OpenVPN_Title_CongigTAP_1 . '</h4></th></tr>';
echo '<tr align="left"><th scope="row">' . User_OpenVPN_Table_Port . '</th>';
echo '<td>' . $openvpn_port3 . '</td><tr>';
echo '<tr align="left"><th scope="row">' . User_OpenVPN_Table_ServerIP . '</th>';
echo '<td>' . OpenVPN_SrvIpBridge . '</td><tr>';
echo '<tr><td colspan="2"><span class="Comments">' . User_OpenVPN_Comment_CongigTAP_1 . '</span></td></tr>';
echo '</table>';
if (file_exists($zip_file)) {
	echo '<input class="submit" style="width:' . strlen(User_OpenVPN_Download)*10 . 'px; margin-bottom: 10px;" name="submit" type="submit" value="' . User_OpenVPN_Download . '">';
} else {
	echo '<input class="submit" style="width:' . strlen(User_OpenVPN_Generate)*10 . 'px; margin-bottom: 10px;" name="submit" type="submit" value="' . User_OpenVPN_Generate . '">';
}
echo '</div></form>';

if ( isset($_POST['submit']) ) {
	switch ($_POST['submit']) {
		case html_entity_decode(User_OpenVPN_Generate):
			$current_pwd = $_SERVER['PHP_AUTH_PW'];

			GenerateMessage('message_only', 'information', User_OpenVPN_Wait);

			if ( ($CurrentUser != '') && ($current_pwd != '') ) {
				$args = "$CurrentUser|$current_pwd";
				$command = 'OpenVPN';
				$priority = $MySB_DB->max("commands", "priority");
				$priority++;
				$value = $MySB_DB->insert("commands", ["commands" => "$command", "reload" => 1, "priority" => "$priority", "args" => "$args", "user" => "$CurrentUser"]);

				if ( $value > 0 ) {
					exec("sudo /bin/bash ".MYSB_ROOT."/scripts/ApplyConfig.bsh '$CurrentUser' 'DO_APPLY'", $output, $result);

					if ( $result == 0 ) {
						$type = 'success';
						$command = 'message_only';
						$message = sprintf(User_OpenVPN_Success, $RefreshPage);
					} else {
						$type = 'error';
						$message = User_OpenVPN_Failded;
					}
				} else {
					$type = 'error';
					$message = User_OpenVPN_FailedUpdateMysbDB;
				}
			} else {
				$type = 'error';
				$message = User_OpenVPN_NoPassword;
			}

			GenerateMessage($command, $type, $message, $args);

			if ( $type == 'success' ) {
				header("Refresh: $RefreshPage; URL=/?user/openvpn-config-file.html");
			}
			break;

		default:
			if (file_exists($zip_file)) {
				$file_name = basename($zip_file);
				ini_set('zlib.output_compression', 0);
				$date = gmdate(DATE_RFC1123);

				header("Pragma: no-cache");
				header("Expires: 0");
				header("Cache-Control: must-revalidate, pre-check=0, post-check=0, max-age=0, public");
				header("Content-Description: OpenVPN Config File");
				header("Content-type: application/zip");
				if (preg_match('/MSIE 5.5/', $_ENV['HTTP_USER_AGENT']) || preg_match('/MSIE 6.0/', $_ENV['HTTP_USER_AGENT'])) {
					header('Content-Disposition: filename = "'.$file_name.'"');
				} else {
					header('Content-Disposition: attachment; filename = "'.$file_name.'"');
				}
				header('Date: '.$date);
				header('Expires: '.gmdate(DATE_RFC1123, time()+1));
				header('Last-Modified: '.gmdate(DATE_RFC1123, filemtime($zip_file)));
				header("Content-Transfer-Encoding: none");
				header('Content-MD5: '.base64_encode(md5_file($zip_file)));
				ob_end_flush();
				@readfile($zip_file);
			} else {
				$message = sprintf(User_OpenVPN_NoFile, $_SERVER['PHP_AUTH_USER']);
				GenerateMessage('message_only', 'information', $message);
			}
			break;
	}
}

//#################### LAST LINE ######################################
?>