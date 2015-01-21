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

if (isset($_POST['submit'])) {
	$SelectedResolver = $_POST['ResolverName'];

	if ( isset($SelectedResolver) ) {
		$MySB_DB->update("dnscrypt_resolvers", ["is_wished" => 0], ["AND" => ["is_wished" => 1, "is_activated" => 0]]);
		$result = $MySB_DB->update("dnscrypt_resolvers", ["is_wished" => "1"], ["name" => "$SelectedResolver"]);

		if( $result == 1 ) {
			$type = 'success';
		} else {
			$type = 'error';
			$message = 'Failed ! It was not possible to update the MySB database.';
		}
	} else {
		$type = 'information';
		$message = 'Please, complete all fields.';
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
?>

<!--
<div align="center" style="margin-top: 10px; margin-bottom: 20px;">
	<form class="form_settings" method="post" action="">
		<fieldset>
		<legend>What resolver do you want to use ? (IPv4 only)</legend>

				Available resolvers: <select name="ResolverName" style="width:200px; cursor: pointer;" required="required">
<?php
						// foreach($ResolversList as $Resolver) {
							// if ( ! strpos($Resolver["name"], 'ipv6') ) {
								// switch ($Resolver["name"]) {
									// case "$SelectedResolver":
										// $selected = 'selected="selected"';
										// break;
									// default:
										// $selected = '';
										// break;
								// }
								// echo '<option value="' .$Resolver["name"]. '" ' . $selected . '>' .$Resolver["name"]. '</option>';
							// }
						// }
?>
									</select> 
		
			<p class="Comments">If Be careful, some resolvers do not seem to work for resolving certain domains. This is the case of <b>opendns</b> for example.<br />
								If problems try another one.<br />
								The default resolver is <b>dnscrypt.eu-dk</b>.</p>

			<input class="submit" style="width:180px; margin-top: 10px; margin-bottom: 10px;" name="submit" type="submit" value="I want use this resolver !">
		</fieldset>
	</form>
</div>
-->

<form class="form_settings" method="post" action="">
	<div align="center">
		<table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;">Name</th>
				<th style="text-align:center;">Full name</th>
				<th style="text-align:center;">Location</th>
				<th style="text-align:center;">Version</th>
				<th style="text-align:center;">DNSSEC<br />validation</th>
				<th style="text-align:center;">No logs</th>
				<th style="text-align:center;">Namecoin</th>
				<!-- <th style="text-align:center;">Resolver address</th> -->
				<!-- <th style="text-align:center;">Provider name</th> -->
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
					<div style="text-align: center;"><?php echo $DnssecVal; ?></div>
				</td>
				<td <?php echo $style ?>>
					<div style="text-align: center;"><?php echo $NoLogs; ?></div>
				</td>
				<td <?php echo $style ?>>
					<div style="text-align: center;"><?php echo $Namecoin; ?></div>
				</td>
				<!-- <td>
					<?php //echo $ResolverAddress; ?>
				</td> -->
				<!-- <td>
					<?php //echo $ProviderName; ?>
				</td> -->
			</tr>
<?php
	}
} // foreach($TrackersList as $Tracker) {
?>

		</table>
	</div>
</form>

<?php
//#################### LAST LINE ######################################
?>