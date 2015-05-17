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

// Config file
require_once('/etc/MySB/config.php');

// Session
session_start();
if ( isset($_GET['page']) ) {
	switch ($_GET['page']) {
		case "ChangePassword":
			if ( isset($_GET['user']) && isset($_GET['passwd']) ) {
				$_SESSION['page'] = $_GET['page'];
			}
			break;

		case "ManageAddresses":
			if ( isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) ) { 
				$_SESSION['page'] = $_GET['page'];
			}
			break;
	}
}

// Medoo framework
require_once(FILE_MEDOO);
$MySB_DB = new medoo(['database_file' => MySB_DB, 'database_name' => 'MySB']);
$Wolf_DB = new medoo(['database_file' => Wolf_DB, 'database_name' => 'Wolf']);

// Some Functions
require_once(FILE_FUNCS);

// Load System table
$system_datas = $MySB_DB->get("system", "*", ["id_system" => 1]);

// Users table
if ( isset($_SERVER['PHP_AUTH_USER']) ) {
	$CurrentUser = $_SERVER['PHP_AUTH_USER'];
} elseif ( isset($_SESSION['page']) && isset($_GET['user']) ) {
	$CurrentUser = $_GET['user'];
}
if ( isset($CurrentUser) ) {
	$users_datas = $MySB_DB->get("users", "*", ["users_ident" => "$CurrentUser"]);
}

// Services table
$Port_HTTPs = $MySB_DB->get("services", "port_tcp1", ["serv_name" => "NginX"]);

// Language
header('Cache-control: private'); // IE 6 FIX
if ( isSet($users_datas["language"]) ) {
	$lang = $users_datas["language"];

	// register the session and set the cookie
	$_SESSION['lang'] = $lang;

	setcookie('lang', $lang, time() + (3600 * 24 * 30));
} else if ( isSet($_SESSION['lang']) ) {
	$lang = $_SESSION['lang'];
} else if ( isSet($_COOKIE['lang']) ) {
	$lang = $_COOKIE['lang'];
} else {
	$lang = 'en';
}

switch ($lang) {
	case 'fr':
	$lang_file = 'lang.fr.php';
	break;

	default:
	$lang_file = 'lang.en.php';
}

require_once(WEB_INC . '/languages/' . $lang_file);

//#################### LAST LINE #####################################
?>