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

require_once(WEB_INC . '/languages/' . $_SESSION['Language'] . '/' . basename(__FILE__));

global $MySB_DB;

if(isset($_POST)==true && empty($_POST)==false) {
	$success = true;
	$DisplayMessage = true;

	switch ($_POST['submit']) {
		case MainUser_TrackersAdd_ExtractAddress:
			$DisplayMessage = false;
			$target_file = '/tmp/' . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if file already exists
			if (file_exists($target_file)) {
				unlink($target_file);
			}
			// Allow certain file formats
			if( $imageFileType != "torrent" ) {
				$uploadOk = 0;
				$type = 'warning';
				$message = MainUser_TrackersAdd_OnlyTorrent;
				GenerateMessage('message_only', $type, $message, '');
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 1) {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$Content = fopen($target_file,"r");
					$Line = fgets($Content);
					preg_match_all('#http(.*)://#',$Line,$Proto);
					$Proto = $Proto[0][0];
					$Proto = strstr($Proto, '://', true);
					preg_match_all('#://(.*)/announce#',$Line,$TrackerAddress);
					$TrackerAddress = $TrackerAddress[0][0];
					$TrackerAddress = strstr($TrackerAddress, '//');
					$TrackerAddress = str_replace("/announce", "", $TrackerAddress);
					$TrackerAddress = str_replace("/", "", $TrackerAddress);
					$tab = explode(":", $TrackerAddress);
					$TrackerAddress = $tab[0];
					if ( $TrackerAddress != "" ) {
						$type = 'information';
						GenerateMessage('message_only', $type, $TrackerAddress, '');
						$TrackerAddress = ' value="'.$TrackerAddress.'" ';
					} else {
						$type = 'information';
						$message = MainUser_TrackersAdd_NoResult;
						GenerateMessage('message_only', $type, $message, '');
					}
					unlink('/tmp/'.$_FILES["fileToUpload"]["name"]);
				} else {
					$type = 'error';
					$message = MainUser_TrackersAdd_ErrorUpload;
					GenerateMessage('message_only', $type, $message, '');
				}
			}
			break;

		case MainUser_TrackersAdd_AddMyTrackers:
			$count = count($_POST['input_id']);

			for($i=1; $i<=$count; $i++) {
				if (!empty($_POST['input_tracker'][$i])) {
					$Tracker = preg_replace('/\s\s+/', '', $_POST['input_tracker'][$i]);
					if (filter_var($url, FILTER_VALIDATE_URL)) {
						$Tracker = parse_url($Tracker, PHP_URL_HOST);
					}
					$last_id_trackers_list = ManageUsersTrackers($Tracker, $_POST['is_active'][$i]);
					if ( $last_id_trackers_list == 0 ) {
						$success = false;
					}
				}
			}

			switch ($success) {
				case true:
					$type = 'success';
					break;
				default:
					$type = 'information';
					$message = Global_NoChange;
					break;
			}
			break;

		case Global_SaveChanges:
			$i=0;
			foreach($_POST['is_active'] as $key => $value) {
				$Value = $MySB_DB->update("trackers_list", ["is_active" => "$value", "to_check" => "$value"], ["id_trackers_list" => $key]);
				if ( $Value >= 1 ) {
					$i++;
				}
			}

			if ( $i >= 1 ) {
				$type = 'success';
			} else {
				$type = 'information';
				$message = Global_NoChange;
			}

			break;

		default: // delete
			if (isset($_POST['delete'])) {

				foreach($_POST['delete'] as $key => $value) {
					$result = $MySB_DB->delete("trackers_list_ipv4", ["id_trackers_list" => $key]);
					if ( $result = 0 ) {
						$success = false;
					}

					$result = $MySB_DB->delete("trackers_list", ["id_trackers_list" => $key]);
					if ( $result = 0 ) {
						$success = false;
					}
				}

				if ( $success == true ) {
					$type = 'success';
				} else {
					$type = 'information';
					$message = Global_NoChange;
				}
			}
			break;
	}

	if( $DisplayMessage == true ) {
		GenerateMessage('GetTrackersCert.bsh', $type, $message);
	}
}

$TrackersList = $MySB_DB->select("trackers_list", "*", ["origin" => "users", "ORDER" => "trackers_list.tracker_domain ASC"]);
if (empty($TrackersList)) {
	$ButtonSaveON = false;
} else {
	$ButtonSaveON = true;
}
?>

<div align="center" style="margin-top: 10px; margin-bottom: 20px;">
	<form id="CheckTorrent" class="form_settings" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend><?php echo MainUser_TrackersAdd_Title_AddTrackersFile; ?></legend>
			<?php echo MainUser_TrackersAdd_SelectTorrent; ?>&nbsp;
			<input type="file" name="fileToUpload" id="fileToUpload" />
			<input style="background: #3B3B3B; color: #FFF; width:<?php echo strlen(MainUser_TrackersAdd_ExtractAddress)*10; ?>px;" name="submit" type="submit" value="<?php echo MainUser_TrackersAdd_ExtractAddress; ?>">
		</fieldset>
	</form>
	<p></p>
	<form id="myForm" class="form_settings" method="post" action="">
		<fieldset>
		<legend><?php echo MainUser_TrackersAdd_Title_AddTrackersManual; ?></legend>
				<div id="input1" class="clonedInput">
					<input class="input_id" id="input_id" name="input_id[1]" type="hidden" value="1" />
					<?php echo MainUser_TrackersAdd_TextAddress; ?>&nbsp;<input class="input_tracker" id="input_tracker" name="input_tracker[1]" type="text" required="required" <?php echo $TrackerAddress; ?> />
					&nbsp;&nbsp;<?php echo Global_IsActive; ?>&nbsp;&nbsp;<select class="select_is_active" id="is_active" name="is_active[1]" style="width:60px; cursor: pointer;" required="required">
										<option value="0" selected="selected"><?php echo Global_No; ?></option>
										<option value="1"><?php echo Global_Yes; ?></option>
									</select>
				</div>

				<div style="margin-top: 10px; margin-bottom: 20px;">
					<input type="button" id="btnAdd" value="<?php echo MainUser_TrackersAdd_Btn_AddNewDomain; ?>" style="cursor: pointer;" />
					<input type="button" id="btnDel" value="<?php echo MainUser_TrackersAdd_Btn_RemoveLastTracker; ?>" style="cursor: pointer;" />
				</div>

				<input class="submit" style="width:<?php echo strlen(MainUser_TrackersAdd_AddMyTrackers)*10; ?>px; margin-top: 10px; margin-bottom: 10px;" name="submit" type="submit" value="<?php echo MainUser_TrackersAdd_AddMyTrackers; ?>">
				<p class="Comments"><?php echo MainUser_TrackersAdd_InfoAddTracker_1; ?></p>
				<br />
				<p class="Comments"><?php echo MainUser_TrackersAdd_InfoAddTracker_2; ?></p>
		</fieldset>
	</form>
</div>

<?php
	if ($ButtonSaveON) {
?>
<form class="form_settings" method="post" action="">
	<div align="center">
		<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-bottom: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>">

		<table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;"><?php echo MainUser_TrackersAdd_Table_Domain; ?></th>
				<th style="text-align:center;"><?php echo MainUser_TrackersAdd_Table_Address; ?></th>
				<th style="text-align:center;"><?php echo MainUser_TrackersAdd_Table_IPv4; ?></th>
				<th style="text-align:center;"><?php echo MainUser_TrackersAdd_Table_PingResult; ?></th>
				<th style="text-align:center;"><?php echo MainUser_TrackersAdd_Table_IsSSL; ?></th>
				<th style="text-align:center;"><?php echo Global_IsActive; ?></th>
				<th style="text-align:center;"><?php echo Global_Table_Delete; ?></th>
			</tr>
<?php
$i = 0;
foreach($TrackersList as $Tracker) {
	if (isset($Tracker)) {
		$i = $Tracker["id_trackers_list"];
	} else {
		$i++;
	}

	switch ($Tracker["is_ssl"]) {
		case '0':
			$is_ssl = '	<select name="is_ssl['.$i.']" style="width:60px; background-color:#FEBABC;" disabled>
							<option value="0" selected="selected">' .Global_No. '</option>
						</select>';
			break;
		default:
			$is_ssl = '	<select name="is_ssl['.$i.']" style="width:60px; background-color:#B3FEA5;" disabled>
							<option value="1" selected="selected">' .Global_Yes. '</option>
						</select>';
			break;
	}

	switch ($Tracker["is_active"]) {
		case '0':
			$is_active = '	<select name="is_active['.$i.']" style="width:60px; cursor: pointer;" class="redText" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
								<option value="0" selected="selected" class="redText">' .Global_No. '</option>
								<option value="1" class="greenText">' .Global_Yes. '</option>
							</select>';
			break;
		default:
			$is_active = '	<select name="is_active['.$i.']" style="width:60px; cursor: pointer;" class="greenText" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
								<option value="0" class="redText">' .Global_No. '</option>
								<option value="1" selected="selected" class="greenText">' .Global_Yes. '</option>
							</select>';
			break;
	}
?>
			<tr>
				<td>
					<input style="width:150px;" type="hidden" name="tracker_domain[<?php echo $i; ?>]" value="<?php echo $Tracker["tracker_domain"]; ?>" />
					<?php echo $Tracker["tracker_domain"]; ?>
				</td>
				<td>
					<input style="width:180px;" type="hidden" name="tracker[<?php echo $i; ?>]" value="<?php echo $Tracker["tracker"]; ?>" />
					<a target=_blank href="<?php echo ($Tracker["is_ssl"] == '0') ? 'http://' : 'https://'; echo $Tracker["tracker"]; ?>"><?php echo $Tracker["tracker"]; ?></a>
				</td>
				<td>
					<select style="width:140px;">
<?php
						$IPv4_List = $MySB_DB->select("trackers_list_ipv4", "ipv4", ["id_trackers_list" => $Tracker["id_trackers_list"]]);
						foreach($IPv4_List as $IPv4) {
							echo '<option>' .$IPv4. '</option>';
						}
?>
					</select>
				</td>
				<td>
					<?php echo $Tracker["ping"]; ?>
				</td>
				<td>
					<?php echo $is_ssl; ?>
				</td>
				<td>
					<?php echo $is_active; ?>
				</td>
				<td>
					<input class="submit" name="delete[<?php echo $Tracker["id_trackers_list"]; ?>]" type="submit" value="<?php echo Global_Delete; ?>" />
				</td>
			</tr>
			<input class="input_id_tab_tracker" id="input_id_tab_tracker" name="input_id_tab_tracker[<?php echo $i; ?>]" type="hidden" value="<?php echo $i; ?>" />
<?php
} // foreach($TrackersList as $Tracker) {
?>
		</table>

		<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>">
	</div>
</form>
<?php
	}
?>

<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery-dynamically-adding-form-elements.js"></script>

<?php
//#################### LAST LINE ######################################
