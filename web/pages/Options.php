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

global $MySB_DB, $users_datas, $CurrentUser;

$CurrentVersion = $users_datas['rtorrent_version'];
$rTorrentRestart = $users_datas['rtorrent_restart'];
$Command = 'message_only';

function Form() {
	$rTorrentRestart = array('No', 'Yes');
	$rTorrentVersionsList = array('v0.9.2', 'v0.9.4');

	echo '<form class="form_settings" method="post" action="">
			<div align="center"><table border="0">
				<tr>
					<td>rTorrent version:</td>
					<td>
						<select name="rTorrentVersion" style="width:80px; height: 28px;">';

					foreach($rTorrentVersionsList as $rTorrentVersion) {
						if ( $CurrentVersion == $rTorrentVersion) {
							echo '<option selected="selected" value="' . $rTorrentVersion . '">' . $rTorrentVersion . '</option>';
						} else {
							echo '<option value="' . $rTorrentVersion . '">' . $rTorrentVersion . '</option>';
						}
					}
	echo '
						</select>
					</td>
				</tr>
				<tr>
					<td>Restart rTorrent ?</td>
					<td>
						<select name="rTorrentRestart" style="width:80px; height: 28px;">';

						switch ($rTorrentRestart) {
							case '1':
								echo '<option selected="selected" value="1">Yes</option>';
								echo '<option value="0">No</option>';
								break;
							default:
								echo '<option value="1">Yes</option>';
								echo '<option selected="selected" value="0">No</option>';
								break;
						}
	echo '
						</select>
					</td>
				</tr>

				<tr>
					<td colspan="3"><input class="submit" name="submit" type="submit" value="Submit" /></td>
				</tr>
			</table></div>
		</form>';
}

if (isset($_POST['submit'])) {
	$rTorrentVersion = $_POST['rTorrentVersion'];
	$rTorrentRestart = $_POST['rTorrentRestart'];
	
	if ( ($rTorrentVersion != $CurrentVersion) || ($rTorrentRestart == "1") ) {
		$rTorrentRestart = 1;
		$Command = 'Options';
	}

	$result = $MySB_DB->update("users", ["rtorrent_version" => "$rTorrentVersion", "rtorrent_restart" => "$rTorrentRestart"], ["users_ident" => "$CurrentUser"]);

	if( $result == 1 ) {
		$type = 'success';
	} else {
		$type = 'error';
		$message = 'Failed ! It was not possible to update the MySB database.';
	}

	GenerateMessage($Command, $type, $message);
}

Form();

//#################### LAST LINE ######################################
?>