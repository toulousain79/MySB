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

// VARs
$Username = $_POST['username'];
$Filename = $_POST['file'];
$Dirname = $_POST['dir'];
$rTorrentNotify = $MySB_DB->get("users", "rtorrent_notify", ["users_ident" => "$Username"]);
$UserMail = $MySB_DB->get("users", "users_email", ["users_ident" => "$Username"]);
$IfownCloud = $MySB_DB->get("services", "is_installed", ["serv_name" => "ownCloud"]);

// Mail notification
if ( ($rTorrentNotify == '1') && (!empty($UserMail)) ) {
	$UserMail = $MySB_DB->get("users", "users_email", ["users_ident" => "$Username"]);
	$Subject = 'MySB - New file';
	$Message = "$Dirname$Filename"."\r\n";
	$Headers  = "From: $UserMail"."\r\n";
	$Headers .= "Reply-To: $UserMail"."\r\n";
	$Headers .= 'MIME-Version: 1.0' . "\r\n";
	$Headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	mail($UserMail, $Subject, $Message, $Headers);
}

// ownCloud files scan
if ( $IfownCloud == '1' ) {
	$MySB_DB->update("system", ["owncloud_cron" => 1], ["id_system" => 1]);
}
?>