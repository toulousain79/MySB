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

if ( isset($_SERVER['PHP_AUTH_USER']) ) {
	$SeedUser = $_SERVER['PHP_AUTH_USER'];
	$filename = "/etc/MySB/users/$SeedUser.info";
	$current_ip = $_SERVER['REMOTE_ADDR'];
	
	function getScriptVersion() {
		$data = file("/etc/MySB/infos/version.info");
		return $data[0];
	}

	function Form() {
		global $filename, $SeedUser, $current_ip;
	
		$allip = '';
		$temp_list = '';
		
		if (file_exists($filename)) {
			$data = file($filename);
			
			foreach($data as $index=>$line) {
				$column = explode('=', $line, 2);
				
				if ( (isset($column[0])) && (isset($column[1])) ) {		
					if (substr($column[0], 0, 11) == 'IP Address') {
						if ( trim($column[1]) == 'blank' ) {
							$allip = 'blank';
							$temp_list = $current_ip;
						} else  {
							$allip = trim($column[1], " \t\n\r\0\x0B");
							$temp_list = $allip;
						}
					}
				}
			}	
		}	
	
		echo '<form method="post" action="">
			<table border="0">	
				<tr>
					<td><span class="Title">Actual IP list :</span></td>
					<td><input name="current_list" type="text" value="' . $allip . '" size="50" readonly="true" /></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><span class="Title">Your current IP address :</span></td>
					<td><input name="current_ip" type="text" value="' . $current_ip . '" size="50" readonly="true" /></td>
					<td><input name="add_current_ip" type="checkbox" value="1" /></td>
					<td><span class="Comments"><em>Check this box for add this IP in your list.</em></span></td>
				</tr>				
				<tr>
					<td><span class="Title">New wanted IP list :</span></td>
					<td><input name="new_list" type="text" value="' . $temp_list . '" size="50" /></td>
					<td></td>
					<td><span class="Comments"><em>Add the appropriate IP separated by commas.</em></span></td>					
				</tr>
				<tr>
					<td><span class="Title">Confirm the new list :</span></td>
					<td><input name="confirm_list" type="text" value="' . $temp_list . '" size="50" /></td>
					<td></td>
					<td></td>						
				</tr>
				<tr>
					<td colspan="4" align="center"><input name="submit" type="submit" value="Submit" /></td>
				</tr>
			</table>
		</form>';
	}
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8" />
		<title>MySB <?php echo getScriptVersion() .' - Manage IP list'; ?></title>
		<!-- non indexation moteur de recherche -->
		<meta name="robots" content="noindex, nofollow">
		<meta name="robots" content="noarchive">
		<meta name="googlebot" content="nosnippet">
		<style>	
			.Global {font-family: Verdana, Arial, Helvetica, sans-serif; text-align: center;}
			.FontInRed {color: #FF0000}
			.FontInGreen {color: #00CC33}
			.Comments {font-size: 11px;}
			.Title {color: #0000FF;}
        </style>			
</head>

<body class="Global">
	<h1>Hello <?php echo $SeedUser; ?> !</h1>		

		<div align="center">
<?php
	if ( isset($_POST['submit']) ) {
		$current_list = trim($_POST['current_list'], " \t\n\r\0\x0B");
		$new_list = trim($_POST['new_list'], " \t\n\r\0\x0B");
		$confirm_list = trim($_POST['confirm_list'], " \t\n\r\0\x0B");
		if ( isset($_POST['add_current_ip']) ) {
			$add_current_ip = $_POST['add_current_ip'];
		} else {
			$add_current_ip = '0';
		}
		
		if ( ($current_list != '') && ($new_list != '') && ($confirm_list != '') ) {	
			if ( $add_current_ip == '1' ) {
				if ( strpos($confirm_list, $current_ip) === false ) {
					$new_list .= ','.$current_ip;
					$confirm_list .= ','.$current_ip;
				}
			}
		
			if ( $new_list == $confirm_list ) {
				exec("sudo /bin/bash /etc/MySB/scripts/FirewallAndSecurity.sh new '".$SeedUser."' '".$current_list."' '".$confirm_list."' 'ManageIP.php'", $output, $result);
				
				Form();
				
				foreach ($output as $item){
					echo $item.'<br>';
				}
					
				if( $result == 0 ){						
					echo '<p class="FontInGreen">Successfull !</p>';
				} else {
					echo '<p class="FontInRed">Failed !</p>';
				}
				
			} else {
				Form();
			
				echo '<p class="FontInRed">Error between the new typed IP list and verification.</p>';
			}
		} else {
			Form();
		
			echo '<p class="FontInRed">Please, complete all fields</p>';
		}
	} else {
		Form();
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