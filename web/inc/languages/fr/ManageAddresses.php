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

define('User_ManageAddresses_TitleAdd', 'Ajouter vos adresses autoris&eacute;es ici');
define('User_ManageAddresses_TextAddress', 'Adresse <i>(IP ou DNS dynamique)</i>:');
define('User_ManageAddresses_Btn_AddNewLine', 'Ajouter une nouvelle ligne');
define('User_ManageAddresses_Btn_RemoveLastLine', 'Supprimer la derni&egrave;re ligne');
define('User_ManageAddresses_InfoAddAddresses', 'Si vous avez une <b>adresse IP dynamique</b>, vous devez entrer un nom d\'h&ocirc;te (No-IP, DynDNS, ...).<br />Si vous avez une <b>adresse IP fixe</b>, vous pouvez le saisir directement, ou entrer un nom d\'h&ocirc;te. Dans ce cas, il est conseill&eacute; de saisir directement votre IP.');
define('User_ManageAddresses_Btn_AddAddress', 'Ajouter mes adresses maintenant !');
define('User_ManageAddresses_Table_IPv4', 'IPv4');
define('User_ManageAddresses_Table_Hostname', 'Nom d\'h&ocirc;te');
define('User_ManageAddresses_Table_CheckBy', 'V&eacute;rifi&eacute; par');
define('User_ManageAddresses_InfoBottom', '<b>NB</b>: Les adresses IP dynamiques sont v&eacute;rifi&eacute;es toutes les <b>5</b> minutes.<br />Si une adresse IP a chang&eacute;, la base de donn&eacute;es sera mise &agrave; jour et les r&egrave;gles de s&eacute;curit&eacute; seront adapt&eacute;es en cons&eacute;quence.');
define('User_ManageAddresses_NotValidIp', 'Le nom d\'h&ocirc;te ne retourne pas une adresse IP valide.');
define('User_ManageAddresses_HostnameUpdateFailed', 'Echec !<br /><br />Il n\'a pas &eacute;t&eacute; possible de mettre &agrave; jour le nom d\'h&ocirc;te dans la base de donn&eacute;es MySB.');
define('User_ManageAddresses_PublicIpv4Address', 'Vous devez entrer une adresse IPv4 publique.');
define('User_ManageAddresses_Ipv4UpdateFailed', 'Echec !<br /><br />Il n\'a pas &eacute;t&eacute; possible de mettre &agrave; jour l\'adresse IPv4 dans la base de donn&eacute;es MySB.');
define('User_ManageAddresses_VerifAddresseConfirm', 'Succ&egrave;s !<br /><br />Merci de bien vouloir v&eacute;rifiez vos adresses,<br />puis cliquez sur \"%s\"');
define('User_ManageAddresses_MessageRedirect', 'Succ&egrave;s !<br /><br />Vous serez redirig&eacute; sur la page d\'accueil dans 10 secondes.');
define('User_ManageAddresses_NotAccessPortal', 'Echec !<br /><br />Il n\'a pas &eacute;t&eacute; possible pour vous donner un acc&egrave;s au portail MySB !');
define('User_ManageAddresses_RememberCheck', 'Gardez en m&eacute;moire que vos addresses IP dynamiques seront v&eacute;rifi&eacute;es toutes les 5 minutes.');
define('User_ManageAddresses_FailedDeleteAddress', 'Echec !<br /><br />Il n\'a pas &eacute;t&eacute; possible de supprimer l\'adresse.');

//#################### LAST LINE ######################################
