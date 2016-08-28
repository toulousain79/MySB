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

define('User_Synchronization_Title_rTorrentConfig', 'Fichier de Configuration rTorrent');
define('User_Synchronization_rTorrentConfigDirectory', 'Sous-dossiers');
define('User_Synchronization_rTorrentConfigAddDirectory', 'Ajouter un sous-dossier');
define('User_Synchronization_rTorrentConfigDelDirectory', 'Retirer le dernier sous-dossier');
define('User_Synchronization_rTorrentConfig_Comment', 'Permet de g&eacute;rer les sous dossiers dans "watch" et "complete".<br />
Exemple, ajoutez un dossier "Films", et celui-ci sera cr&eacute;&eacute; et g&eacute;r&eacute; par rTorrent.<br />
Un fichier torrent ajout&eacute; dans "watch\Films" lancera le t&eacute;l&eacute;chargement.<br />
A la fin de celui-ci, les donn&eacute;es seront automatiquement copi&eacute;es dans "complete\Films".');
define('User_Synchronization_rTorrentConfig_Table_Title', 'Sous-dossiers</br>existants');
define('User_Synchronization_Title_Crontab', 'Crontab / Scripts à utiliser');
define('User_Synchronization_Minutes', 'Minutes');
define('User_Synchronization_Hours', 'Heures');
define('User_Synchronization_Days', 'Jours<br/>mois');
define('User_Synchronization_Months', 'Mois');
define('User_Synchronization_NumDay', 'Jours<br/>semaine');
define('User_Synchronization_Command', 'Script');
define('User_Synchronization_Add', 'Ajouter');
define('User_Synchronization_Crontab_Comment', 'Planifier l\'ex&eacute;cution de scripts personnels &agrave; la fin de vos t&eacute;l&eacute;chargements.<br />
Vos scripts doivent &ecirc;tre enregistr&eacute;s dans ~/scripts/ avec ".sh" comme extension.<br/>
Validez votre planification ici ;-) <a target="_blank" href="http://crontab.guru/">crontab.guru</a>.<br/>
Lisez le fichier \'~/scripts/README\'.');
define('User_Synchronization_Title_SyncMode', 'Mode de synchro');
define('User_Synchronization_IgnoreSync', 'Ignore les scripts (Pas de synchro)');
define('User_Synchronization_CronOnly', 'Synchro programm&eacute;e');
define('User_Synchronization_DirectSync', 'Synchro directe');
define('User_Synchronization_Title_FilesToSync', 'Fichiers en attente');
define('User_Synchronization_SyncMode', 'Synchro');
define('User_Synchronization_FileName', 'Nom');
define('User_Synchronization_SynchroDirect', 'Directe');
define('User_Synchronization_SynchroCron', 'Planifi&eacute;e');
define('User_Synchronization_Comments', 'Commentaires');
define('User_Synchronization_Title_Ident', 'Identification');
define('User_Synchronization_ModeSync', 'M&eacute;thode');
define('User_Synchronization_ModeSync_FTP', 'FTP(s)');
define('User_Synchronization_ModeSync_RSYNC', 'RSYNC');
define('User_Synchronization_DstDir', 'Dossier distant');
define('User_Synchronization_DstSrv', 'Serveur distant');
define('User_Synchronization_DstPort', 'Port');
define('User_Synchronization_DstUser', 'Utilisateur');
define('User_Synchronization_DstPass', 'Mot de passe');
define('User_Synchronization_MaxSync', 'Max &agrave; synchroniser');
define('User_Synchronization_Subdir', 'Sous-dossier');
define('User_Synchronization_MailObjectOK', 'Sujet du mail pour une synchronisation r&eacute;ussie');
define('User_Synchronization_MailObjectKO', 'Sujet du mail pour une synchronisation &eacute;chou&eacute;e');
define('User_Synchronization_SyncComment', '');
define('User_Synchronization_StartDirect', 'Lancer une synchronisation directe');
define('User_Synchronization_StartPlanned', 'Lancer une synchronisation planifi&eacute;e');
define('User_Synchronization_ScriptsDirect', 'Script à utiliser pour les synchronisation directe');
define('User_Synchronization_ScriptsComment', 'Dans le cas o&ugrave; plusieurs scripts sont pr&eacute;sents,<br />s&eacute;lectionnez le script &agrave; utiliser pour une synchronisation directe.<br />Vos scripts doivent &ecirc;tre enregistr&eacute;s dans ~/scripts/ avec ".sh" comme extension.');

//#################### LAST LINE ######################################
