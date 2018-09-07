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

global $MySB_DB, $CurrentUser;
require_once(WEB_INC . '/languages/' . $_SESSION['Language'] . '/' . basename(__FILE__));

$IsInstalled = $MySB_DB->get("services", "is_installed", ["serv_name" => "PeerGuardian"]);
$IsMainUser = (MainUser($CurrentUser)) ? true : false;

if ( $IsInstalled == '1' ) {
	if (isset($_POST['submit'])) {

		for($i=0, $count = count($_POST['id_blocklists']);$i<$count;$i++) {
			$value = $MySB_DB->update("blocklists", ["peerguardian_active" => $_POST['peerguardian_active'][$i], "rtorrent_active" => $_POST['peerguardian_active'][$i]], ["id_blocklists" => $_POST['id_blocklists'][$i]]);

			$result = $result+$value;
		}

		if ( $result == 0 ) {
			$success = false;
		} else {
			$success = true;
		}

		if ( $success == true ) {
			$type = 'success';
			$message = BlockLists_PGL_Success;
		} else {
			$type = 'information';
			$message = Global_NoChange;
		}

		GenerateMessage('Blocklists_PeerGuardian' ,$type, $message, '');
	}

	$BlockList = $MySB_DB->select("blocklists", "*", ["peerguardian_list[!]" => ""]);
?>

	<form class="form_settings" method="post" action="">
		<div align="center">
<?php if ( $IsMainUser ) { ?>
			<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-bottom: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>">
<?php } ?>
			<table style="border-spacing:1;">
				<tr>
					<th style="text-align:center;"><?php echo MainUser_BlockLists_PGL_Table_Name; ?></th>
					<th style="text-align:center;"><?php echo Global_Comment; ?></th>
					<th style="text-align:center;"><?php echo Global_LastUpdate; ?></th>
					<th style="text-align:center;"><?php echo Global_IsDefault; ?></th>
					<th style="text-align:center;"><?php echo Global_IsActive; ?></th>
				</tr>
	<?php
	foreach($BlockList as $List) {
		switch ($List["default"]) {
			case '0':
				$default = '<select name="default[]" style="width:60px; background-color:#FEBABC;" disabled>
								<option value="0" selected="selected">' .Global_No. '</option>
							</select>';
				break;
			default:
				$default = '<select name="default[]" style="width:60px; background-color:#B3FEA5;" disabled>
								<option value="1" selected="selected">' .Global_Yes. '</option>
							</select>';
				break;
		}

		switch ($List["peerguardian_active"]) {
			case '0':
				if ( $IsMainUser ) {
					$peerguardian_active = '	<select name="peerguardian_active[]" style="width:60px;" class="redText" onchange="this.className=this.options[this.selectedIndex].className">
										<option value="0" selected="selected" class="redText">' .Global_No. '</option>
										<option value="1" class="greenText">' .Global_Yes. '</option>
									</select>';
				} else {
					$peerguardian_active = '	<select name="peerguardian_active[]" style="width:60px;" class="redText" disabled>
										<option value="0" selected="selected" class="redText">' .Global_No. '</option>
									</select>';
				}
				break;
			default:
				if ( $IsMainUser ) {
					$peerguardian_active = '	<select name="peerguardian_active[]" style="width:60px;" class="greenText" onchange="this.className=this.options[this.selectedIndex].className">
										<option value="0" class="redText">' .Global_No. '</option>
										<option value="1" selected="selected" class="greenText">' .Global_Yes. '</option>
									</select>';
				} else {
					$peerguardian_active = '	<select name="peerguardian_active[]" style="width:60px;" class="greenText" disabled>
										<option value="1" selected="selected" class="greenText">' .Global_Yes. '</option>
									</select>';
				}
				break;
		}
	?>
				<tr>
					<td>
						<input type="hidden" name="id_blocklists[]" value="<?php echo $List["id_blocklists"]; ?>" />
						<input type="hidden" name="name[]" value="<?php echo $List["list_name"]; ?>" />
						<?php echo '<a target="_blank" href="' . $List["url_infos"] . '">' . $List["author"].' - '.$List["list_name"] . '</a>'; ?>
					</td>
					<td>
						<?php echo $List["comments"]; ?>
					</td>
					<td>
						<?php echo $List["peerguardian_lastupdate"]; ?>
					</td>
					<td>
						<?php echo $default; ?>
					</td>
					<td>
						<?php echo $peerguardian_active; ?>
					</td>
				</tr>
	<?php
	} // foreach($BlockList as $List) {
	?>
			</table>
<?php if ( $IsMainUser ) { ?>
			<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>">
<?php } ?>
		</div>
	</form>
<?php
} else {
	echo '<h1>PeerGuardian is not installed...</h1>';
}
//#################### LAST LINE ######################################
