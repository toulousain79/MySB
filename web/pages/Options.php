<?php
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

global $MySB_DB, $users_datas, $CurrentUser, $system_datas;

$PeerguardianIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "PeerGuardian"]);
$IsMainUser = (MainUser($CurrentUser)) ? true : false;

$Command = 'message_only';
$rTorrentVersionsList = array('v0.9.2', 'v0.9.4');
$Error = 0;

if (isset($_POST['submit'])) {
	$rTorrentVersion = $_POST['rTorrentVersion'];
	$rTorrentRestart = $_POST['rTorrentRestart'];
	$PGL_EmailStats = $_POST['PGL_EmailStats'];
	$PGL_EmailWD = $_POST['PGL_EmailWD'];
	$IP_restriction = $_POST['IP_restriction'];
	// Get values from database
	$rtorrent_version = $users_datas['rtorrent_version'];
	
	// Users table
	if ( ($rTorrentVersion != $rtorrent_version) || ($rTorrentRestart == "1") ) {
		$rTorrentRestart = 1;
		$Command = 'Options';
	}

	//$MySB_DB->update("system", ["ip_restriction" => "$IP_restriction"], ["id_system" => 1]);
	$result = $MySB_DB->update("users", ["rtorrent_version" => "$rTorrentVersion", "rtorrent_restart" => "$rTorrentRestart"], ["users_ident" => "$CurrentUser"]);
	
	if( $result == 1 ) {
		$type = 'success';
	} else {
		$type = 'error';
		$message = 'Failed ! It was not possible to update the MySB database.';
	}

	GenerateMessage($Command, $type, $message);
}

// Get values from database
$rtorrent_version = $users_datas['rtorrent_version'];
$rtorrent_restart = $users_datas['rtorrent_restart'];
$pgl_email_stats = $system_datas['pgl_email_stats'];
$pgl_watchdog_email = $system_datas['pgl_watchdog_email'];
$ip_restriction = $system_datas['ip_restriction'];
?>

<form class="form_settings" method="post" action="">
<div align="center" style="margin-top: 10px; margin-bottom: 20px;">	
	<fieldset>
	<legend>rTorrent</legend>
	<table>
		<tr>
			<td>rTorrent version:</td>
			<td>
				<select name="rTorrentVersion" style="width:80px; height: 28px;">';
				<?php foreach($rTorrentVersionsList as $rTorrentVersion) {
					if ( $rtorrent_version == $rTorrentVersion) {
						echo '<option selected="selected" value="' . $rTorrentVersion . '">' . $rTorrentVersion . '</option>';
					} else {
						echo '<option value="' . $rTorrentVersion . '">' . $rTorrentVersion . '</option>';
					}
				} ?>
				</select>
			</td>
			<td>Restart rTorrent ?</td>
			<td>
				<select name="rTorrentRestart" style="width:80px; height: 28px;">';
				<?php switch ($rtorrent_restart) {
					case '1':
						echo '<option selected="selected" value="1">Yes</option>';
						echo '<option value="0">No</option>';
						break;
					default:
						echo '<option value="1">Yes</option>';
						echo '<option selected="selected" value="0">No</option>';
						break;
				} ?>
				</select>
			</td>			
		</tr>
	</table>
	</fieldset>

	<?php if ( ($IsMainUser) && ($PeerguardianIsInstalled == '1') ) { ?>
	<!--<fieldset>
	<legend>PeerGuardian</legend>
	<table>
		<tr>
			<td>Email stats</td>
			<td>
				<select name="PGL_EmailStats" style="width:80px; height: 28px;">';
				<?php switch ($pgl_email_stats) {
					case '1':
						echo '<option selected="selected" value="1">Yes</option>';
						echo '<option value="0">No</option>';
						break;
					default:
						echo '<option value="1">Yes</option>';
						echo '<option selected="selected" value="0">No</option>';
						break;
				} ?>
				</select>
			</td>
			<td>Watchdog email</td>
			<td>
				<select name="PGL_EmailWD" style="width:80px; height: 28px;">';
				<?php switch ($pgl_watchdog_email) {
					case '1':
						echo '<option selected="selected" value="1">Yes</option>';
						echo '<option value="0">No</option>';
						break;
					default:
						echo '<option value="1">Yes</option>';
						echo '<option selected="selected" value="0">No</option>';
						break;
				} ?>
				</select>
			</td>
		</tr>
	</table>
	</fieldset>-->
	<?php } ?>
	
	<?php if ( $IsMainUser ) { ?>
	<!--<fieldset>
	<legend>IPtables</legend>
	<table>
		<tr>
			<td>IP restriction</td>
			<td>
				<select name="IP_restriction" style="width:80px; height: 28px;">';
				<?php switch ($ip_restriction) {
					case '1':
						echo '<option selected="selected" value="1">Yes</option>';
						echo '<option value="0">No</option>';
						break;
					default:
						echo '<option value="1">Yes</option>';
						echo '<option selected="selected" value="0">No</option>';
						break;
				} ?>
				</select>
			</td>
		</tr>
	</table>
	</fieldset>-->
	<?php } ?>	
	
	<input class="submit" style="width:120px; margin-top: 10px;" name="submit" type="submit" value="Submit" />
	
	</div>
</form>
		
<?php
//#################### LAST LINE ######################################
?>