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

define('Home_Welcome', 'Bonjour %s, bienvenue sur le portail MySB !');
define('Home_MainUser', '
	<p></p>
	<p>En tant qu\'utilisateur principal, vous disposez de fonctionnalit&eacute;s suppl&eacute;mentaires, telles que:</p>
	<ul style="margin-left: 100px">
		<li>Activation des trackers</li>
		<li>Ajout de nouveaux trackers</li>
		<li>Activation des listes noires pour rTorrent et/ou PeerGuardian <span class="Comments">(si install&eacute;)</span></li>
		<li>Acc&egrave;s &agrave; <b>PlexPy</b> pour visualiser les statistiques de Plexmedia Server <span class="Comments">(si install&eacute;)</span></li>
		<li>Acc&egrave;s &agrave; <b>Shell In a Box</b>, une console SSH via une page web</li>
		<li><a href="?main-user/renting-infos.html">Gestion locative</a> <span class="Comments">(description, taxe et co&ucirc;t du serveur)</span>, et saisie des paiements de vos utilisateurs <span class="Comments">(Il est conseill&eacute; de param&eacute;trer AVANT d\'ajouter de nouveaux utilisateurs)</span></li>
		<li>Gestion SMTP</li>
		<li>Gestion des utilisateurs</li>
		<li>Visualisation des logs</li>
		<li>G&eacute;rer <b>DNScrypt-proxy</b> <span class="Comments">(si install&eacute;)</span></li>
	</ul>
	<p>Ainsi que les fonctions de bases :</p>
	<ul style="margin-left: 100px">
		<li>Acc&egrave;s &agrave; <b>ruTorrent</b>, <b>Cakebox</b>, <b>Seedbox Manager</b>, <b>Nextcloud</b> et <b>LoadAvg</b></li>
		<li>Afficher les informations de votre compte</li>
		<li>Changer votre mot de passe</li>
		<li>Red&eacute;marrer ou changer la version de votre session rTorrent</li>
		<li>G&eacute;rer vos adresses de connexion autoris&eacute;es <span class="Comments">(IP ou DNS dynamique)</span></li>
		<li>T&eacute;l&eacute;charger vos fichiers de configuration pour OpenVPN <span class="Comments">(si install&eacute;)</span></li>
		<li>G&eacute;rer les cat&eacute;gories et la synchronisation de vos t&eacute;l&eacute;chargements <span class="Comments">(synchronisations directes et/ou programm&eacute;es vers un NAS par exemple)</span></li>
	</ul>
');
define('Home_NormalUser', '
	<p></p>
	<p>En tant qu\'utilisateur normal, vous diposez des fonctionnalit&eacute;s suivantes :</p>
	<ul style="margin-left: 100px">
		<li>Acc&egrave;s &agrave; <b>ruTorrent</b>, <b>Cakebox</b>, <b>Seedbox Manager</b>, <b>Nextcloud</b> et <b>LoadAvg</b></li>
		<li>Afficher les informations de votre compte</li>
		<li>Changer votre mot de passe</li>
		<li>Red&eacute;mmarer ou changer la version de votre session rTorrent</li>
		<li>G&eacute;rer vos adresses de connexion autoris&eacute;es <span class="Comments">(IP ou DNS dynamique)</span></li>
		<li>T&eacute;l&eacute;charger vos fichiers de configuration pour OpenVPN <span class="Comments">(si install&eacute;)</span></li>
		<li>G&eacute;rer les cat&eacute;gories et la synchronisation de vos t&eacute;l&eacute;chargements <span class="Comments">(synchronisations directes et/ou programm&eacute;es vers un NAS par exemple)</span></li>
	</ul>
');
define('Home_PlexlUser', '
	<p></p>
	<p>En tant qu\'utilisateur normal, vous diposez des fonctionnalit&eacute;s suivantes :</p>
	<ul style="margin-left: 100px">
		<li>Afficher les informations de votre compte</li>
		<li>Changer votre mot de passe</li>
		<li>G&eacute;rer vos adresses de connexion autoris&eacute;es <span class="Comments">(IP ou DNS dynamique)</span></li>
	</ul>
');
define('Home_NextCloudAfterUpgrade', '
	<p></p>
	<h2>NextCloud</h2>
	<p>Pour utiliser NextCloud merci de r&eacute;initialiser votre mot de passe sur <a href="?user/change-password.html">cette page</a>. <span class="Comments">(Vous pouvez r&eacute;utiliser le m&ecirc;me mot de passe)</span></p>
');

//#################### LAST LINE ######################################
