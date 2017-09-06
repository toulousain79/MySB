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

global $MySB_DB;
require_once(WEB_INC . '/languages/' . $_SESSION['Language'] . '/' . basename(__FILE__));

$ConfigValues = $MySB_DB->get("dnscrypt_config", ["processes_qty", "no_logs", "dnssec", "namecoin", "random"], ["id_dnscrypt_config" => 1]);
$DaemonQty_DB = $ConfigValues['processes_qty'];
$NoLogs_DB = $ConfigValues['no_logs'];
$DNSSec_DB = $ConfigValues['dnssec'];
$Namecoin_DB = $ConfigValues['namecoin'];
$Random_DB = $ConfigValues['random'];
$DaemonQty_POST = $_POST['DaemonQty'];
$NoLogs_POST = $_POST['NoLogs'];
$DNSSec_POST = $_POST['DNSSec'];
$Namecoin_POST = $_POST['Namecoin'];
$Random_POST = $_POST['Random'];
$Change = 0;
$Command = 'message_only';
$type = 'information';
$message = Global_NoChange;

if (isset($_POST['submit'])) {
	switch ($_POST['submit']) {
		case Global_SaveChanges:
			$DaemonQty_DB = $ConfigValues['processes_qty'];
			$NoLogs_DB = $ConfigValues['no_logs'];
			$DNSSec_DB = $ConfigValues['dnssec'];
			$Namecoin_DB = $ConfigValues['namecoin'];
			$Random_DB = $ConfigValues['random'];

			if ( ($NoLogs_POST != $NoLogs_DB) || ($DNSSec_POST != $DNSSec_DB) || ($Namecoin_POST != $Namecoin_DB) || ($DaemonQty_POST != $DaemonQty_DB) || ($Random_POST != $Random_DB) ) {
				$Change++;
				$Command = 'MySB_SecurityRules';
				$type = 'success';
				$NoLogs_DB = $NoLogs_POST;
				$DNSSec_DB = $DNSSec_POST;
				$Namecoin_DB = $Namecoin_POST;
				$DaemonQty_DB = $DaemonQty_POST;
				$Random_DB = $Random_POST;
			}

			if( $Change >= 1 ) {
				$result = $MySB_DB->update("dnscrypt_config", ["processes_qty" => "$DaemonQty_POST", "no_logs" => "$NoLogs_POST", "dnssec" => "$DNSSec_POST", "namecoin" => "$Namecoin_POST", "random" => "$Random_POST"], ["id_dnscrypt_config" => 1]);

				if( $result >= 0 ) {
					$type = 'success';
					unset($message);
				}
			}
			break;
		default:
			$Command = 'MySB_SecurityRules';
			$type = 'success';
			break;
	}

	GenerateMessage($Command, $type, $message);
}

$ResolversList = $MySB_DB->select("dnscrypt_resolvers", ["name", "url", "dnssec", "no_logs", "namecoin", "resolver_address", "provider_name", "certificate", "pid", "speed"], ["ORDER" => ["name" => "ASC"]]);
$SelectedResolver = $MySB_DB->get("dnscrypt_resolvers", "name", ["AND" => ["forwarder[!]" => '', "pid[!]" => 0]]);
?>

<form class="form_settings" method="post" action="">
<div align="center" style="margin-top: 10px; margin-bottom: 20px;">
	<fieldset>
	<legend><?php echo MainUser_DNScrypt_Title_Config; ?></legend>

	<table>
		<tr>
			<td><?php echo MainUser_DNScrypt_NoLogs; ?></td>
			<td>
				<?php switch ($NoLogs_DB) {
					case 'yes':
						$class = 'greenText';
						$options = '<option selected="selected" value="yes" class="greenText">' .Global_Yes. '</option>';
						$options .= '<option value="no" class="redText">' .Global_No. '</option>';
						break;
					default:
						$class = 'redText';
						$options = '<option value="yes" class="greenText">' .Global_Yes. '</option>';
						$options .= '<option selected="selected" value="no" class="redText">' .Global_No. '</option>';
						break;
				} ?>
				<select name="NoLogs" style="width:60px; height: 28px;" class="<?php echo $class; ?>" onchange="this.className=this.options[this.selectedIndex].className"><?php echo $options; ?></select>
			</td>
			<td><?php echo MainUser_DNScrypt_DNSSec; ?></td>
			<td>
				<?php switch ($DNSSec_DB) {
					case 'yes':
						$class = 'greenText';
						$options = '<option selected="selected" value="yes" class="greenText">' .Global_Yes. '</option>';
						$options .= '<option value="no" class="redText">' .Global_No. '</option>';
						break;
					default:
						$class = 'redText';
						$options = '<option value="yes" class="greenText">' .Global_Yes. '</option>';
						$options .= '<option selected="selected" value="no" class="redText">' .Global_No. '</option>';
						break;
				} ?>
				<select name="DNSSec" style="width:60px; height: 28px;" class="<?php echo $class; ?>" onchange="this.className=this.options[this.selectedIndex].className"><?php echo $options; ?></select>
			</td>
			<td><?php echo MainUser_DNScrypt_Namecoin; ?></td>
			<td>
				<?php switch ($Namecoin_DB) {
					case 'yes':
						$class = 'greenText';
						$options = '<option selected="selected" value="yes" class="greenText">' .Global_Yes. '</option>';
						$options .= '<option value="no" class="redText">' .Global_No. '</option>';
						break;
					default:
						$class = 'redText';
						$options = '<option value="yes" class="greenText">' .Global_Yes. '</option>';
						$options .= '<option selected="selected" value="no" class="redText">' .Global_No. '</option>';
						break;
				} ?>
				<select name="Namecoin" style="width:60px; height: 28px;" class="<?php echo $class; ?>" onchange="this.className=this.options[this.selectedIndex].className"><?php echo $options; ?></select>
			</td>
			<td><?php echo MainUser_DNScrypt_Random; ?></td>
			<td>

				<?php switch ($Random_DB) {
					case 'yes':
						$class = 'greenText';
						$options = '<option selected="selected" value="yes" class="greenText">' .Global_Yes. '</option>';
						$options .= '<option value="no" class="redText">' .Global_No. '</option>';
						break;
					default:
						$class = 'redText';
						$options = '<option value="yes" class="greenText">' .Global_Yes. '</option>';
						$options .= '<option selected="selected" value="no" class="redText">' .Global_No. '</option>';
						break;
				} ?>
				<select name="Random" style="width:60px; height: 28px;" class="<?php echo $class; ?>" onchange="this.className=this.options[this.selectedIndex].className"><?php echo $options; ?></select>
			</td>
			<td><?php echo MainUser_DNScrypt_Daemon; ?></td>
			<td>
				<select name="DaemonQty" style="width:40px; height: 28px;">
				<?php
					for($i=1; $i<=6; $i++) {
						if ( $DaemonQty_DB == $i ) {
							echo '<option value="'.$i.'" selected>'.$i.'</option>';
						} else {
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
				?>
				</select>
			</td>
		</tr>
	</table>
	</fieldset>

	<input class="submit" style="width:<?php echo strlen(Global_SaveChanges)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>" />

	</div>

	<div align="center">
		<input class="submit" style="width:<?php echo strlen(MainUser_DNScrypt_Restart)*10; ?>px; margin-bottom: 10px;" name="submit" type="submit" value="<?php echo MainUser_DNScrypt_Restart; ?>">
		<table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_Name; ?></th>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_DNSsec; ?></th>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_NoLog; ?></th>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_NameCoin; ?></th>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_Certificate; ?></th>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_Speed; ?></th>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_Pid; ?></th>
			</tr>
<?php
	foreach($ResolversList as $Resolver) {
		$Name=$Resolver["name"];
		$URL=$Resolver["url"];
		$DnssecVal=$Resolver["dnssec"];
		$NoLogs=$Resolver["no_logs"];
		$Namecoin=$Resolver["namecoin"];
		$ResolverAddress=$Resolver["resolver_address"];
		$ProviderName=$Resolver["provider_name"];
		$IsWished=$Resolver["is_wished"];
		$IsActivated=$Resolver["is_activated"];
		$Certificate=$Resolver["certificate"];
		$Pid=$Resolver["pid"];
		$Speed=$Resolver["speed"];

		if ( $Pid != '' ) {
			$style = "style=\"background-color:#00FF66\"";
			$PidValue = $Pid;
		} else {
			$style = '';
			$PidValue = '';
		}

		if ( ! strpos($Name, 'ipv6') ) {
			switch ($DnssecVal) {
				case 'no':
					$DnssecVal = '<select name="DnssecVal[]" style="width:60px; background-color:#FEBABC;" disabled>
									<option value="no" selected="selected">' .Global_No. '</option>
								</select>';
					break;
				default:
					$DnssecVal = '<select name="DnssecVal[]" style="width:60px; background-color:#B3FEA5;" disabled>
									<option value="yes" selected="selected">' .Global_Yes. '</option>
								</select>';
					break;
			}
			switch ($NoLogs) {
				case 'no':
					$NoLogs = '<select name="NoLogs[]" style="width:60px; background-color:#FEBABC;" disabled>
									<option value="no" selected="selected">' .Global_No. '</option>
								</select>';
					break;
				default:
					$NoLogs = '<select name="NoLogs[]" style="width:60px; background-color:#B3FEA5;" disabled>
									<option value="yes" selected="selected">' .Global_Yes. '</option>
								</select>';
					break;
			}
			switch ($Namecoin) {
				case 'no':
					$Namecoin = '<select name="Namecoin[]" style="width:60px; background-color:#FEBABC;" disabled>
									<option value="no" selected="selected">' .Global_No. '</option>
								</select>';
					break;
				default:
					$Namecoin = '<select name="Namecoin[]" style="width:60px; background-color:#B3FEA5;" disabled>
									<option value="yes" selected="selected">' .Global_Yes. '</option>
								</select>';
					break;
			}
			switch ($Certificate) {
				case '0':
					$Certificate = 'OK';
					break;
				default:
					$Certificate = 'KO';
					break;
			}
?>
			<tr>
				<td <?php echo $style ?>>
					<div style="text-align: center;"><a target="_blank" href="<?php echo $URL; ?>"><?php echo $Name; ?></a></div>
				</td>
				<td <?php echo $style ?>>
					<div style="text-align: center;"><?php echo $DnssecVal; ?></div>
				</td>
				<td <?php echo $style ?>>
					<div style="text-align: center;"><?php echo $NoLogs; ?></div>
				</td>
				<td <?php echo $style ?>>
					<div style="text-align: center;"><?php echo $Namecoin; ?></div>
				</td>
				<td <?php echo $style ?>>
					<div style="text-align: center; <?php echo $style; ?>"><?php echo $Certificate; ?></div>
				</td>
				<td <?php echo $style ?>>
					<div style="text-align: center;"><?php echo $Speed; ?></div>
				</td>
				<td <?php echo $style ?>>
					<div style="text-align: center;"><?php echo $PidValue; ?></div>
				</td>
			</tr>
	<?php
		}
	} // foreach($TrackersList as $Tracker) {
	?>
		</table>
		<input class="submit" style="width:<?php echo strlen(MainUser_DNScrypt_Restart)*10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo MainUser_DNScrypt_Restart; ?>">
	</div>
</form>

<?php
//#################### LAST LINE ######################################
