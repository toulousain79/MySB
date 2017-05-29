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
	$renting_datas = $MySB_DB->get("system", ["rt_model", "rt_cost_tva", "rt_nb_users", "rt_method"], ["id_system" => 1]);
	$Rent_Payments = $MySB_DB->select("tracking_rent_payments", ["id_tracking_rent_payments", "id_users", "payment_date", "amount"]);
	$nTotalUsers = $renting_datas["rt_nb_users"];
	$Model = $renting_datas["rt_model"];
	$GlobalCostTVA = $renting_datas["rt_cost_tva"];
	$Method = $renting_datas["rt_method"];

	if ( ($GlobalCostTVA != 0.00) && ($nTotalUsers >= 1) && (isset($Model)) && (isset($Method)) ) {
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

							$AllUsers = $MySB_DB->select("users", ["id_users", "users_ident"], ["id_users[!]" => 1]);
							foreach($AllUsers as $User) {
								echo '<option value="' . $User["id_users"] . '">' . $User["users_ident"] . '</option>';
							}

		echo '				</select>&nbsp;&nbsp;'
							 . MainUser_Renting_Date . '&nbsp;
							 <input class="input_date" id="input_date" name="input_date[1]" type="date" max="'. date("Y-m-d") .'" min="2015-11-01" style="cursor: pointer;" required />
						</div>

						<div style="margin-top: 10px; margin-bottom: 20px;">
							<input type="button" id="btnAdd" value="' . MainUser_Renting_AddAmount . '" style="cursor: pointer;" />
							<input type="button" id="btnDel" value="' . MainUser_Renting_DelAmount . '" style="cursor: pointer;" />
						</div>

						<input class="submit" style="width:' . strlen(MainUser_Renting_SaveAmount)*10 . 'px; margin-top: 10px; margin-bottom: 10px;" name="submit" type="submit" value="' . MainUser_Renting_SaveAmount . '">
				</fieldset>
			</form>
		</div>';
	}

	if (!empty($Rent_Payments)) {
		echo '<div align="center">
				<form class="form_settings" method="post" action="">
				<fieldset><legend>Versements</legend>
					<table style="border-spacing:1;">
						<tr>
							<th style="text-align:center;">' . MainUser_Renting_TitleUser . '</th>
							<th style="text-align:center;">' . MainUser_Renting_TitleDate . '</th>
							<th style="text-align:center;">' . MainUser_Renting_TitleAmount . '</th>
							<th style="text-align:center;">' . Global_Table_Delete . '</th>
						</tr>';

			foreach($Rent_Payments as $Payment) {
				$UserName = $MySB_DB->get("users", "users_ident", ["id_users" => $Payment["id_users"]]);

				echo '	<tr>
							<td><div align="center">' . $UserName . '</div></td>
							<td><div align="center">' . $Payment["payment_date"] . '</div></td>
							<td><div align="center">' . $Payment["amount"] . '</div></td>
							<td><div align="center"><input class="submit" name="submit['.$Payment["id_tracking_rent_payments"].']" type="submit" value="' . Global_Delete . '" /></div></td>
						</tr>';
			}

			echo '	</table>
				</fieldset></form></div>';
	}

	echo '<script type="text/javascript" src="' . THEMES_PATH . 'MySB/js/jquery-dynamically-adding-form-elements.js"></script>';
}

if (isset($_POST['submit'])) {
	global $MySB_DB;

	switch ($_POST['submit']) {
		case MainUser_Renting_SaveAmount:
			$count = count($_POST['input_id']);
			for($i=1; $i<=$count; $i++) {
				$Amount = $_POST['input_amount'][$i];
				$IdUser = $_POST['select_user'][$i];
				$Date = $_POST['input_date'][$i];
				if ( (isset($Amount) && ($Amount != 0.00)) && (isset($IdUser)) && (isset($Date)) ) {
					$MySB_DB->insert("tracking_rent_payments", ["id_users" => "$IdUser", "payment_date" => "$Date", "amount" => "$Amount"]);
					$result = $MySB_DB->id();
					if ( $result >= 1 ) {
						$type = 'success';
					}
				} else {
					$type = 'information';
					$message = Global_CompleteAllFields;
				}
			}

			break;
		default: // delete
			foreach($_POST['submit'] as $key => $value) {
				$result = $MySB_DB->delete("tracking_rent_payments", ["id_tracking_rent_payments " => $key]);
				if ( $result >= 1 ) {
					$type = 'success';
				} else {
					$type = 'error';
					$message = Global_NoChange;
				}
			}
			break;
	}

	GenerateMessage('message_only', $type, $message);
}

Form();

//#################### LAST LINE ######################################
