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

// Vars
$UserAddress = $_SERVER['REMOTE_ADDR'];
$UserID = $MySB_DB->get("users", "id_users", ["users_ident" => "$CurrentUser"]);

if(isset($_POST)==true && empty($_POST)==false) {
	$success = true;

	switch ($_POST['submit']) {
		case User_ManageAddresses_Btn_AddAddress:
			$count = count($_POST['input_id']);

			for($i=1; $i<=$count; $i++) {
				// test if IP or hostname (dynamic IP)
				$CleanAddress = preg_replace('/\s\s+/', '', $_POST['address'][$i]); 
				if ( !ValidateIPv4($CleanAddress) ) {
					// IP is not valid (hostname)
					$IPv4 = gethostbyname($CleanAddress);

					if (!filter_var($IPv4, FILTER_VALIDATE_IP)) {
						$success = false;
						$message = User_ManageAddresses_NotValidIp;
					} else {
						$result = ManageUsersAddresses($CurrentUser, $IPv4, $CleanAddress, $_POST['is_active'][$i], 'hostname');
						if ( ($result < 0) || empty($result) ) {
							$success = false;
							$message = User_ManageAddresses_HostnameUpdateFailed;
						}
					}
				} else {
					// IP is valid
					$CleanAddress = preg_replace('/\s\s+/', '', $_POST['address'][$i]); 
					if ( ValidateIPv4($CleanAddress) ) {
						// IP is valid
						$HostName = gethostbyaddr($CleanAddress);
						$result = ManageUsersAddresses($CurrentUser, $CleanAddress, $HostName, $_POST['is_active'][$i], 'ipv4');
						if ( ($result < 0) || empty($result) ) {
							$success = false;
							$message = User_ManageAddresses_Ipv4UpdateFailed;
						}
					} else {
						// IP is not valid (private ?)
						$success = false;
						$message = User_ManageAddresses_PublicIpv4Address;	
					}
				}
			}

			if ( $success == true ) {
				$type = 'success';
				$message = sprintf(User_ManageAddresses_VerifAddresseConfirm, Global_SaveChanges);
			} else {
				$type = 'error';
			}

			GenerateMessage('ManageAddresses', $type, $message, '');
			break;
		case Global_SaveChanges:
			$count = count($_POST['input_id']);
			$DateTime = date("Y-m-d H:i:s");

			for($i=1; $i<=$count; $i++) {
				$CleanIPv4 = preg_replace('/\s\s+/', '', $_POST['ipv4'][$i]); 
				$CleanHostname = preg_replace('/\s\s+/', '', $_POST['hostname'][$i]); 
				$value = $MySB_DB->update("users_addresses", [ "is_active" => $_POST['is_active'][$i], "last_update" => "$DateTime" ], [ "AND" => [ "ipv4" => "$CleanIPv4", "hostname" => "$CleanHostname" ]]);
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
				$type = 'information';
				$message = Global_NoChange;
			}

			if ( isset($_SESSION['page']) && ($_SESSION['page'] == 'ManageAddresses') ) { // by NewUser.php
				exec("sudo /bin/bash ".MYSB_ROOT."/scripts/ApplyConfig.bsh '$CurrentUser' 'DO_APPLY'", $output, $result);

				if ( $result == 0 ) {
					$type = 'success';
					$message = User_ManageAddresses_MessageRedirect;
					GenerateMessage('message_only', $type, $message, '');
					session_start();
					unset($_SESSION['page']);
					session_unset();
					session_destroy();
					header('Refresh: 10; URL=/');
				} else {
					echo User_ManageAddresses_NotAccessPortal;
				}
			} else {
				GenerateMessage('ManageAddresses', $type, $message, '');
				GenerateMessage('message_only', 'information', User_ManageAddresses_RememberCheck);
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
					$message = User_ManageAddresses_FailedDeleteAddress;
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
			<legend><?php echo User_ManageAddresses_TitleAdd; ?></legend>
				<div id="input1" class="clonedInput">
					<input class="input_id" id="input_id" name="input_id[1]" type="hidden" value="1" />
					<?php echo User_ManageAddresses_TextAddress; ?>&nbsp;<input class="input_address" id="address" name="address[1]" type="text" required="required" <?php echo $add_current_ip; ?> />
					&nbsp;&nbsp;<?php echo Global_IsActive; ?>&nbsp;&nbsp;<select class="select_is_active" id="is_active" name="is_active[1]" style="width:60px; cursor: pointer;" required="required">
										<option value="0" selected="selected"><?php echo Global_No; ?></option>
										<option value="1"><?php echo Global_Yes; ?></option>
									</select>
				</div>

				<div style="margin-top: 10px; margin-bottom: 20px;">
					<input type="button" id="btnAdd" value="<?php echo User_ManageAddresses_Btn_AddNewLine; ?>" style="cursor: pointer;" />
					<input type="button" id="btnDel" value="<?php echo User_ManageAddresses_Btn_RemoveLastLine; ?>" style="cursor: pointer;" />
				</div>

			<p class="Comments"><?php echo User_ManageAddresses_InfoAddAddresses; ?></p>
				
				<input class="submit" style="width:<?php echo strlen(User_ManageAddresses_Btn_AddAddress)*10; ?>px; margin-top: 10px; margin-bottom: 10px;" name="submit" type="submit" value="<?php echo User_ManageAddresses_Btn_AddAddress; ?>">
			</fieldset>
		</form>
	</div>

<form class="form_settings" method="post" action="">
	<div align="center">
		<table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;"><?php echo User_ManageAddresses_Table_IPv4; ?></th>
				<th style="text-align:center;"><?php echo User_ManageAddresses_Table_Hostname; ?></th>
				<th style="text-align:center;"><?php echo User_ManageAddresses_Table_CheckBy; ?></th>
				<th style="text-align:center;"><?php echo Global_LastUpdate; ?></th>
				<th style="text-align:center;"><?php echo Global_IsActive; ?></th>
				<th style="text-align:center;"><?php echo Global_Table_Delete; ?></th>
			</tr>

<?php
$i = 0;
foreach($AddressesList as $Address) {
	$i++;

	switch ($Address["is_active"]) {
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
					<?php echo $Address["last_update"]; ?>
				</td>				
				<td>
					<?php echo $is_active; ?>
				</td>
				<td>
					<input class="submit" name="delete[<?php echo $Address["id_users_addresses"]; ?>]" type="submit" value="<?php echo Global_Delete; ?>" />
				</td>
			</tr>
			<input class="input_id" id="input_id" name="input_id[<?php echo $i; ?>]" type="hidden" value="<?php echo $i; ?>" />
<?php
} // foreach($AddressesList as $Address) {
?>

		</table>

		<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>">

	</div>
</form>

<div align="center">
	<p></p>
	<p class="Comments"><?php echo User_ManageAddresses_InfoBottom; ?></p>
</div>

<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery-dynamically-adding-form-elements.js"></script>

<?php
//#################### LAST LINE ######################################
