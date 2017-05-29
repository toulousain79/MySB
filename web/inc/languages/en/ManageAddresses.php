<?php
// ---------------------------
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

define('User_ManageAddresses_TitleAdd', 'Add your allowed addresses here');
define('User_ManageAddresses_TextAddress', 'Address <i>(IP or Dynamic DNS)</i>:');
define('User_ManageAddresses_Btn_AddNewLine', 'Add new line');
define('User_ManageAddresses_Btn_RemoveLastLine', 'Remove last line');
define('User_ManageAddresses_InfoAddAddresses', 'If you have a <b>dynamic IP address</b>, you must enter a hostname (No-IP, DynDNS, ...).<br />If you have a <b>fixed IP address</b>, you can enter it directly, or enter a hostname. In this case, it is advisable to directly enter your IP.');
define('User_ManageAddresses_Btn_AddAddress', 'Add my addresses now !');
define('User_ManageAddresses_Table_IPv4', 'IPv4');
define('User_ManageAddresses_Table_Hostname', 'Hostname');
define('User_ManageAddresses_Table_CheckBy', 'Check by');
define('User_ManageAddresses_InfoBottom', '<b>NB</b>: Dynamic IP addresses are checked every <b>5</b> minutes.<br />If an IP has changed, the database will be updated and security will be adapted accordingly.');
define('User_ManageAddresses_NotValidIp', 'The host name does not return a valid IP address.');
define('User_ManageAddresses_HostnameUpdateFailed', 'Failed !<br /><br />It was not possible to update hostname address in the MySB database.');
define('User_ManageAddresses_PublicIpv4Address', 'You must enter a public IPv4 address.');
define('User_ManageAddresses_Ipv4UpdateFailed', 'Failed !<br /><br />It was not possible to update IPv4 address in the MySB database.');
define('User_ManageAddresses_VerifAddresseConfirm', 'Success !<br /><br />Please, Check your addresses,<br />and click on \"%s\"');
define('User_ManageAddresses_MessageRedirect', 'Success !<br /><br />You will be redirect in 10 seconds.');
define('User_ManageAddresses_NotAccessPortal', 'Failed !<br /><br />It was not possible to give you an access to MySB portal !');
define('User_ManageAddresses_RememberCheck', 'Remember that your dynamic IP will be checked every 5 minutes.');
define('User_ManageAddresses_FailedDeleteAddress', 'Failed !<br /><br />It was not possible to delete address.');

//#################### LAST LINE ######################################
