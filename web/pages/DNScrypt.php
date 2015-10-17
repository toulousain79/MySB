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
	$SelectedResolver = $_POST['ResolverName'];

	if ( isset($SelectedResolver) ) {
		$MySB_DB->update("dnscrypt_resolvers", ["is_wished" => 0], ["AND" => ["is_wished" => 1, "is_activated" => 0]]);
		$result = $MySB_DB->update("dnscrypt_resolvers", ["is_wished" => "1"], ["name" => "$SelectedResolver"]);

		if( $result >= 0 ) {
			$type = 'success';
		} else {
			$type = 'information';
			$message = Global_NoChange;
		}
	} else {
		$type = 'information';
		$message = Global_CompleteAllFields;
	}

	GenerateMessage('DNScrypt', $type, $message, '');
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

function YesNo($value) {
	switch ($value) {
		case 'yes':
			echo Global_Yes;
			break;
		default:
			echo Global_No;
			break;
	}
}
?>

<div align="center">
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
				<div style="text-align: center;"><?php echo YesNo($DnssecVal); ?></div>
			</td>
			<td <?php echo $style ?>>
				<div style="text-align: center;"><?php echo YesNo($NoLogs); ?></div>
			</td>
			<td <?php echo $style ?>>
				<div style="text-align: center;"><?php echo YesNo($Namecoin); ?></div>
			</td>
		</tr>
<?php
	}
} // foreach($TrackersList as $Tracker) {
?>
	</table>
</div>

<?php
//#################### LAST LINE ######################################
?>