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

	$proxy_datas = $MySB_DB->get("proxy", [
											"address",
											"ssh_port",
											"ssh_user",
											"ssh_pass"
										], [
											"id_proxy" => 1
										]);

	$ProxyAddress = $proxy_datas["address"];
	$ProxySshPort = $proxy_datas["ssh_port"];
	$ProxySshUser = $proxy_datas["ssh_user"];
	$ProxySshPass = $proxy_datas["ssh_pass"];



	echo '
	<form class="form_settings" method="post" action="">
		<div align="center">
			<table border="0">
				<tr>
					<td>' . MainUser_Proxy_Address . '</td>
					<td><input class="text_normal" id="ProxyAddress" name="ProxyAddress" type="text" value="' . $ProxyAddress . '" required="required" /></td>
				</tr>
				<tr>
					<td>' . MainUser_Proxy_SshPort . '</td>
					<td><input class="text_normal" id="ProxySshPort" name="ProxySshPort" type="text" style="width:80px;" value="' . $ProxySshPort . '" required="required" /></td>
				</tr>
				<tr>
					<td>' . MainUser_Proxy_SshUser . '</td>
					<td><input class="text_normal" id="ProxySshUser" name="ProxySshUser" type="text" value="' . $ProxySshUser . '" required="required" /></td>
				</tr>
				<tr>
					<td>' . MainUser_Proxy_SshPass . '</td>
					<td><input class="text_normal" id="ProxySshPass" name="ProxySshPass" type="password" value="' . $ProxySshPass . '" required="required" /></td>
				</tr>
				<tr>
					<td>' . MainUser_Proxy_SshPassConfirm . '</td>
					<td><input class="text_normal" id="ProxySshPassConfirm" name="ProxySshPassConfirm" type="password" value="' . $ProxySshPass . '" required="required" /></td>
				</tr>
			</table>
			<input class="submit" style="width:' . strlen(Global_SaveChanges)*10 . 'px; margin-top: 10px;" name="submit" type="submit" value="' . Global_SaveChanges . '" />
		</div>
	</form>
	';
}

if (isset($_POST['submit'])) {
	$ProxySshPort = preg_replace('/\s\s+/', '', $_POST['ProxySshPort']);
	$ProxyAddress = preg_replace('/\s\s+/', '', $_POST['ProxyAddress']);
	$ProxySshUser = preg_replace('/\s\s+/', '', $_POST['ProxySshUser']);
	$ProxySshPass = $_POST['ProxySshPass'];
	$ProxySshPassConfirm = $_POST['ProxySshPassConfirm'];


	if ( (isset($ProxySshPort)) && (isset($ProxySshPass)) && (isset($ProxySshPassConfirm)) && (isset($ProxyAddress)) ) {
		if ( $ProxySshPass == $ProxySshPassConfirm ) {
			global $MySB_DB;

			$result = $MySB_DB->update("smtp", ["address" => "$ProxyAddress",
											"ssh_port" => "$ProxySshPort",
											"ssh_user" => "$ProxySshUser",
											"ssh_pass" => "$ProxySshPass"],
											["id_proxy" => 1]);

			if( $result > 0 ) {
				exec("sudo /bin/bash ".MYSB_ROOT."/scripts/ApplyConfig.bsh '$CurrentUser' 'DO_APPLY'", $output, $result);

				if ( $result == 0 ) {
					$type = 'success';
					$command = 'message_only';
					$message = MainUser_Proxy_Success;
				} else {
					$type = 'error';
					$message = MainUser_Proxy_Failded;
				}
			} else {
				$type = 'information';
				$message = Global_NoChange;
			}
		} else {
			$type = 'error';
			$message = MainUser_Proxy_Verification;
		}
	} else {
		$type = 'information';
		$message = Global_CompleteAllFields;
	}

	GenerateMessage('Postfix', $type, $message);
}

Form();

//#################### LAST LINE ######################################
