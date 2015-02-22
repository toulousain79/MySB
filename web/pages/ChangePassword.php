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
		<div align="center"><table border="0">
			<tr>
				<td>Current password :</td>
				<td><input name="current_pwd" type="password" ' . $opts . '/></td>
			</tr>
			<tr>
				<td>New password :</td>
				<td><input name="new_pwd" type="password" /></td>
			</tr>
			<tr>
				<td>Confirm :</td>
				<td><input name="confirm_pwd" type="password" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<input class="submit" name="submit" type="submit" value="Submit">
				</td>
			</tr>
		</table></div>
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
					
						if ( $result > 0 ) {
							exec("sudo /bin/bash ".MYSB_ROOT."/scripts/ApplyConfig.bsh '$CurrentUser' 'DO_APPLY'", $output, $result);

							if ( $result == 0 ) {
								$type = 'success';
								$command = 'message_only';
								$message = 'Success !<br /><br />Wait a few seconds and you will be able to log in with your new password.<br /><br />You will be redirect in 30 seconds.<br /><br />Please, wait for automatic redirection !';
							} else {
								$type = 'error';
								$message = 'Failed ! It was not possible to apply the new password...';
							}
						} else {
							$type = 'error';
							$message = 'Failed ! It was not possible to update the MySB database.';
						}
					} else { // directly by MySB portal
						$type = 'success';
						$args = "$CurrentUser|$new_pwd";
					}
				} else {
					$type = 'error';
					$message = 'Failed ! It was not possible to update the Wolf database.';
				}
			} else {
				$type = 'error';
				$message = 'Error between the new typed password and verification.';
			}
		} else {
			$type = 'error';
			$message = 'The current password is not valid.';
		}
	} else {
		$type = 'information';
		$message = 'Please, complete all fields.';	
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