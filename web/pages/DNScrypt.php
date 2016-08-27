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

if (isset($_POST['submit'])) {
	GenerateMessage('MySB_SecurityRules', 'success', $message);
}

$ResolversList = $MySB_DB->select("dnscrypt_resolvers", [
															"name",
															"full_name",
															"location",
															"url",
															"version",
															"dnssec",
															"no_logs",
															"namecoin",
															"resolver_address",
															"provider_name",
															"is_activated",
															"is_wished"
														]);

$SelectedResolver = $MySB_DB->get("dnscrypt_resolvers", "name", ["AND" => ["is_wished" => 1, "is_activated" => 1]]);
?>

<form class="form_settings" method="post" action="">
	<div align="center">
		<input class="submit" style="width:<?php echo strlen(MainUser_DNScrypt_Restart)*10; ?>px; margin-bottom: 10px;" name="submit" type="submit" value="<?php echo MainUser_DNScrypt_Restart; ?>">
		<table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_Name; ?></th>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_FullName; ?></th>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_Location; ?></th>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_Version; ?></th>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_DNSsec; ?></th>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_NoLog; ?></th>
				<th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_NameCoin; ?></th>
			</tr>
<?php
	foreach($ResolversList as $Resolver) {
		$Name=$Resolver["name"];
		$FullName=$Resolver["full_name"];
		$Location=$Resolver["location"];
		$URL=$Resolver["url"];
		$Version=$Resolver["version"];
		$DnssecVal=$Resolver["dnssec"];
		$NoLogs=$Resolver["no_logs"];
		$Namecoin=$Resolver["namecoin"];
		$ResolverAddress=$Resolver["resolver_address"];
		$ProviderName=$Resolver["provider_name"];
		$IsWished=$Resolver["is_wished"];
		$IsActivated=$Resolver["is_activated"];

		if ( ($IsActivated == '1') && ($IsWished == '1') ) {
			$style = "style=\"background-color:#00FF66\"";
		} else {
			$style = "";
		}

		if ( ! strpos($Name, 'ipv6') ) {
			switch ($DnssecVal) {
				case 'no':
					$DnssecVal = '<select name="DnssecVal[]" style="width:60px; background-color:#FEBABC;" disabled>
									<option value="0" selected="selected">' .Global_No. '</option>
								</select>';
					break;
				default:
					$DnssecVal = '<select name="DnssecVal[]" style="width:60px; background-color:#B3FEA5;" disabled>
									<option value="1" selected="selected">' .Global_Yes. '</option>
								</select>';
					break;
			}
			switch ($NoLogs) {
				case 'no':
					$NoLogs = '<select name="NoLogs[]" style="width:60px; background-color:#FEBABC;" disabled>
									<option value="0" selected="selected">' .Global_No. '</option>
								</select>';
					break;
				default:
					$NoLogs = '<select name="NoLogs[]" style="width:60px; background-color:#B3FEA5;" disabled>
									<option value="1" selected="selected">' .Global_Yes. '</option>
								</select>';
					break;
			}
			switch ($Namecoin) {
				case 'no':
					$Namecoin = '<select name="Namecoin[]" style="width:60px; background-color:#FEBABC;" disabled>
									<option value="0" selected="selected">' .Global_No. '</option>
								</select>';
					break;
				default:
					$Namecoin = '<select name="Namecoin[]" style="width:60px; background-color:#B3FEA5;" disabled>
									<option value="1" selected="selected">' .Global_Yes. '</option>
								</select>';
					break;
			}
?>
			<tr>
				<td <?php echo $style ?>>
					<?php echo $Name; ?>
				</td>
				<td <?php echo $style ?>>
					<a target="_blank" href="<?php echo $URL; ?>"><?php echo $FullName; ?></a>
				</td>
				<td <?php echo $style ?>>
					<?php echo $Location; ?>
				</td>
				<td <?php echo $style ?>>
					<div style="text-align: center;"><?php echo $Version; ?></div>
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
