<?php
// ----------------------------------
require_once '/etc/MySB/config.php';
// ----------------------------------
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

// VARs
$Username = $_POST['username'];
if (isset($_POST['type'])) { $type = $_POST['type']; }

if (isset($_POST['get_base_path'])) { $get_base_path = $_POST['get_base_path']; }
if (isset($_POST['get_directory'])) { $get_directory = $_POST['get_directory']; }
if (isset($_POST['get_custom1'])) { $get_custom1 = $_POST['get_custom1']; }
if (isset($_POST['get_name'])) { $get_name = $_POST['get_name']; }
if (isset($_POST['get_loaded_file'])) { $get_loaded_file = $_POST['get_loaded_file']; }
// Tracker not allowed
if (isset($_POST['privacy'])) { $privacy = $_POST['privacy']; }
if (isset($_POST['trackermodeallowed'])) { $trackermodeallowed = $_POST['trackermodeallowed']; }
// New tracker added
if (isset($_POST['tracker'])) { $tracker_address = $_POST['tracker']; }
if (isset($_POST['tracker_domain'])) { $tracker_domain = $_POST['tracker_domain']; }
if (isset($_POST['tracker_proto'])) { $tracker_proto = $_POST['tracker_proto']; } else { $tracker_proto = 'http'; }
if (isset($_POST['tracker_port'])) { $tracker_port = $_POST['tracker_port']; } else { $tracker_port = '80'; }
if (isset($_POST['tracker_uri'])) { $tracker_uri = $_POST['tracker_uri']; } else { $tracker_uri = '/'; }

$MainUserEmail = $MySB_DB->get("users", "users_email", ["admin" => 1]);
$users_datas = $MySB_DB->get("users", ["language", "rtorrent_notify", "users_email"], ["users_ident" => "$Username"]);
$Language = $users_datas["language"];
$rTorrentNotify = $users_datas["rtorrent_notify"];
$UserMail = $users_datas["users_email"];
$IfNextCloud = $MySB_DB->get("services", "is_installed", ["serv_name" => "NextCloud"]);

// Mail notification
if ( ($rTorrentNotify == '1') && (!empty($UserMail)) ) {
	switch ($Language) {
		case 'fr':
			$Subject = "MySB - Nouveau fichier disponible !";
			$Filename = "Fichier : ";
			$Label = "Label : ";
			$Directory = "Dossier : ";
			$Torrent = "Torrent : ";
			break;

		default:
			$Subject = "MySB - New file available !";
			$Filename = "File : ";
			$Label = "Label : ";
			$Directory = "Directory : ";
			$Torrent = "Torrent : ";
	}

	// Tracker not allowed
	if ( isset($trackermodeallowed) ) {
		switch ($Language) {
			case 'fr':
				$Subject = "MySB - Action non autoris&eacute;e !";
				$TrackerPrivacy = "Type:";
				$TrackerPrivacyPrivate = "priv&eacute;s";
				$TrackerPrivacyPublic = "publiques";
				$TrackerAllowed = "Tracker autoris&eacute;s:";
				$TrackerAllowedPrivate = "priv&eacute;s seulement";
				$TrackerAllowedPublic = "publiques & priv&eacute;s";
				break;

			default:
				$Subject = "MySB - Action not allowed !";
				$TrackerPrivacy = "Type:";
				$TrackerPrivacyPrivate = "privates";
				$TrackerPrivacyPublic = "publics";
				$TrackerAllowed = "Tracker allowed:";
				$TrackerAllowedPrivate = "privates only";
				$TrackerAllowedPublic = "publics & privates";
		}
	} elseif ( isset($tracker_address) ) {
		switch ($Language) {
			case 'fr':
				$Subject = "MySB - Nouvel annonceur ajout&eacute; !";
				$TrackerAddress = "Adresse:";
				$TrackerDomain = "Domaine:";
				break;

			default:
				$Subject = "MySB - New annoncer added !";
				$TrackerAddress = "Address:";
				$TrackerDomain = "Domain:";
		}
	}

	if ( isset($_POST['subject']) ) {
		$Subject = $_POST['subject'];
	}
	if ( isset($_POST['content']) ) {
		$Content = file_get_contents($_POST['content']);
	} else {
		if ( isset($get_name) && ( $get_name != '' ) ) {
			$Content = "$Filename $get_name"."\r\n";
		} else {
			$Content = "";
		}
		if ( isset($get_custom1) && ( $get_custom1 != '' ) ) {
			$Content .= "$Label $get_custom1"."\r\n";
		}
		if ( isset($privacy) && ( $privacy != '' ) ) {
			switch ($privacy) {
				case 'private':
					$privacy = "$TrackerPrivacyPrivate";
					break;
				default:
					$privacy = "$TrackerPrivacyPublic";
			}
			$Content .= "$TrackerPrivacy $privacy"."\r\n";
		}
		if ( isset($trackermodeallowed) && ( $trackermodeallowed != '' ) ) {
			switch ($trackermodeallowed) {
				case 'private':
					$trackermodeallowed = "$TrackerAllowedPrivate";
					break;
				default:
					$trackermodeallowed = "$TrackerAllowedPublic";
			}
			$Content .= "$TrackerAllowed $trackermodeallowed"."\r\n";
		}
		if ( isset($get_directory) && ( $get_directory != '' ) ) {
			$Content .= "$Directory $get_directory"."\r\n";
		}
		if ( isset($get_loaded_file) && ( $get_loaded_file != '' ) ) {
			$Content .= "$Torrent $get_loaded_file"."\r\n";
		}
		if ( isset($tracker_address) && ( $tracker_address != '' ) ) {
			// $Content .= "$TrackerAddress $tracker_proto"."://"."$tracker_address".":$tracker_port"."$tracker_uri"."\r\n";
			$Content .= "$TrackerAddress $tracker_proto"."$tracker_address".":$tracker_port"."\r\n";
		}
		if ( isset($tracker_domain) && ( $tracker_domain != '' ) ) {
			$Content .= "$TrackerDomain $tracker_domain"."\r\n";
		}
	}
	$Headers  = "From: $MainUserEmail"."\r\n";
	$Headers .= "Reply-To: $MainUserEmail"."\r\n";
	$Headers .= 'MIME-Version: 1.0' . "\r\n";
	switch ($type) {
		case 'synchro':
			$mail_type="plain";
			break;
		default:
			$mail_type="html";
	}
	// $Headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
	$Headers .= 'Content-type:text/'.$mail_type.';charset=UTF-8' . "\r\n";

	mail($UserMail, $Subject, $Content, $Headers);
}

// NextCloud files scan
if ( $IfNextCloud == '1' ) {
	$MySB_DB->update("system", ["nextcloud_cron" => 1], ["id_system" => 1]);
}
?>
