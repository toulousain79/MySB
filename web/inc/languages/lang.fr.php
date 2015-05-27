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

$lang = array();
 
// Global
$lang['Global_Yes'] = 'Oui';
$lang['Global_No'] = 'Non';
$lang['Global_SaveChanges'] = 'Sauvegarder les modifications';
$lang['Global_IsDefault'] = 'D&eacute;faut ?';
$lang['Global_IsActive'] = 'Active ?';
$lang['Global_Comment'] = 'Commentaires';
$lang['Global_LastUpdate'] = 'Derni&egrave;re mise &agrave; jour';

// BlockLists_PGL.php
$lang['BlockLists_PGL_Success'] = 'Succ&egrave;s!<br /><br />Les listes noires ont &eacute;t&eacute; appliqu&eacute;es pour PeerGuardian ET rTorrent.';
$lang['BlockLists_PGL_Failed'] = 'Echec !<br /><br />Il n\'a pas &eacute;t&eacute; possible de mettre &agrave; jour la base de donn&eacute;es MySB.';
$lang['BlockLists_PGL_Table_Name'] = 'Nom';
$lang['BlockLists_PGL_Table_Blocklist'] = 'Liste noire';

// BlockLists_rTorrent.php
$lang['BlockLists_rTorrent_Success'] = 'Succ&egrave;s!<br /><br />Les listes noires ont &eacute;t&eacute; appliqu&eacute;es pour rTorrent ET PeerGuardian.';
$lang['BlockLists_rTorrent_Failed'] = 'Echec !<br /><br />Il n\'a pas &eacute;t&eacute; possible de mettre &agrave; jour la base de donn&eacute;es MySB.';
$lang['BlockLists_rTorrent_Table_Name'] = 'Nom';
$lang['BlockLists_rTorrent_Table_Blocklist'] = 'Liste noire';

// User > ChangeEmail.php
$lang['User_ChangeEmail_CurrentAddress'] = 'Adresse actuelle :';
$lang['User_ChangeEmail_NewAddress'] = 'Nouvelle adresse :';
$lang['User_ChangeEmail_ConfirmAddress'] = 'Confirmation :';
$lang['User_ChangeEmail_FailedUpdate'] = 'Echec !<br /><br />Il n\'a pas &eacute;t&eacute; possible de mettre &agrave; jour la base de donn&eacute;es MySB.';
$lang['User_ChangeEmail_ErrorConfirm'] = 'Erreur entre la nouvelle adresse et la confirmation.';
$lang['User_ChangeEmail_ErrorNotValid'] = 'L\'adresse e-mail indiqu&eacute;e n\'est pas valide!';
$lang['User_ChangeEmail_CompleteAll'] = 'Merci de renseigner tous les champs.';

// User > ChangePassword.php
$lang['User_ChangePassword_CurrentPassword'] = 'Mot de passe actuel :';
$lang['User_ChangePassword_NewPassword'] = 'Nouveau mot de passe :';
$lang['User_ChangePassword_ConfirmPassword'] = 'Confirmation :';
$lang['User_ChangePassword_Success'] = 'Succ&egrave;s !<br /><br />Attendez quelques secondes et vous serez en mesure de vous connecter avec votre nouveau mot de passe.<br /><br />Vous serez redirigez dans 30 secondes.<br /><br />S\'il vous pla&icirc;t, attendez la redirection automatique !';
$lang['User_ChangePassword_Failded'] = 'Echec !<br /><br />Il n\'a pas &eacute;t&eacute; possible d\'appliquer le nouveau mot de passe.';
$lang['User_ChangePassword_FailedUpdateMysbDB'] = 'Echec !<br /><br />Il n\'a pas &eacute;t&eacute; possible de mettre &agrave; jour la base de donn&eacute;es MySB.';
$lang['User_ChangePassword_FailedUpdateWolfDB'] = 'Echec !<br /><br />Il n\'a pas &eacute;t&eacute; possible de mettre &agrave; jour la base de donn&eacute;es Wolf.';
$lang['User_ChangePassword_ErrorConfirm'] = 'Erreur entre le nouveau mot de passe et la confirmation.';
$lang['User_ChangePassword_ErrorNotValid'] = 'Le mot de passe actuel n\'est pas valide!';
$lang['User_ChangePassword_CompleteAll'] = 'Merci de renseigner tous les champs.';

// Main user > DNScrypt.php
$lang['MainUser_DNScrypt_FailedUpdateMysbDB'] = 'Echec !<br /><br />Il n\'a pas &eacute;t&eacute; possible de mettre &agrave; jour la base de donn&eacute;es MySB.';
$lang['MainUser_DNScrypt_CompleteAll'] = 'Merci de renseigner tous les champs.';
$lang['MainUser_DNScrypt_Table_Name'] = 'Nom';
$lang['MainUser_DNScrypt_Table_FullName'] = 'Nom complet';
$lang['MainUser_DNScrypt_Table_Location'] = 'Localisation';
$lang['MainUser_DNScrypt_Table_Version'] = 'Version';
$lang['MainUser_DNScrypt_Table_DNSsec'] = 'Validation<br />DNSSEC';
$lang['MainUser_DNScrypt_Table_NoLog'] = 'Pas de logs';
$lang['MainUser_DNScrypt_Table_NameCoin'] = 'Namecoin';

//#################### LAST LINE ######################################
?>