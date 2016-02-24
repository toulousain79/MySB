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

// Change ownCloud language
function ChangeOwnCloudLanguage($user, $language) {
	global $MySB_DB, $ownCloud_DB;

	$ownCloudDatas = $MySB_DB->get("services", "is_installed", ["serv_name" => "ownCloud"]);

	if ( $ownCloudDatas["is_installed"] == '1' ) {
		$ownCloud_DB->update("oc_preferences", ["configvalue" => "$language"], ["AND" => [
																						"userid" => "$user",
																						"configkey" => "lang"
																					]]);
	}
}

// Change Cakebox-light language
function ChangeCakeboxLanguage($user, $language) {
	global $MySB_DB;

	$CakeboxDatas = $MySB_DB->get("services", "is_installed", ["serv_name" => "CakeBox-Light"]);

	if ( $CakeboxDatas["is_installed"] == '1' ) {
		$CakeboxDir = $MySB_DB->get("repositories", "dir", ["name" => "Cakebox-Light"]);
		$ConfigFile = MYSB_ROOT.$CakeboxDir . "/config/" . $user . ".php";

		if ( file_exists($ConfigFile) ) {
			$File = fopen($ConfigFile, 'r') or die("Config file missing R");
			$Content = file_get_contents($ConfigFile);

			switch ($language) {
				case 'fr':
					$NewContent = str_replace('"en"', '"fr"', $Content);
					break;

				default:
					$NewContent = str_replace('"fr"', '"en"', $Content);
			}
			fclose($File);

			//ouverture en écriture
			$File = fopen($ConfigFile, 'w+') or die("File missing W for: $ConfigFile");
			fwrite($File, $NewContent);
			fclose($File);
		}
	}
}

// Password Generator
function PasswordGenerator ($length = 8) {
	$password = "";
	$possibilities = "012346789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
 
	$lengthMax = strlen($possibilities);
 
	if ($length > $lengthMax) {
		$length = $lengthMax;
	}
 
	$i = 0;
	while ($i < $length) {
		$caractere = substr($possibilities, mt_rand(0, $lengthMax-1), 1);
 
		if (!strstr($password, $caractere)) {
			$password .= $caractere;
			$i++;
		}
	}
 
	return $password;
}

// Validate e-mail
function ValidateEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Truncate string with suffix like '...'
function StringTruncate($string, $minlen, $maxlen, $separator = ' ', $suffix = '') {
	$result = $string;
	if (strlen($result) > $maxlen) {
		if (($pos = strrpos(substr($result, 0, $maxlen + strlen( $separator )), $separator)) !== false) {
			if ($pos < $minlen) {
				$result = substr($result, 0, $maxlen) . $suffix;
			} else {
				$result = substr($result, 0, $pos) . $suffix;
			}
		} else {
			$result = substr($result, 0, $maxlen) . $suffix;
		}
	}
	echo $result;
}

// CountingUsers
function CountingUsers() {
	global $MySB_DB;

	$result = $MySB_DB->count("users");

	return $result;
}

// MySB version
function GetVersion() {
	global $system_datas;

	return $system_datas["mysb_version"];
}

// Main user ?
function MainUser($user) {
	global $MySB_DB;

	$MainUser = $MySB_DB->get("users", "users_ident", ["admin" => 1]);

	switch ($MainUser) {
		case "$user":
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
	global $MySB_DB, $Port_HTTPs, $system_datas, $CurrentUser;

	$hidden = (MainUser($CurrentUser)) ? true : false;
	$CakeboxDatas = $MySB_DB->get("services", "*", ["serv_name" => "CakeBox-Light"]);
	$CakeboxIsInstalled = $CakeboxDatas["is_installed"];
	$ManagerIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "Seedbox-Manager"]);
	$WebminDatas = $MySB_DB->get("services", "*", ["serv_name" => "Webmin"]);
	$WebminIsInstalled = $WebminDatas["is_installed"];
	$DnscryptIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "DNScrypt-proxy"]);
	$PlexMediaIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "Plex Media Server"]);
	$PeerguardianIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "PeerGuardian"]);
	$ownCloudIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "ownCloud"]);

    if ($page && count($page->children(null, array(), $hidden)) > 0) {
        echo ($startmenu) ? '<ul>' : '';

        foreach($page->children(null, array(), $hidden) as $menu) :
			switch ($menu->title) {
				case "Apply configuration":
					$replace = '<div id="ApplyConfigButtonReplace" style="padding-top: 8px; padding-left: 10px; text-align:center; display:none; height: 24px;"><img src="'.THEMES_PATH.'MySB/images/ajax-loader.gif" alt="loading..."></div>';
					$style = "id=\"ApplyConfigButtonState\" class=\"ApplyConfigButtonNothing\" onclick=\"ButtonClicked('config')\"";
					echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$replace.'<div id="ApplyConfigButton">'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr, $style).'</div>';
					break;
				case "ruTorrent":
					echo '<li><a target="_blank"  href="ru">ruTorrent</a>';
					break;
				case "Seedbox-Manager":
					if ( $ManagerIsInstalled == '1' ) {
						echo '<li><a target="_blank"  href="sm">Seedbox-Manager</a>';
					}
					break;
				case "PeerGuardian BlockLists":
					if ( $PeerguardianIsInstalled == '1' ) {
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
					}
					break;
				case "Cakebox-Light":
					if ( $CakeboxIsInstalled == '1' ) {
						echo '<li><a target="_blank"  href="https://' . $system_datas["hostname"] . ':' . $Port_HTTPs . '/cb/">Cakebox-Light</a>';
					}
					break;
				case "LoadAvg":
					echo '<li><a target="_blank"  href="https://' . $system_datas["hostname"] . ':' . $Port_HTTPs . '/loadavg/public/">LoadAvg</a>';
					break;
				case "ownCloud":
					if ( $ownCloudIsInstalled == '1' ) {
						echo '<li><a target="_blank"  href="https://' . $system_datas["hostname"] . ':' . $Port_HTTPs . '/owncloud/">ownCloud</a>';
					}
					break;
				case "Plex Media":
					if ($PlexMediaIsInstalled == '1') {
						//echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
						echo '<li><a target="_blank"  href="https://app.plex.tv/web/app">Plex Media</a>';
					}
					break;
				case "Webmin":
					if ( $WebminIsInstalled == '1' ) {
						echo '<li><a target="_blank"  href="https://' . $system_datas["hostname"] . ':' . $WebminDatas["port_tcp1"] . '/">Webmin</a>';
					}
					break;
				case "DNScrypt-proxy":
					if ( $DnscryptIsInstalled == '1' ) {
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
					}
					break;
				case "User":
					echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link($CurrentUser);
					break;
				default:
					echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
					break;
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

	if ( MainUser($username) == true ) {	
		if ( (isset($password)) && (isset($username)) ) {
			$PDO = Record::getConnection();
			$sql_update = '';

			$salt = AuthUser::generateSalt();
			$password = AuthUser::generateHashedPassword($password, $salt);
			$MainUserEmail = $MySB_DB->get("users", "users_email", ["admin" => 1]);

			$sql_update = "UPDATE ".TABLE_PREFIX."user SET name = '".$username."', email = '".$MainUserEmail."', username = '".$username."', password = '".$password."', salt = '".$salt."' WHERE id = 2";

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

	if ( MainUser($username) == true ) {
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

	$TrackerDomain = preg_replace('/\s\s+/', '', "$TrackerDomain"); 
	$TrackerAddress = "";

	switch ($IsActive) {
		case "1":
			$to_check = 1;
			break;
		default:
			$to_check = 0;
			break;
	}

	$DnsRecords = dns_get_record("tracker.".$TrackerDomain, $type = DNS_A);
	$count = 0;
	foreach($DnsRecords as $Record) {
		if ( $Record['ip'] != "" ) {
			$count++;
		}
	}

	if ( $count >= 1 ) {
		$TrackerAddress = "tracker.".$TrackerDomain;
	} else {
		$TrackerAddress = $TrackerDomain;
		$DnsRecords = dns_get_record($TrackerAddress, $type = DNS_A);
		$count = 0;
		foreach($DnsRecords as $Record) {
			if ( $Record['ip'] != "" ) {
				$count++;
			}
		}
	}

	// Check if address exist
	$IfTrackerExist = $MySB_DB->get("trackers_list", "id_trackers_list", [
																		"AND" => [
																			"origin" => "users",
																			"tracker_domain" => "$TrackerDomain"
																		]
																	]);
	if ( $count >= 1 ) {
		if ( $IfTrackerExist > 0 ) {
			$id_trackers_list = $MySB_DB->update("trackers_list", ["tracker" => "$TrackerAddress", "is_active" => "$IsActive", "to_check" => "$to_check"], ["tracker_domain" => "$TrackerDomain"]);
		} else {
			$id_trackers_list = $MySB_DB->insert("trackers_list", [
																	"tracker" => "$TrackerAddress",
																	"tracker_domain" => "$TrackerDomain",
																	"origin" => "users",
																	"is_active" => "$IsActive",
																	"to_check" => "$to_check"
																]);
		}
		if ( $id_trackers_list > 0 ) {
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
	$DateTime = date("Y-m-d H:i:s");
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
					$value = $MySB_DB->update("users_addresses", [	"hostname" => "$HostName",
																	"check_by" => "$CheckBy",
																	"is_active" => "$IsActive",
																	"last_update" => "$DateTime" ],
																[ "AND" => [ "id_users" => "$UserID", "ipv4" => "$IPv4" ]]);
					break;
				default:
					$value = $MySB_DB->update("users_addresses", [ "is_active" => "$IsActive" ], [ "AND" => [ "id_users" => "$UserID", "ipv4" => "$IPv4" ]]);
					break;
			}
			break;
		case 'hostname':
			switch ($CheckBy) {
				case 'ipv4':
					$value = $MySB_DB->update("users_addresses", [	"hostname" => "$HostName",
																	"check_by" => "$CheckBy",
																	"is_active" => "$IsActive",
																	"last_update" => "$DateTime" ],
																[ "AND" => [ "id_users" => "$UserID", "ipv4" => "$IPv4" ]]);
					break;
				default:
					$value = $MySB_DB->update("users_addresses", [ "is_active" => "$IsActive" ], [ "AND" => [ "id_users" => "$UserID", "ipv4" => "$IPv4" ]]);					
					break;
			}
			break;
		default:
			$value = $MySB_DB->insert("users_addresses", [
													"id_users" => "$UserID",
													"ipv4" => "$IPv4",
													"hostname" => "$HostName",
													"check_by" => "$CheckBy",
													"is_active" => "$IsActive",
													"last_update" => "$DateTime"
												]);
			break;
	}

	return $value;
}

// Validate an IPv4 address, excluding private range addresses
function ValidateIPv4($ip) {
	//if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
	if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_RES_RANGE)) {
		return true;
	} else {
		return false;
	}
}

// Can I activate 'Apply' button ?
function IfApplyConfig() {
	global $MySB_DB, $CurrentUser;
	
	$value = $MySB_DB->count("commands", "commands", ["AND" => ["user" => "$CurrentUser", "reload" => 1]]);

	return $value;
}

// Generate message (success, error, information, ...)
function GenerateMessage($commands, $type, $message, $args) {
	global $MySB_DB, $CurrentUser;

	switch ($type) {
		case "success":
			$timeout = 2000;

			if ( !isset($message) ) {
				$message = Global_Success;
			}

			switch ($commands) {
				case "message_only": // Used to only display a message
					$timeout = 10000;
					
					break;

				default: // Used for create a new command to apply
					$timeout = 4000;
					if ( !isset($message) || ($message == 'Success !') )  {
						$message = Global_SuccessAndApply;
					}

					$priority = $MySB_DB->max("commands", "priority");
					$priority++;

					$value = $MySB_DB->insert("commands", ["commands" => "$commands", "reload" => 1, "priority" => "$priority", "args" => "$args", "user" => "$CurrentUser"]);

					echo '<script type="text/javascript">ApplyConfig("ToUpdate");</script>';

					break;
			}
			
			break;
		default:
			$timeout = 7000;
			break;
	}

	echo '<script type="text/javascript">generate_message("'. $type . '", ' . $timeout . ', "' . $message . '");</script>';
}

// Replaces accented characters
function ReplacesSpecialCharacters($str, $encoding='utf-8') {
	// TO HTML entities
	$str = htmlentities($str, ENT_NOQUOTES, $encoding);

	// From HTML entities TO non accented characters
	// Ex: "&ecute;" => "e", "&Ecute;" => "E", "Ã " => "a" ...
	$str = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $str);

	// Replace ligatures like : Œ, Æ ...
	// Ex: "Å“" => "oe"
	$str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
	// Supprimer tout le reste
	$str = preg_replace('#&[^;]+;#', '', $str);
	$str = preg_replace('/\(|\)/', '', $str);

	return $str;
}

//#################### LAST LINE ######################################
