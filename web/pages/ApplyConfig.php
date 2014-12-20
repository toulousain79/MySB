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

if ( IfApplyConfig() > 0 ) {
	global $MySB_DB;
	
	$Commands = $MySB_DB->select("commands", "commands", ["reload" => 1, "ORDER" => "priority DESC"]);

	foreach ($Commands as $Cmd) {
		switch ($Cmd) {
			case "FirewallAndSecurity.bsh":
				echo '<div align="center"><h1>FirewallAndSecurity.bsh...</h1></div>';
			
				#exec("sudo /bin/bash /etc/MySB/scripts/FirewallAndSecurity.bsh new 'ApplyConfig.php'", $output, $result);
				exec("sudo /bin/bash /etc/MySB/scripts/PortalApplyConfig.bsh 'scripts/FirewallAndSecurity.bsh'", $output, $result);

				foreach ( $output as $item ) {
					echo '<div class="Comments" align="center">'.$item.'</div>';
				}
				
				if ( $result == 0 ) {
					$result = $MySB_DB->update("commands", ["reload" => 0], ["commands" => "$Cmd"]);
					if ( $result > 0 ) {
						$type = 'success';
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
				
				#exec("sudo /bin/bash /etc/MySB/scripts/FirewallAndSecurity.bsh 'new' 'ApplyConfig.php' 'GetTrackersCert.bsh'", $output, $result);
				exec("sudo /bin/bash /etc/MySB/scripts/PortalApplyConfig.bsh 'scripts/GetTrackersCert.bsh'", $output, $result);

				foreach ( $output as $item ) {
					echo '<div class="Comments" align="center">'.$item.'</div>';
				}				

				if ( $result == 0 ) {
					$result = $MySB_DB->update("commands", ["reload" => 0], ["commands" => "$Cmd"]);
					if ( $result > 0 ) {
						$type = 'success';
					} else {
						$type = 'error';
						$message = 'Failed ! It was not possible to update the MySB database.';
					}			
				} else {
					$type = 'error';
					$message = 'Error occured with "FirewallAndSecurity.bsh" script !';
				}
				
				break;
			case "PaymentReminder.bsh":
				echo '<div align="center"><h1>PaymentReminder.bsh...</h1></div>';
				$result = $MySB_DB->update("commands", ["reload" => 0], ["commands" => "$Cmd"]);
				if ( $result > 0 ) {
					$type = 'success';
				} else {
					$type = 'error';
					$message = 'Failed ! It was not possible to update the MySB database.';
				}
				header('Refresh: 3; URL=/');
				
				break;
			case "MySB_ChangeUserPassword":
				echo '<div align="center"><h1>MySB_ChangeUserPassword...</h1></div>';

				exec("sudo /bin/bash /etc/MySB/scripts/PortalApplyConfig.bsh 'bin/MySB_ChangeUserPassword' '".$_SERVER['PHP_AUTH_USER']."'", $output, $result);

				foreach ( $output as $item ) {
					echo '<div class="Comments" align="center">'.$item.'</div>';
				}				

				if ( $result == 0 ) {
					$result = $MySB_DB->update("commands", ["reload" => 0], ["commands" => "$Cmd"]);
					if ( $result > 0 ) {
						$type = 'success';
					} else {
						$type = 'error';
						$message = 'Failed ! It was not possible to update the MySB database.';
					}			
				} else {
					$type = 'error';
					$message = 'Error occured with "MySB_ChangeUserPassword" script !';
				}
				
				break;				
		}
		
		if ( $type == 'success' ) {
			echo '<script type="text/javascript">ApplyConfig("Updated");</script>';
		}
		GenerateMessage(false, $type, $message);
	}
} else {
	echo '<h1>Nothing to apply...</h1>';
	$type = 'information';
	$message = 'Nothing to apply...';	
	GenerateMessage(false, $type, $message);
	header('Refresh: 5; URL=/');
}

//#################### LAST LINE ######################################
?>