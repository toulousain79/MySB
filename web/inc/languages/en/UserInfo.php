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

define('User_UserInfo_YES', 'YES');
define('User_UserInfo_NO', 'NO');

// Username
define('User_UserInfo_Title_PersonnalInfo', 'User personal info');
define('User_UserInfo_Table_Username', 'Username');

// IP Address
define('User_UserInfo_Table_IpAddress', 'IP Address');
define('User_UserInfo_Table_NoIpAddress', 'No address given ...');
define('User_UserInfo_Comment_IpAddress', 'Public IP addresses used for access restriction. You can manage this list <a href="/?user/manage-addresses.html">here</a>.');

// Password
define('User_UserInfo_Table_Password', 'Password');
define('User_UserInfo_Comment_Password_1', '<a href="?user/change-password.html">You must change your password now !</a>');
define('User_UserInfo_Comment_Password_2', 'You can change your password <a href="?user/change-password.html">here</a>.');

// E-mail
define('User_UserInfo_Table_Email', 'E-mail');

// RPC
define('User_UserInfo_Table_RPC', 'RPC');
define('User_UserInfo_Comment_RPC', 'RPC value can be used to remotely connect to rTorrent via a smartphone. (see Seedbox-Manager)');

// SFTP
define('User_UserInfo_Table_SFTP', 'SFTP');

// Sudo
define('User_UserInfo_Table_Sudo', 'Sudo powers');

//#################### LAST LINE ######################################
?>