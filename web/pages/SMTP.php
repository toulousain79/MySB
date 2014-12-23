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

	// Users table
	$smtp_datas = $MySB_DB->get("smtp", [
												"smtp_provider",
												"smtp_username",
												"smtp_passwd",
												"smtp_host",
												"smtp_port",
											], [
												"id_smtp" => 1
											]);
											
	$SmtpProvider = $smtp_datas["smtp_provider"];
	$SmtpUsername = $smtp_datas["smtp_username"];
	$SmtpPasswd = $smtp_datas["smtp_passwd"];
	$SmtpHost = $smtp_datas["smtp_host"];
	$SmtpPort = $smtp_datas["smtp_port"];											
	
	$ProvidersList = array(
							'LOCAL' => 'localhost',
							'FREE' => 'smtp.free.fr',
							'YAHOO' => 'smtp.mail.yahoo.fr',
							'OVH' => 'ssl0.ovh.net',
							'GMAIL' => 'smtp.gmail.com'
							);
							
	echo '
	<form class="form_settings" method="post" action="">
		<div align="center"><table border="0">	
			<tr>
				<td>Provider :</td>
				<td>
					<select style="cursor: pointer;">';
					
					foreach($ProvidersList as $Providers => $Host) {
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
				<td>Username :</td>
				<td><input class="text_normal" name="tva" type="text" value="' . $SmtpUsername . '" required="required" /></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input class="text_normal" name="global_cost" type="password" value="' . $SmtpPasswd . '" required="required" /></td>
			</tr>
			<tr>
				<td>Host :</td>
				<td><input class="text_normal" name="global_cost" type="text" value="' . $SmtpHost . '" required="required" readonly /></td>
			</tr>
			<tr>
				<td>Port :</td>
				<td><input class="text_small" name="global_cost" type="text" value="' . $SmtpPort . '" required="required" readonly /></td>
			</tr>			
			<tr>
				<td colspan="3"><input class="submit" name="submit" type="submit" value="Submit" /></td>
			</tr>						
		</table></div>
	</form>
	';


//#################### LAST LINE ######################################
?>