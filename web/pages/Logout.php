<?php
// ----------------------------------
require_once '/etc/MySB/config.php';
// ----------------------------------
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

if ( isset($_SESSION['page']) ) {
	session_start();
	session_unset();
	session_destroy();
}

// Logout HTTP Internet Explorer
if ( preg_match( '~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT'] ) || ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false ) ) {

$Hostname = $MySB_DB->get("system", "hostname", ["id_system" => 1]);
?>

<script type="text/javascript">
	try {
		document.execCommand("ClearAuthenticationCache");
		window.location.href('http://www.google.fr');
	} catch (exception) {}
</script>

<?php } else {  // Logout HTTP Firefox/Safari/Chrome ?>

<script type="text/javascript">
    var request = new XMLHttpRequest();
    request.open("get", "https://logout@<?php echo $Hostname . ':' . $Port_HTTPs . '/Logout'; ?>", false);
    request.send();
    window.location.replace('http://www.google.fr');
</script>

<?php

}

// -----------------------------------------
require_once WEB_INC . '/includes_after.php';
// -----------------------------------------
//#################### LAST LINE ######################################
?>