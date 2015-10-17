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

$PeerguardianIsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "PeerGuardian"]);
$IsMainUser = (MainUser($CurrentUser)) ? true : false;

$Command = 'message_only';
$rTorrentVersionsList = array('v0.9.2', 'v0.9.6');
$LanguagesList = array('english', 'french');

if (isset($_POST['submit'])) {
	$rTorrentVersion = $_POST['rTorrentVersion'];
	$rTorrentRestart = $_POST['rTorrentRestart'];
	$Language = $_POST['language'];
	// Get values from database
	$rtorrent_version = $users_datas['rtorrent_version'];

	// Users table
	if ( ($rTorrentVersion != $rtorrent_version) || ($rTorrentRestart == "1") ) {
		$rTorrentRestart = 1;
		$Command = 'Options_MySB';
	}

	$result = $MySB_DB->update("users", ["rtorrent_version" => "$rTorrentVersion", "rtorrent_restart" => "$rTorrentRestart", "language" => "$Language"], ["users_ident" => "$CurrentUser"]);

	if( $result >= 0 ) {
		$type = 'success';
	} else {
		$type = 'information';
		$message = Global_NoChange;
	}

	GenerateMessage($Command, $type, $message);
	
	// Change language of Cakebox-Light
	ChangeCakeboxLanguage($CurrentUser, $Language);
	
	// Change language of ownCloud
	ChangeOwnCloudLanguage($CurrentUser, $Language);	
}

// Get values from database
$users_datas = $MySB_DB->get("users", "*", ["users_ident" => "$CurrentUser"]);
$rtorrent_version = $users_datas['rtorrent_version'];
$rtorrent_restart = $users_datas['rtorrent_restart'];
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

<?php
//#################### LAST LINE ######################################
?>