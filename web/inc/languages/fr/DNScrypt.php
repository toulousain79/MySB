<?php
// ---------------------------
//  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
//   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
//	_\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
//	 _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
//	  _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
//	   _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
//		_\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
//		 _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
//		  _\///______________\///___\////__________\///////////_____\/////////////_____
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

define('MainUser_DNScrypt_Table_Name', 'Nom');
define('MainUser_DNScrypt_Table_DNSsec', 'Validation<br />DNSSEC');
define('MainUser_DNScrypt_Table_NoLog', 'Pas de<br />logs');
define('MainUser_DNScrypt_Table_Filters', 'Pas de<br />filtrage');
define('MainUser_DNScrypt_Table_Speed', 'Vitesse<br />(msec)');
define('MainUser_DNScrypt_Restart', 'Red&eacute;marrer le service DNScrypt-proxy');
define('MainUser_DNScrypt_Title_Config', 'Configuration de DNScrypt-proxy');
define('MainUser_DNScrypt_NoLogs', 'Pas de Logs');
define('MainUser_DNScrypt_DNSSec', 'DNSsec');
define('MainUser_DNScrypt_NoFilter', 'Pas de Filtrage');
define('MainUser_DNScrypt_LoadBalancing', 'Load-balancing');
define('MainUser_DNScrypt_ForceTcp', 'Forcer le TCP');
define('MainUser_DNScrypt_EphemeralKeys', 'Ephemeral Keys');
define('MainUser_DNScrypt_TlsDisableTickets', 'Sessions TLS');

define('Main_DNScrypt_TT_NoLogs', 'Le serveur ne doit pas enregistrer les requêtes des utilisateurs <i>(d&eacute;claratif)</i>');
define('Main_DNScrypt_TT_DNSSec', 'Le serveur doit prendre en charge les extensions de s&eacute;curit&eacute; DNS <i>(DNSSEC)</i>');
define('Main_DNScrypt_TT_NoFilter', 'Le serveur ne doit pas imposer sa propre liste noire <i>(pour le contr&ocirc;le parental, blocage des publicit&eacute;s...)</i>');
define('Main_DNScrypt_TT_LoadBalancing', 'Strat&eacute;gie d\'&eacute;quilibrage de charge:<br />
<br />
<b>fastest</b> <i>(toujours choisir le serveur le plus rapide de la liste)</i>
<b>p2</b> (default) <i>(choisir au hasard entre les 2 meilleurs serveurs)</i>
<b>ph</b> <i>(choisir au hasard entre la moitié des plus rapide de tous les serveurs)</i>
<b>random</b> <i>(choisir un serveur quelconque de la liste)</i>');
define('Main_DNScrypt_TT_ForceTcp', 'Toujours utiliser le TCP pour se connecter aux serveurs en amont.<br />
Cela peut &ecirc;tre utile si vous devez tout router par Tor.<br />
Sinon, laissez ceci à <b>false</b>, car cela n\'am&eacute;liore pas la s&eacute;curit&eacute; <i>(dnscrypt-proxy va toujours tout chiffrer, m&ecirc;me en utilisant UDP)</i>, et ne peut qu’augmenter la latence.');
define('Main_DNScrypt_TT_EphemeralKeys', 'Cr&eacute;ez une nouvelle cl&eacute; unique pour chaque requ&ecirc;te DNS.<br />
Cela peut am&eacute;liorer la confidentialit&eacute;, mais peut &eacute;galement avoir un impact significatif sur l\'utilisation du processeur.<br />
Activez uniquement si vous n\'avez pas beaucoup de charge r&eacute;seau.');
define('Main_DNScrypt_TT_TlsDisableTickets', 'DoH: D&eacute;sactiver les tickets de session TLS <i>(augmente la confidentialit&eacute; mais aussi la latence)</i>');

//#################### LAST LINE ######################################
