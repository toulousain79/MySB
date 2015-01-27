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

function Form() {
	global $MySB_DB;

	echo '<form class="form_settings" method="post" action="">
			<div align="center"><table border="0">
				<tr>
					<td>Username :</td>
					<td><input name="username" type="text" /></td>
				</tr>
				<tr>
					<td>User e-mail :</td>
					<td><input name="email" type="text" /></td>
				</tr>
				<tr>
					<td>Confirm e-mail :</td>
					<td><input name="confirm_email" type="text" /></td>
				</tr>
				<tr>
					<td colspan="2">
						<input class="submit" name="submit" type="submit" value="Add this user">
					</td>
				</tr>
			</table></div>
		</form>';
}

if(isset($_POST)==true && empty($_POST)==false) {
	$success = true;

	switch ($_POST['submit']) {
		case "Add this user":
			$username = $_POST['username'];
			$email = $_POST['email'];
			$confirm_email = $_POST['confirm_email'];
			$sftp = 1;
			$sudo = 0;
			$args = false;

			if ( ($username != '') && ($email != '') && ($confirm_email != '') ) {
				$IfExist = $MySB_DB->get("users", "users_email", ["users_ident" => "$username"]);	
				if ( $IfExist == '' ) {
					if ( ValidateEmail($email) != false ) {
						if ( $email == $confirm_email ) {
							$type = 'success';
							$args = "$username|$sftp|$sudo|$email";
						} else {
							$type = 'error';
							$message = 'Error between the typed email and verification.';
						}
					} else {
						$type = 'error';
						$message = 'The given e-mail address is not valid!';
					}
				} else {
					$type = 'error';
					$message = 'Username already used!';
				}
			} else {
				$type = 'information';
				$message = 'Please, complete all fields.';
			}

			GenerateMessage('MySB_CreateUser', $type, $message, $args);
			break;
		default: //Delete
			if (isset($_POST['delete'])) {
				$args = false;

				foreach($_POST['delete'] as $key => $value) {
					$IfExist = $MySB_DB->get("users", "users_ident", ["users_ident" => "$key"]);
					if ( $IfExist != '' ) {
						$type = 'success';
						$args = "$key";
					} else {
						$type = 'error';
						$message = 'Failed ! User does not exist...';
					}
				}

				GenerateMessage('MySB_DeleteUser', $type, $message, $args);
			}
			break;
	}
}

Form();

$UsersList = $MySB_DB->select("users", "*", ["AND" => ["admin" => "0"]]);
?>
	<form class="form_settings" method="post" action="">	
		<div align="center" style="margin-top: 50px; margin-bottom: 20px;"><table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;">Username</th>
				<th style="text-align:center;">E-mail</th>
				<th style="text-align:center;">SFTP ?</th>
				<th style="text-align:center;">Sudo ?</th>
				<!--<th style="text-align:center;">Delete ?</th>-->
			</tr>

<?php
foreach($UsersList as $User) {
	switch ($User["sftp"]) {
		case '0':
			$SFTP = 'NO';
			break;
		default:
			$SFTP = 'YES';
			break;
	}
	switch ($User["sudo"]) {
		case '0':
			$SUDO = 'NO';
			break;
		default:
			$SUDO = 'YES';
			break;
	}		
	
?>
			<tr>
				<td>
					<input style="width:80px;" type="hidden" name="users_ident[]" value="<?php echo $User["users_ident"]; ?>" />			
					<?php echo $User["users_ident"]; ?>
				</td>
				<td>
					<input style="width:200px;" type="hidden" name="users_email[]" value="<?php echo $User["users_email"]; ?>" />					
					<?php echo $User["users_email"]; ?>
				</td>
				<td>		
					<?php echo $SFTP; ?>
				</td>
				<td>					
					<?php echo $SUDO; ?>
				</td>
				<!--<td>
					<input class="submit" name="delete[<?php echo $User["users_ident"]; ?>]" type="submit" value="Delete" />
				</td>-->
			</tr>
<?php
} // foreach($UsersList as $User) {
?>
		</table></div>
	</form>
<?php
//#################### LAST LINE ######################################
?>