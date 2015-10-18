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

	$ProvidersList = array('LOCAL', 'FREE', 'YAHOO', 'OVH', 'GMAIL', 'ZOHO');

	echo '<script type="text/javascript">SMTP_ChangeValues("' . THEMES_PATH . 'MySB/js/SMTP_data.json", "'.$SmtpEmail.'", "'.$SmtpUsername.'", "'.$SmtpPasswd.'");</script>';

	echo '
	<form class="form_settings" method="post" action="">
		<div align="center">
			<table border="0">
				<tr>
					<td>' . MainUser_SMTP_Provider . '</td>
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
					<td>' . MainUser_SMTP_Address . '</td>
					<td><input class="text_normal" id="SmtpEmail" name="SmtpEmail" type="text" value="' . $SmtpEmail . '" required="required" /></td>
				</tr>			
				<tr>
					<td>' . MainUser_SMTP_Username . '</td>
					<td><input class="text_normal" id="SmtpUsername" name="SmtpUsername" type="text" value="' . $SmtpUsername . '" required="required" /></td>
				</tr>
				<tr>
					<td>' . MainUser_SMTP_Password . '</td>
					<td><input class="text_normal" id="SmtpPasswd" name="SmtpPasswd" type="password" value="' . $SmtpPasswd . '" required="required" /></td>
				</tr>
				<tr>
					<td>' . MainUser_SMTP_Confirm . '</td>
					<td><input class="text_normal" id="SmtpPasswdConfirm" name="SmtpPasswdConfirm" type="password" value="' . $SmtpPasswd . '" required="required" /></td>
				</tr>
				<tr>
					<td>' . MainUser_SMTP_Host . '</td>
					<td>
						<select name="SmtpHost" id="json-host" style="width:150px; height: 28px;" required="required" readonly>
							<option>' . $SmtpHost . '</option>
						</select>

					</td>
				</tr>
				<tr>
					<td>' . MainUser_SMTP_Port . '</td>
					<td>
						<select name="SmtpPort" id="json-port" style="width:60px; height: 28px;" required="required" readonly>
							<option>' . $SmtpPort . '</option>
						</select>
					</td>
				</tr>
			</table>
			<input class="submit" style="width:' . strlen(Global_SaveChanges)*10 . 'px; margin-top: 10px;" name="submit" type="submit" value="' . Global_SaveChanges . '" />
		</div>
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

				if( $result > 0 ) {
					$type = 'success';
				} else {
					$type = 'information';
					$message = Global_NoChange;
				}
			} else {
				$type = 'error';
				$message = MainUser_SMTP_Verification;		
			}
		} else {
			$type = 'error';
			$message = MainUser_SMTP_AccountNotValid;
		}
	} else {
		$type = 'information';
		$message = Global_CompleteAllFields;
	}

	GenerateMessage('Postfix', $type, $message);
}

Form();

//#################### LAST LINE ######################################
?>