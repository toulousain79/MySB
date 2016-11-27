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
	$renting_datas = $MySB_DB->get("system", ["rt_model", "rt_tva", "rt_global_cost", "rt_cost_tva", "rt_nb_users", "rt_price_per_users", "rt_method"], ["id_system" => 1]);
	$Rent_Payments = $MySB_DB->select("tracking_rent_payments", ["id_tracking_rent_payments", "id_users", "payment_date", "amount", "balance"]);
	$TotalUsers = $renting_datas["rt_nb_users"];
	$PricePerUser = $renting_datas["rt_price_per_users"];
	$Model = $renting_datas["rt_model"];
	$TVA = $renting_datas["rt_tva"];
	$GlobalCost = $renting_datas["rt_global_cost"];
	$GlobalCostTVA = $renting_datas["rt_cost_tva"];
	$Method = $renting_datas["rt_method"];

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

		echo				'</select>
					</td>
					<td><span class="Comments">' . MainUser_Renting_ExPriceToDiplay . '</span></td>
				</tr>';

		if ( (isset($GlobalCost) && ($GlobalCost != 0.00)) && (isset($TotalUsers)) && (isset($Model)) && (isset($Method)) ) {
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
			<input class="submit" style="width:' . strlen(Global_SaveChanges)*10 . 'px; margin-top: 10px;" name="submit" type="submit" value="' . Global_SaveChanges . '" />
		</div>
	</form>';

	echo '
	<div align="center" style="margin-top: 10px; margin-bottom: 20px;">
		<form id="myForm" class="form_settings" method="post" action="">
			<fieldset>
			<legend>' . MainUser_Renting_AddPayment . '</legend>
					<div id="input1" class="clonedInput">
						<input class="input_id" id="input_id" name="input_id[1]" type="hidden" value="1" />'
						. MainUser_Renting_Amount . '&nbsp;
						<input class="input_amount" id="input_amount" name="input_amount[1]" type="text" style="width:60px;" pattern="\d+(\.\d{2})?" required />&nbsp;&nbsp;'
						. MainUser_Renting_User . '&nbsp;
						<select class="select_user" id="select_user" name="select_user[1]" style="width:200px; height: 28px; cursor: pointer;" required>';

						$AllUsers = $MySB_DB->select("users", ["id_users", "users_ident"]);
						foreach($AllUsers as $User) {
							echo '<option value="' . $User["id_users"] . '">' . $User["users_ident"] . '</option>';
						}

	echo '				</select>&nbsp;&nbsp;'
						 . MainUser_Renting_Date . '&nbsp;
						 <input class="input_date" id="input_date" name="input_date[1]" type="date" max="2017-12-31" min="2015-11-01" style="cursor: pointer;" required />
					</div>

					<div style="margin-top: 10px; margin-bottom: 20px;">
						<input type="button" id="btnAdd" value="' . MainUser_Renting_AddAmount . '" style="cursor: pointer;" />
						<input type="button" id="btnDel" value="' . MainUser_Renting_DelAmount . '" style="cursor: pointer;" />
					</div>

					<input class="submit" style="width:' . strlen(MainUser_Renting_SaveAmount)*10 . 'px; margin-top: 10px; margin-bottom: 10px;" name="submit" type="submit" value="' . MainUser_Renting_SaveAmount . '">
			</fieldset>
		</form>
	</div>';

	if (!empty($Rent_Payments)) {
		echo '<div align="center">
				<form class="form_settings" method="post" action="">
					<table style="border-spacing:1;">
						<tr>
							<th style="text-align:center;">' . MainUser_Renting_TitleUser . '</th>
							<th style="text-align:center;">' . MainUser_Renting_TitleDate . '</th>
							<th style="text-align:center;">' . MainUser_Renting_TitleAmount . '</th>
							<th style="text-align:center;">' . MainUser_Renting_TitleBalance . '</th>
							<th style="text-align:center;">' . Global_Table_Delete . '</th>
						</tr>';

			foreach($Rent_Payments as $Payment) {
				$UserName = $MySB_DB->get("users", "users_ident", ["id_users" => $Payment["id_users"]]);
				$Date = $Payment["payment_date"];
				$Amount = $Payment["amount"];
				$Balance = $Payment["balance"];

				echo '	<tr>
							<td><div align="center">' . $UserName . '</div></td>
							<td><div align="center">' . $Date . '</div></td>
							<td><div align="center">' . $Amount . '</div></td>
							<td><div align="center">' . $Balance . '</div></td>
							<td><div align="center"><input class="submit" name="delete['.$Payment["id_tracking_rent_payments"].']" type="submit" value="' . Global_Delete . '" /></div></td>
						</tr>';
			}

			echo '	</table>
				</form>
			</div>';
	}

	echo '<script type="text/javascript" src="' . THEMES_PATH . 'MySB/js/jquery-dynamically-adding-form-elements.js"></script>';
}

if (isset($_POST['submit'])) {
	switch ($_POST['submit']) {
		case Global_SaveChanges:
			$Model = $_POST['model'];
			$TVA = $_POST['tva'];
			$GlobalCost = $_POST['global_cost'];
			$Method = $_POST['method'];
			$TotalUsers = CountingUsers();

			if ( (isset($GlobalCost) && ($GlobalCost != 0.00)) && (isset($TotalUsers)) && (isset($Model)) && (isset($TVA)) && (isset($Method)) ) {
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

				global $MySB_DB;
				$result = $MySB_DB->update("system", ["rt_model" => "$Model", "rt_tva" => "$TVA", "rt_global_cost" => "$GlobalCost", "rt_cost_tva" => "$GlobalCostTva", "rt_nb_users" => "$TotalUsers", "rt_price_per_users" => "$PricePerUsers", "rt_method" => "$Method"], ["id_system" => 1]);

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
			break;
		case MainUser_Renting_SaveAmount:
			$count = count($_POST['input_id']);
			for($i=1; $i<=$count; $i++) {
				$Amount = $_POST['input_amount'][$i];
				$IdUser = $_POST['select_user'][$i];
				$Date = $_POST['input_date'][$i];
				if ( (isset($Amount) && ($Amount != 0.00)) && (isset($IdUser)) && (isset($Date)) ) {
					global $MySB_DB;
					$result = $MySB_DB->insert("tracking_rent_payments", ["id_users" => "$IdUser", "payment_date" => "$Date", "amount" => "$Amount", "balance" => "$Amount"]);

					if ( $result >= 1 ) {
						$type = 'success';
					} else {
						$type = 'information';
						$message = Global_NoChange;
					}
				} else {
					$type = 'information';
					$message = Global_CompleteAllFields;
				}
			}
			break;
	}

	GenerateMessage('message_only', $type, $message);
}

Form();

//#################### LAST LINE ######################################
