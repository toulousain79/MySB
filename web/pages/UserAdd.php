<?php
// ----------------------------------
//  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
//   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
//	_\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
//	 _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
//	  _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
//	   _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
//		_\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
//		 _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
//		  _\///______________\///___\////__________\///////////_____\/////////////_____
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

function Form($RealFreeSpace, $FreeSpace) {
	global $MySB_DB;

	// Is lock ?
	$PortalIsItLocked = PortalIsItLocked();

	echo '<form class="form_settings" method="post" action="">
			<div align="center">
				<input name="free_space" type="hidden" value="'.$RealFreeSpace.'"/>
				<table border="0">
					<tr>
						<td>' . MainUser_UserAdd_Username . '</td>
						<td><input name="username" type="text" /></td>
					</tr>
					<tr>
						<td>' . MainUser_UserAdd_UserEmail . '</td>
						<td><input name="email" type="email" /></td>
					</tr>
					<tr>
						<td>' . MainUser_UserAdd_ConfirmEmail . '</td>
						<td><input name="confirm_email" type="email" /></td>
					</tr>
					<tr>
						<td>' . MainUser_UserAdd_AccountType . '</td>
						<td>
							<select name="account_type" style="width:120px; height: 28px;">
								<option selected="selected" value="normal">normal</option>
								<option value="plex">plex</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>' . MainUser_UserAdd_Quota . '</td>
						<td><input name="quota" type="number" style="width:100px; text-align:right;" /><p class="Comments">' . sprintf(MainUser_UserAdd_Comment_FreeSpace, $FreeSpace, $RealFreeSpace) . '</p></td>
					</tr>
				</table>
				<div align="center"><p class="Comments">' . MainUser_UserAdd_Comment . '</p></div>';
	if ($PortalIsItLocked === false) {
		echo '<input class="submit" style="width:' . strlen(Global_SaveChanges)*10 . 'px; margin-top: 10px;" name="submit" type="submit" value="' .MainUser_UserAdd_AddUser. '">';
	}
	echo '</div>
		</form>';
}

if(isset($_POST)==true && empty($_POST)==false) {
	$success = true;

	switch ($_POST['submit']) {
		case MainUser_UserAdd_AddUser:
			$username = $_POST['username'];
			$email = $_POST['email'];
			$confirm_email = $_POST['confirm_email'];
			$account_type = $_POST['account_type'];
			$quota = filter_var($_POST['quota'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND);
			$free_space = filter_var($_POST['free_space'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND);
			$sftp = 1;
			$sudo = 0;
			$args = false;

			if ( ($username != '') && ($email != '') && ($confirm_email != '') ) {
				$IfExist = $MySB_DB->get("users", "users_email", ["users_ident" => "$username"]);
				if ( $IfExist == '' ) {
					if ( ValidateEmail($email) != false ) {
						if ( $email == $confirm_email ) {
							if ($account_type == 'normal') {
								//if ( ($quota >= 5) || ($quota == 0) || ($quota == '') ) {
								if ( ($quota == 0) || ($quota == '') ) {
									if ( $quota > $free_space ) {
										$quota = $free_space;
									}
								} else {
									$type = 'warning';
									$message = MainUser_UserAdd_QuotaMinValue;
								}
							} else {
								$quota = 0;
							}
							if ( $type != 'warning' ) {
								$type = 'success';
								$args = "$username|$sftp|$sudo|$email|$account_type|$quota";
							}
						} else {
							$type = 'error';
							$message = MainUser_UserAdd_VerifError;
						}
					} else {
						$type = 'error';
						$message = MainUser_UserAdd_BadAddress;
					}
				} else {
					$type = 'error';
					$message = MainUser_UserAdd_AlreadyUsed;
				}
			} else {
				$type = 'information';
				$message = Global_CompleteAllFields;
			}

			GenerateMessage('MySB_CreateUser', $type, $message, $args);
			break;

		 case Global_SaveChanges:
			$args = false;
			$free_space = filter_var($_POST['free_space'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND);

			for($i=0, $count = count($_POST['users_ident']);$i<$count;$i++) {
				$users_ident = $_POST['users_ident'][$i];
				$account_type = $MySB_DB->get("users", "account_type", ["users_ident" => $users_ident]);
				$quota_type = $_POST['quota_type'][$i];
				$quota = $_POST['quota'][$i];
				if ($account_type == 'normal') {
					$quota = filter_var($quota, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND);
					//if (($quota_type == 'manual') && ($quota < 5)) {
					if (($quota_type == 'manual') && ($quota < 0)) {
						$type = 'warning';
						GenerateMessage('Quota_Update', $type, MainUser_UserAdd_QuotaMinValueEdit, $args);
						break;
					}
				} else {
					$quota = 0;
				}
				if ( $quota > $free_space ) {
					$quota = $free_space;
				}
				$quota = round($quota*(1024*1024),2);
				$value = $MySB_DB->update("users", ["quota" => $quota, "quota_type" => $quota_type], ["users_ident" => $users_ident]);
				$result = $result+$value;
			}

			if ( $type != 'warning' ) {
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

				GenerateMessage('Quota_Update', $type, $message, $args);
			}
			break;

		default: //Delete
			if (isset($_POST['submit'])) {
				$args = false;

				foreach($_POST['submit'] as $key => $value) {
					$IfExist = $MySB_DB->get("users", "users_ident", ["users_ident" => "$key"]);
					if ( $IfExist != '' ) {
						$type = 'success';
						$args = "$key";
					} else {
						$type = 'error';
						$message = MainUser_UserAdd_UserDontExist;
					}
				}

				GenerateMessage('MySB_DeleteUser', $type, $message, $args);
			}
			break;
	}
}

$sUsersList = $MySB_DB->select("users", ["id_users", "users_ident", "users_passwd", "users_email", "admin", "quota", "space_used", "created_at", "account_type", "quota_type"], ["AND" => ["is_active" => "1"]]);
$system_datas = $MySB_DB->get("system", ["quota_default", "total_space_used", "rt_model", "rt_cost_tva", "rt_nb_users", "rt_price_per_users", "rt_method"], ["id_system" => 1]);
$nTotalUsers = $system_datas["rt_nb_users"];
$GlobalCostTVA = $system_datas["rt_cost_tva"];
$Method = $system_datas["rt_method"];
$PricePerUser = $system_datas["rt_price_per_users"];
$IsMainUser = (MainUser($CurrentUser)) ? true : false;
$AllQuota = $MySB_DB->sum("users", "quota");
$FreeSpace = GetSizeName($AllQuota.'KB');
$RealFreeSpace = GetSizeName(($system_datas["quota_default"] - $system_datas["total_space_used"]).'KB');

Form($RealFreeSpace, $FreeSpace);

if ( !empty($sUsersList) ) {

	// Is lock ?
	$PortalIsItLocked = PortalIsItLocked();
?>
	<div style="margin-top: 10px; margin-bottom: 20px;" id="scrollmenu" align="center">
	<form class="form_settings" method="post" action="">
		<table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;"><?php echo MainUser_UserAdd_Table_Username; ?></th>
				<th style="text-align:center;"><?php echo MainUser_UserAdd_Table_Email; ?></th>
				<th style="text-align:center;"><?php echo MainUser_UserAdd_Table_Password; ?></th>
				<th style="text-align:center;"><?php echo MainUser_UserAdd_Table_AccountType; ?></th>
				<th style="text-align:center;"><?php echo MainUser_UserAdd_Table_QuotaType; ?></th>
				<th style="text-align:center;"><?php echo MainUser_UserAdd_Table_SetQuota; ?></th>
				<th style="text-align:center;"><?php echo MainUser_UserAdd_Table_Quota; ?></th>
				<th style="text-align:center;"><?php echo MainUser_UserAdd_Table_CreatedAt; ?></th>
<?php
	if ( !empty($system_datas["rt_cost_tva"]) && !empty($system_datas["rt_model"]) ) {
?>
				<th style="text-align:center;"><?php echo MainUser_UserAdd_Table_Treasury; ?></th>
				<th style="text-align:center;"><?php echo MainUser_UserAdd_Table_Monthly; ?></th>
<?php
	}
?>
				<th style="text-align:center;"><?php echo Global_Table_Delete; ?></th>
			</tr>

<?php
	foreach($sUsersList as $User) {
		$Subtotal = $MySB_DB->get("users", "treasury", ["id_users" => $User["id_users"]]);
		if (is_numeric($Subtotal) && $Subtotal > 0) {
			$Color = 'color: #00DF00;';
		} else {
			$Color = 'color: #FF0000;';
		}

		$UserPrice = $MySB_DB->sum("tracking_rent_options", "amount", ["id_users" => $User["id_users"]]);
		$UserPrice = $PricePerUser + $UserPrice;
		switch ($Method) {
			case '1':
				$UserPrice = round($UserPrice, 2);
				break;
			default:
				$UserPrice = ceil($UserPrice);
				break;
		}
?>
			<tr>
				<td>
					<input type="hidden" name="users_ident[]" value="<?php echo $User["users_ident"]; ?>" />
					<?php echo $User["users_ident"]; ?>
				</td>
				<td>
					<input type="hidden" name="users_email[]" value="<?php echo $User["users_email"]; ?>" />
					<?php echo $User["users_email"]; ?>
				</td>
				<td>
					<?php switch ($User["users_passwd"]) {
						case '':
							$class = 'greenText';
							$options = '<option selected="selected" class="greenText">' .MainUser_UserAdd_PasswordOK. '</option>';
							break;
						default:
							$class = 'redText';
							$options .= '<option selected="selected" class="redText">' .$User["users_passwd"]. '</option>';
							break;
					} ?>
					<select name="users_passwd" style="width:120px; height: 28px;" class="<?php echo $class; ?>" disabled><?php echo $options; ?></select>
				</td>
				<td>
					<?php switch ($User["account_type"]) {
						case 'plex':
							$options = '<option value="plex" selected="selected">plex</option>';
							$options .= '<option value="normal">normal</option>';
							break;
						default:
							$options = '<option value="plex">plex</option>';
							$options .= '<option value="normal" selected="selected">normal</option>';
							break;
					} ?>
					<select name="account_type[]" style="width:120px; height: 28px;" disabled><?php echo $options; ?></select>
				</td>
				<td>
					<?php switch ($User["account_type"]) {
						case 'normal':
							$hidden = '';
							switch ($User["quota_type"]) {
								case 'manual':
									$options = '<option value="manual" selected="selected">'.MainUser_UserAdd_QuotaTypeManual.'</option>';
									$options .= '<option value="auto">auto</option>';
									break;
								default:
									$options = '<option value="manual">'.MainUser_UserAdd_QuotaTypeManual.'</option>';
									$options .= '<option value="auto" selected="selected">auto</option>';
									break;
							}
							break;
						default:
							$options = '<option value="manual" hidden>'.MainUser_UserAdd_QuotaTypeManual.'</option>';
							$hidden = 'hidden';
							break;
					} ?>
					<select name="quota_type[]" style="width:120px; height: 28px;" <?php echo $hidden; ?>><?php echo $options; ?></select>
				</td>
				<td>
					<?php switch ($User["account_type"]) {
						case 'normal':
							$value = GetSizeName($User["quota"].'KB', false);
							switch ($User["quota_type"]) {
								case 'manual':
									$type = 'type="number" min="0" step="any"';
									break;
								default:
									$type = 'type="number" min="0" step="any"';
									break;
							}
							break;
						default:
							$type = 'type="hidden"';
							$value = 0;
							break;
					} ?>
					<input style="width:150px; text-align: right;" <?php echo $type; ?> name="quota[]" value="<?php echo $value; ?>" />
				</td>
				<td style="text-align: right;">
					<?php switch ($User["account_type"]) {
						case 'plex':
							echo GetSizeName($User["space_used"].'KB');
							break;
						default:
							echo GetSizeName($User["space_used"].'KB') . ' / ' . GetSizeName($User["quota"].'KB');
							break;
					} ?>
				</td>
				<td><?php echo $User["created_at"]; ?></td>
<?php
	if ( !empty($system_datas["rt_cost_tva"]) && !empty($system_datas["rt_model"]) ) {
?>
				<td style="text-align:center; <?php echo $Color; ?>">
					<b><?php echo $Subtotal; ?></b>
				</td>
				<td style="text-align:center; color: #00DF00;">
					<b><?php echo $UserPrice; ?></b>
				</td>
<?php
	}
?>
				<td>
				<?php if ( ($User["admin"] != '1') && ($PortalIsItLocked === false) ) { ?>
					<input class="submit" name="submit[<?php echo $User["users_ident"]; ?>]" type="submit" value="<?php echo Global_Delete; ?>" />
				<?php } ?>
				</td>
			</tr>
<?php
	}
}
?>
			</table>

			<input name="free_space" type="hidden" value="<?php echo $RealFreeSpace; ?>"/>
		<?php if ( ($IsMainUser) && ($PortalIsItLocked === false) ) { ?>
			<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>">
		<?php } ?>
	</form>
	</div>
<?php
//#################### LAST LINE ######################################
