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

global $MySB_DB, $users_datas, $CurrentUser, $system_datas;
require_once(WEB_INC . '/languages/' . $_SESSION['Language'] . '/' . basename(__FILE__));

// VARs
$UserID = $users_datas['id_users'];
$Command = 'message_only';
$RefreshPage = 0;
$Change = 0;
$type = 'information';
$message = Global_NoChange;

$Sync_DB = new medoo([
	'database_type' => 'sqlite',
	'database_file' => "/home/$CurrentUser/db/$CurrentUser.sq3",
	'database_name' => 'Sync'
]);

// Get values from POST
if (isset($_POST['submit'])) {
	switch ($_POST['submit']) {
		case User_Synchronization_Add:
			// Crontab - Add
			$CronID_POST = $_POST['cron_id'];
			$CronMinutes_POST = $_POST['cron_minutes'];
			$CronHours_POST = $_POST['cron_hours'];
			$CronDays_POST = $_POST['cron_days'];
			$CronMonths_POST = $_POST['cron_months'];
			$CronNumday_POST = $_POST['cron_numday'];
			$CronCommand_POST = $_POST['cron_command'];
			$CronDelete_POST = $_POST['cron_delete'];

			$IfExist = $MySB_DB->get("users_crontab", "id_users_crontab", [
																			"AND" => [
																				"id_users" => $UserID,
																				"id_users_crontab" => $CronID_POST
																			]
																		]);
			if ( empty($IfExist) ) {
				$result = $MySB_DB->insert("users_crontab", [
															"id_users" => "$UserID",
															"minutes" => "$CronMinutes_POST",
															"hours" => "$CronHours_POST",
															"days" => "$CronDays_POST",
															"months" => "$CronMonths_POST",
															"numday" => "$CronNumday_POST",
															"command" => "$CronCommand_POST",
															]);
				if( $result != 0 ) {
					$Change++;
					$RefreshPage++;
					$Command = 'Options_MySB';
				}
			} else {
				$result = $MySB_DB->update("users_crontab", [
															"id_users" => "$UserID",
															"minutes" => "$CronMinutes_POST",
															"hours" => "$CronHours_POST",
															"days" => "$CronDays_POST",
															"months" => "$CronMonths_POST",
															"numday" => "$CronNumday_POST",
															"command" => "$CronCommand_POST"
															], [
																"AND" => [
																	"id_users" => $UserID,
																	"id_users_crontab" => $CronID_POST
																]
															]);
				if( $result != 0 ) {
					$Change++;
					$RefreshPage++;
					$Command = 'Options_MySB';
				}
			}
			break;

		default:	// Global_SaveChanges
			// Crontab - Delete
			if ( isset($_POST['cron_delete']) ) {
				foreach ($_POST['cron_delete'] as $key) {
					$result = $MySB_DB->delete("users_crontab", ["id_users_crontab" => $key]);
					if ( $result > 0 ) {
						$Change++;
						$RefreshPage++;
						$Command = 'Options_MySB';
					}
				}
			}

			// Sub-Directories - Delete AND sync mode
			$count_dir = count($_POST['directory']);
			$count_del = count($_POST['delete_dir']);
			for($i=0; $i<=$count_dir; $i++) {
				$current_directory = preg_replace('/\s\s+/', '', $_POST['directory'][$i]);
				$sync_mode = $_POST['sync_mode'][$i];
				$to_delete = 0;

				for($j=0; $j<=$count_del; $j++) {
					if ( ($_POST['delete_dir'][$j] == $current_directory) ) {
						$to_delete = 1;
					}
				}

				$result = $MySB_DB->update("users_rtorrent_cfg", ["sync_mode" => $sync_mode, "to_delete" => $to_delete], [
																						"AND" => [
																							"id_users" => $UserID,
																							"sub_directory" => $current_directory
																						]
																					]);
				if ( $result > 0 ) {
					$Change++;
					$RefreshPage++;
					if( $to_delete == 1 ) {
						$rTorrentRestart_POST = 1;
						$Command = 'Restart_rTorrent';
					} else {
						$Command = 'Options_MySB';
					}
				}
			}

			// Sub-Directories - Add
			if ( (isset($_POST['input_id'])) && (isset($_POST['input_directory'][1])) ) {
				$count = count($_POST['input_id']);
				for($i=1; $i<=$count; $i++) {
					$Directory = ReplacesAccentedCharacters($_POST['input_directory'][$i]);
					$Directory = preg_replace('/\s\s+/', '', $Directory);
					$Directory = preg_replace('/\s+/', '_', $Directory);
					$Directory = preg_replace('/\W+/', '', $Directory);
					$SyncMode = $_POST['input_sync_mode'][$i];

					if ( !empty($Directory) ) {
						$IfExist = $MySB_DB->get("users_rtorrent_cfg", "id_users_rtorrent_cfg", [
																			"AND" => [
																				"id_users" => $UserID,
																				"sub_directory" => $Directory
																			]
																		]);

						if ( empty($IfExist) ) {
							$result = $MySB_DB->insert("users_rtorrent_cfg", ["id_users" => "$UserID", "sub_directory" => "$Directory", "sync_mode" => $SyncMode, "can_be_deleted" => 1]);
							if( $result != 0 ) {
								$Change++;
								$RefreshPage++;
								$rTorrentRestart_POST = 1;
								$Command = 'Restart_rTorrent';
							}
						}
					}
				}
			}

			// Identification
			$result = $Sync_DB->update("ident", [
													"mode_sync" => $_POST['mode_sync'][1],
													"dst_dir" => $_POST['sync_dstdir'][1],
													"dst_srv" => $_POST['sync_dstsrv'][1],
													"dst_port" => $_POST['sync_dstport'][1],
													"dst_user" => $_POST['sync_dstuser'][1],
													"dst_pass" => $_POST['sync_dstpass'][1],
													"max_to_sync" => $_POST['sync_maxsync'][1],
													"create_subdir" => $_POST['create_subdir'][1]
												], ["ident_id" => 1]);
			if ( $result > 0 ) { $ChangeList++; }

			// Files waiting - Change some values
			$ChangeList=0;
			if ( (isset($_POST['list_id'])) ) {
				foreach ($_POST['list_id'] as $key) {
					$result = $Sync_DB->update("list", ["list_category" => $_POST['list_category'][$key], "is_active" => $_POST['is_active'][$key]], ["list_id" => $key]);				
					if ( $result > 0 ) { $ChangeList++; }
				}
			}

			// Files waiting - Delete some values
			if ( (isset($_POST['delete_filewaiting'])) ) {
				foreach ($_POST['delete_filewaiting'] as $key) {
					$result = $Sync_DB->delete("list", ["list_id" => $key]);
					if ( $result > 0 ) { $ChangeList++; }
				}
			}

			if ( $ChangeList > 0 ) {
				$type = 'success';
				unset($message);
			}

			break;
	}

	if( $Change >= 1 ) {
		$result = $MySB_DB->update("users", ["rtorrent_restart" => "$rTorrentRestart_POST"], ["users_ident" => "$CurrentUser"]);

		if( $result >= 0 ) {
			$type = 'success';
			unset($message);
		}
	}

	GenerateMessage($Command, $type, $message);

	if( $RefreshPage >= 1 ) {
		header('Refresh: 2; URL='.$_SERVER['HTTP_REFERER'].'');
	}
}

// Get values from database
$users_datas = $MySB_DB->get("users", "*", ["users_ident" => "$CurrentUser"]);
$users_directories = $MySB_DB->select("users_rtorrent_cfg", "*", ["id_users" => "$UserID"]);
$users_crontab = $MySB_DB->select("users_crontab", "*", ["id_users" => "$UserID"]);

$CronFiles = array();
if($dossier = opendir("/home/$CurrentUser/scripts")) {
	while(false !== ($fichier = readdir($dossier))) {
		if($fichier != '.' && $fichier != '..') {
			$info = new SplFileInfo($fichier);
			if ( $info->getExtension() == 'sh' ) {
				array_push($CronFiles, $fichier);
			}
		}
	}
}

$IdentSync = $Sync_DB->get("ident", "*", ["ident_id" => 1]);
$FilesInQueue = $Sync_DB->select("list", "*");
?>

<form class="form_settings" method="post" action="">
<div align="center" style="margin-top: 10px; margin-bottom: 20px;">
	<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>" />
	<br />
	<fieldset style="vertical-align: text-top;">
	<legend><?php echo User_Synchronization_Title_rTorrentConfig; ?></legend>
<?php
if ( !empty($users_directories) ) {
?>
		<table>
			<tr>
				<th style="text-align:center;"><?php echo User_Synchronization_rTorrentConfig_Table_Title; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_Title_SyncMode; ?></th>
				<th style="text-align:center;"><?php echo Global_Table_Delete; ?></th>
			</tr>
<?php
	foreach($users_directories as $Directory) {
?>
			<tr>
				<td><?php echo $Directory['sub_directory']; ?><input class="directory" id="directory" name="directory[]" type="hidden" value="<?php echo $Directory['sub_directory']; ?>" /></td>
				<td>
					<select name="sync_mode[]" style="width:300px; height: 28px;">
						<option <?php echo ($Directory['sync_mode'] == '0') ? 'selected="selected"' : ''; ?> value="0"><?php echo User_Synchronization_IgnoreSync; ?></option>
						<option <?php echo ($Directory['sync_mode'] == '1') ? 'selected="selected"' : ''; ?> value="1"><?php echo User_Synchronization_CronOnly; ?></option>
						<option <?php echo ($Directory['sync_mode'] == '2') ? 'selected="selected"' : ''; ?> value="2"><?php echo User_Synchronization_DirectSync; ?></option>
					</select>
				</td>
				<td>
					<input class="submit" name="delete_dir[]" type="checkbox" value="<?php echo $Directory['sub_directory']; ?>" <?php echo ($Directory['to_delete'] == '1') ? 'checked' : ''; ?> />
				</td>
			</tr>
<?php
	}
}
?>
			<tr><th colspan="3"></th></tr>
		</table>
		<div id="input1" class="clonedInput">
			<input class="input_id" id="input_id" name="input_id[1]" type="hidden" value="1" />
			<?php echo User_Synchronization_rTorrentConfigDirectory; ?>&nbsp;<input class="input_directory" id="input_directory" name="input_directory[1]" type="text" />
			<select class="input_sync_mode" id="input_sync_mode" name="input_sync_mode[1]" style="width:280px; height: 28px;" >
				<option value="0"><?php echo User_Synchronization_IgnoreSync; ?></option>
				<option value="1"><?php echo User_Synchronization_CronOnly; ?></option>
				<option value="2"><?php echo User_Synchronization_DirectSync; ?></option>
			</select>
		</div>
		<div style="margin-top: 10px; margin-bottom: 20px;">
			<input type="button" id="btnAdd" value="<?php echo User_Synchronization_rTorrentConfigAddDirectory; ?>" style="cursor: pointer;" />
			<input type="button" id="btnDel" value="<?php echo User_Synchronization_rTorrentConfigDelDirectory; ?>" style="cursor: pointer;" />
		</div>
		<div align="center"><p class="Comments"><?php echo User_Synchronization_rTorrentConfig_Comment; ?></p></div>
	</fieldset>

	<fieldset style="vertical-align: text-top;">
	<legend><?php echo User_Synchronization_Title_Crontab; ?></legend>
		<table>
			<tr>
				<th style="text-align:center;"><?php echo User_Synchronization_Minutes; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_Hours; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_Days; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_Months; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_NumDay; ?></th>
				<th style="text-align:center;"><?php echo Global_Table_Delete; ?></th>
			</tr>
<?php
	foreach($users_crontab as $Crontab) {
?>
			<input name="cron_id[<?php echo $Crontab['id_users_crontab']; ?>]" type="hidden" value="<?php echo $Crontab['id_users_crontab']; ?>" />
			<tr>
				<td><input class="text_small" name="cron_minutes[<?php echo $Crontab['id_users_crontab']; ?>]" type="text" value="<?php echo $Crontab['minutes']; ?>" readonly /></td>
				<td><input class="text_small" name="cron_hours[<?php echo $Crontab['id_users_crontab']; ?>]" type="text" value="<?php echo $Crontab['hours']; ?>" readonly /></td>
				<td><input class="text_small" name="cron_days[<?php echo $Crontab['id_users_crontab']; ?>]" type="text" value="<?php echo $Crontab['days']; ?>" readonly /></td>
				<td><input class="text_small" name="cron_months[<?php echo $Crontab['id_users_crontab']; ?>]" type="text" value="<?php echo $Crontab['months']; ?>" readonly /></td>
				<td><input class="text_small" name="cron_numday[<?php echo $Crontab['id_users_crontab']; ?>]" type="text" value="<?php echo $Crontab['numday']; ?>" readonly /></td>
				<td rowspan="2"><input class="submit" name="cron_delete[<?php echo $Crontab['id_users_crontab']; ?>]" type="checkbox" value="<?php echo $Crontab['id_users_crontab']; ?>" readonly /></td>
			</tr>
			<tr>
				<td style="text-align:center;"><?php echo User_Synchronization_Command; ?></th>
				<td colspan="4"><input style="width: 100%;" name="cron_command[<?php echo $Crontab['id_users_crontab']; ?>]" type="text" value="<?php echo $Crontab['command']; ?>" readonly /></td>
			</tr>
<?php
		$CronFiles = array_diff($CronFiles, array($Crontab['command']));
		$Crontab_ID = $Crontab['id_users_crontab'];
	}

	echo '<tr><th colspan="6"></th></tr>';
	
	if ( !empty($CronFiles) ) {
		$Crontab_ID++;
?>
			<input name="cron_id" type="hidden" value="<?php echo $Crontab_ID; ?>" />
			<tr>
				<td><input class="text_small" name="cron_minutes" type="text" /></td>
				<td><input class="text_small" name="cron_hours" type="text" /></td>
				<td><input class="text_small" name="cron_days" type="text" /></td>
				<td><input class="text_small" name="cron_months" type="text" /></td>
				<td><input class="text_small" name="cron_numday" type="text" /></td>
				<td rowspan="2"><input class="submit" name="submit" type="submit" value="<?php echo User_Synchronization_Add; ?>" /></td>
			</tr>
			<tr>
				<td style="text-align:center;"><?php echo User_Synchronization_Command; ?></th>
				<td colspan="4">
				<select name="cron_command" style="width: 100%; height: 28px;">
<?php
				foreach($CronFiles as $Script) {
					echo '<option selected="selected" value="' . $Script . '">' . $Script . '</option>';
				}
?>
				</select>
				</td>
			</tr>
<?php
	}
?>
		</table>
		<div align="center"><p class="Comments"><?php echo User_Synchronization_Crontab_Comment; ?></p></div>
	</fieldset>

<?php
	switch ($IdentSync['mode_sync']) {
		case 'rsync':
			$mode_sync = '	<select name="mode_sync['.$IdentSync['ident_id'].']" style="width:80px; cursor: pointer;" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
								<option value="rsync" selected="selected">' .User_Synchronization_ModeSync_RSYNC. '</option>
								<option value="ftp">' .User_Synchronization_ModeSync_FTP. '</option>
							</select>';
			break;
		default:
			$mode_sync = '	<select name="mode_sync['.$IdentSync['ident_id'].']" style="width:80px; cursor: pointer;" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
								<option value="rsync">' .User_Synchronization_ModeSync_RSYNC. '</option>
								<option value="ftp" selected="selected">' .User_Synchronization_ModeSync_FTP. '</option>
							</select>';
			break;
	}
	switch ($IdentSync['create_subdir']) {
		case '0':
			$create_subdir = '<div align="center"><select name="create_subdir['.$IdentSync['ident_id'].']" style="width:60px; cursor: pointer;" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
								<option value="0" selected="selected">' .Global_No. '</option>
								<option value="1">' .Global_Yes. '</option>
							</select></div>';
			break;
		default:
			$create_subdir = '<div align="center"><select name="create_subdir['.$IdentSync['ident_id'].']" style="width:60px; cursor: pointer;" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
								<option value="0">' .Global_No. '</option>
								<option value="1" selected="selected">' .Global_Yes. '</option>
							</select></div>';
			break;
	}
	if ( $IdentSync['dst_dir'] == '' ) {
			$IdentDstDir = './';
	} else {
		$IdentDstDir = $IdentSync['dst_dir'];
	}
?>
	<fieldset style="vertical-align: text-top;">
	<legend><?php echo User_Synchronization_Title_Ident; ?></legend>
		<table>
			<tr>
				<th style="text-align:center;"><?php echo User_Synchronization_ModeSync; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_DstDir; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_DstSrv; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_DstPort; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_DstUser; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_DstPass; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_MaxSync; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_Subdir; ?></th>
			</tr>
			<input name="ident_id[<?php echo $IdentSync['ident_id']; ?>]" type="hidden" value="<?php echo $IdentSync['ident_id']; ?>" />
			<tr>
				<td><?php echo $mode_sync; ?></td>
				<td><input class="text_medium" name="sync_dstdir[<?php echo $IdentSync['ident_id']; ?>]" type="text" value="<?php echo $IdentDstDir; ?>" /></td>
				<td><input class="text_medium" name="sync_dstsrv[<?php echo $IdentSync['ident_id']; ?>]" type="text" value="<?php echo $IdentSync['dst_srv']; ?>" /></td>
				<td><input class="text_small" name="sync_dstport[<?php echo $IdentSync['ident_id']; ?>]" type="text" value="<?php echo $IdentSync['dst_port']; ?>" /></td>
				<td><input class="text_medium" name="sync_dstuser[<?php echo $IdentSync['ident_id']; ?>]" type="text" value="<?php echo $IdentSync['dst_user']; ?>" /></td>
				<td><input class="text_medium" name="sync_dstpass[<?php echo $IdentSync['ident_id']; ?>]" type="text" value="<?php echo $IdentSync['dst_pass']; ?>" /></td>
				<td><div align="center"><select name="sync_maxsync[<?php echo $IdentSync['ident_id']; ?>]" style="width:80px; height: 28px;">
<?php
				$MaxToSyncList = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
				foreach($MaxToSyncList as $MaxToSync) {
					if ( $MaxToSync == 0) {
						$MaxToSync_Display = '0 ('.Global_All.')';
					} else {
						$MaxToSync_Display = $MaxToSync;
					}
					if ( $MaxToSync == $IdentSync['max_to_sync']) {
						echo '<option selected="selected" value="' . $MaxToSync . '">' . $MaxToSync_Display . '</option>';
					} else {
						echo '<option value="' . $MaxToSync . '">' . $MaxToSync_Display . '</option>';
					}
				}
?>
				</select></div></td>
				<td><?php echo $create_subdir; ?></td>
			</tr>
		</table>
		<div align="center"><p class="Comments"><?php echo User_Synchronization_SyncComment; ?></p></div>
	</fieldset>

<?php
if ( count($FilesInQueue) > 0 ) {
?>
	<fieldset style="vertical-align: text-top;">
	<legend><?php echo User_Synchronization_Title_FilesToSync; ?></legend>
		<table>
			<tr>
				<th style="text-align:center;"><?php echo User_Synchronization_SyncMode; ?></th>
				<th style="text-align:center;"><?php echo Global_IsActive; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_FileName; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_rTorrentConfigDirectory; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_Comments; ?></th>
				<th style="text-align:center;"><?php echo Global_Table_Delete; ?></th>
			</tr>
<?php
	foreach($FilesInQueue as $Files) {
		$Id_list = $Files['list_id'];
		switch ($Files['is_active']) {
			case '0':
				$is_active = '	<select name="is_active['.$Id_list.']" style="width:60px; cursor: pointer;" class="redText" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
									<option value="0" selected="selected" class="redText">' .Global_No. '</option>
									<option value="1" class="greenText">' .Global_Yes. '</option>
								</select>';
				break;
			default:
				$is_active = '	<select name="is_active['.$Id_list.']" style="width:60px; cursor: pointer;" class="greenText" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
									<option value="0" class="redText">' .Global_No. '</option>
									<option value="1" selected="selected" class="greenText">' .Global_Yes. '</option>
								</select>';
				break;
		}
		switch ($Files['list_category']) {
			case 'direct':
					$list_category = '	<select name="list_category['.$Id_list.']" style="width:90px; cursor: pointer;" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
											<option value="direct" selected="selected">' .User_Synchronization_SynchroDirect. '</option>
											<option value="cron">' .User_Synchronization_SynchroCron. '</option>
										</select>';
					break;
				default: // cron
					$list_category = '	<select name="list_category['.$Id_list.']" style="width:90px; cursor: pointer;" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
											<option value="direct">' .User_Synchronization_SynchroDirect. '</option>
											<option value="cron" selected="selected">' .User_Synchronization_SynchroCron. '</option>
										</select>';
					break;
		}
?>
			<input name="list_id[<?php echo $Id_list; ?>]" type="hidden" value="<?php echo $Id_list; ?>" />
			<tr>
				<td><?php echo $list_category; ?></td>
				<td><?php echo $is_active; ?></td>
				<td><?php echo $Files['get_name']; ?></td>
				<td><?php echo $Files['CategoryDir']; ?></td>
				<td><?php echo $Files['comments']; ?></td>
				<td>
					<input class="submit" name="delete_filewaiting[<?php echo $Id_list; ?>]" type="checkbox" value="<?php echo $Id_list; ?>" />
				</td>
			</tr>
<?php
	}
?>
		</table>
	</fieldset>	
<?php
}
?>

	<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>" />

	</div>
</form>

<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery-dynamically-adding-form-elements.js"></script>

<?php
//#################### LAST LINE ######################################
