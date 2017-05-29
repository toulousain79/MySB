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

header('Cache-control: private'); // IE 6 FIX

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

// Databases
require_once(FILE_MEDOO);
use Medoo\Medoo;
$MySB_DB = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => MySQL_MySB_DB,
	'server' => 'localhost',
	'username' => MySQL_MysbUser,
	'password' => MySQL_MysbPassword,
	'charset' => 'utf8',
	'port' => 3306,
	'option' => [
		PDO::ATTR_CASE => PDO::CASE_NATURAL,
		PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING
	]
]);
$Wolf_DB = new medoo([
	'database_type' => 'sqlite',
	'database_file' => Wolf_DB,
	'database_name' => 'Wolf'
]);
$NextCloud_DB = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => MySQL_NextCloud_DB,
	'server' => 'localhost',
	'username' => MySQL_MysbUser,
	'password' => MySQL_MysbPassword,
	'charset' => 'utf8',
	'port' => 3306,
	'option' => [
		PDO::ATTR_CASE => PDO::CASE_NATURAL,
		PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING
	]
]);

// Users table
if ( (isset($_SERVER['PHP_AUTH_USER'])) && (!isset($_GET['user'])) ) {
	$CurrentUser = $_SERVER['PHP_AUTH_USER'];
} elseif ( (isset($_SERVER['PHP_AUTH_USER'])) && (isset($_GET['user'])) ) {
	$CurrentUser = $_GET['user'];
} elseif ( (!isset($_SERVER['PHP_AUTH_USER'])) && (isset($_GET['user'])) ) {
	$CurrentUser = $_GET['user'];
}
if ( isset($CurrentUser) ) {
	$User_Language = $MySB_DB->get("users", "language", ["users_ident" => "$CurrentUser"]);
}

// Language
$Language = 'en';
$_SESSION['Language'] = $Language;
if ( !empty($User_Language) ) {
	$Language = $User_Language;
	$_SESSION['Language'] = $Language;
}
require_once(WEB_INC . '/languages/global.' . $Language . '.php');

// Some Functions
require_once(FILE_FUNCS);

// Services table
$Port_HTTPs = $MySB_DB->get("services", "port_tcp1", ["serv_name" => "NginX"]);

// Load System table
$Hostname = $MySB_DB->get("system", "hostname", ["id_system" => 1]);

//#################### LAST LINE #####################################
