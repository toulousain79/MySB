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

$PortForwardingList = $MySB_DB->select("port_forwarding", "*");
?>

	<div align="center" style="margin-top: 10px; margin-bottom: 20px;">
		<form id="myForm" class="form_settings" method="post" action="">
			<fieldset>
			<legend><?php echo PortForward_Title_AddRules; ?></legend>
				<table>
					<tr>
						<th style="text-align:center;"><?php echo PortForward_Title_Description; ?></th>
						<th style="text-align:center;"><?php echo PortForward_Title_FromAddress; ?></th>
						<th style="text-align:center;"><?php echo PortForward_Title_FromPort; ?></th>
						<th style="text-align:center;"><?php echo PortForward_Title_Proto; ?></th>
						<th style="text-align:center;"><?php echo PortForward_Title_ToPort; ?></th>
						<th style="text-align:center;"></th>
					</tr>
					<tr>
						<td><input name="description" type="text" value="" /></td>
						<td><input name="from_address" type="text" value="" /></td>
						<td><input size="11" name="from_port" type="text" value="" /></td>
						<td>
							<select name="proto" style="width:100px; cursor: pointer;">
								<option value="tcp">TCP</option>
								<option value="udp">UDP</option>
								<option value="tcp/udp">TCP/UDP</option>
							</select>
						</td>
						<td><input size="11" name="to_port" type="text" value="" /></td>
						<td><input class="submit" name="add_rule" type="submit" value="<?php echo PortForward_Add; ?>" /></td>
					</tr>
				</table>
				<div align="center"><p class="Comments"><?php echo PortForward_Add_Comments; ?></p></div>
			</fieldset>
		</form>
	</div>

<form class="form_settings" method="post" action="">
	<div align="center">
		<table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;"><?php echo PortForward_Title_Description; ?></th>
				<th style="text-align:center;"><?php echo PortForward_Title_FromAddress; ?></th>
				<th style="text-align:center;"><?php echo PortForward_Title_FromPort; ?></th>
				<th style="text-align:center;"><?php echo PortForward_Title_Proto; ?></th>
				<th style="text-align:center;"><?php echo PortForward_Title_ToPort; ?></th>
				<th style="text-align:center;"><?php echo Global_IsActive; ?></th>
				<th style="text-align:center;"><?php echo Global_Table_Delete; ?></th>
			</tr>

<?php
$i = 0;
foreach($PortForwardingList as $PortForwarding) {
	$i++;

	switch ($PortForwarding["proto"]) {
		case 'tcp':
			switch ($PortForwarding["is_reserved"]) {
				case '1':
					$proto = '	<select name="proto['.$i.']" style="width:100px;" disabled>
										<option value="tcp" selected="selected">TCP</option>
								</select>';
					break;
				default:
					$proto = '	<select name="proto['.$i.']" style="width:100px; cursor: pointer;">
										<option value="tcp" selected="selected">TCP</option>
										<option value="udp">UDP</option>
										<option value="tcp/udp">TCP/UDP</option>
								</select>';
					break;
			}
			break;
		case 'udp':
			switch ($PortForwarding["is_reserved"]) {
				case '1':
					$proto = '	<select name="proto['.$i.']" style="width:100px;" disabled>
										<option value="udp" selected="selected">UDP</option>
								</select>';
					break;
				default:
					$proto = '	<select name="proto['.$i.']" style="width:100px; cursor: pointer;">
										<option value="tcp">TCP</option>
										<option value="udp" selected="selected">UDP</option>
										<option value="tcp/udp">TCP/UDP</option>
								</select>';
			}
			break;
		default:
			$proto = '	<select name="proto['.$i.']" style="width:100px; cursor: pointer;">
								<option value="tcp">TCP</option>
								<option value="udp">UDP</option>
								<option value="tcp/udp" selected="selected">TCP/UDP</option>
						</select>';
			break;
	}

	switch ($PortForwarding["is_active"]) {
		case '0':
			switch ($PortForwarding["is_reserved"]) {
				case '1':
					$is_active = '	<select name="is_active['.$i.']" style="width:60px;" class="redText" disabled>
										<option value="0" selected="selected" class="redText">' .Global_No. '</option>
									</select>';
					break;
				default:
					$is_active = '	<select name="is_active['.$i.']" style="width:60px; cursor: pointer;" class="redText" onchange="this.className=this.options[this.selectedIndex].className">
										<option value="0" selected="selected" class="redText">' .Global_No. '</option>
										<option value="1" class="greenText">' .Global_Yes. '</option>
									</select>';
			}
			break;
		default:
			switch ($PortForwarding["is_reserved"]) {
				case '1':
					$is_active = '	<select name="is_active['.$i.']" style="width:60px;" class="greenText" disabled>
										<option value="1" selected="selected" class="greenText">' .Global_Yes. '</option>
									</select>';
					break;
				default:
					$is_active = '	<select name="is_active['.$i.']" style="width:60px; cursor: pointer;" class="greenText" onchange="this.className=this.options[this.selectedIndex].className">
										<option value="0" class="redText">' .Global_No. '</option>
										<option value="1" selected="selected" class="greenText">' .Global_Yes. '</option>
									</select>';
			}
			break;
	}
?>
			<tr>
				<td>
					<input style="width:150px;" type="hidden" name="description[<?php echo $i; ?>]" value="<?php echo $PortForwarding["description"]; ?>" />
					<?php echo $PortForwarding["description"]; ?>
				</td>
				<td>
					<input style="width:150px;" type="hidden" name="from_address[<?php echo $i; ?>]" value="<?php echo $PortForwarding["from_address"]; ?>" />
					<?php echo $PortForwarding["from_address"]; ?>
				</td>
				<td>
					<?php echo $PortForwarding["from_port"]; ?>
				</td>
				<td>
					<?php echo $proto; ?>
				</td>
				<td>
					<?php echo $PortForwarding["to_port"]; ?>
				</td>
				<td>
					<?php echo $PortForwarding["from_port"]; ?>
				</td>				
				<td>
					<?php echo $is_active; ?>
				</td>
				<td>
<?php
			switch ($PortForwarding["is_reserved"]) {
				case '1':
					$proto = '	<select name="proto['.$i.']" style="width:100px;" disabled>
										<option value="udp" selected="selected">UDP</option>
								</select>';
					break;
				default:
					echo '<input class="submit" name="delete['. $PortForwarding["id_port_forwarding"] .']" type="submit" value="'. Global_Delete .'" />';
			}
?>
				</td>
			</tr>
			<input class="input_id" id="input_id" name="input_id[<?php echo $i; ?>]" type="hidden" value="<?php echo $i; ?>" />
<?php
} // foreach($PortForwardingList as $PortForwarding) {
?>

		</table>

		<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>">

	</div>
</form>

<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery-dynamically-adding-form-elements.js"></script>

<?php
//#################### LAST LINE ######################################
