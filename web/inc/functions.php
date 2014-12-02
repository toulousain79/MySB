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

    if ($page && count($page->children()) > 0) {
        echo ($startmenu) ? '<ul>' : '';

        foreach($page->children(null, array(), $hidden) as $menu) :
            echo '<li'. (in_array($menu->slug, explode('/', $current->url)) ? ' class="current"': null).'>'.$menu->link($menu->title); 
            displayChildren($menu, $current, true);
            echo '</li>';
            endforeach;
        echo ($startmenu) ? '</ul>' : '';
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

//#################### LAST LINE ######################################
?>