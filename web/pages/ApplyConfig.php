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

//CreateLogFile("../../temp/Postfix.log", $output);
// $contenu=file_get_contents('/tmp/Postfix.start'); 
// echo "<div style=\"text-align:left;\" align=\"center\"><pre>$contenu</pre></div>";
// $contenu=file_get_contents('/tmp/Postfix.end'); 
// echo "<div style=\"text-align:left;\" align=\"center\"><pre>$contenu</pre></div>";

if ( IfApplyConfig() > 0 ) {
	global $MySB_DB, $CurrentUser;
	
	$CommandsToReload = $MySB_DB->select("commands", "*", ["user" => "$CurrentUser", "ORDER" => "priority DESC"]);

	foreach ($CommandsToReload as $Cmd) {
		$output = '';

		switch ($Cmd['commands']) {
			case "Postfix":
				echo '<div align="center"><h1>Postfix...</h1></div>';

				exec("sudo /bin/bash /etc/MySB/scripts/ApplyConfig.bsh 'Postfix' '$CurrentUser'", $output, $result);

				if ( $result == 0 ) {
					$result = $MySB_DB->update("commands", ["reload" => 0],  ["AND" => ["user" => "$CurrentUser", "commands" => $Cmd['commands']]]);
					
					if ( $result > 0 ) {
						$type = 'success';
						$message = 'Success !<br /><br />This will take effect in a moment.';
					} else {
						$type = 'error';
						$message = 'Failed ! It was not possible to update the MySB database.';
					}
				} else {
					$type = 'error';
					$message = 'Error occured with "FirewallAndSecurity.bsh" script !';
				}

				break;
				
			case "BlocklistsRTorrent.bsh":
				echo '<div align="center"><h1>BlocklistsRTorrent.bsh...</h1></div>';

				exec("sudo /bin/bash /etc/MySB/scripts/ApplyConfig.bsh 'BlocklistsRTorrent.bsh' '$CurrentUser'", $output, $result);

				if ( $result == 0 ) {
					$result = $MySB_DB->update("commands", ["reload" => 0],  ["AND" => ["user" => "$CurrentUser", "commands" => $Cmd['commands']]]);
					
					if ( $result > 0 ) {
						$type = 'success';
						$message = 'Success !<br /><br />The blocklist for rTorrent was created!<br />This will take effect in a moment.';
					} else {
						$type = 'error';
						$message = 'Failed ! It was not possible to update the MySB database.';
					}
				} else {
					$type = 'error';
					$message = 'Error occured with "FirewallAndSecurity.bsh" script !';
				}

				break;
				
			case "FirewallAndSecurity.bsh":
				echo '<div align="center"><h1>FirewallAndSecurity.bsh...</h1></div>';

				exec("sudo /bin/bash /etc/MySB/scripts/ApplyConfig.bsh 'FirewallAndSecurity.bsh' '$CurrentUser'", $output, $result);

				if ( $result == 0 ) {
					$result = $MySB_DB->update("commands", ["reload" => 0],  ["AND" => ["user" => "$CurrentUser", "commands" => $Cmd['commands']]]);
					
					if ( $result > 0 ) {
						$type = 'success';
						$message = 'Success !<br /><br />This will take effect in a moment.';
					} else {
						$type = 'error';
						$message = 'Failed ! It was not possible to update the MySB database.';
					}
				} else {
					$type = 'error';
					$message = 'Error occured with "FirewallAndSecurity.bsh" script !';
				}

				break;
			case "GetTrackersCert.bsh":
				echo '<div align="center"><h1>GetTrackersCert.bsh...</h1></div>';

				exec("sudo /bin/bash /etc/MySB/scripts/ApplyConfig.bsh 'GetTrackersCert.bsh' '$CurrentUser'", $output, $result);

				if ( $result == 0 ) {
					$result = $MySB_DB->update("commands", ["reload" => 0],  ["AND" => ["user" => "$CurrentUser", "commands" => $Cmd['commands']]]);
					
					if ( $result > 0 ) {
						$type = 'success';
						$message = 'Success !<br /><br />This will take effect in a moment.';
					} else {
						$type = 'error';
						$message = 'Failed ! It was not possible to update the MySB database.';
					}
				} else {
					$type = 'error';
					$message = 'Error occured with "FirewallAndSecurity.bsh" script !';
				}

				break;
				
			case "MySB_ChangeUserPassword":
				echo '<div align="center"><h1>MySB_ChangeUserPassword...</h1></div>';

				$args = explode("|", $Cmd['args']);
				$username = $args[0];
				$passwd = $args[1];		

				#exec("sudo /bin/bash /etc/MySB/scripts/ApplyConfig.bsh 'MySB_ChangeUserPassword' '$username' '$passwd' '$CurrentUser'", $output, $result);
				exec("sudo /bin/bash /etc/MySB/scripts/ApplyConfig.bsh 'MySB_ChangeUserPassword' '$CurrentUser'", $output, $result);
				
				if ( $result == 0 ) {
					$result = $MySB_DB->update("commands", ["reload" => 0],  ["AND" => ["user" => "$CurrentUser", "commands" => $Cmd['commands']]]);
					
					if ( $result > 0 ) {
						$type = 'success';
						$message = 'Success !<br /><br />This will take effect in a moment.';
					} else {
						$type = 'error';
						$message = 'Failed ! It was not possible to update the MySB database.';
					}
				} else {
					$type = 'error';
					$message = 'Error occured with "FirewallAndSecurity.bsh" script !';
				}

				break;
				
			case "MySB_CreateUser":
				echo '<div align="center"><h1>MySB_CreateUser...</h1></div>';

				$args = explode("|", $Cmd['args']);
				$UserToCreate = $args[0];
				$UserSFTP = $args[1];
				$UserSUDO = $args[2];
				$UserEmail = $args[3];
				# ($1 = user, $2 = sftp, $3 = sudo, $4 = email)

				#exec("sudo /bin/bash /etc/MySB/scripts/ApplyConfig.bsh 'MySB_CreateUser' '$UserToCreate' '$UserSFTP' '$UserSUDO' '$UserEmail' '$CurrentUser'", $output, $result);
				exec("sudo /bin/bash /etc/MySB/scripts/ApplyConfig.bsh 'MySB_CreateUser' '$CurrentUser'", $output, $result);

				if ( $result == 0 ) {
					$result = $MySB_DB->update("commands", ["reload" => 0],  ["AND" => ["user" => "$CurrentUser", "commands" => $Cmd['commands']]]);
					
					if ( $result > 0 ) {
						$type = 'success';
						$message = 'Success !<br /><br />This will take effect in a moment.';
					} else {
						$type = 'error';
						$message = 'Failed ! It was not possible to update the MySB database.';
					}
				} else {
					$type = 'error';
					$message = 'Error occured with "MySB_CreateUser" script !';
				}

				break;
				
			case "MySB_DeleteUser":
				echo '<div align="center"><h1>MySB_DeleteUser...</h1></div>';

				$username = $Cmd['args'];

				#exec("sudo /bin/bash /etc/MySB/scripts/ApplyConfig.bsh 'MySB_DeleteUser' '$username' '$CurrentUser'", $output, $result);
				exec("sudo /bin/bash /etc/MySB/scripts/ApplyConfig.bsh 'MySB_DeleteUser' '$CurrentUser'", $output, $result);

				if ( $result == 0 ) {
					$result = $MySB_DB->update("commands", ["reload" => 0],  ["AND" => ["user" => "$CurrentUser", "commands" => $Cmd['commands']]]);
					
					if ( $result > 0 ) {
						$type = 'success';
						$message = 'Success !<br /><br />This will take effect in a moment.';
					} else {
						$type = 'error';
						$message = 'Failed ! It was not possible to update the MySB database.';
					}
				} else {
					$type = 'error';
					$message = 'Error occured with "MySB_DeleteUser" script !';
				}

				break;
		}

		if ( $type == 'success' ) {
			echo '<script type="text/javascript">ApplyConfig("Updated");</script>';
		}

		GenerateMessage('message_only', $type, $message, '');
		header('Refresh: 4; URL='.$_SERVER['HTTP_REFERER'].'');
	}
} else {
	$type = 'information';
	$message = 'Nothing to apply...';
	GenerateMessage('message_only', $type, $message, '');
	header('Refresh: 3; URL=/');
}

//#################### LAST LINE ######################################
?>