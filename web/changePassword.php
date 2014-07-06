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

if(isset($_SERVER['PHP_AUTH_USER'])){

	function getScriptVersion() {
		$data = file("/etc/MySB/infos/version.info");
		return $data[0];
	}
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8" />
		<title>MySB <?php echo getScriptVersion() .' - Password'; ?></title>
		<!-- non indexation moteur de recherche -->
		<meta name="robots" content="noindex, nofollow">
		<meta name="robots" content="noarchive">
		<meta name="googlebot" content="nosnippet">
		<style>	
			.Global {font-family: Verdana, Arial, Helvetica, sans-serif; text-align: center;}
			.FontInRed {color: #FF0000}
			.FontInGreen {color: #00CC33}
			.Title {color: #0000FF;}
        </style>			
</head>

<body class="Global">
	<h1>Hello <?php echo $_SERVER['PHP_AUTH_USER']; ?> !</h1>		

	<div align="center">
		<form method="post" action="">
			<table border="0">	
				<tr>
					<td><span class="Title">Current password :</span></td>
					<td><input name="current_pwd" type="password" /></td>
				</tr>
				<tr>
					<td><span class="Title">New password :</span></td>
					<td><input name="new_pwd" type="password" /></td>
				</tr>
				<tr>
					<td><span class="Title">Confirm :</span></td>
					<td><input name="confirm_pwd" type="password" /></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input name="submit" type="submit" value="Submit"></td>
				</tr>
			</table>
		</form>

<?php
	if ( isset($_POST['submit']) ) {
		$current_pwd = $_POST['current_pwd'];
		$new_pwd = $_POST['new_pwd'];
		$confirm_pwd = $_POST['confirm_pwd'];
		
		if ( ($current_pwd != '') && ($new_pwd != '') && ($confirm_pwd != '') ) {
			if ( $current_pwd == $_SERVER['PHP_AUTH_PW'] ) {
				if ( $new_pwd == $confirm_pwd ) {			
					exec("sudo /bin/bash /etc/MySB/bin/MySB_ChangeUserPassword '".$_SERVER['PHP_AUTH_USER']."' '".$new_pwd."' 'ChangePassword.php'", $output, $result);

                    foreach ( $output as $item ) {
						echo $item.'<br>';
					}
					
					if ( $result == 0 ) {	
						$_SERVER['PHP_AUTH_PW'] = $new_pwd;
						echo '<p class="FontInGreen">Successfull !</p>';
					}
				} else {
					echo '<p class="FontInRed">Error between the new typed password and verification.</p>';
				}
			} else {
				echo '<p class="FontInRed">The current password is not valid.</p>';
			}
		} else {
			echo '<p class="FontInRed">Please, complete all fields</p>';
		}
	}
?>
		</div>		

	</body>
</html>

<?php
} else {
	echo '<p><h1 class="FontInRed">You must login in to continue !</h1></p>';
}
?>