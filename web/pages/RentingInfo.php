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

require_once(WEB_INC . '/languages/' . $_SESSION['Language'] . '/' . basename(__FILE__));

global $MySB_DB, $CurrentUser;
// System values
$renting_datas = $MySB_DB->get("system", ["rt_model", "rt_tva", "rt_global_cost", "rt_cost_tva", "rt_nb_users", "rt_price_per_users", "rt_method"], ["id_system" => 1]);
$TotalUsers = $renting_datas["rt_nb_users"];
$PricePerUser = $renting_datas["rt_price_per_users"];
$Model = $renting_datas["rt_model"];
$TVA = $renting_datas["rt_tva"];
$GlobalCost = $renting_datas["rt_global_cost"];
$GlobalCostTVA = $renting_datas["rt_cost_tva"];
$Method = $renting_datas["rt_method"];
// Users values
$users_data = $MySB_DB->select("users", ["users_ident", "period_price", "period_days", "treasury"]);


function Form($TotalUsers, $PricePerUser, $Model, $TVA, $GlobalCost, $GlobalCostTVA, $Method) {
	echo '<div align="center">
			<form class="form_settings" method="post" action="">
			<table border="0">
				<tr>
					<td>' . MainUser_Renting_Model . '</td>
					<td><input class="text_normal" name="model" type="text" value="' . $Model . '" /></td>
					<td><span class="Comments">' . MainUser_Renting_ExModel . '</span></td>
				</tr>
				<tr>
					<td>' . MainUser_Renting_TVA . '</td>
					<td><input class="text_small" name="tva" type="text" value="' . $TVA . '" /></td>
					<td><span class="Comments">' . MainUser_Renting_ExTVA . '</span></td>
				</tr>
				<tr>
					<td>' . MainUser_Renting_Price . '</td>
					<td><input class="text_small" name="global_cost" type="text" value="' . $GlobalCost . '" /></td>
					<td><span class="Comments">' . MainUser_Renting_ExPrice . '</span></td>
				</tr>
				<tr>
					<td>' . MainUser_Renting_Calcul . '</td>
					<td>
						<select name="method" style="width:200px; height: 28px;">';

						switch ($Method) {
							case '1':
								echo '<option selected="selected" value="1">' . MainUser_Renting_Method_1 .'</option>';
								echo '<option value="0">' . MainUser_Renting_Method_0 . '</option>';
								break;
							default:
								echo '<option value="1">' . MainUser_Renting_Method_1 .'</option>';
								echo '<option selected="selected" value="0">' . MainUser_Renting_Method_0 . '</option>';
								break;
						}

		echo '			</select>
					</td>
					<td><span class="Comments">' . MainUser_Renting_ExPriceToDiplay . '</span></td>
				</tr>';

		if ( ($GlobalCostTVA != 0.00) && ($TotalUsers >= 1) && (isset($Model)) && (isset($Method)) ) {
			echo '	<tr>
						<td>' . MainUser_Renting_CostTVA . '</td>
						<td><div align="center"><b>'.$GlobalCostTVA.'</b></div></td>
						<td><span class="Comments">' . MainUser_Renting_CostTVA_Comments . '</span></td>
					</tr>
					<tr>
						<td>' . MainUser_Renting_TotalUser . '</td>
						<td><div align="center">'.$TotalUsers.'</div></td>
						<td></td>
					</tr>
					<tr>
						<td>' . MainUser_Renting_PricePerUser . '</td>
						<td><div align="center"><b>'.$PricePerUser.'</b></div></td>
						<td><span class="Comments">' . MainUser_Renting_PricePerUser_Comments . '</span></td>
					</tr>';
		}

		echo '</table>
			<input class="submit" style="width:' . strlen(Global_SaveChanges)*10 . 'px; margin-top: 10px; margin-bottom: 10px;" name="submit" type="submit" value="' . Global_SaveChanges . '" />
		</form>
		</div>';

}

if (isset($_POST['submit'])) {
	$Model = $_POST['model'];
	$TVA = $_POST['tva'];
	$GlobalCost = $_POST['global_cost'];
	$Method = $_POST['method'];
	$TotalUsers = CountingUsers();

	$B = ($GlobalCost * $TVA) / 100;
	$GlobalCostTva = $GlobalCost + $B;
	$X = $GlobalCost / $TotalUsers;
	$Y = ($X * $TVA) / 100;
	$PricePerUsers = $X + $Y;

	switch ($Method) {
		case '1':
			$PricePerUsers = round($PricePerUsers, 2);
			$GlobalCostTva = round($GlobalCostTva, 2);
			break;
		default:
			$PricePerUsers = ceil($PricePerUsers);
			$GlobalCostTva = ceil($GlobalCostTva);
			break;
	}

	$result = $MySB_DB->update("system", ["rt_model" => "$Model", "rt_tva" => "$TVA", "rt_global_cost" => "$GlobalCost", "rt_cost_tva" => "$GlobalCostTva", "rt_nb_users" => "$TotalUsers", "rt_price_per_users" => "$PricePerUsers", "rt_method" => "$Method"], ["id_system" => 1]);

	if( $result >= 0 ) {
		$type = 'success';
	} else {
		$type = 'information';
		$message = Global_NoChange;
	}

	GenerateMessage('message_only', $type, $message);
}

Form($TotalUsers, $PricePerUser, $Model, $TVA, $GlobalCost, $GlobalCostTVA, $Method);

echo '<div align="center">';
echo '	<fieldset>
			<legend>' . MainUser_Renting_UsersTreasury . '</legend>
				<table style="border-spacing:1;">
					<tr>
						<th style="text-align:center;">' . MainUser_Renting_TitleUsers . '</th>
						<th style="text-align:center;">' . MainUser_Renting_TitleUsersTreasury . '</th>
					</tr>';

foreach($users_data as $UsersData) {
	$Treasury = $UsersData['treasury'];
	switch ($Method) {
		case '1':
			$Treasury = round($Treasury, 2);
			break;
		default:
			$Treasury = ceil($Treasury);
			break;
	}
	if (is_numeric($Treasury) && $Treasury >= 0.00) {
		$Color = 'color: #00DF00;';
	} else {
		$Color = 'color: #FF0000;';
	}

	echo '		<tr>
					<td><div align="center">' . $UsersData["users_ident"] . '</div></td>
					<td style="'.$Color.'"><div align="center"><b>' . $Treasury . '</b></div></td>
				</tr>';
}

echo '			</table>
		</fieldset>';
echo '</div>';

//#################### LAST LINE ######################################
