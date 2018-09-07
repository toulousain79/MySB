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

define('User_Synchronization_Title_rTorrentConfig', '<b>1 - Cr&eacute;er des cat&eacute;gories / G&eacute;rer les synchronisations</b>');
define('User_Synchronization_rTorrentConfigDirectory', 'Cat&eacute;gorie');
define('User_Synchronization_rTorrentConfigAddDirectory', 'Ajouter une cat&eacute;gorie');
define('User_Synchronization_rTorrentConfigDelDirectory', 'Retirer la derni&egrave;re cat&eacute;gorie');
define('User_Synchronization_rTorrentConfig_Comment', 'Permet de g&eacute;rer des cat&eacute;gories (sous-dossiers) dans "watch" et "complete".<br />
Exemple, ajoutez une cat&eacute;gorie "Films", et celle-ci sera cr&eacute;&eacute;e et g&eacute;r&eacute;e par rTorrent.<br />
Un fichier torrent ajout&eacute; dans "watch\Films" lancera le t&eacute;l&eacute;chargement.<br />
A la fin de celui-ci, les donn&eacute;es seront automatiquement d&eacute;plac&eacute;es dans "complete\Films".<br />
Vous pouvez également préciser si les données d\'une catégorie doivent être synchronisées<br />par FTP ou RSYNC vers un support distant (ex: NAS).');
define('User_Synchronization_rTorrentConfig_Table_Title', 'Cat&eacute;gories</br>existantes');
define('User_Synchronization_Title_Scripts', '<b>2 - Crontab / Scripts &agrave; utiliser</b>');
define('User_Synchronization_Minutes', 'Minutes');
define('User_Synchronization_Hours', 'Heures');
define('User_Synchronization_Days', 'Jours<br/>mois');
define('User_Synchronization_Months', 'Mois');
define('User_Synchronization_NumDay', 'Jours<br/>semaine');
define('User_Synchronization_Command', 'Script');
define('User_Synchronization_Add', 'Ajouter');
define('User_Synchronization_Crontab_Comment', 'Planifier l\'ex&eacute;cution de scripts personnels &agrave; la fin de vos t&eacute;l&eacute;chargements.<br />
Vos scripts doivent &ecirc;tre enregistr&eacute;s dans ~/scripts/ avec ".sh" comme extension.<br/>
Validez votre planification ici ;-) <a target="_blank" href="http://crontab.guru/">crontab.guru</a>. Lisez le fichier \'~/scripts/README\'.');
define('User_Synchronization_Title_SyncMode', 'Mode de synchro');
define('User_Synchronization_IgnoreSync', 'Ignore les scripts (Pas de synchro)');
define('User_Synchronization_CronOnly', 'Synchronisation programm&eacute;e');
define('User_Synchronization_DirectSync', 'Synchronisation directe');
define('User_Synchronization_Title_FilesToSync', '<b>Fichiers en attente</b>');
define('User_Synchronization_SyncMode', 'Synchronisation');
define('User_Synchronization_FileName', 'Nom');
define('User_Synchronization_SynchroDirect', 'Directe');
define('User_Synchronization_SynchroCron', 'Planifi&eacute;e');
define('User_Synchronization_Comments', 'Commentaires');
define('User_Synchronization_Title_Ident', '<b>3 - Informations de connexion pour les synchronisations distantes (directes et programmées)</b>');
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
define('User_Synchronization_ScriptsDirect', 'Script &agrave; utiliser pour les synchronisations directes');
define('User_Synchronization_ScriptsCron', 'Planification pour les synchronisations programm&eacute;es');
define('User_Synchronization_ScriptsComment', 'Dans le cas o&ugrave; plusieurs scripts sont pr&eacute;sents,<br />s&eacute;lectionnez celui &agrave; utiliser pour une synchronisation directe.<br />Vos scripts doivent &ecirc;tre enregistr&eacute;s dans ~/scripts/ avec ".sh" comme extension.');
define('User_Synchronization_Title_DownloadedFiles', 'Remettre un t&eacute;l&eacute;chargement dans la liste d\'attente');
define('User_Synchronization_Files', 'Liste des t&eacute;l&eacute;chargements');
define('User_Synchronization_AddFiles', 'Ajouter &agrave; la liste');
define('User_Synchronization_AddFilesComment', 'Permet de remettre un t&eacute;l&eacute;chargement dans la liste des synchronisations.');

//#################### LAST LINE ######################################
