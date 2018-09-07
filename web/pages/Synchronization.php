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

global $MySB_DB, $CurrentUser;
require_once(WEB_INC . '/languages/' . $_SESSION['Language'] . '/' . basename(__FILE__));

// VARs
$users_datas = $MySB_DB->get("users", ["id_users"], ["users_ident" => "$CurrentUser"]);
$UserID = $users_datas['id_users'];
$Command = 'message_only';
$RefreshPage = 0;
$Change = 0;
$type = 'information';
$message = Global_NoChange;

use Medoo\Medoo;
$Sync_DB = new medoo([
	'database_type' => 'sqlite',
	'database_file' => "/home/$CurrentUser/db/$CurrentUser.sq3",
	'database_name' => 'Sync'
]);

// Get values from POST
if (isset($_POST['start'])) {
	$ScriptName = $MySB_DB->get("users_scripts", "script", ["id_users" => "$UserID"]);
	if ( $ScriptName != '' ) {
		switch ($_POST['start']) {
			case User_Synchronization_StartDirect:
				$ScriptMode = 'DIRECT';
				break;
			default:
			case User_Synchronization_StartPlanned:
				$ScriptMode = 'CRON';
				break;
		}
		$Command = 'UserScript_StartSynchro';
		$type = 'success';
		unset($message);
		$args = "$ScriptName|$ScriptMode";

		GenerateMessage($Command, $type, $message, $args);
	}
}

if (isset($_POST['add_file'])) {
	$value = explode("|", $_POST['downloaded_files']);
	$downloaded_files = $value[0];
	$addfile_sub_directory = $value[1];

	$Sync_DB->insert("list", [
										"list_category" => "direct",
										"is_active" => 1,
										"get_base_path" => "/home/$CurrentUser/rtorrent/complete/$addfile_sub_directory/$downloaded_files",
										"get_directory" => "/home/$CurrentUser/rtorrent/complete/$addfile_sub_directory",
										"get_custom1" => "$addfile_sub_directory",
										"get_name" => "$downloaded_files",
										"get_loaded_file" => "/home/$CurrentUser/rtorrent/watch/$addfile_sub_directory",
										"to_del" => 0
										]);
	$result = $Sync_DB->id();

	if( $result != 0 ) {
		$Change++;
		$Command = 'Options_MySB';
	}
}

if (isset($_POST['submit'])) {
	switch ($_POST['submit']) {
		case User_Synchronization_Add:
			// Crontab - Add
			$CronID_POST = $_POST['cron_id'];
			$CronMinutes_POST = $_POST['cron_minutes'];
			$CronHours_POST = $_POST['cron_hours'];
			if ( $CronHours_POST == '00' ) {
				$CronHours_POST = '0';
			}
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
				$MySB_DB->insert("users_crontab", [
															"id_users" => "$UserID",
															"minutes" => "$CronMinutes_POST",
															"hours" => "$CronHours_POST",
															"days" => "$CronDays_POST",
															"months" => "$CronMonths_POST",
															"numday" => "$CronNumday_POST",
															"command" => "$CronCommand_POST",
															]);
				$result = $MySB_DB->id();

				if( $result != 0 ) {
					$Change++;
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
					$Command = 'Options_MySB';
				}
			}
			break;

		default:	// Global_SaveChanges
			// Script name for direct synchro
			if ( isset($_POST['script_name']) ) {
				$ScriptName = $_POST['script_name'];
				$IfExist = $MySB_DB->get("users_scripts", "id_users_scripts", ["AND" => ["id_users" => $UserID,"sync_mode" => "direct"]]);

				if ( empty($IfExist) ) {
					$MySB_DB->insert("users_scripts", ["id_users" => "$UserID", "sync_mode" => "direct", "script" => "$ScriptName"]);
					$result = $MySB_DB->id();
					if( $result != 0 ) {
						$Change++;
					}
				} else {
					$result = $MySB_DB->update("users_scripts", ["id_users" => "$UserID", "sync_mode" => "direct", "script" => "$ScriptName"], ["id_users" => $UserID]);
					if( $result != 0 ) {
						$Change++;
					}
				}
			}

			// Crontab - Delete
			if ( isset($_POST['cron_delete']) ) {
				foreach ($_POST['cron_delete'] as $key) {
					$result = $MySB_DB->delete("users_crontab", ["id_users_crontab" => $key]);
					if ( $result > 0 ) {
						$Change++;
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

				$result = $MySB_DB->update("users_rtorrent_cfg", [
																	"sync_mode" => $sync_mode,
																	"to_delete" => $to_delete
																], [
																	"AND" => [
																		"id_users" => $UserID,
																		"sub_directory" => $current_directory
																	]
																]);
				if ( $result > 0 ) {
					$Change++;
					if( $to_delete == 1 ) {
						$RefreshPage++;
						$rTorrentRestart_POST = 1;
						$Command = 'Restart_rTorrent';
					} else {
						$Command = 'Options_MySB';
					}
				}
			}

			// Sub-Directories - Add
			if ( (isset($_POST['input_id'])) && (isset($_POST['input_directory'][1])) ) {
				$IfNextCloud = $MySB_DB->get("services", "is_installed", ["serv_name" => "NextCloud"]);
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
							$MySB_DB->insert("users_rtorrent_cfg", ["id_users" => "$UserID", "sub_directory" => "$Directory", "sync_mode" => $SyncMode, "can_be_deleted" => 1]);
							$result = $MySB_DB->id();
							if( $result != 0 ) {
								$Change++;
								$RefreshPage++;
								$rTorrentRestart_POST = 1;
								$Command = 'Restart_rTorrent';
							}
							// NextCloud files scan
							if ( $IfNextCloud == '1' ) {
								$MySB_DB->update("system", ["nextcloud_cron" => 1], ["id_system" => 1]);
							}
						}
					}
				}
			}

			// Identification
			if ( $_POST['sync_dstdir'][1] == '' ) {
					$IdentDstDir = './';
			} else {
				$IdentDstDir = $_POST['sync_dstdir'][1];
			}
			$result = $Sync_DB->update("ident", [
													"mode_sync" => $_POST['mode_sync'][1],
													"dst_dir" => $IdentDstDir,
													"dst_srv" => $_POST['sync_dstsrv'][1],
													"dst_port" => $_POST['sync_dstport'][1],
													"dst_user" => $_POST['sync_dstuser'][1],
													"dst_pass" => $_POST['sync_dstpass'][1],
													"max_to_sync" => $_POST['sync_maxsync'][1],
													"create_subdir" => $_POST['create_subdir'][1],
													"MailObjectOK" => $_POST['MailObjectOK'][1],
													"MailObjectKO" => $_POST['MailObjectKO'][1]
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
$users_directories = $MySB_DB->select("users_rtorrent_cfg", "*", ["id_users" => "$UserID"]);
$users_crontab = $MySB_DB->select("users_crontab", "*", ["id_users" => "$UserID"]);
$users_scripts = $MySB_DB->get("users_scripts", "*", ["id_users" => "$UserID"]);
$IdentSync = $Sync_DB->get("ident", "*", ["ident_id" => 1]);
$FilesInQueue = $Sync_DB->select("list", "*");
$DirectPid = $Sync_DB->get("list", "list_id", ["AND" => ["pid[!]" => '',"list_category" => "direct"]]);
$CronPid = $Sync_DB->get("list", "list_id", ["AND" => ["pid[!]" => '',"list_category" => "cron"]]);

$CronFiles = array();
if($dir = opendir("/home/$CurrentUser/scripts")) {
	while(false !== ($file = readdir($dir))) {
		if($file != '.' && $file != '..') {
			$info = new SplFileInfo($file);
			if ( $info->getExtension() == 'sh' ) {
				array_push($CronFiles, $file);
			}
		}
	}
}
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
	$DisplayIdent=0;
	$DisplayDirect=0;
	$DisplayCron=0;
	foreach($users_directories as $Directory) {
		switch ($Directory['sync_mode']) {
			case '2':
				$DisplayIdent++;
				$DisplayDirect++;
				$sync_mode = '	<select name="sync_mode[]" style="width:300px; height:28px;">
									<option value="2" selected="selected">' .User_Synchronization_DirectSync. '</option>
									<option value="1">' .User_Synchronization_CronOnly. '</option>
									<option value="0">' .User_Synchronization_IgnoreSync. '</option>
								</select>';
				break;
			case '1':
				$DisplayIdent++;
				$DisplayCron++;
				$sync_mode = '	<select name="sync_mode[]" style="width:300px; height:28px;">
									<option value="2">' .User_Synchronization_DirectSync. '</option>
									<option value="1" selected="selected">' .User_Synchronization_CronOnly. '</option>
									<option value="0">' .User_Synchronization_IgnoreSync. '</option>
								</select>';
				break;
			default:
				$sync_mode = '	<select name="sync_mode[]" style="width:300px; height:28px;">
									<option value="2">' .User_Synchronization_DirectSync. '</option>
									<option value="1">' .User_Synchronization_CronOnly. '</option>
									<option value="0" selected="selected">' .User_Synchronization_IgnoreSync. '</option>
								</select>';
				break;
		}
?>
			<tr>
				<td><?php echo $Directory['sub_directory']; ?><input class="directory" id="directory" name="directory[]" type="hidden" value="<?php echo $Directory['sub_directory']; ?>" /></td>
				<td>
					<?php echo $sync_mode; ?>
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

<?php
if ( $DisplayIdent >= 1 ) {
?>
	<fieldset style="vertical-align: text-top;">
	<legend><?php echo User_Synchronization_Title_Scripts; ?></legend>
<?php
	if ( $DisplayDirect >= 1 ) {
?>
		<table>
			<tr>
				<th style="text-align:center;"><?php echo User_Synchronization_ScriptsDirect; ?></th>
			</tr>
			<tr>
				<td>
					<select name="script_name" style="width:100%; height: 28px;">
<?php
				foreach($CronFiles as $Script) {
					if ( $users_scripts['script'] == $Script ) {
						echo '<option selected="selected" value="' . $Script . '">' . $Script . '</option>';
					} else {
						echo '<option value="' . $Script . '">' . $Script . '</option>';
					}
				}
?>
					</select>
				</td>
			</tr>
		</table>
		<div align="center"><p class="Comments"><?php echo User_Synchronization_ScriptsComment; ?></p></div>
<?php
	}
	if ( ($DisplayDirect >= 1) && ($DisplayCron >= 1) ) {
		echo '<br />';
	}

	if ( $DisplayCron >= 1 ) {
?>
		<table>
			<tr>
				<th colspan="6" style="text-align:center;"><?php echo User_Synchronization_ScriptsCron; ?></th>
			</tr>
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
<?php
	}
?>
	</fieldset>

<?php
	} // if ( $DisplayIdent >= 1 ) {

	switch ($IdentSync['mode_sync']) {
		case 'rsync':
			$mode_sync = '	<select name="mode_sync['.$IdentSync['ident_id'].']" style="width:80px; cursor: pointer;" id="mySelect">
								<option value="rsync" selected="selected">' .User_Synchronization_ModeSync_RSYNC. '</option>
								<option value="ftp">' .User_Synchronization_ModeSync_FTP. '</option>
							</select>';
			break;
		default:
			$mode_sync = '	<select name="mode_sync['.$IdentSync['ident_id'].']" style="width:80px; cursor: pointer;" id="mySelect">
								<option value="rsync">' .User_Synchronization_ModeSync_RSYNC. '</option>
								<option value="ftp" selected="selected">' .User_Synchronization_ModeSync_FTP. '</option>
							</select>';
			break;
	}
	switch ($IdentSync['create_subdir']) {
		case '0':
			$create_subdir = '<div align="center"><select name="create_subdir['.$IdentSync['ident_id'].']" style="width:60px; cursor: pointer;" id="mySelect">
								<option value="0" selected="selected">' .Global_No. '</option>
								<option value="1">' .Global_Yes. '</option>
							</select></div>';
			break;
		default:
			$create_subdir = '<div align="center"><select name="create_subdir['.$IdentSync['ident_id'].']" style="width:60px; cursor: pointer;" id="mySelect">
								<option value="0">' .Global_No. '</option>
								<option value="1" selected="selected">' .Global_Yes. '</option>
							</select></div>';
			break;
	}

if ( $DisplayIdent >= 1 ) {
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
				<td><input class="text_medium" name="sync_dstdir[<?php echo $IdentSync['ident_id']; ?>]" type="text" value="<?php echo $IdentSync['dst_dir']; ?>" /></td>
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
		<table style="width:100%">
			<tr>
				<th style="text-align:center;"><?php echo User_Synchronization_MailObjectOK; ?></th>
				<th style="text-align:center;"><?php echo User_Synchronization_MailObjectKO; ?></th>
			</tr>
			<tr>
				<td><input style="width:100%; cursor: pointer;" name="MailObjectOK[<?php echo $IdentSync['ident_id']; ?>]" type="text" value="<?php echo $IdentSync['MailObjectOK']; ?>" /></td>
				<td><input style="width:100%; cursor: pointer;" name="MailObjectKO[<?php echo $IdentSync['ident_id']; ?>]" type="text" value="<?php echo $IdentSync['MailObjectKO']; ?>" /></td>
			</tr>
		</table>
		<div align="center"><p class="Comments"><?php echo User_Synchronization_SyncComment; ?></p></div>
	</fieldset>

<?php
} // if ( $DisplayIdent >= 1 ) {
if ( count($FilesInQueue) > 0 ) {
?>
	<br />
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
	$CountDirect=0;
	$CountCron=0;
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
					$CountDirect++;
					$list_category = '	<select name="list_category['.$Id_list.']" style="width:90px; cursor: pointer;" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
											<option value="direct" selected="selected">' .User_Synchronization_SynchroDirect. '</option>
											<option value="cron">' .User_Synchronization_SynchroCron. '</option>
										</select>';
					break;
				default: // cron
					$CountCron++;
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
				<td><?php echo $Files['get_custom1']; ?></td>
				<td><?php echo $Files['comments']; ?></td>
				<td>
					<input class="submit" name="delete_filewaiting[<?php echo $Id_list; ?>]" type="checkbox" value="<?php echo $Id_list; ?>" />
				</td>
			</tr>
<?php
	}
?>
		</table>
<?php
	if ( ($IdentSync['dst_dir'] != '') && ($IdentSync['dst_srv'] != '') && ($IdentSync['dst_port']) ) {
		if ( ($users_scripts['script'] != '') && ($CountDirect >= 1) ) {
			if ( ($DirectPid == '') ) {
				echo '<input style="cursor: pointer; width:' . strlen(User_Synchronization_StartDirect)*10 . 'px; margin-top: 10px; margin-bottom: 10px;" name="start" type="submit" value="'.User_Synchronization_StartDirect.'" />';
			}
		}
		if ( (count($users_crontab) > 0) && ($CountCron >= 1) ) {
			if ( ($CronPid == '') ) {
				echo '&nbsp;&nbsp;';
				echo '<input style="cursor: pointer; width:' . strlen(User_Synchronization_StartPlanned)*10 . 'px; margin-top: 10px; margin-bottom: 10px;" name="start" type="submit" value="'.User_Synchronization_StartPlanned.'" />';
			}
		}
	}
?>
	</fieldset>
<?php
}

$SelectOptions = array();
foreach($users_directories as $Directory) {
	if ($dir = opendir("/home/$CurrentUser/rtorrent/complete/".$Directory['sub_directory']."/")) {
		$files = array();
		while ($files[] = readdir($dir));
		closedir($dir);
		sort($files);
		foreach ($files as $file) {
			if($file != '.' && $file != '..' && $file != '') {
				$SelectOptions[] = '<option value="' .$file. '|' .$Directory['sub_directory']. '">'. $Directory['sub_directory'] .'&nbsp;&nbsp;|&nbsp;&nbsp;'. $file . '</option>';
			}
		}
	}
}

if ( !empty($SelectOptions) ) {
?>
	<br />
	<fieldset style="vertical-align: text-top;">
	<legend><?php echo User_Synchronization_Title_DownloadedFiles; ?></legend>
		<table style="width:100%">
			<tr>
				<th style="text-align:center;"><?php echo User_Synchronization_Files; ?></th>
				<th style="text-align:center;"></th>
			</tr>
			<tr>
				<td><div align="center"><select name="downloaded_files" style="width:100%; height: 28px;">
<?php
			foreach($SelectOptions as $Option) {
				echo $Option;
			}
?>
				</select></div></td>
				<td><input class="submit" style="width:<?php echo strlen(User_Synchronization_AddFiles)*10; ?>px" name="add_file" type="submit" value="<?php echo User_Synchronization_AddFiles; ?>" /></td>
			</tr>
		</table>
		<div align="center"><p class="Comments"><?php echo User_Synchronization_AddFilesComment; ?></p></div>
	</fieldset>
<?php
} //if ( !empty($SelectOptions) ) {
?>

	<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>" />

	</div>
</form>

<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery-dynamically-adding-form-elements.js"></script>

<?php
//#################### LAST LINE ######################################
