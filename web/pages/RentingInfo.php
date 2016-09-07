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

function Form() {
	global $MySB_DB;

	// Users table
	$renting_datas = $MySB_DB->get("renting", ["model", "tva", "global_cost", "nb_users", "price_per_users", "method"], ["id_renting" => 1]);
	$TotalUsers = $renting_datas["nb_users"];
	$PricePerUser = $renting_datas["price_per_users"];
	$Model = $renting_datas["model"];
	$TVA = $renting_datas["tva"];
	$GlobalCost = $renting_datas["global_cost"];
	$Method = $renting_datas["method"];

	echo '<form class="form_settings" method="post" action="">
		<div align="center">
			<table border="0">
				<tr>
					<td>' . MainUser_Renting_Model . '</td>
					<td><input class="text_normal" name="model" type="text" value="' . $Model . '" /></td>
					<td><span class="Comments">' . MainUser_Renting_ExModel . '</span></td>
				</tr>
				<tr>
					<td>' . MainUser_Renting_TVA . '</td>
					<td><input class="text_small" name="tva" type="text" value="' . $TVA . '" required="required" /></td>
					<td><span class="Comments">' . MainUser_Renting_ExTVA . '</span></td>
				</tr>
				<tr>
					<td>' . MainUser_Renting_Price . '</td>
					<td><input class="text_small" name="global_cost" type="text" value="' . $GlobalCost . '" required="required" /></td>
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

		echo				'</select>
					</td>
					<td><span class="Comments">' . MainUser_Renting_ExPriceToDiplay . '</span></td>
				</tr>
				<tr>
					<td>' . MainUser_Renting_TotalUser . '</td>
					<td><div align="center">'.$TotalUsers.'</div></td>
					<td></td>
				</tr>
				<tr>
					<td>' . MainUser_Renting_PricePerUser . '</td>
					<td><div align="center"><b>'.$PricePerUser.'</b>' . MainUser_Renting_TotalPerUser_Plus . '</div></td>
					<td><span class="Comments">TTC / mois</span></td>
				</tr>
			</table>
			<input class="submit" style="width:' . strlen(Global_SaveChanges)*10 . 'px; margin-top: 10px;" name="submit" type="submit" value="' . Global_SaveChanges . '" />
		</div>
	</form>';

}

if (isset($_POST['submit'])) {
	$Model = $_POST['model'];
	$TVA = $_POST['tva'];
	$GlobalCost = $_POST['global_cost'];
	$Method = $_POST['method'];
	$TotalUsers = CountingUsers();

	if ( (isset($GlobalCost)) && (isset($TVA)) && (isset($TotalUsers)) && (isset($Model)) && (isset($Method)) ) {
		$X = $GlobalCost / $TotalUsers;
		$Y = ($X * $TVA) / 100;
		$PricePerUsers = $X + $Y;

		switch ($Method) {
			case '1':
				$PricePerUsers = round($PricePerUsers, 2);
				break;
			default:
				$PricePerUsers = ceil($PricePerUsers);
				break;
		}

		global $MySB_DB;

		$result = $MySB_DB->update("renting", ["model" => "$Model", "tva" => "$TVA", "global_cost" => "$GlobalCost", "nb_users" => "$TotalUsers", "price_per_users" => "$PricePerUsers", "method" => "$Method"], ["id_renting" => 1]);

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

	GenerateMessage('message_only', $type, $message);
}

Form();

//#################### LAST LINE ######################################
