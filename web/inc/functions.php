<?php
// ---------------------------
//  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
//   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
//	_\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
//	 _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
//	  _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
//	   _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
//		_\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
//		 _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
//		  _\///______________\///___\////__________\///////////_____\/////////////_____
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

# Sort array
function array_sort($array, $on, $order=SORT_ASC) {
	$new_array = array();
	$sortable_array = array();

	if (count($array) > 0) {
		foreach ($array as $k => $v) {
			if (is_array($v)) {
				foreach ($v as $k2 => $v2) {
					if ($k2 == $on) {
						$sortable_array[$k] = $v2;
					}
				}
			} else {
				$sortable_array[$k] = $v;
			}
		}

		switch ($order) {
			case SORT_ASC:
				asort($sortable_array);
			break;
			case SORT_DESC:
				arsort($sortable_array);
			break;
		}

		foreach ($sortable_array as $k => $v) {
			$new_array[$k] = $array[$k];
		}
	}

	return $new_array;
}

// Get Size
function GetSizeName($octet, $unit=true) {
	switch (strtoupper(substr($octet,-2))) {
		case 'KB':
			$octet = $octet*1024;
			break;

		default:
			break;
	}

	// Array contenant les differents unités
	$unite = array('Bytes','KB','MB','GB','TB');

	if ($octet < 1000) { // octet
		return ($unit) ? $octet.' '.$unite[0] : $octet;
	} else {
		if ($octet < 1000000) { // ko
			$ko = round($octet/1024,2);
			return ($unit) ? $ko.' '.$unite[1] : $ko;
		} else { // Mo ou Go
			if ($octet < 1000000000) { // Mo
				$mo = round($octet/(1024*1024),2);
				return ($unit) ? $mo.' '.$unite[2] : $mo;
			} else { // Go
				$go = round($octet/(1024*1024*1024),2);
				return ($unit) ? $go.' '.$unite[3] : $go;
			}
		}
	}
}

// Change NextCloud language
function ChangeNextCloudLanguage($user, $language) {
	global $MySB_DB, $NextCloud_DB;

	$NextCloudDatas = $MySB_DB->get("services", "is_installed", ["serv_name" => "NextCloud"]);

	if ( $NextCloudDatas["is_installed"] == '1' ) {
		$NextCloud_DB->update("nc_preferences", ["configvalue" => "$language"], ["AND" => [
																						"userid" => "$user",
																						"configkey" => "lang"
																					]]);
	}
}

// Change ruTorrent language
function ChangeRuTorrentLanguage($user, $language) {
	global $MySB_DB;

	$ConfigFile = "apps/ru/share/users/" . $user . "/settings/uisettings.json";

	if ( is_writable($ConfigFile) ) {
		$File = fopen($ConfigFile, 'r') or die("Config file missing R");
		$Content = file_get_contents($ConfigFile);

		switch ($language) {
			case 'fr':
				$NewContent = str_replace('"en"', '"fr"', $Content);
				break;

			default:
				$NewContent = str_replace('"fr"', '"en"', $Content);
				break;
		}
		fclose($File);

		//ouverture en écriture
		$File = fopen($ConfigFile, 'w+') or die("File missing W for: $ConfigFile");
		fwrite($File, $NewContent);
		fclose($File);
	}
}

// Change Cakebox-light language
function ChangeCakeboxLanguage($user, $language) {
	global $MySB_DB;

	$CakeboxDatas = $MySB_DB->get("services", "is_installed", ["serv_name" => "CakeBox-Light"]);

	if ( $CakeboxDatas["is_installed"] == '1' ) {
		$ConfigFile = "apps/cb/config/" . $user . ".php";

		if ( is_writable($ConfigFile) ) {
			$File = fopen($ConfigFile, 'r') or die("Config file missing R");
			$Content = file_get_contents($ConfigFile);

			switch ($language) {
				case 'fr':
					$NewContent = str_replace('"en"', '"fr"', $Content);
					break;

				default:
					$NewContent = str_replace('"fr"', '"en"', $Content);
					break;
			}
			fclose($File);

			//ouverture en écriture
			$File = fopen($ConfigFile, 'w+') or die("File missing W for: $ConfigFile");
			fwrite($File, $NewContent);
			fclose($File);
		}
	}
}

// Change Cakebox-light language
function ChangeManagerLanguage($user, $language) {
	global $MySB_DB;

	$ManagerDatas = $MySB_DB->get("services", "is_installed", ["serv_name" => "Seedbox-Manager"]);

	if ( $ManagerDatas["is_installed"] == '1' ) {
		$ConfigFile = "apps/sm/conf/users/" . $user . "/config.ini";

		if ( is_writable($ConfigFile) ) {
			$File = fopen($ConfigFile, 'r') or die("Config file missing R");
			$Content = file_get_contents($ConfigFile);

			switch ($language) {
				case 'fr':
					$NewContent = str_replace('"en"', '"fr"', $Content);
					break;

				default:
					$NewContent = str_replace('"fr"', '"en"', $Content);
					break;
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
	global $MySB_DB;
	$MySB_Version = $MySB_DB->get("system", "mysb_version", ["id_system" => 1]);

	return $MySB_Version;
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
	global $MySB_DB, $Port_HTTPs, $CurrentUser;

	$hidden = (MainUser($CurrentUser)) ? true : false;
	$SystemDatas = $MySB_DB->get("system", ["hostname", "rt_active", "rt_model", "rt_cost_tva", "rt_nb_users", "rt_price_per_users", "rt_method"], ["id_system" => 1]);
	$CakeboxDatas = $MySB_DB->get("services", "*", ["serv_name" => "CakeBox-Light"]);
	$CakeboxIsInstalled = $CakeboxDatas["is_installed"];
	$ManagerIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "Seedbox-Manager"]);
	$WebminDatas = $MySB_DB->get("services", "*", ["serv_name" => "Webmin"]);
	$WebminIsInstalled = $WebminDatas["is_installed"];
	$DnscryptIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "DNScrypt-proxy"]);
	$PlexMediaIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "Plex Media Server"]);
	$TautulliIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "Tautulli"]);
	$PeerguardianIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "PeerGuardian"]);
	$NextCloudIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "NextCloud"]);
	$OpenVPNIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "OpenVPN"]);
	$UserAccountType = $MySB_DB->get("users", "account_type", ["users_ident" => "$CurrentUser"]);

	if ($page && count($page->children(null, array(), $hidden)) > 0) {
		echo ($startmenu) ? '<ul>' : '';

		foreach($page->children(null, array(), $hidden) as $menu) :
			switch ($menu->title) {
				// Blocklists menu
				case "Blocklists":
				case "Listes noires":
					if ( $UserAccountType == 'normal' ) {
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
					}
					break;
				case "PeerGuardian BlockLists":
					if ( $PeerguardianIsInstalled == '1' ) {
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
					}
					break;

				// Trackers menu
				case "Trackers":
					if ( $UserAccountType == 'normal' ) {
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
					}
					break;

				// User menu
				case "User":
					echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link($CurrentUser);
					break;
				case "OpenVPN":
					if ( ($UserAccountType == 'normal') && ($OpenVPNIsInstalled == '1') ) {
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
					}
					break;
				case "Labels & Synchros":
					if ( $UserAccountType == 'normal' ) {
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
					}
					break;

				// Services menu
				case "ruTorrent":
					if ( $UserAccountType == 'normal' ) {
						$title = ($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr;
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="ru">'.$title.'</a>';
					}
					break;
				case "Seedbox-Manager":
					if ( ($ManagerIsInstalled == '1') && ($UserAccountType == 'normal') ) {
						$title = ($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr;
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="sm">'.$title.'</a>';
					}
					break;
				case "Cakebox-Light":
					if ( ($CakeboxIsInstalled == '1') && ($UserAccountType == 'normal') ) {
						$title = ($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr;
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="cb">'.$title.'</a>';
					}
					break;
				case "NextCloud":
					if ( ($NextCloudIsInstalled == '1') && ($UserAccountType == 'normal') ) {
						$link = 'https://' . $SystemDatas["hostname"] . ':' . $Port_HTTPs . '/nc/';
						$title = ($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr;
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="'.$link.'">'.$title.'</a>';
					}
					break;
				case "Plex Media Server":
					if ($PlexMediaIsInstalled == '1') {
						$link = 'https://' . $SystemDatas["hostname"] . ':' . $Port_HTTPs . '/web';
						$title = ($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr;
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="'.$link.'">'.$title.'</a>';
					}
					break;
				case "Tautulli":
					if ( ($TautulliIsInstalled == '1') && ($hidden == true) ) {
						$link = 'https://' . $SystemDatas["hostname"] . ':' . $Port_HTTPs . '/tt/home';
						$title = ($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr;
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="'.$link.'">'.$title.'</a>';
					}
					break;
				case "Shell In a Box":
					if ($hidden == true) {
						$link = 'https://' . $SystemDatas["hostname"] . ':' . $Port_HTTPs . '/sb';
						$title = ($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr;
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="'.$link.'">'.$title.'</a>';
					}
					break;
				case "LoadAvg":
					$link = 'https://' . $SystemDatas["hostname"] . ':' . $Port_HTTPs . '/la/public/';
					$title = ($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr;
					echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="'.$link.'">'.$title.'</a>';
					break;

				// Renting
				case "Renting":
					if ($SystemDatas["rt_active"] == 1) {
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
					}
					break;
				case "Renting Infos":
					echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
					break;
				case "Payments":
					if ( MainUser($CurrentUser) == false ) {
						if ( (isset($SystemDatas["rt_cost_tva"]) && ($SystemDatas["rt_cost_tva"] != 0.00)) && (isset($SystemDatas["rt_nb_users"])) && (isset($SystemDatas["rt_model"])) && (isset($SystemDatas["rt_method"])) ) {
							echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
						}
					}
					break;
				case "Renting Payments":
						if ( (isset($SystemDatas["rt_cost_tva"]) && ($SystemDatas["rt_cost_tva"] != 0.00)) && (isset($SystemDatas["rt_nb_users"])) && (isset($SystemDatas["rt_model"])) && (isset($SystemDatas["rt_method"])) ) {
							echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
						}
					break;
				case "Renting Options":
						if ( (isset($SystemDatas["rt_cost_tva"]) && ($SystemDatas["rt_cost_tva"] != 0.00)) && (isset($SystemDatas["rt_nb_users"])) && (isset($SystemDatas["rt_model"])) && (isset($SystemDatas["rt_method"])) ) {
							echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
						}
					break;

				// Admin menu
				case "Add User":
					echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
					break;
				case "Webmin":
					if ( $WebminIsInstalled == '1' ) {
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="https://' . $SystemDatas["hostname"] . ':' . $WebminDatas["port_tcp1"] . '/">Webmin</a>';
					}
					break;
				case "DNScrypt-proxy":
					if ( $DnscryptIsInstalled == '1' ) {
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
					}
					break;
				case "Plex.tv":
					if ($PlexMediaIsInstalled == '1') {
						$link = 'https://app.plex.tv/web/app';
						$title = ($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr;
						echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="'.$link.'">'.$title.'</a>';
					}
					break;

				// Help menu
				case "Help":
					$title = ($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr;
					switch ($_SESSION['Language']) {
						case 'fr':
							$link = 'https://mysb.gitbook.io/doc/v/v5.3_fr/';
							break;
						default:
							$link = 'https://github.com/toulousain79/MySB/wiki';
							break;
					}
					echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="'.$link.'">'.$title.'</a>';
					break;
				case "Plex configure":
					if ($PlexMediaIsInstalled == '1') {
						switch ($_SESSION['Language']) {
							case 'fr':
								$title = $menu->title_fr;
								$link = 'https://mysb.gitbook.io/doc/v/v5.3_fr/configuration/plex-media-server-and-tautulli';
								echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="'.$link.'">'.$title.'</a>';
								break;
							default:
								echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
								break;
						}
					}
					break;
				case "The blocklists":
					switch ($_SESSION['Language']) {
						case 'fr':
							$title = ($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr;
							$link = 'https://mysb.gitbook.io/doc/v/v5.3_fr/le-portail/les-listes-noires';
							echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="'.$link.'">'.$title.'</a>';
							break;
						default:
							echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
							break;
					}
					break;
				case "The trackers":
					if ( $UserAccountType == 'normal' ) {
						switch ($_SESSION['Language']) {
							case 'fr':
								$title = ($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr;
								$link = 'https://mysb.gitbook.io/doc/v/v5.3_fr/le-portail/les-trackers';
								echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="'.$link.'">'.$title.'</a>';
								break;
							default:
								echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
								break;
						}
					}
					break;
				case "IP restriction":
					if ( $UserAccountType == 'normal' ) {
						switch ($_SESSION['Language']) {
							case 'fr':
								$title = ($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr;
								$link = 'https://mysb.gitbook.io/doc/v/v5.3_fr/securite/restriction-par-adresse-ips';
								echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'><a target="_blank" href="'.$link.'">'.$title.'</a>';
								break;
							default:
								echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr);
								break;
						}
					}
					break;

				// Default
				case "Apply configuration":
					$replace = '<div id="ApplyConfigButtonReplace" style="padding-top: 8px; padding-left: 10px; text-align:center; display:none; height: 24px;"><img src="'.THEMES_PATH.'MySB/images/ajax-loader.gif" alt="loading..."></div>';
					$style = "id=\"ApplyConfigButtonState\" class=\"ApplyConfigButtonNothing\" onclick=\"ButtonClicked('config')\"";
					echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$replace.'<div id="ApplyConfigButton">'.$menu->link(($_SESSION['Language'] == 'en') ? $menu->title : $menu->title_fr, $style).'</div>';
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
function CleanHostname($url) {
	$hostParts = explode('.', $url);
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
		case 3:
			$hostParts = array_reverse($hostParts);
			if ( ($hostParts[2] != 'www') || ($hostParts[2] != 'www2') ) {
				$domain = $hostParts[2] .'.'. $hostParts[1] .'.'. $hostParts[0];
			} else {
				$domain = $hostParts[1] .'.'. $hostParts[0];
			}
			break;
		default:
			$hostParts = array_reverse($hostParts);
			$domain = $hostParts[1] .'.'. $hostParts[0];
			break;
	}

	return $domain;
}

// Get DNS Records
function GetDnsRecords($address) {
	$Value = array();
	$DnsRecords = dns_get_record($address, $type = DNS_A);
	foreach($DnsRecords as $Record) {
		if ( $Record['ip'] != "" ) {
			$Value[] = $Record['ip'];
		}
	}
	return $Value;
}

// Manage User Trackers
function ManageUsersTrackers($Tracker, $IsActive) {
	global $MySB_DB;

	$Tracker = preg_replace('/\s\s+/', '', "$Tracker");
	if (filter_var($Tracker, FILTER_VALIDATE_URL)) {
		$Tracker = parse_url($Tracker, PHP_URL_HOST);
	}
	$hostParts = explode('.', $Tracker);
	$numberParts = sizeof($hostParts);
	$ValToReturn = 0;
	$IPv4_Tab = array();

	switch ($numberParts) {
		case 3:
			$hostParts = array_reverse($hostParts);
			$TrackerDomain = $hostParts[1] .'.'. $hostParts[0];
			$TrackerAddress = $hostParts[2] .'.'. $hostParts[1] .'.'. $hostParts[0];
			break;
		default: // 2
			$hostParts = array_reverse($hostParts);
			$TrackerDomain = $hostParts[1] .'.'. $hostParts[0];
			$TrackerAddress = $TrackerDomain;
			break;
	}

	# 1/ Check 'domain.com'
	$IPv4_Tab = array_merge($IPv4_Tab, GetDnsRecords($TrackerDomain));

	# 2/ Check 'given_hostname.domain.com'
	$IPv4_Tab = array_merge($IPv4_Tab, GetDnsRecords($TrackerAddress));

	// IPv4 listing
	$IPv4_Tab = array_unique($IPv4_Tab);

	// Check if tracker exist in database
	if ( ($TrackerDomain != '') && ($TrackerAddress != '') ) {
		$id_trackers_list = $MySB_DB->get("trackers_list", "id_trackers_list", ["tracker_domain" => "$TrackerDomain"]);
		if ( $id_trackers_list > 0 ) {
			$MySB_DB->update("trackers_list", ["tracker" => "$TrackerAddress", "is_active" => "$IsActive", "to_check" => "$IsActive", "origin" => "users"], ["tracker_domain" => "$TrackerDomain"]);
			$id_trackers_list = $MySB_DB->id();
		} else {
			$MySB_DB->insert("trackers_list", [
																	"tracker" => "$TrackerAddress",
																	"tracker_domain" => "$TrackerDomain",
																	"origin" => "users",
																	"is_active" => "$IsActive",
																	"to_check" => "$IsActive"
																]);
			$id_trackers_list = $MySB_DB->id();
		}
		if ( $id_trackers_list > 0 ) {
			$MySB_DB->delete("trackers_list_ipv4", ["id_trackers_list" => $id_trackers_list]);
			foreach($IPv4_Tab as $IPv4) {
				$MySB_DB->insert("trackers_list_ipv4", ["id_trackers_list" => "$id_trackers_list", "ipv4" => "$IPv4"]);
				$ValToReturn = $MySB_DB->id();
			}
		} else {
			$ValToReturn = 0;
		}
	} else {
		$ValToReturn = 0;
	}

	return $ValToReturn;
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
					$MySB_DB->update("users_addresses", [ "is_active" => "$IsActive" ], [ "AND" => [ "id_users" => "$UserID", "ipv4" => "$IPv4" ]]);
					$value = $MySB_DB->id();
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
					if ( !isset($message) || ($message == Global_Success) )  {
						$message = Global_SuccessAndApply;
					}

					$priority = $MySB_DB->max("commands", "priority");
					$priority++;

					$MySB_DB->insert("commands", ["commands" => "$commands", "reload" => 1, "priority" => "$priority", "args" => "$args", "user" => "$CurrentUser"]);
					$value = $MySB_DB->id();

					if ( $value >= 1 ) {
						// Create a lock file if needed
						echo '<script type="text/javascript">ApplyConfig("ToUpdate");</script>';
					}

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
function ReplacesAccentedCharacters($str, $encoding='utf-8') {
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

	return $str;
}

// Create lock file
function PortalLockFile($command='') {
	$LockFile = '/tmp/MySB_Portal.lock';

	switch ($command) {
		case 'MySB_CreateUser':
		case 'MySB_DeleteUser':
			touch($LockFile);
			break;
		default:
			break;
	}
}

// Is it locked ?
function PortalIsItLocked() {
	$is_lock = false;
	$LockFile = '/tmp/MySB_Portal.lock';

	if (is_file($LockFile)) {
		$is_lock = true;
	}
	return $is_lock;
}

//#################### LAST LINE ######################################
