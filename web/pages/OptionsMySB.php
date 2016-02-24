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
$rTorrentVersionsList = array('v0.9.2', 'v0.9.6');
$LanguagesList = array('english', 'french');
$RefreshPage = 0;
$Change = 0;
$type = 'information';
$message = Global_NoChange;

// Get values from POST
$rTorrentVersion_POST = $_POST['rTorrentVersion'];
$rTorrentRestart_POST = $_POST['rTorrentRestart'];
$rTorrentNotify_POST = $_POST['rTorrentNotify'];
$Language_POST = $_POST['language'];

if (isset($_POST['submit'])) {
	switch ($_POST['submit']) {
		case User_OptionsMySB_Add:
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
					$rTorrentRestart_POST = 1;
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
					$rTorrentRestart_POST = 1;
					$Command = 'Options_MySB';
				}
			}
			break;

		default:	// Global_SaveChanges
			// Get values from database
			$rTorrentVersion_DB = $users_datas['rtorrent_version'];
			$rTorrentNotify_DB = $users_datas['rtorrent_notify'];
			$Language_DB = $users_datas['language'];

			// Crontab - Delete
			if ( isset($_POST['cron_delete']) ) {
				foreach ($_POST['cron_delete'] as $key) {
					$result = $MySB_DB->delete("users_crontab", ["id_users_crontab" => $key]);
					if ( $result > 0 ) {
						$Change++;
						$RefreshPage++;
						$rTorrentRestart_POST = 1;
					}
				}
			}

			// Sub-Directories - Add
			if (isset($_POST['input_id'])) {
				$count = count($_POST['input_id']);
				for($i=1; $i<=$count; $i++) {
					$Directory = ReplacesSpecialCharacters($_POST['directory'][$i]);
					$Directory = preg_replace('/\s\s+/', '', $Directory);
					$Directory = preg_replace('/\s+/', '_', $Directory);
					$Directory = preg_replace('/\W+/', '', $Directory);

					if ( !empty($Directory) ) {
						$IfExist = $MySB_DB->get("users_rtorrent_cfg", "id_users_rtorrent_cfg", [
																			"AND" => [
																				"id_users" => $UserID,
																				"sub_directory" => $Directory
																			]
																		]);

						if ( empty($IfExist) ) {
							$result = $MySB_DB->insert("users_rtorrent_cfg", ["id_users" => "$UserID", "sub_directory" => "$Directory", "can_be_deleted" => 1]);
							if( $result != 0 ) {
								$Change++;
								$RefreshPage++;
								$rTorrentRestart_POST = 1;
							}
						}
					}
				}
			}

			// Sub-Directories - Delete
			if (isset($_POST['delete_dir'])) {
				$MySB_DB->update("users_rtorrent_cfg", ["to_delete" => 0], ["id_users" => $UserID]);
				$count = count($_POST['delete_dir']);
				for($i=0; $i<=$count; $i++) {
					$ToDelDirectory = preg_replace('/\s\s+/', '', $_POST['delete_dir'][$i]);
					$result = $MySB_DB->update("users_rtorrent_cfg", ["to_delete" => 1], [
																							"AND" => [
																								"id_users" => $UserID,
																								"sub_directory" => $ToDelDirectory
																							]
																						]);
					if ( $result > 0 ) {
						$Change++;
						$RefreshPage++;
						$rTorrentRestart_POST = 1;
					}
				}
			}

			// Need to restart rTorrent ?
			if ( ($rTorrentVersion_POST != $rTorrentVersion_DB) || ($rTorrentRestart_POST == "1") ) {
				$rTorrentRestart_POST = 1;
				$Command = 'Options_MySB';
				$Change++;
				$RefreshPage++;
			}
			// Modification ?
			if ( $rTorrentNotify_POST != $rTorrentNotify_DB ) {
				$Change++;
				$RefreshPage++;
			}

			// Language
			if ( $Language_POST != $Language_DB ) {
				$Change++;
				$RefreshPage++;
				// Change language of Cakebox-Light
				ChangeCakeboxLanguage($CurrentUser, $Language_POST);

				// Change language of ownCloud
				ChangeOwnCloudLanguage($CurrentUser, $Language_POST);
			}

			break;
	}

	if( $Change >= 1 ) {
		$result = $MySB_DB->update("users", ["rtorrent_version" => "$rTorrentVersion_POST", "rtorrent_restart" => "$rTorrentRestart_POST", "rtorrent_notify" => "$rTorrentNotify_POST", "language" => "$Language_POST"], ["users_ident" => "$CurrentUser"]);

		if( $result >= 0 ) {
			$type = 'success';
			unset($message);
		}
	}

	GenerateMessage($Command, $type, $message);

	if( $RefreshPage == 1 ) {
		header('Refresh: 2; URL='.$_SERVER['HTTP_REFERER'].'');
	}
}

// Get values from database
$users_datas = $MySB_DB->get("users", "*", ["users_ident" => "$CurrentUser"]);
$users_directories = $MySB_DB->select("users_rtorrent_cfg", "*", ["id_users" => "$UserID"]);
$users_crontab = $MySB_DB->select("users_crontab", "*", ["id_users" => "$UserID"]);
$rtorrent_version = $users_datas['rtorrent_version'];
$rtorrent_restart = $users_datas['rtorrent_restart'];
$rtorrent_notify = $users_datas['rtorrent_notify'];
$language = $users_datas['language'];

$CronFiles = array();
if($dossier = opendir("/home/$CurrentUser/scripts")) {
	while(false !== ($fichier = readdir($dossier))) {
		if($fichier != '.' && $fichier != '..') {
			$info = new SplFileInfo($fichier);
			if ( $info->getExtension() == 'cron' ) {
				array_push($CronFiles, $fichier);
			}
		}
	}
}
?>

<form class="form_settings" method="post" action="">
<div align="center" style="margin-top: 10px; margin-bottom: 20px;">
	<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>" />

	<fieldset>
	<legend><?php echo User_OptionsMySB_Title_rTorrent; ?></legend>

	<table>
		<tr>
			<td><?php echo User_OptionsMySB_rTorrentVersion; ?></td>
			<td>
				<select name="rTorrentVersion" style="width:80px; height: 28px;">';
				<?php foreach($rTorrentVersionsList as $Version) {
					if ( $rtorrent_version == $Version) {
						echo '<option selected="selected" value="' . $Version . '">' . $Version . '</option>';
					} else {
						echo '<option value="' . $Version . '">' . $Version . '</option>';
					}
				} ?>
				</select>
			</td>
			<td><?php echo User_OptionsMySB_rTorrentRestart; ?></td>
			<td>
				<select name="rTorrentRestart" style="width:80px; height: 28px;">';
				<?php switch ($rtorrent_restart) {
					case '1':
						echo '<option selected="selected" value="1">' .Global_Yes. '</option>';
						echo '<option value="0">' .Global_No. '</option>';
						break;
					default:
						echo '<option value="1">' .Global_Yes. '</option>';
						echo '<option selected="selected" value="0">' .Global_No. '</option>';
						break;
				} ?>
				</select>
			</td>
			<td><?php echo User_OptionsMySB_NotifyEmail; ?></td>
			<td>
				<select name="rTorrentNotify" style="width:80px; height: 28px;">';
				<?php switch ($rtorrent_notify) {
					case '1':
						echo '<option selected="selected" value="1">' .Global_Yes. '</option>';
						echo '<option value="0">' .Global_No. '</option>';
						break;
					default:
						echo '<option value="1">' .Global_Yes. '</option>';
						echo '<option selected="selected" value="0">' .Global_No. '</option>';
						break;
				} ?>
				</select>
			</td>
		</tr>
	</table>
	</fieldset>

	<fieldset>
	<legend><?php echo User_OptionsMySB_Title_Portal; ?></legend>
	<table>
		<tr>
			<td><?php echo User_OptionsMySB_Language; ?></td>
			<td>
				<select name="language" style="width:90px; height: 28px;">';
				<?php switch ($language) {
					case 'fr':
						echo '<option selected="selected" value="fr">' .User_OptionsMySB_Lang_French. '</option>';
						echo '<option value="en">' .User_OptionsMySB_Lang_English. '</option>';
						break;
					default:
						echo '<option value="fr">' .User_OptionsMySB_Lang_French. '</option>';
						echo '<option selected="selected" value="en">' .User_OptionsMySB_Lang_English. '</option>';
						break;
				} ?>
				</select>
			</td>
		</tr>
	</table>
	</fieldset>

	<br />

	<fieldset style="vertical-align: text-top;">
	<legend><?php echo User_OptionsMySB_Title_rTorrentConfig; ?></legend>
<?php
if ( !empty($users_directories) ) {
?>
		<table>
			<tr>
				<th style="text-align:center;"><?php echo User_OptionsMySB_rTorrentConfig_Table_Title; ?></th>
				<th style="text-align:center;"><?php echo Global_Table_Delete; ?></th>
			</tr>
<?php
	foreach($users_directories as $Directory) {
?>
			<tr>
				<td><?php echo $Directory['sub_directory']; ?></td>
				<td>
					<input class="submit" name="delete_dir[]" type="checkbox" value="<?php echo $Directory['sub_directory']; ?>" <?php echo ($Directory['to_delete'] == '1') ? 'checked' : ''; ?> />
				</td>
			</tr>
<?php
	}
}
?>
			<tr><th colspan="2"></th></tr>
		</table>
		<div id="input1" class="clonedInput">
			<input class="input_id" id="input_id" name="input_id[1]" type="hidden" value="1" />
			<?php echo User_OptionsMySB_rTorrentConfigDirectory; ?>&nbsp;<input class="input_directory" id="directory" name="directory[1]" type="text" />
		</div>
		<div style="margin-top: 10px; margin-bottom: 20px;">
			<input type="button" id="btnAdd" value="<?php echo User_OptionsMySB_rTorrentConfigAddDirectory; ?>" style="cursor: pointer;" />
			<input type="button" id="btnDel" value="<?php echo User_OptionsMySB_rTorrentConfigDelDirectory; ?>" style="cursor: pointer;" />
		</div>		
		<div align="center"><p class="Comments"><?php echo User_OptionsMySB_rTorrentConfig_Comment; ?></p></div>
	</fieldset>

	<fieldset style="vertical-align: text-top;">
	<legend><?php echo User_OptionsMySB_Title_Crontab; ?></legend>
		<table>
			<tr>
				<th style="text-align:center;"><?php echo User_OptionsMySB_Minutes; ?></th>
				<th style="text-align:center;"><?php echo User_OptionsMySB_Hours; ?></th>
				<th style="text-align:center;"><?php echo User_OptionsMySB_Days; ?></th>
				<th style="text-align:center;"><?php echo User_OptionsMySB_Months; ?></th>
				<th style="text-align:center;"><?php echo User_OptionsMySB_NumDay; ?></th>
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
				<td style="text-align:center;"><?php echo User_OptionsMySB_Command; ?></th>
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
				<td rowspan="2"><input class="submit" name="submit" type="submit" value="<?php echo User_OptionsMySB_Add; ?>" /></td>
			</tr>
			<tr>
				<td style="text-align:center;"><?php echo User_OptionsMySB_Command; ?></th>
				<td colspan="4">
				<select name="cron_command" style="width: 100%;">';
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
		<div align="center"><p class="Comments"><?php echo User_OptionsMySB_Crontab_Comment; ?></p></div>
	</fieldset>

	<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>" />

	</div>
</form>

<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery-dynamically-adding-form-elements.js"></script>

<?php
//#################### LAST LINE ######################################
