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

define('User_UserInfoMail_GoTo', 'Aller vers votre portail MySB');
define('User_UserInfoMail_NotInstalled', 'MySB n\'est pas install&eacute;!');

//////////////////////
// User personal info
//////////////////////
// IP Address
define('User_UserInfoMail_Comment_Address_1', 'S\'il vous pla&icirc;t, changez votre mot de passe. Votre adresse IP actuelle sera ajout&eacute; pour obtenir un acc&egrave;s valide.');
define('User_UserInfoMail_Comment_Address_2', 'Les adresses IP publiques utilis&eacute;es pour la restriction d\'acc&egrave;s (si activ&eacute;e). Vous pouvez g&eacute;rer cette liste <a href="https://%s:%s/?user/manage-addresses.html">ici</a>.');
// Password
define('User_UserInfoMail_Comment_Password_1', '<a href="https://%s:%s/NewUser.php?user=%s&passwd=%s&page=ChangePassword">S\'il vous pla&icirc;t, changez votre mot de passe maintenant.');
define('User_UserInfoMail_Comment_Password_2', 'Vous pouvez changer votre mot de passe <a href="https://%s:%s/?user/change-password.html">ici</a>.');

//////////////////////
// Links (Normal user)
//////////////////////
// User Info
define('User_UserInfoMail_Comment_UserInfo', 'Page d\'information actuelle disponible sur le portail MySB.');
// Force IP address
define('User_UserInfoMail_Title_ForceIP', 'Forcer votre adresse IP');
define('User_UserInfoMail_Comment_ForceIP', 'Forcer l\'ajout de votre adresse IP actuelle en cas de probl&egrave;mes. (Vous avez besoin d\'un mot de passe valide)');

//////////////////////
// Links (Main user)
//////////////////////
// Trackers
define('User_UserInfoMail_Comment_Trackers', '<a href="https://%s:%s/?trackers/trackers-list.html">G&eacute;rer vos trackers ici.</a> Vous pouvez &eacute;galement <a href="https://%s:%s/?trackers/add-new-trackers.html">ajouter vos trackers ici</a>.');
// Blocklists
define('User_UserInfoMail_Comment_Blocklists', 'G&eacute;rer la <a href="https://%s:%s/?blocklists/rtorrent-blocklists.html">liste noire pour rTorrent</a> ET la <a href="https://%s:%s/?blocklists/peerguardian-blocklists.html">liste noire pour PeerGuardian</a>.');

//#################### LAST LINE ######################################
?>