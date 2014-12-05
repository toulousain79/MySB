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

if ( isset($_POST['TempPass']) ) {
	$TempPass = $_POST['TempPass'];
	$opts = "readonly=\"true\" value=" . $TempPass . "";
} else {
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
					<div id="formsubmitbutton">
						<input class="submit" name="submit" type="submit" value="Submit" onclick="ButtonClicked()">
					</div>
					<div id="buttonreplacement" style="text-align:center; display:none; height: 33px;">
						<img src="'.THEMES_PATH.'MySB/images/ajax-loader.gif" alt="loading...">
					</div>
				</td>
			</tr>
		</table></div>
	</form>
	';

if ( isset($_POST['submit']) ) {
	$current_pwd = $_POST['current_pwd'];
	$new_pwd = $_POST['new_pwd'];
	$confirm_pwd = $_POST['confirm_pwd'];
	
	if ( ($current_pwd != '') && ($new_pwd != '') && ($confirm_pwd != '') ) {
		if ( $current_pwd == $_SERVER['PHP_AUTH_PW'] ) {
			if ( $new_pwd == $confirm_pwd ) {
				
				exec("sudo /bin/bash /etc/MySB/bin/MySB_ChangeUserPassword '".$_SERVER['PHP_AUTH_USER']."' '".$new_pwd."' 'ChangePassword.php'", $output, $result);

				foreach ( $output as $item ) {
					echo '<div class="Comments" align="center">'.$item.'</div>';
				}
				
				if ( $result == 0 ) {
					$result = UpdateWolfDB($_SERVER['PHP_AUTH_USER'], $new_pwd);
				
					if ( $result > 0 ) {
						?><script type="text/javascript">generate_message('success', 2000, 'Success !');</script><?php
						$_SERVER['PHP_AUTH_PW'] = $new_pwd;
					} else {
						?><script type="text/javascript">generate_message('error', 5000, 'Failed ! It was not possible to update the Wolf database.');</script><?php
					}
				} else {
					?><script type="text/javascript">generate_message('error', 5000, 'Error occured with "MySB_ChangeUserPassword" script !');</script><?php
				}
			} else {
				?><script type="text/javascript">generate_message('error', 5000, 'Error between the new typed password and verification.');</script><?php
			}
		} else {
			?><script type="text/javascript">generate_message('error', 5000, 'The current password is not valid.');</script><?php
		}
	} else {
		?><script type="text/javascript">generate_message('information', 5000, 'Please, complete all fields.');</script><?php
	}
}

//#################### LAST LINE ######################################
?>