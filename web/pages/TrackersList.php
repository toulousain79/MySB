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

global $MySB_DB, $CurrentUser;

$IsMainUser = (MainUser($CurrentUser)) ? true : false;

if(isset($_POST)==true && empty($_POST)==false) {
	$success = true;

	switch ($_POST['submit']) {
		case Global_SaveChanges:
			for($i=0, $count = count($_POST['tracker_domain']);$i<$count;$i++) {
				switch ($_POST['is_active'][$i]) {
					case "1":
						$to_check = 1;
						break;
					default:
						$to_check = 0;
						break;
				}

				$value = $MySB_DB->update("trackers_list", ["is_active" => $_POST['is_active'][$i], "to_check" => $to_check], ["tracker_domain" => $_POST['tracker_domain'][$i]]);

				$result = $result+$value;
			}

			if ( $result == 0 ) {
				$success = false;
			} else {
				$success = true;
			}

			if ( $success == true ) {
				$type = 'success';
			} else {
				$type = 'error';
				$message = Global_FailedUpdateMysbDB;
			}
			break;
		default: //Delete
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
					$type = 'error';
					$message = User_TrackersAdd_Btn_RemoveLastTracker;
				}
			}
			break;
	}

	GenerateMessage('GetTrackersCert.bsh', $type, $message);
}

$TrackersList = $MySB_DB->select("trackers_list", "*", ["ORDER" => "trackers_list.tracker_domain ASC"]);
?>

<form class="form_settings" method="post" action="">
	<div align="center">

	<?php if ( $IsMainUser ) { ?>
		<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-bottom: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>">
	<?php } ?>

		<table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;"><?php echo User_TrackersList_Table_Domain; ?></th>
				<th style="text-align:center;"><?php echo User_TrackersList_Table_Address; ?></th>
				<th style="text-align:center;"><?php echo User_TrackersList_Table_Origin; ?></th>
				<th style="text-align:center;"><?php echo User_TrackersList_Table_IPv4; ?></th>
				<th style="text-align:center;"><?php echo User_TrackersList_Table_PingResult; ?></th>
				<th style="text-align:center;"><?php echo User_TrackersList_Table_IsSSL; ?></th>
				<th style="text-align:center;"><?php echo Global_IsActive; ?></th>
<?php if ( $IsMainUser ) { ?>
				<th style="text-align:center;"><?php echo Global_Table_Delete; ?></th>
<?php } ?>
			</tr>
<?php
foreach($TrackersList as $Tracker) {
	switch ($Tracker["origin"]) {
		case 'users':
			if ( $IsMainUser ) {
				$origin = '<td><input class="submit" name="delete['. $Tracker["id_trackers_list"] .']" type="submit" value="Delete" /></td>';
			} else {
				$origin = '<td></td>';
			}
			break;
		default:
			if ( $IsMainUser ) {
				$origin = '<td></td>';
			} else {
				$origin = '';
			}
			break;
	}

	switch ($Tracker["is_ssl"]) {
		case '0':
			$is_ssl = '	<select name="is_ssl[]" style="width:60px; background-color:#FEBABC;" disabled>
							<option value="0" selected="selected">' .Global_No. '</option>
						</select>';
			break;
		default:
			$is_ssl = '	<select name="is_ssl[]" style="width:60px; background-color:#B3FEA5;" disabled>
							<option value="1" selected="selected">' .Global_Yes. '</option>
						</select>';
			break;
	}

	switch ($Tracker["is_active"]) {
		case '0':
			if ( $IsMainUser ) {
				$is_active = '	<select name="is_active[]" style="width:60px;" class="redText" onchange="this.className=this.options[this.selectedIndex].className">
									<option value="0" selected="selected" class="redText">' .Global_No. '</option>
									<option value="1" class="greenText">' .Global_Yes. '</option>
								</select>';
			} else {
				$is_active = '	<select name="is_active[]" style="width:60px;" class="redText" disabled>
									<option value="0" selected="selected">' .Global_No. '</option>
								</select>';
			}
			break;
		default:
			if ( $IsMainUser ) {
				$is_active = '	<select name="is_active[]" style="width:60px;" class="greenText" onchange="this.className=this.options[this.selectedIndex].className">
									<option value="0" class="redText">' .Global_No. '</option>
									<option value="1" selected="selected" class="greenText">' .Global_Yes. '</option>
								</select>';
			} else {
				$is_active = '	<select name="is_active[]" style="width:60px;" class="greenText" disabled>
									<option value="1" selected="selected" class="greenText">' .Global_Yes. '</option>
								</select>';
			}
			break;
	}
?>
			<tr>
				<td>
					<input style="width:150px;" type="hidden" name="tracker_domain[]" value="<?php echo $Tracker["tracker_domain"]; ?>" />
					<?php echo $Tracker["tracker_domain"]; ?>
				</td>
				<td>
					<input style="width:180px;" type="hidden" name="tracker[]" value="<?php echo $Tracker["tracker"]; ?>" />
					<?php echo $Tracker["tracker"]; ?>
				</td>
				<td>
					<input style="width:60px;" type="hidden" name="origin[]" value="<?php echo $Tracker["origin"]; ?>" />
					<?php echo $Tracker["origin"]; ?>
				</td>
				<td>
					<select style="width:150px;">
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
					<?php echo $origin; ?>
			</tr>
<?php
} // foreach($TrackersList as $Tracker) {
?>

		</table>
		<?php if ( $IsMainUser ) { ?>
			<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>">
		<?php } ?>
	</div>
</form>

<?php
//#################### LAST LINE ######################################
