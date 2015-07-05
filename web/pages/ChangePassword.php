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

if ( isset($_SESSION['page']) && ($_SESSION['page'] == 'ChangePassword') && isset($_GET['passwd']) ) {
	$opts = 'readonly="true" style="cursor: default;" value="' . $_GET['passwd'] . '"';
	$AuthPassword = $_GET['passwd'];
} else {
	if ( isset($_SERVER['PHP_AUTH_PW']) ) {
		$AuthPassword = $_SERVER['PHP_AUTH_PW'];
	} else {
		$AuthPassword = "";
	}	

	$opts = '';
}

echo '
	<form class="form_settings" method="post" action="">
		<div align="center">
			<table border="0">
				<tr>
					<td>' . User_ChangePassword_CurrentPassword . '</td>
					<td><input name="current_pwd" type="password" ' . $opts . '/></td>
				</tr>
				<tr>
					<td>' . User_ChangePassword_NewPassword . '</td>
					<td><input name="new_pwd" type="password" /></td>
				</tr>
				<tr>
					<td>' . User_ChangePassword_ConfirmPassword . '</td>
					<td><input name="confirm_pwd" type="password" /></td>
				</tr>
			</table>
			<input class="submit" style="width:' . strlen(Global_SaveChanges)*10 . 'px; margin-top: 10px;" name="submit" type="submit" value="' .Global_SaveChanges. '">
		</div>
	</form>
	';

if ( isset($_POST['submit']) ) {
	$current_pwd = $_POST['current_pwd'];
	$new_pwd = $_POST['new_pwd'];
	$confirm_pwd = $_POST['confirm_pwd'];
	$args = '';
	$command = 'MySB_ChangeUserPassword';

	if ( ($current_pwd != '') && ($new_pwd != '') && ($confirm_pwd != '') ) {
		if ( $current_pwd == $AuthPassword ) {
			if ( $new_pwd == $confirm_pwd ) {
				$result = UpdateWolfDB($CurrentUser, $new_pwd);

				if ( $result > 0 ) {
					if ( isset($_SESSION['page']) && ($_SESSION['page'] == 'ChangePassword') ) { // by NewUser.php
						$UserAddress = $_SERVER['REMOTE_ADDR'];
						$HostName = gethostbyaddr($UserAddress);
						ManageUsersAddresses($CurrentUser, $UserAddress, $HostName, '1', 'ipv4');
						
						$priority = $MySB_DB->max("commands", "priority");
						$priority++;
						$args = "$CurrentUser|$new_pwd";

						$value = $MySB_DB->insert("commands", ["commands" => "$command", "reload" => 1, "priority" => "$priority", "args" => "$args", "user" => "$CurrentUser"]);
					
						if ( $value > 0 ) {
							exec("sudo /bin/bash ".MYSB_ROOT."/scripts/ApplyConfig.bsh '$CurrentUser' 'DO_APPLY'", $output, $result);

							if ( $result == 0 ) {
								$type = 'success';
								$command = 'message_only';
								$message = User_ChangePassword_Success;
							} else {
								$type = 'error';
								$message = User_ChangePassword_Failded;
							}
						} else {
							$type = 'error';
							$message = User_ChangePassword_FailedUpdateMysbDB;
						}
					} else { // directly by MySB portal
						$type = 'success';
						$args = "$CurrentUser|$new_pwd";
					}
				} else {
					$type = 'error';
					$message = User_ChangePassword_FailedUpdateWolfDB;
				}
			} else {
				$type = 'error';
				$message = User_ChangePassword_ErrorConfirm;
			}
		} else {
			$type = 'error';
			$message = User_ChangePassword_ErrorNotValid;
		}
	} else {
		$type = 'information';
		$message = Global_CompleteAllFields;	
	}

	GenerateMessage($command, $type, $message, $args);

	if ( isset($_SESSION['page']) && ($_SESSION['page'] == 'ChangePassword') ) { // by NewUser.php
		session_start();
		unset($_SESSION['page']);
		session_unset();
		session_destroy();
		header('Refresh: 30; URL=/');
	}
}

//#################### LAST LINE ######################################
?>