<?php
// ---------------------------
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

// CountingUsers
function CountingUsers() {
	$MySB_DB = new medoo_MySB();

	$result = $MySB_DB->count("users", "");
	
	return $result;
}

// MySB version
function GetVersion() {
	$MySB_DB = new medoo_MySB();
	
	$Version = $MySB_DB->get("system", "mysb_version", ["id_system" => 1]);
	
	return $Version;
}

// Main user ?
function MainUser() {
	$MySB_DB = new medoo_MySB();
	
	$MainUser = $MySB_DB->get("users", "users_ident", ["admin" => 1]);
	$CurrentUser = $_SERVER['PHP_AUTH_USER'];

	switch ($MainUser) {
		case "$CurrentUser":
			$result = true;
			break;		
		default:
			$result = false;
			break;
	}
	
	return $result;
}

// Create menu with submenu
function displayChildren($page, $current, $startmenu = true) {
	$hidden = (MainUser()) ? true : false;
	
    if ($page && count($page->children(null, array(), $hidden)) > 0) {
        echo ($startmenu) ? '<ul>' : '';

        foreach($page->children(null, array(), $hidden) as $menu) :
			if ( $menu->title == "Apply configuration" ) {
				$replace = '<div id="ApplyConfigButtonReplace" style="padding-top: 10px; padding-left: 10px; text-align:center; display:none; height: 29px;"><img src="'.THEMES_PATH.'MySB/images/ajax-loader.gif" alt="loading..."></div>';		
				$style = "id=\"ApplyConfigButtonState\" class=\"ApplyConfigButtonNothing\" onclick=\"ButtonClicked('config')\"";
				echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$replace.'<div id="ApplyConfigButton">'.$menu->link($menu->title, $style).'</div>';
			} else {
				echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link($menu->title);
			}		
            
            displayChildren($menu, $current, true);
            echo '</li>';
            endforeach;
        echo ($startmenu) ? '</ul>' : '';
    }
	
	if ( IfApplyConfig() > 0 ) {
		echo '<script type="text/javascript">ApplyConfig("ToUpdate");</script>';
	}
}

// Update Wolf database
function UpdateWolfDB($username, $password) {
	if (!defined('IN_CMS')) { exit(); }
	
	if ( MainUser() == true ) {	
		if ( (isset($password)) && (isset($username)) ) {
			$PDO = Record::getConnection();
			$MySB_DB = new medoo_MySB();
			$sql_update = '';		
		
			$salt = AuthUser::generateSalt();
			$password = AuthUser::generateHashedPassword($password, $salt);
			$MainUserEmail = $MySB_DB->get("users", "users_email", ["admin" => 1]);
			
			$sql_update = "UPDATE ".TABLE_PREFIX."user SET name = '".$username."', email = '".$MainUserEmail."', username = '".$username."', password = '".$password."', salt = '".$salt."' WHERE id = 1";
			
			$result = $PDO->exec($sql_update);
		} else {
			$result = false;
		}
	} else {
		$result = true;
	}
	
	return $result;
}

// Manage User Trackers
function ManageUsersTrackers($TrackerDomain, $IsActive) {
	$MySB_DB = new medoo_MySB();
	$value = false;

	// Check if address exist
	$IdTracker = $MySB_DB->get("trackers_list", "id_trackers_list", [
																		"AND" => [
																			"origin" => "users",
																			"tracker_domain" => "$TrackerDomain"
																		]
																	]);

	if ( $IdTracker > 0 ) {
		$value = $MySB_DB->update("trackers_list", ["is_active" => "$IsActive"], ["tracker_domain" => "$TrackerDomain"]);
	} else {
		
		$id_trackers_list = $MySB_DB->insert("trackers_list", [
														"tracker" => "$TrackerDomain",
														"tracker_domain" => "$TrackerDomain",
														"origin" => "users",
														"is_active" => "$IsActive"
													]);

		$DnsRecords = dns_get_record("$TrackerDomain", $type = DNS_A);
		foreach($DnsRecords as $Record) {
			$value = $MySB_DB->insert("trackers_list_ipv4", [
															"id_trackers_list" => "$id_trackers_list",
															"ipv4" => $Record['ip']
														]);
		}
	}
	
	return $value;
}

// Manage Users Addresses
function ManageUsersAddresses($UserName, $IPv4, $HostName, $IsActive, $CheckBy) {
	$MySB_DB = new medoo_MySB();
	$UserID = $MySB_DB->get("users", "id_users", ["users_ident" => "$UserName"]);
	$value = false;

	// Check if address exist
	$IfExist = $MySB_DB->get("users_addresses", "check_by", [
														"AND" => [
															"id_users" => $UserID,
															"ipv4" => $IPv4
														]
													]);

	switch ($IfExist) {
		case 'ipv4':
			switch ($CheckBy) {
				case 'hostname':
					$value = $MySB_DB->update("users_addresses", ["hostname" => "$HostName", "check_by" => "$CheckBy", "is_active" => "$IsActive"], [
																																					"AND" => [
																																						"id_users" => "$UserID",
																																						"ipv4" => "$IPv4"
																																					]
																																				]);
					break;			
				default:
					$value = $MySB_DB->update("users_addresses", ["is_active" => "$IsActive"], [
																								"AND" => [
																									"id_users" => "$UserID",
																									"ipv4" => "$IPv4"
																								]
																							]);					
					break;
			}
			break;
		case 'hostname':
			switch ($CheckBy) {
				case 'ipv4':
					$value = $MySB_DB->update("users_addresses", ["hostname" => "$HostName", "check_by" => "$CheckBy", "is_active" => "$IsActive"], [
																																					"AND" => [
																																						"id_users" => "$UserID",
																																						"ipv4" => "$IPv4"
																																					]
																																				]);
					break;			
				default:
					$value = $MySB_DB->update("users_addresses", ["is_active" => "$IsActive"], [
																								"AND" => [
																									"id_users" => "$UserID",
																									"ipv4" => "$IPv4"
																								]
																							]);					
					break;
			}
			break;			
		default:
			$value = $MySB_DB->insert("users_addresses", [
													"id_users" => "$UserID",
													"ipv4" => "$IPv4",
													"hostname" => "$HostName",
													"check_by" => "$CheckBy",
													"is_active" => "$IsActive"
												]);
			break;
	}
	
	return $value;
}

// Validate an IPv4 address, excluding private range addresses
function ValidateIPv4NoPriv($ip) {
	if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
		return true;
	} else {
		return false;
	}
}

// Can I activate 'Apply' button ?
function IfApplyConfig() {
	$MySB_DB = new medoo_MySB();
	
	$value = $MySB_DB->count("commands", "reload", ["reload" => 1]);	

	return $value;
}

// Generate message (success, error, information, ...)
function GenerateMessage($commands, $type, $message = '') {
	$MySB_DB = new medoo_MySB();

	switch ($type) {
		case "success":
			$timeout = 2000;
			$message = 'Success !';
			if ( $commands != false ) {
				$value = $MySB_DB->update("commands", ["reload" => 1], ["commands" => "$commands"]);
				
				switch ($commands) {
					case "GetTrackersCert.sh":
						$value = $MySB_DB->update("commands", ["reload" => 1], ["commands" => "FirewallAndSecurity.sh"]);
						break;
				}
				echo '<script type="text/javascript">ApplyConfig("ToUpdate");</script>';
			}
			break;		
		default:
			$timeout = 5000;
			break;
	}	

	echo '<script type="text/javascript">generate_message("'. $type . '", ' . $timeout . ', "' . $message . '");</script>';
}

//#################### LAST LINE ######################################
?>