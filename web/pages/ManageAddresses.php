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

// Vars
$UserAddress = $_SERVER['REMOTE_ADDR'];
$UserID = $MySB_DB->get("users", "id_users", ["users_ident" => "$CurrentUser"]);

if(isset($_POST)==true && empty($_POST)==false) {
	$success = true;

	switch ($_POST['submit']) {
		case "Add my addresses now !":
			$count = count($_POST['input_id']);

			for($i=1; $i<=$count; $i++) {
				// test if IP or hostname (dynamic IP)
				$CleanAddress = preg_replace('/\s\s+/', '', $_POST['address'][$i]); 
				if ( !ValidateIPv4($CleanAddress) ) {
					// IP is not valid (hostname)
					$IPv4 = gethostbyname($CleanAddress);

					if (!filter_var($IPv4, FILTER_VALIDATE_IP)) {
						$success = false;
						$message = 'The host name does not return a valid IP address.';
					} else {
						$last_id_address = ManageUsersAddresses($CurrentUser, $IPv4, $CleanAddress, $_POST['is_active'][$i], 'hostname');
						if ($last_id_address == false) {
							$success = false;
							$message = 'Failed ! It was not possible to update hostname address in the MySB database.';
						}
					}
				} else {
					// IP is valid
					$CleanAddress = preg_replace('/\s\s+/', '', $_POST['address'][$i]); 
					if ( ValidateIPv4($CleanAddress) ) {
						// IP is valid
						$HostName = gethostbyaddr($CleanAddress);
						$last_id_address = ManageUsersAddresses($CurrentUser, $CleanAddress, $HostName, $_POST['is_active'][$i], 'ipv4');
						if ($last_id_address == false) {
							$success = false;
							$message = 'Failed ! It was not possible to update IPv4 address in the MySB database.';
						}
					} else {
						// IP is not valid (private ?)
						$success = false;
						$message = 'You must enter a public IPv4 address.';	
					}
				}
			}

			if ( $success == true ) {
				$type = 'success';
				$message = 'Success !<br /><br />Please, Check your addresses<br />and click on \"Save Changes\"';
			} else {
				$type = 'error';
			}

			GenerateMessage('ManageAddresses', $type, $message, '');
			break;
		case "Save Changes":
			$success = true;
			$count = count($_POST['input_id']);

			for($i=1; $i<=$count; $i++) {
				$CleanIPv4 = preg_replace('/\s\s+/', '', $_POST['ipv4'][$i]); 
				$CleanHostname = preg_replace('/\s\s+/', '', $_POST['hostname'][$i]); 
				$last_id_address = $MySB_DB->update("users_addresses", ["is_active" => $_POST['is_active'][$i]], [
																												"AND" => [
																													"ipv4" => "$CleanIPv4",
																													"hostname" => "$CleanHostname"
																												]
																											]);

				if ($last_id_address == false) {
					$success = false;
				}
			}

			if ( $success == true ) {
				$type = 'success';
			} else {
				$type = 'error';
				$message = 'Failed ! It was not possible to update addresses informations.';
			}

			if ( isset($_SESSION['page']) && ($_SESSION['page'] == 'ManageAddresses') ) { // by NewUser.php
				exec("sudo /bin/bash ".MYSB_ROOT."/scripts/ApplyConfig.bsh '$CurrentUser' 'DO_APPLY'", $output, $result);

				if ( $result == 0 ) {
					$type = 'success';
					$message = 'Success !<br /><br />You will be redirect in 10 seconds.';
					GenerateMessage('message_only', $type, $message, '');
					session_start();
					unset($_SESSION['page']);
					session_unset();
					session_destroy();
					header('Refresh: 10; URL=/');
				} else {
					echo 'Failed ! It was not possible to give you an access to MySB portal !';
				}
			} else {
				GenerateMessage('ManageAddresses', $type, $message, '');
				GenerateMessage('message_only', 'information', 'Remember that your dynamic IP will be checked every 5 minutes.');
			}
			break;
		default: // Delete
			if (isset($_POST['delete'])) {
				$success = true;
				$count = count($_POST['delete']);

				foreach($_POST['delete'] as $key => $value) {
					$result = $MySB_DB->delete("users_addresses", ["id_users_addresses" => $key]);

					if ( $result = 0 ) {
						$success = false;
					}
				}

				if ( $success == true ) {
					$type = 'success';
				} else {
					$type = 'error';
					$message = 'Failed ! It was not possible to delete address.';
				}

				GenerateMessage('ManageAddresses', $type, $message, '');
			}
			break;
	}
}

$IfExist = $MySB_DB->get("users_addresses", "id_users_addresses", [
																	"AND" => [
																		"id_users" => "$UserID",
																		"ipv4" => "$UserAddress"
																	]
																]);	

if ( $IfExist > 0 ) {
	$add_current_ip = '';
} else {
	$add_current_ip = 'value="'.$UserAddress.'"';
}

$AddressesList = $MySB_DB->select("users_addresses", "*", ["id_users" => "$UserID"]);
?>

	<div align="center" style="margin-top: 10px; margin-bottom: 20px;">
		<form id="myForm" class="form_settings" method="post" action="">
			<fieldset>
			<legend>Add your allowed addresses here</legend>
				<div id="input1" class="clonedInput">
					<input class="input_id" id="input_id" name="input_id[1]" type="hidden" value="1" />
					Address (IP or Dynamic DNS): <input class="input_address" id="address" name="address[1]" type="text" required="required" <?php echo $add_current_ip; ?> />
					Is active ?:	<select class="select_is_active" id="is_active" name="is_active[1]" style="width:60px; cursor: pointer;" required="required">
										<option value="0" selected="selected">No</option>
										<option value="1">Yes</option>
									</select>
				</div>

				<div style="margin-top: 10px; margin-bottom: 20px;">
					<input type="button" id="btnAdd" value="Add new line" style="cursor: pointer;" />
					<input type="button" id="btnDel" value="Remove last line" style="cursor: pointer;" />
				</div>

			<p class="Comments">If you have a <b>dynamic IP address</b>, you must enter a hostname (No-IP, DynDNS, ...).<br />
				If you have a <b>fixed IP address</b>, you can enter it directly, or enter a hostname. In this case, it is advisable to directly enter your IP.</p>
				
				<input class="submit" style="width:180px; margin-top: 10px; margin-bottom: 10px;" name="submit" type="submit" value="Add my addresses now !">
			</fieldset>
		</form>
	</div>

<form class="form_settings" method="post" action="">
	<div align="center">
		<table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;">IPv4</th>
				<th style="text-align:center;">Hostname</th>
				<th style="text-align:center;">Check by</th>
				<th style="text-align:center;">Active ?</th>
				<th style="text-align:center;">Delete ?</th>
			</tr>

<?php
$i = 0;
foreach($AddressesList as $Address) {
	$i++;

	switch ($Address["is_active"]) {
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
					<input style="width:150px;" type="hidden" name="ipv4[<?php echo $i; ?>]" value="<?php echo $Address["ipv4"]; ?>" />
					<?php echo $Address["ipv4"]; ?>
				</td>
				<td>
					<input style="width:150px;" type="hidden" name="hostname[<?php echo $i; ?>]" value="<?php echo $Address["hostname"]; ?>" />
					<?php echo $Address["hostname"]; ?>
				</td>
				<td>
					<?php echo $Address["check_by"]; ?>
				</td>
				<td>
					<?php echo $is_active; ?>
				</td>
				<td>
					<input class="submit" name="delete[<?php echo $Address["id_users_addresses"]; ?>]" type="submit" value="Delete" />
				</td>
			</tr>
			<input class="input_id" id="input_id" name="input_id[<?php echo $i; ?>]" type="hidden" value="<?php echo $i; ?>" />
<?php
} // foreach($AddressesList as $Address) {
?>

		</table>

		<input class="submit" style="width:120px; margin-top: 10px;" name="submit" type="submit" value="Save Changes">

	</div>
</form>

<div align="center">
	<p></p>
	<p class="Comments"><b>NB</b>: Dynamic IP addresses are checked every <b>5</b> minutes.<br />If an IP has changed, the database will be updated and security will be adapted accordingly.</p>
</div>

<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery-dynamically-adding-form-elements.js"></script>

<?php
//#################### LAST LINE ######################################
?>