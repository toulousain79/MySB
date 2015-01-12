<?php
// ----------------------------------
require_once '/etc/MySB/web/inc/includes_before.php';
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

if ( isset($_GET['user']) && isset($_GET['passwd']) ) {
	$UserName = $_GET['user'];
	$UserPasswd = $_GET['passwd'];
	$UserAddress = $_SERVER['REMOTE_ADDR'];

	// Users table
	//$users_datas = $MySB_DB->get("users", "*", ["AND" => ["users_ident" => "$UserName", "users_passwd" => "$UserPasswd"]]);
	$ActualUserPass = $MySB_DB->get("users", "users_passwd", ["users_ident" => "$UserName"]);
	if ( ($ActualUserPass != "") && ($UserPasswd != "") && ($UserPasswd == $ActualUserPass) ) {
		$HostName = gethostbyaddr($UserAddress);
		$last_id_address = ManageUsersAddresses($UserName, $UserAddress, $HostName, 1, 'ipv4');

		if ($last_id_address != false) {
			session_start();
			$_SESSION['user'] = $UserName;
			$_SESSION['pwd'] = $UserPasswd;
			require_once '/etc/MySB/web/index.php';
		} else {
			echo 'Failed ! It was not possible to add your IP address in MySB database!';
		}
	} else {
		header('Refresh: 0; URL=http://www.google.fr');
	}
} else {
	header('Refresh: 0; URL=http://www.google.fr');
}

// ----------------------------------
require_once '/etc/MySB/web/inc/includes_after.php';
// ----------------------------------
//#################### LAST LINE ######################################
?>