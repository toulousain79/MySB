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

function Form() {
	global $MySB_DB;

	$smtp_datas = $MySB_DB->get("smtp", [
											"smtp_provider",
											"smtp_username",
											"smtp_passwd",
											"smtp_host",
											"smtp_port",
											"smtp_email"
										], [
											"id_smtp" => 1
										]);

	$SmtpProvider = $smtp_datas["smtp_provider"];
	$SmtpUsername = $smtp_datas["smtp_username"];
	$SmtpPasswd = $smtp_datas["smtp_passwd"];
	$SmtpHost = $smtp_datas["smtp_host"];
	$SmtpPort = $smtp_datas["smtp_port"];
	$SmtpEmail = $smtp_datas["smtp_email"];

	$ProvidersList = array('LOCAL', 'FREE', 'YAHOO', 'OVH', 'GMAIL');

	echo '<script type="text/javascript">SMTP_ChangeValues("' . THEMES_PATH . 'MySB/js/SMTP_data.json", "'.$SmtpEmail.'", "'.$SmtpUsername.'", "'.$SmtpPasswd.'");</script>';

	echo '
	<form class="form_settings" method="post" action="">
		<div align="center"><table border="0">
			<tr>
				<td>Provider :</td>
				<td>
					<select name="SmtpProvider" id="json-provider" style="width:100px; height: 28px;">';

					foreach($ProvidersList as $Providers) {
						if ( $SmtpProvider == $Providers) {
							echo '<option selected="selected" value="' . $Providers . '">' . $Providers . '</option>';
						} else {
							echo '<option value="' . $Providers . '">' . $Providers . '</option>';
						}
					}

	echo '
					</select>
				</td>
			</tr>
			<tr>
				<td>E-mail related to the SMTP account:</td>
				<td><input class="text_normal" id="SmtpEmail" name="SmtpEmail" type="text" value="' . $SmtpEmail . '" required="required" /></td>
			</tr>			
			<tr>
				<td>Username :</td>
				<td><input class="text_normal" id="SmtpUsername" name="SmtpUsername" type="text" value="' . $SmtpUsername . '" required="required" /></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input class="text_normal" id="SmtpPasswd" name="SmtpPasswd" type="password" value="' . $SmtpPasswd . '" required="required" /></td>
			</tr>
			<tr>
				<td>Confirm :</td>
				<td><input class="text_normal" id="SmtpPasswdConfirm" name="SmtpPasswdConfirm" type="password" value="' . $SmtpPasswd . '" required="required" /></td>
			</tr>
			<tr>
				<td>Host :</td>
				<td>
					<select name="SmtpHost" id="json-host" style="width:150px; height: 28px;" required="required" readonly>
						<option>' . $SmtpHost . '</option>
					</select>

				</td>
			</tr>
			<tr>
				<td>Port :</td>
				<td>
					<select name="SmtpPort" id="json-port" style="width:60px; height: 28px;" required="required" readonly>
						<option>' . $SmtpPort . '</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3"><input class="submit" name="submit" type="submit" value="Submit" /></td>
			</tr>
		</table></div>
	</form>
	';
}

if (isset($_POST['submit'])) {
	$SmtpProvider = $_POST['SmtpProvider'];
	$SmtpUsername = preg_replace('/\s\s+/', '', $_POST['SmtpUsername']); 
	$SmtpEmail = preg_replace('/\s\s+/', '', $_POST['SmtpEmail']); 	
	$SmtpPasswd = $_POST['SmtpPasswd'];
	$SmtpPasswdConfirm = $_POST['SmtpPasswdConfirm'];
	$SmtpHost = $_POST['SmtpHost'];
	$SmtpPort = $_POST['SmtpPort'];
	

	if ( (isset($SmtpProvider)) && (isset($SmtpUsername)) && (isset($SmtpPasswd)) && (isset($SmtpPasswdConfirm)) && (isset($SmtpHost)) && (isset($SmtpPort)) && (isset($SmtpEmail)) ) {
		if ( ValidateEmail($SmtpEmail) != false ) {	
			if ( $SmtpPasswd == $SmtpPasswdConfirm ) {
				global $MySB_DB;

				$result = $MySB_DB->update("smtp", ["smtp_provider" => "$SmtpProvider",
												"smtp_username" => "$SmtpUsername",
												"smtp_passwd" => "$SmtpPasswd",
												"smtp_host" => "$SmtpHost",
												"smtp_port" => "$SmtpPort",
												"smtp_email" => "$SmtpEmail"],
												["id_smtp" => 1]);

				if( $result == 1 ) {
					$type = 'success';
				} else {
					$type = 'error';
					$message = 'Failed ! It was not possible to update the MySB database.';
				}
			} else {
				$type = 'error';
				$message = 'Error between password and verification.';		
			}
		} else {
			$type = 'error';
			$message = 'The e-mail related to the SMTP account is not valid!';
		}
	} else {
		$type = 'information';
		$message = 'Please, complete all fields.';
	}

	GenerateMessage('Postfix', $type, $message);
}

Form();

//#################### LAST LINE ######################################
?>