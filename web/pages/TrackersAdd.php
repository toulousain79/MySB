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

	switch ($_POST['submit']) {
		case Global_SaveChanges:
		case MainUser_TrackersAdd_AddMyTrackers:
			$count = count($_POST['input_id']);

			for($i=1; $i<=$count; $i++) {
				$TrackerDomain = preg_replace('/\s\s+/', '', $_POST['tracker_domain'][$i]); 
				
				$TrackerDomain = GetOnlyDomain($TrackerDomain);
				$last_id_trackers_list = ManageUsersTrackers($TrackerDomain, $_POST['is_active'][$i]);

				if ( (!isset($last_id_trackers_list)) || ($last_id_trackers_list === false) ) {
					$success = false;
				}
			}

			if ( $success == true ) {
				$type = 'success';
			} else {
				$type = 'information';
				$message = Global_NoChange;
			}
			break;
		default: // delete
			if (isset($_POST['delete'])) {
				$count = count($_POST['delete']);

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

	GenerateMessage('GetTrackersCert.bsh', $type, $message);
}

$TrackersList = $MySB_DB->select("trackers_list", "*", ["origin" => "users", "ORDER" => "trackers_list.tracker_domain ASC"]);
?>

<div align="center" style="margin-top: 10px; margin-bottom: 20px;">
	<form id="myForm" class="form_settings" method="post" action="">
		<fieldset>
		<legend><?php echo MainUser_TrackersAdd_Title_AddTrackers; ?></legend>
			<div id="input1" class="clonedInput">
				<input class="input_id" id="input_id" name="input_id[1]" type="hidden" value="1" />
				<?php echo MainUser_TrackersAdd_TextAddress; ?>&nbsp;<input class="input_tracker_domain" id="tracker_domain" name="tracker_domain[1]" type="text" required="required" />
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

<form class="form_settings" method="post" action="">
	<div align="center">
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
	$i++;

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
					<?php echo $Tracker["tracker"]; ?>
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
			<input class="input_id" id="input_id" name="input_id[<?php echo $i; ?>]" type="hidden" value="<?php echo $i; ?>" />
<?php
} // foreach($TrackersList as $Tracker) {
?>
		</table>
		<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>">
	</div>
</form>

<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery-dynamically-adding-form-elements.js"></script>

<?php
//#################### LAST LINE ######################################
?>