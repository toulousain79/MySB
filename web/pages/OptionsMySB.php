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
require_once(WEB_INC . '/languages/' . $_SESSION['Language'] . '/' . basename(__FILE__));

// VARs
$UserID = $users_datas['id_users'];
$Command = 'message_only';
$rTorrentVersionsList = array('v0.9.2', 'v0.9.6');
$RefreshPage = 0;
$Change = 0;
$type = 'information';
$message = Global_NoChange;

// Get values from POST
$rTorrentVersion_POST = $_POST['rTorrentVersion'];
$rTorrentRestart_POST = $_POST['rTorrentRestart'];
$rTorrentNotify_POST = $_POST['rTorrentNotify'];
$Language_POST = $_POST['language'];

if (isset($_POST['submit'])) {
	switch ($_POST['submit']) {
		default:	// Global_SaveChanges
			// Get values from database
			$rTorrentVersion_DB = $users_datas['rtorrent_version'];
			$rTorrentNotify_DB = $users_datas['rtorrent_notify'];
			$Language_DB = $users_datas['language'];

			// Need to restart rTorrent ?
			if ( ($rTorrentVersion_POST != $rTorrentVersion_DB) || ($rTorrentRestart_POST == "1") ) {
				$rTorrentRestart_POST = 1;
				$Command = 'Restart_rTorrent';
				$Change++;
			}
			// Notifications ?
			if ( $rTorrentNotify_POST != $rTorrentNotify_DB ) {
				$Change++;
			}

			// Language
			if ( $Language_POST != $Language_DB ) {
				$Change++;
				$RefreshPage++;
				// Change language of Cakebox-Light
				ChangeCakeboxLanguage($CurrentUser, $Language_POST);

				// Change language of ownCloud
				ChangeOwnCloudLanguage($CurrentUser, $Language_POST);
			}

			break;
	}

	if( $Change >= 1 ) {
		$result = $MySB_DB->update("users", ["rtorrent_version" => "$rTorrentVersion_POST", "rtorrent_restart" => "$rTorrentRestart_POST", "rtorrent_notify" => "$rTorrentNotify_POST", "language" => "$Language_POST"], ["users_ident" => "$CurrentUser"]);

		if( $result >= 0 ) {
			$type = 'success';
			unset($message);
		}
	}

	GenerateMessage($Command, $type, $message);

	if( $RefreshPage >= 1 ) {
		header('Refresh: 2; URL='.$_SERVER['HTTP_REFERER'].'');
	}
}

// Get values from database
$users_datas = $MySB_DB->get("users", "*", ["users_ident" => "$CurrentUser"]);
$rtorrent_version = $users_datas['rtorrent_version'];
if ($rTorrentRestart_POST == "1") {
	$rtorrent_restart = '0';
} else {
	$rtorrent_restart = $users_datas['rtorrent_restart'];
}
$rtorrent_notify = $users_datas['rtorrent_notify'];
$language = $users_datas['language'];
?>

<form class="form_settings" method="post" action="">
<div align="center" style="margin-top: 10px; margin-bottom: 20px;">
	<fieldset>
	<legend><?php echo User_OptionsMySB_Title_rTorrent; ?></legend>

	<table>
		<tr>
			<td><?php echo User_OptionsMySB_rTorrentVersion; ?></td>
			<td>
				<select name="rTorrentVersion" style="width:80px; height: 28px;">';
				<?php foreach($rTorrentVersionsList as $Version) {
					if ( $rtorrent_version == $Version) {
						echo '<option selected="selected" value="' . $Version . '">' . $Version . '</option>';
					} else {
						echo '<option value="' . $Version . '">' . $Version . '</option>';
					}
				} ?>
				</select>
			</td>
			<td><?php echo User_OptionsMySB_rTorrentRestart; ?></td>
			<td>
				<select name="rTorrentRestart" style="width:80px; height: 28px;">
				<?php switch ($rtorrent_restart) {
					case '1':
						echo '<option selected="selected" value="1">' .Global_Yes. '</option>';
						echo '<option value="0">' .Global_No. '</option>';
						break;
					default:
						echo '<option value="1">' .Global_Yes. '</option>';
						echo '<option selected="selected" value="0">' .Global_No. '</option>';
						break;
				} ?>
				</select>
			</td>
			<td><?php echo User_OptionsMySB_NotifyEmail; ?></td>
			<td>
				<select name="rTorrentNotify" style="width:80px; height: 28px;">';
				<?php switch ($rtorrent_notify) {
					case '1':
						echo '<option selected="selected" value="1">' .Global_Yes. '</option>';
						echo '<option value="0">' .Global_No. '</option>';
						break;
					default:
						echo '<option value="1">' .Global_Yes. '</option>';
						echo '<option selected="selected" value="0">' .Global_No. '</option>';
						break;
				} ?>
				</select>
			</td>
		</tr>
	</table>
	</fieldset>

	<fieldset>
	<legend><?php echo User_OptionsMySB_Title_Portal; ?></legend>
	<table>
		<tr>
			<td><?php echo User_OptionsMySB_Language; ?></td>
			<td>
				<select name="language" style="width:90px; height: 28px;">';
				<?php switch ($language) {
					case 'fr':
						echo '<option selected="selected" value="fr">' .User_OptionsMySB_Lang_French. '</option>';
						echo '<option value="en">' .User_OptionsMySB_Lang_English. '</option>';
						break;
					default:
						echo '<option value="fr">' .User_OptionsMySB_Lang_French. '</option>';
						echo '<option selected="selected" value="en">' .User_OptionsMySB_Lang_English. '</option>';
						break;
				} ?>
				</select>
			</td>
		</tr>
	</table>
	</fieldset>

	<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>" />

	</div>
</form>

<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery-dynamically-adding-form-elements.js"></script>

<?php
//#################### LAST LINE ######################################
