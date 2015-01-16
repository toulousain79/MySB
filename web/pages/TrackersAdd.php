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

global $MySB_DB;

if(isset($_POST)==true && empty($_POST)==false) {
	$success = true;

	switch ($_POST['submit']) {
		case "Save Changes":
		case "Add my trackers now !":
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
				$type = 'error';
				$message = 'Failed ! It was not possible to add trackers in the MySB database.';
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
					$type = 'error';
					$message = 'Failed ! It was not possible to delete tracker.';
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
		<legend>Add your trackers here (domain, hostname, url)</legend>
			<div id="input1" class="clonedInput">
				<input class="input_id" id="input_id" name="input_id[1]" type="hidden" value="1" />
				Domain: <input class="input_tracker_domain" id="tracker_domain" name="tracker_domain[1]" type="text" required="required" />
				Is active ?:	<select class="select_is_active" id="is_active" name="is_active[1]" style="width:60px; cursor: pointer;" required="required">
									<option value="0" selected="selected">No</option>
									<option value="1">Yes</option>
								</select>
			</div>

			<div style="margin-top: 10px; margin-bottom: 20px;">
				<input type="button" id="btnAdd" value="Add tracker domain" style="cursor: pointer;" />
				<input type="button" id="btnDel" value="Remove last" style="cursor: pointer;" />
			</div>

			<input class="submit" style="width:150px; margin-top: 10px; margin-bottom: 10px;" name="submit" type="submit" value="Add my trackers now !">
			<p class="Comments">If an error occurs when you add one of your trackers, it will be deleted.<br />
				The most common error is the verification of IP addresses associated with the host name (A type of DNS record).</p>
			<p class="Comments">The process of adding and trackers audit is started in the background and can take several seconds to several minutes.<br />
				The addition of the tracker is confirmed when remains in the list with the IP addresses associated with it.</p>				
		</fieldset>
	</form>
</div>

<form class="form_settings" method="post" action="">
	<div align="center">
		<table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;">Domain</th>
				<th style="text-align:center;">Address</th>
				<th style="text-align:center;">IPv4</th>
				<th style="text-align:center;">Ping Result</th>
				<th style="text-align:center;">SSL ?</th>
				<th style="text-align:center;">Active ?</th>
				<th style="text-align:center;">Delete ?</th>
			</tr>
<?php
$i = 0;
foreach($TrackersList as $Tracker) {
	$i++;

	switch ($Tracker["is_ssl"]) {
		case '0':
			$is_ssl = '	<select name="is_ssl['.$i.']" style="width:60px; background-color:#FEBABC;" disabled>
							<option value="0" selected="selected">No</option>
						</select>';
			break;
		default:
			$is_ssl = '	<select name="is_ssl['.$i.']" style="width:60px; background-color:#B3FEA5;" disabled>
							<option value="1" selected="selected">Yes</option>
						</select>';
			break;
	}

	switch ($Tracker["is_active"]) {
		case '0':
			$is_active = '	<select name="is_active['.$i.']" style="width:60px; cursor: pointer;" class="redText" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
								<option value="0" selected="selected" class="redText">No</option>
								<option value="1" class="greenText">Yes</option>
							</select>';
			break;
		default:
			$is_active = '	<select name="is_active['.$i.']" style="width:60px; cursor: pointer;" class="greenText" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
								<option value="0" class="redText">No</option>
								<option value="1" selected="selected" class="greenText">Yes</option>
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
						//$IPv4_List = $MySB_DB->select("trackers_list_ipv4", "ipv4", ["AND" => ["id_trackers_list" => $Tracker["id_trackers_list"]]]);
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
					<input class="submit" name="delete[<?php echo $Tracker["id_trackers_list"]; ?>]" type="submit" value="Delete" />
				</td>
			</tr>
			<input class="input_id" id="input_id" name="input_id[<?php echo $i; ?>]" type="hidden" value="<?php echo $i; ?>" />
<?php
} // foreach($TrackersList as $Tracker) {
?>
		</table>
		<input class="submit" style="width:120px; margin-top: 10px;" name="submit" type="submit" value="Save Changes">
	</div>
</form>

<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery-dynamically-adding-form-elements.js"></script>

<?php
//#################### LAST LINE ######################################
?>