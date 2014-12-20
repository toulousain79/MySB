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
	global $MySB_DB;

	$result = $MySB_DB->count("users", "");
	
	return $result;
}

// MySB version
function GetVersion() {
	global $system_datas;
	
	return $system_datas["mysb_version"];
}

// Main user ?
function MainUser() {
	global $MySB_DB;
	
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
function MenuDisplayChildren($page, $current, $startmenu = true) {
	global $MySB_DB, $system_datas;

	$hidden = (MainUser()) ? true : false;
	$CakeboxDatas = $MySB_DB->get("services", "*", ["serv_name" => "CakeBox-Light"]);
	
	echo '<ul>';
	echo '<li><a target="_blank"  href="ru">ruTorrent</a></li>';
	echo '<li><a target="_blank"  href="sm">Seedbox-Manager</a></li>';
	echo '<li><a target="_blank"  href="https://' . $system_datas["hostname"] . ':' . $CakeboxDatas["port_tcp1"] . '/">Cakebox-Light</a></li>';
	echo '</ul>';
	
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
            
            MenuDisplayChildren($menu, $current, true);
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
	global $MySB_DB;

	if (!defined('IN_CMS')) { exit(); }
	
	if ( MainUser() == true ) {	
		if ( (isset($password)) && (isset($username)) ) {
			$PDO = Record::getConnection();
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

// Compare password and salt between MySB db and Wolf db
function CheckWolfDB($username, $password) {
	global $Wolf_DB;
	
	if ( MainUser() == true ) {
		$Wolf_Datas = $Wolf_DB->get("user", ["password", "salt"], ["username" => "$username"]);
		
		if ( ($Wolf_Datas["password"] == "") || ($Wolf_Datas["salt"] == "") ) {
			UpdateWolfDB($username, $password);
		}
	}
}

// Get only domain
function GetOnlyDomain($url) {
	if (filter_var($url, FILTER_VALIDATE_URL)) {
		$hostname = parse_url($url, PHP_URL_HOST);
		$hostParts = explode('.', $hostname);
		$numberParts = sizeof($hostParts);
		$domain='';

		switch ($numberParts) {
			case 1:
				$domain = current($hostParts);
				break;
			case 2:
				$hostParts = array_reverse($hostParts);
				$domain = $hostParts[1] .'.'. $hostParts[0];
				break;			
			default:
				$hostParts = array_reverse($hostParts);
				$domain = $hostParts[1] .'.'. $hostParts[0];
				break;
		}
	} else {
		$hostParts = explode('.', $url);
		$hostParts = array_reverse($hostParts);
		$domain = $hostParts[1] .'.'. $hostParts[0];
	}
	
	return $domain;
}

// Manage User Trackers
function ManageUsersTrackers($TrackerDomain, $IsActive) {
	global $MySB_DB;
	
	$value = false;
	
	$TrackerDomain = str_replace(' ','',"$TrackerDomain");
	$TrackerDomain = GetOnlyDomain("$TrackerDomain");
	$TrackerAddress = "";

	switch ($IsActive) {
		case "1":
			$to_check = 1;
			break;
		default:
			$to_check = 0;
			break;
	}	
	
	$DnsRecords = dns_get_record("tracker".$TrackerDomain, $type = DNS_A);
	if ( $DnsRecords != "" ) {
		$TrackerAddress = "tracker".$TrackerDomain;
	} else {
		$TrackerAddress = $TrackerDomain;
	}
	
	// Check if address exist
	$IdTracker = $MySB_DB->get("trackers_list", "id_trackers_list", [
																		"AND" => [
																			"origin" => "users",
																			"tracker_domain" => "$TrackerDomain"
																		]
																	]);

	if ( $IdTracker > 0 ) {
		$value = $MySB_DB->update("trackers_list", ["tracker" => "$TrackerAddress", "is_active" => "$IsActive", "to_check" => "$to_check"], ["tracker_domain" => "$TrackerDomain"]);
	} else {
		if ( $DnsRecords == "" ) {
			$DnsRecords = dns_get_record($TrackerAddress, $type = DNS_A);
		}	
		
		if ( $DnsRecords != "" ) {
			$id_trackers_list = $MySB_DB->insert("trackers_list", [
															"tracker" => "$TrackerAddress",
															"tracker_domain" => "$TrackerDomain",
															"origin" => "users",
															"is_active" => "$IsActive",
															"to_check" => "$to_check"
														]);	
			foreach($DnsRecords as $Record) {
				$value = $MySB_DB->insert("trackers_list_ipv4", [
																"id_trackers_list" => "$id_trackers_list",
																"ipv4" => $Record['ip']
															]);
			}
		}
	}
	
	return $value;
}

// Manage Users Addresses
function ManageUsersAddresses($UserName, $IPv4, $HostName, $IsActive, $CheckBy) {
	global $MySB_DB;
	
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
	global $MySB_DB;
	
	$value = $MySB_DB->count("commands", "reload", ["reload" => 1]);	

	return $value;
}

// Generate message (success, error, information, ...)
function GenerateMessage($commands, $type, $message = '') {
	global $MySB_DB;

	switch ($type) {
		case "success":
			$timeout = 2000;
			$message = 'Success !';
			if ( $commands != false ) {
				$value = $MySB_DB->update("commands", ["reload" => 1], ["commands" => "$commands"]);
				
				switch ($commands) {
					case "GetTrackersCert.bsh":
						$value = $MySB_DB->update("commands", ["reload" => 0], ["commands" => "FirewallAndSecurity.bsh"]);
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