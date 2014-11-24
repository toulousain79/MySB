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

// Header
function HeaderPage($Page) {
	global $ScriptName;

	echo '
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=[CHAR]" />
		<meta name="HandheldFriendly" content="True">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="viewport" content="target-densitydpi=device-dpi" />
		<!-- non indexation moteur de recherche -->
		<meta name="robots" content="noindex, nofollow">
		<meta name="robots" content="noarchive">
		<meta name="googlebot" content="nosnippet">		
		<title>MySB ' . GetVersion() . ' - ' . $Page . '</title>	
	</head>
	<style type="text/css">
		.Global {font-family: Verdana, Arial, Helvetica, sans-serif; text-align: left;}
		th, td, tr, table {text-align: left;}
		h1 { text-align: center; }
		.Style1 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #FF0000} 
		.Style2 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #00CC33}		
		.FontInRed {color: #FF0000}
		.FontInGreen {color: #00CC33}
		.Comments {font-size: 11px;}
		.Title {color: #0000FF;}
		.GroupTitle {color: #0000FF;}
	</style>

	<body class="Global" style="text-size-adjust: 100%; -webkit-text-size-adjust: 100% !important; padding:0px; margin: 0px;">	
	';

	switch ($ScriptName) {			
		// case 'SeedboxInfo.php':
			// break;
		// case 'RentingInfo.php':
			// break;
		// case 'OpenVPN.php':
			// break;
		// case 'ManageIP.php':
			// break;
		// case 'ChangePassword.php':
			// break;		
		default:
			echo '<h1>Hello ' . $_SERVER['PHP_AUTH_USER'] . '!</h1>';
			echo '<div align="center">';
			break;
	}
}

// Footer
function FooterPage() {
	global $ScriptName;

	switch ($ScriptName) {			
		// case 'SeedboxInfo.php':
			// break;
		// case 'RentingInfo.php':
			// break;
		// case 'OpenVPN.php':
			// break;
		// case 'ManageIP.php':
			// break;
		// case 'ChangePassword.php':
			// break;		
		default:
			echo '</div>';
			break;
	}	
	
	echo '</body></html>';
}

// CountingUsers
function CountingUsers() {
	$database = new medoo();

	$result = $database->count("users", "");
	
	return $result;
}

// MySB version
function GetVersion() {
	$database = new medoo();
	
	$version = $database->get("system", "mysb_version", ["id_system" => 1]);
	
	return $version;
}

//#################### LAST LINE ######################################
?>