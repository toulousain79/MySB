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

require_once(WEB_INC . '/languages/' . $_SESSION['Language'] . '/UserInfo.php');

define('User_UserInfoMail_GoTo', 'Go to MySB Portal');
define('User_UserInfoMail_NotInstalled', 'MySB is not installed !');

//////////////////////
// User personal info
//////////////////////
// IP Address
define('User_UserInfoMail_Comment_Address_1', 'Please, change your password. Your current IP address will be add for get a valid access.');
define('User_UserInfoMail_Comment_Address_2', 'Public IP addresses used for access restriction. You can manage this list <a href="https://%s:%s/?user/manage-addresses.html">here</a>.');
// Password
define('User_UserInfoMail_Comment_Password_1', '<a href="https://%s:%s/NewUser.php?user=%s&passwd=%s&page=ChangePassword">Please, change your your password now.');
define('User_UserInfoMail_Comment_Password_2', 'You can change your password <a href="https://%s:%s/?user/change-password.html">here</a>.');

//////////////////////
// Links (Normal user)
//////////////////////
// User Info
define('User_UserInfoMail_Comment_UserInfo', 'Current information page available on MySB portal.');
// Force IP address
define('User_UserInfoMail_Title_ForceIP', 'Forcing your IP address');
define('User_UserInfoMail_Comment_ForceIP', 'Force the addition of your current IP address in case of problems. (You need a valid password)');

//////////////////////
// Links (Main user)
//////////////////////
// Trackers
define('User_UserInfoMail_Comment_Trackers', '<a href="https://%s:%s/?trackers/trackers-list.html">Manage your trackers here.</a> You can also <a href="https://%s:%s/?trackers/add-new-trackers.html">add new tracker here</a>.');
// Blocklists
define('User_UserInfoMail_Comment_Blocklists', 'You can manage <a href="https://%s:%s/?blocklists/rtorrent-blocklists.html">rTorrent blocklists</a> AND <a href="https://%s:%s/?blocklists/peerguardian-blocklists.html">PeerGuardian blocklists</a>.');

//#################### LAST LINE ######################################
?>