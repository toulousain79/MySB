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

define('User_Synchronization_Title_rTorrentConfig', '<b>1 - Create categories / Manage synchronizations</b>');
define('User_Synchronization_rTorrentConfigDirectory', 'Category');
define('User_Synchronization_rTorrentConfigAddDirectory', 'Add a category');
define('User_Synchronization_rTorrentConfigDelDirectory', 'Remove the last category');
define('User_Synchronization_rTorrentConfig_Comment', 'Can manage categories (subfolders) under "watch" and "complete" directories.<br />
Example, add a "Movies" category, and it will be created and managed by rTorrent.<br />
A torrent file added to "watch\Movies" will start the download.<br />
At the end thereof, the data is automatically moved into "complete\Movies".<br />
You can also specify whether the data of a class must be synchronized<br />via FTP or rsync to a remote support (eg NAS).');
define('User_Synchronization_rTorrentConfig_Table_Title', 'Actual</br>categories');
define('User_Synchronization_Title_Scripts', '<b>2 - Crontab / Scripts to use</b>');
define('User_Synchronization_Minutes', 'Minutes');
define('User_Synchronization_Hours', 'Hours');
define('User_Synchronization_Days', 'Month<br/>days');
define('User_Synchronization_Months', 'Months');
define('User_Synchronization_NumDay', 'Week<br/>days');
define('User_Synchronization_Command', 'Script');
define('User_Synchronization_Add', 'Add');
define('User_Synchronization_Crontab_Comment', 'Schedule your personal scripts at the end of your downloads.<br/>
Your scripts must be stored in ~/crontab/ with extension ".cron".<br/>
Confirm your schedule here ;-) <a target="_blank" href="http://crontab.guru/">crontab.guru</a>. Read the file \'~/scripts/README\'.');
define('User_Synchronization_Title_SyncMode', 'Sync mode');
define('User_Synchronization_IgnoreSync', 'Ignore script (no sync)');
define('User_Synchronization_CronOnly', 'Script by cron');
define('User_Synchronization_DirectSync', 'Direct when finished');
define('User_Synchronization_Title_FilesToSync', '<b>Files waiting</b>');
define('User_Synchronization_SyncMode', 'Synchro');
define('User_Synchronization_FileName', 'Name');
define('User_Synchronization_SynchroDirect', 'Direct');
define('User_Synchronization_SynchroCron', 'Planned');
define('User_Synchronization_Comments', 'Comments');
define('User_Synchronization_Title_Ident', '<b>3 - Login informations for remote synchronizations (direct and programmed)</b>');
define('User_Synchronization_ModeSync', 'Method');
define('User_Synchronization_ModeSync_FTP', 'FTP(s)');
define('User_Synchronization_ModeSync_RSYNC', 'RSYNC');
define('User_Synchronization_DstDir', 'Remote folder');
define('User_Synchronization_DstSrv', 'Remote server');
define('User_Synchronization_DstPort', 'Port');
define('User_Synchronization_DstUser', 'User');
define('User_Synchronization_DstPass', 'Password');
define('User_Synchronization_MaxSync', 'Max files to sync');
define('User_Synchronization_Subdir', 'Create a subfolder');
define('User_Synchronization_MailObjectOK', 'Mail subject for a successful synchronization');
define('User_Synchronization_MailObjectKO', 'Mail subject for a failed synchronization');
define('User_Synchronization_SyncComment', '');
define('User_Synchronization_StartDirect', 'Start direct synchronization');
define('User_Synchronization_ScriptsCron', 'Planning for scheduled synchronizations');
define('User_Synchronization_StartPlanned', 'Start planned synchronization');
define('User_Synchronization_ScriptsDirect', 'Script to use for direct synchronization');
define('User_Synchronization_ScriptsComment', 'In case several scripts are present,<br/>select the script to be used for direct synchronization.');
define('User_Synchronization_Title_DownloadedFiles', 'Put a download in the waiting list');
define('User_Synchronization_Files', 'List of downloads');
define('User_Synchronization_AddFiles', 'Add to list');
define('User_Synchronization_AddFilesComment', 'Resets a download from the list of synchronizations.');

//#################### LAST LINE ######################################
