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

define('Global_Yes', 'Oui');
define('Global_No', 'Non');
define('Global_SaveChanges', 'Sauvegarder les modifications');
define('Global_IsDefault', 'D&eacute;faut ?');
define('Global_IsActive', 'Active ?');
define('Global_Comment', 'Commentaires');
define('Global_LastUpdate', 'Derni&egrave;re mise &agrave; jour');
define('Global_FailedUpdateMysbDB', 'Echec !<br /><br />Il n\'a pas &eacute;t&eacute; possible de mettre à jour la base de donn&eacute;es MySB.');

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

// Help > Help_Blocklists.php
$lang['Help_Blocklists'] = '<p>
Il est possible d\'utiliser une liste de blocage avec rTorrent.<br />
Similarly, if you have decided to use PeerGuardian, a second blocklist will also be available.
</p>
<p>
De m&ecirc;me, si vous avez d&eacute;cid&eacute; d\'utiliser PeerGuardian, une deuxi&egrave;me liste de blocage sera &eacute;galement disponible.<br />
Car si PeerGuardian a un probl&egrave;me et ne peut pas &ecirc;tre lanc&eacute;, la liste de blocage de rTorrent prendra le relais.
	<ul>
		<li><a href="?blocklists/rtorrent-blocklists.html">Liste de blocage rTorrent</a></li>
		<li><a href="?blocklists/peerguardian-blocklists.html">Liste de blocage PeerGuardian</a></li>
	</ul>
</p>';

// Help > Help_IPrestriction.php
$lang['Help_IPrestriction'] = '<p>
La restriction par adresse IP est appliqu&eacute;e pour limiter l\'acc&egrave;s au portail MySB.<br />
Dans le cas o&ugrave; vous ne disposez pas d\'une adresse IP publique fixe, vous pouvez utiliser un service tel que &quot;No-IP&quot; ou &quot;DynDNS&quot;.<br />
Vous pourrez ainso ajouter un nom d\'h&ocirc;te au lieu d\'une adresse IP sur <a href="?user/manage-addresses.html">cette page</a>.

	<ul>
		<li><a target="_blank" href="http://www.noip.com/">No-IP.com</a></li>
		<li><a target="_blank" href="http://www.dyndns.fr/">DynDNS.fr</a></li>
		<li><a target="_blank" href="https://account.dyn.com/entrance/">DynDNS.com</a></li>
		<li>...</li>
	</ul>
</p>';

// Help > Help_PlexMedia.php
$lang['Help_PlexMedia'] = '';

// Help > Help_Trackers.php
$lang['Help_Trackers_MainUser'] = '
	<p>
		Une liste de trackers a &eacute;t&eacute; g&eacute;n&eacute;r&eacute;e en utilisant ruTorrent.<br />
		Les trackers pr&eacute;sents dans cette liste ne sont pas modifiables. Il est seulement possible de les activer ou de les d&eacute;sactiver.
	</p>
	<p>
		Vous avez &eacute;galement la possibilit&eacute; d\'ajouter vos propres trackers sur <a href="?trackers/add-new-trackers.html">cette page</a>.<br />
		Vos trackers seront &eacute;galement affich&eacute;s dans la liste globale disponible sur <a href="?trackers/trackers-list.html">cette page</a>.
	</p>';
$lang['Help_Trackers_NormalUser'] = '
	<p>
		Peut-&ecirc;tre avez-vous besoin d\'ajouter un nouveau tracker?<br />
		En tant qu\'utilisateur normal, vous devez soumettre une demande &agrave; l\'utilisateur principal.<br />
		Seul l\'utilisateur principal peut ajouter / supprimer un nouveau tracker.
	</p>
	<p>
		Vous pouvez soumettre votre demande par e-mail ou en utilisant le chat ruTorrent.
	</p>
';

//#################### LAST LINE ######################################
?>