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

// Directories
define('WEB_ROOT', '/etc/MySB/web/');
define('WEB_INC', WEB_ROOT . 'inc/');

// Data bases
define('Wolf_DB', WEB_ROOT. '../db/Wolf.sq3');
define('MySB_DB', WEB_ROOT. '../db/MySB.sq3');

// Files
define('FILE_MEDOO', WEB_INC. 'medoo.min.php');
define('FILE_FUNCS', WEB_INC. 'functions.php');

// Medoo framework
include_once(FILE_MEDOO);
$MySB_DB = new medoo(['database_file' => MySB_DB, 'database_name' => 'MySB']);
$Wolf_DB = new medoo(['database_file' => Wolf_DB, 'database_name' => 'Wolf']);

// Some Functions
include_once(FILE_FUNCS);

// Load System table
$system_datas = $MySB_DB->get("system", "*", ["id_system" => 1]);

// Users table
$users_datas = $MySB_DB->get("users", "*", ["users_ident" => $_SERVER['PHP_AUTH_USER']]);

// Services table
$Port_HTTPs = $MySB_DB->get("services", "port_tcp1", ["serv_name" => "NginX"]);

//#################### LAST LINE #####################################
?>