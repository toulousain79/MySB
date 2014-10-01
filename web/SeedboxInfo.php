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

error_reporting(E_ALL);

if(isset($_SERVER['PHP_AUTH_USER'])){
	if ($_SERVER['PHP_AUTH_USER'] == '##MySB_User##') {
		$SeedUser = $_GET['user'];
	} else {
		$SeedUser = $_SERVER['PHP_AUTH_USER'];
	}

	function getScriptVersion() {
		$data = file("/etc/MySB/infos/version.info");
		return $data[0];
	}

	function printUser($user) {
		echo '<table width="100%" border="0" align="left">';
		echo '<tr align="left"><th colspan="3" scope="row"><h1>' . $user . '</h1></th></tr>';
		
		$data = file("/etc/MySB/users/$user.info");
		foreach($data as $index=>$line) {

			$column = explode('=', $line, 2);
			
			if (isset($column[0])) {
				switch ($column[0]) {
					case 'IP Address':
						if ( trim($column[1]) == 'blank' ) {
							$comments = '<a target="_blank" href="https://' .$_SERVER['HTTP_HOST'].'/MySB/ManageIP.php">1 - Before changing your temporary password, thank you to confirm your IP address HERE!</a>';
							$opts = 'bgcolor="#FF6666"';
						} else {
							$comments = 'Public IP addresses listed here will be allowed to access certain pages (SeedboxInfo, ChangePassword, OpenVPN config).';
							$opts = '';
						}
						break;				
					case 'Password':
						$comments = '<a target="_blank" href="https://' .$_SERVER['HTTP_HOST'].'/MySB/ChangePassword.php">2 - Please, promptly change your temporary password HERE!</a>';
						$opts = 'bgcolor="#FF6666"';
						break;
					case 'RPC':
						$comments = 'RPC value can be used to remotely connect to rTorrent via a smartphone. (see Seedbox-Manager)';
						$opts = '';
						break;
					case 'Session dir':
						$comments = 'The session directory allows rTorrent to save the progess of your torrents. (Accessible only by SSH.)';
						$opts = '';
						break;
					case 'Complete dir':
						$comments = 'Completed files will be move to this directory.';
						$opts = '';
						break;							
					case 'Incomplete dir':
						$comments = 'Partial downloads are stored here.';
						$opts = '';
						break;							
					case 'Watch dir':
						$comments = 'Saving a torrent file to this directory will automatically start the download.';
						$opts = '';
						break;							
					case 'Share dir':
						$comments = 'The "share" folder is accessible by all users on the server. You can easily share what you want with any user.';
						$opts = '';
						break;	
					case 'FTPs port (TLS)':
						$comments = 'It is necessary to configure your FTP client software by specifying this port number. You must select "FTPS" and "explicit TLS connection".';
						$opts = '';
						break;						
					case 'SCGI port':
						$comments = 'This value is used in conjunction with RPC.';
						$opts = '';
						break;						
					case 'OpenVPN config':
						$comments = '';
						$opts = '';
						break;
					case 'Server IP GW':
						$comments = 'Server IP with redirect traffic.';
						$opts = '';
						break;
					case 'Server IP':
						$comments = 'Server IP without redirect traffic.';
						$opts = '';
						break;							
					case 'Samba share':
						$comments = 'mount - [Destination_directory] -t cifs -o noatime,nodiratime,UNC=//[10.0.0.1|10.0.1.1]/'.$user.',username='.$user.',password=[your_password]';
						$opts = '';
						break;
					case 'NFS share':
						$comments = 'mount -t nfs [10.0.0.1|10.0.1.1]:/home/'.$user.'/rtorrent [Destination_directory] -o nocto,noacl,noatime,nodiratime,nolock,rsize=8192,vers=3,ro,udp';
						$opts = '';
						break;						
					default:
						$comments = '';
						$opts = '';
						break;
				}
			}
			
			if (!isset($column[0])) {	// blank line
				$line = '<tr align="left"><th colspan="3" scope="row">&nbsp;</th></tr>';
			} elseif (substr($column[0], 1, 3) == '---') {	// HR
				$line = '<tr align="left"><th colspan="3" scope="row"><hr /></th></tr>';
			} elseif ((isset($column[0])) && (!isset($column[1]))) {	// group info title
				$line = '<tr align="left"><th class="GroupTitle" colspan="3" scope="row">' . $column[0] . '</span></th></tr>';
			} else {	// title + value
				$line = '<tr align="left"><th width="15%" scope="row">' . $column[0]. '</th>';	// title
				
				if (strpos($column[1], "://") > 0) {	// hyperlink			
					$line = $line .'<td '.$opts.' colspan="2">';			
					$line = $line .'<a target="_blank" href="' . $column[1] . '">' . $column[1]. '</a>';
					$line = $line .'<span class="Comments">' . $comments . '</span>';		
					$line = $line .'</td>';
				} else {
					if (substr($column[0], 0, 15) == 'TOTAL per users') {
						$line = $line .'<td width="25%"><b><span class="FontInRed">' . $column[1]. '</span></b> &euro; TTC / month</td>';
					} elseif (substr($column[0], 0, 19) == 'Global monthly cost') {
						$line = $line .'<td width="25%">' . $column[1]. ' &euro; HT / month</td>';
					} else {
						$line = $line .'<td width="25%">' . $column[1]. '</td>';
					}
					$line = $line .'<td '.$opts.'><span class="Comments">' . $comments . '</span></td></tr>';
				}			
			}
			
			echo $line;
		}
		
		echo '</table>';
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=[CHAR]" />
		<meta name="HandheldFriendly" content="True">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="viewport" content="target-densitydpi=device-dpi" />
		<title>MySB <?php echo getScriptVersion() .' - Info'; ?></title>	
</head>
<style type="text/css">
	.Global {font-family: Verdana, Arial, Helvetica, sans-serif; text-align: left;}
	th, td, tr, table {text-align: left;}
	.FontInRed {color: #FF0000}
	.Comments {font-size: 11px;}
	.GroupTitle {color: #0000FF;}
</style>	

<body class="Global" style="text-size-adjust: 100%; -webkit-text-size-adjust: 100% !important; padding:0px; margin: 0px;">

<?php printUser($SeedUser); ?>

</body>
</html>

<?php
} else {
	echo '<p><h1 class="FontInRed">You must be logged in to continue !</h1></p>';
}
?>
